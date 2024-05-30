#
# * This SQL script upgrades the core Zen Cart database structure from v2.0.0-beta1 to Japanese pack v2.0.0
# *
# * @access private
# * @copyright Copyright 2003-2024 Zen Cart Development Team
# * @copyright Portions Copyright 2003 osCommerce
# * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
# * @version $Id: pilou2/piloujp 2024 Modified in v2.0.0 $
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

#PROGRESS_FEEDBACK:!TEXT=Updating admin menus to Japanese...
# Japanese menus/submenus
# 一般設定グループの翻訳
UPDATE configuration_group SET configuration_group_title = 'ショップ全般の設定', configuration_group_description = 'ショップの一般的な項目を設定します。' WHERE  configuration_group_id = '1';
UPDATE configuration_group SET configuration_group_title = '最小値の設定', configuration_group_description = '機能・データ類の最小(少)値について設定します。' WHERE  configuration_group_id = '2';
UPDATE configuration_group SET configuration_group_title = '最大値の設定', configuration_group_description = '機能・データ類の最大値について設定します。' WHERE  configuration_group_id = '3';
UPDATE configuration_group SET configuration_group_title = '画像の設定', configuration_group_description = '各種の画像について設定します。' WHERE  configuration_group_id = '4';
UPDATE configuration_group SET configuration_group_title = '顧客アカウントの設定', configuration_group_description = '顧客について各種の設定をします。' WHERE  configuration_group_id = '5';
UPDATE configuration_group SET configuration_group_title = 'モジュールの設定', configuration_group_description = '(設定画面では隠れています)' WHERE  configuration_group_id = '6';
UPDATE configuration_group SET configuration_group_title = '配送料・パッケージの設定', configuration_group_description = '拝承料・パッケージ(梱包)について各種の設定をします。' WHERE  configuration_group_id = '7';
UPDATE configuration_group SET configuration_group_title = '商品リストの設定', configuration_group_description = '商品リストの表示について各種の設定をします。' WHERE  configuration_group_id = '8';
UPDATE configuration_group SET configuration_group_title = '在庫の設定', configuration_group_description = '在庫について各種の設定をします。' WHERE  configuration_group_id = '9';
UPDATE configuration_group SET configuration_group_title = 'ログの設定', configuration_group_description = 'ログについて各種の設定をします。' WHERE  configuration_group_id = '10';
UPDATE configuration_group SET configuration_group_title = '規約関連の設定', configuration_group_description = '規約について各種の設定をします。' WHERE  configuration_group_id = '11';
UPDATE configuration_group SET configuration_group_title = 'メールの設定', configuration_group_description = 'メールの送受信や書式について各種の設定をします。' WHERE  configuration_group_id = '12';
UPDATE configuration_group SET configuration_group_title = '商品属性の設定', configuration_group_description = '商品属性について各種の設定をします。' WHERE  configuration_group_id = '13';
UPDATE configuration_group SET configuration_group_title = 'GZip圧縮の設定', configuration_group_description = 'GZip圧縮について設定します。' WHERE  configuration_group_id = '14';
UPDATE configuration_group SET configuration_group_title = 'セッション管理の設定', configuration_group_description = 'セッション情報の管理について各種の設定をします。' WHERE  configuration_group_id = '15';
UPDATE configuration_group SET configuration_group_title = 'ギフト券・クーポン券の設定', configuration_group_description = 'ギフト券・クーポン券について各種の設定をします。' WHERE  configuration_group_id = '16';
UPDATE configuration_group SET configuration_group_title = 'クレジットカードの設定', configuration_group_description = 'クレジットカードについて各種の設定をします。' WHERE  configuration_group_id = '17';
UPDATE configuration_group SET configuration_group_title = '商品情報の設定', configuration_group_description = '商品情報の表示について各種の設定をします。' WHERE  configuration_group_id = '18';
UPDATE configuration_group SET configuration_group_title = 'レイアウトの設定', configuration_group_description = 'ショップの表示レイアウトについて各種の設定をします。' WHERE  configuration_group_id = '19';
UPDATE configuration_group SET configuration_group_title = 'メンテナンス表示の設定', configuration_group_description = '「メンテナンス中」表示などについて各種の設定をします。' WHERE  configuration_group_id = '20';
UPDATE configuration_group SET configuration_group_title = '新着商品リストの設定', configuration_group_description = '新着商品リストについて各種の設定をします。' WHERE  configuration_group_id = '21';
UPDATE configuration_group SET configuration_group_title = 'おすすめ商品リストの設定', configuration_group_description = 'おすすめ商品リストについて各種の設定をします。' WHERE  configuration_group_id = '22';
UPDATE configuration_group SET configuration_group_title = '全商品リストの設定', configuration_group_description = '全商品リストについて各種の設定をします。' WHERE  configuration_group_id = '23';
UPDATE configuration_group SET configuration_group_title = '商品カタログページの表示設定', configuration_group_description = '商品カタログページの要素表示について各種の設定をします。' WHERE  configuration_group_id = '24';
UPDATE configuration_group SET configuration_group_title = '定番ページの表示設定', configuration_group_description = '定番ページとHTMLAreaなどについて各種の設定をします。' WHERE  configuration_group_id = '25';
UPDATE configuration_group SET configuration_group_title = 'EZ-Pagesの設定', configuration_group_description = 'EZページについて各種の設定をします。' WHERE  configuration_group_id = '30';

