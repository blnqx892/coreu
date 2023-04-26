-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2023 a las 15:55:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicafi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_activo`
--

CREATE TABLE `asignacion_activo` (
  `id` bigint(20) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `ubicacion` varchar(225) NOT NULL,
  `codigo_institucional` varchar(225) NOT NULL,
  `encargado_bien` varchar(225) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_ingreso_entradas` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_usuarios` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` bigint(20) NOT NULL,
  `evento` text NOT NULL,
  `usuario` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) NOT NULL,
  `categoria` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_entradas`
--

CREATE TABLE `ingreso_entradas` (
  `id` bigint(20) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `numero_factura` varchar(225) DEFAULT NULL,
  `costo_adquisicion` int(11) NOT NULL COMMENT 'esta columna guarda el costo en centavos de dolares',
  `nombre_adquisicion` varchar(250) NOT NULL,
  `serie_adquisicion` varchar(225) DEFAULT NULL,
  `marca` varchar(225) NOT NULL,
  `modelo` varchar(225) NOT NULL,
  `color` varchar(225) NOT NULL,
  `descripcion_adquisicion` varchar(225) DEFAULT NULL,
  `boolean_transporte` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'esto es para el switch de la vista',
  `numero_motor` varchar(225) DEFAULT NULL,
  `numero_placa` varchar(225) DEFAULT NULL,
  `numero_chasis` varchar(225) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `cargo` enum('Donado','Comprado') NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'esta sirve para cambiar el estado para saber si es verdadero o no',
  `vida_util` int(11) DEFAULT NULL,
  `fk_categoria` bigint(20) NOT NULL,
  `fk_proveedores` bigint(20) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_suministros`
--

CREATE TABLE `ingreso_suministros` (
  `id` bigint(20) NOT NULL,
  `fecha_suministro` date NOT NULL,
  `nombre_suministro` varchar(225) NOT NULL,
  `marca` varchar(225) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL COMMENT 'se manejara en centavos',
  `descripcion` varchar(225) DEFAULT NULL,
  `unidad_medida` varchar(225) DEFAULT NULL,
  `numero_tarjeta` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `stock_suministros` int(11) NOT NULL,
  `ubicacion` varchar(225) DEFAULT NULL,
  `codigo_barra` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(225) NOT NULL,
  `movimiento` int(11) NOT NULL,
  `cantidad_entrada` int(11) NOT NULL,
  `precio_entrada` int(11) NOT NULL,
  `cantidad_salida` int(11) NOT NULL,
  `saldo_articulos` int(11) NOT NULL,
  `fondos_procedencia` int(11) NOT NULL,
  `precio_salida` int(11) NOT NULL,
  `fk_ingreso_suministros` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_activos`
--

CREATE TABLE `mantenimiento_activos` (
  `id` bigint(20) NOT NULL,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` enum('Prestamo','TrasladoDefinitivo','Reparacion','Inservible','Robo y/o Hurto','Obsoleto') NOT NULL,
  `observaciones` varchar(225) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_ingreso_entradas` bigint(20) NOT NULL,
  `fk_unidades` bigint(20) NOT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'se usara para identificar entre moviminetos de activo y descargo de activo se tomara el estado verdadero para indicar que es moviento de activo y falso para descargo de activo '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) NOT NULL,
  `proveedor` varchar(225) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisicion_suministros`
--

CREATE TABLE `requisicion_suministros` (
  `id` bigint(20) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `unidad_medida` varchar(225) DEFAULT NULL,
  `descripcion_suminstro` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL COMMENT 'tiene que ser igual o menor que ingreso de suministros',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `aprobacion` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'siempre y cuando se tengan disponibles los suministros que se esten solicitando',
  `fk_unidades` bigint(20) NOT NULL,
  `fk_ingreso_suminitros` bigint(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` bigint(20) NOT NULL,
  `nombre_unidad` varchar(225) NOT NULL,
  `cantidad_empleados` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(225) NOT NULL,
  `apellido` varchar(225) NOT NULL,
  `usuario` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contrasena` varchar(225) NOT NULL,
  `rol` enum('Activo Fijo','Almacen','UACI') DEFAULT NULL COMMENT 'esta columna se ingresa los roles ',
  `nivel_empleado` enum('Jefe','Empleado') NOT NULL COMMENT 'aqui se guarda el dato para saber que cargo tiene el usuario',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_unidades` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_activo`
--
ALTER TABLE `asignacion_activo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_activo_ingreso_entradas_id_fk` (`fk_ingreso_entradas`),
  ADD KEY `asignacion_activo_usuarios_id_fk` (`fk_usuarios`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_entradas`
--
ALTER TABLE `ingreso_entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingreso_entradas_proveedores_id_fk` (`fk_proveedores`),
  ADD KEY `ingreso_entradas_categorias_id_fk` (`fk_categoria`);

--
-- Indices de la tabla `ingreso_suministros`
--
ALTER TABLE `ingreso_suministros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kardex_ingreso_suministros_id_fk` (`fk_ingreso_suministros`);

--
-- Indices de la tabla `mantenimiento_activos`
--
ALTER TABLE `mantenimiento_activos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimiento_activos_ingreso_entradas_id_fk` (`fk_ingreso_entradas`),
  ADD KEY `mantenimiento_activos_unidades_id_fk` (`fk_unidades`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisicion_suministros`
--
ALTER TABLE `requisicion_suministros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisicion_suministros_unidades_id_fk` (`fk_unidades`),
  ADD KEY `requisicion_suministros_ingreso_suministros_id_fk` (`fk_ingreso_suminitros`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unidades_pk2` (`nombre_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_pk` (`email`),
  ADD KEY `usuarios_unidades_id_fk` (`fk_unidades`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_activo`
--
ALTER TABLE `asignacion_activo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_suministros`
--
ALTER TABLE `ingreso_suministros`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_activos`
--
ALTER TABLE `mantenimiento_activos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requisicion_suministros`
--
ALTER TABLE `requisicion_suministros`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_activo`
--
ALTER TABLE `asignacion_activo`
  ADD CONSTRAINT `asignacion_activo_ingreso_entradas_id_fk` FOREIGN KEY (`fk_ingreso_entradas`) REFERENCES `ingreso_entradas` (`id`),
  ADD CONSTRAINT `asignacion_activo_usuarios_id_fk` FOREIGN KEY (`fk_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ingreso_entradas`
--
ALTER TABLE `ingreso_entradas`
  ADD CONSTRAINT `ingreso_entradas_categorias_id_fk` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `ingreso_entradas_proveedores_id_fk` FOREIGN KEY (`fk_proveedores`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ingreso_suministros_id_fk` FOREIGN KEY (`fk_ingreso_suministros`) REFERENCES `ingreso_suministros` (`id`);

--
-- Filtros para la tabla `mantenimiento_activos`
--
ALTER TABLE `mantenimiento_activos`
  ADD CONSTRAINT `mantenimiento_activos_ingreso_entradas_id_fk` FOREIGN KEY (`fk_ingreso_entradas`) REFERENCES `ingreso_entradas` (`id`),
  ADD CONSTRAINT `mantenimiento_activos_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`);

--
-- Filtros para la tabla `requisicion_suministros`
--
ALTER TABLE `requisicion_suministros`
  ADD CONSTRAINT `requisicion_suministros_ingreso_suministros_id_fk` FOREIGN KEY (`fk_ingreso_suminitros`) REFERENCES `ingreso_suministros` (`id`),
  ADD CONSTRAINT `requisicion_suministros_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_unidades_id_fk` FOREIGN KEY (`fk_unidades`) REFERENCES `unidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
