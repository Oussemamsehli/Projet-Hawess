-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 avr. 2024 à 23:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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

CREATE TABLE `activites` (
  `idActivite` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `heure_debut` time NOT NULL DEFAULT current_timestamp(),
  `heure_fin` time NOT NULL DEFAULT current_timestamp(),
  `place` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `camping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`idActivite`, `titre`, `description`, `heure_debut`, `heure_fin`, `place`, `image`, `camping`) VALUES
(8, 'hjbbhjbjhb', 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '20:39:00', '22:39:00', 7, '111074799-bdfbcf00-84dc-11eb-98c0-d40a99aa0da7.png', 4);

-- --------------------------------------------------------

--
-- Structure de la table `campings`
--

CREATE TABLE `campings` (
  `idCamping` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `adresse` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `place` int(11) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campings`
--

INSERT INTO `campings` (`idCamping`, `titre`, `description`, `adresse`, `date_debut`, `date_fin`, `place`, `prix`, `image`) VALUES
(4, 'Test', 'cclass=\"btn btn-primary mr-2\"class=\"btn btn-primary mr-2\"class=\"btn btn-primary mr-2\"class=\"btn btn-primary mr-2\"', 'sdsdfsdfsdf', '2024-04-21', '2024-04-27', 321, 321321, 'ecmascript.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`idActivite`),
  ADD KEY `camping` (`camping`);

--
-- Index pour la table `campings`
--
ALTER TABLE `campings`
  ADD PRIMARY KEY (`idCamping`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `idActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `campings`
--
ALTER TABLE `campings`
  MODIFY `idCamping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
