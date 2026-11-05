-- Demo records of the corporate template for EXT:powermail
-- Imported automatically when the extension is installed (see InitializeDemoSite).

INSERT INTO tx_powermail_domain_model_form (uid, pid, tstamp, crdate, deleted, hidden, starttime, endtime, sys_language_uid, l10n_parent, title, note, css, pages, is_dummy_record) VALUES
(1, 1, 1548062363, 1548062150, 0, 0, 0, 0, 0, 0, 'Contact Form', 0, 'nolabel', '1', 0);

INSERT INTO tx_powermail_domain_model_page (uid, pid, tstamp, crdate, deleted, hidden, starttime, endtime, sorting, sys_language_uid, l10n_parent, title, css, fields, form) VALUES
(1, 1, 1548062386, 1548062150, 0, 0, 0, 0, 1, 0, 0, 'Contact', 'nolabel', 4, 1);

INSERT INTO tx_powermail_domain_model_field (uid, pid, tstamp, crdate, deleted, hidden, starttime, endtime, sorting, sys_language_uid, l10n_parent, title, type, settings, path, content_element, text, prefill_value, placeholder, create_from_typoscript, validation, validation_configuration, css, description, multiselect, datepicker_settings, feuser_value, sender_email, sender_name, mandatory, own_marker_select, marker, auto_marker, page) VALUES
(1, 1, 1548062386, 1548062150, 0, 0, 0, 0, 1, 0, 0, 'FULL NAME', 'input', '', '', 0, '', 'FULL NAME', '', '', 0, '', 'nolabel', '', 0, '', '', 0, 1, 0, 1, 'fullname', 0, 1),
(2, 1, 1548062386, 1548062195, 0, 0, 0, 0, 2, 0, 0, 'YOUR EMAIL', 'input', '', '', 0, '', 'YOUR EMAIL', '', '', 1, '', 'nolabel', '', 0, '', '', 1, 0, 1, 0, 'youremail', 0, 1),
(3, 1, 1548062386, 1548062254, 0, 0, 0, 0, 3, 0, 0, 'TYPE MESSAGE', 'textarea', '', '', 0, '', 'TYPE MESSAGE', '', '', 0, '', 'nolabel', '', 0, '', '', 0, 0, 0, 0, 'typemessage', 0, 1),
(4, 1, 1548062386, 1548062363, 0, 0, 0, 0, 4, 0, 0, 'SEND MESSAGE', 'submit', '', '', 0, '', '', '', '', 0, '', 'nolabel', '', 0, '', '', 0, 0, 0, 0, 'sendmessage', 0, 1);
