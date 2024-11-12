-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2022 a las 02:15:35
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idConductores` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Rh` varchar(5) NOT NULL,
  `Eps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idConductores`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Rh`, `Eps`) VALUES
(16, 100362812, 'Mariana', 'Rodriguez', '38271934', 'A+', 'Salud total'),
(18, 1001765408, 'Esteban', 'Lopez', '3054684053', 'O+', 'Nueva EPS'),
(19, 1866778756, 'Juan', 'Cantillo', '35467656465', 'B-', 'No'),
(21, 1070944434, 'Nestor', 'Torres Barragan', '3147958562', 'O+', 'Sura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor_vehiculo`
--

CREATE TABLE `conductor_vehiculo` (
  `idConductores` int(11) NOT NULL,
  `idVehiculos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresas` int(11) NOT NULL,
  `Nit` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pagina_Web` varchar(50) NOT NULL,
  `idVehiculos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresas`, `Nit`, `Nombre`, `Direccion`, `Telefono`, `Email`, `Pagina_Web`, `idVehiculos`) VALUES
(18, 2233, 'Sotraur', 'carrer 14 numero 23-32 apartamento 202', '3116003344', 'Sotraur@gmail.com', 'www.Sotraur.com', 27),
(19, 2222, 'Cootraur', '24-32 apartamento', '6482749928', 'cootraur@gmail.com', 'www.cootraur.com', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `idPasajeros` int(11) NOT NULL,
  `Tipo_Documento` varchar(50) NOT NULL,
  `Numero_Documento` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Fecha_Viaje` date NOT NULL,
  `Origen` varchar(50) NOT NULL,
  `Destino` varchar(50) NOT NULL,
  `Valor_Pasaje` int(10) NOT NULL,
  `idVehiculos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`idPasajeros`, `Tipo_Documento`, `Numero_Documento`, `Nombres`, `Apellidos`, `Fecha_Viaje`, `Origen`, `Destino`, `Valor_Pasaje`, `idVehiculos`) VALUES
(24, 'CC', 1001765408, 'Esteban', 'López', '2022-09-23', 'Medellin', 'Armeni', 60000, 27),
(25, 'TI', 139482492, 'Nestor', 'Torres', '2021-11-23', 'Armenia', 'Cartagena', 70000, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculos` int(11) NOT NULL,
  `Numero_Vehiculo` int(10) NOT NULL,
  `Tipo_Vehiculo` varchar(50) NOT NULL,
  `Placa` varchar(50) NOT NULL,
  `Modelo` int(5) NOT NULL,
  `idConductores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idVehiculos`, `Numero_Vehiculo`, `Tipo_Vehiculo`, `Placa`, `Modelo`, `idConductores`) VALUES
(27, 2202, 'Elegant', 'MUN-202', 2020, 16),
(28, 1456, 'Performans', 'BTS-475', 2019, 18),
(29, 596, 'Corriente', 'ATB-789', 2018, 19),
(30, 2303, 'Performans', 'MPD-640', 2021, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idConductores`);

--
-- Indices de la tabla `conductor_vehiculo`
--
ALTER TABLE `conductor_vehiculo`
  ADD KEY `iidConductores` (`idConductores`),
  ADD KEY `idVehiculos` (`idVehiculos`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresas`),
  ADD KEY `idVehiculos` (`idVehiculos`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`idPasajeros`),
  ADD KEY `idVehiculos` (`idVehiculos`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculos`),
  ADD KEY `idConductores` (`idConductores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idConductores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `idPasajeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor_vehiculo`
--
ALTER TABLE `conductor_vehiculo`
  ADD CONSTRAINT `conductor_vehiculo_ibfk_1` FOREIGN KEY (`idConductores`) REFERENCES `conductor` (`idConductores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_vehiculo_ibfk_2` FOREIGN KEY (`idVehiculos`) REFERENCES `vehiculo` (`idVehiculos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idVehiculos`) REFERENCES `vehiculo` (`idVehiculos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`idVehiculos`) REFERENCES `vehiculo` (`idVehiculos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
