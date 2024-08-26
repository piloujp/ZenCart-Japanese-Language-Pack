#
# * This SQL script upgrades the core Zen Cart database structure from v2.0.0 to v2.1.0
# *
# * @access private
# * @copyright Copyright 2003-2024 Zen Cart Development Team
# * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
# * @version $Id: pilou2/piloujp 2024 Aug 19 Modified in v2.1.0-alpha1 $
#

############ IMPORTANT INSTRUCTIONS ###############
#
# * Zen Cart uses the zc_install/index.php program to do database upgrades
# * This SQL script is intended to be used by running zc_install
# * It is *not* recommended to simply run these statements manually via any other means
# * ie: not via phpMyAdmin or via the Install SQL Patch tool in Zen Cart admin
# * The zc_install program catches possible problems and also handles table-prefixes automatically
# *
# * To use the zc_install program to do your database upgrade:
# * a. Upload the NEWEST zc_install folder to your server
# * b. Surf to zc_install/index.php via your browser
# * c. On the System Inspection page, scroll to the bottom and click on Database Upgrade
# *    NOTE: do NOT click on the "Install" button, because that will erase your database.
# * d. On the Database Upgrade screen, you will be presented with a list of checkboxes for
# *    various Zen Cart versions, with the recommended upgrades already pre-selected.
# * e. Verify the checkboxes, then scroll down and enter your Zen Cart Admin username
# *    and password, and then click on the Upgrade button.
# * f. If any errors occur, you will be notified. Some warnings can be ignored.
# * g. When done, you will be taken to the Finished page.
#
#####################################################

#PROGRESS_FEEDBACK:!TEXT=Purging caches ...
# Clear out active customer sessions. Truncating helps the database clean up behind itself.
TRUNCATE TABLE whos_online;
TRUNCATE TABLE db_cache;

Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);

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
ALTER TABLE address_book ADD COLUMN entry_telephone varchar(32);
ALTER TABLE address_book ADD COLUMN entry_fax varchar(32);
ALTER TABLE orders ADD COLUMN delivery_telephone varchar(32);
ALTER TABLE orders ADD COLUMN delivery_fax varchar(32);
ALTER TABLE orders ADD COLUMN billing_telephone varchar(32);
ALTER TABLE orders ADD COLUMN billing_fax varchar(32);
ALTER TABLE orders ADD COLUMN customers_fax varchar(32);

#送信モヂュール用
ALTER TABLE orders ADD COLUMN delivery_timespec     varchar(32) default null;

#注文ステータス
INSERT INTO orders_status VALUES ('5', '1', 'Sent', 15);

#PROGRESS_FEEDBACK:!TEXT=Updating address related data...
#住所フォーマット
SELECT IFNULL((SELECT address_format_id FROM address_format WHERE address_format LIKE '〒%'), NULL) INTO @Formid;
REPLACE INTO address_format (address_format_id, address_format, address_summary) VALUES (@formid, '〒$postcode$cr$state$city$streets$cr$lastname $firstname ', '$city $country');
UPDATE countries SET address_format_id = (SELECT address_format_id from address_format WHERE address_format LIKE '〒%') WHERE countries_id = @japan_id;

#PROGRESS_FEEDBACK:!TEXT=Updating admin configuration...
#単位を kg と cm に設定します
UPDATE configuration SET configuration_value = 'kgs' WHERE configuration_key = 'SHIPPING_WEIGHT_UNITS';
UPDATE configuration SET configuration_value = 'centimeters' WHERE configuration_key = 'SHIPPING_DIMENSION_UNITS';

#言語設定
UPDATE layout_boxes SET layout_box_status=1, layout_box_sort_order=0 WHERE layout_box_name = 'languages.php';

#通貨設定
INSERT INTO currencies (title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated) VALUES ('Japanese Yen','JPY','￥','','.',',','0','1.000000', now());
UPDATE configuration SET configuration_value = 'JPY', last_modified = now() WHERE configuration_key = 'DEFAULT_CURRENCY';
UPDATE currencies SET value='0.007031', last_updated = now() WHERE code='USD';
UPDATE currencies SET value='0.006515', last_updated = now() WHERE code='EUR';
UPDATE currencies SET value='0.005544', last_updated = now() WHERE code='GBP';
UPDATE currencies SET value='0.009454', last_updated = now() WHERE code='CAD';
UPDATE currencies SET value='0.010766', last_updated = now() WHERE code='AUD';

