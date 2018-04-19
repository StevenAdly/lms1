-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2018 at 06:07 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `session20`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `bdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `username`, `email`, `password`, `bdate`) VALUES
(2, 'ste', 'ss', 'qq.qq@d.c', 'f970e2767d0cfe75876ea857f92e319b', '2018-04-09'),
(3, 'steven', 'ss', 'qq.qq@d.c', 'c4ca4238a0b923820dcc509a6f75849b', '2018-04-09'),
(4, 'stetst', 'tst', 'qq.qq@d.com', 'cfcd208495d565ef66e7dff9f98764da', '2018-04-09'),
(6, 'dodonew', 'ss', 'qq.qq@d.c', 'c81e728d9d4c2f636f067f89cc14862c', '2018-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sallery` double NOT NULL,
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fullname`, `username`, `email`, `password`, `sallery`, `sub_id`) VALUES
(4, 'steven adlytst', 's.adly2', 's.adly2@tst.com', 'c4ca4238a0b923820dcc509a6f75849b', 100.99, 5),
(5, 'steven adly3', 's.adly3', 's.adly3@tst.com', '202cb962ac59075b964b07152d234b70', 3000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(60) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`) VALUES
(22, 'davidAdly', 'david', 'david@tst.com', '202cb962ac59075b964b07152d234b70'),
(25, 'steven adlytst', 'sadly', 'ss@tst.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(26, 'abc', 'a', 'a@bs.com', '182be0c5cdcd5072bb1864cdee4d3d6e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
