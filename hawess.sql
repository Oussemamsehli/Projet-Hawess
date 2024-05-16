-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mai 2024 à 00:45
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
-- Base de données : `hawess`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `idActivite` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `place` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `camping` int NOT NULL,
  PRIMARY KEY (`idActivite`),
  KEY `camping` (`camping`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '1338891cde8355f623b528d2a6c7d5a6');

-- --------------------------------------------------------

--
-- Structure de la table `campings`
--

DROP TABLE IF EXISTS `campings`;
CREATE TABLE IF NOT EXISTS `campings` (
  `idCamping` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `place` int NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang` double NOT NULL,
  `lat` double NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`idCamping`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campings`
--

INSERT INTO `campings` (`idCamping`, `titre`, `description`, `adresse`, `date_debut`, `date_fin`, `place`, `prix`, `image`, `lang`, `lat`, `user_id`) VALUES
(11, 'abcder', 'ccccccccccccccccccccccccccccccccccccccccccccccccc', 'Khenis Nord, Délégation Monastir, Gouvernorat Monastir, Tunisie', '2024-05-12', '2024-05-26', 6000, 30, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 10.786295784223904, 35.72295501524364, 26),
(12, 'abbbbbbnnn', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Kabouti, Délégation Mornag, Gouvernorat Ben Arous, Tunisie', '2024-05-13', '2024-05-20', 10, 2000, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 10.326054676807187, 36.55823617711549, 26),
(13, 'test oussama', 'adazdadaazdazdazdazaaaaaa', 'tunis', '2024-05-16', '2024-05-17', 10, 100, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 0, 0, 26),
(14, 'test oussama', 'aeazdadadadadzdddadazdazda', 'tunis', '2024-05-16', '2024-05-17', 25, 100, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 0, 0, 26),
(15, 'test oussama 5', 'adazdazdazddadazdazeddazd', 'tunis', '2024-05-16', '2024-05-17', 25, 100, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 0, 0, 26),
(17, 'agla bouhi', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'morneg', '2024-05-17', '2024-05-18', 2000, 10000, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 0, 0, 27);

-- --------------------------------------------------------

--
-- Structure de la table `deleteduser`
--

DROP TABLE IF EXISTS `deleteduser`;
CREATE TABLE IF NOT EXISTS `deleteduser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `deleteduser`
--

INSERT INTO `deleteduser` (`id`, `email`, `deltime`) VALUES
(21, 'mchita.soumaya@esprit.tn', '2024-04-15 12:23:21');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(18, 'mchita.soumaya@esprit.tn', 'Admin', 'Create Account', '2024-04-14 19:10:55'),
(19, 'emna.rbii@esprit.tn', 'Admin', 'Create Account', '2024-04-15 12:17:59'),
(20, 'admin', 'Admin', 'Create Account', '2024-04-29 10:54:19'),
(21, 'admin', 'Admin', 'Create Account', '2024-04-29 10:55:33'),
(22, 'mchita.soumaya@esprit.tn', 'Admin', 'Create Account', '2024-04-29 10:57:00'),
(23, 'oussema.msehli@esprit.tn', 'Admin', 'Create Account', '2024-05-12 18:44:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `mobile`, `designation`, `image`, `status`, `type`) VALUES
(21, 'rbii', 'emna.rbii@esprit.tn', 'ab4f63f9ac65152575886860dde480a1', 'Female', '23456754', 'rbiiemna', 'download-(1).jpg', 1, 'user'),
(22, 'soumaya.mchita@esprit.tn', 'admin', '1338891cde8355f623b528d2a6c7d5a6', 'Female', '23456754', 'Soumaya', 'download-(2).jpg', 1, 'user'),
(23, 'soumaya.mchita@esprit.tn', 'admin', '1338891cde8355f623b528d2a6c7d5a6', 'Female', '23456754', 'Soumaya', 'download-(2).jpg', 1, 'user'),
(24, 'soumaya', 'mchita.soumaya@esprit.tn', '1338891cde8355f623b528d2a6c7d5a6', 'Female', '23456765', 'Soumaya', 'download-(2).jpg', 1, 'user'),
(25, 'oussema msehli', 'oussema.msehli@esprit.tn', '25f9e794323b453885f5181f1b624d0b', 'Female', '28657499', 'lwiz', 'qrcode-(7).jpg', 1, 'user'),
(26, 'admin', 'admin@admin.com', '1338891cde8355f623b528d2a6c7d5a6', 'Male', '00000000', 'super-admin', 'download-(1).jpg', 1, 'admin'),
(27, 'admin2', 'admin@admin.com', '25f9e794323b453885f5181f1b624d0b', 'Male', '00000000', 'super-admin', 'download-(1).jpg', 1, 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `camping` FOREIGN KEY (`camping`) REFERENCES `campings` (`idCamping`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;