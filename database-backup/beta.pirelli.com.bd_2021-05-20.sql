# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: beta.pirelli.com.bd
# Generation Time: 2021-05-20 13:00:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bodies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bodies`;

CREATE TABLE `bodies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_brand_unique` (`brand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `brand`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Toyota','2021-05-05 05:13:33','2021-05-05 05:13:33',NULL),
	(2,'Honda','2021-05-05 05:13:38','2021-05-05 05:13:38',NULL);

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table car_models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_models`;

CREATE TABLE `car_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_fk_3766994` (`brand_id`),
  CONSTRAINT `brand_fk_3766994` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `car_models` WRITE;
/*!40000 ALTER TABLE `car_models` DISABLE KEYS */;

INSERT INTO `car_models` (`id`, `model`, `created_at`, `updated_at`, `deleted_at`, `brand_id`)
VALUES
	(1,'Allion','2021-05-05 05:35:59','2021-05-05 05:35:59',NULL,1),
	(2,'Axio','2021-05-05 09:34:57','2021-05-05 09:34:57',NULL,1),
	(3,'Aqua','2021-05-05 09:35:08','2021-05-05 09:35:08',NULL,1),
	(4,'Fielder','2021-05-05 09:35:21','2021-05-05 09:35:37',NULL,1);

/*!40000 ALTER TABLE `car_models` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table car_registrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_registrations`;

CREATE TABLE `car_registrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `city_id` bigint(20) unsigned NOT NULL,
  `product_name_id` bigint(20) unsigned NOT NULL,
  `product_size_id` bigint(20) unsigned NOT NULL,
  `retailer_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_fk_3773438` (`city_id`),
  KEY `product_name_fk_3773444` (`product_name_id`),
  KEY `product_size_fk_3773445` (`product_size_id`),
  KEY `retailer_fk_3773449` (`retailer_id`),
  CONSTRAINT `city_fk_3773438` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `product_name_fk_3773444` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_size_fk_3773445` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  CONSTRAINT `retailer_fk_3773449` FOREIGN KEY (`retailer_id`) REFERENCES `retailers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table car_sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_sliders`;

CREATE TABLE `car_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `button_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'car','2021-05-05 09:30:27','2021-05-05 09:30:27',NULL),
	(2,'moto','2021-05-19 09:05:16','2021-05-19 09:05:16',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_moto_tyre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_moto_tyre`;

CREATE TABLE `category_moto_tyre` (
  `moto_tyre_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  KEY `moto_tyre_id_fk_3950966` (`moto_tyre_id`),
  KEY `category_id_fk_3950966` (`category_id`),
  CONSTRAINT `category_id_fk_3950966` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `moto_tyre_id_fk_3950966` FOREIGN KEY (`moto_tyre_id`) REFERENCES `moto_tyres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table category_tyre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_tyre`;

CREATE TABLE `category_tyre` (
  `tyre_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  KEY `tyre_id_fk_3767019` (`tyre_id`),
  KEY `category_id_fk_3767019` (`category_id`),
  CONSTRAINT `category_id_fk_3767019` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tyre_id_fk_3767019` FOREIGN KEY (`tyre_id`) REFERENCES `tyres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_tyre` WRITE;
/*!40000 ALTER TABLE `category_tyre` DISABLE KEYS */;

INSERT INTO `category_tyre` (`tyre_id`, `category_id`)
VALUES
	(1,1),
	(7,1),
	(8,1),
	(11,1),
	(12,1),
	(13,1);

/*!40000 ALTER TABLE `category_tyre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chassis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chassis`;

CREATE TABLE `chassis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `chassis` WRITE;
/*!40000 ALTER TABLE `chassis` DISABLE KEYS */;

INSERT INTO `chassis` (`id`, `chassis`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'RM1 (CR-V 2011-2016)','2021-05-05 05:34:09','2021-05-05 05:34:09',NULL),
	(2,'RU3 (Vezel HV 2013-)','2021-05-05 05:35:10','2021-05-05 05:35:10',NULL);

/*!40000 ALTER TABLE `chassis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cities_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_address` longtext COLLATE utf8mb4_unicode_ci,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_fax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map_i_frame` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table emails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `emails`;

CREATE TABLE `emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table engines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `engines`;

CREATE TABLE `engines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `engines` WRITE;
/*!40000 ALTER TABLE `engines` DISABLE KEYS */;

INSERT INTO `engines` (`id`, `engine`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'2000cc','2021-05-05 05:13:57','2021-05-05 05:13:57',NULL),
	(2,'1500cc','2021-05-05 05:14:11','2021-05-05 05:14:11',NULL);

/*!40000 ALTER TABLE `engines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faq_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq_categories`;

CREATE TABLE `faq_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table faqs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `faq_category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_category_fk_3767047` (`faq_category_id`),
  CONSTRAINT `faq_category_fk_3767047` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table footers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `footers`;

CREATE TABLE `footers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `footer_about_us` longtext COLLATE utf8mb4_unicode_ci,
  `footer_copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table fuels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fuels`;

CREATE TABLE `fuels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table headers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `headers`;

CREATE TABLE `headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`)
VALUES
	(2,'App\\Models\\Tyre',13,'01c5da72-b2c1-447b-a8d4-860de95c3210','thumbnail','60a48d5b4f62b_tyre_thumb','60a48d5b4f62b_tyre_thumb.png','image/png','public','public',297375,X'5B5D',X'7B2267656E6572617465645F636F6E76657273696F6E73223A207B227468756D62223A20747275652C202270726576696577223A20747275657D7D',X'5B5D',1,'2021-05-19 04:00:29','2021-05-19 04:00:29');

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_100000_create_password_resets_table',1),
	(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(3,'2021_05_05_000001_create_media_table',1),
	(4,'2021_05_05_000002_create_model_combinations_table',1),
	(5,'2021_05_05_000003_create_moto_sliders_table',1),
	(6,'2021_05_05_000004_create_faqs_table',1),
	(7,'2021_05_05_000005_create_permissions_table',1),
	(8,'2021_05_05_000006_create_products_table',1),
	(9,'2021_05_05_000007_create_product_sizes_table',1),
	(10,'2021_05_05_000008_create_cities_table',1),
	(11,'2021_05_05_000009_create_retailers_table',1),
	(12,'2021_05_05_000010_create_socials_table',1),
	(13,'2021_05_05_000011_create_car_sliders_table',1),
	(14,'2021_05_05_000012_create_warranty_claims_table',1),
	(15,'2021_05_05_000013_create_other_menus_table',1),
	(16,'2021_05_05_000014_create_faq_categories_table',1),
	(17,'2021_05_05_000015_create_car_registrations_table',1),
	(18,'2021_05_05_000016_create_headers_table',1),
	(19,'2021_05_05_000017_create_contacts_table',1),
	(20,'2021_05_05_000018_create_footers_table',1),
	(21,'2021_05_05_000019_create_emails_table',1),
	(22,'2021_05_05_000020_create_pages_table',1),
	(23,'2021_05_05_000021_create_page_menus_table',1),
	(24,'2021_05_05_000022_create_moto_registrations_table',1),
	(25,'2021_05_05_000023_create_vehicle_types_table',1),
	(26,'2021_05_05_000024_create_fuels_table',1),
	(27,'2021_05_05_000025_create_bodies_table',1),
	(28,'2021_05_05_000026_create_transmissions_table',1),
	(29,'2021_05_05_000027_create_brands_table',1),
	(30,'2021_05_05_000028_create_engines_table',1),
	(31,'2021_05_05_000029_create_chassis_table',1),
	(32,'2021_05_05_000030_create_years_table',1),
	(33,'2021_05_05_000031_create_categories_table',1),
	(34,'2021_05_05_000032_create_car_models_table',1),
	(35,'2021_05_05_000033_create_users_table',1),
	(36,'2021_05_05_000034_create_sizes_table',1),
	(37,'2021_05_05_000035_create_ratios_table',1),
	(38,'2021_05_05_000036_create_widths_table',1),
	(39,'2021_05_05_000037_create_roles_table',1),
	(40,'2021_05_05_000038_create_tyres_table',1),
	(41,'2021_05_05_000039_create_permission_role_pivot_table',1),
	(42,'2021_05_05_000040_create_category_tyre_pivot_table',1),
	(43,'2021_05_05_000041_create_role_user_pivot_table',1),
	(44,'2021_05_05_000042_create_model_combination_tyre_pivot_table',1),
	(45,'2021_05_05_000043_create_model_combination_year_pivot_table',1),
	(46,'2021_05_05_000044_add_relationship_fields_to_page_menus_table',1),
	(47,'2021_05_05_000045_add_relationship_fields_to_tyres_table',1),
	(48,'2021_05_05_000046_add_relationship_fields_to_warranty_claims_table',1),
	(49,'2021_05_05_000047_add_relationship_fields_to_car_registrations_table',1),
	(50,'2021_05_05_000048_add_relationship_fields_to_moto_registrations_table',1),
	(51,'2021_05_05_000049_add_relationship_fields_to_car_models_table',1),
	(52,'2021_05_05_000050_add_relationship_fields_to_retailers_table',1),
	(53,'2021_05_05_000051_add_relationship_fields_to_product_sizes_table',1),
	(54,'2021_05_05_000052_add_relationship_fields_to_products_table',1),
	(55,'2021_05_05_000053_add_relationship_fields_to_faqs_table',1),
	(56,'2021_05_05_000054_add_relationship_fields_to_model_combinations_table',1),
	(57,'2021_05_20_000019_create_moto_brands_table',2),
	(58,'2021_05_20_000020_create_moto_models_table',2),
	(59,'2021_05_20_000021_create_moto_engines_table',2),
	(60,'2021_05_20_000022_create_moto_widths_table',2),
	(61,'2021_05_20_000023_create_moto_sizes_table',2),
	(62,'2021_05_20_000024_create_moto_ratios_table',2),
	(63,'2021_05_20_000025_create_moto_tyres_table',2),
	(64,'2021_05_20_000047_create_category_moto_tyre_pivot_table',2),
	(65,'2021_05_20_000054_add_relationship_fields_to_moto_models_table',3),
	(66,'2021_05_20_000064_add_relationship_fields_to_moto_tyres_table',4);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_combination_tyre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_combination_tyre`;

CREATE TABLE `model_combination_tyre` (
  `tyre_id` bigint(20) unsigned NOT NULL,
  `model_combination_id` bigint(20) unsigned NOT NULL,
  KEY `tyre_id_fk_3837270` (`tyre_id`),
  KEY `model_combination_id_fk_3837270` (`model_combination_id`),
  CONSTRAINT `model_combination_id_fk_3837270` FOREIGN KEY (`model_combination_id`) REFERENCES `model_combinations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tyre_id_fk_3837270` FOREIGN KEY (`tyre_id`) REFERENCES `tyres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_combination_tyre` WRITE;
/*!40000 ALTER TABLE `model_combination_tyre` DISABLE KEYS */;

INSERT INTO `model_combination_tyre` (`tyre_id`, `model_combination_id`)
VALUES
	(7,5),
	(8,5),
	(11,5),
	(12,5),
	(14,5),
	(13,5),
	(15,5);

/*!40000 ALTER TABLE `model_combination_tyre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_combination_year
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_combination_year`;

CREATE TABLE `model_combination_year` (
  `model_combination_id` bigint(20) unsigned NOT NULL,
  `year_id` bigint(20) unsigned NOT NULL,
  KEY `model_combination_id_fk_3837294` (`model_combination_id`),
  KEY `year_id_fk_3837294` (`year_id`),
  CONSTRAINT `model_combination_id_fk_3837294` FOREIGN KEY (`model_combination_id`) REFERENCES `model_combinations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `year_id_fk_3837294` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_combination_year` WRITE;
/*!40000 ALTER TABLE `model_combination_year` DISABLE KEYS */;

INSERT INTO `model_combination_year` (`model_combination_id`, `year_id`)
VALUES
	(5,1),
	(5,2),
	(6,2);

/*!40000 ALTER TABLE `model_combination_year` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_combinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_combinations`;

CREATE TABLE `model_combinations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) unsigned NOT NULL,
  `car_model_id` bigint(20) unsigned DEFAULT NULL,
  `engine_id` bigint(20) unsigned NOT NULL,
  `chassis_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_fk_3837292` (`brand_id`),
  KEY `car_model_fk_3837293` (`car_model_id`),
  KEY `engine_fk_3837295` (`engine_id`),
  KEY `chassis_fk_3837296` (`chassis_id`),
  CONSTRAINT `brand_fk_3837292` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `car_model_fk_3837293` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`),
  CONSTRAINT `chassis_fk_3837296` FOREIGN KEY (`chassis_id`) REFERENCES `chassis` (`id`),
  CONSTRAINT `engine_fk_3837295` FOREIGN KEY (`engine_id`) REFERENCES `engines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_combinations` WRITE;
/*!40000 ALTER TABLE `model_combinations` DISABLE KEYS */;

INSERT INTO `model_combinations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `brand_id`, `car_model_id`, `engine_id`, `chassis_id`)
VALUES
	(5,'Toyota : Allion : 2000cc : RM1 (CR-V 2011-2016)','2021-05-06 06:04:04','2021-05-06 15:09:14',NULL,1,1,2,1),
	(6,'Toyota : Aqua : 1500cc : RU3 (Vezel HV 2013-)','2021-05-06 06:56:17','2021-05-06 09:21:04',NULL,1,3,2,2);

/*!40000 ALTER TABLE `model_combinations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_brands`;

CREATE TABLE `moto_brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moto_brands_brand_unique` (`brand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_brands` WRITE;
/*!40000 ALTER TABLE `moto_brands` DISABLE KEYS */;

INSERT INTO `moto_brands` (`id`, `brand`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Kawasaki','2021-05-20 12:05:55','2021-05-20 12:05:55',NULL);

/*!40000 ALTER TABLE `moto_brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_engines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_engines`;

CREATE TABLE `moto_engines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_engines` WRITE;
/*!40000 ALTER TABLE `moto_engines` DISABLE KEYS */;

INSERT INTO `moto_engines` (`id`, `engine`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'150cc','2021-05-20 12:13:21','2021-05-20 12:13:21',NULL);

/*!40000 ALTER TABLE `moto_engines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_models`;

CREATE TABLE `moto_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `moto_brand_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `moto_brand_fk_3950776` (`moto_brand_id`),
  CONSTRAINT `moto_brand_fk_3950776` FOREIGN KEY (`moto_brand_id`) REFERENCES `moto_brands` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_models` WRITE;
/*!40000 ALTER TABLE `moto_models` DISABLE KEYS */;

INSERT INTO `moto_models` (`id`, `model`, `created_at`, `updated_at`, `deleted_at`, `moto_brand_id`)
VALUES
	(1,'Ninja 125','2021-05-20 12:06:10','2021-05-20 12:06:10',NULL,1);

/*!40000 ALTER TABLE `moto_models` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_ratios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_ratios`;

CREATE TABLE `moto_ratios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ratio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_ratios` WRITE;
/*!40000 ALTER TABLE `moto_ratios` DISABLE KEYS */;

INSERT INTO `moto_ratios` (`id`, `ratio`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,12,'2021-05-20 12:13:04','2021-05-20 12:13:04',NULL);

/*!40000 ALTER TABLE `moto_ratios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_registrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_registrations`;

CREATE TABLE `moto_registrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `city_id` bigint(20) unsigned NOT NULL,
  `product_name_id` bigint(20) unsigned NOT NULL,
  `product_size_id` bigint(20) unsigned NOT NULL,
  `retailer_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_fk_3773417` (`city_id`),
  KEY `product_name_fk_3773423` (`product_name_id`),
  KEY `product_size_fk_3773424` (`product_size_id`),
  KEY `retailer_fk_3773428` (`retailer_id`),
  CONSTRAINT `city_fk_3773417` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `product_name_fk_3773423` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_size_fk_3773424` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  CONSTRAINT `retailer_fk_3773428` FOREIGN KEY (`retailer_id`) REFERENCES `retailers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table moto_sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_sizes`;

CREATE TABLE `moto_sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_sizes` WRITE;
/*!40000 ALTER TABLE `moto_sizes` DISABLE KEYS */;

INSERT INTO `moto_sizes` (`id`, `size`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,15,'2021-05-20 12:12:56','2021-05-20 12:12:56',NULL);

/*!40000 ALTER TABLE `moto_sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_sliders`;

CREATE TABLE `moto_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `button_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table moto_tyres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_tyres`;

CREATE TABLE `moto_tyres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `moto_brand_id` bigint(20) unsigned NOT NULL,
  `moto_model_id` bigint(20) unsigned NOT NULL,
  `moto_engine_id` bigint(20) unsigned NOT NULL,
  `moto_width_id` bigint(20) unsigned DEFAULT NULL,
  `moto_size_id` bigint(20) unsigned DEFAULT NULL,
  `moto_ratio_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `moto_brand_fk_3950960` (`moto_brand_id`),
  KEY `moto_model_fk_3950961` (`moto_model_id`),
  KEY `moto_engine_fk_3950962` (`moto_engine_id`),
  KEY `moto_width_fk_3950963` (`moto_width_id`),
  KEY `moto_size_fk_3950964` (`moto_size_id`),
  KEY `moto_ratio_fk_3950965` (`moto_ratio_id`),
  CONSTRAINT `moto_brand_fk_3950960` FOREIGN KEY (`moto_brand_id`) REFERENCES `moto_brands` (`id`),
  CONSTRAINT `moto_engine_fk_3950962` FOREIGN KEY (`moto_engine_id`) REFERENCES `moto_engines` (`id`),
  CONSTRAINT `moto_model_fk_3950961` FOREIGN KEY (`moto_model_id`) REFERENCES `moto_models` (`id`),
  CONSTRAINT `moto_ratio_fk_3950965` FOREIGN KEY (`moto_ratio_id`) REFERENCES `moto_ratios` (`id`),
  CONSTRAINT `moto_size_fk_3950964` FOREIGN KEY (`moto_size_id`) REFERENCES `moto_sizes` (`id`),
  CONSTRAINT `moto_width_fk_3950963` FOREIGN KEY (`moto_width_id`) REFERENCES `moto_widths` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_tyres` WRITE;
/*!40000 ALTER TABLE `moto_tyres` DISABLE KEYS */;

INSERT INTO `moto_tyres` (`id`, `title`, `short_description`, `long_description`, `features`, `specifications`, `warranty`, `video`, `created_at`, `updated_at`, `deleted_at`, `moto_brand_id`, `moto_model_id`, `moto_engine_id`, `moto_width_id`, `moto_size_id`, `moto_ratio_id`)
VALUES
	(1,'Pirelli  Tyre',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-20 12:14:10','2021-05-20 12:16:15',NULL,1,1,1,1,1,1);

/*!40000 ALTER TABLE `moto_tyres` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moto_widths
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moto_widths`;

CREATE TABLE `moto_widths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moto_widths` WRITE;
/*!40000 ALTER TABLE `moto_widths` DISABLE KEYS */;

INSERT INTO `moto_widths` (`id`, `width`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,22,'2021-05-20 12:13:11','2021-05-20 12:13:11',NULL);

/*!40000 ALTER TABLE `moto_widths` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table other_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `other_menus`;

CREATE TABLE `other_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table page_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page_menus`;

CREATE TABLE `page_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_menus_order_unique` (`order`),
  KEY `page_fk_3774011` (`page_id`),
  CONSTRAINT `page_fk_3774011` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  KEY `role_id_fk_3766939` (`role_id`),
  KEY `permission_id_fk_3766939` (`permission_id`),
  CONSTRAINT `permission_id_fk_3766939` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_3766939` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`role_id`, `permission_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5),
	(1,6),
	(1,7),
	(1,8),
	(1,9),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(1,17),
	(1,18),
	(1,19),
	(1,20),
	(1,21),
	(1,22),
	(1,23),
	(1,24),
	(1,25),
	(1,26),
	(1,27),
	(1,28),
	(1,29),
	(1,30),
	(1,31),
	(1,32),
	(1,33),
	(1,34),
	(1,35),
	(1,36),
	(1,37),
	(1,38),
	(1,39),
	(1,40),
	(1,41),
	(1,42),
	(1,43),
	(1,44),
	(1,45),
	(1,46),
	(1,47),
	(1,48),
	(1,49),
	(1,50),
	(1,51),
	(1,52),
	(1,53),
	(1,54),
	(1,55),
	(1,56),
	(1,57),
	(1,58),
	(1,59),
	(1,60),
	(1,61),
	(1,62),
	(1,63),
	(1,64),
	(1,65),
	(1,66),
	(1,67),
	(1,68),
	(1,69),
	(1,70),
	(1,71),
	(1,72),
	(1,73),
	(1,74),
	(1,75),
	(1,76),
	(1,77),
	(1,78),
	(1,79),
	(1,80),
	(1,81),
	(1,82),
	(1,83),
	(1,84),
	(1,85),
	(1,86),
	(1,87),
	(1,88),
	(1,89),
	(1,90),
	(1,91),
	(1,92),
	(1,93),
	(1,94),
	(1,95),
	(1,96),
	(1,97),
	(1,98),
	(1,99),
	(1,100),
	(1,101),
	(1,102),
	(1,103),
	(1,104),
	(1,105),
	(1,106),
	(1,107),
	(1,108),
	(1,109),
	(1,110),
	(1,111),
	(1,112),
	(1,113),
	(1,114),
	(1,115),
	(1,116),
	(1,117),
	(1,118),
	(1,119),
	(1,120),
	(1,121),
	(1,122),
	(1,123),
	(1,124),
	(1,125),
	(1,126),
	(1,127),
	(1,128),
	(1,129),
	(1,130),
	(1,131),
	(1,132),
	(1,133),
	(1,134),
	(1,135),
	(1,136),
	(1,137),
	(1,138),
	(1,139),
	(1,140),
	(1,141),
	(1,142),
	(1,143),
	(1,144),
	(1,145),
	(1,146),
	(1,147),
	(1,148),
	(1,149),
	(1,150),
	(1,151),
	(1,152),
	(1,153),
	(1,154),
	(1,155),
	(1,156),
	(1,157),
	(1,158),
	(1,159),
	(1,160),
	(1,161),
	(1,162),
	(1,163),
	(1,164),
	(1,165),
	(1,166),
	(1,167),
	(1,168),
	(1,169),
	(1,170),
	(1,171),
	(1,172),
	(1,173),
	(1,174),
	(1,175),
	(1,176),
	(1,177),
	(1,178),
	(1,179),
	(1,180),
	(1,181),
	(1,182),
	(1,183),
	(1,184),
	(1,185),
	(1,186),
	(1,187),
	(1,188),
	(1,189),
	(1,190),
	(1,191),
	(1,192),
	(1,193),
	(2,17),
	(2,18),
	(2,19),
	(2,20),
	(2,21),
	(2,22),
	(2,23),
	(2,24),
	(2,25),
	(2,26),
	(2,27),
	(2,28),
	(2,29),
	(2,30),
	(2,31),
	(2,32),
	(2,33),
	(2,34),
	(2,35),
	(2,36),
	(2,37),
	(2,38),
	(2,39),
	(2,40),
	(2,41),
	(2,42),
	(2,43),
	(2,44),
	(2,45),
	(2,46),
	(2,47),
	(2,48),
	(2,49),
	(2,50),
	(2,51),
	(2,52),
	(2,53),
	(2,54),
	(2,55),
	(2,56),
	(2,57),
	(2,58),
	(2,59),
	(2,60),
	(2,61),
	(2,62),
	(2,63),
	(2,64),
	(2,65),
	(2,66),
	(2,67),
	(2,68),
	(2,69),
	(2,70),
	(2,71),
	(2,72),
	(2,73),
	(2,74),
	(2,75),
	(2,76),
	(2,77),
	(2,78),
	(2,79),
	(2,80),
	(2,81),
	(2,82),
	(2,83),
	(2,84),
	(2,85),
	(2,86),
	(2,87),
	(2,88),
	(2,89),
	(2,90),
	(2,91),
	(2,92),
	(2,93),
	(2,94),
	(2,95),
	(2,96),
	(2,97),
	(2,98),
	(2,99),
	(2,100),
	(2,101),
	(2,102),
	(2,103),
	(2,104),
	(2,105),
	(2,106),
	(2,107),
	(2,108),
	(2,109),
	(2,110),
	(2,111),
	(2,112),
	(2,113),
	(2,114),
	(2,115),
	(2,116),
	(2,117),
	(2,118),
	(2,119),
	(2,120),
	(2,121),
	(2,122),
	(2,123),
	(2,124),
	(2,125),
	(2,126),
	(2,127),
	(2,128),
	(2,129),
	(2,130),
	(2,131),
	(2,132),
	(2,133),
	(2,134),
	(2,135),
	(2,136),
	(2,137),
	(2,138),
	(2,139),
	(2,140),
	(2,141),
	(2,142),
	(2,143),
	(2,144),
	(2,145),
	(2,146),
	(2,147),
	(2,148),
	(2,149),
	(2,150),
	(2,151),
	(2,152),
	(2,153),
	(2,154),
	(2,155),
	(2,156),
	(2,157),
	(2,158),
	(2,159),
	(2,160),
	(2,161),
	(2,162),
	(2,163),
	(2,164),
	(2,165),
	(2,166),
	(2,167),
	(2,168),
	(2,169),
	(2,170),
	(2,171),
	(2,172),
	(2,173),
	(2,174),
	(2,175),
	(2,176),
	(2,177),
	(2,178),
	(2,179),
	(2,180),
	(2,181),
	(2,182),
	(2,183),
	(2,184),
	(2,185),
	(2,186),
	(2,187),
	(2,188),
	(2,189),
	(2,190),
	(2,191),
	(2,192),
	(2,193),
	(1,194),
	(1,195),
	(1,196),
	(1,197),
	(1,198),
	(1,199),
	(1,200),
	(1,201),
	(1,202),
	(1,203),
	(1,204),
	(1,205),
	(1,206),
	(1,207),
	(1,208),
	(1,209),
	(1,210),
	(1,211),
	(1,212),
	(1,213),
	(1,214),
	(1,215),
	(1,216),
	(1,217),
	(1,218),
	(1,219),
	(1,220),
	(1,221),
	(1,222),
	(1,223),
	(1,224),
	(1,225),
	(1,226),
	(1,227),
	(1,228),
	(1,229);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'user_management_access',NULL,NULL,NULL),
	(2,'permission_create',NULL,NULL,NULL),
	(3,'permission_edit',NULL,NULL,NULL),
	(4,'permission_show',NULL,NULL,NULL),
	(5,'permission_delete',NULL,NULL,NULL),
	(6,'permission_access',NULL,NULL,NULL),
	(7,'role_create',NULL,NULL,NULL),
	(8,'role_edit',NULL,NULL,NULL),
	(9,'role_show',NULL,NULL,NULL),
	(10,'role_delete',NULL,NULL,NULL),
	(11,'role_access',NULL,NULL,NULL),
	(12,'user_create',NULL,NULL,NULL),
	(13,'user_edit',NULL,NULL,NULL),
	(14,'user_show',NULL,NULL,NULL),
	(15,'user_delete',NULL,NULL,NULL),
	(16,'user_access',NULL,NULL,NULL),
	(17,'vehicle_access',NULL,NULL,NULL),
	(18,'brand_create',NULL,NULL,NULL),
	(19,'brand_edit',NULL,NULL,NULL),
	(20,'brand_show',NULL,NULL,NULL),
	(21,'brand_delete',NULL,NULL,NULL),
	(22,'brand_access',NULL,NULL,NULL),
	(23,'body_create',NULL,NULL,NULL),
	(24,'body_edit',NULL,NULL,NULL),
	(25,'body_show',NULL,NULL,NULL),
	(26,'body_delete',NULL,NULL,NULL),
	(27,'body_access',NULL,NULL,NULL),
	(28,'fuel_create',NULL,NULL,NULL),
	(29,'fuel_edit',NULL,NULL,NULL),
	(30,'fuel_show',NULL,NULL,NULL),
	(31,'fuel_delete',NULL,NULL,NULL),
	(32,'fuel_access',NULL,NULL,NULL),
	(33,'transmission_create',NULL,NULL,NULL),
	(34,'transmission_edit',NULL,NULL,NULL),
	(35,'transmission_show',NULL,NULL,NULL),
	(36,'transmission_delete',NULL,NULL,NULL),
	(37,'transmission_access',NULL,NULL,NULL),
	(38,'engine_create',NULL,NULL,NULL),
	(39,'engine_edit',NULL,NULL,NULL),
	(40,'engine_show',NULL,NULL,NULL),
	(41,'engine_delete',NULL,NULL,NULL),
	(42,'engine_access',NULL,NULL,NULL),
	(43,'chassis_create',NULL,NULL,NULL),
	(44,'chassis_edit',NULL,NULL,NULL),
	(45,'chassis_show',NULL,NULL,NULL),
	(46,'chassis_delete',NULL,NULL,NULL),
	(47,'chassis_access',NULL,NULL,NULL),
	(48,'year_create',NULL,NULL,NULL),
	(49,'year_edit',NULL,NULL,NULL),
	(50,'year_show',NULL,NULL,NULL),
	(51,'year_delete',NULL,NULL,NULL),
	(52,'year_access',NULL,NULL,NULL),
	(53,'category_create',NULL,NULL,NULL),
	(54,'category_edit',NULL,NULL,NULL),
	(55,'category_show',NULL,NULL,NULL),
	(56,'category_delete',NULL,NULL,NULL),
	(57,'category_access',NULL,NULL,NULL),
	(58,'car_model_create',NULL,NULL,NULL),
	(59,'car_model_edit',NULL,NULL,NULL),
	(60,'car_model_show',NULL,NULL,NULL),
	(61,'car_model_delete',NULL,NULL,NULL),
	(62,'car_model_access',NULL,NULL,NULL),
	(63,'size_create',NULL,NULL,NULL),
	(64,'size_edit',NULL,NULL,NULL),
	(65,'size_show',NULL,NULL,NULL),
	(66,'size_delete',NULL,NULL,NULL),
	(67,'size_access',NULL,NULL,NULL),
	(68,'ratio_create',NULL,NULL,NULL),
	(69,'ratio_edit',NULL,NULL,NULL),
	(70,'ratio_show',NULL,NULL,NULL),
	(71,'ratio_delete',NULL,NULL,NULL),
	(72,'ratio_access',NULL,NULL,NULL),
	(73,'width_create',NULL,NULL,NULL),
	(74,'width_edit',NULL,NULL,NULL),
	(75,'width_show',NULL,NULL,NULL),
	(76,'width_delete',NULL,NULL,NULL),
	(77,'width_access',NULL,NULL,NULL),
	(78,'tyre_create',NULL,NULL,NULL),
	(79,'tyre_edit',NULL,NULL,NULL),
	(80,'tyre_show',NULL,NULL,NULL),
	(81,'tyre_delete',NULL,NULL,NULL),
	(82,'tyre_access',NULL,NULL,NULL),
	(83,'faq_section_access',NULL,NULL,NULL),
	(84,'faq_category_create',NULL,NULL,NULL),
	(85,'faq_category_edit',NULL,NULL,NULL),
	(86,'faq_category_show',NULL,NULL,NULL),
	(87,'faq_category_delete',NULL,NULL,NULL),
	(88,'faq_category_access',NULL,NULL,NULL),
	(89,'faq_create',NULL,NULL,NULL),
	(90,'faq_edit',NULL,NULL,NULL),
	(91,'faq_show',NULL,NULL,NULL),
	(92,'faq_delete',NULL,NULL,NULL),
	(93,'faq_access',NULL,NULL,NULL),
	(94,'warranty_access',NULL,NULL,NULL),
	(95,'vehicle_type_create',NULL,NULL,NULL),
	(96,'vehicle_type_edit',NULL,NULL,NULL),
	(97,'vehicle_type_show',NULL,NULL,NULL),
	(98,'vehicle_type_delete',NULL,NULL,NULL),
	(99,'vehicle_type_access',NULL,NULL,NULL),
	(100,'product_create',NULL,NULL,NULL),
	(101,'product_edit',NULL,NULL,NULL),
	(102,'product_show',NULL,NULL,NULL),
	(103,'product_delete',NULL,NULL,NULL),
	(104,'product_access',NULL,NULL,NULL),
	(105,'product_size_create',NULL,NULL,NULL),
	(106,'product_size_edit',NULL,NULL,NULL),
	(107,'product_size_show',NULL,NULL,NULL),
	(108,'product_size_delete',NULL,NULL,NULL),
	(109,'product_size_access',NULL,NULL,NULL),
	(110,'city_create',NULL,NULL,NULL),
	(111,'city_edit',NULL,NULL,NULL),
	(112,'city_show',NULL,NULL,NULL),
	(113,'city_delete',NULL,NULL,NULL),
	(114,'city_access',NULL,NULL,NULL),
	(115,'retailer_create',NULL,NULL,NULL),
	(116,'retailer_edit',NULL,NULL,NULL),
	(117,'retailer_show',NULL,NULL,NULL),
	(118,'retailer_delete',NULL,NULL,NULL),
	(119,'retailer_access',NULL,NULL,NULL),
	(120,'social_create',NULL,NULL,NULL),
	(121,'social_edit',NULL,NULL,NULL),
	(122,'social_show',NULL,NULL,NULL),
	(123,'social_delete',NULL,NULL,NULL),
	(124,'social_access',NULL,NULL,NULL),
	(125,'slider_setting_access',NULL,NULL,NULL),
	(126,'car_slider_create',NULL,NULL,NULL),
	(127,'car_slider_edit',NULL,NULL,NULL),
	(128,'car_slider_show',NULL,NULL,NULL),
	(129,'car_slider_delete',NULL,NULL,NULL),
	(130,'car_slider_access',NULL,NULL,NULL),
	(131,'moto_slider_create',NULL,NULL,NULL),
	(132,'moto_slider_edit',NULL,NULL,NULL),
	(133,'moto_slider_show',NULL,NULL,NULL),
	(134,'moto_slider_delete',NULL,NULL,NULL),
	(135,'moto_slider_access',NULL,NULL,NULL),
	(136,'warranty_claim_create',NULL,NULL,NULL),
	(137,'warranty_claim_edit',NULL,NULL,NULL),
	(138,'warranty_claim_show',NULL,NULL,NULL),
	(139,'warranty_claim_delete',NULL,NULL,NULL),
	(140,'warranty_claim_access',NULL,NULL,NULL),
	(141,'moto_registration_create',NULL,NULL,NULL),
	(142,'moto_registration_edit',NULL,NULL,NULL),
	(143,'moto_registration_show',NULL,NULL,NULL),
	(144,'moto_registration_delete',NULL,NULL,NULL),
	(145,'moto_registration_access',NULL,NULL,NULL),
	(146,'car_registration_create',NULL,NULL,NULL),
	(147,'car_registration_edit',NULL,NULL,NULL),
	(148,'car_registration_show',NULL,NULL,NULL),
	(149,'car_registration_delete',NULL,NULL,NULL),
	(150,'car_registration_access',NULL,NULL,NULL),
	(151,'site_setting_access',NULL,NULL,NULL),
	(152,'header_create',NULL,NULL,NULL),
	(153,'header_edit',NULL,NULL,NULL),
	(154,'header_show',NULL,NULL,NULL),
	(155,'header_delete',NULL,NULL,NULL),
	(156,'header_access',NULL,NULL,NULL),
	(157,'contact_create',NULL,NULL,NULL),
	(158,'contact_edit',NULL,NULL,NULL),
	(159,'contact_show',NULL,NULL,NULL),
	(160,'contact_delete',NULL,NULL,NULL),
	(161,'contact_access',NULL,NULL,NULL),
	(162,'footer_create',NULL,NULL,NULL),
	(163,'footer_edit',NULL,NULL,NULL),
	(164,'footer_show',NULL,NULL,NULL),
	(165,'footer_delete',NULL,NULL,NULL),
	(166,'footer_access',NULL,NULL,NULL),
	(167,'email_create',NULL,NULL,NULL),
	(168,'email_edit',NULL,NULL,NULL),
	(169,'email_show',NULL,NULL,NULL),
	(170,'email_delete',NULL,NULL,NULL),
	(171,'email_access',NULL,NULL,NULL),
	(172,'page_create',NULL,NULL,NULL),
	(173,'page_edit',NULL,NULL,NULL),
	(174,'page_show',NULL,NULL,NULL),
	(175,'page_delete',NULL,NULL,NULL),
	(176,'page_access',NULL,NULL,NULL),
	(177,'menu_setting_access',NULL,NULL,NULL),
	(178,'page_menu_create',NULL,NULL,NULL),
	(179,'page_menu_edit',NULL,NULL,NULL),
	(180,'page_menu_show',NULL,NULL,NULL),
	(181,'page_menu_delete',NULL,NULL,NULL),
	(182,'page_menu_access',NULL,NULL,NULL),
	(183,'other_menu_create',NULL,NULL,NULL),
	(184,'other_menu_edit',NULL,NULL,NULL),
	(185,'other_menu_show',NULL,NULL,NULL),
	(186,'other_menu_delete',NULL,NULL,NULL),
	(187,'other_menu_access',NULL,NULL,NULL),
	(188,'model_combination_create',NULL,NULL,NULL),
	(189,'model_combination_edit',NULL,NULL,NULL),
	(190,'model_combination_show',NULL,NULL,NULL),
	(191,'model_combination_delete',NULL,NULL,NULL),
	(192,'model_combination_access',NULL,NULL,NULL),
	(193,'moto_tyre_section_access',NULL,NULL,NULL),
	(194,'moto_brand_create',NULL,NULL,NULL),
	(195,'moto_brand_edit',NULL,NULL,NULL),
	(196,'moto_brand_show',NULL,NULL,NULL),
	(197,'moto_brand_delete',NULL,NULL,NULL),
	(198,'moto_brand_access',NULL,NULL,NULL),
	(199,'moto_model_create',NULL,NULL,NULL),
	(200,'moto_model_edit',NULL,NULL,NULL),
	(201,'moto_model_show',NULL,NULL,NULL),
	(202,'moto_model_delete',NULL,NULL,NULL),
	(203,'moto_model_access',NULL,NULL,NULL),
	(204,'moto_engine_create',NULL,NULL,NULL),
	(205,'moto_engine_edit',NULL,NULL,NULL),
	(206,'moto_engine_show',NULL,NULL,NULL),
	(207,'moto_engine_delete',NULL,NULL,NULL),
	(208,'moto_engine_access',NULL,NULL,NULL),
	(209,'moto_width_create',NULL,NULL,NULL),
	(210,'moto_width_edit',NULL,NULL,NULL),
	(211,'moto_width_show',NULL,NULL,NULL),
	(212,'moto_width_delete',NULL,NULL,NULL),
	(213,'moto_width_access',NULL,NULL,NULL),
	(214,'moto_size_create',NULL,NULL,NULL),
	(215,'moto_size_edit',NULL,NULL,NULL),
	(216,'moto_size_show',NULL,NULL,NULL),
	(217,'moto_size_delete',NULL,NULL,NULL),
	(218,'moto_size_access',NULL,NULL,NULL),
	(219,'moto_ratio_create',NULL,NULL,NULL),
	(220,'moto_ratio_edit',NULL,NULL,NULL),
	(221,'moto_ratio_show',NULL,NULL,NULL),
	(222,'moto_ratio_delete',NULL,NULL,NULL),
	(223,'moto_ratio_access',NULL,NULL,NULL),
	(224,'moto_tyre_create',NULL,NULL,NULL),
	(225,'moto_tyre_edit',NULL,NULL,NULL),
	(226,'moto_tyre_show',NULL,NULL,NULL),
	(227,'moto_tyre_delete',NULL,NULL,NULL),
	(228,'moto_tyre_access',NULL,NULL,NULL),
	(229,'profile_password_edit',NULL,NULL,NULL);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions_old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions_old`;

CREATE TABLE `permissions_old` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions_old` WRITE;
/*!40000 ALTER TABLE `permissions_old` DISABLE KEYS */;

INSERT INTO `permissions_old` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'user_management_access',NULL,NULL,NULL),
	(2,'permission_create',NULL,NULL,NULL),
	(3,'permission_edit',NULL,NULL,NULL),
	(4,'permission_show',NULL,NULL,NULL),
	(5,'permission_delete',NULL,NULL,NULL),
	(6,'permission_access',NULL,NULL,NULL),
	(7,'role_create',NULL,NULL,NULL),
	(8,'role_edit',NULL,NULL,NULL),
	(9,'role_show',NULL,NULL,NULL),
	(10,'role_delete',NULL,NULL,NULL),
	(11,'role_access',NULL,NULL,NULL),
	(12,'user_create',NULL,NULL,NULL),
	(13,'user_edit',NULL,NULL,NULL),
	(14,'user_show',NULL,NULL,NULL),
	(15,'user_delete',NULL,NULL,NULL),
	(16,'user_access',NULL,NULL,NULL),
	(17,'vehicle_access',NULL,NULL,NULL),
	(18,'brand_create',NULL,NULL,NULL),
	(19,'brand_edit',NULL,NULL,NULL),
	(20,'brand_show',NULL,NULL,NULL),
	(21,'brand_delete',NULL,NULL,NULL),
	(22,'brand_access',NULL,NULL,NULL),
	(23,'body_create',NULL,NULL,NULL),
	(24,'body_edit',NULL,NULL,NULL),
	(25,'body_show',NULL,NULL,NULL),
	(26,'body_delete',NULL,NULL,NULL),
	(27,'body_access',NULL,NULL,NULL),
	(28,'fuel_create',NULL,NULL,NULL),
	(29,'fuel_edit',NULL,NULL,NULL),
	(30,'fuel_show',NULL,NULL,NULL),
	(31,'fuel_delete',NULL,NULL,NULL),
	(32,'fuel_access',NULL,NULL,NULL),
	(33,'transmission_create',NULL,NULL,NULL),
	(34,'transmission_edit',NULL,NULL,NULL),
	(35,'transmission_show',NULL,NULL,NULL),
	(36,'transmission_delete',NULL,NULL,NULL),
	(37,'transmission_access',NULL,NULL,NULL),
	(38,'engine_create',NULL,NULL,NULL),
	(39,'engine_edit',NULL,NULL,NULL),
	(40,'engine_show',NULL,NULL,NULL),
	(41,'engine_delete',NULL,NULL,NULL),
	(42,'engine_access',NULL,NULL,NULL),
	(43,'chassis_create',NULL,NULL,NULL),
	(44,'chassis_edit',NULL,NULL,NULL),
	(45,'chassis_show',NULL,NULL,NULL),
	(46,'chassis_delete',NULL,NULL,NULL),
	(47,'chassis_access',NULL,NULL,NULL),
	(48,'year_create',NULL,NULL,NULL),
	(49,'year_edit',NULL,NULL,NULL),
	(50,'year_show',NULL,NULL,NULL),
	(51,'year_delete',NULL,NULL,NULL),
	(52,'year_access',NULL,NULL,NULL),
	(53,'category_create',NULL,NULL,NULL),
	(54,'category_edit',NULL,NULL,NULL),
	(55,'category_show',NULL,NULL,NULL),
	(56,'category_delete',NULL,NULL,NULL),
	(57,'category_access',NULL,NULL,NULL),
	(58,'car_model_create',NULL,NULL,NULL),
	(59,'car_model_edit',NULL,NULL,NULL),
	(60,'car_model_show',NULL,NULL,NULL),
	(61,'car_model_delete',NULL,NULL,NULL),
	(62,'car_model_access',NULL,NULL,NULL),
	(63,'size_create',NULL,NULL,NULL),
	(64,'size_edit',NULL,NULL,NULL),
	(65,'size_show',NULL,NULL,NULL),
	(66,'size_delete',NULL,NULL,NULL),
	(67,'size_access',NULL,NULL,NULL),
	(68,'ratio_create',NULL,NULL,NULL),
	(69,'ratio_edit',NULL,NULL,NULL),
	(70,'ratio_show',NULL,NULL,NULL),
	(71,'ratio_delete',NULL,NULL,NULL),
	(72,'ratio_access',NULL,NULL,NULL),
	(73,'width_create',NULL,NULL,NULL),
	(74,'width_edit',NULL,NULL,NULL),
	(75,'width_show',NULL,NULL,NULL),
	(76,'width_delete',NULL,NULL,NULL),
	(77,'width_access',NULL,NULL,NULL),
	(78,'tyre_create',NULL,NULL,NULL),
	(79,'tyre_edit',NULL,NULL,NULL),
	(80,'tyre_show',NULL,NULL,NULL),
	(81,'tyre_delete',NULL,NULL,NULL),
	(82,'tyre_access',NULL,NULL,NULL),
	(83,'faq_section_access',NULL,NULL,NULL),
	(84,'faq_category_create',NULL,NULL,NULL),
	(85,'faq_category_edit',NULL,NULL,NULL),
	(86,'faq_category_show',NULL,NULL,NULL),
	(87,'faq_category_delete',NULL,NULL,NULL),
	(88,'faq_category_access',NULL,NULL,NULL),
	(89,'faq_create',NULL,NULL,NULL),
	(90,'faq_edit',NULL,NULL,NULL),
	(91,'faq_show',NULL,NULL,NULL),
	(92,'faq_delete',NULL,NULL,NULL),
	(93,'faq_access',NULL,NULL,NULL),
	(94,'warranty_access',NULL,NULL,NULL),
	(95,'vehicle_type_create',NULL,NULL,NULL),
	(96,'vehicle_type_edit',NULL,NULL,NULL),
	(97,'vehicle_type_show',NULL,NULL,NULL),
	(98,'vehicle_type_delete',NULL,NULL,NULL),
	(99,'vehicle_type_access',NULL,NULL,NULL),
	(100,'product_create',NULL,NULL,NULL),
	(101,'product_edit',NULL,NULL,NULL),
	(102,'product_show',NULL,NULL,NULL),
	(103,'product_delete',NULL,NULL,NULL),
	(104,'product_access',NULL,NULL,NULL),
	(105,'product_size_create',NULL,NULL,NULL),
	(106,'product_size_edit',NULL,NULL,NULL),
	(107,'product_size_show',NULL,NULL,NULL),
	(108,'product_size_delete',NULL,NULL,NULL),
	(109,'product_size_access',NULL,NULL,NULL),
	(110,'city_create',NULL,NULL,NULL),
	(111,'city_edit',NULL,NULL,NULL),
	(112,'city_show',NULL,NULL,NULL),
	(113,'city_delete',NULL,NULL,NULL),
	(114,'city_access',NULL,NULL,NULL),
	(115,'retailer_create',NULL,NULL,NULL),
	(116,'retailer_edit',NULL,NULL,NULL),
	(117,'retailer_show',NULL,NULL,NULL),
	(118,'retailer_delete',NULL,NULL,NULL),
	(119,'retailer_access',NULL,NULL,NULL),
	(120,'social_create',NULL,NULL,NULL),
	(121,'social_edit',NULL,NULL,NULL),
	(122,'social_show',NULL,NULL,NULL),
	(123,'social_delete',NULL,NULL,NULL),
	(124,'social_access',NULL,NULL,NULL),
	(125,'slider_setting_access',NULL,NULL,NULL),
	(126,'car_slider_create',NULL,NULL,NULL),
	(127,'car_slider_edit',NULL,NULL,NULL),
	(128,'car_slider_show',NULL,NULL,NULL),
	(129,'car_slider_delete',NULL,NULL,NULL),
	(130,'car_slider_access',NULL,NULL,NULL),
	(131,'moto_slider_create',NULL,NULL,NULL),
	(132,'moto_slider_edit',NULL,NULL,NULL),
	(133,'moto_slider_show',NULL,NULL,NULL),
	(134,'moto_slider_delete',NULL,NULL,NULL),
	(135,'moto_slider_access',NULL,NULL,NULL),
	(136,'warranty_claim_create',NULL,NULL,NULL),
	(137,'warranty_claim_edit',NULL,NULL,NULL),
	(138,'warranty_claim_show',NULL,NULL,NULL),
	(139,'warranty_claim_delete',NULL,NULL,NULL),
	(140,'warranty_claim_access',NULL,NULL,NULL),
	(141,'moto_registration_create',NULL,NULL,NULL),
	(142,'moto_registration_edit',NULL,NULL,NULL),
	(143,'moto_registration_show',NULL,NULL,NULL),
	(144,'moto_registration_delete',NULL,NULL,NULL),
	(145,'moto_registration_access',NULL,NULL,NULL),
	(146,'car_registration_create',NULL,NULL,NULL),
	(147,'car_registration_edit',NULL,NULL,NULL),
	(148,'car_registration_show',NULL,NULL,NULL),
	(149,'car_registration_delete',NULL,NULL,NULL),
	(150,'car_registration_access',NULL,NULL,NULL),
	(151,'site_setting_access',NULL,NULL,NULL),
	(152,'header_create',NULL,NULL,NULL),
	(153,'header_edit',NULL,NULL,NULL),
	(154,'header_show',NULL,NULL,NULL),
	(155,'header_delete',NULL,NULL,NULL),
	(156,'header_access',NULL,NULL,NULL),
	(157,'contact_create',NULL,NULL,NULL),
	(158,'contact_edit',NULL,NULL,NULL),
	(159,'contact_show',NULL,NULL,NULL),
	(160,'contact_delete',NULL,NULL,NULL),
	(161,'contact_access',NULL,NULL,NULL),
	(162,'footer_create',NULL,NULL,NULL),
	(163,'footer_edit',NULL,NULL,NULL),
	(164,'footer_show',NULL,NULL,NULL),
	(165,'footer_delete',NULL,NULL,NULL),
	(166,'footer_access',NULL,NULL,NULL),
	(167,'email_create',NULL,NULL,NULL),
	(168,'email_edit',NULL,NULL,NULL),
	(169,'email_show',NULL,NULL,NULL),
	(170,'email_delete',NULL,NULL,NULL),
	(171,'email_access',NULL,NULL,NULL),
	(172,'page_create',NULL,NULL,NULL),
	(173,'page_edit',NULL,NULL,NULL),
	(174,'page_show',NULL,NULL,NULL),
	(175,'page_delete',NULL,NULL,NULL),
	(176,'page_access',NULL,NULL,NULL),
	(177,'menu_setting_access',NULL,NULL,NULL),
	(178,'page_menu_create',NULL,NULL,NULL),
	(179,'page_menu_edit',NULL,NULL,NULL),
	(180,'page_menu_show',NULL,NULL,NULL),
	(181,'page_menu_delete',NULL,NULL,NULL),
	(182,'page_menu_access',NULL,NULL,NULL),
	(183,'other_menu_create',NULL,NULL,NULL),
	(184,'other_menu_edit',NULL,NULL,NULL),
	(185,'other_menu_show',NULL,NULL,NULL),
	(186,'other_menu_delete',NULL,NULL,NULL),
	(187,'other_menu_access',NULL,NULL,NULL),
	(188,'model_combination_create',NULL,NULL,NULL),
	(189,'model_combination_edit',NULL,NULL,NULL),
	(190,'model_combination_show',NULL,NULL,NULL),
	(191,'model_combination_delete',NULL,NULL,NULL),
	(192,'model_combination_access',NULL,NULL,NULL),
	(193,'profile_password_edit',NULL,NULL,NULL);

/*!40000 ALTER TABLE `permissions_old` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table product_sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_sizes`;

CREATE TABLE `product_sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_fk_3767065` (`product_id`),
  CONSTRAINT `product_fk_3767065` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vehicle_type_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_type_fk_3767059` (`vehicle_type_id`),
  CONSTRAINT `vehicle_type_fk_3767059` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table ratios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratios`;

CREATE TABLE `ratios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ratio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ratios` WRITE;
/*!40000 ALTER TABLE `ratios` DISABLE KEYS */;

INSERT INTO `ratios` (`id`, `ratio`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,65,'2021-05-05 09:33:01','2021-05-05 09:33:01',NULL);

/*!40000 ALTER TABLE `ratios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table retailers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `retailers`;

CREATE TABLE `retailers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vehicle_type_id` bigint(20) unsigned NOT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `retailers_name_unique` (`name`),
  KEY `vehicle_type_fk_3767075` (`vehicle_type_id`),
  KEY `city_fk_3767077` (`city_id`),
  CONSTRAINT `city_fk_3767077` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `vehicle_type_fk_3767075` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  KEY `user_id_fk_3766948` (`user_id`),
  KEY `role_id_fk_3766948` (`role_id`),
  CONSTRAINT `role_id_fk_3766948` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_3766948` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Admin',NULL,NULL,NULL),
	(2,'User',NULL,NULL,NULL);

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes`;

CREATE TABLE `sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `with` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;

INSERT INTO `sizes` (`id`, `with`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,15,'2021-05-05 09:31:54','2021-05-05 09:34:01',NULL);

/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table socials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `socials`;

CREATE TABLE `socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `linked_in`, `google_plus`, `pinterest`, `you_tube`, `instagram`, `tumblr`, `flickr`, `reddit`, `snapchat`, `whats_app`, `quora`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'#','#','#','#','#','#','#','#','#','#','#','#','#','2021-05-05 08:17:21','2021-05-05 08:17:21',NULL);

/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transmissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transmissions`;

CREATE TABLE `transmissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table tyres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tyres`;

CREATE TABLE `tyres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `width_id` bigint(20) unsigned DEFAULT NULL,
  `ratio_id` bigint(20) unsigned DEFAULT NULL,
  `size_id` bigint(20) unsigned DEFAULT NULL,
  `published` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `width_fk_3767025` (`width_id`),
  KEY `ratio_fk_3767026` (`ratio_id`),
  KEY `size_fk_3767027` (`size_id`),
  CONSTRAINT `ratio_fk_3767026` FOREIGN KEY (`ratio_id`) REFERENCES `ratios` (`id`),
  CONSTRAINT `size_fk_3767027` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  CONSTRAINT `width_fk_3767025` FOREIGN KEY (`width_id`) REFERENCES `widths` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tyres` WRITE;
/*!40000 ALTER TABLE `tyres` DISABLE KEYS */;

INSERT INTO `tyres` (`id`, `title`, `short_description`, `long_description`, `features`, `specifications`, `warranty`, `video`, `created_at`, `updated_at`, `deleted_at`, `width_id`, `ratio_id`, `size_id`, `published`)
VALUES
	(1,'Cinturato `P1 `varde','<h2><strong>Ideal for urban mobility</strong></h2><p>&nbsp;</p><p>Elegant and distinctive, <strong>CINTURATO P1™ Verde</strong> is the premium solution to <strong>urban mobility</strong>. <strong>CINTURATO P1™ Verde</strong> has been created to take full advantage of latest materials, structures and tread pattern design in order to <strong>guarantee savings, respect for the environment</strong>, comfort and safety on all road surfaces.</p>','<h2><strong>Ideal for urban mobility</strong></h2><p>&nbsp;</p><p>Elegant and distinctive, <strong>CINTURATO P1™ Verde</strong> is the premium solution to <strong>urban mobility</strong>. <strong>CINTURATO P1™ Verde</strong> has been created to take full advantage of latest materials, structures and tread pattern design in order to <strong>guarantee savings, respect for the environment</strong>, comfort and safety on all road surfaces.</p>',NULL,NULL,NULL,NULL,'2021-05-05 09:39:18','2021-05-06 06:01:11','2021-05-06 06:01:11',1,1,1,1),
	(2,'Sample Tyre',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:01:46','2021-05-06 06:21:06','2021-05-06 06:21:06',1,1,1,1),
	(3,'Sample Tyre',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:03:34','2021-05-06 06:07:12','2021-05-06 06:07:12',1,1,1,1),
	(4,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:21:27','2021-05-06 06:27:59','2021-05-06 06:27:59',1,1,1,1),
	(5,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:25:28','2021-05-06 06:28:02','2021-05-06 06:28:02',1,1,1,1),
	(6,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:26:45','2021-05-06 06:28:05','2021-05-06 06:28:05',1,1,1,1),
	(7,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:27:13','2021-05-06 06:28:09','2021-05-06 06:28:09',1,1,1,1),
	(8,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:28:25','2021-05-06 06:33:56','2021-05-06 06:33:56',1,1,1,1),
	(9,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:39:26','2021-05-06 06:55:21','2021-05-06 06:55:21',1,1,1,1),
	(10,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:40:27','2021-05-06 06:55:24','2021-05-06 06:55:24',1,1,1,1),
	(11,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:55:14','2021-05-06 06:55:28','2021-05-06 06:55:28',1,1,1,1),
	(12,'Sales Phone',NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:55:50','2021-05-06 06:56:28','2021-05-06 06:56:28',1,1,1,1),
	(13,'Sales Phone','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I</p>',NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:56:44','2021-05-18 12:37:19',NULL,1,1,1,1),
	(14,'Sales Phone','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I</p>',NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:56:44','2021-05-18 12:37:19',NULL,1,1,1,1),
	(15,'Sales Phone','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I</p>',NULL,NULL,NULL,NULL,NULL,'2021-05-06 06:56:44','2021-05-18 12:37:19',NULL,1,1,1,1);

/*!40000 ALTER TABLE `tyres` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Admin','admin@admin.com',NULL,'$2y$10$G0P4RtkCw9zoTeVj34JhX.yS5CNMSBqM5LNEe6oWTj6Vk8FF.Yc7W','JjfMS7eG1A5M0r1fNsjcNrzPP3modMPUfDVaqL2BG74fhAeaPGFKSvLgfG05',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_types`;

CREATE TABLE `vehicle_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_types_name_unique` (`name`),
  UNIQUE KEY `vehicle_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table warranty_claims
# ------------------------------------------------------------

DROP TABLE IF EXISTS `warranty_claims`;

CREATE TABLE `warranty_claims` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_name_id` bigint(20) unsigned NOT NULL,
  `product_size_id` bigint(20) unsigned NOT NULL,
  `retailer_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_name_fk_3767124` (`product_name_id`),
  KEY `product_size_fk_3767125` (`product_size_id`),
  KEY `retailer_fk_3767127` (`retailer_id`),
  CONSTRAINT `product_name_fk_3767124` FOREIGN KEY (`product_name_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_size_fk_3767125` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`),
  CONSTRAINT `retailer_fk_3767127` FOREIGN KEY (`retailer_id`) REFERENCES `retailers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table widths
# ------------------------------------------------------------

DROP TABLE IF EXISTS `widths`;

CREATE TABLE `widths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `widths` WRITE;
/*!40000 ALTER TABLE `widths` DISABLE KEYS */;

INSERT INTO `widths` (`id`, `width`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,175,'2021-05-05 09:33:44','2021-05-05 09:33:44',NULL);

/*!40000 ALTER TABLE `widths` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table years
# ------------------------------------------------------------

DROP TABLE IF EXISTS `years`;

CREATE TABLE `years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `years` WRITE;
/*!40000 ALTER TABLE `years` DISABLE KEYS */;

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2020,'2021-05-05 05:12:06','2021-05-05 05:12:06',NULL),
	(2,2022,'2021-05-05 05:12:13','2021-05-05 05:12:13',NULL);

/*!40000 ALTER TABLE `years` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
