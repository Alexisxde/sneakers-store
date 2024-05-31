-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2024 a las 17:35:32
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
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id_message`, `email`, `message`, `lastname`) VALUES
(1, 'olivarezalexis749@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!', 'Olivarez Alexis'),
(2, 'olivarezalexis749@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!', 'Olivarez Alexis');

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
  `price` decimal(10,3) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `stars` decimal(3,1) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id_sneaker`, `img`, `price`, `discount`, `brand`, `model`, `stars`, `is_active`, `description`) VALUES
('665404f37e25e', '665404f37e25e.jfif', 150000.000, 15.00, 'Adidas', 'Adistar 2', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('6654065a1111f', '6654065a1111f.jfif', 160000.000, 15.00, 'Adidas', 'Duramo Speed', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('665406916ea2c', '665406916ea2c.jfif', 170000.000, 20.00, 'Adidas', 'Racer TR23', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('665407a3b88e4', '665407a3b88e4.jfif', 122000.000, 35.00, 'Adidas', 'Run Falcon 3.0', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('6654082fe4f42', '6654082fe4f42.jfif', 220000.000, 5.00, 'Adidas', 'Terrex Free Hiker 2', 5.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('66540a38b0026', '66540a38b0026.jfif', 175000.000, 12.00, 'Nike', 'Revolution 6 Next Nature', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('66557049e15c6', '66557049e15c6.jfif', 95000.000, 12.00, 'Puma', 'Caven 2.0 Black', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dolor blanditiis ducimus commodi reprehenderit, quod ipsum explicabo rerum expedita incidunt placeat at recusandae, porro sint, eum omnis iste quaerat rem.'),
('665570cf6933e', '665570cf6933e.jpg', 100000.000, 15.00, 'Puma', 'Caven 2.0 White', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dolor blanditiis ducimus commodi reprehenderit, quod ipsum explicabo rerum expedita incidunt placeat at recusandae, porro sint, eum omnis iste quaerat rem.'),
('665579117b4a1', '665579117b4a1.jfif', 90000.000, 22.00, 'Under Armour', 'Hovr Sonic 5 Dotd', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque possimus odio et ipsam accusantium quis, veniam cumque, esse debitis recusandae aliquid cum ipsum ad, quisquam optio animi nobis corporis necessitatibus.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_sneaker` varchar(255) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('6647cb04f2a89', 'admin', '$2y$10$aOjmfHNO3ZctVnspyrXqpOtox64JcR6sl4ru3onMa/BIiW3HtiHKK', 'olivarezalexis749@gmail.com', 'Admin', 'Admin', 'f51aed354f1b3ecd07f2e06dafac058479d156ca36a6fb5f74254ac9c1e842c8', '2024-05-17 21:24:21', 1, 'admin'),
('6659edf9989c9', 'testuser', '$2y$10$3ECBKWUP0vh6Sst0vTcPhOGBHYDEbBWnM6IYCYcQhVKltnP9D6Bh2', 'test@test.com', 'Test', 'User', 'f1cda3aae534a11bc69cd8db7ee99b889b1d2c322df9b779daabcd98d51cf254', '2024-05-31 15:34:17', 1, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

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
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_sneaker` (`id_sneaker`),
  ADD KEY `id_size` (`id_size`);

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
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`id_sneaker`) REFERENCES `sneakers` (`id_sneaker`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_sneaker`) REFERENCES `sneakers` (`id_sneaker`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
