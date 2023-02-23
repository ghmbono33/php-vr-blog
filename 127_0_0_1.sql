-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-02-2023 a las 07:42:26
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_master`
--
CREATE DATABASE IF NOT EXISTS `blog_master` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `blog_master`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Cat 1-1'),
(2, 'Cat2-1'),
(3, 'categoría chinchis'),
(4, 'chinchiland'),
(5, 'cat fleki'),
(6, 'cat solet'),
(7, 'new  cat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 6, 1, 'entrada 1', 'descripción 1', '2023-02-01'),
(2, 6, 1, 'entrada fleki', 'Fleki: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi accusantium enim neque, cumque facilis, tenetur recusandae laudantium quos quo qui exercitationem voluptatum sapiente harum laborum voluptates amet numquam molestiae cupiditate.', '2023-02-07'),
(3, 7, 1, 'entrada chinchi', 'Chinchi: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi accusantium enim neque, cumque facilis, tenetur recusandae laudantium quos quo qui exercitationem voluptatum sapiente harum laborum voluptates amet numquam molestiae cupiditate.', '2023-02-22'),
(4, 7, 1, 'entrada chinchi 2', 'Chinchi2: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi accusantium enim neque, cumque facilis, tenetur recusandae laudantium quos quo qui exercitationem voluptatum sapiente harum laborum voluptates amet numquam molestiae cupiditate.', '2023-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `titulo`, `descripcion`, `color`) VALUES
(1, 'uno', 'aaaaaaa', '111111'),
(2, 'dos', 'bbbbbbbb', '2222222'),
(3, 'el título', 'la descripción', 'azul'),
(4, 'el título', 'la descripción', 'azul'),
(5, 'el título', 'la descripción', 'azul'),
(6, 'el título', 'la descripción', 'azul'),
(7, 'el título', 'la descripción', 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(1, 'manolo', 'bono', 'adfasfd@adfasdf.es', '$2y$04$mv7TcsQAAQzbkS6FNLioiuALyd0GDsrlo0Mnfkj1S6Elrc7fewYdu', '2023-02-22'),
(2, 'asdfasdf', 'asdfasdfasd', 'mbono@asdfasdf.es', '$2y$04$hqqRovkuwSqwhgHx8qZ95uSWFJTkHBXMYamzZBNkqX1K/CxoHhVcG', '2023-02-22'),
(3, 'perico', 'palotes', 'asdfas@adfasd.es', '$2y$04$PA8Y..0IzrcuzhxuWoBlX.8TTJihiRTpCnqeqgCcLB0BowPnSRdTC', '2023-02-22'),
(4, 'peri\'co', 'aaaaaa', 'mbono@simetriagrupo.com', '$2y$04$oDdKf8S8ShzBdGZ6.VSBW.bBzHtRfnRcHE3hW4/y/mUFHJio0pXaG', '2023-02-22'),
(5, 'per\"ico', 'adfasdf', 'dfasdf@adfadsf.es', '$2y$04$nPVmjfpPLCNKJCRtGZwSMemb8NS2wHtNIYcl5keTNQlVs9X0r.u3u', '2023-02-22'),
(6, 'fleki', 'fleki', 'fleki@fleki.es', '$2y$04$fLdmc6jOhX9Lyb42Xc159euVpTXPkf8J.VTnB/9/RDZIJWgJ4n4Li', '2023-02-22'),
(7, 'chinchi', 'chinchi', 'chinchi@chinchi.es', '$2y$04$0GmsOqcxFugo9AtmleOUtu1ntkki4SQxe7pZMxAy.fIs.iF4iVQM.', '2023-02-22'),
(8, 'manolo', 'manolo', 'manolo@bono.es', '$2y$04$tw8/v4.wqSwbKKZnuJfyWuEzhIF/5zSCXXkbA0YNF0cNvHr6F8cHm', '2023-02-22'),
(9, 'periquito', 'periquito', 'periq@periq.es', '$2y$04$1MXP9svD7260RNKJ76dQ1OzSc8B6nvPrqX1TTdD3CeabdmBUoenmO', '2023-02-22'),
(10, 'chinchito', 'chinchito', 'chinchito@chinchito.es', '$2y$04$BUSJiqO73iAX/RjIxENfK.CI1Df17pdbl3v3k7RXsqg8InNswCe2W', '2023-02-22'),
(11, 'perico', 'perico', 'perico@perico.es', '$2y$04$Ip1lkZ8YZGytFtGAadePI.DSrV3gpeWZxCMO2MV9OmYFqecO.xn56', '2023-02-23');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
