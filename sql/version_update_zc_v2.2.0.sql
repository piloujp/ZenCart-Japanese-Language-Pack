# if POSM is installed
Set @lan_id = (SELECT languages_id FROM languages WHERE code = 'ja');
SET @tbl_posm_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'products_options_stock_names');
SET @sql_posm = IF(@tbl_posm_exists = 0,'SELECT 1','UPDATE IGNORE products_options_stock_names SET pos_name="バックオーダー" WHERE language_id=@lan_id AND pos_name_id=1');
PREPARE stmt_posm FROM @sql_posm;
EXECUTE stmt_posm;
DEALLOCATE PREPARE stmt_posm;

# Japan address format update
Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
SET @Formid = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1);
REPLACE INTO address_format (address_format_id, address_format, address_summary) VALUES (@formid, '〒$postcode$cr$state$city$streets$cr$lastname$firstname$salutation', '〒$postcode$state$city');
UPDATE countries SET address_format_id = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1) WHERE countries_id = @japan_id;

# Japan Tax description update
SET @JapanTaxRateID = (SELECT tax_rates_id FROM tax_rates tr INNER JOIN tax_class tc ON tr.tax_class_id = tc.tax_class_id WHERE tc.tax_class_title = '消費税' LIMIT 1);
UPDATE tax_rates_description SET tax_description='Japan Sale Tax: 10%' WHERE language_id = 1 AND tax_rates_id = @JapanTaxRateID;
UPDATE tax_rates_description SET tax_description='（内消費税：１０％）' WHERE language_id = @lan_id AND tax_rates_id = @JapanTaxRateID;


# Update version history
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '2.0210', project_version_comment = 'Manual version update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
