-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sale_project
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id_product` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time DEFAULT NULL,
  `likes` int(20) DEFAULT NULL,
  `purchases` int(20) DEFAULT NULL,
  `seller_id` int(20) NOT NULL,
  `photo` longblob,
  PRIMARY KEY (`id_product`,`seller_id`),
  KEY `seller_id` (`seller_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'lala',291919,'alalla','2016-09-28','12:26:44',0,0,1,'c:UsersUserDesktopadd_product.jpg'),(2,'Nestle Corn Flakes',30000,'Sereal Nestle dengan Upil Utuh','2016-10-01','12:58:08',0,0,1,'genetic.PNG'),(3,'eek upil',432432,'eek upil','2016-10-01','18:31:12',0,0,1,'jadwal.cpp'),(4,'dasdasdsaf',1312312,'adsfas','2016-10-01','18:33:13',0,0,1,'Laporan Tubes 1 AI.docx'),(5,'fdasfasafffads',123213,'fasdfsa','2016-10-01','18:34:39',0,0,1,'Laporan Tubes 1 AI.docx'),(6,'1232423`',312312,'e3243241','2016-10-01','18:35:49',0,0,1,'Laporan Tubes 1 AI.docx'),(7,'1232423`',312312,'e3243241','2016-10-01','18:36:30',0,0,1,'Laporan Tubes 1 AI.docx'),(8,'lalala',3234,'lwwkldwk','2016-10-01','18:36:42',0,0,1,'jadwal.cpp'),(9,'sdksk;fs',34535,'dffrwgfrr','2016-10-01','18:37:13',0,0,1,'jadwal.cpp'),(10,'sdksk;fs',34535,'dffrwgfrr','2016-10-01','18:40:00',0,0,1,'jadwal.cpp'),(11,'sjsaj',13213,'sjalsjka','2016-10-01','18:43:43',0,0,1,'hillclimbing.PNG'),(12,'sjsaj',13213,'sjalsjka','2016-10-01','18:44:11',0,0,1,'hillclimbing.PNG'),(13,'wqkkeqq;l',234,'ewklwekl','2016-10-01','18:44:28',0,0,1,'genetic2.PNG'),(14,'wqejeqj',10000,'klddklj','2016-10-01','18:50:29',0,0,1,'genetic2.PNG'),(15,'djlww',1222,'qiei','2016-10-01','18:50:42',0,0,1,'genetic.PNG'),(16,'Indofood Sambal Pedas Manis',8767890,'Cocok untuk dimakan bersama nugget, ayam goreng, dan kentang goreng','2016-10-02','13:07:22',0,0,1,'img/add_product.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id_purchase` int(20) NOT NULL AUTO_INCREMENT,
  `id_product` int(20) NOT NULL,
  `id_buyer` int(20) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `total_price` int(20) DEFAULT NULL,
  `consignee` varchar(100) DEFAULT NULL,
  `full_address` varchar(300) DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL,
  `credit_card_number` int(12) DEFAULT NULL,
  `card_verification_value` int(3) DEFAULT NULL,
  `date_purchased` date DEFAULT NULL,
  `time_purchased` time DEFAULT NULL,
  PRIMARY KEY (`id_purchase`,`id_product`,`id_buyer`),
  KEY `id_product` (`id_product`),
  KEY `id_buyer` (`id_buyer`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`id_buyer`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,2,2,'Nestle Corn Flakes',30000,1,10000,'lala','eek',123,879,233333,2333,'2016-10-01','18:14:55'),(2,2,2,'Nestle Corn Flakes',30000,1,10000,'lala','eek',123,879,38432,23842,'2016-10-01','18:15:04'),(3,2,2,'Nestle Corn Flakes',30000,1,10000,'Vitra Chandra','Rumah Gue dong masa rumah dia',77777,100,171717,294,'2016-10-01','18:17:23'),(4,2,2,'Nestle Corn Flakes',30000,1,10000,'Vitra Chandra','Rumah Gue dong masa rumah dia',77777,100,171717,294,'2016-10-01','18:29:32');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `full_address` varchar(300) DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'lala','lili','lulu@gmail.com','eek',123,879,'lele');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-02 13:35:22
