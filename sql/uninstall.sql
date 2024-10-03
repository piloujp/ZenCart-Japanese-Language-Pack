Set @japan_id = (Select countries_id from countries where countries_iso_code_2 = 'JP' LIMIT 1);
Set @USA_id = (Select countries_id from countries where countries_iso_code_2 = 'US' LIMIT 1);

ALTER TABLE address_book DROP COLUMN entry_firstname_kana;
ALTER TABLE address_book DROP COLUMN entry_lastname_kana;
ALTER TABLE address_book DROP COLUMN entry_telephone;
ALTER TABLE address_book DROP COLUMN entry_fax;

ALTER TABLE customers DROP COLUMN customers_firstname_kana;
ALTER TABLE customers DROP COLUMN customers_lastname_kana;

ALTER TABLE orders DROP COLUMN customers_name_kana;
ALTER TABLE orders DROP COLUMN delivery_name_kana;
ALTER TABLE orders DROP COLUMN billing_name_kana;
ALTER TABLE orders DROP COLUMN delivery_telephone;
ALTER TABLE orders DROP COLUMN delivery_fax;
ALTER TABLE orders DROP COLUMN billing_telephone;
ALTER TABLE orders DROP COLUMN billing_fax;
ALTER TABLE orders DROP COLUMN customers_fax;
ALTER TABLE orders DROP COLUMN delivery_timespec;

DELETE FROM zones WHERE zone_country_id = @japan_id;

DELETE FROM address_format WHERE address_format LIKE '〒%';
UPDATE countries SET address_format_id = 1 WHERE countries_id = @japan_id;

UPDATE configuration SET configuration_value = 'en', last_modified = now() WHERE configuration_key = 'DEFAULT_LANGUAGE';

DELETE FROM currencies WHERE title = 'Japanese Yen';
UPDATE configuration SET configuration_value = 'USD', last_modified = now() WHERE configuration_key = 'DEFAULT_CURRENCY';
UPDATE currencies SET value='1.000000', last_updated = now() WHERE code='USD';
UPDATE currencies SET value='0.936071', last_updated = now() WHERE code='EUR';
UPDATE currencies SET value='0.805954', last_updated = now() WHERE code='GBP';
UPDATE currencies SET value='1.342504', last_updated = now() WHERE code='CAD';
UPDATE currencies SET value='1.501196', last_updated = now() WHERE code='AUD';

DELETE FROM tax_class WHERE tax_class_title = '消費税';
DELETE FROM geo_zones WHERE geo_zone_name = '日本';
DELETE FROM zones_to_geo_zones WHERE zone_country_id = @japan_id;
DELETE FROM tax_rates WHERE tax_description = '（内消費税：10%）';

UPDATE configuration SET configuration_value = @USA_id, last_modified = now() WHERE configuration_key='STORE_COUNTRY';

UPDATE configuration SET configuration_value = '2', last_modified = now() WHERE configuration_key = 'ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '2', last_modified = now() WHERE configuration_key = 'ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value = '5', last_modified = now() WHERE configuration_key = 'ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_value = 'true', last_modified = now() WHERE configuration_key = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_value = 'false', last_modified = now() WHERE configuration_key = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_value = @USA_id, last_modified = now() WHERE configuration_key = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';
UPDATE configuration SET configuration_value = 'false', last_modified = now() WHERE configuration_key = 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN';

DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_NEKOPOSU%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_LETTERPACKLITE%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_LETTERPACKPLUS%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_SAGAWA%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_YAMATO%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_YUPACK%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_JPPARCELSEA%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_JPPARCELAIR%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_SHIPPING_JPPARCELEMS%';

DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_PAYMENT_SURPLACE%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_PAYMENT_FURIKOMI%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_PAYMENT_SAGAWAECOLLECT%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_PAYMENT_YAMATOECOLLECT%';

DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_ORDER_TOTAL_YAMATOECOLLECT%';
DELETE FROM configuration WHERE configuration_key LIKE 'MODULE_ORDER_TOTAL_PAYPAL%';

#### VERSION UPDATE STATEMENTS
## THE FOLLOWING 2 SECTIONS SHOULD BE THE "LAST" ITEMS IN THE FILE, so that if the upgrade fails prematurely, the version info is not updated.
##The following updates the version HISTORY to store the prior version info (Essentially "moves" the prior version info from the "project_version" to "project_version_history" table
SET @prec_minor_version = (SELECT project_version_minor FROM project_version_history WHERE project_version_key = 'Zen-Cart Main' AND project_version_comment NOT LIKE '%Japanese%' ORDER BY project_version_id DESC LIMIT 1);
SET @prec_minor_version_db = (SELECT project_version_minor FROM project_version_history WHERE project_version_key = 'Zen-Cart Database' AND project_version_comment NOT LIKE '%Japanese%' ORDER BY project_version_id DESC LIMIT 1);
#NEXT_X_ROWS_AS_ONE_COMMAND:3
INSERT INTO project_version_history (project_version_key, project_version_major, project_version_minor, project_version_patch, project_version_date_applied, project_version_comment)
SELECT project_version_key, project_version_major, project_version_minor, project_version_patch1 as project_version_patch, project_version_date_applied, project_version_comment
FROM project_version;

UPDATE project_version SET project_version_minor = @prec_minor_version, project_version_comment = 'Uninstall Japanese Language Pack v210', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Main';
UPDATE project_version SET project_version_minor = @prec_minor_version_db, project_version_comment = 'Uninstall Japanese Language Pack v210', project_version_date_applied = now() WHERE project_version_key = 'Zen-Cart Database';
