-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rubber_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id_card` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `expire_date` varchar(5) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'amore'),
(2, 'animali'),
(3, 'coppie'),
(4, 'fantasy'),
(5, 'luxury'),
(6, 'matrimonio'),
(7, 'musica'),
(8, 'natale'),
(9, 'natura'),
(10, 'nazionalità');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `email`, `password`, `phone`, `sex`) VALUES
(1, 'marco', 'frattarola.marco2000@gmail.com', '$2y$10$TXgDvENXgGocoS6t23NRLeHhzjxZ0FaZzVJEOoiUUGpDVmwsHm.Ja', NULL, NULL),
(2, 'alex', 'alex.siroli@libero.it', '$2y$10$tO6ghAnYvlH/lAI8B3A9..1UmIZacolk.ywFL866qUETZyi0txPIC', NULL, NULL),
(3, 'of', 'guru@gmail.com', '$2y$10$FqeJ3nMV19xPizu6ZPY5YenI9QMUqJpJsMie13xIq1JCX5Q0DRjkW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_items`
--

CREATE TABLE `custom_items` (
  `id_custom_item` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `addition_date` date NOT NULL,
  `id_seller` int(11) NOT NULL,
  `layer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_order_products`
--

CREATE TABLE `custom_order_products` (
  `id_custom_order_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_custom_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_products`
--

CREATE TABLE `custom_products` (
  `id_custom_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `addition_date` date NOT NULL,
  `id_dimension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_products_custom_items`
--

CREATE TABLE `custom_products_custom_items` (
  `id_custom_product` int(11) NOT NULL,
  `id_custom_item` int(11) NOT NULL,
  `id_custom_product_custom_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE `dimensions` (
  `id_dimension` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id_dimension`, `width`, `height`, `depth`, `price`, `size`) VALUES
(1, 30, 40, 30, 300, 1),
(2, 200, 230, 250, 2500, 5),
(3, 180, 145, 175, 2000, 4),
(4, 85, 70, 85, 950, 3),
(5, 45, 50, 40, 550, 2);

-- --------------------------------------------------------

--
-- Table structure for table `normal_order_products`
--

CREATE TABLE `normal_order_products` (
  `id_normal_order_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_normal_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `normal_products`
--

CREATE TABLE `normal_products` (
  `id_normal_product` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `addition_date` date NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_dimension` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normal_products`
--

INSERT INTO `normal_products` (`id_normal_product`, `name`, `description`, `image`, `amount`, `discount`, `price`, `addition_date`, `id_seller`, `id_dimension`, `id_category`) VALUES
(1, 'barista', 'Gradisci un cocktail? Un aperitivo? O anche solo una tonica con uno spicchio di limone? La papera Barista del Milan Duck Store è pronta per esaudire i tuoi desideri!', 'nessuna', 50, 0, 10, '2021-11-27', 1, 3, 5),
(2, 'laurato', 'no', '', 40, 0, 50, '2021-11-29', 1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `id_card` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id_seller` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id_seller`, `name`, `email`, `password`) VALUES
(1, 'Marco', 'marco.frattarola@studio.unibo.it', 'password'),
(2, 'luca', 'frattarola.marco2000@gmail.com', '$2y$10$GbGAcmfew3.U3JgA/tQel.eZWLDSdNSb0X02WWRL.EWTzcRvmLbbi'),
(3, 'ciao', 'f@gmail.com', '$2y$10$DZS6d8TEXgT0FJt3Kdms7emNze49Z44rR/bKJYjct2gAy0SgNlSPC'),
(4, 'ciao', 'f@gmail.com', '$2y$10$cixVb/PTKc7vPqZ./x0Q4.rpEtbSlxHbhpP.AtNZJb5Lql00Cqk5.'),
(5, 'ciao', 'marco@gmail.com', '$2y$10$JM1CQthaU3rty6Dx5dJYBuj1z0paF26IjFOv43.8nzS8x6VzLEYLq'),
(6, 'alex', 'a@gmail.com', '$2y$10$PkaxvZ3QDF./Pgi4YtDEde0ZnHQO3uHCx8MG375BkjQlYJNxJZHwy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id_card`),
  ADD KEY `id_client_cards` (`id_client`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `custom_items`
--
ALTER TABLE `custom_items`
  ADD PRIMARY KEY (`id_custom_item`),
  ADD KEY `id_seller_custom_items` (`id_seller`) USING BTREE;

--
-- Indexes for table `custom_order_products`
--
ALTER TABLE `custom_order_products`
  ADD PRIMARY KEY (`id_custom_order_product`),
  ADD KEY `id_order` (`id_order`,`id_custom_product`),
  ADD KEY `id_custom_product` (`id_custom_product`);

--
-- Indexes for table `custom_products`
--
ALTER TABLE `custom_products`
  ADD PRIMARY KEY (`id_custom_product`),
  ADD KEY `id_dimension` (`id_dimension`);

--
-- Indexes for table `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  ADD PRIMARY KEY (`id_custom_product_custom_item`),
  ADD KEY `custom_products_id_custom_product` (`id_custom_product`,`id_custom_item`),
  ADD KEY `id_custom_item` (`id_custom_item`);

--
-- Indexes for table `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id_dimension`);

--
-- Indexes for table `normal_order_products`
--
ALTER TABLE `normal_order_products`
  ADD PRIMARY KEY (`id_normal_order_product`),
  ADD KEY `id_normal_product` (`id_normal_product`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `normal_products`
--
ALTER TABLE `normal_products`
  ADD PRIMARY KEY (`id_normal_product`),
  ADD KEY `id_seller` (`id_seller`,`id_dimension`,`id_category`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_dimension` (`id_dimension`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_card` (`id_card`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id_seller`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_items`
--
ALTER TABLE `custom_items`
  MODIFY `id_custom_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_order_products`
--
ALTER TABLE `custom_order_products`
  MODIFY `id_custom_order_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_products`
--
ALTER TABLE `custom_products`
  MODIFY `id_custom_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  MODIFY `id_custom_product_custom_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `normal_order_products`
--
ALTER TABLE `normal_order_products`
  MODIFY `id_normal_order_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `normal_products`
--
ALTER TABLE `normal_products`
  MODIFY `id_normal_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custom_items`
--
ALTER TABLE `custom_items`
  ADD CONSTRAINT `custom_items_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `custom_order_products`
--
ALTER TABLE `custom_order_products`
  ADD CONSTRAINT `custom_order_products_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_order_products_ibfk_2` FOREIGN KEY (`id_custom_product`) REFERENCES `custom_products` (`id_custom_product`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `custom_products`
--
ALTER TABLE `custom_products`
  ADD CONSTRAINT `custom_products_ibfk_1` FOREIGN KEY (`id_dimension`) REFERENCES `dimensions` (`id_dimension`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  ADD CONSTRAINT `custom_products_custom_items_ibfk_1` FOREIGN KEY (`id_custom_product`) REFERENCES `custom_products` (`id_custom_product`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_products_custom_items_ibfk_2` FOREIGN KEY (`id_custom_item`) REFERENCES `custom_items` (`id_custom_item`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `normal_order_products`
--
ALTER TABLE `normal_order_products`
  ADD CONSTRAINT `normal_order_products_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_products`
--
ALTER TABLE `normal_products`
  ADD CONSTRAINT `normal_products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `normal_products_ibfk_2` FOREIGN KEY (`id_dimension`) REFERENCES `dimensions` (`id_dimension`) ON UPDATE CASCADE,
  ADD CONSTRAINT `normal_products_ibfk_3` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `cards` (`id_card`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
