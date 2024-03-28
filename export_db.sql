-- Adminer 4.8.1 MySQL 5.5.5-10.6.16-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `badge`;
CREATE TABLE `badge` (
  `badge_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(40) NOT NULL,
  PRIMARY KEY (`badge_id`),
  UNIQUE KEY `Badge_badge_id_key` (`badge_id`),
  UNIQUE KEY `Badge_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  PRIMARY KEY (`chat_id`),
  UNIQUE KEY `Chat_chat_id_key` (`chat_id`),
  KEY `Chat_userId_fkey` (`userId`),
  KEY `Chat_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `chat` (`chat_id`, `message`, `date`, `userId`, `eventId`) VALUES
(1,	'Bonsoir tout le monde, on se retrouve chez moi pour faire du recyclage ?',	'2024-03-25 13:10:36',	5,	1),
(2,	'Salut la Team j\'serais là avec plaisir',	'2024-03-25 13:21:23',	4,	1),
(3,	'Pour moi c\'est tout ok, je vais voir si je peux faire venir du monde',	'2024-03-25 13:22:04',	4,	1),
(4,	'Bienvenue tout le monde',	'2024-03-25 13:22:21',	4,	2),
(5,	'c\'est chez moi les gars, j\'ai hate, ça va être super',	'2024-03-25 14:32:14',	5,	1),
(6,	'Pas trop de monde quand même, c\'est pas un palace chez moi',	'2024-03-25 14:33:07',	5,	1),
(7,	'Du coup pour l\'évènement je vais ramener du jeager on va recycler plus vite 🫡',	'2024-03-25 14:36:23',	4,	1),
(8,	'voilà voilà',	'2024-03-25 14:36:43',	4,	1),
(9,	'Salut les gars',	'2024-03-25 14:39:54',	6,	1),
(10,	'Bonsoir ça va ?',	'2024-03-25 14:40:37',	5,	1),
(11,	'Ouais les gars j\'suis trop chaud on fait ça',	'2024-03-25 14:41:25',	7,	1),
(12,	'je ne viendrais pas, cordialement',	'2024-03-25 14:49:11',	7,	3),
(14,	'pakoul',	'2024-03-25 14:50:19',	7,	3),
(19,	'Bonjour bonjour, j\'espère que vous allez tous bieng',	'2024-03-25 14:52:07',	4,	5),
(35,	'c\'était pas très drole ça marthong',	'2024-03-28 06:17:40',	5,	5),
(23,	'report bazouzou',	'2024-03-25 15:26:33',	5,	3),
(24,	'J’espère que Théo va me faire des bisous ',	'2024-03-25 15:34:53',	4,	1),
(25,	'Salut les loulous ',	'2024-03-25 15:35:14',	4,	3),
(26,	'oh la chance du mec',	'2024-03-25 15:41:51',	5,	1),
(27,	'JE SERAI LÀ.',	'2024-03-25 15:58:09',	9,	5),
(28,	'super mon gros lapinou',	'2024-03-25 15:58:19',	4,	5),
(29,	'ALORS D\'ACCORD.',	'2024-03-25 15:58:28',	9,	5),
(30,	'génial je ramène tacos',	'2024-03-25 15:58:31',	5,	5),
(31,	'ET BIEN OUI',	'2024-03-25 15:58:41',	4,	5),
(32,	'Est ce que Jean et Lena Zi sont de la partie ?',	'2024-03-25 16:00:56',	10,	5),
(33,	'Bonjour et bienvenue dans le chat qui servira à organiser la collecte de fonds qui aura lieu sur la place de l\'hôtel de ville à Rouen',	'2024-03-27 21:24:10',	4,	7),
(34,	'À vos créations !! Soyez créatifs il n\'y a pas de limite',	'2024-03-27 21:32:06',	4,	8);

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(40) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `color` varchar(12) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `Event_event_id_key` (`event_id`),
  UNIQUE KEY `Event_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `event` (`event_id`, `name`, `description`, `date`, `location`, `latitude`, `longitude`, `color`, `owner_id`) VALUES
(1,	'Chez Pierre',	'Venez faire le ménage chez moi...',	'2024-03-18 19:30:00',	'',	49.2838,	1.00604,	'lightgreen',	2),
(2,	'Soirée « Ecologic’party »',	'Fête écologique à Rouen dans toute la ville ',	'2024-05-02 19:40:00',	'',	49.4433,	1.09929,	'lightgreen',	4),
(3,	'Déménagement de notre appartement ',	'Venez nous aider à déménager notre appartement le vendredi 29 mars 2024',	'2024-03-29 10:00:00',	'',	49.2861,	1.00654,	'brown',	4),
(4,	'Nettoyer la seine',	'Venez nettoyer la seine avec notre association',	'2024-03-27 15:42:00',	'',	49.2933,	1.01034,	'yellow',	7),
(5,	'Ramassage des déchets ',	'Salut, on va ramasser des dêchets sur les rives de la Seine.',	'2024-03-31 15:50:00',	'',	49.3027,	1.0197,	'lightblue',	4),
(6,	'Nettoyage du parc ',	'Venez nettoyer le parc ce week end avec nous !',	'2024-03-30 14:00:00',	'',	49.2858,	1.0059,	'darkgreen',	9),
(7,	'Collecte de fonds pour les Sans-Abris',	'Nous comptons sur vous !!!',	'2024-11-30 10:00:00',	'',	49.4433,	1.09941,	'darkgreen',	4),
(8,	'Concours de Graphisme caritatif ',	'Le meilleur visuel écologique sera utilisé pour la campagne de GreenPeace',	'2024-04-04 14:30:00',	'',	49.2152,	-0.355267,	'orange',	4),
(9,	'Session de tri sélectif en pleine rue',	'Venez Nombreux ! :)',	'2024-06-07 15:45:00',	'',	49.4411,	1.10599,	'lightblue',	4),
(10,	'sensibilisation des lycéens ',	'Le But est de sensibiliser les lycéens aux pratiques écolo-responsables ',	'2024-04-02 10:00:00',	'',	49.3535,	1.00435,	'brown',	4),
(11,	'Match de Football pour l\'écologie',	'Match de Football entre deux équipes de jeunes joueurs à but caritatif pour une association écologique',	'2024-04-07 16:00:00',	'',	49.3141,	1.03283,	'orange',	4);

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE `keyword` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`keyword_id`),
  UNIQUE KEY `Keyword_keyword_id_key` (`keyword_id`),
  UNIQUE KEY `Keyword_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`newsletter_id`),
  UNIQUE KEY `Newsletter_newsletter_id_key` (`newsletter_id`),
  UNIQUE KEY `Newsletter_email_key` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `Post_post_id_key` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `post` (`post_id`, `image`, `description`, `date`, `userId`) VALUES
(11,	'6_11.png',	'Obtenez le badge le plus haut en participant &agrave; un maximum d&#039;&eacute;v&egrave;nements',	'2024-03-25 14:52:36',	6),
(10,	'8_10.jpeg',	'Pensez &agrave; recycler !!',	'2024-03-25 14:51:37',	8),
(13,	'4_13.png',	'Les gars y\'a qui pour venir à la réunion éco-délégué ? ',	'2024-03-25 15:33:35',	4),
(14,	'10_14.png',	'Le SM-Caen reviendra en ligue 1 (post qui n\'a rien à voir et devrait être supprimer par la modération)',	'2024-03-25 15:41:18',	10),
(15,	'9_15.png',	'On est présent à la réunion sur la pollution marine organisée par @univ-rouen.',	'2024-03-25 15:55:18',	9),
(16,	'10_16.png',	'Le cinoche qu\'on a reçu grace à nos démarches écologiques, merci @squireal',	'2024-03-25 21:14:16',	10),
(17,	'4_17.jpg',	'Nous comptons sur vous !!! Venez nombreux. Ils comptent sur vous aussi...',	'2024-03-27 21:23:03',	4),
(18,	'4_18.jpg',	'Le gagnant aura sa cr&eacute;ation utilis&eacute;e pour la prochaine campagne de communication de GreenPeace... N&#039;h&eacute;sitez pas !!!',	'2024-03-27 21:31:00',	4);

DROP TABLE IF EXISTS `postevent`;
CREATE TABLE `postevent` (
  `postEvent_id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  PRIMARY KEY (`postEvent_id`),
  UNIQUE KEY `PostEvent_postEvent_id_key` (`postEvent_id`),
  KEY `PostEvent_postId_fkey` (`postId`),
  KEY `PostEvent_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `postevent` (`postEvent_id`, `postId`, `eventId`) VALUES
(5,	12,	1),
(6,	17,	7),
(7,	18,	8);

DROP TABLE IF EXISTS `postkeyword`;
CREATE TABLE `postkeyword` (
  `postKeyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `keywordId` int(11) NOT NULL,
  PRIMARY KEY (`postKeyword_id`),
  UNIQUE KEY `PostKeyword_postKeyword_id_key` (`postKeyword_id`),
  KEY `PostKeyword_postId_fkey` (`postId`),
  KEY `PostKeyword_keywordId_fkey` (`keywordId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rank`;
CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(40) NOT NULL,
  `min_points` int(11) NOT NULL,
  `max_points` int(11) NOT NULL,
  PRIMARY KEY (`rank_id`),
  UNIQUE KEY `Rank_rank_id_key` (`rank_id`),
  UNIQUE KEY `Rank_name_key` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `User_user_id_key` (`user_id`),
  UNIQUE KEY `User_username_key` (`username`),
  UNIQUE KEY `User_email_key` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`user_id`, `username`, `email`, `name`, `password`, `phone`, `points`) VALUES
