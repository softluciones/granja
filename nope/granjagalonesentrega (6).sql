-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2014 a las 14:56:15
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `granjagalonesentrega`
--
CREATE DATABASE IF NOT EXISTS `granjagalonesentrega` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `granjagalonesentrega`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 270),
(2, 1, NULL, NULL, 'Bancos', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'logout', 13, 14),
(9, 1, NULL, NULL, 'Capitals', 16, 29),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'add', 21, 22),
(13, 9, NULL, NULL, 'edit', 23, 24),
(14, 9, NULL, NULL, 'delete', 25, 26),
(15, 9, NULL, NULL, 'logout', 27, 28),
(16, 1, NULL, NULL, 'ChequeEstadocheques', 30, 45),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 16, NULL, NULL, 'logout', 41, 42),
(23, 1, NULL, NULL, 'Chequeinterese', 46, 59),
(24, 23, NULL, NULL, 'index', 47, 48),
(25, 23, NULL, NULL, 'view', 49, 50),
(26, 23, NULL, NULL, 'add', 51, 52),
(27, 23, NULL, NULL, 'edit', 53, 54),
(28, 23, NULL, NULL, 'delete', 55, 56),
(29, 23, NULL, NULL, 'logout', 57, 58),
(30, 1, NULL, NULL, 'Cheques', 60, 99),
(31, 30, NULL, NULL, 'index', 61, 62),
(32, 30, NULL, NULL, 'index2', 63, 64),
(33, 30, NULL, NULL, 'devueltos', 65, 66),
(34, 30, NULL, NULL, 'postdatados', 67, 68),
(35, 30, NULL, NULL, 'view', 69, 70),
(36, 30, NULL, NULL, 'add2', 71, 72),
(37, 30, NULL, NULL, 'add', 73, 74),
(38, 30, NULL, NULL, 'editadevuelto', 75, 76),
(39, 30, NULL, NULL, 'edit', 77, 78),
(40, 30, NULL, NULL, 'delete', 79, 80),
(41, 30, NULL, NULL, 'logout', 81, 82),
(42, 1, NULL, NULL, 'Clientes', 100, 113),
(43, 42, NULL, NULL, 'index', 101, 102),
(44, 42, NULL, NULL, 'view', 103, 104),
(45, 42, NULL, NULL, 'add', 105, 106),
(46, 42, NULL, NULL, 'edit', 107, 108),
(47, 42, NULL, NULL, 'delete', 109, 110),
(48, 42, NULL, NULL, 'logout', 111, 112),
(49, 1, NULL, NULL, 'Cuentas', 114, 127),
(50, 49, NULL, NULL, 'index', 115, 116),
(51, 49, NULL, NULL, 'view', 117, 118),
(52, 49, NULL, NULL, 'add', 119, 120),
(53, 49, NULL, NULL, 'edit', 121, 122),
(54, 49, NULL, NULL, 'delete', 123, 124),
(55, 49, NULL, NULL, 'logout', 125, 126),
(56, 1, NULL, NULL, 'Estadocheques', 128, 141),
(57, 56, NULL, NULL, 'index', 129, 130),
(58, 56, NULL, NULL, 'view', 131, 132),
(59, 56, NULL, NULL, 'add', 133, 134),
(60, 56, NULL, NULL, 'edit', 135, 136),
(61, 56, NULL, NULL, 'delete', 137, 138),
(62, 56, NULL, NULL, 'logout', 139, 140),
(63, 1, NULL, NULL, 'Gestiondecobranzas', 142, 155),
(64, 63, NULL, NULL, 'index', 143, 144),
(65, 63, NULL, NULL, 'view', 145, 146),
(66, 63, NULL, NULL, 'add', 147, 148),
(67, 63, NULL, NULL, 'edit', 149, 150),
(68, 63, NULL, NULL, 'delete', 151, 152),
(69, 63, NULL, NULL, 'logout', 153, 154),
(70, 1, NULL, NULL, 'Interese', 156, 169),
(71, 70, NULL, NULL, 'index', 157, 158),
(72, 70, NULL, NULL, 'view', 159, 160),
(73, 70, NULL, NULL, 'add', 161, 162),
(74, 70, NULL, NULL, 'edit', 163, 164),
(75, 70, NULL, NULL, 'delete', 165, 166),
(76, 70, NULL, NULL, 'logout', 167, 168),
(77, 1, NULL, NULL, 'Pages', 170, 175),
(78, 77, NULL, NULL, 'display', 171, 172),
(79, 77, NULL, NULL, 'logout', 173, 174),
(80, 1, NULL, NULL, 'Pagos', 176, 189),
(81, 80, NULL, NULL, 'index', 177, 178),
(82, 80, NULL, NULL, 'view', 179, 180),
(83, 80, NULL, NULL, 'add', 181, 182),
(84, 80, NULL, NULL, 'edit', 183, 184),
(85, 80, NULL, NULL, 'delete', 185, 186),
(86, 80, NULL, NULL, 'logout', 187, 188),
(87, 1, NULL, NULL, 'Pagoterceros', 190, 203),
(88, 87, NULL, NULL, 'index', 191, 192),
(89, 87, NULL, NULL, 'view', 193, 194),
(90, 87, NULL, NULL, 'add', 195, 196),
(91, 87, NULL, NULL, 'edit', 197, 198),
(92, 87, NULL, NULL, 'delete', 199, 200),
(93, 87, NULL, NULL, 'logout', 201, 202),
(94, 1, NULL, NULL, 'Roles', 204, 217),
(95, 94, NULL, NULL, 'index', 205, 206),
(96, 94, NULL, NULL, 'view', 207, 208),
(97, 94, NULL, NULL, 'add', 209, 210),
(98, 94, NULL, NULL, 'edit', 211, 212),
(99, 94, NULL, NULL, 'delete', 213, 214),
(100, 94, NULL, NULL, 'logout', 215, 216),
(101, 1, NULL, NULL, 'Rols', 218, 231),
(102, 101, NULL, NULL, 'index', 219, 220),
(103, 101, NULL, NULL, 'view', 221, 222),
(104, 101, NULL, NULL, 'add', 223, 224),
(105, 101, NULL, NULL, 'edit', 225, 226),
(106, 101, NULL, NULL, 'delete', 227, 228),
(107, 101, NULL, NULL, 'logout', 229, 230),
(108, 1, NULL, NULL, 'Tipopagos', 232, 245),
(109, 108, NULL, NULL, 'index', 233, 234),
(110, 108, NULL, NULL, 'view', 235, 236),
(111, 108, NULL, NULL, 'add', 237, 238),
(112, 108, NULL, NULL, 'edit', 239, 240),
(113, 108, NULL, NULL, 'delete', 241, 242),
(114, 108, NULL, NULL, 'logout', 243, 244),
(115, 1, NULL, NULL, 'Users', 246, 263),
(116, 115, NULL, NULL, 'index', 247, 248),
(117, 115, NULL, NULL, 'login', 249, 250),
(118, 115, NULL, NULL, 'logout', 251, 252),
(119, 115, NULL, NULL, 'view', 253, 254),
(120, 115, NULL, NULL, 'add', 255, 256),
(121, 115, NULL, NULL, 'edit', 257, 258),
(122, 115, NULL, NULL, 'delete', 259, 260),
(123, 1, NULL, NULL, 'AclExtras', 264, 265),
(124, 1, NULL, NULL, 'Solointerese', 266, 269),
(125, 124, NULL, NULL, 'index', 267, 268),
(126, 30, NULL, NULL, 'reporteintereses', 83, 84),
(127, 30, NULL, NULL, 'reporteinteres', 85, 86),
(128, 16, NULL, NULL, 'add2', 43, 44),
(129, 30, NULL, NULL, 'aumentarinteres', 87, 88),
(130, 115, NULL, NULL, 'editpass', 261, 262),
(131, 30, NULL, NULL, 'delete2', 89, 90),
(132, 30, NULL, NULL, 'busca', 91, 92),
(133, 30, NULL, NULL, 'buscar', 93, 94),
(134, 30, NULL, NULL, 'buscarte', 95, 96),
(135, 30, NULL, NULL, 'delete3', 97, 98);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 6),
(2, NULL, 'Role', 2, NULL, 7, 10),
(3, NULL, 'Role', 3, NULL, 11, 12),
(4, NULL, 'Role', 4, NULL, 13, 16),
(5, 1, 'User', 2, NULL, 2, 3),
(6, 1, 'User', 3, NULL, 4, 5),
(7, 2, 'User', 1, NULL, 8, 9),
(8, 4, 'User', 4, NULL, 14, 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

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
(63, 4, 135, '1', '1', '1', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `codigo`, `nombre`, `descripcion`, `user_id`) VALUES
(1, '0102', 'Venezuela', 'Queda en el Sambil', 3),
(2, '0105', 'Mercantil', 'Sambil', 1),
(3, '0108', 'Provincial', '', 1),
(4, '0114', 'Caribe', '', 1),
(5, '0115', 'Exterior', '', 1),
(6, '0137', 'Sofitasa', '', 1),
(7, '0134', 'Banesco', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4316 ;

--
-- Volcado de datos para la tabla `chequeinterese`
--

INSERT INTO `chequeinterese` (`id`, `montocheque`, `montodescuentointeres`, `montoentregado`, `estadocheque`, `created`, `modificado`, `cheque_id`, `user_id`) VALUES
(4304, 0, 2250, 147750, 1, '2014-03-15 10:21:09', '2014-03-12', 174, 1),
(4305, 0, 2250, 145500, 1, '2014-03-15 10:21:09', '2014-03-13', 174, 1),
(4306, 0, 2250, 143250, 1, '2014-03-15 10:21:09', '2014-03-14', 174, 1),
(4307, 0, 2250, 141000, 1, '2014-03-15 10:21:09', '2014-03-15', 174, 1),
(4308, 152250, 2290, 141000, 0, '2014-03-15 10:21:28', '2014-03-16', 174, 1),
(4309, 154540, 2320, 141000, 0, '2014-03-17 10:22:12', '2014-03-17', 174, 1),
(4310, 156860, 2360, 141000, 0, '2014-03-17 10:22:12', '2014-03-18', 174, 1),
(4311, 0, 0, 141000, 0, '2014-03-17 10:24:47', '2014-03-17', 174, 1),
(4312, 0, 1620, 160130, 1, '2014-03-17 10:24:48', '2014-03-16', 175, 1),
(4313, 0, 1620, 158510, 1, '2014-03-17 10:24:48', '2014-03-17', 175, 1),
(4314, 0, 1620, 156890, 1, '2014-03-17 10:24:48', '2014-03-18', 175, 1),
(4315, 163368, 1618, 156890, 0, '2014-03-17 10:25:29', '0000-00-00', 175, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

--
-- Volcado de datos para la tabla `cheques`
--

INSERT INTO `cheques` (`id`, `banco_id`, `cliente_id`, `created`, `modified`, `numerodecuenta`, `numerodecheque`, `monto`, `interese_id`, `filename`, `dir`, `fecharecibido`, `fechacobro`, `dias`, `diaspost`, `cobrado`, `cheque_id`, `user_id`, `deuda`) VALUES
(174, 1, 9, '2014-03-15 10:21:06', '2014-03-17 10:24:47', '1652003232', '4154651', 150000, 23, 'descarga-11.jpg', 'img\\uploads\\cheque\\filename', '2014-03-12 00:00:00', '2014-03-15 00:00:00', 1, NULL, 0, NULL, 1, 1),
(175, 1, 3, '2014-03-17 10:24:47', '2014-03-17 10:25:29', '5632312', '2165230', 161750, 6, 'descarga-12.jpg', 'img\\uploads\\cheque\\filename', '2014-03-16 00:00:00', '2014-03-18 00:00:00', 3, 3, 0, 174, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=206 ;

--
-- Volcado de datos para la tabla `cheque_estadocheques`
--

INSERT INTO `cheque_estadocheques` (`id`, `created`, `modified`, `cheque_id`, `estadocheque_id`, `user_id`) VALUES
(204, '2014-03-15 10:21:09', '2014-03-15 10:21:09', 174, 1, 1),
(205, '2014-03-17 10:24:48', '2014-03-17 10:24:48', 175, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `created`, `cedula`, `nombre`, `apellido`, `apodo`, `negocio`, `direccion`, `telefonofijo`, `telefonocelular`, `email`, `user_id`) VALUES
(3, '2013-11-25 06:02:03', '17877861', 'Jose Ivan', 'Zapata Ramirez', 'osito', 'software', 'urb don hugo', '0276-3573384', '0426-3287172', '', 1),
(4, '2013-11-25 06:04:26', '14984046', 'Samuel Enrique', 'Zapata Ramirez', 'Samuelin', 'Leche', 'urb don hugo', '-', '0426-5023056', '', 1),
(5, '2013-11-25 06:08:10', '19502246', 'Betmart', 'Aguilar', 'Flecha veloz', 'software', 'urb don hugo', '0276-3573384', '0426-3287172', 'bet@hotmail.com', 1),
(6, '2013-11-28 11:22:35', '19975393', 'Jose M', 'Aguilar G', 'Chemanel', 'Lentes', 'Urb DOn Hugo', '88988998', '0414-12343223', 'tu@yo.com', 3),
(7, '2013-11-28 11:52:24', '5965661', 'Gladys', 'Ramirez', 'mirlay', 'docente', 'Urb DOn Hugo', '023123123', '0414-7123023', 'tu@yo.com', 3),
(8, '2013-11-28 12:04:32', '4529609', 'Bertulio', 'Aguilar', 'Beto', 'Marqueteria', 'Urb DOn Hugo', '04251234522', '001299382', 'tu@yo.com', 3),
(9, '2013-11-29 09:28:27', '-', 'Douglas', '-', 'douglas ajos', 'venta de ajos', 'cucuta', '111111', '222222', 'yo@tu.com', 3),
(10, '2014-01-12 21:27:56', '123456', 'pedro', 'perez', 'pedro ajos', 'ajos', 'Urb DOn Hugo', '04251234522', '0414-12343223', 'tu@yo.com', 1),
(11, '2014-01-13 21:25:39', '19502246', 'Betmart', 'Aguilar', 'Flecha veloz', 'software', 'urb don hugo', '0276-3573384', '0426-3287172', 'bet@hotmail.com', 1),
(12, '2014-01-13 21:30:14', '17877861', 'Jose Ivan', 'Zapata Ramirez', 'osito', 'software', 'urb don hugo', '0276-3573384', '0426-3287172', '', 1),
(13, '2014-03-13 18:22:41', '19502', 'Betmare', 'Gomez', 'betmare', 'softluciones', 'gallardin parte baja carrera 2 casa 1', '0276-8895162', '0414-7123023', 'betmart0901@gmail.com', 1),
(14, '2014-03-13 18:33:26', '1769585', 'Betjose', 'Ramirez', 'betajose', 'softluciones', 'gallardin', '0276-8895162', '04147123023', 'betmart0901@gmail.com', 1),
(15, '2014-03-13 18:33:32', '1769585', 'Betjose', 'Ramirez', 'betajose', 'softluciones', 'gallardin', '0276-8895162', '04147123023', 'betmart0901@gmail.com', 1),
(16, '2014-03-13 18:34:57', '5643334', 'Martha', 'Gomez', 'martiviris', 'casa', 'gallardin', '0276-8895162', '0414-1776235', 'martha_sgs@hotmail.com', 1),
(17, '2014-03-13 18:46:24', '1895632', 'nora', 'garcia', 'norita', 'bisuteria', 'gallardin', '0276-3573384', '0414-7123023', 'tu@yo.com', 1),
(18, '2014-03-13 18:46:30', '1895632', 'nora', 'garcia', 'norita', 'bisuteria', 'gallardin', '0276-3573384', '0414-7123023', 'tu@yo.com', 1),
(19, '2014-03-13 18:46:47', '1895632', 'nora', 'garcia', 'norita', 'bisuteria', 'gallardin', '0276-3573384', '0414-7123023', 'tu@yo.com', 1),
(20, '2014-03-13 18:47:41', '89657656', 'Jose', 'Ivanosqui', 'ivanocar', 'ajos', 'jose', '0276-3573374', '0414-7123023', 'blabla', 1),
(21, '2014-03-13 18:49:45', '4529609', 'Betulio', 'Aguilar Olmos', 'Maracucho', 'marqueteria', 'gallarin', '0276-3576658', '0416-6026102', 'aguilarbeto8@hotmail.com', 1),
(22, '2014-03-14 16:26:56', '123', 'error ', 'no', 'nono', 'bla', 'algun lugar', '0414-7123023', '04866', 'blabla', 1),
(23, '2014-03-14 16:32:15', '123', 'error ', 'no', 'nono', 'blabla', '0414-7123023', '04866', '', 'algun lugar', 1),
(27, '2014-03-14 23:04:00', '4587630', 'Henry', 'Betmart', 'bala', 'bashy', 'afds', '2352', '221452', 'asds', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `numero`, `banco_id`, `cliente_id`, `user_id`) VALUES
(1, '908876886545432', 4, 6, 3),
(2, '8877665544332211', 7, 8, 3),
(3, '6677656', 4, 9, 3),
(4, '90992123', 1, 10, 1),
(5, '14563052565663', 1, 7, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `created`, `vigencia`, `minimo`, `maximo`, `montofijo`, `porcentaje`, `tipo`, `user_id`) VALUES
(4, '2013-11-18 20:53:00', 1, 5000, 10000, 100, NULL, 1, 3),
(5, '2013-11-18 20:56:28', 1, 0, 5000, 50, NULL, 2, 1),
(6, '2013-11-18 20:59:31', 1, NULL, NULL, NULL, '1.0', 3, 1),
(7, '2013-11-29 10:20:24', 1, NULL, NULL, NULL, '2.0', NULL, 3),
(23, '2014-03-14 19:01:47', 1, NULL, NULL, NULL, '1.5', NULL, 1),
(25, '2014-03-14 19:06:08', 1, NULL, NULL, NULL, '2.5', NULL, 1),
(26, '2014-03-18 09:36:11', 1, NULL, NULL, NULL, '3.0', NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `nombre`, `apellido`) VALUES
(1, 'jose', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'jose ivan', 'zapata ramirez'),
(2, 'jose1', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'pedro', 'gomez'),
(3, 'reinaldo', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'reinaldo', 'preguntar'),
(4, 'secretaria', '8b5393ea82b50dd0b65232224271bd930ec801ea', 4, 'Luisa', 'Perez');

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
  ADD CONSTRAINT `fk_cheque_banco1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cheque_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_usuario_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
