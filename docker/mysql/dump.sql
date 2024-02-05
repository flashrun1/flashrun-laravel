-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: flashrun
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_08_01_190524_create_races_table',1),(6,'2022_08_01_190751_create_orders_table',1),(7,'2022_08_03_183603_update_orders_table_add_name',2),(8,'2022_08_05_053603_add_type_in_orders_table',3),(9,'2022_08_15_053603_add_club_in_orders_table',4),(10,'2023_03_03_004841_update_orders_table_add_promocode',5),(11,'2023_03_15_212903_create_promocodes_table',6),(12,'2023_05_26_223723_update_orders_table_add_city',7),(13,'2023_07_05_201226_update_orders_table_add_race_id',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `race_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_race_id_foreign` (`race_id`),
  CONSTRAINT `orders_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6352 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (6303,'vitalik.kor@gmail.com',3,'UAH',595,'',NULL,'2023-07-05 22:36:42','2023-07-06 06:52:45','Vitalii Korolchuk','+380976534373','10000','Воля FEST','ocr','flashrun',NULL,'Хмельницький',5),(6304,'Rybak.snizhsna@gmail.com',3,'UAH',700,'',NULL,'2023-07-06 03:23:52','2023-07-06 06:52:40','Сніжана Крвль','0977464301','1000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6305,'Rybak.snizhsna@gmail.com',3,'UAH',595,'',NULL,'2023-07-06 03:26:08','2023-07-06 06:52:35','Сніжана Крвль','0977464301','1000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6306,'lubovopolska60@gmail.com',0,'UAH',0,'',NULL,'2023-07-06 16:39:21','2023-07-06 16:39:21','Якобюк Максим','0985625074','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6307,'lubovopolska60@gmail.com',0,'UAH',0,'',NULL,'2023-07-06 16:40:30','2023-07-06 16:40:30','Опольська Маргарита','0985625074','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6308,'igor.dil26@gmail.com',3,'UAH',700,'',NULL,'2023-07-06 20:24:36','2023-07-07 12:40:36','Ігор Діль','0635747541','10000','Воля FEST','ocr',NULL,NULL,'Хмельницкий',5),(6309,'kozhushkodianka@gmail.com',3,'UAH',700,'',NULL,'2023-07-07 12:28:14','2023-07-07 12:40:26','Diana','+380 (96) 001-63-44','1000','Воля FEST','ocr','flashrun',NULL,'Khmelnytskyi',5),(6310,'nastya.burdenuk@gmail.com',3,'UAH',700,'',NULL,'2023-07-07 12:30:41','2023-07-07 12:40:20','Бурденюк','0674251229','1000','Воля FEST','ocr','Flashrun',NULL,'Хмельницький',5),(6311,'rudima35@gmail.com',3,'UAH',700,'',NULL,'2023-07-07 12:32:10','2023-07-07 12:40:05','Ірина Білявець','0979355098','0','Воля FEST','cross-duathlon','Flash run',NULL,'Хмельницький',5),(6312,'Rybak.snizhsna@gmail.com',3,'UAH',700,'',NULL,'2023-07-07 14:35:32','2023-07-09 11:01:37','Сніжана Крвль','0977464301','1000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6313,'lubovopolska60@gmail.com',0,'UAH',0,'',NULL,'2023-07-07 18:54:00','2023-07-07 18:54:00','Якобюк Даніїл','0985625074','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6314,'arenaaar@gmail.com',2,'UAH',595,'',NULL,'2023-07-09 10:59:48','2023-07-09 11:01:01','Pavlo Bobko','0968634212','10000','Воля FEST','ocr','FlashRun',NULL,'Хмельницький',5),(6315,'lubovopolska60@gmail.com',3,'UAH',700,'',NULL,'2023-07-09 11:16:35','2023-07-09 11:23:47','Любов Якобюк','0985625074','1000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6316,'lubovopolska60@gmail.com',0,'UAH',700,'',NULL,'2023-07-09 11:27:08','2023-07-09 11:27:08','Любов Якобюк','0985625074','0','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6317,'miroslavastolarova30@gmail.com',0,'UAH',0,'',NULL,'2023-07-09 11:29:43','2023-07-09 11:29:43','Владислав Столяров','+38 (096) 737-37-24','100','Воля FEST','kids',NULL,NULL,'м.Вінниця (Вінницька Область/М.Вінниця)',5),(6318,'viktorijadudar14@gmail.com',0,'UAH',0,'',NULL,'2023-07-09 11:38:49','2023-07-09 11:38:49','Роман Майдан','0682026241','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6319,'viktorijadudar14@gmail.com',0,'UAH',0,'',NULL,'2023-07-09 11:40:02','2023-07-09 11:40:02','Єва Майдан','0682026241','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6320,'viktorijadudar14@gmail.com',0,'UAH',700,'',NULL,'2023-07-09 11:40:38','2023-07-09 11:40:38','Viktorija Dudar','0682026241','1000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6321,'viktorijadudar14@gmail.com',0,'UAH',700,'',NULL,'2023-07-09 11:41:57','2023-07-09 11:41:57','Viktorija Dudar','0682026241','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6322,'belinga@ukr.net',0,'UAH',700,'',NULL,'2023-07-09 11:49:38','2023-07-09 11:49:38','Інга Бєляєва-Халіпова','0503978855','0','Воля FEST','scandi-walk','Nordic People Club Khmelnytskyi',NULL,'Хмельницький',5),(6323,'anasko8588@gmail.com',2,'UAH',700,'',NULL,'2023-07-09 12:19:55','2023-07-09 12:20:23','Яна Щука','0671576910','10000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6324,'Antoninarozuman@gmail.com',0,'UAH',700,'',NULL,'2023-07-09 12:40:05','2023-07-09 12:40:05','Антоніна Розуман','0671242838','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6325,'wowa271595@gmail.com',2,'UAH',700,'',NULL,'2023-07-09 15:25:13','2023-07-09 15:25:33','Вова Ризак','0978605840','0','Воля FEST','cross-duathlon','Подільські ВОВКИ',NULL,'Хмельницький',5),(6326,'larina196825@gmail.com',0,'UAH',0,'',NULL,'2023-07-09 19:06:41','2023-07-09 19:06:41','Лубенець  Павел','+38 (068) 6240684','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6327,'ruslan.orient@gmail.com',3,'UAH',700,'',NULL,'2023-07-10 07:57:51','2023-07-11 07:14:58','Руслан Бойко','0673846463','0','Воля FEST','cross-duathlon','Подільські Вовки',NULL,'Хмельницький',5),(6328,'Dzhubaba.den@gmail.com',0,'UAH',700,'',NULL,'2023-07-10 17:16:43','2023-07-10 17:16:43','Денис Джубаба','0971647709','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6329,'pokh.andriy@gmail.com',0,'UAH',700,'',NULL,'2023-07-11 06:04:40','2023-07-11 06:04:40','Андрій Пох','+380988624543','5000','Воля FEST','ocr','Iron Club',NULL,'Хмельницький',5),(6330,'pokh.andriy@gmail.com',2,'UAH',700,'',NULL,'2023-07-11 06:05:22','2023-07-11 06:05:43','Андрій Пох','+380988624543','5000','Воля FEST','ocr','Iron Club',NULL,'Хмельницький',5),(6331,'igor.dil26@gmail.com',0,'UAH',700,'',NULL,'2023-07-11 06:16:16','2023-07-11 06:16:16','Ігор Діль','38 097 245 95 94','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6332,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:07:19','2023-07-11 07:14:40','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6333,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:07:23','2023-07-11 07:14:34','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6334,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:07:26','2023-07-11 07:14:27','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6335,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:07:29','2023-07-11 07:14:21','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6336,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:07:29','2023-07-11 07:14:14','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6337,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-11 07:08:26','2023-07-11 07:14:06','Снежанна Кріль','0977464301','3000','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6338,'Rybak.snizhsna@gmail.com',3,'UAH',700,'',NULL,'2023-07-11 07:12:20','2023-07-11 07:13:59','Снежанна Кріль','0977464301','0','Воля FEST','cross-duathlon',NULL,NULL,'Хмельницький',5),(6339,'Rybak.snizhsna@gmail.com',3,'UAH',700,'',NULL,'2023-07-11 07:12:46','2023-07-11 07:13:53','Сніжана Крвль','0977464301','0','Воля FEST','crossfit-beginners',NULL,NULL,'Хмельницький',5),(6340,'Rybak.snizhsna@gmail.com',3,'UAH',0,'',NULL,'2023-07-11 07:13:10','2023-07-11 07:13:46','Сніжана Крвль','0977464301','100','Воля FEST','kids',NULL,NULL,'Хмельницький',5),(6341,'sguranski@gmail.com',0,'UAH',700,'',NULL,'2023-07-11 07:40:55','2023-07-11 07:40:55','Сергій Гуранський','0632732116','10000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6342,'sergeystorm99@gmail.com',0,'UAH',700,'',NULL,'2023-07-11 08:38:21','2023-07-11 08:38:21','Жолнерук Сергій','+380 (68) 489-70-52','10000','Воля FEST','ocr','Active Life',NULL,'Олександрія',5),(6343,'daniiltimachov@gmail.com',0,'UAH',700,'',NULL,'2023-07-11 14:16:02','2023-07-11 14:16:02','Даніїл Тімачов','0956799592','10000','Воля FEST','ocr','Iron Club Lviv',NULL,'Львів',5),(6344,'shuklin.eduard.ua@gmail.com',0,'UAH',700,'',NULL,'2023-07-12 17:22:44','2023-07-12 17:22:44','Eduard','0681136375','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6345,'nastya.makarova.90@gmail.co',2,'UAH',700,'',NULL,'2023-07-12 17:54:56','2023-07-12 17:58:08','Настя','0989448295','5000','Воля FEST','ocr',NULL,NULL,'Хмельницький',5),(6346,'igorsharlay151085@gmail.com',0,'UAH',700,'',NULL,'2023-07-12 18:21:17','2023-07-12 18:21:17','Игорь Шарлай','0953574970','10000','Воля FEST','ocr',NULL,NULL,'Бахмут',5),(6347,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-13 05:23:54','2023-07-13 06:55:58','Сніжана Крвль','0977464301','1500','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6348,'Rybak.snizhsna@gmail.com',3,'UAH',500,'',NULL,'2023-07-13 06:51:41','2023-07-13 06:55:47','Сніжана Крвль','0977464301','1500','Воля FEST','scandi-walk',NULL,NULL,'Хмельницький',5),(6349,'rvasylenko9@gmail.com',0,'UAH',700,'',NULL,'2023-07-13 11:16:04','2023-07-13 11:16:04','Roman Vasylenko','0664625407','10000','Воля FEST','ocr',NULL,NULL,'Вишневе',5),(6350,'rvasylenko9@gmail.com',0,'UAH',700,'',NULL,'2023-07-13 11:17:33','2023-07-13 11:17:33','Roman Vasylenko','0664625407','5000','Воля FEST','ocr',NULL,NULL,'Вишневе',5),(6351,'vadim.veyn@gmail.com',2,'UAH',700,'',NULL,'2023-07-13 18:00:26','2023-07-13 18:04:05','Сергун Вадим','+380987176066','0','Воля FEST','crossfit-beginners','Panda',NULL,'Хмельницький',5);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
INSERT INTO `password_resets` VALUES ('emchuk86@gmail.com','$2y$10$1fncEE6E.x35Xk2yrCTuDeMb1G/YDsH8GywJb8r4yMObil7qBdA8y','2023-05-25 09:50:18');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
-- Table structure for table `promocodes`
--

DROP TABLE IF EXISTS `promocodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promocodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL DEFAULT '0',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `actuations` int DEFAULT NULL,
  `actuations_used` int DEFAULT NULL,
  `from` datetime DEFAULT NULL,
  `to` datetime DEFAULT NULL,
  `discount_type` tinyint NOT NULL,
  `discount_value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promocodes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocodes`
