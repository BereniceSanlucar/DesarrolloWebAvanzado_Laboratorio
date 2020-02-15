-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-02-2020 a las 03:12:06
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `RadioStations`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Stations`
--

CREATE TABLE `Stations` (
  `stationID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(5) NOT NULL,
  `mountPoint` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Stations`
--

INSERT INTO `Stations` (`stationID`, `username`, `subject`, `date`, `time`, `mountPoint`) VALUES
(2, 'BSANL504', 'David Bowie vs The Cure', '02/13/2020', '16:50', 'http://cf924004.ngrok.io/stream'),
(7, 'IENZ1990', 'Lenguajes de programación desaparecidos', '02/15/2020', '8:00', 'http://pcentaury-dcmrim-html5.esy.es/'),
(15, 'BSANL504', 'The Butterfly Effect', '02/16/2020', '12:30', 'http://159.65.71.139:8000/esanaradio'),
(25, 'BSANL504', 'Accountability', '02/15/2020', '13:00', 'http://maestriaros.sytes.net:8080/radioros'),
(26, 'IENZ1990', 'Adicción a las Redes Sociales', '02/13/2020', '17:35', 'http://192.187.116.210:9300/transmision');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`username`, `email`, `password`) VALUES
('BSANL504', 'bsanlucar504@gmail.com', '$2y$10$kr9slu3E2nST9vUrK2lQuuXB/MrmcGIIU5bvdxXu29VQOOa8W0W96'),
('IENZ1990', 'inevarezz90@gmail.com', '$2y$10$RVmZK/TbMORHwsJJOe.xLuvOvI5RjwGG8m2CvHKHdE9TCuMZ6CiTu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Stations`
--
ALTER TABLE `Stations`
  ADD PRIMARY KEY (`stationID`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Stations`
--
ALTER TABLE `Stations`
  MODIFY `stationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Stations`
--
ALTER TABLE `Stations`
  ADD CONSTRAINT `Stations_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
