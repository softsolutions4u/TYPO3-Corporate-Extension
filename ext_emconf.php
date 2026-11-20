<?php

/**
 * Extension Manager/Repository config file for ext "corporate_template".
 * Only used in classic (non-composer) installations.
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Corporate - Business responsive template',
    'description' => 'Corporate - One page responsive business template for TYPO3 13 LTS and 14 LTS, This release supports TYPO3 9.5 LTS and is no longer actively maintained. The new version for TYPO3 13.4 will be released next week. Stay tuned! Need help upgrading or migrating? Write to us at typo3support@softsolutions4u.com.', 
    'category' => 'distribution',
    'constraints' => [
        'depends' => [
            'php' => '8.2.0-8.5.99',
            'typo3' => '13.4.0-14.3.99',
            'fluid_styled_content' => '13.4.0-14.3.99',
            'rte_ckeditor' => '13.4.0-14.3.99',
        ],
        'conflicts' => [],
        'suggests' => [
            'powermail' => '13.3.0-0.0.0',
            'go_maps_ext' => '8.1.0-0.0.0',
            'cs_seo' => '9.0.0-0.0.0',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'CorporateTemplate\\CorporateTemplate\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'author' => 'Sharmistha',
    'author_email' => 'sharmistha@softsolutions4u.com',
    'author_company' => 'Soft Solutions4U',
    'version' => '3.0.0',
];
