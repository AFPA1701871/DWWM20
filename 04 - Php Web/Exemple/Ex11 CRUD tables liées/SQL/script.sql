CREATE DATABASE IF NOT EXISTS `baseproduits` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `baseproduits`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelleProduit` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `dateDePeremption` date NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `FK_Produit_Categorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_Produit_Categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);
