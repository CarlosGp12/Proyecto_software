-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-08-2022 a las 04:57:20
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

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
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre_Categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre_Categoria`) VALUES
(11, 'Bebes'),
(12, 'Dolores de Cabeza'),
(13, 'Alergias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Cliente` varchar(30) NOT NULL,
  `direccion_Cliente` text,
  `celular` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre_Cliente`, `direccion_Cliente`, `celular`) VALUES
(21, 'Alexander Atahualpa', 'Garzota', '0986417589'),
(22, 'Carlos Molina', 'Los Esteros', '0985471276'),
(23, 'Fernando Loja', 'Pradera', '0985256974');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `nombre_Producto` varchar(20) NOT NULL,
  `precio_Venta` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ID_Cliente` (`ID_Cliente`),
  KEY `fk_ID_Usuario` (`ID_Usuario`),
  KEY `fk_ID_producto` (`ID_Producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `ID_Usuario`, `ID_Cliente`, `fecha`, `ID_Producto`, `nombre_Producto`, `precio_Venta`, `cantidad`, `total`) VALUES
(80, 33, 22, '2022-06-20 08:25:52', 53, 'Paracetamol', 0.1, 2, 0.2),
(79, 33, 23, '2022-06-22 12:10:59', 54, 'Aspirina', 0.05, 3, 0.15),
(78, 33, 21, '2022-06-24 18:45:03', 55, 'Alercet', 1.25, 1, 1.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Produto` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_Fabricacion` date NOT NULL,
  `fecha_Vencimiento` date NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `ID_Proveedor` int(11) NOT NULL,
  `precio_Venta` float NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_ID_Categoria` (`ID_Categoria`),
  KEY `fk_ID_Proveedor` (`ID_Proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_Produto`, `stock`, `fecha_Fabricacion`, `fecha_Vencimiento`, `ID_Categoria`, `ID_Proveedor`, `precio_Venta`, `imagen`) VALUES
(54, 'Aspirina', 20, '2022-01-21', '2023-02-21', 12, 91, 0.05, ''),
(53, 'Paracetamol', 40, '2021-10-30', '2023-08-15', 12, 92, 0.1, ''),
(55, 'Alercet', 5, '2021-11-29', '2022-12-11', 13, 93, 1.25, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Proveedor` varchar(50) NOT NULL,
  `direccion_Proveedor` text,
  `celular` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre_Proveedor`, `direccion_Proveedor`, `celular`) VALUES
(92, 'Maximiliano Poveda', 'Acacias', '0975821972'),
(91, 'Joel Mindola', 'Urdesa', '0985147436'),
(93, 'Leonardo Bastidas', 'Miraflores', '0985527485');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Supervisor'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE IF NOT EXISTS `supervisor` (
  `ID_Supervisor` int(11) NOT NULL,
  `nombre_Usuario` varchar(30) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `direccion_Supervisor` text,
  KEY `fk_ID_Supervisor` (`ID_Supervisor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`ID_Supervisor`, `nombre_Usuario`, `correo`, `password`, `direccion_Supervisor`) VALUES
(22, 'Carlos_Cedeño45', 'Carlos_Cedeño45@gmail.com', 'luna52', 'Entrada de la 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Usuario` varchar(30) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `ID_Rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_ID_Rol` (`ID_Rol`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_Usuario`, `correo`, `password`, `ID_Rol`) VALUES
(22, 'Carlos_Cedeño45', 'Carlos_Cedeño45@gmail.com', 'luna52', 2),
(11, 'Francisco_Tinapio63', 'Francisco_Tinapio63@gmail.com', 'mar85', 1),
(33, 'Jose_Suarez100', 'Jose_Suarez100@gmail.com', 'carro456', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `ID_Vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_UsuarioV` varchar(30) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `direccion_Vendedor` text,
  PRIMARY KEY (`ID_Vendedor`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`ID_Vendedor`, `nombre_UsuarioV`, `correo`, `password`, `direccion_Vendedor`) VALUES
(33, 'Jose_Suarez100', 'Jose_Suarez100@gmail.com', 'carro456', 'Duran - Panorama\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


FARMACIA 