--

LOCK TABLES `promocodes` WRITE;
/*!40000 ALTER TABLE `promocodes` DISABLE KEYS */;
INSERT INTO `promocodes` VALUES (1,1,'Flash2304',0,NULL,NULL,NULL,NULL,1,15,'2023-03-28 06:30:19','2023-03-28 06:30:19'),(8,1,'VOLYA15',0,NULL,NULL,NULL,NULL,1,15,NULL,NULL);
/*!40000 ALTER TABLE `promocodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `races`
--

DROP TABLE IF EXISTS `races`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `races` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `races`
--

LOCK TABLES `races` WRITE;
/*!40000 ALTER TABLE `races` DISABLE KEYS */;
INSERT INTO `races` VALUES (1,'Воля FEST','volia-fest','2022-08-02 10:37:41','2022-08-02 10:37:41'),(2,'ПроскурівRUN','proskurivrun','2023-03-03 01:00:37','2023-03-03 01:00:37'),(3,'Благодійний Забіг','charity-valeriy-odaynuk','2023-04-06 22:08:40','2023-04-06 22:08:40'),(4,'UkraineRUN','ukraine-run',NULL,NULL),(5,'Воля FEST','freedom-fest-2023','2023-07-05 22:28:38','2023-07-05 22:28:38');
/*!40000 ALTER TABLE `races` ENABLE KEYS */;
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Admin','admin@material.com','2022-08-16 22:25:44','$2y$10$DVAGTLxiTYWd85dYfhcpKulZnEhQk5b9/mp0rVkIU1sucWp0AmqYO','RppKpb8jYBxYiQdj6ZNf35SUZt1IjQ12BpZ55s43rLKYpcjgMQnlE6QHobqq','2022-08-16 22:25:44','2022-08-16 23:01:03'),(2,'Маргарита','ritolka111@gmail.com',NULL,'$2y$10$wCjjT4mVSzfa1f9pLeCWo.zC/IojqGWsXr/KBm1I4BM.KM21kNm3K',NULL,'2022-08-18 12:58:09','2022-08-18 12:58:09'),(3,'rehan','pkvgamesgo@gmail.com',NULL,'$2y$10$.16XHqj6/TMjHP5.GKo0TOtgl0TpQ7DEKWp96FXLESsDA/spOcA4i',NULL,'2022-12-06 11:33:46','2022-12-06 11:33:46'),(4,'Cristi Project','tutor@example.com',NULL,'$2y$10$ozILJc6npxI7yC8yAmRar.YsYZPki9rZ/E.wVjvQk8/tLDaKXKGSu',NULL,'2023-01-01 19:55:33','2023-01-01 19:55:33'),(5,'Roby Kurniawan','robyxplt@gmail.com',NULL,'$2y$10$RGAbkFLVk0oeMznZtCEkI.nZ77OElm5HuHV4Zjr6UWJtm5ZaoI7uG',NULL,'2023-01-06 23:14:08','2023-01-06 23:14:08'),(6,'Олег','emchuk86@gmail.com',NULL,'$2y$10$UwSvLEsYUB7j9l/l2Oxzt.xMuiOALqI4ZxwiumtnfjrF4vnuA/q3a',NULL,'2023-03-31 09:38:38','2023-03-31 09:38:38'),(7,'Yr','kondratyukys82@gmail.com',NULL,'$2y$10$WZN31/zjOHrqC0j4jzXg8eg9VVi.g7FBSlTlJvJ1UUzCqe.gtBlaC',NULL,'2023-04-29 09:58:14','2023-04-29 09:58:14'),(8,'Oleh','orfey2007@ukr.net',NULL,'$2y$10$LATIhfNxnlcbcIsYO3khdeGDM5iUV.3TgZBNCSxyAm74yYtPVFU6G',NULL,'2023-05-25 09:51:47','2023-05-25 09:51:47');
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

-- Dump completed on 2023-07-13 20:53:28
