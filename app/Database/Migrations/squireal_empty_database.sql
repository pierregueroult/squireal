-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 fév. 2024 à 21:07
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `squireal`
--

-- --------------------------------------------------------

--
-- Structure de la table `badge`
--

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `badge_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`badge_id`),
  UNIQUE KEY `Badge_badge_id_key` (`badge_id`),
  UNIQUE KEY `Badge_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `Event_event_id_key` (`event_id`),
  UNIQUE KEY `Event_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE IF NOT EXISTS `keyword` (
  `keyword_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`keyword_id`),
  UNIQUE KEY `Keyword_keyword_id_key` (`keyword_id`),
  UNIQUE KEY `Keyword_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `Post_post_id_key` (`post_id`),
  UNIQUE KEY `Post_userId_key` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postevent`
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
-- Structure de la table `postkeyword`
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
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `User_user_id_key` (`user_id`),
  UNIQUE KEY `User_username_key` (`username`),
  UNIQUE KEY `User_email_key` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userbadge`
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
-- Structure de la table `userevent`
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
