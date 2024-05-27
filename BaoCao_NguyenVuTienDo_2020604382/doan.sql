-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e-commerce
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `money` double NOT NULL,
  `size_id` bigint unsigned DEFAULT NULL,
  `color_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_size_id_foreign` (`size_id`),
  KEY `carts_color_id_foreign` (`color_id`),
  CONSTRAINT `carts_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (83,20,3,1,140000,1,6,'2024-05-18 07:13:27','2024-05-18 07:13:27'),(84,23,3,1,120000,1,6,'2024-05-18 07:13:28','2024-05-18 07:13:28'),(85,12,3,1,99000,1,6,'2024-05-18 07:13:30','2024-05-18 07:13:30');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: active 1: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Túi',1,0,'2024-01-18 10:34:15','2024-01-18 10:34:15'),(3,'Quần áo',1,0,'2024-01-18 10:34:44','2024-01-18 10:34:44');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (6,'White',NULL,NULL),(7,'Black',NULL,NULL),(8,'Red',NULL,NULL),(9,'Blink',NULL,NULL),(10,'Blue',NULL,NULL),(11,'Be',NULL,NULL),(12,'Moss green',NULL,NULL);
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_images`
--

DROP TABLE IF EXISTS `comment_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_images_comment_id_foreign` (`comment_id`),
  CONSTRAINT `comment_images_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_images`
--