(7,	'bazouzou',	'theo.beranger76@gmail.com',	'beranger theo',	'$2y$10$l3MShyCfJzhbrKZZEX0UYescS7mis0iYDrLF7wCgoFY9M844chxXi',	'0781804338',	280),
(6,	'francro2',	'romanefrancois23@gmail.com',	'romane francois',	'$2y$10$rnsMEtD9JLIyqs3Rpyac5e.VdgV07TlW1cahdpj3vLd8yrS6wgZwu',	'0623337025',	180),
(5,	'pailleronde',	'pierre.gueroult@univ-rouen.fr',	'Pierre Gueroult',	'$2y$10$KcDOkIHgA1bAGHS9TkEerewnhL6nNnba9b9i1jtsDxPKW1WpZdYvy',	'0652200758',	430),
(4,	'sachaaa76',	'sachalefebvre15@gmail.com',	'Sacha Lefebvre',	'$2y$10$a9MfoaH1P/eyl0XGq2HLAuruR8UHtrVJo9F1yyfClNd3N.jokrzdW',	'0632313589',	1110),
(8,	'lola',	'herenguell.lola@gmail.com',	'Lola Herenguel',	'$2y$10$.vaNEPPHMZuCJbmMTkbo3uius8Jwn3qwHQhJT8E0oNTCa3pw4AEIq',	'0645374908',	80),
(9,	'nooolaaan',	'nolangouzerh3108@gmail.com',	'Nolan Gouzerh',	'$2y$10$Zdd7IU5ePpF5zfp8FY9MpuLms4eUr3V6IHhwzJxS9Ji27Ct1xpRBi',	'0764395753',	230),
(10,	'marthon',	'romain.paris@univ-rouen.fr',	'Romain Paris ',	'$2y$10$6Gq6YjbdU6.AiDFVa0mC2eMAYh9O74PINgtesRgJB1iCJlG1MlMNu',	'0638724271',	210),
(11,	'proff',	'mmi-prof@univ-rouen.fr',	'Professeur MMI',	'$2y$10$.KI.Fo5dv0mzt9VuwI24qe2ItVxBgDhEfj3qRuyxYEYRIafFlVeLa',	NULL,	0);

