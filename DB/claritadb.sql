-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 14, 2014 at 07:31 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `claritadb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_carro`
-- 

CREATE TABLE `cl_carro` (
  `id` int(11) NOT NULL auto_increment,
  `placa_delantera` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `placa_lateral` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `modelo` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `marca` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `ubicacion` varchar(200) collate utf8_spanish2_ci default NULL,
  `kilometraje` varchar(200) collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `cl_carro`
-- 

INSERT INTO `cl_carro` VALUES (1, 'T3C-831', 'ZD-1244', 'M2 112', 'FREIGHTLINER ', '-5.712890582215703, -78.80160838365555', '1000');
INSERT INTO `cl_carro` VALUES (2, 'YD-3658', 'ZD-3436', 'CULUMBIA', 'FREIGHTLINER ', '-5.712890582215703, -78.80160838365555', '2000');
INSERT INTO `cl_carro` VALUES (3, 'A4M-809', 'ZD-5552', 'F12', 'VOLVO', '-5.712890582215703, -78.80160838365555', '3000');

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_id_link`
-- 

CREATE TABLE `cl_id_link` (
  `id_link` int(11) NOT NULL auto_increment,
  `tittle` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `href` varchar(200) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cl_id_link`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `cl_link`
-- 

CREATE TABLE `cl_link` (
  `id_link` int(11) NOT NULL auto_increment,
  `href` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  PRIMARY KEY  (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `cl_link`
-- 

INSERT INTO `cl_link` VALUES (1, 'controllers/controllerUsuario.php?accion=asignar-ruta', 'Asignar Ruta');
INSERT INTO `cl_link` VALUES (2, 'controllers/controllerUsuario.php?accion=rastreo-satelital', 'Rastreo Satelital');
INSERT INTO `cl_link` VALUES (3, 'controllers/controllerUsuario.php?accion=flota', 'Ver Flota');
INSERT INTO `cl_link` VALUES (4, 'controllers/controllerUsuario.php?accion=usuarios', 'Ver Usuarios');
INSERT INTO `cl_link` VALUES (5, 'controllers/controllerUsuario.php?accion=geo', 'Geolocalizacion');
INSERT INTO `cl_link` VALUES (6, 'controllers/controllerUsuario.php?accion=rastreoCliente', 'Rastreo Satelital');

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_menu`
-- 

CREATE TABLE `cl_menu` (
  `id_menu` int(11) NOT NULL auto_increment,
  `id_tipo` int(11) NOT NULL,
  `id_link` int(11) NOT NULL,
  PRIMARY KEY  (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `cl_menu`
-- 

INSERT INTO `cl_menu` VALUES (1, 1, 1);
INSERT INTO `cl_menu` VALUES (2, 1, 2);
INSERT INTO `cl_menu` VALUES (3, 1, 3);
INSERT INTO `cl_menu` VALUES (4, 1, 4);
INSERT INTO `cl_menu` VALUES (5, 3, 6);
INSERT INTO `cl_menu` VALUES (6, 2, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_ruta`
-- 

CREATE TABLE `cl_ruta` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `id_cl_carro` int(11) NOT NULL,
  `id_cl_user` int(11) NOT NULL,
  `lugar_salida` varchar(300) collate utf8_spanish2_ci default NULL,
  `lugar_llegada` varchar(300) collate utf8_spanish2_ci default NULL,
  `distancia` varchar(300) collate utf8_spanish2_ci default NULL,
  `tiempo` varchar(300) collate utf8_spanish2_ci default NULL,
  `punto_llegada` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `punto_inicio` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `carga` varchar(200) collate utf8_spanish2_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `cl_ruta`
-- 

INSERT INTO `cl_ruta` VALUES (11, '2014-02-21', 1, 1, 'JaÃ©n, PerÃº', 'Panamericana Norte, PerÃº', '278 km', '3h 50 min', '-6.817352822622144, -79.8321533203125', '-5.7362428668801515, -78.7664794921875', '300');

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_tipo`
-- 

CREATE TABLE `cl_tipo` (
  `id_tipo_user` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY  (`id_tipo_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `cl_tipo`
-- 

INSERT INTO `cl_tipo` VALUES (1, 'administrador', 'Este tipo de usuario tiene acceso total al sistema', 0);
INSERT INTO `cl_tipo` VALUES (2, 'carro', 'este usuario solo envia sus coordenadas', 0);
INSERT INTO `cl_tipo` VALUES (3, 'Cliente', 'Por los dueños del carro', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_ubicacion`
-- 

CREATE TABLE `cl_ubicacion` (
  `id_cl_ubicacion` int(11) NOT NULL auto_increment,
  `id_carro` int(11) NOT NULL,
  `lat` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `lng` varchar(200) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_cl_ubicacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `cl_ubicacion`
-- 

INSERT INTO `cl_ubicacion` VALUES (38, 1, '-6.7595963', '-79.86002529999999');
INSERT INTO `cl_ubicacion` VALUES (37, 1, '-6.7608730999999995', '-79.8637133');
INSERT INTO `cl_ubicacion` VALUES (36, 1, '-6.759609299999999', '-79.8600307');
INSERT INTO `cl_ubicacion` VALUES (35, 1, '-6.759609299999999', '-79.8600307');
INSERT INTO `cl_ubicacion` VALUES (34, 1, '-6.759609299999999', '-79.8600307');
INSERT INTO `cl_ubicacion` VALUES (33, 1, '-6.759609299999999', '-79.8600307');

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_ubicacion_vitacora`
-- 

CREATE TABLE `cl_ubicacion_vitacora` (
  `id_ubicacion_vitacora` int(11) NOT NULL auto_increment,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY  (`id_ubicacion_vitacora`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `cl_ubicacion_vitacora`
-- 

INSERT INTO `cl_ubicacion_vitacora` VALUES (1, -6.76295, -79.8376);

-- --------------------------------------------------------

-- 
-- Table structure for table `cl_user`
-- 

CREATE TABLE `cl_user` (
  `id_cl_user` int(11) NOT NULL auto_increment,
  `nombre` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `email` varchar(200) collate utf8_spanish2_ci NOT NULL,
  `password` varchar(150) collate utf8_spanish2_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY  (`id_cl_user`),
  KEY `id_tipo_user` (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `cl_user`
-- 

INSERT INTO `cl_user` VALUES (1, 'Walter', 'walgue28@gmail.com', '123456', 71475355, 1);
INSERT INTO `cl_user` VALUES (2, 'Juanito Perez Gutierrez', 'cliente@gmail.com', '123456', 47524289, 2);
INSERT INTO `cl_user` VALUES (3, 'Propietario jose', 'propietario@gmail.com', '123456', 45789685, 3);
INSERT INTO `cl_user` VALUES (4, 'juanito Perez', 'test@gmail.com', '123456', 47524236, 2);
