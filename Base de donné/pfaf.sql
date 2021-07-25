-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 juin 2021 à 23:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfa`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `NomPrenom` varchar(255) DEFAULT NULL,
  `CIN` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Nomvoiture` varchar(3000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_client` (`Nomvoiture`(333))
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id`, `NomPrenom`, `CIN`, `date`, `Nomvoiture`) VALUES
(28, 'gaga', 'CE122', '2021-06-27', 'coference2'),
(29, 'HAJAR', 'CE122', '2021-07-01', 'coference2');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `CodeNiveau` varchar(255) NOT NULL,
  `IntituleNiveau` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodeNiveau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`CodeNiveau`, `IntituleNiveau`) VALUES
('1A', 'Premiere annee'),
('DG', 'DEUG'),
('Lce', 'Licence'),
('AP 1', 'Première Annee Preparatoire'),
('AP 2', 'Deuxième Annee Préparatoire'),
('IIR 3', '3eme Annee Ingenierie Informatique et Reseau'),
('IIR 4', '4eme Annee Ingenierie Informatique et Reseau'),
('5 MIAGE', '5eme Annee Master Apllique'),
('GC 1', '1ere Génie Civil'),
('GC 2', '2eme Génie Civil'),
('GC 3', '3eme Génie Civil'),
('GC 4', '4eme Génie Civil'),
('GC 5', '5eme Génie Civil');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUser` int(10) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Role` varchar(255) DEFAULT NULL,
  `Etat` int(1) DEFAULT NULL,
  `Passwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `Login`, `Email`, `Role`, `Etat`, `Passwd`) VALUES
(3, 'admin', 'b.ouissal@gmail.com', 'ADMIN', 1, '21232f297a57a5a743894a0e4a801fc3'),
(16, 'ouissal', 'ouissal.ben@gmail.com', 'USER', 1, '1f08f2683714a7186f2372ab809f5ee3'),
(12, 'ryme', 'rym@gmail.com', 'ADMIN', 1, 'abfc697f2b0878e599f81f356621240d'),
(18, 'gaga', 'gaga@gmail.com', 'USER', 1, '811584043b844704c9bb9a6e99dd05d3');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `Date_Creation` date DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `image` varchar(3000) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `prix` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `nom`, `Date_Creation`, `Adresse`, `image`, `description`, `prix`) VALUES
('coference2', 'SALLE de CONFERENCE', '2012-12-21', 'ADRESSE8', 'CONFERENCE2.jpg', 'DESCRIPTION8', '4400'),
('coference3', 'SALLE de CONFERENCE', '2001-08-21', 'ADRESSE8', 'CONFERENCE3.jpg', 'DESCRIPTION9', '5000'),
('coference4', 'SALLE de CONFERENCE', '2012-12-21', 'ADRESSE9', 'CONFERENCE4.jpg', 'DESCRIPTION9', '3000'),
('coference5', 'SALLE de CONFERENCE', '2012-08-21', 'ADRESSE10', 'CONFERENCE5.jpg', 'DESCRIPTION10', '5009'),
('coference6', 'SALLE de CONFERENCE', '2001-08-21', 'ADRESSE11', 'CONFERENCE6.jpg', 'DESCRIPTION12', '7000'),
('reunion2', 'SALLE de reunion', '2012-12-21', 'ADRESSE2', 'reunion2.jpg', 'DESCRIPTION2', '5000'),
('reunion3', 'SALLE de reunion', '2001-08-21', 'ADRESSE3', 'REUNION3.jpg', 'DESCRIPTION3', '3000'),
('reunion4', 'SALLE de reunion', '2022-04-21', 'ADRESSE4', 'REUNION4.jpg', 'DESCRIPTION4', '3400'),
('reunion5', 'SALLE de reunion', '2012-06-21', 'ADRESSE5', 'REUNION5.jpg', 'DESCRIPTION5', '5000'),
('reunion6', 'SALLE de reunion', '2012-12-21', 'ADRESSE6', 'REUNION6.jpg', 'DESCRIPTION6', '5000'),
('coference1', 'SALLE de CONFERENCE', '2022-04-21', 'ADRESSE7', 'CONFERENCE1.jpg', 'DESCRIPTION7', '5009'),
('reunion1', 'SALLE de reunion', '2012-08-21', 'ADRESSE1', 'reunion1.jpg', 'DESCRIPTION1', '4100');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
