<?php

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain',
        'label' => 'tx_corporatetemplate_client1img',
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
            'showitem' => '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, tx_corporatetemplate_client1img, tx_corporatetemplate_client1name, tx_corporatetemplate_client1position, tx_corporatetemplate_client1comment, tx_corporatetemplate_client2img, tx_corporatetemplate_client2name, tx_corporatetemplate_client2position, tx_corporatetemplate_client2comment, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, --palette--;;access',
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
                'foreign_table' => 'tx_corporatetemplate_clientsboxmain',
                'foreign_table_where' => 'AND {#tx_corporatetemplate_clientsboxmain}.{#pid}=###CURRENT_PID### AND {#tx_corporatetemplate_clientsboxmain}.{#sys_language_uid} IN (-1,0)',
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
        'tx_corporatetemplate_client1img' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client1img',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
        'tx_corporatetemplate_client1name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client1name',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_client1position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client1position',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_client1comment' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client1comment',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_client2img' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client2img',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
        'tx_corporatetemplate_client2name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client2name',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_client2position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client2position',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'searchable' => true,
            ],
        ],
        'tx_corporatetemplate_client2comment' => [
            'exclude' => true,
            'label' => 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:tx_corporatetemplate_clientsboxmain.tx_corporatetemplate_client2comment',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'searchable' => true,
            ],
        ],
    ],
];
