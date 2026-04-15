#
# * This SQL script upgrades the Zen Cart database structure from v2.2.0 to Japanese Language Pack database v2.1.0
# *
# * @access private
# * @copyright Copyright 2003-2026 Zen Cart Development Team
# * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
# * @version $Id: pilou2/piloujp 2026 Mar 20 Modified in v2.2.1 $
#

#PROGRESS_FEEDBACK:!TEXT=Purging caches ...
# Clear out active customer sessions. Truncating helps the database clean up behind itself.
TRUNCATE TABLE whos_online;
TRUNCATE TABLE db_cache;

Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
Set @default_lang = (SELECT languages_id FROM languages WHERE code = (SELECT configuration_value FROM configuration WHERE configuration_key = 'DEFAULT_LANGUAGE'));

#PROGRESS_FEEDBACK:!TEXT=Backing up old zones ids.
# Create a temporary table with old zones ids
CREATE TABLE japan_zones (PRIMARY KEY (zone_id)) as SELECT zone_id, zone_code, zone_name FROM zones WHERE zone_country_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
# Change kanji names to romaji
UPDATE japan_zones jz JOIN japan_zones js ON jz.zone_code = js.zone_code AND js.zone_name REGEXP '[a-z0-9]' SET jz.zone_name = js.zone_name WHERE jz.zone_name NOT REGEXP '[a-z0-9]';

# Delete old Japanese zones
DELETE FROM zones WHERE zone_country_id = @japan_id;

#PROGRESS_FEEDBACK:!TEXT=Updating zones...
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

#PROGRESS_FEEDBACK:!TEXT=Updating database for kana entries...
# カナを追加する
ALTER TABLE address_book ADD COLUMN entry_firstname_kana     varchar(32) NULL;
ALTER TABLE address_book ADD COLUMN entry_lastname_kana      varchar(32) NULL;
ALTER TABLE customers    ADD COLUMN customers_firstname_kana varchar(32) NOT NULL default '';
ALTER TABLE customers    ADD COLUMN customers_lastname_kana  varchar(32) NOT NULL default '';
ALTER TABLE orders       ADD COLUMN customers_name_kana      varchar(64) NULL;
ALTER TABLE orders       ADD COLUMN delivery_name_kana       varchar(64) NULL;
ALTER TABLE orders       ADD COLUMN billing_name_kana        varchar(64) NULL;

#PROGRESS_FEEDBACK:!TEXT=Updating invoice related data...
# 住所に電話番号を追加、個人情報側からは電話番号削除
ALTER TABLE address_book ADD COLUMN entry_telephone varchar(32) NULL;
ALTER TABLE address_book ADD COLUMN entry_fax varchar(32) NULL;
ALTER TABLE orders ADD COLUMN delivery_telephone varchar(32) NULL;
ALTER TABLE orders ADD COLUMN delivery_fax varchar(32) NULL;
ALTER TABLE orders ADD COLUMN billing_telephone varchar(32) NULL;
ALTER TABLE orders ADD COLUMN billing_fax varchar(32) NULL;
ALTER TABLE orders ADD COLUMN customers_fax varchar(32) NULL;

#送信モヂュール用
ALTER TABLE orders ADD COLUMN delivery_timespec     varchar(32) default null;

#注文ステータス
SET @last_status_id = (SELECT orders_status_id FROM orders_status WHERE language_id = '1' ORDER BY orders_status_id DESC LIMIT 1) + 1;
INSERT IGNORE INTO orders_status (orders_status_id, language_id, orders_status_name, orders_status_color_code, sort_order) VALUES (@last_status_id, '1', 'Sent', '#004040', 15);

