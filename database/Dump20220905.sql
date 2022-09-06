-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: gharjoda_db
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_temp`
--

LOCK TABLES `password_reset_temp` WRITE;
/*!40000 ALTER TABLE `password_reset_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reg`
--

DROP TABLE IF EXISTS `user_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_reg` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_contact` bigint NOT NULL,
  `password` varchar(45) NOT NULL,
  `reg_datatime` datetime(6) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_contact_UNIQUE` (`user_contact`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reg`
--

LOCK TABLES `user_reg` WRITE;
/*!40000 ALTER TABLE `user_reg` DISABLE KEYS */;
INSERT INTO `user_reg` VALUES (1,'Kinshuk Maity','kinshukmaity54@gmail.com',9064706514,'1ecb9b68909fd64d8f55e0833c0af949','2022-09-02 19:33:29.000000'),(3,'Gaurav Singh','gauravsingh@gmail.com',8001236308,'29be54a52396750258d886abc5417fda','2022-09-02 23:09:49.000000'),(4,'Gaurav Kumar','gauravkumar@gmail.com',8001236306,'29be54a52396750258d886abc5417fda','2022-09-02 23:13:01.000000'),(6,'Rasmi','rashmi@gmail.com',1234567890,'21232f297a57a5a743894a0e4a801fc3','2022-09-02 23:15:43.000000'),(8,'king','kinshukmaity549@gmail.com',9064706513,'c1ecc19a41ad7d8b0d79f3424ab0999f','2022-09-05 11:41:24.000000'),(9,'Rasmi M','kinshukmaity004@gmail.com',12345678945,'1ecb9b68909fd64d8f55e0833c0af949','2022-09-05 12:32:15.000000'),(10,'admin','admin@gmail.com',1234567895,'0e7517141fb53f21ee439b355b5a1d0a','2022-09-05 12:39:43.000000'),(12,'admin1','admin1@gmail.com',1234512345,'0e7517141fb53f21ee439b355b5a1d0a','2022-09-05 15:48:59.000000'),(14,'faruk','faruk@gmail.com',1234567834,'9ff41dc4b232afef1d884bc1b9231c24','2022-09-05 16:53:08.000000');
/*!40000 ALTER TABLE `user_reg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-05 23:24:13
