-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for housing-quest
CREATE DATABASE IF NOT EXISTS `housing-quest` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `housing-quest`;

-- Dumping structure for table housing-quest.landlords
CREATE TABLE IF NOT EXISTS `landlords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT 'profile-pic.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Data exporting was unselected.

-- Dumping structure for table housing-quest.properties
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `index_img` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `summary` text COLLATE utf8mb4_bin NOT NULL,
  `owner_id` int(11) NOT NULL,
  `img_1` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `img_2` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `img_3` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `img_4` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `img_5` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT 'For Rent',
  `location` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_bin DEFAULT 'available',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `owner_id` FOREIGN KEY (`owner_id`) REFERENCES `landlords` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Data exporting was unselected.

-- Dumping structure for table housing-quest.tenants
CREATE TABLE IF NOT EXISTS `tenants` (
  `tenant_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `agreement_date` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `property_bought` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `property_id` int(11) NOT NULL,
  `landlord` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `property_id_idx` (`property_id`),
  KEY `landlord_idx` (`landlord`),
  CONSTRAINT `landlord` FOREIGN KEY (`landlord`) REFERENCES `landlords` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `property_id` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Data exporting was unselected.

-- Dumping structure for table housing-quest.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `property_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id_idx` (`property_id`),
  KEY `transaction_tenant_id_idx` (`tenant_id`),
  CONSTRAINT `transaction_property_id` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `transaction_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
