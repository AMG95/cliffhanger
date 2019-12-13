-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2019 at 04:34 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliffhanger_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre de la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene las categorias de los productos';

--
-- Dumping data for table `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`id`, `nombre`) VALUES
(1, 'Superheroes'),
(2, 'Zombies'),
(3, 'Terror'),
(4, 'Drama'),
(5, 'Accion'),
(6, 'Ciencia-Ficcion'),
(7, 'Fantasia'),
(11, 'Comedia'),
(12, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIAS_PRODUCTOS`
--

CREATE TABLE `CATEGORIAS_PRODUCTOS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `id_categoria` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla CATEGORIAS',
  `id_producto` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla PRODUCTOS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Contiene las relaciones entre las categorias y los productos';

--
-- Dumping data for table `CATEGORIAS_PRODUCTOS`
--

INSERT INTO `CATEGORIAS_PRODUCTOS` (`id`, `id_categoria`, `id_producto`) VALUES
(20, 1, 6),
(21, 6, 6),
(22, 7, 6),
(23, 3, 7),
(26, 4, 8),
(27, 7, 8),
(33, 4, 9),
(34, 12, 9),
(36, 5, 3),
(49, 2, 2),
(50, 3, 2),
(51, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `INCIDENCIAS`
--

CREATE TABLE `INCIDENCIAS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Descripcion de la incidencia',
  `id_usuario` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla USUARIOS',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion de la incidencia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene las incidencias de los usuarios';

--
-- Dumping data for table `INCIDENCIAS`
--

