
#一般設定
UPDATE configuration SET configuration_value=1 WHERE configuration_key='ENTRY_FIRST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value=1 WHERE configuration_key='ENTRY_LAST_NAME_MIN_LENGTH';
UPDATE configuration SET configuration_value=1 WHERE configuration_key='ENTRY_STREET_ADDRESS_MIN_LENGTH';
UPDATE configuration SET configuration_value = 'false' WHERE configuration_key = 'ACCOUNT_SUBURB';
UPDATE configuration SET configuration_value = 'true' WHERE configuration_key = 'DISPLAY_PRICE_WITH_TAX';
UPDATE configuration SET configuration_value = '107' WHERE configuration_key = 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY';

#言語設定
UPDATE configuration SET configuration_value = 'ja' WHERE configuration_key = 'DEFAULT_LANGUAGE';

#通貨設定
UPDATE currencies SET value='0.007500' WHERE code='USD';
UPDATE currencies SET value='0.007235' WHERE code='EUR';
UPDATE currencies SET value='0.006299' WHERE code='GBP';
UPDATE currencies SET value='0.010015' WHERE code='CAD';
UPDATE currencies SET value='0.011166' WHERE code='AUD';
INSERT INTO currencies VALUES (6,'Japanese Yen','JPY','','円','.',',','0','1.000000', now());
UPDATE configuration SET configuration_value = 'JPY' WHERE configuration_key = 'DEFAULT_CURRENCY';

# 税金・税率設定
UPDATE tax_rates SET tax_rate = '10.0',tax_description = '（内消費税：10%）' WHERE tax_rates_id = '1';
UPDATE geo_zones SET geo_zone_name = '日本',geo_zone_description = '日本（消費税）' WHERE geo_zone_id = '1';
UPDATE zones_to_geo_zones SET zone_country_id = '107',zone_id = NULL WHERE association_id = '1';
UPDATE tax_class SET tax_class_title = '消費税',tax_class_description = '消費税（日本）' WHERE tax_class_id = '1';
