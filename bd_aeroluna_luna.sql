-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 17:53:46
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
-- Base de datos: `bd_aeroluna_luna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id` int(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `nombre`, `correo`, `usuario`, `contrasena`) VALUES
(1, 'Ana Valeria Luna Arredondo', 'vl2005806@gmail.com', 'Vale1507', 'cb906433e1289aa1c251dc5057746a88'),
(2, 'Eliseo Nvava', 'enanito@gmail.com', 'enanito', '123'),
(3, 'Lizbeth Garcia', 'lizbethgala02@gmail.com', 'lizgl', '7013dd8caf235788ddedee06ff8ad0ed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `Capacidad_maletas` varchar(10) NOT NULL,
  `id_empleado` varchar(10) NOT NULL,
  `capacidad_pasajeros` varchar(10) NOT NULL,
  `tipo_avion` varchar(50) NOT NULL,
  `peso_max` varchar(10) NOT NULL,
  `altura_max` varchar(10) NOT NULL,
  `id_acceso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `modelo`, `Capacidad_maletas`, `id_empleado`, `capacidad_pasajeros`, `tipo_avion`, `peso_max`, `altura_max`, `id_acceso`) VALUES
(1, 'modelo-123', '123.5 t', 'PILOTO-1', '125', 'Turismo', '124.65 t', '3452,3 ft', 1),
(3, 'Modelo-456', '154.7 t', 'PILOT-123', '127', 'Turista', '300 t', '1243.65 ft', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
