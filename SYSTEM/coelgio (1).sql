-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2023 a las 07:32:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coelgio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_alumno`
--

CREATE TABLE `documento_alumno` (
  `docal_id` int(11) NOT NULL,
  `docal_id_estudiante` int(11) DEFAULT NULL,
  `docal_tipo_documento` int(11) DEFAULT NULL,
  `docal_url_documento` varchar(500) NOT NULL,
  `docal_fecha_carga` date DEFAULT NULL,
  `docal_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento_alumno`
--

INSERT INTO `documento_alumno` (`docal_id`, `docal_id_estudiante`, `docal_tipo_documento`, `docal_url_documento`, `docal_fecha_carga`, `docal_status`) VALUES
(1, 2, 3, '24c95e7447c616.sql', '0000-00-00', 1),
(2, 2, 3, '4ace8561e02e76.sql', '0000-00-00', 1),
(3, 2, 3, '671e204e3cb551.sql', '0000-00-00', 1),
(4, 2, 3, 'd362c15e522279.txt', '0000-00-00', 1),
(5, 2, 3, '570162e1e55bd3.txt', '0000-00-00', 1),
(6, 2, 3, '621b4e17e50574.txt', '0000-00-00', 1),
(7, 2, 3, 'e62515b786dbeb.txt', '0000-00-00', 1),
(8, 2, 3, '4125d6ac75e60e.sql', '0000-00-00', 1),
(9, 2, 3, '1756f21e7eb632.txt', '0000-00-00', 1),
(10, 2, 3, '6995e2915f1727.txt', '0000-00-00', 1),
(11, 3, 2, '2c81c4b5a25368.sql', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado_alumno`
--

CREATE TABLE `encargado_alumno` (
  `enal_id` int(11) NOT NULL,
  `enal_id_estudiante` int(11) DEFAULT NULL,
  `enal_nombre_encargado` varchar(250) DEFAULT NULL,
  `enal_rol_encargado` varchar(250) DEFAULT NULL,
  `enal_correo` varchar(250) DEFAULT NULL,
  `enal_telefono` varchar(250) DEFAULT NULL,
  `est_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `est_id` int(11) NOT NULL,
  `est_carne` varchar(255) DEFAULT NULL,
  `est_usuario` int(11) DEFAULT NULL,
  `est_nombre` varchar(250) DEFAULT NULL,
  `est_apellido` varchar(250) DEFAULT NULL,
  `est_fecha_nacimiento` date DEFAULT NULL,
  `est_grado` int(11) DEFAULT NULL,
  `est_seccion` int(11) DEFAULT NULL,
  `est_mail` varchar(500) NOT NULL,
  `est_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`est_id`, `est_carne`, `est_usuario`, `est_nombre`, `est_apellido`, `est_fecha_nacimiento`, `est_grado`, `est_seccion`, `est_mail`, `est_status`) VALUES
(1, 'fdsfdsf', 6, 'student_one', 'apellido', '2000-01-03', 1, 1, 'marcopcstffudenfft3@gmail.com', 2),
(2, '343434', 7, 'Marco Garcia', 'FDSFDS', '0000-00-00', 1, 1, 'FDFDFDF3@gmail.com', 2),
(3, '106320', 8, 'estudiante 1', 'estudiante 2', '0000-00-00', 1, 1, 'estudiante@gmail.com', 2),
(4, '23323', 9, 'Mario', 'Lopez', '0000-00-00', 1, 1, 'mario@gmail.com', 2),
(5, '23323', 10, 'Mario', 'Lopez', '0000-00-00', 1, 1, 'mario2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `grad_id` int(11) NOT NULL,
  `grad_nivel` int(11) DEFAULT NULL,
  `grad_grado` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`grad_id`, `grad_nivel`, `grad_grado`) VALUES
(1, 1, 'primero'),
(2, 2, 'primero'),
(3, 2, 'segundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `niv_id` int(11) NOT NULL,
  `nivel` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`niv_id`, `nivel`) VALUES