# 税金・税率設定
INSERT INTO tax_class (tax_class_title, tax_class_description, last_modified, date_added) VALUES ('消費税', '消費税（日本）', now(), now());
INSERT INTO geo_zones (geo_zone_name, geo_zone_description, last_modified, date_added) VALUES ('日本', '日本（消費税）', now(), now());
INSERT INTO zones_to_geo_zones (zone_country_id, geo_zone_id, last_modified, date_added) SELECT @japan_id, geo_zone_id, now(), now() FROM geo_zones WHERE geo_zone_name = '日本';
INSERT INTO tax_rates (tax_zone_id, tax_class_id, tax_priority, tax_rate, tax_description, last_modified, date_added) SELECT ztg.association_id, tc.tax_class_id, '1', '10.0', '（内消費税：10%）', now(), now() FROM tax_class tc, zones_to_geo_zones ztg JOIN geo_zones gz ON ztg.geo_zone_id = gz.geo_zone_id WHERE tc.tax_class_title = '消費税' AND gz.geo_zone_name ='日本';

#販売国
#UPDATE configuration SET configuration_value = @japan_id, last_modified = now() WHERE configuration_key='STORE_COUNTRY';

#一般設定
UPDATE configuration SET configuration_value = '&pound;,£:&euro;,€:&yen;,￥:&reg;,®:&trade;,™', last_modified = now() WHERE configuration_key = 'CURRENCIES_TRANSLATIONS';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '1', last_modified = now() WHERE configuration_key = 'ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_value = 'false', last_modified = now() WHERE configuration_key = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_value = @japan_id, last_modified = now() WHERE configuration_key = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN';

#PROGRESS_FEEDBACK:!TEXT=Updating admin menus to Japanese
# Japanese menus-submenus
# 製品タイプ設定の翻訳
UPDATE product_types SET type_name = '商品 - 一般' WHERE type_handler = 'product';
UPDATE product_types SET type_name = '商品 - 音楽' WHERE type_handler = 'product_music';
UPDATE product_types SET type_name = 'ドキュメント - 一般' WHERE type_handler = 'document_general';
UPDATE product_types SET type_name = 'ドキュメント - 商品' WHERE type_handler = 'document_product';
UPDATE product_types SET type_name = '商品 - 送料無料' WHERE type_handler = 'product_free_shipping';

