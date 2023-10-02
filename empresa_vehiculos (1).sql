-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-09-2023 a las 20:55:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `melo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE `comprador` (
  `id_comprador` bigint(20) NOT NULL,
  `nombre_comprador` varchar(50) NOT NULL,
  `apellido_comprador` varchar(50) NOT NULL,
  `Tel_comprador` varchar(50) NOT NULL,
  `Direccion_comprador` varchar(100) NOT NULL,
  `Edad_comprador` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidoP` varchar(250) NOT NULL,
  `apellidoM` varchar(250) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `Fecha_registro` datetime NOT NULL,
  `precio_registro` int(11) NOT NULL,
  `id_comprador` bigint(20) NOT NULL,
  `Placa_vehiculo` varchar(50) NOT NULL,
  `id_empleado` bigint(20) NOT NULL,
  `Ganancia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_vehiculo`
--

CREATE TABLE `tipo_de_vehiculo` (
  `id_tipo_vehiculo` int(11) NOT NULL,
  `Tipo_vehiculo` varchar(100) NOT NULL,
  `Nombre_vehiculo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `Placa_vehiculo` varchar(50) NOT NULL,
  `id_tipo_vehiculo` int(50) NOT NULL,
  `modelo_vehiculo` int(11) NOT NULL,
  `marca_vehiculo` varchar(50) NOT NULL,
  `serie_vehiculo` varchar(50) NOT NULL,
  `clasificacion_vehiculo` varchar(50) NOT NULL,
  `cilindraje` varchar(50) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id_comprador`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id` (`id_empleado`),
  ADD KEY `Placa_vehiculo` (`Placa_vehiculo`),
  ADD KEY `id_comprador` (`id_comprador`);

--
-- Indices de la tabla `tipo_de_vehiculo`
--
ALTER TABLE `tipo_de_vehiculo`
  ADD PRIMARY KEY (`id_tipo_vehiculo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`Placa_vehiculo`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD KEY `id_tipo_vehiculo_2` (`id_tipo_vehiculo`),
  ADD KEY `id_tipo_vehiculo_3` (`id_tipo_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`Placa_vehiculo`) REFERENCES `vehiculo` (`Placa_vehiculo`),
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`id_comprador`) REFERENCES `comprador` (`id_comprador`),
  ADD CONSTRAINT `registro_ibfk_4` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipo_de_vehiculo` (`id_tipo_vehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
