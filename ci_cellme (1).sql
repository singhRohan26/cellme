-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2020 at 12:03 AM
-- Server version: 5.6.48-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_cellme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image_url`) VALUES
(1, 'admin', 'admin@teksmart.com', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', '651088.png');

-- --------------------------------------------------------

--
-- Table structure for table `automatic_testing`
--

CREATE TABLE `automatic_testing` (
  `testing_id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `device_id` varchar(50) NOT NULL,
  `battery` int(11) DEFAULT NULL,
  `cellular_network` int(11) DEFAULT NULL,
  `cpu` int(11) DEFAULT NULL,
  `gps` int(11) DEFAULT NULL,
  `vibration` int(11) DEFAULT NULL,
  `call_function` int(11) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  `specification` int(11) DEFAULT NULL,
  `flash` int(11) DEFAULT NULL,
  `bluetooth` int(11) DEFAULT NULL,
  `speaker` int(11) DEFAULT NULL,
  `wifi` int(11) DEFAULT NULL,
  `bottom_microphone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `automatic_testing`
--

INSERT INTO `automatic_testing` (`testing_id`, `user_id`, `device_id`, `battery`, `cellular_network`, `cpu`, `gps`, `vibration`, `call_function`, `memory`, `speed`, `storage`, `specification`, `flash`, `bluetooth`, `speaker`, `wifi`, `bottom_microphone`, `created_at`) VALUES
(1, '2', 'OPM1.171019.026', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 09:04:39'),
(2, '2', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 10:44:12'),
(3, '2', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 11:04:40'),
(4, '2', 'NRD90M', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 12:59:34'),
(5, '21', 'QP1A.190711.020', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 11:40:03'),
(6, '21', 'QP1A.190711.020', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 11:41:57'),
(7, NULL, 'MTC20F', 1, 1, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-10 13:51:11'),
(8, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 14:24:34'),
(9, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:22:30'),
(10, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 06:52:38'),
(11, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:46:49'),
(12, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:49:20'),
(13, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:51:21'),
(14, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:55:44'),
(15, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 15:59:02'),
(16, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 16:02:19'),
(17, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-10 16:04:19'),
(18, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 06:52:31'),
(19, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 06:53:35'),
(20, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 06:55:17'),
(21, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 07:01:39'),
(22, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 07:10:25'),
(23, '23', 'PPR1.180610.011', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 07:48:25'),
(24, '23', 'PPR1.180610.011', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-11 07:57:27'),
(25, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 09:53:20'),
(26, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 09:54:27'),
(27, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-11 14:05:05'),
(28, NULL, 'PKQ1.180819.001', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 09:15:25'),
(29, '2', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 09:53:15'),
(30, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 10:43:05'),
(31, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 10:44:51'),
(32, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 11:34:56'),
(33, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 11:35:46'),
(34, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 11:37:24'),
(35, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 11:40:09'),
(36, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:52:50'),
(37, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, 0, '2020-08-12 12:53:41'),
(38, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:55:18'),
(39, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:55:54'),
(40, '5', 'NRD90M', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:56:09'),
(41, '5', 'NRD90M', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:56:56'),
(42, '', 'ov4QjrD5qRa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:58:36'),
(43, '5', 'NRD90M', 1, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 12:59:54'),
(44, '5', 'NRD90M', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 13:00:02'),
(45, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:00:55'),
(46, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:02:31'),
(47, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:05:46'),
(48, '5', 'NRD90M', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-12 13:09:21'),
(49, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:10:23'),
(50, '3', 'R16NW', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:10:55'),
(51, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-12 13:12:58'),
(52, NULL, 'PKQ1.180819.001', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 0, '2020-08-13 05:54:24'),
(53, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:15:03'),
(54, '5', 'NRD90M', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:18:02'),
(55, '2', 'OPM1.171019.026', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:32:31'),
(56, '2', 'OPM1.171019.026', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:36:40'),
(57, '2', 'OPM1.171019.026', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:37:45'),
(58, '6', 'QKQ1.190910.002', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-08-13 06:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `holder_name` varchar(20) NOT NULL,
  `account` varchar(30) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_detail`
--

INSERT INTO `bank_detail` (`id`, `user_id`, `holder_name`, `account`, `ifsc`, `bank_name`, `created_at`) VALUES
(1, 23, 'John Hicton', '12345678', '123456', 'HSBC', '2020-08-11 00:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `claim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dop` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `model_no` varchar(50) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `imei_1` varchar(50) NOT NULL,
  `imei_2` varchar(50) NOT NULL,
  `fault` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cosmetic_testing`
--

CREATE TABLE `cosmetic_testing` (
  `testing_id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `device_id` varchar(50) NOT NULL,
  `automatic_testing_id` int(11) NOT NULL,
  `display` int(11) NOT NULL,
  `all_sides` int(11) NOT NULL,
  `buttons` int(11) NOT NULL,
  `rear_back_cover` int(11) NOT NULL,
  `image_shaddow` enum('Yes','No') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cosmetic_testing`
--

INSERT INTO `cosmetic_testing` (`testing_id`, `user_id`, `device_id`, `automatic_testing_id`, `display`, `all_sides`, `buttons`, `rear_back_cover`, `image_shaddow`, `created_at`) VALUES
(1, '3', 'R16NW', 8, 8, 7, 7, 6, 'No', '2020-08-10 14:26:58'),
(2, '23', 'PPR1.180610.011', 9, 10, 9, 9, 10, 'No', '2020-08-10 15:24:07'),
(3, '3', 'R16NW', 12, 7, 4, 4, 4, 'Yes', '2020-08-10 15:50:02'),
(4, '3', 'R16NW', 14, 5, 5, 4, 4, 'No', '2020-08-10 15:56:11'),
(5, '3', 'R16NW', 15, 5, 5, 5, 4, 'Yes', '2020-08-10 16:00:04'),
(6, '3', 'R16NW', 16, 5, 5, 4, 3, 'No', '2020-08-10 16:03:07'),
(7, '3', 'R16NW', 17, 6, 5, 4, 6, 'No', '2020-08-10 16:04:34'),
(8, '23', 'PPR1.180610.011', 21, 10, 7, 8, 8, 'No', '2020-08-11 07:03:41'),
(9, '23', 'PPR1.180610.011', 22, 8, 8, 8, 8, 'Yes', '2020-08-11 07:10:46'),
(10, '3', 'R16NW', 26, 6, 6, 4, 6, 'No', '2020-08-11 09:56:56'),
(11, '2', 'NRD90M', 4, 1, 1, 1, 1, 'Yes', '2020-08-12 08:14:40'),
(12, '2', 'NRD90M', 29, 8, 9, 7, 8, 'No', '2020-08-12 09:53:27'),
(13, '5', 'NRD90M', 30, 5, 6, 6, 4, 'No', '2020-08-12 10:43:22'),
(14, '5', 'NRD90M', 31, 7, 8, 8, 7, 'No', '2020-08-12 10:45:17'),
(15, NULL, 'NRD90M', 32, 6, 7, 7, 5, 'No', '2020-08-12 11:34:29'),
(16, '5', 'NRD90M', 33, 8, 8, 8, 8, 'No', '2020-08-12 11:35:58'),
(17, '5', 'NRD90M', 34, 1, 1, 2, 1, 'No', '2020-08-12 11:37:36'),
(18, '5', 'NRD90M', 35, 1, 1, 3, 4, 'No', '2020-08-12 11:40:25'),
(19, '3', 'R16NW', 50, 4, 4, 4, 4, 'No', '2020-08-12 13:12:14'),
(20, '5', 'NRD90M', 53, 1, 1, 1, 1, 'No', '2020-08-13 06:15:17'),
(21, '5', 'NRD90M', 54, 1, 1, 1, 1, 'No', '2020-08-13 06:19:21'),
(22, '2', 'OPM1.171019.026', 56, 1, 2, 1, 2, 'No', '2020-08-13 06:36:54'),
(23, '2', 'OPM1.171019.026', 57, 1, 1, 2, 1, 'No', '2020-08-13 06:38:01'),
(24, '6', 'QKQ1.190910.002', 58, 8, 7, 8, 8, 'No', '2020-08-13 07:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into <strong>electronic typesetting</strong>, remaining essentially unchanged. It was popularised in the 1960s with the release of <em>Letraset sheets</em> containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of <em><strong>Lorem Ipsum</strong></em>.', 'Active', '2020-02-29 16:39:22', '2020-02-29 16:39:22'),
(2, 'What is Lorem Ipsum again?', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum</strong> has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into <strong>electronic typesetting</strong>, remaining essentially unchanged. It was popularised in the 1960s with the release of <em>Letraset sheets</em> containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of <em><strong>Lorem Ipsum</strong></em>.', 'Active', '2020-02-29 17:40:50', '2020-02-29 17:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `working_price` int(11) NOT NULL,
  `non_working_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `device_id`, `working_price`, `non_working_price`, `created_at`) VALUES
