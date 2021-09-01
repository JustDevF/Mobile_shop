-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `shopee` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `shopee`;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(22,	1,	10),
(23,	1,	9)
ON DUPLICATE KEY UPDATE `cart_id` = VALUES(`cart_id`), `user_id` = VALUES(`user_id`), `item_id` = VALUES(`item_id`);

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `clientId` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `phoneFixe` varchar(100) NOT NULL,
  `phoneMobile` varchar(100) NOT NULL,
  `adressMail` varchar(200) NOT NULL,
  `remarques` text NOT NULL,
  `dateCreation` datetime DEFAULT NULL,
  PRIMARY KEY (`clientId`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `client` (`clientId`, `user_id`, `prenom`, `nom`, `adresse`, `codePostal`, `ville`, `phoneFixe`, `phoneMobile`, `adressMail`, `remarques`, `dateCreation`) VALUES
(7,	NULL,	'dieu',	'etshumba',	'Rue modifié',	'7745',	'paris',	'014756',	'09455',	'dieu@gmail.com',	'bon gars',	'2021-08-31 11:07:43'),
(64,	NULL,	'erwan',	'planche',	'7 rue francois miterrand',	'91800',	'lardy',	'09423596',	'0785616122',	'ewan@gmail.com',	'Test ajout client',	'2021-09-01 10:47:04')
ON DUPLICATE KEY UPDATE `clientId` = VALUES(`clientId`), `user_id` = VALUES(`user_id`), `prenom` = VALUES(`prenom`), `nom` = VALUES(`nom`), `adresse` = VALUES(`adresse`), `codePostal` = VALUES(`codePostal`), `ville` = VALUES(`ville`), `phoneFixe` = VALUES(`phoneFixe`), `phoneMobile` = VALUES(`phoneMobile`), `adressMail` = VALUES(`adressMail`), `remarques` = VALUES(`remarques`), `dateCreation` = VALUES(`dateCreation`);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1,	'Samsung',	'Samsung Galaxy 10',	152.00,	'./assets/products/1.png',	'2020-03-28 11:08:57'),
(2,	'Redmi',	'Redmi Note 7',	122.00,	'./assets/products/2.png',	'2020-03-28 11:08:57'),
(3,	'Redmi',	'Redmi Note 6',	122.00,	'./assets/products/3.png',	'2020-03-28 11:08:57'),
(4,	'Redmi',	'Redmi Note 5',	122.00,	'./assets/products/4.png',	'2020-03-28 11:08:57'),
(5,	'Redmi',	'Redmi Note 4',	122.00,	'./assets/products/5.png',	'2020-03-28 11:08:57'),
(6,	'Redmi',	'Redmi Note 8',	122.00,	'./assets/products/6.png',	'2020-03-28 11:08:57'),
(7,	'Redmi',	'Redmi Note 9',	122.00,	'./assets/products/8.png',	'2020-03-28 11:08:57'),
(8,	'Redmi',	'Redmi Note',	122.00,	'./assets/products/10.png',	'2020-03-28 11:08:57'),
(9,	'Samsung',	'Samsung Galaxy S6',	152.00,	'./assets/products/11.png',	'2020-03-28 11:08:57'),
(10,	'Samsung',	'Samsung Galaxy S7',	152.00,	'./assets/products/12.png',	'2020-03-28 11:08:57'),
(11,	'Apple',	'Apple iPhone 5',	152.00,	'./assets/products/13.png',	'2020-03-28 11:08:57'),
(12,	'Apple',	'Apple iPhone 6',	152.00,	'./assets/products/14.png',	'2020-03-28 11:08:57'),
(13,	'Apple',	'Apple iPhone 7',	152.00,	'./assets/products/15.png',	'2020-03-28 11:08:57')
ON DUPLICATE KEY UPDATE `item_id` = VALUES(`item_id`), `item_brand` = VALUES(`item_brand`), `item_name` = VALUES(`item_name`), `item_price` = VALUES(`item_price`), `item_image` = VALUES(`item_image`), `item_register` = VALUES(`item_register`);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `register_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `register_date`) VALUES
(1,	'Daily',	'Tuition',	'2020-03-28 13:07:17',	'',	NULL),
(2,	'Akshay',	'Kashyap',	'2020-03-28 13:07:17',	'',	NULL),
(3,	'JUSTIN',	'KATASI',	'dieudonnekatasi@gmail.com',	'123456',	'2021-08-03 22:01:00'),
(4,	'planche',	'cathy',	'planche@gmail.com',	'$2y$10$aoaoW/TavYljT.FlplDKvelnRpP1.adECbYDBPVIkPb0Pq74BD8QS',	'2021-08-04 14:27:12'),
(7,	'titi',	'tuto',	'exemple@gmail.com',	'$2y$10$Zl9v.9BDRFdJFKNupJqMI.aNrJz7sHjZJ7T0UoQ1N9mozDUWJIiaW',	'2021-08-04 16:51:12'),
(8,	'JUSTIN',	'KATASI',	'planche@gmail.fr',	'$2y$10$HgQ3NaNlho0dy5zRutzV2eOF/isnZOHiQSc3aEMw.lkPsHXggc8mW',	'2021-08-04 17:11:24'),
(9,	'MAVUNGU',	'Augustin',	'augui_du_93@hotmail.fr',	'$2y$10$GqP0gC9XUU2bPPIwL5qHo.WHUr6arxEJcqkbDDhW2Yer0y0j.SIH6',	'2021-08-08 18:12:24'),
(14,	'KJames',	'KMasudi',	'gjames61@gmail.com',	'2123456',	'2021-08-30 21:19:51'),
(17,	'KJames',	'KMasudi',	'Kjames61@gmail.com',	'2123456',	'2021-08-30 21:18:22'),
(69,	'James',	'Masudi',	'james61@gmail.com',	'123456',	'2021-08-30 20:34:52'),
(100,	'ODBC',	'JDBC',	'gmail@gmail.com',	'123456',	'2021-08-03 22:01:00')
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `first_name` = VALUES(`first_name`), `last_name` = VALUES(`last_name`), `email_address` = VALUES(`email_address`), `password` = VALUES(`password`), `register_date` = VALUES(`register_date`);

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `wishlist` (`cart_id`, `user_id`, `item_id`) VALUES
(15,	1,	5)
ON DUPLICATE KEY UPDATE `cart_id` = VALUES(`cart_id`), `user_id` = VALUES(`user_id`), `item_id` = VALUES(`item_id`);

-- 2021-09-01 21:49:03
