-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: usm-jujitso
-- ------------------------------------------------------
-- Server version	5.7.14

use usm-jujitso

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_nom` varchar(50) NOT NULL,
  `art_description` varchar(255) DEFAULT NULL,
  `art_prix` decimal(6,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Table des articles (Passeport, Ecusson, ...).';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Passeport','Passeport Judo',8.00,'2017-05-12 17:01:39',NULL),(2,'Ecusson','Ecusson USM-JUJITSO',5.00,'2017-05-12 17:03:26',NULL),(3,'Location Judoji','Location annuelle de Judoji pour le judo éveil',5.00,'2017-05-12 17:43:50',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(50) NOT NULL,
  `cat_mode` enum('MORPHO','FFJDA') DEFAULT NULL,
  `cat_adeb` varchar(4) DEFAULT NULL,
  `cat_afin` varchar(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Mini Poussins','MORPHO','2012','2013','2017-09-30 14:50:11','2017-09-30 15:50:11'),(2,'Poussinets','MORPHO','2010','2011','2017-09-30 14:50:41','2017-09-30 15:50:41'),(3,'Poussins','MORPHO','2008','2009','2017-09-30 14:53:55','2017-09-30 15:53:55'),(4,'Benjamins','FFJDA','2006','2007','2017-09-30 14:55:06','2017-09-30 15:55:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmd_idmembre` int(11) DEFAULT NULL,
  `cmd_montant` decimal(6,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tables des commandes liées à une inscription ou un achat boutique';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandes`
--

LOCK TABLES `commandes` WRITE;
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comp_affectations`
--

DROP TABLE IF EXISTS `comp_affectations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_affectations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aff_idpoule` int(11) NOT NULL,
  `aff_idcandidat` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=516 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comp_affectations`
--

LOCK TABLES `comp_affectations` WRITE;
/*!40000 ALTER TABLE `comp_affectations` DISABLE KEYS */;
INSERT INTO `comp_affectations` VALUES (515,406,3,'2017-11-09 23:28:36','2017-11-10 00:28:36'),(514,405,2,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(512,404,19,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(511,404,18,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(508,402,15,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(510,403,17,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(505,400,12,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(509,403,16,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(507,401,14,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(502,400,9,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(506,401,13,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(501,400,8,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(504,401,11,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(503,400,10,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(497,399,4,'2017-11-09 23:28:34','2017-11-10 00:28:34'),(498,399,5,'2017-11-09 23:28:34','2017-11-10 00:28:34'),(500,399,7,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(499,399,6,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(513,405,20,'2017-11-09 23:28:35','2017-11-10 00:28:35');
/*!40000 ALTER TABLE `comp_affectations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comp_candidats`
--

DROP TABLE IF EXISTS `comp_candidats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_candidats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_nom` varchar(50) NOT NULL,
  `can_prenom` varchar(50) DEFAULT NULL,
  `can_sexe` enum('H','F') DEFAULT NULL,
  `can_adr1` varchar(255) DEFAULT NULL,
  `can_adr2` varchar(255) DEFAULT NULL,
  `can_idville` int(11) DEFAULT NULL,
  `can_tel` varchar(10) DEFAULT NULL,
  `can_mail` varchar(255) DEFAULT NULL,
  `can_ceinture` enum('BL','BJ','JA','JO','OR','OV','VE','BE','MA','NO') NOT NULL,
  `can_poids` int(11) NOT NULL,
  `can_datnaiss` varchar(10) DEFAULT NULL,
  `can_idclub` int(11) NOT NULL,
  `can_clef` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comp_candidats`
--

LOCK TABLES `comp_candidats` WRITE;
/*!40000 ALTER TABLE `comp_candidats` DISABLE KEYS */;
INSERT INTO `comp_candidats` VALUES (3,'MATHIOT MAIRE','Nolan','H','','',NULL,'','','BJ',26,'01/01/2011',2,'2-H-26','2017-10-01 17:10:17','2017-10-01 18:10:17'),(2,'GINFRAY','Tristan','H','','',NULL,'','','BL',20,'01/01/2011',3,'2-H-20','2017-10-01 17:09:39','2017-10-01 18:09:39'),(4,'CHAILLOT','Pauline','F','','',NULL,'','','BJ',20,'01/01/2010',1,'2-F-20','2017-10-01 17:10:51','2017-10-01 18:10:51'),(5,'JEAN','Valentine','F','','',NULL,'','','BL',21,'01/01/2010',3,'2-F-21','2017-10-01 17:12:38','2017-10-01 18:12:38'),(6,'FERON','Eve','F','','',NULL,'','','BJ',21,'01/01/2010',2,'2-F-21','2017-10-01 17:13:13','2017-10-01 18:13:13'),(7,'DADOU','Clémentine','F','','',NULL,'','','BJ',22,'01/01/2010',3,'2-F-22','2017-10-01 17:13:43','2017-10-01 18:13:43'),(8,'ALBERNAZ','Léona','F','','',NULL,'','','BL',22,'01/01/2010',1,'2-F-22','2017-10-01 17:14:12','2017-10-01 18:14:12'),(9,'FABRI','Mélina','F','','',NULL,'','','BJ',22,'01/01/2010',3,'2-F-22','2017-10-01 17:14:38','2017-10-01 18:14:38'),(10,'SITAUD','Léna','F','','',NULL,'','','BL',23,'01/01/2010',3,'2-F-23','2017-10-01 17:15:07','2017-10-01 18:15:07'),(11,'PEREZ','Maélys','F','','',NULL,'','','BL',24,'01/01/2010',3,'2-F-24','2017-10-01 17:15:31','2017-10-01 18:15:31'),(12,'BOSQUEL','Albane','F','','',NULL,'','','JA',24,'01/01/2010',2,'2-F-24','2017-10-01 17:15:58','2017-10-01 18:15:58'),(13,'GUYOT','Camille','F','','',NULL,'','','BJ',26,'01/01/2010',2,'2-F-26','2017-10-01 17:16:37','2017-10-01 18:16:37'),(14,'CARIN','Xéa','F','','',NULL,'','','JA',27,'01/01/2010',3,'2-F-27','2017-10-01 17:17:03','2017-10-01 18:17:03'),(15,'MASKROT','Amel','F','','',NULL,'','','BL',28,'01/01/2010',3,'2-F-28','2017-10-01 17:17:29','2017-10-01 18:17:29'),(16,'POMEYROL','Cloé','F','','',NULL,'','','BJ',32,'01/01/2010',2,'2-F-32','2017-10-01 17:17:55','2017-10-01 18:17:55'),(17,'HONVO','Hannah','F','','',NULL,'','','BL',35,'01/01/2010',1,'2-F-35','2017-10-01 17:18:24','2017-10-01 18:18:24'),(18,'LY','Awa','F','','',NULL,'','','BJ',38,'01/01/2010',2,'2-F-38','2017-10-01 17:18:49','2017-10-01 18:18:49'),(19,'BINGOC','Fatma','F','','',NULL,'','','BJ',38,'01/01/2010',2,'2-F-38','2017-10-01 17:19:18','2017-10-01 18:19:18'),(20,'MERY','Enzo','H','','',NULL,'','','BL',18,'01/01/2010',1,'2-H-18','2017-10-01 17:20:32','2017-10-01 18:20:32'),(21,'GARCIN','Hugo-Mathis','H','a','',1,'141064040','a@a.fr','BL',5,'12/04/2008',1,'3-H-5','2017-11-05 00:08:44','2017-11-05 01:08:44'),(22,'DUPONT','Henry','H',NULL,NULL,NULL,NULL,NULL,'BL',35,'12/05/2008',1,'3-H-35','2017-11-11 20:07:55','2017-11-11 21:07:55'),(23,'FLOQUET','Alexis','H',NULL,NULL,NULL,NULL,NULL,'OR',34,'01/01/2006',1,'4-H-34','2017-11-12 16:52:20','2017-11-12 17:52:20');
/*!40000 ALTER TABLE `comp_candidats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comp_challenges`
--

DROP TABLE IF EXISTS `comp_challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cha_nom` varchar(50) NOT NULL,
  `cha_date` varchar(10) NOT NULL,
  `cha_minipoussin` tinyint(1) DEFAULT NULL,
  `cha_poussinet` tinyint(1) DEFAULT NULL,
  `cha_poussin` tinyint(1) DEFAULT NULL,
  `cha_benjamin` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comp_challenges`
--

LOCK TABLES `comp_challenges` WRITE;
/*!40000 ALTER TABLE `comp_challenges` DISABLE KEYS */;
INSERT INTO `comp_challenges` VALUES (1,'Challenge de Noël - Marolles 2017','10/12/2017',NULL,NULL,NULL,NULL,'2017-09-12 16:42:00','2017-09-12 17:42:00');
/*!40000 ALTER TABLE `comp_challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comp_clubs`
--

DROP TABLE IF EXISTS `comp_clubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clu_nom` varchar(50) NOT NULL,
  `clu_adr1` varchar(255) DEFAULT NULL,
  `clu_adr2` varchar(255) DEFAULT NULL,
  `clu_idville` int(11) NOT NULL,
  `clu_tel` varchar(15) DEFAULT NULL,
  `clu_mail` varchar(255) DEFAULT NULL,
  `clu_president` varchar(255) DEFAULT NULL,
  `clu_tresorier` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comp_clubs`
--

LOCK TABLES `comp_clubs` WRITE;
/*!40000 ALTER TABLE `comp_clubs` DISABLE KEYS */;
INSERT INTO `comp_clubs` VALUES (1,'USM-JUJITSO','Avenue du Lieutenant Agoutin','',33,'01.64.56.80.43','marollesjudo@gmail.com','Bruno ROBIC','Brice GARCIN','2017-09-12 17:33:25','2017-09-12 18:33:25'),(2,'JUDO CLUB BOTIGNACOIS ','Rue de Verdun','',13,'','judoclub.botignacois@gmail.com','Jean-Fabrice BOYER','Marlène BOYER-BONPUNT','2017-09-12 17:44:56','2017-09-12 18:44:56'),(3,'ALLIANCE JUDO BALLANCOURT','Gymnase Pierre Denize ','rue de Verdun',2,'06 42 82 56 30','secretariat_ajb@yahoo.fr','Marc Sorgiati','Denis Lapray','2017-09-12 17:52:39','2017-09-12 18:52:39'),(4,'USBO JUDO','Rue du Clos Bouquet','',40,'','contact@usbojudo.com','Stéphane BULICH','Sébastien GROUX','2017-11-12 17:15:37','2017-11-12 18:15:37'),(5,'JUDO CLUB BRUYERES','','',18,'','','Sébastien BONATO','Serge PELISSIER','2017-11-12 17:22:39','2017-11-12 18:22:39'),(6,'AMSL LA NORVILLE -JUDO','1 RUE PASTEUR','',28,'06 48 28 16 75','arnaud.delaforge@orange.fr','Arnaud DELAFORGE','','2017-11-12 17:26:06','2017-11-12 18:26:06'),(7,'JUDO CLUB SAINT MICHEL - BANON','','',37,'','','Pierre BLANCHARD','Serge MEGY','2017-11-12 17:33:35','2017-11-12 18:33:35'),(8,'JUDO CLUB MAISSOIS','Mairie de MAISSE','Place de l\'Hôtel de ville',30,'07.57.63.23.80','','Patient N\'DOUMBE','Nicolas MONDET','2017-11-12 17:38:21','2017-11-12 18:38:21'),(9,'ASSOCIATION SPORTIVE D\'OLLAINVILLE','12 rue de la Roche','',31,'','','','','2017-11-12 17:44:19','2017-11-12 18:44:19'),(10,'AMAM ','Dojo Grérard PIZZONERO','Parc des Sports de Villeroy',43,'01.64.57.32.49','','Stéphane DORIGO','Sandrine BARREZ','2017-11-12 17:49:09','2017-11-12 18:49:09'),(11,'JUDO CLUB DU GATINAIS','','',27,'','','','','2017-11-12 17:50:48','2017-11-12 18:50:48'),(12,'CLUB DE JUDO DE JANVILLE LARDY','','',31,'','','','','2017-11-12 17:53:45','2017-11-12 18:53:45'),(13,'JUDO-CLUB GRANDVERTOIS','7 Place de la Mairie','',38,'06 98 81 91 80','','Thierry BARRIERE','Nathalie HUET','2017-11-12 17:56:45','2017-11-12 18:56:45');
/*!40000 ALTER TABLE `comp_clubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comp_poules`
--

DROP TABLE IF EXISTS `comp_poules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_poules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pou_idcateg` int(11) NOT NULL,
  `pou_sexe` varchar(1) DEFAULT NULL,
  `pou_poidsmin` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=407 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comp_poules`
--

LOCK TABLES `comp_poules` WRITE;
/*!40000 ALTER TABLE `comp_poules` DISABLE KEYS */;
INSERT INTO `comp_poules` VALUES (398,3,'H',5,'2017-11-09 22:49:54','2017-11-09 23:49:54'),(406,2,'H',26,'2017-11-09 23:28:36','2017-11-10 00:28:36'),(405,2,'H',18,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(404,2,'F',38,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(403,2,'F',32,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(402,2,'F',28,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(401,2,'F',24,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(400,2,'F',22,'2017-11-09 23:28:35','2017-11-10 00:28:35'),(399,2,'F',20,'2017-11-09 23:28:34','2017-11-10 00:28:34');
/*!40000 ALTER TABLE `comp_poules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_nom` varchar(50) NOT NULL,
  `cou_description` varchar(255) DEFAULT NULL,
  `cou_tarif` decimal(6,2) NOT NULL,
  `cou_licence` decimal(6,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Table des cours';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` VALUES (1,'Judo 4','Judo Adulte',193.00,37.00,'2016-12-16 00:00:00','2016-12-16 00:00:00'),(2,'Judo 1','Enfants 6-7 ans (Mini Poussin)',143.00,37.00,NULL,NULL),(3,'Judo 2','Enfants 8-9 ans (Poussin)',143.00,37.00,NULL,NULL),(4,'Judo 3','Enfants 10-13 ans (Benjamin/Minime )',168.00,37.00,'2017-05-04 21:42:22',NULL),(5,'Jujitsu','A partir de 13 ans',193.00,37.00,'2017-05-04 21:43:01',NULL),(6,'Aérogym Ado','13-18 ans',50.00,0.00,'2017-05-04 21:43:48',NULL),(7,'Aérogym Adulte','A partir de 19 ans',150.00,0.00,'2017-05-12 16:18:12',NULL);
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailcommandes`
--

DROP TABLE IF EXISTS `detailcommandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailcommandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `det_idcde` int(11) NOT NULL,
  `det_type` enum('COURS','ARTICLE','REDUCTION') NOT NULL,
  `det_idarticle` int(11) DEFAULT NULL,
  `det_montant` decimal(6,2) NOT NULL,
  `det_qte` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lignes d''une commande.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailcommandes`
--

LOCK TABLES `detailcommandes` WRITE;
/*!40000 ALTER TABLE `detailcommandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailcommandes` ENABLE KEYS */;
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
  `ins_photo` tinyint(1) DEFAULT '0',
  `ins_datcertmed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Table des inscriptions.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
INSERT INTO `inscriptions` VALUES (1,2,5,1,0,NULL,NULL,NULL);
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
  `mem_datnaiss` varchar(10) NOT NULL,
  `mem_ceinture` enum('BL','BJ','JA','JO','OR','OV','VE','BE','MA','NO') NOT NULL,
  `mem_mail` varchar(255) DEFAULT NULL,
  `mem_tel` varchar(10) DEFAULT NULL,
  `mem_gsm` varchar(10) DEFAULT NULL,
  `mem_adr1` varchar(255) DEFAULT NULL,
  `mem_adr2` varchar(255) DEFAULT NULL,
  `mem_idville` int(11) DEFAULT NULL,
  `mem_tuteur1` varchar(255) DEFAULT NULL,
  `mem_tut1tel` varchar(10) DEFAULT NULL,
  `mem_tuteur2` varchar(255) DEFAULT NULL,
  `mem_tut2tel` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`mem_nom`,`mem_prenom`),
  KEY `ceinture` (`mem_ceinture`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Table des membres';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membres`
--

LOCK TABLES `membres` WRITE;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` VALUES (2,'ROBIC','Bruno','1968-09-24','MA','robic.bruno@neuf.fr',NULL,NULL,'','',14,NULL,NULL,NULL,NULL,'2016-12-16 00:00:00','2016-12-16 00:00:00'),(3,'GARCIN','Hugo-Mathis','2012-04-12','BL','bgarcin@conviviance.fr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-24 21:59:21','2017-03-24 21:59:21'),(5,'GARCIN','Brice','24/09/1969','BE','bgarcin@gmail.com',NULL,NULL,'83 route de MAROLLES','',1,NULL,NULL,NULL,NULL,'2017-07-02 16:51:03','2017-07-02 17:51:03');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sai_nom` varchar(45) DEFAULT NULL COMMENT 'Nom de la saison. Exemple: 2017-2018',
  `sai_active` tinyint(1) DEFAULT '0',
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
INSERT INTO `saisons` VALUES (2,'2017-2018',1,'2017-04-23 18:56:53',NULL);
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
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Table des utilisateurs.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bgarcin','$2y$10$VI6bc1asx7Yx6muxrwStDeqFgUe.TOQPMQc3hdb1vaLRrlb3DdJxW','admin','Brice','GARCIN',NULL,NULL,'2017-05-04 22:11:08'),(3,'erobic','$2y$10$wH4RyLobCzWvvHDtYIFbCu3QYumpogP2Ox2lY5vK5PGrJrxxv1GpC','user','Evelyne','ROBIC',NULL,NULL,NULL),(15,'floriane','$2y$10$AUCdTlHTh3XzJ8er0Qb2Euuv6vG2cxJr2nNpzdTC3jt3sznnmN88K','user','Floriane','TROTEL',NULL,'2017-11-05 00:23:33',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vil_cp` varchar(5) NOT NULL,
  `vil_nom` varchar(50) NOT NULL,
  `vil_active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vil_nom_UNIQUE` (`vil_nom`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='Table des villes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `villes`
--

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'91630','Cheptainville',1,'2017-07-02 14:33:52',NULL),(2,'91610','Ballancourt-sur-Essonne',1,'2017-07-02 14:36:37',NULL),(3,'91100','Corbeil-Essonnes',0,'2017-07-02 14:37:10',NULL),(4,'91670','Angerville',0,'2017-07-02 14:40:12',NULL),(5,'91470','Angervilliers',0,'2017-07-02 14:40:47',NULL),(6,'91290','Arpajon',0,'2017-07-02 15:02:53',NULL),(7,'91200','Athis-Mons',0,'2017-07-02 15:06:23',NULL),(8,'91160','Ballainvilliers',0,'2017-07-02 15:07:03',NULL),(9,'91570','Bièvres',0,'2017-07-02 15:07:39',NULL),(10,'91790','Boissy-sous-Saint-Yon',0,'2017-07-02 15:08:15',NULL),(11,'91070','Bondoufle',0,'2017-07-02 15:08:46',NULL),(12,'91850','Bouray-sur-Juine',0,'2017-07-02 15:09:15',NULL),(13,'91820','Boutigny-sur-Essonne',1,'2017-07-02 15:12:37',NULL),(14,'91220','Brétigny-sur-Orge',1,'2017-07-02 15:13:09',NULL),(15,'91105','Breuillet',0,'2017-07-02 15:13:37',NULL),(16,'91640','Briis-sous-Forges',0,'2017-07-02 15:14:15',NULL),(17,'91800','Brunoy',0,'2017-07-02 15:14:43',NULL),(18,'91680','Bruyères-le-Châtel',1,'2017-07-02 15:15:15',NULL),(19,'91440','Bures-sur-Yvette',0,'2017-07-02 15:15:48',NULL),(20,'91380','Chilly-Mazarin',0,'2017-07-02 15:16:29',NULL),(21,'91080','Courcouronnes',0,'2017-07-02 15:17:42',NULL),(22,'91520','Égly',0,'2017-07-02 15:18:18',NULL),(23,'91360','Épinay-sur-Orge',0,'2017-07-02 15:18:50',NULL),(24,'91150','Étampes',0,'2017-07-02 15:19:16',NULL),(25,'91760','Itteville',0,'2017-07-02 15:19:59',NULL),(26,'91510','Lardy',1,'2017-07-02 15:20:29',NULL),(27,'91590','La Ferté-Alais',1,'2017-07-02 15:20:55',NULL),(28,'	9129','La Norville',1,'2017-07-02 15:21:17',NULL),(29,'91620','La Ville-du-Bois',0,'2017-07-02 15:21:45',NULL),(30,'91720','Maisse',1,'2017-07-02 15:22:16',NULL),(31,'91340','Ollainville',1,'2017-07-02 15:22:49',NULL),(32,'91180','Saint-Germain-lès-Arpajon',1,'2017-07-02 15:23:17',NULL),(33,'91630','Marolles-en-Hurepoix',1,'2017-07-02 15:28:57',NULL),(34,'91630','Guibeville',1,'2017-07-02 15:29:28',NULL),(35,'91630','Avrainville',1,'2017-07-02 15:29:56',NULL),(36,'91630','Leudeville',1,'2017-07-02 15:30:35',NULL),(37,'91240','Saint-Michel sur Orge',1,'2017-11-12 17:04:25',NULL),(38,'91810','Vert-le-Grand',1,'2017-11-12 17:07:20',NULL),(39,'91250','Tigery',1,'2017-11-12 17:08:14',NULL),(40,'77310','Boissise-le-Roi',1,'2017-11-12 17:12:07',NULL),(41,'91620','Nozay',1,'2017-11-12 17:16:20',NULL),(42,'91530','Saint-Chéron',1,'2017-11-12 17:17:10',NULL),(43,'91540','Mennecy',1,'2017-11-12 17:46:42',NULL);
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-14 17:12:23
