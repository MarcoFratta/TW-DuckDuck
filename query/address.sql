CREATE TABLE `addresses` (
    `id_address` int(11) NOT NULL,
    `city` varchar(32) NOT NULL,
    `street` varchar(32) NOT NULL,
    `housenumber` int(11) NOT NULL,
    `details` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `addresses`
	MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT,
	ADD PRIMARY KEY (`id_address`);
    
ALTER TABLE `orders`
	DROP COLUMN `destination`,
    ADD COLUMN `id_address` INT(11) NOT NULL,
    ADD KEY `id_address` (`id_address`);

ALTER TABLE `orders`
    ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_address`) REFERENCES `addresses` (`id_address`) ON DELETE NO ACTION ON UPDATE CASCADE;

INSERT INTO `addresses`(`city`, `street`, `housenumber`, `details`) VALUES
    ('Cesena','Via Cesare Pavese','50','Ingresso 1° piano'),
    ('Cesena','Via Nicolò Macchiavelli','-','Ingresso piano terra');