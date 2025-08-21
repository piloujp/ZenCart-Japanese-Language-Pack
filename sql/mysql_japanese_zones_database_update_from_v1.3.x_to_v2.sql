TRUNCATE TABLE whos_online;
TRUNCATE TABLE db_cache;

Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
Set @default_lang = (SELECT languages_id FROM languages WHERE code = (SELECT configuration_value FROM configuration WHERE configuration_key = 'DEFAULT_LANGUAGE'));

# Backing up old zones ids.
# Create a temporary table with old zones ids
CREATE TABLE japan_zones (PRIMARY KEY (zone_id)) as SELECT zone_id, zone_code, zone_name FROM zones WHERE zone_country_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
# Change kanji names to romaji
UPDATE japan_zones jz JOIN japan_zones js ON jz.zone_code = js.zone_code AND js.zone_name REGEXP '[a-z0-9]' SET jz.zone_name = js.zone_name WHERE jz.zone_name NOT REGEXP '[a-z0-9]';

# Delete old Japanese zones
DELETE FROM zones WHERE zone_country_id = @japan_id;

# Updating zones...
#地域設定
# Japan zones
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'北海道','Hokkaido');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'青森県','Aomori');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'岩手県','Iwate');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'宮城県','Miyagi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'秋田県','Akita');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'山形県','Yamagata');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'福島県','Fukushima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'茨城県','Ibaraki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'栃木県','Tochigi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'群馬県','Gunma');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'埼玉県','Saitama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'千葉県','Chiba');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'東京都','Tokyo');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'神奈川県','Kanagawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'新潟県','Niigata');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'富山県','Toyama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'石川県','Ishikawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'福井県','Fukui');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'山梨県','Yamanashi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'長野県','Nagano');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'岐阜県','Gifu');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'静岡県','Shizuoka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'愛知県','Aichi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'三重県','Mie');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'滋賀県','Shiga');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'京都府','Kyoto');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'大阪府','Osaka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'兵庫県','Hyogo');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'奈良県','Nara');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'和歌山県','Wakayama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'鳥取県','Tottori');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'島根県','Shimane');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'岡山県','Okayama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'広島県','Hiroshima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'山口県','Yamaguchi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'徳島県','Tokushima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'香川県','Kagawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'愛媛県','Ehime');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'高知県','Kochi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'福岡県','Fukuoka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'佐賀県','Saga');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'長崎県','Nagasaki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'熊本県','Kumamoto');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'大分県','Oita');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'宮崎県','Miyazaki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'鹿児島県','Kagoshima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (@japan_id,'沖縄県','Okinawa');

# Update address book and zones to geo zones tables with new zones ids
UPDATE address_book a JOIN japan_zones jz ON a.entry_zone_id = jz.zone_id AND a.entry_country_id = @japan_id JOIN zones z ON z.zone_name = jz.zone_name SET a.entry_zone_id = z.zone_id;
UPDATE zones_to_geo_zones gz JOIN japan_zones jz ON gz.zone_id = jz.zone_id AND gz.zone_country_id = @japan_id JOIN zones z ON z.zone_name = jz.zone_name SET gz.zone_id = z.zone_id;

# Update store zone
UPDATE configuration cf JOIN japan_zones jz ON cf.configuration_value = jz.zone_id JOIN zones z ON z.zone_name = jz.zone_name SET cf.configuration_value = z.zone_id WHERE configuration_key = 'STORE_ZONE';

# Delete temporary table
DROP TABLE japan_zones;

# Updating admin configuration...
#単位を kg と cm に設定します
UPDATE configuration SET configuration_value = 'kgs' WHERE configuration_key = 'SHIPPING_WEIGHT_UNITS';
UPDATE configuration SET configuration_value = 'centimeters' WHERE configuration_key = 'SHIPPING_DIMENSION_UNITS';

#住所フォーマット
SET @Formid = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1);
REPLACE INTO address_format (address_format_id, address_format, address_summary) VALUES (@formid, '〒$postcode$cr$state$city$streets$cr$lastname $firstname 様', '$city $country');
UPDATE countries SET address_format_id = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1) WHERE countries_id = @japan_id;

# if POSM is installed
Set @lan_id = (SELECT languages_id FROM languages WHERE code = 'ja');
SET @tbl_posm_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'products_options_stock_names');
SET @sql_posm = IF(@tbl_posm_exists = 0,'SELECT 1','UPDATE IGNORE products_options_stock_names SET pos_name="バックオーダー" WHERE language_id=@lan_id AND pos_name_id=1');
PREPARE stmt_posm FROM @sql_posm;
EXECUTE stmt_posm;
DEALLOCATE PREPARE stmt_posm;


#### VERSION UPDATE STATEMENTS
## THE FOLLOWING 2 SECTIONS SHOULD BE THE "LAST" ITEMS IN THE FILE, so that if the upgrade fails prematurely, the version info is not updated.
##The following updates the version HISTORY to store the prior version info (Essentially "moves" the prior version info from the "project_version" to "project_version_history" table
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '2.0210', project_version_comment = 'Manual version update with Japanese Pack v2.2.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
