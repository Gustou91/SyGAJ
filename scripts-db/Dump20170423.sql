-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: usm-jujitso
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_nom` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Table des cours';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` VALUES (1,'Judo 4','2016-12-16 00:00:00','2016-12-16 00:00:00');
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ins_idsaison` int(11) NOT NULL,
  `ins_idmembre` int(11) NOT NULL,
  `ins_idcours` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_IDSAISON_idx` (`ins_idsaison`),
  KEY `FK_IDMEMBRE_idx` (`ins_idmembre`),
  KEY `FK_IDCOURS_idx` (`ins_idcours`),
  CONSTRAINT `FK_IDCOURS` FOREIGN KEY (`ins_idcours`) REFERENCES `cours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_IDMEMBRE` FOREIGN KEY (`ins_idmembre`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_IDSAISON` FOREIGN KEY (`ins_idsaison`) REFERENCES `saisons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table des inscriptions.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant membre',
  `mem_nom` varchar(50) NOT NULL,
  `mem_prenom` varchar(50) NOT NULL,
  `mem_datnaiss` date NOT NULL,
  `mem_ceinture` enum('BL','BJ','JA','JO','OR','OV','VE','BE','MA','NO') NOT NULL,
  `mem_mail` varchar(255) DEFAULT NULL,
  `mem_tel` varchar(10) DEFAULT NULL,
  `mem_gsm` varchar(10) DEFAULT NULL,
  `mem_adr1` varchar(255) DEFAULT NULL,
  `mem_adr2` varchar(255) DEFAULT NULL,
  `mem_cp` varchar(5) DEFAULT NULL,
  `mem_ville` varchar(255) DEFAULT NULL,
  `mem_tuteur1` varchar(255) DEFAULT NULL,
  `mem_tut1tel` varchar(10) DEFAULT NULL,
  `mem_tuteur2` varchar(255) DEFAULT NULL,
  `mem_tut2tel` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`mem_nom`,`mem_prenom`),
  KEY `ceinture` (`mem_ceinture`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Table des membres';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membres`
--

LOCK TABLES `membres` WRITE;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` VALUES (1,'GARCIN','Brice','1968-09-24','VE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-13 00:00:00','2016-12-13 00:00:00'),(2,'ROBIC','Bruno','1968-09-24','BE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-12-16 00:00:00','2016-12-16 00:00:00'),(3,'GARCIN','Hugo-Mathis','2012-04-12','BL','bgarcin@conviviance.fr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-24 21:59:21','2017-03-24 21:59:21');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sai_nom` varchar(45) DEFAULT NULL COMMENT 'Nom de la saison. Exemple: 2017-2018',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Table des saisons';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saisons`
--

LOCK TABLES `saisons` WRITE;
/*!40000 ALTER TABLE `saisons` DISABLE KEYS */;
INSERT INTO `saisons` VALUES (2,'2017-2018','2017-04-23 18:56:53',NULL);
/*!40000 ALTER TABLE `saisons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `fistname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Table des utilisateurs.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bgarcin','$2y$10$oHxmVNcLK/RwVNCxsr1HyO27AciQSaADj3nPm2Cueq2a46N15sKjK','admin',NULL,NULL,NULL,NULL,NULL),(3,'erobic','$2y$10$wH4RyLobCzWvvHDtYIFbCu3QYumpogP2Ox2lY5vK5PGrJrxxv1GpC','user',NULL,NULL,NULL,NULL,NULL),(14,'toto','$2y$10$OxpiY2rhYE0E2cgA/Bvgpe5My/BrL5LGNPcUDkx.IIDygdnsMe8v2','user',NULL,NULL,NULL,'2017-02-26 23:29:26','2017-02-26 23:29:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-23 21:03:31
