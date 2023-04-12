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

ALTER TABLE products DROP COLUMN products_barcode;
ALTER TABLE products DROP COLUMN products_length;
ALTER TABLE products DROP COLUMN products_width;
ALTER TABLE products DROP COLUMN products_height;

DELETE FROM address_format WHERE address_format_id = 21;

UPDATE countries SET address_format_id = 1 WHERE countries_id = 107;

DELETE FROM orders_status WHERE orders_status_name = '処理待ち';
DELETE FROM orders_status WHERE orders_status_name = '処理中';
DELETE FROM orders_status WHERE orders_status_name = '完了';
DELETE FROM orders_status WHERE orders_status_name = '更新';
DELETE FROM orders_status WHERE orders_status_name = '配送済み';

DELETE FROM zones WHERE zone_country_id = 107;
