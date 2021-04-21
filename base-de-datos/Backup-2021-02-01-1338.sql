-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.23 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para practica1
DROP DATABASE IF EXISTS `practica1`;
CREATE DATABASE IF NOT EXISTS `practica1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `practica1`;

-- Volcando estructura para tabla practica1.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `prod_supplierID` tinyint(1) NOT NULL DEFAULT '0',
  `prod_name` varchar(20) NOT NULL,
  `prod_image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_marca` varchar(50) DEFAULT 'SIN  MARCA',
  `prod_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prod_description` varchar(500) DEFAULT 'SIN DESCRIPCION',
  `prod_category` varchar(50) DEFAULT 'SIN CATEGORIA',
  `prod_piceSell` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prod_piceBuy` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prod_discount` tinyint unsigned NOT NULL DEFAULT '0',
  `prod_estado` tinyint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`prod_id`),
  KEY `prod_supplierID` (`prod_supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla practica1.products: ~25 rows (aproximadamente)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`prod_id`, `prod_supplierID`, `prod_name`, `prod_image`, `prod_marca`, `prod_type`, `prod_description`, `prod_category`, `prod_piceSell`, `prod_piceBuy`, `prod_discount`, `prod_estado`) VALUES
	(1, 0, 'DEPORTIVOS ', 'PRODUCTS/VESTUARIO/1-DEPORTIVOS-ADIDAS.jpg', 'ADIDAS', 'ZAPATO', 'Zapatos adidas gris con negro, ideal para correr grandes areas', 'VESTUARIO', 200.00, 130.00, 0, 1),
	(2, 0, 'MARTILLO ', 'PRODUCTS/CONSTRUCCION/2-MARTILLO-HIERRO_AG.png', 'HIERRO AG', 'MARTILLO', 'martillo mediano con mango de madera y cabeza inoccidable', 'CONSTRUCCION', 60.75, 55.00, 10, 1),
	(3, 0, 'UNIVERSITARIO', 'PRODUCTS/EDUCACION/3-UNIVERSITARIO-EXITO.jpg', 'EXITO', 'CUADERNO', 'cuaderno, grande con mas de 100hojas', 'EDUCACION', 30.00, 27.00, 5, 1),
	(4, 0, 'CAMISA NEGRA', 'PRODUCTS/VESTUARIO/4-CAMISA_NEGRA-ESTILO.jpg', 'ESTILO', 'CAMISA', 'camisa negra de algodon', 'VESTUARIO', 70.00, 50.45, 10, 1),
	(5, 0, 'TALADRO', 'PRODUCTS/CONSTRUCCION/5-TALADRO-PRETUL.jpg', 'PRETUL', 'TALADRO', 'Taladro de la marca PRETUL, con una vateria mas potente', 'CONSTRUCCION', 350.00, 300.00, 3, 1),
	(6, 0, 'METRO', 'PRODUCTS/CONSTRUCCION/6-METRO-PRETUL.jpg', 'PRETUL', 'METRO', 'Metro de 5 metros', 'CONSTRUCCION', 5.00, 7.00, 0, 1),
	(7, 0, 'PULIDORA', 'PRODUCTS/CONSTRUCCION/7-PULIDORA-TRUPPER.jpg', 'TRUPPER', 'PULIDORA', 'Pulidora de la marca Trupper ', 'CONSTRUCCION', 400.00, 320.00, 7, 1),
	(8, 0, 'PULIDORA', 'PRODUCTS/CONSTRUCCION/8-PULIDORA-STANLEY.jpg', 'STANLEY', 'PULIDORA', 'Pulidora de disco marca Stanley', 'CONSTRUCCION', 375.00, 220.00, 15, 1),
	(9, 0, 'PINZAS', 'PRODUCTS/CONSTRUCCION/9-PINZAS-STANLEY.jpg', 'STANLEY', 'PINZAS', 'Pinzas, para electricista', 'CONSTRUCCION', 5.00, 3.50, 0, 1),
	(10, 0, 'ALICATE', 'PRODUCTS/CONSTRUCCION/10-ALICATE-STANLEY.jpg', 'STANLEY', 'ALICATE', 'Alicate mediano de la marca Stanley', 'CONSTRUCCION', 7.50, 5.00, 0, 1),
	(11, 0, 'ESCALERA', 'PRODUCTS/CONSTRUCCION/11-ESCALERA-WORHAN.jpg', 'WORHAN', 'SCALERA', 'scalera grande con doble soporte', 'CONSTRUCCION', 175.00, 130.00, 7, 1),
	(12, 0, 'ESCALERA', 'PRODUCTS/CONSTRUCCION/12-ESCALETA-PRETUL.png', 'PRETUL', 'SCALERA', 'scalera simple', 'CONSTRUCCION', 120.00, 100.00, 0, 1),
	(13, 0, 'CAMISA AZUL', 'PRODUCTS/VESTUARIO/13-CAMISA_AZUL-ZHARA.jpg', 'ZHARA', 'CAMISA', 'Camisa de lona ', 'VESTUARIO', 325.00, 250.00, 12, 1),
	(14, 0, 'CAMISA TURQUESA', 'PRODUCTS/VESTUARIO/14-CAMISA_TURQUESA-ZHARA.jpg', 'ZHARA', 'CAMISA', 'Camisa zhara con border azul', 'VESTUARIO', 270.00, 175.00, 15, 1),
	(15, 0, 'CAMISA BLANCA', 'PRODUCTS/VESTUARIO/15-CAMISA_BLANCA-JEANS.jpg', 'JEANS', 'CAMISA', 'Camisa de ceda blanca', 'VESTUARIO', 532.00, 325.00, 10, 1),
	(16, 0, 'BLUSA AMARILLA', 'PRODUCTS/VESTUARIO/16-BLUSA_AMARILLA-JEANS.jpg', 'JEANS', 'BLUSA', 'blusa color amarillo ', 'VESTUARIO', 75.00, 50.00, 3, 1),
	(17, 0, 'PLAYERA ', 'PRODUCTS/VESTUARIO/17-PLAYERA_CELESTE-JEANS.jpg', 'JEANS', 'PLAYERA', 'playera de dama celeste', 'VESTUARIO', 65.00, 50.00, 0, 1),
	(18, 0, 'SUDADERO LILA', 'PRODUCTS/VESTUARIO/18-SUDARERO_LILA-NIKE.jpg', 'NIKE', 'SUDADERO', 'Sudadero de marca nike mediano', 'VESTUARIO', 150.00, 100.00, 4, 1),
	(19, 0, 'IPHONE 11', 'PRODUCTS/CELULAR/19-IPHONE_11-APPLE.jpg', 'APPLE', 'IPHONE', '!nuevo Iphone 11 con 30G de almacenamiento', 'CELULAR', 8350.00, 6500.00, 3, 1),
	(20, 0, 'IPHONE 11 PRO', 'PRODUCTS/CELULAR/20-IPHONE_11_PRO-APPLE.jpg', 'APPLE', 'IPHONE', 'El Iphone 11 pro, con una super camara', 'CELULAR', 9750.00, 7000.00, 10, 1),
	(21, 0, 'IPHONE 7', 'PRODUCTS/CELULAR/21-IPHONE_7-APPLE.jpg', 'APPLE', 'IPHONE', 'El IPhone 7 con gran almacenamiento gracias a su memoria de 32G', 'CELULAR', 6350.00, 5000.00, 0, 1),
	(22, 0, 'GALAXY S8', 'PRODUCTS/CELULAR/22-GALAXY_S8-GALAXY.jpg', 'SAMSUNG', 'GALAXY', 'Nuevo galaxy s8 con con una camara frontal de 16mpx', 'CELULAR', 7234.00, 4300.00, 10, 1),
	(23, 0, 'GALAXY S9', 'PRODUCTS/CELULAR/23-GALAXY_S9-GALAXY.jpg', 'SAMSUNG', 'GALAXY', 'Nuevo modelo del galaxy s9', 'CELULAR', 9350.00, 7300.00, 0, 1),
	(24, 0, 'GALAXY S21 ULTRA', 'PRODUCTS/CELULAR/23-GALAXY_S21_ULTRA-GALAXY.jpg', 'SAMSUNG', 'GALAXY', 'EL nuevo Galaxy s21 el mejor celucar de samsung', 'CELULAR', 14523.23, 10000.00, 5, 1),
	(25, 0, 'ZAPATOS NIKE', 'PRODUCTS/VESTUARIO/25-ZAPATOS_NIKE.jpg', 'NIKE', 'ZAPATO', 'El nuevos zapato nike con correas auto ajustables', 'VESTUARIO', 725.00, 600.00, 0, 1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla practica1.sales
DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sal_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `sal_date` datetime NOT NULL,
  `sal_userID` tinyint unsigned NOT NULL DEFAULT '0',
  `sal_ahorra` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sal_neto` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sal_IVA` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sal_Total` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`sal_id`),
  KEY `sal_userID` (`sal_userID`),
  CONSTRAINT `FK_sales_Users` FOREIGN KEY (`sal_userID`) REFERENCES `users` (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla practica1.sales: ~21 rows (aproximadamente)
DELETE FROM `sales`;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`sal_id`, `sal_date`, `sal_userID`, `sal_ahorra`, `sal_neto`, `sal_IVA`, `sal_Total`) VALUES
	(1, '2021-04-13 17:20:31', 4, 7.58, 252.83, 63.48, 316.31),
	(2, '2021-04-13 17:31:21', 4, 20.08, 875.60, 137.93, 1013.53),
	(3, '2021-04-13 17:38:38', 4, 28.00, 225.00, 27.00, 252.00),
	(4, '2021-04-13 17:49:29', 4, 6.08, 48.82, 5.86, 54.68),
	(5, '2021-04-13 18:32:24', 4, 7.58, 252.83, 63.48, 316.31),
	(6, '2021-04-15 13:37:33', 4, 7.58, 1502.83, 529.06, 2031.89),
	(7, '2021-04-16 19:12:07', 4, 0.00, 178.57, 21.43, 200.00),
	(8, '2021-04-16 19:14:35', 4, 7.00, 56.25, 6.75, 63.00),
	(9, '2021-04-17 18:31:57', 7, 7.58, 788.55, 186.45, 975.00),
	(10, '2021-04-17 18:43:10', 1, 0.00, 357.14, 42.86, 400.00),
	(11, '2021-04-17 18:45:33', 1, 8.50, 795.98, 273.70, 1069.68),
	(12, '2021-04-19 11:57:40', 1, 6.08, 227.39, 33.14, 260.53),
	(13, '2021-04-19 19:10:13', 1, 50.75, 8.93, 1.07, 10.00),
	(14, '2021-04-19 22:22:08', 1, 200.00, 0.00, 0.00, 0.00),
	(15, '2021-04-19 22:29:47', 1, 0.00, 178.57, 21.43, 200.00),
	(16, '2021-04-20 12:50:06', 8, 0.00, 178.57, 21.43, 200.00),
	(17, '2021-04-20 16:19:25', 1, 61.75, 703.79, 174.64, 878.43),
	(18, '2021-04-20 16:24:22', 1, 28.00, 332.14, 39.86, 372.00),
	(19, '2021-04-21 16:46:50', 1, 726.16, 12318.81, 1478.26, 13797.07),
	(20, '2021-04-21 17:21:30', 1, 257.87, 2661.50, 778.00, 3439.50),
	(21, '2021-04-21 17:44:56', 1, 0.00, 6.70, 0.80, 7.50);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Volcando estructura para tabla practica1.sale_detail
DROP TABLE IF EXISTS `sale_detail`;
CREATE TABLE IF NOT EXISTS `sale_detail` (
  `det_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `det_PrdId` tinyint unsigned NOT NULL DEFAULT '0',
  `det_SaleID` tinyint unsigned NOT NULL,
  `det_PreciSale` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `det_PreciBuy` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `det_Quantity` tinyint unsigned NOT NULL DEFAULT '0',
  `det_Discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`det_id`),
  KEY `det_PrdId` (`det_PrdId`),
  KEY `det_SaleID` (`det_SaleID`),
  CONSTRAINT `FK_details_Products` FOREIGN KEY (`det_PrdId`) REFERENCES `products` (`prod_id`),
  CONSTRAINT `FK_details_sales` FOREIGN KEY (`det_SaleID`) REFERENCES `sales` (`sal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla practica1.sale_detail: ~39 rows (aproximadamente)
DELETE FROM `sale_detail`;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
INSERT INTO `sale_detail` (`det_id`, `det_PrdId`, `det_SaleID`, `det_PreciSale`, `det_PreciBuy`, `det_Quantity`, `det_Discount`) VALUES
	(1, 2, 1, 60.75, 55.00, 1, 6.00),
	(2, 1, 1, 200.00, 130.00, 1, 0.00),
	(3, 3, 1, 30.00, 27.00, 1, 2.00),
	(4, 4, 2, 70.00, 50.45, 2, 14.00),
	(5, 2, 2, 60.75, 55.00, 1, 6.00),
	(6, 1, 2, 200.00, 130.00, 3, 0.00),
	(7, 4, 3, 70.00, 50.45, 3, 28.00),
	(8, 2, 4, 60.75, 55.00, 1, 6.00),
	(9, 2, 5, 60.75, 55.00, 1, 6.00),
	(10, 1, 5, 200.00, 130.00, 1, 0.00),
	(11, 3, 5, 30.00, 27.00, 1, 2.00),
	(12, 1, 6, 200.00, 130.00, 4, 0.00),
	(13, 2, 6, 60.75, 55.00, 1, 6.08),
	(14, 3, 6, 30.00, 27.00, 1, 1.50),
	(15, 1, 7, 200.00, 130.00, 1, 0.00),
	(16, 4, 8, 70.00, 50.45, 1, 7.00),
	(17, 3, 9, 30.00, 27.00, 1, 1.50),
	(18, 1, 9, 200.00, 130.00, 3, 0.00),
	(19, 2, 9, 60.75, 55.00, 1, 6.08),
	(20, 1, 10, 200.00, 130.00, 2, 0.00),
	(21, 1, 11, 200.00, 130.00, 3, 0.00),
	(22, 4, 11, 70.00, 50.45, 1, 7.00),
	(23, 3, 11, 30.00, 27.00, 1, 1.50),
	(24, 2, 12, 60.75, 55.00, 1, 6.08),
	(25, 1, 12, 200.00, 130.00, 1, 0.00),
	(26, 2, 13, 60.75, 55.00, 1, 50.75),
	(27, 1, 14, 200.00, 130.00, 1, 200.00),
	(28, 1, 15, 200.00, 130.00, 1, 0.00),
	(29, 1, 16, 200.00, 130.00, 1, 0.00),
	(30, 5, 17, 350.00, 300.00, 1, 10.50),
	(31, 11, 17, 175.00, 130.00, 1, 12.25),
	(32, 13, 17, 325.00, 250.00, 1, 39.00),
	(33, 7, 18, 400.00, 320.00, 1, 28.00),
	(34, 24, 19, 14523.23, 10000.00, 1, 726.16),
	(35, 2, 20, 60.75, 55.00, 1, 6.08),
	(36, 15, 20, 532.00, 325.00, 3, 212.80),
	(37, 13, 20, 325.00, 250.00, 1, 39.00),
	(38, 25, 20, 725.00, 600.00, 1, 0.00),
	(39, 10, 21, 7.50, 5.00, 1, 0.00);
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;

-- Volcando estructura para tabla practica1.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usr_surname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `usr_email` varchar(50) NOT NULL,
  `usr_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default/usuario.jpg',
  `usr_type` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `usr_password` char(8) NOT NULL,
  `usr_estado` tinyint unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabla de usuarios';

-- Volcando datos para la tabla practica1.users: ~12 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`usr_id`, `usr_name`, `usr_surname`, `usr_email`, `usr_image`, `usr_type`, `usr_password`, `usr_estado`) VALUES
	(1, 'AXEL', 'PAEZ', 'PAEZ@GMAIL.COM', 'usuarios/PAEZ@GMAIL.COM.jpeg', 'B', 'Axel1234', 1),
	(2, 'Leidi', 'Morales', 'LEIDI@GMAIL.COM', 'default/usuario.jpg', 'A', '1234', 1),
	(3, 'URIEL', 'PAEZ', 'URIEL@GMAIL.COM', 'default/usuario.jpg', NULL, '1234', 1),
	(4, 'PEREA', 'PAEZ', 'MORALES@GMAIL.COM', 'usuarios/MORALES@GMAIL.COM.jpeg', NULL, 'Paez1234', 1),
	(5, 'LEIDI', 'MORALES', 'LEIDIMORALEZ1996@GMAIL.COM', 'default/usuario.jpg', NULL, 'LEIDI123', 1),
	(6, 'IVAN', 'STROVOGAR', 'PAEZZ@GMAIL.COM', 'default/usuario.jpg', NULL, 'IVAN1234', 1),
	(7, 'BOCINAS', 'STROVOGAR', 'BOCINAS@GMAIL.COM', 'usuarios/BOCINAS@GMAIL.COM.jpeg', NULL, 'AXEL1234', 1),
	(8, 'GABRIEL SEBASTIAN', 'PAEZ', 'GABRIEL@GMAIL.COM', 'usuarios/GABRIEL@GMAIL.COM.jpeg', NULL, 'AXEL1234', 1),
	(9, 'AXEL', 'PAEZ', 'APAEZB@MIUMG.EDU.GT', 'default/usuario.jpg', NULL, 'AXEL1234', 1),
	(10, 'AXEL', 'PAEZ BARRERA', 'PAEZBARREA@GMAIL.COM', 'default/usuario.jpg', NULL, 'AXEL1234', 1),
	(11, 'PRUEBA', 'APELLIDO', 'PRUEVA@GMAIL.COM', 'default/usuario.jpg', NULL, 'ESTUDIA1', 1),
	(12, 'PRUEBA', 'APELLDUO', 'PRUEVA2@GMAIL.COM', 'default/usuario.jpg', NULL, 'PAEZ1234', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
