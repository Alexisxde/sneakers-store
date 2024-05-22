-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2024 a las 18:32:18
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
-- Base de datos: `bd_olivarez_alexis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id_size` int(11) NOT NULL,
  `id_sneaker` varchar(255) DEFAULT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id_sneaker` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `discount` decimal(4,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `stars` decimal(3,1) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id_sneaker`, `img`, `price`, `discount`, `brand`, `model`, `stars`, `is_active`, `description`) VALUES
('6645419a64d3e', 'adidas-duramo-speed.jfif', 114.999, 7.00, 'Adidas', 'Duramo Speed', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!'),
('66456c44529f4', 'adidas-racer-tr23.jfif', 137.999, 5.00, 'Adidas', 'Racer TR23', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!'),
('66456c5fd8e39', 'nike-air-max-impact-4.jfif', 169.999, 15.00, 'Nike', 'Air Max Impact 4', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!'),
('66456cd0ce7ce', 'nike-revolution-6-next-nature.jfif', 115.999, 10.00, 'Nike', 'Revolution 6 Next Nature', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!'),
('66456cdd91b71', 'under-armour-buzzer.jfif', 139.999, 30.00, 'Under Armour', 'Buzzer', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `rol` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `name`, `surname`, `token`, `register_date`, `is_active`, `rol`) VALUES
('6647cacb34dab', 'test1', '$2y$10$fNpvnwBJerMwqIXjHkejIemzKKRn2ebtBOcm88byU5fPDW6dLb8B6', 'test1@gmail.com', 'Test1', 'Test1', '6f53287e18fae3c59aa23da40d145066cc1d77d041c56ee7ae6cc684992308d7', '2024-05-17 21:23:23', 1, 'user'),
('6647cb04f2a89', 'admin', '$2y$10$aOjmfHNO3ZctVnspyrXqpOtox64JcR6sl4ru3onMa/BIiW3HtiHKK', 'olivarezalexis749@gmail.com', 'Admin', 'Admin', 'f51aed354f1b3ecd07f2e06dafac058479d156ca36a6fb5f74254ac9c1e842c8', '2024-05-17 21:24:21', 1, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id_size`),
  ADD KEY `id_sneaker` (`id_sneaker`);

--
-- Indices de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id_sneaker`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`id_sneaker`) REFERENCES `sneakers` (`id_sneaker`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
