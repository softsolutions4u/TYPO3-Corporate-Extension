<?php

defined('TYPO3') or die();

// Page TSconfig for installations which do not use the site set
// "corporate-template/site" (the set ships the same page TSconfig).
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'corporate_template',
    'Configuration/TsConfig/Page/All.tsconfig',
    'Corporate Template'
);
