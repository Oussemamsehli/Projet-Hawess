-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 mai 2024 à 05:03
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
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `idActivite` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `place` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `camping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`idActivite`, `titre`, `description`, `heure_debut`, `heure_fin`, `place`, `image`, `camping`) VALUES
(18, 'jendoub', 'marssaaa', '20:59:27', '17:59:27', 222121545, 'gjjkj.jpg', 14);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '1338891cde8355f623b528d2a6c7d5a6');

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
  `image` varchar(255) NOT NULL,
  `lang` double NOT NULL,
  `lat` double NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `userId`, `content`, `timestamp`) VALUES
(1, 1, 3, 'ec, le dcls qkc,lsq', '2024-05-05 03:02:43'),
(2, 1, 1, 'hello', '2024-05-05 04:05:31');

-- --------------------------------------------------------

--
-- Structure de la table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `deleteduser`
--

INSERT INTO `deleteduser` (`id`, `email`, `deltime`) VALUES
(21, 'mchita.soumaya@esprit.tn', '2024-04-15 12:23:21');

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likedislike`
--

CREATE TABLE `likedislike` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `type` enum('like','dislike') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likedislike`
--

INSERT INTO `likedislike` (`id`, `postId`, `userId`, `type`) VALUES
(1, 1, 1, 'like');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(18, 'mchita.soumaya@esprit.tn', 'Admin', 'Create Account', '2024-04-14 19:10:55'),
(19, 'emna.rbii@esprit.tn', 'Admin', 'Create Account', '2024-04-15 12:17:59'),
(20, 'admin', 'Admin', 'Create Account', '2024-04-29 10:54:19'),
(21, 'admin', 'Admin', 'Create Account', '2024-04-29 10:55:33'),
(22, 'mchita.soumaya@esprit.tn', 'Admin', 'Create Account', '2024-04-29 10:57:00'),
(23, 'oussema.msehli@esprit.tn', 'Admin', 'Create Account', '2024-05-12 18:44:37'),
(24, 'sadok0703@gmail.com', 'Admin', 'Create Account', '2024-05-18 01:54:15'),
(25, 'sadok0703@gmail.com', 'Admin', 'Create Account', '2024-05-18 01:55:26'),
(26, 'sad@gmail.com', 'Admin', 'Create Account', '2024-05-18 01:58:27');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `likeCount` int(11) DEFAULT 0,
  `dislikeCount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `userId`, `content`, `title`, `image`, `timestamp`, `likeCount`, `dislikeCount`) VALUES
