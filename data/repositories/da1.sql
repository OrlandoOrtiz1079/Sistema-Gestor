-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-02-2021 a las 20:17:27
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `da1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_alumnos`
--

CREATE TABLE `datos_alumnos` (
  `id_Alumno` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Numero_C` int(9) NOT NULL,
  `Carrera` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `Numero_Creditos` int(2) NOT NULL,
  `Nombre_Evento` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `Periodo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `Generada_Por` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuarios` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_U` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuarios`, `Nombre`, `Apellido_P`, `Apellido_M`, `Nombre_U`, `Password`, `Email`) VALUES
(1, 'Jorge Eduardo', 'Ortega', 'Lopez', 'Sistemas', 'superadmin', 'sistemas.@iguala.tcnm.mx'),
(2, 'JORGE E', 'ORTEGA', 'LOPEZ', 'JORGE', '1234', 'eduardo.ortega@itiguala.edu.mx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_alumnos`
--
ALTER TABLE `datos_alumnos`
  ADD PRIMARY KEY (`id_Alumno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_alumnos`
--
ALTER TABLE `datos_alumnos`
  MODIFY `id_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
