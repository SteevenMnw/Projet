-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 nov. 2020 à 13:05
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
-- Base de données :  `ecotips`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `matricule` int(250) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`matricule`, `nom`, `prenom`, `adresse`) VALUES
(1, 'paul', 'J', '3 rue avion');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(250) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `tag` varchar(250) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `titre`, `description`, `tag`) VALUES
(1, 'Ecologie', 'Anti-polution/Renouvelable', 'Eco'),
(2, 'Bonne maniere', 'Respect', 'Bonne maniere');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_client` int(250) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `descriptif` varchar(250) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenujeu`
--

DROP TABLE IF EXISTS `contenujeu`;
CREATE TABLE IF NOT EXISTS `contenujeu` (
  `iddujeu` int(250) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `nb_rep` int(250) NOT NULL,
  `id_rep` varchar(250) NOT NULL,
  PRIMARY KEY (`iddujeu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `id_jeu` int(250) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `niv` varchar(250) NOT NULL,
  `id_cat` int(250) NOT NULL,
  PRIMARY KEY (`id_jeu`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `titre`, `description`, `niv`, `id_cat`) VALUES
(1, 'Utiliser la bonne poubelle', 'Savoir quel produit va dans quelle poubelle', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponsejeu`
--

DROP TABLE IF EXISTS `reponsejeu`;
CREATE TABLE IF NOT EXISTS `reponsejeu` (
  `id_rep` int(250) NOT NULL AUTO_INCREMENT,
  `numrep` int(250) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id_rep`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(250) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL COMMENT 'A ou U',
  `matricule` varchar(250) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `identifiant`, `mdp`, `statut`, `matricule`) VALUES
(1, 'PaulJ', 'paulj', 'A', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
