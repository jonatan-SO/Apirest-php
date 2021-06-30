-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 19:15:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `ID_INSTRUCTOR` smallint(6) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SEXO` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `RFC` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FORMACION` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`ID_INSTRUCTOR`, `NOMBRE`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `SEXO`, `RFC`, `FORMACION`) VALUES
(1, 'jonatan', 'Santamaria', 'Olea', 'H', 'MIXSIIN5S8S8', 'Educación superior'),
(2, 'yovaniel', 'Sanches', 'Ortiz', 'H', 'RIDNH2D5D5', 'Educación superior'),
(3, 'KAREN', 'MOLINA', 'CAMPOS', 'M', 'K6S5DDDFG5', 'Educación superior'),
(4, 'VICTOR', 'PEREX', 'CAMPOS', 'H', 'VVBE5D5D45D', 'Educación superior'),
(5, 'CARLOS', 'PEREZ', 'PAEZ', 'H', 'CATDIDIO55D', 'Educación superior'),
(6, 'GERMAN', 'ALMONTE', 'PEÑALOZA', 'H', 'GAP9D8D8D5', 'Educación superior'),
(7, 'CARMEN', 'ALCARAZ', 'JIRO', 'M', 'CA4EE98D', 'Educación superior'),
(8, 'OMIR', 'MOREO', 'VARGAS', 'H', 'O4D4D4D45D', 'Educación superior'),
(9, 'XIMENA', 'ARENAS', 'VARGAS', 'M', 'X1MD5DDDE8', 'Educación superior'),
(10, 'JUAN', 'ALFARO', 'PEREZ', 'M', 'J8QOE9RNR4', 'Educación superior');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID_INSTRUCTOR`),
  ADD UNIQUE KEY `ID_INSTRUCTOR` (`ID_INSTRUCTOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
