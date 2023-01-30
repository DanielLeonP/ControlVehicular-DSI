-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2021 a las 03:05:28
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlvehicular30`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `IdConductor` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `TipoSangre` enum('O negativo','O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo') NOT NULL,
  `Domicilio` varchar(70) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Donador` char(2) NOT NULL,
  `Foto` blob NOT NULL,
  `Observacion` varchar(50) NOT NULL,
  `TelefonoEmergencia` char(10) NOT NULL,
  `Antiguedad` date NOT NULL,
  `Restricciones` varchar(60) NOT NULL,
  `Firma` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`IdConductor`, `Nombre`, `TipoSangre`, `Domicilio`, `FechaNacimiento`, `Donador`, `Foto`, `Observacion`, `TelefonoEmergencia`, `Antiguedad`, `Restricciones`, `Firma`) VALUES
(1, 'Daniel Leon Paulin', 'B negativo', 'Queretaro', '2001-10-27', 'No', 0x462e6a7067, 'Ninguna', '4421452984', '2016-06-28', 'Ninguna', 0x492e6a7067),
(2, 'Miguel Oviedo Robles', 'AB negativo', 'Queretaro', '1996-06-12', 'Si', 0x46202d20636f7069612e6a7067, 'Ninguna', '4425984695', '2021-05-05', 'Usa lentes', 0x49202d20636f7069612e6a7067),
(3, 'Adrian Jaramillo Mateos', 'A negativo', 'Queretaro', '2002-02-05', 'No', 0x46202d20636f706961202832292e6a7067, 'Ninguna', '4478965374', '2021-05-28', 'Ninguna', 0x49202d20636f706961202832292e6a7067),
(4, 'Erika Pineda Juarez', 'A positivo', 'Queretaro', '1989-07-03', 'Si', 0x46202d20636f706961202833292e6a7067, 'Ninguna', '4498653298', '2021-05-06', 'Usa lentes', 0x49202d20636f706961202833292e6a7067),
(5, 'Jorge Jimenez Pineda', 'B positivo', 'Queretaro', '1984-06-28', 'No', 0x46202d20636f706961202834292e6a7067, 'Ninguna', '4423659878', '2000-06-12', 'Ninguna', 0x49202d20636f706961202834292e6a7067),
(6, 'Manuel Rodriguez Molina', 'AB positivo', 'Queretaro', '1996-12-19', 'Si', 0x46202d20636f706961202837292e6a7067, 'Ninguna', '4423896544', '2021-05-07', 'Usa Lentes', 0x49202d20636f706961202837292e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `Numero` int(11) NOT NULL,
  `FechaExp` date NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `IdConductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`Numero`, `FechaExp`, `Tipo`, `FechaVencimiento`, `IdConductor`) VALUES
(1, '2021-04-07', 'Automovilista', '2024-10-15', 1),
(2, '2021-04-09', 'Automovilista', '2024-10-18', 2),
(3, '2021-04-01', 'Automovilista', '2024-10-21', 3),
(4, '2021-04-24', 'Automovilista', '2024-10-30', 4),
(5, '2021-04-11', 'Automovilista', '2024-10-13', 5),
(6, '2021-04-07', 'Automovilista', '2024-10-09', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `IdMulta` int(11) NOT NULL,
  `Motivo` varchar(100) NOT NULL,
  `Agente` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Lugar` varchar(70) NOT NULL,
  `Garantia` enum('Tarjeta','Verificacion','Licencia') NOT NULL,
  `Monto` double(7,2) NOT NULL,
  `Hora` time NOT NULL,
  `FechaPago` datetime NOT NULL,
  `Fundamento` varchar(100) NOT NULL,
  `IdTarjeta` int(11) DEFAULT NULL,
  `IdVerificacion` int(11) DEFAULT NULL,
  `IdLicencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`IdMulta`, `Motivo`, `Agente`, `Fecha`, `Lugar`, `Garantia`, `Monto`, `Hora`, `FechaPago`, `Fundamento`, `IdTarjeta`, `IdVerificacion`, `IdLicencia`) VALUES
(1, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 2500.00, '17:00:00', '2021-05-18 00:00:00', '12', 1, 1, 1),
(2, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 3000.00, '17:00:00', '2021-05-18 00:00:00', '12', 1, 1, 1),
(3, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 1500.00, '17:00:00', '2021-05-18 00:00:00', '12', 1, 1, 1),
(4, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 1500.00, '17:00:00', '2021-05-18 00:00:00', '12', 1, 1, 1),
(5, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 1500.00, '17:00:00', '2021-05-18 00:00:00', '12', 1, 1, 1),
(6, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 1500.00, '17:00:00', '2021-05-18 00:00:00', '12', 2, 2, 2),
(7, 'Exceso Velocidad', 'Roberto Elias Pineda', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 2, 2, 2),
(8, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 2, 2, 2),
(9, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 2, 2, 2),
(10, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 4, 6, 2),
(11, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 4, 6, 2),
(12, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 4, 6, 2),
(13, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '12', 5, 10, 4),
(14, 'Exceso Velocidad', 'Edgar Robledo Ibarra', '2021-05-07', 'Queretaro', 'Tarjeta', 300.00, '17:00:00', '2021-05-18 00:00:00', '23', 5, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `IdPropietario` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Localidad` varchar(70) NOT NULL,
  `Municipio` varchar(30) NOT NULL,
  `RFC` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`IdPropietario`, `Nombre`, `Localidad`, `Municipio`, `RFC`) VALUES
