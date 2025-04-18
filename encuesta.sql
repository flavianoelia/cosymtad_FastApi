-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-04-2025 a las 20:26:49
-- Versión del servidor: 8.0.41-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `nombre` varchar(55) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `dni` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci,
  `docente` int NOT NULL COMMENT 'Clave foranea - id docente',
  `espacio_curricular` int NOT NULL COMMENT 'clave foranea - id espacio curricular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio_curricular`
--

CREATE TABLE `espacio_curricular` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `plan_estudio` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `anio` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8mb3_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int NOT NULL,
  `formulacion` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `tipo` int NOT NULL,
  `opciones` text COLLATE utf8mb3_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int NOT NULL,
  `respuesta` text COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pregunta` text COLLATE utf8mb3_spanish2_ci NOT NULL COMMENT 'clave foranea - id pregunta',
  `encuesta` int NOT NULL COMMENT 'clave foranea - id encuesta',
  `encuestado` varchar(255) COLLATE utf8mb3_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `respuestas_X_docente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `respuestas_X_docente` (
`docente` varchar(312)
,`id` int
,`nombre` varchar(255)
,`pregunta` text
,`respuesta` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `respuestas_X_docente`
--
DROP TABLE IF EXISTS `respuestas_X_docente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`csnweb`@`%` SQL SECURITY DEFINER VIEW `respuestas_X_docente`  AS SELECT `docente`.`id` AS `id`, concat(`docente`.`apellido`,', ',`docente`.`nombre`) AS `docente`, `espacio_curricular`.`nombre` AS `nombre`, `respuestas`.`pregunta` AS `pregunta`, `respuestas`.`respuesta` AS `respuesta` FROM (((`respuestas` join `encuestas`) join `docente`) join `espacio_curricular`) WHERE ((`respuestas`.`encuesta` = `encuestas`.`id`) AND (`encuestas`.`docente` = `docente`.`id`) AND (`encuestas`.`espacio_curricular` = `espacio_curricular`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `espacio_curricular`
--
ALTER TABLE `espacio_curricular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `espacio_curricular`
--
ALTER TABLE `espacio_curricular`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;