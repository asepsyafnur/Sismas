-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_ippmp.arsipsk
CREATE TABLE IF NOT EXISTS `arsipsk` (
  `id_arsip` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_arsip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_arsip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.arsipsk: ~6 rows (approximately)
/*!40000 ALTER TABLE `arsipsk` DISABLE KEYS */;
REPLACE INTO `arsipsk` (`id_arsip`, `kode`, `kode_arsip`) VALUES
	(1, 'K1', 'kode surat biasa A '),
	(2, 'K2', 'kode surat biasa B'),
	(3, 'K3', 'kode surat keputusan '),
	(4, 'K4', 'kode surat  mandat '),
	(5, 'K5', 'kode surat tugas'),
	(6, 'K6', 'kode surat rekomendasi');
/*!40000 ALTER TABLE `arsipsk` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.arsipsm
CREATE TABLE IF NOT EXISTS `arsipsm` (
  `id_arsip` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_arsip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_arsip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.arsipsm: ~6 rows (approximately)
/*!40000 ALTER TABLE `arsipsm` DISABLE KEYS */;
REPLACE INTO `arsipsm` (`id_arsip`, `kode`, `kode_arsip`) VALUES
	(1, 'M1', 'kode surat biasa A '),
	(2, 'M2', 'kode surat biasa B '),
	(3, 'M3', 'kode surat keputusan '),
	(4, 'M4', 'kode surat mandat '),
	(5, 'M5', 'kode surat tugas'),
	(6, 'M6', 'kode surat rekomendasi');
/*!40000 ALTER TABLE `arsipsm` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_06_18_030603_create_arsipsk_table', 1),
	(2, '2021_06_18_031853_create_arsipsm_table', 1),
	(3, '2021_06_18_032035_create_sm_table', 2),
	(4, '2021_06_18_033007_create_sk_table', 2),
	(5, '2014_10_12_100000_create_password_resets_table', 3),
	(6, '2014_10_12_000000_create_users_table', 4),
	(7, '2019_08_19_000000_create_failed_jobs_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.sk
CREATE TABLE IF NOT EXISTS `sk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_arsip` int(10) NOT NULL DEFAULT '0',
  `tgl_terima` date NOT NULL,
  `nmr_st` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_st` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.sk: ~2 rows (approximately)
/*!40000 ALTER TABLE `sk` DISABLE KEYS */;
REPLACE INTO `sk` (`id`, `id_arsip`, `tgl_terima`, `nmr_st`, `tgl_st`, `isi`, `disposisi`, `file`, `created_at`, `updated_at`) VALUES
	(7, 4, '2021-06-30', 'sdas', '2021-06-23', 'ssad', 'asdad', '1624409008.txt', NULL, NULL),
	(8, 3, '2021-06-23', 'jd', '2021-06-23', 'kdnnf', 'dad1', '1624411147.txt', NULL, NULL);
/*!40000 ALTER TABLE `sk` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.sm
CREATE TABLE IF NOT EXISTS `sm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_arsip` int(10) NOT NULL DEFAULT '0',
  `tgl_terima` date NOT NULL,
  `nmr_st` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_st` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.sm: ~1 rows (approximately)
/*!40000 ALTER TABLE `sm` DISABLE KEYS */;
REPLACE INTO `sm` (`id`, `id_arsip`, `tgl_terima`, `nmr_st`, `tgl_st`, `isi`, `disposisi`, `file`, `created_at`, `updated_at`) VALUES
	(8, 5, '2021-06-21', '001/ST/K.STMIKDP/IV/1999H', '2021-06-21', 'Permintaan panitia', 'Ketua Umum', '1624276440.pdf', NULL, NULL);
/*!40000 ALTER TABLE `sm` ENABLE KEYS */;

-- Dumping structure for table db_ippmp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ippmp.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$pqVMSGF1.UyUtyMBZZaUou4Gcc5AKdi4WmAa9KvBrJ/wObFsoKsRm', NULL, 'admin', 'default.png', '2021-06-21 22:41:58', '2021-06-21 22:41:58'),
	(2, 'hainul', 'hainul@gmail.com', NULL, '$2y$10$IvKJSQK0x94HwgL/SXAzVOdEEusN6.l2SE2ER8iL4nUeeHkZWBsMG', NULL, 'ketua', 'default.png', '2021-06-22 02:51:01', '2021-06-22 02:51:01'),
	(3, 'asep syafnur', 'asepsyafnur@gmail.com', NULL, '$2y$10$F/GpHZIdp6EVt454M0TSyeRh98avwhpv6art/IytEPVGT82EIckYa', NULL, 'sekretaris', 'default.png', '2021-06-22 02:51:52', '2021-06-22 02:51:52'),
	(4, 'ilmi', 'ilmi@gmail.com', NULL, '$2y$10$0vryqZa/16MWloOhAjtPT.jTQmrrK/ivcZN52wWu1fkMYgQvbo3Ee', NULL, 'humas', 'default.png', '2021-06-22 02:52:31', '2021-06-22 02:52:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
