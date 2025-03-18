-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 mars 2025 à 05:19
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
(1, 'uploads/1740145850_H1HouseholdMap2025.png', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(2, 'uploads/1740146358_H2HouseholdMap2025.png', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(3, 'uploads/1740146388_H2HouseholdMap2025.png', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(4, 'uploads/1740146404_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(5, 'uploads/1740146619_H1HouseholdMap2025.png', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(6, 'uploads/1740146692_H2HouseholdMap2025.png', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(7, 'uploads/1740146716_hall1.jpg', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(8, 'uploads/1740148235_H2HouseholdMap2025.png', 7, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(9, 'uploads/1740221818_H1HouseholdMap2025.png', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(10, 'uploads/1740222534_hall1.jpg', 5, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(11, 'uploads/1740222535_hall1.jpg', 5, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(12, 'uploads/1740227735_hall1.jpg', 5, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(13, 'uploads/1740229823_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(14, 'uploads/1740229825_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(15, 'uploads/1740395480_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(16, 'uploads/1740395645_H1HouseholdMap2025.png', 4, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(17, 'uploads/1740396909_hall1.jpg', 4, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(18, 'uploads/1740396910_hall1.jpg', 4, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(19, 'uploads/1740405486_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(20, 'uploads/1740405488_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(21, 'uploads/1740476299_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(22, 'uploads/1740565321_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(23, 'uploads/1740567411_hall1.jpg', 4, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(24, 'uploads/1740568120_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(25, 'uploads/1740568507_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(26, 'uploads/1740578890_hall1.jpg', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(27, 'uploads/1740739748_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(28, 'uploads/1740741506_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(29, 'uploads/1740743581_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(30, 'uploads/1740922624_hall1.jpg', 4, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(31, 'uploads/1740926345_hall1.jpg', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(32, 'uploads/1741008893_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(33, 'uploads/1741008895_hall1.jpg', 3, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(34, 'uploads/1741131851_hall1.jpg', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(35, 'uploads/1741132926_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(36, 'uploads/1741133057_hall1.jpg', 2, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(37, 'uploads/1741133279_hall1.jpg', 6, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(38, 'uploads/1741134584_hall1.jpg', 5, '2025-03-05 02:12:53', '2025-03-05 02:12:53'),
(39, 'uploads/1741137443_hall1.jpg', 6, '2025-03-05 01:17:23', '2025-03-05 01:17:23'),
(40, 'uploads/1741138146_hall1.jpg', 5, '2025-03-05 01:29:06', '2025-03-05 01:29:06'),
(41, 'uploads/1741139951_hall1.jpg', 5, '2025-03-05 01:59:11', '2025-03-05 01:59:11'),
(42, 'uploads/1741223145_hall1.jpg', 5, '2025-03-06 01:05:45', '2025-03-06 01:05:45'),
(43, 'uploads/1741224713_hall1.jpg', 4, '2025-03-06 01:31:53', '2025-03-06 01:31:53'),
(44, 'uploads/1741226135_hall1.jpg', 3, '2025-03-06 01:55:35', '2025-03-06 01:55:35'),
(45, 'uploads/1741226665_H1HouseholdMap2025.png', 3, '2025-03-06 02:04:25', '2025-03-06 02:04:25'),
(46, 'uploads/1741308931_hall1.jpg', 6, '2025-03-07 00:55:31', '2025-03-07 00:55:31'),
(47, 'uploads/1741651631_1740136706_hall1.jpg', 6, '2025-03-11 00:07:11', '2025-03-11 00:07:11'),
(48, 'uploads/1741653480_1740136706_hall1.jpg', 5, '2025-03-11 00:38:00', '2025-03-11 00:38:00'),
(49, 'uploads/1741653578_aa.jpg', 5, '2025-03-11 00:39:38', '2025-03-11 00:39:38'),
(50, 'uploads/1741657843_aa.jpg', 3, '2025-03-11 01:50:43', '2025-03-11 01:50:43'),
(51, 'uploads/1741825443_aa.jpg', 5, '2025-03-13 00:24:03', '2025-03-13 00:24:03'),
(52, 'uploads/1741830854_aa.jpg', 1, '2025-03-13 01:54:14', '2025-03-13 01:54:14'),
(53, 'uploads/1741832176_aa.jpg', 1, '2025-03-13 02:16:16', '2025-03-13 02:16:16'),
(54, 'uploads/1741832926_aa.jpg', 3, '2025-03-13 02:28:46', '2025-03-13 02:28:46'),
(55, 'uploads/1742177037_aa.jpg', 5, '2025-03-17 02:03:57', '2025-03-17 02:03:57'),
(56, 'uploads/1742178211_aa.jpg', 3, '2025-03-17 02:23:31', '2025-03-17 02:23:31'),
(57, 'uploads/1742178753_aa.jpg', 3, '2025-03-17 02:32:34', '2025-03-17 02:32:34'),
(58, 'uploads/1742179191_aa.jpg', 2, '2025-03-17 02:39:51', '2025-03-17 02:39:51'),
(59, 'uploads/1742179324_aa.jpg', 3, '2025-03-17 02:42:04', '2025-03-17 02:42:04'),
(60, 'uploads/1742179934_aa.jpg', 2, '2025-03-17 02:52:14', '2025-03-17 02:52:14'),
(61, 'uploads/1742180857_aa.jpg', 1, '2025-03-17 03:07:37', '2025-03-17 03:07:37'),
(62, 'uploads/1742181131_aa.jpg', 3, '2025-03-17 03:12:11', '2025-03-17 03:12:11'),
(63, 'uploads/1742181648_aa.jpg', 3, '2025-03-17 03:20:48', '2025-03-17 03:20:48'),
(64, 'uploads/1742181838_aa.jpg', 2, '2025-03-17 03:23:58', '2025-03-17 03:23:58'),
(65, 'uploads/1742182503_aa.jpg', 6, '2025-03-17 03:35:04', '2025-03-17 03:35:04'),
(66, 'uploads/1742182614_bb.jpg', 6, '2025-03-17 03:36:54', '2025-03-17 03:36:54'),
(67, 'uploads/1742182650_bb.jpg', 3, '2025-03-17 03:37:30', '2025-03-17 03:37:30'),
(68, 'uploads/1742255705_aa.jpg', 2, '2025-03-17 23:55:05', '2025-03-17 23:55:05'),
(69, 'uploads/1742255818_aa.jpg', 5, '2025-03-17 23:56:58', '2025-03-17 23:56:58'),
(70, 'uploads/1742257861_aa.jpg', 2, '2025-03-18 00:31:01', '2025-03-18 00:31:01'),
(71, 'uploads/1742269926_aa.jpg', 2, '2025-03-18 03:52:06', '2025-03-18 03:52:06');

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
(1, 69, 58.05, 73.88, 12.52, 12, 0),
(2, 69, 74.33, 72.88, 12.52, 12, 0),
(3, 69, 67.94, 49.28, 12.52, 12, 0),
(4, 69, 64.81, 23.28, 12.52, 12, 0),
(5, 69, 35.51, 46.88, 12.52, 12, 0);

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
-- Structure de la table `stands`
--

CREATE TABLE `stands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `number_of_stands` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `stands`
--

INSERT INTO `stands` (`id`, `image`, `number_of_stands`, `created`, `modified`) VALUES
(2, 'img/stands/bb.jpg', 2, '2025-03-18 01:09:30', '2025-03-18 01:09:30'),
(3, 'img/stands/bb.jpg', 3, '2025-03-18 01:13:55', '2025-03-18 01:13:55'),
(4, 'img/stands/bb.jpg', 3, '2025-03-18 01:15:27', '2025-03-18 01:15:27'),
(5, 'img/stands/bb.jpg', 3, '2025-03-18 01:19:57', '2025-03-18 01:19:57'),
(6, 'img/stands/bb.jpg', 2, '2025-03-18 01:21:07', '2025-03-18 01:21:07'),
(7, 'img/stands/bb.jpg', 3, '2025-03-18 01:22:27', '2025-03-18 01:22:27'),
(8, 'img/stands/bb.jpg', 3, '2025-03-18 01:24:41', '2025-03-18 01:24:41'),
(9, 'img/stands/bb.jpg', 3, '2025-03-18 01:29:38', '2025-03-18 01:29:38'),
(10, 'img/stands/bb.jpg', 3, '2025-03-18 01:31:42', '2025-03-18 01:31:42'),
(11, 'img/stands/bb.jpg', 2, '2025-03-18 01:33:52', '2025-03-18 01:33:52'),
(12, 'img/stands/bb.jpg', 2, '2025-03-18 01:35:16', '2025-03-18 01:35:16'),
(13, 'img/stands/bb.jpg', 2, '2025-03-18 01:37:44', '2025-03-18 01:37:44'),
(14, 'img/stands/bb.jpg', 2, '2025-03-18 01:40:15', '2025-03-18 01:40:15'),
(15, 'img/stands/bb.jpg', 2, '2025-03-18 01:43:39', '2025-03-18 01:43:39'),
(16, 'img/stands/bb.jpg', 2, '2025-03-18 01:45:52', '2025-03-18 01:45:52'),
(17, 'img/stands/bb.jpg', 3, '2025-03-18 01:47:17', '2025-03-18 01:47:17'),
(18, 'img/stands/bb.jpg', 2, '2025-03-18 01:56:58', '2025-03-18 01:56:58'),
(19, 'img/stands/aa.jpg', 2, '2025-03-18 01:59:40', '2025-03-18 01:59:40'),
(20, 'img/stands/bb.jpg', 2, '2025-03-18 02:07:12', '2025-03-18 02:07:12'),
(21, 'img/stands/bb.jpg', 3, '2025-03-18 02:10:22', '2025-03-18 02:10:22'),
(22, 'img/stands/bb.jpg', 3, '2025-03-18 02:18:38', '2025-03-18 02:18:38'),
(23, 'img/stands/bb.jpg', 3, '2025-03-18 02:20:13', '2025-03-18 02:20:13'),
(24, 'img/stands/bb.jpg', 3, '2025-03-18 02:24:29', '2025-03-18 02:24:29'),
(25, 'img/stands/bb.jpg', 2, '2025-03-18 02:27:58', '2025-03-18 02:27:58'),
(26, 'img/stands/bb.jpg', 2, '2025-03-18 02:28:05', '2025-03-18 02:28:05'),
(27, 'img/stands/bb.jpg', 2, '2025-03-18 02:29:09', '2025-03-18 02:29:09'),
(28, 'stands/1742271028_bb.jpg', 2, '2025-03-18 04:10:28', '2025-03-18 04:10:28');

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
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `stands`
--
ALTER TABLE `stands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `stands`
--
ALTER TABLE `stands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
