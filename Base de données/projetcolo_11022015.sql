-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Février 2015 à 13:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetcolo`
--

-- --------------------------------------------------------

--
-- Structure de la table `colonie`
--

CREATE TABLE IF NOT EXISTS `colonie` (
  `id_Colo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Colo` varchar(255) NOT NULL,
  `dateCreation_Colo` date NOT NULL,
  `orga_Colo` int(11) NOT NULL,
  `code_Colo` int(11) NOT NULL,
  PRIMARY KEY (`id_Colo`),
  UNIQUE KEY `code_Colo` (`code_Colo`),
  KEY `orga_Colo` (`orga_Colo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id_Orga` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Orga` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Orga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Organisation' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rel_user_orga`
--

CREATE TABLE IF NOT EXISTS `rel_user_orga` (
  `Orga` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `debutContrat` date NOT NULL,
  `finContrat` date NOT NULL,
  `dateCreation` date NOT NULL,
  PRIMARY KEY (`Orga`,`User`),
  KEY `fk_rel_id_Colo` (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rel_user_sejour`
--

CREATE TABLE IF NOT EXISTS `rel_user_sejour` (
  `sejour` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`user`),
  KEY `sejour` (`sejour`,`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE IF NOT EXISTS `sejour` (
  `id_Sejour` int(11) NOT NULL AUTO_INCREMENT,
  `debut_Sejour` date NOT NULL,
  `fin_Sejour` date NOT NULL,
  `cateCreation_Sejour` date NOT NULL,
  `colo_Sejour` int(11) NOT NULL,
  `code_Colo` int(11) NOT NULL,
  PRIMARY KEY (`id_Sejour`),
  UNIQUE KEY `code_Colo` (`code_Colo`),
  KEY `colo_Sejour` (`colo_Sejour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_User` int(11) NOT NULL AUTO_INCREMENT,
  `nom_User` varchar(255) NOT NULL,
  `prenom_User` varchar(255) NOT NULL,
  `email_User` varchar(255) NOT NULL,
  `mdp_User` varchar(255) NOT NULL,
  `type_User` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `colonie`
--
ALTER TABLE `colonie`
  ADD CONSTRAINT `fk_id_Orga` FOREIGN KEY (`orga_Colo`) REFERENCES `organisation` (`id_Orga`);

--
-- Contraintes pour la table `rel_user_orga`
--
ALTER TABLE `rel_user_orga`
  ADD CONSTRAINT `fk_rel_id_Colo` FOREIGN KEY (`User`) REFERENCES `colonie` (`id_Colo`),
  ADD CONSTRAINT `fk_rel_id_Orga` FOREIGN KEY (`Orga`) REFERENCES `organisation` (`id_Orga`);

--
-- Contraintes pour la table `rel_user_sejour`
--
ALTER TABLE `rel_user_sejour`
  ADD CONSTRAINT `fe_id_sejour` FOREIGN KEY (`sejour`) REFERENCES `sejour` (`id_Sejour`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`user`) REFERENCES `utilisateur` (`id_User`);

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `fk_id_Colo` FOREIGN KEY (`colo_Sejour`) REFERENCES `colonie` (`id_Colo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
