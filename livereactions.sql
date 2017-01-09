-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 03:19 AM
-- Server version: 5.6.27
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livereactions`
--

-- --------------------------------------------------------

--
-- Table structure for table `reacciones`
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reacciones`
--

INSERT INTO `reacciones` (`id`, `nombre`, `likes`, `love`, `haha`, `wow`, `sad`, `angry`, `anchoreacciones`, `imagen`, `cantidad`, `id_fb`, `status`) VALUES
(17, 'ejemplo', '0|0', '820|900', '820|900', '820|900', '820|900', '0|0', 480, 'uploads/azucar.jpg', 4, '949617175173797', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasena`, `rol`) VALUES
(1, 'jbecerraromero@gmail.com', '5140106451340684a8beddcfae8ccb37', 1),
(2, 'ejemplo@ejemplo.com', 'a83f0f76c2afad4f5d7260824430b798', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reacciones`
--
ALTER TABLE `reacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reacciones`
--
ALTER TABLE `reacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
