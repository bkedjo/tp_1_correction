-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 25 sep. 2023 à 18:30
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `horloge`
--

CREATE TABLE `horloge` (
  `id` int(11) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `horloge`
--

INSERT INTO `horloge` (`id`, `brand`, `type`, `model`, `price`) VALUES
(1, 'Swatch', 'Montre-bracelet', 'Orwell', 199.99),
(2, 'Hublot', 'Montre-bracelet', 'Big Bang', 2999.99),
(3, 'Rolex', 'Montre-bracelet', 'Submariner', 8999.99),
(4, 'Tag Heuer', 'Montre de plongée', 'Aquaracer', 1499.99),
(5, 'Cartier', 'mural', 'G-Shock ', 150);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `horloge`
--
ALTER TABLE `horloge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `horloge`
--
ALTER TABLE `horloge`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
