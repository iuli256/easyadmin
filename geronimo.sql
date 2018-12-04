-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2018 at 03:08 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geronimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebookAuth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitterAuth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedinAuth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `georgraphy_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C2502824F85E0677` (`username`),
  UNIQUE KEY `UNIQ_C2502824E7927C74` (`email`),
  KEY `IDX_C25028242B74496F` (`georgraphy_id`),
  KEY `IDX_C250282412469DE2` (`category_id`),
  KEY `IDX_C2502824D60322AC` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `password`, `email`, `isActive`, `firstName`, `lastName`, `picture`, `facebookAuth`, `twitterAuth`, `linkedinAuth`, `georgraphy_id`, `category_id`, `updatedAt`, `role_id`) VALUES
(1, 'admin', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'admin', 1, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 1, 1, '2018-11-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frenchValue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `englishValue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `frenchValue`, `englishValue`) VALUES
(1, 'sss', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `geography`
--

DROP TABLE IF EXISTS `geography`;
CREATE TABLE IF NOT EXISTS `geography` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frenchValue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `englishValue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geography`
--

INSERT INTO `geography` (`id`, `frenchValue`, `englishValue`) VALUES
(1, 'www', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `georgraphy_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `releaseDate` datetime NOT NULL,
  `sendPushNotification` tinyint(1) NOT NULL,
  `frenchTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frenchSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frenchDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `frenchAvailable` tinyint(1) NOT NULL,
  `frenchFacebookSharingAvailable` tinyint(1) NOT NULL,
  `frenchFacebookUrlToShare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frenchTwitterSharingAvailable` tinyint(1) NOT NULL,
  `frenchTwitterUrlToShare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frenchLinkedinSharingAvailable` tinyint(1) NOT NULL,
  `frenchLinkedinUrlToShare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8D2B74496F` (`georgraphy_id`),
  KEY `IDX_5A8A6C8D12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `georgraphy_id`, `category_id`, `image`, `status`, `releaseDate`, `sendPushNotification`, `frenchTitle`, `frenchSlug`, `frenchDescription`, `frenchAvailable`, `frenchFacebookSharingAvailable`, `frenchFacebookUrlToShare`, `frenchTwitterSharingAvailable`, `frenchTwitterUrlToShare`, `frenchLinkedinSharingAvailable`, `frenchLinkedinUrlToShare`, `updatedAt`) VALUES
(1, 1, 1, 'IvecoDaily.jpg', 'ddd', '2019-05-06 05:17:00', 1, 'ddd', 'ddd2', 'ddds', 1, 1, 'dddd', 1, 'ddd', 1, 'ddd', '2018-11-24 15:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `save_post`
--

DROP TABLE IF EXISTS `save_post`;
CREATE TABLE IF NOT EXISTS `save_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_USER');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_users`
--
ALTER TABLE `app_users`
  ADD CONSTRAINT `FK_C250282412469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_C25028242B74496F` FOREIGN KEY (`georgraphy_id`) REFERENCES `geography` (`id`),
  ADD CONSTRAINT `FK_C2502824D60322AC` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_5A8A6C8D2B74496F` FOREIGN KEY (`georgraphy_id`) REFERENCES `geography` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
