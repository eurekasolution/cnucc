-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: culture
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aaa`
--

DROP TABLE IF EXISTS `aaa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aaa` (
  `id` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aaa`
--

LOCK TABLES `aaa` WRITE;
/*!40000 ALTER TABLE `aaa` DISABLE KEYS */;
INSERT INTO `aaa` VALUES ('test','테스트'),('kdhong','홍길동');
/*!40000 ALTER TABLE `aaa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notice` tinyint(1) DEFAULT 0,
  `html` mediumtext DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,1,'admin','관리자','첫째 공지사항',0,'공지사항입니다.\r\n테스트','2024-11-01 12:58:50'),(3,2,'test','테스트','자유게시판 첫번째',0,'자유게시판의 첫번째 글입니다.\r\n안녕하세요.\r\n엔터를 치면 br태그로 변경을 해 주어야 합니다.','2024-11-01 13:03:30');
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_user_table`
--

DROP TABLE IF EXISTS `my_user_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_user_table` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_user_table`
--

LOCK TABLES `my_user_table` WRITE;
/*!40000 ALTER TABLE `my_user_table` DISABLE KEYS */;
INSERT INTO `my_user_table` VALUES (1,'abcde','세종','1111','1567-05-15'),(2,'fghij','정조','1111','1745-08-28'),(3,'klmno','이순신','1111','1545-09-08'),(4,'pqrst','강감찬','1111','1582-12-12'),(6,'djjung','정도전','1111','1500-01-01'),(7,'efghi','윤봉길','1111','1908-06-21'),(8,'jklmn','안중근','1111','1879-09-02'),(9,'opqrs','유관순','1111','1902-12-16'),(10,'gkim','김구','1111','1876-08-29'),(11,'yzabc','허준','1111','1546-10-01'),(12,'defgh','신사임당','1111','1504-10-29'),(13,'ijklm','황희','1111','1363-02-03'),(14,'nopqr','안창호','1111','1878-11-09'),(15,'stuvw','장영실','1111','1390-07-01'),(16,'xyzaa','이방원','1111','1367-10-13'),(17,'bcdef','박지원','1111','1737-02-05'),(18,'ghijk','유성룡','1111','1542-09-12'),(19,'lmnop','신숙주','1111','1417-01-12'),(20,'qrstu','정약용','1111','1762-06-16'),(21,'kjmin','민경주','1111','2000-10-03'),(171,'aaa','bbb','$2y$10$KnqRe2Wy8rrLrkmTSbvd7uHzJsp.UlVjAuuIjK/oN7pCJDj2iUhnm','1500-01-12'),(173,'sinok','한문학과','$2y$10$pvvI1.iY8aGB6duf6zOfpuiha5nn/aSEv2LO5KPT8G3fPODXGmDRS','1986-03-02');
/*!40000 ALTER TABLE `my_user_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `id` char(20) DEFAULT NULL,
  `pass` char(50) DEFAULT NULL,
  `level` int(11) DEFAULT 1,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'테스트','test','1111',1),(2,'관리자','admin','1111',9);
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

-- Dump completed on 2024-11-21 17:56:13
