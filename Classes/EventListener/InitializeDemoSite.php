<?php

declare(strict_types=1);

namespace CorporateTemplate\CorporateTemplate\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\Yaml\Yaml;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Configuration\SiteConfiguration;
use TYPO3\CMS\Core\Configuration\SiteWriter;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Database\Schema\SchemaMigrator;
use TYPO3\CMS\Core\Database\Schema\SqlReader;
use TYPO3\CMS\Core\Package\Event\PackageInitializationEvent;
use TYPO3\CMS\Core\Package\Initialization\ImportStaticSqlDataOnPackageInitialization;
use TYPO3\CMS\Core\Registry;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

/**
 * Finishes the installation of the demo site:
 *
 * 1. After the demo data (ext_tables_static+adt.sql) of corporate_template has been
 *    imported, the site configuration of the demo site is written. An already
 *    existing site for root page 1 (e.g. created by the TYPO3 installer) is replaced,
 *    its "base" is kept.
 * 2. Demo records for the optional extensions powermail (contact form) and
 *    go_maps_ext (map) are imported and their site sets are added to the demo site
 *    once those extensions are installed (no matter whether before or after
 *    corporate_template).
 */
final readonly class InitializeDemoSite
{
    private const EXTENSION_KEY = 'corporate_template';
    private const REGISTRY_NAMESPACE = 'corporate_template';
    private const OPTIONAL_EXTENSIONS = [
        'powermail' => [
            'data' => 'Initialisation/Optional/powermail.sql',
            'set' => 'in2code/powermail-main',
        ],
        'go_maps_ext' => [
            'data' => 'Initialisation/Optional/go_maps_ext.sql',
            'set' => 'clickstorm/go-maps-ext',
        ],
    ];

    public function __construct(
        private Registry $registry,
        private SiteFinder $siteFinder,
        private SiteWriter $siteWriter,
        private SiteConfiguration $siteConfiguration,
        private SqlReader $sqlReader,
        private SchemaMigrator $schemaMigrator,
        private LoggerInterface $logger,
    ) {}

    #[AsEventListener('corporate-template/initialize-demo-site', after: ImportStaticSqlDataOnPackageInitialization::class)]
    public function __invoke(PackageInitializationEvent $event): void
    {
        $extensionKey = $event->getExtensionKey();
        if ($extensionKey === self::EXTENSION_KEY && $event->hasStorageEntry(ImportStaticSqlDataOnPackageInitialization::class)) {
            // The demo data has just been (re-)imported: (re)write the site configuration
            $this->registry->remove(self::REGISTRY_NAMESPACE, 'siteConfiguration');
        }
        // When the extension is activated in the Extension Manager (or via "extension:activate"),
        // this listener is not yet part of the running container. The site configuration is then
        // written by the next package initialization, e.g. "typo3 extension:setup".
        if ($this->demoDataImported()) {
            $this->writeSiteConfiguration();
            foreach (array_keys(self::OPTIONAL_EXTENSIONS) as $optionalExtension) {
                if (ExtensionManagementUtility::isLoaded($optionalExtension)) {
                    $this->importOptionalData($optionalExtension);
                    $this->addSiteSet($optionalExtension);
                }
            }
        }
    }

    private function demoDataImported(): bool
    {
        if (!ExtensionManagementUtility::isLoaded(self::EXTENSION_KEY)) {
            return false;
        }
        // TYPO3 v14 registry key
        if ($this->registry->get('extensionDataImport', self::EXTENSION_KEY . ':ext_tables_static+adt.sql')) {
            return true;
        }
        // TYPO3 v13 registry key (path relative to the public directory)
        $file = ExtensionManagementUtility::extPath(self::EXTENSION_KEY) . 'ext_tables_static+adt.sql';
        return (bool)$this->registry->get('extensionDataImport', PathUtility::stripPathSitePrefix($file));
    }

    private function writeSiteConfiguration(): void
    {
        if ($this->registry->get(self::REGISTRY_NAMESPACE, 'siteConfiguration')) {
            return;
        }
        $templateFile = ExtensionManagementUtility::extPath(self::EXTENSION_KEY) . 'Initialisation/Site/corporate-template/config.yaml';
        $configuration = Yaml::parseFile($templateFile);
        $identifier = 'corporate-template';
        foreach ($this->siteFinder->getAllSites(false) as $site) {
            if ($site->getRootPageId() === (int)$configuration['rootPageId']) {
                $identifier = $site->getIdentifier();
                $configuration['base'] = (string)($site->getConfiguration()['base'] ?? $configuration['base']);
                break;
            }
        }
        try {
            $this->siteWriter->write($identifier, $configuration);
            $this->disableSiteTypoScript($identifier);
            $this->registry->set(self::REGISTRY_NAMESPACE, 'siteConfiguration', $identifier);
        } catch (\Throwable $e) {
            $this->logger->error('corporate_template: could not write site configuration: ' . $e->getMessage());
        }
    }

    /**
     * The TYPO3 installer creates a site with a placeholder "setup.typoscript" (TYPO3 logo
     * page), which would override the TypoScript of the site set. Such files of the replaced
     * site are renamed to "*.bak".
     */
    private function disableSiteTypoScript(string $identifier): void
    {
        $sitePath = Environment::getConfigPath() . '/sites/' . $identifier . '/';
        foreach (['setup.typoscript', 'constants.typoscript', 'page.tsconfig'] as $fileName) {
            if (is_file($sitePath . $fileName)) {
                @rename($sitePath . $fileName, $sitePath . $fileName . '.bak');
            }
        }
    }

    /**
     * Adds the site set of an optional extension (e.g. powermail) as dependency of the
     * demo site, so its TypoScript is loaded. Done once per extension.
     */
    private function addSiteSet(string $extensionKey): void
    {
        $registryKey = 'siteSet:' . $extensionKey;
        $siteIdentifier = (string)$this->registry->get(self::REGISTRY_NAMESPACE, 'siteConfiguration', '');
        if ($siteIdentifier === '' || $this->registry->get(self::REGISTRY_NAMESPACE, $registryKey)) {
            return;
        }
        $setName = self::OPTIONAL_EXTENSIONS[$extensionKey]['set'];
        if (!$this->extensionProvidesSet($extensionKey, $setName)) {
            return;
        }
        try {
            $configuration = $this->siteConfiguration->load($siteIdentifier);
            $dependencies = $configuration['dependencies'] ?? [];
            if (!in_array($setName, $dependencies, true)) {
                $configuration['dependencies'] = [...$dependencies, $setName];
                $this->siteWriter->write($siteIdentifier, $configuration);
            }
            $this->registry->set(self::REGISTRY_NAMESPACE, $registryKey, 1);
        } catch (\Throwable $e) {
            $this->logger->warning('corporate_template: could not add site set ' . $setName . ': ' . $e->getMessage());
        }
    }

    private function extensionProvidesSet(string $extensionKey, string $setName): bool
    {
        $setFiles = glob(ExtensionManagementUtility::extPath($extensionKey) . 'Configuration/Sets/*/config.yaml') ?: [];
        foreach ($setFiles as $setFile) {
            if ((Yaml::parseFile($setFile)['name'] ?? '') === $setName) {
                return true;
            }
        }
        return false;
    }

    private function importOptionalData(string $extensionKey): void
    {
        $registryKey = 'optionalData:' . $extensionKey;
        if ($this->registry->get(self::REGISTRY_NAMESPACE, $registryKey)) {
            return;
        }
        $file = ExtensionManagementUtility::extPath(self::EXTENSION_KEY) . self::OPTIONAL_EXTENSIONS[$extensionKey]['data'];
        if (!is_file($file)) {
            return;
        }
        $statements = $this->sqlReader->getStatementArray((string)file_get_contents($file));
        $result = $this->schemaMigrator->importStaticData($statements, false);
        foreach (array_filter($result) as $error) {
            $this->logger->warning('corporate_template: demo data for ' . $extensionKey . ' not fully imported: ' . $error);
        }
        $this->registry->set(self::REGISTRY_NAMESPACE, $registryKey, 1);
    }
}
