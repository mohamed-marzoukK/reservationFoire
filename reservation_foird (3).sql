-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 avr. 2025 à 20:42
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
-- Base de données : `reservation_foird`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nb_hall` int(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `image`, `nb_hall`, `created`, `modified`) VALUES
(84, 'uploads/1742781765_hall.jpg', 3, '2025-03-24 02:02:45', '2025-03-24 02:02:45');

-- --------------------------------------------------------

--
-- Structure de la table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `x_percent` float NOT NULL,
  `y_percent` float NOT NULL,
  `width_percent` float NOT NULL,
  `height_percent` float NOT NULL,
  `rotation_degrees` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `halls`
--

INSERT INTO `halls` (`id`, `admin_id`, `x_percent`, `y_percent`, `width_percent`, `height_percent`, `rotation_degrees`) VALUES
(1, 84, 67.39, 34.02, 12.52, 12, -31),
(2, 84, 62.04, 19.07, 12.52, 12, -36),
(3, 84, 25.5, 37.77, 33.44, 11.6, -34);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `institution_nationality` varchar(100) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `participation_type` enum('راعي','عارض') NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `institution_name`, `institution_nationality`, `agent_name`, `contact_person`, `position`, `address`, `country`, `city`, `phone`, `email`, `website`, `participation_type`, `logo_path`, `created`, `modified`) VALUES
(1, 'snap', 'tunise', 'med', 'med', 'gerant', 'sfax', 'Tunisie', 'tunise', '27999691', 'marzouk.mohamed.marzouk@gmail.com', 'https://aa.com', 'راعي', 'uploads/logos/1743042247_tel.png', '2025-03-27 02:24:07', '2025-03-27 02:24:07');

-- --------------------------------------------------------

--
-- Structure de la table `stands`
--

CREATE TABLE `stands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `number_of_stands` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hall_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `stands`
--

INSERT INTO `stands` (`id`, `image`, `number_of_stands`, `created`, `modified`, `hall_id`) VALUES
(38, 'stands/1742957398_bb.jpg', 4, '2025-03-26 02:49:58', '2025-03-26 02:49:58', 3),
(39, 'stands/1742961749_bb.jpg', 7, '2025-03-26 04:02:29', '2025-03-26 04:02:29', 2),
(41, 'stands/1743040073_bb.jpg', 3, '2025-03-27 01:47:53', '2025-03-27 01:47:53', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stand_positions`
--

CREATE TABLE `stand_positions` (
  `id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `stand_number` int(11) NOT NULL,
  `x` float NOT NULL DEFAULT 0,
  `y` float NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stand_positions`
--

INSERT INTO `stand_positions` (`id`, `stand_id`, `stand_number`, `x`, `y`, `name`, `size`, `created`, `modified`) VALUES
(1, 39, 1, 511.773, 3.89772, '177', '44', '2025-03-27 02:41:54', '2025-03-27 02:42:19'),
(2, 39, 2, 10, 60, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(3, 39, 3, 10, 120, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(4, 39, 4, 10, 180, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(5, 39, 5, 10, 240, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(6, 39, 6, 10, 300, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(7, 39, 7, 10, 360, NULL, NULL, '2025-03-27 02:41:54', '2025-03-27 02:41:54'),
(8, 38, 1, 10, 0, NULL, NULL, '2025-04-04 18:40:20', '2025-04-04 18:40:20'),
(9, 38, 2, 10, 60, NULL, NULL, '2025-04-04 18:40:20', '2025-04-04 18:40:20'),
(10, 38, 3, 10, 120, NULL, NULL, '2025-04-04 18:40:20', '2025-04-04 18:40:20'),
(11, 38, 4, 10, 180, NULL, NULL, '2025-04-04 18:40:20', '2025-04-04 18:40:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'admin@gmail.com', '$2y$10$RpTmokVUsnzTGS55.VaHyuGDaCFZy4pFMT1WwoLneaqTq.Av9uhHO', 'admin', '2025-03-19 00:34:22', '2025-03-19 00:34:22'),
(2, 'marzouk.mohamed.marzouk@gmail.com', '$2y$10$SPmLFED2AIHw9DOTQ3qMkeJoNRiLTawBCITcLmwUBTqTqpbYYYVhu', 'user', '2025-03-23 01:05:10', '2025-03-23 01:05:10'),
(7, 'aaa@gmail.com', '$2y$10$VczLKXjbUevk2/y2gZY.2.4Pbd60FZwc1xQqhvEZ.AlsbF40MkvSS', 'user', '2025-03-23 02:10:42', '2025-03-23 02:10:42'),
(8, 'wa@wa.wa', '$2y$10$iPpO2OVt7H2Rpdomnfz.E.vZhvep1ByoVc3IZ4Hl5yObktva40Qs.', 'user', '2025-03-24 00:13:41', '2025-03-24 00:13:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_idx` (`created`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stands`
--
ALTER TABLE `stands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stands_hall_id` (`hall_id`);

--
-- Index pour la table `stand_positions`
--
ALTER TABLE `stand_positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stand_id` (`stand_id`,`stand_number`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `stands`
--
ALTER TABLE `stands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `stand_positions`
--
ALTER TABLE `stand_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `stands`
--
ALTER TABLE `stands`
  ADD CONSTRAINT `fk_stands_hall_id` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `stand_positions`
--
ALTER TABLE `stand_positions`
  ADD CONSTRAINT `stand_positions_ibfk_1` FOREIGN KEY (`stand_id`) REFERENCES `stands` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
