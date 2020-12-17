-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 nov. 2020 à 19:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
-- Structure de la table `newtips`
--

DROP TABLE IF EXISTS `newtips`;
CREATE TABLE IF NOT EXISTS `newtips` (
  `id_tips` int(150) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `titretips` varchar(50) NOT NULL,
  `descriptiontips` varchar(500) NOT NULL,
  PRIMARY KEY (`id_tips`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `newtips`
--

INSERT INTO `newtips` (`id_tips`, `nom`, `prenom`, `email`, `titretips`, `descriptiontips`) VALUES
(11, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(10, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(9, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(8, 'Devos', 'William', 'toto@toto.com', 'Ecologie', 'Il est important de ramasser les déchets'),
(12, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(13, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(14, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(15, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(16, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(17, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(18, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(19, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(20, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(21, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(22, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(23, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(24, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(25, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(26, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(27, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!'),
(28, 'toto', 'toto', 'toto@toto.com', 'Pollution', 'Utilisez plutôt le vélo!');

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
-- Structure de la table `signalements`
--

DROP TABLE IF EXISTS `signalements`;
CREATE TABLE IF NOT EXISTS `signalements` (
  `id_sig` int(150) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `probleme` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sig`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalements`
--

INSERT INTO `signalements` (`id_sig`, `nom`, `prenom`, `email`, `probleme`, `status`) VALUES
(1, 'Devos', 'William', 'william.devospro@gmail.com', 'rtytry', 0),
(2, 'Devos', 'William', 'william.devospro@gmail.com', 'rtytry', 0),
(3, 'Devos', 'William', 'william.devospro@gmail.com', 'rtytry', 0),
(4, 'Louis', 'Azerty', 'azerty@gmail.com', 'Incompatibilité', 0),
(5, 'Devos', 'William', 'william.devospro@gmail.com', 'rtertet', 0),
(6, 'Devos', 'William', 'william.devospro@gmail.com', 'azeaze', 0),
(7, 'rrtett', 'rtertrt', 'erterte', 'ertert', 0),
(8, 'tyurrtyu', 'rtyur', 'rtyu', 'rturtu', 0),
(9, 'Devos', 'William', 'ri0xs7@gmail.com', ',n', 0),
(10, 'Devos', 'William', 'william.devospro@gmail.com', 'yu', 0),
(11, 'Devos', 'William', 'william.devospro@gmail.com', 'juiyui', 0),
(12, 'Devos', 'William', 'william.devospro@gmail.com', 'ezrzer', 0),
(13, 'Devos', 'William', 'william.devospro@gmail.com', 'rty', 0),
(14, 'Devos', 'William', 'william.devospro@gmail.com', 'rty', 0),
(15, 'Devos', 'William', 'william.devospro@gmail.com', 'ytutuy', 0),
(16, 'Devos', 'William', 'william.devospro@gmail.com', 'yuiyui', 0),
(17, 'Devos', 'William', 'william.devospro@gmail.com', 'ghygf', 0),
(18, 'yuguygu', 'oihjj', 'iih', 'uighuigiu', 0),
(19, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(20, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(21, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(22, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(23, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(24, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(25, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(26, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(27, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(28, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(29, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(30, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(31, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(32, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(33, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(34, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(35, 'Devos', 'William', 'william.devospro@gmail.com', 'az', 0),
(37, 'Devos', 'William', 'william.devospro@gmail.com', '123', 0),
(38, 'Devos', 'William', 'william.devospro@gmail.com', 'reyryery', 0),
(39, 'Devos', 'William', 'william.devospro@gmail.com', 'azaazz', 0);

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
