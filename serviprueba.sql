-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 04:24:12
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
-- Base de datos: `serviprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `foto`, `nombre`) VALUES
(3, '1717800375_i-2-1.png', 'gorra blanca roja'),
(4, '1717800388_i-2-2.png', 'gorra blanca roja'),
(5, '1717800396_i-2-3.png', 'gorra blanca roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_admin` int(255) NOT NULL,
  `envio` int(11) NOT NULL,
  `recibe` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `id_usuario`, `id_admin`, `envio`, `recibe`, `mensaje`) VALUES
(61, 1, 1, 1, 1, 'soy osward y quiero el admin'),
(62, 1, 1, 1, 1, 'soy admin y quiero usuario'),
(77, 2, 1, 2, 1, 'soy sandra y quiero el admin'),
(135, 2, 1, 1, 2, 'soy admin y quiero a sandra'),
(136, 2, 1, 1, 2, 'soy admin otra vez y quiero a sandra'),
(137, 2, 1, 2, 1, 'ya deja el fastidio admin '),
(141, 3, 1, 3, 1, 'alberto'),
(142, 3, 1, 1, 3, 'admin'),
(143, 2, 1, 1, 2, 'quiero pene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_clientes` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `tlf` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_clientes`, `Nombre`, `apellido`, `Edad`, `Correo`, `tlf`, `password`, `direccion`) VALUES
(1, 'Osward', 'venecia', 22, 'oswardvenecia@gmail.com', '04123029075', '147852', 'csadsada'),
(2, 'Sandra', 'povea', 19, 'sandra@gmail.com', '04162253321', '258963', 'dassdasfafbvrg'),
(3, 'alberto', 'pevea', 18, 'admin.admin@gmail.com', '123456', '123456', 'dafdfgghg ht');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_Compra` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Tipo` int(5) NOT NULL,
  `ID_pago` int(11) NOT NULL,
  `Hora` time NOT NULL DEFAULT current_timestamp(),
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Monto_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_Compra`, `ID_Usuario`, `ID_Tipo`, `ID_pago`, `Hora`, `Fecha`, `Monto_Total`) VALUES
(3, 1, 1, 4, '10:27:00', '2024-10-11', 100),
(4, 2, 2, 5, '10:44:00', '2024-10-11', 500),
(5, 3, 2, 6, '11:00:00', '2024-10-11', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compra`
--

CREATE TABLE `detalles_compra` (
  `ID` int(11) NOT NULL,
  `ID_Compra` int(11) NOT NULL,
  `ID_Productos` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_compra`
--

INSERT INTO `detalles_compra` (`ID`, `ID_Compra`, `ID_Productos`, `Cantidad`) VALUES
(1, 3, 2, 5),
(2, 3, 4, 3),
(5, 3, 5, 2),
(6, 3, 15, 1),
(7, 4, 2, 2),
(8, 4, 18, 2),
(9, 4, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_Estado` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_Estado`, `Estado`) VALUES
(1, 'Aprobado'),
(2, 'No aprobado'),
(3, 'En Revisión ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pago`
--

CREATE TABLE `estado_pago` (
  `ID_Estado_Pago` int(11) NOT NULL,
  `ID_Pago` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_pago`
--

INSERT INTO `estado_pago` (`ID_Estado_Pago`, `ID_Pago`, `ID_Estado`) VALUES
(1, 4, 1),
(2, 5, 2),
(3, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `ID_Pago` int(11) NOT NULL,
  `Nro_Referencia` int(15) NOT NULL,
  `Fecha_Pago` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`ID_Pago`, `Nro_Referencia`, `Fecha_Pago`) VALUES
(4, 1474577225, '2024-10-10 01:11:12'),
(5, 123, '2024-10-10 03:52:47'),
(6, 1234, '2024-10-10 03:52:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `foto`, `nombre`, `descripcion`, `precio`) VALUES
(9, '1717691175_1.png', 'Tachiforte', 'Acetaminofen: Malestar General, Dolor de cabeza, Fiebre', 15),
(10, '1717691227_2.png', 'Solicion Oftalmica', 'Lagrimas Artificiales', 70),
(12, '1717694952_4.png', 'Colirio Geolab', 'cloridrato de nafazolina + sulfato de zinco heptaidratado', 25),
(16, '1717708523_3.png', 'Espironolactona', '20 Tabletas 25mg', 20),
(31, '1719004989_7.png', 'drako', '20 Tabletas 25mg', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_tienda`
--

CREATE TABLE `productos_tienda` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(255) NOT NULL,
  `unidades` int(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `fecha_vencer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_tienda`
--

INSERT INTO `productos_tienda` (`id`, `nombre`, `foto`, `descripcion`, `precio`, `unidades`, `categoria`, `status`, `fecha_vencer`) VALUES
(2, 'Tachiforte', '1717691175_1.png', 'producto nuevo', 20, 10, 'medicamentos', 'offer', '2024-10-31'),
(3, 'Peine', 'foto2', 'amarillo ', 10, 10, 'belleza', 'on', '2024-10-30'),
(4, 'Atamel', '1717691227_2.png', 'producto de 20 pastillas', 15, 5, 'medicamentos', 'offer', '2024-10-29'),
(5, 'shampoo', 'foto4', 'nuevo', 13, 3, 'belleza', 'on', '2024-10-29'),
(6, 'Colirio Geolab', '1717694952_4.png', 'nuevo', 12, 10, 'medicamentos', 'offer', '2024-10-30'),
(7, 'Espironolactona', '1717708523_3.png', 'nuevo', 25, 4, 'medicamentos', 'offer', '2024-10-31'),
(8, 'Xenda', '1718983272_6.png', '3ml nuevo', 17, 9, 'medicamentos', 'offer', '2024-10-31'),
(9, 'Torsilax', '1718984956_10.png', 'nuevo', 20, 25, 'medicamentos', 'on', '2024-10-30'),
(10, 'atamel potasico ', '1719004989_7.png', '50 mg ', 18, 8, 'medicamentos', 'off', '2024-10-29'),
(11, 'nivea men', 'nivea.png', 'Deep clean ', 20, 5, 'cuidado-personal', 'on', '2024-10-29'),
(12, 'champu head & shouders', 'champu-head-shouders.png', 'champu reparador', 10, 4, 'cuidado-personal', 'on', '2024-10-28'),
(13, 'crema corporal nivea', 'crema-corporal-nivea.png', 'Nutricion y Humectacion profunda de 48h 250ml', 5, 6, 'cuidado-personal', 'on', '2024-10-30'),
(14, 'Gel facial nivea', 'gel-facial-nivea.png', 'Gel refrescante hidratante 100ml', 15, 7, 'cuidado-personal', 'on', '2024-10-30'),
(15, 'Jabon intimo nivea', 'jabon-intimo-nivea.png', 'Cuidado suave 250ml', 10, 5, 'cuidado-personal', 'on', '2024-10-30'),
(16, 'protector facial nivea', 'protector-facial-nivea.png', 'control de brillo 50FPS ', 5, 10, 'cuidado-personal', 'on', '2024-10-30'),
(17, 'protector solar facial nivea', 'protector-solar-facial-nivea.png', 'Control de brillo con color tono medio 50FPS', 8, 6, 'cuidado-personal', 'on', '2024-10-30'),
(18, 'Cheese tris', 'cheese-tris.png', 'full queso 150g', 4, 6, 'viveres', 'on', '2024-10-28'),
(19, 'Coca Cola', 'coca-cola.png', 'sabor original 2L', 5, 10, 'viveres', 'on', '2024-10-28'),
(20, 'Doritos', 'doritos.png', 'mega queso 150g', 5, 7, 'viveres', 'on', '2024-10-28'),
(21, 'Flips chocolate', 'flips-chocolate.png', '220g', 10, 6, 'viveres', 'on', '2024-10-30'),
(22, 'Galletas Oreo', 'galletas-Oreo.png', 'Tipo americano 38g', 5, 10, 'viveres', 'on', '2024-10-30'),
(23, 'Ruffles', 'ruffles-queso.png', 'Queso 125g', 10, 6, 'viveres', 'on', '2024-10-29'),
(24, 'Samba', 'samba.png', 'Fresa 32g', 0, 10, 'viveres', 'on', '0000-00-00'),
(25, 'Adlhesivo telaaa', 'adlhesivo-tela.png', '1 pulgada', 15, 4, 'material-medico', 'on', '2024-10-30'),
(26, 'Agua Oxigenada', 'agua-oxigenada.png', 'Solucion 3% 500ml', 25, 10, 'material-medico', 'on', '2024-10-27'),
(27, 'Alcohol antiseptico', 'alcohol-antiseptico.png', 'Concentrado al 70% 120ml', 15, 7, 'material-medico', 'on', '0000-00-00'),
(28, 'Gasa sobre 2x2', 'Gasa-sobre-2x2.png', '2 Piezas por sobre 100% Algodon', 5, 10, 'material-medico', 'on', '0000-00-00'),
(34, 'Guantes Nitrilo', 'guantes-nitrilo.png', '10 unidades', 15, 7, 'material-medico', 'on', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID_Proveedores` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Dirección` text NOT NULL,
  `Contacto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_productos`
--

CREATE TABLE `proveedores_productos` (
  `ID` int(11) NOT NULL,
  `ID_Proveeedores` int(11) NOT NULL,
  `ID_Productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `productos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `unique_id`, `usuario`, `productos`, `cantidad`) VALUES
(1, 28413499, 'osward', 4, 3),
(2, 11257231, 'oswaldo', 15, 3),
(3, 28158307, 'anna', 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_Rol` int(11) NOT NULL,
  `descripción` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_Rol`, `descripción`) VALUES
(1, 'Cliente'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `ID_Roles` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID_Roles`, `ID_Usuario`, `ID_Rol`) VALUES
(2, 1, 1),
(3, 2, 1),
(5, 3, 1),
(6, 4, 1),
(7, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_compra`
--

CREATE TABLE `tipo_compra` (
  `ID_Tipo` int(5) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_compra`
--

INSERT INTO `tipo_compra` (`ID_Tipo`, `Tipo`) VALUES
(1, 'Física'),
(2, 'Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Correo`, `Telefono`, `Password`, `Direccion`) VALUES
(1, 'AdminPRO', 'adminPRO', 18, 'AdminPRO@gmail.com', '04127015626', '12345678', 'los teques, las flores'),
(2, 'Osward', 'Venecia', 22, 'oswardvenecia@gmail.com', '04123029075', '001002003', 'los teques, resis lagunetica'),
(3, 'Sandra', 'Andrade', 19, 'sandraNdrade@gmail.com', '04241234567', '789456SANDRA', 'Los TEQUES MMGVOOO'),
(4, 'Kevin', 'Yanez', 22, 'KevinYanez123@gamil.com', '04125526548', '147852K', 'los teques, El paso '),
(5, 'admin', 'admin', 33, 'Admin@gmail.com', '04125986521', '123', 'caracas'),
(7, 'drako', 'torres', 15, 'O_01DRAKO959@hotmail.com', '04165286654', '000000000000000000000', 'reten'),
(17, 'drako', 'torres', 20, 'dsadsagfgfbh@gmail.com', '04165286654', '0102', 'reten'),
(18, 'drako', 'torres', 20, 'dsadsagfgfb515h@gmail.com', '04165286654', '151515', 'reten'),
(19, 'drako', 'torres', 20, 'dsadsagfgfb514818715h@gmail.com', '04165286654', '550521', 'reten'),
(20, 'Kevin', '0', 21, 'k05yanz@gmail.com', '04242026311', '0', 'tucasa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_usuario`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_clientes`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_Compra`),
  ADD KEY `Compra_tipo` (`ID_Tipo`),
  ADD KEY `Compra_usuario` (`ID_Usuario`),
  ADD KEY `compra_pago` (`ID_pago`);

--
-- Indices de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Dcompra_compra` (`ID_Compra`),
  ADD KEY `Dcompra_productos` (`ID_Productos`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  ADD PRIMARY KEY (`ID_Estado_Pago`),
  ADD KEY `estadoP_estado` (`ID_Estado`),
  ADD KEY `estadoP_pago` (`ID_Pago`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_Pago`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_tienda`
--
ALTER TABLE `productos_tienda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_Proveedores`);

--
-- Indices de la tabla `proveedores_productos`
--
ALTER TABLE `proveedores_productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`ID_Roles`),
  ADD KEY `rol_usuario` (`ID_Usuario`),
  ADD KEY `rol_roles` (`ID_Rol`);

--
-- Indices de la tabla `tipo_compra`
--
ALTER TABLE `tipo_compra`
  ADD PRIMARY KEY (`ID_Tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  MODIFY `ID_Estado_Pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos_tienda`
--
ALTER TABLE `productos_tienda`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID_Roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`ID_clientes`),
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `Compra_tipo` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_compra` (`ID_Tipo`),
  ADD CONSTRAINT `Compra_usuario` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`),
  ADD CONSTRAINT `compra_pago` FOREIGN KEY (`ID_pago`) REFERENCES `pago` (`ID_Pago`);

--
-- Filtros para la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD CONSTRAINT `Dcompra_compra` FOREIGN KEY (`ID_Compra`) REFERENCES `compra` (`ID_Compra`),
  ADD CONSTRAINT `Dcompra_productos` FOREIGN KEY (`ID_Productos`) REFERENCES `productos_tienda` (`id`);

--
-- Filtros para la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  ADD CONSTRAINT `estadoP_estado` FOREIGN KEY (`ID_Estado`) REFERENCES `estado` (`ID_Estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estadoP_pago` FOREIGN KEY (`ID_Pago`) REFERENCES `pago` (`ID_Pago`);

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_roles` FOREIGN KEY (`ID_Rol`) REFERENCES `roles` (`ID_Rol`),
  ADD CONSTRAINT `rol_usuario` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
