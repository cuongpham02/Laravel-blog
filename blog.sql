CREATE DATABASE  IF NOT EXISTS `laravel_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel_blog`;
-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'PHP 1','PHP',1,0,'2022-01-20 06:07:14','2022-02-21 01:31:39'),(2,'PHP BASIC','PHP cơ bản',1,1,'2022-01-20 06:07:42','2022-02-15 23:40:04'),(3,'PHP OOP','PHP OOP',1,1,'2022-01-20 06:08:05','2022-02-15 23:32:23'),(4,'JAVASCRIPT','JAVASCRIPT',1,0,'2022-01-20 06:08:28','2022-02-15 23:41:21'),(8,'JAVASCRIPT BASIC','JAVASCRIPT BASIC',1,4,'2022-01-20 06:25:09','2022-02-15 23:42:16'),(9,'PHP LARAVEL','11111',1,1,'2022-01-20 06:52:29','2022-02-15 23:33:22'),(10,'REACTJS','REACTJS',1,4,'2022-02-15 23:43:13','2022-02-15 23:43:13'),(11,'PYTHON','PYTHON',1,0,'2022-02-15 23:44:23','2022-02-15 23:44:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rep_comment` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (34,0,'tuan','333333333',25,1,'2022-02-10 22:39:41','2022-02-10 22:39:56'),(35,0,'tuan','gggggg',25,0,'2022-02-10 23:13:19','2022-02-10 23:13:19'),(36,0,'tuan','rrrrrr',25,0,'2022-02-10 23:16:20','2022-02-16 02:01:17'),(37,34,'Admin','aaaaaa',25,0,'2022-02-14 01:25:41','2022-02-14 01:25:41'),(38,0,'tuan1','aaaâ',26,0,'2022-02-14 02:09:48','2022-02-16 02:01:18'),(39,0,'tuan1','bbbbbb',26,1,'2022-02-14 02:09:54','2022-02-16 02:01:22'),(40,34,'Admin','ffffff',25,0,'2022-02-14 03:19:41','2022-02-14 03:19:41'),(42,0,'tuan1','aaaaâ',25,1,'2022-02-14 03:20:25','2022-02-15 00:47:57'),(51,42,'Admin','zzzzzz',25,0,'2022-02-16 01:49:45','2022-02-16 01:49:45'),(52,39,'Admin','aaaaaa',26,0,'2022-02-16 01:53:28','2022-02-16 01:53:28'),(53,39,'Admin','aaaaaa',26,0,'2022-02-16 01:53:41','2022-02-16 01:53:41'),(54,0,'tuan94','comenttttttt',27,1,'2022-02-16 01:59:50','2022-02-16 02:00:12'),(55,0,'tuannguyen','aaaaaaaaa',26,0,'2022-02-16 03:08:30','2022-02-16 03:08:30'),(56,0,'vodanh','1111111',25,1,'2022-02-16 03:12:17','2022-02-21 01:34:38'),(57,56,'Admin','sddfsdf',25,0,'2022-02-16 17:51:12','2022-02-16 17:51:12'),(58,56,'Admin','aaaa',25,0,'2022-02-17 22:08:29','2022-02-17 22:08:29'),(59,56,'Admin','ddddd',25,0,'2022-02-21 01:34:59','2022-02-21 01:34:59'),(60,0,'tuan94','comment',25,1,'2022-02-21 01:36:15','2022-02-21 01:36:22'),(61,60,'Admin','comment',25,0,'2022-02-21 01:36:39','2022-02-21 01:36:39');
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
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (18,'2014_10_12_100000_create_password_resets_table',1),(19,'2019_08_19_000000_create_failed_jobs_table',1),(20,'2022_01_17_150436_create_categories_table',1),(24,'2022_01_20_135739_create_posts_table',1),(26,'2022_01_21_035429_create_comments_table',1),(28,'2014_10_12_000000_create_users_table',1),(30,'2022_01_24_044646_add_image_to_posts_table',2),(31,'2022_02_14_030113_add_image_to_users_table',3),(32,'2022_02_14_091612_create_roles_table',4),(33,'2022_02_14_093233_create_permissions_table',4),(34,'2022_02_15_033654_create_role_user_table',4),(35,'2022_02_15_033738_create_permission_role_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (8,1,1,NULL,NULL),(9,2,1,NULL,NULL),(10,3,1,NULL,NULL),(11,4,1,NULL,NULL),(12,5,1,NULL,NULL),(13,6,1,NULL,NULL),(14,7,1,NULL,NULL),(15,8,1,NULL,NULL),(54,1,8,NULL,NULL),(59,9,1,NULL,NULL),(60,10,1,NULL,NULL),(61,11,1,NULL,NULL),(62,12,1,NULL,NULL),(63,13,1,NULL,NULL),(64,14,1,NULL,NULL),(65,15,1,NULL,NULL),(66,16,1,NULL,NULL),(67,17,1,NULL,NULL),(69,19,1,NULL,NULL),(70,1,6,NULL,NULL),(71,2,6,NULL,NULL),(72,3,6,NULL,NULL),(73,4,6,NULL,NULL),(74,5,6,NULL,NULL),(75,6,6,NULL,NULL),(76,7,6,NULL,NULL),(77,8,6,NULL,NULL),(78,17,6,NULL,NULL),(80,19,6,NULL,NULL),(81,1,9,NULL,NULL),(82,2,9,NULL,NULL),(83,3,9,NULL,NULL),(84,4,9,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'View Post','View Post','2022-01-25 17:26:17','2022-01-25 17:26:17'),(2,'Create Post','Create Post','2022-01-25 17:26:17','2022-01-25 17:26:17'),(3,'Edit Post','Edit Post',NULL,NULL),(4,'Delete Post','Delete Post',NULL,NULL),(5,'View Category','View Category',NULL,NULL),(6,'Create Category','Create Category',NULL,NULL),(7,'Edit Category','Edit Category',NULL,NULL),(8,'Delete Category','Delete Category',NULL,NULL),(9,'View User','View User',NULL,NULL),(10,'Create User','Create User',NULL,NULL),(11,'Edit User','Edit User',NULL,NULL),(12,'Delete User','Delete User',NULL,NULL),(13,'View Role','View Role',NULL,NULL),(14,'Create Role','Create Role',NULL,NULL),(15,'Edit Role','Edit Role',NULL,NULL),(16,'Delete Role','Delete Role',NULL,NULL),(17,'View Comment','View Comment',NULL,NULL),(19,'Delete Comment','Delete Comment',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (25,'Bài 3: Kế thừa class trong PHP','-Lập trình hướng đối tượng (gọi tắt là OOP - object-oriented programming) là một kĩ thuật lập trình hỗ trợ công nghệ đối tượng. Nếu như trước kia là các kiểu lập trình hướng thủ tục, hướng modun,.. thì giờ đây thế giới đang ưu về sử dụng hướng đối tượng.Nếu như trước đây chúng ta lập trình với hướng thủ tục thì sẽ chia thành các hàm để xử lý, thì giờ đây khi sử dụng hướng đối tượng thì chúng ta sẽ chia ra thành các đối tượng để xử lý.',9,1,'2022-01-25 17:26:16','2022-02-16 02:09:26','3_1643156776.png'),(26,'Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng','-Lập trình hướng đối tượng (gọi tắt là OOP - object-oriented programming) là một kĩ thuật lập trình hỗ trợ công nghệ đối tượng. Nếu như trước kia là các kiểu lập trình hướng thủ tục, hướng modun,.. thì giờ đây thế giới đang ưu về sử dụng hướng đối tượng.Nếu như trước đây chúng ta lập trình với hướng thủ tục thì sẽ chia thành các hàm để xử lý, thì giờ đây khi sử dụng hướng đối tượng thì chúng ta sẽ chia ra thành các đối tượng để xử lý.',8,1,'2022-01-25 22:50:22','2022-02-16 02:09:14','3_1643176222.png'),(27,'Bài 5: Cách tính chất đặc thù của hướng đối tượng','-Lập trình hướng đối tượng (gọi tắt là OOP - object-oriented programming) là một kĩ thuật lập trình hỗ trợ công nghệ đối tượng. Nếu như trước kia là các kiểu lập trình hướng thủ tục, hướng modun,.. thì giờ đây thế giới đang ưu về sử dụng hướng đối tượng.Nếu như trước đây chúng ta lập trình với hướng thủ tục thì sẽ chia thành các hàm để xử lý, thì giờ đây khi sử dụng hướng đối tượng thì chúng ta sẽ chia ra thành các đối tượng để xử lý.',9,1,'2022-01-25 22:50:29','2022-02-16 02:09:03','2_1644985139.jpg'),(29,'Bài 9: Lập trình Hướng đối tượng là gì? và ưu điểm của nó','Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Mauris fermentum dictum magna.',10,1,'2022-01-26 06:38:58','2022-02-16 02:08:57','a_1643204338.jpg'),(32,'aaaaaaaaaaa','Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng',2,1,'2022-02-13 21:16:08','2022-02-16 02:08:24','lap_1644812248.png'),(33,'Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng','Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng',8,1,'2022-02-13 21:16:26','2022-02-16 02:08:48','5_1644812186.png'),(34,'Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng','Bài 4: Các giới hạn quyền của thuộc tính, phương thước trong hướng đối tượng',3,1,'2022-02-13 21:16:46','2022-02-16 02:08:41','3_1644814081.png'),(35,'aaaaaaaaa','aaaaaaaaaa',2,1,'2022-02-15 00:47:50','2022-02-16 02:08:35','3_1644911270.png'),(36,'Post1','Post1',1,1,'2022-02-21 01:32:19','2022-02-21 01:32:39','imager_58_6263_700_1645432359.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (2,1,1,NULL,NULL),(3,1,6,NULL,NULL),(5,3,6,NULL,NULL),(6,2,8,NULL,NULL),(7,4,8,NULL,NULL),(8,5,8,NULL,NULL),(9,6,9,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2022-01-25 17:26:16','2022-01-25 17:26:17'),(6,'Subadmin','2022-02-15 01:28:41','2022-02-15 01:28:41'),(8,'Custormer','2022-02-16 02:05:50','2022-02-16 02:05:50'),(9,'Write','2022-02-21 01:33:13','2022-02-21 01:33:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cuongpv','congpv95@gmail.com','0898166870',NULL,'$2y$10$gRGz0DqgOiMWsSLswkf2YeY5hn/ebXW5kgpycogqCorE4dJGbrda6','vTH9zBpY4m2n4HDKO1XQaC13URGJGV1vatnAXopJ9kukk1oVfBiiKpwOacrG','2022-01-21 00:01:07','2022-02-21 01:37:29','Naruto-Wallpaper-7_1645432649.jpg'),(2,'tuan2','tuan2@gmail.com','0367419444',NULL,'$2y$10$10DKZoij99Z3O7uAwpTz8er4dXX41beJfNHxXH9rFbsjt77kJjEWC',NULL,'2022-01-27 18:34:55','2022-02-17 00:15:06','photo-13-1608128489380570978445_1645082106.jpg'),(3,'tuan22','tuan22@gmail.com','0367419444',NULL,'$2y$10$as12egASTo0foTmk6UBBi.L0TwkEduGg1ZuYyApRSkCfYnJfVymeK',NULL,'2022-01-27 18:39:34','2022-02-17 00:18:37','hinh-nen-anime-cho-may-tinh-35-1_1645082317.jpg'),(4,'tuannguyen','tuan26@gmail.com','0367419444',NULL,'$2y$10$EyCn4ktEU7fqA4Dqih/dcOcuhePUtu3pFDTDJTEvLlsWZ9aP2ua5G',NULL,'2022-02-16 03:04:21','2022-02-16 03:04:21',NULL),(5,'tuanhh','tuan27@gmail.com',NULL,NULL,'$2y$10$NGI62MfgTyCommIdli9n.Onina.TpnCDXTFPswlLFM0eBXbZJ4GzG',NULL,'2022-02-17 02:49:38','2022-02-17 02:49:38',NULL),(6,'tuan','tuan49@gmail.com','0367419444',NULL,'$2y$10$zCSmko.10IkEv4FtuE6/KO2bCQw3o/Ll89VGHI4WFH.v53qLFQ7MC',NULL,'2022-02-21 01:28:05','2022-02-21 01:28:05',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-03 17:23:21
