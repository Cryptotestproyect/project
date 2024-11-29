-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 04:13:53
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
-- Base de datos: `procesadorpagos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `metododepago` varchar(55) DEFAULT NULL,
  `estadoAdmin` varchar(50) DEFAULT 'pendiente',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `referenciabancaria` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `nombre`, `email`, `metododepago`, `estadoAdmin`, `fecha`, `referenciabancaria`, `imagen`) VALUES
(1, 'Gabriel', 'Martinez@gmail.com', 'transferenciabancaria', 'aprobado', '2024-10-24 21:04:28', NULL, NULL),
(2, 'santos', 'melano@gmail.com', 'paypal', 'pendiente', '2024-10-24 21:25:08', NULL, NULL),
(3, 'maria', 'lacarga@gmail.com', 'transferenciabancaria', 'rechazado', '2024-10-24 22:02:24', NULL, NULL),
(4, 'marlon', 'Asdruba@gmail.com', 'paypal', 'pendiente', '2024-10-24 22:15:47', NULL, NULL),
(5, 'OWSARDELGAFO', 'ELGAFO@gmail.com', 'transferenciabancaria', 'rechazado', '2024-10-24 22:26:59', NULL, NULL),
(6, 'pepito', 'pepito@gmail.com', 'paypal', 'pendiente', '2024-11-01 22:35:42', '12485', NULL),
(7, 'Henrique', 'henrry@gmail.com', 'paypal', 'pendiente', '2024-11-01 22:46:37', '47852', NULL),
(8, 'pedroperez', 'perez@gmail.com', 'transferenciabancaria', 'pendiente', '2024-11-01 22:51:34', '147852', NULL),
(9, 'prueba100', '100@gmail.com', 'transferenciabancaria', 'pendiente', '2024-11-01 23:01:53', '123654', NULL),
(10, 'prueba 105', '105@gmail.com', 'transferenciabancaria', 'pendiente', '2024-11-01 23:14:32', '147852', NULL),
(11, 'Emilio', 'Gonzales@gmail.com', 'transferenciabancaria', 'pendiente', '2024-11-14 04:11:02', '568931', 'Captura de pantalla 2024-11-08 112920.png'),
(12, 'MarcoRubio', 'Rubio@gmail.com', 'transferenciabancaria', 'pendiente', '2024-11-14 05:52:59', '258741', 'Captura de pantalla 2024-11-08 112856.png'),
(13, 'MANOLO ', 'RODRIGUEZ@GMAIL.COM', 'paypal', 'pendiente', '2024-11-29 02:48:07', '14582696', 'Captura de pantalla 2024-11-08 113150.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
