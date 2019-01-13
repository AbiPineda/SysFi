-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2019 a las 23:37:11
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
  `mora` float DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`id_abono`, `cuenta`, `valor`, `fecha`, `hora`, `nota`, `total_interes`, `proximo_pago`, `mora`, `estado`) VALUES
(1, 1, '168.127', '2019-01-05', '20:20:09', 'Sin Observaciones', '8.583', '2019-01-28', 0, 'incobrable'),
(2, 1, '169.528', '2019-01-05', '20:32:56', 'Sin Observaciones', '7.182', '2019-01-29', 0, 'incobrable'),
(3, 1, '170.94', '2019-01-05', '20:33:05', 'Sin Observaciones', '5.77', '2019-01-30', 0, 'incobrable'),
(4, 1, '172.365', '2019-01-05', '20:33:13', 'Sin Observaciones', '4.345', '2019-01-11', 0, 'incobrable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE `activo` (
  `idactivo` int(10) NOT NULL,
  `idtipo` int(10) DEFAULT NULL,
  `iddepartamento` int(10) DEFAULT NULL,
  `idusuario` int(10) DEFAULT NULL,
  `idencargado` int(10) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tiempo_uso` int(11) DEFAULT NULL,
  `adquisicion` varchar(45) DEFAULT NULL,
  `donador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `activo`
--

INSERT INTO `activo` (`idactivo`, `idtipo`, `iddepartamento`, `idusuario`, `idencargado`, `correlativo`, `fecha_adquisicion`, `descripcion`, `estado`, `observaciones`, `precio`, `tiempo_uso`, `adquisicion`, `donador`) VALUES
(1, 1, 8, 1, 2, '0001', '2018-09-01', 'nose', 'ACTIVO', '', 1500, 4, 'Comprado', NULL),
(2, 1, 8, 1, 2, '0002', '2018-09-01', 'nose', 'ACTIVO', '', 1500, 4, 'Comprado', NULL),
(3, 1, 8, 1, 1, '0003', '2018-11-01', 'uy', 'ACTIVO', '', 3500, 2, 'Comprado', NULL),
(4, 1, 8, 1, 1, '0004', '2018-11-01', 'uy', 'ACTIVO', '', 3500, 2, 'Comprado', NULL),
(5, 1, 8, 1, 2, '0005', '2018-12-01', 'ñañaña', 'ACTIVO', '', 5300, 1, 'Comprado', NULL),
(6, 1, 8, 1, 1, '0006', '2018-12-01', 'hello', 'ACTIVO', 'oha', 1200, 1, 'Comprado', NULL),
(7, 2, 9, 1, 2, '0007', '2019-01-08', 'COMPUTADORA HP 20-C205LA AIO ALL IN ONE 19,5\"\"\", PROCESADOR CELERONDC J3060, MEMORIA 4GB, DISCO DURO 1TB HDD,DVD, COLOR SNOW WHITE', 'ACTIVO', 'Uso solo para Departamento de Ventas', 459, 1, 'Comprado', NULL),
(8, 2, 9, 1, 4, '0008', '2019-01-11', 'Disco duro de 500 GB y una memoria RAM de 4 GB. Diseñado para la tareas cotidianas básicas diarias. Intel® Celeron® N4000', 'ACTIVO', 'Uso solo para departamento de Ventas', 329, 2, 'Comprado', ''),
(9, 1, 8, 1, 3, '0009', '2019-01-11', 'Versión	LE\r\nTipo	DOHC, V8, CVTCS, VVEL DIG\r\nTransmisión	AT de 5 velocidades con modo manual\r\nDesplazamiento cc	5,552\r\nDiámetro x Carrera	98.0 x 92.0mm', 'ACTIVO', 'Uso solo para departamento de compras', 12500, 2, 'Donado', 'Nissan, El Salvador');

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
(1, 'LR12345664', 'Lavadora de Ropa', 2, 900, 'Mabe', 's', 1, 2, 1),
(2, '7415300005014', 'Refrigeradora', 1, 900, 'LG', 's', 1, 2, 1),
(3, '750120665242', 'Televisor', 1, 700, 'LG', 's', 1, 1, 6),
(4, '7441102801011', 'Computadora Sony', 3, 560, 'Sony', 's', 1, 1, 7),
(5, '744110280091', 'Play Station 4', 5, 300, 'Sony', 's', 1, 1, 3),
(6, 'DVPSR370', 'Reproductor de DVD', 5, 42, 'SONY', 's', 5, NULL, 4),
(7, 'MDR100AAP', 'Audifonos', 5, 169, 'SONY', 's', 5, NULL, 5),
(8, 'NWZB183F', 'Reproductor MP3', 5, 70, 'SONY', 's', 5, NULL, 5),
(9, 'NWZW273S', 'Walkman MP3', 5, 119, 'SONY', 's', 0, 1, 5),
(10, 'CM618', 'Cafetera', 10, 23, 'Black & Decker', 's', NULL, 3, 1);

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
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `id_clasificacion` int(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `tiempo_depreciacion` int(11) DEFAULT NULL,
  `vidautil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`id_clasificacion`, `nombre`, `correlativo`, `tiempo_depreciacion`, `vidautil`) VALUES
(1, 'Moviliario y Equipo de Administracion', '0001', 120, 10),
(2, 'Vehiculos', '0002', 60, 5),
(3, 'Maquinaria', '0003', 60, 5),
(4, 'Edificio', '0004', 240, 20),
(5, 'Terrenos', '0005', 0, 0),
(6, 'Equipo de Computo y Tecnologias de Informacion', '0006', 36, 3),
(7, 'Equipos de Generacion Electrica', '0007', 120, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientcred_tmp`
--

CREATE TABLE `clientcred_tmp` (
  `id_cliente_temp` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `clientcred_tmp`
--

INSERT INTO `clientcred_tmp` (`id_cliente_temp`, `id_cliente`, `fecha`) VALUES
(1, 2, '2019-01-10');

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
  `observacion` varchar(75) DEFAULT NULL,
  `meses` varchar(20) DEFAULT NULL,
  `estadoC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contable`
--

INSERT INTO `contable` (`id_contable`, `concepto1`, `concepto2`, `tipo`, `valor`, `fecha`, `hora`, `clase`, `interes`, `cuota`, `to_interes`, `observacion`, `meses`, `estadoC`) VALUES
(1, '1', '12548804', 'CXC', '1030', '2019-01-05', '20:09:13', NULL, 10, 176.71, 30.25, NULL, '6', NULL),
(2, 'Abono CXC No. 1', '12548804', 'ENTRADA', '168.127', '2019-01-05', '20:20:09', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(3, 'Abono CXC No. 1', '12548804', 'ENTRADA', '169.528', '2019-01-05', '20:32:56', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(4, 'Abono CXC No. 1', '12548804', 'ENTRADA', '170.94', '2019-01-05', '20:33:05', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(5, 'Abono CXC No. 1', '12548804', 'ENTRADA', '172.365', '2019-01-05', '20:33:13', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(6, 'Abono CXC No. 1', '12548804', 'ENTRADA', '173.801', '2019-01-05', '20:33:21', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(7, 'Abono CXC No. 1', '12548804', 'ENTRADA', '175.25', '2019-01-05', '20:33:31', 'CXC', NULL, NULL, NULL, 'Sin Observaciones', NULL, NULL),
(8, 'Venta al CONTADO', '12548805', 'ENTRADA', '1000', '2019-01-10', '21:05:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2', '12548806', 'CXC', '1100', '2019-01-10', '21:06:09', NULL, 4, 185.48, 12.87, NULL, '6', 'EnProceso'),
(10, 'Compra al CONTADO', '12548807', 'SALIDA', '6300', '2019-01-11', '00:37:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Compra al CONTADO', '12548808', 'SALIDA', '18000', '2019-01-11', '00:41:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Compra al CONTADO', '12548809', 'SALIDA', '595', '2019-01-11', '01:08:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '3', '12548810', 'CXP', '230', '2019-01-13', '02:48:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '3', '12548811', 'CXP', '23', '2019-01-13', '03:48:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2', '12548812', 'CXP', '900', '2019-01-13', '04:14:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(10) NOT NULL,
  `idinstitucion` int(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `idinstitucion`, `nombre`, `correlativo`) VALUES
(8, 2, 'Compras', '0001'),
(9, 2, 'Ventas', '0002');

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
(1, '12548804', 2, '2', '1', '1000', '1000', 'VENTA', '2019-01-05'),
(2, '12548805', 2, '2', '1', '1000', '1000', 'VENTA', '2019-01-10'),
(3, '12548806', 1, '1', '1', '1200', '1200', 'VENTA', '2019-01-10');

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
(121, '12548793', 1, 'LR12345664', '1', '900', '900', 'COMPRA', '2019-01-02'),
(122, '12548794', 1, 'LR12345664', '1', '900', '900', 'COMPRA', '2019-01-03'),
(123, '12548802', 10, 'CM618', '1', '23', '23', 'COMPRA', '2019-01-04'),
(124, '12548807', 1, 'LR12345664', '7', '900', '6300', 'COMPRA', '2019-01-11'),
(125, '12548808', 1, 'LR12345664', '20', '900', '18000', 'COMPRA', '2019-01-11'),
(126, '12548809', 9, 'NWZW273S', '5', '119', '595', 'COMPRA', '2019-01-11'),
(127, '12548810', 10, 'CM618', '10', '23', '230', 'COMPRA', '2019-01-13'),
(128, '12548811', 10, 'CM618', '1', '23', '23', 'COMPRA', '2019-01-13'),
(129, '12548812', 2, '7415300005014', '1', '900', '900', 'COMPRA', '2019-01-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(10) NOT NULL,
  `constancia` mediumblob,
  `remesa` mediumblob,
  `recibo` mediumblob,
  `idcliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDocumento`, `constancia`, `remesa`, `recibo`, `idcliente`) VALUES
(1, '', '', '', 3),
(2, '', '', '', 4),
(3, '', '', '', 5),
(4, '', '', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `id_encargado` int(10) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`id_encargado`, `nombre`, `apellidos`, `dui`, `nit`) VALUES
(1, 'Francisco ', 'Pineda Fernandez', '34234324-2', '1010-190167-123-2'),
(2, 'Abigail', 'Pineda', '12324324-2', '3434-234324-234-4'),
(3, 'Jose Feliciano', 'Andrade Paz', '45345434-5', '1010-231267-232-3'),
(4, 'Samuel Alberto', 'Recinos Campos', '34324324-2', '3434-120100-232-3');

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
(79, '12548793', '900', '2019-01-02'),
(80, '12548794', '900', '2019-01-03'),
(81, '12548795', '1130', '2019-01-04'),
(82, '12548796', '1200', '2019-01-04'),
(83, '12548797', '1356', '2019-01-04'),
(84, '12548798', '1000', '2019-01-04'),
(85, '12548799', '30', '2019-01-04'),
(86, '12548800', '146.9', '2019-01-04'),
(87, '12548801', '130', '2019-01-04'),
(88, '12548802', '23', '2019-01-04'),
(89, '12548803', '130', '2019-01-04'),
(90, '12548804', '1130', '2019-01-05'),
(91, '12548805', '1000', '2019-01-10'),
(92, '12548806', '1200', '2019-01-10'),
(93, '12548807', '6300', '2019-01-11'),
(94, '12548808', '18000', '2019-01-11'),
(95, '12548809', '595', '2019-01-11'),
(96, '12548810', '230', '2019-01-13'),
(97, '12548811', '23', '2019-01-13'),
(98, '12548812', '900', '2019-01-13');

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
  `telefono` varchar(10) NOT NULL,
  `correlativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstitucion`, `nombre`, `abreviatura`, `ideTributaria`, `direccion`, `telefono`, `correlativo`) VALUES
(2, 'Los coquitos de El Salvador', 'Los coquitos de S.A de C.V', '1221-234212-123-1', 'colonia san benito, san salvador', '1212-1212', '0002');

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
(1, 2, 31, 5, 1000, 1),
(2, 1, 20, 5, 1200, 1),
(3, 3, 13, 10, 950, 1),
(5, 5, 30, 10, 1000, 1),
(6, 9, 6, 5, 130, NULL),
(7, 10, 21, 5, 30, NULL);

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
(1, '12548804', 'VENTA', 2, 1, 900, 900, 15, '2019-01-05'),
(2, '12548805', 'VENTA', 2, 1, 900, 900, 14, '2019-01-10'),
(3, '12548806', 'VENTA', 1, 1, 900, 900, -7, '2019-01-10'),
(4, '12548807', 'COMPRA', 1, 7, 900, 6300, 0, '2019-01-11'),
(5, '12548808', 'COMPRA', 1, 20, 900, 18000, 20, '2019-01-11'),
(6, '12548809', 'COMPRA', 9, 5, 119, 595, 6, '2019-01-11'),
(7, '12548810', 'COMPRA', 10, 10, 23, 230, 20, '2019-01-13'),
(8, '12548811', 'COMPRA', 10, 1, 23, 23, 21, '2019-01-13'),
(9, '12548812', 'COMPRA', 2, 1, 900, 900, 31, '2019-01-13');

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
(2, 'MABE', 'Maria cruz', 'San salvador', '11246655-1', '1122-454566-123-1', '23485689', 's'),
(3, 'Black & Decker', 'Blanca Melara', 'colonia rosa, san salvador', '34324234-2', '3244-242342-334-2', '2323-2323', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prov_tmp`
--

CREATE TABLE `prov_tmp` (
  `id` int(10) NOT NULL,
  `proveedor` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `idReferencia` int(10) NOT NULL,
  `nombre1` varchar(50) DEFAULT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `direccion1` varchar(100) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  `direccion2` varchar(100) DEFAULT NULL,
  `idcliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `referencias`
--

INSERT INTO `referencias` (`idReferencia`, `nombre1`, `telefono1`, `direccion1`, `nombre2`, `telefono2`, `direccion2`, `idcliente`) VALUES
(1, 'daniela', '2332-2323', 'nose', 'Miguel', '2343-3432', 'tampoco', 4),
(2, 'daniela', '2332-2323', 'nose', 'Miguel', '2343-3432', 'tampoco', 5),
(3, 'a', '1', 'a', 'w', '2', 'w', 6);

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
(1, 1, 'Venta al \"CREDITO\"', '12548804', 'VENTA', '1130', 'VENTA', '2019-01-05', '20:09:13', 'CREDITO'),
(2, 2, 'Venta al CONTADO', '12548805', 'VENTA', '1000', 'VENTA', '2019-01-10', '21:05:17', 'CONTADO'),
(3, 2, 'Venta al CREDITO', '12548806', 'VENTA', '1200', 'VENTA', '2019-01-10', '21:06:09', 'CREDITO');

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
(6, 2, 'Compra al \"CREDITO\"', '12548793', 'COMPRA', '900', 'COMPRA', '2019-01-02', '06:29:25', 'CREDITO'),
(7, 3, 'Compra al \"CREDITO\"', '12548794', 'COMPRA', '900', 'COMPRA', '2019-01-03', '04:58:17', 'CREDITO'),
(8, 3, 'Compra al \"CREDITO\"', '12548802', 'COMPRA', '23', 'COMPRA', '2019-01-04', '21:25:04', 'CREDITO'),
(9, 2, 'Compra al CONTADO', '12548807', 'COMPRA', '6300', 'COMPRA', '2019-01-11', '00:37:16', 'CONTADO'),
(10, 2, 'Compra al CONTADO', '12548808', 'COMPRA', '18000', 'COMPRA', '2019-01-11', '00:41:07', 'CONTADO'),
(11, 1, 'Compra al CONTADO', '12548809', 'COMPRA', '595', 'COMPRA', '2019-01-11', '01:08:53', 'CONTADO'),
(12, 3, 'Compra al CREDITO', '12548810', 'COMPRA', '230', 'COMPRA', '2019-01-13', '02:48:47', 'CREDITO'),
(13, 3, 'Compra al CREDITO', '12548811', 'COMPRA', '23', 'COMPRA', '2019-01-13', '03:48:15', 'CREDITO'),
(14, 2, 'Compra al CREDITO', '12548812', 'COMPRA', '900', 'COMPRA', '2019-01-13', '04:14:35', 'CREDITO');

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
(2, 'Abi', 'Verapaz en la casa del chimilo', '2001221', '44547'),
(3, 'Josefina Arminda Lopez', 'col. garcia', '34324234-2', 'aa'),
(4, 'Abigail Henriquez', 'col. remaguiza', '12121212-1', '2323-2323'),
(5, 'Abigail Henriquez', 'col. remaguiza', '12121212-1', '2323-2323'),
(6, 'a', 'a', '12121212-1', '2323-2323');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_activo`
--

CREATE TABLE `tipo_activo` (
  `id_tipo` int(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `idclasificacion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_activo`
--

INSERT INTO `tipo_activo` (`id_tipo`, `nombre`, `correlativo`, `idclasificacion`) VALUES
(1, 'camioneta', '0001', 2),
(2, 'Computadora de Escritorio', '0002', 6);

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
(1, 3, 1);

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
-- Indices de la tabla `activo`
--
ALTER TABLE `activo`
  ADD PRIMARY KEY (`idactivo`),
  ADD KEY `idtipo` (`idtipo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idencargado` (`idencargado`),
  ADD KEY `iddepartamento` (`iddepartamento`);

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
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`id_clasificacion`);

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
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `idinstitucion` (`idinstitucion`);

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
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`),
  ADD KEY `idclientes` (`idcliente`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`id_encargado`);

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
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`idReferencia`),
  ADD KEY `idcliente` (`idcliente`);

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
-- Indices de la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `idclasificacion` (`idclasificacion`);

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
  MODIFY `id_abono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `activo`
--
ALTER TABLE `activo`
  MODIFY `idactivo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `id_clasificacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientcred_tmp`
--
ALTER TABLE `clientcred_tmp`
  MODIFY `id_cliente_temp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  MODIFY `id_cliente_temp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_tmp`
--
ALTER TABLE `compra_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contable`
--
ALTER TABLE `contable`
  MODIFY `id_contable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `id_encargado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `id_fac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idInstitucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prov_tmp`
--
ALTER TABLE `prov_tmp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `idReferencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resumen`
--
ALTER TABLE `resumen`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resumen_compra`
--
ALTER TABLE `resumen_compra`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  MODIFY `id_tipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventac_temp`
--
ALTER TABLE `ventac_temp`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `activo`
--
ALTER TABLE `activo`
  ADD CONSTRAINT `iddepartamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`id_departamento`),
  ADD CONSTRAINT `idencargado` FOREIGN KEY (`idencargado`) REFERENCES `encargado` (`id_encargado`),
  ADD CONSTRAINT `idtipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo_activo` (`id_tipo`),
  ADD CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

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
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `idinstitucion` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idInstitucion`);

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
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `idclientes` FOREIGN KEY (`idcliente`) REFERENCES `tb_cliente` (`id_cliente`);

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
-- Filtros para la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `tb_cliente` (`id_cliente`);

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
-- Filtros para la tabla `tipo_activo`
--
ALTER TABLE `tipo_activo`
  ADD CONSTRAINT `idclasificacion` FOREIGN KEY (`idclasificacion`) REFERENCES `clasificacion` (`id_clasificacion`);

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
