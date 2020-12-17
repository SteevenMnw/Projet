-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 mars 2020 à 09:23
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
-- Base de données :  `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numero_agence` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `code_region` int(11) NOT NULL,
  PRIMARY KEY (`numero_agence`),
  KEY `FK1` (`code_region`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numero_agence`, `nom`, `adresse`, `telephone`, `fax`, `code_region`) VALUES
(1, 'agence1', 'sdfgh', 'dfghj', 'dfghj', 1),
(2, 'agence2', 'sdfvb', 'sdfg', 'sdfgh', 2),
(3, 'vbn,', 'dfgb', 'fghj', 'fghj', 1);

-- --------------------------------------------------------

--
-- Structure de la table `assistant`
--

DROP TABLE IF EXISTS `assistant`;
CREATE TABLE IF NOT EXISTS `assistant` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_embauche` date NOT NULL,
  `code_region` int(11) NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `FK1` (`code_region`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assistant`
--

INSERT INTO `assistant` (`matricule`, `nom`, `prenom`, `adresse`, `date_embauche`, `code_region`) VALUES
(1, 'leclercq', 'leclercq', 'ghjklm', '2019-11-19', 1),
(2, 'izi', 'morray', 'dfgh', '2019-11-20', 2),
(4, 'Lambin', 'Julien', '7 rue des bg', '2019-11-19', 1),
(3, 'Mich', 'Steveen', '16 rue des moches', '2019-11-20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numero_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `raison_sociale` varchar(255) NOT NULL,
  `siren` varchar(255) NOT NULL,
  `code_APE` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `duree_deplacement` varchar(255) NOT NULL,
  `distance_km` int(11) NOT NULL,
  `numero_agence` int(11) NOT NULL,
  PRIMARY KEY (`numero_client`),
  KEY `FK1` (`numero_agence`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numero_client`, `nom`, `prenom`, `raison_sociale`, `siren`, `code_APE`, `adresse`, `telephone`, `fax`, `email`, `duree_deplacement`, `distance_km`, `numero_agence`) VALUES
(1, 'bjr', 'morray', 'izi', 'BG', 'RATPI', '12 Rue de la Paix, IZI', '049610', 'erthyj', 'ratpi@izi.fr', '30min', 2, 1),
(2, 'izi', 'au-revoir', 'oklm', 'B2O', 'fdxgch', '13 Rue de la Sauvagerie, IZI', 'fdghn,', 'fghj', 'fghj', 'erftgh', 2, 2),
(3, 'salut', 'anthony', 'sdfg', 'sdfgh', 'sdfg', 'sdfg', 'sdfg', 'sdf', 'sdfg', 'sdfg', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contrat_maintenance`
--

DROP TABLE IF EXISTS `contrat_maintenance`;
CREATE TABLE IF NOT EXISTS `contrat_maintenance` (
  `numero_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `date_signature` date NOT NULL,
  `date_echeance` date NOT NULL,
  `numero_client` int(11) NOT NULL,
  `refTypeContrat` int(11) NOT NULL,
  PRIMARY KEY (`numero_contrat`),
  KEY `FK1` (`numero_client`),
  KEY `FK2` (`refTypeContrat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrat_maintenance`
--

INSERT INTO `contrat_maintenance` (`numero_contrat`, `date_signature`, `date_echeance`, `numero_client`, `refTypeContrat`) VALUES
(1, '2019-06-17', '2020-03-17', 1, 1),
(2, '2019-11-10', '2020-02-20', 2, 1),
(3, '2019-06-17', '2020-03-15', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_serie` int(11) NOT NULL,
  `numero_intervention` int(11) NOT NULL,
  `temps_passer` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`numero_serie`,`numero_intervention`),
  KEY `FK1` (`numero_serie`),
  KEY `FK2` (`numero_intervention`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `controler`
--

INSERT INTO `controler` (`id`, `numero_serie`, `numero_intervention`, `temps_passer`, `commentaire`) VALUES
(4, 1, 105, '20:15', 'izi'),
(5, 2, 110, '00:15', 'morray'),
(6, 3, 110, '00:15', 'bjr'),
(7, 2, 106, '01:03', 'bon travail'),
(8, 92, 106, '09:02', '92'),
(9, 59, 106, '05:09', '59'),
(10, 1, 105, '15:20', 'izi'),
(11, 2, 105, '00:05', '30'),
(12, 2, 113, '00:05', 'Erreur'),
(13, 20, 113, '00:10', 'Erreur1');

-- --------------------------------------------------------

--
-- Structure de la table `famille_produit`
--

DROP TABLE IF EXISTS `famille_produit`;
CREATE TABLE IF NOT EXISTS `famille_produit` (
  `code_famille` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`code_famille`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `numero_intervention` int(11) NOT NULL AUTO_INCREMENT,
  `date_visite` date NOT NULL,
  `heure_visite` varchar(255) NOT NULL,
  `matricule_technicien` int(11) NOT NULL,
  `numero_client` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`numero_intervention`),
  KEY `FK1` (`matricule_technicien`),
  KEY `numero_client` (`numero_client`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`numero_intervention`, `date_visite`, `heure_visite`, `matricule_technicien`, `numero_client`, `statut`) VALUES
(130, '2020-03-11', '13:00', 2, 2, 0),
(129, '2020-03-12', '12:00', 1, 1, 1),
(128, '2020-03-18', '15:00', 1, 1, 1),
(127, '2020-03-19', '15:30', 1, 1, 1),
(126, '2020-02-19', '15:20', 1, 1, 1),
(125, '2020-02-18', '15:20', 2, 2, 1),
(115, '2020-02-11', '16:00', 4, 1, 1),
(113, '2020-03-11', '03:03', 1, 1, 1),
(114, '2020-02-12', '23:23', 1, 1, 1),
(105, '2019-12-20', '22:00', 1, 3, 1),
(106, '2019-12-12', '15:20', 1, 2, 1),
(131, '2020-03-11', '15:00', 1, 1, 0);

--
-- Déclencheurs `intervention`
--
DROP TRIGGER IF EXISTS `verif_inter`;
DELIMITER $$
CREATE TRIGGER `verif_inter` BEFORE INSERT ON `intervention` FOR EACH ROW BEGIN
          SET @b = (SELECT count(*) FROM intervention WHERE numero_client = NEW.numero_client AND statut = 0);
          if @b >= 1 THEN 
          begin 
         SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ne fonctionne pas';
         end;
         end if;
      END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numero_serie` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_vente` date NOT NULL,
  `date_installation` date NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `reference_type` int(11) NOT NULL,
  `numero_client` int(11) NOT NULL,
  PRIMARY KEY (`numero_serie`),
  KEY `FK1` (`reference_type`),
  KEY `FK2` (`numero_client`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`numero_serie`, `date_de_vente`, `date_installation`, `emplacement`, `reference_type`, `numero_client`) VALUES
(1, '2019-11-12', '2019-11-14', 'sdfg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `code_region` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`code_region`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`code_region`, `nom`) VALUES
(1, 'Nord'),
(2, 'Ile-de-france\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_embauche` date NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `date_obtention` date NOT NULL,
  `numero_agence` int(11) NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `FK1` (`numero_agence`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`matricule`, `nom`, `prenom`, `adresse`, `date_embauche`, `telephone`, `qualification`, `date_obtention`, `numero_agence`) VALUES
(1, 'Leclercq', 'Anthony', 'vbn,;:', '2019-11-05', 'fghjklm', 'dfghjklmù', '2019-11-13', 1),
(2, 'zedfg', 'zsdfgh', 'sdfgh', '2019-11-20', 'sdf', 'sdfg', '2019-11-20', 2),
(3, 'lelelel', 'aaaaaaa', 'rfghjklmù*', '2019-11-13', 'ghjklm', 'tyjklmù', '2019-11-05', 3),
(4, 'izi', 'morray', 'gh,;:', '2019-11-13', 'dfghjkl', 'fghjk', '2019-11-14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `refTypeContrat` int(11) NOT NULL AUTO_INCREMENT,
  `delai_intervention` varchar(255) NOT NULL,
  `Taux_applicable` int(11) NOT NULL,
  PRIMARY KEY (`refTypeContrat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`refTypeContrat`, `delai_intervention`, `Taux_applicable`) VALUES
(1, 'ghjk', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_materiel`
--

DROP TABLE IF EXISTS `type_materiel`;
CREATE TABLE IF NOT EXISTS `type_materiel` (
  `reference` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `code_famille` int(11) NOT NULL,
  PRIMARY KEY (`reference`),
  KEY `FK1` (`code_famille`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` varchar(1) NOT NULL COMMENT 'T ou A',
  `matricule` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `mdp`, `statut`, `matricule`) VALUES
(1, 'anthony', 'anthony', 'T', 1),
(2, 'leclercq', 'leclercq', 'A', 1),
(3, 'izi', 'izi', '', 0),
(4, 'lambin', 'lambin', 'A', 4),
(5, 'steveen', 'steveen', 'A', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
