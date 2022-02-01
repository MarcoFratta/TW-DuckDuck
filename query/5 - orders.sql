ALTER TABLE orders
MODIFY COLUMN creation_date varchar(10);
ALTER TABLE `orders` CHANGE `creation_date` `creation_date` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `orders` CHANGE `status` `status` VARCHAR(11) NOT NULL;
ALTER TABLE normal_order_products ADD COLUMN quantity int(11) NOT NULL;
ALTER TABLE custom_order_products ADD COLUMN quantity int(11) NOT NULL;