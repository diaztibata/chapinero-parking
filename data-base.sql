-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2022 a las 20:39:10
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
-- Base de datos: `parking-chapinero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

CREATE TABLE `estacionamiento` (
  `codigo_estacionamiento` varchar(100) NOT NULL,
  `codigo_piso` varchar(100) DEFAULT NULL,
  `codigo_parqueadero` varchar(100) DEFAULT NULL,
  `numero_estacionamiento` varchar(100) DEFAULT NULL,
  `tipo_vehiculo` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `costo_minuto` varchar(100) DEFAULT NULL,
  `costo_hora` varchar(100) DEFAULT NULL,
  `costo_dia` varchar(100) DEFAULT NULL,
  `costo_mes` varchar(100) DEFAULT NULL,
  `hora_inicio` varchar(100) DEFAULT NULL,
  `codigo_vehiculo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estacionamiento`
--

INSERT INTO `estacionamiento` (`codigo_estacionamiento`, `codigo_piso`, `codigo_parqueadero`, `numero_estacionamiento`, `tipo_vehiculo`, `estado`, `costo_minuto`, `costo_hora`, `costo_dia`, `costo_mes`, `hora_inicio`, `codigo_vehiculo`) VALUES
('220606-EP-A-11', '220606-EP-A', '220606-EP', '1', 'carro', 'libre', '55', '1000', '5000', '50000', '2022-06-27 13:29:59', 'ABC123'),
('220606-PW-A-12', '220606-PW-C', '220606-PW', '3', 'bicicleta', 'libre', '55', '600', '2000', '10000', '2022-06-27 13:29:28', 'XYZ654'),
('CC-1-B-1', 'CC-1', 'CC', 'B-1', 'bicicleta', 'Libre', '55', '1000', '20000', '200000', '', ''),
('CC-1-B-2', 'CC-1', 'CC', 'B-2', 'bicicleta', 'Libre', '55', '553333', '55', '55', '', ''),
('CC-1-B-3', 'CC-1', 'CC', 'B-3', 'bicicleta', 'ocupado', '55', '1111', '11', '22', '2022-06-18 09:42:27', 'audi'),
('CC-1-B-4', 'CC-1', 'CC', 'B-4', 'bicicleta', 'ocupado', '55', '63', '63', '63', '2022-06-17 18:42:29', 'BMW123'),
('CC-1-C-1', 'CC-1', 'CC', 'C-1', 'carro', 'libre', '5', '55', '55', '55', '2022-06-27 10:59:49', 'ZXC654'),
('CC-1-C-2', 'CC-1', 'CC', 'C-2', 'carro', 'libre', '5', '55', '55', '55', '10am', 'BMW123'),
('CC-1-C-3', 'CC-1', 'CC', 'C-3', 'carro', 'libre', '5', '55', '55', '55', '10am', 'BMW123'),
('CC-1-C-4', 'CC-1', 'CC', 'C-4', 'carro', 'libre', '5', '55', '55', '55', '10am', 'BMW123'),
('CC-1-C-5', 'CC-1', 'CC', 'C-5', 'carro', 'libre', '5', '55', '55', '55', '10am', 'BMW123'),
('CC-1-M-1', 'CC-1', 'CC', 'M-1', 'moto', 'libre', '5', '55', '55', '55', '10am', 'BMW923'),
('CC-1-M-2', 'CC-1', 'CC', 'M-2', 'moto', 'libre', '333', '55', '55', '55', '2022-06-20 16:35:14', 'BMW923'),
('CC-1-M-3', 'CC-1', 'CC', 'M-3', 'moto', 'libre', '5', '55', '55', '55', '10am', 'BMW923'),
('CC-1-M-4', 'CC-1', 'CC', 'M-4', 'moto', 'libre', '5', '55', '55', '55', '10am', 'BMW923'),
('CC-1-M-5', 'CC-1', 'CC', 'M-5', 'moto', 'libre', '5', '55', '55', '55', '10am', 'BMW923'),
('220620DD-1-C-1', '220620DD-1', '220620DD', 'C-1', 'carro', 'libre', '2', '2', '2', '2', '10am', 'BMW123'),
('220620DD-1-C-2', '220620DD-1', '220620DD', 'C-2', 'carro', 'libre', '2', '2', '2', '2', '10am', 'BMW123'),
('220620DD-1-M-1', '220620DD-1', '220620DD', 'M-1', 'moto', 'libre', '2', '2', '2', '2', '10am', 'BMW923'),
('220620DD-1-M-2', '220620DD-1', '220620DD', 'M-2', 'moto', 'libre', '2', '2', '2', '2', '10am', 'BMW923'),
('220620DD-1-B-1', '220620DD-1', '220620DD', 'B-1', 'bicicleta', 'libre', '2', '2', '2', '2', '10am', 'BMW123'),
('220620DD-1-B-2', '220620DD-1', '220620DD', 'B-2', 'bicicleta', 'libre', '2', '2', '2', '2', '10am', 'BMW123'),
('JN-1-C-1', 'JN-1', 'JN', 'C-1', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-2', 'JN-1', 'JN', 'C-2', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-3', 'JN-1', 'JN', 'C-3', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-4', 'JN-1', 'JN', 'C-4', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-5', 'JN-1', 'JN', 'C-5', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-6', 'JN-1', 'JN', 'C-6', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-7', 'JN-1', 'JN', 'C-7', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-8', 'JN-1', 'JN', 'C-8', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-9', 'JN-1', 'JN', 'C-9', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-C-10', 'JN-1', 'JN', 'C-10', 'carro', 'Libre', '60', '4000', '20000', '150000', '', ''),
('JN-1-M-1', 'JN-1', 'JN', 'M-1', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-2', 'JN-1', 'JN', 'M-2', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-3', 'JN-1', 'JN', 'M-3', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-4', 'JN-1', 'JN', 'M-4', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-5', 'JN-1', 'JN', 'M-5', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-6', 'JN-1', 'JN', 'M-6', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-7', 'JN-1', 'JN', 'M-7', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-8', 'JN-1', 'JN', 'M-8', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-9', 'JN-1', 'JN', 'M-9', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-M-10', 'JN-1', 'JN', 'M-10', 'moto', 'Libre', '30', '2500', '10000', '80000', '', ''),
('JN-1-B-1', 'JN-1', 'JN', 'B-1', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-2', 'JN-1', 'JN', 'B-2', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-3', 'JN-1', 'JN', 'B-3', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-4', 'JN-1', 'JN', 'B-4', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-5', 'JN-1', 'JN', 'B-5', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-6', 'JN-1', 'JN', 'B-6', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-7', 'JN-1', 'JN', 'B-7', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-8', 'JN-1', 'JN', 'B-8', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-9', 'JN-1', 'JN', 'B-9', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', ''),
('JN-1-B-10', 'JN-1', 'JN', 'B-10', 'bicicleta', 'Libre', '10', '1000', '4000', '34000', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero`
--

