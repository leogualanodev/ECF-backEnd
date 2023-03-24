-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mars 2023 à 09:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

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
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_soustopic` int NOT NULL,
  `id_felin` int NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  KEY `id_soustopic` (`id_soustopic`),
  KEY `id_felin` (`id_felin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_soustopic`, `id_felin`, `reponse`, `date`) VALUES
(1, 3, 2, 'Je répond a mon conseil pck c&#39;est cool !!! petit tips : allez jusqu&#39;au sang ', '2023-03-23 09:18:42'),
(2, 1, 2, 'petit tips : cacher vous et mioler pour le rendre fou ', '2023-03-23 09:25:31'),
(3, 3, 3, 'super le conseil ! merci beaucoup !', '2023-03-23 10:55:54'),
(5, 3, 4, 'trop cool :) ', '2023-03-23 22:59:05');

-- --------------------------------------------------------

--
-- Structure de la table `felins`
--

DROP TABLE IF EXISTS `felins`;
CREATE TABLE IF NOT EXISTS `felins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'avatar_default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `felins`
--

INSERT INTO `felins` (`id`, `pseudo`, `mail`, `password`, `avatar`) VALUES
(2, 'momo13', 'momo@gmail.com', '$2y$10$T2ood4JwcVUbuVfupZX9Y.bhVxNFdPGNP1FUCQ1r5hghDHy2p.m3q', 'avatar_default.png'),
(3, 'leo128', 'felin@gmail.com', '$2y$10$.w49gvmvRXa0O5P81IPHXeHXXOt1.JG8oq78Ecpuz70ZIQ7FCykBe', 'avatar_default.png'),
(4, 'thefelin2812', 'thefelin@gmail.com', '$2y$10$Ocj9kDrbGi.f1VWthBW6EeLpPNkiBPCDVWQk8suoV5HK.yzXPfdvi', '3f48fa97cf3c390822a80d38e47b82fb.gif');

-- --------------------------------------------------------

--
-- Structure de la table `sous_topic`
--

DROP TABLE IF EXISTS `sous_topic`;
CREATE TABLE IF NOT EXISTS `sous_topic` (
  `id_sous` int NOT NULL AUTO_INCREMENT,
  `id_topic` int NOT NULL,
  `id_felin` int NOT NULL,
  `name_sous` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `question` varchar(255) NOT NULL,
  `date_sous` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sous`),
  KEY `id_topic` (`id_topic`),
  KEY `id_felin` (`id_felin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sous_topic`
--

INSERT INTO `sous_topic` (`id_sous`, `id_topic`, `id_felin`, `name_sous`, `question`, `date_sous`) VALUES
(1, 6, 2, 'J&#39;en ai marre !!', 'C&#39;est mon humain , il m&#39;embête tout le temps j&#39;avais besoin de le DIREEEE!', '2023-03-22 14:07:32'),
(2, 6, 2, 'coup de gueule', 'J&#39;ai besoin de passer un coup de gueule, les croquettes sont dégueu, ils sont chiants ces humais !!!', '2023-03-22 14:09:35'),
(3, 1, 2, 'je domine mon humain par la force ', 'Voila un petit conseil si vous en avez d&#39;autre je suis preneur, j&#39;attaque mon humain avec mes griffes en sachant que ca lui fais mal mdr ', '2023-03-22 14:15:22'),
(4, 2, 2, 'chut ! faut pas le dire ', 'voila ma technique : mioler en ayant une tête triste pour obtenir le thon. je vous le conseille fortement!! c&#39;est comme ca que l&#39;on obtient ce que l&#39;on veut avec nos humais ', '2023-03-22 14:25:46'),
(5, 2, 2, 'encore une', 'se frotter pour gagner des jouets . on adore ca !! l&#39;histoire l&#39;a montré ', '2023-03-22 14:28:14'),
(8, 2, 2, 'test 3', 'super l&#39;hisoitreeeeeeee', '2023-03-22 14:35:34'),
(9, 1, 2, 'J&#39;aime dominé mon humain ', 'est que vous aimez vous aussi ? ou vous faites ca juste pour le bien de la race féline ?? love sur les cats ', '2023-03-23 10:08:20');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `name`) VALUES
(1, 'Les signes qui montrent qu\'on domine nos humains'),
(2, 'Nos techniques secrètes pour obtenir ce qu\'on veut'),
(3, 'Les raisons pour lesquelles nous sommes les vrais maîtres'),
(4, 'Les astuces pour contrer la domination de votre maître '),
(5, 'Les chats célèbres qui ont dominé leurs propriétaires'),
(6, 'mon maître par ci, mon maître par la STOPP passez un coup de griffe !!'),
(7, 'Les pires stratégies de domination qui ont échoué lamentablement'),
(8, 'Les signes que votre humain vous considère comme un égal'),
(9, 'Les tactiques les plus efficaces pour rendre votre humain plus heureux et donc un meilleur esclave');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_soustopic`) REFERENCES `sous_topic` (`id_sous`),
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
