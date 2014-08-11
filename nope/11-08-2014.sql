-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2014 a las 11:18:15
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
CREATE DATABASE IF NOT EXISTS `granjagalonesentrega` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=207 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'NULL', NULL, 'controllers', 1, 412),
(2, 1, 'NULL', NULL, 'Bancos', 2, 19),
(3, 2, 'NULL', NULL, 'index', 3, 4),
(4, 2, 'NULL', NULL, 'view', 5, 6),
(5, 2, 'NULL', NULL, 'add', 7, 8),
(6, 2, 'NULL', NULL, 'edit', 9, 10),
(7, 2, 'NULL', NULL, 'delete', 11, 12),
(8, 2, 'NULL', NULL, 'logout', 13, 14),
(9, 1, 'NULL', NULL, 'Capitals', 20, 33),
(10, 9, 'NULL', NULL, 'index', 21, 22),
(11, 9, 'NULL', NULL, 'view', 23, 24),
(12, 9, 'NULL', NULL, 'add', 25, 26),
(13, 9, 'NULL', NULL, 'edit', 27, 28),
(14, 9, 'NULL', NULL, 'delete', 29, 30),
(15, 9, 'NULL', NULL, 'logout', 31, 32),
(16, 1, 'NULL', NULL, 'ChequeEstadocheques', 34, 49),
(17, 16, 'NULL', NULL, 'index', 35, 36),
(18, 16, 'NULL', NULL, 'view', 37, 38),
(19, 16, 'NULL', NULL, 'add', 39, 40),
(20, 16, 'NULL', NULL, 'edit', 41, 42),
(21, 16, 'NULL', NULL, 'delete', 43, 44),
(22, 16, 'NULL', NULL, 'logout', 45, 46),
(23, 1, 'NULL', NULL, 'Chequeinterese', 50, 63),
(24, 23, 'NULL', NULL, 'index', 51, 52),
(25, 23, 'NULL', NULL, 'view', 53, 54),
(26, 23, 'NULL', NULL, 'add', 55, 56),
(27, 23, 'NULL', NULL, 'edit', 57, 58),
(28, 23, 'NULL', NULL, 'delete', 59, 60),
(29, 23, 'NULL', NULL, 'logout', 61, 62),
(30, 1, 'NULL', NULL, 'Cheques', 64, 111),
(31, 30, 'NULL', NULL, 'index', 65, 66),
(32, 30, 'NULL', NULL, 'index2', 67, 68),
(33, 30, 'NULL', NULL, 'devueltos', 69, 70),
(34, 30, 'NULL', NULL, 'postdatados', 71, 72),
(35, 30, 'NULL', NULL, 'view', 73, 74),
(36, 30, 'NULL', NULL, 'add2', 75, 76),
(37, 30, 'NULL', NULL, 'add', 77, 78),
(38, 30, 'NULL', NULL, 'editadevuelto', 79, 80),
(39, 30, 'NULL', NULL, 'edit', 81, 82),
(40, 30, 'NULL', NULL, 'delete', 83, 84),
(41, 30, 'NULL', NULL, 'logout', 85, 86),
(42, 1, 'NULL', NULL, 'Clientes', 112, 125),
(43, 42, 'NULL', NULL, 'index', 113, 114),
(44, 42, 'NULL', NULL, 'view', 115, 116),
(45, 42, 'NULL', NULL, 'add', 117, 118),
(46, 42, 'NULL', NULL, 'edit', 119, 120),
(47, 42, 'NULL', NULL, 'delete', 121, 122),
(48, 42, 'NULL', NULL, 'logout', 123, 124),
(49, 1, 'NULL', NULL, 'Cuentas', 126, 139),
(50, 49, 'NULL', NULL, 'index', 127, 128),
(51, 49, 'NULL', NULL, 'view', 129, 130),
(52, 49, 'NULL', NULL, 'add', 131, 132),
(53, 49, 'NULL', NULL, 'edit', 133, 134),
(54, 49, 'NULL', NULL, 'delete', 135, 136),
(55, 49, 'NULL', NULL, 'logout', 137, 138),
(56, 1, 'NULL', NULL, 'Estadocheques', 140, 153),
(57, 56, 'NULL', NULL, 'index', 141, 142),
(58, 56, 'NULL', NULL, 'view', 143, 144),
(59, 56, 'NULL', NULL, 'add', 145, 146),
(60, 56, 'NULL', NULL, 'edit', 147, 148),
(61, 56, 'NULL', NULL, 'delete', 149, 150),
(62, 56, 'NULL', NULL, 'logout', 151, 152),
(63, 1, 'NULL', NULL, 'Gestiondecobranzas', 154, 167),
(64, 63, 'NULL', NULL, 'index', 155, 156),
(65, 63, 'NULL', NULL, 'view', 157, 158),
(66, 63, 'NULL', NULL, 'add', 159, 160),
(67, 63, 'NULL', NULL, 'edit', 161, 162),
(68, 63, 'NULL', NULL, 'delete', 163, 164),
(69, 63, 'NULL', NULL, 'logout', 165, 166),
(70, 1, 'NULL', NULL, 'Interese', 168, 181),
(71, 70, 'NULL', NULL, 'index', 169, 170),
(72, 70, 'NULL', NULL, 'view', 171, 172),
(73, 70, 'NULL', NULL, 'add', 173, 174),
(74, 70, 'NULL', NULL, 'edit', 175, 176),
(75, 70, 'NULL', NULL, 'delete', 177, 178),
(76, 70, 'NULL', NULL, 'logout', 179, 180),
(77, 1, 'NULL', NULL, 'Pages', 182, 187),
(78, 77, 'NULL', NULL, 'display', 183, 184),
(79, 77, 'NULL', NULL, 'logout', 185, 186),
(80, 1, 'NULL', NULL, 'Pagos', 188, 201),
(81, 80, 'NULL', NULL, 'index', 189, 190),
(82, 80, 'NULL', NULL, 'view', 191, 192),
(83, 80, 'NULL', NULL, 'add', 193, 194),
(84, 80, 'NULL', NULL, 'edit', 195, 196),
(85, 80, 'NULL', NULL, 'delete', 197, 198),
(86, 80, 'NULL', NULL, 'logout', 199, 200),
(87, 1, 'NULL', NULL, 'Pagoterceros', 202, 215),
(88, 87, 'NULL', NULL, 'index', 203, 204),
(89, 87, 'NULL', NULL, 'view', 205, 206),
(90, 87, 'NULL', NULL, 'add', 207, 208),
(91, 87, 'NULL', NULL, 'edit', 209, 210),
(92, 87, 'NULL', NULL, 'delete', 211, 212),
(93, 87, 'NULL', NULL, 'logout', 213, 214),
(94, 1, 'NULL', NULL, 'Roles', 216, 229),
(95, 94, 'NULL', NULL, 'index', 217, 218),
(96, 94, 'NULL', NULL, 'view', 219, 220),
(97, 94, 'NULL', NULL, 'add', 221, 222),
(98, 94, 'NULL', NULL, 'edit', 223, 224),
(99, 94, 'NULL', NULL, 'delete', 225, 226),
(100, 94, 'NULL', NULL, 'logout', 227, 228),
(101, 1, 'NULL', NULL, 'Rols', 230, 243),
(102, 101, 'NULL', NULL, 'index', 231, 232),
(103, 101, 'NULL', NULL, 'view', 233, 234),
(104, 101, 'NULL', NULL, 'add', 235, 236),
(105, 101, 'NULL', NULL, 'edit', 237, 238),
(106, 101, 'NULL', NULL, 'delete', 239, 240),
(107, 101, 'NULL', NULL, 'logout', 241, 242),
(108, 1, 'NULL', NULL, 'Tipopagos', 244, 257),
(109, 108, 'NULL', NULL, 'index', 245, 246),
(110, 108, 'NULL', NULL, 'view', 247, 248),
(111, 108, 'NULL', NULL, 'add', 249, 250),
(112, 108, 'NULL', NULL, 'edit', 251, 252),
(113, 108, 'NULL', NULL, 'delete', 253, 254),
(114, 108, 'NULL', NULL, 'logout', 255, 256),
(115, 1, 'NULL', NULL, 'Users', 258, 275),
(116, 115, 'NULL', NULL, 'index', 259, 260),
(117, 115, 'NULL', NULL, 'login', 261, 262),
(118, 115, 'NULL', NULL, 'logout', 263, 264),
(119, 115, 'NULL', NULL, 'view', 265, 266),
(120, 115, 'NULL', NULL, 'add', 267, 268),
(121, 115, 'NULL', NULL, 'edit', 269, 270),
(122, 115, 'NULL', NULL, 'delete', 271, 272),
(123, 1, 'NULL', NULL, 'AclExtras', 276, 277),
(124, 1, 'NULL', NULL, 'Solointerese', 278, 281),
(125, 124, 'NULL', NULL, 'index', 279, 280),
(126, 30, 'NULL', NULL, 'reporteintereses', 87, 88),
(127, 30, 'NULL', NULL, 'reporteinteres', 89, 90),
(128, 16, 'NULL', NULL, 'add2', 47, 48),
(129, 30, 'NULL', NULL, 'aumentarinteres', 91, 92),
(130, 115, 'NULL', NULL, 'editpass', 273, 274),
(131, 30, 'NULL', NULL, 'delete2', 93, 94),
(132, 30, 'NULL', NULL, 'busca', 95, 96),
(133, 30, 'NULL', NULL, 'buscar', 97, 98),
(134, 30, 'NULL', NULL, 'buscarte', 99, 100),
(135, 30, 'NULL', NULL, 'delete3', 101, 102),
(136, 30, 'NULL', NULL, 'relaciondia', 103, 104),
(137, 30, 'NULL', NULL, 'general', 105, 106),
(138, 30, 'NULL', NULL, 'reportecheque', 107, 108),
(139, 30, 'NULL', NULL, 'deleteall', 109, 110),
(140, 2, 'NULL', NULL, 'totalbancos', 15, 16),
(141, 2, 'NULL', NULL, 'totalbanco', 17, 18),
(142, 1, 'NULL', NULL, 'prestamos', 282, 293),
(143, 142, 'NULL', NULL, 'index', 283, 284),
(144, 142, 'NULL', NULL, 'edit', 285, 286),
(145, 142, 'NULL', NULL, 'delete', 287, 288),
(146, 142, 'NULL', NULL, 'view', 289, 290),
(147, 142, 'NULL', NULL, 'add', 291, 292),
(148, 1, 'NULL', NULL, 'interesprestamos', 294, 307),
(149, 148, 'NULL', NULL, 'all', 295, 296),
(150, 148, 'NULL', NULL, 'add', 297, 298),
(151, 148, 'NULL', NULL, 'index', 299, 300),
(152, 148, 'NULL', NULL, 'delete', 301, 302),
(153, 148, 'NULL', NULL, 'view', 303, 304),
(154, 148, 'NULL', NULL, 'index', 305, 306),
(155, 1, 'NULL', NULL, 'cuotas', 308, 319),
(156, 155, 'NULL', NULL, 'index', 309, 310),
(157, 155, 'NULL', NULL, 'add', 311, 312),
(158, 155, 'NULL', NULL, 'delete', 313, 314),
(159, 155, 'NULL', NULL, 'view', 315, 316),
(160, 155, 'NULL', NULL, 'all', 317, 318),
(161, 1, 'NULL', NULL, 'garantias', 320, 331),
(162, 161, 'NULL', NULL, 'index', 321, 322),
(163, 161, 'NULL', NULL, 'add', 323, 324),
(164, 161, 'NULL', NULL, 'view', 325, 326),
(165, 161, 'NULL', NULL, 'delete', 327, 328),
(166, 161, 'NULL', NULL, 'all', 329, 330),
(167, 1, 'NULL', NULL, 'gestiondecobranzaprestamos', 332, 343),
(168, 167, 'NULL', NULL, 'index', 333, 334),
(169, 167, 'NULL', NULL, 'add', 335, 336),
(170, 167, 'NULL', NULL, 'view', 337, 338),
(171, 167, 'NULL', NULL, 'delete', 339, 340),
(172, 167, 'NULL', NULL, 'all', 341, 342),
(173, 1, 'NULL', NULL, 'transaccionprestamointeres', 344, 355),
(174, 173, 'NULL', NULL, 'index', 345, 346),
(175, 173, 'NULL', NULL, 'add', 347, 348),
(176, 173, 'NULL', NULL, 'view', 349, 350),
(177, 173, 'NULL', NULL, 'delete', 351, 352),
(178, 173, 'NULL', NULL, 'all', 353, 354),
(179, 1, 'NULL', NULL, 'pagodeprestamos', 356, 357),
(180, 1, 'NULL', NULL, 'pagodeprestamos', 358, 369),
(181, 180, 'NULL', NULL, 'index', 359, 360),
(182, 180, 'NULL', NULL, 'add', 361, 362),
(183, 180, 'NULL', NULL, 'view', 363, 364),
(184, 180, 'NULL', NULL, 'delete', 365, 366),
(185, 180, 'NULL', NULL, 'all', 367, 368),
(186, 1, 'NULL', NULL, 'prestamos', 370, 375),
(187, 186, 'NULL', NULL, 'busca', 371, 372),
(188, 186, 'NULL', NULL, 'buscar', 373, 374),
(189, 1, NULL, NULL, 'Prestamo', 376, 377),
(190, 1, NULL, NULL, 'Prestamos', 378, 381),
(191, 190, NULL, NULL, 'refinanciamiento', 379, 380),
(192, 1, NULL, NULL, 'prestamos', 382, 385),
(193, 192, NULL, NULL, 'interesacumulados', 383, 384),
(194, 1, NULL, NULL, 'prestamos', 386, 389),
(195, 194, NULL, NULL, 'interesacumulados', 387, 388),
(196, 1, NULL, NULL, 'Prestamos', 390, 393),
(197, 196, NULL, NULL, 'interesacumulados', 391, 392),
(198, 1, NULL, NULL, 'prestamos', 394, 397),
(199, 198, NULL, NULL, 'interesacumulados', 395, 396),
(200, 1, NULL, NULL, 'prestamos', 398, 403),
(201, 200, NULL, NULL, 'interesacumulado', 399, 400),
(202, 200, NULL, NULL, 'interesacumulados', 401, 402),
(203, 1, NULL, NULL, 'Prestamos', 404, 405),
(204, 1, NULL, NULL, 'Prestamo', 406, 407),
(205, 1, NULL, NULL, 'Prestamos', 408, 411),
(206, 205, NULL, NULL, 'interesesacumulados', 409, 410);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, 'NULL', 1, 10),
(2, NULL, 'Role', 2, 'NULL', 11, 14),
(3, NULL, 'Role', 3, 'NULL', 15, 16),
(4, NULL, 'Role', 4, 'NULL', 17, 22),
(6, 1, 'User', 3, 'NULL', 2, 3),
(7, 2, 'User', 1, 'NULL', 12, 13),
(8, 4, 'User', 4, 'NULL', 18, 19),
(9, 4, 'User', 5, 'NULL', 20, 21),
(13, 1, 'User', 16, 'NULL', 4, 5),
(14, 1, 'User', 17, 'NULL', 6, 7),
(15, 1, 'User', 18, 'NULL', 8, 9);

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
  KEY `fk_aros_acos_acos1_idx` (`aco_id`),
  KEY `fk_aros_acos_aros1_idx` (`aro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

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
(64, 1, 136, '1', '1', '1', '1'),
(65, 2, 136, '1', '1', '1', '1'),
(66, 3, 136, '1', '1', '1', '1'),
(67, 4, 136, '1', '1', '1', '1'),
(68, 1, 137, '1', '1', '1', '1'),
(69, 2, 137, '1', '1', '1', '1'),
(70, 3, 137, '1', '1', '1', '1'),
(71, 4, 137, '1', '1', '1', '1'),
(72, 1, 138, '1', '1', '1', '1'),
(73, 2, 138, '1', '1', '1', '1'),
(74, 3, 138, '1', '1', '1', '1'),
(75, 4, 138, '1', '1', '1', '1'),
(76, 1, 139, '1', '1', '1', '1'),
(77, 1, 141, '1', '1', '1', '1'),
(78, 4, 37, '1', '1', '1', '1'),
(79, 4, 5, '1', '1', '1', '1'),
(80, 4, 52, '1', '1', '1', '1'),
(81, 4, 30, '1', '1', '1', '1'),
(82, 4, 40, '-1', '-1', '-1', '-1'),
(83, 4, 31, '1', '1', '1', '1'),
(84, 4, 19, '1', '1', '1', '1'),
(85, 1, 143, '1', '1', '1', '1'),
(86, 1, 146, '1', '1', '1', '1'),
(87, 1, 145, '1', '1', '1', '1'),
(88, 1, 144, '1', '1', '1', '1'),
(89, 1, 147, '1', '1', '1', '1'),
(90, 1, 149, '1', '1', '1', '1'),
(91, 1, 157, '1', '1', '1', '1'),
(92, 1, 160, '1', '1', '1', '1'),
(93, 1, 166, '1', '1', '1', '1'),
(94, 1, 172, '1', '1', '1', '1'),
(95, 1, 178, '1', '1', '1', '1'),
(96, 1, 185, '1', '1', '1', '1'),
(97, 1, 187, '1', '1', '1', '1'),
(98, 1, 188, '1', '1', '1', '1'),
(99, 1, 191, '1', '1', '1', '1'),
(100, 1, 193, '1', '1', '1', '1'),
(101, 1, 195, '1', '1', '1', '1'),
(102, 1, 196, '1', '1', '1', '1'),
(103, 1, 199, '1', '1', '1', '1'),
(104, 1, 202, '1', '1', '1', '1'),
(105, 1, 206, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banco_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
(9, '0175', 'Bicentenario', 'banco bicentenario', 1),
(15, '0102', 'Venezuela', '', 18),
(16, '0116', 'B.O.D', '', 18),
(17, '0128', 'Caroni', '', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(45) NOT NULL,
  `tabla` varchar(45) NOT NULL,
  `fechamodificado` datetime NOT NULL,
  `enlace` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bitacora_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajabilletes`
--

CREATE TABLE IF NOT EXISTS `cajabilletes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `cierrecaja_id` int(11) NOT NULL,
  `denominacionbillete_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cajabilletes_cierrecaja1_idx` (`cierrecaja_id`),
  KEY `fk_cajabilletes_denominacionbilletes1_idx` (`denominacionbillete_id`)
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
  `estadocheque` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `descuento_id` int(11) DEFAULT NULL COMMENT 'Cuando se hace un descuento y desea modificarse es necesario llevar este registro para recalcular el historico de las deudas del cheque',
  `modificado` date DEFAULT NULL,
  `pago_id` int(11) DEFAULT NULL COMMENT 'Pago_id para saber desde donde se tiene que modificar chequeinteres cuando se modifica el pago',
  PRIMARY KEY (`id`),
  KEY `fk_chequeinterese_cheque1_idx` (`cheque_id`),
  KEY `fk_chequeinterese_user1_idx` (`user_id`),
  KEY `fk_chequeinterese_descuento1_idx` (`descuento_id`),
  KEY `fk_chequeinterese_pagos1_idx` (`pago_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `numerodecuenta` varchar(20) NOT NULL,
  `numerodecheque` varchar(10) NOT NULL,
  `monto` int(11) NOT NULL,
  `interese_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `dir` varchar(65) DEFAULT NULL,
  `fecharecibido` datetime NOT NULL,
  `fechacobro` datetime NOT NULL,
  `dias` int(11) DEFAULT NULL,
  `diaspost` int(11) DEFAULT NULL,
  `cobrado` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL COMMENT 'Cheques que pagan cheque',
  `garantia_id` int(11) DEFAULT NULL,
  `pagodecuotas_id` int(11) DEFAULT NULL COMMENT 'El cheque se guarda R, cuando es pago de cuota de prestamo, este cheque descuenta el prestamo, se abre un nuevo proceso de cheque por cobrar, devuelto o cobrado, y el cobro de intereses a traves del cheque',
  `deuda` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numerodecheque_UNIQUE` (`numerodecheque`),
  KEY `fk_cheque_banco1_idx` (`banco_id`),
  KEY `fk_cheque_cliente1_idx` (`cliente_id`),
  KEY `fk_cheque_cheque1_idx` (`cheque_id`),
  KEY `fk_cheque_user1_idx` (`user_id`),
  KEY `fk_cheques_intereses1_idx` (`interese_id`),
  KEY `fk_cheques_garantia1_idx` (`garantia_id`),
  KEY `fk_cheques_pagodecuotas1_idx` (`pagodecuotas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequespropios`
--

CREATE TABLE IF NOT EXISTS `chequespropios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recibido` int(11) DEFAULT NULL COMMENT 'Recibido 0 ',
  `cobrado` int(11) DEFAULT NULL COMMENT '0 devuelto',
  `monto` float(12,2) DEFAULT NULL,
  `nrocheque` varchar(10) DEFAULT NULL,
  `nrocuenta` varchar(20) DEFAULT NULL,
  `cuentaspropia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chequespropios_cuentaspropias1_idx` (`cuentaspropia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque_estadocheques`
--

CREATE TABLE IF NOT EXISTS `cheque_estadocheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `estadocheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cheque_estadocheque_cheque1_idx` (`cheque_id`),
  KEY `fk_cheque_estadocheque_estadocheque1_idx` (`estadocheque_id`),
  KEY `fk_cheque_estadocheque_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierrecaja`
--

CREATE TABLE IF NOT EXISTS `cierrecaja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) DEFAULT NULL,
  `montototal` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cierrecaja_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `direccion` varchar(45) NOT NULL,
  `telefonofijo` varchar(45) NOT NULL,
  `telefonocelular` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `created`, `cedula`, `nombre`, `apellido`, `apodo`, `negocio`, `direccion`, `telefonofijo`, `telefonocelular`, `email`, `user_id`) VALUES
(3, '2014-06-18 11:18:22', '17877861', 'Jose Ivan', 'Zapata Ramirez', 'oso', 'software', 'urb don hugo casa # 6 gallardin palo gordo', '04147123023', '04263287172', 'joseivanzapatar@gmail.com', 17),
(4, '2014-07-10 07:26:44', '19502246', 'betmart', 'aguilar', 'bet', '', 'urb don hugo casa 6 gallardin palo gordo', '123123123', '123123123', 'jose', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `propia` int(11) NOT NULL COMMENT '0 si es del cliente',
  `titular` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuenta_banco1_idx` (`banco_id`),
  KEY `fk_cuenta_cliente1_idx` (`cliente_id`),
  KEY `fk_cuenta_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentasporpagar`
--

CREATE TABLE IF NOT EXISTS `cuentasporpagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descri` varchar(45) NOT NULL,
  `monto` int(11) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `fechalimite` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuentasporpagar_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentaspropias`
--

CREATE TABLE IF NOT EXISTS `cuentaspropias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nrocuenta` varchar(20) NOT NULL,
  `nombretitular` varchar(100) NOT NULL,
  `correotitular` varchar(45) NOT NULL,
  `cedulatitular` varchar(45) NOT NULL,
  `banco_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuentaspropias_bancos1_idx` (`banco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE IF NOT EXISTS `cuotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `nrocuotas` int(11) NOT NULL,
  `montocuota` float(12,2) DEFAULT NULL,
  `prestamo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cuotas_prestamo1_idx` (`prestamo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `fechaini`, `fechafin`, `nrocuotas`, `montocuota`, `prestamo_id`) VALUES
(1, '2014-08-04', '2014-09-03', 30, 100.00, 71),
(2, '2014-08-09', '2014-09-08', 30, 200.00, 72),
(3, '2014-08-14', '2014-09-13', 30, 1200.00, 73);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denominacionbilletes`
--

CREATE TABLE IF NOT EXISTS `denominacionbilletes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositocaja`
--

CREATE TABLE IF NOT EXISTS `depositocaja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(12,2) DEFAULT NULL,
  `cierrecaja_id` int(11) NOT NULL,
  `cuentaspropia_id` int(11) NOT NULL,
  `nroplanilla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_depositocaja_cierrecaja1_idx` (`cierrecaja_id`),
  KEY `fk_depositocaja_cuentaspropias1_idx` (`cuentaspropia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `nroreferencia` varchar(45) NOT NULL,
  `realizado` int(11) DEFAULT NULL,
  `cuenta_id` int(11) NOT NULL,
  `cuenta_id1` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_depositos_cuentas1_idx` (`cuenta_id`),
  KEY `fk_depositos_cuentas2_idx` (`cuenta_id1`),
  KEY `fk_depositos_clientes1_idx` (`cliente_id`),
  KEY `fk_depositos_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE IF NOT EXISTS `descuento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montodescuento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `razon` varchar(45) DEFAULT NULL,
  `cheques_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_descuento_cheques1_idx` (`cheques_id`),
  KEY `fk_descuento_users1_idx` (`users_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estadocheques`
--

INSERT INTO `estadocheques` (`id`, `nombre`, `nomenclatura`, `descripcion`, `user_id`) VALUES
(1, 'Nuestro', 'R', 'cuando el cheque ya es pagado al cliente', 1),
(2, 'Cliente', 'C', 'Cheque a cambiar en banco y luego pagar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias`
--

CREATE TABLE IF NOT EXISTS `garantias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `montoquecubre` int(11) DEFAULT NULL,
  `pertenecea` varchar(45) DEFAULT NULL,
  `tipogarantia_id` int(11) NOT NULL,
  `prestamo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_garantia_tipogarantia1_idx` (`tipogarantia_id`),
  KEY `fk_garantia_prestamo1_idx` (`prestamo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE IF NOT EXISTS `gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipogasto_id` int(11) NOT NULL,
  `cierrecaja_id` int(11) DEFAULT NULL,
  `cuentaspropia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gastos_tipogastos1_idx` (`tipogasto_id`),
  KEY `fk_gastos_cierrecaja1_idx` (`cierrecaja_id`),
  KEY `fk_gastos_cuentaspropias1_idx` (`cuentaspropia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiondecobranzaprestamo`
--

CREATE TABLE IF NOT EXISTS `gestiondecobranzaprestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date DEFAULT NULL,
  `descripcion` text NOT NULL,
  `prestamo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gestiondecobranzaprestamo_prestamo1_idx` (`prestamo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiondecobranzas`
--

CREATE TABLE IF NOT EXISTS `gestiondecobranzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gestiondecobranza_cheque1_idx` (`cheque_id`),
  KEY `fk_gestiondecobranza_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE IF NOT EXISTS `ingreso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `tipoingreso_id` int(11) NOT NULL,
  `cierrecaja_id` int(11) DEFAULT NULL,
  `cuentaspropia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingreso_tipoingreso1_idx` (`tipoingreso_id`),
  KEY `fk_ingreso_cierrecaja1_idx` (`cierrecaja_id`),
  KEY `fk_ingreso_cuentaspropias1_idx` (`cuentaspropia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE IF NOT EXISTS `intereses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `vigencia` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `maximo` int(11) NOT NULL,
  `montofijo` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interese_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `created`, `vigencia`, `minimo`, `maximo`, `montofijo`, `porcentaje`, `tipo`, `user_id`) VALUES
(1, '2014-09-21 09:40:57', 1, 1000, 5000, 50, 0, 0, 17),
(2, '2014-09-21 09:41:37', 1, 5000, 10000, 100, 0, 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesprestamo`
--

CREATE TABLE IF NOT EXISTS `interesprestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float DEFAULT NULL,
  `tipoprestamo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `interesprestamo`
--

INSERT INTO `interesprestamo` (`id`, `valor`, `tipoprestamo`) VALUES
(5, 20, 1),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `valorestimado` int(11) DEFAULT NULL,
  `tipoinventario_id` int(11) NOT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventario_tipoinventario1_idx` (`tipoinventario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montocuentas`
--

CREATE TABLE IF NOT EXISTS `montocuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(12,2) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cuentaspropia_id` int(11) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_monto_cuentaspropias1_idx` (`cuentaspropia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagodeprestamo`
--

CREATE TABLE IF NOT EXISTS `pagodeprestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montopagado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nroreferencia` varchar(45) DEFAULT NULL,
  `diaspagados` int(11) DEFAULT NULL COMMENT 'Se calcula en base al monto pagado/ monto de la cuota, para facilitar los cálculos a la hora de recalcular',
  `montodeuda` int(11) NOT NULL COMMENT 'este es el monto de la deuda vieja para guardar un historico de lo que debia.',
  `tipopago_id` int(11) NOT NULL,
  `descri` varchar(45) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL COMMENT 'esto es para saber si es un pago de un cliente o un pago de descuento de reinaldo.',
  `user_id` int(11) NOT NULL,
  `prestamo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagodecuotas_tipopagos1_idx` (`tipopago_id`),
  KEY `fk_pagodecuotas_users1_idx` (`user_id`),
  KEY `fk_pagodeprestamo_prestamo1_idx` (`prestamo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `monto` int(11) NOT NULL,
  `conceptode` text NOT NULL,
  `edodeuda` int(11) DEFAULT NULL,
  `pagointerese_deuda` int(11) DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `tipopago_id` int(11) DEFAULT NULL,
  `pagotercero_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nrotransferencia` varchar(45) DEFAULT NULL COMMENT 'En caso de ser un deposito o una transferencia bancaria',
  `cuentaspropia_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `cheque_estadocheque_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pago_tipopago1_idx` (`tipopago_id`),
  KEY `fk_pago_pagotercero1_idx` (`pagotercero_id`),
  KEY `fk_pago_user1_idx` (`user_id`),
  KEY `fk_pagos_cheques1_idx` (`cheque_id`),
  KEY `fk_pagos_cuentaspropias1_idx` (`cuentaspropia_id`),
  KEY `fk_pagos_clientes1_idx` (`cliente_id`),
  KEY `fk_pagos_cheque_estadocheques1_idx` (`cheque_estadocheque_id`)
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
  `conceptode` varchar(45) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `cliente_id1` int(11) NOT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagotercero_cliente1_idx` (`cliente_id`),
  KEY `fk_pagotercero_cliente2_idx` (`cliente_id1`),
  KEY `fk_pagotercero_cheque1_idx` (`cheque_id`),
  KEY `fk_pagotercero_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fechafin` date DEFAULT NULL COMMENT 'si la fecha fin  es null, ',
  `fechainicio` date NOT NULL,
  `montodeuda` float NOT NULL,
  `interesprestamo_id` int(11) DEFAULT NULL,
  `diascalculados` int(11) DEFAULT NULL,
  `diaspagados` int(11) DEFAULT NULL,
  `aprobarprestamo` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prestamo_users1_idx` (`user_id`),
  KEY `fk_prestamo_clientes1_idx` (`cliente_id`),
  KEY `fk_prestamo_interesprestamo1_idx` (`interesprestamo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id`, `cliente_id`, `monto`, `fechafin`, `fechainicio`, `montodeuda`, `interesprestamo_id`, `diascalculados`, `diaspagados`, `aprobarprestamo`, `user_id`) VALUES
(71, 3, 10000, '2014-09-03', '2014-08-04', 7000, 6, 30, 0, NULL, 17),
(72, 3, 20000, '2014-09-08', '2014-08-09', 14000, 6, 30, 0, NULL, 17),
(73, 3, 30000, '2014-09-13', '2014-08-14', 36000, 5, 30, 0, NULL, 17);

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
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descri` varchar(45) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicios_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_cliente`
--

CREATE TABLE IF NOT EXISTS `servicio_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `realizado` int(11) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicio_cliente_clientes1_idx` (`cliente_id`),
  KEY `fk_servicio_cliente_servicios1_idx` (`servicio_id`),
  KEY `fk_servicio_cliente_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogarantias`
--

CREATE TABLE IF NOT EXISTS `tipogarantias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogastos`
--

CREATE TABLE IF NOT EXISTS `tipogastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descri` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoingreso`
--

CREATE TABLE IF NOT EXISTS `tipoingreso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descri` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinventario`
--

CREATE TABLE IF NOT EXISTS `tipoinventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipopagos`
--

INSERT INTO `tipopagos` (`id`, `nombre`, `descripcion`, `user_id`) VALUES
(4, 'Transferencia', 'Transferencia electronica', 17),
(5, 'Efectivo', 'Paga en efectivo', 17),
(6, 'Deposito', 'Traen el deposito de la deuda', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccioncuentas`
--

CREATE TABLE IF NOT EXISTS `transaccioncuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(12,2) DEFAULT NULL,
  `deposito` int(11) DEFAULT NULL COMMENT '0 retiro',
  `cuentaspropia_id` int(11) NOT NULL,
  `nroreferencia` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cuentaspropias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_transaccioncuenta_cuentaspropias1_idx` (`cuentaspropia_id`),
  KEY `fk_transaccioncuenta_cuentaspropias2_idx` (`cuentaspropias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descri` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccionprestamointeres`
--

CREATE TABLE IF NOT EXISTS `transaccionprestamointeres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prestamo_id` int(11) NOT NULL,
  `montointeres` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fechamodificacion` date DEFAULT NULL,
  `montodeuda` float NOT NULL,
  `pagodeprestamo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_transaccionprestamointeres_prestamo1_idx` (`prestamo_id`),
  KEY `fk_transaccionprestamointeres_pagodeprestamo1_idx` (`pagodeprestamo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `transaccionprestamointeres`
--

INSERT INTO `transaccionprestamointeres` (`id`, `prestamo_id`, `montointeres`, `fecha`, `fechamodificacion`, `montodeuda`, `pagodeprestamo_id`) VALUES
(1, 71, 3000, '2014-08-04', '2014-08-04', 7000, NULL),
(2, 72, 6000, '2014-08-09', '2014-08-09', 14000, NULL),
(8, 71, 1400, '2014-08-05', '2014-08-18', 7000, NULL),
(9, 72, 1800, '2014-08-10', '2014-08-18', 14000, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_clientes`
--

CREATE TABLE IF NOT EXISTS `transaccion_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabla de totales',
  `transaccione_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `suma` int(11) DEFAULT NULL COMMENT 'Lo que suma',
  `resta` int(11) DEFAULT NULL COMMENT 'Los monto que restan',
  `realizado` int(11) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  KEY `fk_servicios_has_clientes_clientes1_idx` (`cliente_id`),
  KEY `fk_servicios_has_clientes_servicios1_idx` (`transaccione_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `nombre`, `apellido`) VALUES
(1, 'reinaldo', 'c3e8d48b955261997637b093321fd13b83bf53c3', 1, 'Reinaldo', 'Rangel'),
(16, 'betmart', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'Betmart Stella', 'Aguilar Gómez'),
(17, 'josezapata', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'Jose I.', 'Zapata'),
(18, 'marly', '8b5393ea82b50dd0b65232224271bd930ec801ea', 1, 'Marly', 'Colmenares');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD CONSTRAINT `fk_aros_acos_acos1` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aros_acos_aros1` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD CONSTRAINT `fk_banco_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `fk_bitacora_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajabilletes`
--
ALTER TABLE `cajabilletes`
  ADD CONSTRAINT `fk_cajabilletes_cierrecaja1` FOREIGN KEY (`cierrecaja_id`) REFERENCES `cierrecaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cajabilletes_denominacionbilletes1` FOREIGN KEY (`denominacionbillete_id`) REFERENCES `denominacionbilletes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `chequeinterese`
--
ALTER TABLE `chequeinterese`
  ADD CONSTRAINT `fk_chequeinterese_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chequeinterese_descuento1` FOREIGN KEY (`descuento_id`) REFERENCES `descuento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chequeinterese_pagos1` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chequeinterese_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `fk_cheques_garantia1` FOREIGN KEY (`garantia_id`) REFERENCES `garantias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheques_intereses1` FOREIGN KEY (`interese_id`) REFERENCES `intereses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheques_pagodecuotas1` FOREIGN KEY (`pagodecuotas_id`) REFERENCES `pagodeprestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_banco1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chequespropios`
--
ALTER TABLE `chequespropios`
  ADD CONSTRAINT `fk_chequespropios_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cheque_estadocheques`
--
ALTER TABLE `cheque_estadocheques`
  ADD CONSTRAINT `fk_cheque_estadocheque_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_estadocheque_estadocheque1` FOREIGN KEY (`estadocheque_id`) REFERENCES `estadocheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cheque_estadocheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cierrecaja`
--
ALTER TABLE `cierrecaja`
  ADD CONSTRAINT `fk_cierrecaja_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `cuentasporpagar`
--
ALTER TABLE `cuentasporpagar`
  ADD CONSTRAINT `fk_cuentasporpagar_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentaspropias`
--
ALTER TABLE `cuentaspropias`
  ADD CONSTRAINT `fk_cuentaspropias_bancos1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `fk_cuotas_prestamo1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `depositocaja`
--
ALTER TABLE `depositocaja`
  ADD CONSTRAINT `fk_depositocaja_cierrecaja1` FOREIGN KEY (`cierrecaja_id`) REFERENCES `cierrecaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_depositocaja_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD CONSTRAINT `fk_depositos_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_depositos_cuentas1` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_depositos_cuentas2` FOREIGN KEY (`cuenta_id1`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_depositos_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD CONSTRAINT `fk_descuento_cheques1` FOREIGN KEY (`cheques_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_descuento_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadocheques`
--
ALTER TABLE `estadocheques`
  ADD CONSTRAINT `fk_estadocheque_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `garantias`
--
ALTER TABLE `garantias`
  ADD CONSTRAINT `fk_garantia_prestamo1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_garantia_tipogarantia1` FOREIGN KEY (`tipogarantia_id`) REFERENCES `tipogarantias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_gastos_cierrecaja1` FOREIGN KEY (`cierrecaja_id`) REFERENCES `cierrecaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_tipogastos1` FOREIGN KEY (`tipogasto_id`) REFERENCES `tipogastos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gestiondecobranzaprestamo`
--
ALTER TABLE `gestiondecobranzaprestamo`
  ADD CONSTRAINT `fk_gestiondecobranzaprestamo_prestamo1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestiondecobranzas`
--
ALTER TABLE `gestiondecobranzas`
  ADD CONSTRAINT `fk_gestiondecobranza_cheque1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gestiondecobranza_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_cierrecaja1` FOREIGN KEY (`cierrecaja_id`) REFERENCES `cierrecaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_tipoingreso1` FOREIGN KEY (`tipoingreso_id`) REFERENCES `tipoingreso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD CONSTRAINT `fk_interese_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_tipoinventario1` FOREIGN KEY (`tipoinventario_id`) REFERENCES `tipoinventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `montocuentas`
--
ALTER TABLE `montocuentas`
  ADD CONSTRAINT `fk_monto_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagodeprestamo`
--
ALTER TABLE `pagodeprestamo`
  ADD CONSTRAINT `fk_pagodecuotas_tipopagos1` FOREIGN KEY (`tipopago_id`) REFERENCES `tipopagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagodecuotas_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagodeprestamo_prestamo1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_cheques1` FOREIGN KEY (`cheque_id`) REFERENCES `cheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagos_cheque_estadocheques1` FOREIGN KEY (`cheque_estadocheque_id`) REFERENCES `cheque_estadocheques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagos_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pagos_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_prestamo_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prestamo_interesprestamo1` FOREIGN KEY (`interesprestamo_id`) REFERENCES `interesprestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prestamo_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_servicios_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  ADD CONSTRAINT `fk_servicio_cliente_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_cliente_servicios1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_servicio_cliente_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipopagos`
--
ALTER TABLE `tipopagos`
  ADD CONSTRAINT `fk_tipopago_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaccioncuentas`
--
ALTER TABLE `transaccioncuentas`
  ADD CONSTRAINT `fk_transaccioncuenta_cuentaspropias1` FOREIGN KEY (`cuentaspropia_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaccioncuenta_cuentaspropias2` FOREIGN KEY (`cuentaspropias_id`) REFERENCES `cuentaspropias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaccionprestamointeres`
--
ALTER TABLE `transaccionprestamointeres`
  ADD CONSTRAINT `fk_transaccionprestamointeres_pagodeprestamo1` FOREIGN KEY (`pagodeprestamo_id`) REFERENCES `pagodeprestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaccionprestamointeres_prestamo1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion_clientes`
--
ALTER TABLE `transaccion_clientes`
  ADD CONSTRAINT `fk_servicios_has_clientes_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicios_has_clientes_servicios1` FOREIGN KEY (`transaccione_id`) REFERENCES `transacciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuario_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
