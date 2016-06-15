-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: zeanleague
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.12.04.1

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
-- Table structure for table `carousels`
--

DROP TABLE IF EXISTS `carousels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carousels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic_dir` int(11) DEFAULT NULL,
  `pic_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousels`
--

LOCK TABLES `carousels` WRITE;
/*!40000 ALTER TABLE `carousels` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competitions_types`
--

DROP TABLE IF EXISTS `competitions_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competitions_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_dir` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competitions_types`
--

LOCK TABLES `competitions_types` WRITE;
/*!40000 ALTER TABLE `competitions_types` DISABLE KEYS */;
INSERT INTO `competitions_types` VALUES (1,'บอลไทย','725392afaa576105f162f8cf08cba159.jpg',1,'2016-05-21','2016-05-21',2016,'บอลไทย','2016-05-21 07:52:34','2016-05-23 16:48:37'),(2,'ยูโร 2015-2016','c659613739dd684ad0da4b6d098923e5.jpg',2,'2016-05-23','2016-06-23',2016,'ยูโร 2015-2016','2016-05-23 16:09:42','2016-05-23 17:00:13'),(3,'บอลโลก','5acc9835369a09b1ba03ccd1832349f0.jpg',3,'2016-05-23','2016-06-24',2016,'บอลโลก','2016-05-23 16:14:28','2016-06-08 14:43:21');
/*!40000 ALTER TABLE `competitions_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET ucs2 NOT NULL,
  `description` text CHARACTER SET ucs2 NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebooks`
--

DROP TABLE IF EXISTS `facebooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebooks`
--

LOCK TABLES `facebooks` WRITE;
/*!40000 ALTER TABLE `facebooks` DISABLE KEYS */;
/*!40000 ALTER TABLE `facebooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `limit_predict` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(45) CHARACTER SET utf8 NOT NULL,
  `avatar_dir` int(11) DEFAULT NULL,
  `avatar_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(10) unsigned zerofill DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (8,NULL,NULL,'junior member',NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-14 16:18:06','2016-06-14 16:18:06'),(9,'tep','tep','junior member',9,'cd449803179c4b1b6da2ebaebba81cec.jpg',0931624206,'burapa.s@aware.co.th','',NULL,'2016-06-14 16:52:24','2016-06-15 16:43:06');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `predicts`
--

DROP TABLE IF EXISTS `predicts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `predicts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `teams_compettition_id` int(11) NOT NULL,
  `team` enum('A','B') CHARACTER SET utf8 NOT NULL,
  `team_a_score` int(11) NOT NULL,
  `team_b_score` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `predicts`
--

LOCK TABLES `predicts` WRITE;
/*!40000 ALTER TABLE `predicts` DISABLE KEYS */;
/*!40000 ALTER TABLE `predicts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,'AA',NULL,NULL),(2,'BB',NULL,NULL),(3,'CC',NULL,NULL),(4,'DD',NULL,NULL),(5,'EE',NULL,NULL),(6,'FF',NULL,NULL);
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_types`
--

DROP TABLE IF EXISTS `team_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` tinyint(1) DEFAULT NULL,
  `leage` tinyint(1) DEFAULT NULL,
  `division` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_types`
--

LOCK TABLES `team_types` WRITE;
/*!40000 ALTER TABLE `team_types` DISABLE KEYS */;
INSERT INTO `team_types` VALUES (1,'test',0,0,0,'2016-05-17 15:06:50','2016-05-18 17:25:52'),(2,'test2',NULL,NULL,NULL,'2016-05-17 15:06:53','2016-05-18 15:14:57'),(3,'ddlkkาส่่',NULL,NULL,NULL,'2016-05-17 15:10:37','2016-05-17 15:10:37'),(4,'ฟกฟหก',NULL,NULL,NULL,'2016-05-17 15:11:55','2016-05-17 15:11:55'),(5,'ฟกฟหก',NULL,NULL,NULL,'2016-05-17 15:14:06','2016-05-17 15:14:06'),(6,'ฟกฟหก',1,0,0,'2016-05-17 15:14:21','2016-05-18 16:33:33'),(7,'test',0,1,1,'2016-05-17 15:24:47','2016-05-18 16:23:04'),(8,'Thailand',1,0,0,'2016-05-18 17:28:21','2016-05-18 17:28:21'),(9,'พรีเมียร์ลีก',0,1,1,'2016-05-21 14:43:42','2016-05-21 14:43:42');
/*!40000 ALTER TABLE `team_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `team_type_id` int(11) DEFAULT NULL,
  `logo_image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `logo_dir` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'ไม่มี','ไม่มี',1,NULL,'','2016-05-21 07:51:40','2016-05-21 09:08:55'),(2,'test','test',1,NULL,'','2016-05-21 08:51:13','2016-05-21 08:51:13'),(4,'test002','test',1,'f71ef96246632766ec761f2f5b5b37b5.logo_image','4','2016-05-21 08:54:11','2016-05-21 08:54:11'),(5,'test003','test',1,'7e987d7d3f4ea6686042834c9619f4df.logo_image','5','2016-05-21 08:56:25','2016-05-21 08:56:25'),(6,'แมนยู','แมนยู',2,'bc0b6e2fc7eb007c824b19c9d79831c9.jpg','6','2016-05-21 09:01:35','2016-05-21 09:01:35'),(7,'แมนยู555','แมนยู 55++ ',1,'96fab0fe9885f4b984e3518463421b77.jpg','7','2016-05-21 09:04:22','2016-05-22 08:01:52'),(8,NULL,NULL,NULL,NULL,NULL,'2016-05-22 07:46:46','2016-05-22 07:46:46'),(9,NULL,NULL,NULL,NULL,NULL,'2016-05-22 07:47:08','2016-05-22 07:47:08'),(10,'บราชิล','test',4,'0abd13b95925663b8b97e384dd96ea1a.jpg','10','2016-05-22 07:48:19','2016-05-22 08:14:29');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams_competitions`
--

DROP TABLE IF EXISTS `teams_competitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams_competitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_a_id` int(11) NOT NULL,
  `team_b_id` int(11) NOT NULL,
  `team_a_score` int(11) NOT NULL,
  `team_b_score` int(11) NOT NULL,
  `competitions_type_id` int(11) NOT NULL,
  `max_score` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `team` enum('A','B') CHARACTER SET utf8 NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams_competitions`
--

LOCK TABLES `teams_competitions` WRITE;
/*!40000 ALTER TABLE `teams_competitions` DISABLE KEYS */;
INSERT INTO `teams_competitions` VALUES (1,2,4,0,0,2,5,5,'A','2016-06-01 13:15:41','2016-06-01 15:03:32','2016-06-01 00:00:00'),(2,7,2,0,0,1,5,2,'A','2016-06-01 14:22:36','2016-06-08 14:52:19','2016-05-01 14:22:00'),(3,7,2,0,0,1,5,2,'A','2016-06-01 14:22:36','2016-06-08 14:52:19','2016-06-01 14:22:00'),(4,2,4,0,0,2,5,5,'A','2016-06-01 13:15:41','2016-06-01 15:03:32','2016-06-15 12:00:00'),(5,7,2,0,0,1,5,2,'A','2016-06-01 14:22:36','2016-06-08 14:52:19','2016-06-15 19:00:00'),(6,7,2,0,0,1,5,2,'A','2016-06-01 14:22:36','2016-06-08 14:52:19','2016-06-15 19:30:00');
/*!40000 ALTER TABLE `teams_competitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '1',
  `token` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `confirm` tinyint(1) DEFAULT '0',
  `login_redirect` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'burapa.ss@aware.co.th','$2a$10$ID/Mee3jIPGXWjkIAbVfDe.BzeGC0R9rsAUEaDBO8U9IA6Iq1h52u',8,1,'f6cdcbfcd4cebda39ae336e691e4090e28e50eb9',1,'/members/profile','2016-06-14 16:18:06','2016-06-14 16:18:25'),(11,'burapa.s@aware.co.th','$2a$10$ZP3lssBpu63NGVMxkHzckOJhZ0FV40.4x8yCoSY1vQSF/G3FT94sm',9,1,'96ac8ee47dd05af9dee93fd1e41d0c21e4238f0f',1,'/members/profile','2016-06-14 16:52:24','2016-06-14 16:52:37');
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

-- Dump completed on 2016-06-15 18:00:11
