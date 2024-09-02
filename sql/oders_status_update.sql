SET @lgid=(SELECT languages_id FROM languages WHERE code = 'ja' LIMIT 1);

UPDATE orders_status SET orders_status_name='処理待ち', sort_order=0 WHERE language_id=@lgid AND orders_status_name='Pending';
UPDATE orders_status SET orders_status_name='処理中', sort_order=10 WHERE language_id=@lgid AND orders_status_name='Processing';
UPDATE orders_status SET orders_status_name='完了', sort_order=20 WHERE language_id=@lgid AND orders_status_name='Delivered';
UPDATE orders_status SET orders_status_name='更新', sort_order=30 WHERE language_id=@lgid AND orders_status_name='Update';
UPDATE orders_status SET orders_status_name='配送済み', sort_order=15 WHERE language_id=@lgid AND orders_status_name='Sent';

# if POSM is installed
SET @tbl_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'products_options_stock_names');
SET @sql = IF(@tbl_exists = 0,'SELECT ""','UPDATE IGNORE products_options_stock_names SET pos_name="バックオーダー" WHERE language_id=@lgid AND pos_name_id=1');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;