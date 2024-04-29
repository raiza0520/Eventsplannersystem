-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 05:52 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u962392351_danis`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_name`, `account_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gcash', 'Krisha I. Alzona', '09300943079', 1, '2023-10-21 15:44:41', '2024-01-22 12:56:56'),
(2, 'GOtyme Bank', 'Krisha Ignacio Alzona', '012972227702', 1, '2024-01-14 08:18:05', '2024-01-16 03:32:20'),
(3, 'Banco De Oro (BDO)', 'Krisha Ignacio Alzona', '005430273776', 1, '2024-01-16 03:33:07', '2024-01-16 03:33:07'),
(4, 'Metrobank', 'Krisha Ignacio Alonzo', '082737847184374', 1, '2024-01-17 01:09:20', '2024-01-17 01:09:20'),
(5, 'Gcash', 'Krisha Alzona', '09300943079', 0, '2024-01-22 12:55:06', '2024-01-22 12:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(26, 'carousel', 1, '2024-03-21 11:10:04', '2024-03-21 11:10:04'),
(27, 'carousel', 1, '2024-03-21 11:10:24', '2024-03-21 11:10:24'),
(28, 'carousel', 1, '2024-03-21 11:11:04', '2024-03-21 11:11:04'),
(29, 'carousel', 1, '2024-03-21 11:11:27', '2024-03-21 11:11:27'),
(30, 'carousel', 1, '2024-03-21 11:11:44', '2024-03-21 11:11:44'),
(31, 'carousel', 1, '2024-03-21 11:12:04', '2024-03-21 11:12:04'),
(32, 'carousel', 1, '2024-03-21 11:12:33', '2024-03-21 11:12:33'),
(33, 'portfolio', 1, '2024-03-21 11:13:30', '2024-03-21 11:13:30'),
(34, 'portfolio', 1, '2024-03-21 11:13:53', '2024-03-21 11:13:53'),
(35, 'portfolio', 1, '2024-03-21 11:14:38', '2024-03-21 11:14:38'),
(36, 'portfolio', 1, '2024-03-21 11:15:01', '2024-03-21 11:15:01'),
(37, 'portfolio', 1, '2024-03-21 11:15:25', '2024-03-21 11:15:25'),
(38, 'portfolio', 1, '2024-03-21 11:16:07', '2024-03-21 11:16:07'),
(39, 'portfolio', 1, '2024-03-21 11:16:20', '2024-03-21 11:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` longtext DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `itemprice` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `name`, `itemprice`, `type`, `properties`, `status`, `created_at`, `updated_at`) VALUES
(14, ' CHAIRS MONOBLOCK', 50, 'addons', NULL, 1, '2024-03-24 13:19:13', '2024-03-28 05:45:29'),
(15, 'CHAIRS MONOBLOCK W/ COVER', 30, 'addons', NULL, 1, '2024-03-24 13:22:44', '2024-03-28 05:45:38'),
(16, ' TIFFANY CHAIR', 0, 'addons', NULL, 1, '2024-03-24 13:23:25', '2024-03-24 13:23:25'),
(17, 'ROUND TABLE AND TIFFANY CHAIRS (10 PAX)', 0, 'addons', NULL, 1, '2024-03-24 13:23:42', '2024-03-24 13:26:16'),
(18, ' TIFFANY CHAIR with RIBBON', 0, 'addons', NULL, 1, '2024-03-24 13:24:14', '2024-03-24 13:24:14'),
(19, 'ROUND TABLE with LAZY SUSAN (10 PAX )', 0, 'addons', NULL, 1, '2024-03-24 13:25:36', '2024-03-24 13:25:36'),
(20, 'RECTANGLE TABLE & TIFFANY CHAIRS  (10 PAX )', 0, 'addons', NULL, 1, '2024-03-24 13:28:06', '2024-03-24 13:28:06'),
(21, 'COCKTAIL TABLE W/ CLOTH, RIBBON and TOPPER', 0, 'addons', NULL, 1, '2024-03-24 13:29:17', '2024-03-24 13:29:17'),
(22, 'KIDDIE SETS W/ CLOTH', 0, 'addons', NULL, 1, '2024-03-24 13:30:08', '2024-03-24 13:30:08'),
(23, 'LONG TABLE Monoblock W/ CLOTH', 0, 'addons', NULL, 1, '2024-03-24 13:30:52', '2024-03-24 13:30:52'),
(24, 'BUFFET TABLE with SKIRTING', 0, 'addons', NULL, 1, '2024-03-24 13:31:31', '2024-03-24 13:31:31'),
(25, 'PORK CALDERETA', 0, 'addons', NULL, 1, '2024-03-25 04:35:00', '2024-03-25 04:41:32'),
(26, 'PORK AFRITADA', 0, 'addons', NULL, 1, '2024-03-25 04:36:26', '2024-03-25 04:41:56'),
(27, 'CHICKEN CORDON BLEU', 0, 'addons', NULL, 1, '2024-03-25 04:41:17', '2024-03-25 04:41:17'),
(28, 'FRIED CHICKEN', 0, 'addons', NULL, 1, '2024-03-25 04:45:34', '2024-03-25 04:45:34'),
(29, 'PORK POCHERO', 0, 'addons', NULL, 1, '2024-03-25 04:48:50', '2024-03-25 04:48:50'),
(30, 'PORK MENUDO', 0, 'addons', NULL, 1, '2024-03-25 04:50:14', '2024-03-25 04:50:14'),
(31, 'beef caldereta (good for 50 pax)', 0, 'customize', NULL, 1, '2024-03-26 10:19:30', '2024-03-26 10:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(90, 'App\\Models\\Gallery', 26, '4ef10dba-9285-4220-8563-9001ced34ab6', 'gallery', 'home', 'home.jpg', 'image/jpeg', 'public', 'public', 189509, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:10:04', '2024-03-21 11:10:04'),
(92, 'App\\Models\\Gallery', 27, '4ea96bfb-7267-4438-bdfc-ae194ddbf217', 'gallery', 'home2', 'home2.jpg', 'image/jpeg', 'public', 'public', 97201, '[]', '[]', '[]', '[]', 2, '2024-03-21 11:10:46', '2024-03-21 11:10:46'),
(93, 'App\\Models\\Gallery', 28, '13e142d5-68e3-4294-af9f-ed84e0cf3c1d', 'gallery', 'home3', 'home3.jpg', 'image/jpeg', 'public', 'public', 216791, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:11:04', '2024-03-21 11:11:04'),
(94, 'App\\Models\\Gallery', 29, '4b51bc86-699d-476e-a999-9de2177bd581', 'gallery', 'home4', 'home4.jpg', 'image/jpeg', 'public', 'public', 123561, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:11:27', '2024-03-21 11:11:27'),
(95, 'App\\Models\\Gallery', 30, 'a17a3c35-31bd-4ec4-8b47-6a7cc1de2d12', 'gallery', 'home5', 'home5.jpg', 'image/jpeg', 'public', 'public', 122655, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:11:44', '2024-03-21 11:11:44'),
(96, 'App\\Models\\Gallery', 31, '133fd85c-2cb5-48cc-b328-fb810e86a3fc', 'gallery', 'home6', 'home6.jpg', 'image/jpeg', 'public', 'public', 210046, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:12:04', '2024-03-21 11:12:04'),
(97, 'App\\Models\\Gallery', 32, '825b2f97-5cd8-49b8-abf5-f77eda4afc14', 'gallery', 'home7', 'home7.jpg', 'image/jpeg', 'public', 'public', 108078, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:12:33', '2024-03-21 11:12:33'),
(98, 'App\\Models\\Gallery', 33, '959c7082-bf50-43ad-8e61-f25d14ece1ed', 'gallery', 'se', 'se.jpg', 'image/jpeg', 'public', 'public', 66922, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:13:30', '2024-03-21 11:13:30'),
(99, 'App\\Models\\Gallery', 34, 'e703a3f6-d133-4998-8ac4-38315bb076cc', 'gallery', 'se1', 'se1.jpg', 'image/jpeg', 'public', 'public', 53079, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:13:53', '2024-03-21 11:13:53'),
(100, 'App\\Models\\Gallery', 35, '57e07b01-bbe8-4858-856a-12af06dcf2d6', 'gallery', 'se3', 'se3.jpg', 'image/jpeg', 'public', 'public', 91300, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:14:38', '2024-03-21 11:14:38'),
(101, 'App\\Models\\Gallery', 36, '61cb88dc-0f06-4457-9843-df35dfc1eb71', 'gallery', 'se 4', 'se-4.jpg', 'image/jpeg', 'public', 'public', 142194, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:15:01', '2024-03-21 11:15:01'),
(102, 'App\\Models\\Gallery', 37, 'e00c8b4a-a1af-43f6-b505-8ecc9d32d6a5', 'gallery', 'se 5', 'se-5.jpg', 'image/jpeg', 'public', 'public', 141703, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:15:25', '2024-03-21 11:15:25'),
(103, 'App\\Models\\Gallery', 38, '5120a1bf-e0d3-4c07-9b08-82e0e44355ee', 'gallery', 'se6', 'se6.jpg', 'image/jpeg', 'public', 'public', 127696, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:16:07', '2024-03-21 11:16:07'),
(104, 'App\\Models\\Gallery', 39, 'a56a071c-ed9a-4244-a2c6-2efee00d356e', 'gallery', 'se7', 'se7.jpg', 'image/jpeg', 'public', 'public', 242232, '[]', '[]', '[]', '[]', 1, '2024-03-21 11:16:20', '2024-03-21 11:16:20'),
(108, 'App\\Models\\Service', 17, 'fb5431ca-eac5-48d1-87a6-f09d7a4c26d2', 'services', 'Screenshot 2024-03-24 203603', 'Screenshot-2024-03-24-203603.png', 'image/png', 'public', 'public', 90926, '[]', '[]', '[]', '[]', 2, '2024-03-24 12:36:07', '2024-03-24 12:36:07'),
(109, 'App\\Models\\Service', 18, '77514e24-9a6e-4022-982a-b4d6b6071e69', 'services', 'Screenshot 2024-03-24 203645', 'Screenshot-2024-03-24-203645.png', 'image/png', 'public', 'public', 96951, '[]', '[]', '[]', '[]', 4, '2024-03-24 12:36:58', '2024-03-24 12:36:58'),
(110, 'App\\Models\\Service', 19, '65d58f28-a5b1-49ba-b30c-5b8dbdeadcf7', 'services', 'Screenshot 2024-03-24 203920', 'Screenshot-2024-03-24-203920.png', 'image/png', 'public', 'public', 107876, '[]', '[]', '[]', '[]', 1, '2024-03-24 12:39:29', '2024-03-24 12:39:29'),
(113, 'App\\Models\\Package', 16, '9ea7e415-9d85-4996-85a5-30bda5232519', 'packages', '407318377_357932193651688_6604442823770983885_n', '407318377_357932193651688_6604442823770983885_n.jpg', 'image/jpeg', 'public', 'public', 24131, '[]', '[]', '[]', '[]', 1, '2024-03-24 12:53:45', '2024-03-24 12:53:45'),
(114, 'App\\Models\\Package', 17, '157d45bc-aa56-4048-ad27-f837c7df2c03', 'packages', '419713232_905277674196503_27742645367278713_n', '419713232_905277674196503_27742645367278713_n.jpg', 'image/jpeg', 'public', 'public', 12424, '[]', '[]', '[]', '[]', 1, '2024-03-24 12:56:26', '2024-03-24 12:56:26'),
(115, 'App\\Models\\Package', 15, '922ffab8-df13-4a10-93ba-1a8ece5dc6c3', 'packages', 'Screenshot 2024-03-24 205647', 'Screenshot-2024-03-24-205647.png', 'image/png', 'public', 'public', 53787, '[]', '[]', '[]', '[]', 3, '2024-03-24 12:56:45', '2024-03-24 12:56:45'),
(117, 'App\\Models\\Package', 18, '03d96f5d-15b9-49c4-a92e-cc75f26ff1cf', 'packages', '431968337_8112045192145136_1011611780223035774_n', '431968337_8112045192145136_1011611780223035774_n.jpg', 'image/jpeg', 'public', 'public', 9946, '[]', '[]', '[]', '[]', 2, '2024-03-24 13:12:51', '2024-03-24 13:12:51'),
(118, 'App\\Models\\Package', 19, 'cc388507-6e5b-4070-a727-2f869611ef0e', 'packages', '434088092_220704341101403_8412706130310887484_n', '434088092_220704341101403_8412706130310887484_n.jpg', 'image/jpeg', 'public', 'public', 9462, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:17:45', '2024-03-24 13:17:45'),
(119, 'App\\Models\\ItemType', 14, '1afc4457-f430-4dc2-8e43-d1eebc07cce5', 'itemTypes', 'Screenshot 2024-03-24 211545', 'Screenshot-2024-03-24-211545.png', 'image/png', 'public', 'public', 6032, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:19:13', '2024-03-24 13:19:13'),
(120, 'App\\Models\\ItemType', 15, '719ac9f1-cb2e-4eb6-a6f1-336319e0440e', 'itemTypes', 'Screenshot 2024-03-24 212231', 'Screenshot-2024-03-24-212231.png', 'image/png', 'public', 'public', 4381, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:22:44', '2024-03-24 13:22:44'),
(121, 'App\\Models\\ItemType', 16, 'b14e5baf-bdff-4014-919c-835acb898ea0', 'itemTypes', 'Screenshot 2024-03-24 211610', 'Screenshot-2024-03-24-211610.png', 'image/png', 'public', 'public', 8436, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:23:25', '2024-03-24 13:23:25'),
(122, 'App\\Models\\ItemType', 17, 'fba9a9c7-13b2-4e7a-a089-e3c982d2bc2f', 'itemTypes', 'tables and chairs', 'tables-and-chairs.jpeg', 'image/jpeg', 'public', 'public', 11075, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:23:42', '2024-03-24 13:23:42'),
(123, 'App\\Models\\ItemType', 18, 'adc10666-05ea-466b-a3b9-17affc092553', 'itemTypes', 'Screenshot 2024-03-24 212357', 'Screenshot-2024-03-24-212357.png', 'image/png', 'public', 'public', 19387, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:24:14', '2024-03-24 13:24:14'),
(124, 'App\\Models\\ItemType', 19, 'd1cdfed9-34c2-4219-ac09-989996184a69', 'itemTypes', 'Screenshot 2024-03-24 212531', 'Screenshot-2024-03-24-212531.png', 'image/png', 'public', 'public', 25652, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:25:36', '2024-03-24 13:25:36'),
(125, 'App\\Models\\ItemType', 20, '97698650-61c3-4a54-a8d7-748ed3e2df91', 'itemTypes', 'Screenshot 2024-03-24 212650', 'Screenshot-2024-03-24-212650.png', 'image/png', 'public', 'public', 23258, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:28:06', '2024-03-24 13:28:06'),
(126, 'App\\Models\\ItemType', 21, 'd2fa3970-aa2e-4bc9-9dd1-4a641f4f40fb', 'itemTypes', 'Screenshot 2024-03-24 212849', 'Screenshot-2024-03-24-212849.png', 'image/png', 'public', 'public', 20846, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:29:17', '2024-03-24 13:29:17'),
(127, 'App\\Models\\ItemType', 22, '1119fb1c-3c8b-406d-a75b-0f23ec977532', 'itemTypes', 'Screenshot 2024-03-24 213007', 'Screenshot-2024-03-24-213007.png', 'image/png', 'public', 'public', 24945, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:30:08', '2024-03-24 13:30:08'),
(128, 'App\\Models\\ItemType', 23, '0ad95abe-6603-492b-9681-da20fe7ceba0', 'itemTypes', 'Screenshot 2024-03-24 213038', 'Screenshot-2024-03-24-213038.png', 'image/png', 'public', 'public', 17494, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:30:52', '2024-03-24 13:30:52'),
(129, 'App\\Models\\ItemType', 24, '14a42a25-b185-46ec-9e6c-649e2d0c751e', 'itemTypes', 'Screenshot 2024-03-24 213125', 'Screenshot-2024-03-24-213125.png', 'image/png', 'public', 'public', 24797, '[]', '[]', '[]', '[]', 1, '2024-03-24 13:31:31', '2024-03-24 13:31:31'),
(130, 'App\\Models\\ItemType', 25, 'd9f634da-9e1a-4d68-b0a2-1773e0542f3c', 'itemTypes', 'images (1)', 'images-(1).jpg', 'image/jpeg', 'public', 'public', 12995, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:35:00', '2024-03-25 04:35:00'),
(131, 'App\\Models\\ItemType', 26, 'ba10318f-fe0a-446d-a5ae-c5091576a016', 'itemTypes', 'afritada', 'afritada.jpg', 'image/jpeg', 'public', 'public', 11692, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:36:26', '2024-03-25 04:36:26'),
(132, 'App\\Models\\ItemType', 27, 'f3d3308c-2b97-4d4d-a91b-4413726ccf85', 'itemTypes', 'chicken cordon bleu', 'chicken-cordon-bleu.jpg', 'image/jpeg', 'public', 'public', 10399, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:41:17', '2024-03-25 04:41:17'),
(133, 'App\\Models\\ItemType', 28, '6fa5a551-c410-4421-a2e5-601e50a9f072', 'itemTypes', 'FRIED CHICKEN', 'FRIED-CHICKEN.jpg', 'image/jpeg', 'public', 'public', 9884, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:45:34', '2024-03-25 04:45:34'),
(134, 'App\\Models\\ItemType', 29, '20579229-5b39-4043-986d-cf5da2bdd555', 'itemTypes', 'PORK POCHERO', 'PORK-POCHERO.jpg', 'image/jpeg', 'public', 'public', 12166, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:48:50', '2024-03-25 04:48:50'),
(135, 'App\\Models\\ItemType', 30, '8b6bc663-df21-4199-995c-f78dabbdd457', 'itemTypes', 'PORK MENUDO', 'PORK-MENUDO.jpg', 'image/jpeg', 'public', 'public', 10574, '[]', '[]', '[]', '[]', 1, '2024-03-25 04:50:14', '2024-03-25 04:50:14'),
(136, 'App\\Models\\ItemType', 31, '718ba107-5fbc-49ca-86df-05975bd366ac', 'itemTypes', 'beef-caldereta', 'beef-caldereta.jpg', 'image/jpeg', 'public', 'public', 96887, '[]', '[]', '[]', '[]', 1, '2024-03-26 10:19:30', '2024-03-26 10:19:30'),
(137, 'App\\Models\\Transaction', 76, 'cef03ef2-d776-44d1-babb-cd3af90877a6', 'transactions', 'beef-caldereta', 'beef-caldereta.jpg', 'image/jpeg', 'public', 'public', 96887, '[]', '[]', '[]', '[]', 1, '2024-03-26 10:27:35', '2024-03-26 10:27:35'),
(138, 'App\\Models\\Package', 20, '64083260-6e96-4a02-8011-a3e39480c2e8', 'packages', '431968337_8112045192145136_1011611780223035774_n', '431968337_8112045192145136_1011611780223035774_n.jpg', 'image/jpeg', 'public', 'public', 9946, '[]', '[]', '[]', '[]', 1, '2024-03-26 18:01:56', '2024-03-26 18:01:56'),
(141, 'App\\Models\\Package', 23, '1218c380-4f2e-49e0-ac9d-46c7d7c2f802', 'packages', '434088092_220704341101403_8412706130310887484_n', '434088092_220704341101403_8412706130310887484_n.jpg', 'image/jpeg', 'public', 'public', 9462, '[]', '[]', '[]', '[]', 1, '2024-03-26 18:13:32', '2024-03-26 18:13:32'),
(142, 'App\\Models\\Package', 24, 'c03d0883-10a2-4fb2-95d2-02624f1d9500', 'packages', 'birthday', 'birthday.jpg', 'image/jpeg', 'public', 'public', 224704, '[]', '[]', '[]', '[]', 1, '2024-03-26 18:15:21', '2024-03-26 18:15:21'),
(146, 'App\\Models\\Package', 21, '50a9b416-251e-475a-b397-2e6e589dc637', 'packages', 'package1(1)2', 'package1(1)2.png', 'image/png', 'public', 'public', 45784, '[]', '[]', '[]', '[]', 4, '2024-03-26 18:19:24', '2024-03-26 18:19:24'),
(147, 'App\\Models\\Package', 22, '134f0e71-0c86-4d1a-aef3-6c8189c4cb44', 'packages', 'package 2(1)', 'package-2(1).png', 'image/png', 'public', 'public', 43244, '[]', '[]', '[]', '[]', 3, '2024-03-26 18:20:58', '2024-03-26 18:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_12_132544_create_services_table', 1),
(6, '2023_10_12_134758_create_packages_table', 1),
(7, '2023_10_14_134943_add_addons_column_in_packages_table', 1),
(8, '2023_10_15_070413_add_customize_column_in_packages_table', 1),
(9, '2023_10_15_075948_add_price_column_in_packages_table', 1),
(10, '2023_10_15_112411_create_transactions_table', 1),
(11, '2023_10_15_115402_create_reservations_table', 1),
(12, '2023_10_15_120231_create_payments_table', 1),
(13, '2023_10_15_125152_add_user_id_column_in_transactions_table', 1),
(14, '2023_10_16_093250_add_soft_delete_function_in_packages_table', 1),
(15, '2023_10_16_094323_create_media_table', 1),
(16, '2023_10_19_130427_create_galleries_table', 1),
(17, '2023_10_21_144032_create_banks_table', 1),
(18, '2023_10_22_020759_add_reset_token_column_in_users_table', 2),
(19, '2023_10_31_145230_change_date_of_use_column_to_datetime_in_reservations_table', 3),
(20, '2023_10_31_154413_create_item_types_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `no_of_pax` int(11) NOT NULL,
  `inclusions` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addons` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`addons`)),
  `customize` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`customize`)),
  `price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `service_id`, `no_of_pax`, `inclusions`, `status`, `created_at`, `updated_at`, `addons`, `customize`, `price`, `deleted_at`) VALUES
(20, 'Catering Set A Package', 18, 60, '<ul><li>Inclusions</li><li>Beef</li></ul><ol><li>Beef Caldereta</li><li>Beef with Mushroom and Mashed Potato Toppings</li><li>Beef Stew</li></ol><p>Pork&nbsp;</p><ol><li>Embutido</li><li>Spring Roll</li><li>Spicy Pork Ribs</li><li>Roast Pork</li></ol><p>Chicken&nbsp;</p><ul><li>Hawaiian Chicken</li><li>Pollo Con Jamon</li></ul><ol><li>Chicken Flambe</li></ol><p>Sea food</p><ol><li>Steamed Fish Fillet in Ginger Sauce</li><li>Fish Fillet in Tarter Dip</li></ol><p>Pasta/Noodles&nbsp;</p><ol><li>Pancit Guisado</li><li>Bam-I</li><li>Glass Noodles with Black Fungus</li><li>Pasta Bolognese (choice of spaghetti, linguine, fettuccine)</li></ol><p>Vegetables</p><ol><li>Mixed Vegetables in Oyster Sauce</li><li>Grilled Vegetables</li></ol><p>Dessert</p><ol><li>Fruit Salad</li><li>Mango Cathedral</li><li>Mango Pandan</li></ol><p>Juice&nbsp;</p><ol><li>Four Seasons</li><li>Cucumber Mint (cucumber with honey, lemon, and mint)</li></ol><p>Others</p><ol><li>Halo-Halo Bar</li><li>Salad Bar</li></ol>', 1, '2024-03-26 18:01:56', '2024-03-26 18:01:56', '{}', '{}', 15000.00, NULL),
(21, 'Wedding Package 1', 17, 70, '<p>Inclusions:</p><ol><li>Main Dishes: Beef, Chicken, Fish, Pasta, Dessert &amp; Steamed Rice</li><li>Service bar with juice/iced tea and water</li><li>Uniformed waiters</li><li>Uniformed buffet controllers</li><li>Elegant Stage Set Up with stage platform</li><li>Thematic entrance arch</li><li>Souvenir, cake table &amp; gift table</li><li>Registration area</li><li>Red carpet or brown carpet</li><li>Flower arrangement for table centerpieces (VIP’s &amp; Guest Tables)</li><li>Tables and chairs (Tiffany chairs with high quality linen cover;</li><li>Buffet table with complex setup (Roll top chaffing dishes, food lamp, etc</li></ol><p>Includes:</p><ol><li>Professional Host</li><li>Professional OTD Coordinators</li><li>Free: Overflowing Brewed Coffee</li><li><i>Note: Transportation fee is not included</i></li></ol>', 1, '2024-03-26 18:08:27', '2024-03-26 18:08:27', '{}', '{}', 129000.00, NULL),
(22, 'Wedding Package 2', 17, 100, '<p>Inclusions:</p><ol><li>Main Dishes: Beef, Chicken, Fish, Pasta, Dessert &amp; Steamed Rice</li><li>Service bar with juice/ iced tea and water</li><li>Uniformed waiters</li><li>Uniformed buffet controllers</li><li>Elegant backdrop</li><li>Cutlery, crockery, and glasses</li><li>Reception styling with elegant couch</li><li>Elegant stage set up with stage platform</li><li>Thematic entrance arch</li><li>Souvenir, cake table &amp; gift table</li><li>Registration area</li><li>Red carpet or brown carpet</li><li>Flower arrangement for table centerpieces (VIP’s &amp; Guest Tables)</li><li>Tables and chairs (Tiffany chairs with high quality linen cover;</li><li>Buffet table with complex setup (Roll top chaffing dishes, food lamp, etc)</li></ol><p>Includes:</p><ol><li>High end sounds &amp; lights</li><li>Professional host</li><li>Professional OTD Coordinators</li><li>Free: Overflowing brewed coffee &amp; 10 VIP’s Elegant Souvenirs</li><li><i>Note: Transportation fee is not included</i></li></ol>', 1, '2024-03-26 18:10:34', '2024-03-26 18:10:34', '{}', '{}', 149000.00, NULL),
(23, 'Catering Set B Package', 18, 100, '<p>Beef&nbsp;</p><ol><li>Beef with Mushroom in Oyster Sauce</li><li>Beef Steak Tagalog with Onion Rings</li></ol><p>Pork&nbsp;</p><ol><li>Pork Cubes in Worcestershire</li><li>Pork Steak</li></ol><p>Chicken&nbsp;</p><ol><li>Chicken Lollipop</li><li>Spicy Chicken Wings</li><li>Crispy Chicken</li></ol><p>Sea Food</p><ol><li>Sweet and Sour Fish Fillet</li><li>Baked Fish Puttanesca</li></ol><p>Pasta/Noodles</p><ol><li>Lasagna</li><li>Baked Spaghetti</li></ol><p>Vegetables</p><ol><li>Chopsuey</li><li>Buttered Vegetables</li></ol><p>Dessert</p><ol><li>Assorted Tropical Fruits</li><li>Brownies</li><li>Fruit Cocktail</li></ol><p>Juice</p><ol><li>Herbed Iced Tea</li><li>Suncooler (mix of citrus fruits)</li></ol><p>Others&nbsp;</p><ol><li>Chocolate Fountain</li><li>Juice Bar</li><li>Fruit Bar</li></ol>', 1, '2024-03-26 18:13:32', '2024-03-26 18:13:32', '{}', '{}', 25000.00, NULL),
(24, 'Birthday Deluxe Package', 19, 100, '<p>Inclusions:</p><ol><li>Food &amp; catering equipments</li><li>2 main dish, q pasta, 1 dessert</li><li>2 tier edible cake</li><li>Steamed rice, iced tea &amp; purified water</li><li>Skirted buffet setup</li><li>Tables &amp; chairs with high quality cloth</li><li>Elegant backdrop</li><li>Elegant balloon entrance</li><li>Uniformed waiters</li><li>Uniformed buffet controllers</li><li>Transportation fee is not included</li><li>Freebies: Gifts &amp; cake skirted table &amp; overflowing coffee</li></ol>', 1, '2024-03-26 18:15:21', '2024-03-26 18:15:21', '{}', '{}', 55000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_of_use` datetime NOT NULL,
  `location` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Wedding Planning Services', 1, '2024-03-21 11:08:38', '2024-03-21 11:08:38'),
(18, 'Catering Services', 1, '2024-03-24 12:29:45', '2024-03-24 12:29:45'),
(19, 'Event Planning Services', 1, '2024-03-24 12:39:29', '2024-03-24 12:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_amount` decimal(10,2) NOT NULL,
  `addons_total_amount` decimal(10,2) DEFAULT NULL,
  `customize_total_amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) GENERATED ALWAYS AS (`package_amount` + `addons_total_amount` + `customize_total_amount`) VIRTUAL,
  `addons` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`addons`)),
  `customize` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`customize`)),
  `remarks` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `reset_token`) VALUES
(1, 'Juan Dela Cruz', 'sysadmin@gmail.com', '2023-10-21 15:40:51', '$2y$10$L2U1RGViIjs4FqP86m7cduWvuYBUOQ3eCPldKLAm4YZLUFAUZR.gy', '0zfGaGy2EO9snTokyz8LIias8LP3L9OoWClx4o8JNhk4R7tKQs8WsH8SCztA', 'admin', '2023-10-21 15:40:51', '2024-01-08 11:42:09', NULL),
(2, 'Pedro Delos Reyes', 'danicateringandevents@gmail.com', NULL, '$2y$10$.m6qVYU7AsjPY0904nDV.eAGCRgKUpaCzAn8E2ktWpb7Clt0HPj7K', NULL, 'client', '2023-10-21 15:41:33', '2023-10-21 19:00:02', '709139'),
(3, 'Sheen Khyla Ebreo', 'ebreosheenkhyla224@gmail.com', NULL, '$2y$10$EJVTAZ.reAieby44cO.gcuEVvy0yLf.Du//0COx/QO8.GIAi4./RK', NULL, 'client', '2023-11-09 15:11:30', '2023-11-09 15:11:30', NULL),
(4, 'Mariel Salon', 'maryelmay54@gmail.com', NULL, '$2y$10$u6qijlQvzNC0MHp7CG2XYe2SNtAvgxYrB8whKzyc95zl5EBM0Wo62', NULL, 'client', '2023-11-10 16:33:19', '2024-01-22 13:09:11', '922639'),
(5, 'Raiza Abante', 'raizacharleneglazeabante@gmail.com', NULL, '$2y$10$r/QaGczBRNL2MRG7IRg7LubxKUS1K2v1mvsjIfiJPriNpY2NtOz/e', NULL, 'client', '2023-11-21 17:08:43', '2023-11-21 17:08:43', NULL),
(6, 'Gerald Dano', 'fmpagdon@gmail.com', NULL, '$2y$10$f6Dm2Fcoit9kW3cnbrKri.W0HJSNHunjJ2A4atRlYXnBk4SCva0BC', NULL, 'client', '2023-11-22 13:01:07', '2023-11-22 13:01:07', NULL),
(7, 'Mariel', 'salonmarieltrivino@gmail.com', NULL, '$2y$10$OOnElvQUHVJY.t/SBf5JdOB1G3JwtJcHGLR.S.RNSc4jXRs2kSuhS', NULL, 'client', '2023-11-23 08:48:35', '2023-11-23 08:48:35', NULL),
(8, 'Jonald', 'jonaldmabalanan@gmail.com', NULL, '$2y$10$4m81iRf/iPoDXSD9jfupSeBtNy.bSvVC0k1iFi2BdIeHxtBQlGAt6', NULL, 'client', '2023-11-26 17:02:41', '2023-11-26 17:02:41', NULL),
(9, 'Juan Dela Cruz', 'rhenoah15@gmail.com', NULL, '$2y$10$L2U1RGViIjs4FqP86m7cduWvuYBUOQ3eCPldKLAm4YZLUFAUZR.gy', NULL, 'client', '2023-12-14 04:55:47', '2023-12-14 04:55:47', NULL),
(10, 'Turko', 'turko@gmail.com', NULL, '$2y$10$ynAtei8eyggFSUyuyzdPsejBVjTm65rw4soMOqoIgaDV3GF7kPGeS', NULL, 'client', '2023-12-17 16:50:50', '2023-12-17 16:50:50', NULL),
(11, 'Douglas McArthur', 'hahaha12@gmail.com', NULL, '$2y$10$Mso9fuRHLZc6/dEGI0sBmekKgNACxoxXHG1kutG4o6eQH1tyKTieC', NULL, 'client', '2023-12-27 12:26:57', '2023-12-27 12:26:57', NULL),
(12, 'hello', 'game@gmail.com', NULL, '$2y$10$mBL3k3AnG.6ALcznJ4iQ6e5k9p61Q2ax6m4m5jIuYH/rZs.VBmemG', NULL, 'client', '2023-12-27 12:27:12', '2023-12-27 12:28:58', NULL),
(13, 'jinn', 'jinn@gmail.com', NULL, '$2y$10$FvAuvR0NyC.BHEXvSUVbuu6vK6sbWND47Lo3vcRNDJpD0yJRCp9AW', NULL, 'client', '2023-12-27 12:39:52', '2023-12-27 12:39:52', NULL),
(14, 'Juan Cruz', 'rhenoah_15@hotmail.com', NULL, '$2y$10$CtQg50SO7dq/8AZNsR60eOF/VptScjFmCX15w3n300AhVRAQUQyJe', NULL, 'client', '2024-01-06 22:13:00', '2024-01-06 22:43:11', NULL),
(15, 'raiza abante', 'rzchrlnglzbnt@gmail.com', NULL, '$2y$10$GFNW4kWvXn80Y6GSWHXoG.3AD1h8Cf3SeyOcXddU9vOHFytwvIy3a', NULL, 'client', '2024-01-18 05:06:55', '2024-01-18 05:06:55', NULL),
(16, 'Joy Lutero', 'joylutero123@gmail.com', NULL, '$2y$10$.78mMbhly7L05VSVjgE0qulEtXzfa4.SnG5n4uvCCilRiyQiO4ox2', NULL, 'client', '2024-01-22 02:39:05', '2024-01-22 02:39:05', NULL),
(17, 'Harvey A. Buena', 'harvz.buena@gmail.com', NULL, '$2y$10$nvaiINZDl9/mpia6zXMOWeA7updTArVlY4e.tPxwzslviqrtoLYJq', NULL, 'admin', '2024-02-07 08:12:18', '2024-02-07 08:12:18', NULL),
(18, 'Harvz', 'harvz@gmail.com', NULL, '$2y$10$SSGH0hAakglUGo5EcbMqBu.3r0tTgA5L0gT9coCBH/.aDqMlL55YW', NULL, 'client', '2024-02-28 08:01:28', '2024-02-28 08:01:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
