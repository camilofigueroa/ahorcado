-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2016 a las 05:31:55
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ahorcado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `documento` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `tiempo_juego` datetime DEFAULT NULL,
  `tiempo_segundos` double DEFAULT NULL,
  `tiempo_minutos` double DEFAULT NULL,
  `sn_ganador` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`documento`, `nombre`, `fecha_registro`, `fecha_inicio`, `fecha_fin`, `tiempo_juego`, `tiempo_segundos`, `tiempo_minutos`, `sn_ganador`) VALUES
('1111', 'Adoflo', '2016-10-23 19:56:42', '2016-10-23 19:56:42', '2016-10-23 20:57:45', NULL, NULL, NULL, NULL),
('3434534', 'Camilo Figuero', '2016-10-23 20:03:47', '2016-10-23 20:03:47', NULL, NULL, NULL, NULL, NULL),
('43253543', 'scdgfsdhgfds', '2016-10-23 19:58:21', '2016-10-23 19:58:21', NULL, NULL, NULL, NULL, NULL),
('45436546354', 'Robertop', '2016-10-23 20:29:14', '2016-10-23 20:29:14', NULL, NULL, NULL, NULL, NULL),
('456666', 'Yaniara', '2016-10-23 19:57:11', '2016-10-23 19:57:11', '2016-10-23 21:17:00', '2016-10-23 01:19:49', NULL, NULL, NULL),
('543534', 'cdsgfdgfds', '2016-10-23 20:00:03', '2016-10-23 20:00:03', NULL, NULL, NULL, NULL, NULL),
('54364', 'Camiloooo', '2016-10-23 19:54:11', '2016-10-23 19:54:11', '2016-10-23 21:42:38', '2016-10-23 01:48:27', NULL, NULL, 0),
('545645', 'CAmilo', '2016-10-23 19:48:13', '2016-10-23 19:48:13', NULL, NULL, NULL, NULL, NULL),
('567', 'Rojas', '2016-10-23 19:49:07', '2016-10-23 19:49:07', '2016-10-23 21:07:20', NULL, NULL, NULL, NULL),
('6546546546', 'Camilo Figueroa', '2016-10-23 20:12:38', '2016-10-23 20:12:38', NULL, NULL, NULL, NULL, NULL),
('861000005', 'Camilo F5', '2016-10-23 21:43:03', '2016-10-23 21:43:03', '2016-10-23 21:43:18', '2016-10-23 00:00:15', NULL, NULL, 0),
('86100002', 'Camilo f 2', '2016-10-23 21:21:48', '2016-10-23 21:21:48', '2016-10-23 21:22:04', '2016-10-23 00:00:16', NULL, NULL, NULL),
('86100003', 'Camilo f 3', '2016-10-23 21:25:34', '2016-10-23 21:25:34', NULL, NULL, NULL, NULL, NULL),
('86100004', 'Camilo F 4', '2016-10-23 21:28:22', '2016-10-23 21:28:22', '2016-10-23 21:28:46', '2016-10-23 00:00:24', NULL, NULL, NULL),
('86100006', 'Camilo F 6', '2016-10-23 21:45:29', '2016-10-23 21:45:29', '2016-10-23 21:46:17', '2016-10-23 00:00:48', NULL, NULL, 1),
('86100007', 'Camilo F 7', '2016-10-23 21:46:35', '2016-10-23 21:46:35', '2016-10-23 21:46:53', '2016-10-23 00:00:18', NULL, NULL, -3),
('86100008', 'Camilo F 8', '2016-10-23 21:47:16', '2016-10-23 21:47:16', '2016-10-23 21:49:16', '2016-10-23 00:02:00', NULL, NULL, -2),
('861000082', 'Bernarda Quintin', '2016-10-23 22:27:34', '2016-10-23 22:27:34', '2016-10-23 22:27:58', '2016-10-23 00:00:24', NULL, NULL, 1),
('86100009', 'Camilo F 9', '2016-10-23 22:24:40', '2016-10-23 22:24:40', '2016-10-23 22:25:03', '2016-10-23 00:00:23', NULL, NULL, 1),
('861001001', 'Camilo 1', '2016-10-23 21:08:02', '2016-10-23 21:08:02', '2016-10-23 21:08:23', NULL, NULL, NULL, NULL),
('gdfgfdh', 'vfdhgdfh', '2016-10-23 20:01:00', '2016-10-23 20:01:00', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`documento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
