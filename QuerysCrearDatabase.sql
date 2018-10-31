-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2018 a las 17:52:58
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
create database proyecto1eleven;
use proyecto1eleven;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_sala`
--

CREATE TABLE `equipos_sala` (
  `Id_equipo_sala` int(10) NOT NULL,
  `tipo_equipo_sala` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `equipo_sala` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Disponible` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'true',
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos_sala`
--

INSERT INTO `equipos_sala` (`Id_equipo_sala`, `tipo_equipo_sala`, `equipo_sala`, `Disponible`, `descripcion`, `foto`) VALUES
(1, 'Sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades', '../fotos/foto_multidisciplinaria.jpg'),
(2, 'Sala informatica', 'sala', 'true', 'sala para el aprendizaje informático.', '../fotos/foto_informatica.jpg'),
(3, 'Sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades', '../fotos/foto_multidisciplinaria.jpg'),
(4, 'Sala multidisciplinaria', 'sala', 'true', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades.', '../fotos/foto_multidisciplinaria.jpg'),
(5, 'Sala multidisciplinaria', 'sala', 'false', 'sala para hacer yoga, presentaciones, gimnasia y mas actividades.', '../fotos/foto_multidisciplinaria.jpg'),
(6, 'Sala informatica', 'sala', 'true', 'sala para el aprendizaje inform?tico.', '../fotos/foto_informatica.jpg'),
(7, 'Sala de reunion', 'sala', 'true', 'sala perfecta para hacer reuniones de equipos.', '../fotos/foto_reunion.jpg'),
(8, 'Salon de actos', 'sala', 'false', 'Salón para hacer actos para un gran numero de personas', '../fotos/foto_salon_de_actos.jpg'),
(9, 'Despacho para entrevistas', 'sala', 'true', 'despacho perfecto para hacer entrevistas.', '../fotos/foto_despacho_entrevistas.jpg'),
(10, 'Despacho para entrevistas', 'sala', 'true', 'despacho perfecto para hacer entrevistas.\r\n', '../fotos/foto_despacho_entrevistas.jpg'),
(11, 'Taller de cocina', 'sala', 'true', 'taller para realizar el aprendizaje del arte de la cocina', '../fotos/foto_taller_cocina.jpg'),
(12, 'Proyector', 'equipo', 'false', 'proyector portátil para mostrar todos los trabajos de un ordenador.', '../fotos/foto_proyector.jpg'),
(13, 'Proyector', 'equipo', 'true', 'proyector portátil para mostrar todos los trabajos de un ordenador.', '../fotos/foto_proyector.jpg'),
(14, 'Portatil', 'equipo', 'true', 'marca: toshiba <br>\r\nalmacenamiento de memoria: 500 gb <br>\r\nRAM: 4 gb <br>\r\ntarjeta grafica: intel graphics hd <br>\r\nprocesador: i5 4th Gen', '../fotos/foto_portatil.jpg'),
(15, 'Portatil', 'equipo', 'true', 'marca: toshiba <br>\r\nalmacenamiento de memoria: 500 gb <br>\r\nRAM: 4 gb <br>\r\ntarjeta grafica: intel graphics hd <br>\r\nprocesador: i5 4th Gen', '../fotos/foto_portatil.jpg'),
(16, 'Portatil', 'equipo', 'true', 'marca: toshiba <br>\r\nalmacenamiento de memoria: 500 gb <br>\r\nRAM: 4 gb <br>\r\ntarjeta grafica: intel graphics hd <br>\r\nprocesador: i5 4th Gen', '../fotos/foto_portatil.jpg'),
(17, 'Movil', 'equipo', 'true', 'tamaño de pantalla: 6 pulgadas <br>\r\nmemoria de almacenamiento: 16 gb <br>\r\nmemoria ram: 3 gb', '../fotos/foto_movil.jpg'),
(18, 'Movil', 'equipo', 'true', 'tamaño de pantalla: 6 pulgadas <br>\r\nmemoria de almacenamiento: 16 gb <br>\r\nmemoria ram: 3 gb', '../fotos/foto_movil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `Id_incidencias` int(10) NOT NULL,
  `id_sala` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `resuelta` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`Id_incidencias`, `id_sala`, `id_usuario`, `titulo`, `descripcion`, `resuelta`) VALUES
(3, 14, 7, 'El portatil no funciona correctamente', 'Como bien describo en el campo titulo, el portatil no quiere funcionar, ya que es una persona totalmente dotada de razon y se niega a trabajar', 'true'),
(4, 4, 8, 'Sala desordenada', 'Unos vandalos se colaron dentro de la sala con sus vastagos y se dedicaron a hacer travesuras y desordenar la sala al grito de \"VITAS ES EL MEJOR!\"', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(10) NOT NULL,
  `Nombre_Usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Contra_Usu` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TipoUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Basico'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Nombre_Usuario`, `Contra_Usu`, `TipoUsuario`) VALUES
(6, 'Eric', '1234', 'Basico'),
(7, 'Adri', '1234', 'Basico'),
(8, 'Dani', '1234', 'Administrador');

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
-- Volcado de datos para la tabla `usuario_equipo_sala`
--

INSERT INTO `usuario_equipo_sala` (`Id_usu_equipo_sala`, `id_usuario`, `id_equipo`, `fecha_ini`, `fecha_fin`) VALUES
(4, 7, 1, '2018-10-30 16:02:31', '2018-10-30 20:33:08'),
(17, 7, 3, '2018-10-30 16:23:02', '2018-10-31 17:26:47'),
(18, 6, 2, '2018-10-30 16:48:20', '2018-10-31 17:31:02'),
(19, 6, 6, '2018-10-30 16:53:17', '2018-10-31 17:31:05'),
(20, 6, 12, '2018-10-30 17:43:38', '2018-10-31 17:31:09'),
(21, 6, 4, '2018-10-30 18:00:01', '2018-10-31 17:31:13'),
(27, 7, 1, '2018-10-30 20:42:31', '2018-10-30 20:42:35'),
(28, 6, 1, '2018-10-31 17:31:40', '2018-10-31 17:31:43'),
(29, 6, 1, '2018-10-31 17:35:23', '2018-10-31 17:35:34'),
(30, 7, 12, '2018-10-31 17:43:20', NULL),
(31, 6, 1, '2018-10-31 17:47:11', '2018-10-31 17:47:14'),
(32, 6, 8, '2018-10-31 17:47:23', NULL);

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
  MODIFY `Id_equipo_sala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `Id_incidencias` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_equipo_sala`
--
ALTER TABLE `usuario_equipo_sala`
  MODIFY `Id_usu_equipo_sala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
