#
# * Database modifications for Japanese Zen Cart
# * @package Installer
# * @access private
# * @copyright Copyright 2003-2022 Zen Cart Development Team
# * @copyright Portions Copyright 2003 osCommerce
# * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
# * @version $Id: pilou2/piloujp 2023 June 7 Modified in v1.5.8a $
#
# NOTE: UTF8 files need to be saved with encoding format set to UTF8-without-BOM.
#

#地域設定
# Japan zones
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'北海道','北海道');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'青森県','青森県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'岩手県','岩手県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'宮城県','宮城県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'秋田県','秋田県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'山形県','山形県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'福島県','福島県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'茨城県','茨城県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'栃木県','栃木県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'群馬県','群馬県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'埼玉県','埼玉県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'千葉県','千葉県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'東京都','東京都');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'神奈川県','神奈川県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'新潟県','新潟県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'富山県','富山県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'石川県','石川県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'福井県','福井県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'山梨県','山梨県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'長野県','長野県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'岐阜県','岐阜県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'静岡県','静岡県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'愛知県','愛知県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'三重県','三重県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'滋賀県','滋賀県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'京都府','京都府');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'大阪府','大阪府');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'兵庫県','兵庫県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'奈良県','奈良県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'和歌山県','和歌山県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'鳥取県','鳥取県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'島根県','島根県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'岡山県','岡山県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'広島県','広島県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'山口県','山口県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'徳島県','徳島県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'香川県','香川県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'愛媛県','愛媛県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'高知県','高知県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'福岡県','福岡県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'佐賀県','佐賀県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'長崎県','長崎県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'熊本県','熊本県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'大分県','大分県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'宮崎県','宮崎県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'鹿児島県','鹿児島県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES (107,'沖縄県','沖縄県');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '愛知県', 'Aichi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '秋田県', 'Akita');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '青森県', 'Aomori');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '千葉県', 'Chiba');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '愛媛県', 'Ehime');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '福井県', 'Fukui');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '福岡県', 'Fukuoka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '福島県', 'Fukushima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '岐阜県', 'Gifu');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '群馬県', 'Gunma');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '広島県', 'Hiroshima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '北海道', 'Hokkaido');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '兵庫県', 'Hyogo');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '茨城県', 'Ibaraki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '石川県', 'Ishikawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '岩手県', 'Iwate');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '香川県', 'Kagawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '鹿児島県', 'Kagoshima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '神奈川県', 'Kanagawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '高知県', 'Kochi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '熊本県', 'Kumamoto');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '京都府', 'Kyoto');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '三重県', 'Mie');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '宮城県', 'Miyagi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '宮崎県', 'Miyazaki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '長野県', 'Nagano');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '長崎県', 'Nagasaki');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '奈良県', 'Nara');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '新潟県', 'Niigata');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '大分県', 'Oita');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '岡山県', 'Okayama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '沖縄県', 'Okinawa');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '大阪府', 'Osaka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '佐賀県', 'Saga');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '埼玉県', 'Saitama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '滋賀県', 'Shiga');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '島根県', 'Shimane');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '静岡県', 'Shizuoka');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '栃木県', 'Tochigi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '徳島県', 'Tokushima');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '東京都', 'Tokyo');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '鳥取県', 'Tottori');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '富山県', 'Toyama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '和歌山県', 'Wakayama');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '山形県', 'Yamagata');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '山口県', 'Yamaguchi');
INSERT INTO zones (zone_country_id, zone_code, zone_name) VALUES(107, '山梨県', 'Yamanashi');

# カナを追加する
ALTER TABLE address_book ADD COLUMN entry_firstname_kana     varchar(32) NULL;
ALTER TABLE address_book ADD COLUMN entry_lastname_kana      varchar(32) NULL;
ALTER TABLE customers    ADD COLUMN customers_firstname_kana varchar(32) NOT NULL default '';
ALTER TABLE customers    ADD COLUMN customers_lastname_kana  varchar(32) NOT NULL default '';
ALTER TABLE orders       ADD COLUMN customers_name_kana      varchar(64) NULL;
ALTER TABLE orders       ADD COLUMN delivery_name_kana       varchar(64) NULL;
ALTER TABLE orders       ADD COLUMN billing_name_kana        varchar(64) NULL;

