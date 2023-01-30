-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-01-2023 a las 00:14:31
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
-- Base de datos: `horarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario703-a`
--

DROP TABLE IF EXISTS `horario703-a`;
CREATE TABLE IF NOT EXISTS `horario703-a` (
  `Hora` time NOT NULL,
  `Lunes` text NOT NULL,
  `Martes` text NOT NULL,
  `Miercoles` text NOT NULL,
  `Jueves` text NOT NULL,
  `Viernes` text NOT NULL,
  `Sabado` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `horario703-a`
--

INSERT INTO `horario703-a` (`Hora`, `Lunes`, `Martes`, `Miercoles`, `Jueves`, `Viernes`, `Sabado`) VALUES
('09:00:00', '', 'Sis-Op	RBT-ZMD	LNGUA-SLA	703-A', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
