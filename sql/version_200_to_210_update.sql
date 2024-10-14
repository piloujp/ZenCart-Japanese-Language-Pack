Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);

#住所フォーマット
SELECT (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%') INTO @Formid;
REPLACE INTO address_format (address_format_id, address_format, address_summary) VALUES (@formid, '〒$postcode$cr$state$city$streets$cr$lastname $firstname 様', '$city $country');
UPDATE countries SET address_format_id = @Formid WHERE countries_id = @japan_id;

#NEXT_X_ROWS_AS_ONE_COMMAND:3
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.1.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '1.0210', project_version_comment = 'Manual version update with Japanese Pack v2.1.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
