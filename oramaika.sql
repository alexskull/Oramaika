-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2015 a las 14:19:46
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `oramaika`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banca`
--

CREATE TABLE IF NOT EXISTS `banca` (
  `numero` int(16) NOT NULL,
  `banco` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desti`
--

CREATE TABLE IF NOT EXISTS `desti` (
`id_desti` int(15) NOT NULL,
  `Fk_desti_promo` int(15) NOT NULL,
  `nom_desti` varchar(30) NOT NULL,
  `precio_desti` int(10) NOT NULL,
  `estado_desti` varchar(20) NOT NULL,
  `desp_desti` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `desti`
--

INSERT INTO `desti` (`id_desti`, `Fk_desti_promo`, `nom_desti`, `precio_desti`, `estado_desti`, `desp_desti`) VALUES
(1, 3, 'Cayo Muerto', 700, 'Disponible', ''),
(2, 1, 'Cayo Pelon', 850, 'Disponible', ''),
(3, 3, 'Cayo Pereaza', 560, 'Disponible', ''),
(4, 2, 'Cayo Sal', 900, 'Disponible', ''),
(5, 1, 'Cayo Sombrero', 470, 'Disponible', ''),
(6, 1, 'Cayo Varadero', 660, 'No Disponible', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanc`
--

CREATE TABLE IF NOT EXISTS `lanc` (
`id_lanc` int(15) NOT NULL,
  `nom_lanc` varchar(30) NOT NULL,
  `lanchero` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `Desp_lanc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lanc`
--

INSERT INTO `lanc` (`id_lanc`, `nom_lanc`, `lanchero`, `estado`, `Desp_lanc`) VALUES
(1, 'Oramaika', 'Luis Gustavo Vivas', 'Activo', NULL),
(2, 'Juliet del Mar', 'Marcos Salcedo ', 'Acivo', NULL),
(3, 'Virgen del Valle', 'Juan Jose Amador', 'Activo', NULL),
(4, 'Los Caminos', 'Diego Segoviano ', 'Activo', NULL),
(5, 'Santa Maria', 'Ivan Marquez', 'Activo', NULL),
(6, 'Canaima', 'Anderson Contreras', 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id_pa` int(15) NOT NULL,
  `fk_pa_reser` varchar(20) NOT NULL,
  `monto` int(5) NOT NULL,
  `num_deposito` int(20) NOT NULL,
  `banco` varchar(45) NOT NULL,
  `Fecha_deposito` date NOT NULL,
  `desp_pa` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pa`, `fk_pa_reser`, `monto`, `num_deposito`, `banco`, `Fecha_deposito`, `desp_pa`) VALUES
(2, '81145517f4', 700, 987654321, 'Banco de Venezuela', '2015-02-20', ''),
(3, '7ac0d6f2a7', 700, 123456789, 'Banesco', '2015-02-20', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasa`
--

CREATE TABLE IF NOT EXISTS `pasa` (
`id_pasa` int(15) NOT NULL,
  `fk_reserva` varchar(20) NOT NULL,
  `cedula_pasa` int(14) DEFAULT NULL,
  `nom_pasa` varchar(30) NOT NULL,
  `apellido_pasa` varchar(30) NOT NULL,
  `tipo_pasa` varchar(15) NOT NULL,
  `desp_pasa` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasa`
--

INSERT INTO `pasa` (`id_pasa`, `fk_reserva`, `cedula_pasa`, `nom_pasa`, `apellido_pasa`, `tipo_pasa`, `desp_pasa`) VALUES
(53, '4fdabf3e20', 20516686, 'Domingo', 'Hernandez', 'Adulto', ''),
(54, '4fdabf3e20', 20408842, 'Kelly', 'Hernandez', 'Adulto', ''),
(55, '4fdabf3e20', 0, 'Alejandro', 'Hernandez', 'Preferencial', ''),
(62, 'a120cbe81a', 20516686, 'Domingo', 'Hernandez', 'Adulto', ''),
(63, 'a120cbe81a', 20408842, 'Kelly', 'Hernandez', 'Adulto', ''),
(64, 'a120cbe81a', 0, 'Jose', 'Bracho', 'Preferencial', ''),
(65, 'e7fdeae58b', 20516686, 'Domingo', 'Hernandez', 'Adulto', ''),
(66, 'e7fdeae58b', 20408842, 'wdawda', 'Nananan', 'Adulto', ''),
(67, 'e7fdeae58b', 0, 'Jesus', 'De chambery', 'Preferencial', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
`id_promo` int(15) NOT NULL,
  `nom_promo` varchar(30) NOT NULL,
  `fec_ini_promo` date DEFAULT NULL,
  `fec_fin_promo` date DEFAULT NULL,
  `desp_promo` varchar(300) DEFAULT NULL,
  `PorcentajeDes` varchar(4) DEFAULT NULL,
  `estado_promo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promo`
--

INSERT INTO `promo` (`id_promo`, `nom_promo`, `fec_ini_promo`, `fec_fin_promo`, `desp_promo`, `PorcentajeDes`, `estado_promo`) VALUES
(1, 'Sin promocion', NULL, NULL, NULL, NULL, 'Inactivo'),
(2, 'Semana Santa Cayo SAL', '2015-04-01', '2015-04-05', 'Descuento en todo nuestros servicios valido para semana santa', '10%', 'Activo'),
(3, 'Madres en los cayos', '2015-05-01', '2015-05-17', 'Descuento en viajes en el mes de las madres como regalo en su dia', '40%', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `fk_viaje_res` int(15) NOT NULL,
  `fk_usua_res` int(15) NOT NULL,
  `fk_desti_res` int(15) NOT NULL,
  `fecha_viaje` date NOT NULL,
  `fecha_operacion` date NOT NULL,
  `cant_ninos` int(5) DEFAULT NULL,
  `cant_adultos` int(5) DEFAULT NULL,
  `estatus` varchar(15) DEFAULT NULL,
  `Nlocalizador` varchar(20) NOT NULL,
  `desp_res` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`fk_viaje_res`, `fk_usua_res`, `fk_desti_res`, `fecha_viaje`, `fecha_operacion`, `cant_ninos`, `cant_adultos`, `estatus`, `Nlocalizador`, `desp_res`) VALUES
(4, 18991815, 1, '2015-02-26', '2015-02-19', 1, 2, 'Iniciado', '4fdabf3e20', NULL),
(4, 20516686, 1, '2015-02-27', '2015-02-20', 1, 2, 'Iniciado', 'a120cbe81a', NULL),
(4, 20516686, 1, '2015-02-27', '2015-02-20', 1, 2, 'Iniciado', 'e7fdeae58b', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usua`
--

CREATE TABLE IF NOT EXISTS `usua` (
  `id_ci` int(13) NOT NULL,
  `nom_usa` varchar(25) NOT NULL,
  `ape_usa` varchar(25) NOT NULL,
  `tel_hab_usa` varchar(15) NOT NULL,
  `tel_cel_usa` varchar(15) DEFAULT NULL,
  `fecha_reg_usa` date NOT NULL,
  `fecha_nac_usa` date NOT NULL,
  `email_usa` varchar(45) NOT NULL,
  `pass_usa` varchar(10) NOT NULL,
  `direc_usa` varchar(255) NOT NULL,
  `desp_usa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usua`
--

INSERT INTO `usua` (`id_ci`, `nom_usa`, `ape_usa`, `tel_hab_usa`, `tel_cel_usa`, `fecha_reg_usa`, `fecha_nac_usa`, `email_usa`, `pass_usa`, `direc_usa`, `desp_usa`) VALUES
(18991815, 'yonathan', 'rivas jimenez', '02763431695', '04247149824', '2015-02-12', '1985-07-14', 'foskert@gmail.com', 'mnbvcxz', 'ryt7uyiu derty sdfg', 'usuario normal'),
(20408842, 'Kelly', 'Hernandez', '04169752961', '', '0000-00-00', '1990-02-22', 'kelly@gmail.com', '20516686', 'Tachira San Cristobal Paramillo', NULL),
(20516686, 'Domingo Alejandro', 'Hernandez Hernandez', '02763421915', '04143759863', '0000-00-00', '1991-02-15', 'domingoskull3@gmail.com', '20516686', 'TAchira San Cristobal Santa Teresa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
`id_viaje` int(15) NOT NULL,
  `fk__lanc_viaje` int(15) NOT NULL,
  `fk_desti_viaje` int(15) NOT NULL,
  `hora_salida` varchar(15) NOT NULL,
  `hora_retorno` varchar(15) NOT NULL,
  `estatus_viaje` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `fk__lanc_viaje`, `fk_desti_viaje`, `hora_salida`, `hora_retorno`, `estatus_viaje`) VALUES
(1, 2, 2, '10:00 am', '2:00 pm', 'Activo'),
(2, 1, 5, '11:30 am', '3:30 pm', 'Activo'),
(3, 6, 5, '12:00 pm', '5:00 pm', 'Activo'),
(4, 1, 1, '9:00 am ', '3:00 pm', 'Activo'),
(5, 6, 5, '12:00 pm', '5:00 pm', 'Activo'),
(6, 1, 1, '9:00 am ', '3:00 pm', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banca`
--
ALTER TABLE `banca`
 ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `desti`
--
ALTER TABLE `desti`
 ADD PRIMARY KEY (`id_desti`);

--
-- Indices de la tabla `lanc`
--
ALTER TABLE `lanc`
 ADD PRIMARY KEY (`id_lanc`), ADD UNIQUE KEY `nom_lanc` (`nom_lanc`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`id_pa`), ADD UNIQUE KEY `num_deposito` (`num_deposito`);

--
-- Indices de la tabla `pasa`
--
ALTER TABLE `pasa`
 ADD PRIMARY KEY (`id_pasa`);

--
-- Indices de la tabla `promo`
--
ALTER TABLE `promo`
 ADD PRIMARY KEY (`id_promo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`Nlocalizador`), ADD UNIQUE KEY `Nlocalizador` (`Nlocalizador`);

--
-- Indices de la tabla `usua`
--
ALTER TABLE `usua`
 ADD PRIMARY KEY (`id_ci`), ADD UNIQUE KEY `email_usa` (`email_usa`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
 ADD PRIMARY KEY (`id_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desti`
--
ALTER TABLE `desti`
MODIFY `id_desti` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `lanc`
--
ALTER TABLE `lanc`
MODIFY `id_lanc` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id_pa` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pasa`
--
ALTER TABLE `pasa`
MODIFY `id_pasa` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `promo`
--
ALTER TABLE `promo`
MODIFY `id_promo` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
MODIFY `id_viaje` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
