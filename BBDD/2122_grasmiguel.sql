-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2021 a las 20:34:17
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
  `fecha_historial` date DEFAULT NULL,
  `hora_inicio_historial` time DEFAULT NULL,
  `hora_fin_historial` time DEFAULT NULL,
  `nombre_historial` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
(1, 12, 'Sala_Privada', 3),
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
(16, 2, 'Comedor', 1),
(17, 4, 'Comedor', 1),
(18, 3, 'Comedor', 1),
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
(69, 5, 'Terraza', 2),
(76, 12, 'Sala_Privada', 3);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(45) NOT NULL,
  `img_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id_sala`, `nombre_sala`, `img_sala`) VALUES
(1, 'Comedor', '../../img/19-12-21-comedor.png'),
(2, 'Terraza', '../../img/19-12-21-terraza.png'),
(3, 'Sala_Privada', '../../img/19-12-21-sala_privada.png');

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
(1, 'admin', 'Marco', 'Marco', 'marco@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 123456789),
(15, 'camarero', 'Miguel', 'Gras', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(16, 'camarero', 'Cristian', 'Guerrero', 'cristian@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 633122211),
(17, 'camarero', 'Marc', 'Ortiz', 'marc@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 635779744),
(51, 'admin', 'Miguel', 'Gras', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(52, 'admin', 'Marc', 'Ortiz', 'marc@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 987654321);

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
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
