-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2014 a las 17:20:44
-- Versión del servidor: 5.5.32-cll-lve
-- Versión de PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `javiobhr_claritadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_carro`
--

CREATE TABLE IF NOT EXISTS `cl_carro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa_delantera` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `placa_lateral` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cl_carro`
--

INSERT INTO `cl_carro` (`id`, `placa_delantera`, `placa_lateral`, `modelo`, `marca`) VALUES
(1, 'T3C-831', 'ZD-1244', 'M2 112', 'FREIGHTLINER '),
(2, 'YD-3658', 'ZD-3436', 'CULUMBIA', 'FREIGHTLINER '),
(3, 'A4M-809', 'ZD-5552', 'F12', 'VOLVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_id_link`
--

CREATE TABLE IF NOT EXISTS `cl_id_link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `href` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_link`
--

CREATE TABLE IF NOT EXISTS `cl_link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `href` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cl_link`
--

INSERT INTO `cl_link` (`id_link`, `href`, `titulo`) VALUES
(1, 'controllers/controllerUsuario.php?accion=asignar-ruta', 'asignar Ruta'),
(2, 'controllers/controllerUsuario.php?accion=rastreo-satelital', 'Rastreo Satelital'),
(3, 'controllers/controllerUsuario.php?accion=flota', 'Ver Flota'),
(4, 'http://localhost:82/tesis/controllers/controllerUsuario.php?accion=usuarios', 'Ver Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_menu`
--

CREATE TABLE IF NOT EXISTS `cl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `id_link` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cl_menu`
--

INSERT INTO `cl_menu` (`id_menu`, `id_tipo`, `id_link`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_ruta`
--

CREATE TABLE IF NOT EXISTS `cl_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cl_carro` int(11) NOT NULL,
  `id_cl_user` int(11) NOT NULL,
  `punto_llegada` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `punto_inicio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cl_ruta`
--

INSERT INTO `cl_ruta` (`id`, `fecha`, `id_cl_carro`, `id_cl_user`, `punto_llegada`, `punto_inicio`) VALUES
(3, '12/12/2013', 1, 1, '-5.660811814003982, -78.7994384765625', '-5.710094,-78.802894'),
(4, '12/12/2013', 1, 1, '-5.895817510555246, -78.23089599609375', '-5.710094,-78.802894'),
(5, '12/12/2013', 2, 1, '-6.788989426859401, -79.7882080078125', '-5.710094,-78.802894'),
(6, '27/1/2014', 3, 2, '-4.872047700241915, -80.66436767578125', '-5.710094,-78.802894');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_tipo`
--

CREATE TABLE IF NOT EXISTS `cl_tipo` (
  `id_tipo_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cl_tipo`
--

INSERT INTO `cl_tipo` (`id_tipo_user`, `nombre`, `descripcion`, `id_menu`) VALUES
(1, 'administrador', 'Este tipo de usuario tiene acceso total al sistema', 0),
(2, 'cliente', 'este tipo de  usuario solo puede consultar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_ubicacion`
--

CREATE TABLE IF NOT EXISTS `cl_ubicacion` (
  `id_cl_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_carro` int(11) NOT NULL,
  `lat` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `lng` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_cl_ubicacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `cl_ubicacion`
--

INSERT INTO `cl_ubicacion` (`id_cl_ubicacion`, `id_carro`, `lat`, `lng`) VALUES
(15, 1, '-6.7596175999999994', '-79.8599909'),
(16, 1, '-6.760340500000001', '-79.8631439'),
(17, 1, '-6.7602923', '-79.8630988'),
(18, 1, '-6.759582099999999', '-79.859822'),
(19, 1, '43.465187', '-80.522372'),
(20, 1, '43.465187', '-80.522372'),
(21, 1, '-2.766285024482305', '-82.87868189074531');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_ubicacion_vitacora`
--

CREATE TABLE IF NOT EXISTS `cl_ubicacion_vitacora` (
  `id_ubicacion_vitacora` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY (`id_ubicacion_vitacora`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cl_ubicacion_vitacora`
--

INSERT INTO `cl_ubicacion_vitacora` (`id_ubicacion_vitacora`, `lat`, `lng`) VALUES
(1, -6.76295, -79.8376);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_user`
--

CREATE TABLE IF NOT EXISTS `cl_user` (
  `id_cl_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_cl_user`),
  KEY `id_tipo_user` (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cl_user`
--

INSERT INTO `cl_user` (`id_cl_user`, `nombre`, `email`, `password`, `dni`, `id_tipo`) VALUES
(1, 'Walter Alvarado Guevara', 'walgue28@gmail.com', '123456', 71475355, 1),
(2, 'Juanito Perez Gutierrez', 'cliente@gmail.com', '123456', 47524289, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         