# 製品タイプのレイアウト設定の翻訳
UPDATE product_type_layout SET configuration_title = 'モデル番号を表示', configuration_description = '商品情報に型番を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_MODEL';
UPDATE product_type_layout SET configuration_title = '重量を表示', configuration_description = '商品情報の重量表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_WEIGHT';
UPDATE product_type_layout SET configuration_title = '属性の重みを表示', configuration_description = '商品情報の属性の重みを表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_WEIGHT_ATTRIBUTES';
UPDATE product_type_layout SET configuration_title = 'メーカーを表示', configuration_description = '製品情報にメーカー名を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_MANUFACTURER';
UPDATE product_type_layout SET configuration_title = 'ショッピングカート内の数量を表示', configuration_description = '現在のショッピングカート内の数量を商品情報に表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_IN_CART_QTY';
UPDATE product_type_layout SET configuration_title = '在庫数を表示', configuration_description = '商品情報に在庫数を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_QUANTITY';
UPDATE product_type_layout SET configuration_title = '商品レビュー数を表示', configuration_description = '商品の表示 レビュー数 商品情報 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_REVIEWS_COUNT';
UPDATE product_type_layout SET configuration_title = '商品レビューボタンを表示', configuration_description = '商品情報の「商品レビューを表示」ボタン 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_REVIEWS';
UPDATE product_type_layout SET configuration_title = '表示可能日', configuration_description = '商品情報で利用可能な日付を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_DATE_AVAILABLE';
UPDATE product_type_layout SET configuration_title = '追加された日付を表示', configuration_description = 'Display Date Added on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_DATE_ADDED';
UPDATE product_type_layout SET configuration_title = '商品URLを表示', configuration_description = '商品情報にURLを表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_URL';
UPDATE product_type_layout SET configuration_title = '商品を表示する 追加画像', configuration_description = '商品情報に追加画像を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_INFO_ADDITIONAL_IMAGES';
UPDATE product_type_layout SET configuration_title = '価格に「開始価格」を表示', configuration_description = '商品情報属性 0= オフ 1= オンの商品に「開始価格」を表示します' WHERE configuration_key = 'SHOW_PRODUCT_INFO_STARTING_AT';
UPDATE product_type_layout SET configuration_title = '商品 送料無料 画像ステータス - カタログ', configuration_description = 'カタログに送料無料の画像/テキストを表示しますか？' WHERE configuration_key = 'SHOW_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH';
UPDATE product_type_layout SET configuration_title = '商品価格税クラスのデフォルト - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加する場合、商品価格税クラスのデフォルト ID は何にすべきですか？' WHERE configuration_key = 'DEFAULT_PRODUCT_TAX_CLASS_ID';
UPDATE product_type_layout SET configuration_title = '商品の仮想デフォルト ステータス - 配送先住所をスキップ - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときに、デフォルトの仮想商品ステータスをオンにしますか？' WHERE configuration_key = 'DEFAULT_PRODUCT_PRODUCTS_VIRTUAL';
UPDATE product_type_layout SET configuration_title = '商品の送料無料デフォルトステータス - 通常の配送ルール - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときのデフォルトの送料無料ステータスはどのようにすべきですか？<br />はい、常に送料無料がオンです<br />いいえ、常に送料無料がオフです<br />特別、商品/ダウンロードには配送が必要です。' WHERE configuration_key = 'DEFAULT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING';
UPDATE product_type_layout SET configuration_title = 'モデル番号を表示', configuration_description = '商品情報に型番を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_MODEL';
UPDATE product_type_layout SET configuration_title = '重量を表示', configuration_description = '商品情報の重量表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT';
UPDATE product_type_layout SET configuration_title = '属性の重みを表示', configuration_description = '商品情報の属性の重みを表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT_ATTRIBUTES';
UPDATE product_type_layout SET configuration_title = 'アーティスト名を表示', configuration_description = '商品情報にアーティスト名を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_ARTIST';
UPDATE product_type_layout SET configuration_title = '音楽ジャンルを表示する', configuration_description = '商品情報に音楽ジャンルを表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_GENRE';
UPDATE product_type_layout SET configuration_title = 'レコード会社を表示する', configuration_description = '商品情報にレコード会社を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_RECORD_COMPANY';
UPDATE product_type_layout SET configuration_title = 'ショッピングカート内の数量を表示', configuration_description = 'Display Quantity in Current Shopping Cart on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_IN_CART_QTY';
UPDATE product_type_layout SET configuration_title = '在庫数を表示', configuration_description = 'Display Quantity in Stock on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_QUANTITY';
UPDATE product_type_layout SET configuration_title = '商品レビュー数を表示', configuration_description = '商品の表示 レビュー数 商品情報 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS_COUNT';
UPDATE product_type_layout SET configuration_title = '商品レビューボタンを表示', configuration_description = '商品情報の「商品レビューを表示」ボタン 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS';
UPDATE product_type_layout SET configuration_title = '表示可能日', configuration_description = '商品情報で利用可能な日付を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_DATE_AVAILABLE';
UPDATE product_type_layout SET configuration_title = '追加された日付を表示', configuration_description = 'Display Date Added on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_DATE_ADDED';
UPDATE product_type_layout SET configuration_title = '価格に「開始価格」を表示', configuration_description = '商品情報属性 0= オフ 1= オンの商品に「開始価格」を表示します' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_STARTING_AT';
UPDATE product_type_layout SET configuration_title = '商品を表示する 追加画像', configuration_description = '商品情報に追加画像を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_ADDITIONAL_IMAGES';
UPDATE product_type_layout SET configuration_title = '商品 送料無料 画像ステータス - カタログ', configuration_description = 'カタログに送料無料の画像/テキストを表示しますか？' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH';
UPDATE product_type_layout SET configuration_title = '商品価格税クラスのデフォルト - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加する場合、商品価格税クラスのデフォルト ID は何にすべきですか？' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_TAX_CLASS_ID';
UPDATE product_type_layout SET configuration_title = '商品の仮想デフォルト ステータス - 配送先住所をスキップ - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときに、デフォルトの仮想商品ステータスをオンにしますか？' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_VIRTUAL';
UPDATE product_type_layout SET configuration_title = '商品の送料無料デフォルトステータス - 通常の配送ルール - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときのデフォルトの送料無料ステータスはどのようにすべきですか？<br />はい、常に送料無料がオンです<br />いいえ、常に送料無料がオフです<br />特別、商品/ダウンロードには配送が必要です。' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_IS_ALWAYS_FREE_SHIPPING';
UPDATE product_type_layout SET configuration_title = '商品レビュー数を表示', configuration_description = '商品の表示 レビュー数 商品情報 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS_COUNT';
UPDATE product_type_layout SET configuration_title = '商品レビューボタンを表示', configuration_description = '商品情報の「商品レビューを表示」ボタン 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS';
UPDATE product_type_layout SET configuration_title = '表示可能日', configuration_description = '商品情報で利用可能な日付を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_DATE_AVAILABLE';
UPDATE product_type_layout SET configuration_title = '追加された日付を表示', configuration_description = 'Display Date Added on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_DATE_ADDED';
UPDATE product_type_layout SET configuration_title = '商品URLを表示', configuration_description = '商品情報にURLを表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_URL';
UPDATE product_type_layout SET configuration_title = '商品を表示する 追加画像', configuration_description = '商品情報に追加画像を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_ADDITIONAL_IMAGES';
UPDATE product_type_layout SET configuration_title = 'モデル番号を表示', configuration_description = '商品情報に型番を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_MODEL';
UPDATE product_type_layout SET configuration_title = '重量を表示', configuration_description = '商品情報の重量表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT';
UPDATE product_type_layout SET configuration_title = '属性の重みを表示', configuration_description = '商品情報の属性の重みを表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT_ATTRIBUTES';
UPDATE product_type_layout SET configuration_title = 'メーカーを表示', configuration_description = '商品情報にメーカー名を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_MANUFACTURER';
UPDATE product_type_layout SET configuration_title = 'ショッピングカート内の数量を表示', configuration_description = 'Display Quantity in Current Shopping Cart on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_IN_CART_QTY';
UPDATE product_type_layout SET configuration_title = '在庫数を表示', configuration_description = 'Display Quantity in Stock on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_QUANTITY';
UPDATE product_type_layout SET configuration_title = '商品レビュー数を表示', configuration_description = '商品の表示 レビュー数 商品情報 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS_COUNT';
UPDATE product_type_layout SET configuration_title = '商品レビューボタンを表示', configuration_description = '商品情報の「商品レビューを表示」ボタン 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS';
UPDATE product_type_layout SET configuration_title = '表示可能日', configuration_description = '商品情報で利用可能な日付を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_AVAILABLE';
UPDATE product_type_layout SET configuration_title = '追加された日付を表示', configuration_description = 'Display Date Added on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_ADDED';
UPDATE product_type_layout SET configuration_title = '商品URLを表示', configuration_description = '商品情報にURLを表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_URL';
UPDATE product_type_layout SET configuration_title = '商品を表示する 追加画像', configuration_description = '商品情報に追加画像を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_ADDITIONAL_IMAGES';
UPDATE product_type_layout SET configuration_title = '価格に「開始価格」を表示', configuration_description = '商品情報属性 0= オフ 1= オンの商品に「開始価格」を表示します' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_STARTING_AT';
UPDATE product_type_layout SET configuration_title = '商品 送料無料 画像ステータス - カタログ', configuration_description = 'カタログに送料無料の画像/テキストを表示しますか？' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH';
UPDATE product_type_layout SET configuration_title = '商品価格税クラスのデフォルト - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加する場合、商品価格税クラスのデフォルト ID は何にすべきですか？' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_TAX_CLASS_ID';
UPDATE product_type_layout SET configuration_title = '商品の仮想デフォルト ステータス - 配送先住所をスキップ - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときに、デフォルトの仮想商品ステータスをオンにしますか？' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_VIRTUAL';
UPDATE product_type_layout SET configuration_title = '商品の送料無料デフォルトステータス - 通常の配送ルール - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときのデフォルトの送料無料ステータスはどのようにすべきですか？<br />はい、常に送料無料がオンです<br />いいえ、常に送料無料がオフです<br />特別、商品/ダウンロードには配送が必要です。' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING';
UPDATE product_type_layout SET configuration_title = 'モデル番号を表示', configuration_description = '商品情報に型番を表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MODEL';
UPDATE product_type_layout SET configuration_title = '重量を表示', configuration_description = '商品情報の重量表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT';
UPDATE product_type_layout SET configuration_title = '属性の重みを表示', configuration_description = '商品情報の属性の重みを表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT_ATTRIBUTES';
UPDATE product_type_layout SET configuration_title = 'メーカーを表示', configuration_description = '商品情報にメーカー名を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MANUFACTURER';
UPDATE product_type_layout SET configuration_title = 'ショッピングカート内の数量を表示', configuration_description = 'Display Quantity in Current Shopping Cart on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_IN_CART_QTY';
UPDATE product_type_layout SET configuration_title = '在庫数を表示', configuration_description = 'Display Quantity in Stock on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_QUANTITY';
UPDATE product_type_layout SET configuration_title = '商品レビュー数を表示', configuration_description = '商品の表示 レビュー数 商品情報 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS_COUNT';
UPDATE product_type_layout SET configuration_title = '商品レビューボタンを表示', configuration_description = '商品情報の「商品レビューを表示」ボタン 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS';
UPDATE product_type_layout SET configuration_title = '表示可能日', configuration_description = '商品情報で利用可能な日付を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_AVAILABLE';
UPDATE product_type_layout SET configuration_title = '追加された日付を表示', configuration_description = 'Display Date Added on Product Info 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_ADDED';
UPDATE product_type_layout SET configuration_title = '商品URLを表示', configuration_description = '商品情報にURLを表示 0=オフ 1=オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_URL';
UPDATE product_type_layout SET configuration_title = '商品を表示する 追加画像', configuration_description = '商品情報に追加画像を表示 0= オフ 1= オン' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ADDITIONAL_IMAGES';
UPDATE product_type_layout SET configuration_title = '価格に「開始価格」を表示', configuration_description = '商品情報属性 0= オフ 1= オンの商品に「開始価格」を表示します' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_STARTING_AT';
UPDATE product_type_layout SET configuration_title = '商品 送料無料 画像ステータス - カタログ', configuration_description = 'カタログに送料無料の画像/テキストを表示しますか？' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH';
UPDATE product_type_layout SET configuration_title = '商品価格税クラスのデフォルト - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加する場合、商品価格税クラスのデフォルト ID は何にすべきですか？' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_TAX_CLASS_ID';
UPDATE product_type_layout SET configuration_title = '商品の仮想デフォルト ステータス - 配送先住所をスキップ - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときに、デフォルトの仮想商品ステータスをオンにしますか？' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_VIRTUAL';
UPDATE product_type_layout SET configuration_title = '商品の送料無料デフォルトステータス - 通常の配送ルール - 新しい商品を追加するとき？', configuration_description = '新しい商品を追加するときのデフォルトの送料無料ステータスはどのようにすべきですか？<br />はい、常に送料無料がオンです<br />いいえ、常に送料無料がオフです<br />特別、商品/ダウンロードには配送が必要です。' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_IS_ALWAYS_FREE_SHIPPING';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品名を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品名を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：タイトル追加テキストを使用', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにタイトルの追加テキストを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_INFO_METATAGS_TITLE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品モデルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品モデルを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_INFO_METATAGS_MODEL_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品価格を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品価格を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_INFO_METATAGS_PRICE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：SITE_TAGLINE を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに定義された定数「SITE_TAGLINE」を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品名を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品名を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRODUCTS_NAME_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：タイトル追加テキストを使用', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにタイトルの追加テキストを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品モデルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品モデルを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_MODEL_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品価格を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品価格を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRICE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：SITE_TAGLINE を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに定義された定数「SITE_TAGLINE」を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_TAGLINE_STATUS';
UPDATE product_type_layout SET configuration_title = 'ドキュメントページの&lt;title&gt;タグ - デフォルト：ドキュメントのタイトルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメントのタイトルを表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_STATUS';
UPDATE product_type_layout SET configuration_title = 'ドキュメントページの&lt;title&gt;タグ - デフォルト：ドキュメント名を使用', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメント名を表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_PRODUCTS_NAME_STATUS';
UPDATE product_type_layout SET configuration_title = 'ドキュメントページの&lt;title&gt;タグ - デフォルト：ドキュメントのタグラインを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメントのタグラインを表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_TAGLINE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：ドキュメントのタイトルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメントのタイトルを表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：ドキュメント名を使用', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメント名を表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：ドキュメントモデルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグ内にドキュメント モデルを表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_MODEL_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：ドキュメント価格を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメント価格を表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRICE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：ドキュメントのタグラインを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにドキュメントのタグラインを表示します。' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品名を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品名を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：タイトル追加テキストを使用', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグにタイトルの追加テキストを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRODUCTS_NAME_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品モデルを使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品モデルを表示します。' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_MODEL_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：商品価格を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに商品価格を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRICE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品ページの&lt;title&gt;タグ - デフォルト：SITE_TAGLINE を使用する', configuration_description = '新しい商品のデフォルト設定 (商品ごとに変更可能)。<br />ページの &lt;title&gt; タグに定義された定数「SITE_TAGLINE」を表示します。' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_TAGLINE_STATUS';
UPDATE product_type_layout SET configuration_title = '商品属性は表示のみ - デフォルト', configuration_description = '商品属性は表示のみです<br />表示目的のみに使用されます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTES_DISPLAY_ONLY';
UPDATE product_type_layout SET configuration_title = '商品属性は無料 - デフォルト', configuration_description = '商品属性は無料です<br />商品が無料の場合、属性は無料です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTE_IS_FREE';
UPDATE product_type_layout SET configuration_title = '商品属性はデフォルトです - デフォルト', configuration_description = '商品属性はデフォルトです<br />選択済みとしてマークされるデフォルト属性<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTES_DEFAULT';
UPDATE product_type_layout SET configuration_title = '商品属性は割引済み - デフォルト', configuration_description = '商品属性は割引されています<br />商品スペシャル/セールで使用される割引を適用します<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTES_DISCOUNTED';
UPDATE product_type_layout SET configuration_title = '商品属性は基本価格に含まれます - デフォルト', configuration_description = '商品属性は基本価格に含まれます<br />属性によって価格設定される場合は基本価格に含まれます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTES_PRICE_BASE_INCLUDED';
UPDATE product_type_layout SET configuration_title = '商品属性は必須です - デフォルト', configuration_description = '商品属性は必須です<br />テキストには属性が必須です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_ATTRIBUTES_REQUIRED';
UPDATE product_type_layout SET configuration_title = '商品商品属性価格プレフィックス - デフォルト', configuration_description = '商品属性価格プレフィックス<br />追加するデフォルトの属性価格プレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_PRICE_PREFIX';
UPDATE product_type_layout SET configuration_title = '商品属性の重みプレフィックス - デフォルト', configuration_description = '商品の属性重みプレフィックス<br />デフォルトの属性重みプレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX';
UPDATE product_type_layout SET configuration_title = '音楽属性は表示のみ - デフォルト', configuration_description = '音楽属性は表示のみです<br />表示目的のみに使用されます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DISPLAY_ONLY';
UPDATE product_type_layout SET configuration_title = '音楽属性は無料です - デフォルト', configuration_description = '音楽属性は無料です<br />製品が無料の場合、属性は無料です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTE_IS_FREE';
UPDATE product_type_layout SET configuration_title = '音楽属性はデフォルトです - デフォルト', configuration_description = '音楽属性はデフォルトです<br />選択済みとしてマークされるデフォルト属性<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DEFAULT';
UPDATE product_type_layout SET configuration_title = '音楽商品属性は割引済み - デフォルト', configuration_description = '音楽属性は割引されています<br />製品スペシャル/セールで使用される割引を適用します<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DISCOUNTED';
UPDATE product_type_layout SET configuration_title = '音楽属性は基本価格に含まれます - デフォルト', configuration_description = '音楽属性は基本価格に含まれます<br />属性によって価格設定される場合は基本価格に含まれます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_PRICE_BASE_INCLUDED';
UPDATE product_type_layout SET configuration_title = '音楽属性は必須です - デフォルト', configuration_description = '音楽属性は必須です<br />テキストには属性が必須です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_REQUIRED';
UPDATE product_type_layout SET configuration_title = '音楽商品属性価格プレフィックス - デフォルト', configuration_description = '音楽属性価格プレフィックス<br />追加するデフォルトの属性価格プレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_PRICE_PREFIX';
UPDATE product_type_layout SET configuration_title = '音楽属性の重みプレフィックス - デフォルト', configuration_description = '音楽の属性重みプレフィックス<br />デフォルトの属性重みプレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性は表示のみ - デフォルト', configuration_description = 'ドキュメントの一般属性は表示のみです<br />表示目的のみに使用されます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DISPLAY_ONLY';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性は無料です - デフォルト', configuration_description = 'ドキュメントの一般属性は無料です<br />製品が無料の場合、属性は無料です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTE_IS_FREE';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性はデフォルトです - デフォルト', configuration_description = 'ドキュメントの一般属性はデフォルトです<br />選択済みとしてマークされるデフォルト属性<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DEFAULT';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般商品属性は割引済み - デフォルト', configuration_description = 'ドキュメントの一般属性は割引されています<br />製品スペシャル/セールで使用される割引を適用します<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DISCOUNTED';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性は基本価格に含まれます - デフォルト', configuration_description = 'ドキュメントの一般属性は基本価格に含まれます<br />属性によって価格設定される場合は基本価格に含まれます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_PRICE_BASE_INCLUDED';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性は必須です - デフォルト', configuration_description = 'ドキュメントの一般属性は必須です<br />テキストには属性が必須です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_REQUIRED';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般商品属性価格プレフィックス - デフォルト', configuration_description = 'ドキュメントの一般属性価格プレフィックス<br />追加するデフォルトの属性価格プレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_PRICE_PREFIX';
UPDATE product_type_layout SET configuration_title = 'ドキュメントの一般属性の重みプレフィックス - デフォルト', configuration_description = 'ドキュメントの一般の属性重みプレフィックス<br />デフォルトの属性重みプレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_DOCUMENT_GENERAL_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性は表示のみ - デフォルト', configuration_description = 'ドキュメント商品属性は表示のみです<br />表示目的のみに使用されます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DISPLAY_ONLY';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性は無料です - デフォルト', configuration_description = 'ドキュメント商品属性は無料です<br />製品が無料の場合、属性は無料です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTE_IS_FREE';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性はデフォルトです - デフォルト', configuration_description = 'ドキュメント商品属性はデフォルトです<br />選択済みとしてマークされるデフォルト属性<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DEFAULT';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品商品属性は割引済み - デフォルト', configuration_description = 'ドキュメント商品属性は割引されています<br />製品スペシャル/セールで使用される割引を適用します<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DISCOUNTED';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性は基本価格に含まれます - デフォルト', configuration_description = 'ドキュメント商品属性は基本価格に含まれます<br />属性によって価格設定される場合は基本価格に含まれます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_PRICE_BASE_INCLUDED';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性は必須です - デフォルト', configuration_description = 'ドキュメント商品属性は必須です<br />テキストには属性が必須です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_REQUIRED';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品商品属性価格プレフィックス - デフォルト', configuration_description = 'ドキュメント商品属性価格プレフィックス<br />追加するデフォルトの属性価格プレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_PRICE_PREFIX';
UPDATE product_type_layout SET configuration_title = 'ドキュメント商品属性の重みプレフィックス - デフォルト', configuration_description = 'ドキュメント商品の属性重みプレフィックス<br />デフォルトの属性重みプレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性は表示のみ - デフォルト', configuration_description = '商品送料無料属性は表示のみです<br />表示目的のみに使用されます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DISPLAY_ONLY';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性は無料です - デフォルト', configuration_description = '商品送料無料属性は無料です<br />製品が無料の場合、属性は無料です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTE_IS_FREE';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性はデフォルトです - デフォルト', configuration_description = '商品送料無料属性はデフォルトです<br />選択済みとしてマークされるデフォルト属性<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DEFAULT';
UPDATE product_type_layout SET configuration_title = '商品送料無料商品属性は割引済み - デフォルト', configuration_description = '商品送料無料属性は割引されています<br />製品スペシャル/セールで使用される割引を適用します<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DISCOUNTED';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性は基本価格に含まれます - デフォルト', configuration_description = '商品送料無料属性は基本価格に含まれます<br />属性によって価格設定される場合は基本価格に含まれます<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_PRICE_BASE_INCLUDED';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性は必須です - デフォルト', configuration_description = '商品送料無料属性は必須です<br />テキストには属性が必須です<br />0= いいえ 1= はい' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_REQUIRED';
UPDATE product_type_layout SET configuration_title = '商品送料無料商品属性価格プレフィックス - デフォルト', configuration_description = '商品送料無料属性価格プレフィックス<br />追加するデフォルトの属性価格プレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_PRICE_PREFIX';
UPDATE product_type_layout SET configuration_title = '商品送料無料属性の重みプレフィックス - デフォルト', configuration_description = '商品送料無料の属性重みプレフィックス<br />デフォルトの属性重みプレフィックス<br />空白、+ または -' WHERE configuration_key = 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX';
UPDATE product_type_layout SET configuration_title = '「質問する」ボタンを表示しますか？', configuration_description = '商品情報ページに「質問する」ボタンを表示しますか？（0 = 偽、1 = 真）' WHERE configuration_key = 'SHOW_PRODUCT_INFO_ASK_A_QUESTION';
UPDATE product_type_layout SET configuration_title = '「質問する」ボタンを表示しますか？', configuration_description = '商品情報ページに「質問する」ボタンを表示しますか？（0 = 偽、1 = 真）' WHERE configuration_key = 'SHOW_PRODUCT_MUSIC_INFO_ASK_A_QUESTION';
UPDATE product_type_layout SET configuration_title = '「質問する」ボタンを表示しますか？', configuration_description = '商品情報ページに「質問する」ボタンを表示しますか？（0 = 偽、1 = 真）' WHERE configuration_key = 'SHOW_DOCUMENT_GENERAL_INFO_ASK_A_QUESTION';
UPDATE product_type_layout SET configuration_title = '「質問する」ボタンを表示しますか？', configuration_description = '商品情報ページに「質問する」ボタンを表示しますか？（0 = 偽、1 = 真）' WHERE configuration_key = 'SHOW_DOCUMENT_PRODUCT_INFO_ASK_A_QUESTION';
UPDATE product_type_layout SET configuration_title = '「質問する」ボタンを表示しますか？', configuration_description = '商品情報ページに「質問する」ボタンを表示しますか？（0 = 偽、1 = 真）' WHERE configuration_key = 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ASK_A_QUESTION';


#### VERSION UPDATE STATEMENTS
## THE FOLLOWING 2 SECTIONS SHOULD BE THE "LAST" ITEMS IN THE FILE, so that if the upgrade fails prematurely, the version info is not updated.
##The following updates the version HISTORY to store the prior version info (Essentially "moves" the prior version info from the "project_version" to "project_version_history" table
#NEXT_X_ROWS_AS_ONE_COMMAND:3
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

## Now set to new version
UPDATE project_version SET project_version_comment = 'Version Update with Japanese Pack v2.1.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '1.0200', project_version_comment = 'Version Update with Japanese Pack v2.1.0', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';

##### END OF UPGRADE SCRIPT