INSERT INTO `INCIDENCIAS` (`id`, `descripcion`, `id_usuario`, `fecha`) VALUES
(4, 'No puedo realizar un pedido. Ayuda.', 8, '2019-12-12 22:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `OPINIONES`
--

CREATE TABLE `OPINIONES` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `comentario` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Comentario de cada producto por cada usuario',
  `valoracion` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Valoracion de cada producto por cada usuario',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Estado de la opinion',
  `id_usuario` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla USUARIOS',
  `id_producto` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla PRODUCTOS',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion de la opinion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene las opiniones de los usuarios';

--
-- Dumping data for table `OPINIONES`
--

INSERT INTO `OPINIONES` (`id`, `comentario`, `valoracion`, `estado`, `id_usuario`, `id_producto`, `fecha`) VALUES
(9, 'Espectacular', 1, 1, 8, 3, '2019-12-12 22:38:31'),
(10, 'Me da mucho miedo', 0, 1, 8, 7, '2019-12-12 22:39:02'),
(11, 'Pues no me gusta', 0, 1, 9, 3, '2019-12-12 22:49:06'),
(12, 'Alucinante. Me encanta Thor.', 1, 1, 9, 6, '2019-12-12 22:49:47'),
(13, 'Por que se muere mi personaje favorito?', 0, 0, 9, 8, '2019-12-12 22:51:42'),
(14, 'Me encantan los zombies!', 1, 1, 9, 2, '2019-12-12 22:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `PEDIDOS`
--

CREATE TABLE `PEDIDOS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion del pedido',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Estado del pedido',
  `id_usuario` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla USUARIOS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene todos los pedidos hechos por los usuarios de la aplicacion';

--
-- Dumping data for table `PEDIDOS`
--

INSERT INTO `PEDIDOS` (`id`, `fecha`, `estado`, `id_usuario`) VALUES
(4, '2019-12-12 22:42:16', 1, 8),
(5, '2019-12-12 22:52:47', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTOS`
--

CREATE TABLE `PRODUCTOS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del producto',
  `imagen` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Portada del producto',
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Descripcion del producto',
  `tipo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Pelicula o Serie',
  `precio` decimal(3,2) NOT NULL COMMENT 'El precio en euros que costara el producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene todos los productos de la aplicacion';

--
-- Dumping data for table `PRODUCTOS`
--

INSERT INTO `PRODUCTOS` (`id`, `nombre`, `imagen`, `descripcion`, `tipo`, `precio`) VALUES
(2, 'The Walking Dead', 'https://live.staticflickr.com/2875/8924061835_fb9729628d_b.jpg', 'La serie sigue las aventuras de Rick Grimes, un oficial de policia quien tras ser herido en servicio y pasar varias semanas en coma despierta en un mundo apocaliptico plagado de zombies donde la poblacion ha dejado de existir. Luego de deducir que su familia podria continuar con vida, Rick emprende un viaje para tratar de encontrarlos y es asi que llega hasta un pequeno grupo de sobrevivientes en las afueras de Atlanta donde por coincidencias del destino logra reunirse con aquellos a quienes estaba buscando. Rapidamente Rick asume el liderazgo del grupo y mientras ayuda a todos para tratar de sobrevivir a los caminantes, pronto se da cuenta de que muchas veces los vivos pueden ser mas peligrosos que los muertos.', 'serie', '1.99'),
(3, 'John Wick', 'https://imgc.allpostersimages.com/img/print/u-g-F7SH250.jpg?w=550&h=550&p=0', 'John Wick, interpretado por Keanu Reeves (Matrix, Pactar con el diablo) es un antiguo asesino a sueldo que observa impasible como un ladron roba su coche, un Ford Mustang del 69, y mata al perro que su mujer le regalo. Wick entonces persigue al delincuente y descubre que su padre es un jefe mafioso de Nueva York y que ha puesto una alta recompensa a cambio de su cabeza. Casualmente la persona contratada para darle caza es un sicario, encarnado por Willem Dafoe (Spiderman), un gran amigo y ex companero suyo, que le recomendo abandonar la peligrosa profesion despues de la muerte de su mujer.', 'pelicula', '2.99'),
(6, 'Los Vengadores', 'https://http2.mlstatic.com/posters-avengers-los-vengadores-todas-las-peliculas-marvel-D_NQ_NP_965650-MLA29164392696_012019-F.jpg', 'Un enemigo inesperado amenaza con poner en peligro la seguridad mundial, asi que Nick Fury, Director de la agencia internacional para el mantenimiento de la paz conocida con el nombre de SHIELD, necesita encontrar urgentemente un equipo que salve al mundo del mayor de los desastres.', 'pelicula', '2.99'),
(7, 'IT', 'https://images-na.ssl-images-amazon.com/images/I/61bMkkwpduL._SY550_.jpg', 'La pelicula cuenta la historia de siete chicos marginados del municipio de Derry, Maine (EE. UU.), que se llaman a si mismos "El Club de los Perdedores". Todos se han visto marginados por uno u otro motivo; todos cargan con alguna de las "cualidades" favoritas de los abusones de la ciudad... y todos han visto sus peores pesadillas hacerse realidad en forma de un antiguo depredador que cambia de forma y al que solo logran llamar "eso". ', 'pelicula', '2.99'),
(8, 'Game of Thrones', 'https://static.posters.cz/image/750/poster/juego-de-tronos-jon-for-the-throne-i72506.jpg', 'La historia se desarrolla en un mundo ficticio de caracter medieval donde hay Siete Reinos. Hay tres lineas argumentales principales: la cronica de la guerra civil dinastica por el control de Poniente entre varias familias nobles que aspiran al Trono de Hierro; la creciente amenaza de "los otros", seres desconocidos que viven al otro lado de un inmenso muro de hielo que protege el Norte de Poniente; y el viaje de Daenerys Targaryen, la hija exiliada del rey que fue asesinado en una guerra civil anterior, y que pretende regresar a Poniente para reclamar sus derechos dinasticos.', 'serie', '1.99'),
(9, 'Titanic', 'https://images-na.ssl-images-amazon.com/images/I/91J0KtuFMAL._SY679_.jpg', 'Jack (DiCaprio), un joven artista, en una partida de cartas gana un pasaje para America, en el Titanic, el trasatlantico mas grande y seguro jamas construido. A bordo, conoce a Rose (Kate Winslet), una joven de una buena familia venida a menos que va a contraer un matrimonio de conveniencia con Cal (Billy Zane), un millonario engreido a quien solo interesa el prestigioso apellido de su prometida. Jack y Rose se enamoran, pero Cal y la madre de Rose ponen todo tipo de trabas a su relacion. Inesperadamente, un inmenso iceberg pone en peligro la vida de los pasajeros.', 'pelicula', '2.99');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTOS_PEDIDOS`
--

CREATE TABLE `PRODUCTOS_PEDIDOS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `id_producto` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla PRODUCTOS',
  `id_pedido` int(11) NOT NULL COMMENT 'Campo que actuara como llave foranea de la tabla PEDIDOS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Contiene las relaciones entre los productos y los pedidos';

--
-- Dumping data for table `PRODUCTOS_PEDIDOS`
--

INSERT INTO `PRODUCTOS_PEDIDOS` (`id`, `id_producto`, `id_pedido`) VALUES
(5, 3, 4),
(6, 6, 5),
(7, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico (llave primaria)',
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre real del usuario',
  `primer_ape` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Primer apellido real del usuario',
  `segundo_ape` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'Segundo apellido real del usuario (no obligatorio)',
  `rol` varchar(30) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'usuario' COMMENT 'Usuario o Administrador',
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Activo, 0: Desactivado',
  `dni` varchar(9) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Documento nacional de identidad del usuario',
  `username` varchar(20) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre de usuario visible dentro de la aplicacion',
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Contraseña del usuario',
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Correo electronico del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla que contiene todos los usuarios registrados de la aplicacion';

--
-- Dumping data for table `USUARIOS`
--

INSERT INTO `USUARIOS` (`id`, `nombre`, `primer_ape`, `segundo_ape`, `rol`, `estado`, `dni`, `username`, `password`, `email`) VALUES
(4, 'admin', 'admin', NULL, 'administrador', 1, '45321231F', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin@gmail.com'),
(8, 'Alejandro', 'Millet', '', 'usuario', 1, '45321231F', 'alex95', 'c6865cf98b133f1f3de596a4a2894630', 'alexmillet95@gmail.com'),
(9, 'Mario', 'Castro', 'Ortiz', 'usuario', 0, '43513710X', 'Mro88', 'de2f15d014d40b93578d255e6221fd60', 'mario@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CATEGORIAS_PRODUCTOS`
--
ALTER TABLE `CATEGORIAS_PRODUCTOS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `INCIDENCIAS`
--
ALTER TABLE `INCIDENCIAS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `OPINIONES`
--
ALTER TABLE `OPINIONES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PRODUCTOS_PEDIDOS`
--
ALTER TABLE `PRODUCTOS_PEDIDOS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indexes for table `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `CATEGORIAS_PRODUCTOS`
--
ALTER TABLE `CATEGORIAS_PRODUCTOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `INCIDENCIAS`
--
ALTER TABLE `INCIDENCIAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `OPINIONES`
--
ALTER TABLE `OPINIONES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `PRODUCTOS_PEDIDOS`
--
ALTER TABLE `PRODUCTOS_PEDIDOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico (llave primaria)', AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CATEGORIAS_PRODUCTOS`
--
ALTER TABLE `CATEGORIAS_PRODUCTOS`
  ADD CONSTRAINT `CATEGORIAS_PRODUCTOS_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `CATEGORIAS` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `CATEGORIAS_PRODUCTOS_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `PRODUCTOS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `INCIDENCIAS`
--
ALTER TABLE `INCIDENCIAS`
  ADD CONSTRAINT `INCIDENCIAS_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `USUARIOS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `OPINIONES`
--
ALTER TABLE `OPINIONES`
  ADD CONSTRAINT `OPINIONES_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `USUARIOS` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `OPINIONES_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `PRODUCTOS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  ADD CONSTRAINT `PEDIDOS_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `USUARIOS` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `PRODUCTOS_PEDIDOS`
--
ALTER TABLE `PRODUCTOS_PEDIDOS`
  ADD CONSTRAINT `PRODUCTOS_PEDIDOS_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `PRODUCTOS` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `PRODUCTOS_PEDIDOS_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `PEDIDOS` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
