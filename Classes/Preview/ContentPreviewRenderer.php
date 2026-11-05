<?php

declare(strict_types=1);

namespace CorporateTemplate\CorporateTemplate\Preview;

use TYPO3\CMS\Backend\Preview\StandardContentPreviewRenderer;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\WorkspaceRestriction;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Resource\FileRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;

/**
 * Page module preview for the "corporatetemplate_*" content elements.
 *
 * Replaces the TYPO3 v9 "tt_content_drawItem" hook (PageLayoutView), which no
 * longer exists. Renders EXT:corporate_template/Resources/Private/Backend/Templates/Content/<Name>.html
 * with the record row, its inline child records (recursively) and file references.
 */
class ContentPreviewRenderer extends StandardContentPreviewRenderer
{
    private const MAX_DEPTH = 3;

    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        // TYPO3 v14 provides getRow(), TYPO3 v13 returns the row array from getRecord()
        $row = method_exists($item, 'getRow') ? $item->getRow() : $item->getRecord();
        if (!is_array($row) || !str_starts_with((string)($row['CType'] ?? ''), 'corporatetemplate_')) {
            return parent::renderPageModulePreviewContent($item);
        }

        $templateName = ucfirst(substr((string)$row['CType'], strlen('corporatetemplate_')));
        $viewFactory = GeneralUtility::makeInstance(ViewFactoryInterface::class);
        $view = $viewFactory->create(new ViewFactoryData(
            templateRootPaths: ['EXT:corporate_template/Resources/Private/Backend/Templates/Content/'],
            partialRootPaths: ['EXT:corporate_template/Resources/Private/Backend/Partials/'],
            layoutRootPaths: ['EXT:corporate_template/Resources/Private/Backend/Layouts/'],
            request: $item->getContext()->getCurrentRequest(),
        ));
        $view->assignMultiple([
            'row' => $row,
            'processedRow' => $this->resolveRelations('tt_content', $row, 0),
        ]);

        try {
            return $view->render($templateName);
        } catch (\Throwable $e) {
            return '<span class="badge badge-danger">' . htmlspecialchars($e->getMessage()) . '</span>';
        }
    }

    /**
     * Adds inline children (custom tables) and file references to a record row.
     */
    private function resolveRelations(string $table, array $row, int $depth): array
    {
        $columns = $GLOBALS['TCA'][$table]['columns'] ?? [];
        foreach ($columns as $field => $column) {
            if (!str_starts_with($field, 'tx_corporatetemplate_')) {
                continue;
            }
            $config = $column['config'] ?? [];
            $type = $config['type'] ?? '';
            if ($type === 'file') {
                $row[$field] = $this->getFiles($table, $field, (int)($row['uid'] ?? 0));
            } elseif ($type === 'inline' && $depth < self::MAX_DEPTH) {
                $children = [];
                foreach ($this->getChildren((string)$config['foreign_table'], $table, (int)($row['uid'] ?? 0)) as $child) {
                    $children[] = $this->resolveRelations((string)$config['foreign_table'], $child, $depth + 1);
                }
                $row[$field] = $children;
            }
        }
        return $row;
    }

    private function getChildren(string $childTable, string $parentTable, int $parentUid): array
    {
        if ($parentUid <= 0) {
            return [];
        }
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($childTable);
        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add(GeneralUtility::makeInstance(DeletedRestriction::class))
            ->add(GeneralUtility::makeInstance(WorkspaceRestriction::class, $this->getWorkspaceId()));
        return $queryBuilder
            ->select('*')
            ->from($childTable)
            ->where(
                $queryBuilder->expr()->eq('parentid', $queryBuilder->createNamedParameter($parentUid, Connection::PARAM_INT)),
                $queryBuilder->expr()->or(
                    $queryBuilder->expr()->eq('parenttable', $queryBuilder->createNamedParameter($parentTable)),
                    $queryBuilder->expr()->eq('parenttable', $queryBuilder->createNamedParameter(''))
                )
            )
            ->orderBy('sorting')
            ->executeQuery()
            ->fetchAllAssociative();
    }

    /**
     * @return FileReference[]
     */
    private function getFiles(string $table, string $field, int $uid): array
    {
        if ($uid <= 0) {
            return [];
        }
        try {
            return GeneralUtility::makeInstance(FileRepository::class)->findByRelation($table, $field, $uid);
        } catch (\Throwable) {
            return [];
        }
    }

    private function getWorkspaceId(): int
    {
        return (int)GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('workspace', 'id', 0);
    }
}
