-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 07:02:31
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
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `id_sale` varchar(255) NOT NULL,
  `id_sneaker` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `date_sale` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `id_sale`, `id_sneaker`, `size`, `quantity`, `price`, `id_user`, `date_sale`) VALUES
(3, '665f9ae08d568', '66557049e15c6', 39, 1, '83.600', '665b77e1e2018', '2024-06-04 19:53:20'),
(4, '665f9ae08d568', '665570cf6933e', 39, 1, '85.000', '665b77e1e2018', '2024-06-04 19:53:20');

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
('6654065a1111f', '6654065a1111f.jfif', 160000.000, 15.00, 'Adidas', 'Duramo Speed', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('665407a3b88e4', '665407a3b88e4.jfif', 122000.000, 35.00, 'Adidas', 'Run Falcon 3.0', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
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
  `size` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_stock`, `id_sneaker`, `size`, `quantity`) VALUES
(1, '66557049e15c6', 39, 7),
(2, '66557049e15c6', 40, 8),
(3, '66557049e15c6', 41, 10),
(4, '66557049e15c6', 42, 10),
(5, '66557049e15c6', 43, 10),
(6, '665570cf6933e', 39, 9),
(7, '665570cf6933e', 40, 10),
(8, '665570cf6933e', 41, 10),
(9, '665570cf6933e', 42, 10);

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
('6647cacb34dab', 'test1', '$2y$10$fNpvnwBJerMwqIXjHkejIemzKKRn2ebtBOcm88byU5fPDW6dLb8B6', 'test1@gmail.com', 'Test1', 'Test1', '6f53287e18fae3c59aa23da40d145066cc1d77d041c56ee7ae6cc684992308d7', '2024-05-17 21:23:23', 0, 'user'),
('6647cb04f2a89', 'admin', '$2y$10$iIkGE3K74OuXv1WqJx1XoeT4A4Pg1ZjhDNPr6gVLhr.Qd5miPtXaW', 'olivarezalexis749@gmail.com', 'Admin2', 'Admin2', 'f51aed354f1b3ecd07f2e06dafac058479d156ca36a6fb5f74254ac9c1e842c8', '2024-05-17 21:24:21', 1, 'admin'),
('6659edf9989c9', 'testuser', '$2y$10$3ECBKWUP0vh6Sst0vTcPhOGBHYDEbBWnM6IYCYcQhVKltnP9D6Bh2', 'test@test.com', 'Test', 'User', 'f1cda3aae534a11bc69cd8db7ee99b889b1d2c322df9b779daabcd98d51cf254', '2024-05-31 15:34:17', 1, 'user'),
('665b77e1e2018', 'testuser1', '$2y$10$k721Qn1sjwUCQHx35aOjgeBuxMrcSXyRnG0llD6RUcxlKD0YT0heW', 'testuser1@test.com', 'TestUser1', 'TestUser1', '2c3b095800f4211292468da94303cc60aa947cb6e822cac95ba1fa7814824b81', '2024-06-01 19:34:58', 1, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_size` (`size`);

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
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_sneaker`) REFERENCES `sneakers` (`id_sneaker`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
