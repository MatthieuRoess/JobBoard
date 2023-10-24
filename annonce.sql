-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 oct. 2023 à 11:39
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
-- Base de données : `annonce`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaire` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lieu` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `temps_travail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idEntreprises` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprises` (`idEntreprises`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `salaire`, `lieu`, `temps_travail`, `description`, `idEntreprises`) VALUES
(1, 'Ingénieur Logiciel Senior', '70 000€ - 90 000€ par an', 'Paris, France', 'Temps plein', 'Rejoignez notre équipe pour concevoir, développer et optimiser des solutions logicielles de pointe pour nos clients dans le secteur de la technologie.', 1),
(2, 'Développeur Web Full Stack', '55 000€ - 75 000€ par an', 'San Francisco, États-Unis', 'Temps plein', 'Vous serez responsable du développement de nos applications web et de la création d\'expériences utilisateur exceptionnelles.', 1),
(3, 'Data Scientist', '60 000€ - 80 000€ par an', 'Berlin, Allemagne', 'Temps plein', 'Utilisez vos compétences en science des données pour extraire des insights précieux à partir de nos données et contribuez à la prise de décisions stratégiques.', 1),
(4, 'Administrateur Système et Réseau', '45 000€ - 65 000€ par an', 'Toronto, Canada', 'Temps plein', 'Gérez notre infrastructure informatique, assurez la sécurité et la disponibilité de nos systèmes.', 1),
(5, 'UX Designer', '50 000€ - 70 000€ par an', 'Londres, Royaume-Uni', 'Temps plein', 'Créez des interfaces utilisateur intuitives et engageantes pour nos applications et sites web.', 1),
(6, 'Analyste de la Sécurité Informatique', '65 000€ - 85 000€ par an', 'New York, États-Unis', 'Temps plein', 'Protégez nos systèmes contre les menaces et les vulnérabilités en analysant les risques de sécurité.', 2),
(7, 'Chef de Projet IT', '70 000€ - 90 000€ par an', 'Sydney, Australie', 'Temps plein', 'Gérez des projets informatiques complexes, de la planification à la mise en œuvre.', 2),
(8, 'Développeur Mobile iOS', '55 000€ - 75 000€ par an', 'Montréal, Canada', 'Temps plein', 'Créez des applications iOS innovantes pour améliorer l\'expérience de nos utilisateurs.', 2),
(9, ' Ingénieur DevOps', '60 000€ - 80 000€ par an', 'Barcelone, Espagne', 'Temps plein', 'Mettez en place des pratiques DevOps pour automatiser le déploiement et la gestion de l\'infrastructure.', 2),
(10, 'Développeur de Jeux Vidéo', '50 000€ - 70 000€ par an', 'Los Angeles, États-Unis', 'Temps plein', 'Participez à la création de jeux vidéo passionnants en tant que développeur talentueux au sein de notre studio de développement.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lieu` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `lieu`, `tel`, `mail`) VALUES
(1, 'ONF', 'Colmar', '0123456789', 'lsombra597@gmail.com'),
(2, 'Incotec', 'Strasbourg', '0123456789', 'lsombra597@gmail.com'),
(3, 'Microsoft ', 'Washington, États-Unis', '0123456789', 'lsombra597@gmail.com'),
(4, 'Apple Inc', 'Californie, États-Unis', '0123456789', 'lsombra597@gmail.com'),
(5, 'Google ', 'Californie, États-Unis', '0123456789', 'lsombra597@gmail.com'),
(6, 'IBM ', 'New York, États-Unis', '0123456789', 'lsombra597@gmail.com'),
(7, 'Amazon ', 'Washington, États-Unis', '0123456789', 'lsombra597@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idUtilisateurs` int NOT NULL,
  `idAnnonces` int NOT NULL,
  `idEntreprises` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateurs` (`idUtilisateurs`),
  KEY `idAnnonces` (`idAnnonces`),
  KEY `idEntreprises` (`idEntreprises`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `nom`, `prenom`, `mail`, `tel`, `message`, `idUtilisateurs`, `idAnnonces`, `idEntreprises`) VALUES
(1, 'Mey', 'Tristan', 'mey@gmail.com', '0123456789', 'Je postule. Bonjour.', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'entreprise'),
(3, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idEntreprises` int DEFAULT NULL,
  `idRoles` int NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprises` (`idEntreprises`),
  KEY `idRoles` (`idRoles`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `tel`, `mail`, `idEntreprises`, `idRoles`, `login`, `mdp`) VALUES
(1, 'user', 'user', '0123456789', 'user@gmail.com', 0, 3, 'user', '$2y$10$/NbeYyjojLHGsQt8pLgsc.I4d6xC1S8tMXuj6SKfw20X/OjZR0BJu'),
(2, 'admin', 'admin', '0123456789', 'admin@gmail.com', 0, 1, 'admin', '$2y$10$2DqnTZ3umWt756cBl0tx6uIS1meO/jsubBx4R9J7QLZIL4w2CPGYK'),
(3, 'onf', 'onf', '0123456789', 'onf@gmail.com', 1, 2, 'onf', '$2y$10$PkBq/Lj0HLfg/b6.7Y2dPeB7zGeNn/VjJne2CQguag1sTXSAGwlJC'),
(4, 'incotec', 'incotec', '0123456789', 'incotec@gmail.com', 2, 2, 'incotec', '$2y$10$lp2D9BrmZto6IP8SeYaQH..HLhNE4noGWf6uOYKQR/bHcFmhpvIuS'),
(5, 'Bravo', 'Loic', '0123456789', 'bravo@gmail.com', 0, 3, 'bravo', '$2y$10$PrYBciNbd5BcEEsVFxJNDu3LbxR29wsgGxrzgS7VXKiutg1YXmd5u'),
(6, 'Roess', 'Matthieu', '0123456789', 'roess@gmail.com', 0, 3, 'roess', '$2y$10$fFVPNU3jI5cKJEzbGyH04OGbG/hvw27k85kd33qERQI/fM03PPKda'),
(7, 'admin2', 'admin2', '0123456789', 'admin2@gmail.com', 0, 1, 'admin2', '$2y$10$5YwNrz2wfjKSJMc0.G6Tyu.N2bXhe/o9Fq2GxAQCkeL2LBcqLKCnu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
