<?php

defined('TYPO3') or die();

use CorporateTemplate\CorporateTemplate\Preview\ContentPreviewRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

(static function (): void {
    $ll = 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db.xlf:';
    $llWizard = 'LLL:EXT:corporate_template/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.';

    // Additional tt_content fields used by the corporate template content elements
    ExtensionManagementUtility::addTCAcolumns('tt_content', [
        'tx_corporatetemplate_bannerbutton' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_bannerbutton',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_bannerimagesbox' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_bannerimagesbox',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_bannerimagesbox',
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
        'tx_corporatetemplate_bannersubtitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_bannersubtitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_bannertitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_bannertitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_bannertitlesbox' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_bannertitlesbox',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_bannertitlesbox',
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
        'tx_corporatetemplate_businesscard' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_businesscard',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_businesscard',
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
        'tx_corporatetemplate_categoriesbox' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_categoriesbox',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_categoriesbox',
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
        'tx_corporatetemplate_clientsboxmain' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_clientsboxmain',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_clientsboxmain',
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
        'tx_corporatetemplate_clientstitleone' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_clientstitleone',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_clientstitletwo' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_clientstitletwo',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contactheadertextbottom' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contactheadertextbottom',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contactheadertexttop' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contactheadertexttop',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contactheadertitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contactheadertitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitlebottom' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitlebottom',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitlehoursone' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitlehoursone',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitlehourstwo' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitlehourstwo',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitleone' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitleone',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitletop' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitletop',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_contacttitletwo' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_contacttitletwo',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_logo' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_logo',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
        'tx_corporatetemplate_logotext' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_logotext',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_portfolioitems' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_portfolioitems',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_portfolioitems',
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
        'tx_corporatetemplate_portfoliosubtitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_portfoliosubtitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_portfoliotitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_portfoliotitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row1hoursleft' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row1hoursleft',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row1hoursright' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row1hoursright',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row1left' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row1left',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row1right' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row1right',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row2hoursleft' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row2hoursleft',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row2hoursright' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row2hoursright',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row2left' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row2left',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row2right' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row2right',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row3hoursleft' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row3hoursleft',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row3hoursright' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row3hoursright',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row3left' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row3left',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_row3right' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_row3right',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_servicebox' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_servicebox',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_servicebox',
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
        'tx_corporatetemplate_servicestitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_servicestitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_servicetexttop' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_servicetexttop',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_skillnamebox' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_skillnamebox',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_corporatetemplate_skillnamebox',
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
        'tx_corporatetemplate_teamsubtitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_teamsubtitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'tx_corporatetemplate_teamtitle' => [
            'exclude' => true,
            'label' => $ll . 'tt_content.tx_corporatetemplate_teamtitle',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
    ]);

    // Own group in the CType select box and in the new content element wizard
    ExtensionManagementUtility::addTcaSelectItemGroup('tt_content', 'CType', 'corporatetemplate', $ll . 'tt_content.CType.div._corporatetemplate_', 'after:default');

    $elements = [
        'corporatetemplate_bannerslider' => [
            'icon' => 'content-carousel-image',
            'wizardKey' => 'bannerslider',
            'fields' => 'tx_corporatetemplate_bannertitle, tx_corporatetemplate_bannersubtitle, tx_corporatetemplate_bannertitlesbox, tx_corporatetemplate_bannerbutton, tx_corporatetemplate_bannerimagesbox',
        ],
        'corporatetemplate_clientsbox' => [
            'icon' => 'content-quote',
            'wizardKey' => 'clientsbox',
            'fields' => 'tx_corporatetemplate_clientstitleone, tx_corporatetemplate_clientstitletwo, tx_corporatetemplate_clientsboxmain',
        ],
        'corporatetemplate_contactbox' => [
            'icon' => 'content-elements-mailform',
            'wizardKey' => 'contactbox',
            'fields' => 'tx_corporatetemplate_contacttitleone, tx_corporatetemplate_contacttitletwo, tx_corporatetemplate_row1left, tx_corporatetemplate_row1right, tx_corporatetemplate_row2left, tx_corporatetemplate_row2right, tx_corporatetemplate_row3left, tx_corporatetemplate_row3right',
        ],
        'corporatetemplate_contactheadbox' => [
            'icon' => 'content-header',
            'wizardKey' => 'contactheadbox',
            'fields' => 'tx_corporatetemplate_contactheadertitle, tx_corporatetemplate_contactheadertexttop, tx_corporatetemplate_contactheadertextbottom',
        ],
        'corporatetemplate_contacthours' => [
            'icon' => 'content-text',
            'wizardKey' => 'contacthours',
            'fields' => 'tx_corporatetemplate_contacttitlehoursone, tx_corporatetemplate_contacttitlehourstwo, tx_corporatetemplate_row1hoursleft, tx_corporatetemplate_row1hoursright, tx_corporatetemplate_row2hoursleft, tx_corporatetemplate_row2hoursright, tx_corporatetemplate_row3hoursleft, tx_corporatetemplate_row3hoursright',
        ],
        'corporatetemplate_homelogo' => [
            'icon' => 'content-image',
            'wizardKey' => 'homelogo',
            'fields' => 'tx_corporatetemplate_logo, tx_corporatetemplate_logotext',
        ],
        'corporatetemplate_ourteambox' => [
            'icon' => 'content-carousel-item-textandimage',
            'wizardKey' => 'ourteambox',
            'fields' => 'tx_corporatetemplate_teamtitle, tx_corporatetemplate_teamsubtitle, tx_corporatetemplate_businesscard',
        ],
        'corporatetemplate_portfoliobox' => [
            'icon' => 'content-textmedia',
            'wizardKey' => 'portfoliobox',
            'fields' => 'tx_corporatetemplate_portfoliotitle, tx_corporatetemplate_portfoliosubtitle, tx_corporatetemplate_categoriesbox, tx_corporatetemplate_portfolioitems',
        ],
        'corporatetemplate_servicesheaderbox' => [
            'icon' => 'content-menu-card',
            'wizardKey' => 'servicesheaderbox',
            'fields' => 'tx_corporatetemplate_servicestitle, tx_corporatetemplate_servicetexttop, tx_corporatetemplate_servicebox',
        ],
        'corporatetemplate_skillsbox' => [
            'icon' => 'content-bullets',
            'wizardKey' => 'skillsbox',
            'fields' => 'tx_corporatetemplate_contacttitletop, tx_corporatetemplate_contacttitlebottom, tx_corporatetemplate_skillnamebox',
        ],
    ];

    $showItemTemplate = '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, --palette--;;general, %s, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance, --palette--;;frames, --palette--;;appearanceLinks, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, --palette--;;hidden, --palette--;;access, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes, rowDescription, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended';

    foreach ($elements as $cType => $element) {
        ExtensionManagementUtility::addTcaSelectItem('tt_content', 'CType', [
            'label' => $ll . 'tt_content.CType.' . $cType,
            'description' => $llWizard . $element['wizardKey'] . '_description',
            'value' => $cType,
            'icon' => $element['icon'],
            'group' => 'corporatetemplate',
        ]);
        $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$cType] = $element['icon'];
        $GLOBALS['TCA']['tt_content']['types'][$cType] = [
            'showitem' => sprintf($showItemTemplate, $element['fields']),
            'previewRenderer' => ContentPreviewRenderer::class,
        ];
    }
})();
