-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 03:16:30
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
-- Base de datos: `inventario_equipo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre_equipo` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `estado` enum('Bueno','Dañado','En Reparación') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre_equipo`, `tipo`, `marca`, `serial`, `ubicacion`, `estado`, `fecha_creacion`) VALUES
(4, 'Computadora de Escritorio', 'Computadora', 'Dell', 'DELL12345', 'Oficina - Piso 2', 'Dañado', '2024-11-17 23:04:25'),
(5, 'Impresora Láser Brother', 'Impresora', 'Brother', 'BROTH1234', 'Oficina - Piso 1', 'Bueno', '2024-11-17 23:05:44'),
(6, 'Router Wi-Fi TP-Link', 'Router', 'TP-Link', 'TP123456', 'Oficina - Piso 1', 'Dañado', '2024-11-17 23:07:25'),
(7, 'Smartphone Samsung Galaxy', 'Teléfono móvil', 'Samsung', 'SAMSUNG123', 'Oficina - Piso 3', 'Bueno', '2024-11-17 23:13:55'),
(8, 'Teclado Inalámbrico Logitech', 'Teclado', 'Logitech', 'LOGI7890', 'Oficina - Piso 3', 'Bueno', '2024-11-17 23:20:06'),
(9, 'Proyector Epson', 'Proyector', 'Epson', 'BROTH1234', 'Oficina - Piso 3', 'Dañado', '2024-11-20 01:02:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
