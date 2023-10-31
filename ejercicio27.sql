-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 22:58:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio27`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `autor_id` int(11) NOT NULL,
  `create_ad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `post_id`, `content`, `autor_id`, `create_ad`) VALUES
(1, 5, 'Cometario uno', 1, '2023-10-29 02:46:43'),
(2, 1, 'Comentario dossss', 1, '2023-10-29 02:46:43'),
(3, 1, 'aca va el comentario', 1, '2023-10-29 02:46:43'),
(4, 3, 'Cometario cuatro', 3, '0000-00-00 00:00:00'),
(6, 10, 'aca va el contyrol de fecha', 3, '2023-10-30 04:47:21'),
(7, 1, 'aca va el contyrol de fecha', 3, '2023-10-30 04:47:24'),
(9, 3, 'aca va el contyrol de XXXXXXXXX', 3, '2023-10-30 05:31:31'),
(10, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:29:57'),
(11, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:30:44'),
(12, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:31:16'),
(13, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:36:17'),
(14, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:42:35'),
(15, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:43:03'),
(16, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:43:15'),
(17, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:43:30'),
(18, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:43:52'),
(19, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:44:21'),
(20, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:45:04'),
(21, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:45:18'),
(22, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:45:26'),
(23, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:47:24'),
(24, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:47:44'),
(25, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:48:08'),
(26, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:48:25'),
(27, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:48:37'),
(28, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:49:11'),
(29, 34, 'ESTO ES UN COMENTARIO DE PRUEBA', 2, '2023-10-31 21:49:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicaciones` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `autor_id` int(11) NOT NULL,
  `create_ad` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicaciones`, `title`, `content`, `autor_id`, `create_ad`) VALUES
(1, 'primer titulo', 'aca ba lo que se quiere publicar', 1, '2023-10-29 00:00:00'),
(3, 'primer titulo desde el POST', 'aca ba lo que se quiere publicar', 2, '0000-00-00 00:00:00'),
(4, 'primer titulo desde el PUTTT', 'aca ba lo que se quiere publicar', 1, '0000-00-00 00:00:00'),
(5, 'primer titulo desde el PUNNN', 'aca ba lo que se quiere publicar', 3, '0000-00-00 00:00:00'),
(6, 'primer titulo desde el PUNNN', 'aca ba lo que se quiere publicar', 2, '0000-00-00 00:00:00'),
(7, 'primer titulo desde el PUNNN', 'aca ba lo que se quiere publicar', 1, '2023-10-29 00:03:52'),
(8, 'aaaa', 'wwwwwwwww', 2, '2023-10-30 11:57:34'),
(9, 'primer articulo', 'loremffffffffffffffffffffffffffff', 2, '2023-10-30 12:01:04'),
(10, 'primer articulo', 'loremffffffffffffffffffffffffffff', 2, '2023-10-30 12:02:36'),
(11, 'sss', 'fff', 2, '2023-10-30 12:04:56'),
(12, 'eee', 'rrrr', 2, '2023-10-30 12:06:44'),
(13, 'fff', 'ddd', 2, '2023-10-30 12:07:08'),
(14, 'wwwwwwww', 'rrrrrrrrrrr', 2, '2023-10-30 12:07:57'),
(15, 'iii', 'yyyyyyy', 2, '2023-10-30 12:08:46'),
(16, 'eee', 'wwww', 2, '2023-10-30 12:09:27'),
(17, 'dddd', 'aaaaaaaaaa', 2, '2023-10-30 15:56:06'),
(18, 'estamos probando su funciona', 'aca ponemos el texto esperando tener algo de exito', 2, '2023-10-30 16:01:08'),
(19, 'segundo intento', 'cargando el segundo intento', 2, '2023-10-30 16:15:03'),
(20, 'ttt', 'ttt', 2, '2023-10-30 16:56:19'),
(21, 'rrr', 'rrrr', 2, '2023-10-30 16:56:32'),
(22, 's', 's', 2, '2023-10-30 17:25:10'),
(23, 'aaa', 'aaaa', 2, '2023-10-30 17:25:16'),
(24, 'zz', 'zz', 2, '2023-10-30 17:27:45'),
(25, 'gg', 'ggg', 2, '2023-10-30 23:03:34'),
(27, 'rrr', 'gggg', 2, '2023-10-31 11:00:35'),
(28, 'prueba 15600', 'probando funciona por favos', 2, '2023-10-31 11:35:28'),
(29, 'prueba 15600', 'probando funciona por favos', 2, '2023-10-31 11:36:43'),
(30, 'viendo si funciona', 'espero que si', 2, '2023-10-31 11:53:05'),
(31, 'rr', 'ttttttttttt', 2, '2023-10-31 13:44:22'),
(32, 'fffffffffffff', 'gggggggggggggggg', 2, '2023-10-31 13:58:45'),
(33, 'probando12', 'ojala ande', 2, '2023-10-31 14:05:14'),
(34, 'rrrr', 'ttttttttttttt', 2, '2023-10-31 14:13:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `use_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `use_name`, `password`, `mail`, `activo`) VALUES
(1, 'hector', '12345', 'ucelayh@gmail.com', 1),
(2, 'Ramon', '12345', 'ucelayh@gmail.com', 1),
(3, 'ucelay', '12345', 'monser980@gmail.com', 1),
(4, 'ucelay', '12345', 'ucelayh@gmail.com', 1),
(5, 'ucelay', '12345', 'ucelayh@gmail.com', 1),
(6, 'ucelay', '12345', 'ucelayh@gmail.com', 1),
(7, 'hucelay', '12345', 'monser980@gmail.com', 1),
(8, 'Ramon', '12345', 'monser980@gmail.com', 1),
(9, 'Ramon', '12345', 'faceucelay@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicaciones`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `publicaciones` (`id_publicaciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
