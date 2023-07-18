-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: to_do
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `tasques`
--

DROP TABLE IF EXISTS `tasques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasques` (
  `idTasques` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tasques` varchar(45) NOT NULL,
  `descrip_tasques` varchar(150) NOT NULL,
  `estat_tasques` enum('Pendent','En Execució','Acabada') NOT NULL,
  `inici_tasques` date NOT NULL,
  `fi_tasques` date DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idTasques`),
  KEY `fk_Tasques_Usuario_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Tasques_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasques`
--

LOCK TABLES `tasques` WRITE;
/*!40000 ALTER TABLE `tasques` DISABLE KEYS */;
INSERT INTO `tasques` VALUES (3,'Llamar Seguro','Negociar Precio Renovación','Pendent','2023-07-03','0000-00-00',4),(4,'Regalo Cumple','Buscar Regalo Aniversario','Pendent','2023-06-27','0000-00-00',4),(7,'Pagar IVTM','Pago Online Impuesto','Pendent','2023-06-26','0000-00-00',4),(8,'Veterinario','Llamar Veterinario Tokyo','Pendent','2023-06-30','0000-00-00',5),(9,'GarraPulgas','Llamar Veterinario','Pendent','2023-06-28','0000-00-00',5),(12,'Peluqueria','Llamar para pedir hora','En Execució','2023-06-28','2023-07-04',5),(15,'Examen Opos','Estudiar Oposiciones','En Execució','2023-06-29','2023-07-01',4),(21,'Testing MVC','Prueba Añadir Data','En Execució','2023-07-12','0000-00-00',4),(30,'Retumband','Batucada Esteve','Acabada','2023-07-14','2023-07-15',5),(31,'Comprar Bambas','La Roca Village','Pendent','2023-07-15','0000-00-00',4);
/*!40000 ALTER TABLE `tasques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usuari` varchar(45) NOT NULL,
  `cognom1_usuari` varchar(45) NOT NULL,
  `cognom2_usuari` varchar(45) NOT NULL,
  `email_usuari` varchar(45) NOT NULL,
  `password_usuari` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'Abel','Galindo','Pascual','agp@hotmail.es','1234'),(5,'Beatriz','Ponce','Gomez','bpg@hotmail.es','1234');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-18  9:39:29
