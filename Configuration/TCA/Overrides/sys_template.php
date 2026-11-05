<?php

defined('TYPO3') or die();

// Static TypoScript for installations which use a sys_template record instead
// of the site set "corporate-template/site".
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'corporate_template',
    'Configuration/TypoScript',
    'Corporate Template'
);
