-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2018 a las 00:14:43
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ncsm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `doctor` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentario` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cobro` float DEFAULT NULL,
  `activa` tinyint(1) NOT NULL,
  `appt` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apmt` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `hora`, `fecha`, `nombre`, `doctor`, `comentario`, `cobro`, `activa`, `appt`, `apmt`) VALUES
(8, '07:00:00', '2018-10-21', 'Erick', 'Erick Ochoa Vidales', 'El paciente es subsecuente', NULL, 1, 'Ochoa', 'Vidales'),
(9, '07:00:00', '2018-10-21', 'ALAN FERNANDO', 'Erick Ochoa Vidales', 'ASDASDASDASDASD', NULL, 1, 'CASTILLO', 'VERDUGO'),
(10, '07:00:00', '2018-11-20', 'ASDASD ASDASDASD  SDASD  SDASD ', 'Erick Ochoa Vidales', 'ASDASDASDASDASD', NULL, 1, 'DFASDFSADF', 'FGDGHDH'),
(11, '14:00:00', '2018-10-24', 'dfdsfs', 'Erick Ochoa Vidales', 'dfsgdgsdfs', NULL, 1, 'sdfd', 'dfsdf'),
(12, '07:00:00', '2018-10-26', 'sdfgsdfsd', 'Erick Ochoa Vidales', '', NULL, 1, 'xdfsdfsd', 'dfsdfs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `appat` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apmat` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lunini` time DEFAULT NULL,
  `lunfin` time DEFAULT NULL,
  `marini` time DEFAULT NULL,
  `marfin` time DEFAULT NULL,
  `mieini` time DEFAULT NULL,
  `miefin` time DEFAULT NULL,
  `jueini` time DEFAULT NULL,
  `juefin` time DEFAULT NULL,
  `vieini` time DEFAULT NULL,
  `viefin` time DEFAULT NULL,
  `sabini` time DEFAULT NULL,
  `sabfin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `appat`, `apmat`, `especialidad`, `lunini`, `lunfin`, `marini`, `marfin`, `mieini`, `miefin`, `jueini`, `juefin`, `vieini`, `viefin`, `sabini`, `sabfin`) VALUES
(3, 'Alan Fernando', 'Castillo ', 'Verdugo', '', '10:10:00', '10:10:00', '10:10:00', '10:10:00', '10:10:00', '10:10:00', '10:10:00', '10:10:00', '10:01:00', '10:10:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(2, 'GinecÃ³logo'),
(3, 'Laboratorio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
