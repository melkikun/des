-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.5121
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table des.data_pasal
CREATE TABLE IF NOT EXISTS `data_pasal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_pertama` int(11) DEFAULT NULL,
  `tahun_kedua` int(11) DEFAULT NULL,
  `id_pasal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_data_pasal_pasal` (`id_pasal`),
  CONSTRAINT `FK_data_pasal_pasal` FOREIGN KEY (`id_pasal`) REFERENCES `pasal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table des.pasal
CREATE TABLE IF NOT EXISTS `pasal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_pelanggaran` int(11) DEFAULT NULL,
  `pasal_pelanggaran` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pasal_users` (`id_user`),
  CONSTRAINT `FK_pasal_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table des.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
