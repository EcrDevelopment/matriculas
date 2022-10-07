-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2020 a las 00:36:09
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `paterno`, `materno`, `direccion`, `telefono`, `genero`, `correo`, `id_tutor`) VALUES
(4, 'Diego', 'Mogollon', 'Delgado', 'villas de ancon', '159263487', 'M', 'diego@gmail.com', 1),
(5, 'maria', 'malta', 'Perez', 'villas de ancon', '753496821', 'F', 'maria@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `fecha`, `id_grupo`, `id_curso`, `id_profesor`) VALUES
(1, '2020-07-13', 2, 3, 2),
(2, '2020-07-13', 4, 2, 2),
(3, '2020-07-13', 2, 1, 2),
(4, '2020-07-13', 4, 1, 2),
(5, '2020-07-13', 2, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_d`
--

CREATE TABLE `asistencia_d` (
  `id_alumno` int(11) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `id_asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia_d`
--

INSERT INTO `asistencia_d` (`id_alumno`, `estado`, `id_asistencia`) VALUES
(4, 'A', 1),
(5, 'T', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `idaula` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `edificio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `salon` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idaula`, `nombre`, `edificio`, `salon`, `grupo_id`, `id_profesor`, `id_horario`) VALUES
(5, '5to B', 'pabellon a', '120', 2, 3, 3),
(6, '5to C', 'Pabellon c', '292', 5, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`) VALUES
(1, 'Comunicacion'),
(2, 'Matematica'),
(3, 'Fisica '),
(6, 'Personal Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `monto_f` double NOT NULL,
  `fecha` datetime NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `numero_factura`, `monto_f`, `fecha`, `id_pago`, `id_alumno`) VALUES
(1, 1244554, 400, '2020-07-15 00:00:00', 1, 4),
(2, 1213322, 100, '2020-07-08 00:00:00', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre`, `capacidad`, `turno`) VALUES
(2, '5to B', 3, 'N'),
(5, '5to C', 10, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `nombre`, `id_grupo`) VALUES
(3, 'horario 2', 4),
(4, 'horario 3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_d`
--

CREATE TABLE `horario_d` (
  `id_deta` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `dia_nombre` varchar(45) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `hora_i` time NOT NULL,
  `hora_f` time NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario_d`
--

INSERT INTO `horario_d` (`id_deta`, `id_horario`, `dia`, `dia_nombre`, `id_curso`, `hora_i`, `hora_f`, `id_profesor`) VALUES
(6, 3, 3, 'Miercoles', 2, '13:35:00', '13:36:00', 2),
(7, 3, 4, 'Juves', 2, '13:36:00', '13:35:00', 1),
(10, 4, 1, 'Lunes', 2, '14:57:00', '16:59:00', 1),
(11, 3, 5, 'Viernes', 6, '05:09:00', '20:09:00', 1),
(12, 3, 1, 'Lunes', 1, '16:39:00', '18:39:00', 2),
(13, 4, 1, 'Lunes', 1, '06:09:00', '08:09:00', 2),
(14, 4, 1, 'Lunes', 6, '21:10:00', '22:10:00', 2),
(15, 4, 2, 'Martes', 1, '21:10:00', '22:10:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `Idinscripcion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`Idinscripcion`, `fecha`, `tutor_id`, `alumno_id`, `grupo_id`) VALUES
(2, '2020-07-13 00:00:00', 2, 5, 2),
(10, '2020-07-13 00:00:00', 1, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `n1` int(11) NOT NULL,
  `n2` int(11) NOT NULL,
  `n3` int(11) NOT NULL,
  `n4` int(11) NOT NULL,
  `n5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `id_alumno`, `id_grupo`, `id_curso`, `id_profesor`, `n1`, `n2`, `n3`, `n4`, `n5`) VALUES
(1, 4, 2, 1, 2, 15, 20, 14, 10, 10),
(2, 5, 2, 1, 2, 13, 3, 7, 18, 0),
(3, 5, 2, 3, 2, 0, 0, 0, 0, 0),
(4, 4, 2, 3, 2, 13, 7, 0, 18, 4),
(5, 5, 2, 6, 2, 0, 0, 0, 10, 0),
(6, 4, 2, 6, 2, 9, 10, 12, 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `concepto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `monto` double NOT NULL,
  `fecha_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `concepto`, `monto`, `fecha_limite`) VALUES
(1, 'Matricula', 250, '2020-06-18'),
(3, 'p1', 200, '2020-06-19'),
(4, 'p2', 300, '2020-06-19'),
(5, 'p3', 200, '2020-07-17'),
(6, 'p4', 100, '2020-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `nombre`, `paterno`, `materno`, `direccion`, `telefono`, `genero`, `correo`, `id_usuario`) VALUES
(1, 'Jean Franco', 'Bran', 'Gomez', 'Puente Pientra', '789142563', 'M', 'jean@gmail.com', 7),
(2, 'Maria', 'Mogollon', 'Perez', 'ancon', '753124869', 'F', 'maria@gmail.com', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idoperario` int(11) NOT NULL,
  `nombre` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `materno` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paterno` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idoperario`, `nombre`, `materno`, `paterno`, `direccion`, `telefono`, `email`, `estado`, `fecha_creacion`, `id_usuario`) VALUES
(2, 'Jose Alejandro22', 'Gomez', 'DElgadoa', 'villas de ancon', '745896123', 'jose@gmail.com', '1', '2020-05-18 00:30:00', 2),
(3, 'Luis', 'gomez', 'Eduardo', NULL, '784512963', 'luis@gmail.com', '', '0000-00-00 00:00:00', 3),
(4, 'Juan', '', 'perez', NULL, '123456789', 'juan@gmail.com', '', '0000-00-00 00:00:00', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `idtutor` int(11) NOT NULL,
  `nombre` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `materno` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paterno` varchar(43) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`idtutor`, `nombre`, `materno`, `paterno`, `direccion`, `telefono`, `email`, `estado`, `fecha_creacion`, `id_usuario`) VALUES
(1, 'Jose Alejandro', 'Gomez', 'Delgado', NULL, '946178235', 'jose@gmail.com', '', '0000-00-00 00:00:00', 6),
(2, 'marizol', 'perez', 'perez', NULL, '754193256', 'marizol@gmail.com', '', '0000-00-00 00:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `tipo`) VALUES
(2, 'alejandro', '123', '2'),
(3, 'luis', '123', '1'),
(6, 'jose', '123', '2'),
(7, 'jean', '123', ''),
(8, 'maria', '123', '3'),
(9, 'marizol', '123', '2'),
(10, 'juan', '123', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idaula`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `horario_d`
--
ALTER TABLE `horario_d`
  ADD PRIMARY KEY (`id_deta`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`Idinscripcion`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idoperario`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`idtutor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `idaula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horario_d`
--
ALTER TABLE `horario_d`
  MODIFY `id_deta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `Idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idoperario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `idtutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
