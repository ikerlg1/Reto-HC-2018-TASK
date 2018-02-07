-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2018 a las 13:55:25
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `herramientacolaborativa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idArchivo` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `idProyecto` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMensaje` int(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `idProyecto` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idMensaje`, `descripcion`, `fecha`, `idProyecto`) VALUES
(6, 'esta muy sucio', '2018-01-22', 64),
(7, 'llevara tiempo', '2018-01-22', 64),
(14, 'Adasd', '2018-01-25', 72),
(15, 'asdaS', '2018-01-25', 72),
(16, 'asdasd', '2018-01-25', 72),
(17, 'adas', '2018-01-25', 72),
(18, 'asd', '2018-01-25', 72),
(19, 'asd', '2018-01-25', 72),
(20, 'zzzz', '2018-01-26', 74),
(21, 'zzzzz', '2018-01-26', 74),
(22, 'zzzz3', '2018-01-26', 74),
(23, 'zzzz4', '2018-01-26', 74),
(27, '52/2//36963', '2018-01-26', 82),
(28, '459645645', '2018-01-26', 82),
(29, '45451123P`KL´LÑ´LÑ', '2018-01-26', 82),
(30, '´GHJYJ', '2018-01-26', 82),
(41, 'ya no nos queda tiempo', '2018-02-01', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idNota` int(4) NOT NULL,
  `idTarea` int(4) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`idNota`, `idTarea`, `descripcion`) VALUES
(25, 61, 'prueba'),
(26, 61, 'prueba'),
(27, 61, 'segunda'),
(28, 62, 'espero ok'),
(29, 62, 'espero ok'),
(30, 62, 'espero ok'),
(31, 62, 'espero ok'),
(32, 62, 'espero ok'),
(33, 62, 'espero ok'),
(34, 62, 'sadadasdadad prueba'),
(37, 71, 'probando'),
(38, 71, 'probando'),
(39, 71, 'probando'),
(40, 71, 'dos'),
(41, 71, 'dos'),
(42, 71, 'dos'),
(43, 71, 'hola'),
(44, 71, 'hola'),
(45, 71, 'hola'),
(46, 71, 'nueva nota'),
(47, 71, 'nueva nota'),
(48, 71, 'nueva nota'),
(49, 71, 'hola 3333'),
(50, 71, 'hola 3333'),
(51, 71, 'hola 3333'),
(52, 72, 'prueba'),
(53, 72, 'prueba'),
(54, 72, 'prueba'),
(55, 72, 'prueba2'),
(56, 72, 'prueba2'),
(57, 72, 'prueba2'),
(58, 72, 'prueba3'),
(59, 72, 'prueba3'),
(60, 72, 'prueba3'),
(61, 72, 'asdasdasf4'),
(62, 73, 'una'),
(63, 73, 'dos'),
(64, 74, 'asad'),
(65, 75, 'mierda'),
(66, 79, 'asda'),
(67, 79, 'qqweqrqweqwe'),
(129, 89, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombre`, `descripcion`) VALUES
(64, 'usu2', 'pro1'),
(65, 'usu2', 'pro2'),
(66, 'usu2', 'pro3'),
(72, 'usu1', 'pruebanota'),
(73, 'proyecto2', 'anjlada'),
(74, 'zzzzzzzz', 'zzzzzzzz'),
(77, 'sads', 'asdsad'),
(81, 'erdk,o', ''),
(82, 'aaa', 'AAAAAA'),
(108, 'prueba', 'probando'),
(109, 'dddd', 'a'),
(110, 'dasd', ''),
(112, 'reto 3', 'vamos'),
(113, 'ssdfs', 'sdfs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idTarea` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `realizado` int(1) NOT NULL,
  `idProyecto` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idTarea`, `nombre`, `fecha_vencimiento`, `realizado`, `idProyecto`) VALUES
(25, 'lavar coche', '2018-01-26', 0, 64),
(60, 'asdasd', '2018-01-27', 1, 73),
(61, 'zzzzz', '2018-01-28', 1, 74),
(62, '<<<<', '2018-01-27', 0, 74),
(63, 'a', '2018-01-28', 0, 72),
(71, 'tarea nueva', '2018-02-02', 0, 108),
(72, 'dadasd', '2018-02-02', 0, 109),
(73, 'ajhbdasd', '2018-01-31', 0, 109),
(74, 'sdddfsfsdsdfdf', '0000-00-00', 0, 109),
(75, 'sdfsdfs', '2018-02-01', 0, 108),
(76, 'ADASD', '2018-02-01', 0, 108),
(77, 'ADASD', '2018-02-02', 0, 110),
(78, 'qqqqqq', '2018-02-02', 0, 110),
(79, 'sdfsd', '0000-00-00', 0, 110),
(84, 'dddd', '2018-02-04', 1, 112),
(89, 'asdas', '2018-02-01', 1, 113);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido1`, `apellido2`, `email`, `telefono`, `contrasena`, `foto`) VALUES
(1, 'david', 'xxx', 'xxx', 'pruebas@ppp.es', '945111111', '', ''),
(2, 'javi', 'xxx', 'xxx', 'wasda', '944526398', '', ''),
(3, 'b ', 'b', 'b', 'b ', 'b', '456', ''),
(7, 'david', '', '', '', '', '123', ''),
(8, 'david', '1', '1', '1', '1', '123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_proyecto`
--

CREATE TABLE `usuario_proyecto` (
  `idUsuario` int(4) NOT NULL,
  `idProyecto` int(4) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_proyecto`
--

INSERT INTO `usuario_proyecto` (`idUsuario`, `idProyecto`, `tipo`) VALUES
(1, 72, 'creador'),
(1, 73, 'creador'),
(1, 74, 'creador'),
(1, 112, 'invitado'),
(1, 113, 'invitado'),
(2, 64, 'creador'),
(2, 65, 'creador'),
(2, 66, 'creador'),
(2, 72, 'invitado'),
(3, 112, 'creador'),
(3, 113, 'creador'),
(7, 108, 'creador'),
(7, 110, 'creador'),
(7, 112, 'invitado'),
(8, 109, 'creador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMensaje`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `idTarea` (`idTarea`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_proyecto`
--
ALTER TABLE `usuario_proyecto`
  ADD PRIMARY KEY (`idUsuario`,`idProyecto`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMensaje` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idProyecto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idTarea` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`idTarea`) REFERENCES `tarea` (`idTarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_proyecto`
--
ALTER TABLE `usuario_proyecto`
  ADD CONSTRAINT `usuario_proyecto_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_proyecto_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
