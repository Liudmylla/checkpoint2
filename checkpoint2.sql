-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 14 avr. 2021 à 16:37
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `checkpoint2`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessory`
--

CREATE TABLE `accessory` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `accessory`
--

INSERT INTO `accessory` (`id`, `name`, `url`) VALUES
(1, 'cherry', 'http://images.innoveduc.fr/php_parcours/cp2/cherry.png'),
(2, 'donut', 'http://images.innoveduc.fr/php_parcours/cp2/donut.png'),
(3, 'Chocolate', 'http://images.innoveduc.fr/php_parcours/cp2/chocolate.png'),
(4, 'wsn', 'http://images.innoveduc.fr/php_parcours/cp2/wcs.png'),
(5, 'candy', 'http://images.innoveduc.fr/php_parcours/cp2/christmas-candy.png');

-- --------------------------------------------------------

--
-- Structure de la table `cupcake`
--

CREATE TABLE `cupcake` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `color1` char(7) NOT NULL,
  `color2` char(7) NOT NULL,
  `color3` char(7) NOT NULL,
  `accessory_id` int NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cupcake`
--

INSERT INTO `cupcake` (`id`, `name`, `color1`, `color2`, `color3`, `accessory_id`, `created_at`) VALUES
(1, 'test', '3C', '00', 'A6', 3, '2021-04-14 15:23:53'),
(3, 'test1', '#000000', '#000000', '#63d6da', 2, '2021-04-14 00:00:00'),
(4, 'My super cupcake', '#ded53b', '#dc8713', '#e74040', 3, '2021-04-14 00:00:00'),
(5, 'New', '#999b4b', '#30dadf', '#411010', 5, '2021-04-14 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cupcake`
--
ALTER TABLE `cupcake`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accessory_id` (`accessory_id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cupcake`
--
ALTER TABLE `cupcake`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
