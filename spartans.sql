-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2023 a las 10:30:33
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE spartans;

USE spartans;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spartans`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calistenico`
--

CREATE TABLE `calistenico` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `EDAD` int(11) DEFAULT NULL,
  `PESO` float DEFAULT NULL,
  `ALTURA` float DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calistenico`
--

INSERT INTO `calistenico` (`ID`, `NOMBRE`, `EDAD`, `PESO`, `ALTURA`, `IMG`) VALUES
(10, 'Javi', 24, 80, 1.81, 'logro1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calistenico_categoria`
--

CREATE TABLE `calistenico_categoria` (
  `ID` int(11) NOT NULL,
  `ID_CALISTENICO` int(11) DEFAULT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calistenico_logro`
--

CREATE TABLE `calistenico_logro` (
  `ID` int(11) NOT NULL,
  `ID_CALISTENICO` int(11) DEFAULT NULL,
  `ID_LOGRO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calistenico_logro`
--

INSERT INTO `calistenico_logro` (`ID`, `ID_CALISTENICO`, `ID_LOGRO`) VALUES
(11, 10, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idProductoCliente` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `NOMBRE`) VALUES
(1, 'Resistencia'),
(2, 'Free Style'),
(3, 'Fuerza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `user`, `pass`, `NOMBRE`, `DIRECCION`) VALUES
(1, 'marta', '1234', 'marta delgado', 'aaa'),
(9, 'marta', '1234', 'marta delgado', 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `emailCliente` varchar(255) NOT NULL,
  `contrasenaCliente` varchar(255) NOT NULL,
  `nombreCliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CATEGORIA` varchar(100) NOT NULL,
  `FORMATO` varchar(100) NOT NULL,
  `IMG` varchar(255) NOT NULL,
  `FECHA` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`ID`, `CATEGORIA`, `FORMATO`, `IMG`, `FECHA`) VALUES
(3, 'equipo', 'imagen', 'equipo (1).jpg', ''),
(4, 'equipo', 'imagen', 'equipo (2).jpg', ''),
(5, 'equipo', 'imagen', 'equipo (3).jpg', ''),
(6, 'comienzo', 'imagen', 'empezo (1).jpg', ''),
(7, 'comienzo', 'imagen', 'empezo (2).jpg', ''),
(8, 'comienzo', 'imagen', 'empezo (3).jpg', ''),
(9, 'comienzo', 'imagen', 'empezo (4).jpg', ''),
(10, 'comienzo', 'imagen', 'empezo (5).jpg', ''),
(11, 'comienzo', 'imagen', 'empezo (6).jpg', ''),
(12, 'comienzo', 'imagen', 'empezo (7).jpg', ''),
(13, 'stage', 'cartel', 'SCARTEL2019.jpg', '2019'),
(14, 'stage', 'cartel', 'SCARTEL2018.jpg', '2018'),
(15, 'stage', 'cartel', 'SCARTEL2016.jpg', '2016'),
(16, 'stage', 'imagen', 'S2017F1.jpg', '2017'),
(17, 'stage', 'imagen', 'S2016F1.jpg', '2016'),
(18, 'eventos', 'cartel', 'ECARTEL2022.jpg', '2016'),
(19, 'eventos', 'imagen', 'E2022F1.jpg', '2022'),
(20, 'eventos', 'imagen', 'E2022F2.jpg', '2022'),
(21, 'eventos', 'imagen', 'E2022F3.jpg', '2022'),
(22, 'eventos', 'imagen', 'E2022F4.jpg', '2022'),
(23, 'eventos', 'imagen', 'E2022F5.jpg', '2022'),
(24, 'eventos', 'imagen', 'E2022F6.jpg', '2022'),
(25, 'eventos', 'imagen', 'E2022F7.jpg', '2022'),
(26, 'eventos', 'imagen', 'E2022F8.jpg', '2022'),
(27, 'eventos', 'imagen', 'E2022F9.jpg', '2022'),
(28, 'eventos', 'imagen', 'E2022F10.jpg', '2022'),
(29, 'eventos', 'imagen', 'E2022F11.jpg', '2022'),
(30, 'eventos', 'imagen', 'E2022F12.jpg', '2022'),
(31, 'eventos', 'imagen', 'E2022F13.jpg', '2022'),
(32, 'eventos', 'imagen', 'E2022F14.jpg', '2022'),
(33, 'eventos', 'imagen', 'E2022F15.jpg', '2022'),
(34, 'eventos', 'imagen', 'E2022F16.jpg', '2022'),
(35, 'eventos', 'imagen', 'E2022F17.jpg', '2022'),
(36, 'eventos', 'imagen', 'E2022F18.jpg', '2022'),
(37, 'eventos', 'imagen', 'E2017F1.jpg', '2017'),
(38, 'eventos', 'imagen', 'E2017F2.jpg', '2017'),
(39, 'eventos', 'imagen', 'E2017F3.jpg', '2017'),
(41, 'eventos', 'imagen', 'E2017F4.jpg', '2017'),
(42, 'eventos', 'imagen', 'E2017F5.jpg', '2017'),
(43, 'eventos', 'imagen', 'E2017F6.jpg', '2017'),
(44, 'eventos', 'imagen', 'E2017F7.jpg', '2017'),
(45, 'eventos', 'imagen', 'E2017F8.jpg', '2017'),
(46, 'eventos', 'imagen', 'E2017F9.jpg', '2017'),
(47, 'eventos', 'imagen', 'E2017F10.jpg', '2017'),
(48, 'eventos', 'imagen', 'E2017F (11).jpg', '2017'),
(49, 'eventos', 'imagen', 'E2017F (12).jpg', '2017'),
(50, 'eventos', 'imagen', 'E2017F (13).jpg', '2017'),
(51, 'eventos', 'imagen', 'E2017F (14).jpg', '2017'),
(52, 'eventos', 'imagen', 'E2017F (15).jpg', '2017'),
(53, 'eventos', 'imagen', 'E2017F (16).jpg', '2017'),
(54, 'eventos', 'imagen', 'E2017F (17).jpg', '2017'),
(55, 'eventos', 'imagen', 'E2017F (18).jpg', '2017'),
(56, 'eventos', 'imagen', 'E2017F (19).jpg', '2017'),
(57, 'eventos', 'imagen', 'E2017F (20).jpg', '2017'),
(58, 'eventos', 'imagen', 'E2017F (21).jpg', '2017'),
(59, 'eventos', 'imagen', 'E2017F (22).jpg', '2017'),
(60, 'eventos', 'imagen', 'E2017F (23).jpg', '2017'),
(61, 'eventos', 'imagen', 'E2017F (24).jpg', '2017'),
(62, 'eventos', 'imagen', 'E2017F (25).jpg', '2017'),
(63, 'eventos', 'imagen', 'E2016F (1).jpg', '2016'),
(64, 'eventos', 'imagen', 'E2016F (2).jpg', '2016'),
(65, 'eventos', 'imagen', 'E2016F (3).jpg', '2016'),
(66, 'eventos', 'imagen', 'E2016F (4).jpg', '2016'),
(67, 'eventos', 'imagen', 'E2016F (5).jpg', '2016'),
(68, 'eventos', 'imagen', 'E2016F (6).jpg', '2016'),
(69, 'eventos', 'imagen', 'E2016F (7).jpg', '2016'),
(70, 'eventos', 'imagen', 'E2016F (8).jpg', '2016'),
(71, 'eventos', 'imagen', 'E2016F (9).jpg', '2016'),
(72, 'eventos', 'imagen', 'E2016F (10).jpg', '2016'),
(73, 'eventos', 'imagen', 'E2016F (11).jpg', '2016'),
(74, 'eventos', 'imagen', 'E2016F (12).jpg', '2016'),
(75, 'eventos', 'imagen', 'E2016F (13).jpg', '2016'),
(76, 'comienzo', 'imagen', 'empezo (8).jpg', ''),
(77, 'comienzo', 'imagen', 'empezo (9).jpg', ''),
(78, 'comienzo', 'imagen', 'empezo (10).jpg', ''),
(79, 'comienzo', 'imagen', 'empezo (11).jpg', ''),
(80, 'comienzo', 'imagen', 'empezo (12).jpg', ''),
(81, 'comienzo', 'imagen', 'empezo (13).jpg', ''),
(115, 'equipo', 'imagen', 'noticia.jpg', '2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logro`
--

CREATE TABLE `logro` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logro`
--

INSERT INTO `logro` (`ID`, `NOMBRE`, `FECHA`, `ID_CATEGORIA`) VALUES
(1, '30 Dominadas', '2023-02-06', 2),
(12, 'Prueba', '2023-02-08', 2),
(13, 'Campe&oacute;n Gods Battle 2.0', '2022-11-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(255) DEFAULT NULL,
  `CONTENIDO` text DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `CATEGORIA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`ID`, `TITULO`, `CONTENIDO`, `FECHA`, `LINK`, `IMG`, `CATEGORIA`) VALUES
(14, 'Parque homologado de Calistenia en La Paz', 'Linares tendrá un parque de calistenia homologado en La Paz. Mientras tanto, los deportistas podrán seguir entrenándose en las instalaciones del Silo.', '2023-01-24', 'https://elnuevoobservador.com/linares-tendra-un-parque-de-calistenia-homologado-en-la-paz/?fbclid=IwAR0o9Mq8iQoXbuIQ0xCBEQLnUwlgJ6QBrNdWkji56xpNZvmoYnDwAq9FoWw', 'noticia2.jpg', 'noticia'),
(15, 'Reunión sobre el parque de La Paz', 'Satisfacción en el club Spartans Kastalon de Linares por el acuerdo con el Ayuntamiento para reubicar su actividad deportiva en la barriada de La Paz. ', '2023-02-25', 'https://cadenaser.com/andalucia/2023/01/25/deportistas-de-calistenia-en-linares-satisfechos-con-la-proxima-ubicacion-en-la-paz-de-un-parque-para-sus-entrenamientos-y-campeonatos-radio-linares/?fbclid=IwAR3nbo44GccPm6oEG_oJ3avd1SuSgLmUslbljeHQE-a5TqDfWwPjW', 'noticia3.jpg', 'noticia'),
(16, 'Gods Battle 2.0', 'NUEVAMENTE LINARES SE TRAJO LA VICTORIA A CASA.\r\n\r\nEl pasado fin de semana diez de nuestros atletas del equipo SPARTANS KASTALON, asistieron al campeonato internacional anual celebrado en Archena (Murcia). GODS BATTLES 2.0.', '2022-11-17', 'https://www.instagram.com/p/ClD9WkOszuy/?hl=es', 'noticia4.jpg', 'noticia'),
(17, 'El Silo', 'Nuestro parque “El silo”, un lugar donde se fomentan valores, una vida sana y el deporte; un lugar que para muchos es un estilo de vida y que cada vez más jóvenes empiezan a practicarlo; un lugar referencia para mucha gente que vienen de todos los lugares de España y fuera de país para poder entrenar en él; un lugar que es potencia en España en resistencia, con campeones nacionales; un lugar donde muchos dan el paso a practicar un deporte que puede cambiar su vida…', '2023-01-18', 'https://www.instagram.com/p/CnkfDUso1eK/?hl=es', 'noticia1.jpg', 'silo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `emailCliente` varchar(255) DEFAULT NULL,
  `productos` text DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `TALLA` varchar(5) DEFAULT NULL,
  `PRECIO` float DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `CATEGORIA` varchar(100) DEFAULT NULL,
  `IMG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `NOMBRE`, `DESCRIPCION`, `TALLA`, `PRECIO`, `STOCK`, `CATEGORIA`, `IMG`) VALUES
(1, 'Camiseta Negra', 'Camiseta de Algodón', 'L', 20.99, 20, 'Ropa', 'Camiseta1.png'),
(2, 'Camiseta Gris', 'Camiseta de Algodón', 'XL', 24.95, 20, 'Ropa', 'Camiseta2.png'),
(6, 'Camiseta Negra Logo', 'Camiseta de algodón', 'L', 19.95, 10, 'Ropa', 'Camiseta3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `CLAVE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `NOMBRE`, `CLAVE`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calistenico`
--
ALTER TABLE `calistenico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `calistenico_categoria`
--
ALTER TABLE `calistenico_categoria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CALISTENICO` (`ID_CALISTENICO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `calistenico_logro`
--
ALTER TABLE `calistenico_logro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CALISTENICO` (`ID_CALISTENICO`),
  ADD KEY `calistenico_logro_ibfk_2` (`ID_LOGRO`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idProductoCliente`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  ADD KEY `ID_CLIENTE` (`ID_CLIENTE`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `emailCliente` (`emailCliente`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `logro`
--
ALTER TABLE `logro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calistenico`
--
ALTER TABLE `calistenico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `calistenico_categoria`
--
ALTER TABLE `calistenico_categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `calistenico_logro`
--
ALTER TABLE `calistenico_logro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idProductoCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `logro`
--
ALTER TABLE `logro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calistenico_categoria`
--
ALTER TABLE `calistenico_categoria`
  ADD CONSTRAINT `calistenico_categoria_ibfk_1` FOREIGN KEY (`ID_CALISTENICO`) REFERENCES `calistenico` (`ID`),
  ADD CONSTRAINT `calistenico_categoria_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID`);

--
-- Filtros para la tabla `calistenico_logro`
--
ALTER TABLE `calistenico_logro`
  ADD CONSTRAINT `calistenico_logro_ibfk_1` FOREIGN KEY (`ID_CALISTENICO`) REFERENCES `calistenico` (`ID`),
  ADD CONSTRAINT `calistenico_logro_ibfk_2` FOREIGN KEY (`ID_LOGRO`) REFERENCES `logro` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `logro`
--
ALTER TABLE `logro`
  ADD CONSTRAINT `logro_ibfk_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
