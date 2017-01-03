-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2016 a las 11:17:47
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inve_movil`
--
CREATE DATABASE `inve_movil` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inve_movil`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE IF NOT EXISTS `activo` (
  `cons` int(10) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `sede` int(3) NOT NULL,
  `estado` int(3) NOT NULL,
  `usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `activo`
--

INSERT INTO `activo` (`cons`, `descripcion`, `codigo`, `sede`, `estado`, `usuario`) VALUES
(1, 'COMPUTADOR TODO EN UNO COLOR BLANCO', '140030001', 1, 1, 4515182),
(2, 'IMPRESORA EPSON L-800', '140030002', 1, 1, 4515182),
(3, 'UPS OCM DE 10 KVA', '140030003', 1, 1, 4515182),
(4, 'MICROSERVER HP (TELEFONOS)', '140030004', 1, 1, 4515182),
(5, 'SWICH HP ADMINISTRABLES', '140030005', 1, 1, 4515182),
(6, 'SWICH HP ADMINISTRABLES', '140030006', 1, 1, 4515182),
(7, 'SWICH HP ADMINISTRABLES', '140030007', 1, 1, 4515182),
(8, 'RACK DE COMUNICACIONES', '140030008', 1, 1, 4515182),
(9, 'RACK DE COMUNICACIONES', '140030009', 1, 1, 4515182),
(10, 'AIRE ACONDICIONADO LG', '140010001', 1, 1, 4515182),
(11, 'SERVIDOR HP INTERNO', '140030010', 1, 1, 4515182),
(12, 'SERVIDORES CLON', '140030011', 1, 1, 4515182),
(13, 'SERVIDORES CLON', '140030012', 1, 1, 4515182),
(14, 'MONITORES PARA COMPUTADOR', '140030013', 1, 1, 4515182),
(15, 'MONITORES PARA COMPUTADOR', '140030014', 1, 1, 4515182),
(16, 'MONITORES PARA COMPUTADOR', '140030015', 1, 1, 4515182),
(17, 'ESCRITORIO EN MADERA DE 3 CAJONES', '140020001', 1, 1, 4515182),
(18, 'MESA AUXILIAR PARA IMPRESORA', '140020002', 1, 1, 4515182),
(19, 'MUEBLE DE ENTREPA?O COLOR VERDE', '140020003', 1, 1, 4515182),
(20, 'SILLA CON BRAZOS GIRATORIA', '140020004', 1, 1, 4515182),
(21, 'ARCHIVADOR DE PARED', '140020005', 1, 1, 4515182),
(22, 'TABLERO BORRABLE', '140020006', 1, 1, 4515182),
(23, 'DVR EVERFOCUS', '140030016', 1, 1, 4515182),
(24, 'CAJONERO METALICO', '140020007', 1, 2, 4515182),
(25, 'CAJONERO EN MADERA', '140020008', 1, 2, 4515182),
(26, 'COMPUTADOR PORTATIL ASUS', '140030017', 1, 1, 4515182),
(27, 'COMPUTADOR PORTATIL LENOVO', '140030018', 1, 1, 4515182),
(28, 'ESCRITORIO PARA COMPUTAADOR EN MADERA', '140020009', 1, 1, 4515182),
(29, 'CAJA FUERTE', '140020010', 1, 1, 4515182),
(30, 'DVR ON VISION 16 CH', '140030019', 1, 1, 4515182),
(31, 'DVR HIK VISION DE 8 CANALES', '140030020', 2, 1, 4515182),
(32, 'SWICH HP ADMINISTRABLES', '140030021', 2, 1, 4515182),
(33, 'SWICH QUIDWAY S-2300', '140030022', 2, 1, 4515182),
(34, 'COMPUTADOR HP DE ESCRITORIO', '140030023', 2, 1, 4515182),
(35, 'COMPUTADOR PORTATIL LENOVO', '140030024', 2, 1, 4515182),
(36, 'UPS COLOR NEGRO', '140030025', 2, 1, 4515182),
(37, 'TABLERO BORRABLE', '140020011', 2, 1, 4515182),
(38, 'ECRITORIO EN MADERA DE 3 CAJONES', '140020012', 2, 1, 4515182),
(39, 'SILLA CON BRAZOS GIRATORIA', '140020013', 2, 1, 4515182),
(40, 'SILLAS SIN BRAZOS', '140020014', 2, 1, 4515182),
(41, 'COMPUTADOR PORTATIL HP PAVILON', '140030026', 2, 1, 4515182),
(42, 'SERVIDOR CLON', '140030027', 2, 1, 4515182);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE IF NOT EXISTS `dependencia` (
  `cons` int(2) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`cons`, `descripcion`) VALUES
(1, 'Sistemas'),
(2, 'Presidencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_activo`
--

CREATE TABLE IF NOT EXISTS `estado_activo` (
  `cons` int(2) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `estado_activo`
--

INSERT INTO `estado_activo` (`cons`, `descripcion`) VALUES
(1, 'Bueno'),
(2, 'Regular'),
(3, 'Malo'),
(4, 'De baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `cons` int(3) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`cons`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Estandard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `cons` int(2) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sede`
--

INSERT INTO `sede` (`cons`, `descripcion`) VALUES
(1, 'Sede Principal'),
(2, 'Sede Centro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cons` int(4) NOT NULL,
  `id` varchar(20) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `dependencia` int(3) NOT NULL,
  `perfil` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cons`, `id`, `passwd`, `nombre`, `dependencia`, `perfil`) VALUES
(1, '4515182', '20053110', 'CESAR STEVEN MORENO RODRIGUEZ', 1, 1),
(2, '123', '123', 'Pruebas', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valida_inventario`
--

CREATE TABLE IF NOT EXISTS `valida_inventario` (
  `cod_activo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `valida_inventario`
--

