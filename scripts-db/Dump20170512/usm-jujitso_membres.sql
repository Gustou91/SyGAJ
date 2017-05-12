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
INSERT INTO `membres` VALUES (1,'GARCIN','Brice','1969-09-24','BE','bgarcin@gmail.com',NULL,NULL,'83 route de MAROLLES','','91630','91630',NULL,NULL,NULL,NULL,'2016-12-13 00:00:00','2016-12-13 00:00:00'),(2,'ROBIC','Bruno','1968-09-24','MA','robic.bruno@neuf.fr',NULL,NULL,'','','','91220',NULL,NULL,NULL,NULL,'2016-12-16 00:00:00','2016-12-16 00:00:00'),(3,'GARCIN','Hugo-Mathis','2012-04-12','BL','bgarcin@conviviance.fr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-24 21:59:21','2017-03-24 21:59:21');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-12 20:09:48
