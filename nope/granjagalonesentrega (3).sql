-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2014 a las 01:14:49
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `granjagalonesentrega`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 246),
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
(16, 1, NULL, NULL, 'ChequeEstadocheques', 30, 43),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 16, NULL, NULL, 'logout', 41, 42),
(23, 1, NULL, NULL, 'Chequeinterese', 44, 57),
(24, 23, NULL, NULL, 'index', 45, 46),
(25, 23, NULL, NULL, 'view', 47, 48),
(26, 23, NULL, NULL, 'add', 49, 50),
(27, 23, NULL, NULL, 'edit', 51, 52),
(28, 23, NULL, NULL, 'delete', 53, 54),
(29, 23, NULL, NULL, 'logout', 55, 56),
(30, 1, NULL, NULL, 'Cheques', 58, 81),
(31, 30, NULL, NULL, 'index', 59, 60),
(32, 30, NULL, NULL, 'index2', 61, 62),
(33, 30, NULL, NULL, 'devueltos', 63, 64),
(34, 30, NULL, NULL, 'postdatados', 65, 66),
(35, 30, NULL, NULL, 'view', 67, 68),
(36, 30, NULL, NULL, 'add2', 69, 70),
(37, 30, NULL, NULL, 'add', 71, 72),
(38, 30, NULL, NULL, 'editadevuelto', 73, 74),
(39, 30, NULL, NULL, 'edit', 75, 76),
(40, 30, NULL, NULL, 'delete', 77, 78),
(41, 30, NULL, NULL, 'logout', 79, 80),
(42, 1, NULL, NULL, 'Clientes', 82, 95),
(43, 42, NULL, NULL, 'index', 83, 84),
(44, 42, NULL, NULL, 'view', 85, 86),
(45, 42, NULL, NULL, 'add', 87, 88),
(46, 42, NULL, NULL, 'edit', 89, 90),
(47, 42, NULL, NULL, 'delete', 91, 92),
(48, 42, NULL, NULL, 'logout', 93, 94),
(49, 1, NULL, NULL, 'Cuentas', 96, 109),
(50, 49, NULL, NULL, 'index', 97, 98),
(51, 49, NULL, NULL, 'view', 99, 100),
(52, 49, NULL, NULL, 'add', 101, 102),
(53, 49, NULL, NULL, 'edit', 103, 104),
(54, 49, NULL, NULL, 'delete', 105, 106),
(55, 49, NULL, NULL, 'logout', 107, 108),
(56, 1, NULL, NULL, 'Estadocheques', 110, 123),
(57, 56, NULL, NULL, 'index', 111, 112),
(58, 56, NULL, NULL, 'view', 113, 114),
(59, 56, NULL, NULL, 'add', 115, 116),
(60, 56, NULL, NULL, 'edit', 117, 118),
(61, 56, NULL, NULL, 'delete', 119, 120),
(62, 56, NULL, NULL, 'logout', 121, 122),
(63, 1, NULL, NULL, 'Gestiondecobranzas', 124, 137),
(64, 63, NULL, NULL, 'index', 125, 126),
(65, 63, NULL, NULL, 'view', 127, 128),
(66, 63, NULL, NULL, 'add', 129, 130),
(67, 63, NULL, NULL, 'edit', 131, 132),
(68, 63, NULL, NULL, 'delete', 133, 134),
(69, 63, NULL, NULL, 'logout', 135, 136),
(70, 1, NULL, NULL, 'Interese', 138, 151),
(71, 70, NULL, NULL, 'index', 139, 140),
(72, 70, NULL, NULL, 'view', 141, 142),
(73, 70, NULL, NULL, 'add', 143, 144),
(74, 70, NULL, NULL, 'edit', 145, 146),
(75, 70, NULL, NULL, 'delete', 147, 148),
(76, 70, NULL, NULL, 'logout', 149, 150),
(77, 1, NULL, NULL, 'Pages', 152, 157),
(78, 77, NULL, NULL, 'display', 153, 154),
(79, 77, NULL, NULL, 'logout', 155, 156),
(80, 1, NULL, NULL, 'Pagos', 158, 171),
(81, 80, NULL, NULL, 'index', 159, 160),
(82, 80, NULL, NULL, 'view', 161, 162),
(83, 80, NULL, NULL, 'add', 163, 164),
(84, 80, NULL, NULL, 'edit', 165, 166),
(85, 80, NULL, NULL, 'delete', 167, 168),
(86, 80, NULL, NULL, 'logout', 169, 170),
(87, 1, NULL, NULL, 'Pagoterceros', 172, 185),
(88, 87, NULL, NULL, 'index', 173, 174),
(89, 87, NULL, NULL, 'view', 175, 176),
(90, 87, NULL, NULL, 'add', 177, 178),
(91, 87, NULL, NULL, 'edit', 179, 180),
(92, 87, NULL, NULL, 'delete', 181, 182),
(93, 87, NULL, NULL, 'logout', 183, 184),
(94, 1, NULL, NULL, 'Roles', 186, 199),
(95, 94, NULL, NULL, 'index', 187, 188),
(96, 94, NULL, NULL, 'view', 189, 190),
(97, 94, NULL, NULL, 'add', 191, 192),
(98, 94, NULL, NULL, 'edit', 193, 194),
(99, 94, NULL, NULL, 'delete', 195, 196),
(100, 94, NULL, NULL, 'logout', 197, 198),
(101, 1, NULL, NULL, 'Rols', 200, 213),
(102, 101, NULL, NULL, 'index', 201, 202),
(103, 101, NULL, NULL, 'view', 203, 204),
(104, 101, NULL, NULL, 'add', 205, 206),
(105, 101, NULL, NULL, 'edit', 207, 208),
(106, 101, NULL, NULL, 'delete', 209, 210),
(107, 101, NULL, NULL, 'logout', 211, 212),
(108, 1, NULL, NULL, 'Tipopagos', 214, 227),
(109, 108, NULL, NULL, 'index', 215, 216),
(110, 108, NULL, NULL, 'view', 217, 218),
(111, 108, NULL, NULL, 'add', 219, 220),
(112, 108, NULL, NULL, 'edit', 221, 222),
(113, 108, NULL, NULL, 'delete', 223, 224),
(114, 108, NULL, NULL, 'logout', 225, 226),
(115, 1, NULL, NULL, 'Users', 228, 243),
(116, 115, NULL, NULL, 'index', 229, 230),
(117, 115, NULL, NULL, 'login', 231, 232),
(118, 115, NULL, NULL, 'logout', 233, 234),
(119, 115, NULL, NULL, 'view', 235, 236),
(120, 115, NULL, NULL, 'add', 237, 238),
(121, 115, NULL, NULL, 'edit', 239, 240),
(122, 115, NULL, NULL, 'delete', 241, 242),
(123, 1, NULL, NULL, 'AclExtras', 244, 245);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
(40, 4, 82, '1', '1', '1', '1');

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
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chequeinterese_cheque1_idx` (`cheque_id`),
  KEY `fk_chequeinterese_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Volcado de datos para la tabla `chequeinterese`
