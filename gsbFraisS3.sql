-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gsbFraisS3
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `gsbFraisS3`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gsbFraisS3` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gsbFraisS3`;

--
-- Table structure for table `etat`
--

DROP TABLE IF EXISTS `etat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etat`
--

LOCK TABLES `etat` WRITE;
/*!40000 ALTER TABLE `etat` DISABLE KEYS */;
INSERT INTO `etat` VALUES (1,'Remboursée'),(2,'Saisie clôturée'),(3,'Fiche créée, saisie en cours'),(4,'Validée et mise en paiement'),(29,NULL),(30,NULL),(31,NULL),(32,NULL),(33,NULL),(34,NULL),(35,NULL),(36,NULL),(37,NULL),(38,NULL),(39,NULL),(40,NULL),(41,NULL),(42,NULL),(43,NULL),(44,NULL),(45,NULL);
/*!40000 ALTER TABLE `etat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etat_visiteur`
--

DROP TABLE IF EXISTS `etat_visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etat_visiteur` (
  `etat_id` int(11) NOT NULL,
  `visiteur_id` int(11) NOT NULL,
  PRIMARY KEY (`etat_id`,`visiteur_id`),
  KEY `IDX_D3702F28D5E86FF` (`etat_id`),
  KEY `IDX_D3702F287F72333D` (`visiteur_id`),
  CONSTRAINT `FK_D3702F287F72333D` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id`),
  CONSTRAINT `FK_D3702F28D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etat_visiteur`
--

LOCK TABLES `etat_visiteur` WRITE;
/*!40000 ALTER TABLE `etat_visiteur` DISABLE KEYS */;
/*!40000 ALTER TABLE `etat_visiteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichefrais`
--

DROP TABLE IF EXISTS `fichefrais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fichefrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nbJustificatif` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `annee` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `idVisiteur` int(11) DEFAULT NULL,
  `idetat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_92D5AB081D06ADE3` (`idVisiteur`),
  KEY `IDX_92D5AB08860506C2` (`idetat`),
  CONSTRAINT `FK_92D5AB081D06ADE3` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`),
  CONSTRAINT `FK_92D5AB08860506C2` FOREIGN KEY (`idetat`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichefrais`
--

LOCK TABLES `fichefrais` WRITE;
/*!40000 ALTER TABLE `fichefrais` DISABLE KEYS */;
INSERT INTO `fichefrais` VALUES (1,'04',70,80.00,'2018-04-20','2018',1,3),(2,'04',2,300.00,'2018-04-23','2018',2,3),(3,'04',1,30.00,'2018-04-23','2018',3,3);
/*!40000 ALTER TABLE `fichefrais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frais_forfait`
--

DROP TABLE IF EXISTS `frais_forfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frais_forfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frais_forfait`
--

LOCK TABLES `frais_forfait` WRITE;
/*!40000 ALTER TABLE `frais_forfait` DISABLE KEYS */;
INSERT INTO `frais_forfait` VALUES (1,'Forfait Etape',110.00),(2,'Frais Kilométrique',0.62),(3,'Nuitée Hôtel',80.00),(4,'Repas Restaurant',25.00);
/*!40000 ALTER TABLE `frais_forfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignefraisforfait`
--

DROP TABLE IF EXISTS `lignefraisforfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignefraisforfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfraisforfait` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `idfiche` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ED4F43429A16A061` (`idfiche`),
  KEY `IDX_ED4F434296B84E82` (`idfraisforfait`),
  CONSTRAINT `FK_ED4F434296B84E82` FOREIGN KEY (`idfraisforfait`) REFERENCES `frais_forfait` (`id`),
  CONSTRAINT `FK_ED4F43429A16A061` FOREIGN KEY (`idfiche`) REFERENCES `fichefrais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignefraisforfait`
--

LOCK TABLES `lignefraisforfait` WRITE;
/*!40000 ALTER TABLE `lignefraisforfait` DISABLE KEYS */;
INSERT INTO `lignefraisforfait` VALUES (1,1,30,1),(2,2,40,1),(3,3,20,1),(4,4,10,1),(5,1,2,2),(6,2,100,2),(7,3,10,2),(8,4,25,2),(9,1,1,3),(10,2,300,3),(11,3,5,3),(12,4,30,3);
/*!40000 ALTER TABLE `lignefraisforfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignefraisforfait_visiteur`
--

DROP TABLE IF EXISTS `lignefraisforfait_visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignefraisforfait_visiteur` (
  `lignefraisforfait_id` int(11) NOT NULL,
  `visiteur_id` int(11) NOT NULL,
  PRIMARY KEY (`lignefraisforfait_id`,`visiteur_id`),
  KEY `IDX_2F8A219B2868DCB4` (`lignefraisforfait_id`),
  KEY `IDX_2F8A219B7F72333D` (`visiteur_id`),
  CONSTRAINT `FK_2F8A219B2868DCB4` FOREIGN KEY (`lignefraisforfait_id`) REFERENCES `lignefraisforfait` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2F8A219B7F72333D` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignefraisforfait_visiteur`
--

LOCK TABLES `lignefraisforfait_visiteur` WRITE;
/*!40000 ALTER TABLE `lignefraisforfait_visiteur` DISABLE KEYS */;
/*!40000 ALTER TABLE `lignefraisforfait_visiteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignefraishorsforfait`
--

DROP TABLE IF EXISTS `lignefraishorsforfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignefraishorsforfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(7,2) DEFAULT NULL,
  `id_fiche_frais_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8543E145E429EA53` (`id_fiche_frais_id`),
  CONSTRAINT `FK_8543E145E429EA53` FOREIGN KEY (`id_fiche_frais_id`) REFERENCES `fichefrais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignefraishorsforfait`
--

LOCK TABLES `lignefraishorsforfait` WRITE;
/*!40000 ALTER TABLE `lignefraishorsforfait` DISABLE KEYS */;
INSERT INTO `lignefraishorsforfait` VALUES (1,'Musée','2013-01-01',60.00,1),(2,'Reception','2018-03-20',250.00,2),(3,'Bayer','2018-03-28',30.00,3);
/*!40000 ALTER TABLE `lignefraishorsforfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mdp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `typeAccount` int(11) DEFAULT NULL,
  `matricule` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visiteur`
--

LOCK TABLES `visiteur` WRITE;
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` VALUES (1,'Villechalane','Louis','lvillachane','jux7g','8 rue des Charmes','46000','Cahors','2005-12-21',1,'a131'),(2,'Andre','David','dandre','oppg5','1 rue Petit','46200','Lalbenque','1998-11-23',1,'a17'),(3,'Bedos','Christian','cbedos','gmhxd','1 rue Peranud','46250','Montcuq','1995-01-12',1,'a55'),(4,'Tusseau','Louis','ltusseau','ktp3s','22 rue des Ternes','46123','Gramat','2000-05-01',1,'a93'),(5,'Bentot','Pascal','pbentot','doyw1','11 allée des Cerises','46512','Bessines','1992-07-09',1,'b13'),(6,'Bioret','Luc','lbioret','hrjfs','1 Avenue gambetta','46000','Cahors','1998-05-11',1,'b16'),(7,'Bunisset','Francis','fbunisset','4vbnd','10 rue des Perles','93100','Montreuil','1987-10-21',1,'b19'),(8,'Bunisset','Denise','dbunisset','s1y1r','23 rue Manin','75019','paris','2010-12-05',1,'b25'),(9,'Cacheux','Bernard','bcacheux','uf7r3','114 rue Blanche','75017','Paris','2009-11-12',1,'b28'),(10,'Cadic','Eric','ecadic','6u8dc','123 avenue de la République','75011','Paris','2008-09-23',1,'b34'),(11,'Charoze','Catherine','ccharoze','u817o','100 rue Petit','75019','Paris','2005-11-12',1,'b4'),(12,'Clepkens','Christophe','cclepkens','bw1us','12 allée des Anges','93230','Romainville','2003-08-11',1,'b50'),(13,'Cottin','Vincenne','vcottin','2hoh9','36 rue Des Roches','93100','Monteuil','2001-11-18',1,'b59'),(14,'Debelle','Jeanne','jdebelle','nvwqq','134 allée des Joncs','44000','Nantes','2000-05-11',1,'d13'),(15,'Debroise','Michel','mdebroise','sghkb','2 Bld Jourdain','44000','Nantes','2001-04-17',1,'d51'),(16,'Desmarquest','Nathalie','ndesmarquest','f1fob','14 Place d Arc','45000','Orléans','2005-11-12',1,'e22'),(17,'Desnost','Pierre','pdesnost','4k2o5','16 avenue des Cèdres','23200','Guéret','2001-02-05',1,'e24'),(18,'Dudouit','Frédéric','fdudouit','44im8','18 rue de l église','23120','GrandBourg','2000-08-01',1,'e39'),(19,'Duncombe','Claude','cduncombe','qf77j','19 rue de la tour','23100','La souteraine','1987-10-10',1,'e49'),(20,'Enault-Pascreau','Céline','cenault','y2qdu','25 place de la gare','23200','Gueret','1995-09-01',1,'e5'),(21,'Eynde','Valérie','veynde','i7sn3','3 Grand Place','13015','Marseille','1999-11-01',1,'e52'),(22,'Finck','Jacques','jfinck','mpb3t','10 avenue du Prado','13002','Marseille','2001-11-10',1,'f21'),(23,'Frémont','Fernande','ffremont','xs5tq','4 route de la mer','13012','Allauh','1998-10-01',1,'f39'),(24,'Gest','Alain','agest','dywvt','30 avenue de la mer','13025','Berre','1985-11-01',1,'f4'),(25,'Karadjia','Rehane','gysto','agola','200_rue_de_la_recherche','63000','Clermont_Ferrant','0000-00-00',2,'Gest'),(58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-28 11:01:22
