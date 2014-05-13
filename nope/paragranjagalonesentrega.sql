-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2014 a las 00:10:19
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `baocomve_granjagalpones`
--
CREATE DATABASE IF NOT EXISTS `baocomve_granjagalpones` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `baocomve_granjagalpones`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 278),
(2, 1, NULL, NULL, 'Bancos', 2, 17),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'logout', 13, 14),
(9, 1, NULL, NULL, 'Capitals', 18, 31),
(10, 9, NULL, NULL, 'index', 19, 20),
(11, 9, NULL, NULL, 'view', 21, 22),
(12, 9, NULL, NULL, 'add', 23, 24),
(13, 9, NULL, NULL, 'edit', 25, 26),
(14, 9, NULL, NULL, 'delete', 27, 28),
(15, 9, NULL, NULL, 'logout', 29, 30),
(16, 1, NULL, NULL, 'ChequeEstadocheques', 32, 47),
(17, 16, NULL, NULL, 'index', 33, 34),
(18, 16, NULL, NULL, 'view', 35, 36),
(19, 16, NULL, NULL, 'add', 37, 38),
(20, 16, NULL, NULL, 'edit', 39, 40),
(21, 16, NULL, NULL, 'delete', 41, 42),
(22, 16, NULL, NULL, 'logout', 43, 44),
(23, 1, NULL, NULL, 'Chequeinterese', 48, 61),
(24, 23, NULL, NULL, 'index', 49, 50),
(25, 23, NULL, NULL, 'view', 51, 52),
(26, 23, NULL, NULL, 'add', 53, 54),
(27, 23, NULL, NULL, 'edit', 55, 56),
(28, 23, NULL, NULL, 'delete', 57, 58),
(29, 23, NULL, NULL, 'logout', 59, 60),
(30, 1, NULL, NULL, 'Cheques', 62, 107),
(31, 30, NULL, NULL, 'index', 63, 64),
(32, 30, NULL, NULL, 'index2', 65, 66),
(33, 30, NULL, NULL, 'devueltos', 67, 68),
(34, 30, NULL, NULL, 'postdatados', 69, 70),
(35, 30, NULL, NULL, 'view', 71, 72),
(36, 30, NULL, NULL, 'add2', 73, 74),
(37, 30, NULL, NULL, 'add', 75, 76),
(38, 30, NULL, NULL, 'editadevuelto', 77, 78),
(39, 30, NULL, NULL, 'edit', 79, 80),
(40, 30, NULL, NULL, 'delete', 81, 82),
(41, 30, NULL, NULL, 'logout', 83, 84),
(42, 1, NULL, NULL, 'Clientes', 108, 121),
(43, 42, NULL, NULL, 'index', 109, 110),
(44, 42, NULL, NULL, 'view', 111, 112),
(45, 42, NULL, NULL, 'add', 113, 114),
(46, 42, NULL, NULL, 'edit', 115, 116),
(47, 42, NULL, NULL, 'delete', 117, 118),
(48, 42, NULL, NULL, 'logout', 119, 120),
(49, 1, NULL, NULL, 'Cuentas', 122, 135),
(50, 49, NULL, NULL, 'index', 123, 124),
(51, 49, NULL, NULL, 'view', 125, 126),
(52, 49, NULL, NULL, 'add', 127, 128),
(53, 49, NULL, NULL, 'edit', 129, 130),
(54, 49, NULL, NULL, 'delete', 131, 132),
(55, 49, NULL, NULL, 'logout', 133, 134),
(56, 1, NULL, NULL, 'Estadocheques', 136, 149),
(57, 56, NULL, NULL, 'index', 137, 138),
(58, 56, NULL, NULL, 'view', 139, 140),
(59, 56, NULL, NULL, 'add', 141, 142),
(60, 56, NULL, NULL, 'edit', 143, 144),
(61, 56, NULL, NULL, 'delete', 145, 146),
(62, 56, NULL, NULL, 'logout', 147, 148),
(63, 1, NULL, NULL, 'Gestiondecobranzas', 150, 163),
(64, 63, NULL, NULL, 'index', 151, 152),
(65, 63, NULL, NULL, 'view', 153, 154),
(66, 63, NULL, NULL, 'add', 155, 156),
(67, 63, NULL, NULL, 'edit', 157, 158),
(68, 63, NULL, NULL, 'delete', 159, 160),
(69, 63, NULL, NULL, 'logout', 161, 162),
(70, 1, NULL, NULL, 'Interese', 164, 177),
(71, 70, NULL, NULL, 'index', 165, 166),
(72, 70, NULL, NULL, 'view', 167, 168),
(73, 70, NULL, NULL, 'add', 169, 170),
(74, 70, NULL, NULL, 'edit', 171, 172),
(75, 70, NULL, NULL, 'delete', 173, 174),
(76, 70, NULL, NULL, 'logout', 175, 176),
(77, 1, NULL, NULL, 'Pages', 178, 183),
(78, 77, NULL, NULL, 'display', 179, 180),
(79, 77, NULL, NULL, 'logout', 181, 182),
(80, 1, NULL, NULL, 'Pagos', 184, 197),
(81, 80, NULL, NULL, 'index', 185, 186),
(82, 80, NULL, NULL, 'view', 187, 188),
(83, 80, NULL, NULL, 'add', 189, 190),
(84, 80, NULL, NULL, 'edit', 191, 192),
(85, 80, NULL, NULL, 'delete', 193, 194),
(86, 80, NULL, NULL, 'logout', 195, 196),
(87, 1, NULL, NULL, 'Pagoterceros', 198, 211),
(88, 87, NULL, NULL, 'index', 199, 200),
(89, 87, NULL, NULL, 'view', 201, 202),
(90, 87, NULL, NULL, 'add', 203, 204),
(91, 87, NULL, NULL, 'edit', 205, 206),
(92, 87, NULL, NULL, 'delete', 207, 208),
(93, 87, NULL, NULL, 'logout', 209, 210),
(94, 1, NULL, NULL, 'Roles', 212, 225),
(95, 94, NULL, NULL, 'index', 213, 214),
(96, 94, NULL, NULL, 'view', 215, 216),
(97, 94, NULL, NULL, 'add', 217, 218),
(98, 94, NULL, NULL, 'edit', 219, 220),
(99, 94, NULL, NULL, 'delete', 221, 222),
(100, 94, NULL, NULL, 'logout', 223, 224),
(101, 1, NULL, NULL, 'Rols', 226, 239),
(102, 101, NULL, NULL, 'index', 227, 228),
(103, 101, NULL, NULL, 'view', 229, 230),
(104, 101, NULL, NULL, 'add', 231, 232),
(105, 101, NULL, NULL, 'edit', 233, 234),
(106, 101, NULL, NULL, 'delete', 235, 236),
(107, 101, NULL, NULL, 'logout', 237, 238),
(108, 1, NULL, NULL, 'Tipopagos', 240, 253),
(109, 108, NULL, NULL, 'index', 241, 242),
(110, 108, NULL, NULL, 'view', 243, 244),
(111, 108, NULL, NULL, 'add', 245, 246),
(112, 108, NULL, NULL, 'edit', 247, 248),
(113, 108, NULL, NULL, 'delete', 249, 250),
(114, 108, NULL, NULL, 'logout', 251, 252),
(115, 1, NULL, NULL, 'Users', 254, 271),
(116, 115, NULL, NULL, 'index', 255, 256),
(117, 115, NULL, NULL, 'login', 257, 258),
(118, 115, NULL, NULL, 'logout', 259, 260),
(119, 115, NULL, NULL, 'view', 261, 262),
(120, 115, NULL, NULL, 'add', 263, 264),
(121, 115, NULL, NULL, 'edit', 265, 266),
(122, 115, NULL, NULL, 'delete', 267, 268),
(123, 1, NULL, NULL, 'AclExtras', 272, 273),
(124, 1, NULL, NULL, 'Solointerese', 274, 277),
(125, 124, NULL, NULL, 'index', 275, 276),
(126, 30, NULL, NULL, 'reporteintereses', 85, 86),
(127, 30, NULL, NULL, 'reporteinteres', 87, 88),
(128, 16, NULL, NULL, 'add2', 45, 46),
(129, 30, NULL, NULL, 'aumentarinteres', 89, 90),
(130, 115, NULL, NULL, 'editpass', 269, 270),
(131, 30, NULL, NULL, 'delete2', 91, 92),
(132, 30, NULL, NULL, 'busca', 93, 94),
(133, 30, NULL, NULL, 'buscar', 95, 96),
(134, 30, NULL, NULL, 'buscarte', 97, 98),
(135, 30, NULL, NULL, 'delete3', 99, 100),
(136, 30, NULL, NULL, 'general', 101, 102),
(137, 30, NULL, NULL, 'relaciondia', 103, 104),
(138, 30, NULL, NULL, 'totalbanco', 105, 106),
(139, 2, NULL, NULL, 'totalbanco', 15, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 8),
(2, NULL, 'Role', 2, NULL, 9, 12),
(3, NULL, 'Role', 3, NULL, 13, 16),
(4, NULL, 'Role', 4, NULL, 17, 22),
(5, 1, 'User', 2, NULL, 2, 3),
(6, 1, 'User', 3, NULL, 4, 5),
(7, 1, 'User', 1, NULL, 6, 7),
(8, 4, 'User', 4, NULL, 18, 19),
(9, 2, 'User', 5, NULL, 10, 11),
(10, 4, 'User', 6, NULL, 20, 21),
(11, 3, 'User', 7, NULL, 14, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 30, '1', '1', '1', '1'),
(2, 1, 1, '1', '1', '1', '1'),
(3, 2, 31, '1', '1', '1', '1'),
(4, 2, 30, '1', '1', '1', '1'),
(5, 2, 40, '-1', '-1', '-1', '-1'),
(6, 3, 30, '1', '1', '1', '1'),
(7, 3, 40, '-1', '-1', '-1', '-1'),
(8, 3, 39, '-1', '-1', '-1', '-1'),
(9, 3, 38, '-1', '-1', '-1', '-1'),
(10, 1, 16, '1', '1', '1', '1'),
(11, 2, 19, '1', '1', '1', '1'),
(12, 2, 17, '1', '1', '1', '1'),
(13, 2, 18, '1', '1', '1', '1'),
(14, 2, 39, '-1', '-1', '-1', '-1'),
(15, 2, 83, '1', '1', '1', '1'),
(16, 2, 82, '1', '1', '1', '1'),
(17, 2, 90, '1', '1', '1', '1'),
(18, 2, 89, '1', '1', '1', '1'),
(19, 2, 42, '1', '1', '1', '1'),
(20, 2, 47, '-1', '-1', '-1', '-1'),
(21, 2, 70, '1', '1', '1', '1'),
(22, 2, 75, '-1', '-1', '-1', '-1'),
(23, 2, 2, '1', '1', '1', '1'),
(24, 2, 7, '-1', '-1', '-1', '-1'),
(25, 3, 45, '1', '1', '1', '1'),
(26, 3, 43, '1', '1', '1', '1'),
(27, 3, 46, '1', '1', '1', '1'),
(28, 3, 44, '1', '1', '1', '1'),
(29, 3, 31, '1', '1', '1', '1'),
(30, 3, 35, '1', '1', '1', '1'),
(31, 3, 37, '1', '1', '1', '1'),
(32, 3, 80, '1', '1', '1', '1'),
(33, 3, 84, '-1', '-1', '-1', '-1'),
(34, 3, 85, '-1', '-1', '-1', '-1'),
(35, 3, 87, '-1', '-1', '-1', '-1'),
(36, 3, 19, '1', '1', '1', '1'),
(37, 4, 42, '1', '1', '1', '1'),
(38, 4, 47, '-1', '-1', '-1', '-1'),
(39, 4, 35, '1', '1', '1', '1'),
(40, 4, 82, '1', '1', '1', '1'),
(41, 1, 124, '1', '1', '1', '1'),
(42, 1, 126, '1', '1', '1', '1'),
(43, 1, 127, '1', '1', '1', '1'),
(44, 1, 128, '1', '1', '1', '1'),
(45, 2, 128, '1', '1', '1', '1'),
(46, 3, 128, '1', '1', '1', '1'),
(47, 1, 130, '1', '1', '1', '1'),
(48, 1, 131, '1', '1', '1', '1'),
(49, 1, 132, '1', '1', '1', '1'),
(50, 2, 132, '1', '1', '1', '1'),
(51, 3, 132, '1', '1', '1', '1'),
(52, 1, 133, '1', '1', '1', '1'),
(53, 2, 133, '1', '1', '1', '1'),
(54, 3, 133, '1', '1', '1', '1'),
(55, 4, 133, '1', '1', '1', '1'),
(56, 1, 134, '1', '1', '1', '1'),
(57, 2, 134, '1', '1', '1', '1'),
(58, 3, 134, '1', '1', '1', '1'),
(59, 4, 134, '1', '1', '1', '1'),
(60, 1, 135, '1', '1', '1', '1'),
(61, 2, 135, '1', '1', '1', '1'),
(62, 3, 135, '1', '1', '1', '1'),
(63, 4, 135, '1', '1', '1', '1'),
(64, 2, 49, '1', '1', '1', '1'),
(65, 4, 31, '1', '1', '1', '1'),
(66, 4, 37, '-1', '-1', '-1', '-1'),
(67, 4, 30, '-1', '-1', '-1', '-1'),
(68, 4, 136, '1', '1', '1', '1'),
(69, 4, 137, '1', '1', '1', '1'),
(70, 1, 138, '1', '1', '1', '1'),
(71, 1, 139, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banco_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `codigo`, `nombre`, `descripcion`, `user_id`) VALUES
(2, '0105', 'Mercantil', 'Sambil', 1),
(3, '0108', 'Provincial', '', 1),
(4, '0114', 'Caribe', '', 1),
(5, '0115', 'Exterior', '', 1),
(6, '0137', 'Sofitasa', '', 1),
(7, '0134', 'Banesco', '', 1),
(8, '0151', 'BCF', 'queda en el sambil, facil de cobrar', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capital`
--

CREATE TABLE IF NOT EXISTS `capital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `montocheque` int(11) DEFAULT NULL,
  `montointeres` int(11) DEFAULT NULL,
  `montoentregado` int(11) DEFAULT NULL,
  `estadocheque` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `pagotercero` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `motivo` text,
  `provienede` varchar(60) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `chequecodigo` (`cheque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequeinterese`
--

CREATE TABLE IF NOT EXISTS `chequeinterese` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montocheque` int(11) NOT NULL,
  `montodescuentointeres` int(11) NOT NULL,
  `montoentregado` int(11) NOT NULL,
  `estadocheque` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modificado` date DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chequeinterese_cheque1_idx` (`cheque_id`),
  KEY `fk_chequeinterese_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `chequeinterese`
--

INSERT INTO `chequeinterese` (`id`, `montocheque`, `montodescuentointeres`, `montoentregado`, `estadocheque`, `created`, `modificado`, `cheque_id`, `user_id`) VALUES
(1, 0, 270, 17730, 1, '2014-03-22 09:40:30', '2014-03-22', 1, 1),
(2, 0, 270, 17730, 1, '2014-03-22 09:40:35', '2014-03-22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE IF NOT EXISTS `cheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banco_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `numerodecuenta` varchar(100) NOT NULL,
  `numerodecheque` varchar(45) NOT NULL,
  `monto` int(11) NOT NULL,
  `interese_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `dir` varchar(65) DEFAULT NULL,
  `fecharecibido` datetime NOT NULL,
  `fechacobro` datetime NOT NULL,
  `dias` int(11) DEFAULT NULL,
  `diaspost` int(11) DEFAULT NULL,
  `cobrado` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deuda` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numerodecheque_UNIQUE` (`numerodecheque`),
  KEY `fk_cheque_banco1_idx` (`banco_id`),
  KEY `fk_cheque_cliente1_idx` (`cliente_id`),
  KEY `fk_cheque_cheque1_idx` (`cheque_id`),
  KEY `fk_cheque_user1_idx` (`user_id`),
  KEY `fk_interese_id_x` (`interese_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cheques`
--

INSERT INTO `cheques` (`id`, `banco_id`, `cliente_id`, `created`, `modified`, `numerodecuenta`, `numerodecheque`, `monto`, `interese_id`, `filename`, `dir`, `fecharecibido`, `fechacobro`, `dias`, `diaspost`, `cobrado`, `cheque_id`, `user_id`, `deuda`) VALUES
(1, 3, 32, '2014-03-22 09:40:11', '2014-03-22 09:40:11', '782771827', '82882828', 18000, 23, 'cheque_devuelto_anverso-48.jpg', 'img\\uploads\\cheque\\filename', '2014-03-22 00:00:00', '2014-03-22 00:00:00', 1, NULL, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque_estadocheques`
--

CREATE TABLE IF NOT EXISTS `cheque_estadocheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `estadocheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cheque_estadocheque_cheque1_idx` (`cheque_id`),
  KEY `fk_cheque_estadocheque_estadocheque1_idx` (`estadocheque_id`),
  KEY `fk_cheque_estadocheque_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cheque_estadocheques`
--

INSERT INTO `cheque_estadocheques` (`id`, `created`, `modified`, `cheque_id`, `estadocheque_id`, `user_id`) VALUES
(1, '2014-03-22 09:40:26', '2014-03-22 09:40:26', 1, 1, 1),
(2, '2014-03-22 09:40:32', '2014-03-22 09:40:32', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `cedula` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `apodo` varchar(45) DEFAULT NULL,
  `negocio` varchar(45) DEFAULT NULL,
  `direccion` text NOT NULL,
  `telefonofijo` varchar(45) NOT NULL,
  `telefonocelular` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `created`, `cedula`, `nombre`, `apellido`, `apodo`, `negocio`, `direccion`, `telefonofijo`, `telefonocelular`, `email`, `user_id`) VALUES
(28, '2014-03-18 10:41:00', '17877861', 'jose ivan', 'zapata ramirez', 'oso', 'software', 'Urb Don Hugo Casa N 6 gallardin palo gordo', '0416-29382932', '0276-34583748', '', 1),
(29, '2014-03-18 11:03:08', '5965661', 'Gladys Mirlay', 'Ramirez Mancilla', 'Mirlay', 'Docente', 'urb don hugo casa', '321321321', '321123321', 'joseivanzapatar@gmail.com', 5),
(30, '2014-03-18 12:44:02', '18928293', 'luis alfredo', 'estrada ramos', 'guanare', 'tercerizador', 'Urb San Pedro', '93020232', '920391230', 'karacas@gmail.com', 5),
(31, '2014-03-18 12:48:57', '78289212', 'mosa', 'nossa', 'ayseutepego', 'jejs', 'urb don pedro juan carlos', '123912391', '9123129381', 'pigo@gmail.com', 5),
(32, '2014-03-18 12:54:54', '928829', 'fatima', 'avellaneda', 'fatillaneda', 'Docente', 'por las acacias', '912391239', '1239123193', '', 5),
(33, '2014-03-20 16:30:21', '772827', 'betulio ', 'aguilar', 'beto', 'marqueteria', 'gallardin parte baja', '8839929929', '2388383929', 'bao@bao.com.ve', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuenta_banco1_idx` (`banco_id`),
  KEY `fk_cuenta_cliente1_idx` (`cliente_id`),
  KEY `fk_cuenta_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocheques`
--

CREATE TABLE IF NOT EXISTS `estadocheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nomenclatura` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estadocheque_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estadocheques`
--

INSERT INTO `estadocheques` (`id`, `nombre`, `nomenclatura`, `descripcion`, `user_id`) VALUES
(1, 'Nuestro', 'R', 'cuando el cheque ya es pagado al cliente', 1),
(2, 'Cliente', 'C', 'Cheque a cambiar en banco y luego pagar', 1),
(3, 'Abono de Gravimon a Cliente', 'AbnGC', 'Debemos al cliente desc deuda gravi a cliente', 1),
(4, 'Abono de Cliente a Gravimon', 'AbnCG', 'cliente nos debe en cheque este devuelto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiondecobranzas`
--

CREATE TABLE IF NOT EXISTS `gestiondecobranzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `descripcion` text,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gestiondecobranza_cheque1_idx` (`cheque_id`),
  KEY `fk_gestiondecobranza_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE IF NOT EXISTS `intereses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `vigencia` int(11) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  `maximo` int(11) DEFAULT NULL,
  `montofijo` int(11) DEFAULT NULL,
  `porcentaje` decimal(10,1) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interese_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `created`, `vigencia`, `minimo`, `maximo`, `montofijo`, `porcentaje`, `tipo`, `user_id`) VALUES
(5, '2013-11-18 20:56:28', 1, 0, 5000, 50, NULL, 2, 1),
(6, '2013-11-18 20:59:31', 1, NULL, NULL, NULL, '1.0', 3, 1),
(23, '2014-03-14 19:01:47', 1, NULL, NULL, NULL, '1.5', NULL, 1),
(25, '2014-03-14 19:06:08', 1, NULL, NULL, NULL, '2.5', NULL, 1),
(26, '2014-03-18 09:36:11', 1, NULL, NULL, NULL, '3.0', NULL, 1),
(27, '2014-03-18 10:37:48', 1, NULL, NULL, NULL, '2.0', NULL, 1),
(28, '2014-03-18 10:38:01', 1, NULL, NULL, NULL, '4.0', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `monto` int(11) NOT NULL,
  `conceptode` text NOT NULL,
  `edodeuda` int(11) DEFAULT NULL,
  `pagointerese_deuda` int(11) DEFAULT NULL,
  `chequeinterese_id` int(11) DEFAULT NULL,
  `cheque_id` int(11) NOT NULL,
  `cheque_estadocheque_id` int(11) DEFAULT NULL,
  `tipopago_id` int(11) DEFAULT NULL,
  `pagotercero_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pago_chequeinterese1_idx` (`chequeinterese_id`),
  KEY `fk_pago_cheque_estadocheque1_idx` (`cheque_estadocheque_id`),
  KEY `fk_pago_tipopago1_idx` (`tipopago_id`),
  KEY `fk_pago_pagotercero1_idx` (`pagotercero_id`),
  KEY `fk_pago_user1_idx` (`user_id`),
  KEY `cheque_id` (`cheque_id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoterceros`
--

CREATE TABLE IF NOT EXISTS `pagoterceros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date DEFAULT NULL,
  `dia` varchar(45) NOT NULL,
  `monto` int(11) NOT NULL,
  `conceptode` text NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `cliente_id1` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagotercero_cliente1_idx` (`cliente_id`),
  KEY `fk_pagotercero_cliente2_idx` (`cliente_id1`),
  KEY `fk_pagotercero_cheque1_idx` (`cheque_id`),
  KEY `fk_pagotercero_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'admin', 'administracion'),
(2, 'Gerente', 'Gerente'),
(3, 'Cajero', ''),
(4, 'Secretaria', 'Encargada de llenar la data');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solointereses`
--

CREATE TABLE IF NOT EXISTS `solointereses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `montointereses` int(11) NOT NULL,
  `cheque_id` int(11) NOT NULL,
  `interese_id` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `cobrado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cheque_solointerese` (`cheque_id`),
  KEY `interes` (`interese_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopagos`
--

CREATE TABLE IF NOT EXISTS `tipopagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipopago_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipopagos`
--

INSERT INTO `tipopagos` (`id`, `nombre`, `descripcion`, `user_id`) VALUES
(1, 'Efectivo', 'pago con efectivo', 1),
(3, 'Transferencia electronica', 'Pago con transferencia electronica', 1),
(4, 'Abono caja al cliente', 'cuando se le paga al cliente cuando lleva un cheque a cambiar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_role_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `nombre`, `apellido`) VALUES
(1, 'Reinaldo', '4f1817b90499f01f9c0246c1b5c05826747502a7', 1, 'Reinaldo', 'Rangel'),
(2, 'jose1', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'pedro', 'gomez'),
(4, 'secretaria', '8b5393ea82b50dd0b65232224271bd930ec801ea', 4, 'Luisa', 'Perez'),
(5, 'pepito', '8b5393ea82b50dd0b65232224271bd930ec801ea', 2, 'pedro', 'perez'),
(6, 'joseivan', '4f1817b90499f01f9c0246c1b5c05826747502a7', 4, 'jose ivan', 'zapata ramirez'),
(7, 'Gerardo', '4f1817b90499f01f9c0246c1b5c05826747502a7', 3, 'gerardo', 'ardila');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD CONSTRAINT `fk_banco_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `capital`
--
ALTER TABLE `capital`
  ADD CONSTRAINT `jose` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jose2` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chequeinterese`
--
ALTER TABLE `chequeinterese`
  ADD CONSTRAINT `fk_chequeinterese_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chequeinterese_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `fk_cheque_banco1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_interese1` FOREIGN KEY (`interese_id`) REFERENCES `intereses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cheque_estadocheques`
--
ALTER TABLE `cheque_estadocheques`
  ADD CONSTRAINT `fk_cheque_estadocheque_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_estadocheque_estadocheque1` FOREIGN KEY (`estadocheque_id`) REFERENCES `estadocheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_estadocheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cliente_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `fk_cuenta_banco1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadocheques`
--
ALTER TABLE `estadocheques`
  ADD CONSTRAINT `fk_estadocheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestiondecobranzas`
--
ALTER TABLE `gestiondecobranzas`
  ADD CONSTRAINT `fk_gestiondecobranza_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gestiondecobranza_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `fk_interese_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pago_cheques1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pago_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pago_pagotercero1` FOREIGN KEY (`pagotercero_id`) REFERENCES `pagoterceros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pago_tipopago1` FOREIGN KEY (`tipopago_id`) REFERENCES `tipopagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pago_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagoterceros`
--
ALTER TABLE `pagoterceros`
  ADD CONSTRAINT `fk_pagotercero_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagotercero_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagotercero_cliente2` FOREIGN KEY (`cliente_id1`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagotercero_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solointereses`
--
ALTER TABLE `solointereses`
  ADD CONSTRAINT `solointereses_ibfk_1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solointereses_ibfk_2` FOREIGN KEY (`interese_id`) REFERENCES `intereses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipopagos`
--
ALTER TABLE `tipopagos`
  ADD CONSTRAINT `fk_tipopago_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuario_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