#PROGRESS_FEEDBACK:!TEXT=Updating address related data...
#住所フォーマット
SET @Formid = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1);
REPLACE INTO address_format (address_format_id, address_format, address_summary) VALUES (@formid, '〒$postcode$cr$state$city$streets$cr$lastname$firstname$salutation', '〒$postcode$state$city');
UPDATE countries SET address_format_id = (SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%' ORDER BY address_format_id DESC LIMIT 1) WHERE countries_id = @japan_id;

#PROGRESS_FEEDBACK:!TEXT=Updating admin configuration...
#単位を kg と cm に設定します
UPDATE configuration SET configuration_value = 'kgs' WHERE configuration_key = 'SHIPPING_WEIGHT_UNITS';
UPDATE configuration SET configuration_value = 'centimeters' WHERE configuration_key = 'SHIPPING_DIMENSION_UNITS';

#言語設定
UPDATE layout_boxes SET layout_box_status=1, layout_box_sort_order=0 WHERE layout_box_name = 'languages.php';

#通貨設定
INSERT INTO currencies (title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated) VALUES ('Japanese Yen','JPY','￥','','.',',','0','1.000000', now());


# 税金・税率設定
INSERT INTO tax_class (tax_class_title, tax_class_description, last_modified, date_added) VALUES ('消費税', '消費税（日本）', now(), now());
INSERT INTO geo_zones (geo_zone_name, geo_zone_description, last_modified, date_added) VALUES ('日本', '日本（消費税）', now(), now());
INSERT INTO zones_to_geo_zones (zone_country_id, geo_zone_id, last_modified, date_added) SELECT @japan_id, geo_zone_id, now(), now() FROM geo_zones WHERE geo_zone_name = '日本';
SET @taxdescription = 'Japan Sale Tax: 10%' COLLATE utf8mb4_general_ci;
INSERT INTO tax_rates (tax_zone_id, tax_class_id, tax_priority, tax_rate, last_modified, date_added) SELECT ztg.association_id, tc.tax_class_id, '1', '10.0', now(), now()
FROM tax_class tc, zones_to_geo_zones ztg INNER JOIN geo_zones gz ON ztg.geo_zone_id = gz.geo_zone_id WHERE tc.tax_class_title = '消費税' AND gz.geo_zone_name ='日本';
INSERT INTO tax_rates_description (tax_rates_id, language_id, tax_description) VALUES (LAST_INSERT_ID(), @default_lang, @taxdescription);

#PROGRESS_FEEDBACK:!TEXT=Updating admin configuration
#一般設定
UPDATE configuration SET configuration_value = '&pound;,£:&euro;,€:&yen;,￥:&reg;,®:&trade;,™', last_modified = now() WHERE configuration_key = 'CURRENCIES_TRANSLATIONS';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_value = 'false', last_modified = now() WHERE configuration_key = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_value = @japan_id, last_modified = now() WHERE configuration_key = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN';

#PROGRESS_FEEDBACK:!TEXT=Adding Japanese Language
#日本語を設定
INSERT IGNORE INTO languages (name, code, image, directory, sort_order) VALUES ('Japanese', 'ja', 'icon.gif', 'japanese', '1');

Set @lan_id = (SELECT languages_id FROM languages WHERE code = 'ja');

INSERT IGNORE INTO categories_description (categories_id, language_id, categories_name, categories_description) SELECT categories_id, @lan_id, categories_name, categories_description FROM categories_description WHERE language_id = @default_lang;
INSERT IGNORE INTO products_description (products_id, language_id, products_name, products_description, products_url) SELECT products_id, @lan_id, products_name, products_description, products_url FROM products_description WHERE language_id = @default_lang;
INSERT IGNORE INTO meta_tags_products_description (products_id, language_id, metatags_title, metatags_keywords, metatags_description) SELECT products_id, @lan_id, metatags_title, metatags_keywords, metatags_description FROM meta_tags_products_description WHERE language_id = @default_lang;
INSERT IGNORE INTO meta_tags_categories_description (categories_id, language_id, metatags_title, metatags_keywords, metatags_description) SELECT categories_id, @lan_id, metatags_title, metatags_keywords, metatags_description FROM meta_tags_categories_description WHERE language_id = @default_lang;
INSERT IGNORE INTO products_options (products_options_id, language_id, products_options_name, products_options_sort_order, products_options_type, products_options_length, products_options_comment, products_options_size, products_options_images_per_row, products_options_images_style) SELECT products_options_id, @lan_id, products_options_name, products_options_sort_order, products_options_type, products_options_length, products_options_comment, products_options_size, products_options_images_per_row, products_options_images_style FROM products_options WHERE language_id = @default_lang;
INSERT IGNORE INTO products_options_values (products_options_values_id, language_id, products_options_values_name, products_options_values_sort_order) SELECT products_options_values_id, @lan_id, products_options_values_name, products_options_values_sort_order FROM products_options_values WHERE language_id = @default_lang;
INSERT IGNORE INTO manufacturers_info (manufacturers_id, languages_id, manufacturers_url) SELECT manufacturers_id, @lan_id, manufacturers_url FROM manufacturers_info WHERE languages_id = @default_lang;
INSERT IGNORE INTO orders_status (orders_status_id, language_id, orders_status_name, orders_status_color_code, sort_order) SELECT orders_status_id, @lan_id, orders_status_name, orders_status_color_code, sort_order FROM orders_status WHERE language_id = @default_lang;
INSERT IGNORE INTO coupons_description (coupon_id, language_id, coupon_name, coupon_description) SELECT coupon_id, @lan_id, coupon_name, coupon_description FROM coupons_description WHERE language_id = @default_lang;
INSERT IGNORE INTO ezpages_content (pages_id, languages_id, pages_title, pages_html_text) SELECT pages_id, @lan_id, pages_title, pages_html_text FROM ezpages_content WHERE languages_id = @default_lang;

# For backward compatibility with ZC version < 2.2.0
SET @tbl_tax_rate_desc_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'tax_rates_description');
SET @sql_trd = IF(@tbl_tax_rate_desc_exists = 0,'SELECT 1','INSERT IGNORE INTO tax_rates_description (tax_rates_id, language_id, tax_description) SELECT tax_rates_id, @lan_id, tax_description FROM tax_rates_description WHERE language_id = @default_lang;');
PREPARE stmt FROM @sql_trd;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

