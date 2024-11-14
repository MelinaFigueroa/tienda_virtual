-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 01:54:46
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
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 0,
  `destacado` tinyint(1) DEFAULT 0,
  `oferta` tinyint(1) DEFAULT 0,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `cantidad`, `destacado`, `oferta`, `fecha_creacion`) VALUES
(15, 'fghfgh', 'ghjfghjf', 99999999.99, 'maceta de tela.webp', 0, 1, 0, '2024-11-12 17:43:24'),
(16, 'fghfgh', 'fhgdfh', 564356.00, 'maceta de tela.webp', 1, 0, 1, '2024-11-12 17:44:27'),
(17, 'fghfgh', 'dhfhdfh', 747.00, 'maceta de tela.webp', 0, 1, 0, '2024-11-12 18:08:36'),
(18, 'fghfgh', 'dfgsfg', 436346.00, 'maceta de tela.webp', 0, 0, 1, '2024-11-12 18:09:45'),
(19, 'fghfgh', 'dfhdfgh', 56456.00, 'maceta de tela.webp', 0, 0, 0, '2024-11-12 18:19:30'),
(20, 'fghfgh', 'fhgdfhgs', 563456.00, 'maceta de tela.webp', 1, 0, 0, '2024-11-12 18:20:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Acceso total al sistema, puede gestionar usuarios y productos.', '2024-11-06 14:00:27', '2024-11-06 14:00:27'),
(2, 'usuario', 'Acceso básico, puede comprar productos y ver su historial de pedidos.', '2024-11-06 14:00:27', '2024-11-06 14:00:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '', 'admin_user', 'admin@gmail.com', 'contraseña_cifrada', 1, '2024-11-06 14:05:49', '2024-11-06 14:05:49'),
(2, '', 'cliente_user', 'cliente@gmail.com', 'contraseña_cifrada', 2, '2024-11-06 14:05:49', '2024-11-06 14:05:49'),
(3, 'Melina', 'Figueroa', 'melina.figueroa.89@gmail.com', '$2y$10$4vAISIWoyK3oYHTYp6VwGOZUc9d6AXNSZtC2aYYsjl4VIfZrswY.i', 1, '2024-11-06 16:46:54', '2024-11-11 22:46:10'),
(38, 'Emanuel', 'Lucietti', 'elucietti@gmail.com', '$2y$10$i7jq6guhtxDj6sinSTNuNOW8FiQQ64YQ4TaRZt2MKYEfsIM1NDd6q', 2, '2024-11-11 22:21:56', '2024-11-11 22:21:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
