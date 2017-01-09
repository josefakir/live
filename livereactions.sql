-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-01-2017 a las 20:32:04
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `livereactions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones`
--

CREATE TABLE `reacciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `likes` varchar(255) DEFAULT NULL,
  `love` varchar(255) DEFAULT NULL,
  `haha` varchar(255) DEFAULT NULL,
  `wow` varchar(255) DEFAULT NULL,
  `sad` varchar(255) DEFAULT NULL,
  `angry` varchar(255) DEFAULT NULL,
  `anchoreacciones` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_fb` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `color` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reacciones`
--

INSERT INTO `reacciones` (`id`, `nombre`, `likes`, `love`, `haha`, `wow`, `sad`, `angry`, `anchoreacciones`, `imagen`, `cantidad`, `id_fb`, `status`, `color`) VALUES
(20, 'Ejemplo', '816|900', '228|672', '172|252', '262|342', '222|432', '120|298', 320, 'uploads/../uploads/20170109081512liveactazucar.jpg', 6, '1234567890', 1, '#000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasena`, `rol`) VALUES
(1, 'jbecerraromero@gmail.com', '5140106451340684a8beddcfae8ccb37', 1),
(2, 'ejemplo@ejemplo.com', 'a83f0f76c2afad4f5d7260824430b798', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