# 住所に電話番号を追加、個人情報側からは電話番号削除
ALTER TABLE address_book ADD COLUMN entry_telephone varchar(32) NOT NULL;
ALTER TABLE address_book ADD COLUMN entry_fax varchar(32);
ALTER TABLE orders ADD COLUMN delivery_telephone varchar(32);
ALTER TABLE orders ADD COLUMN delivery_fax varchar(32);
ALTER TABLE orders ADD COLUMN billing_telephone varchar(32);
ALTER TABLE orders ADD COLUMN billing_fax varchar(32);
ALTER TABLE orders ADD COLUMN customers_fax varchar(32);

#送信モヂュール用
ALTER TABLE orders ADD COLUMN delivery_timespec     varchar(32) default null;
ALTER TABLE products ADD COLUMN products_length      float NOT NULL default 0;
ALTER TABLE products ADD COLUMN products_width      float NOT NULL default 0;
ALTER TABLE products ADD COLUMN products_height      float NOT NULL default 0;
ALTER TABLE products ADD COLUMN products_barcode     varchar(32);

#注文ステータス
INSERT INTO orders_status VALUES ('5', '1', 'Sent', 40);
INSERT INTO orders_status VALUES ('1', '2', '処理待ち', 0);
INSERT INTO orders_status VALUES ('2', '2', '処理中', 10);
INSERT INTO orders_status VALUES ('3', '2', '完了', 20);
INSERT INTO orders_status VALUES ('4', '2', '更新', 30);
INSERT INTO orders_status VALUES ('5', '2', '配送済み', 40);

#住所フォーマット
INSERT INTO address_format (address_format, address_summary) VALUES ('〒$postcode$cr$state$city$streets$cr$lastname $firstname 様', '$city $country');
UPDATE countries SET address_format_id = (SELECT address_format_id from address_format WHERE address_format LIKE '%様') WHERE countries_id = 107;

#言語設定
INSERT INTO languages (name, code, image, directory, sort_order) VALUES('Japanese', 'ja', 'icon.gif', 'japanese',0);
UPDATE configuration SET configuration_value = 'ja', last_modified = now() WHERE configuration_key = 'DEFAULT_LANGUAGE';
UPDATE layout_boxes SET layout_box_status=1, layout_box_sort_order=0 WHERE layout_box_name = 'languages.php';

#通貨設定
INSERT INTO currencies (title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated) VALUES ('Japanese Yen','JPY','￥','','.',',','0','1.000000', now());
UPDATE configuration SET configuration_value = 'JPY', last_modified = now() WHERE configuration_key = 'DEFAULT_CURRENCY';
UPDATE currencies SET value='0.007524', last_updated = now() WHERE code='USD';
UPDATE currencies SET value='0.007043', last_updated = now() WHERE code='EUR';
UPDATE currencies SET value='0.006064', last_updated = now() WHERE code='GBP';
UPDATE currencies SET value='0.010101', last_updated = now() WHERE code='CAD';
UPDATE currencies SET value='0.011295', last_updated = now() WHERE code='AUD';

# 税金・税率設定
INSERT INTO tax_class (tax_class_title, tax_class_description, last_modified, date_added) VALUES ('消費税', '消費税（日本）', now(), now());
INSERT INTO geo_zones (geo_zone_name, geo_zone_description, last_modified, date_added) VALUES ('日本', '日本（消費税）', now(), now());
INSERT INTO zones_to_geo_zones (zone_country_id, geo_zone_id, last_modified, date_added) SELECT '107', geo_zone_id, now(), now() FROM geo_zones WHERE geo_zone_name = '日本';
INSERT INTO tax_rates (tax_zone_id, tax_class_id, tax_priority, tax_rate, tax_description, last_modified, date_added) SELECT ztg.association_id, tc.tax_class_id, '1', '10.0', '（内消費税：10%）', now(), now() FROM tax_class tc, zones_to_geo_zones ztg JOIN geo_zones gz ON ztg.geo_zone_id = gz.geo_zone_id WHERE tc.tax_class_title = '消費税' AND gz.geo_zone_name ='日本';

#販売国
UPDATE configuration SET configuration_value = '107', last_modified = now() WHERE configuration_key='STORE_COUNTRY';

#一般設定
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_value = 'false', last_modified = now() WHERE configuration_key = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_value = '107', last_modified = now() WHERE configuration_key = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN';

# Version
UPDATE project_version SET project_version_minor = '5.8130', project_version_comment = 'New Installation-v158 with Japanese Pack v1.3.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_comment, project_version_date_applied) VALUES ('Zen-Cart Database', '1', '5.8130', '', 'New Installation-v158 with Japanese Pack v1.3.0', now());