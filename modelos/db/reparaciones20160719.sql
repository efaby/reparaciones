-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: reparaciones
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id` int(11) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_acceso_tipo_usuario1_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_acceso_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `identificacion` varchar(13) NOT NULL,
  `direccion` varchar(512) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Marthas','Lopez','0603718574','Calle 54','021345122','0241236214','mail45@mail.com',0),(2,'Juan','Perez','0603718575','Calle 5','021345122','0124574417','mailj@mail.com',0),(5,'prueba','Perez','2222222222','prueba','032154322','0215402151','prueba@mail.com',0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `marca` varchar(64) NOT NULL,
  `modelo` varchar(64) DEFAULT NULL,
  `numero_serie` varchar(64) NOT NULL,
  `observaciones` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (6,'laptop toshiba','tosihiba','lc-2012','abc-123','deja con cargador'),(7,'laptop toshiba','tosihiba','lc-2012','abc-123','deja con cargador'),(8,'pc de escritoprio','generico','i5','er-213','deja teclado y mouse'),(9,'a','a','a','a','a'),(10,'a','a','a','a','sa'),(11,'a','a','a','a','sa'),(12,'b','b','b','b','b'),(13,'b','b','b','b','b'),(14,'a','a','a','2','a'),(15,'a','a','a','a','a');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Ingreso','Cuando el Equipo ingresa a reparar'),(2,'Diagnóstico','Cuando al Equipo es diagnosticado por un Tecnico'),(3,'Reparación','Cuando el Equipo es reparado'),(4,'Entrega','Cuando el Equipo se entrega al propietario');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reparacion_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `observaciones` varchar(2048) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_historial_estado1_idx` (`estado_id`),
  KEY `fk_historial_reparacion1_idx` (`reparacion_id`),
  CONSTRAINT `fk_historial_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_reparacion1` FOREIGN KEY (`reparacion_id`) REFERENCES `reparacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (1,3,1,1,'2016-06-28','deja con cargador',0),(2,4,1,1,'2016-06-28','se reinica a cada momento',0),(3,5,1,1,'2016-06-29','a',0),(4,6,1,1,'2016-06-29','sa',1),(5,7,1,1,'2016-06-29','sa',0),(6,8,1,1,'2016-06-29','b',1),(7,9,1,1,'2016-06-29','b',1),(8,10,1,1,'2016-06-29','asas',1),(9,11,1,1,'2016-06-29','a',1),(10,3,2,1,'2016-06-29',NULL,0),(11,3,3,1,'2016-06-29','paso otro estado',0),(12,3,4,1,'2016-06-29','entregado',1),(13,4,2,1,'2016-06-29','prueba',0),(14,4,3,1,'2016-06-29','teste',0),(15,4,4,1,'2016-06-29','entrega',1),(16,5,2,1,'2016-06-29','teste teste ',1),(17,7,2,1,'2016-06-29','prueba',1);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparacion`
--

DROP TABLE IF EXISTS `reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reparacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observacion` varchar(2048) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_reparacion_cliente1_idx` (`cliente_id`),
  KEY `fk_reparacion_tecnico1_idx` (`tecnico_id`),
  KEY `fk_reparacion_equipo1_idx` (`equipo_id`),
  CONSTRAINT `fk_reparacion_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reparacion_equipo1` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reparacion_tecnico1` FOREIGN KEY (`tecnico_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparacion`
--

LOCK TABLES `reparacion` WRITE;
/*!40000 ALTER TABLE `reparacion` DISABLE KEYS */;
INSERT INTO `reparacion` VALUES (2,5,6,2,1,'2016-06-28','2016-06-28','deja con cargador',0),(3,5,7,2,1,'2016-06-28','2016-06-28','deja con cargador',0),(4,5,8,2,1,'2016-06-28','2016-06-28','se reinica a cada momento',0),(5,5,9,2,1,'2016-06-29','2016-06-29','a',0),(6,5,10,3,1,'2016-06-29','2016-06-29','sa',0),(7,5,11,3,1,'2016-06-29','2016-06-29','sa',0),(8,5,12,3,1,'2016-06-29','2016-06-29','b',0),(9,5,13,3,1,'2016-06-29','2016-06-29','b',0),(10,5,14,2,1,'2016-06-29','2016-06-29','asas',0),(11,5,15,2,1,'2016-06-29','2016-06-29','a',0);
/*!40000 ALTER TABLE `reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador','Usuario Adminstrador'),(2,'Técnico','Usuario Técnico'),(3,'Secretario','Usuario Secretario');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id` int(11) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `identificacion` varchar(13) NOT NULL,
  `direccion` varchar(512) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `eliminado` int(11) NOT NULL,
  `genero` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tecnico_tipo_usuario_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_tecnico_tipo_usuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'Fabian','Perez','0213451247','calle 3','021547211','0214510213','mail@mail.com','faby','e10adc3949ba59abbe56e057f20f883e',0,'m'),(2,2,'Fernado','Perez','0602154123','Calle 5-6 ya calle 2','014245788','0124574417','mail@mail.com','fercho','e10adc3949ba59abbe56e057f20f883e',0,'m'),(3,2,'maria','alvarez','0603718572','calle 3','014245788','0215402151','mail@mail.com','mary','fcea920f7412b5da7be0cf42b8c93759',0,'f'),(4,3,'Jose','Andrade','0302145620','calle5','021354122','0215423621','mail@mail.com','pepe','e10adc3949ba59abbe56e057f20f883e',0,'m');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-19 15:09:37
