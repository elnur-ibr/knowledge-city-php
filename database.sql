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

-- Dumping structure for table knowledge-city.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knowledge-city.students: ~100 rows (approximately)
DELETE FROM `students`;
INSERT INTO `students` (`id`, `first_name`, `last_name`, `group_name`, `created_at`, `updated_at`) VALUES
	(1, 'Rebeka', 'Macejkovic', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(2, 'Joaquin', 'Koepp', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(3, 'Justice', 'Abbott', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(4, 'Rebeka', 'Klein', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(5, 'Santiago', 'Steuber', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(6, 'Toni', 'Hayes', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(7, 'Rylee', 'Fay', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(8, 'Lenna', 'Hermann', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(9, 'Noelia', 'Satterfield', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(10, 'Daron', 'West', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(11, 'Victoria', 'Kuhn', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(12, 'Rasheed', 'Gleichner', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(13, 'Amos', 'Bauch', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(14, 'Helen', 'Davis', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(15, 'Emilia', 'Carroll', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(16, 'Jada', 'Hilpert', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(17, 'Doris', 'Conroy', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(18, 'Guy', 'Turner', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(19, 'Issac', 'Pagac', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(20, 'Tia', 'Hirthe', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(21, 'Delfina', 'Pacocha', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(22, 'Juana', 'Denesik', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(23, 'Emmalee', 'Hammes', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(24, 'Eden', 'Treutel', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(25, 'Denis', 'Aufderhar', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(26, 'Wilfred', 'Gulgowski', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(27, 'Lessie', 'Lind', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(28, 'Nicola', 'Carroll', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(29, 'Santino', 'Herzog', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(30, 'Angeline', 'Willms', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(31, 'Georgianna', 'Schaefer', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(32, 'Diamond', 'Yost', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(33, 'Raleigh', 'Koepp', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(34, 'Chaya', 'Marvin', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(35, 'Cydney', 'Torp', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(36, 'Bridie', 'Marks', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(37, 'Eileen', 'Treutel', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(38, 'Keeley', 'Nicolas', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(39, 'Curt', 'Wuckert', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(40, 'Lyda', 'Maggio', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(41, 'Maxie', 'Gleason', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(42, 'Norwood', 'Cummerata', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(43, 'Jeanne', 'Streich', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(44, 'Jamarcus', 'Murphy', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(45, 'Oren', 'Blanda', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(46, 'Louisa', 'McKenzie', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(47, 'Deontae', 'Batz', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(48, 'Grayce', 'Sanford', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(49, 'Granville', 'Hahn', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(50, 'Verona', 'Koch', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(51, 'Lottie', 'Lynch', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(52, 'Garett', 'Schumm', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(53, 'Junior', 'Ankunding', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(54, 'Mariano', 'Sanford', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(55, 'Carmelo', 'Hegmann', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(56, 'Drake', 'Wehner', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(57, 'Eliseo', 'Zboncak', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(58, 'Donato', 'Beatty', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(59, 'Emile', 'Hudson', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(60, 'Kaycee', 'Torphy', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(61, 'Laron', 'Blick', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(62, 'Constance', 'Schmidt', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(63, 'Bret', 'Marvin', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(64, 'Odie', 'Keebler', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(65, 'Reggie', 'Lemke', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(66, 'Tito', 'Goodwin', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(67, 'Norwood', 'Blick', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(68, 'Jimmie', 'Schiller', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(69, 'Christiana', 'King', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(70, 'Brock', 'Hill', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(71, 'Mckayla', 'Gorczany', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(72, 'Julia', 'Krajcik', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(73, 'Mertie', 'Russel', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(74, 'Kristoffer', 'Romaguera', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(75, 'Declan', 'Mohr', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(76, 'Morgan', 'Johnson', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(77, 'Adonis', 'Kautzer', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(78, 'Eula', 'Gorczany', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(79, 'Betsy', 'Gleichner', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(80, 'Miguel', 'Volkman', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(81, 'Maudie', 'Zboncak', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(82, 'Christophe', 'Ankunding', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(83, 'Tara', 'Carter', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(84, 'Darion', 'Mertz', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(85, 'Mathilde', 'McDermott', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(86, 'Ellsworth', 'Stroman', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(87, 'Clair', 'Jast', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(88, 'Elliott', 'Boyer', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(89, 'Jevon', 'Koepp', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(90, 'Elenor', 'Rempel', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(91, 'Kris', 'Gerlach', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(92, 'Irwin', 'Nitzsche', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(93, 'Anne', 'Reinger', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(94, 'Dorcas', 'Gorczany', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(95, 'Shirley', 'Hilpert', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(96, 'Gilda', 'Champlin', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(97, 'Ransom', 'Blick', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(98, 'Gavin', 'Hirthe', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(99, 'Edd', 'Kemmer', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15'),
	(100, 'Georgette', 'Littel', 'Default group', '2022-10-04 09:18:15', '2022-10-04 09:18:15');

-- Dumping structure for table knowledge-city.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knowledge-city.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58'),
	(2, 'admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58'),
	(3, '1admin@admin.com', '$2y$10$ldJSrsTINIpaWu8PhX1oQel7EWkctBrMpMmhXhWawNIf8NDs9kAGO', '2022-09-24 18:29:58', '2022-09-24 18:29:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
