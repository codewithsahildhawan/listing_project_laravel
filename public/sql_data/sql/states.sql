-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2024 at 06:43 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_listing_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(191) NOT NULL,
  `state_code` int NOT NULL,
  `state_ut` varchar(2) NOT NULL,
  `country_id` varchar(191) NOT NULL DEFAULT 'IN',
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_code`, `state_ut`, `country_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Andaman And Nicobar Islands', 35, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(2, 'Andhra Pradesh', 28, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(3, 'Arunachal Pradesh', 12, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(4, 'Assam', 18, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(5, 'Bihar', 10, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(6, 'Chandigarh', 4, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(7, 'Chhattisgarh', 22, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(8, 'Delhi', 7, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(9, 'Goa', 30, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(10, 'Gujarat', 24, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(11, 'Haryana', 6, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(12, 'Himachal Pradesh', 2, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(13, 'Jammu And Kashmir', 1, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(14, 'Jharkhand', 20, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(15, 'Karnataka', 29, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(16, 'Kerala', 32, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(17, 'Ladakh', 37, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(18, 'Lakshadweep', 31, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(19, 'Madhya Pradesh', 23, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(20, 'Maharashtra', 27, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(21, 'Manipur', 14, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(22, 'Meghalaya', 17, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(23, 'Mizoram', 15, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(24, 'Nagaland', 13, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(25, 'Odisha', 21, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(26, 'Puducherry', 34, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(27, 'Punjab', 3, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(28, 'Rajasthan', 8, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(29, 'Sikkim', 11, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(30, 'Tamil Nadu', 33, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(31, 'Telangana', 36, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(32, 'The Dadra And Nagar Haveli And Daman And Diu', 38, 'U', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(33, 'Tripura', 16, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(34, 'Uttarakhand', 5, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(35, 'Uttar Pradesh', 9, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00'),
(36, 'West Bengal', 19, 'S', '1', 1, 0, '2024-10-25 13:02:11', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
