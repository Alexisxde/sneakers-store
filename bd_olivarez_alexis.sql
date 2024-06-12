-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 19:01:23
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
-- Estructura de tabla para la tabla `header_sale`
--

CREATE TABLE `header_sale` (
  `id_sale` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `header_sale`
--

INSERT INTO `header_sale` (`id_sale`, `date`, `id_user`, `total`) VALUES
('6669b49ded9e3', '2024-06-12 14:45:49', '6647cb04f2a89', '371.320'),
('6669bf74d62ec', '2024-06-12 15:32:04', '6647cb04f2a89', '211.100');

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
-- Estructura de tabla para la tabla `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id` int(11) NOT NULL,
  `id_sale` varchar(255) NOT NULL,
  `sneaker_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sale_detail`
--

INSERT INTO `sale_detail` (`id`, `id_sale`, `sneaker_id`, `quantity`, `price`) VALUES
(18, '6669b49ded9e3', '665407a3b88e4', 1, '79.300'),
(19, '6669b49ded9e3', '6668cb5023fc3', 1, '292.020'),
(20, '6669bf74d62ec', '66557049e15c6', 1, '83.600'),
(21, '6669bf74d62ec', '6668a5580311f', 1, '127.500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id_sneaker` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price_purchase` decimal(10,3) DEFAULT NULL,
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

INSERT INTO `sneakers` (`id_sneaker`, `img`, `price_purchase`, `price`, `discount`, `brand`, `model`, `stars`, `is_active`, `description`) VALUES
('6654065a1111f', '6654065a1111f.jfif', 110000.000, 160000.000, 15.00, 'Adidas', 'Duramo Speed', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('665407a3b88e4', '665407a3b88e4.jfif', 98000.000, 122000.000, 35.00, 'Adidas', 'Run Falcon 3.0', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('6654082fe4f42', '6654082fe4f42.jfif', 195000.000, 220000.000, 5.00, 'Adidas', 'Terrex Free Hiker 2', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('66540a38b0026', '66540a38b0026.jfif', 140000.000, 175000.000, 12.00, 'Nike', 'Revolution 6 Next Nature', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, non. Fuga veritatis voluptate eos impedit aut ab aperiam! Asperiores quia esse natus praesentium ullam quo facere molestiae illo. Dolores, facere.'),
('66557049e15c6', '66557049e15c6.jfif', 76000.000, 95000.000, 12.00, 'Puma', 'Caven 2.0 Black', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dolor blanditiis ducimus commodi reprehenderit, quod ipsum explicabo rerum expedita incidunt placeat at recusandae, porro sint, eum omnis iste quaerat rem.'),
('665570cf6933e', '665570cf6933e.jpg', 75000.000, 100000.000, 15.00, 'Puma', 'Caven 2.0 White', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi dolor blanditiis ducimus commodi reprehenderit, quod ipsum explicabo rerum expedita incidunt placeat at recusandae, porro sint, eum omnis iste quaerat rem.'),
('665579117b4a1', '665579117b4a1.jfif', 65000.000, 90000.000, 22.00, 'Under Armour', 'Hovr Sonic 5 Dotd', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque possimus odio et ipsam accusantium quis, veniam cumque, esse debitis recusandae aliquid cum ipsum ad, quisquam optio animi nobis corporis necessitatibus.'),
('6668a5580311f', '6668a5580311f.jfif', 115000.000, 150000.000, 15.00, 'Adidas', 'Adistar 2 ', 3.5, 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur quasi aliquid, dolorum vero quod numquam? Perferendis vel esse commodi accusantium labore nam illo ratione? Mollitia sequi atque ad doloribus sunt?'),
('6668b92fcde46', '6668b92fcde46.jfif', NULL, 86000.000, 10.00, 'Under Armour', 'Buzzer', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668bb25f2f82', '6668bb25f2f82.jfif', NULL, 170000.000, 5.00, 'Adidas', 'Racer TR23', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668bd12ad9b7', '6668bd12ad9b7.jfif', NULL, 143000.000, 20.00, 'Nike', 'Air Max Sc', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668bd6e4c6bc', '6668bd6e4c6bc.jfif', NULL, 85000.000, 5.00, 'Adidas', 'Breaknet 2.0', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668bde389fea', '6668bde389fea.jfif', NULL, 115000.000, 2.00, 'Nike', 'Revolution 6 Next Nature', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668be5628c13', '6668be5628c13.jfif', NULL, 102000.000, 2.00, 'Adidas', 'Grand Court Cloudfoam', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668bec79fd79', '6668bec79fd79.jfif', NULL, 144000.000, 20.00, 'Adidas', 'Ultrabounce', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668c0a39afb0', '6668c0a39afb0.jfif', NULL, 120000.000, 5.00, 'Puma', 'Rbd Game Low', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668c152bb195', '6668c152bb195.jfif', NULL, 128000.000, 7.00, 'Nike', 'Waffle Debut Se', 4.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668c1bc3d3d9', '6668c1bc3d3d9.jfif', NULL, 138000.000, 8.00, 'Adidas', 'Courtjam Control 3', 3.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668cb5023fc3', '6668cb5023fc3.jfif', NULL, 314000.000, 7.00, 'Nike', 'Infinity Rn 4 Gore-tex', 5.0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668cc34b498a', '6668cc34b498a.jfif', NULL, 102600.000, 8.00, 'Adidas', 'Alphaedge', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668cc6deafdc', '6668cc6deafdc.jfif', NULL, 120000.000, 5.00, 'Puma', 'X-Ray 2 Square', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668ccf93104e', '6668ccf93104e.jfif', NULL, 120000.000, 6.00, 'Puma', 'Rbd Game Low White', 3.5, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668cd6cb9c6b', '6668cd6cb9c6b.jfif', NULL, 141000.000, 10.00, 'Adidas', 'Terrex Soulstride ', 4.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.'),
('6668cf2baf6a1', '6668cf2baf6a1.jfif', NULL, 120000.000, 10.00, 'Nike', 'Air Max Systm', 3.5, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio, eaque optio aut quis placeat tempora voluptate nobis mollitia ducimus earum minus! Provident eum officia dolor, at nihil nemo accusantium.');

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
(1, '66557049e15c6', 39, 9),
(2, '66557049e15c6', 40, 10),
(3, '66557049e15c6', 41, 10),
(4, '66557049e15c6', 42, 10),
(5, '66557049e15c6', 43, 10),
(6, '665570cf6933e', 39, 9),
(7, '665570cf6933e', 40, 10),
(8, '665570cf6933e', 41, 10),
(9, '665570cf6933e', 42, 10),
(10, '6654082fe4f42', 38, 10),
(11, '6654082fe4f42', 39, 10),
(12, '6668a5580311f', 38, 9),
(13, '665579117b4a1', 38, 10),
(14, '665579117b4a1', 39, 10),
(15, '665579117b4a1', 40, 10),
(16, '6668a5580311f', 39, 10),
(17, '66540a38b0026', 39, 10),
(18, '66540a38b0026', 41, 10),
(19, '665407a3b88e4', 40, 4),
(20, '665407a3b88e4', 41, 10),
(21, '6654065a1111f', 40, 10),
(22, '6668b92fcde46', 38, 10),
(23, '6668bb25f2f82', 38, 10),
(24, '6668bd12ad9b7', 38, 10),
(25, '6668bd6e4c6bc', 39, 10),
(26, '6668bde389fea', 39, 10),
(27, '6668be5628c13', 40, 10),
(28, '6668bec79fd79', 39, 10),
(29, '6668c0a39afb0', 39, 10),
(30, '6668c152bb195', 40, 10),
(31, '6668c1bc3d3d9', 40, 10),
(32, '6668cb5023fc3', 39, 8),
(33, '6668cc34b498a', 40, 10),
(34, '6668cc6deafdc', 40, 10),
(35, '6668ccf93104e', 39, 10),
(36, '6668cd6cb9c6b', 40, 10),
(37, '6668cf2baf6a1', 39, 10);

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
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `rol` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `name`, `surname`, `register_date`, `is_active`, `rol`) VALUES
('6647cacb34dab', 'test1', '$2y$10$fNpvnwBJerMwqIXjHkejIemzKKRn2ebtBOcm88byU5fPDW6dLb8B6', 'test1@test1.com', 'Test1', 'Test1', '2024-05-17 21:23:23', 0, 'user'),
('6647cb04f2a89', 'admin', '$2y$10$iIkGE3K74OuXv1WqJx1XoeT4A4Pg1ZjhDNPr6gVLhr.Qd5miPtXaW', 'admin@admin.com', 'Admin', 'Admin', '2024-05-17 21:24:21', 1, 'admin'),
('6659edf9989c9', 'testuser', '$2y$10$3ECBKWUP0vh6Sst0vTcPhOGBHYDEbBWnM6IYCYcQhVKltnP9D6Bh2', 'testuser@testuser.com', 'Test', 'User', '2024-05-31 15:34:17', 1, 'user'),
('665b77e1e2018', 'testuser1', '$2y$10$k721Qn1sjwUCQHx35aOjgeBuxMrcSXyRnG0llD6RUcxlKD0YT0heW', 'testuser1@testuser1.com', 'TestUser1', 'TestUser1', '2024-06-01 19:34:58', 1, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `header_sale`
--
ALTER TABLE `header_sale`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indices de la tabla `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sale` (`id_sale`),
  ADD KEY `sneaker_id` (`sneaker_id`);

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
-- AUTO_INCREMENT de la tabla `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `header_sale`
--
ALTER TABLE `header_sale`
  ADD CONSTRAINT `header_sale_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`id_sale`) REFERENCES `header_sale` (`id_sale`),
  ADD CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`sneaker_id`) REFERENCES `sneakers` (`id_sneaker`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_sneaker`) REFERENCES `sneakers` (`id_sneaker`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
