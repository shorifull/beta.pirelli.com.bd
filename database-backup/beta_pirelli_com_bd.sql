-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2021 at 01:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beta.pirelli.com.bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

CREATE TABLE `api_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_tokens`
--

INSERT INTO `api_tokens` (`id`, `refresh_token`, `access_token`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.0e9f97262c415900b0baee159821903f.7a47099813bb495e436f04201fc99c6b', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-25 03:55:07', '2021-05-25 03:55:07'),
(2, '1000.2770ae6d21d8984eb6034ef1b5077570.d38c4d89f63e0b227552efa126739294', '1000.543521bb811eeedb0adc5ed44a12e2b7.1dc3d1af2bb29a15836567adf38688d3', '1000.FQ0YTG2AMKFEP9QQRZLP9SP8PWUH3I', '2021-05-26 01:42:07', '2021-05-26 01:42:07'),
(3, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.b7878ca27f21a729e3a7aa6fdb574a15.8af2eb37ff4294fcd5ecaaf930ec719c', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-26 07:48:42', '2021-05-26 07:48:42'),
(4, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.6eb2c3178b59a19be05b58e2abdfbfcf.9f3d8b3ac9e9ee67bf13ecc8c1e66e54', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-26 09:02:02', '2021-05-26 09:02:02'),
(5, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.d32c4409f07e9c426d5175ad74d62dbf.152f6c9e2583b70b3f723dd2c978cabd', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-26 10:37:54', '2021-05-26 10:37:54'),
(6, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.228a90b57e0bcdfc6299856eba91f454.f8fddf640d4b7b94aab1fb1ce2011ffc', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-26 12:25:05', '2021-05-26 12:25:05'),
(7, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.64603b6bd2222e702ccd9ad22f3d232e.262eba58e15db55f18150321fc020ba4', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-26 22:00:29', '2021-05-26 22:00:29'),
(8, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.3aee000a465d7d36db7db43fa38fb3b9.2136e077eb27b8dac21db321409a23ed', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-27 00:47:45', '2021-05-27 00:47:45'),
(9, '1000.b2254f8c179dabeae23fcaf44939a307.6520f89f0309f88974aa0083ec39f009', '1000.aebbc5b526f53cd71909021a1160ae76.9c1e4450f6f3490588639acd1871aa4c', '1000.X68YHJWUU7PYQ5UBBDKIO60LD0KUHJ', '2021-05-27 02:48:47', '2021-05-27 02:48:47'),
(10, '1000.2770ae6d21d8984eb6034ef1b5077570.d38c4d89f63e0b227552efa126739294', '1000.c0caa7ffbc2089ffc2c13c9e214bd0df.79bb8e69e1e749797146ca517852e520', '1000.FQ0YTG2AMKFEP9QQRZLP9SP8PWUH3I', '2021-05-27 03:23:53', '2021-05-27 03:23:53'),
(11, '1000.2770ae6d21d8984eb6034ef1b5077570.d38c4d89f63e0b227552efa126739294', '1000.8a0bf5702d5329ad5b58636239b57b0e.6ad01942816af6b3c3c2152b1a61c9d9', '1000.FQ0YTG2AMKFEP9QQRZLP9SP8PWUH3I', '2021-06-02 19:48:12', '2021-06-02 19:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `bodies`
--

CREATE TABLE `bodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toyota', '2021-05-04 23:13:33', '2021-05-04 23:13:33', NULL),
(2, 'Honda', '2021-05-04 23:13:38', '2021-05-04 23:13:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `model`, `created_at`, `updated_at`, `deleted_at`, `brand_id`) VALUES
(1, 'Allion', '2021-05-04 23:35:59', '2021-05-04 23:35:59', NULL, 1),
(2, 'Axio', '2021-05-05 03:34:57', '2021-05-05 03:34:57', NULL, 1),
(3, 'Aqua', '2021-05-05 03:35:08', '2021-05-05 03:35:08', NULL, 1),
(4, 'Fielder', '2021-05-05 03:35:21', '2021-05-05 03:35:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_registrations`
--

CREATE TABLE `car_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_purchased` date NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_dot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `product_name_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_registrations`
--

INSERT INTO `car_registrations` (`id`, `first_name`, `last_name`, `email`, `phone`, `zip`, `address`, `date_purchased`, `invoice_number`, `product_dot`, `product_quantity`, `created_at`, `updated_at`, `deleted_at`, `city_id`, `product_name_id`, `product_size_id`, `retailer_id`) VALUES
(1, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-26', '123', '1', 2, '2021-05-27 03:23:51', '2021-05-27 03:23:51', NULL, 1, 3, 3, NULL),
(2, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-26', '123', '1', 2, '2021-05-27 03:26:07', '2021-05-27 03:26:07', NULL, 1, 3, 3, NULL),
(3, 'KOSUKE', 'YOSHIDA', 'kousuke03192006@gmail.com', '08097129600', '1510064', 'Uehara1-39-8', '2021-05-31', 'PA001', '2012', 3, '2021-06-02 19:48:12', '2021-06-02 19:48:12', NULL, 1, 3, 3, NULL),
(4, 'KOSUKE', 'YOSHIDA', 'kousuke03192006@gmail.com', '08097129600', '1510064', 'Uehara1-39-8', '2021-05-31', 'PA001', '2012', 3, '2021-06-02 19:51:10', '2021-06-02 19:51:10', NULL, 1, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_sliders`
--

CREATE TABLE `car_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `button_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_sliders`
--

INSERT INTO `car_sliders` (`id`, `title`, `short_description`, `long_description`, `button_label`, `button_url`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Car slider 1', 'sample', '<p>sample</p>', 'Learn More', '#', 'yes', '2021-05-23 22:39:51', '2021-05-23 22:39:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'car', '2021-05-05 03:30:27', '2021-05-05 03:30:27', NULL),
(2, 'moto', '2021-05-19 03:05:16', '2021-05-19 03:05:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_moto_tyre`
--

CREATE TABLE `category_moto_tyre` (
  `moto_tyre_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_tyre`
--

CREATE TABLE `category_tyre` (
  `tyre_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tyre`
--

INSERT INTO `category_tyre` (`tyre_id`, `category_id`) VALUES
(1, 1),
(7, 1),
(8, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chassis`
--

CREATE TABLE `chassis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chassis`
--

INSERT INTO `chassis` (`id`, `chassis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RM1 (CR-V 2011-2016)', '2021-05-04 23:34:09', '2021-05-04 23:34:09', NULL),
(2, 'RU3 (Vezel HV 2013-)', '2021-05-04 23:35:10', '2021-05-04 23:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', '2021-05-25 00:37:28', '2021-05-25 00:37:28', NULL),
(2, 'Chattagram', '2021-05-25 00:37:47', '2021-05-25 00:37:47', NULL),
(3, 'Rangpur', '2021-05-25 00:37:55', '2021-05-25 00:37:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_address` longtext COLLATE utf8mb4_unicode_ci,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_fax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map_i_frame` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_ssl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `send_email_from`, `receive_email_to`, `smtp_activated`, `smtp_ssl`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shorifull@gmail.com', 'shorifull@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-23 10:54:55', '2021-05-23 10:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `engines`
--

CREATE TABLE `engines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engines`
--

INSERT INTO `engines` (`id`, `engine`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2000cc', '2021-05-04 23:13:57', '2021-05-04 23:13:57', NULL),
(2, '1500cc', '2021-05-04 23:14:11', '2021-05-04 23:14:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `faq_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_about_us` longtext COLLATE utf8mb4_unicode_ci,
  `footer_copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `footer_about_us`, `footer_copyright`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asian Automotives Limited is the official distributor of Pirelli Motorcycles & Car Tyres in Bangladesh since 2019. We offer variety types of motorcycle tyres,aftersales service. Our online service will provide you the information and the product you need.', '© Copyright Pirelli. All Rights Reserved', '2021-05-30 04:50:26', '2021-05-30 04:50:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE `fuels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `button_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `short_description`, `long_description`, `button_label`, `button_url`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home Slider', 'Sample', '<h2><strong>PIRELLI PRODUCES THE WORLD’S FIRST FSC CERTIFIED TYRE</strong></h2>', 'Learn More', '#', 'yes', '2021-05-24 05:35:00', '2021-05-24 05:35:47', NULL),
(2, NULL, NULL, NULL, NULL, NULL, 'yes', '2021-05-24 05:42:39', '2021-05-24 05:42:39', NULL),
(3, NULL, NULL, NULL, NULL, NULL, 'yes', '2021-05-24 05:45:24', '2021-05-24 05:45:24', NULL),
(4, NULL, NULL, NULL, NULL, NULL, 'yes', '2021-05-24 05:45:35', '2021-05-24 05:45:35', NULL),
(5, NULL, NULL, NULL, NULL, NULL, 'yes', '2021-05-24 05:45:45', '2021-05-24 05:45:45', NULL),
(6, 'Home Slider', 'dddd', '<p>ssss</p>', 'Learn More', '#', 'yes', '2021-07-25 08:22:37', '2021-07-25 08:22:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Tyre', 13, '01c5da72-b2c1-447b-a8d4-860de95c3210', 'thumbnail', '60a48d5b4f62b_tyre_thumb', '60a48d5b4f62b_tyre_thumb.png', 'image/png', 'public', 'public', 297375, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 1, '2021-05-18 22:00:29', '2021-05-18 22:00:29'),
(3, 'App\\Models\\MotoTyre', 1, '374d0072-a748-4d54-b722-132566cbd969', 'thumbnail', '60a9f5890412b_tyre', '60a9f5890412b_tyre.png', 'image/png', 'public', 'public', 107986, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 2, '2021-05-23 00:26:18', '2021-05-23 00:26:19'),
(4, 'App\\Models\\MotoSlider', 1, '8a9cc4a7-d37d-421c-81f1-7e0048d72fdf', 'image', '60aa47fab3fdf_moto-hero', '60aa47fab3fdf_moto-hero.jpg', 'image/jpeg', 'public', 'public', 731974, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 3, '2021-05-23 06:18:04', '2021-05-23 06:18:05'),
(5, 'App\\Models\\MotoSlider', 2, 'b02d1c9f-18f7-4eff-8039-934765e54e19', 'image', '60aa48209e6dc_hero', '60aa48209e6dc_hero.jpg', 'image/jpeg', 'public', 'public', 611293, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 4, '2021-05-23 06:18:43', '2021-05-23 06:18:43'),
(11, 'App\\Models\\HomeSlider', 1, '18d824c1-faca-484a-bcd9-f865a79fe689', 'image', '60ab91bede7a2_slider-1', '60ab91bede7a2_slider-1.png', 'image/png', 'public', 'public', 333921, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 10, '2021-05-24 05:45:04', '2021-05-24 05:45:04'),
(12, 'App\\Models\\HomeSlider', 2, '3eac64fe-584f-48e9-8c84-f7aa0345e980', 'image', '60ab91c917387_slider-2', '60ab91c917387_slider-2.jpeg', 'image/jpeg', 'public', 'public', 325548, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 11, '2021-05-24 05:45:14', '2021-05-24 05:45:15'),
(13, 'App\\Models\\HomeSlider', 3, 'e3a8afc8-be7c-4af3-a1de-b9ec0effc83c', 'image', '60ab91d2127fe_slider-3', '60ab91d2127fe_slider-3.jpeg', 'image/jpeg', 'public', 'public', 148732, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 12, '2021-05-24 05:45:24', '2021-05-24 05:45:25'),
(14, 'App\\Models\\HomeSlider', 4, '1c446388-a83c-4cfa-910a-4998c8f644cb', 'image', '60ab91dd8cc48_slider-4', '60ab91dd8cc48_slider-4.jpeg', 'image/jpeg', 'public', 'public', 333137, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 13, '2021-05-24 05:45:35', '2021-05-24 05:45:36'),
(15, 'App\\Models\\HomeSlider', 5, 'e21a0f82-eef7-43b4-aad8-2766cd1298c1', 'image', '60ab91e72d123_slider-5', '60ab91e72d123_slider-5.jpeg', 'image/jpeg', 'public', 'public', 211464, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 14, '2021-05-24 05:45:45', '2021-05-24 05:45:46'),
(16, 'App\\Models\\CarSlider', 1, 'ee9b8503-5b15-4928-a66a-08b6989bf14e', 'image', '60ab95b6cfbf9_call-to-action', '60ab95b6cfbf9_call-to-action.jpg', 'image/jpeg', 'public', 'public', 134035, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 15, '2021-05-24 06:02:00', '2021-05-24 06:02:01'),
(17, 'App\\Models\\MotoRegistration', 1, 'dcaefeda-1786-4836-87fb-12e84cb02ee7', 'invoice_attachment', '60ae937dd03a9_c0aM0vlDHVNLaP0WvGNQsa3qzc0FH7Zt8om0UpRg', '60ae937dd03a9_c0aM0vlDHVNLaP0WvGNQsa3qzc0FH7Zt8om0UpRg.pdf', 'application/pdf', 'public', 'public', 192566, '[]', '[]', '[]', 16, '2021-05-26 12:29:36', '2021-05-26 12:29:36'),
(18, 'App\\Models\\MotoRegistration', 13, '71d3e996-7a68-4851-992f-b8e29aefde67', 'invoice_attachment', '211420428437045', '211420428437045.pdf', 'application/pdf', 'public', 'public', 23238, '[]', '[]', '[]', 17, '2021-05-27 01:13:42', '2021-05-27 01:13:42'),
(19, 'App\\Models\\MotoRegistration', 14, 'c85688ba-b848-4dfd-9a01-50699488b6f7', 'invoice_attachment', '211420428437045', '211420428437045.pdf', 'application/pdf', 'public', 'public', 23238, '[]', '[]', '[]', 18, '2021-05-27 02:48:50', '2021-05-27 02:48:50'),
(20, 'App\\Models\\CarRegistration', 1, '93a2b2aa-e0f8-418e-ab40-6e2ccb552407', 'invoice_attachment', '211420428437045', '211420428437045.pdf', 'application/pdf', 'public', 'public', 23238, '[]', '[]', '[]', 19, '2021-05-27 03:23:52', '2021-05-27 03:23:52'),
(21, 'App\\Models\\CarRegistration', 2, 'e96b6aad-1cc1-40a0-ad51-dfa1e0ca2739', 'invoice_attachment', '211420428437045', '211420428437045.pdf', 'application/pdf', 'public', 'public', 23238, '[]', '[]', '[]', 20, '2021-05-27 03:26:07', '2021-05-27 03:26:07'),
(22, 'App\\Models\\MotoRegistration', 15, '8fddaebb-be95-4801-bd79-3e92f200790e', 'invoice_attachment', '211420428437045', '211420428437045.pdf', 'application/pdf', 'public', 'public', 23238, '[]', '[]', '[]', 21, '2021-05-27 03:40:04', '2021-05-27 03:40:04'),
(23, 'App\\Models\\Tyre', 15, 'a875ff94-9cc6-4b38-934d-085271e7de35', 'thumbnail', '60af975c25ef2_tyre_thumb', '60af975c25ef2_tyre_thumb.png', 'image/png', 'public', 'public', 297375, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 22, '2021-05-27 06:58:05', '2021-05-27 06:58:06'),
(24, 'App\\Models\\Tyre', 14, '5185f0d3-4ab3-48d9-a05d-4ad23371d7a0', 'thumbnail', '60af976ce9968_tyre_thumb', '60af976ce9968_tyre_thumb.png', 'image/png', 'public', 'public', 297375, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 23, '2021-05-27 06:58:22', '2021-05-27 06:58:23'),
(25, 'App\\Models\\MotoTyre', 1, '6e9c9001-de94-4e7b-9077-1ffcd3fbec57', 'banner', '60b32cb50b3fa_call-to-action', '60b32cb50b3fa_call-to-action.jpg', 'image/jpeg', 'public', 'public', 134035, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 24, '2021-05-30 00:13:07', '2021-05-30 00:13:08'),
(26, 'App\\Models\\Tyre', 15, '6856ad31-11d2-4430-bc5f-f0f0236e7ce7', 'banner', '60b36b24ca8d9_call-to-action', '60b36b24ca8d9_call-to-action.jpg', 'image/jpeg', 'public', 'public', 134035, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 25, '2021-05-30 04:38:30', '2021-05-30 04:38:30'),
(27, 'App\\Models\\Tyre', 14, 'f66f1a5e-fa9f-45c6-b3b7-56cd43968fed', 'banner', '60b36b322663c_call-to-action', '60b36b322663c_call-to-action.jpg', 'image/jpeg', 'public', 'public', 134035, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 26, '2021-05-30 04:38:45', '2021-05-30 04:38:46'),
(28, 'App\\Models\\Tyre', 13, '648d138c-aebe-43b9-8ef7-eff878525b22', 'banner', '60b36b6d3513d_car-1652913_1920', '60b36b6d3513d_car-1652913_1920.jpg', 'image/jpeg', 'public', 'public', 268969, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 27, '2021-05-30 04:39:43', '2021-05-30 04:39:43'),
(29, 'App\\Models\\CarRegistration', 3, '9797e500-af4d-4f8a-97f4-0e82afcd25ad', 'invoice_attachment', 'Taiyo PIrelli CRM Invoice', 'Taiyo-PIrelli-CRM-Invoice.pdf', 'application/pdf', 'public', 'public', 158506, '[]', '[]', '[]', 28, '2021-06-02 19:48:12', '2021-06-02 19:48:12'),
(30, 'App\\Models\\CarRegistration', 4, 'b558501b-1d88-4e3d-87cf-84bd56a2d0c3', 'invoice_attachment', 'Taiyo PIrelli CRM Invoice', 'Taiyo-PIrelli-CRM-Invoice.pdf', 'application/pdf', 'public', 'public', 158506, '[]', '[]', '[]', 29, '2021-06-02 19:51:10', '2021-06-02 19:51:10'),
(32, 'App\\Models\\Retailer', 3, '3b3adc5e-9fa4-4185-994f-97c78dfec371', 'photos', '60fd3074b6646_pirelli', '60fd3074b6646_pirelli.jpeg', 'image/jpeg', 'public', 'public', 188768, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 30, '2021-07-25 03:37:03', '2021-07-25 03:37:04'),
(33, 'App\\Models\\Retailer', 4, '5e177da2-6567-4677-a4c1-9df146c8f71b', 'banner', '60fd6e7a13492_pirelli', '60fd6e7a13492_pirelli.jpeg', 'image/jpeg', 'public', 'public', 188768, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 31, '2021-07-25 08:00:28', '2021-07-25 08:00:28'),
(35, 'App\\Models\\Retailer', 3, '042facf3-b50a-43fa-b91d-7d93eaa61e36', 'banner', '60fd6fd8a6a89_pirelli', '60fd6fd8a6a89_pirelli.jpeg', 'image/jpeg', 'public', 'public', 188768, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 32, '2021-07-25 08:06:18', '2021-07-25 08:06:19'),
(36, 'App\\Models\\Retailer', 5, 'bf47290d-c078-4bda-a3ed-d09b35505d67', 'banner', '60fd7237b76c1_IMG_20210714_014005', '60fd7237b76c1_IMG_20210714_014005.jpg', 'image/jpeg', 'public', 'public', 93261, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 33, '2021-07-25 08:16:36', '2021-07-25 08:16:36'),
(38, 'App\\Models\\HomeSlider', 6, '19a35d86-4c5c-40c9-b57e-2226a95907e3', 'image', '60fd779db0e74_60ab91e72d123_slider-5', '60fd779db0e74_60ab91e72d123_slider-5.jpeg', 'image/jpeg', 'public', 'public', 211464, '[]', '{\"generated_conversions\": {\"thumb\": true, \"preview\": true}}', '[]', 34, '2021-07-25 08:39:27', '2021-07-25 08:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_05_05_000001_create_media_table', 1),
(4, '2021_05_05_000002_create_model_combinations_table', 1),
(5, '2021_05_05_000003_create_moto_sliders_table', 1),
(6, '2021_05_05_000004_create_faqs_table', 1),
(7, '2021_05_05_000005_create_permissions_table', 1),
(8, '2021_05_05_000006_create_products_table', 1),
(9, '2021_05_05_000007_create_product_sizes_table', 1),
(10, '2021_05_05_000008_create_cities_table', 1),
(11, '2021_05_05_000009_create_retailers_table', 1),
(12, '2021_05_05_000010_create_socials_table', 1),
(13, '2021_05_05_000011_create_car_sliders_table', 1),
(14, '2021_05_05_000012_create_warranty_claims_table', 1),
(15, '2021_05_05_000013_create_other_menus_table', 1),
(16, '2021_05_05_000014_create_faq_categories_table', 1),
(17, '2021_05_05_000015_create_car_registrations_table', 1),
(18, '2021_05_05_000016_create_headers_table', 1),
(19, '2021_05_05_000017_create_contacts_table', 1),
(20, '2021_05_05_000018_create_footers_table', 1),
(21, '2021_05_05_000019_create_emails_table', 1),
(22, '2021_05_05_000020_create_pages_table', 1),
(23, '2021_05_05_000021_create_page_menus_table', 1),
(24, '2021_05_05_000022_create_moto_registrations_table', 1),
(25, '2021_05_05_000023_create_vehicle_types_table', 1),
(26, '2021_05_05_000024_create_fuels_table', 1),
(27, '2021_05_05_000025_create_bodies_table', 1),
(28, '2021_05_05_000026_create_transmissions_table', 1),
(29, '2021_05_05_000027_create_brands_table', 1),
(30, '2021_05_05_000028_create_engines_table', 1),
(31, '2021_05_05_000029_create_chassis_table', 1),
(32, '2021_05_05_000030_create_years_table', 1),
(33, '2021_05_05_000031_create_categories_table', 1),
(34, '2021_05_05_000032_create_car_models_table', 1),
(35, '2021_05_05_000033_create_users_table', 1),
(36, '2021_05_05_000034_create_sizes_table', 1),
(37, '2021_05_05_000035_create_ratios_table', 1),
(38, '2021_05_05_000036_create_widths_table', 1),
(39, '2021_05_05_000037_create_roles_table', 1),
(40, '2021_05_05_000038_create_tyres_table', 1),
(41, '2021_05_05_000039_create_permission_role_pivot_table', 1),
(42, '2021_05_05_000040_create_category_tyre_pivot_table', 1),
(43, '2021_05_05_000041_create_role_user_pivot_table', 1),
(44, '2021_05_05_000042_create_model_combination_tyre_pivot_table', 1),
(45, '2021_05_05_000043_create_model_combination_year_pivot_table', 1),
(46, '2021_05_05_000044_add_relationship_fields_to_page_menus_table', 1),
(47, '2021_05_05_000045_add_relationship_fields_to_tyres_table', 1),
(48, '2021_05_05_000046_add_relationship_fields_to_warranty_claims_table', 1),
(49, '2021_05_05_000047_add_relationship_fields_to_car_registrations_table', 1),
(50, '2021_05_05_000048_add_relationship_fields_to_moto_registrations_table', 1),
(51, '2021_05_05_000049_add_relationship_fields_to_car_models_table', 1),
(52, '2021_05_05_000050_add_relationship_fields_to_retailers_table', 1),
(53, '2021_05_05_000051_add_relationship_fields_to_product_sizes_table', 1),
(54, '2021_05_05_000052_add_relationship_fields_to_products_table', 1),
(55, '2021_05_05_000053_add_relationship_fields_to_faqs_table', 1),
(56, '2021_05_05_000054_add_relationship_fields_to_model_combinations_table', 1),
(57, '2021_05_20_000019_create_moto_brands_table', 2),
(58, '2021_05_20_000020_create_moto_models_table', 2),
(59, '2021_05_20_000021_create_moto_engines_table', 2),
(60, '2021_05_20_000022_create_moto_widths_table', 2),
(61, '2021_05_20_000023_create_moto_sizes_table', 2),
(62, '2021_05_20_000024_create_moto_ratios_table', 2),
(63, '2021_05_20_000025_create_moto_tyres_table', 2),
(64, '2021_05_20_000047_create_category_moto_tyre_pivot_table', 2),
(65, '2021_05_20_000054_add_relationship_fields_to_moto_models_table', 3),
(66, '2021_05_20_000064_add_relationship_fields_to_moto_tyres_table', 4),
(67, '2021_05_24_000042_create_home_sliders_table', 5),
(68, '2019_08_19_000000_create_failed_jobs_table', 6),
(69, '2021_03_24_101921_create_api_tokens_table', 6),
(70, '2021_05_20_000004_create_retailers_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_combinations`
--

CREATE TABLE `model_combinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `car_model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `engine_id` bigint(20) UNSIGNED NOT NULL,
  `chassis_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_combinations`
--

INSERT INTO `model_combinations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `brand_id`, `car_model_id`, `engine_id`, `chassis_id`) VALUES
(5, 'Toyota : Allion : 2000cc : RM1 (CR-V 2011-2016)', '2021-05-06 00:04:04', '2021-05-06 09:09:14', NULL, 1, 1, 2, 1),
(6, 'Toyota : Aqua : 1500cc : RU3 (Vezel HV 2013-)', '2021-05-06 00:56:17', '2021-05-06 03:21:04', NULL, 1, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_combination_tyre`
--

CREATE TABLE `model_combination_tyre` (
  `tyre_id` bigint(20) UNSIGNED NOT NULL,
  `model_combination_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_combination_tyre`
--

INSERT INTO `model_combination_tyre` (`tyre_id`, `model_combination_id`) VALUES
(7, 5),
(8, 5),
(11, 5),
(12, 5),
(14, 5),
(13, 5),
(15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_combination_year`
--

CREATE TABLE `model_combination_year` (
  `model_combination_id` bigint(20) UNSIGNED NOT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_combination_year`
--

INSERT INTO `model_combination_year` (`model_combination_id`, `year_id`) VALUES
(5, 1),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `moto_brands`
--

CREATE TABLE `moto_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_brands`
--

INSERT INTO `moto_brands` (`id`, `brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kawasaki', '2021-05-20 06:05:55', '2021-05-20 06:05:55', NULL),
(2, 'Suzuki', '2021-05-23 00:46:15', '2021-05-23 00:46:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_engines`
--

CREATE TABLE `moto_engines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_engines`
--

INSERT INTO `moto_engines` (`id`, `engine`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '150cc', '2021-05-20 06:13:21', '2021-05-20 06:13:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_models`
--

CREATE TABLE `moto_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `moto_brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_models`
--

INSERT INTO `moto_models` (`id`, `model`, `created_at`, `updated_at`, `deleted_at`, `moto_brand_id`) VALUES
(1, 'Ninja 125', '2021-05-20 06:06:10', '2021-05-20 06:06:10', NULL, 1),
(2, 'Gixxer', '2021-05-23 00:46:47', '2021-05-23 00:46:47', NULL, 2),
(3, 'Gixxer SF', '2021-05-23 00:47:02', '2021-05-23 00:47:02', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `moto_ratios`
--

CREATE TABLE `moto_ratios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ratio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_ratios`
--

INSERT INTO `moto_ratios` (`id`, `ratio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '2021-05-20 06:13:04', '2021-05-20 06:13:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_registrations`
--

CREATE TABLE `moto_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_purchased` date DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_dot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `product_name_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_registrations`
--

INSERT INTO `moto_registrations` (`id`, `first_name`, `last_name`, `email`, `phone`, `zip`, `address`, `date_purchased`, `invoice_number`, `product_dot`, `product_quantity`, `created_at`, `updated_at`, `deleted_at`, `city_id`, `product_name_id`, `product_size_id`, `retailer_id`) VALUES
(1, 'Ratan', 'Mia', 'shorifull@gmail.com', '+8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-20', '123', '1', 11, '2021-05-26 12:29:36', '2021-05-26 12:29:36', NULL, 1, 2, 2, 1),
(2, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', NULL, '123', '1', 2, '2021-05-26 12:42:02', '2021-05-26 12:42:02', NULL, 1, 2, 2, NULL),
(3, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', NULL, '123', '1', 2, '2021-05-26 12:42:35', '2021-05-26 12:42:35', NULL, 1, 2, 2, NULL),
(4, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', NULL, '123', '1', 2, '2021-05-26 22:00:34', '2021-05-26 22:00:34', NULL, 1, 2, 2, NULL),
(5, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-27', '123', '1', 2, '2021-05-26 22:17:17', '2021-05-26 22:17:17', NULL, 1, 2, 2, NULL),
(6, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-27', '123', '1', 2, '2021-05-26 22:20:31', '2021-05-26 22:20:31', NULL, 1, 2, 2, NULL),
(7, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-27', '123', '1', 2, '2021-05-26 22:34:49', '2021-05-26 22:34:49', NULL, 1, 2, 2, NULL),
(8, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-14', '123', '1', 2, '2021-05-26 22:44:26', '2021-05-26 22:44:26', NULL, 1, 2, 2, NULL),
(9, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-14', '123', '1', 2, '2021-05-26 22:45:20', '2021-05-26 22:45:20', NULL, 1, 1, 1, NULL),
(10, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-14', '123', '1', 2, '2021-05-26 22:46:55', '2021-05-26 22:46:55', NULL, 1, 2, 2, NULL),
(11, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-14', '123', '1', 2, '2021-05-26 22:50:41', '2021-05-26 22:50:41', NULL, 1, 1, 1, NULL),
(12, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-22', '123', '1', 2, '2021-05-27 00:47:48', '2021-05-27 00:47:48', NULL, 1, 2, 2, NULL),
(13, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-27', '123', '1', 2, '2021-05-27 01:13:42', '2021-05-27 01:13:42', NULL, 1, 2, 2, NULL),
(14, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-21', '123', '1', 2, '2021-05-27 02:48:50', '2021-05-27 02:48:50', NULL, 1, 1, 1, NULL),
(15, 'Ratan', 'Mia', 'shorifull@gmail.com', '8801751010966', '1219', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '2021-05-27', '123', '1', 2, '2021-05-27 03:40:04', '2021-05-27 03:40:04', NULL, 1, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_sizes`
--

CREATE TABLE `moto_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_sizes`
--

INSERT INTO `moto_sizes` (`id`, `size`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, '2021-05-20 06:12:56', '2021-05-20 06:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_sliders`
--

CREATE TABLE `moto_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `button_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_sliders`
--

INSERT INTO `moto_sliders` (`id`, `title`, `short_description`, `long_description`, `button_label`, `button_url`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Moto Slider 1', 'Sample Slider', NULL, 'Learn More', '#', 'yes', '2021-05-23 06:18:04', '2021-05-23 06:18:04', NULL),
(2, 'Moto  Slider 2', 'Sample Slider 2', '<p>Sample Slider 2</p>', 'Learn More', '#', 'yes', '2021-05-23 06:18:43', '2021-05-23 06:18:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_tyres`
--

CREATE TABLE `moto_tyres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `features` longtext COLLATE utf8mb4_unicode_ci,
  `specifications` longtext COLLATE utf8mb4_unicode_ci,
  `warranty` longtext COLLATE utf8mb4_unicode_ci,
  `video` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `moto_brand_id` bigint(20) UNSIGNED NOT NULL,
  `moto_model_id` bigint(20) UNSIGNED NOT NULL,
  `moto_engine_id` bigint(20) UNSIGNED NOT NULL,
  `moto_width_id` bigint(20) UNSIGNED DEFAULT NULL,
  `moto_size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `moto_ratio_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_tyres`
--

INSERT INTO `moto_tyres` (`id`, `title`, `short_description`, `long_description`, `features`, `specifications`, `warranty`, `video`, `created_at`, `updated_at`, `deleted_at`, `moto_brand_id`, `moto_model_id`, `moto_engine_id`, `moto_width_id`, `moto_size_id`, `moto_ratio_id`) VALUES
(1, 'Pirelli  Tyre', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>FOLLOW YOUR LEANINGS</strong><br><br><strong>DIABLO ROSSO™ CORSA II, Pirelli\'s first multi-compound motorcycle tyre transferring racetrack performance into street versatility</strong><br>&nbsp;</p><ol><li>Pirelli technology developed within the World Superbike Championship</li><li>Bicompound solution for the front tyre — applying the two compounds in three different zones</li><li>Triple compound on the rear distributed in five zones</li><li>New tread pattern design</li></ol><p>&nbsp;</p><p>is a trademark and it is the distinctive sign of the tread pattern of Pirelli DIABLO ROSSO™ CORSA II tyres</p>', '<p><strong>FOLLOW YOUR LEANINGS</strong><br><br><strong>DIABLO ROSSO™ CORSA II, Pirelli\'s first multi-compound motorcycle tyre transferring racetrack performance into street versatility</strong><br>&nbsp;</p><ol><li>Pirelli technology developed within the World Superbike Championship</li><li>Bicompound solution for the front tyre — applying the two compounds in three different zones</li><li>Triple compound on the rear distributed in five zones</li><li>New tread pattern design</li></ol><p>&nbsp;</p><p>is a trademark and it is the distinctive sign of the tread pattern of Pirelli DIABLO ROSSO™ CORSA II tyres</p>', '<h2><strong>Specifications</strong></h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, 'https://www.youtube.com/watch?v=CsjCMrg0anU', '2021-05-20 06:14:10', '2021-05-31 00:24:13', NULL, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moto_widths`
--

CREATE TABLE `moto_widths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moto_widths`
--

INSERT INTO `moto_widths` (`id`, `width`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 22, '2021-05-20 06:13:11', '2021-05-20 06:13:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `other_menus`
--

CREATE TABLE `other_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_slug`, `page_content`, `active`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Warranty Page', 'warranty', '<p>&nbsp;</p><p>&nbsp;</p><p><strong>Tyre Claim Policy</strong></p><p>&nbsp;</p><p>Pirelli Tyre Suisse SA. warrants that all Pirelli brand products, supplied either directly or through an authorized Pirelli Dealer and which are mounted on passenger cars, vans, and SUVs within Bangladesh have been supplied without manufacturing or materials defects which render the products unsuitable for the use for which products of the same type are normally used and will be accepted for examination by an authorized Pirelli technician for a period mentioned below:</p><p>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>Tyres sold from tyre manufacturing date</td><td>Warranty Period</td></tr><tr><td>(a)</td><td>Within 6 Months</td><td>Up to 6 Months from the date of purchase or till the exposure of the tread</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>wear indicator. Whichever is earlier irrespective of kilometer covered.</td></tr></tbody></table></figure><p>&nbsp;</p><p>At the end of the relevant periods stated above, all warranties, express or implied are terminated.</p><p>Claim will be attended only when presented with the tyre purchase bill/ warranty card in original.</p><p>&nbsp;</p><p>The warranty shall apply on condition that; Pirelli Tyre Suisse SA, have received a tyre examination request / claim form, completed in all its parts and has submitted the product for technical examination by authorized Pirelli technicians.</p><p>&nbsp;</p><p><strong>Exclusions:</strong></p><ol><li>Tyres transferred from the original vehicle on which they were originally installed.</li><li>Tyres which have been re-treaded, re-grooved or repaired by a third party.</li><li>Tyres with Punctures and accidental damage repairs.</li><li>Tyres which have been modified by the addition or removal of material or any tyre intentionally altered to change its appearance.</li><li>Tyres injected with liquid balancer or sealant or in which anything other than air or nitrogen has been used as a support medium.</li><li>Tyres used in racing or other competitive motor sport events.</li></ol><p>&nbsp;</p><ol><li>Tyre un-serviceability caused by tyre operation in excess of tyre / wheel manufacturer’s specifications and recommendations, including insufficient speed rating, load index, undersized or oversized tyres, application of use.</li></ol><p>&nbsp;</p><ol><li>Ride or vehicle vibration related anomalies where the vehicle concerned is not also made available for examination.</li></ol><p>&nbsp;</p><ol><li>Tyres which became unserviceable because of a mechanical irregularity in the vehicle such as misalignment, defective brakes, defective shock absorbers, or improper wheel rims.</li></ol><p>&nbsp;</p><ol><li>Tyres which have reached the minimum legal tread depth.</li><li>Tyres damaged by fire, climatic factors, chemical corrosion, vandalism, accidents, snow chains, theft, run whilst flat, under-inflated, over-inflated or abused during servicing.</li></ol><p>&nbsp;</p><ol><li>Flat spotting caused by improper transport or storage.</li></ol><p>&nbsp;</p><ol><li>Tyres which become unserviceable because of road hazard damage (eg. nails, glass, metal objects) or other penetrations or snags, bruises or impact damage.</li></ol><p>&nbsp;</p><ol><li>Tyres damaged from improper mounting / demounting practices.</li><li>Tyre Dealer / Retailer services (eg. mounting / dismounting, balancing, tyre rotation or wheel alignment).</li><li>Tyres whose trademark, serial number or DOT are worn off or show signs of having been tampered with.</li></ol><p>&nbsp;</p><ol><li>A tyre is considered to have delivered it’s original usable tread and it’s warranty ends when at least one Tread Wear Indicator (T.W.I.) becomes visible, regardless of age or mileage. The TWI’s indicate the legal minimum tread depth of 1.6mm for passenger Car, Van &amp; SUV tyres.</li></ol><p>&nbsp;</p><p>This is the only express warranty given by Pirelli Tyre Suisse SA, and does not make any other express warranty or any implied warranty of merchantability or fitness for a particular purpose. This warranty cannot be changed by any other person, including authorized Pirelli Dealers or Vehicle Manufacturers or Vehicle Dealers to create any other obligation in connection with Pirelli brand tyres.</p><p>&nbsp;</p><p>Pirelli Tyre Suisse SA will not do anything other than what is stated in this warranty if an anomaly is found to exist. All other remedies are excluded, including any obligation or liability on the part of Pirelli Tyre Suisse SA for consequential or incidental damages (such as loss of use of a vehicle, loss of time or inconvenience) arising out of an anomaly, as far as the law permits.</p>', 'yes', 'Warranty', 'warranty', 'car, moto', '2021-05-25 04:06:15', '2021-05-25 04:06:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_menus`
--

CREATE TABLE `page_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'vehicle_access', NULL, NULL, NULL),
(18, 'brand_create', NULL, NULL, NULL),
(19, 'brand_edit', NULL, NULL, NULL),
(20, 'brand_show', NULL, NULL, NULL),
(21, 'brand_delete', NULL, NULL, NULL),
(22, 'brand_access', NULL, NULL, NULL),
(23, 'body_create', NULL, NULL, NULL),
(24, 'body_edit', NULL, NULL, NULL),
(25, 'body_show', NULL, NULL, NULL),
(26, 'body_delete', NULL, NULL, NULL),
(27, 'body_access', NULL, NULL, NULL),
(28, 'fuel_create', NULL, NULL, NULL),
(29, 'fuel_edit', NULL, NULL, NULL),
(30, 'fuel_show', NULL, NULL, NULL),
(31, 'fuel_delete', NULL, NULL, NULL),
(32, 'fuel_access', NULL, NULL, NULL),
(33, 'transmission_create', NULL, NULL, NULL),
(34, 'transmission_edit', NULL, NULL, NULL),
(35, 'transmission_show', NULL, NULL, NULL),
(36, 'transmission_delete', NULL, NULL, NULL),
(37, 'transmission_access', NULL, NULL, NULL),
(38, 'engine_create', NULL, NULL, NULL),
(39, 'engine_edit', NULL, NULL, NULL),
(40, 'engine_show', NULL, NULL, NULL),
(41, 'engine_delete', NULL, NULL, NULL),
(42, 'engine_access', NULL, NULL, NULL),
(43, 'chassis_create', NULL, NULL, NULL),
(44, 'chassis_edit', NULL, NULL, NULL),
(45, 'chassis_show', NULL, NULL, NULL),
(46, 'chassis_delete', NULL, NULL, NULL),
(47, 'chassis_access', NULL, NULL, NULL),
(48, 'year_create', NULL, NULL, NULL),
(49, 'year_edit', NULL, NULL, NULL),
(50, 'year_show', NULL, NULL, NULL),
(51, 'year_delete', NULL, NULL, NULL),
(52, 'year_access', NULL, NULL, NULL),
(53, 'category_create', NULL, NULL, NULL),
(54, 'category_edit', NULL, NULL, NULL),
(55, 'category_show', NULL, NULL, NULL),
(56, 'category_delete', NULL, NULL, NULL),
(57, 'category_access', NULL, NULL, NULL),
(58, 'car_model_create', NULL, NULL, NULL),
(59, 'car_model_edit', NULL, NULL, NULL),
(60, 'car_model_show', NULL, NULL, NULL),
(61, 'car_model_delete', NULL, NULL, NULL),
(62, 'car_model_access', NULL, NULL, NULL),
(63, 'size_create', NULL, NULL, NULL),
(64, 'size_edit', NULL, NULL, NULL),
(65, 'size_show', NULL, NULL, NULL),
(66, 'size_delete', NULL, NULL, NULL),
(67, 'size_access', NULL, NULL, NULL),
(68, 'ratio_create', NULL, NULL, NULL),
(69, 'ratio_edit', NULL, NULL, NULL),
(70, 'ratio_show', NULL, NULL, NULL),
(71, 'ratio_delete', NULL, NULL, NULL),
(72, 'ratio_access', NULL, NULL, NULL),
(73, 'width_create', NULL, NULL, NULL),
(74, 'width_edit', NULL, NULL, NULL),
(75, 'width_show', NULL, NULL, NULL),
(76, 'width_delete', NULL, NULL, NULL),
(77, 'width_access', NULL, NULL, NULL),
(78, 'tyre_create', NULL, NULL, NULL),
(79, 'tyre_edit', NULL, NULL, NULL),
(80, 'tyre_show', NULL, NULL, NULL),
(81, 'tyre_delete', NULL, NULL, NULL),
(82, 'tyre_access', NULL, NULL, NULL),
(83, 'faq_section_access', NULL, NULL, NULL),
(84, 'faq_category_create', NULL, NULL, NULL),
(85, 'faq_category_edit', NULL, NULL, NULL),
(86, 'faq_category_show', NULL, NULL, NULL),
(87, 'faq_category_delete', NULL, NULL, NULL),
(88, 'faq_category_access', NULL, NULL, NULL),
(89, 'faq_create', NULL, NULL, NULL),
(90, 'faq_edit', NULL, NULL, NULL),
(91, 'faq_show', NULL, NULL, NULL),
(92, 'faq_delete', NULL, NULL, NULL),
(93, 'faq_access', NULL, NULL, NULL),
(94, 'warranty_access', NULL, NULL, NULL),
(95, 'vehicle_type_create', NULL, NULL, NULL),
(96, 'vehicle_type_edit', NULL, NULL, NULL),
(97, 'vehicle_type_show', NULL, NULL, NULL),
(98, 'vehicle_type_delete', NULL, NULL, NULL),
(99, 'vehicle_type_access', NULL, NULL, NULL),
(100, 'product_create', NULL, NULL, NULL),
(101, 'product_edit', NULL, NULL, NULL),
(102, 'product_show', NULL, NULL, NULL),
(103, 'product_delete', NULL, NULL, NULL),
(104, 'product_access', NULL, NULL, NULL),
(105, 'product_size_create', NULL, NULL, NULL),
(106, 'product_size_edit', NULL, NULL, NULL),
(107, 'product_size_show', NULL, NULL, NULL),
(108, 'product_size_delete', NULL, NULL, NULL),
(109, 'product_size_access', NULL, NULL, NULL),
(110, 'city_create', NULL, NULL, NULL),
(111, 'city_edit', NULL, NULL, NULL),
(112, 'city_show', NULL, NULL, NULL),
(113, 'city_delete', NULL, NULL, NULL),
(114, 'city_access', NULL, NULL, NULL),
(115, 'retailer_create', NULL, NULL, NULL),
(116, 'retailer_edit', NULL, NULL, NULL),
(117, 'retailer_show', NULL, NULL, NULL),
(118, 'retailer_delete', NULL, NULL, NULL),
(119, 'retailer_access', NULL, NULL, NULL),
(120, 'social_create', NULL, NULL, NULL),
(121, 'social_edit', NULL, NULL, NULL),
(122, 'social_show', NULL, NULL, NULL),
(123, 'social_delete', NULL, NULL, NULL),
(124, 'social_access', NULL, NULL, NULL),
(125, 'slider_setting_access', NULL, NULL, NULL),
(126, 'car_slider_create', NULL, NULL, NULL),
(127, 'car_slider_edit', NULL, NULL, NULL),
(128, 'car_slider_show', NULL, NULL, NULL),
(129, 'car_slider_delete', NULL, NULL, NULL),
(130, 'car_slider_access', NULL, NULL, NULL),
(131, 'moto_slider_create', NULL, NULL, NULL),
(132, 'moto_slider_edit', NULL, NULL, NULL),
(133, 'moto_slider_show', NULL, NULL, NULL),
(134, 'moto_slider_delete', NULL, NULL, NULL),
(135, 'moto_slider_access', NULL, NULL, NULL),
(136, 'warranty_claim_create', NULL, NULL, NULL),
(137, 'warranty_claim_edit', NULL, NULL, NULL),
(138, 'warranty_claim_show', NULL, NULL, NULL),
(139, 'warranty_claim_delete', NULL, NULL, NULL),
(140, 'warranty_claim_access', NULL, NULL, NULL),
(141, 'moto_registration_create', NULL, NULL, NULL),
(142, 'moto_registration_edit', NULL, NULL, NULL),
(143, 'moto_registration_show', NULL, NULL, NULL),
(144, 'moto_registration_delete', NULL, NULL, NULL),
(145, 'moto_registration_access', NULL, NULL, NULL),
(146, 'car_registration_create', NULL, NULL, NULL),
(147, 'car_registration_edit', NULL, NULL, NULL),
(148, 'car_registration_show', NULL, NULL, NULL),
(149, 'car_registration_delete', NULL, NULL, NULL),
(150, 'car_registration_access', NULL, NULL, NULL),
(151, 'site_setting_access', NULL, NULL, NULL),
(152, 'header_create', NULL, NULL, NULL),
(153, 'header_edit', NULL, NULL, NULL),
(154, 'header_show', NULL, NULL, NULL),
(155, 'header_delete', NULL, NULL, NULL),
(156, 'header_access', NULL, NULL, NULL),
(157, 'contact_create', NULL, NULL, NULL),
(158, 'contact_edit', NULL, NULL, NULL),
(159, 'contact_show', NULL, NULL, NULL),
(160, 'contact_delete', NULL, NULL, NULL),
(161, 'contact_access', NULL, NULL, NULL),
(162, 'footer_create', NULL, NULL, NULL),
(163, 'footer_edit', NULL, NULL, NULL),
(164, 'footer_show', NULL, NULL, NULL),
(165, 'footer_delete', NULL, NULL, NULL),
(166, 'footer_access', NULL, NULL, NULL),
(167, 'email_create', NULL, NULL, NULL),
(168, 'email_edit', NULL, NULL, NULL),
(169, 'email_show', NULL, NULL, NULL),
(170, 'email_delete', NULL, NULL, NULL),
(171, 'email_access', NULL, NULL, NULL),
(172, 'page_create', NULL, NULL, NULL),
(173, 'page_edit', NULL, NULL, NULL),
(174, 'page_show', NULL, NULL, NULL),
(175, 'page_delete', NULL, NULL, NULL),
(176, 'page_access', NULL, NULL, NULL),
(177, 'menu_setting_access', NULL, NULL, NULL),
(178, 'page_menu_create', NULL, NULL, NULL),
(179, 'page_menu_edit', NULL, NULL, NULL),
(180, 'page_menu_show', NULL, NULL, NULL),
(181, 'page_menu_delete', NULL, NULL, NULL),
(182, 'page_menu_access', NULL, NULL, NULL),
(183, 'other_menu_create', NULL, NULL, NULL),
(184, 'other_menu_edit', NULL, NULL, NULL),
(185, 'other_menu_show', NULL, NULL, NULL),
(186, 'other_menu_delete', NULL, NULL, NULL),
(187, 'other_menu_access', NULL, NULL, NULL),
(188, 'model_combination_create', NULL, NULL, NULL),
(189, 'model_combination_edit', NULL, NULL, NULL),
(190, 'model_combination_show', NULL, NULL, NULL),
(191, 'model_combination_delete', NULL, NULL, NULL),
(192, 'model_combination_access', NULL, NULL, NULL),
(193, 'moto_tyre_section_access', NULL, NULL, NULL),
(194, 'moto_brand_create', NULL, NULL, NULL),
(195, 'moto_brand_edit', NULL, NULL, NULL),
(196, 'moto_brand_show', NULL, NULL, NULL),
(197, 'moto_brand_delete', NULL, NULL, NULL),
(198, 'moto_brand_access', NULL, NULL, NULL),
(199, 'moto_model_create', NULL, NULL, NULL),
(200, 'moto_model_edit', NULL, NULL, NULL),
(201, 'moto_model_show', NULL, NULL, NULL),
(202, 'moto_model_delete', NULL, NULL, NULL),
(203, 'moto_model_access', NULL, NULL, NULL),
(204, 'moto_engine_create', NULL, NULL, NULL),
(205, 'moto_engine_edit', NULL, NULL, NULL),
(206, 'moto_engine_show', NULL, NULL, NULL),
(207, 'moto_engine_delete', NULL, NULL, NULL),
(208, 'moto_engine_access', NULL, NULL, NULL),
(209, 'moto_width_create', NULL, NULL, NULL),
(210, 'moto_width_edit', NULL, NULL, NULL),
(211, 'moto_width_show', NULL, NULL, NULL),
(212, 'moto_width_delete', NULL, NULL, NULL),
(213, 'moto_width_access', NULL, NULL, NULL),
(214, 'moto_size_create', NULL, NULL, NULL),
(215, 'moto_size_edit', NULL, NULL, NULL),
(216, 'moto_size_show', NULL, NULL, NULL),
(217, 'moto_size_delete', NULL, NULL, NULL),
(218, 'moto_size_access', NULL, NULL, NULL),
(219, 'moto_ratio_create', NULL, NULL, NULL),
(220, 'moto_ratio_edit', NULL, NULL, NULL),
(221, 'moto_ratio_show', NULL, NULL, NULL),
(222, 'moto_ratio_delete', NULL, NULL, NULL),
(223, 'moto_ratio_access', NULL, NULL, NULL),
(224, 'moto_tyre_create', NULL, NULL, NULL),
(225, 'moto_tyre_edit', NULL, NULL, NULL),
(226, 'moto_tyre_show', NULL, NULL, NULL),
(227, 'moto_tyre_delete', NULL, NULL, NULL),
(228, 'moto_tyre_access', NULL, NULL, NULL),
(229, 'profile_password_edit', NULL, NULL, NULL),
(230, 'home_slider_create', '2021-05-24 05:30:52', '2021-05-24 05:30:52', NULL),
(231, 'home_slider_edit', '2021-05-24 05:31:07', '2021-05-24 05:31:07', NULL),
(232, 'home_slider_show', '2021-05-24 05:31:21', '2021-05-24 05:31:21', NULL),
(233, 'home_slider_delete', '2021-05-24 05:31:33', '2021-05-24 05:31:33', NULL),
(234, 'home_slider_access', '2021-05-24 05:31:45', '2021-05-24 05:31:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_old`
--

CREATE TABLE `permissions_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_old`
--

INSERT INTO `permissions_old` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'vehicle_access', NULL, NULL, NULL),
(18, 'brand_create', NULL, NULL, NULL),
(19, 'brand_edit', NULL, NULL, NULL),
(20, 'brand_show', NULL, NULL, NULL),
(21, 'brand_delete', NULL, NULL, NULL),
(22, 'brand_access', NULL, NULL, NULL),
(23, 'body_create', NULL, NULL, NULL),
(24, 'body_edit', NULL, NULL, NULL),
(25, 'body_show', NULL, NULL, NULL),
(26, 'body_delete', NULL, NULL, NULL),
(27, 'body_access', NULL, NULL, NULL),
(28, 'fuel_create', NULL, NULL, NULL),
(29, 'fuel_edit', NULL, NULL, NULL),
(30, 'fuel_show', NULL, NULL, NULL),
(31, 'fuel_delete', NULL, NULL, NULL),
(32, 'fuel_access', NULL, NULL, NULL),
(33, 'transmission_create', NULL, NULL, NULL),
(34, 'transmission_edit', NULL, NULL, NULL),
(35, 'transmission_show', NULL, NULL, NULL),
(36, 'transmission_delete', NULL, NULL, NULL),
(37, 'transmission_access', NULL, NULL, NULL),
(38, 'engine_create', NULL, NULL, NULL),
(39, 'engine_edit', NULL, NULL, NULL),
(40, 'engine_show', NULL, NULL, NULL),
(41, 'engine_delete', NULL, NULL, NULL),
(42, 'engine_access', NULL, NULL, NULL),
(43, 'chassis_create', NULL, NULL, NULL),
(44, 'chassis_edit', NULL, NULL, NULL),
(45, 'chassis_show', NULL, NULL, NULL),
(46, 'chassis_delete', NULL, NULL, NULL),
(47, 'chassis_access', NULL, NULL, NULL),
(48, 'year_create', NULL, NULL, NULL),
(49, 'year_edit', NULL, NULL, NULL),
(50, 'year_show', NULL, NULL, NULL),
(51, 'year_delete', NULL, NULL, NULL),
(52, 'year_access', NULL, NULL, NULL),
(53, 'category_create', NULL, NULL, NULL),
(54, 'category_edit', NULL, NULL, NULL),
(55, 'category_show', NULL, NULL, NULL),
(56, 'category_delete', NULL, NULL, NULL),
(57, 'category_access', NULL, NULL, NULL),
(58, 'car_model_create', NULL, NULL, NULL),
(59, 'car_model_edit', NULL, NULL, NULL),
(60, 'car_model_show', NULL, NULL, NULL),
(61, 'car_model_delete', NULL, NULL, NULL),
(62, 'car_model_access', NULL, NULL, NULL),
(63, 'size_create', NULL, NULL, NULL),
(64, 'size_edit', NULL, NULL, NULL),
(65, 'size_show', NULL, NULL, NULL),
(66, 'size_delete', NULL, NULL, NULL),
(67, 'size_access', NULL, NULL, NULL),
(68, 'ratio_create', NULL, NULL, NULL),
(69, 'ratio_edit', NULL, NULL, NULL),
(70, 'ratio_show', NULL, NULL, NULL),
(71, 'ratio_delete', NULL, NULL, NULL),
(72, 'ratio_access', NULL, NULL, NULL),
(73, 'width_create', NULL, NULL, NULL),
(74, 'width_edit', NULL, NULL, NULL),
(75, 'width_show', NULL, NULL, NULL),
(76, 'width_delete', NULL, NULL, NULL),
(77, 'width_access', NULL, NULL, NULL),
(78, 'tyre_create', NULL, NULL, NULL),
(79, 'tyre_edit', NULL, NULL, NULL),
(80, 'tyre_show', NULL, NULL, NULL),
(81, 'tyre_delete', NULL, NULL, NULL),
(82, 'tyre_access', NULL, NULL, NULL),
(83, 'faq_section_access', NULL, NULL, NULL),
(84, 'faq_category_create', NULL, NULL, NULL),
(85, 'faq_category_edit', NULL, NULL, NULL),
(86, 'faq_category_show', NULL, NULL, NULL),
(87, 'faq_category_delete', NULL, NULL, NULL),
(88, 'faq_category_access', NULL, NULL, NULL),
(89, 'faq_create', NULL, NULL, NULL),
(90, 'faq_edit', NULL, NULL, NULL),
(91, 'faq_show', NULL, NULL, NULL),
(92, 'faq_delete', NULL, NULL, NULL),
(93, 'faq_access', NULL, NULL, NULL),
(94, 'warranty_access', NULL, NULL, NULL),
(95, 'vehicle_type_create', NULL, NULL, NULL),
(96, 'vehicle_type_edit', NULL, NULL, NULL),
(97, 'vehicle_type_show', NULL, NULL, NULL),
(98, 'vehicle_type_delete', NULL, NULL, NULL),
(99, 'vehicle_type_access', NULL, NULL, NULL),
(100, 'product_create', NULL, NULL, NULL),
(101, 'product_edit', NULL, NULL, NULL),
(102, 'product_show', NULL, NULL, NULL),
(103, 'product_delete', NULL, NULL, NULL),
(104, 'product_access', NULL, NULL, NULL),
(105, 'product_size_create', NULL, NULL, NULL),
(106, 'product_size_edit', NULL, NULL, NULL),
(107, 'product_size_show', NULL, NULL, NULL),
(108, 'product_size_delete', NULL, NULL, NULL),
(109, 'product_size_access', NULL, NULL, NULL),
(110, 'city_create', NULL, NULL, NULL),
(111, 'city_edit', NULL, NULL, NULL),
(112, 'city_show', NULL, NULL, NULL),
(113, 'city_delete', NULL, NULL, NULL),
(114, 'city_access', NULL, NULL, NULL),
(115, 'retailer_create', NULL, NULL, NULL),
(116, 'retailer_edit', NULL, NULL, NULL),
(117, 'retailer_show', NULL, NULL, NULL),
(118, 'retailer_delete', NULL, NULL, NULL),
(119, 'retailer_access', NULL, NULL, NULL),
(120, 'social_create', NULL, NULL, NULL),
(121, 'social_edit', NULL, NULL, NULL),
(122, 'social_show', NULL, NULL, NULL),
(123, 'social_delete', NULL, NULL, NULL),
(124, 'social_access', NULL, NULL, NULL),
(125, 'slider_setting_access', NULL, NULL, NULL),
(126, 'car_slider_create', NULL, NULL, NULL),
(127, 'car_slider_edit', NULL, NULL, NULL),
(128, 'car_slider_show', NULL, NULL, NULL),
(129, 'car_slider_delete', NULL, NULL, NULL),
(130, 'car_slider_access', NULL, NULL, NULL),
(131, 'moto_slider_create', NULL, NULL, NULL),
(132, 'moto_slider_edit', NULL, NULL, NULL),
(133, 'moto_slider_show', NULL, NULL, NULL),
(134, 'moto_slider_delete', NULL, NULL, NULL),
(135, 'moto_slider_access', NULL, NULL, NULL),
(136, 'warranty_claim_create', NULL, NULL, NULL),
(137, 'warranty_claim_edit', NULL, NULL, NULL),
(138, 'warranty_claim_show', NULL, NULL, NULL),
(139, 'warranty_claim_delete', NULL, NULL, NULL),
(140, 'warranty_claim_access', NULL, NULL, NULL),
(141, 'moto_registration_create', NULL, NULL, NULL),
(142, 'moto_registration_edit', NULL, NULL, NULL),
(143, 'moto_registration_show', NULL, NULL, NULL),
(144, 'moto_registration_delete', NULL, NULL, NULL),
(145, 'moto_registration_access', NULL, NULL, NULL),
(146, 'car_registration_create', NULL, NULL, NULL),
(147, 'car_registration_edit', NULL, NULL, NULL),
(148, 'car_registration_show', NULL, NULL, NULL),
(149, 'car_registration_delete', NULL, NULL, NULL),
(150, 'car_registration_access', NULL, NULL, NULL),
(151, 'site_setting_access', NULL, NULL, NULL),
(152, 'header_create', NULL, NULL, NULL),
(153, 'header_edit', NULL, NULL, NULL),
(154, 'header_show', NULL, NULL, NULL),
(155, 'header_delete', NULL, NULL, NULL),
(156, 'header_access', NULL, NULL, NULL),
(157, 'contact_create', NULL, NULL, NULL),
(158, 'contact_edit', NULL, NULL, NULL),
(159, 'contact_show', NULL, NULL, NULL),
(160, 'contact_delete', NULL, NULL, NULL),
(161, 'contact_access', NULL, NULL, NULL),
(162, 'footer_create', NULL, NULL, NULL),
(163, 'footer_edit', NULL, NULL, NULL),
(164, 'footer_show', NULL, NULL, NULL),
(165, 'footer_delete', NULL, NULL, NULL),
(166, 'footer_access', NULL, NULL, NULL),
(167, 'email_create', NULL, NULL, NULL),
(168, 'email_edit', NULL, NULL, NULL),
(169, 'email_show', NULL, NULL, NULL),
(170, 'email_delete', NULL, NULL, NULL),
(171, 'email_access', NULL, NULL, NULL),
(172, 'page_create', NULL, NULL, NULL),
(173, 'page_edit', NULL, NULL, NULL),
(174, 'page_show', NULL, NULL, NULL),
(175, 'page_delete', NULL, NULL, NULL),
(176, 'page_access', NULL, NULL, NULL),
(177, 'menu_setting_access', NULL, NULL, NULL),
(178, 'page_menu_create', NULL, NULL, NULL),
(179, 'page_menu_edit', NULL, NULL, NULL),
(180, 'page_menu_show', NULL, NULL, NULL),
(181, 'page_menu_delete', NULL, NULL, NULL),
(182, 'page_menu_access', NULL, NULL, NULL),
(183, 'other_menu_create', NULL, NULL, NULL),
(184, 'other_menu_edit', NULL, NULL, NULL),
(185, 'other_menu_show', NULL, NULL, NULL),
(186, 'other_menu_delete', NULL, NULL, NULL),
(187, 'other_menu_access', NULL, NULL, NULL),
(188, 'model_combination_create', NULL, NULL, NULL),
(189, 'model_combination_edit', NULL, NULL, NULL),
(190, 'model_combination_show', NULL, NULL, NULL),
(191, 'model_combination_delete', NULL, NULL, NULL),
(192, 'model_combination_access', NULL, NULL, NULL),
(193, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136),
(2, 137),
(2, 138),
(2, 139),
(2, 140),
(2, 141),
(2, 142),
(2, 143),
(2, 144),
(2, 145),
(2, 146),
(2, 147),
(2, 148),
(2, 149),
(2, 150),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 162),
(2, 163),
(2, 164),
(2, 165),
(2, 166),
(2, 167),
(2, 168),
(2, 169),
(2, 170),
(2, 171),
(2, 172),
(2, 173),
(2, 174),
(2, 175),
(2, 176),
(2, 177),
(2, 178),
(2, 179),
(2, 180),
(2, 181),
(2, 182),
(2, 183),
(2, 184),
(2, 185),
(2, 186),
(2, 187),
(2, 188),
(2, 189),
(2, 190),
(2, 191),
(2, 192),
(2, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(1, 201),
(1, 202),
(1, 203),
(1, 204),
(1, 205),
(1, 206),
(1, 207),
(1, 208),
(1, 209),
(1, 210),
(1, 211),
(1, 212),
(1, 213),
(1, 214),
(1, 215),
(1, 216),
(1, 217),
(1, 218),
(1, 219),
(1, 220),
(1, 221),
(1, 222),
(1, 223),
(1, 224),
(1, 225),
(1, 226),
(1, 227),
(1, 228),
(1, 229),
(1, 230),
(1, 231),
(1, 232),
(1, 233),
(1, 234);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `vehicle_type_id`) VALUES
(1, 'Ninja 125', '2021-05-24 23:35:22', '2021-05-24 23:35:22', NULL, 2),
(2, 'Angel City', '2021-05-25 00:39:50', '2021-05-25 00:39:50', NULL, 2),
(3, 'Toyota', '2021-05-26 01:32:03', '2021-05-26 01:32:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`, `created_at`, `updated_at`, `deleted_at`, `product_id`) VALUES
(1, '90/90 - 17 M/C 49S TL', '2021-05-25 00:39:24', '2021-05-25 00:39:24', NULL, 1),
(2, '70/70 - 15 M/C 49S TL', '2021-05-25 00:40:16', '2021-05-25 00:40:16', NULL, 2),
(3, '50/50 - 15 M/C 30S TL', '2021-05-26 01:32:40', '2021-05-26 01:32:40', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ratios`
--

CREATE TABLE `ratios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ratio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratios`
--

INSERT INTO `ratios` (`id`, `ratio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 65, '2021-05-05 03:33:01', '2021-05-05 03:33:01', NULL),
(2, 72, '2021-05-22 03:03:00', '2021-05-22 03:03:00', NULL),
(3, 80, '2021-05-22 03:03:06', '2021-05-22 03:03:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `city_id`, `vehicle_type_id`, `shop_name`, `description`, `address`, `latitude`, `longitude`, `active`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Asain Distribution Limited', 'dddd', '7th Floor, House: 105, Road: 2, Block: B, Mohanagar Project', '0', '0', 1, 'Ratan', '2021-07-25 02:38:42', '2021-07-25 05:15:31', '2021-07-25 05:15:31'),
(2, 1, 1, 'Japan Parts Limited', 'safsafsfsfsf', 'Tejgaon Industrial Area, Dhaka, Bangladesh', '23.7657287', '90.4054498', 1, 'Shorifull Islam Ratan', '2021-07-25 03:04:55', '2021-07-25 05:15:40', '2021-07-25 05:15:40'),
(3, 1, 1, 'Asain Distribution Limited', 'fffff', 'Dhaka, Bangladesh', '23.810332', '90.4125181', 1, 'Shorifull Islam', '2021-07-25 03:24:07', '2021-07-25 05:22:03', NULL),
(4, 1, 1, 'Dhaka Univerisy', 'Dhaka University Map Location', 'Dhaka University, Nilkhet Road, Dhaka, Bangladesh', '23.7338448', '90.39287', 1, 'Dhaka University', '2021-07-25 07:17:18', '2021-07-25 07:17:18', NULL),
(5, 1, 1, 'Asain Distribution Limited', 'Dhaka', 'Tejgaon, Dhaka, Bangladesh', '23.759815', '90.39131719999999', 1, 'Ratan Mia', '2021-07-25 08:16:36', '2021-07-25 08:16:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, '2021-05-05 03:31:54', '2021-05-05 03:34:01', NULL),
(2, 17, '2021-05-22 03:03:16', '2021-05-22 03:03:16', NULL),
(3, 20, '2021-05-22 03:03:23', '2021-05-22 03:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `you_tube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumblr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flickr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reddit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `linked_in`, `google_plus`, `pinterest`, `you_tube`, `instagram`, `tumblr`, `flickr`, `reddit`, `snapchat`, `whats_app`, `quora`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '2021-05-05 02:17:21', '2021-05-05 02:17:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transmissions`
--

CREATE TABLE `transmissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyres`
--

CREATE TABLE `tyres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `features` longtext COLLATE utf8mb4_unicode_ci,
  `specifications` longtext COLLATE utf8mb4_unicode_ci,
  `warranty` longtext COLLATE utf8mb4_unicode_ci,
  `video` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `width_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ratio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `published` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tyres`
--

INSERT INTO `tyres` (`id`, `title`, `short_description`, `long_description`, `features`, `specifications`, `warranty`, `video`, `created_at`, `updated_at`, `deleted_at`, `width_id`, `ratio_id`, `size_id`, `published`) VALUES
(1, 'Cinturato `P1 `varde', '<h2><strong>Ideal for urban mobility</strong></h2><p>&nbsp;</p><p>Elegant and distinctive, <strong>CINTURATO P1™ Verde</strong> is the premium solution to <strong>urban mobility</strong>. <strong>CINTURATO P1™ Verde</strong> has been created to take full advantage of latest materials, structures and tread pattern design in order to <strong>guarantee savings, respect for the environment</strong>, comfort and safety on all road surfaces.</p>', '<h2><strong>Ideal for urban mobility</strong></h2><p>&nbsp;</p><p>Elegant and distinctive, <strong>CINTURATO P1™ Verde</strong> is the premium solution to <strong>urban mobility</strong>. <strong>CINTURATO P1™ Verde</strong> has been created to take full advantage of latest materials, structures and tread pattern design in order to <strong>guarantee savings, respect for the environment</strong>, comfort and safety on all road surfaces.</p>', NULL, NULL, NULL, NULL, '2021-05-05 03:39:18', '2021-05-06 00:01:11', '2021-05-06 00:01:11', 1, 1, 1, 1),
(2, 'Sample Tyre', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:01:46', '2021-05-06 00:21:06', '2021-05-06 00:21:06', 1, 1, 1, 1),
(3, 'Sample Tyre', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:03:34', '2021-05-06 00:07:12', '2021-05-06 00:07:12', 1, 1, 1, 1),
(4, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:21:27', '2021-05-06 00:27:59', '2021-05-06 00:27:59', 1, 1, 1, 1),
(5, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:25:28', '2021-05-06 00:28:02', '2021-05-06 00:28:02', 1, 1, 1, 1),
(6, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:26:45', '2021-05-06 00:28:05', '2021-05-06 00:28:05', 1, 1, 1, 1),
(7, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:27:13', '2021-05-06 00:28:09', '2021-05-06 00:28:09', 1, 1, 1, 1),
(8, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:28:25', '2021-05-06 00:33:56', '2021-05-06 00:33:56', 1, 1, 1, 1),
(9, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:39:26', '2021-05-06 00:55:21', '2021-05-06 00:55:21', 1, 1, 1, 1),
(10, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:40:27', '2021-05-06 00:55:24', '2021-05-06 00:55:24', 1, 1, 1, 1),
(11, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:55:14', '2021-05-06 00:55:28', '2021-05-06 00:55:28', 1, 1, 1, 1),
(12, 'Sales Phone', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06 00:55:50', '2021-05-06 00:56:28', '2021-05-06 00:56:28', 1, 1, 1, 1),
(13, 'Sales Phone', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=CsjCMrg0anU', '2021-05-06 00:56:44', '2021-05-30 04:38:02', NULL, 1, 1, 1, 1),
(14, 'Sales Phone', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=CsjCMrg0anU', '2021-05-06 00:56:44', '2021-05-30 04:37:52', NULL, 1, 3, 3, 1),
(15, 'Sales Phone', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=CsjCMrg0anU', '2021-05-06 00:56:44', '2021-05-30 04:37:42', NULL, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$G0P4RtkCw9zoTeVj34JhX.yS5CNMSBqM5LNEe6oWTj6Vk8FF.Yc7W', 'JjfMS7eG1A5M0r1fNsjcNrzPP3modMPUfDVaqL2BG74fhAeaPGFKSvLgfG05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Car', 'car', '2021-05-24 23:34:28', '2021-05-24 23:34:28', NULL),
(2, 'Moto', 'moto', '2021-05-24 23:34:57', '2021-05-24 23:34:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warranty_claims`
--

CREATE TABLE `warranty_claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_name_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widths`
--

CREATE TABLE `widths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widths`
--

INSERT INTO `widths` (`id`, `width`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 175, '2021-05-05 03:33:44', '2021-05-05 03:33:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2020, '2021-05-04 23:12:06', '2021-05-04 23:12:06', NULL),
(2, 2022, '2021-05-04 23:12:13', '2021-05-04 23:12:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bodies`
--
ALTER TABLE `bodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_unique` (`brand`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_fk_3766994` (`brand_id`);

--
-- Indexes for table `car_registrations`
--
ALTER TABLE `car_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_fk_3773438` (`city_id`),
  ADD KEY `product_name_fk_3773444` (`product_name_id`),
  ADD KEY `product_size_fk_3773445` (`product_size_id`),
  ADD KEY `retailer_fk_3773449` (`retailer_id`);

--
-- Indexes for table `car_sliders`
--
ALTER TABLE `car_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_moto_tyre`
--
ALTER TABLE `category_moto_tyre`
  ADD KEY `moto_tyre_id_fk_3950966` (`moto_tyre_id`),
  ADD KEY `category_id_fk_3950966` (`category_id`);

--
-- Indexes for table `category_tyre`
--
ALTER TABLE `category_tyre`
  ADD KEY `tyre_id_fk_3767019` (`tyre_id`),
  ADD KEY `category_id_fk_3767019` (`category_id`);

--
-- Indexes for table `chassis`
--
ALTER TABLE `chassis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_category_fk_3767047` (`faq_category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_combinations`
--
ALTER TABLE `model_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_fk_3837292` (`brand_id`),
  ADD KEY `car_model_fk_3837293` (`car_model_id`),
  ADD KEY `engine_fk_3837295` (`engine_id`),
  ADD KEY `chassis_fk_3837296` (`chassis_id`);

--
-- Indexes for table `model_combination_tyre`
--
ALTER TABLE `model_combination_tyre`
  ADD KEY `tyre_id_fk_3837270` (`tyre_id`),
  ADD KEY `model_combination_id_fk_3837270` (`model_combination_id`);

--
-- Indexes for table `model_combination_year`
--
ALTER TABLE `model_combination_year`
  ADD KEY `model_combination_id_fk_3837294` (`model_combination_id`),
  ADD KEY `year_id_fk_3837294` (`year_id`);

--
-- Indexes for table `moto_brands`
--
ALTER TABLE `moto_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moto_brands_brand_unique` (`brand`);

--
-- Indexes for table `moto_engines`
--
ALTER TABLE `moto_engines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moto_models`
--
ALTER TABLE `moto_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moto_brand_fk_3950776` (`moto_brand_id`);

--
-- Indexes for table `moto_ratios`
--
ALTER TABLE `moto_ratios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moto_registrations`
--
ALTER TABLE `moto_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_fk_3773417` (`city_id`),
  ADD KEY `product_name_fk_3773423` (`product_name_id`),
  ADD KEY `product_size_fk_3773424` (`product_size_id`),
  ADD KEY `retailer_fk_3773428` (`retailer_id`);

--
-- Indexes for table `moto_sizes`
--
ALTER TABLE `moto_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moto_sliders`
--
ALTER TABLE `moto_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moto_tyres`
--
ALTER TABLE `moto_tyres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moto_brand_fk_3950960` (`moto_brand_id`),
  ADD KEY `moto_model_fk_3950961` (`moto_model_id`),
  ADD KEY `moto_engine_fk_3950962` (`moto_engine_id`),
  ADD KEY `moto_width_fk_3950963` (`moto_width_id`),
  ADD KEY `moto_size_fk_3950964` (`moto_size_id`),
  ADD KEY `moto_ratio_fk_3950965` (`moto_ratio_id`);

--
-- Indexes for table `moto_widths`
--
ALTER TABLE `moto_widths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_menus`
--
ALTER TABLE `other_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_menus`
--
ALTER TABLE `page_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_menus_order_unique` (`order`),
  ADD KEY `page_fk_3774011` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_old`
--
ALTER TABLE `permissions_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_3766939` (`role_id`),
  ADD KEY `permission_id_fk_3766939` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_type_fk_3767059` (`vehicle_type_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk_3767065` (`product_id`);

--
-- Indexes for table `ratios`
--
ALTER TABLE `ratios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `retailers_name_unique` (`name`),
  ADD KEY `city_fk_3767077` (`city_id`),
  ADD KEY `vehicle_type_fk_3767075` (`vehicle_type_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_3766948` (`user_id`),
  ADD KEY `role_id_fk_3766948` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyres`
--
ALTER TABLE `tyres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `width_fk_3767025` (`width_id`),
  ADD KEY `ratio_fk_3767026` (`ratio_id`),
  ADD KEY `size_fk_3767027` (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_types_name_unique` (`name`),
  ADD UNIQUE KEY `vehicle_types_slug_unique` (`slug`);

--
-- Indexes for table `warranty_claims`
--
ALTER TABLE `warranty_claims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_name_fk_3767124` (`product_name_id`),
  ADD KEY `product_size_fk_3767125` (`product_size_id`),
  ADD KEY `retailer_fk_3767127` (`retailer_id`);

--
-- Indexes for table `widths`
--
ALTER TABLE `widths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_tokens`
--
ALTER TABLE `api_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bodies`
--
ALTER TABLE `bodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_registrations`
--
ALTER TABLE `car_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_sliders`
--
ALTER TABLE `car_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chassis`
--
ALTER TABLE `chassis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `model_combinations`
--
ALTER TABLE `model_combinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `moto_brands`
--
ALTER TABLE `moto_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `moto_engines`
--
ALTER TABLE `moto_engines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moto_models`
--
ALTER TABLE `moto_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `moto_ratios`
--
ALTER TABLE `moto_ratios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moto_registrations`
--
ALTER TABLE `moto_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `moto_sizes`
--
ALTER TABLE `moto_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moto_sliders`
--
ALTER TABLE `moto_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `moto_tyres`
--
ALTER TABLE `moto_tyres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moto_widths`
--
ALTER TABLE `moto_widths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_menus`
--
ALTER TABLE `other_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_menus`
--
ALTER TABLE `page_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `permissions_old`
--
ALTER TABLE `permissions_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratios`
--
ALTER TABLE `ratios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyres`
--
ALTER TABLE `tyres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warranty_claims`
--
ALTER TABLE `warranty_claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widths`
--
ALTER TABLE `widths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `brand_fk_3766994` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `car_registrations`
--
ALTER TABLE `car_registrations`
  ADD CONSTRAINT `city_fk_3773438` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `product_name_fk_3773444` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_fk_3773445` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  ADD CONSTRAINT `retailer_fk_3773449` FOREIGN KEY (`retailer_id`) REFERENCES `retailers_old` (`id`);

--
-- Constraints for table `category_moto_tyre`
--
ALTER TABLE `category_moto_tyre`
  ADD CONSTRAINT `category_id_fk_3950966` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `moto_tyre_id_fk_3950966` FOREIGN KEY (`moto_tyre_id`) REFERENCES `moto_tyres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_tyre`
--
ALTER TABLE `category_tyre`
  ADD CONSTRAINT `category_id_fk_3767019` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tyre_id_fk_3767019` FOREIGN KEY (`tyre_id`) REFERENCES `tyres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faq_category_fk_3767047` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `model_combinations`
--
ALTER TABLE `model_combinations`
  ADD CONSTRAINT `brand_fk_3837292` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `car_model_fk_3837293` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`),
  ADD CONSTRAINT `chassis_fk_3837296` FOREIGN KEY (`chassis_id`) REFERENCES `chassis` (`id`),
  ADD CONSTRAINT `engine_fk_3837295` FOREIGN KEY (`engine_id`) REFERENCES `engines` (`id`);

--
-- Constraints for table `model_combination_tyre`
--
ALTER TABLE `model_combination_tyre`
  ADD CONSTRAINT `model_combination_id_fk_3837270` FOREIGN KEY (`model_combination_id`) REFERENCES `model_combinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tyre_id_fk_3837270` FOREIGN KEY (`tyre_id`) REFERENCES `tyres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_combination_year`
--
ALTER TABLE `model_combination_year`
  ADD CONSTRAINT `model_combination_id_fk_3837294` FOREIGN KEY (`model_combination_id`) REFERENCES `model_combinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `year_id_fk_3837294` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `moto_models`
--
ALTER TABLE `moto_models`
  ADD CONSTRAINT `moto_brand_fk_3950776` FOREIGN KEY (`moto_brand_id`) REFERENCES `moto_brands` (`id`);

--
-- Constraints for table `moto_registrations`
--
ALTER TABLE `moto_registrations`
  ADD CONSTRAINT `city_fk_3773417` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `product_name_fk_3773423` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_fk_3773424` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  ADD CONSTRAINT `retailer_fk_3773428` FOREIGN KEY (`retailer_id`) REFERENCES `retailers_old` (`id`);

--
-- Constraints for table `moto_tyres`
--
ALTER TABLE `moto_tyres`
  ADD CONSTRAINT `moto_brand_fk_3950960` FOREIGN KEY (`moto_brand_id`) REFERENCES `moto_brands` (`id`),
  ADD CONSTRAINT `moto_engine_fk_3950962` FOREIGN KEY (`moto_engine_id`) REFERENCES `moto_engines` (`id`),
  ADD CONSTRAINT `moto_model_fk_3950961` FOREIGN KEY (`moto_model_id`) REFERENCES `moto_models` (`id`),
  ADD CONSTRAINT `moto_ratio_fk_3950965` FOREIGN KEY (`moto_ratio_id`) REFERENCES `moto_ratios` (`id`),
  ADD CONSTRAINT `moto_size_fk_3950964` FOREIGN KEY (`moto_size_id`) REFERENCES `moto_sizes` (`id`),
  ADD CONSTRAINT `moto_width_fk_3950963` FOREIGN KEY (`moto_width_id`) REFERENCES `moto_widths` (`id`);

--
-- Constraints for table `page_menus`
--
ALTER TABLE `page_menus`
  ADD CONSTRAINT `page_fk_3774011` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_3766939` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_3766939` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `vehicle_type_fk_3767059` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_fk_3767065` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `retailers`
--
ALTER TABLE `retailers`
  ADD CONSTRAINT `city_fk_3767077` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `vehicle_type_fk_3767075` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_3766948` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_3766948` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tyres`
--
ALTER TABLE `tyres`
  ADD CONSTRAINT `ratio_fk_3767026` FOREIGN KEY (`ratio_id`) REFERENCES `ratios` (`id`),
  ADD CONSTRAINT `size_fk_3767027` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `width_fk_3767025` FOREIGN KEY (`width_id`) REFERENCES `widths` (`id`);

--
-- Constraints for table `warranty_claims`
--
ALTER TABLE `warranty_claims`
  ADD CONSTRAINT `product_name_fk_3767124` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_fk_3767125` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  ADD CONSTRAINT `retailer_fk_3767127` FOREIGN KEY (`retailer_id`) REFERENCES `retailers_old` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