--

INSERT INTO `chequeinterese` (`id`, `montocheque`, `montodescuentointeres`, `montoentregado`, `estadocheque`, `created`, `cheque_id`, `user_id`) VALUES
(117, 100000, 3000, 97000, 1, '2014-01-16 10:53:24', 146, 1),
(118, 10100, 102, 0, 0, '2014-01-16 10:54:47', 147, 1),
(119, 10000, 100, 9900, 1, '2014-01-16 10:54:30', 147, 1),
(124, 562000, 200, 561800, 1, '2014-01-16 15:27:25', 152, 1),
(125, 50000, 4000, 49500, 1, '2014-01-16 15:36:44', 153, 2);

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
  `cobrado` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numerodecheque_UNIQUE` (`numerodecheque`),
  KEY `fk_cheque_banco1_idx` (`banco_id`),
  KEY `fk_cheque_cliente1_idx` (`cliente_id`),
  KEY `fk_cheque_cheque1_idx` (`cheque_id`),
  KEY `fk_cheque_user1_idx` (`user_id`),
  KEY `fk_interese_id_x` (`interese_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=154 ;

--
-- Volcado de datos para la tabla `cheques`
--

INSERT INTO `cheques` (`id`, `banco_id`, `cliente_id`, `created`, `modified`, `numerodecuenta`, `numerodecheque`, `monto`, `interese_id`, `filename`, `dir`, `fecharecibido`, `fechacobro`, `dias`, `cobrado`, `cheque_id`, `user_id`) VALUES
(146, 4, 3, '2014-01-16 08:09:04', '2014-01-16 10:53:24', '999888777', '889988', 100000, 6, 'adalid_2_fw.png', 'img\\uploads\\cheque\\filename', '2014-01-16 00:00:00', '2014-01-18 00:00:00', 3, 1, NULL, 1),
(147, 4, 8, '2014-01-16 10:54:30', '2014-01-16 10:54:30', '887378', '9940', 10100, 6, 'adalid_I.jpg', 'img\\uploads\\cheque\\filename', '2014-01-16 00:00:00', '2014-01-16 00:00:00', 1, 0, NULL, 1),
(152, 1, 3, '2014-01-16 15:27:25', '2014-01-16 15:27:25', '54576', '242454', 562000, 4, 'Foto0920.jpg', 'img\\uploads\\cheque\\filename', '2014-01-21 00:00:00', '2014-01-22 00:00:00', 2, 1, NULL, 1),
(153, 1, 3, '2014-01-16 15:36:44', '2014-01-16 15:36:44', '54566', '547869', 50000, 6, '1.jpg', 'img\\uploads\\cheque\\filename', '2014-01-16 00:00:00', '2014-01-23 00:00:00', 8, 1, NULL, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `cheque_estadocheques`
--

INSERT INTO `cheque_estadocheques` (`id`, `created`, `modified`, `cheque_id`, `estadocheque_id`, `user_id`) VALUES
(58, '2014-01-16 08:09:06', '2014-01-16 08:09:06', 146, 1, 1),
(59, '2014-01-16 10:54:32', '2014-01-16 10:54:32', 147, 1, 1),
(65, '2014-01-16 15:27:28', '2014-01-16 15:27:28', 152, 1, 1),
(66, '2014-01-16 15:36:50', '2014-01-16 15:36:50', 153, 1, 2),
(67, '2014-01-16 16:35:42', '2014-01-16 16:35:42', 146, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
(12, '2014-01-13 21:30:14', '17877861', 'Jose Ivan', 'Zapata Ramirez', 'osito', 'software', 'urb don hugo', '0276-3573384', '0426-3287172', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `numero`, `banco_id`, `cliente_id`, `user_id`) VALUES
(1, '908876886545432', 4, 6, 3),
(2, '8877665544332211', 7, 8, 3),
(3, '6677656', 4, 9, 3),
(4, '90992123', 1, 10, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `estadocheques`
--

INSERT INTO `estadocheques` (`id`, `nombre`, `nomenclatura`, `descripcion`, `user_id`) VALUES
(1, 'Cheque por cobrar', 'R', 'cuando el cheque ya es pagado al cliente', 1),
(2, 'Cheque por pagar', 'CHPP', 'Cheque a cambiar en banco y luego pagar', 1),
(3, 'Abono Deuda', 'AbnD', 'Paga a deuda, baja los intereses', 1),
(4, 'Abono Intereses', 'AbnI', 'abona en intereses de deuda.', 1),
(5, 'Cheque por pagar y nuestro', 'R(pn)', 'cheque cobrado y aun no se le paga al cliente', 1),
(6, 'Abono Cliente', 'AbnC', 'Cuando se le da el dinero deuda cliente', 1);

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
  `porcentaje` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interese_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `created`, `vigencia`, `minimo`, `maximo`, `montofijo`, `porcentaje`, `tipo`, `user_id`) VALUES
(4, '2013-11-18 20:53:00', 1, 5000, 10000, 100, NULL, 1, 3),
(5, '2013-11-18 20:56:28', 1, 1000, 5000, 50, NULL, 2, 1),
(6, '2013-11-18 20:59:31', 1, NULL, NULL, NULL, 1, 3, 1),
(7, '2013-11-29 10:20:24', 1, NULL, NULL, NULL, 2, NULL, 3);

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
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cheque_solointerese` (`cheque_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `solointereses`
--

INSERT INTO `solointereses` (`id`, `monto`, `montointereses`, `cheque_id`, `fecha`) VALUES
(20, 100000, 1000, 146, '2014-01-16'),
(21, 10000, 100, 147, '2014-01-16'),
(22, 0, 102, 147, '2014-01-16'),
(27, 562000, 100, 152, '2014-01-16'),
(28, 50000, 500, 153, '2014-01-16');

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
(2, 'Cheque', 'Pago con cheque', 1),
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
  ADD CONSTRAINT `fk_pago_cheques1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`),
  ADD CONSTRAINT `fk_pago_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
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
  ADD CONSTRAINT `solointereses_ibfk_1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
