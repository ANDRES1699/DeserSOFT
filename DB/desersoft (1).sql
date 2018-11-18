-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2018 a las 07:32:36
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desersoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `id_competencia` int(11) NOT NULL,
  `nom_competencia` varchar(15) DEFAULT NULL,
  `ver_competencia` varchar(50) DEFAULT NULL,
  `desc_competencia` varchar(250) DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consulta_trimestre_fichas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consulta_trimestre_fichas` (
`Ficha` int(11)
,`Trimestre` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desercausa`
--

CREATE TABLE `desercausa` (
  `idDCausa` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deserciones`
--

CREATE TABLE `deserciones` (
  `id_desercion` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `fecha_desercion1` date NOT NULL,
  `fecha_desercion2` date NOT NULL,
  `fecha_desercion3` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `id_aprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deserciones_has_desercausa`
--

CREATE TABLE `deserciones_has_desercausa` (
  `id` int(11) NOT NULL,
  `deserciones_id_desercion` int(11) NOT NULL,
  `desercausa_idDCausa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuario`
--

CREATE TABLE `estado_usuario` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_usuario`
--

INSERT INTO `estado_usuario` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `num_ficha` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL,
  `id_trimestre` int(11) DEFAULT NULL,
  `id_jornada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`num_ficha`, `fecha_inicio`, `fecha_fin`, `id_programa`, `id_trimestre`, `id_jornada`) VALUES
(45, '2018-11-16', '2018-11-23', 1, 1, 1),
(3453, '2018-11-21', '2018-11-21', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_has_usuarios`
--

CREATE TABLE `fichas_has_usuarios` (
  `fichas_num_ficha` int(11) NOT NULL,
  `usuarios_id_instructor` int(11) NOT NULL,
  `usuarios_id_aprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fichas_has_usuarios`
--

INSERT INTO `fichas_has_usuarios` (`fichas_num_ficha`, `usuarios_id_instructor`, `usuarios_id_aprendiz`) VALUES
(45, 2, 3),
(3453, 2, 3),
(45, 4, 27),
(45, 4, 28),
(3453, 4, 23),
(3453, 4, 25),
(3453, 4, 26),
(3453, 4, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id_jornada` int(11) NOT NULL,
  `nom_jornada` varchar(50) DEFAULT NULL,
  `siglas_jornada` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id_jornada`, `nom_jornada`, `siglas_jornada`) VALUES
(1, 'fdsfs', 'fsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id_justificaciones` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `tip_justificacion` varchar(15) DEFAULT NULL,
  `fecha_justificacion` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nom_programa` varchar(40) DEFAULT NULL,
  `estado_programa` varchar(10) DEFAULT NULL,
  `nvl_programa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nom_programa`, `estado_programa`, `nvl_programa`) VALUES
(1, 'ggg', 'fdsfs', 'fdsfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tip_rol` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tip_rol`) VALUES
(1, 'Coordinador'),
(2, 'Instructor'),
(3, 'Aprendiz'),
(4, 'Enfermera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_doc` int(11) NOT NULL,
  `Tip_doc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_doc`, `Tip_doc`) VALUES
(1, 'cédula de ciudadanía '),
(2, 'tarjeta de identidad ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestres`
--

CREATE TABLE `trimestres` (
  `id_trimestre` int(11) NOT NULL,
  `num_trimestre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trimestres`
--

INSERT INTO `trimestres` (`id_trimestre`, `num_trimestre`) VALUES
(1, 'fsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `num_documento` varchar(30) DEFAULT NULL,
  `cel_usuario` varchar(11) DEFAULT NULL,
  `tel_usuario` varchar(20) NOT NULL,
  `correo_instu` varchar(30) DEFAULT NULL,
  `correo_perso` varchar(30) NOT NULL,
  `contrasenia` varchar(200) DEFAULT NULL,
  `estado_usuario_id_estado` int(11) NOT NULL,
  `roles_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `imagen`, `create_time`, `nombres`, `apellidos`, `id_doc`, `num_documento`, `cel_usuario`, `tel_usuario`, `correo_instu`, `correo_perso`, `contrasenia`, `estado_usuario_id_estado`, `roles_id_rol`) VALUES
(1, '', '2018-11-18 04:42:20', 'Edwin Santiago', 'Briceño Uribe', 1, '123', '123', '123', 'affernandez74@misena.edu.co', 'dsad@gsdf.com', '7a0f6a01343ed14e82ebfc09f16628b6', 1, 1),
(2, '', '2018-11-18 04:39:31', 'Ana', 'del Arco', 1, '123456', '123456', '123456', 'affernandez74@misena.edu.co', 'lucas@dfs.com', '202cb962ac59075b964b07152d234b70', 1, 4),
(3, '', '2018-11-18 04:39:31', 'Lucas', 'Moudrich', 2, '12345', '12345', '12345', 'affernandez74@misena.edu.co', 'lucas@fsa.com', '202cb962ac59075b964b07152d234b70', 1, 3),
(4, '', '2018-11-18 06:29:46', 'Carlos Verto', 'Wilmar', 2, '1234', '1234', '1234', 'affernandez74@misena.edu.co', 'carlos@gmail.com', '451500eb5e5dcd9808d184041edf0760', 1, 2),
(18, '', '2018-11-18 06:22:16', 'Jeison Manuell', 'Muñoz Rincon', 2, '102', '1023', '10233', 'email@email', 'email@email1', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(22, '', '2018-11-18 06:03:45', 'Juancho', 'Garcia', 1, '12', '1023', '1023', 'email@email', 'email@email', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(23, '', '2018-11-18 06:06:45', 'Juancho', 'Garcia', 2, '1023', '1023', '1023', 'email@email', 'email@email', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(25, '', '2018-11-18 06:18:28', 'Jeison Manuell', 'Velaz', 3, '12', '1023', '1023', 'email@email', 'email@email', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(26, '', '2018-11-18 06:18:28', 'Juancho', 'Gonzales', 3, '13', '1023', '10233', 'email@email', 'email@email', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(27, '', '2018-11-18 06:18:28', 'Juan', 'Kaka', 2, '123', '213', '123', 'email@email1', 'email@email1', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(28, '', '2018-11-18 06:18:28', 'Jeison ', 'Rincon3', 2, '10230', '10232', '1023', 'email@email', 'email@email1', '2825e9d872f88d71daf56c5d7fb11566', 1, 3),
(29, '', '2018-11-18 06:18:28', 'Juancho', 'Muñoz', 2, '10234', '10232', '234', 'email@email', 'email@email', '2825e9d872f88d71daf56c5d7fb11566', 1, 3);

-- --------------------------------------------------------

--
-- Estructura para la vista `consulta_trimestre_fichas`
--
DROP TABLE IF EXISTS `consulta_trimestre_fichas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_trimestre_fichas`  AS  select `fichas`.`num_ficha` AS `Ficha`,`trimestres`.`num_trimestre` AS `Trimestre` from (`fichas` join `trimestres` on((`fichas`.`id_trimestre` = `trimestres`.`id_trimestre`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id_competencia`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `desercausa`
--
ALTER TABLE `desercausa`
  ADD PRIMARY KEY (`idDCausa`);

--
-- Indices de la tabla `deserciones`
--
ALTER TABLE `deserciones`
  ADD PRIMARY KEY (`id_desercion`),
  ADD KEY `fk_deserciones_usuarios1_idx` (`id_aprendiz`);

--
-- Indices de la tabla `deserciones_has_desercausa`
--
ALTER TABLE `deserciones_has_desercausa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deserciones_has_desercausa_deserciones1_idx` (`deserciones_id_desercion`),
  ADD KEY `fk_deserciones_has_desercausa_desercausa1_idx` (`desercausa_idDCausa`);

--
-- Indices de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`num_ficha`),
  ADD KEY `id_programa` (`id_programa`),
  ADD KEY `id_trimestre` (`id_trimestre`),
  ADD KEY `id_jornada` (`id_jornada`);

--
-- Indices de la tabla `fichas_has_usuarios`
--
ALTER TABLE `fichas_has_usuarios`
  ADD PRIMARY KEY (`fichas_num_ficha`,`usuarios_id_aprendiz`),
  ADD KEY `fk_fichas_has_usuarios_fichas1_idx` (`fichas_num_ficha`),
  ADD KEY `fk_fichas_has_usuarios_usuarios1_idx` (`usuarios_id_instructor`),
  ADD KEY `fk_fichas_has_usuarios_usuarios2_idx` (`usuarios_id_aprendiz`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id_jornada`);

--
-- Indices de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD PRIMARY KEY (`id_justificaciones`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `trimestres`
--
ALTER TABLE `trimestres`
  ADD PRIMARY KEY (`id_trimestre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`estado_usuario_id_estado`,`roles_id_rol`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `fk_usuarios_estado_usuario1_idx` (`estado_usuario_id_estado`),
  ADD KEY `fk_usuarios_roles1_idx` (`roles_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id_competencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desercausa`
--
ALTER TABLE `desercausa`
  MODIFY `idDCausa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deserciones`
--
ALTER TABLE `deserciones`
  MODIFY `id_desercion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deserciones_has_desercausa`
--
ALTER TABLE `deserciones_has_desercausa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `num_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3454;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id_jornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  MODIFY `id_justificaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trimestres`
--
ALTER TABLE `trimestres`
  MODIFY `id_trimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`);

--
-- Filtros para la tabla `deserciones`
--
ALTER TABLE `deserciones`
  ADD CONSTRAINT `fk_deserciones_usuarios1` FOREIGN KEY (`id_aprendiz`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deserciones_has_desercausa`
--
ALTER TABLE `deserciones_has_desercausa`
  ADD CONSTRAINT `fk_deserciones_has_desercausa_desercausa1` FOREIGN KEY (`desercausa_idDCausa`) REFERENCES `desercausa` (`idDCausa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deserciones_has_desercausa_deserciones1` FOREIGN KEY (`deserciones_id_desercion`) REFERENCES `deserciones` (`id_desercion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestres` (`id_trimestre`),
  ADD CONSTRAINT `fichas_ibfk_3` FOREIGN KEY (`id_jornada`) REFERENCES `jornadas` (`id_jornada`);

--
-- Filtros para la tabla `fichas_has_usuarios`
--
ALTER TABLE `fichas_has_usuarios`
  ADD CONSTRAINT `fk_fichas_has_usuarios_fichas1` FOREIGN KEY (`fichas_num_ficha`) REFERENCES `fichas` (`num_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichas_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_id_instructor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichas_has_usuarios_usuarios2` FOREIGN KEY (`usuarios_id_aprendiz`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_estado_usuario1` FOREIGN KEY (`estado_usuario_id_estado`) REFERENCES `estado_usuario` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
