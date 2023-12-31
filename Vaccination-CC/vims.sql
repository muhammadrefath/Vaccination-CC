-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: vaccine_inventory
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vaccine_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `reorder_threshold` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaccine_id` (`vaccine_id`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_vaccine`
--

DROP TABLE IF EXISTS `pending_vaccine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pending_vaccine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `quantity` int NOT NULL,
  `priority` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `xdate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_vaccine`
--

LOCK TABLES `pending_vaccine` WRITE;
/*!40000 ALTER TABLE `pending_vaccine` DISABLE KEYS */;
INSERT INTO `pending_vaccine` VALUES (1,'aa',11,'high','taskin','01829829812','2023-12-13','Approved'),(2,'qq',22,'high','qq','wqw','2023-12-13','Rejected'),(3,'sk',98,'medium','sjs','00910192','2023-12-13','Approved'),(4,'kk',99,'medium','sss','0889','2023-12-15','Approved'),(5,'ss',11,'high','szz','0889','2023-12-22','Approved'),(6,'Pfizer',192,'high','shakil','019281918288','2023-12-20','Pending');
/*!40000 ALTER TABLE `pending_vaccine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `name` text,
  `lastlog` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'test11','$2y$10$w70acFfOY26jye.FOM7HOeVSVpIR4iBf30bP2PqlxD4q664sayW7K','administrator','test',NULL,NULL),(10,'test','$2y$10$pgfN81EXst9UbmcN8trCtOBAZkjLZNqBK4igcfY41KLZHBa6EdgU6','inventory_manager','test',NULL,NULL),(11,'admin','$2y$10$vyDKXOtmtPNoMcv/Vq8LUeGzuujsKPztQWP0VYeGx5rUBn42xdsZu','administrator','admin',NULL,NULL),(12,'rasel','$2y$10$JbLGcwWqPXK2LF0g.Ju2A.QLQPesjaNSdjxxYex9hTgcSEk.yfVBO','inventory_manager','inventory test',NULL,NULL),(13,'alamin','$2y$10$TiacEnWmv4dlJWWv41RExu8DBi3fdcKcTLgJ.gvWsch2X41mvpyDe','dispatcher','dispatcher alamin',NULL,NULL),(14,'shakil','$2y$10$CQCIIZPvzvD/IoHEhGjMeO15hy4a6R2zKxVNefHnLv7g.cXTxTplK','staff','staff shakil',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaccines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `unit` int NOT NULL,
  `price` int NOT NULL,
  `manufacturer` text,
  `vtype` text,
  `diseases` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mdate` text,
  `expdate` text,
  `bnumber` text,
  `stemp` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaccines`
--

LOCK TABLES `vaccines` WRITE;
/*!40000 ALTER TABLE `vaccines` DISABLE KEYS */;
INSERT INTO `vaccines` VALUES (6,'Sinopharm',111,231,'huixo','inactivated','molaaa','2023-12-03','2024-10-23','BH998','7.02'),(7,'AstroZenecca',443,321,'India','live_attenuated','fever, cough','2023-12-06','2024-06-04','BN8198','8.98'),(8,'test',1211,276,'ss','live_attenuated','ssa','2023-12-15','2023-11-29','BN3222','17.22'),(9,'aa',982,172,'sjs','live_attenuated','sms','2023-12-12','2024-01-05','BN089','8.98');
/*!40000 ALTER TABLE `vaccines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-17 14:25:31
