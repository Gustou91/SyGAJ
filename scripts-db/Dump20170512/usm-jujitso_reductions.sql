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
-- Table structure for table `reductions`
--

DROP TABLE IF EXISTS `reductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_nom` varchar(50) NOT NULL,
  `red_description` varchar(255) DEFAULT NULL,
  `red_montant` decimal(6,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Table des réductions.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reductions`
--

LOCK TABLES `reductions` WRITE;
/*!40000 ALTER TABLE `reductions` DISABLE KEYS */;
INSERT INTO `reductions` VALUES (1,'Parrain','Valable sur la saison N+1 pour le parrainage d\'un nouveau membre sur la saison N (non cumulable avec la réduction famille pour le même membre).',20.00,'2017-05-12 17:41:01',NULL),(2,'Filleul','Valable pour les nouveaux membres parrainés sur la saison N.',10.00,'2017-05-12 17:41:59',NULL),(3,'Famille membre 2','Le deuxième membre d\'une même famille (lien direct père, mère, frère ou sœur) bénéficie de cette réduction.',10.00,'2017-05-12 17:47:45',NULL),(4,'Famille membre 3','Le troisième membre d\'une même famille (lien direct père, mère, frère ou sœur) bénéficie de cette réduction.',20.00,'2017-05-12 17:48:37',NULL),(5,'Famille membre 4','Le quatrième membre d\'une même famille (lien direct père, mère, frère ou sœur) bénéficie de cette réduction.',40.00,'2017-05-12 17:49:17',NULL);
/*!40000 ALTER TABLE `reductions` ENABLE KEYS */;
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
