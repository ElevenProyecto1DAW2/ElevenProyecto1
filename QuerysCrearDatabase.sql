-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2018 a las 16:35:36
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto1eleven`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_sala`
--

CREATE TABLE `equipos_sala` (
  `Id_equipo_sala` int(10) NOT NULL,
  `tipo_equipo_sala` varchar(25) NOT NULL,
  `equipo_sala` varchar(10) NOT NULL,
  `Disponible` varchar(5) NOT NULL DEFAULT 'true',
  `descripcion` varchar(255) DEFAULT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos_sala`
--

INSERT INTO `equipos_sala` (`Id_equipo_sala`, `tipo_equipo_sala`, `equipo_sala`, `Disponible`, `descripcion`, `foto`) VALUES
(1, 'Sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades', ''),
(2, 'sala informatica', 'sala', 'true', 'sala para el aprendizaje informático.', ''),
(3, 'sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades', ''),
(4, 'sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades.', ''),
(5, 'sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades.', ''),
(6, 'sala informatica', 'sala', 'true', 'sala para el aprendizaje informático.', ''),
(7, 'sala de reunion', 'sala', 'true', 'sala perfecta para hacer reuniones de equipos.', ''),
(8, 'salón de actos', 'sala', 'true', 'Salón para hacer actos para un gran numero de personas', ''),
(9, 'despacho para entrevistas', 'sala', 'true', 'despacho perfecto para hacer entrevistas.', ''),
(10, 'despacho para entrevistas', 'sala', 'true', 'despacho perfecto para hacer entrevistas.\r\n', ''),
(11, 'taller de cocina', 'sala', 'true', 'taller para realizar el aprendizaje del arte de la cocina', ''),
(12, 'proyector', 'equipo', 'true', 'proyector portátil para mostrar todos los trabajos de un ordenador.', ''),
(13, 'proyector', 'equipo', 'true', 'proyector portátil para mostrar todos los trabajos de un ordenador.', ''),
(14, 'portátil', 'equipo', 'true', 'marca: toshiba\r\nalmacenamiento de memoria: 500 gb\r\nRAM: 4 gb\r\ntarjeta grafica: intel graphics hd\r\nprocesador: i5 4th Gen', ''),
(15, 'portátil', 'equipo', 'true', 'marca: toshiba\r\nalmacenamiento de memoria: 500 gb\r\nRAM: 4 gb\r\ntarjeta grafica: intel graphics hd\r\nprocesador: i5 4th Gen', ''),
(16, 'portátil', 'equipo', 'true', 'marca: toshiba\r\nalmacenamiento de memoria: 500 gb\r\nRAM: 4 gb\r\ntarjeta grafica: intel graphics hd\r\nprocesador: i5 4th Gen', ''),
(17, 'móvil', 'equipo', 'true', 'tamaño de pantalla: 6 pulgadas\r\nmemoria de almacenamiento: 16 gb\r\nmemoria ram: 3 gb', ''),
(18, 'móvil', 'equipo', 'true', 'tamaño de pantalla: 6 pulgadas\r\nmemoria de almacenamiento: 16 gb\r\nmemoria ram: 3 gb', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `Id_incidencias` int(10) NOT NULL,
  `id_sala` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`Id_incidencias`, `id_sala`, `id_usuario`, `titulo`, `descripcion`) VALUES
(1, 1, 8, 'sala sucia', 'esta sucia hay que limpiarla'),
(2, 13, 6, 'proyector roto', 'se ha caido el proyector y se ha caido ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(10) NOT NULL,
  `Nombre_Usuario` varchar(20) NOT NULL,
  `Contra_Usu` varchar(20) NOT NULL,
  `TipoUsuario` varchar(20) NOT NULL DEFAULT 'Basico'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Nombre_Usuario`, `Contra_Usu`, `TipoUsuario`) VALUES
(6, 'Eric', '1234', 'Basico'),
(7, 'Adri', '1234', 'Basico'),
(8, 'Dani', '1234', 'Basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_equipo_sala`
--

CREATE TABLE `usuario_equipo_sala` (
  `Id_usu_equipo_sala` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `id_equipo` int(10) NOT NULL,
  `fecha_ini` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos_sala`
--
ALTER TABLE `equipos_sala`
  ADD PRIMARY KEY (`Id_equipo_sala`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`Id_incidencias`),
  ADD KEY `usuIncidencias_FK` (`id_usuario`),
  ADD KEY `equiposalaIncidencias_FK` (`id_sala`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- Indices de la tabla `usuario_equipo_sala`
--
ALTER TABLE `usuario_equipo_sala`
  ADD PRIMARY KEY (`Id_usu_equipo_sala`),
  ADD KEY `UsuEquipoSala_FK` (`id_usuario`),
  ADD KEY `usuEquipoSalados_FK` (`id_equipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_sala`
--
ALTER TABLE `equipos_sala`
  MODIFY `Id_equipo_sala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `Id_incidencias` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_equipo_sala`
--
ALTER TABLE `usuario_equipo_sala`
  MODIFY `Id_usu_equipo_sala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `equiposalaIncidencias_FK` FOREIGN KEY (`id_sala`) REFERENCES `equipos_sala` (`Id_equipo_sala`),
  ADD CONSTRAINT `usuIncidencias_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `usuario_equipo_sala`
--
ALTER TABLE `usuario_equipo_sala`
  ADD CONSTRAINT `UsuEquipoSala_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `Usuequipo_sala_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `usuEquipoSalados_FK` FOREIGN KEY (`id_equipo`) REFERENCES `equipos_sala` (`Id_equipo_sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
