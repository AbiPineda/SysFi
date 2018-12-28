-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 02:49:29
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
  `unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idarticulos`, `codigo`, `nombre`, `cantidad`, `valor`, `marca`, `estado`, `unidad`) VALUES
(1, 'LR12345664', 'Lavadora de Ropa', 1, 900, 'Mabe', 's', 1),
(2, '7415300005014', 'Refrigeradora', 1, 900, 'LG', 's', 1),
(3, '750120665242', 'Televisor', 1, 700, 'LG', 's', 1),
(4, '7441102801011', 'Computadora Sony', 3, 560, 'Sony', 's', 1),
(5, '744110280091', 'Play Station 4', 5, 300, 'Sony', 's', 1);

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
  `to_interes` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contable`
--

INSERT INTO `contable` (`id_contable`, `concepto1`, `concepto2`, `tipo`, `valor`, `fecha`, `hora`, `clase`, `interes`, `cuota`, `to_interes`) VALUES
(1, 'Venta al \"CONTADO\"', '12548742', 'ENTRADA', '5400', '2018-12-27', '08:34:21', NULL, NULL, NULL, NULL),
(2, 'Venta al \"CONTADO\"', '12548743', 'ENTRADA', '5400', '2018-12-27', '08:35:49', NULL, NULL, NULL, NULL),
(3, 'Venta al \"CONTADO\"', '12548744', 'ENTRADA', '5400', '2018-12-27', '08:36:28', NULL, NULL, NULL, NULL),
(4, 'Venta al \"CONTADO\"', '12548745', 'ENTRADA', '5400', '2018-12-27', '08:36:56', NULL, NULL, NULL, NULL),
(5, '1', '12548746', 'CXC', '2300', '2018-12-27', '08:43:00', NULL, 10, 202.21, 126.47),
(6, 'Venta al \"CONTADO\"', '12548747', 'ENTRADA', '3150', '2018-12-27', '16:26:39', NULL, NULL, NULL, NULL),
(7, 'Venta al \"CONTADO\"', '12548748', 'ENTRADA', '3150', '2018-12-27', '16:27:23', NULL, NULL, NULL, NULL),
(8, 'Venta al \"CONTADO\"', '12548749', 'ENTRADA', '', '2018-12-27', '16:29:21', NULL, NULL, NULL, NULL),
(9, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:43:08', NULL, NULL, NULL, NULL),
(10, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:46:22', NULL, NULL, NULL, NULL),
(11, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:46:59', NULL, NULL, NULL, NULL),
(12, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:47:18', NULL, NULL, NULL, NULL),
(13, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:48:00', NULL, NULL, NULL, NULL),
(14, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:50:26', NULL, NULL, NULL, NULL),
(15, 'Venta al \"CONTADO\"', '', 'ENTRADA', '', '2018-12-27', '16:52:14', NULL, NULL, NULL, NULL),
(16, 'Venta al \"CONTADO\"', '12548750', 'ENTRADA', '1200', '2018-12-27', '20:37:44', NULL, NULL, NULL, NULL),
(17, 'Venta al \"CONTADO\"', '12548751', 'ENTRADA', '1000', '2018-12-27', '21:35:10', NULL, NULL, NULL, NULL),
(18, 'Venta al \"CONTADO\"', '12548752', 'ENTRADA', '1000', '2018-12-27', '23:10:18', NULL, NULL, NULL, NULL),
(19, 'Venta al \"CONTADO\"', '12548753', 'ENTRADA', '1000', '2018-12-27', '23:11:19', NULL, NULL, NULL, NULL),
(20, 'Venta al \"CONTADO\"', '12548754', 'ENTRADA', '1000', '2018-12-27', '23:12:07', NULL, NULL, NULL, NULL),
(21, 'Venta al \"CONTADO\"', '12548755', 'ENTRADA', '2200', '2018-12-27', '23:13:25', NULL, 6.75, NULL, NULL);

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
(47, '12548741', 2, '2', '3', '1000', '3000', 'VENTA', '2018-12-27'),
(48, '12548741', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(49, '12548742', 2, '2', '3', '1000', '3000', 'VENTA', '2018-12-27'),
(50, '12548742', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(51, '12548743', 2, '2', '3', '1000', '3000', 'VENTA', '2018-12-27'),
(52, '12548743', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(53, '12548744', 2, '2', '3', '1000', '3000', 'VENTA', '2018-12-27'),
(54, '12548744', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(55, '12548745', 2, '2', '3', '1000', '3000', 'VENTA', '2018-12-27'),
(56, '12548745', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(57, '12548746', 1, '1', '2', '1200', '2400', 'VENTA', '2018-12-27'),
(58, '12548747', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-27'),
(59, '12548747', 3, '3', '1', '950', '950', 'VENTA', '2018-12-27'),
(60, '12548747', 3, '3', '1', '1000', '1000', 'VENTA', '2018-12-27'),
(61, '', 5, '5', '1', '1000', '1000', 'VENTA', '0000-00-00'),
(62, '12548750', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-27'),
(63, '12548751', 2, '2', '1', '1000', '1000', 'VENTA', '2018-12-27'),
(64, '12548752', 5, '5', '1', '1000', '1000', 'VENTA', '2018-12-27'),
(65, '12548753', 2, '2', '1', '1000', '1000', 'VENTA', '2018-12-27'),
(66, '12548755', 2, '2', '1', '1000', '1000', 'VENTA', '2018-12-27'),
(67, '12548755', 1, '1', '1', '1200', '1200', 'VENTA', '2018-12-27');

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
(8, '12548741', '5400', '2018-12-27'),
(9, '12548742', '5400', '2018-12-27'),
(10, '12548743', '5400', '2018-12-27'),
(11, '12548744', '5400', '2018-12-27'),
(12, '12548745', '5400', '2018-12-27'),
(13, '12548746', '2400', '2018-12-27'),
(14, '12548747', '3150', '2018-12-27'),
(15, '12548748', '3150', '2018-12-27'),
(16, '12548749', '', '0000-00-00'),
(17, '', '', '0000-00-00'),
(18, '12548750', '1200', '2018-12-27'),
(19, '12548751', '1000', '2018-12-27'),
(20, '12548752', '1000', '2018-12-27'),
(21, '12548753', '1000', '2018-12-27'),
(22, '12548754', '1000', '2018-12-27'),
(23, '12548755', '2200', '2018-12-27');

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
(1, 2, 934, 5, 1000, 1),
(2, 1, 953, 5, 1200, 1),
(3, 3, 13, 10, 950, 1),
(4, 3, 13, 10, 1000, 1),
(5, 5, 13, 10, 1000, 1);

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
(75, '12548755', 'VENTA', 1, 1, 900, 900, 953, '2018-12-27');

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
(6, 1, 'Venta al \"CONTADO\"', '12548741', 'VENTA', '5400', 'VENTA', '2018-12-27', '08:32:25', 'CONTADO'),
(7, 1, 'Venta al \"CONTADO\"', '12548742', 'VENTA', '5400', 'VENTA', '2018-12-27', '08:34:21', 'CONTADO'),
(8, 1, 'Venta al \"CONTADO\"', '12548743', 'VENTA', '5400', 'VENTA', '2018-12-27', '08:35:49', 'CONTADO'),
(9, 1, 'Venta al \"CONTADO\"', '12548744', 'VENTA', '5400', 'VENTA', '2018-12-27', '08:36:28', 'CONTADO'),
(10, 1, 'Venta al \"CONTADO\"', '12548745', 'VENTA', '5400', 'VENTA', '2018-12-27', '08:36:56', 'CONTADO'),
(11, 1, 'Venta al \"CREDITO\"', '12548746', 'VENTA', '2400', 'VENTA', '2018-12-27', '08:43:00', 'CREDITO');

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
(1, 'Juan Moz', 'Cedros', '78404023', '56464');

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
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idarticulos`);

--
-- Indices de la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  ADD PRIMARY KEY (`id_cliente_temp`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Indices de la tabla `contable`
--
ALTER TABLE `contable`
  ADD PRIMARY KEY (`id_contable`),
  ADD KEY `fk_factuu` (`concepto2`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
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
-- Indices de la tabla `resumen`
--
ALTER TABLE `resumen`
  ADD PRIMARY KEY (`id_resumen`),
  ADD KEY `fk_clie` (`id_clientes`),
  ADD KEY `fk_factu` (`factura`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

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
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  MODIFY `id_cliente_temp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contable`
--
ALTER TABLE `contable`
  MODIFY `id_contable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `resumen`
--
ALTER TABLE `resumen`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta_temp`
--
ALTER TABLE `venta_temp`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  ADD CONSTRAINT `fk_clienteTem` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `resumen`
--
ALTER TABLE `resumen`
  ADD CONSTRAINT `fk_clie` FOREIGN KEY (`id_clientes`) REFERENCES `tb_cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_factu` FOREIGN KEY (`factura`) REFERENCES `factura` (`factura`);

--
-- Filtros para la tabla `venta_temp`
--
ALTER TABLE `venta_temp`
  ADD CONSTRAINT `fk_venTem` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
