-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2022 a las 23:37:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `direccion`) VALUES
(1, 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaabbbbbbbbbbbbbbbbbb', 'ccccccccccccccccc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` char(1) NOT NULL,
  `f_fabricacion` date NOT NULL,
  `f_caducidad` date NOT NULL,
  `precio` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `f_fabricacion`, `f_caducidad`, `precio`) VALUES
(1, 'Amoxicillin', 'C', '2021-08-21', '2022-06-30', 1.5),
(2, 'Aspirina', '1', '2022-01-10', '2023-09-18', 3.05),
(3, 'Omeprazole', 'C', '2021-09-27', '2022-10-02', 4.55),
(4, 'Ibuprofeno', 'T', '2021-07-09', '2024-12-06', 2),
(5, 'Paracetamol', 'T', '2021-11-30', '2022-12-20', 1.1),
(6, 'Cebion', 'V', '2021-09-15', '2022-10-23', 4.55),
(8, 'Lavadora', 'a', '2022-06-12', '2022-06-10', 54),
(9, 'Jarabe2', 'J', '2022-06-18', '2022-06-10', 4.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proovedor`
--

CREATE TABLE `proovedor` (
  `id` int(25) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proovedor`
--

INSERT INTO `proovedor` (`id`, `cedula`, `nombre`, `direccion`) VALUES
(1, '12123123', 'qasdada', 'asdasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'supervisor'),
(3, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `codigo1` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`id`, `usuario`, `codigo1`, `direccion`, `email`) VALUES
(3, 'admin', '123456', 'aaaaaaaaaaa', 'accccccccccccccc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `rol_id`) VALUES
(1, 'admin', '123', 'admin@admin.com', 1),
(2, 'supervisor', '123', 'supervisor@farmacia.com', 2),
(3, 'vendedor', '123', 'vendedor@farmacia.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(25) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `codigo1` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `usuario`, `codigo1`, `direccion`, `email`) VALUES
(3, 'bbbbbbbbbbbbbbbbb', '45', 'qqqqqqqqqqqqqqqqqqqq', 'aaaaaaaaaaaaaaaaaaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proovedor`
--
ALTER TABLE `proovedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rol_id` (`rol_id`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proovedor`
--
ALTER TABLE `proovedor`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `user_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
