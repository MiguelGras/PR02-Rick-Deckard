-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 12:21:32
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
-- Estructura de tabla para la tabla `tbl_administradores`
--

CREATE TABLE `tbl_administradores` (
  `id_administrador` int(11) NOT NULL,
  `nombre_admin` varchar(20) NOT NULL,
  `apellido_admin` varchar(30) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `contra_admin` varchar(45) NOT NULL,
  `telf_admin` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_administradores`
--

INSERT INTO `tbl_administradores` (`id_administrador`, `nombre_admin`, `apellido_admin`, `email_admin`, `contra_admin`, `telf_admin`) VALUES
(1, 'Marco', 'Marco', 'marco@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camareros`
--

CREATE TABLE `tbl_camareros` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra_usuario` char(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telf_usuario` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_camareros`
--

INSERT INTO `tbl_camareros` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `contra_usuario`, `telf_usuario`) VALUES
(1, 'Miguel', 'Gras', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(2, 'Cristian', 'Guerrero', 'cristian@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 633122211),
(3, 'Marc', 'Ortiz', 'marc@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 635779744);

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
  `ubicacion_mesa` enum('comedor','terraza') COLLATE utf8mb4_spanish_ci NOT NULL,
  `inicio_reserva` timestamp NULL DEFAULT NULL,
  `fin_reserva` timestamp NULL DEFAULT NULL,
  `email_usuario` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesas`
--

INSERT INTO `tbl_mesas` (`id_mesa`, `capacidad_mesa`, `ubicacion_mesa`, `inicio_reserva`, `fin_reserva`, `email_usuario`) VALUES
(1, 5, 'terraza', NULL, NULL, NULL),
(2, 4, 'terraza', NULL, NULL, NULL),
(3, 3, 'terraza', NULL, NULL, NULL),
(4, 2, 'terraza', NULL, NULL, NULL),
(5, 1, 'terraza', NULL, NULL, NULL),
(6, 5, 'comedor', NULL, NULL, NULL),
(7, 4, 'comedor', NULL, NULL, NULL),
(8, 3, 'comedor', NULL, NULL, NULL),
(9, 2, 'comedor', NULL, NULL, NULL),
(10, 1, 'comedor', NULL, NULL, NULL),
(11, 5, 'comedor', NULL, NULL, NULL),
(12, 4, 'comedor', NULL, NULL, NULL),
(13, 3, 'comedor', NULL, NULL, NULL),
(14, 2, 'comedor', NULL, NULL, NULL),
(15, 1, 'comedor', NULL, NULL, NULL),
(16, 5, 'comedor', NULL, NULL, NULL),
(17, 4, 'comedor', NULL, NULL, NULL),
(18, 3, 'comedor', NULL, NULL, NULL),
(19, 5, 'comedor', NULL, NULL, NULL),
(20, 4, 'comedor', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `tbl_camareros`
--
ALTER TABLE `tbl_camareros`
  ADD PRIMARY KEY (`id_usuario`);

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
  ADD PRIMARY KEY (`id_mesa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_camareros`
--
ALTER TABLE `tbl_camareros`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `fk_id_mesa_historial` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesas` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
