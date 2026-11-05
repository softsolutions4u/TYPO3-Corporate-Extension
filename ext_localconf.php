<?php

defined('TYPO3') or die();

// RTE (CKEditor 5) preset "corporate_template", activated via page TSconfig RTE.default.preset
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['corporate_template'] = 'EXT:corporate_template/Configuration/RTE/Default.yaml';

// The demo site contains a contact form (EXT:powermail) and a map (EXT:go_maps_ext).
// As long as these optional extensions are not installed, their content elements
// render nothing instead of the "no rendering definition" error of fluid_styled_content.
(static function (): void {
    $optionalPlugins = [
        'powermail' => 'powermail_pi1',
        'go_maps_ext' => 'gomapsext_show',
    ];
    foreach ($optionalPlugins as $extensionKey => $cType) {
        if (!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded($extensionKey)) {
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
                'corporate_template',
                'setup',
                'tt_content.' . $cType . ' = TEXT' . LF . 'tt_content.' . $cType . '.value =',
                'defaultContentRendering'
            );
        }
    }
})();