DROP TABLE IF EXISTS `userbadge`;
CREATE TABLE `userbadge` (
  `userBadge_id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `badgeId` int(11) NOT NULL,
  PRIMARY KEY (`userBadge_id`),
  UNIQUE KEY `UserBadge_userBadge_id_key` (`userBadge_id`),
  KEY `UserBadge_userId_fkey` (`userId`),
  KEY `UserBadge_badgeId_fkey` (`badgeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `userevent`;
CREATE TABLE `userevent` (
  `userEvent_id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  PRIMARY KEY (`userEvent_id`),
  UNIQUE KEY `UserEvent_userEvent_id_key` (`userEvent_id`),
  KEY `UserEvent_userId_fkey` (`userId`),
  KEY `UserEvent_eventId_fkey` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `userevent` (`userEvent_id`, `userId`, `eventId`) VALUES
(1,	2,	1),
(2,	4,	1),
(3,	4,	3),
(4,	2,	2),
(5,	5,	1),
(6,	5,	2),
(7,	4,	2),
(8,	5,	3),
(9,	5,	3),
(10,	6,	1),
(11,	6,	3),
(12,	7,	1),
(13,	7,	3),
(14,	4,	2),
(15,	4,	5),
(16,	5,	5),
(17,	7,	5),
(18,	8,	3),
(19,	6,	5),
(20,	9,	3),
(21,	9,	5),
(22,	10,	6),
(23,	10,	5),
(24,	10,	4),
(25,	4,	7),
(26,	4,	8);

-- 2024-03-28 07:05:35
