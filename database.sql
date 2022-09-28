-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table knowledge-city.api_users
CREATE TABLE IF NOT EXISTS `api_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knowledge-city.api_users: ~3 rows (approximately)
DELETE FROM `api_users`;
INSERT INTO `api_users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58'),
	(2, 'admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58'),
	(3, '1admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
