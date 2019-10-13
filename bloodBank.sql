-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: bloodBank
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credentials` (
  `userId` varchar(32) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credentials`
--

LOCK TABLES `credentials` WRITE;
/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;
INSERT INTO `credentials` VALUES ('530cf8bcee4e28524993df820676cbf4','aims@gmail.com','a4e9eda4cd30a7569463c06c9a8af6a7adfaca09','H'),('53234ddb8816e6c9da102a6fc530c935','aldojones@gmail.com','a4e9eda4cd30a7569463c06c9a8af6a7adfaca09','R'),('765ea670073d66e07f1c0b4e8849d8e7','boseman@gmail.com','a4e9eda4cd30a7569463c06c9a8af6a7adfaca09','R'),('b851d23575b8e09b50942ce59c22d3b0','awatson@gmail.com','a4e9eda4cd30a7569463c06c9a8af6a7adfaca09','H');
/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospital` (
  `userId` varchar(32) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `bGroup` int(11) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `AP` int(11) DEFAULT NULL,
  `AN` int(11) DEFAULT NULL,
  `BP` int(11) DEFAULT NULL,
  `BN` int(11) DEFAULT NULL,
  `ABP` int(11) DEFAULT NULL,
  `ABN` int(11) DEFAULT NULL,
  `BOP` int(11) DEFAULT NULL,
  `BON` int(11) DEFAULT NULL,
  `sampleCount` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES ('530cf8bcee4e28524993df820676cbf4','AIMS','Dehradun','Uttarakhand',1,'1234567890',0,1,0,0,0,0,0,0,1,'2018-12-16 07:07:15'),('b851d23575b8e09b50942ce59c22d3b0','Doon Hospital','Dehradun','Uttarakhand',1,'7060273896',8,3,1,1,1,1,1,22,38,'2018-12-14 09:29:27');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receiver`
--

DROP TABLE IF EXISTS `receiver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiver` (
  `userId` varchar(32) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `bGroup` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiver`
--

LOCK TABLES `receiver` WRITE;
/*!40000 ALTER TABLE `receiver` DISABLE KEYS */;
INSERT INTO `receiver` VALUES ('53234ddb8816e6c9da102a6fc530c935','Nikhil Bisht','Female','2018-12-12','7060273896',1,'2018-12-14 09:20:26'),('765ea670073d66e07f1c0b4e8849d8e7','Nikhil Bisht','Female','2018-12-04','7060273896',2,'2018-12-14 09:21:14');
/*!40000 ALTER TABLE `receiver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `requestId` varchar(32) NOT NULL,
  `sender` varchar(32) DEFAULT NULL,
  `receiver` varchar(32) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`requestId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES ('2508e75588321e7693032f774e2cf572','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',3,300,'2018-12-14 20:34:30'),('312375c9f795e78ba282de836b19736c','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',7,300,'2018-12-14 20:34:45'),('8665f5100291a15682a7aeb9ef60ead5','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',6,200,'2018-12-14 20:34:42'),('93c9a46bcbd59e67e0ec8e1c23db12e4','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',5,200,'2018-12-14 20:34:35'),('a997ed1331e866da4b0acf8f4f7be303','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',2,200,'2018-12-14 20:34:27'),('c21333e186a8cc51e7d4cc0f552125c2','53234ddb8816e6c9da102a6fc530c935','b851d23575b8e09b50942ce59c22d3b0',1,200,'2018-12-14 20:03:43');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-16 11:58:20
