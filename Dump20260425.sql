-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jastip_paketmu
-- ------------------------------------------------------
-- Server version	8.0.44

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
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text,
  `resiko` enum('rendah','sedang','tinggi') NOT NULL,
  `packing_khusus` enum('ya','tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_barang`
--

LOCK TABLES `kategori_barang` WRITE;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` VALUES (5,'Elektronik','Smartphone Android dengan RAM 8GB dan penyimpanan 128GB. Kondisi baru dan masih bergaransi resmi.','sedang','tidak','2026-03-13 04:56:56'),(6,'Fashion','Jaket hoodie pria bahan fleece tebal, cocok untuk cuaca dingin dan penggunaan sehari-hari.','rendah','tidak','2026-03-13 04:59:14'),(7,'Makanan','Cokelat premium impor dengan berbagai varian rasa seperti almond, caramel, dan dark chocolate.','tinggi','ya','2026-03-13 04:59:55'),(8,'Aksesoris','Jam tangan digital tahan air dengan fitur stopwatch, alarm, dan lampu LED.','rendah','tidak','2026-03-13 05:00:21'),(9,'Fragile','Vas bunga kaca handmade dengan desain minimalis, cocok untuk dekorasi ruang tamu.','tinggi','ya','2026-03-13 05:00:51');
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan_paket`
--

DROP TABLE IF EXISTS `pesanan_paket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pesanan_paket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_users` int DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `deskripsi_paket` text,
  `no_wa` varchar(20) DEFAULT NULL,
  `packing_khusus` enum('ya','tidak') DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Diproses','menuju_gudang','sampai_gudang','diambil','selesai') DEFAULT 'Diproses',
  PRIMARY KEY (`id`),
  KEY `fk_user` (`id_users`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan_paket`
--

LOCK TABLES `pesanan_paket` WRITE;
/*!40000 ALTER TABLE `pesanan_paket` DISABLE KEYS */;
INSERT INTO `pesanan_paket` VALUES (3,5,6,'milik sonya','barang sonya 1','0812345678','tidak','2026-03-13 16:18:47','Diproses'),(4,5,7,'sonya 2','tolong dijaga ini makanan','0812345678','tidak','2026-03-14 01:44:42','diambil'),(7,5,9,'sonya 4','barang pecah belah','0812345678','tidak','2026-03-26 04:18:05','selesai'),(9,5,8,'sonya 5','barang baru','0812345678','tidak','2026-03-26 13:45:29','diambil'),(10,2,8,'ELVIS 001','BARANG ELVIS 1','0812345678','tidak','2026-03-27 01:57:04','sampai_gudang'),(11,5,5,'SONYA 6','barang ke-9','0812345678','tidak','2026-03-28 08:44:25','menuju_gudang'),(12,2,9,'ELVIS 2','barang pecah belah','0812345678','tidak','2026-03-30 06:26:01','menuju_gudang'),(13,5,6,'sonya 7','test sonya 7','0812345678','tidak','2026-03-31 11:45:47','diambil'),(14,2,5,'elvis pkt','pesanan ke 4 saya','0812345678','tidak','2026-04-01 03:42:24','menuju_gudang'),(15,2,7,'elvis jastip 5','makanan enak','0812345678','tidak','2026-04-01 03:55:11','Diproses');
/*!40000 ALTER TABLE `pesanan_paket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','users') DEFAULT 'users',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin.elvis','$2y$10$WQ8xMo.VMyNRjLxCArXtxumej4QoO4Wdydfmna0aQmAry10ciPT/S','admin'),(2,'elvisgado','$2y$10$A4gpcDRMdnUOZGzxNmHftOdlbGV9hHqlQmSng78coU.owtg2eeGZm','users'),(5,'sonya_wea','$2y$10$MsGr2WSBuD9w3LRc9v5qY.6mBAEaQ70zIGF2T9S7XBopRLKrI2bci','users');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'jastip_paketmu'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-25 13:42:05
