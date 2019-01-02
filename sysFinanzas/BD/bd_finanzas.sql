-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2019 a las 20:28:34
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_finanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `id_abono` int(11) NOT NULL,
  `cuenta` int(11) DEFAULT NULL,
  `valor` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `nota` varchar(75) DEFAULT NULL,
  `total_interes` varchar(20) DEFAULT NULL,
  `proximo_pago` date DEFAULT NULL,
  `mora` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`id_abono`, `cuenta`, `valor`, `fecha`, `hora`, `nota`, `total_interes`, `proximo_pago`, `mora`) VALUES
(8, 22, '88.543', '2018-12-30', '07:33:42', 'Sin Observaciones', '9.167', '2019-01-28', 0),
(9, 22, '88.281', '2018-12-30', '07:56:10', 'Sin Observaciones', '8.429', '2018-12-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idarticulos` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `idproveedor` int(10) DEFAULT NULL,
  `idcategoria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idarticulos`, `codigo`, `nombre`, `cantidad`, `valor`, `marca`, `estado`, `unidad`, `idproveedor`, `idcategoria`) VALUES
(1, 'LR12345664', 'Lavadora de Ropa', 1, 900, 'Mabe', 's', 1, 2, 1),
(2, '7415300005014', 'Refrigeradora', 1, 900, 'LG', 's', 1, 2, 1),
(3, '750120665242', 'Televisor', 1, 700, 'LG', 's', 1, 1, 6),
(4, '7441102801011', 'Computadora Sony', 3, 560, 'Sony', 's', 1, 1, 7),
(5, '744110280091', 'Play Station 4', 5, 300, 'Sony', 's', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`) VALUES
(1, 'Electrodomesticos'),
(2, 'Muebles'),
(3, 'Videojuegos'),
(4, 'Audio'),
(5, 'Accesorios'),
(6, 'Video'),
(7, 'Electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientcred_tmp`
--

CREATE TABLE `clientcred_tmp` (
  `id_cliente_temp` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_temp`
--

CREATE TABLE `cliente_temp` (
  `id_cliente_temp` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_tmp`
--

CREATE TABLE `compra_tmp` (
  `id` int(10) NOT NULL,
  `id_articulo` int(10) DEFAULT NULL,
  `cant` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `compra_tmp`
--

INSERT INTO `compra_tmp` (`id`, `id_articulo`, `cant`) VALUES
(8, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contable`
--

CREATE TABLE `contable` (
  `id_contable` int(11) NOT NULL,
  `concepto1` varchar(40) DEFAULT NULL,
  `concepto2` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `clase` varchar(20) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `cuota` float DEFAULT NULL,
  `to_interes` float DEFAULT NULL,
  `observacion` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contable`
--

INSERT INTO `contable` (`id_contable`, `concepto1`, `concepto2`, `tipo`, `valor`, `fecha`, `hora`, `clase`, `interes`, `cuota`, `to_interes`, `observacion`) VALUES
(22, '1', '12548741', 'CXC', '1100', '2018-12-28', '03:05:12', NULL, 10, 96.71, 60.5, NULL),
(24, 'Abono CXC No. 22', '12548741', 'ENTRADA', '88.543', '2018-12-31', '07:33:42', 'CXC', NULL, NULL, NULL, 'Sin Observaciones'),
(25, 'Abono CXC No. 22', '12548741', 'ENTRADA', '88.281', '2018-12-12', '07:56:10', 'CXC', NULL, NULL, NULL, 'Sin Observaciones'),
(27, '2', '12548780', 'CXC', '2160', '2018-12-30', '20:40:21', NULL, 20, 139.89, 358.01, NULL),
(28, 'Venta al \"CONTADO\"', '12548781', 'ENTRADA', '1200', '2018-12-30', '20:41:52', NULL, NULL, NULL, NULL, NULL),
(29, 'Venta al \"CONTADO\"', '12548782', 'ENTRADA', '120', '2018-12-30', '21:02:01', NULL, NULL, NULL, NULL, NULL),
(30, 'Venta al \"CONTADO\"', '12548783', 'ENTRADA', '9492', '2018-12-30', '21:06:34', NULL, NULL, NULL, NULL, NULL),
(31, 'Venta al \"CONTADO\"', '12548784', 'ENTRADA', '9492', '2018-12-30', '21:09:15', NULL, NULL, NULL, NULL, NULL),
(32, 'Venta al \"CONTADO\"', '12548785', 'ENTRADA', '9492', '2018-12-30', '21:21:30', NULL, NULL, NULL, NULL, NULL),
(33, 'Venta al \"CONTADO\"', '12548786', 'ENTRADA', '9492', '2018-12-30', '21:23:30', NULL, NULL, NULL, NULL, NULL),
(34, 'Venta al \"CONTADO\"', '12548787', 'ENTRADA', '2712', '2018-12-30', '21:30:17', NULL, NULL, NULL, NULL, NULL),
(35, 'Venta al \"CONTADO\"', '12548788', 'ENTRADA', '2712', '2018-12-30', '21:33:56', NULL, NULL, NULL, NULL, NULL),
(36, 'Venta al \"CONTADO\"', '12548789', 'ENTRADA', '2712', '2018-12-30', '21:38:10', NULL, NULL, NULL, NULL, NULL),
(37, 'Venta al \"CONTADO\"', '12548790', 'ENTRADA', '2712', '2018-12-30', '21:39:11', NULL, NULL, NULL, NULL, NULL),
(38, 'Venta al \"CONTADO\"', '12548791', 'ENTRADA', '1130', '2019-01-01', '22:01:52', NULL, NULL, NULL, NULL, NULL),
(45, 'Compra al \"CONTADO\"', '12548792', 'SALIDA', '900', '2019-01-02', '06:02:07', NULL, NULL, NULL, NULL, NULL),
(46, '2', '12548793', 'CXP', '900', '2019-01-02', '06:29:25', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `articulo` int(11) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `cantidad` varchar(10) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `importe` varchar(20) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `factura`, `articulo`, `codigo`, `cantidad`, `valor`, `importe`, `tipo`, `fecha`) VALUES
(68, '12548741', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(69, '12548742', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-28'),
(70, '12548744', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(71, '12548745', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(72, '12548745', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(73, '12548746', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(74, '12548747', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(75, '12548748', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-28'),
(76, '12548749', 1, '1', '10', '1200', '12000', 'VENTA', '2018-12-28'),
(77, '12548750', 2, '2', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(78, '12548750', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-28'),
(79, '12548752', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(80, '12548753', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(81, '12548754', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(82, '12548755', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(83, '12548756', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(84, '12548757', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-28'),
(111, '12548788', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-30'),
(112, '12548789', 1, '1', '2', '1200', '2712', 'VENTA', '2018-12-30'),
(113, '12548790', 1, '1', '2', '1200', '2712', 'VENTA', '2018-12-30'),
(114, '12548791', 5, '5', '1', '1000', '1130', 'VENTA', '2019-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `articulo` int(11) DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `cantidad` varchar(10) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `importe` varchar(20) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `factura`, `articulo`, `codigo`, `cantidad`, `valor`, `importe`, `tipo`, `fecha`) VALUES
(120, '12548792', 2, '7415300005014', '1', '900', '900', 'COMPRA', '2019-01-02'),
(121, '12548793', 1, 'LR12345664', '1', '900', '900', 'COMPRA', '2019-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_fac` int(10) NOT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `valor` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_fac`, `factura`, `valor`, `fecha`) VALUES
(24, '12548741', '1200', '2018-12-28'),
(25, '12548742', '2400', '2018-12-28'),
(26, '12548743', '2400', '2018-12-28'),
(27, '12548744', '1200', '2018-12-28'),
(28, '12548745', '2200', '2018-12-28'),
(29, '12548746', '1200', '2018-12-28'),
(30, '12548747', '1200', '2018-12-28'),
(31, '12548748', '2400', '2018-12-28'),
(32, '12548749', '12000', '2018-12-28'),
(33, '12548750', '2200', '2018-12-28'),
(34, '12548751', '2200', '2018-12-28'),
(35, '12548752', '1000', '2018-12-28'),
(36, '12548753', '1000', '2018-12-28'),
(37, '12548754', '1000', '2018-12-28'),
(38, '12548755', '1000', '2018-12-28'),
(39, '12548756', '1000', '2018-12-28'),
(40, '12548757', '1000', '2018-12-28'),
(41, '12548758', '1000', '2018-12-28'),
(42, '12548759', '1000', '2018-12-28'),
(43, '12548760', '1000', '2018-12-28'),
(44, '12548761', '1000', '2018-12-28'),
(45, '12548762', '1000', '2018-12-28'),
(46, '12548763', '1000', '2018-12-28'),
(47, '12548764', '1000', '2018-12-28'),
(48, '12548765', '1000', '2018-12-28'),
(49, '12548766', '1000', '2018-12-28'),
(50, '12548767', '1000', '2018-12-28'),
(51, '12548768', '1000', '2018-12-28'),
(52, '12548769', '1000', '2018-12-28'),
(53, '12548770', '1000', '2018-12-28'),
(54, '12548771', '1000', '2018-12-28'),
(55, '12548772', '1000', '2018-12-28'),
(56, '12548773', '1000', '2018-12-28'),
(57, '12548774', '1000', '2018-12-28'),
(58, '12548775', '1000', '2018-12-28'),
(59, '12548776', '1000', '2018-12-28'),
(60, '12548777', '1000', '2018-12-28'),
(61, '12548778', '1000', '2018-12-28'),
(62, '12548779', '156', '2018-12-30'),
(63, '12548780', '2260', '2018-12-30'),
(64, '12548781', '1200', '2018-12-30'),
(65, '12548782', '', '0000-00-00'),
(66, '12548783', '9492', '2018-12-30'),
(67, '12548784', '9492', '2018-12-30'),
(68, '12548785', '9492', '2018-12-30'),
(69, '12548786', '9492', '2018-12-30'),
(70, '12548787', '2712', '2018-12-30'),
(71, '12548788', '2712', '2018-12-30'),
(72, '12548789', '2712', '2018-12-30'),
(73, '12548790', '2712', '2018-12-30'),
(74, '12548791', '1130', '2019-01-01'),
(78, '12548792', '900', '2019-01-02'),
(79, '12548793', '900', '2019-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `id_fac` int(10) NOT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `valor` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura_compra`
--

INSERT INTO `factura_compra` (`id_fac`, `factura`, `valor`, `fecha`) VALUES
(4, '10011011', '900', '2019-01-02'),
(5, '10011012', '900', '2019-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idInstitucion` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `abreviatura` varchar(60) NOT NULL,
  `ideTributaria` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstitucion`, `nombre`, `abreviatura`, `ideTributaria`, `direccion`, `telefono`) VALUES
(1, 'GMG COMERCIAL EL SALVADOR, SOCIEDAD ANONIMA DE CAPITAL VARIABLE', 'GMG COMERCIAL EL SALVADOR, S.A DE C.V', '0614-100805-106-7', 'San Salvador, departamento de San Salvador', '2353-2343');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinventario` int(11) NOT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stockMinimo` int(11) DEFAULT NULL,
  `pv` float DEFAULT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idinventario`, `id_articulos`, `stock`, `stockMinimo`, `pv`, `cant`) VALUES
(1, 2, 18, 5, 1000, 1),
(2, 1, -5, 5, 1200, 1),
(3, 3, 13, 10, 950, 1),
(5, 5, -16, 10, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `idkardex` int(11) NOT NULL,
  `factura` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costoK` float DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `stockk` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`idkardex`, `factura`, `tipo`, `id_articulos`, `cantidad`, `costoK`, `importe`, `stockk`, `fecha`) VALUES
(1, '100000001', 'VENTA', 5, 1, 900, 900, 4, '2018-12-24'),
(2, '100000008', 'COMPRA', 2, 1, 200, 200, 5, '2018-12-25'),
(53, '12548741', 'VENTA', 2, 3, 900, 2700, 952, '2018-12-27'),
(54, '12548741', 'VENTA', 1, 2, 900, 1800, 968, '2018-12-27'),
(55, '12548741', 'VENTA', 2, 3, 900, 2700, 949, '2018-12-27'),
(56, '12548741', 'VENTA', 1, 2, 900, 1800, 966, '2018-12-27'),
(57, '12548742', 'VENTA', 2, 3, 900, 2700, 946, '2018-12-27'),
(58, '12548742', 'VENTA', 1, 2, 900, 1800, 964, '2018-12-27'),
(59, '12548743', 'VENTA', 2, 3, 900, 2700, 943, '2018-12-27'),
(60, '12548743', 'VENTA', 1, 2, 900, 1800, 962, '2018-12-27'),
(61, '12548744', 'VENTA', 2, 3, 900, 2700, 940, '2018-12-27'),
(62, '12548744', 'VENTA', 1, 2, 900, 1800, 960, '2018-12-27'),
(63, '12548745', 'VENTA', 2, 3, 900, 2700, 937, '2018-12-27'),
(64, '12548745', 'VENTA', 1, 2, 900, 1800, 958, '2018-12-27'),
(65, '12548746', 'VENTA', 1, 2, 900, 1800, 956, '2018-12-27'),
(66, '12548747', 'VENTA', 1, 1, 900, 900, 955, '2018-12-27'),
(67, '12548747', 'VENTA', 3, 1, 700, 700, 14, '2018-12-27'),
(68, '12548747', 'VENTA', 3, 1, 700, 700, 13, '2018-12-27'),
(69, '', 'VENTA', 5, 1, 300, 300, 14, '0000-00-00'),
(70, '12548750', 'VENTA', 1, 1, 900, 900, 954, '2018-12-27'),
(71, '12548751', 'VENTA', 2, 1, 900, 900, 936, '2018-12-27'),
(72, '12548752', 'VENTA', 5, 1, 300, 300, 13, '2018-12-27'),
(73, '12548753', 'VENTA', 2, 1, 900, 900, 935, '2018-12-27'),
(74, '12548755', 'VENTA', 2, 1, 900, 900, 934, '2018-12-27'),
(75, '12548755', 'VENTA', 1, 1, 900, 900, 953, '2018-12-27'),
(76, '12548741', 'VENTA', 1, 1, 900, 900, 952, '2018-12-28'),
(77, '12548742', 'VENTA', 1, 2, 900, 1800, 950, '2018-12-28'),
(78, '12548744', 'VENTA', 1, 1, 900, 900, 949, '2018-12-28'),
(79, '12548745', 'VENTA', 1, 1, 900, 900, 948, '2018-12-28'),
(80, '12548745', 'VENTA', 5, 1, 300, 300, 12, '2018-12-28'),
(81, '12548746', 'VENTA', 1, 1, 900, 900, 947, '2018-12-28'),
(82, '12548747', 'VENTA', 1, 1, 900, 900, 946, '2018-12-28'),
(83, '12548748', 'VENTA', 1, 2, 900, 1800, 944, '2018-12-28'),
(84, '12548749', 'VENTA', 1, 10, 900, 9000, 934, '2018-12-28'),
(85, '12548750', 'VENTA', 2, 1, 900, 900, 4, '2018-12-28'),
(86, '12548750', 'VENTA', 1, 1, 900, 900, 4, '2018-12-28'),
(87, '12548752', 'VENTA', 5, 1, 300, 300, 11, '2018-12-28'),
(88, '12548753', 'VENTA', 5, 1, 300, 300, 10, '2018-12-28'),
(89, '12548754', 'VENTA', 5, 1, 300, 300, 9, '2018-12-28'),
(90, '12548755', 'VENTA', 5, 1, 300, 300, 8, '2018-12-28'),
(91, '12548756', 'VENTA', 5, 1, 300, 300, 7, '2018-12-28'),
(92, '12548757', 'VENTA', 5, 1, 300, 300, 6, '2018-12-28'),
(93, '12548758', 'VENTA', 5, 1, 300, 300, 5, '2018-12-28'),
(94, '12548759', 'VENTA', 5, 1, 300, 300, 4, '2018-12-28'),
(95, '12548760', 'VENTA', 5, 1, 300, 300, 3, '2018-12-28'),
(96, '12548761', 'VENTA', 5, 1, 300, 300, 2, '2018-12-28'),
(97, '12548762', 'VENTA', 5, 1, 300, 300, 1, '2018-12-28'),
(98, '12548763', 'VENTA', 5, 1, 300, 300, 0, '2018-12-28'),
(99, '12548764', 'VENTA', 5, 1, 300, 300, -1, '2018-12-28'),
(100, '12548765', 'VENTA', 5, 1, 300, 300, -2, '2018-12-28'),
(101, '12548766', 'VENTA', 5, 1, 300, 300, -3, '2018-12-28'),
(102, '12548767', 'VENTA', 5, 1, 300, 300, -4, '2018-12-28'),
(103, '12548768', 'VENTA', 5, 1, 300, 300, -5, '2018-12-28'),
(104, '12548769', 'VENTA', 5, 1, 300, 300, -6, '2018-12-28'),
(105, '12548770', 'VENTA', 5, 1, 300, 300, -7, '2018-12-28'),
(106, '12548771', 'VENTA', 5, 1, 300, 300, -8, '2018-12-28'),
(107, '12548772', 'VENTA', 5, 1, 300, 300, -9, '2018-12-28'),
(108, '12548773', 'VENTA', 5, 1, 300, 300, -10, '2018-12-28'),
(109, '12548774', 'VENTA', 5, 1, 300, 300, -11, '2018-12-28'),
(110, '12548775', 'VENTA', 5, 1, 300, 300, -12, '2018-12-28'),
(111, '12548776', 'VENTA', 5, 1, 300, 300, -13, '2018-12-28'),
(112, '12548777', 'VENTA', 5, 1, 300, 300, -14, '2018-12-28'),
(113, '12548778', 'VENTA', 5, 1, 300, 300, -15, '2018-12-28'),
(114, '12548779', 'VENTA', 1, 1, 900, 900, 3, '2018-12-30'),
(115, '12548780', 'VENTA', 2, 2, 900, 1800, 8, '2018-12-30'),
(116, '12548781', 'VENTA', 1, 1, 900, 900, 9, '2018-12-30'),
(117, '12548784', 'VENTA', 1, 7, 900, 6300, 2, '2018-12-30'),
(118, '12548787', 'VENTA', 1, 2, 900, 1800, 0, '2018-12-30'),
(119, '12548788', 'VENTA', 1, 2, 900, 1800, -2, '2018-12-30'),
(120, '12548789', 'VENTA', 1, 2, 900, 1800, -4, '2018-12-30'),
(121, '12548790', 'VENTA', 1, 2, 900, 1800, -6, '2018-12-30'),
(122, '12548791', 'VENTA', 5, 1, 300, 300, -16, '2019-01-01'),
(132, '12548792', 'COMPRA', 2, 1, 900, 900, 18, '2019-01-02'),
(133, '12548793', 'COMPRA', 1, 1, 900, 900, -5, '2019-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(10) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(25) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `proveedor`, `contacto`, `direccion`, `dui`, `nit`, `telefono`, `estado`) VALUES
(1, 'SONY', 'Isabel Mejia Hernandez', 'colonia san benito, san salvador', '12345678-9', '1221-234212-123-1', '2342-2321', 's'),
(2, 'MABE', 'Maria cruz', 'San salvador', '11246655-1', '1122-454566-123-1', '23485689', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prov_tmp`
--

CREATE TABLE `prov_tmp` (
  `id` int(10) NOT NULL,
  `proveedor` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `prov_tmp`
--

INSERT INTO `prov_tmp` (`id`, `proveedor`, `fecha`) VALUES
(5, 1, '2019-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen`
--

CREATE TABLE `resumen` (
  `id_resumen` int(11) NOT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `clase` varchar(50) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resumen`
--

INSERT INTO `resumen` (`id_resumen`, `id_clientes`, `concepto`, `factura`, `clase`, `valor`, `tipo`, `fecha`, `hora`, `status`) VALUES
(12, 1, 'Venta al \"CREDITO\"', '12548741', 'VENTA', '1200', 'VENTA', '2018-12-28', '03:05:12', 'CREDITO'),
(13, 1, 'Venta al \"CREDITO\"', '12548742', 'VENTA', '2400', 'VENTA', '2018-12-28', '05:46:51', 'CREDITO'),
(14, 1, 'Venta al \"CREDITO\"', '12548744', 'VENTA', '1200', 'VENTA', '2018-12-28', '05:51:09', 'CREDITO'),
(15, 1, 'Venta al \"CREDITO\"', '12548745', 'VENTA', '2200', 'VENTA', '2018-12-28', '06:06:01', 'CREDITO'),
(16, 1, 'Venta al \"CONTADO\"', '12548746', 'VENTA', '1200', 'VENTA', '2018-12-28', '06:19:06', 'CONTADO'),
(17, 1, 'Venta al \"CREDITO\"', '12548747', 'VENTA', '1200', 'VENTA', '2018-12-28', '06:20:17', 'CREDITO'),
(18, 1, 'Venta al \"CONTADO\"', '12548748', 'VENTA', '2400', 'VENTA', '2018-12-28', '06:23:13', 'CONTADO'),
(19, 1, 'Venta al \"CONTADO\"', '12548749', 'VENTA', '12000', 'VENTA', '2018-12-28', '06:25:20', 'CONTADO'),
(20, 1, 'Venta al \"CONTADO\"', '12548750', 'VENTA', '2200', 'VENTA', '2018-12-28', '06:58:33', 'CONTADO'),
(22, 1, 'Venta al \"CONTADO\"', '12548752', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:03:34', 'CONTADO'),
(23, 1, 'Venta al \"CONTADO\"', '12548753', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:04:30', 'CONTADO'),
(24, 1, 'Venta al \"CONTADO\"', '12548754', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:06:45', 'CONTADO'),
(25, 1, 'Venta al \"CONTADO\"', '12548755', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:07:07', 'CONTADO'),
(26, 1, 'Venta al \"CONTADO\"', '12548756', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:07:35', 'CONTADO'),
(27, 1, 'Venta al \"CONTADO\"', '12548757', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:08:32', 'CONTADO'),
(28, 1, 'Venta al \"CONTADO\"', '12548758', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:08:47', 'CONTADO'),
(29, 1, 'Venta al \"CONTADO\"', '12548759', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:09:49', 'CONTADO'),
(30, 1, 'Venta al \"CONTADO\"', '12548760', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:10:23', 'CONTADO'),
(31, 1, 'Venta al \"CONTADO\"', '12548761', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:12:43', 'CONTADO'),
(32, 1, 'Venta al \"CONTADO\"', '12548762', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:12:52', 'CONTADO'),
(33, 1, 'Venta al \"CONTADO\"', '12548763', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:12:55', 'CONTADO'),
(34, 1, 'Venta al \"CONTADO\"', '12548764', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:12:55', 'CONTADO'),
(35, 1, 'Venta al \"CONTADO\"', '12548765', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:13:08', 'CONTADO'),
(36, 1, 'Venta al \"CONTADO\"', '12548766', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:15:03', 'CONTADO'),
(37, 1, 'Venta al \"CONTADO\"', '12548767', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:15:46', 'CONTADO'),
(38, 1, 'Venta al \"CONTADO\"', '12548768', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:16:20', 'CONTADO'),
(39, 1, 'Venta al \"CONTADO\"', '12548769', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:16:45', 'CONTADO'),
(40, 1, 'Venta al \"CONTADO\"', '12548770', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:17:05', 'CONTADO'),
(41, 1, 'Venta al \"CONTADO\"', '12548771', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:17:19', 'CONTADO'),
(42, 1, 'Venta al \"CONTADO\"', '12548772', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:17:44', 'CONTADO'),
(43, 1, 'Venta al \"CONTADO\"', '12548773', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:18:22', 'CONTADO'),
(44, 1, 'Venta al \"CONTADO\"', '12548774', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:18:41', 'CONTADO'),
(45, 1, 'Venta al \"CONTADO\"', '12548775', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:19:14', 'CONTADO'),
(46, 1, 'Venta al \"CREDITO\"', '12548776', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:24:04', 'CREDITO'),
(47, 1, 'Venta al \"CREDITO\"', '12548777', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:27:07', 'CREDITO'),
(48, 1, 'Venta al \"CREDITO\"', '12548778', 'VENTA', '1000', 'VENTA', '2018-12-28', '07:29:56', 'CREDITO'),
(50, 2, 'Venta al \"CREDITO\"', '12548780', 'VENTA', '2260', 'VENTA', '2018-12-30', '20:40:21', 'CREDITO'),
(51, 2, 'Venta al \"CONTADO\"', '12548781', 'VENTA', '1200', 'VENTA', '2018-12-30', '20:41:52', 'CONTADO'),
(56, 1, 'Venta al \"CONTADO\"', '12548786', 'VENTA', '9492', 'VENTA', '2018-12-30', '21:23:30', 'CONTADO'),
(57, 2, 'Venta al \"CONTADO\"', '12548787', 'VENTA', '2712', 'VENTA', '2018-12-30', '21:30:17', 'CONTADO'),
(58, 2, 'Venta al \"CONTADO\"', '12548788', 'VENTA', '2712', 'VENTA', '2018-12-30', '21:33:56', 'CONTADO'),
(59, 2, 'Venta al \"CONTADO\"', '12548789', 'VENTA', '2712', 'VENTA', '2018-12-30', '21:38:10', 'CONTADO'),
(60, 2, 'Venta al \"CONTADO\"', '12548790', 'VENTA', '2712', 'VENTA', '2018-12-30', '21:39:11', 'CONTADO'),
(61, 1, 'Venta al \"CONTADO\"', '12548791', 'VENTA', '1130', 'VENTA', '2019-01-01', '22:01:52', 'CONTADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen_compra`
--

CREATE TABLE `resumen_compra` (
  `id_resumen` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL,
  `factura` varchar(50) DEFAULT NULL,
  `clase` varchar(50) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resumen_compra`
--

INSERT INTO `resumen_compra` (`id_resumen`, `id_proveedor`, `concepto`, `factura`, `clase`, `valor`, `tipo`, `fecha`, `hora`, `status`) VALUES
(5, 1, 'Compra al \"CONTADO\"', '12548792', 'COMPRA', '900', 'COMPRA', '2019-01-02', '06:02:07', 'CONTADO'),
(6, 2, 'Compra al \"CREDITO\"', '12548793', 'COMPRA', '900', 'COMPRA', '2019-01-02', '06:29:25', 'CREDITO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(40) DEFAULT NULL,
  `dir_cliente` varchar(100) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nombre_cliente`, `dir_cliente`, `dui`, `tel`) VALUES
(1, 'Juan Moz', 'Cedros', '78404023', '56464'),
(2, 'Abi', 'Verapaz en la casa del chimilo', '2001221', '44547');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `contrasena`, `tipoUsuario`) VALUES
(1, 'Abigail', 'financiero', 'financiero', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventac_temp`
--

CREATE TABLE `ventac_temp` (
  `id_venta` int(10) NOT NULL,
  `id_articulo` int(10) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ventac_temp`
--

INSERT INTO `ventac_temp` (`id_venta`, `id_articulo`, `cantidad`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_temp`
--

CREATE TABLE `venta_temp` (
  `id_venta` int(10) NOT NULL,
  `id_articulo` int(10) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`id_abono`),
  ADD KEY `fk_abono` (`cuenta`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idarticulos`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientcred_tmp`
--
ALTER TABLE `clientcred_tmp`
  ADD PRIMARY KEY (`id_cliente_temp`),
  ADD KEY `fk_cliente` (`id_cliente`) USING BTREE;

--
-- Indices de la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  ADD PRIMARY KEY (`id_cliente_temp`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Indices de la tabla `compra_tmp`
--
ALTER TABLE `compra_tmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venTem` (`id_articulo`) USING BTREE;

--
-- Indices de la tabla `contable`
--
ALTER TABLE `contable`
  ADD PRIMARY KEY (`id_contable`),
  ADD KEY `fk_factuu` (`concepto2`),
  ADD KEY `concepto1` (`concepto1`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_articulos` (`articulo`),
  ADD KEY `fk_facturassss` (`factura`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `fk_articulos` (`articulo`),
  ADD KEY `fk_facturassss` (`factura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `factura` (`factura`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `factura` (`factura`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idInstitucion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idinventario`),
  ADD KEY `fk_inventario_articulos1_idx` (`id_articulos`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`idkardex`),
  ADD KEY `fk_kardex_articulos1_idx` (`id_articulos`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `prov_tmp`
--
ALTER TABLE `prov_tmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`proveedor`) USING BTREE;

--
-- Indices de la tabla `resumen`
--
ALTER TABLE `resumen`
  ADD PRIMARY KEY (`id_resumen`),
  ADD KEY `fk_clie` (`id_clientes`),
  ADD KEY `fk_factu` (`factura`);

--
-- Indices de la tabla `resumen_compra`
--
ALTER TABLE `resumen_compra`
  ADD PRIMARY KEY (`id_resumen`),
  ADD KEY `fk_clie` (`id_proveedor`),
  ADD KEY `fk_factu` (`factura`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `ventac_temp`
--
ALTER TABLE `ventac_temp`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_venTem` (`id_articulo`) USING BTREE;

--
-- Indices de la tabla `venta_temp`
--
ALTER TABLE `venta_temp`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_venTem` (`id_articulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `id_abono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientcred_tmp`
--
ALTER TABLE `clientcred_tmp`
  MODIFY `id_cliente_temp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  MODIFY `id_cliente_temp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_tmp`
--
ALTER TABLE `compra_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contable`
--
ALTER TABLE `contable`
  MODIFY `id_contable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `id_fac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idInstitucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prov_tmp`
--
ALTER TABLE `prov_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resumen`
--
ALTER TABLE `resumen`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `resumen_compra`
--
ALTER TABLE `resumen_compra`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventac_temp`
--
ALTER TABLE `ventac_temp`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta_temp`
--
ALTER TABLE `venta_temp`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `fk_abono` FOREIGN KEY (`cuenta`) REFERENCES `contable` (`id_contable`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `idproveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Filtros para la tabla `clientcred_tmp`
--
ALTER TABLE `clientcred_tmp`
  ADD CONSTRAINT `clientcred_tmp_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  ADD CONSTRAINT `fk_clienteTem` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_tmp`
--
ALTER TABLE `compra_tmp`
  ADD CONSTRAINT `compra_tmp_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contable`
--
ALTER TABLE `contable`
  ADD CONSTRAINT `fk_factuu` FOREIGN KEY (`concepto2`) REFERENCES `factura` (`factura`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_articulos` FOREIGN KEY (`articulo`) REFERENCES `articulos` (`idarticulos`),
  ADD CONSTRAINT `fk_facturassss` FOREIGN KEY (`factura`) REFERENCES `factura` (`factura`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`articulo`) REFERENCES `articulos` (`idarticulos`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`factura`) REFERENCES `factura` (`factura`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_articulos1` FOREIGN KEY (`id_articulos`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `fk_kardex_articulos1` FOREIGN KEY (`id_articulos`) REFERENCES `articulos` (`idarticulos`);

--
-- Filtros para la tabla `prov_tmp`
--
ALTER TABLE `prov_tmp`
  ADD CONSTRAINT `prov_tmp_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resumen`
--
ALTER TABLE `resumen`
  ADD CONSTRAINT `fk_clie` FOREIGN KEY (`id_clientes`) REFERENCES `tb_cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_factu` FOREIGN KEY (`factura`) REFERENCES `factura` (`factura`);

--
-- Filtros para la tabla `resumen_compra`
--
ALTER TABLE `resumen_compra`
  ADD CONSTRAINT `facd` FOREIGN KEY (`factura`) REFERENCES `factura` (`factura`),
  ADD CONSTRAINT `resumen_compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Filtros para la tabla `ventac_temp`
--
ALTER TABLE `ventac_temp`
  ADD CONSTRAINT `ventac_temp_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta_temp`
--
ALTER TABLE `venta_temp`
  ADD CONSTRAINT `fk_venTem` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
