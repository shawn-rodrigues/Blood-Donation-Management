-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bbms
CREATE DATABASE IF NOT EXISTS `bbms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bbms`;

-- Dumping structure for table bbms.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.admins: ~0 rows (approximately)
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
	(1, 'Admin User', 'admin@gmail.com', '123456789', 8888888888);

-- Dumping structure for table bbms.donation
CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `no_units` int(11) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.donation: ~1 rows (approximately)
INSERT INTO `donation` (`id`, `donor_id`, `blood_group`, `no_units`, `disease`, `status`) VALUES
	(1, 101, 'A+', 50, '', 1);

-- Dumping structure for table bbms.donors
CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `bgroup` varchar(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.donors: ~4 rows (approximately)
INSERT INTO `donors` (`id`, `name`, `email`, `mobile`, `bgroup`, `password`) VALUES
	(101, 'John Smith', 'donor@gmail.com', 9999999999, 'A+', '123456789'),
	(102, 'Hemant Kumar', 'hemant@gmail.com', 8888888899, 'B+', 'hkm123'),
	(103, 'Emily Johnson', 'emily@gmail.com', 8888888888, 'AB+', '12345'),
	(104, 'David Wilson', 'david@gmail.com', 6666666666, 'O+', '12345');

-- Dumping structure for table bbms.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=508 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.patients: ~5 rows (approximately)
INSERT INTO `patients` (`id`, `name`, `email`, `password`, `mobile`) VALUES
	(501, 'Jennifer Brown', 'Jennifer@gmail.com', '12345', 2147483647),
	(502, 'Robert Miller', 'robert@gmail.com', '12345', 2147483647),
	(503, 'Jessica Anderson', 'jessica@gmail.com', '12345', 9898989898),
	(504, 'William Taylor', 'william@gmail.com', '12345', 7777777777),
	(505, 'Olivia Martin', 'olivia@gmail.com', '12345', 5555555555);

-- Dumping structure for table bbms.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `no_units` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.requests: ~0 rows (approximately)
INSERT INTO `requests` (`id`, `patient_id`, `no_units`, `blood_group`, `reason`, `status`) VALUES
	(1, 502, 50, 'A+', '', 1);

-- Dumping structure for table bbms.stocks
CREATE TABLE IF NOT EXISTS `stocks` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bbms.stocks: ~10 rows (approximately)
INSERT INTO `stocks` (`sno`, `blood_group`, `stock`) VALUES
	(1, 'A', 0),
	(2, 'A+', 0),
	(3, 'A-', 0),
	(4, 'B', 0),
	(5, 'B+', 0),
	(6, 'B-', 0),
	(7, 'AB+', 0),
	(8, 'AB-', 0),
	(9, 'O+', 0),
	(10, 'O-', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
