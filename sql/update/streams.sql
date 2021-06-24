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

-- Дамп структуры для таблица wlgroup.streams
CREATE TABLE IF NOT EXISTS `streams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `display_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `profile_image_url` varchar(199) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `view_count` varchar(199) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `title` varchar(199) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы wlgroup.streams: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `streams` DISABLE KEYS */;
INSERT IGNORE INTO `streams` (`id`, `name`, `display_name`, `description`, `user_id`, `profile_image_url`, `view_count`, `title`, `type`) VALUES
	(3, 'prampampamgaming', 'PrampampamGaming', '', '61753792', 'https://static-cdn.jtvnw.net/jtv_user_pictures/36e84472-6629-4c13-9ae2-2d81f1c933c2-profile_image-300x300.jpeg', '1947124', '', 'offline'),
	(4, 'the_rock_33', 'The_Rock_33', 'Играю в различные игры и занимаюсь разработкой WEB приложений)', '116068532', 'https://static-cdn.jtvnw.net/user-default-pictures-uv/dbdc9198-def8-11e9-8681-784f43822e80-profile_image-300x300.png', '86', '', 'offline'),
	(5, 'justol9', 'Justol9', '', '147583421', 'https://static-cdn.jtvnw.net/jtv_user_pictures/justol9-profile_image-b4efeecc48d2cc73-300x300.jpeg', '157997', 'И снова здравствуйте)', 'live'),
	(6, 'thepadlo', 'ThePADLO', 'Пожилой стрямер по DBD, играю за маньяков. Великий тактик и стратег', '141008088', 'https://static-cdn.jtvnw.net/jtv_user_pictures/f0cd7ed0-c311-4f5e-8f5a-f88ac2eaa28f-profile_image-300x300.png', '537395', 'Маньяки + Сурикаты - Новый Ролик на Ютубе ( ͠° ͟ʖ ͡°)  !немезис !тирлист', 'live');
/*!40000 ALTER TABLE `streams` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
