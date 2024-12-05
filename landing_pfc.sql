-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2024 a las 14:16:23
-- Versión del servidor: 10.5.17-MariaDB-log
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ial_dblanding`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `landing_pfc`
--

CREATE TABLE IF NOT EXISTS `landing_pfc` (
  `id` bigint(11) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `curso_id` varchar(5) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `landing_pfc`
--

INSERT INTO `landing_pfc` (`id`, `dni`, `curso_id`) VALUES
(1, '72062737', '1'),
(2, '75260787', '1'),
(3, '73591144', '1'),
(4, '40056583', '1'),
(5, '48325595', '1'),
(6, '75780097', '1'),
(7, '46748627', '1'),
(8, '10019726', '1'),
(9, '61214790', '1'),
(10, '41499613', '1'),
(11, '7982004', '2'),
(12, '80603825', '2'),
(13, '73285768', '1'),
(14, '45801738', '1'),
(15, '76027872', '1'),
(16, '77671954', '1'),
(17, '71908496', '1'),
(18, '75346533', '1'),
(19, '47638863', '1'),
(20, '43198261', '1'),
(21, '45516227', '1'),
(22, '73944702', '1'),
(23, '41641481', '1'),
(24, '73298624', '2'),
(25, '9545776', '2'),
(26, '9759479', '1'),
(27, '78720228', '1'),
(28, '74877141', '1'),
(29, '3784753', '2'),
(30, '74733312', '1'),
(31, '73626805', '1'),
(32, '48010605', '1'),
(33, '70442036', '1'),
(34, '71165046', '1'),
(35, '72327265', '1'),
(36, '74063985', '1'),
(37, '78717836', '1'),
(38, '72567037', '1'),
(39, '10241025', '1'),
(40, '46362869', '1'),
(41, '75351031', '1'),
(42, '73451501', '1'),
(43, '74846083', '1'),
(44, '47786039', '1'),
(45, '6409518', '1'),
(46, '45012546', '1'),
(47, '77229421', '1'),
(48, '40156690', '1'),
(49, '72809519', '1'),
(50, '60183000', '1'),
(51, '76019998', '1'),
(52, '76170020', '1'),
(53, '7648949', '1'),
(54, '10251742', '1'),
(55, '75967800', '1'),
(56, '40792618', '1'),
(57, '6930398', '1'),
(58, '47158369', '1'),
(59, '45785314', '1'),
(60, '73479268', '1'),
(61, '9792625', '1'),
(62, '75351032', '1'),
(63, '72726199', '1'),
(64, '70800608', '2'),
(65, '60683342', '1'),
(66, '78817107', '1'),
(67, '76121681', '1'),
(68, '70458335', '1'),
(69, '48538278', '1'),
(70, '70932733', '1'),
(71, '77478044', '1'),
(72, '40188180', '1'),
(73, '9693213', '1'),
(74, '40606280', '1'),
(75, '43753557', '1'),
(76, '74916342', '1'),
(77, '42752153', '1'),
(78, '40182145', '1'),
(79, '60876497', '1'),
(80, '40107450', '1'),
(81, '75588049', '1'),
(82, '25683946', '2'),
(83, '10032177', '1'),
(84, '45976199', '1'),
(85, '6580309', '1'),
(86, '6673147', '2'),
(87, '46895494', '1'),
(88, '76939372', '1'),
(89, '77225751 ', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `landing_pfc`
--
ALTER TABLE `landing_pfc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `landing_pfc`
--
ALTER TABLE `landing_pfc`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;