LOCK TABLES `comment_images` WRITE;
/*!40000 ALTER TABLE `comment_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_product_id_foreign` (`product_id`),
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (59,1,12,'alo 123',5,'2024-05-08 14:32:12','2024-05-08 14:32:12');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_10_02_074529_create_categories_table',1),(6,'2023_10_02_074530_create_products_table',1),(7,'2023_10_02_074626_create_carts_table',1),(8,'2023_10_08_092442_create_orders_table',1),(9,'2023_10_09_020458_create_order_details_table',1),(10,'2023_10_09_032905_create_payments_table',1),(11,'2023_10_20_230258_create_wishlists_table',1),(12,'2024_01_17_114211_create_comments_table',1),(13,'2024_03_19_215850_create_comments_table',2),(14,'2024_04_07_164215_create_sizes_table',2),(15,'2024_04_07_164227_create_colors_table',2),(20,'2024_04_07_165050_create_comment_images_table',3),(21,'2024_04_13_195501_add_column_in_carts',3),(22,'2024_04_14_153253_add_column_rating_to_comments_table',4),(23,'2024_04_20_103232_create_product_images_table',5),(24,'2024_04_20_103556_create_product_size_table',5),(25,'2024_04_20_103700_create_product_color_table',5),(26,'2024_05_12_080638_add_column_phone_number_in_users_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (64,24,60,1,180000,'2023-10-07 16:52:52','2024-05-07 16:52:52'),(65,24,61,1,180000,'2024-03-08 12:00:08','2024-05-08 12:00:08'),(66,23,62,1,150000,'2024-02-09 11:09:38','2024-05-09 11:09:38'),(67,19,62,1,120000,'2023-09-09 11:09:38','2024-05-09 11:09:38'),(68,12,62,10,99000,'2024-04-09 11:09:38','2024-05-09 11:09:38'),(69,24,63,10,180000,'2023-11-09 11:20:27','2024-05-09 11:20:27'),(70,21,64,1,90000,'2023-08-12 12:53:02','2024-05-12 12:53:02'),(73,24,67,1,180000,'2024-04-15 09:49:15','2024-05-15 09:49:15'),(74,12,67,1,99000,'2024-01-15 09:49:15','2024-05-15 09:49:15'),(75,21,67,1,90000,'2023-07-15 09:49:15','2024-05-15 09:49:15'),(76,29,68,1,160000,'2023-12-15 09:50:06','2024-05-15 09:50:06'),(77,31,68,1,120000,'2024-02-15 09:50:06','2024-05-15 09:50:06'),(78,12,69,1,99000,'2024-01-15 09:51:27','2024-05-15 09:51:27'),(79,20,69,1,140000,'2024-05-15 09:51:27','2024-05-15 09:51:27'),(80,20,70,1,140000,'2023-06-15 10:51:29','2024-05-15 10:51:29'),(81,25,70,1,88000,'2024-05-15 10:51:29','2024-05-15 10:51:29');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1: Processing 2: Delivering 3: Successful delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (60,3,'Nguyễn Tiến Độ','do@gmail.com','0862671500','zz','zz','ádasd',NULL,4,'2024-05-07 16:52:51','2024-05-15 08:23:17'),(61,3,'Nguyễn Tiến Độ','do@gmail.com','0988888888','zz','sdfsdf','zzz',NULL,1,'2024-05-08 12:00:08','2024-05-08 12:00:08'),(62,3,'Nguyễn Tiến Độ','do@gmail.com','0988888888','áda','ádads','áda','ádas',1,'2024-05-09 11:09:38','2024-05-09 11:09:38'),(63,3,'Nguyễn Tiến Độ','do@gmail.com','0862671500','cvb','cvb','cvb','cvbcvb',1,'2024-05-09 11:20:27','2024-05-09 11:20:27'),(64,3,'Nguyễn Tiến Độ','do@gmail.com','0862671500','ccc','ccc','cc','cccc',4,'2024-05-12 12:53:02','2024-05-18 07:24:13'),(67,6,'Trần Xuân Trường','truongtx@gmail.com','0862671500','Việt Nam','Hà Nội','123, Kim Văn, Kim Lũ','Đóng gói đẹp nha',1,'2024-05-15 09:49:15','2024-05-15 09:49:15'),(68,6,'Trần Xuân Trường','truongtx@gmail.com','0988888888','Việt Nam','Hà Nội','34, Nguyễn Trãi',NULL,1,'2024-05-15 09:50:06','2024-05-15 09:50:06'),(69,4,'Lê Văn Duẩn','duanlv@gmail.com','0862671500','Việt Nam','Nam Định','Xuân Phong, Xuân Trường',NULL,1,'2024-05-15 09:51:27','2024-05-15 09:51:27'),(70,4,'Lê Văn Duẩn','duanlv@gmail.com','0862671500','Việt Nam','Hà Nội','20, Tây Hồ',NULL,1,'2024-05-15 10:51:29','2024-05-15 10:51:29');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1: Payment on delivery 2: Payment online',
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Processing 1: Processed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (60,60,'2',266000.00,1,'2024-05-07 16:52:52','2024-05-07 16:53:52'),(61,61,'2',126000.00,1,'2024-05-08 12:00:08','2024-05-08 12:02:38'),(62,62,'1',1230000.00,0,'2024-05-09 11:09:38','2024-05-09 11:09:38'),(64,64,'2',90000.00,1,'2024-05-12 12:53:02','2024-05-12 12:54:16'),(67,67,'1',315000.00,0,'2024-05-15 09:49:15','2024-05-15 09:49:15'),(68,68,'1',248000.00,0,'2024-05-15 09:50:06','2024-05-15 09:50:06'),(69,69,'1',239000.00,0,'2024-05-15 09:51:27','2024-05-15 09:51:27'),(70,70,'1',228000.00,0,'2024-05-15 10:51:29','2024-05-15 10:51:29');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_color`
--

DROP TABLE IF EXISTS `product_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_color` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `color_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_color_product_id_foreign` (`product_id`),
  KEY `product_color_color_id_foreign` (`color_id`),
  CONSTRAINT `product_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_color`
--

LOCK TABLES `product_color` WRITE;
/*!40000 ALTER TABLE `product_color` DISABLE KEYS */;
INSERT INTO `product_color` VALUES (164,25,6,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(165,25,7,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(166,25,9,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(167,25,10,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(168,25,11,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(169,24,6,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(170,24,7,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(171,24,9,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(172,24,11,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(173,24,12,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(174,23,7,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(175,23,9,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(176,23,11,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(177,23,12,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(178,22,8,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(179,22,9,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(180,22,10,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(181,22,11,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(182,21,6,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(183,21,9,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(184,21,10,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(185,21,11,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(186,21,12,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(187,20,6,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(188,20,7,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(189,20,9,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(190,20,10,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(191,19,6,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(192,19,7,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(193,19,8,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(194,19,10,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(195,19,12,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(196,12,6,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(197,12,7,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(198,12,9,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(199,12,11,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(200,12,12,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(201,29,7,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(202,29,8,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(203,29,10,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(204,30,6,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(205,30,7,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(206,30,8,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(207,30,9,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(208,30,10,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(209,30,11,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(210,31,7,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(211,31,8,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(212,31,10,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(213,31,11,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(214,32,6,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(215,32,7,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(216,32,11,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(217,33,6,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(218,33,7,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(219,33,9,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(220,34,6,'2024-05-15 09:42:23','2024-05-15 09:42:23'),(221,34,7,'2024-05-15 09:42:23','2024-05-15 09:42:23');
/*!40000 ALTER TABLE `product_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (9,'1713605372_1.1.jpg',12,'2024-04-20 09:29:32','2024-04-20 09:29:32'),(10,'1713605372_1.2.jpg',12,'2024-04-20 09:29:32','2024-04-20 09:29:32'),(11,'1713605372_1.3.jpg',12,'2024-04-20 09:29:32','2024-04-20 09:29:32'),(12,'1713605372_1.5.jpg',12,'2024-04-20 09:29:32','2024-04-20 09:29:32'),(20,'1713617457_4.1.jpg',19,'2024-04-20 12:50:57','2024-04-20 12:50:57'),(21,'1713617457_4.2.jpg',19,'2024-04-20 12:50:57','2024-04-20 12:50:57'),(22,'1713617457_4.4.jpg',19,'2024-04-20 12:50:57','2024-04-20 12:50:57'),(23,'1713617457_4.6.jpg',19,'2024-04-20 12:50:57','2024-04-20 12:50:57'),(27,'1713637034_5.1.jpg',20,'2024-04-20 18:17:14','2024-04-20 18:17:14'),(28,'1713637034_5.2.jpg',20,'2024-04-20 18:17:14','2024-04-20 18:17:14'),(29,'1713637034_5.3.jpg',20,'2024-04-20 18:17:14','2024-04-20 18:17:14'),(30,'1713637034_5.4.jpg',20,'2024-04-20 18:17:14','2024-04-20 18:17:14'),(36,'1713677967_7.1.jpg',21,'2024-04-21 05:39:27','2024-04-21 05:39:27'),(37,'1713677967_7.3.jpg',21,'2024-04-21 05:39:27','2024-04-21 05:39:27'),(38,'1713677967_7.4.jpg',21,'2024-04-21 05:39:27','2024-04-21 05:39:27'),(39,'1713677967_7.5.jpg',21,'2024-04-21 05:39:27','2024-04-21 05:39:27'),(40,'1713678191_8.2.jpg',22,'2024-04-21 05:43:11','2024-04-21 05:43:11'),(41,'1713678191_8.3.jpg',22,'2024-04-21 05:43:11','2024-04-21 05:43:11'),(42,'1713678191_8.4.jpg',22,'2024-04-21 05:43:11','2024-04-21 05:43:11'),(43,'1713678191_8.5.jpg',22,'2024-04-21 05:43:11','2024-04-21 05:43:11'),(44,'1713678347_9.1.jpg',23,'2024-04-21 05:45:47','2024-04-21 05:45:47'),(45,'1713678347_9.2.jpg',23,'2024-04-21 05:45:47','2024-04-21 05:45:47'),(46,'1713678347_9.3.jpg',23,'2024-04-21 05:45:47','2024-04-21 05:45:47'),(47,'1713678347_9.4.jpg',23,'2024-04-21 05:45:47','2024-04-21 05:45:47'),(48,'1713678522_10.1.jpg',24,'2024-04-21 05:48:42','2024-04-21 05:48:42'),(49,'1713678522_10.2.jpg',24,'2024-04-21 05:48:42','2024-04-21 05:48:42'),(50,'1713678522_10.3.jpg',24,'2024-04-21 05:48:42','2024-04-21 05:48:42'),(51,'1713678522_10.4.jpg',24,'2024-04-21 05:48:42','2024-04-21 05:48:42'),(52,'1713678736_11.2.jpg',25,'2024-04-21 05:52:16','2024-04-21 05:52:16'),(53,'1713678736_11.3.jpg',25,'2024-04-21 05:52:16','2024-04-21 05:52:16'),(54,'1713678736_11.4.jpg',25,'2024-04-21 05:52:16','2024-04-21 05:52:16'),(55,'1713678736_11.5.jpg',25,'2024-04-21 05:52:16','2024-04-21 05:52:16'),(68,'1715762843_15.1.jpg',29,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(69,'1715762843_15.2.jpg',29,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(70,'1715762843_15.3.jpg',29,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(71,'1715762843_15.4.jpg',29,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(72,'1715762998_16.2.jpg',30,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(73,'1715762998_16.3.jpg',30,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(74,'1715762998_16.4.jpg',30,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(75,'1715762998_16.5.jpg',30,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(76,'1715763317_17.1.jpg',31,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(77,'1715763317_17.3.jpg',31,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(78,'1715763317_17.4.jpg',31,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(79,'1715763317_17.5.jpg',31,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(80,'1715765377_18.2.jpg',32,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(81,'1715765377_18.3.jpg',32,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(82,'1715765377_18.4.jpg',32,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(83,'1715765377_18.5.jpg',32,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(84,'1715765629_19.2.jpg',33,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(85,'1715765629_19.3.jpg',33,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(86,'1715765629_19.4.jpg',33,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(87,'1715765629_19.5.jpg',33,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(88,'1715766143_20.1.jpg',34,'2024-05-15 09:42:23','2024-05-15 09:42:23'),(89,'1715766143_20.2.jpg',34,'2024-05-15 09:42:23','2024-05-15 09:42:23'),(90,'1715766143_20.4.jpg',34,'2024-05-15 09:42:23','2024-05-15 09:42:23'),(91,'1715766143_20.5.jpg',34,'2024-05-15 09:42:23','2024-05-15 09:42:23');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_size`
--

DROP TABLE IF EXISTS `product_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_size` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `size_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_size_product_id_foreign` (`product_id`),
  KEY `product_size_size_id_foreign` (`size_id`),
  CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_size`
--

LOCK TABLES `product_size` WRITE;
/*!40000 ALTER TABLE `product_size` DISABLE KEYS */;
INSERT INTO `product_size` VALUES (211,25,1,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(212,25,2,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(213,25,3,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(214,25,4,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(215,25,5,'2024-05-15 01:53:29','2024-05-15 01:53:29'),(216,24,1,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(217,24,2,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(218,24,3,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(219,24,4,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(220,24,5,'2024-05-15 01:53:39','2024-05-15 01:53:39'),(221,23,1,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(222,23,2,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(223,23,3,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(224,23,4,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(225,23,5,'2024-05-15 01:53:47','2024-05-15 01:53:47'),(226,22,1,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(227,22,2,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(228,22,3,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(229,22,4,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(230,22,5,'2024-05-15 01:53:55','2024-05-15 01:53:55'),(231,21,1,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(232,21,2,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(233,21,3,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(234,21,4,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(235,21,5,'2024-05-15 01:54:02','2024-05-15 01:54:02'),(236,20,1,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(237,20,2,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(238,20,3,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(239,20,4,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(240,20,5,'2024-05-15 01:54:11','2024-05-15 01:54:11'),(241,19,1,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(242,19,2,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(243,19,3,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(244,19,4,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(245,19,5,'2024-05-15 01:54:23','2024-05-15 01:54:23'),(246,12,1,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(247,12,2,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(248,12,3,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(249,12,4,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(250,12,5,'2024-05-15 01:54:29','2024-05-15 01:54:29'),(251,29,1,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(252,29,2,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(253,29,3,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(254,29,4,'2024-05-15 08:47:23','2024-05-15 08:47:23'),(255,30,1,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(256,30,2,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(257,30,3,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(258,30,4,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(259,30,5,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(260,31,1,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(261,31,2,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(262,31,3,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(263,31,4,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(264,31,5,'2024-05-15 08:55:17','2024-05-15 08:55:17'),(265,32,2,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(266,32,3,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(267,33,3,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(268,34,2,'2024-05-15 09:42:23','2024-05-15 09:42:23'),(269,34,3,'2024-05-15 09:42:23','2024-05-15 09:42:23');
/*!40000 ALTER TABLE `product_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `sex` tinyint(1) DEFAULT NULL COMMENT '0: male 1: female',
  `quantity` int NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `discount` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: active 1: inactive',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (12,'Áo sơ mi nam phong cách cơ bản TOPMEN','Áo sơ mi nam kiểu dáng cơ bản TOPMEN chất liệu vải kaki cao cấp trẻ trung, năng động phù hợp đi làm và đi chơi\r\n\r\n⭐ Chất liệu: Chất liệu kaki dày dặn, chính hãng\r\n⭐ Màu sắc: Đen - Be - Trắng - Cam - Xám\r\n⭐ Tính năng:\r\n- Chất liệu vải áo dày dặn, kaki cao cấp, dễ phối đồ, dành cho nam nhưng lại phù hợp với nữ.\r\n- Áo có thể kết hợp với áo thun bên trong, với quần jean hoặc quần dài để đi chơi\r\n- Sơ mi kaki cũng có thể mặc với quần phù hợp đi làm hoặc dự tiệc','1713601597.jpg',3,0,543,99000,NULL,0,1,'2024-04-20 08:26:37','2024-05-15 09:51:27'),(19,'Áo sơ mi nam không tay','✔️ GIỚI THIỆU THƯƠNG HIỆU: Áo sơ mi nam tay ngắn, áo thun ngắn tay cổ tròn Unisex chất thun cotton 4 chiều mềm mại\r\nLà một trong những thời trang nam xứng đáng với danh hiệu “MẪU ĐẸP – CHẤT LƯỢNG TỐT – GIÁ NHÀ XƯỞNG” nên Shop luôn chú trọng nghiên cứu phát triển mẫu mã sáng tạo và đặc biệt là tối ưu hóa giá cả, giá xuất xưởng tốt nhất. tới khách hàng.\r\n- Sản phẩm siêu hot với chất liệu từ 60% Elastic kết hợp với 40% Cotton tạo nên độ co dãn 4 chiều cực mát và mịn giúp người mặc cảm thấy thoải mái.','1713617457.jpg',3,0,554,120000,NULL,0,1,'2024-04-20 12:50:57','2024-05-15 01:54:23'),(20,'Áo sơ mi ngắn tay in họa tiết thời trang','Nguồn danh mục: còn hàng\r\n\r\nMã số: C24 C25 C26\r\n\r\nPhong cách: phiên bản Hàn Quốc\r\n\r\nDanh mục sản phẩm: Thời trang trẻ (18-40 (tuổi)\r\n\r\nphong cách: Áo len\r\n\r\nKiểu phông chữ: Kiểu đồng bộ\r\n\r\nKiểu cổ áo: Ve áo\r\n\r\nChiều dài tay áo: Tay áo ngắn\r\n\r\nModel: In\r\n\r\nDày và mỏng: Mỏng\r\n\r\nChi tiết kiểu dáng: In\r\n\r\nPhù hợp với mọi người: Giới trẻ\r\n\r\nNăm/mùa niêm yết: 2021\r\n\r\nTên vải: Hỗn hợp sợi hóa học\r\n\r\nThành phần vải chính: Sợi polyester (polyester)\r\n\r\nHàm lượng thành phần vải chính: 90 (%)\r\n\r\nVải: polyester\r\n\r\nCác tình huống áp dụng: thời gian giải trí\r\n\r\nThích hợp cho mùa: Mùa hè\r\n\r\nCông nghệ: Xử lý không sắt\r\n\r\nMàu sắc: C24 Xanh nhạt, C24hồng, C25 Xanh đậm, C26 đen\r\n\r\nKích thước: M, L, XL, XXL, XXXL\r\n\r\nNguồn thiết kế ban đầu: Có','1713620099.jpg',3,0,553,140000,NULL,0,1,'2024-04-20 13:34:59','2024-05-15 10:51:29'),(21,'Áo thời trang Khăn quàng dệt kim nữ phiên bản Hàn Quốc','Giới tính: Nữ\r\nNguồn gốc: Trung Quốc\r\nChất liệu: Đan\r\nLoại khăn Khác\r\nMẫu: Hoa, Khác, Trơn\r\nMùa: Mùa thu\r\nSố lượng mặt hàng khuyến mãi\r\n190\r\nSố lượng sản phẩm còn lại\r\n22939\r\nĐã được gửi từ\r\nNước ngoài','1713677920.jpg',3,1,552,90000,NULL,0,1,'2024-04-21 05:38:40','2024-05-15 09:49:16'),(22,'Áo thun mỏng mùa hè nữ','Chất liệu: thun cotton 35/65\r\n\r\n   Size áo M < 45 kg, dài 63, rộng 47\r\n\r\n   Size áo L < 65kg, dài 70, rộng 55\r\n\r\n\r\n\r\nHướng dẫn ĐẶT HÀNG FREESHIP ???\r\n\r\n✔Quý khách mua sản phẩm vui lòng nhấn mua ngay\r\n\r\n✔ Nếu mua từ 2 sản phẩm trở lên quý khách vui lòng nhấn thêm vào giỏ hàng, rồi lần lượt thêm sản phẩm muốn mua vào giỏ hàng trước khi đặt hàng và thanh toán. Bạn nên tận dụng mã giảm giá vận chuyển của shopee bằng cách đặt đơn trên 150k nếu ở Hà Nội, trên 250k ở các tỉnh còn lại, điều này sẽ giúp bạn tiết kiệm được kha khá chi phí.','1713678191.jpg',3,1,555,120000,10,0,1,'2024-04-21 05:43:11','2024-05-15 01:53:55'),(23,'Quần ống rộng nữ Quảng Châu','- Quần lanh Quảng Châu đẹp mới về phục vụ các chị em\r\n\r\n- Ưu điểm: quần nhẹ, thoáng mát, thoải mái, lưng thun co giãn\r\n\r\n- Màu sắc: Xám Xanh, Đen, Be\r\n\r\n- Phong cách: đi chơi hay đi làm đều ok!!\r\n\r\n- Này, nếu bỏ lỡ chiếc quần này thì tiếc quá!!\r\n\r\nBẢNG KÍCH THƯỚC THAM KHẢO\r\n\r\nSize S <45kg, dài 100cm\r\n\r\nSize M < 50kg, dài 100cm\r\n\r\nSize L < 55kg, dài 100cm\r\n\r\nSize XL < 62kg, dài 100cm','1713678347.jpg',3,1,554,150000,20,0,1,'2024-04-21 05:45:47','2024-05-15 01:53:47'),(24,'Áo sơ mi ulzzang dài tay dành cho nữ','Áo Sơ Mi Tay Dài Cơ Bản Ulzzang Phong Cách Hàn Quốc Nữ Ulzzang 10 Màu Dễ Phối (Có Size Lớn)\r\n\r\nCỡ 1 < 49kg\r\n\r\nCỡ 2. < 60kg\r\n\r\nCỡ 3 (cỡ lớn) < 80kg\r\n\r\nTham khảo bảng kích thước bên dưới\r\n\r\nVẢI TRẦY','1713678522.jpg',3,1,542,180000,30,0,1,'2024-04-21 05:48:42','2024-05-15 09:49:15'),(25,'Áo ngắn tay kiểu dáng rộng rãi Hàn Quốc','- Chất liệu: 100% cotton thun, co giãn 4 chiều, vải mềm, mịn, thoáng, không xù.\r\n- Đường may chuẩn, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, đi chơi hay khi chơi thể thao. Thích hợp khi mix đồ với nhiều loại.\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối hợp.\r\n- kích cỡ . cỡ frre dưới 65kg\r\n\r\nCHÚNG TÔI CAM KẾT:\r\nÁo thun trơn unisex nam nữ form rộng, tay rộng\r\n\r\nĐảm bảo chất lượng 100% vải cotton 4 chiều.\r\nHàng có sẵn, giao ngay khi nhận được đơn hàng.\r\n\r\nHoàn tiền 100% nếu sản phẩm bị lỗi, sai hoặc không giống mô tả.\r\nGiao hàng toàn quốc, thanh toán khi nhận hàng.','1713678736.jpg',3,0,554,88000,NULL,0,1,'2024-04-21 05:52:16','2024-05-15 10:51:29'),(29,'Áo Sơ Mi Nam Nữ Flannel Sọc Caro Phong Cách','Áo Sơ Mi Nam Nữ Flannel Sọc Caro Phong Cách Classic Chất Liệu Dạ - Sơ Mi Flannel\r\n\r\nÁo sơ mới nhà Gonz\r\n\r\nChất Liệu: Dạ caro\r\nPhong Cách : Đường Phố classic\r\n\r\nSize : vì là form áo unisex nên các bạn có thể mặc theo sở thích cá nhân\r\n\r\nSize M : các bạn dưới 70kg có thể mặc được\r\n\r\nSize L : các bạn có thể mặc tuỳ thích dưới 90kg','1715762843.jpg',3,0,554,160000,20,0,1,'2024-05-15 08:47:23','2024-05-15 09:50:06'),(30,'Quần gió ống rộng form Wide-leg pants','Thông tin sản phẩm: Quần gió ống rộng form Wide-leg pants THEM STUDIO.Unisex\r\n\r\n\r\n\r\n-Chất liệu Gió dày dặn mang lại cảm giác thoáng mát, thoải mái cho người mặc.\r\n\r\n\r\n\r\n- Vải được lựa chọn kỹ càng, đường may chuẩn đẹp, chắc chắn.\r\n\r\n\r\n\r\n- Hàng có sẵn, giao hàng ngay khi nhận được đơn đặt hàng .\r\n\r\n\r\n\r\n- Hoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.\r\n\r\n\r\n\r\n-Quần gió ống rộng form Wide-leg: Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\n- Chấp nhận đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).\r\n\r\n\r\n\r\nThông số chọn size:\r\n\r\n\r\n\r\nSize 1: 1m55-1m72 (55kg-85kg)\r\n\r\nSize 2: 1m70-1m83 (55kg-85kg)\r\n\r\nSize 3: 1m72-1m82 (60kg-85kg)\r\n\r\n\r\n\r\nHƯỚNG DẪN BẢO QUẢN: Quần gió ống rộng form Wide-leg pants THEM STUIDO.\r\n\r\n-Giặt nhẹ nhàng ở nhiệt độ thường.\r\n\r\n-Tránh xử dụng chất tẩy mạnh\r\n\r\n-là ở nhiệt độ dưới 120 độ C\r\n\r\n-phơi ở nơi khô ráo tránh ánh nắng trực tiếp của mặt trời.','1715762998.jpg',3,1,555,90000,NULL,0,1,'2024-05-15 08:49:58','2024-05-15 08:49:58'),(31,'Áo sơ mi tay dài caro flannel FAFIC','Chất liệu : Vải cotton dạ cao cấp, mềm mại và thấm hút mồ hôi tốt, mang lại cảm giác thoải mái khi mặc.\r\n\r\nPhong cách thời trang hàn quốc với thiết kế caro trẻ trung và cá tính. Nhiều sự lựa chọn mix-match, có thể kết hợp với nhiều loại trang phục vừa đi chơi, đi làm hay đi học đều ok, hứa hẹn sẽ mang lại cho quý khách yêu một sự sự chọn hoàn hảo.\r\n\r\nHƯỚNG DẪN CHỌN SIZE\r\n\r\n- Size M: từ 50-60 Kg ( from rộng nha )\r\n\r\n- Size L: từ 55 -76 Kg( from rộng nha )\r\n\r\n- Size xL: từ 65 -100 Kg ( from rộng nha )','1715763317.jpg',3,0,554,120000,NULL,0,1,'2024-05-15 08:55:17','2024-05-15 09:50:06'),(32,'Túi xách YADOU đeo vai phong cách thời trang Nhật Bản cho nam','Kích thước túi: Trung bình\r\nChất liệu: Vải Oxford\r\nPhong cách túi thời trang: Kiểu phong bì\r\nHọa tiết: Màu trơn\r\nLoại túi: Dáng vuông ngang','1715765377.jpg',2,0,555,86000,NULL,0,1,'2024-05-15 09:29:37','2024-05-15 09:29:37'),(33,'Túi Đeo Ngang Mini Nữ Túi Đeo Vai Thời Trang','Vải: Vải\r\n\r\nKích thước: 21 * 15 * 8CM\r\n\r\nMàu SẮC: Đen, Xanh nhạt, Màu be, Hồng, Màu be\r\n\r\nTrọng lượng: 0,2kg\r\n\r\nSử DỤNG SCENARlO: Đi xe đạp / Đường phố / Giải trí / Mua sắm / Thể thao / Ngoài trời\r\n\r\n\r\n\r\nTính năng\r\n\r\n1. Có thể điều chỉnh độ dài của dây đeo vai để vừa vặn thuận tiện.\r\n\r\n2. Chất vải tinh tế, sờ vào thoải mái, không dễ trầy xước.\r\n\r\n3. Thiết kế túi nhiều lớp, dung tích lớn, cất giữ tiện lợi hơn\r\n\r\nLưu ý:\r\n\r\n1. Do sự khác biệt giữa các màn hình khác nhau, hình ảnh có thể không phản ánh màu sắc thực tế của mặt hàng.\r\n\r\n2. Do các phương pháp đo lường khác nhau xin vui lòng cho phép độ lệch 1-2 cm.','1715765629.jpg',2,1,555,140000,20,0,1,'2024-05-15 09:33:49','2024-05-15 09:33:49'),(34,'Túi xách nữ cầm tay đeo chéo dáng xinh','Túi xách nữ cầm tay đeo chéo dáng xinh túi xách tay thiết kế 2 quai dài sang chảnh Bachhoaonline68 864\r\n\r\nTúi xách là một phụ kiện thời trang không thể thiếu của các bạn trẻ dù là nam hay nữ, nó thể hiện phong cách cũng như cá tính của chủ nhân. Nếu bạn yêu thích phong cách đơn giản nhưng tinh tế thì chiếc túi xách  là một lựa chọn hoàn hảo cho bạn.Chiếc túi xách Tote 6 sở hữu thiết kế thời trang với phần nắp túi cách điệu kết hợp tông màu nổi bật, những đường may tinh tế, cùng gam màu trung tính trẻ trung năng động sẽ vô cùng hữu dụng cho bạn trong việc chứa các vật dụng cá nhân. Bên cạnh đó, túi xách còn thể hiện gu thời trang và cá tính của bạn.\r\n\r\nHoa văn và khóa trên túi xách thay đổi tùy theo từng đợt nhập hàng.\r\n\r\nTHÔNG TIN CHI TIẾT \r\n\r\nTúi xách nữ cầm tay đeo chéo dáng xinh túi xách tay thiết kế 2 quai dài sang chảnh Bachhoaonline68 864\r\n\r\n- Loại sản phẩm: Túi xách nữ\r\n\r\n- Chất liệu: Da tổng hợp\r\n\r\n- KÍCH THƯỚC: 18*13*7\r\n\r\n- BẢO HÀNH: 12 tháng.','1715766143.jpg',2,1,555,180000,10,0,1,'2024-05-15 09:42:23','2024-05-15 09:42:23');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (1,'S',NULL,NULL),(2,'M',NULL,NULL),(3,'L',NULL,NULL),(4,'XL',NULL,NULL),(5,'XXL',NULL,NULL);
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token_verify_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` tinyint(1) NOT NULL COMMENT '0: user 1: admin',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: active 1: inactive',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not 1: deleted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,NULL,'$2y$10$yMJjrb/oQSDZRnmVX.4RW.FkgYrT5mwlwTOOpBdtMYDvWgNR0yKgC',1,NULL,NULL,NULL,0,0,'TAUgL0Pyz1bAIVMoKTOKupl92cV9XJThiBJk4iwcuBVxJsEt2YvPlxXEbGsT','2024-01-18 09:40:37','2024-01-18 09:47:16'),(2,'AdminDo','nguyenvutiendo369@gmail.com',NULL,NULL,'$2y$10$tI5..nR.azGy8QnO3xAR7OFlLyyWRoidxbWEij7ajsuOLYVRH3J.a',0,NULL,NULL,NULL,0,0,'a45sTlGGqtGlHQGAgRt9ke09qF0izj4zwl9Iz6CCSFdkLLkJGStqxjABpgXK','2024-01-18 09:58:38','2024-05-11 04:56:15'),(3,'Nguyễn Tiến Độ','do@gmail.com','2024-02-24 14:48:49','$2y$10$VH9uPYstbcZq3GjgYYS0tOjPaankOtGyAL7QUHUVBPijxUQtPosHe','$2y$10$yMJjrb/oQSDZRnmVX.4RW.FkgYrT5mwlwTOOpBdtMYDvWgNR0yKgC',0,NULL,'0988888888','Nam Dinh',0,0,'aesRgpPQMn1VBgmriSASpobV3s7vIW08tOFTTDcShvjiz8dEbL2YA1oK79jk','2024-02-24 14:48:01','2024-05-15 00:15:13'),(4,'Lê Văn Duẩn','duanlv@gmail.com',NULL,NULL,'$2y$10$9lOZH7MBLX.1QbeRoL7j0eS96WdtCI8zGXIDepiCdC8pa7hZZyfDi',0,NULL,NULL,NULL,0,0,NULL,NULL,NULL),(5,'Võ Nguyên Giáp','giapvn@gmail.com',NULL,NULL,'$2y$10$M5Padz46RM9nNBUtHb78IelmgdmHG8S0UGwNHXjcUslUcOReEKU06',0,NULL,NULL,NULL,0,0,NULL,NULL,NULL),(6,'Trần Xuân Trường','truongtx@gmail.com',NULL,NULL,'$2y$10$R0Xqho93c84gKQb2/a.94OMVEYkRffW909EEJatzHnFVM7ZfNKnhq',0,NULL,NULL,NULL,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (5,3,20,'2024-05-15 08:35:02','2024-05-15 08:35:02'),(6,3,23,'2024-05-15 08:35:07','2024-05-15 08:35:07'),(7,3,12,'2024-05-15 08:35:15','2024-05-15 08:35:15');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-19 19:26:47
