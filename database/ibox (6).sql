-- -- phpMyAdmin SQL Dump
-- -- version 5.2.0-dev+20220507.3185b604ff
-- -- https://www.phpmyadmin.net/
-- --
-- -- Servidor: 127.0.0.1
-- -- Tiempo de generación: 26-05-2022 a las 11:04:07
-- -- Versión del servidor: 10.4.24-MariaDB
-- -- Versión de PHP: 8.1.5

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Base de datos: `ibox`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Estructura de tabla para la tabla `carrito`
-- --

-- CREATE TABLE `carrito` (
--   `idcarrito` int(11) NOT NULL,
--   `idcliente` int(11) NOT NULL,
--   `estado` varchar(16) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Volcado de datos para la tabla `carrito`
-- --

-- INSERT INTO `carrito` (`idcarrito`, `idcliente`, `estado`) VALUES
-- (19, 1, 'Pendiente'),
-- (20, 7, 'Pendiente');

-- -- --------------------------------------------------------

-- --
-- -- Estructura de tabla para la tabla `cliente`
-- --

-- CREATE TABLE `cliente` (
--   `idcliente` int(11) NOT NULL,
--   `usuario` varchar(50) NOT NULL,
--   `correo` varchar(50) NOT NULL,
--   `contrasena` varchar(16) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Volcado de datos para la tabla `cliente`
-- --

-- INSERT INTO `cliente` (`idcliente`, `usuario`, `correo`, `contrasena`) VALUES
-- (1, 'carlos', 'carlos@gmail.com', '1234'),
-- (3, 'daniel', 'daniel@gmail.com', '1234'),
-- (4, 'kevin', 'kevin@gmail.com', '1234'),
-- (5, 'ricardo', 'ricardo@gmail.com', '1234'),
-- (7, 'pupusadefrijol', 'pupusa@gmail.com', '12345');

-- -- --------------------------------------------------------

-- --
-- -- Estructura de tabla para la tabla `detalle_carrito`
-- --

-- CREATE TABLE `detalle_carrito` (
--   `idcarrito` int(11) NOT NULL,
--   `idproducto` int(16) NOT NULL,
--   `cantidad` int(50) NOT NULL,
--   `imagen` varchar(16) NOT NULL,
--   `descripcion` varchar(100) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Volcado de datos para la tabla `detalle_carrito`
-- --

-- INSERT INTO `detalle_carrito` (`idcarrito`, `idproducto`, `cantidad`, `imagen`, `descripcion`) VALUES
-- (19, 1, 10, 'FP34Em4aUAM3MTx.', 'Full sublimacion. Camisa de One Piece'),
-- (19, 10, 10, 'FP34Em4aUAM3MTx.', 'De one piece también'),
-- (20, 1, 10, 'FP34Em4aUAM3MTx.', 'Parcial. si'),
-- (20, 10, 15, 'FP34Em4aUAM3MTx.', 'no');

-- -- --------------------------------------------------------

-- --
-- -- Estructura de tabla para la tabla `factura`
-- --

-- CREATE TABLE `factura` (
--   `idfactura` int(11) NOT NULL,
--   `fecha` date NOT NULL,
--   `idcliente` int(16) NOT NULL,
--   `idcarrito` int(16) NOT NULL,
--   `total` decimal(5,2) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Volcado de datos para la tabla `factura`
-- --

-- INSERT INTO `factura` (`idfactura`, `fecha`, `idcliente`, `idcarrito`, `total`) VALUES
-- (1, '2026-05-22', 7, 20, '228.00');

-- -- --------------------------------------------------------

-- --
-- -- Estructura de tabla para la tabla `producto`
-- --

-- CREATE TABLE `producto` (
--   `idproducto` int(11) NOT NULL,
--   `nombre` varchar(50) NOT NULL,
--   `tela` varchar(16) NOT NULL,
--   `talla` varchar(50) NOT NULL,
--   `color` varchar(50) NOT NULL,
--   `color2` varchar(16) NOT NULL,
--   `tipotaza` varchar(16) NOT NULL,
--   `tipopin` varchar(16) NOT NULL,
--   `tipollavero` varchar(16) NOT NULL,
--   `stock` int(11) NOT NULL,
--   `precio` decimal(5,2) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Volcado de datos para la tabla `producto`
-- --

-- INSERT INTO `producto` (`idproducto`, `nombre`, `tela`, `talla`, `color`, `color2`, `tipotaza`, `tipopin`, `tipollavero`, `stock`, `precio`) VALUES
-- (1, 'Camisa', 'Dry-Fit', 'S', 'Negro', '', '', '', '', 50, '10.00'),
-- (2, 'Camisa', 'Polycotton', 'S', 'Blanco', '', '', '', '', 100, '8.00'),
-- (3, 'Mascarilla', '', '', 'Negro', 'Negro', '', '', '', 100, '5.00'),
-- (4, 'Taza', '', '', '', '', 'Normal', '', '', 100, '5.00'),
-- (5, 'Pin', '', '', '', '', '', 'Metálico', '', 100, '0.70'),
-- (6, 'Llavero', '', '', '', '', '', '', 'Normal', 100, '0.85'),
-- (7, 'Jarra', '', '', 'Amarillo', '', '', '', '', 100, '6.50'),
-- (8, 'Delantal', '', 'XS', 'Rojo', '', '', '', '', 100, '4.50'),
-- (9, 'Poster', '', '', '', '', '', '', '', 100, '0.75'),
-- (10, 'Pachon', '', '', 'Blanco', '', '', '', '', 100, '8.50');

-- --
-- -- Índices para tablas volcadas
-- --

-- --
-- -- Indices de la tabla `carrito`
-- --
-- ALTER TABLE `carrito`
--   ADD PRIMARY KEY (`idcarrito`),
--   ADD KEY `idcliente` (`idcliente`),
--   ADD KEY `idcliente_2` (`idcliente`),
--   ADD KEY `idcliente_3` (`idcliente`);

-- --
-- -- Indices de la tabla `cliente`
-- --
-- ALTER TABLE `cliente`
--   ADD PRIMARY KEY (`idcliente`);

-- --
-- -- Indices de la tabla `detalle_carrito`
-- --
-- ALTER TABLE `detalle_carrito`
--   ADD KEY `idcarrito` (`idcarrito`,`idproducto`),
--   ADD KEY `idproducto` (`idproducto`);

-- --
-- -- Indices de la tabla `factura`
-- --
-- ALTER TABLE `factura`
--   ADD PRIMARY KEY (`idfactura`),
--   ADD KEY `idcliente` (`idcliente`,`idcarrito`),
--   ADD KEY `idcarrito` (`idcarrito`);

-- --
-- -- Indices de la tabla `producto`
-- --
-- ALTER TABLE `producto`
--   ADD PRIMARY KEY (`idproducto`);

-- --
-- -- AUTO_INCREMENT de las tablas volcadas
-- --

-- --
-- -- AUTO_INCREMENT de la tabla `carrito`
-- --
-- ALTER TABLE `carrito`
--   MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

-- --
-- -- AUTO_INCREMENT de la tabla `cliente`
-- --
-- ALTER TABLE `cliente`
--   MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- --
-- -- AUTO_INCREMENT de la tabla `factura`
-- --
-- ALTER TABLE `factura`
--   MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --
-- -- AUTO_INCREMENT de la tabla `producto`
-- --
-- ALTER TABLE `producto`
--   MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --
-- -- Restricciones para tablas volcadas
-- --

-- --
-- -- Filtros para la tabla `carrito`
-- --
-- ALTER TABLE `carrito`
--   ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON UPDATE CASCADE;

-- --
-- -- Filtros para la tabla `detalle_carrito`
-- --
-- ALTER TABLE `detalle_carrito`
--   ADD CONSTRAINT `detalle_carrito_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE,
--   ADD CONSTRAINT `detalle_carrito_ibfk_2` FOREIGN KEY (`idcarrito`) REFERENCES `carrito` (`idcarrito`) ON UPDATE CASCADE;

-- --
-- -- Filtros para la tabla `factura`
-- --
-- ALTER TABLE `factura`
--   ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON UPDATE CASCADE,
--   ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idcarrito`) REFERENCES `carrito` (`idcarrito`) ON UPDATE CASCADE;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
