-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 26-07-2023 a las 13:53:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `breathe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codigo` varchar(7) NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo`, `lugar`, `categoria`) VALUES
('0000001', 'Parque Infantil La Castellana', 'Parque'),
('0000002', 'Parque La Matea', 'Parque'),
('0000003', 'Parque Éxito Laureles', 'CentroComercial'),
('0000004', 'Jardin de los Laureles', 'CentroComercial'),
('0000005', 'Segundo Parque de los Laureles', 'Parque'),
('0000006', 'Parque La Floresta', 'Parque'),
('0000007', 'Parque Monumento Trabajo', 'Parque'),
('0000008', 'Parque Ejercitate', 'Ejercicio'),
('0000008', 'Parque Ejercitate', 'Parque'),
('0000009', 'Piscina Colegio Corazonista', 'Piscina'),
('0000010', 'Piscina los alcázares', 'Piscina'),
('0000011', 'Fisioline Salud y Belleza', 'Spa'),
('0000012', 'Viva Spa', 'Spa'),
('0000013', 'Terapias de Relajacion', 'Spa'),
('0000014', 'Azul Natural SPA', 'Spa'),
('0000015', 'Mahut Nails Spa', 'Spa'),
('0000016', 'Alma Santa Spa', 'Spa'),
('0000017', 'Amatsu Spa', 'Spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `fecha` datetime NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `texto` varchar(300) NOT NULL,
  `grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`fecha`, `usuario`, `texto`, `grupo`) VALUES
('2023-07-26 14:30:12', 'verde', 'Como han estado?', 1),
('2023-07-26 14:30:17', 'jorge', 'Bien y usted?', 1),
('2023-07-26 14:30:30', 'jorge', 'Bienvenidos a este chat', 2),
('2023-07-26 14:30:33', 'jorge', 'esto se creo con el proposito de hablar sobre la importancia de la relajacion, ademas quiero discutir como convatirlo a ver si me ayudan', 2),
('2023-07-25 19:10:33', 'jorge', 'hola mundo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `codigo` varchar(7) NOT NULL,
  `latitud` varchar(25) NOT NULL,
  `longitud` varchar(25) NOT NULL,
  `lugar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`codigo`, `latitud`, `longitud`, `lugar`) VALUES
('0000001', '6.241233061566830', '-75.60308422533520', 'Parque Infantil La Castellana'),
('0000002', '6.24182179869563', '-75.60150194532530', 'Parque La Matea'),
('0000003', '6.24620467306091', '-75.60293403405280', 'Parque Éxito Laureles'),
('0000004', '6.246534048221480', '-75.60053932301980', 'Jardin de los Laureles'),
('0000005', '6.24496024529050', '-75.59707473488050', 'Segundo Parque de los Laureles'),
('0000006', '6.255752458557600', '-75.60152743635880', 'Parque La Floresta'),
('0000007', '6.236474550963430', '-75.60304972130630', 'Parque Monumento Trabajo'),
('0000008', '6.248458315320330', '-75.60482350851640', 'Parque para hacer ejercicio'),
('0000009', '6.242861246325680', '-75.60648553412730', 'Piscina Colegio Corazonista'),
('0000010', '6.259572660312340', '-75.60584710630640', 'Piscina los alcázares'),
('0000011', '6.244320266147450', '-75.60310549336070', 'Fisioline Salud y Belleza'),
('0000012', '6.244849269002670', '-75.60500365099020', 'Viva Spa'),
('0000013', '6.24518515445840', '-75.6063830455016', 'Terapias de Relajacion'),
('0000014', '6.243570966752350', '-75.60021508079660', 'Azul Natural SPA'),
('0000015', '6.242461721576880', '-75.60004153579740', 'Mahut Nails Spa'),
('0000016', '6.24167312118645', '-75.6003839825352', 'Alma Santa Spa'),
('0000017', '6.241298897163120', '-75.60035925662930', 'Amatsu Spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `imagen` longblob NOT NULL,
  `fecha_registro` date NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `tema` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `imagen`, `fecha_registro`, `nombre`, `correo`, `usuario`, `clave`, `descripcion`, `tema`) VALUES
(1, '', '2023-07-05', 'Jorge', 'jorgeandru2007@gmail.com', 'verde', 'verde', NULL, NULL),
(2, '', '2023-07-23', 'Jorge', 'jorgeandru2007@gmail.com', 'jorge', '#Jandru2007', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
