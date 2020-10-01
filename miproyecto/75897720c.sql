-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2015 a las 01:40:25
-- Versión del servidor: 5.6.23-log
-- Versión de PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `75897720c`
--
CREATE DATABASE IF NOT EXISTS `75897720c` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `75897720c`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

DROP TABLE IF EXISTS `recursos`;
CREATE TABLE IF NOT EXISTS `recursos` (
  `codigo_recurso` int(10) NOT NULL,
  `nombre_recurso` varchar(20) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `lugar` varchar(20) NOT NULL,
  `horario` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`codigo_recurso`, `nombre_recurso`, `descripcion`, `lugar`, `horario`) VALUES
(13, 'G1', 'Recurso 1', 'Mesa1', '11:20'),
(14, 'G2', 'Recurso2', 'Mesa2', '11:40'),
(15, 'G3', 'Recurso 3', 'Mesa3', '11:50'),
(16, 'G4', 'Recurso 4', 'Mesa4', '12:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_asignado`
--

DROP TABLE IF EXISTS `recurso_asignado`;
CREATE TABLE IF NOT EXISTS `recurso_asignado` (
  `codigo_usuario` int(10) NOT NULL,
  `codigo_recurso` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'En espera',
  `hora_asignacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lugar` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recurso_asignado`
--

INSERT INTO `recurso_asignado` (`codigo_usuario`, `codigo_recurso`, `nombre`, `DNI`, `usuario`, `Estado`, `hora_asignacion`, `lugar`) VALUES
(11, '13', 'Hola', '75897720C', 'cliente', 'Atendido', '2015-06-01 23:14:59', 'Mesa1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `DNI` varchar(9) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `usuario`, `clave`, `email`, `tipo`, `nombre`, `apellidos`, `sexo`) VALUES
('23423422c', 'admin', 'admin', 'admin@hotmail.es', 'administrador', 'admin', 'admin', 'Hombre'),
('75897720C', 'cliente', 'cliente', 'cliente@hotmail.es', 'cliente', 'cliente', 'cliente', 'Mujer'),
('75897720K', 'cliente1', 'cliente1', 'cliente1@hotmail.es', 'cliente', 'cliente1', 'cliente1', 'Hombre'),
('89747324O', 'profesional', 'profesional', 'profesional@hotmail.es', 'profesional', 'profesional', 'profesional', 'Mujer'),
('89756732C', 'profesional1', 'profesional1', 'profesional1@hotmail.es', 'profesional', 'profesional1', 'profesional1', 'Mujer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`codigo_recurso`);

--
-- Indices de la tabla `recurso_asignado`
--
ALTER TABLE `recurso_asignado`
  ADD PRIMARY KEY (`codigo_usuario`,`codigo_recurso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `codigo_recurso` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `recurso_asignado`
--
ALTER TABLE `recurso_asignado`
  MODIFY `codigo_usuario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
