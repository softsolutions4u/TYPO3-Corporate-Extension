<?php

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems',
        'label' => 'tx_corporatetemplate_fulltitleitem',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'iconfile' => 'EXT:corporate_template/Resources/Public/Icons/Extension.png',
        'hideTable' => true,
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        1 => [
            'showitem' => '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, tx_corporatetemplate_fulltitleitem, tx_corporatetemplate_shorttitleitem, tx_corporatetemplate_descriptionitem, tx_corporatetemplate_categoriesitem, tx_corporatetemplate_tagsitem, tx_corporatetemplate_thumbnailimage, tx_corporatetemplate_imagesitem, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, --palette--;;access',
        ],
    ],
    'palettes' => [
        'language' => [
            'showitem' => 'sys_language_uid, l10n_parent',
        ],
        'access' => [
            'showitem' => 'starttime, endtime',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_corporatetemplate_portfolioitems',
                'foreign_table_where' => 'AND {#tx_corporatetemplate_portfolioitems}.{#pid}=###CURRENT_PID### AND {#tx_corporatetemplate_portfolioitems}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => 2145916800,
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'parentid' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'parenttable' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tx_corporatetemplate_fulltitleitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_fulltitleitem',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_shorttitleitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_shorttitleitem',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_descriptionitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_descriptionitem',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 10,
                'enableRichtext' => true,
                'richtextConfiguration' => 'corporate_template',
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_categoriesitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_categoriesitem',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_categoriesitem',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'foreign_sortby' => 'sorting',
                'appearance' => [
                    'collapseAll' => true,
                    'levelLinksPosition' => 'top',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'dragdrop' => true,
                    ],
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'tx_corporatetemplate_tagsitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_tagsitem',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_thumbnailimage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_thumbnailimage',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
        'tx_corporatetemplate_imagesitem' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_portfolioitems.tx_corporatetemplate_imagesitem',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
    ],
];
