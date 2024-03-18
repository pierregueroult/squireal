-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2024 at 12:18 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squireal`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `badge_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`badge_id`),
  UNIQUE KEY `Badge_badge_id_key` (`badge_id`),
  UNIQUE KEY `Badge_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `userId` int NOT NULL,
  `eventId` int NOT NULL,
  PRIMARY KEY (`chat_id`),
  UNIQUE KEY `Chat_chat_id_key` (`chat_id`),
  KEY `Chat_userId_fkey` (`userId`),
  KEY `Chat_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `Event_event_id_key` (`event_id`),
  UNIQUE KEY `Event_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE IF NOT EXISTS `keyword` (
  `keyword_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`keyword_id`),
  UNIQUE KEY `Keyword_keyword_id_key` (`keyword_id`),
  UNIQUE KEY `Keyword_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `newsletter_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `verified` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`newsletter_id`),
  UNIQUE KEY `Newsletter_newsletter_id_key` (`newsletter_id`),
  UNIQUE KEY `Newsletter_email_key` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `Post_post_id_key` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `image`, `description`, `date`, `userId`) VALUES
(1, '2_1.png', 'Salut c\'est pierre !', '2024-03-15 12:17:37', 2),
(2, '2_2.jpg', 'Un autre poste asap.', '2024-03-15 12:18:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `postevent`
--

DROP TABLE IF EXISTS `postevent`;
CREATE TABLE IF NOT EXISTS `postevent` (
  `postEvent_id` int NOT NULL AUTO_INCREMENT,
  `postId` int NOT NULL,
  `eventId` int NOT NULL,
  PRIMARY KEY (`postEvent_id`),
  UNIQUE KEY `PostEvent_postEvent_id_key` (`postEvent_id`),
  KEY `PostEvent_postId_fkey` (`postId`),
  KEY `PostEvent_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postkeyword`
--

DROP TABLE IF EXISTS `postkeyword`;
CREATE TABLE IF NOT EXISTS `postkeyword` (
  `postKeyword_id` int NOT NULL AUTO_INCREMENT,
  `postId` int NOT NULL,
  `keywordId` int NOT NULL,
  PRIMARY KEY (`postKeyword_id`),
  UNIQUE KEY `PostKeyword_postKeyword_id_key` (`postKeyword_id`),
  KEY `PostKeyword_postId_fkey` (`postId`),
  KEY `PostKeyword_keywordId_fkey` (`keywordId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `rank_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_points` int NOT NULL,
  `max_points` int NOT NULL,
  PRIMARY KEY (`rank_id`),
  UNIQUE KEY `Rank_rank_id_key` (`rank_id`),
  UNIQUE KEY `Rank_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `User_user_id_key` (`user_id`),
  UNIQUE KEY `User_username_key` (`username`),
  UNIQUE KEY `User_email_key` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `name`, `password`, `phone`, `points`) VALUES
(1, 'pierregueroult', 'pierre-gueroult@laposte.net', 'Pierre Gueroult', '$2y$10$brLGL7TCHJtzwvnjUMpv/uB2FPvXuCFtxw3OR6HlYVVBNJU071MW.', '0652200785', 0),
(2, 'herenlol', 'herenlol@herenlol.fr', 'Lola Herenlol', '$2y$10$2ILZwhE6TrafuaWRdIIGQeInglkryh/zYmE5eEUfEQZt/Yg5UIyXS', '0520232526', 0),
(3, 'pailleronde', 'pierre.gueroult@univ-rouen.fr', 'Pierre Gueroult', '$2y$10$43Zy.Qbv5q.0DRvvx/VoDuIrNWNWPkuj/XVogu3seuEkzCq9nFeFO', '0652200758', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userbadge`
--

DROP TABLE IF EXISTS `userbadge`;
CREATE TABLE IF NOT EXISTS `userbadge` (
  `userBadge_id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `badgeId` int NOT NULL,
  PRIMARY KEY (`userBadge_id`),
  UNIQUE KEY `UserBadge_userBadge_id_key` (`userBadge_id`),
  KEY `UserBadge_userId_fkey` (`userId`),
  KEY `UserBadge_badgeId_fkey` (`badgeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userevent`
--

DROP TABLE IF EXISTS `userevent`;
CREATE TABLE IF NOT EXISTS `userevent` (
  `userEvent_id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `eventId` int NOT NULL,
  PRIMARY KEY (`userEvent_id`),
  UNIQUE KEY `UserEvent_userEvent_id_key` (`userEvent_id`),
  KEY `UserEvent_userId_fkey` (`userId`),
  KEY `UserEvent_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
