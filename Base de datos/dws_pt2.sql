-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2023 a las 23:46:58
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
-- Base de datos: `dws_pt2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

CREATE TABLE `ninos` (
  `id` int(11) NOT NULL,
  `nombreNino` varchar(45) NOT NULL,
  `apellidosNino` varchar(45) NOT NULL,
  `fechaNacimientoNino` date NOT NULL,
  `buenComportamientoNino` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombreNino`, `apellidosNino`, `fechaNacimientoNino`, `buenComportamientoNino`) VALUES
(1, 'Alberto', 'Alcántara', '1994-10-13', 'No'),
(2, 'Beatriz', 'Bueno', '1982-04-18', 'Si'),
(3, 'Carlos', 'Crepo', '1998-12-01', 'Si'),
(4, 'Diana', 'Dominguez', '1987-09-02', 'No'),
(5, 'Emilio', 'Enamorado', '1996-08-12', 'Si'),
(6, 'Francisca', 'Fernández', '1990-07-28', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosninos`
--

CREATE TABLE `pedidosninos` (
  `id` int(11) NOT NULL,
  `idNino` int(11) NOT NULL,
  `idRegalo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidosninos`
--

INSERT INTO `pedidosninos` (`id`, `idNino`, `idRegalo`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 11),
(4, 2, 1),
(5, 2, 6),
(6, 2, 12),
(7, 3, 4),
(8, 3, 7),
(9, 3, 13),
(10, 4, 8),
(11, 4, 5),
(12, 4, 6),
(13, 5, 11),
(14, 5, 13),
(15, 5, 3),
(16, 6, 9),
(17, 6, 8),
(18, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalosninos`
--

CREATE TABLE `regalosninos` (
  `id` int(11) NOT NULL,
  `nombreRegalo` varchar(100) NOT NULL,
  `precioRegalo` decimal(6,2) NOT NULL,
  `idReyMago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regalosninos`
--

INSERT INTO `regalosninos` (`id`, `nombreRegalo`, `precioRegalo`, `idReyMago`) VALUES
(1, 'Aula de ciencia: Robot Mini ERP', '159.95', 1),
(2, 'Carbón', '0.00', 2),
(3, 'Cochecito Classic', '99.95', 1),
(4, 'Consola PS4 1 TB', '394.90', 3),
(5, 'Lego Villa familiar modular', '64.99', 2),
(6, 'Magia Borrás Clásica 150 trucos con luz', '32.95', 1),
(7, 'Meccano Excavadora construcción', '30.99', 3),
(8, 'Nenuco Hace pompas', '29.95', 3),
(9, 'Peluche delfín rosa ', '34.00', 2),
(10, 'Pequeordenador', '22.95', 2),
(11, 'Robot Coji', '69.95', 3),
(12, 'Telescopio astronómico terrestre', '72.00', 2),
(13, 'Twister', '17.95', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reyesmagos`
--

CREATE TABLE `reyesmagos` (
  `id` int(11) NOT NULL,
  `nombreRey` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reyesmagos`
--

INSERT INTO `reyesmagos` (`id`, `nombreRey`) VALUES
(1, 'Melchor'),
(2, 'Gaspar'),
(3, 'Baltasar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidosninos`
--
ALTER TABLE `pedidosninos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regalosninos`
--
ALTER TABLE `regalosninos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reyesmagos`
--
ALTER TABLE `reyesmagos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidosninos`
--
ALTER TABLE `pedidosninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `regalosninos`
--
ALTER TABLE `regalosninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reyesmagos`
--
ALTER TABLE `reyesmagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
