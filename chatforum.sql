-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 mars 2023 à 15:43
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_soustopic` int(10) NOT NULL,
  `id_felin` int(10) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_soustopic` (`id_soustopic`),
  KEY `id_felin` (`id_felin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `felins`
--

DROP TABLE IF EXISTS `felins`;
CREATE TABLE IF NOT EXISTS `felins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(25) NOT NULL DEFAULT 'avatar_default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `felins`
--

INSERT INTO `felins` (`id`, `pseudo`, `mail`, `password`, `avatar`) VALUES
(2, 'momo13', 'momo@gmail.com', '$2y$10$T2ood4JwcVUbuVfupZX9Y.bhVxNFdPGNP1FUCQ1r5hghDHy2p.m3q', 'avatar_default.png');

-- --------------------------------------------------------

--
-- Structure de la table `sous_topic`
--

DROP TABLE IF EXISTS `sous_topic`;
CREATE TABLE IF NOT EXISTS `sous_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_topic` int(10) NOT NULL,
  `id_felin` int(10) NOT NULL,
  `name` varchar(55) NOT NULL,
  `question` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_topic` (`id_topic`),
  KEY `id_felin` (`id_felin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_soustopic`) REFERENCES `sous_topic` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_felin`) REFERENCES `felins` (`id`);

--
-- Contraintes pour la table `sous_topic`
--
ALTER TABLE `sous_topic`
  ADD CONSTRAINT `sous_topic_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `sous_topic_ibfk_2` FOREIGN KEY (`id_felin`) REFERENCES `felins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
