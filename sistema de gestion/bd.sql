-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2025 a las 02:46:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagospaypal`
--

CREATE TABLE `pagospaypal` (
  `id` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `fecha` datetime NOT NULL,
  `correo` varchar(5000) NOT NULL,
  `total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagospaypal`
--

INSERT INTO `pagospaypal` (`id`, `ClaveTransaccion`, `PaypalDatos`, `fecha`, `correo`, `total`, `status`) VALUES
(10, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-02 14:46:16', 'manu@gmail.com', 123.00, 'pendiente'),
(11, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-02 14:47:55', 'manu@gmail.com', 123.00, 'pendiente'),
(12, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-02 15:39:05', 'manu@gmail.com', 99.50, 'pendiente'),
(13, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-03 01:35:23', 'manu@gmail.com', 200.00, 'pendiente'),
(14, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-03 01:36:26', 'manu@gmail.com', 200.00, 'pendiente'),
(15, '2m1fmdrh366fev645h2jnks5lc', '', '2025-06-03 01:42:33', 'manu@gmail.com', 200.00, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--

CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `descargado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbldetalleventa`
--

INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIO`, `CANTIDAD`, `descargado`) VALUES
(1, 10, 11, 123.00, 1, 0),
(2, 11, 11, 123.00, 1, 0),
(3, 12, 14, 99.50, 1, 0),
(4, 13, 13, 200.00, 1, 0),
(5, 14, 13, 200.00, 1, 0),
(6, 15, 13, 200.00, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `gmail`, `contraseña`, `rol`) VALUES
(9, 'Miguel ', 'miguel@gmail.com', '$2y$10$ovtzJbNHrCW.XGEDs0Kbd.yhf26YnOk6MIpDC.9G7bciyW4aTHtzu', 1),
(11, 'CLAUDIA', 'csanfer@gmail.com', '$2y$10$RUbze3aOCEXe9MCpXJkxHed7flneaHZw/lBHuyqrO6JrkI2o7drDm', 2),
(13, 'manuel', 'manu@gmail.com', '$2y$10$bVojoUa2ZSfz3K7W9fvPZ.LeWbbA1X8ovtqOiQQjYfE4sPmsOhLgm', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatillas`
--

CREATE TABLE `zapatillas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `eliminado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zapatillas`
--

INSERT INTO `zapatillas` (`id`, `nombre`, `precio`, `imagen`, `eliminado`) VALUES
(1, 'jordan retro 4', '150', '../imagenes/jordan_retro4.webp', 0),
(11, 'new balance', '123', '../imagenes/new_balancevinotinto.png', 0),
(12, 'Jordan Retro 4 ', '150', '../imagenes/jordan_retro4_azules.png', 0),
(13, 'jordan retro 4 ', '200', '../imagenes/jordan_retro4_amarillas.png', 0),
(14, 'Jordan Retro 4', '99.5', '../imagenes/jordan_retro4_grises.png', 0),
(15, 'jordan retro 4', '126.2', '../imagenes/jordan_retro4_negras.png', 0),
(19, 'converse ', '70', '../imagenes/converse-removebg-preview.png', 0),
(20, 'converse ', '50.87', '../imagenes/converse_blanca.png', 0),
(21, 'new balance', '89.78', '../imagenes/new_balancelima.jfif', 0),
(22, 'new balance', '80.1', '../imagenes/new_balance-removebg-preview.png', 0),
(23, 'vans', '30', '../imagenes/vans-removebg-preview.png', 0),
(25, 'Adidas', '200', '../imagenes/adidasbarricade.png', 0),
(26, 'Reebok', '300.9', '../imagenes/reebok.png', 0),
(28, 'Nike', '127.6', '../imagenes/nike.png', 0),
(29, 'nike', '250', '../imagenes/air_for_one-removebg-preview.png', 0),
(30, 'nike', '55.9', '../imagenes/tenis_nike.png', 0),
(31, 'Reebok', '190.34', '../imagenes/reebok_botascoloridas-removebg-preview.png', 0),
(32, 'Reebok', '250', '../imagenes/reebok_clasicas.png', 0),
(33, 'puma', '70', '../imagenes/puma_gato.png', 0),
(34, 'puma', '101.89', '../imagenes/puma_roma-removebg-preview.png', 0),
(35, 'puma', '90.28', '../imagenes/puma_bota.png', 0),
(36, 'adidas', '140', '../imagenes/adidasnovack.png', 0),
(37, 'Adidas', '69.99', '../imagenes/adidasoriginales.png', 0),
(41, 'Adidas', '70.06', '../imagenes/adidassuperstar-removebg-preview.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagospaypal`
--
ALTER TABLE `pagospaypal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gmail` (`gmail`),
  ADD UNIQUE KEY `gmail_2` (`gmail`);

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagospaypal`
--
ALTER TABLE `pagospaypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `pagospaypal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `zapatillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