CREATE TABLE `parqueadero` (
  `codigo_parqueadero` varchar(100) NOT NULL,
  `codigo_usuario` varchar(100) DEFAULT NULL,
  `nombre_parqueadero` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `pisos` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parqueadero`
--

INSERT INTO `parqueadero` (`codigo_parqueadero`, `codigo_usuario`, `nombre_parqueadero`, `telefono`, `direccion`, `pisos`) VALUES
('220606-EP', '2', 'El parking', '2944049', 'cra 7 # 53-24', 1),
('220606-PW', '2', 'park way', '2944049', 'cra 63 # 24-54', 3),
('220606-SP', '2', 'super parking', '5510520', 'cll 72 # 5-16', 2),
('220620DD', '2220161039', 'DD Parking', '22', 'cra 3 #54-17', 1),
('CC', '2220161037', 'CC', 'CC', 'CC', 1),
('JN', '2220161039', 'JUAN NIETO', '1234567890', 'cra 3 #54-17', 1),
('LL', '2220161039', 'LL', 'LL', 'LL', 1),
('SS', '2220161039', 'SS', 'SS', 'SS', 1),
('YY', '2220161039', 'YY', 'YY', 'YY', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `codigo_piso` varchar(100) NOT NULL,
  `codigo_parqueadero` varchar(100) DEFAULT NULL,
  `cantidad_carro` int(100) DEFAULT NULL,
  `cantidad_moto` int(100) DEFAULT NULL,
  `cantidad_bicis` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`codigo_piso`, `codigo_parqueadero`, `cantidad_carro`, `cantidad_moto`, `cantidad_bicis`) VALUES
('220606-EP-A', '220606-EP', 20, 20, 10),
('220606-PW-A', '220606-PW', 16, 8, 16),
('220606-PW-B', '220606-PW', 16, 8, 16),
('220606-PW-C', '220606-PW', 16, 8, 16),
('220606-SP-A', '220606-SP', 30, 10, 30),
('220606-SP-B', '220606-SP', 30, 10, 30),
('220620DD-1', '220620DD', 2, 2, 2),
('CC-1', 'CC', 5, 5, 5),
('JN-1', 'JN', 10, 10, 10),
('LL-1', 'LL', 5, 5, 5),
('SS-1', 'SS', 3, 3, 3),
('YY-1', 'YY', 6, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `identificacion` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `tipo_usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`identificacion`, `nombre`, `correo`, `contrasena`, `telefono`, `tipo_usuario`) VALUES
('2', 'es', 'es', 'es', 'es', 'operario'),
('2220161037', 'Sebastian Rodriguez', 'tono@gmail.com', '12345', '3132130615', 'operario'),
('2220161039', 'Daniel Díaz', 'daniel@gmail.com', '1234', '3212884354', 'administrador'),
('990756', 'Jhon Doe', 'jhon@gmail.com', '123456', '987654321', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `codigo_vehiculo` varchar(100) NOT NULL,
  `codigo_usuario` varchar(100) DEFAULT NULL,
  `tipo_vehiculo` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `contrato_mensual` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`codigo_vehiculo`, `codigo_usuario`, `tipo_vehiculo`, `marca`, `contrato_mensual`) VALUES
('ABC123', '990756', 'moto', 'honda', 'si'),
('XYZ654', '990756', 'carro', 'toyota', 'si'),
('WAS123', '2220161039', 'moto', 'honda', 'no'),
('MIL543', '123465', 'BICI', 'subaru', 'no'),
('VCGF4536', '2220161039', 'BICI', 'gw', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD PRIMARY KEY (`codigo_parqueadero`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`codigo_piso`),
  ADD KEY `codigo_parqueadero` (`codigo_parqueadero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`identificacion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD CONSTRAINT `parqueadero_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`identificacion`);

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`codigo_parqueadero`) REFERENCES `parqueadero` (`codigo_parqueadero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