(1, 1, 'camping experience sdjkdjsfndskjvldnsljkvlcnjkdsv dsv ', 'camping', 'Capture d\'écran 2024-03-10 045829.png', '2024-05-05 02:42:34', 0, 0),
(2, 1, 'sdnvksdnkf', 'smq,cmlsq,lc', 'Capture d\'écran 2024-03-10 045743.png', '2024-05-05 02:57:17', 0, 0),
(9, 1, 'dddddddd', 'post 12', 'Cap3.png', '2024-05-18 02:44:19', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `client` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `message`, `sujet`, `statut`, `client`, `file`) VALUES
(1, 'your site is not working well ', 'comping', 1, 1, 'uploads/chapitre-2-initiation-programmation-c-pic.pdf'),
(2, 'reclamation 1', 'non fonctionnel', 1, 1, 'uploads/Microcontrolleur.pdf'),
(3, 'recla56', 'activite', 1, 1, 'uploads/PHPMailer-master.zip'),
(4, 'dshfidlksv', 'djsknkjds', 0, 1, 'uploads/PHPMailer-master.zip'),
(5, 'sdknvkdLorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.Lorem ipsum dolor sit am', 'probleme de payemenet', 0, 1, NULL),
(6, 'dsklvlsd lv', 'd;s vk,ds', 0, 1, 'uploads/Capture d\'écran 2024-03-10 045803.png'),
(7, 'ghhk', '5', 0, 1, NULL),
(8, 'ok', '12', 0, 1, 'uploads/Support timer.zip'),
(9, 'ok1', '1', 0, 1, NULL),
(10, 'pasok', '14', 0, 1, NULL),
(11, 'you are ******** the ******** ', 'non fonctionnel', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(12, 'you are          the          ', 'non fonctionnel', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(13, 'you are          the          ', 'non fonctionnel', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(14, '165156', '616', 0, 1, NULL),
(15, 'you are          the          ', 'hdvdsbnv', 0, 1, NULL),
(16, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(17, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(18, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, 'uploads/marius-masalar-LN_gdbQtzvk-unsplash.jpg'),
(19, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, 'uploads/Capture d\'écran 2024-05-18 012623.png'),
(20, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, 'uploads/cap1.png'),
(37, 'rfreujtyhgbg', 'grtgytgfrez', 0, 1, NULL),
(38, 'gbgfbgfb', '\'(tergfdvfd', 0, 1, 'uploads/cap1.png'),
(39, 'gvjhvhjvj', 'hbhjbhjvjv', 0, 1, 'uploads/cap2-imageonline.co-merged.png'),
(40, 'wwaywaaaaaa', '123456lopm78', 0, 1, 'uploads/cap2.png');

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id_response` int(11) NOT NULL,
  `id_reclamation` int(11) NOT NULL,
  `message` text NOT NULL,
  `context` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id_response`, `id_reclamation`, `message`, `context`, `timestamp`) VALUES
(4, 1, 'hhhhhh', 'hhhhhhhhhhhhhhhh', '2024-04-29 05:01:20'),
(5, 1, 'fbfhnhf', 'ggbfgg', '2024-04-29 05:03:52'),
(6, 1, 'ffffffff', 'fffffffffffffffffffff', '2024-04-29 05:05:38'),
(7, 1, 'hello', 'im attia12@gndj', '2024-04-29 05:19:15'),
(8, 1, 'hello', 'im attia12@gndj', '2024-04-29 05:19:37'),
(9, 1, 'hello', 'im attia12@gndj', '2024-04-29 05:23:03'),
(10, 1, 'yhtnhg', '57275275', '2024-04-29 05:23:57'),
(11, 2, 'reponse1', 'resolved', '2024-04-29 11:03:24'),
(12, 1, 'kjbkjds', 'svfnsdkvnkds', '2024-04-29 11:04:36'),
(13, 1, 'dslkjvnds', 'vlkdsklv,ldsk', '2024-04-29 11:05:36'),
(14, 1, 'dslkjvnds', 'vlkdsklv,ldsk', '2024-04-29 11:05:39'),
(15, 3, 'jhvuhjvjh', '12623468', '2024-04-29 11:05:59'),
(16, 1, 'djnvkldn', 'sklnclkds,', '2024-04-29 11:30:38'),
(17, 1, 'fbfdbfd', 'gfjgfhgf', '2024-04-29 11:31:04'),
(18, 1, 'hallah', 'ok', '2024-05-05 16:45:12'),
(19, 2, 'probleme de reservation', 'camping', '2024-05-05 16:49:53'),
(20, 1, 'sd vkc dskc', 'ksq clksq kcs', '2024-05-05 18:20:59'),
(21, 3, 'hvhvhjvh', 'hvhgvhj', '2024-05-06 11:36:55'),
(22, 3, 'hvhvhjvh', 'hvhgvhj', '2024-05-06 11:37:03'),
(23, 1, 'jjvjhfvhjfh', 'nghchhhhhhhhhhhhhhhh', '2024-05-18 03:00:54');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `profilePicture`) VALUES
(1, 'sadok', 'sadok0703@gmail.com', 'dkjbnkvfld12', NULL),
(2, 'sino', 'sino@hotmail.com', 'ekuhfnkerjcv147', NULL),
(3, 'atia', 'attia@hotmail.com', 'ekuhfnkerjcv147', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(27, 'admin2', 'admin@admin.com', '25f9e794323b453885f5181f1b624d0b', 'Male', '00000000', 'super-admin', 'download-(1).jpg', 1, 'admin'),
(28, 'sadok jedidi', 'sadok0703@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', '54447751', 'bossa', NULL, 1, 'admin'),
(29, 'waaaaaaaaa', 'sad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '544477510000', 'kingggggggg', NULL, 1, 'admin');

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
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `campings`
--
ALTER TABLE `campings`
  ADD PRIMARY KEY (`idCamping`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likedislike`
--
ALTER TABLE `likedislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `FK_Reclamation_Client` (`client`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id_response`),
  ADD KEY `id_reclamation` (`id_reclamation`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `idActivite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `campings`
--
ALTER TABLE `campings`
  MODIFY `idCamping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `likedislike`
--
ALTER TABLE `likedislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
  MODIFY `id_response` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `camping` FOREIGN KEY (`camping`) REFERENCES `campings` (`idCamping`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `likedislike`
--
ALTER TABLE `likedislike`
  ADD CONSTRAINT `likedislike_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `likedislike_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_Reclamation_Client` FOREIGN KEY (`client`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`client`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id_reclamation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