(1, 'NRD90M', 13200, 6000, '2020-08-12 01:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `manual_testing`
--

CREATE TABLE `manual_testing` (
  `testing_id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `device_id` varchar(50) NOT NULL,
  `automatic_testing_id` int(11) NOT NULL,
  `front_camera` int(11) DEFAULT NULL,
  `back_camera` int(11) DEFAULT NULL,
  `hardware_btn` int(11) DEFAULT NULL,
  `touch_Screen` int(11) DEFAULT NULL,
  `headphone` int(11) DEFAULT NULL,
  `earpiece` int(11) DEFAULT NULL,
  `accelerometer` int(11) DEFAULT NULL,
  `charger` int(11) DEFAULT NULL,
  `compass` int(11) DEFAULT NULL,
  `fingerprint` int(11) DEFAULT NULL,
  `light_sensor` int(11) DEFAULT NULL,
  `gyroscope` int(11) DEFAULT NULL,
  `face_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manual_testing`
--

INSERT INTO `manual_testing` (`testing_id`, `user_id`, `device_id`, `automatic_testing_id`, `front_camera`, `back_camera`, `hardware_btn`, `touch_Screen`, `headphone`, `earpiece`, `accelerometer`, `charger`, `compass`, `fingerprint`, `light_sensor`, `gyroscope`, `face_id`, `created_at`) VALUES
(1, '2', 'NRD90M', 3, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-10 11:04:50'),
(2, '2', 'NRD90M', 4, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-10 11:06:57'),
(3, '23', 'PPR1.180610.011', 10, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-10 15:26:56'),
(4, '3', 'R16NW', 11, NULL, NULL, NULL, 0, NULL, 1, 1, 1, 1, 1, NULL, 1, NULL, '2020-08-10 15:48:17'),
(5, '23', 'PPR1.180610.011', 23, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-11 07:48:30'),
(6, '3', 'R16NW', 27, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 1, 1, 1, 1, NULL, '2020-08-11 14:06:23'),
(7, '5', 'NRD90M', 30, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-12 10:43:09'),
(8, '5', 'NRD90M', 46, 1, 1, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, 1, 1, NULL, '2020-08-12 13:03:48'),
(9, '5', 'NRD90M', 47, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-12 13:06:20'),
(10, '5', 'NRD90M', 49, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-12 13:10:30'),
(11, '5', 'NRD90M', 51, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-12 13:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  `working_price` int(11) NOT NULL,
  `non_working_price` int(11) NOT NULL,
  `order_status` enum('Phone sent','Pending','Received','Received-ok','Received-error','Follow-up','Accepted','Return','Paid') NOT NULL,
  `price` varchar(50) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `user_id`, `device_id`, `working_price`, `non_working_price`, `order_status`, `price`, `message`, `image`, `created_at`, `update_at`) VALUES
(1, 2, 'NRD90M', 6000, 3000, 'Accepted', '1000', NULL, 'd3f4b90a8644b44d0bfc34039929c366.jpg', '2020-08-12 08:26:30', '2020-08-13 05:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `phone_order_status`
--

CREATE TABLE `phone_order_status` (
  `id` int(10) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postage`
--

CREATE TABLE `postage` (
  `postage_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quick_testing`
--

CREATE TABLE `quick_testing` (
  `testing_id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `device_id` varchar(50) NOT NULL,
  `automatic_testing_id` int(11) NOT NULL,
  `touch_Screen` int(11) DEFAULT NULL,
  `hardware_btn` int(11) DEFAULT NULL,
  `front_camera` int(11) DEFAULT NULL,
  `back_camera` int(11) DEFAULT NULL,
  `proxmity_sensor` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quick_testing`
--

INSERT INTO `quick_testing` (`testing_id`, `user_id`, `device_id`, `automatic_testing_id`, `touch_Screen`, `hardware_btn`, `front_camera`, `back_camera`, `proxmity_sensor`, `created_at`) VALUES
(1, '21', 'QP1A.190711.020', 6, 0, NULL, NULL, NULL, NULL, '2020-08-10 11:42:08'),
(2, '3', 'R16NW', 8, 0, 1, 1, 1, 1, '2020-08-10 14:25:59'),
(3, '3', 'R16NW', 8, 1, NULL, NULL, NULL, NULL, '2020-08-10 14:33:03'),
(4, '23', 'PPR1.180610.011', 9, 1, 1, 1, 1, 1, '2020-08-10 15:23:53'),
(5, '3', 'R16NW', 12, 0, NULL, NULL, NULL, NULL, '2020-08-10 15:49:53'),
(6, '3', 'R16NW', 14, 0, NULL, NULL, NULL, 1, '2020-08-10 15:55:59'),
(7, '3', 'R16NW', 15, 0, NULL, NULL, NULL, 1, '2020-08-10 15:59:15'),
(8, '3', 'R16NW', 15, 1, NULL, NULL, NULL, NULL, '2020-08-10 15:59:52'),
(9, '3', 'R16NW', 17, 0, NULL, NULL, NULL, NULL, '2020-08-10 16:04:22'),
(10, '23', 'PPR1.180610.011', 20, 1, 1, 1, 1, 1, '2020-08-11 06:57:15'),
(11, '23', 'PPR1.180610.011', 21, 1, 1, 1, 1, 1, '2020-08-11 07:03:19'),
(12, '23', 'PPR1.180610.011', 22, 0, NULL, NULL, NULL, NULL, '2020-08-11 07:10:30'),
(13, '3', 'R16NW', 26, 0, NULL, NULL, NULL, 1, '2020-08-11 09:55:47'),
(14, NULL, 'PKQ1.180819.001', 28, 0, NULL, NULL, NULL, NULL, '2020-08-12 09:16:04'),
(15, '2', 'NRD90M', 29, 0, NULL, NULL, NULL, NULL, '2020-08-12 09:53:20'),
(16, '5', 'NRD90M', 31, 0, NULL, NULL, NULL, NULL, '2020-08-12 10:45:00'),
(17, NULL, 'NRD90M', 32, 0, NULL, NULL, NULL, NULL, '2020-08-12 11:34:20'),
(18, '5', 'NRD90M', 33, 0, NULL, NULL, NULL, NULL, '2020-08-12 11:35:49'),
(19, '5', 'NRD90M', 34, 0, NULL, NULL, NULL, NULL, '2020-08-12 11:37:27'),
(20, '5', 'NRD90M', 35, 0, NULL, NULL, NULL, NULL, '2020-08-12 11:40:14'),
(21, '5', 'NRD90M', 45, 0, NULL, 1, 1, 1, '2020-08-12 13:01:29'),
(22, '3', 'R16NW', 50, 0, 1, 1, 1, 1, '2020-08-12 13:12:38'),
(23, '5', 'NRD90M', 53, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:15:07'),
(24, '5', 'NRD90M', 54, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:19:14'),
(25, '2', 'OPM1.171019.026', 55, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:32:47'),
(26, '2', 'OPM1.171019.026', 55, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:32:50'),
(27, '2', 'OPM1.171019.026', 56, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:36:44'),
(28, '2', 'OPM1.171019.026', 57, 0, NULL, NULL, NULL, NULL, '2020-08-13 06:37:48'),
(29, '6', 'QKQ1.190910.002', 58, 1, 1, NULL, NULL, 1, '2020-08-13 07:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `sellme`
--

CREATE TABLE `sellme` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `quality` int(11) NOT NULL,
  `backup` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `erase_content` int(11) NOT NULL,
  `sim_card` int(11) NOT NULL,
  `is_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellme`
--

INSERT INTO `sellme` (`id`, `user_id`, `device_id`, `first_name`, `last_name`, `email`, `address`, `phone`, `quality`, `backup`, `account`, `power`, `erase_content`, `sim_card`, `is_verified`, `created_at`) VALUES
(1, 23, 'PPR1.180610.011', 'John Hicton', 'Hicton', 'johnhicton@gmail.com', 'france', '0607964317', 1, 1, 1, 1, 1, 1, 'Yes', '2020-08-11 07:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

CREATE TABLE `test_history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tm_device_list`
--

CREATE TABLE `tm_device_list` (
  `id` int(10) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_device_list`
--

INSERT INTO `tm_device_list` (`id`, `device_name`, `created_at`) VALUES
(1, 'Accer', '2020-04-16 12:02:07'),
(4, 'samsung', '2020-04-28 05:12:13'),
(5, 'apple', '2020-04-28 05:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `tm_device_specification`
--

CREATE TABLE `tm_device_specification` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `point` int(10) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_device_specification`
--

INSERT INTO `tm_device_specification` (`id`, `name`, `point`, `created_time`) VALUES
(1, 'Screen', 500, '2020-03-18 07:22:11'),
(2, 'Sound', 600, '2020-03-18 07:22:11'),
(3, 'Motion', 300, '2020-03-18 07:23:11'),
(4, 'Connectivity', 600, '2020-03-18 07:23:11'),
(5, 'Hardware', 1550, '2020-03-18 07:23:40'),
(6, 'Camera', 600, '2020-03-18 07:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `tm_faqs`
--

CREATE TABLE `tm_faqs` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_faqs`
--

INSERT INTO `tm_faqs` (`id`, `title`, `description`, `status`, `created_at`) VALUES
(1, 'testing Faq\'s demo', '<span style=\"color: rgb(51, 51, 51); font-family: Oxygen, Arial; font-size: 18px; background-color: rgba(0, 0, 0, 0.016);\">this is testing purpose..</span>', 'Inactive', '2020-04-14 06:01:55'),
(2, 'What is the Regular Labs Library?', 'If you use any Regular Labs extensions, this plugin must be installed and published. They will not function correctly or they will not function at all without it ...', 'Active', '2020-04-14 06:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `tm_firebase_token`
--

CREATE TABLE `tm_firebase_token` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `token_id` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_firebase_token`
--

INSERT INTO `tm_firebase_token` (`id`, `user_id`, `token_id`, `status`, `created_time`, `update_time`) VALUES
(1, 1, 'sdfsdf', 'Active', '2020-05-28 09:20:05', '2020-07-28 11:50:17'),
(2, 2, 'sdfsdf', 'Active', '2020-05-28 09:26:22', '2020-07-28 11:50:17'),
(3, 3, 'sdfsdf', 'Active', '2020-05-28 09:29:00', '2020-07-28 11:50:17'),
(4, 4, 'sdfsdf', 'Active', '2020-05-28 09:33:18', '2020-07-28 11:50:17'),
(5, 5, 'sdfsdf', 'Active', '2020-05-28 09:34:03', '2020-07-28 11:50:17'),
(6, 6, 'sdfsdf', 'Active', '2020-05-28 09:34:38', '2020-07-28 11:50:17'),
(7, 7, 'sdfsdf', 'Active', '2020-05-28 09:37:06', '2020-07-28 11:50:17'),
(8, 8, 'sdfsdf', 'Active', '2020-05-28 09:40:31', '2020-07-28 11:50:17'),
(9, 3, 'sdfsdf', 'Active', '2020-05-28 12:37:30', '2020-07-28 11:50:17'),
(10, 3, 'sdfsdf', 'Active', '2020-05-28 12:46:03', '2020-07-28 11:50:17'),
(11, 2, 'sdfsdf', 'Active', '2020-05-28 13:22:57', '2020-07-28 11:50:17'),
(12, 3, 'sdfsdf', 'Active', '2020-05-29 12:07:28', '2020-07-28 11:50:17'),
(13, 3, 'sdfsdf', 'Active', '2020-06-01 12:21:59', '2020-07-28 11:50:17'),
(14, 3, 'sdfsdf', 'Active', '2020-06-01 13:14:56', '2020-07-28 11:50:17'),
(15, 9, 'sdfsdf', 'Active', '2020-06-02 04:23:14', '2020-07-28 11:50:17'),
(16, 9, 'sdfsdf', 'Active', '2020-06-02 06:44:05', '2020-07-28 11:50:17'),
(17, 5, 'sdfsdf', 'Active', '2020-06-03 05:30:24', '2020-07-28 11:50:17'),
(18, 5, 'sdfsdf', 'Active', '2020-06-03 05:30:40', '2020-07-28 11:50:17'),
(19, 10, 'sdfsdf', 'Active', '2020-06-05 08:48:39', '2020-07-28 11:50:17'),
(20, 3, 'sdfsdf', 'Active', '2020-06-11 06:26:13', '2020-07-28 11:50:17'),
(21, 10, 'sdfsdf', 'Active', '2020-06-11 13:03:51', '2020-07-28 11:50:17'),
(22, 3, 'sdfsdf', 'Active', '2020-06-12 08:29:32', '2020-07-28 11:50:17'),
(23, 3, 'sdfsdf', 'Active', '2020-06-16 07:48:28', '2020-07-28 11:50:17'),
(24, 10, 'sdfsdf', 'Active', '2020-06-17 09:17:15', '2020-07-28 11:50:17'),
(25, 3, 'sdfsdf', 'Active', '2020-06-19 16:54:26', '2020-07-28 11:50:17'),
(26, 9, 'sdfsdf', 'Active', '2020-06-22 09:48:44', '2020-07-28 11:50:17'),
(27, 9, 'sdfsdf', 'Active', '2020-06-23 06:13:19', '2020-07-28 11:50:17'),
(28, 3, 'sdfsdf', 'Active', '2020-06-24 05:39:10', '2020-07-28 11:50:17'),
(29, 11, 'sdfsdf', 'Active', '2020-06-25 06:06:52', '2020-07-28 11:50:17'),
(30, 12, 'sdfsdf', 'Active', '2020-06-25 10:48:59', '2020-07-28 11:50:17'),
(31, 12, 'sdfsdf', 'Active', '2020-06-25 10:49:27', '2020-07-28 11:50:17'),
(32, 9, 'sdfsdf', 'Active', '2020-06-25 11:25:49', '2020-07-28 11:50:17'),
(33, 3, 'sdfsdf', 'Active', '2020-06-25 12:08:49', '2020-07-28 11:50:17'),
(34, 3, 'sdfsdf', 'Active', '2020-06-25 12:10:37', '2020-07-28 11:50:17'),
(35, 3, 'sdfsdf', 'Active', '2020-06-25 12:12:05', '2020-07-28 11:50:17'),
(36, 3, 'sdfsdf', 'Active', '2020-06-26 05:41:07', '2020-07-28 11:50:17'),
(37, 3, 'sdfsdf', 'Active', '2020-06-26 12:45:17', '2020-07-28 11:50:17'),
(38, 3, 'sdfsdf', 'Active', '2020-06-26 12:47:42', '2020-07-28 11:50:17'),
(39, 3, 'sdfsdf', 'Active', '2020-06-26 13:00:09', '2020-07-28 11:50:17'),
(40, 13, 'sdfsdf', 'Active', '2020-06-27 11:59:47', '2020-07-28 11:50:17'),
(41, 13, 'sdfsdf', 'Active', '2020-06-27 12:03:22', '2020-07-28 11:50:17'),
(42, 14, 'sdfsdf', 'Active', '2020-06-27 12:05:27', '2020-07-28 11:50:17'),
(43, 14, 'sdfsdf', 'Active', '2020-06-29 13:00:09', '2020-07-28 11:50:17'),
(44, 15, 'sdfsdf', 'Active', '2020-06-30 05:53:19', '2020-07-28 11:50:17'),
(45, 15, 'sdfsdf', 'Active', '2020-06-30 07:12:46', '2020-07-28 11:50:17'),
(46, 15, 'sdfsdf', 'Active', '2020-06-30 11:30:51', '2020-07-28 11:50:17'),
(47, 15, 'sdfsdf', 'Active', '2020-06-30 12:04:54', '2020-07-28 11:50:17'),
(48, 16, 'sdfsdf', 'Active', '2020-06-30 13:15:53', '2020-07-28 11:50:17'),
(49, 17, 'sdfsdf', 'Active', '2020-06-30 13:16:37', '2020-07-28 11:50:17'),
(50, 9, 'sdfsdf', 'Active', '2020-06-30 16:02:22', '2020-07-28 11:50:17'),
(51, 9, 'sdfsdf', 'Active', '2020-06-30 18:35:57', '2020-07-28 11:50:17'),
(52, 17, 'sdfsdf', 'Active', '2020-07-01 05:56:39', '2020-07-28 11:50:17'),
(53, 3, 'sdfsdf', 'Active', '2020-07-01 11:44:14', '2020-07-28 11:50:17'),
(54, 17, 'sdfsdf', 'Active', '2020-07-02 11:56:35', '2020-07-28 11:50:17'),
(55, 9, 'sdfsdf', 'Active', '2020-07-02 13:05:04', '2020-07-28 11:50:17'),
(56, 15, 'sdfsdf', 'Active', '2020-07-03 09:23:47', '2020-07-28 11:50:17'),
(57, 18, 'sdfsdf', 'Active', '2020-07-03 11:04:33', '2020-07-28 11:50:17'),
(58, 9, 'sdfsdf', 'Active', '2020-07-03 12:50:13', '2020-07-28 11:50:17'),
(59, 9, 'sdfsdf', 'Active', '2020-07-05 07:56:56', '2020-07-28 11:50:17'),
(60, 12, 'sdfsdf', 'Active', '2020-07-05 12:22:53', '2020-07-28 11:50:17'),
(61, 9, 'sdfsdf', 'Active', '2020-07-05 13:37:03', '2020-07-28 11:50:17'),
(62, 17, 'sdfsdf', 'Active', '2020-07-05 14:06:40', '2020-07-28 11:50:17'),
(63, 17, 'sdfsdf', 'Active', '2020-07-06 05:22:31', '2020-07-28 11:50:17'),
(64, 17, 'sdfsdf', 'Active', '2020-07-06 05:25:15', '2020-07-28 11:50:17'),
(65, 17, 'sdfsdf', 'Active', '2020-07-06 05:28:20', '2020-07-28 11:50:17'),
(66, 9, 'sdfsdf', 'Active', '2020-07-06 05:53:13', '2020-07-28 11:50:17'),
(67, 17, 'sdfsdf', 'Active', '2020-07-06 07:51:38', '2020-07-28 11:50:17'),
(68, 17, 'sdfsdf', 'Active', '2020-07-06 08:10:01', '2020-07-28 11:50:17'),
(69, 15, 'sdfsdf', 'Active', '2020-07-06 15:04:49', '2020-07-28 11:50:17'),
(70, 12, 'sdfsdf', 'Active', '2020-07-06 15:46:40', '2020-07-28 11:50:17'),
(71, 9, 'sdfsdf', 'Active', '2020-07-07 09:06:41', '2020-07-28 11:50:17'),
(72, 17, 'sdfsdf', 'Active', '2020-07-07 10:06:55', '2020-07-28 11:50:17'),
(73, 19, 'sdfsdf', 'Active', '2020-07-07 11:05:49', '2020-07-28 11:50:17'),
(74, 17, 'sdfsdf', 'Active', '2020-07-07 12:12:46', '2020-07-28 11:50:17'),
(75, 20, 'sdfsdf', 'Active', '2020-07-07 12:42:40', '2020-07-28 11:50:17'),
(76, 20, 'sdfsdf', 'Active', '2020-07-07 13:08:44', '2020-07-28 11:50:17'),
(77, 21, 'sdfsdf', 'Active', '2020-07-08 08:15:24', '2020-07-28 11:50:17'),
(78, 21, 'sdfsdf', 'Active', '2020-07-08 08:17:36', '2020-07-28 11:50:17'),
(79, 21, 'sdfsdf', 'Active', '2020-07-08 08:33:10', '2020-07-28 11:50:17'),
(80, 20, 'sdfsdf', 'Active', '2020-07-08 09:05:56', '2020-07-28 11:50:17'),
(81, 18, 'sdfsdf', 'Active', '2020-07-08 11:08:24', '2020-07-28 11:50:17'),
(82, 18, 'sdfsdf', 'Active', '2020-07-08 11:09:45', '2020-07-28 11:50:17'),
(83, 21, 'sdfsdf', 'Active', '2020-07-08 11:24:16', '2020-07-28 11:50:17'),
(84, 21, 'sdfsdf', 'Active', '2020-07-08 11:24:56', '2020-07-28 11:50:17'),
(85, 21, 'sdfsdf', 'Active', '2020-07-08 11:26:13', '2020-07-28 11:50:17'),
(86, 20, 'sdfsdf', 'Active', '2020-07-08 11:32:49', '2020-07-28 11:50:17'),
(87, 21, 'sdfsdf', 'Active', '2020-07-08 11:39:37', '2020-07-28 11:50:17'),
(88, 21, 'sdfsdf', 'Active', '2020-07-08 12:38:11', '2020-07-28 11:50:17'),
(89, 21, 'sdfsdf', 'Active', '2020-07-08 12:40:12', '2020-07-28 11:50:17'),
(90, 20, 'sdfsdf', 'Active', '2020-07-09 07:00:41', '2020-07-28 11:50:17'),
(91, 20, 'sdfsdf', 'Active', '2020-07-09 07:02:21', '2020-07-28 11:50:17'),
(92, 17, 'sdfsdf', 'Active', '2020-07-09 07:02:40', '2020-07-28 11:50:17'),
(93, 17, 'sdfsdf', 'Active', '2020-07-09 07:07:11', '2020-07-28 11:50:17'),
(94, 19, 'sdfsdf', 'Active', '2020-07-09 07:30:04', '2020-07-28 11:50:17'),
(95, 18, 'sdfsdf', 'Active', '2020-07-09 07:56:51', '2020-07-28 11:50:17'),
(96, 18, 'sdfsdf', 'Active', '2020-07-09 08:39:19', '2020-07-28 11:50:17'),
(97, 15, 'sdfsdf', 'Active', '2020-07-09 09:34:37', '2020-07-28 11:50:17'),
(98, 18, 'sdfsdf', 'Active', '2020-07-09 10:47:24', '2020-07-28 11:50:17'),
(99, 21, 'sdfsdf', 'Active', '2020-07-09 11:44:07', '2020-07-28 11:50:17'),
(100, 21, 'sdfsdf', 'Active', '2020-07-09 11:44:50', '2020-07-28 11:50:17'),
(101, 17, 'sdfsdf', 'Active', '2020-07-09 13:49:00', '2020-07-28 11:50:17'),
(102, 21, 'sdfsdf', 'Active', '2020-07-09 13:55:35', '2020-07-28 11:50:17'),
(103, 17, 'sdfsdf', 'Active', '2020-07-09 14:33:09', '2020-07-28 11:50:17'),
(104, 17, 'sdfsdf', 'Active', '2020-07-10 07:18:10', '2020-07-28 11:50:17'),
(105, 19, 'sdfsdf', 'Active', '2020-07-10 07:57:28', '2020-07-28 11:50:17'),
(106, 17, 'sdfsdf', 'Active', '2020-07-10 08:02:07', '2020-07-28 11:50:17'),
(107, 17, 'sdfsdf', 'Active', '2020-07-10 08:07:39', '2020-07-28 11:50:17'),
(108, 21, 'sdfsdf', 'Active', '2020-07-10 11:29:29', '2020-07-28 11:50:17'),
(109, 21, 'sdfsdf', 'Active', '2020-07-10 13:54:23', '2020-07-28 11:50:17'),
(110, 21, 'sdfsdf', 'Active', '2020-07-10 13:55:27', '2020-07-28 11:50:17'),
(111, 17, 'sdfsdf', 'Active', '2020-07-10 13:58:13', '2020-07-28 11:50:17'),
(112, 19, 'sdfsdf', 'Active', '2020-07-10 15:36:26', '2020-07-28 11:50:17'),
(113, 14, 'sdfsdf', 'Active', '2020-07-10 17:29:43', '2020-07-28 11:50:17'),
(114, 22, 'sdfsdf', 'Active', '2020-07-11 06:53:55', '2020-07-28 11:50:17'),
(115, 14, 'sdfsdf', 'Active', '2020-07-12 12:54:47', '2020-07-28 11:50:17'),
(116, 15, 'sdfsdf', 'Active', '2020-07-13 08:12:13', '2020-07-28 11:50:17'),
(117, 15, 'sdfsdf', 'Active', '2020-07-13 10:31:09', '2020-07-28 11:50:17'),
(118, 17, 'sdfsdf', 'Active', '2020-07-13 11:32:57', '2020-07-28 11:50:17'),
(119, 23, 'sdfsdf', 'Active', '2020-07-14 07:38:04', '2020-07-28 11:50:17'),
(120, 23, 'sdfsdf', 'Active', '2020-07-14 07:50:05', '2020-07-28 11:50:17'),
(121, 14, 'sdfsdf', 'Active', '2020-07-14 10:25:29', '2020-07-28 11:50:17'),
(122, 20, 'sdfsdf', 'Active', '2020-07-15 08:56:41', '2020-07-28 11:50:17'),
(123, 23, 'sdfsdf', 'Active', '2020-07-15 12:10:53', '2020-07-28 11:50:17'),
(124, 17, 'sdfsdf', 'Active', '2020-07-15 12:33:14', '2020-07-28 11:50:17'),
(125, 17, 'sdfsdf', 'Active', '2020-07-18 05:48:28', '2020-07-28 11:50:17'),
(126, 20, 'sdfsdf', 'Active', '2020-07-18 05:52:37', '2020-07-28 11:50:17'),
(127, 5, 'sdfsdf', 'Active', '2020-07-18 06:27:02', '2020-07-28 11:50:17'),
(128, 17, 'sdfsdf', 'Active', '2020-07-18 10:55:39', '2020-07-28 11:50:17'),
(129, 17, 'sdfsdf', 'Active', '2020-07-18 10:59:47', '2020-07-28 11:50:17'),
(130, 11, 'sdfsdf', 'Active', '2020-07-18 12:56:47', '2020-07-28 11:50:17'),
(131, 17, 'sdfsdf', 'Active', '2020-07-18 12:59:35', '2020-07-28 11:50:17'),
(132, 9, 'sdfsdf', 'Active', '2020-07-22 06:08:27', '2020-07-28 11:50:17'),
(133, 17, 'sdfsdf', 'Active', '2020-07-23 06:41:51', '2020-07-28 11:50:17'),
(134, 9, 'sdfsdf', 'Active', '2020-07-23 09:17:11', '2020-07-28 11:50:17'),
(135, 18, 'sdfsdf', 'Active', '2020-07-23 11:10:02', '2020-07-28 11:50:17'),
(136, 17, 'sdfsdf', 'Active', '2020-07-23 11:44:36', '2020-07-28 11:50:17'),
(137, 17, 'sdfsdf', 'Active', '2020-07-23 11:44:50', '2020-07-28 11:50:17'),
(138, 24, 'sdfsdf', 'Active', '2020-07-23 13:46:45', '2020-07-28 11:50:17'),
(139, 12, 'sdfsdf', 'Active', '2020-07-23 13:46:45', '2020-07-28 11:50:17'),
(140, 9, 'sdfsdf', 'Active', '2020-07-24 12:22:38', '2020-07-28 11:50:17'),
(141, 17, 'sdfsdf', 'Active', '2020-07-27 05:40:52', '2020-07-28 11:50:17'),
(142, 25, 'sdfsdf', 'Active', '2020-07-27 05:54:25', '2020-07-28 11:50:17'),
(143, 25, 'sdfsdf', 'Active', '2020-07-27 05:55:05', '2020-07-28 11:50:17'),
(144, 26, 'sdfsdf', 'Active', '2020-07-27 05:59:33', '2020-07-28 11:50:17'),
(145, 27, 'sdfsdf', 'Active', '2020-07-27 06:00:22', '2020-07-28 11:50:17'),
(146, 27, 'sdfsdf', 'Active', '2020-07-27 06:00:44', '2020-07-28 11:50:17'),
(147, 25, 'sdfsdf', 'Active', '2020-07-27 06:01:14', '2020-07-28 11:50:17'),
(148, 9, 'sdfsdf', 'Active', '2020-07-27 06:41:43', '2020-07-28 11:50:17'),
(149, 21, 'sdfsdf', 'Active', '2020-07-27 07:05:30', '2020-07-28 11:50:17'),
(150, 21, 'sdfsdf', 'Active', '2020-07-27 08:20:22', '2020-07-28 11:50:17'),
(151, 21, 'sdfsdf', 'Active', '2020-07-27 08:31:06', '2020-07-28 11:50:17'),
(152, 20, 'sdfsdf', 'Active', '2020-07-27 09:57:55', '2020-07-28 11:50:17'),
(153, 20, 'sdfsdf', 'Active', '2020-07-27 09:58:40', '2020-07-28 11:50:17'),
(154, 9, 'sdfsdf', 'Active', '2020-07-27 10:52:49', '2020-07-28 11:50:17'),
(155, 28, 'sdfsdf', 'Active', '2020-07-28 03:58:23', '2020-07-28 11:50:17'),
(156, 20, 'sdfsdf', 'Active', '2020-07-28 04:56:57', '2020-07-28 11:50:17'),
(157, 20, 'sdfsdf', 'Active', '2020-07-28 11:43:29', '2020-07-28 11:50:17'),
(158, 20, 'sdfsdf', 'Active', '2020-07-28 11:48:24', '2020-07-28 11:50:17'),
(159, 20, 'sdfsdf', 'Active', '2020-07-28 11:49:14', NULL),
(160, 20, 'sdfsdf', 'Active', '2020-07-28 11:49:32', '2020-07-28 11:50:17'),
(161, 20, 'sdfsdf', 'Active', '2020-07-28 11:52:28', '2020-07-28 11:53:59'),
(162, 20, 'eFIZChFOR5aOHwOiQyQBfe:APA91bGr3SDoo3jdmhDDgDDaiIOXtHpFuxpAYwZL0GDFFjBeB-iXhSROgtlT39uNdNsgUdEKaHop2', 'Active', '2020-07-28 13:54:07', NULL),
(163, 15, 'ddWb_Nx6QBCx2bhLp_IkCw:APA91bEdp9QIHyfF6EALBzd1FB52XbLZb7-xiT582mk2p39bPNdaIfdJUAfrPnu7CmZVXySZue-NO', 'Active', '2020-07-29 05:44:04', NULL),
(164, 15, 'ddWb_Nx6QBCx2bhLp_IkCw:APA91bEdp9QIHyfF6EALBzd1FB52XbLZb7-xiT582mk2p39bPNdaIfdJUAfrPnu7CmZVXySZue-NO', 'Active', '2020-07-29 06:26:04', NULL),
(165, 15, 'du0TGivUxEIDrG9dupLNXJ:APA91bFZ3Mnuv8FkYvj4fFLOgoMXYR6kqvw5LSICsdF-pJNEvUnz6sUdDUKAah-q0zvAdM9bnM0Dw', 'Active', '2020-07-29 08:31:04', NULL),
(166, 20, 'eFIZChFOR5aOHwOiQyQBfe:APA91bGr3SDoo3jdmhDDgDDaiIOXtHpFuxpAYwZL0GDFFjBeB-iXhSROgtlT39uNdNsgUdEKaHop2', 'Active', '2020-07-29 10:18:53', NULL),
(167, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-29 12:45:49', NULL),
(168, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-29 12:47:24', NULL),
(169, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-29 12:54:11', NULL),
(170, 20, 'cgy6uGOATKSNMLC2qQ6lzB:APA91bE34TnwpjwzvYivYNgSoOX95FlkQArNd0iPEb2gdHStSe4V7yL4vIN8_l1njmTlBaJRugmY-', 'Active', '2020-07-29 13:46:15', NULL),
(171, 29, 'eCtxt-VbQrmHv1AypXgE5s:APA91bGnUR2XZdjbSuyQBuVOuhkgVeDiomUlZIre6UtL_v-xd8QdJ73xc0tt4SCvPkjl9f08Xw7YL', 'Active', '2020-07-30 03:43:25', NULL),
(172, 28, 'cKIUwjzlqUrKi_DarCpbha:APA91bGruIrEVFCkhQ6S6QWvc-WXAAgJttcWRq7Mp1H5nltGfOjm0uoF31vfmhpCSCvqqRA-B7og1', 'Active', '2020-07-30 04:19:22', NULL),
(173, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-30 07:13:21', NULL),
(174, 20, 'doUJ1tKuRfKZShY3S5Cte4:APA91bFY_c8sCpTCRmkzXhusYgdcfizRbqaD9lbcADlGN35-JGsSdmA0IhY-aah33nE0tYXsK4pPS', 'Active', '2020-07-30 07:51:08', NULL),
(175, 20, 'fUJL3cTyRY-ZXG2VRogXl-:APA91bFefuKir1CSRRBUmHpMGLHMqJxa5DjE51RKhNLfKS0rr9H4UmhrJ43bgwZ4vjhKcWIwTLcli', 'Active', '2020-07-30 12:51:24', NULL),
(176, 20, 'ddkknBQmRKmk_E26V20Kop:APA91bFYuetNM2DsoarP87lofhNDwA0J3s4RrUOxw9OacDOckdgcKK4vgDY5ZYcbgxRNa2GzIILvk', 'Active', '2020-07-30 13:39:16', NULL),
(177, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-31 05:55:54', NULL),
(178, 17, 'ddkknBQmRKmk_E26V20Kop:APA91bFYuetNM2DsoarP87lofhNDwA0J3s4RrUOxw9OacDOckdgcKK4vgDY5ZYcbgxRNa2GzIILvk', 'Active', '2020-07-31 08:28:33', NULL),
(179, 20, 'ddkknBQmRKmk_E26V20Kop:APA91bFYuetNM2DsoarP87lofhNDwA0J3s4RrUOxw9OacDOckdgcKK4vgDY5ZYcbgxRNa2GzIILvk', 'Active', '2020-07-31 08:32:25', NULL),
(180, 20, 'ddkknBQmRKmk_E26V20Kop:APA91bFYuetNM2DsoarP87lofhNDwA0J3s4RrUOxw9OacDOckdgcKK4vgDY5ZYcbgxRNa2GzIILvk', 'Active', '2020-07-31 08:32:31', NULL),
(181, 20, 'ddkknBQmRKmk_E26V20Kop:APA91bFYuetNM2DsoarP87lofhNDwA0J3s4RrUOxw9OacDOckdgcKK4vgDY5ZYcbgxRNa2GzIILvk', 'Active', '2020-07-31 08:32:31', NULL),
(182, 20, 'eeIvzYFQTge0XvRmRSe15Q:APA91bGo8WoPHWyKiJTr23ihKEcnim2py5un7L_yQ6XSnb4zcRH0ViIVNlgNM63YmTzrmMe8hqdOR', 'Active', '2020-07-31 08:33:51', NULL),
(183, 9, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-31 08:44:55', NULL),
(184, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-31 08:45:24', NULL),
(185, 30, 'dRBlrau8Q_So9N73jkGzww:APA91bGx215xka2AWlwcAtHSpOSY5OSVIkHYvpn1xdco7LJAoBKSSI-IWce41sFG5ao7GYD7av1du', 'Active', '2020-07-31 08:53:34', NULL),
(186, 21, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-31 11:04:51', NULL),
(187, 9, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-07-31 13:17:08', NULL),
(188, 20, 'f5IB3LUicEf_u4As4l4lzU:APA91bHGVrOIsJOkSfbR7h8QXeTiy2oW_dItuLJJGf2SRr3bEivoQJgduRTOJxEcFs62Mbbh0xgwC', 'Active', '2020-08-04 10:36:44', NULL),
(189, 31, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-08-04 11:30:18', NULL),
(190, 9, 'cSah9naLRqa538VHSlk4QF:APA91bFjGYKI5xJvSVBfOw5hZ64RpQgC_qv-OIujEhtEghDJQnt_XUS8h1Azo1Ua86vxnauZCneh-', 'Active', '2020-08-04 11:35:55', NULL),
(191, 28, 'fhJQp7_GO0l1jP0che9XBt:APA91bEHR4CiFJbxhA2zgJIDtPc29ddCzi8Dc3nDIV-uiGgUzBf9ffSlpbi6-W3eo2RzPHCglWw3F', 'Active', '2020-08-05 03:57:37', NULL),
(192, 1, 'fdsfsdhkhksjd', 'Active', '2020-08-07 10:24:22', NULL),
(193, 2, 'fRzQxhyWQzeKdz_YJe7iyw:APA91bHxHsZWma0-5_cPMhV_hxnEcFMuMVZjDmMYjwVgOxkogYj4FfPxna-5fnMVLwBdxDMuGSlSc', 'Active', '2020-08-10 09:01:01', NULL),
(194, 2, 'fjqOZFs9Ree6dXFu1R06mX:APA91bEp74n3KazqKZJCy8KiLuy_vz2i8NcZEdehPTPb9vgh0aRjQLrFRSKUY0GQvdpaauBNB9Ysy', 'Active', '2020-08-10 09:02:21', NULL),
(195, 3, 'fVJOZqI3SV6aG38uoYvWcu:APA91bHL5M_CBBS3_wh_US5dA1a1gN1TbGJuaQkhllDPE5gBVDWTew211sDMEyM7atoy7CNnuh0uQ', 'Active', '2020-08-10 14:17:47', NULL),
(196, 4, 'fRzQxhyWQzeKdz_YJe7iyw:APA91bHxHsZWma0-5_cPMhV_hxnEcFMuMVZjDmMYjwVgOxkogYj4FfPxna-5fnMVLwBdxDMuGSlSc', 'Active', '2020-08-12 10:32:30', NULL),
(197, 5, 'fRzQxhyWQzeKdz_YJe7iyw:APA91bHxHsZWma0-5_cPMhV_hxnEcFMuMVZjDmMYjwVgOxkogYj4FfPxna-5fnMVLwBdxDMuGSlSc', 'Active', '2020-08-12 10:41:34', NULL),
(198, 5, 'fRzQxhyWQzeKdz_YJe7iyw:APA91bHxHsZWma0-5_cPMhV_hxnEcFMuMVZjDmMYjwVgOxkogYj4FfPxna-5fnMVLwBdxDMuGSlSc', 'Active', '2020-08-12 11:34:56', NULL),
(199, 6, 'cdXaANsCR5GWSCJexgpCGt:APA91bHdAc1RvFTFvu4cV4oU23J2-30Aknb4yfAm_YgC2_jQn42TNA5syAji9YCScsclrQEz9oMfe', 'Active', '2020-08-13 06:41:50', NULL),
(200, 6, 'cdXaANsCR5GWSCJexgpCGt:APA91bHdAc1RvFTFvu4cV4oU23J2-30Aknb4yfAm_YgC2_jQn42TNA5syAji9YCScsclrQEz9oMfe', 'Active', '2020-08-13 06:41:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_mobile_list`
--

CREATE TABLE `tm_mobile_list` (
  `id` int(10) NOT NULL,
  `mb_id` varchar(200) NOT NULL,
  `mb_model_no` varchar(100) NOT NULL,
  `mb_model_checkmend` varchar(200) NOT NULL,
  `mb_working_price` varchar(100) NOT NULL,
  `mb_not_working_price` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_mobile_list`
--

INSERT INTO `tm_mobile_list` (`id`, `mb_id`, `mb_model_no`, `mb_model_checkmend`, `mb_working_price`, `mb_not_working_price`, `created_at`) VALUES
(1, '19', 'LLD-AL10', 'BE TOUCH E101,E101,BE TOUCH', '10999', '5000', '2020-04-15 09:27:22'),
(2, '19', 'SM-J600G', 'BE TOUCH E101,E101,BE TOUCH', '9999', '4500', '2020-04-16 09:39:14'),
(3, '27', 'Apple iPad 16gb WiFi', 'IPAD WIFI,IPAD WIFI 64GB,A1219,A1337', '11111', '6000', '2020-04-16 09:39:14'),
(4, '27', 'Apple iPad 16gb WiFi 3G', 'IPAD WIFI,IPAD WIFI 64GB,A1219,A1337', '10000', '5500', '2020-04-16 09:39:14'),
(5, '6', 'Apple iPhone 16GB', 'IPAD WIFI,IPAD WIFI 64GB,A1219,A1337', '32999', '13500', '2020-04-16 09:39:14'),
(6, '23', 'Redmi Note 4', 'IPOD TOUCH,IPOD TOUCH 16GB,IPOD TOUCH 1ST GEN,TOUCH 1ST GEN,A1213', '22000', '12000', '2020-04-28 09:50:06'),
(7, '23', 'Xiaomi Xiaomi Redmi Note 4', 'IPOD TOUCH,IPOD TOUCH 32GB,IPOD TOUCH 1ST GEN,TOUCH 1ST GEN,A1213', '12000', '6000', '2020-04-28 10:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `tm_notification`
--

CREATE TABLE `tm_notification` (
  `notification_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(300) NOT NULL,
  `body` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tm_storage`
--

CREATE TABLE `tm_storage` (
  `id` int(10) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_storage`
--

INSERT INTO `tm_storage` (`id`, `ram`, `storage`, `created_at`) VALUES
(1, '6GB', '64Gb', '2020-04-28 05:23:44'),
(3, '4GB', '32Gb', '2020-04-28 06:41:35'),
(4, '6GB', '132GB', '2020-04-28 07:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `tm_users`
--

CREATE TABLE `tm_users` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` text,
  `pin_no` int(10) DEFAULT NULL,
  `image_url` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL DEFAULT 'Self',
  `is_verify` enum('Varify','NotVerify') NOT NULL DEFAULT 'NotVerify',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_users`
--

INSERT INTO `tm_users` (`user_id`, `full_name`, `email`, `password`, `country_code`, `mobile_no`, `address`, `pin_no`, `image_url`, `source`, `is_verify`, `status`, `created_time`, `updated_time`) VALUES
(1, 'Rohan', 'rohan.designoweb@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '+91', '9899246225', NULL, NULL, '908039.jpg', 'Self', 'NotVerify', 'Active', '2020-08-07 10:24:22', '2020-08-11 05:27:27'),
(2, 'sahil varshney', 'sahilkumar.designoweb@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '91', '8868034517', NULL, NULL, 'U-2@7113.jpg', 'Self', 'NotVerify', 'Active', '2020-08-10 09:01:01', '2020-08-12 07:26:08'),
(3, 'Rusty', 'rlc@cellme.tech', 'e3f4bb4493ff09ef813142f66c1900451ceb23c4291b7701bd8e20a0c518ede4', '44', '7813029217', NULL, NULL, '', 'Self', 'NotVerify', 'Active', '2020-08-10 14:17:47', NULL),
(4, 'sahil', 'sahivarshney66@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '91', '8447190937', NULL, NULL, '', 'Self', 'NotVerify', 'Active', '2020-08-12 10:32:30', NULL),
(5, 'zjs', 'designoweb@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '91', '97979676494', NULL, NULL, '', 'Self', 'NotVerify', 'Active', '2020-08-12 10:41:34', NULL),
(6, 'SHUBHAM GUPTA', 'shubham.designoweb@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '91', '8467080004', NULL, NULL, '', 'Self', 'NotVerify', 'Active', '2020-08-13 06:41:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_user_device`
--

CREATE TABLE `tm_user_device` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `device_id` varchar(100) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `model_no` varchar(30) NOT NULL,
  `device_ram` varchar(100) NOT NULL,
  `main_camera` varchar(100) NOT NULL,
  `front_camera` varchar(100) NOT NULL,
  `imei` varchar(50) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `os` varchar(20) NOT NULL,
  `resolution` varchar(50) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_user_device`
--

INSERT INTO `tm_user_device` (`id`, `user_id`, `device_id`, `device_name`, `model_no`, `device_ram`, `main_camera`, `front_camera`, `imei`, `processor`, `os`, `resolution`, `storage`, `created_time`) VALUES
(1, 2, 'OPM1.171019.026', 'Xiaomi', 'Xiaomi Xiaomi Redmi 5A', '2.8 GB', '13', '5', '868645047671634', '8.1.0', 'android', '720*1280', '24 GB', '2020-08-10 08:11:05'),
(2, 5, 'NRD90M', 'xiaomi', 'Xiaomi Xiaomi Redmi Note 4', '3.5 GB', '13', '5', '866467038679290', '7.0', 'android', '1080*1920', '52.2 GB', '2020-08-10 08:16:03'),
(3, NULL, 'QP1A.190711.020', 'samsung', 'samsung samsung SM-J600G', '3.7 GB', '13', '8', 'fc74e08465c85d5d', '10', 'android', '720*1384', '52.7 GB', '2020-08-10 11:31:11'),
(4, NULL, 'MTC20F', 'google', 'LGE LGE Nexus 5X', '4 GB', '2', '1', '355266040655597', '6.0.1', 'android', '288*448', '3.9 GB', '2020-08-10 13:48:40'),
(5, 3, 'R16NW', 'samsung', 'samsung samsung SM-G950F', '3.4 GB', '12', '8', '355089086229113', '8.0.0', 'android', '1080*2076', '54 GB', '2020-08-10 14:07:54'),
(6, NULL, 'PPR1.180610.011', 'samsung', 'samsung samsung SM-G950F', '3.6 GB', '12', '8', '355089086241696', '9', 'android', '1080*2076', '54 GB', '2020-08-10 15:21:48'),
(7, NULL, 'PKQ1.180819.001', 'vivo', 'vivo vivo vivo 1725', '5.6 GB', '24', '24', '868530039438384', '9', 'android', '1080*2075', '108.4 GB', '2020-08-12 09:05:55'),
(8, 6, 'QKQ1.190910.002', 'Xiaomi', 'Xiaomi Xiaomi Mi A3', '3.5 GB', '12', '8', '1f7d080af63f4608', '10', 'android', '720*1411', '48.3 GB', '2020-08-13 06:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `tm_web_setting`
--

CREATE TABLE `tm_web_setting` (
  `id` int(10) NOT NULL,
  `function` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_web_setting`
--

INSERT INTO `tm_web_setting` (`id`, `function`, `title`, `description`, `created_at`, `update_at`) VALUES
(1, 'aboutus', 'About Us', '  <ul><li><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span></li><li><span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span></li></ul>', '2020-04-08 13:07:32', '2020-04-28 11:58:56'),
(2, 'terms', 'Terms and Conditions Title.!', '       <ul> 	<li>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 </li> 	<li>English versions from the 1914 </li> 	<li>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 </li> 	<li>English versions from the 1914</li> </ul>', '2020-04-28 11:59:40', '2020-04-28 11:59:40'),
(3, 'privacy', 'Privacy Policy', '       <ul> 	<li>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 </li> 	<li>English versions from the 1914 </li> 	<li>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 </li> 	<li>English versions from the 1914</li> </ul>', '2020-04-28 11:59:40', '2020-08-10 05:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `warranty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dop` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `model_no` varchar(50) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `imei_1` varchar(50) NOT NULL,
  `imei_2` varchar(50) NOT NULL,
  `warranty_time` enum('6 Months','12 Months') NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`warranty_id`, `user_id`, `device_id`, `owner_name`, `email`, `dop`, `phone`, `model_no`, `serial_no`, `imei_1`, `imei_2`, `warranty_time`, `file`, `created_at`) VALUES
(1, 2, 'NRD90M', 'sahil', 'sahilkumar.designoweb@gmail.com', '10-8-2020', '8868034517', 'Xiaomi Redmi Note 4', 'b409c6c40404', '866467038679290', '866467038679282', '12 Months', '', '2020-08-10 11:05:48'),
(2, 23, 'PPR1.180610.011', 'John Test', 'john.hicton@cellme.tech', '14-8-2020', '0607964317', 'samsung SM-G950F', 'ce021712d5f9e8330c', '355089086241696', '355089086241696', '6 Months', '', '2020-08-10 15:25:59'),
(3, 3, 'R16NW', 'Rusty', 'rlc@cellme.tech', '10-8-2020', '7813029217', 'samsung SM-G950F', 'ce021712e18f022303', '355089086229113', '355089086229113', '12 Months', '', '2020-08-10 15:45:58'),
(4, 23, 'PPR1.180610.011', 'John Test', 'john.hicton@cellme.tech', '11-8-2020', '0607964317', 'samsung SM-G950F', 'ce021712d5f9e8330c', '355089086241696', '355089086241696', '6 Months', '', '2020-08-11 07:47:40'),
(5, 3, 'R16NW', 'Rusty', 'rlc@cellme.tech', '11-8-2020', '7813029217', 'samsung SM-G950F', 'ce021712e18f022303', '355089086229113', '355089086229113', '12 Months', '', '2020-08-11 14:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_repair`
--

CREATE TABLE `warranty_repair` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` varchar(50) NOT NULL,
  `order_status` enum('Phone sent','Pending','Received','Received-error','Fixed/Returned','Replaced/ return','Return without fix','Accepted') NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warranty_repair`
--

INSERT INTO `warranty_repair` (`id`, `user_id`, `device_id`, `order_status`, `image`, `created_at`) VALUES
(1, 3, 'R16NW', 'Phone sent', '', '2020-08-10 08:48:35'),
(2, 2, 'NRD90M', 'Phone sent', '', '2020-08-10 08:48:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `automatic_testing`
--
ALTER TABLE `automatic_testing`
  ADD PRIMARY KEY (`testing_id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `cosmetic_testing`
--
ALTER TABLE `cosmetic_testing`
  ADD PRIMARY KEY (`testing_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_testing`
--
ALTER TABLE `manual_testing`
  ADD PRIMARY KEY (`testing_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_order_status`
--
ALTER TABLE `phone_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postage`
--
ALTER TABLE `postage`
  ADD PRIMARY KEY (`postage_id`);

--
-- Indexes for table `quick_testing`
--
ALTER TABLE `quick_testing`
  ADD PRIMARY KEY (`testing_id`);

--
-- Indexes for table `sellme`
--
ALTER TABLE `sellme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_history`
--
ALTER TABLE `test_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tm_device_list`
--
ALTER TABLE `tm_device_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_device_specification`
--
ALTER TABLE `tm_device_specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_faqs`
--
ALTER TABLE `tm_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_firebase_token`
--
ALTER TABLE `tm_firebase_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_mobile_list`
--
ALTER TABLE `tm_mobile_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_notification`
--
ALTER TABLE `tm_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tm_storage`
--
ALTER TABLE `tm_storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_users`
--
ALTER TABLE `tm_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tm_user_device`
--
ALTER TABLE `tm_user_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_web_setting`
--
ALTER TABLE `tm_web_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`warranty_id`);

--
-- Indexes for table `warranty_repair`
--
ALTER TABLE `warranty_repair`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `automatic_testing`
--
ALTER TABLE `automatic_testing`
  MODIFY `testing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cosmetic_testing`
--
ALTER TABLE `cosmetic_testing`
  MODIFY `testing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manual_testing`
--
ALTER TABLE `manual_testing`
  MODIFY `testing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phone_order_status`
--
ALTER TABLE `phone_order_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postage`
--
ALTER TABLE `postage`
  MODIFY `postage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quick_testing`
--
ALTER TABLE `quick_testing`
  MODIFY `testing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sellme`
--
ALTER TABLE `sellme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_history`
--
ALTER TABLE `test_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_device_list`
--
ALTER TABLE `tm_device_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_device_specification`
--
ALTER TABLE `tm_device_specification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_faqs`
--
ALTER TABLE `tm_faqs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_firebase_token`
--
ALTER TABLE `tm_firebase_token`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tm_mobile_list`
--
ALTER TABLE `tm_mobile_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tm_notification`
--
ALTER TABLE `tm_notification`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_storage`
--
ALTER TABLE `tm_storage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_users`
--
ALTER TABLE `tm_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_user_device`
--
ALTER TABLE `tm_user_device`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tm_web_setting`
--
ALTER TABLE `tm_web_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warranty`
--
ALTER TABLE `warranty`
  MODIFY `warranty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warranty_repair`
--
ALTER TABLE `warranty_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
