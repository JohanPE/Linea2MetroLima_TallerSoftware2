-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bdmetro
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distrito` (
  `distrito` char(10) NOT NULL,
  `nombre_distrito` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`distrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES ('01','Ancón'),('02','Ate'),('03','Barranco'),('04','Breña'),('05','Carabayllo'),('06','Cercado de Lima'),('07','Chaclacayo'),('08','Chorrillos'),('09','Cieneguilla'),('10','Comas'),('11','El Agustino'),('12','Independencia'),('13','Jesus María'),('14','La Molina'),('15','La victoria'),('16','Lince'),('17','Los Olivos'),('18','Lurigancho'),('19','Lurín'),('20','Magdalena del Mar'),('21','Miraflores'),('22','Pachacamac'),('23','Pucusana'),('24','Pueblo libre'),('25','Puente piedra'),('26','Punta hermosa'),('27','Punta negra'),('28','Rímac'),('29','San bartolo'),('30','San Borja'),('31','San Isidro'),('32','San Juan de Lurigancho'),('33','San Juan de Miraflores'),('34','San Luis'),('35','San Martin de Porres'),('36','San Miguel'),('37','Santa Anita'),('38','Santa María del Mar'),('39','Santa Rosa'),('40','Santiago de Surco'),('41','Surquillo'),('42','Villa el Salvador'),('43','Villa María del Triunfo');
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadotarifa`
--

DROP TABLE IF EXISTS `estadotarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadotarifa` (
  `idestadotarifa` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `glosa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idestadotarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadotarifa`
--

LOCK TABLES `estadotarifa` WRITE;
/*!40000 ALTER TABLE `estadotarifa` DISABLE KEYS */;
INSERT INTO `estadotarifa` VALUES (1,'Publico en general','Tarifa regular para adultos'),(2,'Estudiante','Tarifa reducida para estudiantes');
/*!40000 ALTER TABLE `estadotarifa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasajeros`
--

DROP TABLE IF EXISTS `pasajeros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasajeros` (
  `N_identificacion` int(11) NOT NULL,
  `numero_pasajero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `estudiante` varchar(10) DEFAULT NULL,
  `idtipodoc` varchar(8) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  PRIMARY KEY (`N_identificacion`),
  UNIQUE KEY `numero_pasajero` (`numero_pasajero`),
  KEY `idtipodoc` (`idtipodoc`),
  KEY `id_tarifa` (`id_tarifa`),
  CONSTRAINT `pasajeros_ibfk_1` FOREIGN KEY (`idtipodoc`) REFERENCES `tipodedocumento` (`idtipodoc`),
  CONSTRAINT `pasajeros_ibfk_2` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifa` (`idtarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasajeros`
--

LOCK TABLES `pasajeros` WRITE;
/*!40000 ALTER TABLE `pasajeros` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasajeros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recorrido`
--

DROP TABLE IF EXISTS `recorrido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recorrido` (
  `id_recorrido` int(11) NOT NULL AUTO_INCREMENT,
  `gastos` decimal(10,2) DEFAULT 0.00,
  `fecha_viaje` datetime DEFAULT NULL,
  `id_usuario` varchar(100) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recorrido`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tarifa` (`id_tarifa`),
  CONSTRAINT `recorrido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `recorrido_ibfk_2` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifa` (`idtarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recorrido`
--

LOCK TABLES `recorrido` WRITE;
/*!40000 ALTER TABLE `recorrido` DISABLE KEYS */;
/*!40000 ALTER TABLE `recorrido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'administrador'),(2,'trabajador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa`
--

DROP TABLE IF EXISTS `tarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifa` (
  `idtarifa` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT 0.00,
  `idestadotarifa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtarifa`),
  KEY `idestadotarifa` (`idestadotarifa`),
  CONSTRAINT `tarifa_ibfk_1` FOREIGN KEY (`idestadotarifa`) REFERENCES `estadotarifa` (`idestadotarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa`
--

LOCK TABLES `tarifa` WRITE;
/*!40000 ALTER TABLE `tarifa` DISABLE KEYS */;
INSERT INTO `tarifa` VALUES (1,'Tarifa General',1.50,1),(2,'Tarifa Estudiante',0.75,2);
/*!40000 ALTER TABLE `tarifa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodedocumento`
--

DROP TABLE IF EXISTS `tipodedocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipodedocumento` (
  `idtipodoc` varchar(8) NOT NULL,
  `nombre_tipodoc` varchar(500) DEFAULT NULL,
  `glosa_tipodoc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idtipodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodedocumento`
--

LOCK TABLES `tipodedocumento` WRITE;
/*!40000 ALTER TABLE `tipodedocumento` DISABLE KEYS */;
INSERT INTO `tipodedocumento` VALUES ('1','Documento Nacional de Identidad','DNI'),('2','Pasaporte','PST'),('3','Carnet de Extranjeria','CE');
/*!40000 ALTER TABLE `tipodedocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajador` (
  `idtrabajador` int(11) NOT NULL,
  `idtipodoc` varchar(8) DEFAULT NULL,
  `numdocidentidad` varchar(100) DEFAULT NULL,
  `apepat` varchar(400) DEFAULT NULL,
  `apemat` varchar(400) DEFAULT NULL,
  `nombre` varchar(400) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtrabajador`),
  KEY `trabajador_FK` (`idtipodoc`),
  CONSTRAINT `trabajador_FK` FOREIGN KEY (`idtipodoc`) REFERENCES `tipodedocumento` (`idtipodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (1,'1','12312343','PEREZ','PEREZ','JUAN','jperez@gmail.com',NULL,'123123123'),(2,'1','32132112','DIAZ','DIAZ','JORGE','jdiaz@gmail.com',NULL,'32132123');
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(100) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `saldo` decimal(10,2) DEFAULT 0.00,
  `dni` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `dni` (`dni`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `pasajeros` (`N_identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariotrabajador`
--

DROP TABLE IF EXISTS `usuariotrabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariotrabajador` (
  `idtrabajador` int(11) NOT NULL,
  `usuario` varchar(500) DEFAULT NULL,
  `clave` varchar(500) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtrabajador`),
  KEY `usuariotrabajador_FK_1` (`idrol`),
  CONSTRAINT `usuariotrabajador_FK` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`),
  CONSTRAINT `usuariotrabajador_FK_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariotrabajador`
--

LOCK TABLES `usuariotrabajador` WRITE;
/*!40000 ALTER TABLE `usuariotrabajador` DISABLE KEYS */;
INSERT INTO `usuariotrabajador` VALUES (1,'jperez','25d55ad283aa400af464c76d713c07ad',1),(2,'jdiaz','25d55ad283aa400af464c76d713c07ad',2);
/*!40000 ALTER TABLE `usuariotrabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdmetro'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-08 19:17:06
