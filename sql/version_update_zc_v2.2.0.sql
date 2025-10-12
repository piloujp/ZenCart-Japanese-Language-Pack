# if POSM is installed
Set @lan_id = (SELECT languages_id FROM languages WHERE code = 'ja');
SET @tbl_posm_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'products_options_stock_names');
SET @sql_posm = IF(@tbl_posm_exists = 0,'SELECT 1','UPDATE IGNORE products_options_stock_names SET pos_name="バックオーダー" WHERE language_id=@lan_id AND pos_name_id=1');
PREPARE stmt_posm FROM @sql_posm;
EXECUTE stmt_posm;
DEALLOCATE PREPARE stmt_posm;

Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
UPDATE address_format SET address_format = '〒$postcode$cr$state$city$streets$cr$lastname$firstname$salutation', address_summary = '〒$postcode$state$city' WHERE countries_id = @japan_id;


# Update version history
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '2.0210', project_version_comment = 'Manual version update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
