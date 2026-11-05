-- Database schema of EXT:corporate_template (TYPO3 13.4 / 14.3)
--
-- Since TYPO3 v13 all columns defined in TCA (system fields like uid, pid,
-- tstamp, hidden, sys_language_uid, t3ver_* and all custom fields of type
-- input/text/inline/file/link) are created automatically by the core.
-- Only fields which are not configured in TCA ("passthrough" relation
-- fields of the inline children) need to be defined here.

CREATE TABLE tx_corporatetemplate_bannerimagesbox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_bannertitlesbox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_businesscard (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_categoriesbox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_categoriesitem (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_clientsboxmain (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_portfolioitems (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_servicebox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_servicessubnamesbox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);

CREATE TABLE tx_corporatetemplate_skillnamebox (
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,

    KEY parent_record (parentid,parenttable)
);
