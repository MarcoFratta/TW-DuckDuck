ALTER TABLE orders
MODIFY COLUMN creation_date varchar(10);
ALTER TABLE `orders` CHANGE `creation_date` `creation_date` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;