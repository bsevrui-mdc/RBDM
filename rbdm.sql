-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2025 a las 17:53:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rbdm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `texto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `id_usuario`, `id_contenido`, `texto`) VALUES
(1, 9, 1, 'Hola, gran serie'),
(5, 1, 7, 'Gran pelicula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `nota` float NOT NULL,
  `sinopsis` longtext NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `reparto` longtext NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `nombre`, `tipo`, `genero`, `nota`, `sinopsis`, `imagen`, `video`, `reparto`, `fecha`) VALUES
(1, 'La Casa de Papel', 'Serie', 'Accion ', 10, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/Series/la_casa_de_papel.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(2, 'Descarrilados', 'Pelicula', 'Comedia', 10, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/peliculas/descarrilados.png', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(3, 'Interstellar', 'Pelicula', 'Accion', 9, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/peliculas/interstellar.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(4, 'Chucky', 'Pelicula', 'Terror', 9, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/peliculas/chucky.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(5, 'Padre no hay mas que uno', 'Pelicula', 'Comedia', 9, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/peliculas/padre.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(6, 'Breaking Bad', 'Serie', 'Accion', 10, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/Series/breaking-bad.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(7, 'From', 'Serie', 'Terror', 9, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/Series/from_netflix.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(8, 'La que se avecina', 'Serie', 'Comedia', 9, 'Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.', 'assets/img/Series/Lqsa.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2017-05-02'),
(9, 'El Profesor', 'Serie', 'Drama', 8, 'La historia del líder detrás del mayor atraco de España.', 'assets/img/Series/profesor.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(10, 'El Gran Golpe', 'Película', 'Acción', 8, 'Un equipo de expertos en robos intenta ejecutar el atraco perfecto.', 'assets/img/peliculas/grangolpe.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(11, 'Huyendo del Pasado', 'Serie', 'Suspense', 7, 'Un fugitivo se esconde tras un plan maestro para robar un banco.', 'assets/img/Series/huyendo.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(12, 'El Orfanato', 'Película', 'Terror', 8, 'Una madre regresa a su antiguo orfanato donde comienzan a suceder eventos extraños.', 'assets/img/peliculas/orfanato.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(13, 'Exploradores del Tiempo', 'Película', 'Aventura', 7, 'Un grupo de amigos viaja en el tiempo para corregir un error histórico.', 'assets/img/peliculas/exploradores.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(14, 'Operación Risotada', 'Serie', 'Comedia', 8, 'Un equipo de ladrones ineptos intenta realizar un gran atraco con hilarantes consecuencias.', 'assets/img/Series/risotada.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(15, 'La Maldición del Banco', 'Película', 'Terror', 7, 'Después de un robo, los asaltantes son perseguidos por una entidad maligna dentro del banco.', 'assets/img/peliculas/maldicion.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05'),
(16, 'Los Pequeños Ladrones', 'Película', 'Infantil', 8, 'Un grupo de niños planea recuperar los juguetes que les fueron robados.', 'assets/img/peliculas/pequenosladrones.jpg', 'assets/video/video.mp4', 'Alvaro Morte-Ursula Corbero-Pedro Alonso-Jaime Lorente-Itziar Ituño-Miguel Herran-Alex Pina', '2025-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `id_contenido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nota` float NOT NULL,
  `estado` set('ptw','watching','dropped','on-hold','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_contenido`, `id_usuario`, `nota`, `estado`) VALUES
(1, 1, 10, 'completed'),
(1, 9, 9, 'on-hold'),
(2, 9, 9, 'completed'),
(3, 9, 8, 'completed'),
(4, 9, 9, 'completed'),
(5, 9, 10, 'completed'),
(6, 9, 10, 'completed'),
(7, 9, 8, 'completed'),
(8, 9, 10, 'completed'),
(16, 9, 9, 'watching');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `pais` varchar(100) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'cliente',
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `correo`, `clave`, `nombre`, `apellidos`, `fecha`, `pais`, `codigo_postal`, `telefono`, `tipo`, `imagen`) VALUES
(1, 'admin@gmail.com', '$2y$10$0FvvHAVZHMgh0jXmL0vmPeaJ8yPdy7pSzhrvuIqphHDeXCa2PxWAW', 'Administrador', 'Velez Campos', '2005-01-06', 'España', '14900', '+34 600000000', 'admin', './assets/img/profilePictures/admin.jpg'),
(2, 'prueba@gmail.com', '$2y$10$0FvvHAVZHMgh0jXmL0vmPeaJ8yPdy7pSzhrvuIqphHDeXCa2PxWAW', 'Manolo', 'Perez Quintana', '2015-01-13', 'España', '14900', '+34 600000001', 'cliente', ''),
(8, 'prueba@prueba.com', '$2y$10$7Y9dcPJwf6gor5Nr8QBd5u6eqv2Og.wHK8Qzg7vVKR5AZeUGeDd7u', 'Prueba', 'Registro', '2025-01-10', 'Pakistan', '14960', '64536583', 'cliente', './assets/img/profilePictures/1737624190-bomba.jpg'),
(9, 'roldancamposrafael@gmail.com', '$2y$10$A7vOjgLezLIz6uvtfVZk1e/1Be0gbKZwJhsHU.Vo20fl80N9FhgZ2', 'Rafa', 'Roldan Campos', '2025-01-08', 'Mb', '16565', '657576767', 'cliente', 'https://lh3.googleusercontent.com/a/ACg8ocLrHaiLYKNeWFB7u1PA1Qpe7TPkPGZc73qbYAkuYQPzih7L6Q=s96-c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`,`id_usuario`,`id_contenido`),
  ADD KEY `fk1` (`id_usuario`),
  ADD KEY `fk2` (`id_contenido`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id_contenido`,`id_usuario`),
  ADD KEY `fk5` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk6` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
