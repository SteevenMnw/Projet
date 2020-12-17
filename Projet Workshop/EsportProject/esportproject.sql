-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 déc. 2020 à 15:26
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `esportproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(250) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `prenom`, `nom`, `email`) VALUES
(1, 'Julien', 'chassaing', 'dazdazd@lkj'),
(2, 'Steeven', 'Michniewicz', 'azdadzad@rthrt'),
(3, 'Elyas', 'Mahmoudi', 'bgbfb@azeafe');

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_neutre` int(250) NOT NULL,
  `id_cara` int(250) DEFAULT NULL,
  `id_lolposte` int(250) DEFAULT NULL,
  `id_lolrank` int(250) DEFAULT NULL,
  `id_csrank` int(250) DEFAULT NULL,
  KEY `FK_AvoirNeutre` (`id_neutre`),
  KEY `FK_AvoirCara` (`id_cara`),
  KEY `FK_avoir_lolposte` (`id_lolposte`),
  KEY `FK_avoir_lolrank` (`id_lolrank`),
  KEY `FK_avoir_csrank` (`id_csrank`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_neutre`, `id_cara`, `id_lolposte`, `id_lolrank`, `id_csrank`) VALUES
(1, 1, NULL, NULL, NULL),
(1, 4, NULL, NULL, NULL),
(1, 7, NULL, NULL, NULL),
(1, 10, NULL, NULL, NULL),
(1, 14, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL),
(2, 12, NULL, NULL, NULL),
(1, NULL, 3, 8, NULL),
(1, NULL, NULL, NULL, 18),
(2, NULL, NULL, NULL, 1),
(2, NULL, 1, 9, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique`
--

DROP TABLE IF EXISTS `caracteristique`;
CREATE TABLE IF NOT EXISTS `caracteristique` (
  `id_cara` int(250) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL COMMENT 'G, IG ou P',
  PRIMARY KEY (`id_cara`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `caracteristique`
--

INSERT INTO `caracteristique` (`id_cara`, `libelle`, `statut`) VALUES
(1, 'Social Gamers', 'G'),
(2, 'Leisure Gamers', 'G'),
(3, 'Dormant Gamers', 'G'),
(4, 'Dirigeant', 'IG'),
(5, 'Dirigé', 'IG'),
(6, 'Neutre', 'IG'),
(7, 'Ambitieux', 'P'),
(8, 'Calme', 'P'),
(9, 'Persévérant', 'P'),
(10, 'Coopératif', 'P'),
(11, 'Compétitif', 'P'),
(12, 'Ouvert', 'P'),
(13, 'Patient', 'P'),
(14, 'Ponctuelle', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `csgorank`
--

DROP TABLE IF EXISTS `csgorank`;
CREATE TABLE IF NOT EXISTS `csgorank` (
  `id_csrank` int(250) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id_csrank`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `csgorank`
--

INSERT INTO `csgorank` (`id_csrank`, `libelle`) VALUES
(1, 'Silver I'),
(2, 'Silver II'),
(3, 'Silver III'),
(4, 'Silver IV'),
(5, 'Silver Elite'),
(6, 'Silver Elite Master'),
(7, 'Gold Nova I'),
(8, 'Gold Nova II'),
(9, 'Gold Nova III'),
(10, 'Gold Nova Master'),
(11, 'Master Guadrien I'),
(12, 'Master Guadrien II'),
(13, 'Master Guadrien Elite'),
(14, 'Sherif'),
(15, 'Legendary Eagle'),
(16, 'Legendary Eagle Master'),
(17, 'Supreme'),
(18, 'Global Elite');

-- --------------------------------------------------------

--
-- Structure de la table `lolposte`
--

DROP TABLE IF EXISTS `lolposte`;
CREATE TABLE IF NOT EXISTS `lolposte` (
  `id_lolposte` int(250) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id_lolposte`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lolposte`
--

INSERT INTO `lolposte` (`id_lolposte`, `libelle`) VALUES
(1, 'Top'),
(2, 'Jungle'),
(3, 'Mid'),
(4, 'Adc'),
(5, 'Support'),
(6, 'Tout');

-- --------------------------------------------------------

--
-- Structure de la table `lolrank`
--

DROP TABLE IF EXISTS `lolrank`;
CREATE TABLE IF NOT EXISTS `lolrank` (
  `id_lolrank` int(250) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id_lolrank`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lolrank`
--

INSERT INTO `lolrank` (`id_lolrank`, `libelle`) VALUES
(1, 'Bronze'),
(2, 'Silver'),
(3, 'Gold'),
(4, 'Platine'),
(5, 'Diamant'),
(6, 'Master'),
(7, 'GrandMaster'),
(8, 'Challenger'),
(9, 'Unranked');

-- --------------------------------------------------------

--
-- Structure de la table `neutre`
--

DROP TABLE IF EXISTS `neutre`;
CREATE TABLE IF NOT EXISTS `neutre` (
  `id_neutre` int(250) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id_neutre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `neutre`
--

INSERT INTO `neutre` (`id_neutre`, `prenom`, `nom`, `email`) VALUES
(1, 'tt', 'tt', 'adzazd@adadz'),
(2, 'tt2', 'tt2', 'adzazd@adadz'),
(3, 'test3', 'test3', 'test@test'),
(4, 'test4', 'test4', 'test4@test4');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(250) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `statut` varchar(250) DEFAULT NULL COMMENT 'N ou A',
  `matricule` int(250) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `FK_Neutre` (`matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `mdp`, `statut`, `matricule`) VALUES
(1, 'julien', 'julien', 'A', 1),
(2, 'test', 'test', 'N', 1),
(3, 'test2', 'test2', 'N', 2),
(4, 'steeven', 'steeven', 'A', 2),
(5, 'elyas', 'elyas', 'A', 3);

--
-- Déclencheurs `utilisateur`
--
DROP TRIGGER IF EXISTS `Add_N_Auto`;
DELIMITER $$
CREATE TRIGGER `Add_N_Auto` BEFORE INSERT ON `utilisateur` FOR EACH ROW BEGIN 
    IF new.statut IS NULL THEN
        SET new.statut = 'N';
    END IF;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