# Add table for POSM plugin if not already installed
CREATE TABLE IF NOT EXISTS products_options_stock_names (
            pos_name_id int NOT NULL default 0,
            language_id int NOT NULL default 1,
            pos_name varchar(64) NOT NULL default '',
            PRIMARY KEY (pos_name_id, language_id)
        ) ENGINE=MyISAM;
INSERT IGNORE INTO products_options_stock_names (pos_name_id, language_id, pos_name) VALUE (1, @default_lang, 'Back-ordered');
INSERT INTO products_options_stock_names (pos_name_id, language_id, pos_name) VALUE (1, @lan_id, 'バックオーダー') ON DUPLICATE KEY UPDATE pos_name='バックオーダー';

# Translation for Order Status and Tax description
UPDATE orders_status SET orders_status_name='処理待ち', sort_order=0 WHERE language_id=@lan_id AND orders_status_name='Pending';
UPDATE orders_status SET orders_status_name='処理中', sort_order=10 WHERE language_id=@lan_id AND orders_status_name='Processing';
UPDATE orders_status SET orders_status_name='配達済み／完了', sort_order=20 WHERE language_id=@lan_id AND orders_status_name='Delivered';
UPDATE orders_status SET orders_status_name='更新', sort_order=30 WHERE language_id=@lan_id AND orders_status_name='Update';
UPDATE orders_status SET orders_status_name='発送済み', sort_order=15 WHERE language_id=@lan_id AND orders_status_name='Sent';
UPDATE tax_rates_description SET tax_description='（内消費税：１０％）' WHERE language_id=@lan_id AND tax_description=@taxdescription;


#### VERSION UPDATE STATEMENTS
## THE FOLLOWING 2 SECTIONS SHOULD BE THE "LAST" ITEMS IN THE FILE, so that if the upgrade fails prematurely, the version info is not updated.
##The following updates the version HISTORY to store the prior version info (Essentially "moves" the prior version info from the "project_version" to "project_version_history" table
#NEXT_X_ROWS_AS_ONE_COMMAND:3
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.2.1', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '2.0210', project_version_comment = 'Version Update with Japanese Pack v2.2.1', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';

##### END OF UPGRADE SCRIPT
