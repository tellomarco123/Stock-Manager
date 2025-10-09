-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2025 a las 10:30:11
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
-- Base de datos: `stock_manager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name_1` varchar(40) NOT NULL,
  `last_name_2` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `rol_usuario` enum('superadmin','admin','usuario') NOT NULL DEFAULT 'usuario',
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name_1`, `last_name_2`, `email`, `password`, `matricula`, `rol_usuario`, `birth_date`, `created_at`) VALUES
(4, 'Test', 'Usuario', 'Demo', 'testusuario1969@correo.com', '$2y$10$kfx7xXShe6AeZi4dxEsJzujKROBlUvrMuHhrKMb0x0mEQxj1N18O6', 'MATR6162', 'usuario', '2000-01-01', '2025-09-27 05:27:44'),
(14, 'Marco Antonio', 'Tello', 'Catalan', 'tellomarco836@gmail.com', '$2y$10$WiPakyE0u/7QhPURfWAkAOXEAqYs7nEttFyZ33eqi.G9bcKtM8zMe', 'abcdefghi12345', 'superadmin', '2003-01-25', '2025-10-08 08:51:43'),
(16, 'Juan', 'Lopez', NULL, 'pruebas@gmail.com', '$2y$10$lwS0H4h2iQKIBtaa.jS.3udjqxMFY0Rb9KFoqy7tDpVjTESRNbom2', 'abcde12345', 'admin', '2004-10-07', '2025-10-09 08:23:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
