-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-01-2023 a las 00:14:12
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baseaulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `usuario` varchar(10) NOT NULL,
  `contrasenia` varchar(10) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario`, `contrasenia`, `id`) VALUES
('admin', 'user', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `nombre` text NOT NULL,
  `codigo_aula` varchar(10) NOT NULL,
  `codigo_edificio` varchar(10) NOT NULL,
  `capacidad` int NOT NULL,
  PRIMARY KEY (`codigo_aula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`nombre`, `codigo_aula`, `codigo_edificio`, `capacidad`) VALUES
('Sala de idiomas', 'LNGUA-SLA', 'EC-PLA', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `clave_carrera` varchar(10) NOT NULL,
  `nombre_carrera` text NOT NULL,
  PRIMARY KEY (`clave_carrera`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`clave_carrera`, `nombre_carrera`) VALUES
('ISC-1001', 'Ingenieria en Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `materia` varchar(10) NOT NULL,
  `profesor` varchar(10) NOT NULL,
  `codigo_aula` varchar(10) NOT NULL,
  `clave_grupo` varchar(10) NOT NULL,
  `periodo` text NOT NULL,
  `dia` text NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`materia`, `profesor`, `codigo_aula`, `clave_grupo`, `periodo`, `dia`, `hora_entrada`, `hora_salida`, `id`) VALUES
('Sis-Op', 'RBT-ZMD', 'LNGUA-SLA', '703-A', 'AGO-DIC-22', 'Martes', '09:00:00', '11:00:00', 1),
('Sis-Op', 'FDR-MTZ', 'LNGUA-SLA', '703-A', 'AGO-DIC-22', 'Lunes', '07:00:00', '09:00:00', 2),
('PRG-LOG', 'RBT-ZMD', 'LNGUA-SLA', '703-A', 'AGO-DIC-22', 'Miercoles', '15:00:00', '17:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

DROP TABLE IF EXISTS `dias`;
CREATE TABLE IF NOT EXISTS `dias` (
  `dia_semana` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`dia_semana`) VALUES
('Lunes'),
('Martes'),
('Miercoles'),
('Jueves'),
('Viernes'),
('Sabado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `clave_docente` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `edad` int NOT NULL,
  `correo` varchar(24) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  PRIMARY KEY (`clave_docente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`clave_docente`, `nombre`, `edad`, `correo`, `hora_entrada`, `hora_salida`) VALUES
('RBT-ZMD', 'Roberto Zamudio Portilla', 42, 'rbt-zmds@gmail.com', '07:00:00', '13:00:00'),
('FDR-MTZ', 'Federico Martinez Galan', 43, 'federicoMtz@gmail.com', '11:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

DROP TABLE IF EXISTS `edificios`;
CREATE TABLE IF NOT EXISTS `edificios` (
  `clave` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `piso` varchar(10) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`clave`, `nombre`, `piso`) VALUES
('EC-PLA', 'Edificio C', 'Planta-A'),
('EC-PLB', 'Edificio C', 'Planta-B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

DROP TABLE IF EXISTS `eventoscalendar`;
CREATE TABLE IF NOT EXISTS `eventoscalendar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`id`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`) VALUES
(59, 'Revision De Proyecto', '#2196F3', '2023-01-10', '2023-01-11'),
(60, 'Anio Nuevo', '#8BC34A', '2022-12-31', '2023-01-01'),
(61, 'Entrega De Documentos Residencia', '#9c27b0', '2023-01-18', '2023-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `clave_grupo` varchar(10) NOT NULL,
  `clave_carrera` varchar(10) NOT NULL,
  `numero_alumno` int NOT NULL,
  `periodo_grupo` text NOT NULL,
  PRIMARY KEY (`clave_grupo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`clave_grupo`, `clave_carrera`, `numero_alumno`, `periodo_grupo`) VALUES
('703-A', 'ISC-1001', 30, 'AGO-DIC-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

DROP TABLE IF EXISTS `horas`;
CREATE TABLE IF NOT EXISTS `horas` (
  `inicio` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`inicio`) VALUES
('07:00:00'),
('08:00:00'),
('09:00:00'),
('10:00:00'),
('11:00:00'),
('12:00:00'),
('13:00:00'),
('16:00:00'),
('18:00:00'),
('15:00:00'),
('17:00:00'),
('14:00:00'),
('19:00:00'),
('20:00:00'),
('21:00:00'),
('22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `clave_materia` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `clave_carrera` varchar(10) NOT NULL,
  PRIMARY KEY (`clave_materia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`clave_materia`, `nombre`, `clave_carrera`) VALUES
('Sis-Op', 'Sistemas opertivos', 'ISC-1001'),
('CLT-EMP', 'Cultura Empresarial', 'ISC-1001'),
('PRG-LOG', 'Programacion Logica y Funcional', 'ISC-1001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

DROP TABLE IF EXISTS `periodo`;
CREATE TABLE IF NOT EXISTS `periodo` (
  `nombre` text NOT NULL,
  `periodo_inicio` date NOT NULL,
  `periodo_fin` date NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`nombre`, `periodo_inicio`, `periodo_fin`, `id`) VALUES
('AGO-DIC-22', '2022-08-15', '2022-12-15', 1),
('rtut4yu', '2023-01-02', '2023-01-28', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_docentes`
--

DROP TABLE IF EXISTS `usuarios_docentes`;
CREATE TABLE IF NOT EXISTS `usuarios_docentes` (
  `nickname_docente` varchar(10) NOT NULL,
  `password_docente` varchar(10) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios_docentes`
--

INSERT INTO `usuarios_docentes` (`nickname_docente`, `password_docente`, `id`) VALUES
('admin', 'user', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estudiante`
--

DROP TABLE IF EXISTS `usuarios_estudiante`;
CREATE TABLE IF NOT EXISTS `usuarios_estudiante` (
  `nickname` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios_estudiante`
--

INSERT INTO `usuarios_estudiante` (`nickname`, `password`, `id`) VALUES
('185q0178', '185q0178', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
