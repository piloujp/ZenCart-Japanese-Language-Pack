# Add database prefix if necessary.

UPDATE products 
SET products_mpn = products_barcode, products_barcode = NULL
WHERE products_barcode IS NOT NULL AND products_barcode != '' AND (products_mpn IS NULL OR products_mpn ='');

UPDATE products
SET products_barcode = NULL
WHERE products_barcode = products_mpn OR products_barcode = '';

DELIMITER //

CREATE PROCEDURE DropColumnIfEmpty(
    IN p_table VARCHAR(64), 
    IN p_column VARCHAR(64)
)
BEGIN
    -- Check if any row contains data
    SET @check_query = CONCAT(
        'SELECT COUNT(*) INTO @row_count FROM `', p_table, '` ',
        'WHERE `', p_column, '` IS NOT NULL AND `', p_column, '` != \'\''
    );
    PREPARE stmt1 FROM @check_query;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;

    -- Drop the column only if the count is zero
    IF @row_count = 0 THEN
        SET @drop_query = CONCAT('ALTER TABLE `', p_table, '` DROP COLUMN `', p_column, '`');
        PREPARE stmt2 FROM @drop_query;
        EXECUTE stmt2;
        DEALLOCATE PREPARE stmt2;
        SELECT CONCAT('Column ', p_column, ' dropped successfully.') AS Status;
    ELSE
        SELECT CONCAT('Column ', p_column, ' was NOT dropped because it contains data.') AS Status;
    END IF;
END //

DELIMITER ;

CALL DropColumnIfEmpty('products', 'products_barcode');

DROP PROCEDURE IF EXISTS DropColumnIfEmpty;