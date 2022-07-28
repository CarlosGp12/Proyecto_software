-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-07-2022 a las 19:02:22
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
  `id_cate` varchar(8) NOT NULL,
  `nom_des` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cli` varchar(8) NOT NULL,
  `nom_cli` varchar(50) NOT NULL,
  `dir_cli` varchar(50) DEFAULT NULL,
  `id_dis` varchar(8) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `ci` int(10) NOT NULL,
  `Celular` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_cli`),
  KEY `pk_id_dis_cli` (`id_dis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleordenpedido`
--

DROP TABLE IF EXISTS `detalleordenpedido`;
CREATE TABLE IF NOT EXISTS `detalleordenpedido` (
  `num_ordenp` varchar(8) NOT NULL,
  `id_pro` varchar(8) NOT NULL,
  `nom_pro` varchar(40) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`num_ordenp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

DROP TABLE IF EXISTS `distrito`;
CREATE TABLE IF NOT EXISTS `distrito` (
  `id_dis` varchar(8) NOT NULL,
  `nom_dis` varchar(40) NOT NULL,
  PRIMARY KEY (`id_dis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `id_emp` varchar(8) NOT NULL,
  `nom_emp` varchar(40) NOT NULL,
  `dir_emp` varchar(40) DEFAULT NULL,
  `id_dis` varchar(8) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `cell` int(11) DEFAULT NULL,
  `ingreso` date DEFAULT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`id_emp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `num_fact` varchar(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_emp` varchar(8) NOT NULL,
  `id_cli` varchar(8) NOT NULL,
  `num_ordenPedido` varchar(8) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`num_fact`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenpedido`
--

DROP TABLE IF EXISTS `ordenpedido`;
CREATE TABLE IF NOT EXISTS `ordenpedido` (
  `num_ordenPedido` varchar(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cli` varchar(8) DEFAULT NULL,
  `nom_cli` varchar(40) DEFAULT NULL,
  `id_emp` varchar(8) DEFAULT NULL,
  `id_tipoPago` varchar(8) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_ordenPedido`),
  KEY `pk_id_cli` (`id_cli`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_pro` varchar(8) NOT NULL,
  `nom_pro` varchar(40) NOT NULL,
  `pre_venta` decimal(10,2) NOT NULL,
  `pre_compra` decimal(10,2) NOT NULL,
  `fecha_venc` datetime NOT NULL,
  `stock` int(11) NOT NULL,
  `id_cat` varchar(8) NOT NULL,
  `id_prov` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_prov` varchar(8) NOT NULL,
  `nom_prov` varchar(40) NOT NULL,
  `dir_prov` varchar(50) DEFAULT NULL,
  `celular` char(10) DEFAULT NULL,
  `id_dis` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` varchar(8) NOT NULL,
  `id_emp` varchar(8) NOT NULL,
  `nivel_usu` varchar(2) NOT NULL,
  `nom_usu` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `activo` varchar(2) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
