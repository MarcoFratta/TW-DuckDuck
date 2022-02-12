-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 12, 2022 alle 22:43
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE rubber_shop;
USE rubber_shop;

--
-- Database: `rubber_shop`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `addresses`
--

CREATE TABLE `addresses` (
  `id_address` int(11) NOT NULL,
  `city` varchar(32) NOT NULL,
  `street` varchar(32) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `details` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `addresses`
--

INSERT INTO `addresses` (`id_address`, `city`, `street`, `housenumber`, `details`) VALUES
(1, 'Cesena', 'Via Cesare Pavese', 50, 'Ingresso 1° piano'),
(2, 'Cesena', 'Via Nicolò Macchiavelli', 0, 'Ingresso piano terra');

-- --------------------------------------------------------

--
-- Struttura della tabella `cards`
--

CREATE TABLE `cards` (
  `id_card` int(11) NOT NULL,
  `number` varchar(19) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `expire_date` varchar(5) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cards`
--

INSERT INTO `cards` (`id_card`, `number`, `cvv`, `expire_date`, `id_client`) VALUES
(6, '1234 5678 1234 5678', '123', '12/22', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `image`) VALUES
(1, 'Amore', './img/mix/bunny.png'),
(2, 'Animali', './img/mix/horse.png'),
(4, 'Fantasy', './img/mix/unicorn.png'),
(5, 'Luxury', './img/mix/luxury.png'),
(7, 'Musica', './img/mix/dj.png'),
(8, 'Natale', './img/mix/santa-claus.png'),
(9, 'Natura', './img/mix/sunflower.png'),
(10, 'Nazionalità', './img/mix/native-indian-female.png'),
(11, 'Professioni', './img/mix/chef.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `clients`
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
-- Dump dei dati per la tabella `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `email`, `password`, `phone`, `sex`) VALUES
(1, 'marco', 'frattarola.marco2000@gmail.com', '$2y$10$TXgDvENXgGocoS6t23NRLeHhzjxZ0FaZzVJEOoiUUGpDVmwsHm.Ja', NULL, NULL),
(2, 'alex', 'alex.siroli@libero.it', '$2y$10$tO6ghAnYvlH/lAI8B3A9..1UmIZacolk.ywFL866qUETZyi0txPIC', NULL, NULL),
(3, 'of', 'guru@gmail.com', '$2y$10$FqeJ3nMV19xPizu6ZPY5YenI9QMUqJpJsMie13xIq1JCX5Q0DRjkW', NULL, NULL),
(4, '', 'andrea.zammarchi3@studio.unibo.it', '$2y$10$viHTm52vud3ls5yaYuExXu5eiRZrXVPO2u3K6yIJn7ZIO7RvNr/n2', NULL, 'Uomo'),
(5, 'client1', 'client1@gmail.com', '$2y$10$SbnN9JTOmkfK8.zRwo.s9O5GycD27QFJNUFFDLbwB8tAfwsrnj46a', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `client_notification`
--

CREATE TABLE `client_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `client_notification`
--

INSERT INTO `client_notification` (`id`, `user_id`, `message`, `date`, `status`) VALUES
(26, 4, 'Il tuo ordine n. 67 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(27, 4, 'Il tuo ordine n. 68 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(28, 4, 'Il tuo ordine n. 69 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(29, 4, 'Il tuo ordine n. 70 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(30, 4, 'Il tuo ordine n. 71 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(31, 4, 'Il tuo ordine n. 72 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(32, 4, 'Il tuo ordine n. 73 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(33, 4, 'Il tuo ordine n. 74 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(34, 4, 'Il tuo ordine n. 75 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(35, 4, 'Il tuo ordine n. 76 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(36, 4, 'Il tuo ordine n. 77 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(37, 4, 'Il tuo ordine n. 78 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(38, 4, 'Il tuo ordine n. 79 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(39, 4, 'Il tuo ordine n. 80 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(40, 4, 'Il tuo ordine n. 81 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(41, 4, 'Il tuo ordine n. 82 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(42, 4, 'Il tuo ordine n. 83 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(43, 4, 'Il tuo ordine n. 84 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(44, 4, 'Il tuo ordine n. 85 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(45, 4, 'Il tuo ordine n. 86 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(46, 4, 'Il tuo ordine n. 87 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(47, 4, 'Il tuo ordine n. 88 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(48, 4, 'Il tuo ordine n. 89 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(49, 4, 'Il tuo ordine n. 90 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(50, 4, 'Il tuo ordine n. 91 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(51, 4, 'Il tuo ordine n. 92 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(52, 4, 'Il tuo ordine n. 93 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(53, 4, 'Il tuo ordine n. 94 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(54, 4, 'Il tuo ordine n. 95 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(55, 4, 'Il tuo ordine n. 96 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(56, 4, 'Il tuo ordine n. 97 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(57, 4, 'Il tuo ordine n. 98 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(58, 4, 'Il tuo ordine n. 99 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(59, 4, 'Il tuo ordine n. 100 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(60, 4, 'Il tuo ordine n. 101 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-10', 1),
(61, 4, 'Il tuo ordine n. 102 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(62, 4, 'Il tuo ordine n. 103 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(63, 4, 'Il tuo ordine n. 104 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(64, 4, 'Il tuo ordine n. 105 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(65, 4, 'Il tuo ordine n. 106 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(66, 4, 'Il tuo ordine n. 107 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 1),
(67, 5, 'Ciao client1! Grazie per esserti iscritto al nostro sito!', '2022-02-11', 0),
(68, 5, 'Il tuo ordine n. 108 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 0),
(69, 5, 'Il tuo ordine n. 109 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-11', 0),
(70, 5, 'Il tuo ordine n. 110 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-12', 0),
(71, 5, 'Il tuo ordine n. 111 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-12', 0),
(72, 5, 'Il tuo ordine n. 112 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-12', 0),
(73, 5, 'Il tuo ordine n. 113 è stato completato. Per dettagli sulla spedizione controlla nell\'area dedicata.', '2022-02-12', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `custom_items`
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

--
-- Dump dei dati per la tabella `custom_items`
--

INSERT INTO `custom_items` (`id_custom_item`, `name`, `image`, `price`, `addition_date`, `id_seller`, `layer`) VALUES
(6, 'testa1', 'uploads/testa1.png', 500, '2022-01-25', 8, 4),
(7, 'testa2', 'uploads/testa2.png', 600, '2022-01-25', 8, 4),
(8, 'testa3', 'uploads/testa3.png', 500, '2022-01-25', 8, 4),
(9, 'testa4', 'uploads/testa4.png', 700, '2022-01-25', 8, 4),
(10, 'testa5', 'uploads/testa5.png', 900, '2022-01-25', 8, 4),
(11, 'occhi1', 'uploads/occhi1.png', 300, '2022-01-25', 8, 3),
(12, 'occhi2', 'uploads/occhi2.png', 600, '2022-01-25', 8, 3),
(13, 'occhi3', 'uploads/occhi3.png', 400, '2022-01-25', 8, 3),
(14, 'base1', 'uploads/base.png', 500, '2022-01-25', 8, 2),
(15, 'corpo1', 'uploads/corpo1.png', 400, '2022-01-25', 8, 1),
(16, 'corpo2', 'uploads/corpo2.png', 500, '2022-01-25', 8, 1),
(17, 'corpo3', 'uploads/corpo3.png', 600, '2022-01-25', 8, 1),
(18, 'corpo4', 'uploads/corpo4.png', 300, '2022-01-25', 8, 1),
(19, 'corpo5', 'uploads/corpo5.png', 100, '2022-01-25', 8, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `custom_order_products`
--

CREATE TABLE `custom_order_products` (
  `id_custom_order_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_custom_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `custom_order_products`
--

INSERT INTO `custom_order_products` (`id_custom_order_product`, `price`, `id_order`, `id_custom_product`, `quantity`) VALUES
(3, 185000, 112, 3, 1),
(4, 145000, 113, 4, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `custom_products`
--

CREATE TABLE `custom_products` (
  `id_custom_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `addition_date` date NOT NULL,
  `id_dimension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `custom_products`
--

INSERT INTO `custom_products` (`id_custom_product`, `price`, `addition_date`, `id_dimension`) VALUES
(3, 1850, '2022-02-12', 3),
(4, 1450, '2022-02-12', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `custom_products_custom_items`
--

CREATE TABLE `custom_products_custom_items` (
  `id_custom_product` int(11) NOT NULL,
  `id_custom_item` int(11) NOT NULL,
  `id_custom_product_custom_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `custom_products_custom_items`
--

INSERT INTO `custom_products_custom_items` (`id_custom_product`, `id_custom_item`, `id_custom_product_custom_item`) VALUES
(3, 10, 9),
(4, 6, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `dimensions`
--

CREATE TABLE `dimensions` (
  `id_dimension` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dimensions`
--

INSERT INTO `dimensions` (`id_dimension`, `width`, `height`, `depth`, `price`, `size`, `name`) VALUES
(1, 30, 40, 30, 300, 1, 'portachiavi'),
(2, 200, 230, 250, 2500, 5, 'XXL'),
(3, 180, 145, 175, 2000, 4, 'XL'),
(4, 85, 70, 85, 950, 3, 'regular'),
(5, 45, 50, 40, 550, 2, 'mini');

-- --------------------------------------------------------

--
-- Struttura della tabella `normal_order_products`
--

CREATE TABLE `normal_order_products` (
  `id_normal_order_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_normal_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `normal_order_products`
--

INSERT INTO `normal_order_products` (`id_normal_order_product`, `price`, `id_normal_product`, `id_order`, `quantity`) VALUES
(45, 270, 10, 111, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `normal_products`
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
-- Dump dei dati per la tabella `normal_products`
--

INSERT INTO `normal_products` (`id_normal_product`, `name`, `description`, `image`, `amount`, `discount`, `price`, `addition_date`, `id_seller`, `id_dimension`, `id_category`) VALUES
(10, 'Freddie Mercury', 'Cantante. Famoso per la canzone \"Bohemian Quacksody\"', './img/mix/bohemian.png', 4998, 10, 300, '2022-02-11', 10, 4, 7),
(11, 'Barman', 'Vuoi un cocktail?', './img/mix/barman.png', 4998, 5, 100, '2022-02-11', 10, 1, 11),
(12, 'Laureato', 'Laureato con 110L in Ingegneria e Scienze informatiche', './img/mix/bachelor.png', 4999, 10, 200, '2022-02-11', 10, 5, 4),
(13, 'Coniglietta', 'Direttamente da Las Vegas.', './img/mix/bunny.png', 5000, 0, 300, '2022-02-11', 10, 3, 1),
(14, 'Business man', 'Investe in azioni DuckDuck.', './img/mix/business-man.png', 5000, 0, 400, '2022-02-11', 10, 4, 11),
(15, 'Chef', 'Rivale principale di Carlo Cracco.', './img/mix/chef.png', 5000, 0, 200, '2022-02-11', 10, 2, 11),
(16, 'Clown', 'Fa ridere...', './img/mix/clown.png', 5000, 0, 100, '2022-02-11', 10, 1, 11),
(17, 'Ciclista', 'Prossimo obiettivo maglia rosa.', './img/mix/biker.png', 5000, 0, 500, '2022-02-11', 10, 5, 11),
(19, 'Diavolo', 'Odia della diavolessa.', './img/mix/devil-man.png', 5000, 0, 400, '2022-02-11', 10, 4, 4),
(20, 'Diavolessa', 'Odia il diavolo.', './img/mix/devil-woman.png', 5000, 0, 400, '2022-02-11', 10, 4, 4),
(21, 'DJ', 'Tunz tunz tunz!', './img/mix/dj.png', 5000, 0, 350, '2022-02-11', 10, 3, 7),
(23, 'Marinaio', 'Ha solcato tutti i Sette Mari.', './img/mix/sailor.png', 5000, 0, 300, '2022-02-11', 10, 3, 11),
(24, 'Principessa delle fiabe', 'Risiede stanza più remota, nella torre più alta.', './img/mix/fairy-princess.png', 5000, 0, 200, '2022-02-11', 10, 2, 1),
(25, 'Contadino', 'Raccoglie il grano per la DuckDuck Company.', './img/mix/farmer.png', 5000, 0, 600, '2022-02-11', 10, 5, 11),
(26, 'Ballerina', 'Ha la passione per il Flamenco, ma non se la cava male anche nel TipTap.', './img/mix/flamenco.png', 5000, 0, 700, '2022-02-11', 10, 5, 7),
(27, 'Nonno', 'Ai suoi tempi si stava meglio...', './img/mix/grandpa.png', 5000, 0, 200, '2022-02-11', 10, 2, 1),
(28, 'Sposo', 'Innamorato della Sposa.', './img/mix/groom.png', 5000, 0, 600, '2022-02-11', 10, 1, 1),
(29, 'Cavallo', 'Sa andare al trotto, al galoppo fa troppa fatica.', './img/mix/horse.png', 5000, 0, 100, '2022-02-11', 10, 1, 2),
(30, 'Cacciatore', 'Di solito collabora con la Regina Cattiva', './img/mix/hunter.png', 5000, 0, 450, '2022-02-11', 10, 4, 9),
(31, 'IronMan', 'Attualmente indossa la Mark III.', './img/mix/ironman.png', 5000, 0, 2500, '2022-02-11', 10, 3, 4),
(32, 'Luxury', 'Le piace distinguersi dalla folla.', './img/mix/luxury.png', 5000, 0, 5000, '2022-02-11', 10, 4, 5),
(33, 'Pellerossa', 'Figlia primogenita di Toro Seduto.', './img/mix/native-indian-female.png', 5000, 0, 300, '2022-02-11', 10, 4, 10),
(34, 'Suora', 'Direttrice degli asili a DuckDuck City.', './img/mix/nun.png', 5000, 0, 200, '2022-02-11', 10, 5, 11),
(35, 'Arbitro', 'Ha diretto la finale di Champions League nel 2020. Va trattato bene altrimenti si rischia di essere espulsi.', './img/mix/referee.png', 5000, 0, 100, '2022-02-11', 10, 2, 11),
(36, 'Babbo Natale', 'Sappiamo tutti il suo ruolo. Comportarsi bene di fronte a lui, altrimenti si rischia di finire nella Lista dei Cattivi.', './img/mix/santa-claus.png', 5000, 0, 500, '2022-02-11', 10, 3, 8),
(37, 'Snorkeler', 'Il suo film preferito è Alla Ricerca Di Nemo.', './img/mix/snorkler.png', 5000, 0, 200, '2022-02-11', 10, 1, 9),
(38, 'Calciatore', 'Poo Po Po Po Po Poooo Poo!', './img/mix/soccer.png', 5000, 0, 200, '2022-02-11', 10, 3, 11),
(39, 'Hostess', 'Vi preghiamo di rimanere seduti finchè il segnale delle cinture di sicurezza è attivo, grazie.', './img/mix/hostess.png', 5000, 0, 450, '2022-02-11', 10, 1, 11),
(40, 'Girasole', 'Gli piace così tanto il sole che potrebbe guardarlo per tutto il giorno.', './img/mix/sunflower.png', 5000, 0, 200, '2022-02-11', 10, 3, 9),
(41, 'La Regina', 'Segni particolari: immortale.', './img/mix/queen.png', 5000, 0, 200, '2022-02-11', 10, 3, 5),
(42, 'Unicorno', 'Come i cavalli, ma cavalca gli arcobaleni.', './img/mix/unicorn.png', 5000, 0, 300, '2022-02-11', 10, 4, 4),
(43, 'Sposa', 'Fatta per essere amata. Innamorata dello Sposo.', './img/mix/wife.png', 5000, 0, 200, '2022-02-11', 10, 3, 1),
(44, 'Il Re', 'Innamorato della Regina.', './img/mix/king.png', 5000, 0, 400, '2022-02-11', 10, 5, 1),
(54, 'Dracula', 'Attenzione! Gli piace il sangue umano.', './img/mix/dracula.png', 5000, 0, 100, '2022-02-11', 10, 1, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `creation_date` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `id_card` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id_order`, `creation_date`, `status`, `id_card`, `id_client`, `id_address`) VALUES
(111, '2022-2-12', 0, 6, 5, 1),
(112, '2022-2-12', 0, 6, 5, 2),
(113, '2022-2-12', 0, 6, 5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `sellers`
--

CREATE TABLE `sellers` (
  `id_seller` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sellers`
--

INSERT INTO `sellers` (`id_seller`, `name`, `email`, `password`) VALUES
(8, 'Antonio', 'antonio@gmail.com', '$2y$10$Vx6Rr6HLYMmtZPNIbYc0x.k0D5/Q0/g8OFTojqZ3bzxT/SHJ3X8sW'),
(9, 'Andrea Zammarchi', 'pippo@gmail.com', '$2y$10$42ngCxk3V7612JZLBCNbM.SxqK083XdL7kETM.gOSGuBBFOSHem.a'),
(10, 'Seller1', 'seller1@gmail.com', '$2y$10$7FmQy6oEvo3oP9K8TS3ypOolNNILSVO1j1haRQkf.uSh3CXssB/ki');

-- --------------------------------------------------------

--
-- Struttura della tabella `seller_notification`
--

CREATE TABLE `seller_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `seller_notification`
--

INSERT INTO `seller_notification` (`id`, `user_id`, `message`, `date`, `status`) VALUES
(30, 10, 'Ciao Seller1! Grazie per esserti iscritto al nostro sito!', '2022-02-11', 0),
(31, 10, 'Il cliente 5 ha acquistato il tuo prodotto con id 10.', '2022-02-11', 1),
(32, 10, 'Il cliente 5 ha acquistato il tuo prodotto con id 11.', '2022-02-11', 1),
(33, 10, 'Il cliente 5 ha acquistato il tuo prodotto con id 12.', '2022-02-12', 1),
(34, 10, 'Il cliente 5 ha acquistato il tuo prodotto con id 11.', '2022-02-12', 1),
(35, 10, 'Il cliente 5 ha acquistato il tuo prodotto con id 10.', '2022-02-12', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_address`);

--
-- Indici per le tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id_card`),
  ADD KEY `id_client_cards` (`id_client`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indici per le tabelle `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `client_notification`
--
ALTER TABLE `client_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notifications_ibfk_1` (`user_id`);

--
-- Indici per le tabelle `custom_items`
--
ALTER TABLE `custom_items`
  ADD PRIMARY KEY (`id_custom_item`),
  ADD KEY `id_seller_custom_items` (`id_seller`) USING BTREE;

--
-- Indici per le tabelle `custom_order_products`
--
ALTER TABLE `custom_order_products`
  ADD PRIMARY KEY (`id_custom_order_product`),
  ADD KEY `id_order` (`id_order`,`id_custom_product`),
  ADD KEY `id_custom_product` (`id_custom_product`);

--
-- Indici per le tabelle `custom_products`
--
ALTER TABLE `custom_products`
  ADD PRIMARY KEY (`id_custom_product`),
  ADD KEY `id_dimension` (`id_dimension`);

--
-- Indici per le tabelle `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  ADD PRIMARY KEY (`id_custom_product_custom_item`),
  ADD KEY `custom_products_id_custom_product` (`id_custom_product`,`id_custom_item`),
  ADD KEY `id_custom_item` (`id_custom_item`);

--
-- Indici per le tabelle `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id_dimension`);

--
-- Indici per le tabelle `normal_order_products`
--
ALTER TABLE `normal_order_products`
  ADD PRIMARY KEY (`id_normal_order_product`),
  ADD KEY `id_normal_product` (`id_normal_product`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indici per le tabelle `normal_products`
--
ALTER TABLE `normal_products`
  ADD PRIMARY KEY (`id_normal_product`),
  ADD KEY `id_seller` (`id_seller`,`id_dimension`,`id_category`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_dimension` (`id_dimension`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_card` (`id_card`,`id_client`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_address` (`id_address`);

--
-- Indici per le tabelle `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id_seller`);

--
-- Indici per le tabelle `seller_notification`
--
ALTER TABLE `seller_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_notifications_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `cards`
--
ALTER TABLE `cards`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `client_notification`
--
ALTER TABLE `client_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT per la tabella `custom_items`
--
ALTER TABLE `custom_items`
  MODIFY `id_custom_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `custom_order_products`
--
ALTER TABLE `custom_order_products`
  MODIFY `id_custom_order_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `custom_products`
--
ALTER TABLE `custom_products`
  MODIFY `id_custom_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  MODIFY `id_custom_product_custom_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `normal_order_products`
--
ALTER TABLE `normal_order_products`
  MODIFY `id_normal_order_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT per la tabella `normal_products`
--
ALTER TABLE `normal_products`
  MODIFY `id_normal_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT per la tabella `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `seller_notification`
--
ALTER TABLE `seller_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `client_notification`
--
ALTER TABLE `client_notification`
  ADD CONSTRAINT `client_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `custom_items`
--
ALTER TABLE `custom_items`
  ADD CONSTRAINT `custom_items_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `custom_order_products`
--
ALTER TABLE `custom_order_products`
  ADD CONSTRAINT `custom_order_products_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_order_products_ibfk_2` FOREIGN KEY (`id_custom_product`) REFERENCES `custom_products` (`id_custom_product`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `custom_products`
--
ALTER TABLE `custom_products`
  ADD CONSTRAINT `custom_products_ibfk_1` FOREIGN KEY (`id_dimension`) REFERENCES `dimensions` (`id_dimension`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `custom_products_custom_items`
--
ALTER TABLE `custom_products_custom_items`
  ADD CONSTRAINT `custom_products_custom_items_ibfk_1` FOREIGN KEY (`id_custom_product`) REFERENCES `custom_products` (`id_custom_product`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_products_custom_items_ibfk_2` FOREIGN KEY (`id_custom_item`) REFERENCES `custom_items` (`id_custom_item`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `normal_order_products`
--
ALTER TABLE `normal_order_products`
  ADD CONSTRAINT `normal_order_products_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `normal_products`
--
ALTER TABLE `normal_products`
  ADD CONSTRAINT `normal_products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `normal_products_ibfk_2` FOREIGN KEY (`id_dimension`) REFERENCES `dimensions` (`id_dimension`) ON UPDATE CASCADE,
  ADD CONSTRAINT `normal_products_ibfk_3` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `cards` (`id_card`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_address`) REFERENCES `addresses` (`id_address`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `seller_notification`
--
ALTER TABLE `seller_notification`
  ADD CONSTRAINT `seller_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
