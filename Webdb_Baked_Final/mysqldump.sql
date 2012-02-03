-- MySQL dump 10.13  Distrib 5.1.52, for unknown-linux-gnu (x86_64)
--
-- Host: localhost    Database: webdb1247
-- ------------------------------------------------------
-- Server version	5.1.52

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
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Account` (
  `Account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Emailadres` varchar(128) NOT NULL,
  `Wachtwoord` varchar(32) NOT NULL,
  `Voornaam` varchar(32) NOT NULL,
  `Tussenvoegsel` varchar(16) NOT NULL,
  `Achternaam` varchar(32) NOT NULL,
  `Postcode` char(6) NOT NULL,
  `Straatnaam` varchar(128) NOT NULL,
  `Huisnummer` int(4) unsigned DEFAULT NULL,
  `Toevoeging` varchar(5) NOT NULL,
  `Plaatsnaam` varchar(64) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Nieuwsbrief` tinyint(1) NOT NULL,
  `Administrator` tinyint(1) NOT NULL,
  `DateChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Account_id`),
  UNIQUE KEY `Emailadres` (`Emailadres`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account` VALUES (1,'Admin','ee93f41ad23f8820c92aac1aadfb7967','Admin (ww=Adminbaked)','','','','',0,'','','',0,1,'2012-01-30 12:32:42'),(28,'jorgotsovilis@msn.com','2843a175fe4483bf8faccea77196cfc0','','','','','',0,'','','',0,0,'2012-01-31 10:34:55'),(30,'jan@friet.nl','fe8037402da54d9f75a8947b339e8bfd','Ruben','de','Vries','1722VN','loopakker',1,'','Neukcity','09060901',0,0,'2012-01-31 10:39:37'),(17,'test@mail.com','098f6bcd4621d373cade4e832627b4f6','Piet','de','Sjenk','1234AB','Pie Road',180,'c','Pie Town','0123456789',1,0,'2012-02-03 13:37:56'),(32,'julien12_4@hotmail.com','b69335c75d1f6348ec4a3da7a6b44f8c','Julien','','Benistant','1382AA','Stationsweg',133,'','Weesp','0614263255',1,0,'2012-02-01 10:50:26'),(33,'julien.sushil@gmail.com','b69335c75d1f6348ec4a3da7a6b44f8c','Julien','','Benistant','5415ZZ','ohrearrystreet',354,'','Herr No','0123456789',1,0,'2012-02-01 13:33:58'),(38,'jordendashorst@gmail.com','7c9e565e730250c13c24d17cfc864881','Jorden','','Dashorst','6675ML','Pizzadeeghofstraatsingelweg ',66,'','Brokopondo','0666751809',1,0,'2012-02-01 20:19:03'),(37,'paarsestiften@hotmail.com','2843a175fe4483bf8faccea77196cfc0','Wolf','','Vos','1018EE','Nieuwe Prinsengracht',19,'','Amsterdam','0612345678',1,0,'2012-02-01 16:16:22'),(43,'rub_de_vries@hotmail.com','13a4878ec94ab7e07b8185e981ab5276','Ruben','de','Vries','1722VN','Loopakker',1,'','Langedijk','611111111',0,0,'2012-02-02 16:19:48'),(44,'ovi_555@hotmail.com','58fd9edd83341c29f1aebba81c31e257','Jan','de','Billenman','1999DD','Straat',7,'','Kerkrade','34603643',1,0,'2012-02-03 08:55:45');
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bestellingen`
--

DROP TABLE IF EXISTS `Bestellingen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bestellingen` (
  `Bestellingen_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Account_id` int(11) unsigned NOT NULL,
  `BestelStatus` int(11) NOT NULL DEFAULT '0',
  `Leverdatum` date NOT NULL,
  `Besteldatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Bestellingen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bestellingen`
--

LOCK TABLES `Bestellingen` WRITE;
/*!40000 ALTER TABLE `Bestellingen` DISABLE KEYS */;
INSERT INTO `Bestellingen` VALUES (10,17,3,'2012-01-11','2012-01-28 19:27:23'),(31,37,3,'2012-03-12','2012-02-02 12:23:15'),(30,1,0,'2012-01-01','2012-02-02 11:12:12'),(29,37,3,'2012-01-01','2012-02-02 10:35:31'),(12,17,3,'2012-01-27','2012-01-29 10:09:09'),(28,37,2,'2012-02-03','2012-02-01 20:29:40'),(27,38,3,'2012-01-01','2012-02-01 20:19:54'),(26,38,1,'2012-01-01','2012-02-01 20:19:32'),(25,32,1,'2012-05-13','2012-02-01 17:28:48'),(24,37,0,'2012-06-28','2012-02-01 16:18:13');
/*!40000 ALTER TABLE `Bestellingen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bestelstatus`
--

DROP TABLE IF EXISTS `Bestelstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bestelstatus` (
  `Statusnummer` int(11) NOT NULL,
  `Status` text NOT NULL,
  PRIMARY KEY (`Statusnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bestelstatus`
--

LOCK TABLES `Bestelstatus` WRITE;
/*!40000 ALTER TABLE `Bestelstatus` DISABLE KEYS */;
INSERT INTO `Bestelstatus` VALUES (0,'Besteld'),(1,'Betaald'),(2,'Gebakken'),(3,'Verzonden');
/*!40000 ALTER TABLE `Bestelstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TaartBestelling`
--

DROP TABLE IF EXISTS `TaartBestelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TaartBestelling` (
  `Taarten_id` int(10) unsigned NOT NULL,
  `Bestellingen_id` int(10) unsigned NOT NULL,
  `Aantal` float NOT NULL,
  `Kaarsjes` int(3) unsigned NOT NULL DEFAULT '0',
  `Tekst` varchar(32) NOT NULL DEFAULT 'Geen Tekst'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TaartBestelling`
--

LOCK TABLES `TaartBestelling` WRITE;
/*!40000 ALTER TABLE `TaartBestelling` DISABLE KEYS */;
INSERT INTO `TaartBestelling` VALUES (45,15,1,25,'jarig'),(46,16,1,15,'Derp'),(44,17,2,10,'Hatsaflats'),(46,19,1,0,''),(45,19,1,0,''),(45,20,1,0,''),(44,21,1,0,''),(44,22,1,0,''),(45,22,3,0,'Herro'),(45,23,1,0,''),(44,24,4,35,'Gefeliciteerd!'),(46,24,2,15,'Van Harte'),(47,25,5,5,'Shodan!'),(46,26,1,0,''),(45,27,5,0,''),(45,27,5,45,''),(44,28,5,50,'lekkertje'),(47,28,2,0,''),(45,29,4,25,'Iets'),(49,30,5,50,'dingen'),(45,31,2,15,'Presentatie Baked'),(44,31,1,50,'Baked'),(44,33,1,0,'');
/*!40000 ALTER TABLE `TaartBestelling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Taarten`
--

DROP TABLE IF EXISTS `Taarten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Taarten` (
  `Taarten_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Taartnaam` text NOT NULL,
  `Taartsoort` int(1) unsigned NOT NULL,
  `KorteInfoTaart` text NOT NULL,
  `BeschrijvingTaart` text NOT NULL,
  `Prijs` float NOT NULL,
  `Plaatje` text NOT NULL,
  `DateTaartChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Taarten_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 COMMENT='Toegevoegde taarten';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Taarten`
--

LOCK TABLES `Taarten` WRITE;
/*!40000 ALTER TABLE `Taarten` DISABLE KEYS */;
INSERT INTO `Taarten` VALUES (45,'Vierkante Slagroomtaart',3,'Vierkante taart, moelijk op te delen op verjaardagen!','De slagroomtaart, wie kent hem niet. Misschien wel de bekendste taart onder de taarten. Verras iedereen met deze overheerlijke slagroomtaart en laat deze taart met je logo bezorgen in heel Nederland. Zachte cake, romige slagroom en een frisse fruitige vulling maken deze taart tot een waar feest.',6.99,'slagroomtaart.jpg','2012-02-02 14:50:36'),(44,'Aardbeientaart',2,'Deze taart is uitgerust met de lekkerste aardbeien uit de polder!','Deze aardbeientaart is een heerlijke versnapering, geschikt voor feestjes en partijen of gewoon als tussendoortje. Door de combinatie van lekker frisse aardbeien en de onderliggende basis van deeg en crÃ¨me is deze aardbeientaart een geschikt gerecht voor zowel de doorwinterde natuurliefhebber als de verstokte zoetekauw.',7.5,'Aardbeientaart-067.jpg','2012-02-02 20:07:07'),(46,'Witte Chocoladetaart ',1,'Verrukelijke en vooral feestelijke taart! ','Hier staat de beschrijving van de Witte Chocolade taart. Dit gedeeldte gaarne door de admin aan te vullen ',8.5,'000596944_001_FRAL09131601_300.jpg','2012-02-02 12:49:16'),(47,'Slagroom chocolade fruittaart',4,'Een heerlijke taart met van alles wat!','Hier staat de beschrijving van de Witte Slagroom chocolade taart. Dit gedeeldte gaarne door de admin aan te vullen',9,'gr_slagrtaart.jpg','2012-01-25 14:33:31');
/*!40000 ALTER TABLE `Taarten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Taartensoort`
--

DROP TABLE IF EXISTS `Taartensoort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Taartensoort` (
  `Soort_nr` int(1) unsigned NOT NULL,
  `Soort` text NOT NULL,
  PRIMARY KEY (`Soort_nr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Taartensoort`
--

LOCK TABLES `Taartensoort` WRITE;
/*!40000 ALTER TABLE `Taartensoort` DISABLE KEYS */;
INSERT INTO `Taartensoort` VALUES (1,'Chocoladetaart'),(2,'Fruittaart'),(3,'Slagroomtaart'),(4,'Combitaart');
/*!40000 ALTER TABLE `Taartensoort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Winkelwagen`
--

DROP TABLE IF EXISTS `Winkelwagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Winkelwagen` (
  `Product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Account_id` int(11) unsigned NOT NULL,
  `Tekst` varchar(32) NOT NULL,
  `Leverdatum` text NOT NULL,
  `Taarten_id` int(11) unsigned NOT NULL,
  `Aantal` int(1) unsigned NOT NULL,
  `Kaarsjes` int(3) unsigned NOT NULL,
  `Prijs` float NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Winkelwagen`
--

LOCK TABLES `Winkelwagen` WRITE;
/*!40000 ALTER TABLE `Winkelwagen` DISABLE KEYS */;
INSERT INTO `Winkelwagen` VALUES (69,0,'Roman is kut','--',44,4,15,7.5),(70,37,'Presentatie','--',46,3,20,8.5),(71,37,'Gefelicitaart','--',44,2,5,7.5),(73,17,'','--',44,1,0,7.5);
/*!40000 ALTER TABLE `Winkelwagen` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-03 14:49:12
