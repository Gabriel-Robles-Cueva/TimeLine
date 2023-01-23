-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2023 a las 18:10:58
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_timeline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas`
--

CREATE TABLE `cartas` (
  `ID` int(11) NOT NULL,
  `MAZO` varchar(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `AÑO` int(11) NOT NULL,
  `IMAGEN` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_mazos`
--

CREATE TABLE `cartas_mazos` (
  `ID` int(11) NOT NULL,
  `ID_CARTA` int(11) NOT NULL,
  `ID_MAZO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `PUNTUACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mazos`
--

CREATE TABLE `mazos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MAZO` (`MAZO`);

--
-- Indices de la tabla `cartas_mazos`
--
ALTER TABLE `cartas_mazos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`ID_CARTA`),
  ADD KEY `ID_2` (`ID`,`ID_MAZO`),
  ADD KEY `ID_CARTA` (`ID_CARTA`),
  ADD KEY `ID_MAZO` (`ID_MAZO`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `mazos`
--
ALTER TABLE `mazos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NOMBRE` (`NOMBRE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartas`
--
ALTER TABLE `cartas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cartas_mazos`
--
ALTER TABLE `cartas_mazos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mazos`
--
ALTER TABLE `mazos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cartas`
--
ALTER TABLE `cartas`
  ADD CONSTRAINT `cartas_ibfk_1` FOREIGN KEY (`MAZO`) REFERENCES `mazos` (`NOMBRE`);

--
-- Filtros para la tabla `cartas_mazos`
--
ALTER TABLE `cartas_mazos`
  ADD CONSTRAINT `cartas_mazos_ibfk_1` FOREIGN KEY (`ID_CARTA`) REFERENCES `cartas` (`ID`),
  ADD CONSTRAINT `cartas_mazos_ibfk_2` FOREIGN KEY (`ID_MAZO`) REFERENCES `mazos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
