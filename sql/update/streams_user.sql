-- --------------------------------------------------------
-- Хост:                         92.63.192.152
-- Версия сервера:               8.0.25-0ubuntu0.20.04.1 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица wlgroup.streams_user
CREATE TABLE IF NOT EXISTS `streams_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_user` varchar(50) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы wlgroup.streams_user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `streams_user` DISABLE KEYS */;
INSERT IGNORE INTO `streams_user` (`id`, `name_user`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'Titan', 17, 2, '2021-06-24 14:36:00', '2021-06-24 14:56:23');
/*!40000 ALTER TABLE `streams_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
