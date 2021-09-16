-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 10, 2020 at 06:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `baseforo`
--
CREATE DATABASE IF NOT EXISTS `baseforo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `baseforo`;

-- --------------------------------------------------------

--
-- Table structure for table `foro`
--

CREATE TABLE `foro` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foro`
--

INSERT INTO `foro` (`id`, `usuario`, `fecha`, `mensaje`) VALUES
(1, 'abrito', '2020-12-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(2, 'cvaldovinos', '2020-12-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et'),
(4, 'inavarro', '2020-12-04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(5, 'jperez', '2020-12-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(6, 'msaavedra', '2020-12-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(7, 'nramirez', '2020-12-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(47, 'rvilches', '2020-12-01', 'Recuerde que los mensajes pueden ser eliminados por el administrador'),
(48, 'iaguilera', '2020-12-04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `nacionalidad` varchar(30) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`, `nombre`, `apellido`, `tipo`, `imagen`, `nacionalidad`, `activo`) VALUES
('abrito', '234', 'Alan', 'Brito', 'U', 'imagen6.jpg', 'Canadiense', 1),
('cvaldovinos', '543', 'Carlos', 'Valdovinos', 'U', 'imagen5.jpg', 'Peruano', 1),
('iaguilera', '678', 'Ignacia', 'Aguilera', 'U', 'imagen4.jpg', 'Argentino', 0),
('inavarro', '234', 'Ingrid', 'Navarro', 'U', 'imagen3.jpg', 'Chileno', 1),
('jperez', '687', 'Juan', 'Perez', 'U', 'imagen7.jpg', 'Boliviano', 0),
('msaavedra', '789', 'Mariana', 'Saavedra', 'U', 'imagen8.jpg', 'Venezolano', 0),
('nramirez', '123', 'Nelson', 'Ramirez', 'U', 'imagen2.jpg', 'Chileno', 1),
('rvilches', '123', 'Romina', 'Vilches', 'A', 'imagen1.jpg', 'Chileno', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foro_usuario` (`usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `fk_foro_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`);
