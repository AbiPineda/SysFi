-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2018 a las 02:12:19
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
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinventario` int(11) NOT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stockMinimo` int(11) DEFAULT NULL,
  `pv` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idinventario`, `id_articulos`, `stock`, `stockMinimo`, `pv`, `cantidad`) VALUES
(1, 2, 10, 5, 1000, 1),
(2, 1, 15, 5, 1200, 1),
(3, 3, 15, 10, 950, 1),
(4, 3, 15, 10, 1000, 1),
(5, 5, 15, 10, 1000, 1);

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
  `stock` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`idkardex`, `factura`, `tipo`, `id_articulos`, `cantidad`, `costoK`, `importe`, `stock`, `fecha`) VALUES
(1, '100000001', 'VENTA', 5, 1, 900, 900, 4, '2018-12-24'),
(2, '100000008', 'COMPRA', 2, 1, 200, 200, 5, '2018-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(10) NOT NULL,
  `nombre_cliente` varchar(40) DEFAULT NULL,
  `dir_cliente` varchar(100) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL
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
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_temp`
--
ALTER TABLE `cliente_temp`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_articulos1` FOREIGN KEY (`id_articulos`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `fk_kardex_articulos1` FOREIGN KEY (`id_articulos`) REFERENCES `articulos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
