ALTER TABLE `dimensions` ADD `name` VARCHAR(50) NOT NULL AFTER `size`;
UPDATE `dimensions` SET `name` = 'portachiavi' WHERE `dimensions`.`id_dimension` = 1
UPDATE `dimensions` SET `name` = 'mini' WHERE `dimensions`.`id_dimension` = 5
UPDATE `dimensions` SET `name` = 'regular' WHERE `dimensions`.`id_dimension` = 4
UPDATE `dimensions` SET `name` = 'XL' WHERE `dimensions`.`id_dimension` = 3
UPDATE `dimensions` SET `name` = 'XXL' WHERE `dimensions`.`id_dimension` = 2