(1, 'PRIMARIA'),
(2, 'BASICOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `pag_id` int(11) NOT NULL,
  `pag_estudiante` int(11) DEFAULT NULL,
  `pag_tipo` int(11) DEFAULT NULL,
  `pag_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`pag_id`, `pag_estudiante`, `pag_tipo`, `pag_status`) VALUES
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_detalle`
--

CREATE TABLE `pago_detalle` (
  `pd_id` int(11) NOT NULL,
  `pd_pago` int(11) DEFAULT NULL,
  `pd_boleta_numero` varchar(250) NOT NULL,
  `pd_cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago_detalle`
--

INSERT INTO `pago_detalle` (`pd_id`, `pd_pago`, `pd_boleta_numero`, `pd_cantidad`) VALUES
(1, 1, '10632000', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `per_id` int(11) NOT NULL,
  `per_carne` varchar(255) DEFAULT NULL,
  `per_usuario` int(11) DEFAULT NULL,
  `per_nombre` varchar(250) DEFAULT NULL,
  `per_apellido` varchar(250) DEFAULT NULL,
  `per_fecha_nacimiento` date DEFAULT NULL,
  `per_mail` varchar(500) NOT NULL,
  `per_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_carne`, `per_usuario`, `per_nombre`, `per_apellido`, `per_fecha_nacimiento`, `per_mail`, `per_status`) VALUES
(1, '23243', 18, 'docente pedro', 'docente apellido', '0000-00-00', 'doscentddde23@ddgmail.com', 2),
(2, '2323', 19, 'marco', 'garcia', '0000-00-00', 'maiddddd@gmail.com', 2),
(3, '23243', 20, 'docente pedro', 'docente apellido', '0000-00-00', 'doscentsssddde23@ddgmail.com', 2),
(4, '343434', 21, 'data', 'data', '0000-00-00', 'marta@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `sec_id` int(11) NOT NULL,
  `sec_grado` int(11) DEFAULT NULL,
  `sec_seccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`sec_id`, `sec_grado`, `sec_seccion`) VALUES
(1, 3, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pago`
--

CREATE TABLE `tipos_pago` (
  `tp_id` int(11) NOT NULL,
  `tp_pago` varchar(100) DEFAULT NULL,
  `tp_cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_pago`
--

INSERT INTO `tipos_pago` (`tp_id`, `tp_pago`, `tp_cantidad`) VALUES
(1, 'INSCRIPCION', 1000),
(2, 'MENSUALIDAD', 350);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(250) DEFAULT NULL,
  `usu_apellido` varchar(250) DEFAULT NULL,
  `usu_mail` varchar(500) DEFAULT NULL,
  `usu_password` varchar(600) DEFAULT NULL,
  `usu_rol` int(11) DEFAULT NULL,
  `usu_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_password`, `usu_rol`, `usu_status`) VALUES
(1, 'Marco', 'Garcia', 'marcopc303@gmail.com', '$2y$10$IkBcksFvR9ytv8Vvw5a/VekAh2h2lgQ2ZgEy7tAcyLu9ZhK/qnNFO', 1, 1),
(2, 'student_one', 'apellido', 'marcopcstudent@gmail.com', '$2y$10$o6jfHblUgh/aIKRQjASswOgsw7EEYHpR3jr6eUt6Q/Vbgzs0ItYOq', 4, 1),
(3, 'student_one', 'apellido', 'marcopcstudent2@gmail.com', '$2y$10$Aj2TelloLOkb4PfaTE1Ih.GjKfIlZ10mH.KmVUdyDt0Ro0j0JFzJG', 4, 1),
(4, 'student_one', 'apellido', 'marcopcstudent3@gmail.com', '$2y$10$xwNRPs.f5/5pr.E9RuPeZ.6WdSRkktYIk9oAwMUEOY4bumXllvrke', 4, 1),
(5, 'student_one', 'apellido', 'marcopcstffudent3@gmail.com', '$2y$10$TtY5JHPVn7KF3erOq0k3ue54LF5jbbuEeshwjJvFmYnZMAHAqhePi', 4, 1),
(6, 'student_one', 'apellido', 'marcopcstffudenfft3@gmail.com', '$2y$10$b574/JJ/8xhutHwVs7AiX.83OBH999UzxQ6IQzoiM9Yf3C7QIXC32', 4, 1),
(7, 'Marco Garcia', 'FDSFDS', 'FDFDFDF3@gmail.com', '$2y$10$GBimMwGPS7GCPV8HONLK/uosLH.JAgehcHo4SCfybusx2zTkE4LEO', 4, 1),
(8, 'estudiante 1', 'estudiante 2', 'estudiante@gmail.com', '$2y$10$LKZxNyUHNXknJJxYoM7o8.jy17gAtTHakwcQeYEYeQcblOv4clBgK', 4, 1),
(9, 'Mario', 'Lopez', 'mario@gmail.com', '$2y$10$WiZTaVJEE6NUfu.rc3.aq.e2hoN9c3mHyNshsjpOnI8yrwbQnhA.S', 4, 1),
(10, 'Mario', 'Lopez', 'mario2@gmail.com', '$2y$10$HDXkdG.XSrctd2afkjs8sOqbkJMR/xVLAQcXlEzTnCj8ngahlPBXe', 4, 1),
(11, 'docente pedro', 'docente apellido', 'docente@gmail.com', '$2y$10$glNtiLiee90R.2GGBQ9S8etqhnZj/bQCZjODWck9F4AN5bFkutc8y', 2, 1),
(12, 'docente pedro', 'docente apellido', 'docente3@gmail.com', '$2y$10$Cq1nHz21DTUGgI7fy8A5TeTi7O5HVcxtuFNsULDZMoBt5aewaHYOa', 2, 1),
(13, 'docente pedro', 'docente apellido', 'docente23@gmail.com', '$2y$10$foNHpDjdIDGVJbN47mxMLuXvVZacD49R1fnCnhAHeZKi9plseAWYC', 2, 1),
(14, 'docente pedro', 'docente apellido', 'doscente23@gmail.com', '$2y$10$QUPo/.SIh8sXk1ENaQzN8eLOkdhTIb785lAoz1X9S3trmZF7ZYZ8S', 2, 1),
(15, 'docente pedro', 'docente apellido', 'doscente23@ddgmail.com', '$2y$10$rHYeIeHtU.7xhBa9HO9Uiu/Xp.ahqXmSQit/G83u1AEiihIUmjUri', 2, 1),
(16, 'marco', 'garcia', 'mai@gmail.com', '$2y$10$Wc5Ku9gU/6f445Q8j15tIueuCaJjq0HLPKP.R0y4OlXHPugz57hi.', 2, 1),
(17, 'marco', 'garcia', 'maidd@gmail.com', '$2y$10$F0iov0k5/jYv1XZXxtAwu.Z5AKE/4N9Vxprhxj1.SBgtcEnZbpdPO', 2, 1),
(18, 'docente pedro', 'docente apellido', 'doscentddde23@ddgmail.com', '$2y$10$n.68vfIE/U/OUBw.x8u6COle7roiHbD90Q2AZUeAQkGPziwaQpZf6', 2, 1),
(19, 'marco', 'garcia', 'maiddddd@gmail.com', '$2y$10$cn7wlDGf7ls071yrVrdB8OsUDENfvl.rdC0qTCsmLSBKedVzcPAZK', 2, 1),
(20, 'docente pedro', 'docente apellido', 'doscentsssddde23@ddgmail.com', '$2y$10$8g/vjAJsBwK0c5Tumiids.P897rdHFm7PojDD3aJCCv579nlamYby', 2, 1),
(21, 'data', 'data', 'marta@gmail.com', '$2y$10$uXf4WWsjYLhyp1qBBTcGMe.hqTkClfSt46usQhKr6lV2DIYyL2Utu', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento_alumno`
--
ALTER TABLE `documento_alumno`
  ADD PRIMARY KEY (`docal_id`),
  ADD KEY `docal_id_estudiante` (`docal_id_estudiante`);

--
-- Indices de la tabla `encargado_alumno`
--
ALTER TABLE `encargado_alumno`
  ADD PRIMARY KEY (`enal_id`),
  ADD KEY `enal_id_estudiante` (`enal_id_estudiante`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`est_id`),
  ADD KEY `est_usuario` (`est_usuario`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`grad_id`),
  ADD KEY `grad_nivel` (`grad_nivel`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`niv_id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`pag_id`),
  ADD KEY `pag_estudiante` (`pag_estudiante`);

--
-- Indices de la tabla `pago_detalle`
--
ALTER TABLE `pago_detalle`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pd_pago` (`pd_pago`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `per_usuario` (`per_usuario`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `sec_grado` (`sec_grado`);

--
-- Indices de la tabla `tipos_pago`
--
ALTER TABLE `tipos_pago`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento_alumno`
--
ALTER TABLE `documento_alumno`
  MODIFY `docal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `encargado_alumno`
--
ALTER TABLE `encargado_alumno`
  MODIFY `enal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento_alumno`
--
ALTER TABLE `documento_alumno`
  ADD CONSTRAINT `documento_alumno_ibfk_1` FOREIGN KEY (`docal_id_estudiante`) REFERENCES `estudiantes` (`est_id`);

--
-- Filtros para la tabla `encargado_alumno`
--
ALTER TABLE `encargado_alumno`
  ADD CONSTRAINT `encargado_alumno_ibfk_1` FOREIGN KEY (`enal_id_estudiante`) REFERENCES `estudiantes` (`est_id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`est_usuario`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`grad_nivel`) REFERENCES `nivel` (`niv_id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`pag_estudiante`) REFERENCES `estudiantes` (`est_id`);

--
-- Filtros para la tabla `pago_detalle`
--
ALTER TABLE `pago_detalle`
  ADD CONSTRAINT `pago_detalle_ibfk_1` FOREIGN KEY (`pd_pago`) REFERENCES `pago` (`pag_id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`per_usuario`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`sec_grado`) REFERENCES `grado` (`grad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
