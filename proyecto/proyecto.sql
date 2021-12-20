-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3360
-- Tiempo de generación: 12-12-2021 a las 23:15:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(50) NOT NULL,
  `titulo` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `contenido` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `fechavencimiento` datetime NOT NULL,
  `prioridad` int(50) NOT NULL,
  `id_usuario` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `titulo`, `contenido`, `fecharegistro`, `fechavencimiento`, `prioridad`, `id_usuario`) VALUES
(85, 'xwc', ' f3ff', '2021-12-12 16:56:00', '2021-12-18 16:56:00', 2, 90),
(86, 'abel', ' ef3wd', '2021-12-12 16:57:00', '2021-12-12 16:58:00', 1, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioss`
--

CREATE TABLE `usuarioss` (
  `id_usuario` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioss`
--

INSERT INTO `usuarioss` (`id_usuario`, `nombre`, `apellido`, `username`, `password`) VALUES
(89, 'Abel', 'leyva', 'abello', '$2y$10$GLs/0agVADL7uncJT.DzuuasB1uxoxa.2.LA5mokInrL3K7npySVa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioss`
--
ALTER TABLE `usuarioss`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `usuarioss`
--
ALTER TABLE `usuarioss`
  MODIFY `id_usuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
