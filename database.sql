-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+03:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `password`, `full_name`) VALUES
('admin',	'$2y$10$kzMGzeJqtCNMgDAEj.M/h.V.jMMXrSHmZNrXcAwz8FjV9DuQxgDcC',	'Algernop Krieger');

-- 2020-05-21 21:10:43
