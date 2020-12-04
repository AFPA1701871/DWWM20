
DROP DATABASE IF EXISTS gestionsannonces;
CREATE DATABASE gestionsannonces;
USE gestionsannonces;

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `idAnnonce` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titreAnnonce` varchar(50) NOT NULL,
  `lienImg` varchar(100) NOT NULL,
  `libelleAnnonce` varchar(100) NOT NULL,
  `prixAnnonce` float NOT NULL,
  `datePublication` varchar(10) NOT NULL,
  `statutAnnonce` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `libelleCategorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `libelleMessage` varchar(500) NOT NULL,
  `contenueMessage` varchar(500) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `libelleRole` varchar(50) NOT NULL,
  `codeRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nomUtilisateur` varchar(50) NOT NULL,
  `prenomutilisateur` varchar(50) NOT NULL,
  `emailUtilisateur` varchar(50) NOT NULL,
  `pseudoUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` varchar(50) NOT NULL,
  `telUtilisateur` varchar(10) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `annonces` ADD CONSTRAINT `FK_annonces_categories` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);
ALTER TABLE `annonces` ADD CONSTRAINT `FK_annonces_utilisateurs` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

ALTER TABLE `messages` ADD CONSTRAINT `FK_messages_utilisateurs` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);


ALTER TABLE `utilisateurs` ADD CONSTRAINT `FK_utilisateur_roles` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);