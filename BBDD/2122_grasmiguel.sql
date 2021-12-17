-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 17:47:35
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2122_grasmiguel`
--
CREATE DATABASE IF NOT EXISTS `2122_grasmiguel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `2122_grasmiguel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--

CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `capacidad_mesa` int(2) DEFAULT NULL,
  `ubicacion_mesa` enum('comedor','terraza') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `inicio_reserva` timestamp NULL DEFAULT NULL,
  `fin_reserva` timestamp NULL DEFAULT NULL,
  `email_usuario` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_historial`
--

INSERT INTO `tbl_historial` (`id_historial`, `id_mesa`, `capacidad_mesa`, `ubicacion_mesa`, `inicio_reserva`, `fin_reserva`, `email_usuario`) VALUES
(47, 1, 5, 'terraza', '2021-12-09 16:33:14', '2021-12-09 16:33:17', 'miguel@gmail.com'),
(48, 6, 5, 'comedor', '2021-12-13 15:47:23', '2021-12-13 15:47:27', 'marco@gmail.com'),
(49, 1, 5, 'terraza', '2021-12-13 15:49:08', '2021-12-13 15:49:43', 'marco@gmail.com'),
(50, 1, 5, 'terraza', '2021-12-13 17:15:27', '2021-12-13 17:15:33', 'marco@gmail.com'),
(51, 1, 5, 'terraza', '2021-12-13 17:15:52', '2021-12-13 17:16:21', 'marco@gmail.com'),
(52, 1, 5, 'terraza', '2021-12-13 17:15:52', '2021-12-13 17:16:21', 'marco@gmail.com'),
(53, 3, 3, 'terraza', '2021-12-13 17:16:44', '2021-12-13 17:16:47', 'marco@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesas`
--

CREATE TABLE `tbl_mesas` (
  `id_mesa` int(11) NOT NULL,
  `capacidad_mesa` int(2) NOT NULL,
  `ubicacion_mesa` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesas`
--

INSERT INTO `tbl_mesas` (`id_mesa`, `capacidad_mesa`, `ubicacion_mesa`, `id_sala`) VALUES
(1, 5, 'Terraza', 2),
(2, 4, 'Terraza', 2),
(3, 3, 'Terraza', 2),
(4, 2, 'Terraza', 2),
(5, 1, 'Terraza', 2),
(6, 5, 'Comedor', 1),
(7, 4, 'Comedor', 1),
(8, 3, 'Comedor', 1),
(9, 2, 'Comedor', 1),
(10, 1, 'Comedor', 1),
(11, 5, 'Comedor', 1),
(12, 4, 'Comedor', 1),
(13, 3, 'Comedor', 1),
(14, 2, 'Comedor', 1),
(15, 1, 'Comedor', 1),
(16, 5, 'Comedor', 1),
(17, 4, 'Comedor', 1),
(18, 3, 'Comedor', 1),
(19, 5, 'Comedor', 1),
(51, 1, 'Comedor', 1),
(56, 1, 'Terraza', 2),
(57, 2, 'Terraza', 2),
(58, 3, 'Terraza', 2),
(59, 4, 'Terraza', 2),
(60, 5, 'Terraza', 2),
(61, 1, 'Terraza', 2),
(62, 2, 'Terraza', 2),
(63, 3, 'Terraza', 2),
(64, 4, 'Terraza', 2),
(65, 5, 'Terraza', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `id_reserva` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_inicio_reserva` time NOT NULL,
  `hora_fin_reserva` time NOT NULL,
  `nombre_reserva` varchar(45) NOT NULL,
  `id_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reserva`, `fecha_reserva`, `hora_inicio_reserva`, `hora_fin_reserva`, `nombre_reserva`, `id_mesa`) VALUES
(45, '2021-12-17', '20:00:00', '22:00:00', 'Danny', 9),
(47, '2021-12-17', '18:00:00', '20:00:00', 'Pep Guardiola', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id_sala`, `nombre_sala`) VALUES
(1, 'Comedor'),
(2, 'Terraza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` enum('admin','camarero') NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `contra_usuario` varchar(45) NOT NULL,
  `telf_usuario` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `tipo_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `contra_usuario`, `telf_usuario`) VALUES
(1, 'admin', 'Marco', 'Marco', 'marco@gmail.com', '9a353bb0312070c9348ec3061266eb2a', 123456789),
(15, 'camarero', 'Miguel', 'Gras', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(16, 'camarero', 'Cristian', 'Guerrero', 'cristian@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 633122211),
(17, 'camarero', 'Marc', 'Ortiz', 'marc@gmail.com', 'e1f828a342b917cdc75c23f60585b45a', 635779744),
(51, 'admin', 'Miguel', 'Gras', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(52, 'admin', 'Marc', 'Ortiz', 'marc@gmail.com', '9a353bb0312070c9348ec3061266eb2a', 987654321);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_id_mesa_historial` (`id_mesa`);

--
-- Indices de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `fk_id_mesa_sala` (`id_sala`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_id_mesa_reserva` (`id_mesa`);

--
-- Indices de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `tbl_historial_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesas` (`id_mesa`);

--
-- Filtros para la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  ADD CONSTRAINT `tbl_mesas_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_salas` (`id_sala`);

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesas` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