# 一般設定の翻訳
UPDATE configuration SET configuration_title = 'ショップ名',  configuration_description = 'ショップ名を設定します。' WHERE `configuration_key` = 'STORE_NAME';
UPDATE configuration SET configuration_title = 'ショップオーナー名',  configuration_description = 'ショップオーナー名(または運営管理者名)を設定します。' WHERE `configuration_key` = 'STORE_OWNER';
UPDATE configuration SET configuration_title = 'サポート電話窓口',  configuration_description = 'サポート電話窓口の電話番号を入力してください。この番号は支払いモジュールによってはサポート電話窓口として決済会社に情報が送られる場合があります。例）paypalなど' WHERE `configuration_key` = 'STORE_TELEPHONE_CUSTSERVICE';
UPDATE configuration SET configuration_title = '国',  configuration_description = '店舗が存在する国名を入力してください。注意：変更したら店舗のゾーンの更新を忘れずに行ってください。' WHERE `configuration_key` = 'STORE_COUNTRY';
UPDATE configuration SET configuration_title = '地域',  configuration_description = 'ショップの所在地域(県名)を設定します。' WHERE `configuration_key` = 'STORE_ZONE';
UPDATE configuration SET configuration_title = '入荷予定商品の並び順',  configuration_description = '入荷予定商品の並び順を設定します。<br />・asc(昇順)<br />・desc(降順)' WHERE `configuration_key` = 'EXPECTED_PRODUCTS_SORT';
UPDATE configuration SET configuration_title = '入荷予定商品の並び順に用いるフィールド',  configuration_description = '入荷予定商品の並び順に使用するフィールドを設定します。<br />・products_name:品名<br />・date_expected:予定日' WHERE `configuration_key` = 'EXPECTED_PRODUCTS_FIELD';
UPDATE configuration SET configuration_title = '表示言語と通貨の連動',  configuration_description = '表示言語と通貨の変更を連動させるかどうか設定します。<br />true(連動)<br />false(非連動)' WHERE `configuration_key` = 'USE_DEFAULT_LANGUAGE_CURRENCY';
UPDATE configuration SET configuration_title = '表示言語の選択',  configuration_description = 'ショップのデフォルトの表示言語はショップの初期設定またはユーザーのブラウザ設定のどちらに基づくかを設定します。<br />デフォルト：ショップの初期設定' WHERE `configuration_key` = 'LANGUAGE_DEFAULT_SELECTOR';
UPDATE configuration SET configuration_title = 'サーチエンジンフレンドリーなURL表記(開発中)',  configuration_description = 'サーチエンジンに拾われやすい、静的HTMLのようなURL表記を行うかどうかを設定します。<br />注意：Googleでは動的URLのクロールが強化されたため、あまり意味はないようです。' WHERE `configuration_key` = 'SEARCH_ENGINE_FRIENDLY_URLS';
UPDATE configuration SET configuration_title = '商品の追加後にカートを表示',  configuration_description = '商品をカートに追加した直後にカートの内容を表示するか、または元ページにすぐ戻るかを設定します。<br />・true (表示)<br />・false (非表示)' WHERE `configuration_key` = 'DISPLAY_CART';
UPDATE configuration SET configuration_title = 'デフォルトの検索演算子',  configuration_description = 'デフォルトの検索演算子を設定します。' WHERE `configuration_key` = 'ADVANCED_SEARCH_DEFAULT_OPERATOR';
UPDATE configuration SET configuration_title = '商品検索対象にメタタグを含める',  configuration_description = '商品検索結果にメタタグ keywords とメタタグ descriptions を反映させますか？' WHERE `configuration_key` = 'ADVANCED_SEARCH_INCLUDE_METATAGS';
UPDATE configuration SET configuration_title = 'ショップの住所と電話番号',  configuration_description = 'ショップ名、国名、住所、電話番号を設定します。' WHERE `configuration_key` = 'STORE_NAME_ADDRESS';
UPDATE configuration SET configuration_title = 'カテゴリ内の商品数を表示',  configuration_description = 'カテゴリ内の商品数を下位カテゴリも含めてカウント表示するかどうかを設定します。<br />・true (する)<br />・false (しない)' WHERE `configuration_key` = 'SHOW_COUNTS';
UPDATE configuration SET configuration_title = '税額の小数点位置',  configuration_description = '税額の小数点以下の桁数を設定します。' WHERE `configuration_key` = 'TAX_DECIMAL_PLACES';
UPDATE configuration SET configuration_title = '価格を税込みで表示',  configuration_description = '価格を税込みで表示するかどうかを設定します。<br />・true = 価格を税込みで表示<br />・false = 税額をまとめて表示' WHERE `configuration_key` = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_title = '価格を税込みで表示 - 管理画面',  configuration_description = '管理画面で価格を税込みで表示するかどうかを設定します。<br />・true = 価格を税込みで表示<br />・false = 最後に税額を表示' WHERE `configuration_key` = 'DISPLAY_PRICE_WITH_TAX_ADMIN';
UPDATE configuration SET configuration_title = '商品にかかる税額の算定基準',  configuration_description = '商品にかかる税額を算出する際の基準を設定します。<br />・Shipping …顧客(商品送付先)の住所<br />・Billing …顧客の請求先の住所<br />・Store …ショップの所在地による(送付先・請求先ともショップの所在地域である場合に有効)<br />' WHERE `configuration_key` = 'STORE_PRODUCT_TAX_BASIS';
UPDATE configuration SET configuration_title = '送料にかかる税額の算定基準',  configuration_description = '送料にかかる税金を算出する際の基準を設定します。<br />・Shipping …顧客(商品送付先)の住所<br />・Billing …顧客の請求先の住所<br />・Store …ショップの所在地による(送付先・請求先ともショップの所在地域である場合に有効)<br />注意：この設定は配送モジュールによってオーバーライド(上書き設定)が可能です。' WHERE `configuration_key` = 'STORE_SHIPPING_TAX_BASIS';
UPDATE configuration SET configuration_title = '税金の表示',  configuration_description = '合計額が0円でも税金を表示しますか?<br />0= オフ<br />1= オン' WHERE `configuration_key` = 'STORE_TAX_DISPLAY_STATUS';
UPDATE configuration SET configuration_title = '税金の分割表示',  configuration_description = '税金が複数の種類があった場合、チェックアウトの際、別々に表示するかどうかを設定します。<br />・true = 税金を別々に表示<br />・false = 税金をまとめて表示' WHERE `configuration_key` = 'SHOW_SPLIT_TAX_CHECKOUT';
UPDATE configuration SET configuration_title = '卸売価格', configuration_description = 'サイトで<em>卸売価格</em>を有効にする必要がありますか？この機能を有効にしたくない場合は、<b>false</b> (デフォルト) を選択します。 すべての卸売顧客に対して免税を有効にする場合は [<b>免税</b>] を選択するか、卸売顧客に対して通常どおり税金を適用する場合は [<b>価格設定のみ</b>] を選択します。' WHERE configuration_key = 'WHOLESALE_PRICING_CONFIG';
UPDATE configuration SET configuration_title = 'MFA 多要素認証が必要です', configuration_description = '管理者ユーザーの二要素認証' WHERE configuration_key = 'MFA_ENABLED';
UPDATE configuration SET configuration_title = 'PA-DSSセキュリティ基準でのセッションタイムアウトを強制しますか？',  configuration_description = 'PA-DSSコンプライアンスでは全ての管理画面に対するログインセッションを、無通信時間 15分で期限切れにするよう求めています。この設定を無効にした場合、PA-DSSのルールに従っていない非コンプライアンスサイトとして、どのような証明も無効になります。' WHERE `configuration_key` = 'PADSS_ADMIN_SESSION_TIMEOUT_ENFORCED';
UPDATE configuration SET configuration_title = 'PA-DSSセキュリティ基準でのパスワードルールを強制しますか？',  configuration_description = 'PA-DSSコンプライアンスでは全ての管理画面に対するログインパスワードは、90日で変更しなければならず、過去4回以内に利用したパスワードと同じものは利用できません。この設定を無効にした場合、PA-DSSのルールに従っていない非コンプライアンスサイトとして、どのような証明も無効になります。' WHERE `configuration_key` = 'PADSS_PWD_EXPIRY_ENFORCED';
UPDATE configuration SET configuration_title = 'PA-DSS Ajax 決済処理',  configuration_description = 'PA-DSSコンプライアンスでは、組込まれている支払プログラムによっては、注文最終確認画面内で ajax を利用する事が求めています。これはサイト内で番号を入力するタイプのクレジットカード決済のような特定の支払方法を利用している場合にのみ適用されます。この設定を無効にした場合、PA-DSSのルールに従っていない非コンプライアンスサイトとして、どのような証明も無効になります。' WHERE `configuration_key` = 'PADSS_AJAX_CHECKOUT';
UPDATE configuration SET configuration_title = '顧客注文作成：対応管理者ID指定',  configuration_description = '顧客リストからの注文作成機能を利用できる管理者（一人）をIDで指定します。（管理者グループには関係ありません）　 0 に設定すると、特定の対応管理者指定の制限がなくなります。' WHERE `configuration_key` = 'EMP_LOGIN_ADMIN_ID';
UPDATE configuration SET configuration_title = '顧客注文作成：パスワード無しでログイン',  configuration_description = '認証無しで直接ショップにログインして作業できます。' WHERE `configuration_key` = 'EMP_LOGIN_AUTOMATIC';
UPDATE configuration SET configuration_title = '顧客注文作成：管理者グループ',  configuration_description = '顧客リストからの注文作成機能を利用できる管理者グループをIDで指定します。（指定の管理者グループに含まれる管理者全員がこの機能を利用可能になります）カンマ区切りでの複数指定も可能です。（例：1, 2, 3）　0 にすると、管理者グループによる制限は無効になります。<br />デフォルト：0 ' WHERE `configuration_key` = 'EMP_LOGIN_ADMIN_PROFILE_ID';
UPDATE configuration SET configuration_title = '管理画面のタイムアウト設定(秒数)',  configuration_description = '管理画面を操作しなかった場合にタイムアウトと見なす秒数を設定します。デフォルトは900秒(15分)です。PCI DSS準拠のため15分より長い時間に設定することはできません。' WHERE `configuration_key` = 'SESSION_TIMEOUT_ADMIN';
UPDATE configuration SET configuration_title = '管理画面のプログラム処理の上限時間設定(秒)<br />',  configuration_description = '管理画面においてなんらかの操作を行った場合の、プログラム処理の強制終了時間を設定します。デフォルトは60秒＝1分。この設定は、プログラム処理時間に問題がある場合などにだけ変更してください。<br />' WHERE `configuration_key` = 'GLOBAL_SET_TIME_LIMIT';
UPDATE configuration SET configuration_title = 'Zen Cart新バージョンの自動チェック(ヘッダで告知するか否か)',  configuration_description = 'Zen Cartの新バージョンがリリースされた場合、ヘッダに情報を表示しますか?<br />注意：この設定をオンにすると、管理者ページの表示が遅くなる場合があります。インターネットに繋がっていないテスト環境などではfalseにしてください。<br />' WHERE `configuration_key` = 'SHOW_VERSION_UPDATE_IN_HEADER';
UPDATE configuration SET configuration_title = 'ショップのステータス',  configuration_description = 'ショップの状態を設定します。<br />・0＝通常のショップ<br />・1＝価格表示なしのデモショップ<br />・2＝価格表示付きのデモショップ<br />' WHERE `configuration_key` = 'STORE_STATUS';
UPDATE configuration SET configuration_title = 'サーバの稼動時間(アップタイム)',  configuration_description = 'サーバの稼働時間を表示するかどうかを設定します。この情報はいくつかのサーバでエラーログとして残ることがあります。<br />true＝表示<br />false＝非表示' WHERE `configuration_key` = 'DISPLAY_SERVER_UPTIME';
UPDATE configuration SET configuration_title = 'リンク切れページのチェック',  configuration_description = 'Zen Cartがリンク切れページを検知した際に自動的にトップページに転送しますか?<br />・On = オン<br />・オフ = オフ<br />・Page Not Found = ページが見つかりません画面へ遷移する<br />注意：デバックの際などにはこの機能をオフにするとよいでしょう。' WHERE `configuration_key` = 'MISSING_PAGE_CHECK';
UPDATE configuration SET configuration_title = 'cURL プロキシ ステータス',  configuration_description = 'ホストは、cURL 通信にプロキシを使用する必要がありますか?' WHERE `configuration_key` = 'CURL_PROXY_REQUIRED';
UPDATE configuration SET configuration_title = 'cURL プロキシ アドレス',  configuration_description = 'cURL 経由で外部サイトと通信するためにプロキシを使用する必要があるホスティング サービスがある場合は、そのプロキシ アドレスをここに入力します。<br />形式: アドレス:ポート<br />例: 127.0.0.1:3128' WHERE `configuration_key` = 'CURL_PROXY_SERVER_DETAILS';
UPDATE configuration SET configuration_title = 'HTMLエディタ',  configuration_description = 'メールマガジンや商品説明などで用いるHTML/リッチテキスト用のソフトウェアを設定します。' WHERE `configuration_key` = 'HTML_EDITOR_PREFERENCE';
UPDATE configuration SET configuration_title = '注文ステータス更新時の顧客への通知 デフォルト値',  configuration_description = '注文ステータス更新時の「処理状況を顧客に通知」のデフォルト設定を指定します。Email（メールする）、No Email（メールしない）、Hide（隠す）。' WHERE `configuration_key` = 'NOTIFY_CUSTOMER_DEFAULT';
UPDATE configuration SET configuration_title = 'カテゴリ内の商品数を表示 - 管理画面',  configuration_description = 'カテゴリ内の商品数を下位カテゴリも含めてカウント表示しますか?<br />・true (する)<br />・false (しない)' WHERE `configuration_key` = 'SHOW_COUNTS_ADMIN';
UPDATE configuration SET configuration_title = 'リンク商品のステータスを表示',  configuration_description = 'カテゴリ・商品の管理でリンク商品のステータスを表示しますか？' WHERE `configuration_key` = 'SHOW_CATEGORY_PRODUCTS_LINKED_STATUS';
UPDATE configuration SET configuration_title = '通貨換算比率',  configuration_description = '為替レートの更新を行う際、あなたのショップにて換算する比率を加えますか?<br />為替レートは、為替レートサーバーから情報を得てきます。その為替レートにいくらの比率を上乗せするか決めます。<br />デフォルト: 1.05<br />これは、あなたのショップにて為替レートに1.05％上乗せするということになります。' WHERE `configuration_key` = 'CURRENCY_UPLIFT_RATIO';
UPDATE configuration SET configuration_title = '為替データ第一取得先',  configuration_description = '外部から為替情報を取得する際にどこから取得しますか？（プライマリ）<br />プラグインで追加の取得先を追加することも出来ます。' WHERE `configuration_key` = 'CURRENCY_SERVER_PRIMARY';
UPDATE configuration SET configuration_title = '為替データ第二取得先',  configuration_description = '外部から為替情報を取得する際にどこから取得しますか？（セカンダリ）<br />プラグインで追加の取得先を追加することも出来ます。' WHERE `configuration_key` = 'CURRENCY_SERVER_BACKUP';
UPDATE configuration SET configuration_title = '姓の最小文字数',  configuration_description = '姓の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_title = '名の最小文字数',  configuration_description = '名の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_title = '生年月日の最小文字数',  configuration_description = '生年月日の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_DOB_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'メールアドレスの最小文字数',  configuration_description = 'メールアドレスの文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_EMAIL_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_title = '住所の最小文字数',  configuration_description = '番地・マンション・アパート名の最小文字数を設定します。' WHERE `configuration_key` = 'ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_title = '会社名の最小文字数',  configuration_description = '会社名の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_COMPANY_MIN_LENGTH';
UPDATE configuration SET configuration_title = '郵便番号の最小文字数',  configuration_description = '郵便番号の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_POSTCODE_MIN_LENGTH';
UPDATE configuration SET configuration_title = '市区町村の最小文字数',  configuration_description = '市区町村の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_CITY_MIN_LENGTH';
UPDATE configuration SET configuration_title = '都道府県名の最小文字数',  configuration_description = '都道府県の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_STATE_MIN_LENGTH';
UPDATE configuration SET configuration_title = '電話番号の最小文字数',  configuration_description = '電話番号の文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_TELEPHONE_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'パスワードの最小文字数',  configuration_description = 'パスワードの文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_PASSWORD_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'クレジットカード名義の最小文字数',  configuration_description = 'クレジットカード所有者名の文字数の最小値を設定します。' WHERE `configuration_key` = 'CC_OWNER_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'クレジットカード番号の最小文字数',  configuration_description = 'クレジットカード番号の文字数の最小値を設定します。' WHERE `configuration_key` = 'CC_NUMBER_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'レビューの文章の最小文字数',  configuration_description = 'レビューの文章の文字数の最小値を設定します。' WHERE `configuration_key` = 'REVIEW_TEXT_MIN_LENGTH';
UPDATE configuration SET configuration_title = 'ベストセラーの最小表示件数',  configuration_description = 'ベストセラーとして表示する商品の最小値を設定します。' WHERE `configuration_key` = 'MIN_DISPLAY_BESTSELLERS';
UPDATE configuration SET configuration_title = '「こんな商品も購入しています」の最小表示数',  configuration_description = '「この商品を購入した人はこんな商品も購入しています」で表示する商品数の最小値を設定します。' WHERE `configuration_key` = 'MIN_DISPLAY_ALSO_PURCHASED';
UPDATE configuration SET configuration_title = 'ニックネームの最小文字数',  configuration_description = 'ニックネームの文字数の最小値を設定します。' WHERE `configuration_key` = 'ENTRY_NICK_MIN_LENGTH';
UPDATE configuration SET configuration_title = '管理者のユーザー名文字数',  configuration_description = '管理者ユーザー名の最小文字数を指定します。（4文字以上は必須）' WHERE `configuration_key` = 'ADMIN_NAME_MINIMUM_LENGTH';
UPDATE configuration SET configuration_title = 'アドレス帳の最大登録数',  configuration_description = '顧客が登録できるアドレス帳の登録数の最大値を設定します。' WHERE `configuration_key` = 'MAX_ADDRESS_BOOK_ENTRIES';
UPDATE configuration SET configuration_title = '管理画面 - 1ページに表示する検索結果の最大数',  configuration_description = '管理画面の1ページに表示する検索結果の数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS';
UPDATE configuration SET configuration_title = 'ページ切り替えリンク（PC）最大表示数',  configuration_description = '商品リストや購入履歴の一覧表示でページの下などに表示されるページリンクの最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PAGE_LINKS';
UPDATE configuration SET configuration_title = 'ページ切り替えリンク（モバイル）',  configuration_description = '商品リストや購入履歴の一覧表示でページの下などに表示されるページリンクの最大値を設定します。（ご利用のテンプレートでモバイル用設定が適用されている場合）' WHERE `configuration_key` = 'MAX_DISPLAY_PAGE_LINKS_MOBILE';
UPDATE configuration SET configuration_title = '特価商品の最大表示数',  configuration_description = '特価商品として表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SPECIAL_PRODUCTS';
UPDATE configuration SET configuration_title = '今月の新着商品の最大表示数',  configuration_description = '今月の新着商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = '入荷予定商品の最大表示数',  configuration_description = '入荷予定商品として表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_UPCOMING_PRODUCTS';
UPDATE configuration SET configuration_title = 'メーカーリスト - スクロールボックスのサイズ/スタイル',  configuration_description = 'スクロールボックスに表示されるメーカー数は ?<br />1か0に設定するとドロップダウンリストになります。' WHERE `configuration_key` = 'MAX_MANUFACTURERS_LIST';
UPDATE configuration SET configuration_title = 'メーカーリスト - 商品の存在を確認',  configuration_description = '各メーカーについて、1点以上の商品があり、かつ閲覧可能であるかどうかを確認しますか?<br />注意：この機能がONの場合、商品数やメーカーの数が多いと表示が遅くなります。<br />0= オフ 1= オン' WHERE `configuration_key` = 'PRODUCTS_MANUFACTURERS_STATUS';
UPDATE configuration SET configuration_title = '音楽ジャンルリスト - スクロールボックスのサイズ/スタイル',  configuration_description = 'スクロールボックスに表示される音楽ジャンルリストの数を設定します。1か0に設定すると、ドロップダウンリストになります。<br />' WHERE `configuration_key` = 'MAX_MUSIC_GENRES_LIST';
UPDATE configuration SET configuration_title = 'レコード会社リスト - スクロールボックスのサイズ/スタイル',  configuration_description = 'スクロールボックスに表示されるレコード会社リストの数です。1か0に設定すると、ドロップダウンリストになります。<br />' WHERE `configuration_key` = 'MAX_RECORD_COMPANY_LIST';
UPDATE configuration SET configuration_title = 'レコード会社名表示の長さ',  configuration_description = 'レコード会社名ボックスで表示される名前の長さを設定します。設定より長い名前は省略表示されます。<br />' WHERE `configuration_key` = 'MAX_DISPLAY_RECORD_COMPANY_NAME_LEN';
UPDATE configuration SET configuration_title = '音楽ジャンル名の文字数の長さ',  configuration_description = '音楽ジャンルボックスで表示される名前の長さを設定します。設定より長い名前は省略表示されます。<br />' WHERE `configuration_key` = 'MAX_DISPLAY_MUSIC_GENRES_NAME_LEN';
UPDATE configuration SET configuration_title = 'メーカー名の長さ',  configuration_description = 'メーカーリストで表示されるメーカー名の文字数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_MANUFACTURER_NAME_LEN';
UPDATE configuration SET configuration_title = '新しいレビューの表示数最大値',  configuration_description = '新しいレビューとして表示される数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_NEW_REVIEWS';
UPDATE configuration SET configuration_title = 'レビューのランダム表示数',  configuration_description = 'ランダムに表示するレビュー数の最大値を設定します。<br />注意：この設定値をXとすると、ランダム表示の対象になるのは、もっとも古いアクティブなレビューから数えてX番目に登録されたアクティブなレビューまでになります。' WHERE `configuration_key` = 'MAX_RANDOM_SELECT_REVIEWS';
UPDATE configuration SET configuration_title = '新着商品のランダム表示数',  configuration_description = 'ランダムに表示する新着商品数の最大値を設定します。<br />注意：この設定値をXとすると、ランダム表示の対象になるのは、もっとも古いアクティブな新着商品から数えてX番目に登録されたアクティブな新着商品までになります。' WHERE `configuration_key` = 'MAX_RANDOM_SELECT_NEW';
UPDATE configuration SET configuration_title = '特価商品のランダム表示数',  configuration_description = 'ランダムに表示する特価商品数の最大値を設定します。<br />注意：この設定値をXとすると、ランダム表示の対象になるのは、もっとも古いアクティブな特価商品から数えてX番目に登録されたアクティブな特価商品までになります。' WHERE `configuration_key` = 'MAX_RANDOM_SELECT_SPECIALS';
UPDATE configuration SET configuration_title = '一行に表示するカテゴリ数',  configuration_description = '一行に表示するカテゴリ数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_CATEGORIES_PER_ROW';
UPDATE configuration SET configuration_title = '新着商品一覧表示数',  configuration_description = '新着商品ページ１ページに表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_NEW';
UPDATE configuration SET configuration_title = 'ベストセラーの最大表示件数',  configuration_description = 'ベストセラーページ１ページに表示するベストセラー商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_BESTSELLERS';
UPDATE configuration SET configuration_title = '「こんな商品も買っています」の最大表示件数',  configuration_description = '「こんな商品も買っています」欄に表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_ALSO_PURCHASED';
UPDATE configuration SET configuration_title = '顧客の注文履歴ボックスの最大表示数',  configuration_description = '顧客の注文履歴ボックスに表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX';
UPDATE configuration SET configuration_title = '注文履歴ページの最大表示件数',  configuration_description = '顧客の注文履歴ページ１ページに表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_ORDER_HISTORY';
UPDATE configuration SET configuration_title = '顧客管理ページで表示する顧客数の最大値',  configuration_description = '' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER';
UPDATE configuration SET configuration_title = '注文管理ページで表示する注文数の最大値',  configuration_description = '' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_ORDERS';
UPDATE configuration SET configuration_title = 'レポートページで表示する商品数の最大値',  configuration_description = '' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_REPORTS';
UPDATE configuration SET configuration_title = 'カテゴリ/商品ページで表示するリスト数',  configuration_description = '１ページに表示する商品数の最大値を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_RESULTS_CATEGORIES';
UPDATE configuration SET configuration_title = '商品リスト - ページあたり最大表示数',  configuration_description = 'トップページの商品リスト表示での最大表示数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_LISTING';
UPDATE configuration SET configuration_title = '商品オプション - オプション名とオプション値の表示',  configuration_description = '商品オプションページで表示するオプション名/オプション値の最大値を設定します。' WHERE `configuration_key` = 'MAX_ROW_LISTS_OPTIONS';
UPDATE configuration SET configuration_title = '商品属性- ダウンロード管理ページの表示',  configuration_description = 'ダウンロード管理画面で、ダウンロード商品の属性の最大表示数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_DOWNLOADS_MANAGER';
UPDATE configuration SET configuration_title = 'おすすめ商品 - 管理画面でのページあたり表示最大数',  configuration_description = '管理画面において、ページあたりのおすすめ商品を最大表示件数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED_ADMIN';
UPDATE configuration SET configuration_title = 'おすすめ商品 - トップページでの最大表示数',  configuration_description = 'トップページでおすすめ商品を最大何点表示するかを設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED';
UPDATE configuration SET configuration_title = 'おすすめ商品 - 商品リストでの最大表示数',  configuration_description = '商品リストでおすすめ商品をページあたり最大何点表示するかを設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品のランダム表示ボックス - 最大表示数',  configuration_description = 'おすすめ商品のランダム表示ボックスにおいて、最大何点表示するかを設定します。' WHERE `configuration_key` = 'MAX_RANDOM_SELECT_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品 - トップページでの最大表示点数',  configuration_description = 'トップページで、特価商品を最大何点表示するかを設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX';
UPDATE configuration SET configuration_title = '新着商品 - 表示期限',  configuration_description = '新着商品の表示期限を設定します。<br />・0=全て・降順<br />・1=当月登録分のみ<br />・30=登録から30日間<br />・60=登録から60日間(ほか90、120の設定が可能)' WHERE `configuration_key` = 'SHOW_NEW_PRODUCTS_LIMIT';
UPDATE configuration SET configuration_title = '商品一覧ページ - ページあたり表示点数',  configuration_description = '商品一覧において、ページあたりの最大表示点数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_ALL';
UPDATE configuration SET configuration_title = '言語サイドボックス -　フラッグ最大表示数',  configuration_description = '言語サイドボックスにおいて、列あたりのフラッグの最大表示点数を設定します。' WHERE `configuration_key` = 'MAX_LANGUAGE_FLAGS_COLUMNS';
UPDATE configuration SET configuration_title = 'ファイルのアップロードサイズ - 上限',  configuration_description = 'ファイルアップロードの際の上限サイズを設定します。デフォルトは2MB(2,048,000バイト)です。' WHERE `configuration_key` = 'MAX_FILE_UPLOAD_SIZE';
UPDATE configuration SET configuration_title = '管理画面の注文リストで表示する注文詳細の最大件数',  configuration_description = '管理画面の注文リストでの注文詳細の最大表示件数は?<br />0 = 無制限' WHERE `configuration_key` = 'MAX_DISPLAY_RESULTS_ORDERS_DETAILS_LISTING';
UPDATE configuration SET configuration_title = '管理画面のリストで表示するPayPal IPNの最大件数',  configuration_description = '管理画面のリストでのPayPal IPNの表示件数は?<br />デフォルトは20です。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_PAYPAL_IPN';
UPDATE configuration SET configuration_title = 'マルチカテゴリマネージャで商品を表示するカラムの最大数',  configuration_description = 'マルチカテゴリマネージャ(Multiple Categories Manager)で商品を表示するカラムの最大数は?<br />3 = デフォルト' WHERE `configuration_key` = 'MAX_DISPLAY_PRODUCTS_TO_CATEGORIES_COLUMNS';
UPDATE configuration SET configuration_title = 'EZページの表示の最大件数',  configuration_description = 'EZページの表示の最大件数は?<br />20 = デフォルト' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_EZPAGE';
UPDATE configuration SET configuration_title = 'プレビュー最大文字数',  configuration_description = 'プレビューの最大文字数<br />デフォルト = 100' WHERE `configuration_key` = 'MAX_PREVIEW';
UPDATE configuration SET configuration_title = '商品画像(小)の横幅',  configuration_description = '小さな画像の横幅(ピクセル)を設定します。' WHERE `configuration_key` = 'SMALL_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = '商品画像(小)の高さ',  configuration_description = '小さな画像の高さ(ピクセル)を設定します。' WHERE `configuration_key` = 'SMALL_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = 'ヘッダ画像の横幅 - 管理画面',  configuration_description = '管理画面でのヘッダ画像の横幅を設定します。' WHERE `configuration_key` = 'HEADING_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = 'ヘッダ画像の高さ - 管理画面',  configuration_description = '管理画面でのヘッダ画像の高さを設定します。' WHERE `configuration_key` = 'HEADING_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = 'サブカテゴリ画像の横幅',  configuration_description = 'サブカテゴリ画像の横幅をピクセル数で設定します。' WHERE `configuration_key` = 'SUBCATEGORY_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = 'サブカテゴリ画像の高さ',  configuration_description = 'サブカテゴリ画像の高さをピクセル数で設定します。' WHERE `configuration_key` = 'SUBCATEGORY_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = '画像サイズを計算',  configuration_description = '画像サイズを自動的に計算するかどうかを設定します。' WHERE `configuration_key` = 'CONFIG_CALCULATE_IMAGE_SIZE';
UPDATE configuration SET configuration_title = '画像を必須とする',  configuration_description = '画像がないことを表示します。(カタログの作成時に有効)' WHERE `configuration_key` = 'IMAGE_REQUIRED';
UPDATE configuration SET configuration_title = 'ショッピングカートの中身 - 商品画像の表示オン・オフ',  configuration_description = 'ショッピングカートの中身に入っている商品の画像を表示するかどうかを設定します。<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'IMAGE_SHOPPING_CART_STATUS';
UPDATE configuration SET configuration_title = 'ショッピングカートの中身の画像の横幅',  configuration_description = 'デフォルト = 50' WHERE `configuration_key` = 'IMAGE_SHOPPING_CART_WIDTH';
UPDATE configuration SET configuration_title = 'ショッピングカートの中身の画像の高さ',  configuration_description = 'デフォルト = 40' WHERE `configuration_key` = 'IMAGE_SHOPPING_CART_HEIGHT';
UPDATE configuration SET configuration_title = '商品情報 - カテゴリアイコン画像の横幅',  configuration_description = '商品情報ページでのカテゴリアイコンの横幅(ピクセル数)は?' WHERE `configuration_key` = 'CATEGORY_ICON_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = '商品情報 - カテゴリアイコン画像の高さ',  configuration_description = '商品情報ページでのカテゴリアイコンの高さ(ピクセル数)は?' WHERE `configuration_key` = 'CATEGORY_ICON_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = 'トップカテゴリアイコン画像の横幅',  configuration_description = 'カテゴリに下位カテゴリページを含む場合、表示するカテゴリアイコンの横幅(ピクセル数)は?' WHERE `configuration_key` = 'SUBCATEGORY_IMAGE_TOP_WIDTH';
UPDATE configuration SET configuration_title = 'トップカテゴリアイコン画像の高さ',  configuration_description = 'カテゴリに下位カテゴリページを含む場合、表示するカテゴリアイコンの高さ(ピクセル数)は?' WHERE `configuration_key` = 'SUBCATEGORY_IMAGE_TOP_HEIGHT';
UPDATE configuration SET configuration_title = '商品情報 - 画像の横幅',  configuration_description = '商品画像の横幅を設定します。' WHERE `configuration_key` = 'MEDIUM_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = '商品情報 - 画像の高さ',  configuration_description = '商品画像の高さを設定します。' WHERE `configuration_key` = 'MEDIUM_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = '商品情報 - 画像(中)のファイル接尾辞(Suffix)',  configuration_description = '商品画像のファイル接尾辞を設定します。<br />・デフォルト = _MED' WHERE `configuration_key` = 'IMAGE_SUFFIX_MEDIUM';
UPDATE configuration SET configuration_title = '商品情報 - 画像(大)のファイル接尾辞(Suffix)',  configuration_description = '商品画像のファイル接尾辞を設定します。<br />・デフォルト = _LRG' WHERE `configuration_key` = 'IMAGE_SUFFIX_LARGE';
UPDATE configuration SET configuration_title = 'パターンに一致する追加画像', configuration_description = '&quot;strict&quot; = 常に &quot;_&quot; サフィックスを使用する<br>&quot;legacy&quot; = サブディレクトリでのみ &quot;_&quot; サフィックスを使用する<br>（v210 より前は legacy がデフォルトでした）<br>デフォルト = strict' WHERE configuration_key = 'ADDITIONAL_IMAGES_MODE';
UPDATE configuration SET configuration_title = '商品情報 - １行に表示する追加画像数',  configuration_description = '商品情報で１行に表示する追加画像数を設定します。<br />・デフォルト = 3' WHERE `configuration_key` = 'IMAGES_AUTO_ADDED';
UPDATE configuration SET configuration_title = '商品リスト - 画像の横幅',  configuration_description = 'デフォルト = 100' WHERE `configuration_key` = 'IMAGE_PRODUCT_LISTING_WIDTH';
UPDATE configuration SET configuration_title = '商品リスト - 画像の高さ',  configuration_description = 'デフォルト = 80' WHERE `configuration_key` = 'IMAGE_PRODUCT_LISTING_HEIGHT';
UPDATE configuration SET configuration_title = '新商品リスト - 画像の横幅',  configuration_description = 'デフォルト = 100' WHERE `configuration_key` = 'IMAGE_PRODUCT_NEW_LISTING_WIDTH';
UPDATE configuration SET configuration_title = '新商品リスト - 画像の高さ',  configuration_description = 'デフォルト = 80' WHERE `configuration_key` = 'IMAGE_PRODUCT_NEW_LISTING_HEIGHT';
UPDATE configuration SET configuration_title = '新商品 - 画像の横幅',  configuration_description = 'デフォルト = 100' WHERE `configuration_key` = 'IMAGE_PRODUCT_NEW_WIDTH';
UPDATE configuration SET configuration_title = '新商品 - 画像の高さ',  configuration_description = 'デフォルト = 80' WHERE `configuration_key` = 'IMAGE_PRODUCT_NEW_HEIGHT';
UPDATE configuration SET configuration_title = 'おすすめ商品 -画像の幅',  configuration_description = 'デフォルト = 100' WHERE `configuration_key` = 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH';
UPDATE configuration SET configuration_title = 'おすすめ商品 - 画像の高さ',  configuration_description = 'デフォルト = 80' WHERE `configuration_key` = 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT';
UPDATE configuration SET configuration_title = '全商品一覧 - 画像の幅',  configuration_description = 'デフォルト = 100' WHERE `configuration_key` = 'IMAGE_PRODUCT_ALL_LISTING_WIDTH';
UPDATE configuration SET configuration_title = '全商品一覧 - 画像の高さ',  configuration_description = 'デフォルト = 80' WHERE `configuration_key` = 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT';
UPDATE configuration SET configuration_title = '商品画像 - 画像がない場合のNo Image画像',  configuration_description = '「No Image」画像を自動的に表示するかどうかを設定します。<br />・0= オフ<br />・1= オン<br />' WHERE `configuration_key` = 'PRODUCTS_IMAGE_NO_IMAGE_STATUS';
UPDATE configuration SET configuration_title = '商品画像 - No Image画像の指定',  configuration_description = '商品画像がない場合に表示するNo Image画像を設定します。<br />デフォルト = no_picture.gif' WHERE `configuration_key` = 'PRODUCTS_IMAGE_NO_IMAGE';
UPDATE configuration SET configuration_title = '商品画像 - 商品・カテゴリでプロポーショナルな画像を使う',  configuration_description = '商品情報・カテゴリでプロポーショナルな画像を使いますか?<br />注意：プロポーショナル画像には高さ・横幅とも"0"(ピクセル)を指定しないでください。<br />0= オフ 1= オン' WHERE `configuration_key` = 'PROPORTIONAL_IMAGES_STATUS';
UPDATE configuration SET configuration_title = '(メール用)敬称表示(Mr. or Ms)',  configuration_description = '顧客のアカウント作成の際、メール用の敬称(Mr. or Ms) を表示するかどうかを設定します。' WHERE `configuration_key` = 'ACCOUNT_GENDER';
UPDATE configuration SET configuration_title = '生年月日',  configuration_description = '顧客のアカウント作成の際、「生年月日」の欄を表示するかどうかを設定します。<br />注意: 不要な場合はfalseに、必要な場合はtrueを指定してください。' WHERE `configuration_key` = 'ACCOUNT_DOB';
UPDATE configuration SET configuration_title = '会社名',  configuration_description = '顧客のアカウント作成の際、「会社名」を表示するかどうかを設定します。' WHERE `configuration_key` = 'ACCOUNT_COMPANY';
UPDATE configuration SET configuration_title = '住所2',  configuration_description = '顧客のアカウント作成の際、「住所2」を表示するかどうかを設定します。' WHERE `configuration_key` = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_title = '都道府県名',  configuration_description = '顧客のアカウント作成の際、「都道府県名」を表示するかどうかを設定します。' WHERE `configuration_key` = 'ACCOUNT_STATE';
UPDATE configuration SET configuration_title = '都道府県名 - ドロップダウンで表示',  configuration_description = '「都道府県名」は常にドロップダウン形式で表示しますか?' WHERE `configuration_key` = 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN';
UPDATE configuration SET configuration_title = 'アカウントのデフォルト国別IDの作成',  configuration_description = 'アカウントのデフォルト国別IDを設定します。<br />デフォルトはJapanです。' WHERE `configuration_key` = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';
UPDATE configuration SET configuration_title = 'Fax番号',  configuration_description = '顧客のアカウント作成の際、「Fax番号」を表示するかどうかを設定します。' WHERE `configuration_key` = 'ACCOUNT_FAX_NUMBER';
UPDATE configuration SET configuration_title = 'メールマガジンのチェックボックスの表示',  configuration_description = 'メールマガジンのチェックボックスの表示設定をします。<br />0= 表示オフ<br />1= ボックス表示・チェックなし状態<br />2= ボックス表示・チェックあり状態<br />【注意】デフォルトで「チェックあり」の状態にしておくと、各国のスパム規制法規に抵触する恐れがあります。' WHERE `configuration_key` = 'ACCOUNT_NEWSLETTER_STATUS';
UPDATE configuration SET configuration_title = 'デフォルトのメール形式の設定',  configuration_description = '顧客のデフォルトのメール形式を設定します。<br />0= テキスト形式<br />1= HTML形式' WHERE `configuration_key` = 'ACCOUNT_EMAIL_PREFERENCE';
UPDATE configuration SET configuration_title = '顧客への商品の通知 - ステータス',  configuration_description = '顧客がチェックアウト後に、商品の通知(product notifications)について尋ねるかどうかを設定します。<br />・0= 尋ねない<br />・1= 尋ねる(サイト全体に対して設定されていない場合)<br />【注意】サイドボックスはこの設定とは別にオフにする必要があります。' WHERE `configuration_key` = 'CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS';
UPDATE configuration SET configuration_title = '商品・価格の閲覧制限',  configuration_description = '顧客がショップ内で商品や価格を閲覧するのを制限するかどうかを設定します。<br />0= 要ログインなどの制限なし<br />1= ブラウスにはログインが必須<br />2= ログインなしでブラウズ可能だが価格は非表示<br />3= 商品閲覧のみ<br />【注意】オプション「2」は、サーチエンジンのロボットに収集されたくない場合や、ログイン済みの顧客にのみ価格を開示したい場合に有効です。' WHERE `configuration_key` = 'CUSTOMERS_APPROVAL';
UPDATE configuration SET configuration_title = '顧客の購入オーソライズ',  configuration_description = 'ショップでの購入に際して、顧客はショップ側に審査・許可される必要があるかどうかを設定します。<br />0= 不要<br />1= 商品の閲覧にも許可が必要<br />2= 商品の閲覧は自由だが価格の閲覧は許可された顧客のみ<br />3= 商品の閲覧、価格の閲覧は自由だが購入は許可された顧客のみ<br />【注意】オプション「2」「3」はサーチエンジンのロボット除けに用いることもできます。' WHERE `configuration_key` = 'CUSTOMERS_APPROVAL_AUTHORIZATION';
UPDATE configuration SET configuration_title = '顧客のオーソライズ(閲覧制限) - ファイル名',  configuration_description = '顧客のオーソライズ(閲覧制限)に使うファイル名を設定します。拡張子なしで表記してください。<br />デフォルトは<br />"customers_authorization"' WHERE `configuration_key` = 'CUSTOMERS_AUTHORIZATION_FILENAME';
UPDATE configuration SET configuration_title = '顧客のオーソライズ(閲覧制限) - ヘッダを隠す',  configuration_description = '顧客のオーソライズ(閲覧制限) でヘッダを表示するかどうかを設定します。<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'CUSTOMERS_AUTHORIZATION_HEADER_OFF';
UPDATE configuration SET configuration_title = '顧客のオーソライズ(閲覧制限) - 左カラムを隠す',  configuration_description = '顧客のオーソライズ(閲覧制限) で、左カラムを表示するかどうかを設定します。<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF';
UPDATE configuration SET configuration_title = '顧客のオーソライズ(閲覧制限) - 右カラムを隠す',  configuration_description = '顧客のオーソライズ(閲覧制限)で、右カラムを表示するかどうかを設定します。<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF';
UPDATE configuration SET configuration_title = '顧客のオーソライズ(閲覧制限) - フッタを隠す',  configuration_description = '顧客のオーソライズ(閲覧制限) で、フッタを表示するかどうかを設定します。<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'CUSTOMERS_AUTHORIZATION_FOOTER_OFF';
UPDATE configuration SET configuration_title = '顧客の紹介(Customers Referral)ステータス',  configuration_description = '顧客の紹介コードについて設定します。<br />0= オフ<br />1= 1st Discount Coupon Code used最初のディスカウントクーポンを使用済み<br />2= アカウント作成の際、顧客自身が追加・編集可能<br />注意：顧客の紹介コードがセットされると、管理画面からだけ変更することができます。' WHERE `configuration_key` = 'CUSTOMERS_REFERRAL_STATUS';
UPDATE configuration SET configuration_title = 'インストール済みの支払いモジュール',  configuration_description = 'インストールされている支払いモジュールのファイル名のリスト( セミコロン(;)区切り )です。この情報は自動的に更新されますので編集の必要はありません。' WHERE `configuration_key` = 'MODULE_PAYMENT_INSTALLED';
UPDATE configuration SET configuration_title = 'インストール済み注文合計モジュール',  configuration_description = 'インストールされている注文合計モジュールのファイル名のリスト(セミコロン(;)区切り)です。<br />【注意】この情報は自動的に更新されますので編集の必要はありません。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_INSTALLED';
UPDATE configuration SET configuration_title = 'インストール済み配送モジュール',  configuration_description = 'インストールされている配送モジュールのファイル名のリスト(セミコロン(;)区切り)です。この情報は自動的に更新されますので編集の必要はありません。' WHERE `configuration_key` = 'MODULE_SHIPPING_INSTALLED';
UPDATE configuration SET configuration_title = '送料無料を有効にする', configuration_description = '送料無料をご希望ですか？' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_STATUS';
UPDATE configuration SET configuration_title = '受け取り場所', configuration_description = '場所のリストをセミコロン (;) で区切って入力します。<br />必要に応じて、カンマと金額を追加して、各場所の料金/追加料金を指定できます。金額が指定されていない場合は、次の設定の一般的な送料金額が適用されます。<br /><br />例：<br />121 Main Street;20 Church Street<br />Sunnyside,4.00;Lee Park,5.00;High Street,0.00<br />Dallas;Tulsa,5.00;Phoenix,0.00<br />多言語で使用する場合は、このモジュールの言語ファイルの定義ステートメントを参照してください。' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_LOCATIONS_LIST';
UPDATE configuration SET configuration_title = '送料無料', configuration_description = '送料はいくらかかりますか？' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_COST';
UPDATE configuration SET configuration_title = '手数料', configuration_description = 'この配送方法の手数料。' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_HANDLING';
UPDATE configuration SET configuration_title = '税種別', configuration_description = '送料には以下の税金区分を使用します。' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_TAX_CLASS';
UPDATE configuration SET configuration_title = '配送地域', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_ZONE';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順。' WHERE configuration_key = 'MODULE_SHIPPING_FREESHIPPER_SORT_ORDER';
UPDATE configuration SET configuration_title = '店舗受け取りを有効にする', configuration_description = '店内送料を提供したいですか？' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_STATUS';
UPDATE configuration SET configuration_title = '輸送費t', configuration_description = 'この配送方法を使用したすべての注文の送料。' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_COST';
UPDATE configuration SET configuration_title = '税種別', configuration_description = '送料には以下の税金区分を使用します。' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_TAX_CLASS';
UPDATE configuration SET configuration_title = '課税標準', configuration_description = '配送料はどのような基準で計算されますか。オプションは：<br />配送 - 顧客の配送先住所に基づく<br />請求 - 顧客に基づく 請求先住所' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_TAX_BASIS';
UPDATE configuration SET configuration_title = '配送地域', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_ZONE';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順。' WHERE configuration_key = 'MODULE_SHIPPING_STOREPICKUP_SORT_ORDER';
UPDATE configuration SET configuration_title = '商品ごとの配送を有効にする', configuration_description = '商品ごとの送料を設定しますか？' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_STATUS';
UPDATE configuration SET configuration_title = '輸送費', configuration_description = 'この配送方法を使用する注文では、送料に商品の数が乗算されます。' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_COST';
UPDATE configuration SET configuration_title = '手数料', configuration_description = 'この配送方法の手数料' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_HANDLING';
UPDATE configuration SET configuration_title = '税種別', configuration_description = '送料には以下の税金区分を使用します。' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_TAX_CLASS';
UPDATE configuration SET configuration_title = '課税標準', configuration_description = '配送料はどのような基準で計算されますか。オプションは：<br />配送 - 顧客の配送先住所に基づく<br />請求 - 顧客に基づく 請求先住所<br />ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_TAX_BASIS';
UPDATE configuration SET configuration_title = '配送地域', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_ZONE';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順。' WHERE configuration_key = 'MODULE_SHIPPING_ITEM_SORT_ORDER';
UPDATE configuration SET configuration_title = '無料の支払い請求モジュールを有効にする', configuration_description = '無料の料金支払いを受け入れますか？' WHERE configuration_key = 'MODULE_PAYMENT_FREECHARGER_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順。 最低値が最初に表示されます。' WHERE configuration_key = 'MODULE_PAYMENT_FREECHARGER_SORT_ORDER';
UPDATE configuration SET configuration_title = '支払い地域', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_PAYMENT_FREECHARGER_ZONE';
UPDATE configuration SET configuration_title = '注文ステータスの設定', configuration_description = 'この支払いモジュールで行われた注文のステータスをこの値に設定します' WHERE configuration_key = 'MODULE_PAYMENT_FREECHARGER_ORDER_STATUS_ID';
UPDATE configuration SET configuration_title = '小切手/為替モジュールを有効にする', configuration_description = '小切手/郵便為替での支払いを受け入れますか？' WHERE configuration_key = 'MODULE_PAYMENT_MONEYORDER_STATUS';
UPDATE configuration SET configuration_title = '支払先を次のとおりにします。', configuration_description = '支払いは誰に支払われるべきですか？' WHERE configuration_key = 'MODULE_PAYMENT_MONEYORDER_PAYTO';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順。 最低値が最初に表示されます。' WHERE configuration_key = 'MODULE_PAYMENT_MONEYORDER_SORT_ORDER';
UPDATE configuration SET configuration_title = 'Payment Zone', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_PAYMENT_MONEYORDER_ZONE';
UPDATE configuration SET configuration_title = '注文ステータスの設定', configuration_description = 'この支払いモジュールで行われた注文のステータスをこの値に設定します' WHERE configuration_key = 'MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID';
UPDATE configuration SET configuration_title = '税込',  configuration_description = '割引計算前に税額を金額に含めますか?' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_INC_TAX';
UPDATE configuration SET configuration_title = 'このモジュールがインストールされています',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_SORT_ORDER';
UPDATE configuration SET configuration_title = '送料込み',  configuration_description = '割引計算前に配送料を金額に含めますか?' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_INC_SHIPPING';
UPDATE configuration SET configuration_title = '税金を再計算する',  configuration_description = '税金を再計算する' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_CALC_TAX';
UPDATE configuration SET configuration_title = '税区分',  configuration_description = '団体割引を貸方票として扱う場合は、次の税区分を使用します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GROUP_PRICING_TAX_CLASS';
UPDATE configuration SET configuration_title = '一律配送を有効にする', configuration_description = '定額配送を提供したいですか？' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_STATUS';
UPDATE configuration SET configuration_title = '輸送費', configuration_description = 'この配送方法を使用したすべての注文の送料。' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_COST';
UPDATE configuration SET configuration_title = '税種別', configuration_description = '送料には以下の税金区分を使用します。' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_TAX_CLASS';
UPDATE configuration SET configuration_title = '課税標準', configuration_description = '配送料はどのような基準で計算されますか。オプションは：<br />配送 - 顧客の配送先住所に基づく<br />請求 - 顧客に基づく 請求先住所<br />ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_TAX_BASIS';
UPDATE configuration SET configuration_title = '配送地域', configuration_description = '配送地域を選択すると選択された地域のみで利用可能となります。' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_ZONE';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順' WHERE configuration_key = 'MODULE_SHIPPING_FLAT_SORT_ORDER';
UPDATE configuration SET configuration_title = 'デフォルトの通貨',  configuration_description = 'デフォルトの通貨を設定します。' WHERE `configuration_key` = 'DEFAULT_CURRENCY';
UPDATE configuration SET configuration_title = 'デフォルトの言語',  configuration_description = 'デフォルトの言語を設定します。' WHERE `configuration_key` = 'DEFAULT_LANGUAGE';
UPDATE configuration SET configuration_title = '新規注文のデフォルトステータス',  configuration_description = '新規の注文を受け付けたときのデフォルトステータスを設定します。' WHERE `configuration_key` = 'DEFAULT_ORDERS_STATUS_ID';
UPDATE configuration SET configuration_title = '管理画面で設定キー(configuration_key)を表示',  configuration_description = '管理画面で設定キー(configuration_key)を表示しますか?<br />表示したい場合は1に設定してください。' WHERE `configuration_key` = 'ADMIN_CONFIGURATION_KEY_ON';
UPDATE configuration SET configuration_title = '出荷国名',  configuration_description = '配送料の計算に利用するための国名を選択します。' WHERE `configuration_key` = 'SHIPPING_ORIGIN_COUNTRY';
UPDATE configuration SET configuration_title = 'ショップの郵便番号',  configuration_description = 'ショップの郵便番号を入力します。' WHERE `configuration_key` = 'SHIPPING_ORIGIN_ZIP';
UPDATE configuration SET configuration_title = '一回の配送で配送可能な最大重量(kg)',  configuration_description = '一回の配送で可能な重量(kg)の最大値を設定します。例えば10kgに設定した状態でカートに30kgの商品があった場合、10kg × 3回の配送という形で処理されます。' WHERE `configuration_key` = 'SHIPPING_MAX_WEIGHT';
UPDATE configuration SET configuration_title = '小・中パッケージの風袋 - 比率・重量',  configuration_description = '典型的な小・中パッケージの風袋(ふうたい：大きさと重量)を設定します。<br>例：<br>単位 = SHIPPING_WEIGHT_UNITS　（lbsまたはkgs）<br>10% + 1単位 10:1<br>10% + 0単位 10:0<br>0% + 5単位 0:5<br>0% + 0単位 0:0' WHERE `configuration_key` = 'SHIPPING_BOX_WEIGHT';
UPDATE configuration SET configuration_title = '大型パッケージの風袋 - 大きさ・重量',  configuration_description = '大きなパッケージの風袋風袋(ふうたい：大きさと重量)を設定します。<br>例：<br>単位 = SHIPPING_WEIGHT_UNITS （lbsまたはkgs）<br>10% + 1単位 10:1<br>10% + 0単位 10:0<br>0% + 5単位 0:5<br>0% + 0単位 0:0' WHERE `configuration_key` = 'SHIPPING_BOX_PADDING';
UPDATE configuration SET configuration_title = '出荷重量単位', configuration_description = '出荷モジュールは商品に設定された重量をどのように扱うべきですか？（ポンドを使用する場合は、1 オンス = 0.0625 を覚えておいてください。）。<b>注：正しい単位を視覚的に表示するには、言語ファイルを手動で更新する必要があります。</b>' WHERE configuration_key = 'SHIPPING_WEIGHT_UNITS';
UPDATE configuration SET configuration_title = '出荷の寸法単位', configuration_description = 'ストアでは、商品の長さ、幅、高さのどの測定単位が保存されていますか?' WHERE configuration_key = 'SHIPPING_DIMENSION_UNITS';
UPDATE configuration SET configuration_title = '個数と重量の表示',  configuration_description = '配送する荷物の個数と重量を表示するかどうかを設定します。<br />・0= オフ<br />・1= 個数のみ表示<br />・2= 重量のみ表示<br />・3= 両方表示' WHERE `configuration_key` = 'SHIPPING_BOX_WEIGHT_DISPLAY';
UPDATE configuration SET configuration_title = '送料概算表示の表示・非表示',  configuration_description = '送料概算ボタンの表示するかどうかを設定します。<br />・0= オフ<br />・1= ショッピングカート上にボタンとして表示<br />・2= ショッピングカートページにリストとして表示' WHERE `configuration_key` = 'SHOW_SHIPPING_ESTIMATOR_BUTTON';
UPDATE configuration SET configuration_title = '納品書への注文のコメント表示',  configuration_description = '納品書に注文のコメント欄を表示しますか?<br />・0= いいえ<br />・1= 一つ目のコメントのみ表示<br />・2= 全てのコメントを表示' WHERE `configuration_key` = 'ORDER_COMMENTS_INVOICE';
UPDATE configuration SET configuration_title = '配送表への注文のコメント表示',  configuration_description = '配送表に注文のコメント欄を表示しますか?<br />・0= いいえ<br />・1= 一つ目のコメントのみ表示<br />・2= 全てのコメントを表示' WHERE `configuration_key` = 'ORDER_COMMENTS_PACKING_SLIP';
UPDATE configuration SET configuration_title = '注文の重量が0なら送料無料に',  configuration_description = '注文の重量が0の場合、送料無料にしますか?<br />・0= いいえ<br />・1= はい<br />注意：「送料無料」表記をしたい場合には送料無料モジュールを使うことをお勧めします。このオプションは実際に送料無料のときに表示されるだけです。' WHERE `configuration_key` = 'ORDER_WEIGHT_ZERO_STATUS';
UPDATE configuration SET configuration_title = '商品イメージの表示',  configuration_description = '商品一覧中の商品画像の表示・非表示/並び順を設定します。<br />・数値が小さいほど先に表示<br />・0 = 非表示' WHERE `configuration_key` = 'PRODUCT_LIST_IMAGE';
UPDATE configuration SET configuration_title = '商品メーカーの表示',  configuration_description = '商品のメーカー名を表示するかどうかを設定します。<br />・数値が小さいほど先に表示<br />・0 = 非表示' WHERE `configuration_key` = 'PRODUCT_LIST_MANUFACTURER';
UPDATE configuration SET configuration_title = '商品型番の表示',  configuration_description = '商品一覧中の商品型番の表示・非表示/並び順を設定します。数値が小さいほど先に表示されます。(0 = 非表示)' WHERE `configuration_key` = 'PRODUCT_LIST_MODEL';
UPDATE configuration SET configuration_title = '商品名',  configuration_description = '商品一覧中の商品名の表示・非表示/並び順を設定します。<br />・数値が小さいほど先に表示<br />・0 = 非表示' WHERE `configuration_key` = 'PRODUCT_LIST_NAME';
UPDATE configuration SET configuration_title = '商品価格・「カートに追加」を表示',  configuration_description = '商品価格・「カートに追加」ボタンを表示するかどうかを設定します。<br />・数値が小さいほど先に表示<br />・0 = 非表示' WHERE `configuration_key` = 'PRODUCT_LIST_PRICE';
UPDATE configuration SET configuration_title = '商品数量の表示',  configuration_description = '商品一覧中の商品数量の表示・非表示/並び順を設定します。<br />・数値が小さいほど先に表示<br />・0 = 非表示' WHERE `configuration_key` = 'PRODUCT_LIST_QUANTITY';
UPDATE configuration SET configuration_title = '商品重量の表示',  configuration_description = '商品一覧中の商品重量の表示・非表示/並び順を設定します。数値が小さいほど先に表示されます。(0 = 非表示)' WHERE `configuration_key` = 'PRODUCT_LIST_WEIGHT';
UPDATE configuration SET configuration_title = '商品価格・「カートに追加」カラムの幅',  configuration_description = '商品価格・「カートに追加」ボタンを表示するカラムの幅(ピクセル数)を設定します。<br />・Default= 125' WHERE `configuration_key` = 'PRODUCTS_LIST_PRICE_WIDTH';
UPDATE configuration SET configuration_title = 'カテゴリ/メーカーの絞り込みの表示',  configuration_description = 'カテゴリ一覧ページで [絞り込み] を表示するかどうかを設定します。<br />・0=非表示<br />・1=表示' WHERE `configuration_key` = 'PRODUCT_LIST_FILTER';
UPDATE configuration SET configuration_title = '[前ページ] [次ページ] の表示位置',  configuration_description = '[前ページ] [次ページ] の表示位置を設定します。<br />・1 = 上<br />・2 = 下<br />・3 = 両方' WHERE `configuration_key` = 'PREV_NEXT_BAR_LOCATION';
UPDATE configuration SET configuration_title = '商品リストのデフォルト並び順',  configuration_description = '商品リストのデフォルトの並び順を設定します。<br />注意：商品でソートする場合は空欄に。<br />並べ替え順序の設定を取得するには、デフォルトの表示を開始する順序で製品リストを並べ替えます。 例: 2a' WHERE `configuration_key` = 'PRODUCT_LISTING_DEFAULT_SORT_ORDER';
UPDATE configuration SET configuration_title = '新商品のデフォルトの並べ替え順序', configuration_description = '新商品の表示にはどのようなデフォルトの並べ替え順序を使用しますか？<br />デフォルト:新しい日付から古い日付までの場合は 6<br /><br />1= 商品名<br />2=商品名を降順に<br />3= 価格の安い順、商品名<br />4= 価格の高い順、商品名<br />5=モデル参照<br />6= 追加日降順で<br />7= 追加日<br />8= 商品の並べ替え順序' WHERE configuration_key = 'PRODUCT_NEW_LIST_SORT_DEFAULT';
UPDATE configuration SET configuration_title = '注目の商品のデフォルトの並べ替え順序', configuration_description = '注目の商品の表示にはどのようなデフォルトの並べ替え順序を使用しますか？<br />デフォルト：商品名に 1<br /><br />1= 商品名<br />2=商品名を降順に<br />3= 価格の安い順、商品名<br />4= 価格の高い順、商品名<br />5=モデル参照<br />6= 追加日降順で<br />7= 追加日<br />8= 商品の並べ替え順序' WHERE configuration_key = 'PRODUCT_FEATURED_LIST_SORT_DEFAULT';
UPDATE configuration SET configuration_title = 'すべての商品のデフォルトの並べ替え順序', configuration_description = 'すべての商品の表示にはどのようなデフォルトの並べ替え順序を使用しますか？<br />デフォルト：商品名に 1<br /><br />1= 商品名<br />2=商品名を降順に<br />3= 価格の安い順、商品名<br />4= 価格の高い順、商品名<br />5=モデル参照<br />6= 追加日降順で<br />7= 追加日<br />8= 商品の並べ替え順序' WHERE configuration_key = 'PRODUCT_ALL_LIST_SORT_DEFAULT';
UPDATE configuration SET configuration_title = '今後の商品が新商品として含まれないようにマスクする', configuration_description = '今後の商品がリスト、サイド ボックス、センター ボックスに新商品として含まれないようにマスクしますか?<br />0= オフ<br />1= オン' WHERE configuration_key = 'SHOW_NEW_PRODUCTS_UPCOMING_MASKED';
UPDATE configuration SET configuration_title = '「カートに追加」ボタンの表示',  configuration_description = '「カートに追加」ボタンを表示するかどうかを設定します。<br />・0= いいえ<br />・1= はい<br />・2= はい、商品の個数欄と共に表示します。<br />注意: 数量欄の表示をいいえにしていたり、オプションを設定している際は表示されません。' WHERE `configuration_key` = 'PRODUCT_LIST_PRICE_BUY_NOW';
UPDATE configuration SET configuration_title = 'リスト内各商品への注文数量欄の表示とボタンの表示',  configuration_description = 'リスト内各商品への数量欄の表示の有無と「選択した商品をカートに追加」ボタンの表示位置を設定します。<br />0= オフ<br />1= 上部<br />2= 下部<br />3= 両方' WHERE `configuration_key` = 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART';
UPDATE configuration SET configuration_title = '商品説明の表示',  configuration_description = '商品説明を表示するかどうかを設定します。<br />0= オフ<br />150= 推奨する長さ。または自由に表示する商品説明の最大文字数を設定してください。' WHERE `configuration_key` = 'PRODUCT_LIST_DESCRIPTION';
UPDATE configuration SET configuration_title = '商品リストの昇順を表示する記号',  configuration_description = '商品リストの昇順を示す記号は?<br />デフォルト = +' WHERE `configuration_key` = 'PRODUCT_LIST_SORT_ORDER_ASCENDING';
UPDATE configuration SET configuration_title = '商品リストの降順を表示する記号',  configuration_description = '商品リストの降順を示す記号は?<br />デフォルト = -' WHERE `configuration_key` = 'PRODUCT_LIST_SORT_ORDER_DESCENDING';
UPDATE configuration SET configuration_title = 'グリッドレイアウトカラム数',  configuration_description = '商品リスト画面での一行毎のカラム数を指定してください。（グリッドレイアウトになります）<br />推奨値：3<br /> 1 にすると従来のリスト表示レイアウトになります。' WHERE `configuration_key` = 'PRODUCT_LISTING_COLUMNS_PER_ROW';
UPDATE configuration SET configuration_title = '商品リストの英語名でのソートボタン',  configuration_description = '商品リストに英語名でのソートボタンを表示しますか?<br />・true (する)<br />・false (しない)' WHERE `configuration_key` = 'PRODUCT_LIST_ALPHA_SORTER';
UPDATE configuration SET configuration_title = '商品リストのサブカテゴリ画像',  configuration_description = '商品リストのサブカテゴリで画像を表示しますか?<br />・true (する)<br />・false (しない)' WHERE `configuration_key` = 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS';
UPDATE configuration SET configuration_title = '商品リストのトップカテゴリ画像',  configuration_description = '商品リストのトップカテゴリで画像を表示しますか?<br />・true (する)<br />・false (しない)' WHERE `configuration_key` = 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP';
UPDATE configuration SET configuration_title = 'トップカテゴリ内サブカテゴリのリンク表示',  configuration_description = 'トップカテゴリページでサブカテゴリのリンクを表示するかどうか設定します。<br />・0=非表示<br />・1=表示' WHERE `configuration_key` = 'PRODUCT_LIST_CATEGORY_ROW_STATUS';
UPDATE configuration SET configuration_title = '在庫水準のチェック',  configuration_description = '十分な在庫があるかチェックするかどうかを設定します。' WHERE `configuration_key` = 'STOCK_CHECK';
UPDATE configuration SET configuration_title = '在庫数からマイナス',  configuration_description = '受注時点で各在庫数から注文数をマイナスしますか?' WHERE `configuration_key` = 'STOCK_LIMITED';
UPDATE configuration SET configuration_title = 'チェックアウトを許可',  configuration_description = '在庫が不足している場合にチェックアウトを許可しますか?' WHERE `configuration_key` = 'STOCK_ALLOW_CHECKOUT';
UPDATE configuration SET configuration_title = '在庫切れ商品のサイン',  configuration_description = '注文時点で商品が在庫切れの場合に顧客へ表示するサインを設定します。' WHERE `configuration_key` = 'STOCK_MARK_PRODUCT_OUT_OF_STOCK';
UPDATE configuration SET configuration_title = '在庫の再注文水準',  configuration_description = '在庫の再注文が必要になる商品数を設定します。' WHERE `configuration_key` = 'STOCK_REORDER_LEVEL';
UPDATE configuration SET configuration_title = '在庫切れ商品のステータス変更',  configuration_description = '商品の在庫がない場合のステータス表示を設定します。<br />0= 商品ステータスをOFFに<br />1= 商品ステータスはONのまま' WHERE `configuration_key` = 'SHOW_PRODUCTS_SOLD_OUT';
UPDATE configuration SET configuration_title = '検索エンジンの無効な商品ステータス',  configuration_description = '商品のステータスが無効になっているがデータベースから削除されていない場合に、検索エンジンに対して、有効な状態としてレスポンスしますか？<br />例：<br />True = HTTP 200 「正常」レスポンスを返します<br />False = HTTP 410「ページが削除されました」レスポンスを返します<br />(商品が削除された状態では HTTP 404「ページが見つかりません」 になります)<br />デフォルト：false' WHERE `configuration_key` = 'DISABLED_PRODUCTS_TRIGGER_HTTP200';
UPDATE configuration SET configuration_title = '在庫切れ商品に「売り切れ」画像表示',  configuration_description = '在庫がなくなった商品の場合に「カートに追加」ボタンの代わりに「売り切れ」画像を表示しますか?<br />・0= 表示しない<br />・1= 表示する' WHERE `configuration_key` = 'SHOW_PRODUCTS_SOLD_OUT_IMAGE';
UPDATE configuration SET configuration_title = '提供開始日で商品を有効化/無効化する',  configuration_description = '商品に指定した「提供開始日」を判定基準として自動で商品ステータスを有効にする（ショップ上に表示）事が出来ます。<br />Manual = 手動で設定<br />Automatic = 自動で有効化<br />' WHERE `configuration_key` = 'ENABLE_DISABLED_UPCOMING_PRODUCT';
UPDATE configuration SET configuration_title = '商品数量に指定できる小数点の桁数',  configuration_description = '商品の数量に小数点の利用を許可する桁数を設定します。<br />・0= オフ' WHERE `configuration_key` = 'QUANTITY_DECIMALS';
UPDATE configuration SET configuration_title = 'ショッピングカート - 「削除」チェックボックス/ボタン',  configuration_description = '「削除」チェックボックス/ボタンの表示について設定します。<br />1= ボタンのみ<br />2= チェックボックスのみ<br />3= ボタン/チェックボックス両方' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_DELETE';
UPDATE configuration SET configuration_title = 'ショッピングカート -「カートの中身を更新」ボタンの位置',  configuration_description = '「カートの中身を更新」ボタンの位置を設定します。<br />1=「注文数」欄の横<br />2= 商品リストの下<br />3=「注文数」欄の横と商品リストの下<br />注意：この設定は3つの"tpl_shopping_cart_default"ファイルが呼ばれる部分を設定します。' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_UPDATE';
UPDATE configuration SET configuration_title = 'ショッピングカートが空の場合の新着商品の表示',  configuration_description = 'ショッピングカートが空の場合の新着商品の表示を設定します。<br />・0= オフ' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'ショッピングカートが空の場合のおすすめ商品の表示',  configuration_description = 'ショッピングカートが空の場合のおすすめ商品の表示を設定します。。<br />・0= オフ' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = 'ショッピングカートが空の場合の特価商品の表示',  configuration_description = 'ショッピングカートが空の場合の特価商品の表示を設定します。<br />・0= オフ' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = 'ショッピングカートが空の場合の入荷予定商品の表示',  configuration_description = 'ショッピングカートが空の場合の入荷予定商品の表示を設定します。<br />・0= オフ' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_EMPTY_UPCOMING';
UPDATE configuration SET configuration_title = 'ログイン時のショッピングカートへの動作',  configuration_description = 'ログインする前にカートに商品を入れたままにしていた際、次回のログイン時のショッピングカートの動作を設定します。<br />0= 動作しない<br />1= 動作し、通知を行わずに直接ショッピングカートへ<br />3= 動作し、通知を行うだけでショッピングカートへはいかない' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_COMBINED';
UPDATE configuration SET configuration_title = 'データベースクエリの記録',  configuration_description = 'データベースクエリをシステムの /logs/ フォルダ内に記録保存します。利用上の注意：この機能を使うことによりサイトのパフォーマンスに大きな影響を及ぼす可能性があります、またサーバーのディスクスペースをかなり消費します。この機能を有効にした場合、PA-DSSのルールに従っていない非コンプライアンスサイトとして、どのような証明も無効になります。' WHERE `configuration_key` = 'STORE_DB_TRANSACTIONS';
UPDATE configuration SET configuration_title = '全てのエラーを報告（管理画面）',  configuration_description = '全てのPHPエラー内容をデバッグログファイルに残しますか？　これには管理画面の操作中に発生する警告も含まれます。言語定義の重複を除くすべてのPHPエラーをログに記録する場合は、IgnoreDups を選択します。' WHERE `configuration_key` = 'REPORT_ALL_ERRORS_ADMIN';
UPDATE configuration SET configuration_title = '全てのエラーを報告（ショップ画面）',  configuration_description = '全てのPHPエラー内容をデバッグログファイルに残しますか？　これにはショップ画面の操作中に発生する警告も含まれます。言語定義の重複を除くすべてのPHPエラーをログに記録する場合は、IgnoreDups を選択します。<br />稼働中のショップにおいては、パフォーマンスを極度に低下させることになりますので有効にしない事をお勧めします。' WHERE `configuration_key` = 'REPORT_ALL_ERRORS_STORE';
UPDATE configuration SET configuration_title = '全てのエラーを報告：通知エラーのバックトレース',  configuration_description = '「通知」エラーに関するバックトレース情報を含めますか？これらは通常、識別されたファイルに分離されており、バックトレース情報はログを埋めるだけです。デフォルト：No' WHERE `configuration_key` = 'REPORT_ALL_ERRORS_NOTICE_BACKTRACE';
UPDATE configuration SET configuration_title = 'メール送信 - 接続方法',  configuration_description = 'メール送信にsendmailへのローカル接続を使用するかTCP/IP経由のSMTP接続を使用するかを設定します。サーバのOSがWindowsやMacOSの場合はSMTPに設定してください。<br />SMTPAUTHは、サーバーがメール送信の際にSMTP authorizationを求める場合にのみ使ってください。その場合、管理画面でSMTPAUTH設定を行う必要があります。<br />"Sendmail -f"は、-fパラメータが必要なサーバ向けの設定で、スプーフィングを防ぐために用いられることが多いセキュリティ上の設定です。メールサーバーのホスト側で使用可能な設定になっていない場合、エラーになることがあります。' WHERE `configuration_key` = 'EMAIL_TRANSPORT';
UPDATE configuration SET configuration_title = 'SMTP認証 - メールアカウント',  configuration_description = 'あなたのホスティングサービスが提供しているメールアカウント(例：me@mydomain.com)を入力してください。これはSMTP認証に必要な情報です。<br />メールにSMTP認証を使っている場合にのみ必要です。' WHERE `configuration_key` = 'EMAIL_SMTPAUTH_MAILBOX';
UPDATE configuration SET configuration_title = 'SMTP認証 - パスワード',  configuration_description = 'SMTPメールボックスのパスワードを入力してください。<br />メールにSMTP認証を使っている場合にのみ必要です。' WHERE `configuration_key` = 'EMAIL_SMTPAUTH_PASSWORD';
UPDATE configuration SET configuration_title = 'SMTP認証 - DNS名',  configuration_description = 'SMTPメールサーバのDNS名を入力してください。<br />例：mail.mydomain.com or 55.66.77.88<br />メールにSMTP認証を使っている場合にのみ必要です。' WHERE `configuration_key` = 'EMAIL_SMTPAUTH_MAIL_SERVER';
UPDATE configuration SET configuration_title = 'SMTP認証 - IPポート番号',  configuration_description = 'SMTPメールサーバが運用されているIPポート番号を入力してください。<br />メールにSMTP認証を使っている場合にのみ必要です。' WHERE `configuration_key` = 'EMAIL_SMTPAUTH_MAIL_SERVER_PORT';
UPDATE configuration SET configuration_title = 'メールマガジンSMTP認証 - メールアカウント', configuration_description = 'あなたのホスティングサービスが提供しているメールマガジンのメールボックス アカウント名 (me@mydomain.com) を入力します。 This is the account name that your newsletter host requires for SMTP authentication.' WHERE configuration_key = 'NEWSLETTER_EMAIL_SMTPAUTH_MAILBOX';
UPDATE configuration SET configuration_title = 'メールマガジンSMTP認証 - パスワード', configuration_description = 'メールマガジン SMTP メールボックスのパスワードを入力てください。' WHERE configuration_key = 'NEWSLETTER_EMAIL_SMTPAUTH_PASSWORD';
UPDATE configuration SET configuration_title = 'メールマガジンSMTP認証 - DNS名', configuration_description = 'バルク メール用に別のメール サーバーを使用している場合は、メールマガジン SMTP メール サーバーの DNS 名を入力します。' WHERE configuration_key = 'NEWSLETTER_EMAIL_SMTPAUTH_MAIL_SERVER';
UPDATE configuration SET configuration_title = 'メールマガジンSMTP認証 - サーバポート', configuration_description = 'メールマガジンの SMTP メールサーバーが動作する IP ポート番号を入力します。<br /><br />デフォルト: 587<br />一般的な値は次のとおりです。<br />587 - 暗号化された SMTP<br />465 - 古い MS SMTP ポート。' WHERE configuration_key = 'NEWSLETTER_EMAIL_SMTPAUTH_MAIL_SERVER_PORT';
UPDATE configuration SET configuration_title = 'メールマガジン モジュール', configuration_description = 'Enter a comma-separated list of the modules that should use the newsletter settings when sending email (rather than the regular email settings).' WHERE configuration_key = 'NEWSLETTER_MODULES';
UPDATE configuration SET configuration_title = 'メールを送信',  configuration_description = 'E-Mailを外部に送信するかどうかを設定します。' WHERE `configuration_key` = 'SEND_EMAILS';
UPDATE configuration SET configuration_title = 'メール送信にMIME HTMLを使用',  configuration_description = 'メールをHTML形式で送信するかどうかを設定します。' WHERE `configuration_key` = 'EMAIL_USE_HTML';
UPDATE configuration SET configuration_title = 'メールアドレスをDNSで確認',  configuration_description = 'メールアドレスをDNSサーバに問い合わせ確認するかどうかを設定します。' WHERE `configuration_key` = 'ENTRY_EMAIL_ADDRESS_CHECK';
UPDATE configuration SET configuration_title = 'メール保存の設定',  configuration_description = '送信済みのメールを保存しておく場合はtrueを設定してください。' WHERE `configuration_key` = 'EMAIL_ARCHIVE';
UPDATE configuration SET configuration_title = 'メールアドレス (ショップに表示する問い合わせ先)',  configuration_description = 'ショップオーナーのメールアドレスとしてサイト上で表示されるアドレスを設定します。' WHERE `configuration_key` = 'STORE_OWNER_EMAIL_ADDRESS';
UPDATE configuration SET configuration_title = 'メールアドレス (顧客への送信元)',  configuration_description = '顧客に送信されるメールのデフォルトの送信元として表示されるアドレスを設定します。<br />管理画面でメールを作成をする都度、書き換えることもできます。' WHERE `configuration_key` = 'EMAIL_FROM';
UPDATE configuration SET configuration_title = '送信メールの送信元アドレスの実在性',  configuration_description = 'お使いのメールサーバでは、送信するメールの送信元(From)アドレスがWebサーバ上に実在することが必須ですか?<br />spam送信を防止するなどのためにこのように設定されていることがあります。Yesに設定すると、送信元アドレスとメール内のFromアドレスが一致していることが求められます。' WHERE `configuration_key` = 'EMAIL_SEND_MUST_BE_STORE';
UPDATE configuration SET configuration_title = '管理者が送信するメールフォーマット',  configuration_description = '管理者が送付するメールフォーマットを設定します。<br />・TEXT =テキスト形式<br />・HTML =HTML形式' WHERE `configuration_key` = 'ADMIN_EXTRA_EMAIL_FORMAT';
UPDATE configuration SET configuration_title = '注文確認メール(コピー)送信先',  configuration_description = '顧客に送信される注文確認メールのコピーを送付するメールアドレスを設定します。<br />記入例: 名前1 <email@address1>, 名前2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_ORDER_EMAILS_TO';
UPDATE configuration SET configuration_title = 'アカウント作成完了メール(コピー)の送信',  configuration_description = 'アカウント作成完了メールのコピーを指定のメールアドレスに送信しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = 'アカウント作成完了メール(コピー)の送信先',  configuration_description = 'アカウント作成完了メールのコピーを送信するメールアドレスを設定します。<br />記入例： 名前1 <email@address1>, 名前2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO';
UPDATE configuration SET configuration_title = 'ギフト券送付メール(コピー)の送信',  configuration_description = '顧客が送付するギフト券送付メールのコピーを送信しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = 'ギフト券送付メール(コピー)の送信先',  configuration_description = '顧客が送付するギフト券送付メールのコピーを送信するメールアドレスを設定します。<br />記入例： 名前1 <email@address1>, 名前2<email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO';
UPDATE configuration SET configuration_title = 'ショップ運営者からのギフト券送付メール(コピー)の送信',  configuration_description = 'ショップ運営者からのギフト券送付メールのコピーを送信しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SEND_EXTRA_GV_ADMIN_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = 'ショップ運営者からのギフト券送付メール(コピー)の送信先',  configuration_description = 'ショップ運営者からのギフト券送付メールのコピーを送信するメールアドレスを設定します。<br />記入例：名前1 <email@address1>, 名前2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_GV_ADMIN_EMAILS_TO';
UPDATE configuration SET configuration_title = 'ショップ運営者からのクーポン券送付メール(コピー)の送信',  configuration_description = 'ショップ運営者からのクーポン券送付メールのコピーを送信しますか?<br />0= オフ 1= オン' WHERE `configuration_key` = 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = 'ショップ運営者からのクーポン券送付メール(コピー)の送信先',  configuration_description = 'ショップ運営者からのクーポン券送付メールのコピーを送信するメールアドレスを設定します。<br />記入例： 名前1 <email@address1>, 名前2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO';
UPDATE configuration SET configuration_title = 'ショップ運営者の注文ステータスメール(コピー)の送信',  configuration_description = 'ショップ運営者の注文ステータスメールのコピーを送信しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = 'ショップ運営者の注文ステータスメール(コピー)の送信先',  configuration_description = 'ショップ運営者の注文ステータスメールのコピーを送信するメールアドレスを設定します。<br />記入例： 名前1 <email@address1>, 名前2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO';
UPDATE configuration SET configuration_title = '掲載待ちレビューについてメール送信',  configuration_description = '掲載待ちのレビューについてメールを送信しますか?<br />0= オフ 1= オン' WHERE `configuration_key` = 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO_STATUS';
UPDATE configuration SET configuration_title = '掲載待ちレビューについてのメール送信先',  configuration_description = '掲載待ちのレビューについてのメールを送信するアドレスを設定します。<br />フォーマット：Name 1 <email@address1>, Name 2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO';
UPDATE configuration SET configuration_title = '「お問い合わせ」メールのドロップダウン設定',  configuration_description = '「お問い合わせ」ページで、メールアドレスのリストを設定し、ドロップダウンリストとして表示できます。<br />フォーマット：Name 1 <email@address1>, Name 2 <email@address2>' WHERE `configuration_key` = 'CONTACT_US_LIST';
UPDATE configuration SET configuration_title = '「お問い合わせ」にショップ名と住所を表記',  configuration_description = '「お問い合わせ」画面にショップ名と住所を表記するかどうかを設定します。<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CONTACT_US_STORE_NAME_ADDRESS';
UPDATE configuration SET configuration_title = '在庫わずかになったらメール送信',  configuration_description = '商品の在庫が水準を下回った際にメールを送信するかどうかを設定します。<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SEND_LOWSTOCK_EMAIL';
UPDATE configuration SET configuration_title = '在庫わずかになった際のメール送信先',  configuration_description = '商品の在庫が水準を下回った際にメールを送信するアドレスを設定します。複数設定することができます。<br />フォーマット：Name 1 <email@address1>, Name 2 <email@address2>' WHERE `configuration_key` = 'SEND_EXTRA_LOW_STOCK_EMAILS_TO';
UPDATE configuration SET configuration_title = '「メールマガジンの購読解除」リンクの表示',  configuration_description = '「メールマガジンの購読解除」リンクをインフォメーションサイドボックスに表示しますか?' WHERE `configuration_key` = 'SHOW_NEWSLETTER_UNSUBSCRIBE_LINK';
UPDATE configuration SET configuration_title = 'オンラインユーザー数の表示設定',  configuration_description = 'オンラインのユーザ(audiences/recipients)を表示する際、recipientsを含めますか?<br />【注意】この設定をtrueにすると、沢山の顧客がいる場合などに表示が遅くなる場合があります。' WHERE `configuration_key` = 'AUDIENCE_SELECT_DISPLAY_COUNTS';
UPDATE configuration SET configuration_title = 'ダウンロードを有効にする',  configuration_description = '商品のダウンロード機能を設定します。' WHERE `configuration_key` = 'DOWNLOAD_ENABLED';
UPDATE configuration SET configuration_title = 'リダイレクトでダウンロード画面へ',  configuration_description = 'ダウンロードの際にブラウザによるリダイレクト(転送)を可能にするかどうかを設定します。<br />UNIX系でないサーバではオフにしてください。<br />注意：この設定をオンにしたら、/pub ディレクトリのパーミッションを777にしてください。' WHERE `configuration_key` = 'DOWNLOAD_BY_REDIRECT';
UPDATE configuration SET configuration_title = 'ストリーミングによるダウンロード',  configuration_description = '「リダイレクトでダウンロード」がオフで、かつPHP memory_limit設定が8MB以下の場合、この設定をオンにしてください。ストリーミングで、より小さな単位でのファイル転送を行うためです。<br />「リダイレクトでダウンロード」がオンの場合、効果はありません。' WHERE `configuration_key` = 'DOWNLOAD_IN_CHUNKS';
UPDATE configuration SET configuration_title = 'ダウンロードの有効期限(日数)',  configuration_description = 'ダウンロードリンクの有効期間の日数を設定します。<br />・0 = 無期限' WHERE `configuration_key` = 'DOWNLOAD_MAX_DAYS';
UPDATE configuration SET configuration_title = 'ダウンロード可能回数(商品ごと)',  configuration_description = 'ダウンロードできる回数の最大値を設定します。<br />・0 = ダウンロード不可' WHERE `configuration_key` = 'DOWNLOAD_MAX_COUNT';
UPDATE configuration SET configuration_title = 'ダウンロード設定 - 注文状況による更新',  configuration_description = 'orders_statusによるダウンロードの有効期限・可能回数のリセットについて設定します。<br />デフォルト = 4' WHERE `configuration_key` = 'DOWNLOADS_ORDERS_STATUS_UPDATED_VALUE';
UPDATE configuration SET configuration_title = 'ダウンロード可能となる注文ステータスのID - デフォルト >= 2',  configuration_description = 'ダウンロード可能となる注文ステータスのID - デフォルト >= 2<br />注文ステータスのIDがこの値より高い注文はダウンロード可能になります。購入完了時の注文ステータスは支払いモジュールに毎に設定されます。' WHERE `configuration_key` = 'DOWNLOADS_CONTROLLER_ORDERS_STATUS';
UPDATE configuration SET configuration_title = 'ダウンロード終了となる注文ステータスのID',  configuration_description = 'ダウンロード終了となる注文ステータスのID - デフォルト >= 4<br />注文ステータスがこの値より高い注文はダウンロードが終了となります。' WHERE `configuration_key` = 'DOWNLOADS_CONTROLLER_ORDERS_STATUS_END';
UPDATE configuration SET configuration_title = 'プライスファクター属性を有効にする',  configuration_description = '「商品オプション属性の管理」でプライスファクター属性を利用可能にするかどうかを設定します。<br />注意：無効にすると、既存の設定値がクリアされます。' WHERE `configuration_key` = 'ATTRIBUTES_ENABLED_PRICE_FACTOR';
UPDATE configuration SET configuration_title = '「数量割引」属性を利用可能にする',  configuration_description = '「商品価格の管理」」で 「数量割引」属性を利用するかどうかを設定します。<br />注意：無効にすると、既存の設定値がクリアされます。' WHERE `configuration_key` = 'ATTRIBUTES_ENABLED_QTY_PRICES';
UPDATE configuration SET configuration_title = 'イメージ属性のオン/オフ',  configuration_description = 'イメージ属性のオン/オフを設定します。' WHERE `configuration_key` = 'ATTRIBUTES_ENABLED_IMAGES';
UPDATE configuration SET configuration_title = '入力テキスト(単語数・文字数)による価格設定のオン/オフ',  configuration_description = '「商品オプション属性の管理」画面で、入力されたテキストによる「単語毎の価格 」「文字毎の価格」設定を利用可能にするかどうかを設定します。' WHERE `configuration_key` = 'ATTRIBUTES_ENABLED_TEXT_PRICES';
UPDATE configuration SET configuration_title = 'テキストによる価格設定 - 空欄の場合は無料',  configuration_description = 'テキストによる価格設定の場合、空欄のままなら無料にするかどうかを設定します。<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'TEXT_SPACES_FREE';
UPDATE configuration SET configuration_title = 'Read Only属性の商品 -「カートに追加」ボタンの表示',  configuration_description = 'READONLY属性だけが設定された商品に「カートに追加」ボタンを表示しますか?<br />0= オフ<br />1= オン' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_READONLY_IGNORED';
UPDATE configuration SET configuration_title = 'GZip圧縮を使用する',  configuration_description = 'HTTP通信にGZip圧縮を使用してページを転送しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'GZIP_LEVEL';
UPDATE configuration SET configuration_title = 'セッション情報保存ディレクトリ',  configuration_description = 'セッション管理がファイルベースの場合に保存するディレクトリを設定します。' WHERE `configuration_key` = 'SESSION_WRITE_DIRECTORY';
UPDATE configuration SET configuration_title = 'クッキーに保存するドメイン名の設定',  configuration_description = 'クッキーに保存するドメイン名について設定します。<br />・True = ドメインネーム全体をクッキーに保存(例：www.mydomain.com)<br />・False = ドメインネームの一部を保存(例：mydomain.com)。<br />よくわからない場合はこの設定はTrueにしておいてください。' WHERE `configuration_key` = 'SESSION_USE_FQDN';
UPDATE configuration SET configuration_title = 'クッキー利用を必須にする',  configuration_description = 'セッションに必ずクッキーを利用します。True指定するとブラウザのクッキーがオフになっている場合はセッションを開始しません。セキュリティ上の理由から余程の理由のない限りはTrue指定のままとすることを強く推奨します。' WHERE `configuration_key` = 'SESSION_FORCE_COOKIE_USE';
UPDATE configuration SET configuration_title = 'SSLセッションIDチェック',  configuration_description = '全てのHTTPSリクエストでSSLセッションIDをチェックしますか?' WHERE `configuration_key` = 'SESSION_CHECK_SSL_SESSION_ID';
UPDATE configuration SET configuration_title = 'User Agentチェック',  configuration_description = '全てのリクエスト時にUser Agentのチェックを行いますか?' WHERE `configuration_key` = 'SESSION_CHECK_USER_AGENT';
UPDATE configuration SET configuration_title = 'IPアドレスチェック',  configuration_description = '全てのリクエスト時にIPアドレスをチェックしますか?' WHERE `configuration_key` = 'SESSION_CHECK_IP_ADDRESS';
UPDATE configuration SET configuration_title = 'ロボット(スパイダー)のセッションを防止',  configuration_description = '既知のロボット(スパイダー)がセッションを開始することを防止しますか?' WHERE `configuration_key` = 'SESSION_BLOCK_SPIDERS';
UPDATE configuration SET configuration_title = 'セッション再発行',  configuration_description = 'ユーザーがログオンまたはアカウントを作成した場合にセッションを再発行しますか?<br />(PHP4.1以上が必要)' WHERE `configuration_key` = 'SESSION_RECREATE';
UPDATE configuration SET configuration_title = 'IPアドレス変換の設定',  configuration_description = 'IPアドレスをホストアドレスに変換しますか?<br />注意：サーバによっては、この設定でメール送信のスタート・終了が遅くなることがあります。' WHERE `configuration_key` = 'SESSION_IP_TO_HOST_ADDRESS';
UPDATE configuration SET configuration_title = 'ギフト券/クーポンコードの長さ',  configuration_description = 'ギフト券/クーポンコードの長さを設定します。<br />注意：コードが長いほど安全です。' WHERE `configuration_key` = 'SECURITY_CODE_LENGTH';
UPDATE configuration SET configuration_title = '差引残高0の場合の注文ステータス',  configuration_description = '注文の差引残高が0の場合に適用される注文ステータスを設定します。' WHERE `configuration_key` = 'DEFAULT_ZERO_BALANCE_ORDERS_STATUS_ID';
UPDATE configuration SET configuration_title = '会員登録時のウェルカムクーポン券プレゼント',  configuration_description = '会員登録時にその会員にウェルカムクーポン券として自動発行するクーポン券を選択してください。' WHERE `configuration_key` = 'NEW_SIGNUP_DISCOUNT_COUPON';
UPDATE configuration SET configuration_title = '会員登録時のウェルカムギフト券プレゼント金額',  configuration_description = '会員登録時にその会員に対して自動発行するギフト券の金額を入力してください。<br />・空白 = なし<br />・1000 = 1000円' WHERE `configuration_key` = 'NEW_SIGNUP_GIFT_VOUCHER_AMOUNT';
UPDATE configuration SET configuration_title = 'クーポン券のページあたり最大表示件数',  configuration_description = 'クーポン券の1ページあたりの表示件数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS';
UPDATE configuration SET configuration_title = 'クーポン券レポートのページあたり最大表示件数',  configuration_description = 'クーポン券のレポートページでの表示件数を設定します。' WHERE `configuration_key` = 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS_REPORTS';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - VISA',  configuration_description = 'VISAを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_VISA';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - MasterCard',  configuration_description = 'MasterCardを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_MC';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - AmericanExpress',  configuration_description = 'AmericanExpressを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_AMEX';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - Diners Club',  configuration_description = 'Diners Clubを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_DINERS_CLUB';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - Discover Card',  configuration_description = 'Discover Cardを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_DISCOVER';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - JCB',  configuration_description = 'JCBを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_JCB';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - AUSTRALIAN BANKCARD',  configuration_description = 'AUSTRALIAN BANKCARDを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_AUSTRALIAN_BANKCARD';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - SOLO',  configuration_description = 'SOLOを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_SOLO';
UPDATE configuration SET configuration_title = 'クレジット カード有効ステータス - デビット',  configuration_description = 'デビットカードを受け入れる 0= オフ 1= オン<br />注: 現時点では、これは深く統合されていません。お使いの支払いモジュールに、この切り替えを受け入れるための具体的なコードがまだない場合、この設定は冗長になる可能性があります。' WHERE `configuration_key` = 'CC_ENABLED_DEBIT';
UPDATE configuration SET configuration_title = 'クレジットカード利用の可否 - Maestro',  configuration_description = 'Maestroを有効にしますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'CC_ENABLED_MAESTRO';
UPDATE configuration SET configuration_title = '利用可能なクレジットカード - 支払いページに表示',  configuration_description = '利用可能なクレジットカードを支払いページに表示しますか?<br />・0= オフ<br />・1= テキストを表示<br />・2= 画像を表示<br />【注意】クレジットカードの画像とテキストは、データベースとランゲージファイル内で定義されている必要があります。' WHERE `configuration_key` = 'SHOW_ACCEPTED_CREDIT_CARDS';
UPDATE configuration SET configuration_title = 'このモジュールがインストールされています',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_SORT_ORDER';
UPDATE configuration SET configuration_title = 'キュー購入',  configuration_description = 'ギフト券の購入をキューに入れますか?' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_QUEUE';
UPDATE configuration SET configuration_title = '送料込み',  configuration_description = '配送料を計算に含める' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_INC_SHIPPING';
UPDATE configuration SET configuration_title = '税込',  configuration_description = '税金を計算に含めます。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_INC_TAX';
UPDATE configuration SET configuration_title = '税金を再計算する',  configuration_description = '税金を再計算する' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_CALC_TAX';
UPDATE configuration SET configuration_title = '税区分',  configuration_description = 'ギフト券を貸方票として扱う場合は、次の税区分を使用してください。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_TAX_CLASS';
UPDATE configuration SET configuration_title = 'Credit including Tax',  configuration_description = 'Add tax to purchased Gift Voucher when crediting to Account' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_CREDIT_TAX';
UPDATE configuration SET configuration_title = 'Set Order Status',  configuration_description = 'Set the status of orders made where GV covers full payment' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_GV_ORDER_STATUS_ID';
UPDATE configuration SET configuration_title = 'このモジュールがインストールされています', configuration_description = '' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順', configuration_description = '表示の整列順を設定します。' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_SORT_ORDER';
UPDATE configuration SET configuration_title = '低注文手数料を適用する', configuration_description = '低注文手数料を適用しますか?' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_LOW_ORDER_FEE';
UPDATE configuration SET configuration_title = '最低注文の注文手数料', configuration_description = 'この金額未満の注文には、最低注文手数料を追加します。' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_ORDER_UNDER';
UPDATE configuration SET configuration_title = '注文手数料', configuration_description = 'パーセンテージ計算の場合は、% を含めます。例： 10%<br />一律の金額の場合は、金額を入力するだけです - 例: $5.00 の場合は 5。' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_FEE';
UPDATE configuration SET configuration_title = '行われた注文に低額の注文手数料を適用する', configuration_description = '設定された宛先に送信される注文には、低額の注文手数料が適用されます。' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_DESTINATION';
UPDATE configuration SET configuration_title = '税区分', configuration_description = '低注文手数料には、次の税区分を使用してください。' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_TAX_CLASS';
UPDATE configuration SET configuration_title = '仮想製品の注文手数料は低額ではありません', configuration_description = 'カートが仮想製品のみの場合、低額の注文手数料を請求しない' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_VIRTUAL';
UPDATE configuration SET configuration_title = 'ギフト券には低価格の注文手数料はかかりません', configuration_description = 'カートがギフト券のみの場合、低額の注文手数料は請求されません' WHERE configuration_key = 'MODULE_ORDER_TOTAL_LOWORDERFEE_GV';
UPDATE configuration SET configuration_title = '送料の表示',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SHIPPING_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。<br />数字が小さいほど上位に表示されます。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER';
UPDATE configuration SET configuration_title = '送料無料設定',  configuration_description = '送料無料設定を有効にしますか?' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING';
UPDATE configuration SET configuration_title = '送料無料にする購入金額設定',  configuration_description = '設定金額以上のご購入の場合は送料を無料にします。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER';
UPDATE configuration SET configuration_title = '送料無料にする地域の設定',  configuration_description = '設定した地域に対して送料無料を適用します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SHIPPING_DESTINATION';
UPDATE configuration SET configuration_title = '小計の表示',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。<br />数字が小さいほど上位に表示されます。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER';
UPDATE configuration SET configuration_title = 'このモジュールがインストールされています',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_TAX_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_TAX_SORT_ORDER';
UPDATE configuration SET configuration_title = '合計の表示',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_TOTAL_STATUS';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定できます。<br />数字が小さいほど上位に表示されます。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER';
UPDATE configuration SET configuration_title = '税区分',  configuration_description = '割引クーポンを貸方票として扱う場合は、次の税区分を使用してください。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_TAX_CLASS';
UPDATE configuration SET configuration_title = '税込',  configuration_description = '税金を計算に含めます。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_INC_TAX';
UPDATE configuration SET configuration_title = '表示の整列順',  configuration_description = '表示の整列順を設定します。' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_SORT_ORDER';
UPDATE configuration SET configuration_title = 'Include Shipping',  configuration_description = 'Include Shipping in calculation' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_INC_SHIPPING';
UPDATE configuration SET configuration_title = 'このモジュールがインストールされています',  configuration_description = '' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_STATUS';
UPDATE configuration SET configuration_title = '税金を再計算する',  configuration_description = '税金を再計算する' WHERE `configuration_key` = 'MODULE_ORDER_TOTAL_COUPON_CALC_TAX';
UPDATE configuration SET configuration_title = '商品オプション - セレクトボックス型',  configuration_description = 'セレクトボックス型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_SELECT';
UPDATE configuration SET configuration_title = '商品オプション - テキスト型',  configuration_description = 'テキスト型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_TEXT';
UPDATE configuration SET configuration_title = '商品オプション - ラジオボタン型',  configuration_description = 'ラジオボタン型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_RADIO';
UPDATE configuration SET configuration_title = '商品オプション - チェックボックス型',  configuration_description = 'チェックボックス型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_CHECKBOX';
UPDATE configuration SET configuration_title = '商品オプション - ファイル型',  configuration_description = 'ファイル型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_FILE';
UPDATE configuration SET configuration_title = 'テキストおよびファイル商品のオプション値の ID',  configuration_description = 'テキスト型・ファイル型属性のproducts_options_values_idで使われる数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_VALUES_TEXT_ID';
UPDATE configuration SET configuration_title = 'アップロードオプションの接頭辞(Prefix)',  configuration_description = 'アップロードオプションを他のオプションと区別するために使う接頭辞(Prefix)は?' WHERE `configuration_key` = 'UPLOAD_PREFIX';
UPDATE configuration SET configuration_title = 'テキストの接頭辞(Prefix)',  configuration_description = 'テキストオプションを他のオプションと区別するために使う接頭辞(Prefix)は?' WHERE `configuration_key` = 'TEXT_PREFIX';
UPDATE configuration SET configuration_title = '商品オプション - READ ONLY型',  configuration_description = 'READ ONLY型の商品オプションの数値は?' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_TYPE_READONLY';
UPDATE configuration SET configuration_title = 'ログインモード https',  configuration_description = 'システム設定。 編集しないでください。' WHERE `configuration_key` = 'SSLPWSTATUSCHECK';
UPDATE configuration SET configuration_title = 'デフォルトのターゲット カテゴリ （複数カテゴリ マネージャへの商品）',  configuration_description = '商品のデフォルトのターゲット カテゴリを複数カテゴリ マネージャに設定 (ページで設定)' WHERE `configuration_key` = 'P2C_TARGET_CATEGORY_DEFAULT';
UPDATE configuration SET configuration_title = '商品情報 - 商品オプションの並び順',  configuration_description = '商品情報における商品オプション名の並び順を設定します。<br />・0= 設定された並び順とオプション名順<br />・1= オオプション名順' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_SORT_ORDER';
UPDATE configuration SET configuration_title = '商品情報 - 商品オプション値の並び順',  configuration_description = '商品情報における商品オプション値の並び順を設定します。<br />・0= 設定された並び順と価格順<br />・1= 設定された並び順とオプション値順' WHERE `configuration_key` = 'PRODUCTS_OPTIONS_SORT_BY_PRICE';
UPDATE configuration SET configuration_title = '商品情報 - 商品の属性画像の下にオプション値を表示',  configuration_description = '商品の属性画像の下にオプション名を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'PRODUCT_IMAGES_ATTRIBUTES_NAMES';
UPDATE configuration SET configuration_title = '商品情報 - セール割引内容表示',  configuration_description = 'セールの割引率・値引額を表示しますか？<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SHOW_SALE_DISCOUNT_STATUS';
UPDATE configuration SET configuration_title = '商品情報 - セール割引内容の表示方法(値引金額表示・割引率表示)',  configuration_description = 'セール割引内容の表示形式を設定します。<br />・1= 割引率(%) を使って XX% OFF表示<br />・2= 値引金額 を使って XX円 OFF表示' WHERE `configuration_key` = 'SHOW_SALE_DISCOUNT';
UPDATE configuration SET configuration_title = '商品情報 - 割引率表示の小数点',  configuration_description = '割引率表示のパーセントの小数点位置を設定します。<br />・デフォルト= 0' WHERE `configuration_key` = 'SHOW_SALE_DISCOUNT_DECIMALS';
UPDATE configuration SET configuration_title = '商品情報- 無料商品の画像・テキストのステータス',  configuration_description = '商品情報での無料商品の画像・イメージの表示を設定します。<br />・0= Text<br />・1= Image' WHERE `configuration_key` = 'OTHER_IMAGE_PRICE_IS_FREE_ON';
UPDATE configuration SET configuration_title = '商品情報 - お問い合わせ商品表示設定',  configuration_description = 'お問い合わせ商品であることを表示する画像またはテキストについて設定します。<br />・0= テキスト<br />・1= 画像' WHERE `configuration_key` = 'PRODUCTS_PRICE_IS_CALL_IMAGE_ON';
UPDATE configuration SET configuration_title = '管理画面 - 商品登録時の数量欄デフォルト設定',  configuration_description = '新しい商品の登録画面で、「商品の数量欄の表示:」項目のデフォルト値の設定をします。<br />・0= オフ<br />・1= オン<br />※on の状態で商品登録するとショップの画面ではカートに入れる数量入力欄を表示します。 オフ の場合は数量入力欄は表示されず「カートに追加」ボタンだけが表示され、カートには数量＝1で商品が追加されます。' WHERE `configuration_key` = 'PRODUCTS_QTY_BOX_STATUS';
UPDATE configuration SET configuration_title = '商品レビュー - 承認の要否',  configuration_description = '商品レビューの表示には承認が必要にしますか?<br />・0= オフ<br />・1= オン<br />注意：レビューが非表示設定になっている場合は無視されます。' WHERE `configuration_key` = 'REVIEWS_APPROVAL';
UPDATE configuration SET configuration_title = 'METAタグ - TITLEタグへの商品型番表示',  configuration_description = 'TITLEタグに商品型番を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'META_TAG_INCLUDE_MODEL';
UPDATE configuration SET configuration_title = 'METAタグ - TITLEタグへの商品価格表示',  configuration_description = 'TITLEタグに商品価格を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'META_TAG_INCLUDE_PRICE';
UPDATE configuration SET configuration_title = 'METAタグ - Meta Descriptionの長さ',  configuration_description = 'Meta Descriptionの最大の長さを設定してください。<br />デフォルトの最大値(ワード数)：50' WHERE `configuration_key` = 'MAX_META_TAG_DESCRIPTION_LENGTH';
UPDATE configuration SET configuration_title = '「こんな商品も購入しています」 - 横列あたりの表示点数',  configuration_description = '「こんな商品も買っています」の横列(Row)あたりの表示点数を設定します。<br />0= オフ または並び順を設定' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS';
UPDATE configuration SET configuration_title = '[前へ] [次へ] - ナビゲーションバーの位置',  configuration_description = '[前へ] [次へ] ナビゲーションバーの位置を設定します。<br />・0= オフ<br />・1= ページ上部<br />・2= ページ下部<br />・3= ページ上部・下部' WHERE `configuration_key` = 'PRODUCT_INFO_PREVIOUS_NEXT';
UPDATE configuration SET configuration_title = '[前へ] [次へ] - 商品の並び順',  configuration_description = '商品の並び順の基準となる項目を設定します。<br />・0= 商品ID<br />・1= 商品名<br />・2= 型番<br />・3= 価格、商品名<br />・4= 価格、型番<br />・5= 商品名, 型番<br />・6= 並び順' WHERE `configuration_key` = 'PRODUCT_INFO_PREVIOUS_NEXT_SORT';
UPDATE configuration SET configuration_title = '[前へ] [次へ] ナビゲーション - 商品画像の表示',  configuration_description = '[前へ] [次へ] ボタンと対応する商品画像の表示を設定します。<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SHOW_PREVIOUS_NEXT_STATUS';
UPDATE configuration SET configuration_title = '[前へ] [次へ] ナビゲーション - ボタンと画像の表示',  configuration_description = '上部の[前へ] [次へ] - ボタンと画像のステータスの設定の範囲内での設定ができます。<br />・0= ボタンのみ<br />・1= ボタン・商品画像<br />・2= 商品画像のみ' WHERE `configuration_key` = 'SHOW_PREVIOUS_NEXT_IMAGES';
UPDATE configuration SET configuration_title = '[前へ] [次へ] ナビゲーション - 画像の横幅',  configuration_description = '[前へ] [次へ] で表示される商品画像の横幅の横幅を設定します。' WHERE `configuration_key` = 'PREVIOUS_NEXT_IMAGE_WIDTH';
UPDATE configuration SET configuration_title = '[前へ] [次へ] ナビゲーション - 画像の高さ',  configuration_description = '[前へ] [次へ] で表示される商品画像の高さを設定します。' WHERE `configuration_key` = 'PREVIOUS_NEXT_IMAGE_HEIGHT';
UPDATE configuration SET configuration_title = '[前へ] [次へ] ナビゲーション - カテゴリ名と画像の配置',  configuration_description = '[前へ] [次へ] ナビゲーションの上に表示される カテゴリ画像とカテゴリ名の配置を設定します。<br />・0= オフ<br />・1= 左に配置<br />・2= 中央に配置<br />・3= 右に配置' WHERE `configuration_key` = 'PRODUCT_INFO_CATEGORIES';
UPDATE configuration SET configuration_title = 'カテゴリ名と画像を常に表示',  configuration_description = 'カテゴリ名と画像の表示ステータス<br />0= カテゴリ名と画像を常に表示<br />1= カテゴリ名のみ表示<br />2= カテゴリ名と対象がある場合だけ画像を表示' WHERE `configuration_key` = 'PRODUCT_INFO_CATEGORIES_IMAGE_STATUS';
UPDATE configuration SET configuration_title = '左側サイドボックスの横幅',  configuration_description = '左側に表示されるサイドボックスの横幅を設定します。pxを含めて入力できます。<br />・デフォルト = 150px' WHERE `configuration_key` = 'BOX_WIDTH_LEFT';
UPDATE configuration SET configuration_title = '右側サイドボックスの横幅',  configuration_description = '右側に表示されるサイドボックスの横幅を設定します。pxを含めて入力できます。<br />・Default = 150px' WHERE `configuration_key` = 'BOX_WIDTH_RIGHT';
UPDATE configuration SET configuration_title = 'パン屑リストの区切り文字',  configuration_description = 'パン屑リストの区切り文字を設定します。<br />【注意】空白を含む場合は&nbsp;を使用することができます。<br />・デフォルト = &nbsp;::&nbsp;' WHERE `configuration_key` = 'BREAD_CRUMBS_SEPARATOR';
UPDATE configuration SET configuration_title = 'パン屑リストの設定',  configuration_description = 'パン屑リストのリンクを有効にしますか?<br />0= オフ<br />1= オン<br />2= TOPページのみ解除' WHERE `configuration_key` = 'DEFINE_BREADCRUMB_STATUS';
UPDATE configuration SET configuration_title = 'ベストセラー - 桁数合わせ文字',  configuration_description = '桁数を合わせるために挿入する文字を設定します。<br />デフォルト = &nbsp;(空白)' WHERE `configuration_key` = 'BEST_SELLERS_FILLER';
UPDATE configuration SET configuration_title = 'ベストセラー - 表示文字数',  configuration_description = 'ベストセラーのサイドボックスで表示する商品名の長さを設定します。<br />デフォルト = 35' WHERE `configuration_key` = 'BEST_SELLERS_TRUNCATE';
UPDATE configuration SET configuration_title = 'ベストセラー - 表示文字数を超えた場合に「...」を表示',  configuration_description = '商品名が途中で切れた場合に「...」を表示します。<br />デフォルト = true' WHERE `configuration_key` = 'BEST_SELLERS_TRUNCATE_MORE';
UPDATE configuration SET configuration_title = 'カテゴリボックス - 特価商品のリンク表示',  configuration_description = 'カテゴリボックスに特価商品のリンクを表示します。' WHERE `configuration_key` = 'SHOW_CATEGORIES_BOX_SPECIALS';
UPDATE configuration SET configuration_title = 'カテゴリボックス - 新着商品のリンク表示',  configuration_description = 'カテゴリボックスに新着商品へのリンクを表示します。' WHERE `configuration_key` = 'SHOW_CATEGORIES_BOX_PRODUCTS_NEW';
UPDATE configuration SET configuration_title = 'ショッピングカートボックスの表示',  configuration_description = 'ショッピングカートの表示を設定します。<br />・0= 常に表示<br />・1= 商品が入っているときだけ表示<br />・2= 商品が入っているときに表示するが、ショッピングカートページでは表示しない' WHERE `configuration_key` = 'SHOW_SHOPPING_CART_BOX_STATUS';
UPDATE configuration SET configuration_title = 'カテゴリボックス - おすすめ商品へのリンクを表示',  configuration_description = 'カテゴリボックスにおすすめ商品へのリンクを表示しますか?' WHERE `configuration_key` = 'SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = 'カテゴリボックス - 全商品リストへのリンクを表示',  configuration_description = 'カテゴリボックスに全商品リストへのリンクを表示しますか?' WHERE `configuration_key` = 'SHOW_CATEGORIES_BOX_PRODUCTS_ALL';
UPDATE configuration SET configuration_title = '左側カラムの表示',  configuration_description = '左側カラムを表示しますか? (ページをオーバーライドするものがない場合)<br />・0= 常に非表示<br />1= オーバーライドがなければ表示' WHERE `configuration_key` = 'COLUMN_LEFT_STATUS';
UPDATE configuration SET configuration_title = '右側カラムの表示',  configuration_description = '右側カラムを表示しますか? (ページをオーバーライドするものがない場合)<br />・0= 常に非表示<br />・1= オーバーライドがなければ表示' WHERE `configuration_key` = 'COLUMN_RIGHT_STATUS';
UPDATE configuration SET configuration_title = '左側カラムの横幅',  configuration_description = '左側カラムの横幅を設定します。pxを含めて指定可能。<br />デフォルト = 150px' WHERE `configuration_key` = 'COLUMN_WIDTH_LEFT';
UPDATE configuration SET configuration_title = '右側カラムの横幅',  configuration_description = '右側カラムの横幅を設定します。pxを含めて指定可能。<br />デフォルト = 150px' WHERE `configuration_key` = 'COLUMN_WIDTH_RIGHT';
UPDATE configuration SET configuration_title = 'カテゴリ名・リンク間の区切り',  configuration_description = 'カテゴリ名とリンク（「おすすめ商品」など）の間にセパレータ(区切り)を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'SHOW_CATEGORIES_SEPARATOR_LINK';
UPDATE configuration SET configuration_title = 'カテゴリの区切り - カテゴリ名・商品数',  configuration_description = 'カテゴリ名と(カテゴリ内の)商品数の間のセパレータ(区切り)は何にしますか?<br />デフォルト = -&gt;' WHERE `configuration_key` = 'CATEGORIES_SEPARATOR';
UPDATE configuration SET configuration_title = 'カテゴリの区切り - カテゴリ名とサブカテゴリ名の間',  configuration_description = 'カテゴリ名・サブカテゴリ名の間のセパレータ(区切り)は何にしますか?<br />デフォルト = |_&nbsp;' WHERE `configuration_key` = 'CATEGORIES_SEPARATOR_SUBS';
UPDATE configuration SET configuration_title = 'カテゴリ内商品数の接頭辞(Prefix)',  configuration_description = 'カテゴリ内の商品数表示の接頭辞(Prefix)は?<br />・デフォルト= (' WHERE `configuration_key` = 'CATEGORIES_COUNT_PREFIX';
UPDATE configuration SET configuration_title = 'カテゴリ内商品数の接尾辞(Suffix)',  configuration_description = 'カテゴリ内の商品数表示の接尾辞(Suffix)は?<br />・デフォルト= )' WHERE `configuration_key` = 'CATEGORIES_COUNT_SUFFIX';
UPDATE configuration SET configuration_title = 'カテゴリ・サブカテゴリのインデント',  configuration_description = 'サブカテゴリをインデント(字下げ)表示する際の文字・記号は?<br />・デフォルト =   ' WHERE `configuration_key` = 'CATEGORIES_SUBCATEGORIES_INDENT';
UPDATE configuration SET configuration_title = '商品登録0のカテゴリ - 表示・非表示',  configuration_description = '商品数が0のカテゴリを表示しますか?<br />・0 = オフ<br />・1 = on' WHERE `configuration_key` = 'CATEGORIES_COUNT_ZERO';
UPDATE configuration SET configuration_title = 'ショッピングカート - 合計を表示',  configuration_description = '合計額をショッピングカートの上に表示しますか?<br />・0= オフ<br />・1= オン: 商品の数量、重量合計<br />・2= on: 商品の数量、重量合計(0のときには非表示)<br />・3= on: 商品の数量合計' WHERE `configuration_key` = 'SHOW_TOTALS_IN_CART';
UPDATE configuration SET configuration_title = '顧客への挨拶 - トップページに表示',  configuration_description = '顧客への歓迎メッセージを常にトップページに表示しますか?<br />0= オフ<br />1= オン' WHERE `configuration_key` = 'SHOW_CUSTOMER_GREETING';
UPDATE configuration SET configuration_title = 'カテゴリ - トップページに表示',  configuration_description = 'カテゴリを常にトップページに表示しますか?<br />・0= オフ<br />・1= オン<br />・Default category can be set to Top Level or a Specific Top Level' WHERE `configuration_key` = 'SHOW_CATEGORIES_ALWAYS';
UPDATE configuration SET configuration_title = 'カテゴリ - トップページ での開閉',  configuration_description = 'トップページにおけるカテゴリの開閉状態を設定します。<br />・0= トップレベル(親)カテゴリのみ<br />・特定のカテゴリを開くにはカテゴリIDで指定。サブカテゴリも指定可能。<br />【例】3_10 (カテゴリID:3、サブカテゴリID:10)' WHERE `configuration_key` = 'CATEGORIES_START_MAIN';
UPDATE configuration SET configuration_title = 'カテゴリ - サブカテゴリを常に開いておく',  configuration_description = 'カテゴリとサブカテゴリは常に表示しますか?<br />0= オフ 親カテゴリのみ<br />1= オン カテゴリ・サブカテゴリは選択されたら常に表示' WHERE `configuration_key` = 'SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS';
UPDATE configuration SET configuration_title = 'バナー表示グループ - ヘッダポジション1',  configuration_description = 'どのバナーグループをヘッダポジション1に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET1';
UPDATE configuration SET configuration_title = 'バナー表示グループ - ヘッダポジション2',  configuration_description = 'どのバナーグループをヘッダポジション2に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET2';
UPDATE configuration SET configuration_title = 'バナー表示グループ - ヘッダポジション3',  configuration_description = 'どのバナーグループをヘッダポジション3に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET3';
UPDATE configuration SET configuration_title = 'バナー表示グループ - フッタポジション1',  configuration_description = 'どのバナーグループをフッタポジション1に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET4';
UPDATE configuration SET configuration_title = 'バナー表示グループ - フッタポジション2',  configuration_description = 'どのバナーグループをフッタポジション2に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET5';
UPDATE configuration SET configuration_title = 'バナー表示グループ - フッタポジション3',  configuration_description = 'どのバナーグループをフッタポジション3に使用しますか? 使わない場合は未記入にします。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET6';
UPDATE configuration SET configuration_title = 'バナー表示グループ - サイドボックス内バナーボックス',  configuration_description = 'どのバナーグループをサイドボックス内バナーボックス2に使用しますか? 使わない場合は未記入にします。<br />デフォルトのグループはSideBox-Bannersです。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET7';
UPDATE configuration SET configuration_title = 'バナー表示グループ - サイドボックス内バナーボックス2',  configuration_description = 'どのバナーグループをサイドボックス内バナーボックス2に使用しますか? 使わない場合は未記入にします。<br />デフォルトのグループはSideBox-Bannersです。<br />バナー表示グループは1つ(1バナーグループ)または複数(マルチバナーグループ)にすることもできます。マルチバナーグループを表示するためにはグループ名をコロン(:)で区切って入力します。<br />例：Wide-Banners:SideBox-Banners' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET8';
UPDATE configuration SET configuration_title = 'バナー表示グループ - サイドボックス内バナーボックス全て',  configuration_description = 'サイドボックス内バナーボックス全て(Banner All sidebox)で表示するバナー表示グループは、1つです。デフォルトのグループはBannersAllです。どのバナーグループをサイドボックスのbanner_box_allに表示しますか?<br />表示しない場合は空欄にしてください。' WHERE `configuration_key` = 'SHOW_BANNERS_GROUP_SET_ALL';
UPDATE configuration SET configuration_title = 'フッタ - IPアドレスの表示・非表示',  configuration_description = '顧客のIPアドレスをフッタに表示しますか?<br />・0= オフ<br />・1= オン<br />' WHERE `configuration_key` = 'SHOW_FOOTER_IP';
UPDATE configuration SET configuration_title = '数量割引 - 追加割引レベル数',  configuration_description = '数量割引の割引レベルの追加数を指定します。一つの割引レベルに一つの割引設定を行うことができます。' WHERE `configuration_key` = 'DISCOUNT_QTY_ADD';
UPDATE configuration SET configuration_title = '数量割引 - 一行あたりの表示数',  configuration_description = '商品情報ページで表示する数量割引設定の一行あたり表示数を指定します。割引設定数（割引レベル数）が一行あたりの表示数を超えた場合は、複数行で表示されます。' WHERE `configuration_key` = 'DISCOUNT_QUANTITY_PRICES_COLUMN';
UPDATE configuration SET configuration_title = 'カテゴリ/商品の並び順',  configuration_description = 'カテゴリ/商品の並び順を設定します。<br />0= カテゴリ/商品 並び順/名前<br />1= カテゴリ/商品 名前<br />2= 商品モデル<br />3= 商品数量+, 商品名<br />4= 商品数量-, 商品名<br />5= 商品価格+, 商品名<br />6= 商品価格+, 商品名' WHERE `configuration_key` = 'CATEGORIES_PRODUCTS_SORT_ORDER';
UPDATE configuration SET configuration_title = 'オプション名/オプション値の追加・コピー・削除',  configuration_description = 'オプション名/オプション値の追加・コピー・削除の機能についてのグローバルな設定を行います。<br />0= 機能を隠す<br />1= 機能を表示する' WHERE `configuration_key` = 'OPTION_NAMES_VALUES_GLOBAL_STATUS';
UPDATE configuration SET configuration_title = 'カテゴリ - タブメニュー',  configuration_description = 'カテゴリ - タブをオンにするとショップ画面のヘッダ部分にカテゴリが表示されます。さまざまな応用ができるでしょう。<br />0= カテゴリのタブを隠す<br />1= カテゴリのタブを表示' WHERE `configuration_key` = 'CATEGORIES_TABS_STATUS';
UPDATE configuration SET configuration_title = 'サイトマップ - Myページの表示',  configuration_description = 'Myページのリンクをサイトマップに表示しますか?<br />注意：サーチエンジンのクローラーがこのページをインデックスしようとしてログインページに誘導されてしまう可能性があり、お勧めしません。<br />デフォルト：false (表示しない)' WHERE `configuration_key` = 'SHOW_ACCOUNT_LINKS_ON_SITE_MAP';
UPDATE configuration SET configuration_title = '1商品だけのカテゴリの表示をスキップ',  configuration_description = '商品が1つだけのカテゴリの表示をスキップしますか?<br />このオプションがTrueの場合、ユーザーが商品が1つだけのカテゴリをクリックすると、Zen Cartは直接商品ページを表示するようになります。<br />デフォルト：True' WHERE `configuration_key` = 'SKIP_SINGLE_PRODUCT_CATEGORIES';
UPDATE configuration SET configuration_title = 'ログインページの分割利用',  configuration_description = 'ログインページを分割しますか?<br />ログインページは二つのモードで表示することができます。ログイン、登録一括のページ、分割されたページです。分割した場合は、ユーザー登録が別になり、ユーザー登録ボタンを押して登録ページに行きます。一括の場合は、ログインと同じページ内に登録画面が表示されます。<br />デフォルト：False' WHERE `configuration_key` = 'USE_SPLIT_LOGIN_MODE';
UPDATE configuration SET configuration_title = 'CSSボタン',  configuration_description = 'CSS画像(gif/jpg)の代わりにボタンを表示しますか?<br />ONにした場合、ボタンのスタイルはスタイルシートで定義してください。' WHERE `configuration_key` = 'IMAGE_USE_CSS_BUTTONS';
UPDATE configuration SET configuration_title = '「メンテナンス中」 オン/オフ',  configuration_description = '「メンテナンス中」の表示について設定します。<br />・true=on<br />・false=オフ' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE';
UPDATE configuration SET configuration_title = '「メンテナンス中」- 表示するファイル',  configuration_description = 'メンテナンス中に表示するファイルのファイル名を設定します。デフォルトは"down_for_maintenance"です。<br />【注意】拡張子は付けないでください。' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_FILENAME';
UPDATE configuration SET configuration_title = '「メンテナンス中」- ヘッダを隠す',  configuration_description = '「メンテナンス中」表示モードの際、ヘッダを隠しますか?<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_HEADER_OFF';
UPDATE configuration SET configuration_title = '「メンテナンス中」- 左カラムを隠す',  configuration_description = '「メンテナンス中」表示モードの際、左カラムを隠しますか?<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF';
UPDATE configuration SET configuration_title = '「メンテナンス中」- 右カラムを隠す',  configuration_description = '「メンテナンス中」表示モードの際、右カラムを隠しますか?<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF';
UPDATE configuration SET configuration_title = '「メンテナンス中」- フッタを隠す',  configuration_description = '「メンテナンス中」表示モードの際、フッタを隠しますか?<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_FOOTER_OFF';
UPDATE configuration SET configuration_title = '「メンテナンス中」- 価格を表示しない',  configuration_description = '「メンテナンス中」表示モードの際、商品価格を隠しますか?<br />・true=hide<br />・false=show' WHERE `configuration_key` = 'DOWN_FOR_MAINTENANCE_PRICES_OFF';
UPDATE configuration SET configuration_title = '「メンテナンス中」- 設定したIPアドレスを除く',  configuration_description = 'ショップ管理者用などに、「メンテナンス中」表示モードの際でもアクセス可能なIPアドレスを設定しますか?<br />複数のIPアドレスを指定するにはカンマ(,)で区切ります。また、あなたのアクセス元のIPアドレスがわからない場合は、ショップのフッタに表示されるIPアドレスをチェックしてください。' WHERE `configuration_key` = 'EXCLUDE_ADMIN_IP_FOR_MAINTENANCE';
UPDATE configuration SET configuration_title = '「メンテナンス予告(NOTICE PUBLIC)」-  オン/オフ',  configuration_description = 'ショップの「メンテナンス中」表示を出す前に告知を出しますか?<br />・true=on<br />・false=オフ<br />注意：「メンテナンス中」表示が有効になると、この設定は自動的にfalseに書き換えられます。' WHERE `configuration_key` = 'WARN_BEFORE_DOWN_FOR_MAINTENANCE';
UPDATE configuration SET configuration_title = '「メンテナンス予告」- メッセージに表示する日時',  configuration_description = 'ヘッダに表示するメンテナンス予告メッセージの開始日と時間を設定します。' WHERE `configuration_key` = 'PERIOD_BEFORE_DOWN_FOR_MAINTENANCE';
UPDATE configuration SET configuration_title = '「メンテナンス中」- メンテナンスを開始した日時を表示',  configuration_description = 'ショップ管理者がいつ「メンテナンス中」表示をオンにしたか表示しますか?<br />・true=on<br />・false=オフ' WHERE `configuration_key` = 'DISPLAY_MAINTENANCE_TIME';
UPDATE configuration SET configuration_title = '「メンテナンス中」- メンテナンス期間を表示',  configuration_description = 'メンテナンスの期間を表示しますか?<br />・true=on<br />・false=オフ' WHERE `configuration_key` = 'DISPLAY_MAINTENANCE_PERIOD';
UPDATE configuration SET configuration_title = 'メンテナンス期間',  configuration_description = 'メンテナンス期間を設定します。<br />書式：(hh:mm)<br />h = 時間　m = 分' WHERE `configuration_key` = 'TEXT_MAINTENANCE_PERIOD_TIME';
UPDATE configuration SET configuration_title = 'チェックアウト時に「ご利用規約」確認画面を表示',  configuration_description = 'チェックアウトの際に「ご利用規約」の画面を表示しますか?' WHERE `configuration_key` = 'DISPLAY_CONDITIONS_ON_CHECKOUT';
UPDATE configuration SET configuration_title = 'アカウント作成時に個人情報保護方針確認画面を表示',  configuration_description = 'アカウント作成の際、個人情報保護方針への同意画面を表示しますか?<br />注意：「個人情報保護法」では、個人情報保護方針を開示することが求められています。<br />' WHERE `configuration_key` = 'DISPLAY_PRIVACY_CONDITIONS';
UPDATE configuration SET configuration_title = '商品画像を表示',  configuration_description = '商品画像を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_IMAGE';
UPDATE configuration SET configuration_title = '商品の数量を表示',  configuration_description = '商品数量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_QUANTITY';
UPDATE configuration SET configuration_title = '「今すぐ買う」ボタンの表示',  configuration_description = '「今すぐ買う」ボタンを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_BUY_NOW';
UPDATE configuration SET configuration_title = '商品名の表示',  configuration_description = '商品名を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_NAME';
UPDATE configuration SET configuration_title = '商品型番の表示',  configuration_description = '商品型番を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_MODEL';
UPDATE configuration SET configuration_title = '商品メーカーの表示',  configuration_description = '商品メーカーを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_MANUFACTURER';
UPDATE configuration SET configuration_title = '商品価格の表示',  configuration_description = '商品価格を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_PRICE';
UPDATE configuration SET configuration_title = '商品重量の表示',  configuration_description = '商品の重量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_WEIGHT';
UPDATE configuration SET configuration_title = '商品登録日の表示',  configuration_description = '商品登録日を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_DATE_ADDED';
UPDATE configuration SET configuration_title = '商品説明の表示',  configuration_description = '商品説明(最初の150文字)を表示しますか?<br />・0= オフ<br />・150= オン' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_DESCRIPTION';
UPDATE configuration SET configuration_title = '新着商品 - デフォルトのグループID',  configuration_description = '新着商品リストの設定グループID(configuration_group_id)は何ですか?<br />注意：全商品リストのグループIDがデフォルトの21から変更されたときだけ設定してください。' WHERE `configuration_key` = 'PRODUCT_NEW_LIST_GROUP_ID';
UPDATE configuration SET configuration_title = 'リスト内各商品への注文数量欄の表示とボタンの表示',  configuration_description = 'リスト内各商品にカートに入れる数量欄を表示するかどうかと、「選択商品をカートに追加」ボタンの表示位置を設定します。<br />0= オフ<br />1= 上部<br />2= 下部<br />3= 両方' WHERE `configuration_key` = 'PRODUCT_NEW_LISTING_MULTIPLE_ADD_TO_CART';
UPDATE configuration SET configuration_title = '商品画像の表示',  configuration_description = '商品画像を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_IMAGE';
UPDATE configuration SET configuration_title = '商品数量の表示',  configuration_description = '商品数量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_QUANTITY';
UPDATE configuration SET configuration_title = '「今すぐ買う」ボタンの表示',  configuration_description = '「今すぐ買う」ボタンを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_BUY_NOW';
UPDATE configuration SET configuration_title = '商品名の表示',  configuration_description = '商品名を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_NAME';
UPDATE configuration SET configuration_title = '商品型番の表示',  configuration_description = '商品型番を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_MODEL';
UPDATE configuration SET configuration_title = '商品メーカーの表示',  configuration_description = '商品メーカーを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_MANUFACTURER';
UPDATE configuration SET configuration_title = '商品価格の表示',  configuration_description = '商品価格を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_PRICE';
UPDATE configuration SET configuration_title = '商品重量の表示',  configuration_description = '商品重量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_WEIGHT';
UPDATE configuration SET configuration_title = '商品登録日の表示',  configuration_description = '商品登録日を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_DATE_ADDED';
UPDATE configuration SET configuration_title = '商品説明の表示',  configuration_description = '商品説明(最初の150文字)を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_DESCRIPTION';
UPDATE configuration SET configuration_title = 'おすすめ商品 - デフォルトのグループID',  configuration_description = 'おすすめ商品リストの設定グループID(configuration_group_id)は何ですか?<br />注意：おすすめ商品リストのグループIDがデフォルトの22から変更されたときだけ設定してください。<br />' WHERE `configuration_key` = 'PRODUCT_FEATURED_LIST_GROUP_ID';
UPDATE configuration SET configuration_title = 'リスト内各商品への注文数量欄の表示とボタンの表示',  configuration_description = 'リスト内各商品への数量欄の表示の有無と「選択した商品をカートに追加」ボタンの表示位置を設定します。<br />0= オフ<br />1= 上部<br />2= 下部<br />3= 両方' WHERE `configuration_key` = 'PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART';
UPDATE configuration SET configuration_title = '商品画像の表示',  configuration_description = '商品画像を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_IMAGE';
UPDATE configuration SET configuration_title = '商品数量の表示',  configuration_description = '商品数量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_QUANTITY';
UPDATE configuration SET configuration_title = '「今すぐ買う」ボタンの表示',  configuration_description = '「今すぐ買う」ボタンを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_BUY_NOW';
UPDATE configuration SET configuration_title = '商品名の表示',  configuration_description = '商品名を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_NAME';
UPDATE configuration SET configuration_title = '商品型番の表示',  configuration_description = '商品型番を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_MODEL';
UPDATE configuration SET configuration_title = '商品メーカーの表示',  configuration_description = '商品メーカーを表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_MANUFACTURER';
UPDATE configuration SET configuration_title = '商品価格の表示',  configuration_description = '商品価格を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_PRICE';
UPDATE configuration SET configuration_title = '商品重量の表示',  configuration_description = '商品重量を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_WEIGHT';
UPDATE configuration SET configuration_title = '商品登録日の表示',  configuration_description = '商品登録日を表示しますか?<br />・0= オフ<br />・1桁目：左か右か<br />・2・3桁目：表示項目内での並び順<br />・4桁目：表示後の改行(br)数<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_DATE_ADDED';
UPDATE configuration SET configuration_title = '商品説明の表示',  configuration_description = '商品説明(最初の150文字)を表示しますか?<br />・0= オフ<br />・1= オン' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_DESCRIPTION';
UPDATE configuration SET configuration_title = '全商品リスト - デフォルトのグループID',  configuration_description = '全商品リストの設定グループID(configuration_group_id)は?<br />注意：全商品リストのグループIDがデフォルトの23から変更されたときだけ設定してください。<br />' WHERE `configuration_key` = 'PRODUCT_ALL_LIST_GROUP_ID';
UPDATE configuration SET configuration_title = 'リスト内各商品への注文数量欄の表示とボタンの表示',  configuration_description = 'リスト内各商品への数量欄の表示の有無と「選択した商品をカートに追加」ボタンの表示位置を設定します。<br />0= オフ<br />1= 上部<br />2= 下部<br />3= 両方' WHERE `configuration_key` = 'PRODUCT_ALL_LISTING_MULTIPLE_ADD_TO_CART';
UPDATE configuration SET configuration_title = '新着商品をトップページに表示する',  configuration_description = '新着商品をトップページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品をトップページに表示する',  configuration_description = 'おすすめ商品をトップページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品をトップページに表示する',  configuration_description = '特価商品をトップページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = '入荷予定商品をトップページに表示する',  configuration_description = '入荷予定商品をトップページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MAIN_UPCOMING';
UPDATE configuration SET configuration_title = '新着商品を商品カタログページに表示する - カテゴリ・サブカテゴリ共に<br />',  configuration_description = '新着商品を(トップレベル)カテゴリ・サブカテゴリ共に商品カタログページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品を商品カタログページに表示する - カテゴリ・サブカテゴリ共に',  configuration_description = 'おすすめ商品を(トップレベル)カテゴリ・サブカテゴリ共に商品カタログページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品を商品カタログページに表示する - カテゴリ・サブカテゴリ共に',  configuration_description = '特価商品を(トップレベル)カテゴリ・サブカテゴリ共に商品カタログページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = '入荷予定商品を商品カタログページに表示する - カテゴリ・サブカテゴリ共に',  configuration_description = '入荷予定商品を(トップレベル)カテゴリ・サブカテゴリ共に商品カタログページに表示 しますか?<br />0= オフ<br />または表示順を数値(1～4)で設定してください。<br />' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING';
UPDATE configuration SET configuration_title = '新着商品を商品カタログページに表示する - エラーページと「商品がありません」ページ',  configuration_description = '新着予定商品を商品カタログページに表示 しますか?<br />エラーページと「商品がありません」ページ<br />0= オフ<br />または順番を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MISSING_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品を商品カタログページに表示する - エラーページと「商品がありません」ページ',  configuration_description = 'おすすめ商品を商品カタログページに表示 しますか?<br />(エラーページと「商品がありません」ページ)<br />0= オフ<br />または順番を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MISSING_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品を商品カタログページに表示する - エラーページと「商品がありません」ページ',  configuration_description = '特価商品を商品カタログページに表示 しますか?<br />(エラーページと「商品がありません」ページ)<br />0= オフ<br />または順番を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MISSING_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = '入荷予定商品を商品カタログページに表示する - エラーページと「商品がありません」ページ',  configuration_description = '入荷予定商品を商品カタログページに表示 しますか?<br />(エラーページと「商品がありません」ページ)<br />0= オフ<br />または順番を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_MISSING_UPCOMING';
UPDATE configuration SET configuration_title = '新着商品を表示する - 商品リストの下部に',  configuration_description = '商品リストの下に新着商品を表示しますか?<br />0= オフ<br />または配置順を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_LISTING_BELOW_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品を表示する - 商品リストの下部に',  configuration_description = '商品リストの下におすすめ商品を表示しますか?<br />0= オフ<br />または配置順を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_LISTING_BELOW_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品を表示する - 商品リストの下部に',  configuration_description = '商品リストの下に特価商品を表示しますか?<br />0= オフ<br />または配置順を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_LISTING_BELOW_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = '入荷予定商品を表示する - 商品リストの下部に',  configuration_description = '商品リストの下に入荷予定商品を表示しますか?<br />0= オフ<br />または配置順を数値(1～4)で設定してください。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_LISTING_BELOW_UPCOMING';
UPDATE configuration SET configuration_title = '新着商品 - 横列あたりの表示点数',  configuration_description = '新着商品の列(Row)あたりの配置点数を設定します。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS';
UPDATE configuration SET configuration_title = 'おすすめ商品 - 横列あたりの表示点数',  configuration_description = 'おすすめ商品の列(Row)あたりの配置点数を設定します。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_title = '特価商品 - 横列あたりの表示点数',  configuration_description = '特価商品の列(Row)あたりの配置点数を設定します。' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_title = 'トップレベル(親)カテゴリの商品リスト表示 - フィルタ表示・全商品表示',  configuration_description = '現在のメインカテゴリに商品リストが適用された際、商品をフィルタ表示しますか? それとも全カテゴリから商品を表示しますか?<br />・0= Filter<br />・Off 1=Filter On' WHERE `configuration_key` = 'SHOW_PRODUCT_INFO_ALL_PRODUCTS';
UPDATE configuration SET configuration_title = 'トップページの定義領域 - ステータス',  configuration_description = '編集された領域の表示を行いますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_MAIN_PAGE_STATUS';
UPDATE configuration SET configuration_title = '「お問い合わせ」ページの表示 - ステータス',  configuration_description = '編集された「お問い合わせ」テキストを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_CONTACT_US_STATUS';
UPDATE configuration SET configuration_title = '「個人情報保護方針」表示 - ステータス',  configuration_description = '編集された「個人情報保護方針」を表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_PRIVACY_STATUS';
UPDATE configuration SET configuration_title = '「配送・送料について」 ページ - ステータス',  configuration_description = '編集された「配送・送料について」テキストを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_SHIPPINGINFO_STATUS';
UPDATE configuration SET configuration_title = '「ご利用規約」ページ - ステータス',  configuration_description = '編集された「ご利用規約」ページを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_CONDITIONS_STATUS';
UPDATE configuration SET configuration_title = '「ご注文が完了しました」ページ - ステータス',  configuration_description = '編集された「ご注文が完了しました」テキストを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_CHECKOUT_SUCCESS_STATUS';
UPDATE configuration SET configuration_title = '「クーポン券」ページ - ステータス',  configuration_description = '編集された「クーポン券」テキストを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_DISCOUNT_COUPON_STATUS';
UPDATE configuration SET configuration_title = '「サイトマップ」ページ - ステータス',  configuration_description = '編集された「クーポン券」テキストを表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_SITE_MAP_STATUS';
UPDATE configuration SET configuration_title = '「ページが見つかりません」ページ - ステータス',  configuration_description = '編集された「ページが見つかりません」テキストを表示しますか?<br />0= 非表示<br />1= 表示' WHERE `configuration_key` = 'DEFINE_PAGE_NOT_FOUND_STATUS';
UPDATE configuration SET configuration_title = '自由編集ページ(Define Page) 2',  configuration_description = '自由編集ページ2を表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_PAGE_2_STATUS';
UPDATE configuration SET configuration_title = '自由編集ページ(Define Page) 3',  configuration_description = '自由編集ページ3 を表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_PAGE_3_STATUS';
UPDATE configuration SET configuration_title = '自由編集ページ(Define Page) 4',  configuration_description = '自由編集ページ(Define Page) 4を表示しますか?<br />0= リンク:表示　　編集領域:非表示<br />1= リンク:表示　　編集領域:表示<br />2= リンク:非表示　編集領域:表示<br />3= リンク:非表示　編集領域:非表示' WHERE `configuration_key` = 'DEFINE_PAGE_4_STATUS';
UPDATE configuration SET configuration_title = 'EZページの表示 - ページヘッダ',  configuration_description = 'EZページのコンテンツをページヘッダに表示するかどうかをグローバル(サイト全体)に設定します。<br />0 = Off<br />1 = On<br />2= サイトメンテナンスの際に管理者のIPアドレスでアクセスした場合のみ表示<br />注意：ワーニングは公開されず管理者にだけ表示されます。' WHERE `configuration_key` = 'EZPAGES_STATUS_HEADER';
UPDATE configuration SET configuration_title = 'EZページの表示 - ページフッタ',  configuration_description = 'EZページのコンテンツをページフッタに表示するかどうかをグローバル(サイト全体)に設定します。<br />0 = Off<br />1 = On<br />2= サイトメンテナンスの際に管理者のIPアドレスでアクセスした場合のみ表示<br />注意：ワーニングは公開されず管理者にだけ表示されます。' WHERE `configuration_key` = 'EZPAGES_STATUS_FOOTER';
UPDATE configuration SET configuration_title = 'EZページの表示 - サイドボックス',  configuration_description = 'EZページのコンテンツをサイドボックスに表示するかどうかをグローバル(サイト全体)に設定します。<br />0 = Off<br />1 = On<br />2= サイトメンテナンスの際に管理者のIPアドレスでアクセスした場合のみ表示<br />注意：ワーニングは公開されず管理者にだけ表示されます。' WHERE `configuration_key` = 'EZPAGES_STATUS_SIDEBOX';
UPDATE configuration SET configuration_title = 'EZページ のヘッダ - リンクのセパレータ(区切り記号)',  configuration_description = 'EＺページのヘッダのリンク表示のセパレータ(区切り文字)は?<br />デフォルト = &nbsp;::&nbsp;' WHERE `configuration_key` = 'EZPAGES_SEPARATOR_HEADER';
UPDATE configuration SET configuration_title = 'EZページ のフッタ - リンクのセパレータ(区切り記号)',  configuration_description = 'EＺページのフッタのリンク表示のセパレータ(区切り文字)は?<br />デフォルト = &nbsp;::&nbsp;' WHERE `configuration_key` = 'EZPAGES_SEPARATOR_FOOTER';
UPDATE configuration SET configuration_title = 'EZページ - [次へ][前へ]ボタン',  configuration_description = 'EZページのコンテンツ内[前へ][続ける][次へ]ボタンを表示しますか?<br />0=オフ (ボタンなし)<br />1=「続ける」を表示<br />2=「前へ」「続ける」「次へ」を表示<br />デフォルト：2' WHERE `configuration_key` = 'EZPAGES_SHOW_PREV_NEXT_BUTTONS';
UPDATE configuration SET configuration_title = 'EZページ - 目次の表示',  configuration_description = 'EZページの目次を表示しますか?<br />0= オフ<br />1= オン' WHERE `configuration_key` = 'EZPAGES_SHOW_TABLE_CONTENTS';
UPDATE configuration SET configuration_title = 'EZ-ページ - ヘッダで表示しないページ',  configuration_description = 'EZページのうち通常のページヘッダに表示しないページは?<br />表示しないページのページIDをカンマ(,)区切りで記述してください。ページIDは管理画面の[追加設定・ツール]のEZページ設定画面で確認できます。<br />例：1,5,2<br />ない場合は空欄のまま' WHERE `configuration_key` = 'EZPAGES_DISABLE_HEADER_DISPLAY_LIST';
UPDATE configuration SET configuration_title = 'EZ-ページ - フッタで表示しないページ',  configuration_description = 'EZページのうち通常のページフッタに表示しないページは?<br />表示しないページのページIDをカンマ(,)区切りで記述してください。ページIDは管理画面の[追加設定・ツール]のEZページ設定画面で確認できます。<br />例：3,7<br />ない場合は空欄のまま' WHERE `configuration_key` = 'EZPAGES_DISABLE_FOOTER_DISPLAY_LIST';
UPDATE configuration SET configuration_title = 'EZ-ページ - 左カラムで表示しないページ',  configuration_description = 'EZページのうち通常の左カラムに表示しないページは?<br />表示しないページのページIDをカンマ(,)区切りで記述してください。ページIDは管理画面の[追加設定・ツール]のEZページ設定画面で確認できます。<br />例：6,17<br />ない場合は空欄のまま' WHERE `configuration_key` = 'EZPAGES_DISABLE_LEFTCOLUMN_DISPLAY_LIST';
UPDATE configuration SET configuration_title = 'EZ-ページ - 右カラムで表示しないページ',  configuration_description = 'EZページのうち通常の右カラムに表示しないページは?<br />表示しないページのページIDをカンマ(,)区切りで記述してください。ページIDは管理画面の[追加設定・ツール]のEZページ設定画面で確認できます。<br />例：5,23,47<br />ない場合は空欄のまま' WHERE `configuration_key` = 'EZPAGES_DISABLE_RIGHTCOLUMN_DISPLAY_LIST';
UPDATE configuration SET configuration_title = 'グローバル認証キー',  configuration_description = '' WHERE `configuration_key` = 'GLOBAL_AUTH_KEY';
UPDATE configuration SET configuration_title = 'テキストメールでの貨幣の変換',  configuration_description = 'テキスト形式のメールに、どんな貨幣の変換が必要ですか?<br />Default = &pound;,￡:&euro;,EUR' WHERE `configuration_key` = 'CURRENCIES_TRANSLATIONS';
UPDATE configuration SET configuration_title = 'ルートパスを cookieのパスにする',  configuration_description = '通常、Zencart はインストールされいてるディレクトリを cookie のパスとして利用します。しかし、サーバーの中にはそれでは問題が発生するケースが有ります。この設定項目では cookie のパスをショップのディレクトリではなく、サーバーのルートに設定できます。セッションで問題が発生する場合にのみ利用してください。　デフォルトは False(利用しない）です。<br />この設定を変更するということは、管理画面へのログインに問題が発生していることを意味しますので、一旦ブラウザの cookie をクリアしてください。' WHERE `configuration_key` = 'SESSION_USE_ROOT_COOKIE_PATH';
UPDATE configuration SET configuration_title = 'cookie domain の頭にピリオドを追加',  configuration_description = '通常、Zencart は cookie domain に対して頭にピリオドをつけます（例：　.www.mydomain.com ）　サーバーの設定によってはそれでは問題が発生するケースが有ります。セッションで問題が発生する場合には、この設定を False にして試してみてください。 デフォルトは True です。' WHERE `configuration_key` = 'SESSION_ADD_PERIOD_PREFIX';

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
UPDATE project_version SET project_version_minor = '1.0', project_version_comment = 'Version Update with Japanese Pack v2.0.1', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = '1.0200', project_version_comment = 'Version Update with Japanese Pack v2.0.1', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';

##### END OF UPGRADE SCRIPT
