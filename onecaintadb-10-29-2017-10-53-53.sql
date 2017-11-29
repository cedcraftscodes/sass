-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: onecaintadb
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
-- Table structure for table `tbladmins`
--

DROP TABLE IF EXISTS `tbladmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbladmins` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `pass_word` varchar(55) NOT NULL,
  `acctype` enum('cashier','admin','','') NOT NULL,
  `deleted` enum('YES','NO','','') NOT NULL,
  `accimg` varchar(255) NOT NULL,
  `dateadded` int(11) NOT NULL,
  `passchange` enum('1','0') NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmins`
--

LOCK TABLES `tbladmins` WRITE;
/*!40000 ALTER TABLE `tbladmins` DISABLE KEYS */;
INSERT INTO `tbladmins` VALUES (22,'Cedric Don','Yatco','Coloma','icorrelate@gmail.com','male','1997-02-12','f5bb0c8de146c67b44babbf4e6584cc0','admin','NO','images/dp/haha@gmail.com_956709.jpg',234235233,'1'),(52,'Emerald','Servas','De Paz','ESDe Paz807','female','1998-09-07','f5bb0c8de146c67b44babbf4e6584cc0','admin','NO','images/dp/ESDe Paz807_346723.jpg',1506078538,'1'),(53,'Kaloy','Arceo','Marinas','KAMarinas779','male','1998-05-18','f5bb0c8de146c67b44babbf4e6584cc0','cashier','NO','images/dp/KAMarinas779_258097.jpg',1506082406,'1');
/*!40000 ALTER TABLE `tbladmins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblannouncements`
--

DROP TABLE IF EXISTS `tblannouncements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblannouncements` (
  `annid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `adminid` int(11) NOT NULL,
  `dateadded` int(11) NOT NULL,
  PRIMARY KEY (`annid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblannouncements`
--

LOCK TABLES `tblannouncements` WRITE;
/*!40000 ALTER TABLE `tblannouncements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblannouncements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbackups`
--

DROP TABLE IF EXISTS `tblbackups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbackups` (
  `BackupId` int(11) NOT NULL AUTO_INCREMENT,
  `BackupFile` varchar(255) DEFAULT NULL,
  `BackupDate` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BackupId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbackups`
--

LOCK TABLES `tblbackups` WRITE;
/*!40000 ALTER TABLE `tblbackups` DISABLE KEYS */;
INSERT INTO `tblbackups` VALUES (30,'salesandinv___(14-34-31_22-09-2017)__rand7533773.sql',1506062071,22,'I just want to backup'),(31,'salesandinv___(14-45-23_22-09-2017)__rand9080336.sql',1506062723,22,'Backup before restoring: salesandinv___(14-45-23_22-09-2017)__rand9080336.sql at September 22, 2017, 2:45 pm'),(32,'salesandinv___(17-09-50_22-09-2017)__rand11054824.sql',1506071390,22,'Test Backup'),(33,'salesandinv___(17-10-11_22-09-2017)__rand4489814.sql',1506071411,22,'Backup before restoring: salesandinv___(17-10-11_22-09-2017)__rand4489814.sql at September 22, 2017, 5:10 pm'),(34,'salesandinv___(20-29-17_22-09-2017)__rand10561117.sql',1506083357,22,'Before deleting stock.'),(35,'salesandinv___(20-30-15_22-09-2017)__rand7315403.sql',1506083415,22,'Before deleting Stock in and Stock out.'),(36,'salesandinv___(20-32-42_22-09-2017)__rand5486383.sql',1506083562,22,'Backup before restoring: salesandinv___(20-32-42_22-09-2017)__rand5486383.sql at September 22, 2017, 8:32 pm');
/*!40000 ALTER TABLE `tblbackups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblchatlogs`
--

DROP TABLE IF EXISTS `tblchatlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblchatlogs` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateadded` int(11) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblchatlogs`
--

LOCK TABLES `tblchatlogs` WRITE;
/*!40000 ALTER TABLE `tblchatlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblchatlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcompanyinfo`
--

DROP TABLE IF EXISTS `tblcompanyinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcompanyinfo` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `settingkey` varchar(255) NOT NULL,
  `settingvalue` text NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcompanyinfo`
--

LOCK TABLES `tblcompanyinfo` WRITE;
/*!40000 ALTER TABLE `tblcompanyinfo` DISABLE KEYS */;
INSERT INTO `tblcompanyinfo` VALUES (1,'name','Giga Ohms'),(2,'receiver','Nick Catimbang'),(3,'street','Km. 36 National Highway Bgy. Platero'),(4,'city',' BiÃ±an City'),(5,'province','Laguna'),(6,'zipcode','4024'),(7,'phone','09228335230'),(8,'email','icorrelate@gmail.com'),(9,'voidcode','244161004191'),(10,'tin','412-252-526');
/*!40000 ALTER TABLE `tblcompanyinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllogins`
--

DROP TABLE IF EXISTS `tbllogins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllogins` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountID` int(11) NOT NULL,
  `LoginDate` int(11) NOT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllogins`
--

LOCK TABLES `tbllogins` WRITE;
/*!40000 ALTER TABLE `tbllogins` DISABLE KEYS */;
INSERT INTO `tbllogins` VALUES (26,22,1506234714),(27,22,1506244303),(28,22,1506300884),(29,22,1506302767),(30,22,1506494035),(31,22,1506495353),(32,22,1506506975),(33,22,1506580771),(34,22,1506581132),(35,22,1506581327),(36,22,1506658714),(37,22,1506665314),(38,22,1507026273),(39,22,1507798849),(40,22,1508663217),(41,22,1508664973),(42,22,1508665907),(43,22,1508669178),(44,22,1508670734),(45,22,1508724934),(46,22,1508736085);
/*!40000 ALTER TABLE `tbllogins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnewsupdate`
--

DROP TABLE IF EXISTS `tblnewsupdate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblnewsupdate` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `adminid` int(11) NOT NULL,
  `Deleted` enum('YES','NO') NOT NULL,
  `dateadded` int(11) NOT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnewsupdate`
--

LOCK TABLES `tblnewsupdate` WRITE;
/*!40000 ALTER TABLE `tblnewsupdate` DISABLE KEYS */;
INSERT INTO `tblnewsupdate` VALUES (20,'Dfasadfs','agsdagdsadgsgdsdgsdgsadgsdgs','images/1508690235_573814.jpg',22,'YES',1508690235),(21,'Dfasadfs','asfdadfsELDHSGLKDHG:LKSDHG','images/1508690250_951772.jpg',22,'YES',1508690250),(22,'Another News','This is another news','images/1508724954_33521.jpg',22,'YES',1508724954),(23,'Oust Mocha Uson petition circulates online again','<p style=\"box-sizing: border-box; margin: 8px 0px 24px; line-height: 1.5;\"><span style=\"color: #4c4c4c; font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, sans-serif;\"><span style=\"font-size: 16px;\">MANILA, Philippines â€“ After the #FireMocha campaign, a new petition is now circu<strong>lating online to call for the removal of entertainer-turned-blogger Margaux \"Mocha\" Uson as Presidential Communications and Operations Office (PCOO) Assistant Secretary for Social Media for allegedly spreading fake news.The petition, started by Kremlin Pandaan, now has over 36,000 signatures as of Monday, September 25.</strong></span></span></p>','images/1508736215_475351.jpg',22,'NO',1508736215),(24,'U.S. defense chief Mattis praises PH for success in Marawi','CLARK, Philippines â€“ US Defense Secretary James Mattis on Monday, October 23, praised the Philippines for its successes in battling Islamic State (ISIS) supporters, as he began an Asian trip aimed at reaffirming American support for regional allies.','images/1508737561_422369.jpg',22,'NO',1508737561),(25,'U.S. defense chief Mattis praises PH for success in Marawi','CLARK, Philippines â€“ US Defense Secretary James Mattis on Monday, October 23, praised the Philippines for its successes in battling Islamic State (ISIS) supporters, as he began an Asian trip aimed at reaffirming American support for regional allies.','images/1508738190_578858.jpg',22,'NO',1508738190);
/*!40000 ALTER TABLE `tblnewsupdate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrestore`
--

DROP TABLE IF EXISTS `tblrestore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrestore` (
  `RestoreId` int(11) NOT NULL AUTO_INCREMENT,
  `BackupId` int(11) DEFAULT NULL,
  `RestoreDate` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RestoreId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrestore`
--

LOCK TABLES `tblrestore` WRITE;
/*!40000 ALTER TABLE `tblrestore` DISABLE KEYS */;
INSERT INTO `tblrestore` VALUES (2,30,1506062723,22,''),(3,30,1506071411,22,''),(4,35,1506083562,22,'I made mistakes in deleting each stock 1 by 1.');
/*!40000 ALTER TABLE `tblrestore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsuppliers`
--

DROP TABLE IF EXISTS `tblsuppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsuppliers` (
  `Supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `Supplier_name` varchar(150) DEFAULT NULL,
  `Supplier_co_name` varchar(150) DEFAULT NULL,
  `Supplier_street` varchar(150) DEFAULT NULL,
  `Supplier_city` varchar(150) DEFAULT NULL,
  `Supplier_province` varchar(150) DEFAULT NULL,
  `Supplier_zipcode` varchar(150) DEFAULT NULL,
  `Supplier_contact` varchar(150) DEFAULT NULL,
  `Supplier_email` varchar(55) NOT NULL,
  `AddedBy` int(11) DEFAULT NULL,
  `DateAdded` int(11) DEFAULT NULL,
  `Deleted` enum('YES','NO') NOT NULL,
  PRIMARY KEY (`Supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsuppliers`
--

LOCK TABLES `tblsuppliers` WRITE;
/*!40000 ALTER TABLE `tblsuppliers` DISABLE KEYS */;
INSERT INTO `tblsuppliers` VALUES (1,'ABC Electronics','Gigaohms Electronic Center','1578 Chico Street Garcia Subdivision','Santa Rosa','Laguna','4026','09357190233','abcelectronics@gmail.com',22,1506076666,'NO'),(2,'Hextech','Gigaohms Electronic Center','1241 Narra Street Garlic Subdivision','Santa Rosa','Laguna','4026','09348104136','hextech@rocketmail.com',22,1506076888,'NO'),(3,'Clockworks','Gigaohms Electronic Center','1337 Bark Street Doge Subdivision','Santa Rosa','Laguna','4026','09165133116','clockworkES@gmail.com',22,1506077023,'NO'),(4,'Steel Trade','Gigaohms Electronic Center','1998 Jackie Street Chan Subdivision','Santa Rosa','Laguna','4026','09357190238','SteelTrade1@yahoo.com',22,1506077219,'NO'),(5,'KYS Signage','Gigaohms Electronic Center','1215 Wanda Street Pass Subdivision','Binan','Laguna','4024','09346190336','KYSsign@gmail.com',22,1506077280,'NO'),(7,'MacMac Inc.','Bernard Macanlalay','Katala','Binan','Laguna','4024','09356461311','macmac@gmail.com',22,1506661734,'NO');
/*!40000 ALTER TABLE `tblsuppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblusers` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `pass_word` varchar(32) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `middle_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` text NOT NULL,
  `dateregistered` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusers`
--

LOCK TABLES `tblusers` WRITE;
/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` VALUES (1,'0','311814e578cc53be69bc0df5d1921aba','dfasfad','dfasadf','adfsadfs',337233233,'fdsaadf',1508655611),(2,'cedric','c4de7df1bafd6d9b8f5d35d4328c93b0','cedric','yatco','cedric',2147483647,'binan laguna',1508655708),(3,'cass','3cab68956fa7c8129671ef96bc1adf7c','cass','cass','cass',2277,'cass',1508655778),(4,'hello','5d41402abc4b2a76b9719d911017c592','hello','hello','hello',435563,'hello',1508655853),(5,'','d41d8cd98f00b204e9800998ecf8427e','','','',0,'',1508659730);
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblwrongtries`
--

DROP TABLE IF EXISTS `tblwrongtries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblwrongtries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblwrongtries`
--

LOCK TABLES `tblwrongtries` WRITE;
/*!40000 ALTER TABLE `tblwrongtries` DISABLE KEYS */;
INSERT INTO `tblwrongtries` VALUES (1,1506082714,'cashier'),(2,1506086282,'cashier');
/*!40000 ALTER TABLE `tblwrongtries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-29 10:53:56
