-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bienes
DROP DATABASE IF EXISTS `bienes`;
CREATE DATABASE IF NOT EXISTS `bienes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bienes`;

-- Volcando estructura para tabla bienes.propiedades
DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE IF NOT EXISTS `propiedades` (
  `P_Id` int(11) NOT NULL AUTO_INCREMENT,
  `P_Titulo` varchar(50) DEFAULT NULL,
  `P_Precio` decimal(12,2) DEFAULT NULL,
  `P_Imagen` varchar(200) DEFAULT NULL,
  `P_Descrip` longtext,
  `P_Habitaciones` int(2) DEFAULT NULL,
  `P_WC` int(2) DEFAULT NULL,
  `P_Estacionamiento` int(2) DEFAULT NULL,
  `P_Creado` date DEFAULT NULL,
  `P_VId` int(11) NOT NULL,
  PRIMARY KEY (`P_Id`),
  KEY `P_VId` (`P_VId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla bienes.vendedores
DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `V_Id` int(11) NOT NULL AUTO_INCREMENT,
  `V_Nombre` varchar(45) DEFAULT NULL,
  `V_Apellido` varchar(45) DEFAULT NULL,
  `V_Telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`V_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