(1, 'Daniel Leon Paulin', 'Queretaro', 'El Marques', 'dasv96874fse1'),
(2, 'Miguel Oviedo Robles', 'Queretaro', 'Queretaro', '987sda4de21d5'),
(4, 'Adrian Jaramillo Mateos', 'Queretaro', 'Queretaro', 'sd84xaw1xd6aw'),
(5, 'Erika Pineda Juarez', 'Queretaro', 'Colon', 'jyt987hgfsr4f'),
(6, 'Jorge Jimenez Pineda', 'Queretaro', 'El Marques', 'sa87s5a4d6aw8'),
(7, 'Manuel Rodriguez Molina', 'Queretaro', 'El Marques', '987sad5we4awd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `Folio` int(11) NOT NULL,
  `FechaExp` date NOT NULL,
  `OficinaExp` varchar(30) NOT NULL,
  `Uso` varchar(25) NOT NULL,
  `TipoServicio` varchar(30) NOT NULL,
  `Movimiento` varchar(25) NOT NULL,
  `IdPropietario` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`Folio`, `FechaExp`, `OficinaExp`, `Uso`, `TipoServicio`, `Movimiento`, `IdPropietario`, `IdVehiculo`) VALUES
(1, '2021-04-08', '1', '65', 'Privado', '12', 1, 1),
(2, '2021-04-13', '2', '65', 'Privado', '12', 2, 2),
(4, '2021-04-13', '2', '65', 'Privado', '12', 4, 3),
(5, '2021-04-13', '2', '65', 'Privado', '12', 5, 4),
(6, '2021-04-13', '6', '12', 'Privado', '12', 6, 5),
(7, '2021-04-13', '8', '12', 'Privado', '12', 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenencias`
--

CREATE TABLE `tenencias` (
  `IdTenencia` int(11) NOT NULL,
  `Monto` double(7,2) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Periodo` year(4) NOT NULL,
  `Lugar` varchar(30) NOT NULL,
  `IdTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tenencias`
--

INSERT INTO `tenencias` (`IdTenencia`, `Monto`, `Tipo`, `Periodo`, `Lugar`, `IdTarjeta`) VALUES
(1, 600.00, 'Publico', 2020, 'Queretaro', 1),
(2, 600.00, 'Publico', 2019, 'Queretaro', 1),
(3, 600.00, 'Publico', 2015, 'Queretaro', 1),
(4, 600.00, 'Publico', 2019, 'Queretaro', 1),
(5, 600.00, 'Publico', 2021, 'Queretaro', 1),
(6, 600.00, 'Publico', 2021, 'Queretaro', 2),
(7, 600.00, 'Publico', 2019, 'Queretaro', 2),
(8, 600.00, 'Publico', 2018, 'Queretaro', 2),
(9, 600.00, 'Publico', 2017, 'Queretaro', 2),
(10, 600.00, 'Publico', 2017, 'Queretaro', 4),
(11, 600.00, 'Publico', 2018, 'Queretaro', 4),
(12, 600.00, 'Publico', 2019, 'Queretaro', 4),
(13, 600.00, 'Publico', 2021, 'Queretaro', 4),
(14, 600.00, 'Publico', 2021, 'Queretaro', 5),
(15, 600.00, 'Publico', 2020, 'Queretaro', 5),
(16, 600.00, 'Publico', 2019, 'Queretaro', 5),
(17, 600.00, 'Publico', 2018, 'Queretaro', 5),
(18, 600.00, 'Publico', 2017, 'Queretaro', 5),
(19, 600.00, 'Publico', 2017, 'Queretaro', 6),
(20, 600.00, 'Publico', 2018, 'Queretaro', 6),
(21, 600.00, 'Publico', 2019, 'Queretaro', 6),
(22, 600.00, 'Publico', 2019, 'Queretaro', 7),
(23, 600.00, 'Publico', 2020, 'Queretaro', 7),
(24, 600.00, 'Publico', 2021, 'Queretaro', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UserName` varchar(30) NOT NULL,
  `Pwd` varchar(30) DEFAULT NULL,
  `Tipo` char(1) DEFAULT NULL,
  `Bloqueado` tinyint(4) DEFAULT NULL,
  `Intentos` tinyint(4) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UserName`, `Pwd`, `Tipo`, `Bloqueado`, `Intentos`, `Status`) VALUES
('JUAN', 'J1234', 'A', 0, 0, 1),
('LUISA', 'L1234', 'A', 1, 0, 1),
('MARIA', 'M1234', 'U', 0, 0, 0),
('OSCAR', 'O1234', 'U', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `IdVehiculo` int(11) NOT NULL,
  `Marca` varchar(25) NOT NULL,
  `Color` varchar(25) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Transmision` enum('Manual','Automático','CVT','Doble embrague','Secuencial','Semiautomática') NOT NULL,
  `NumeroMotor` varchar(10) NOT NULL,
  `Cilindro` tinyint(4) NOT NULL,
  `Asiento` tinyint(4) NOT NULL,
  `Puerta` tinyint(4) NOT NULL,
  `Capacidad` mediumint(9) NOT NULL,
  `Origen` varchar(25) DEFAULT NULL,
  `Combustible` enum('Gasolina','Diesel','Híbrido','Eléctrico','Etanol','Biodisel','Gas Natural') NOT NULL,
  `Linea` varchar(25) NOT NULL,
  `Sublinea` varchar(25) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Clase` varchar(25) NOT NULL,
  `ClaveVehicular` varchar(15) NOT NULL,
  `Placa` varchar(10) NOT NULL,
  `NumeroSerie` char(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`IdVehiculo`, `Marca`, `Color`, `Modelo`, `Transmision`, `NumeroMotor`, `Cilindro`, `Asiento`, `Puerta`, `Capacidad`, `Origen`, `Combustible`, `Linea`, `Sublinea`, `Tipo`, `Clase`, `ClaveVehicular`, `Placa`, `NumeroSerie`) VALUES
(1, 'Toyota', 'Arena', '2011', 'Automático', '48652', 4, 5, 4, 5, 'Japon', 'Gasolina', '12', '21', 'Privado', '312', '48596', 'sud84654', '148513697555'),
(2, 'Volkswagen', 'Rojo', '2015', 'Manual', '45652', 4, 5, 4, 5, 'Europa', 'Gasolina', '52', '78', 'Privado', '636', '52782', 'ult9862', '14793254765'),
(3, 'Ford', 'Blanco', '2020', 'Manual', '58746', 4, 2, 2, 3, 'EUA', 'Diesel', '96', '72', 'Privado', '634', '96965', 'bjf78965', '2365236547'),
(4, 'Chevrolet', 'Negro', '2003', 'Manual', '78966', 4, 2, 2, 3, 'EUA', 'Diesel', '96', '72', 'Privado', '634', '96965', 'daw98765', '987452138'),
(5, 'Chevrolet', 'Rojo', '2003', 'Manual', '78966', 4, 2, 2, 3, 'EUA', 'Diesel', '96', '72', 'Privado', '634', '96965', 'uyj36985', '8625456'),
(6, 'Chevrolet', 'Verde', '2003', 'Manual', '78966', 4, 2, 2, 3, 'EUA', 'Diesel', '96', '72', 'Privado', '634', '96965', 'uie98632', '1478526954'),
(10, 'Volkswagen', 'Negro', '2003', 'Manual', '78966', 4, 4, 4, 5, 'Europa', 'Diesel', '96', '72', 'Privado', '634', '96965', 'ert98745', '15926874651'),
(11, '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `Folio` int(11) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `CentroVehicular` varchar(35) NOT NULL,
  `Dictamen` varchar(50) NOT NULL,
  `Emision` varchar(60) NOT NULL,
  `Tecnico` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Periodo` year(4) NOT NULL,
  `IdTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `verificaciones`
--

INSERT INTO `verificaciones` (`Folio`, `Tipo`, `CentroVehicular`, `Dictamen`, `Emision`, `Tecnico`, `Fecha`, `Hora`, `Periodo`, `IdTarjeta`) VALUES
(1, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2020, 1),
(2, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2019, 1),
(3, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2021, 1),
(4, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2017, 1),
(5, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2018, 2),
(6, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2019, 2),
(7, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2020, 2),
(8, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2020, 4),
(9, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2019, 4),
(10, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2018, 4),
(11, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-14', '17:55:00', 2017, 4),
(12, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:55:00', 2017, 5),
(13, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:55:00', 2018, 5),
(14, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:55:00', 2019, 5),
(15, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:55:00', 2020, 5),
(16, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:55:00', 2020, 6),
(17, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:58:00', 2019, 6),
(18, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '17:58:00', 2018, 6),
(19, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '13:58:00', 2018, 7),
(20, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '13:58:00', 2019, 7),
(21, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '13:58:00', 2020, 7),
(22, '1200', 'Queretaro', '21', '231', 'Manuel Salazar Oviedo', '2021-05-10', '13:58:00', 2021, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`IdConductor`),
  ADD UNIQUE KEY `Firma` (`Firma`) USING HASH;

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `IdConductor` (`IdConductor`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`IdMulta`),
  ADD KEY `IdLicencia` (`IdLicencia`),
  ADD KEY `IdVerificacion` (`IdVerificacion`),
  ADD KEY `IdTarjeta` (`IdTarjeta`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`IdPropietario`),
  ADD UNIQUE KEY `RFC` (`RFC`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `IdPropietario` (`IdPropietario`),
  ADD KEY `IdVehiculo` (`IdVehiculo`);

--
-- Indices de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`IdTenencia`),
  ADD KEY `IdTarjeta` (`IdTarjeta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UserName`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`IdVehiculo`),
  ADD UNIQUE KEY `Placa` (`Placa`),
  ADD UNIQUE KEY `NumeroSerie` (`NumeroSerie`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `IdTarjeta` (`IdTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `IdConductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `IdMulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `IdPropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  MODIFY `IdTenencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `IdVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`IdConductor`) REFERENCES `conductores` (`IdConductor`);

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`IdLicencia`) REFERENCES `licencias` (`Numero`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`IdVerificacion`) REFERENCES `verificaciones` (`Folio`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`IdTarjeta`) REFERENCES `tarjetas` (`Folio`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`IdPropietario`) REFERENCES `propietarios` (`IdPropietario`),
  ADD CONSTRAINT `tarjetas_ibfk_2` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculos` (`IdVehiculo`);

--
-- Filtros para la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`IdTarjeta`) REFERENCES `tarjetas` (`Folio`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`IdTarjeta`) REFERENCES `tarjetas` (`Folio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
