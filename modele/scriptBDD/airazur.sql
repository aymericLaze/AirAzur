-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 sep. 2017 à 20:11
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airazur`
--

-- --------------------------------------------------------

--
-- Structure de la table `aeroport`
--

DROP TABLE IF EXISTS `aeroport`;
CREATE TABLE IF NOT EXISTS `aeroport` (
  `idAeroport` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(30) DEFAULT NULL,
  `pays` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idAeroport`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aeroport`
--

INSERT INTO `aeroport` (`idAeroport`, `ville`, `pays`) VALUES
(1, 'Paris', 'France'),
(2, 'Dakar', 'SÃ©nÃ©gal');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idVols` varchar(10) DEFAULT NULL,
  `nomClient` varchar(30) NOT NULL,
  `prenomClient` varchar(30) NOT NULL,
  `adresseClient` varchar(50) NOT NULL,
  `codePostalClient` int(5) NOT NULL,
  `villeClient` varchar(30) NOT NULL,
  `telClient` varchar(20) NOT NULL,
  `melClient` varchar(50) NOT NULL,
  `prixTotal` int(11) DEFAULT NULL,
  `nbPlaceReservee` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idVols` (`idVols`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

DROP TABLE IF EXISTS `vols`;
CREATE TABLE IF NOT EXISTS `vols` (
  `idVols` varchar(10) NOT NULL,
  `aeroportDepart` int(11) DEFAULT NULL,
  `aeroportArrivee` int(11) DEFAULT NULL,
  `dateDepart` datetime NOT NULL,
  `dateArrivee` datetime NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVols`),
  KEY `aeroportDepart` (`aeroportDepart`),
  KEY `aeroportArrivee` (`aeroportArrivee`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`idVols`, `aeroportDepart`, `aeroportArrivee`, `dateDepart`, `dateArrivee`, `prix`, `place`) VALUES
('AIR5007', 1, 2, '2011-04-22 12:00:00', '2011-04-22 17:00:00', 560, 120),
('AIR5108', 1, 2, '2011-04-23 13:00:00', '2011-04-23 18:20:00', 560, 120);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
