-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2020 a las 04:06:21
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banneados`
--

CREATE TABLE IF NOT EXISTS `banneados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `login` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(23) COLLATE utf8_spanish2_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Electrodomesticos '),
(2, 'Bebes'),
(3, 'Electronicos'),
(4, 'Salud'),
(5, 'Jugetes'),
(6, 'Carnes y leches'),
(7, 'Bebidas'),
(8, 'Limpieza'),
(9, 'Escolares'),
(10, 'Bakery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(5) NOT NULL AUTO_INCREMENT,
  `id_producto` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `producto` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(5) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `factura` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `existencia` int(5) NOT NULL,
  `imagen` varchar(60) COLLATE utf16_spanish2_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_subcategoria` (`id_subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci AUTO_INCREMENT=456 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`, `imagen`, `id_categoria`, `id_subcategoria`) VALUES
(16, 'Cocina Mabe, 6 quemadores', '450.99', 4, '', 1, 1),
(17, 'Cocina Lonovie, 4 quemadores', '400.30', 4, 'Cocina2.jpg', 1, 1),
(18, 'Cocina Hosen 5 quemadores', '489.99', 1, 'Cocina3.jpg', 1, 1),
(19, 'Cocina Mabe 6 Quemadores', '623.99', 2, 'Cocina4.jpg', 1, 1),
(20, 'Cocina Portátil DCG', '125.99', 3, 'Cocina5.jpg', 1, 1),
(21, 'Cocina Eléctrica Portátil Profesiona Series', '200.99', 5, 'Cocina6.jpg', 1, 1),
(22, 'Cocina Eléctrica 4 quemadores Kitchen Aid', '350.99', 0, 'Cocina7.jpg', 1, 1),
(23, 'Cocina Eléctrica Portátil 5 Quemadores', '30.99', 2, 'Cocina8.jpg', 1, 1),
(24, 'Cocina eléctrica Portátil 2 quemadores', '80.99', 4, 'Cocina9.jpg', 1, 1),
(25, 'Horno Eléctrico', '91.00', 4, 'Horno1.jpg', 1, 1),
(26, 'Horno CaseMaster', '126.99', 4, 'Horno2.jpg', 1, 1),
(27, 'Horno ToyoTomi', '91.00', 3, 'Horno3.jpg', 1, 1),
(28, 'Horno Oster', '100.99', 5, 'Horno4.jpg', 1, 1),
(29, 'Horno Hamilton Beach', '140.99', 3, 'Horno5.jpg', 1, 1),
(30, 'Lavadora marca Centrales', '320.99', 5, 'Lavadora1.jpg', 1, 1),
(31, 'Lavadora Fagor', '380.99', 0, 'Lavadora2.jpg', 1, 1),
(32, 'Lavadora Sunshine', '408.99', 4, 'Lavadora3.jpg', 1, 1),
(33, 'Lavadora Lg', '360.99', 2, 'Lavadora4.jpg', 1, 1),
(34, 'Lavadora Whirlpool', '289.99', 2, 'Lavadora5.jpg', 1, 1),
(35, 'Microondas Whirlpool', '120.99', 4, 'Micro1.jpg', 1, 1),
(36, 'Microonas Samsung', '130.99', 5, 'Micro2.jpg', 1, 1),
(37, 'Microondas Whirlpool', '99.99', 4, 'Micro3.jpg', 1, 1),
(38, 'Microondas Whirlpool', '109.99', 4, 'Micro4.jpeg', 1, 1),
(39, 'Microondas Lg', '160.99', 4, 'Micro5.jpg', 1, 1),
(40, 'Plancha Oster', '26.00', 3, 'Plancha1.jpg', 1, 1),
(41, 'Plancha de Vapor Kazoo', '46.00', 5, 'Plancha2.jpg', 1, 1),
(42, 'Plancha de Vapo Kazoo', '51.00', 3, 'Plancha3.jpg', 1, 1),
(43, 'Plancha Fagor', '32.00', 4, 'Plancha4.jpg', 1, 1),
(44, 'Refrigeradora Omega', '238.99', 4, 'Refri1.jpg', 1, 1),
(45, 'Refrigeradora Samsung Cool', '650.99', 6, 'Refri2.jpg', 1, 1),
(46, 'Refrigeradora LG', '467.99', 3, 'Refri3.jpg', 1, 1),
(47, 'Refrigeradora CoolMaster todo en uno', '829.99', 3, 'Refri4.jpg', 1, 1),
(48, 'Refrigeradora Samsung Complete control', '875.99', 2, 'Refri5.jpg', 1, 1),
(49, 'DVD Galaxya', '46.00', 3, 'Dvd1.jpg', 1, 2),
(50, 'DvD Philips', '31.00', 3, 'Dvd2.jpg', 1, 2),
(51, 'DvD Lg', '46.00', 3, 'Dvd3.jpg', 1, 2),
(52, 'DvD Sony', '46.00', 3, 'Dvd4.jpg', 1, 2),
(53, 'DvD Blu-ray', '61.00', 2, 'Dvd5.jpg', 1, 2),
(54, 'DvD Samsung Blu-Ray', '61.00', 3, 'Dvd6.jpg', 1, 2),
(55, 'Equipo de Sonido Lg All Beat''s', '368.99', 0, 'Equi1.png', 1, 2),
(66, 'Equipo de Sonido Samsung "Mix the sound"', '370.99', 6, 'Equi2.jpg', 1, 2),
(67, 'Equipo de Sonido Samsung', '220.99', 6, 'Equi3.jpg', 1, 2),
(68, 'Equipo de Sonido Lg "X-Boom"', '402.99', 5, 'Equi4.jpg', 1, 2),
(69, 'Equipo de Sonido Sony "Feel the power of the sound', '399.99', 5, 'Equi5.jpg', 1, 2),
(70, 'Equipo de Sonido Sony "Power sound"', '399.99', 7, 'Equi6.jpg', 1, 2),
(85, 'Equipo de Sonido Sony "Feel the power"', '399.99', 8, 'Equi6.jpg', 1, 2),
(86, 'Teatro en Casa Lg', '71.00', 6, 'Teat1.jpg', 1, 2),
(87, 'Teatro en Casa Lg', '180.99', 5, 'Teat2.jpg', 1, 2),
(88, 'Teatro en casa Lg', '100.99', 7, 'Teat3.jpg', 1, 2),
(89, 'Teatro en Casa Philip', '132.99', 6, 'Teat4.jpg', 1, 2),
(90, 'Teatro en casa RCA', '51.00', 8, 'Teat5.jpg', 1, 2),
(91, 'Plasma Samsung 43'''' ', '245.99', 7, 'Plasma1.jpg', 1, 2),
(92, 'Plasma Panasonic 30''''', '199.99', 4, 'Plasma2.jpg', 1, 2),
(93, 'Plama Lg 40''''', '230.99', 5, 'Plasma3.jpg', 1, 2),
(94, 'Smart Tv Samsung 50''''', '698.99', 9, 'Smar1.png', 1, 2),
(95, 'Smart Tv Samsung 40''''', '510.99', 7, 'Smar2.jpg', 1, 2),
(96, 'Smart Tv Samsung Curve 50''''', '999.99', 6, 'Smar3.jpg', 1, 2),
(97, 'Smart Tv Samsung 40''''', '540.99', 8, 'Smar4.png', 1, 2),
(98, 'Smart Tv Lg 38''''', '500.99', 7, 'Smar5.jpg', 1, 2),
(99, 'Cereal Nestum', '7.00', 25, 'A1.jpg', 2, 3),
(100, 'Cereal Nestum Plus', '7.00', 29, 'A2(3).jpg', 2, 3),
(101, 'Gerber Vegetales con Pavo', '0.75', 100, 'G1.jpg', 2, 3),
(102, 'Gerber Vegetales y arroz', '0.75', 97, 'G2.jpg', 2, 3),
(103, 'Colado Agú', '0.75', 101, 'G3.jpg', 2, 3),
(104, 'Colado Agú Sabor Manzana', '0.75', 100, 'G4.jpg', 2, 3),
(105, 'Colado Heinz Pera', '0.75', 101, 'G5.jpg', 2, 3),
(106, 'Colado de frutas Heinz', '0.75', 10, 'G6.jpg', 2, 3),
(107, 'Botella de Colado Heinz', '3.80', 80, 'G7.jpg', 2, 3),
(108, 'Colado Heinz Botella sabor Manzana', '2.10', 96, 'G8.jpg', 2, 3),
(109, 'Cereal NESTUM', '3.00', 150, 'G9.jpg', 2, 3),
(110, 'Leche Hero Baby', '6.99', 190, 'H1.jpg', 2, 3),
(111, 'Bote de leche Hero Baby Premiun', '8.99', 100, 'H2.jpg', 2, 3),
(112, 'Colado Hero Baby Fruta 4 packs', '1.75', 198, 'H3.png', 2, 3),
(113, 'Aceite para bebé', '1.25', 350, 'Aceite.jpg', 2, 4),
(114, 'Crema para Bebé Mustela', '2.99', 174, 'Crema.jpg', 2, 4),
(115, 'Crema para Bebé Baby Magic', '1.25', 230, 'Crema2.jpg', 2, 4),
(116, 'Crema para Bebé Aveeno', '2.80', 108, 'Crema3.jpg', 2, 4),
(117, 'Loción para Bebés Baby Johnson''s', '4.10', 340, 'Locion.png', 2, 4),
(118, 'Loción para Bebé Baby Magic', '1.75', 339, 'Locion2.jpg', 2, 4),
(119, 'Loción para bebé Johnson''s Baby', '3.80', 340, 'Locion3.png', 2, 4),
(120, 'Shampoo para bebés  Huggies', '3.25', 340, 'Shampoo.jpg', 2, 4),
(121, 'Shampoo para bebé Extra Suave Nenuco', '3.80', 310, 'Shampoo1.jpg', 2, 4),
(122, 'Shampoo Baby Johnson''s para cabello claro', '4.35', 230, 'Shampoo4.png', 2, 4),
(123, 'Set Limpiador de pachas', '6.99', 200, 'LP1.jpg', 2, 5),
(124, 'Set Limpiador de pachas', '4.99', 230, 'LP2.jpg', 2, 5),
(125, 'Botella de Shampoo limpiadora de Pachas y desinfec', '7.25', 229, 'LP3.jpg', 2, 5),
(126, 'Shampoo para limpiar botellas Faalin', '7.50', 137, 'LP4.jpg', 2, 5),
(127, 'Set de 3 pachas', '5.80', 200, 'P1(2).jpg', 2, 5),
(128, 'Pacha Chicco', '3.25', 200, 'P2(2).jpg', 2, 5),
(129, '2 Pack de pachas Dr.Brown''s', '4.99', 200, 'P3(2).jpg', 2, 5),
(130, 'Pacha ''Green to Grow'' c/u', '4.65', 540, 'P4.jpg', 2, 5),
(131, 'Pacha ''Momentos mágicos con Mickey''', '3.80', 100, 'P8.jpg', 2, 5),
(132, '3 Pack de calcetines para bebé', '5.10', 200, 'C.jpg', 2, 6),
(133, 'Calcetines Sock Ons', '4.10', 100, 'C2.jpg', 2, 6),
(134, '2 pack de calcetines Baby Mink', '4.70', 189, 'C3.jpg', 2, 6),
(135, 'Par de Calcetines para bebé', '2.99', 80, 'C4.jpg', 2, 6),
(136, 'Calcetín con figura de conejo', '6.20', 100, 'C5.jpg', 2, 6),
(137, 'Par de calcetines de lana', '4.25', 105, 'C6.jpg', 2, 6),
(138, 'Calceta para bebé', '2.80', 100, 'C7.jpg', 2, 6),
(139, 'Calcetín para bebé', '3.50', 150, 'C8.jpg', 2, 6),
(140, 'Calcetín para bebé', '3.20', 120, 'C9.jpg', 2, 6),
(141, 'Gorro de gatito para bebé', '6.70', 50, 'G1(2).jpg', 2, 6),
(142, 'Gorro de pollito para bebé', '6.70', 50, 'G2(2).jpg', 2, 6),
(143, 'Gorro blanco para bebé', '7.99', 20, 'G3(2).jpg', 2, 6),
(144, 'Gorro de mapache para bebé con guantes', '6.70', 50, 'G4(2).jpg', 2, 6),
(145, 'Gorro de osito para bebé con guantes ', '6.70', 50, 'G5(2).jpg', 2, 6),
(146, 'Trajes para bebé ', '22.50', 80, 'R1.jpg', 2, 6),
(147, 'Pijama para dormir de bebé', '16.30', 80, 'R2.jpg', 2, 6),
(148, 'Ropa de Pijama para bebé', '12.00', 50, 'R3.jpg', 2, 6),
(149, 'Pijama Rallada para bebé', '15.70', 100, 'R4.jpg', 2, 6),
(150, 'Camisa de cuello para bebé', '11.30', 50, 'R5.jpg', 2, 6),
(151, 'Traje de Hello Kitty', '21.56', 50, 'R6.jpg', 2, 6),
(152, 'Traje formal para bebé', '36.98', 20, 'R7.jpg', 2, 6),
(153, 'Traje Formal para bebé c/u', '46.50', 25, 'R8.jpg', 2, 6),
(154, 'Mameluco para bebé', '15.30', 50, 'R9.jpg', 2, 6),
(155, 'Pijama de Batman', '21.45', 50, 'R10.jpg', 2, 6),
(156, 'Camisa casual de bebé', '15.40', 50, 'R11.jpg', 2, 6),
(157, 'Vestido para bebé', '20.50', 50, 'R12.jpeg', 2, 6),
(158, 'Vestido para bebé', '36.70', 30, 'R13.jpg', 2, 6),
(159, 'Vestido para niña', '36.55', 30, 'R14.jpg', 2, 6),
(160, 'Camisa sport para bebé', '15.30', 25, 'R15.jpg', 2, 6),
(161, 'Vestido para bebé', '31.00', 50, 'R16.jpg', 2, 6),
(162, 'Pijama para bebé', '25.50', 30, 'R17.jpg', 2, 6),
(163, 'Zapatillas de Minnie para bebé', '20.95', 50, 'Z1.jpg', 2, 6),
(164, 'Zapato para bebé', '31.60', 50, 'Z2.jpg', 2, 6),
(165, 'Zapato tennis para bebé', '31.80', 50, 'Z3.jpg', 2, 6),
(166, 'Zapato para bebé', '21.50', 50, 'Z4.jpg', 2, 6),
(167, 'Zapato para bebé', '36.50', 50, 'Z5.jpg', 2, 6),
(168, 'Zapatilla para bebé', '22.00', 30, 'Z6.jpg', 2, 6),
(169, 'Bota para bebé', '35.00', 40, 'Z9.jpg', 2, 6),
(170, 'Zapato para bebé', '35.00', 40, 'Z10.jpg', 2, 6),
(171, 'Zapato para bebé', '35.00', 50, 'Z11.jpg', 2, 6),
(172, 'Celular Asus', '200.99', 100, 'Asus.jpg', 3, 7),
(173, 'Celular Huawei Y3', '51.60', 93, 'HY3.jpg', 3, 7),
(174, 'Nokia Lumia 520', '180.99', 27, 'Nokia_Lumia 520.jpg', 3, 7),
(175, 'Samsung Galaxy S5', '310.99', 50, 'S5.jpg', 3, 7),
(176, 'Tablet Nuqleo', '110.99', 48, 'Tab_Nuqleo.jpg', 3, 7),
(177, 'Tablet Samsung Galaxy Tab S', '356.99', 100, 'Tab_S.jpg', 3, 7),
(178, 'Samsung Galaxy Young 2', '41.00', 20, 'Y2.jpg', 3, 7),
(179, 'Laptop HP', '540.99', 200, 'Hp169.jpg', 3, 8),
(180, 'Laptop HP', '670.99', 60, 'HP170.jpg', 3, 8),
(181, 'Mini Laptop HP', '200.99', 39, 'HP.jpg', 3, 8),
(182, 'Laptop del Gobierno', '999.99', 10, 'Laptop_del_gobierno.jpg', 3, 8),
(184, 'Audifonos Apple', '39.99', 50, 'Apple.jpg', 3, 9),
(185, 'Audifonos Beats', '200.99', 25, 'beats.png', 3, 9),
(186, 'Bocinas Beats', '180.99', 100, 'Bocinas_Beats.png', 3, 9),
(187, 'Cargador Portatil 2500 MA', '16.00', 40, 'Cargador.jpg', 3, 9),
(188, 'Cargador Portatil Samsung 3600MA', '21.00', 35, 'Samsung2000.jpg', 3, 9),
(189, 'Audifonos Sony', '36.50', 60, 'Sony.jpg', 3, 9),
(190, 'Audifonos Sony ', '20.30', 40, 'Sony2.jpg', 3, 9),
(191, 'Cepillo de Dientes Oral-B', '1.98', 99, 'Cepillo1.jpg', 4, 12),
(192, 'Cepillos Colgate 3 Pack', '2.80', 98, 'cepillo2.jpg', 4, 12),
(193, 'Cepillo Colgate 2 Pack', '1.90', 99, 'cepillo3.jpg', 4, 12),
(194, 'Pasta de dientes Colgate Máxima Protección', '3.40', 200, 'colgate1.jpg', 4, 12),
(195, 'Pasta Colgate Sensitive Pro-Alivio', '4.10', 100, 'colgate2.jpg', 4, 12),
(196, 'Pasta de Dientes Colgate Triple Acción', '1.80', 99, 'colgate3.jpg', 4, 12),
(197, 'Pasta Colgate Kids', '3.85', 100, 'colgate4.jpg', 4, 12),
(198, 'Enjuague Bucal Colgate', '5.85', 100, 'enjuage1.jpg', 4, 12),
(199, 'Enjuague Bucal Colgate Control Sarro', '5.60', 100, 'enjuage2.jpg', 4, 12),
(200, 'Enjuague Bucal Listerine', '4.80', 99, 'enjuage3.jpg', 4, 12),
(201, 'Enjuague Bucal Colgate Ice Infinity', '5.40', 100, 'enjuage6.jpg', 4, 12),
(202, 'Caja de Viro-Grip Limon, Jarabe', '6.25', 93, 'virogriplimon.jpeg', 4, 11),
(203, 'Pasta Colgate Luminous White', '4.10', 100, 'colgate5.jpg', 4, 12),
(204, 'Crema para cuerpo Dove', '7.80', 100, 'Dove1.jpg', 4, 13),
(205, 'Shampoo Dove Reconstrucción Completa', '5.40', 100, 'Shampoo2.jpg', 4, 13),
(206, 'Shampoo Head&Shoulders con acondicionador', '4.70', 100, 'Shampoo3.jpg', 4, 13),
(207, 'Shampoo Herbal Essences', '4.90', 99, 'Shampoo4.jpg', 4, 13),
(208, 'Shampoo Tropical Care con acondicionador', '5.25', 100, 'Shampoo5.jpg', 4, 13),
(209, 'Shampoo Pantene', '4.20', 98, 'Shampoo6.jpg', 4, 13),
(210, 'Desodorante Axe', '3.80', 200, 'des1.jpg', 4, 14),
(211, 'Desodorante Axe para mujer', '3.60', 200, 'Des2.jpg', 4, 14),
(212, 'Desodorante para mujer en Rollon NIVEA', '3.50', 200, 'des3.jpg', 4, 14),
(213, 'Desodorante para hombre Rollon NIVEA', '4.00', 200, 'des4.jpg', 4, 14),
(214, 'Desodorante para hombre Speed Stick', '2.10', 200, 'des5.jpg', 4, 14),
(215, 'Desodorante en Spray Speed Stick', '3.65', 199, 'des6.jpg', 4, 14),
(216, 'Desodorante para hombre Spray NIVEA', '4.45', 200, 'des7.jpg', 4, 14),
(217, 'Desodorante Axe para hombre ', '4.34', 200, 'des8.jpg', 4, 14),
(218, 'Aspirina ', '3.25', 200, 'aspirina2.png', 4, 15),
(219, 'Bote de Cofal', '5.40', 100, 'cofal.jpg', 4, 15),
(220, 'Pastilla Panadol', '5.20', 200, 'panadol2.jpg', 4, 15),
(221, 'Panadol Ultra', '5.60', 200, 'Pastilla1.png', 4, 15),
(222, 'Aleve Extra Fuerte', '3.70', 200, 'pastilla3.jpg', 4, 15),
(223, 'Caja de Pastillas Alka Seltzer', '5.80', 200, 'pastilla4.jpg', 4, 15),
(224, 'Caja de Pastillas Panadol Antrigripal', '6.20', 200, 'Pastilla5.jpg', 4, 15),
(225, 'Caja Tabcin Tos', '6.20', 200, 'Tancin1.jpg', 4, 15),
(226, 'Tabcin para niños', '5.10', 200, 'tancin2.jpg', 4, 15),
(227, 'Caja Viro-Grip', '5.70', 100, 'Virogrip1.jpg', 4, 15),
(228, 'Caja Viro-Grip noche', '5.70', 100, 'virogrip2.jpg', 4, 15),
(229, 'Carne Molida de Pavo', '3.80', 79, 'Ave1.jpg', 6, 16),
(230, 'Chuleta de cerdo', '1.10', 49, 'ave2.jpg', 6, 16),
(231, 'Pollo Marinado Sello de Oro', '1.70', 97, 'ave3.jpg', 6, 16),
(232, 'Pechuga de Pollo', '1.30', 39, 'ave4.jpg', 6, 16),
(233, 'Pechuga de Pollo', '1.10', 30, 'ave5.jpg', 6, 16),
(234, 'Pollo Indio', '1.80', 24, 'ave6.jpg', 6, 16),
(235, 'Pierna de Pollo', '1.20', 9, 'ave7.jpg', 6, 16),
(236, 'Pollo', '5.70', 20, 'ave8.jpg', 6, 16),
(237, 'Lata de  Atún Calvo', '2.35', 50, 'pes1.jpg', 6, 17),
(238, 'Atún con vegetales  Sardimar', '2.00', 30, 'pes2.jpg', 6, 17),
(239, 'Libra de Camarones', '2.00', 20, 'pes3.jpg', 6, 17),
(240, 'Pescado Boca Roja', '2.00', 30, 'pes4.jpg', 6, 17),
(241, 'Bolsa de Bacalao', '6.00', 60, 'pes5.jpg', 6, 17),
(242, 'Pescado Boca Roja embolsado', '5.00', 50, 'pes6.jpg', 6, 17),
(243, 'Cerdito de juguete para niños', '15.50', 29, 'cerdito.jpg', 5, 18),
(244, 'Sonajero para bebé', '10.20', 30, 'cerdito1.jpg', 5, 18),
(245, 'Juego de mesa Cranium', '25.99', 18, 'Craneo.jpg', 5, 18),
(246, 'Juego de mesa Monopoly', '36.99', 30, 'monopoli.jpg', 5, 18),
(247, 'Muñeca Dream Collection', '21.95', 10, 'muneca11.jpg', 5, 18),
(248, 'Piscina Inflable de 3.05m', '41.55', 20, 'piscina1.jpg', 5, 18),
(249, 'Piscina para bebé inflable', '25.40', 20, 'piscina2.jpg', 5, 18),
(250, 'Tiburón inflable para golpear', '16.80', 20, 'piscina3.jpg', 5, 18),
(251, 'Juguetes de plastilina  Play-Doh Cupcake Tower', '21.50', 30, 'play_doh.jpg', 5, 18),
(252, 'Juego de plastilina Play-Doh Sweet Shoppe', '31.95', 20, 'Play_Doh1.jpg', 5, 18),
(253, 'Figura de Acción Avenger The Age of Ultron ', '20.30', 40, 'avengers1.jpg', 5, 19),
(254, 'Figura de Acción  Avengers the Age of Ultron (Thor', '20.30', 40, 'Avengers2.jpg', 5, 19),
(255, 'Carro Hot Wheels', '3.25', 40, 'carrowheels1.jpg', 5, 19),
(256, 'Carro Hot Wheels', '3.25', 39, 'carrowheels2.jpg', 5, 19),
(257, 'Carro Hot Wheels', '3.25', 40, 'carrowheels3.jpg', 5, 19),
(258, 'Carro Hot Wheels', '3.25', 40, 'carrowheels4.jpg', 5, 19),
(259, 'Carro Hot Wheels', '3.25', 40, 'carrowheels5.jpg', 5, 19),
(260, 'Pista de Carreras Hot Wheels', '34.25', 30, 'carrowheels6.jpg', 5, 19),
(261, 'Pista de Carrera Hot Wheels Wall Tracks', '40.25', 30, 'carrowheels7.jpg', 5, 19),
(262, 'Pista de Carrera Hot Wheels', '30.25', 19, 'carrowheels8.jpg', 5, 19),
(263, 'Set de carritos Hot Wheels x10', '25.20', 20, 'doblesethotwheels.jpg', 5, 19),
(264, 'Set de carritos Hot Wheels x20', '35.20', 10, 'doblesethotwheels2.jpg', 5, 19),
(265, 'Pistola NERF', '15.99', 30, 'nerf1.jpg', 5, 19),
(266, 'Pistola NERF  N-Strike ', '20.99', 40, 'nerf2.jpg', 5, 19),
(267, 'Pistola NERF Elite', '29.99', 40, 'nerf3.jpg', 5, 19),
(268, 'Camión de Juguete', '11.50', 50, 'rctruck.jpg', 5, 19),
(269, 'Set de carritos Hot Wheels x5', '11.60', 40, 'sethotwheels.jpg', 5, 19),
(270, 'Set de carritos Hot Wheels x5', '11.60', 40, 'Sethotwheels1.jpg', 5, 19),
(271, 'Figuras de Acción Star Wars', '11.20', 20, 'star1.jpg', 5, 19),
(272, 'Figuras de Acción Star Wars', '11.20', 30, 'Star2.jpg', 5, 19),
(273, 'Juguete Lego de Star Wars', '11.20', 30, 'star3.jpg', 5, 19),
(274, 'Juguete Lego de Star Wars', '11.20', 30, 'star4.jpg', 5, 19),
(275, 'Juguete Lego de Star Wars', '11.20', 30, 'star5.jpg', 5, 19),
(276, 'Figura de Acción de Tortugas Ninja', '13.85', 30, 'tortuganinja1.jpg', 5, 19),
(277, 'Figura de Acción de Tortugas Ninja', '13.85', 40, 'tortuganinja2.jpg', 5, 19),
(278, 'Figura de Acción de Tortuga Ninja', '13.85', 30, 'tortuganinja3.jpg', 5, 19),
(279, 'Figura de Acción de Tortugas Ninja', '13.85', 40, 'tortuganinja4.jpg', 5, 19),
(280, 'Figura de Acción de Tortugas Ninja', '13.85', 40, 'tortuganinja5.jpg', 5, 19),
(281, 'Figura de Acción de Tortugas Ninja', '13.85', 40, 'tortuganinja6.jpg', 5, 19),
(282, 'Figura de Acción de la Tortuga Ninja', '13.85', 30, 'tortuganinja7.jpg', 5, 19),
(283, 'Set de cocina para jugar', '5.30', 20, 'cocina.jpg', 5, 20),
(284, 'Set de bebés', '13.99', 30, 'muneca.jpg', 5, 20),
(285, 'Muñeca de My little Pony', '13.40', 30, 'muneca1(2).jpg', 5, 20),
(286, 'Muñeco de peluche', '12.15', 30, 'osito1.jpg', 5, 20),
(287, 'Hipopótamo de Peluche', '16.30', 18, 'osito2.jpg', 5, 20),
(288, 'Casita de Peppa Pig', '7.75', 30, 'peppa1.jpg', 5, 20),
(289, 'Muñequitos de Peppa Pig', '9.10', 30, 'peppa2.jpg', 5, 20),
(290, 'Carrito de Peppa Pig Family', '10.70', 30, 'peppa3.jpg', 5, 20),
(291, 'Set de Princesa Sofía, Play-Doh', '13.85', 29, 'play_doh2.jpg', 5, 20),
(292, 'Six Pack de Cerveza Bud Light', '8.70', 50, 'alcohol1.jpg', 7, 21),
(293, 'Six Pack de Cerveza Suprema', '8.10', 39, 'alcohol2.jpg', 7, 21),
(294, 'Lata de Cerveza BRAHVA', '0.75', 98, 'alcohol3.jpg', 7, 21),
(295, 'Botella de Cerveza Heineken', '1.80', 150, 'alcohol4.jpg', 7, 21),
(296, 'Botella de Cerveza Corona Extra', '0.90', 99, 'alcohol5.jpg', 7, 21),
(297, '8 Pack de Cerveza BRAHVA', '6.20', 100, 'alcohol6.jpg', 7, 21),
(298, 'Six pack de Cerveza Golden', '5.80', 100, 'alcohol7.jpg', 7, 21),
(299, '8 pack de botellas de Cervezas Miller Lite', '9.50', 100, 'alcohol8.jpg', 7, 21),
(300, '10 pack de Cervezas Golden', '10.20', 100, 'golden.jpg', 7, 21),
(301, '6 pack de Cervezas Pigs Fly', '6.40', 100, 'packcorona.jpg', 7, 21),
(302, '8 pack de Cerveza Pilsener', '7.20', 100, 'packpilserner.jpg', 7, 21),
(303, 'Bote de Café Legal', '5.80', 50, 'cali1.jpg', 7, 22),
(304, 'Caja de Café AROMA ', '6.30', 66, 'cali2.jpg', 7, 22),
(305, 'Bote de Café Buen Día', '5.10', 150, 'cali3.jpg', 7, 22),
(306, 'Bote de Café Buen día ', '4.85', 150, 'cali4.jpg', 7, 22),
(307, 'Bolsa de café COEX', '4.75', 50, 'cali5.jpg', 7, 22),
(308, 'Bote de Café Colcafé Max', '5.25', 100, 'cali6.jpg', 7, 22),
(309, 'Bote de Café Nescafé', '6.90', 55, 'cali7.jpg', 7, 22),
(310, 'Bote de Café Riko', '5.00', 40, 'cali8.jpg', 7, 22),
(311, 'Café Individual', '0.17', 200, 'cali9.jpg', 7, 22),
(312, 'Botella de Agua La Fuente 1 L', '1.60', 250, 'alpina.jpeg', 7, 23),
(313, 'Lata de Coca-Cola Zero', '0.60', 100, 'coca1.jpg', 7, 23),
(314, 'Lata de Gaseosa Tropical', '0.55', 100, 'coca2.jpg', 7, 23),
(315, 'Botella de Coca-Cola 2.5 L', '1.25', 99, 'coca3.jpg', 7, 23),
(316, 'Botella 7 up 600ml', '1.50', 200, 'coca4.jpg', 7, 23),
(317, 'Lata de Gaseosa 7 Up 335ml', '1.65', 200, 'coca5.jpg', 7, 23),
(318, 'Lata de Agua oxigenada', '0.60', 75, 'coca6.jpg', 7, 23),
(319, 'Lata de Coca Cola Light', '0.60', 200, 'coca7.jpg', 7, 23),
(320, 'Lata de Coca Cola Fanta 335ml', '0.55', 200, 'coca8.jpg', 7, 23),
(321, 'Lata de Gaseosa sabor Toronja', '0.50', 200, 'coca9.jpg', 7, 23),
(322, 'Botella de Gaseosa sabor Toronja', '1.85', 99, 'coca11.jpg', 7, 23),
(323, 'Lata de Gaseosa Kolashampan', '0.50', 99, 'coca12.jpg', 7, 23),
(324, 'Botella de Agua Cristal', '0.45', 100, 'cristal.jpg', 7, 23),
(325, 'Pack de Gaseosas Coca y  Fanta', '1.90', 100, 'packgaseosa.jpg', 7, 23),
(326, '6 pack de gasosa Pepsi', '2.10', 100, 'pepsi.jpg', 7, 23),
(327, 'Six pack de Gatorade', '4.20', 100, 'jugo1.jpg', 7, 23),
(328, 'Six pack de jugo Splash', '2.45', 100, 'jugo2.jpg', 7, 24),
(329, '6 Pack de jugo del Valle', '2.10', 100, 'jugo3.jpg', 7, 24),
(330, '6 pack de jugo Naturas', '1.50', 100, 'jugo4.jpg', 7, 24),
(331, 'Jugo del Valle', '0.45', 100, 'jugo5.jpg', 7, 24),
(332, 'Lata de Gaseosa Cascada', '0.55', 200, 'jugo6.jpg', 7, 24),
(333, 'Jugo de Aloe vera Exposed', '1.40', 100, 'jugo7.jpg', 7, 24),
(334, 'Jugo Super', '0.40', 100, 'jugosuper.jpg', 7, 24),
(335, 'Botella de Jugo Soka', '1.10', 100, 'soka.jpg', 7, 24),
(336, 'Botella de Jugo  Juoo', '2.80', 100, 'superjugo.jpg', 7, 24),
(337, 'Bolsita de jugo Tang', '0.20', 5000, 'tang.jpg', 7, 24),
(338, 'Ambientador Air Wick para carro', '3.10', 49, 'A1 (2).jpg', 8, 25),
(339, 'Ambientador para casa Air Wick', '4.00', 99, 'A2.png', 8, 25),
(340, 'Ambientador Air Wick 4 en 1', '4.99', 144, 'A3.png', 8, 25),
(341, 'Ambientador para Auto Air Wick', '2.50', 50, 'A4.jpg', 8, 25),
(342, 'Ambientador Febrezee', '6.10', 198, 'F1(2).jpg', 8, 25),
(343, 'Ambientador Febrezee para baño', '1.30', 49, 'F2.jpg', 8, 25),
(344, 'Ambientadora para Auto Febrezee', '1.20', 20, 'f3.jpg', 8, 25),
(345, 'Ambientador Glade 3 Pack', '10.30', 100, 'G1(3).jpg', 8, 25),
(346, 'Ambientador para Casa Glade', '4.99', 100, 'G2(3).jpg', 8, 25),
(347, 'Ambientadora Glade para Baño', '2.75', 100, 'G3(3).jpg', 8, 25),
(348, 'Baygon Mata Insectos Voladores', '4.10', 50, '1.png', 8, 26),
(349, 'Raid Mata cucas e insectos Rasteros', '4.10', 50, '2.png', 8, 26),
(350, 'Raid Mata Pulgas y Garrapatas', '4.10', 50, '3.png', 8, 26),
(351, 'Raid mata Hormigas', '4.10', 50, '4.png', 8, 26),
(352, 'Raid Casa y Jardín', '4.10', 50, 'Raid4.jpg', 8, 26),
(353, 'Rinso Casa Blanca', '3.80', 100, 'CB1(3).jpg', 8, 28),
(355, 'Jabón para Ropa Casa Blanca', '3.75', 100, 'CB3.jpe', 8, 28),
(357, 'Desinfectante Fabuloso ', '5.25', 100, 'F1(3).jpg', 8, 27),
(358, 'Botella desinfectante Fabuloso', '3.30', 100, 'F2(2).jpg', 8, 27),
(359, 'Bolsa Desinfectante Fabuloso', '1.00', 200, 'F3.jpg', 8, 27),
(360, 'Botellita de Desinfectante Fabuloso c/u', '1.00', 200, 'F4.jpg', 8, 27),
(361, 'Bolsa de Lejía Casa Blanca', '0.25', 200, 'lejia.png', 8, 27),
(362, 'Botella de Lejía Casa Blanca', '4.05', 200, 'lejia2.png', 8, 27),
(363, 'Jabón para Ropa Casa Blanca', '3.50', 199, 'CB1(2).jpg', 8, 28),
(364, 'Detergente para Ropa Casa Blanca', '3.99', 199, 'CB1(3).jpg', 8, 28),
(365, 'Jabón para Ropa Casa Blanca', '3.00', 200, 'jabon.png', 8, 28),
(366, 'Jabón para Ropa XTRA', '3.00', 100, 'X1.jpe', 8, 28),
(367, 'Jabón para Platos AXION', '5.60', 100, 'A1(3).jpe', 8, 29),
(368, 'Jabón para Platos AXION', '2.10', 200, 'A2(2).jpe', 8, 29),
(369, 'Botellita de Jabón Líquido AXION', '4.30', 100, 'A3(2).jpe', 8, 29),
(370, 'Jabón para Trastes AXION', '4.30', 100, 'A4(2).jpe', 8, 29),
(371, '2 pack de Jabón para trastes Casa Blanca', '4.25', 100, 'CB1.jpe', 8, 29),
(372, '3 PACK de Jabón para Trastes Casa Blanca', '5.10', 100, 'CB2 (3).jpg', 8, 29),
(373, 'Borrador STABILO', '0.35', 200, 'Borrador1.jpg', 9, 30),
(374, 'Borrador ARTESCO', '0.35', 30, 'Borrador2.jpg', 9, 30),
(375, 'Borrador de Goma Pelikan', '0.35', 40, 'Borrador3.jpg', 9, 30),
(376, 'Liquid Paper', '0.60', 100, 'Chelito1.jpg', 9, 30),
(377, 'Liquid Paper de Botecito', '0.75', 40, 'Chelito2.jpg', 9, 30),
(378, 'Caja de 24 Colores Bic', '1.75', 100, 'Colores1.jpg', 9, 30),
(379, 'Caja de Colores Bic Evolution', '1.90', 50, 'Colores2.jpg', 9, 30),
(380, 'Caja de Colores Bic Evolution', '1.30', 30, 'Colores4.jpg', 9, 30),
(381, 'Estuche Eastpak', '4.10', 20, 'Estuche1.jpg', 9, 30),
(382, 'Estuche Converse', '4.80', 49, 'Estuche2.jpg', 9, 30),
(383, 'Estuche', '3.75', 29, 'Estuche3.jpe', 9, 30),
(384, 'Estuche Wacky', '4.99', 99, 'Estuche4.jpg', 9, 30),
(385, 'Estuche de Rayo Mc''Queen', '4.99', 100, 'Estuche5.jpg', 9, 30),
(386, 'Lapicero Bic', '0.30', 200, 'Lapicero2.jpg', 9, 30),
(387, 'Caja de 4 lapiceros Bic', '1.00', 100, 'Lapiceros1.jpg', 9, 30),
(388, 'Lapiz Staedtler', '0.35', 98, 'Lapiz1.jpg', 9, 30),
(389, 'Lapiz', '0.30', 100, 'Lapiz2.jpg', 9, 30),
(390, 'Lonchera de Hello Kitty', '4.30', 100, 'Lonchera1.jpg', 9, 30),
(391, 'Lonchera de Plantas contra Zombies', '4.10', 50, 'Lonchera2.jpg', 9, 30),
(392, 'Lonchera de tela', '5.99', 40, 'Lonchera3.jpg', 9, 30),
(393, 'Lonchera de tela', '6.99', 30, 'Lonchera4.jpe', 9, 30),
(394, 'Lonchera de Ben 10', '4.99', 20, 'Lonchera5.jpg', 9, 30),
(395, 'Mochila de los Minions', '15.30', 10, 'Mochi1.jpg', 9, 30),
(396, 'Mochila MOOS', '20.10', 50, 'Mochi2.jpg', 9, 30),
(397, 'Mochila de Intensa Mente', '36.40', 25, 'Mochi3.jpg', 9, 30),
(398, 'Mochile Nikes&Elly', '31.70', 40, 'Mochi4.jpg', 9, 30),
(399, 'Mochila', '49.99', 10, 'Mochi5.jpg', 9, 30),
(400, 'Plumas Bic', '4.70', 50, 'Plumas.gif', 9, 30),
(401, 'Plumón para Pizarra Bic', '0.90', 100, 'Plumon1.jpg', 9, 30),
(402, 'Plumón Artline permanente', '0.90', 100, 'Plumon2.png', 9, 30),
(403, 'Caja de Plumones Bic', '3.99', 30, 'Plumones1.jpg', 9, 30),
(404, 'Caja de Plumones Faber-Castell', '4.80', 50, 'Plumones2.jpg', 9, 30),
(405, 'Caja de Plumones Pelikan', '3.10', 40, 'Plumones3.jpg', 9, 30),
(406, 'Regla de 30cm Abacus', '0.75', 50, 'Regla1.jpg', 9, 30),
(407, 'Sacapunta', '0.25', 100, 'Sacapunta1.jpg', 9, 30),
(408, 'Sacapunta Maped', '0.55', 100, 'Sacapunta2.jpg', 9, 30),
(409, 'Sacapunta', '0.30', 100, 'Sacapunta3.jpg', 9, 30),
(410, 'Donitas Bimbo', '0.45', 100, 'D1.jpg', 10, 31),
(411, 'Dalmata Maricela', '0.60', 100, 'D1.png', 10, 31),
(412, 'Galleta Gansito Marinela', '0.50', 99, 'G1.png', 10, 31),
(413, 'Negrito Bimbo', '0.50', 99, 'N1.jpg', 10, 31),
(414, 'Pinguinos Maricela', '0.75', 99, 'P1.png', 10, 31),
(415, 'SubMarinos Maricela', '0.40', 99, 'S1.jpg', 10, 31),
(416, 'Pan Baguette Italiano', '0.75', 20, 'B1.jpg', 10, 32),
(417, 'Pan Baguette Español', '0.75', 20, 'B2.gif', 10, 32),
(418, 'Pan Baguette Special', '0.75', 20, 'B3.jpg', 10, 32),
(419, 'Pan Bimbo Sin Orillas', '4.25', 28, 'B4.jpg', 10, 32),
(420, 'Pan de Caja Multi Grano', '4.10', 100, 'B6.jpg', 10, 32),
(421, 'Pan de Caja Bimbo Blanco', '4.70', 100, 'Bimbo1.jpg', 10, 32),
(422, 'Pan Baguette Integral', '1.00', 10, 'BIntegral.jpg', 10, 32),
(423, 'Pan Fránces c/u', '0.10', 100, 'F1.jpg', 10, 32),
(424, 'Pan Bimbo para Hamburguesas', '4.35', 100, 'H1.jpg', 10, 32),
(425, 'Pan Bimbo para Hot Dogs', '4.10', 50, 'HD1.png', 10, 32),
(426, 'Pastel Oreo Snow porción', '1.00', 10, 'P1.jpg', 10, 33),
(427, 'Tartaleta de Queso', '1.00', 5, 'P2.jpg', 10, 33),
(428, 'Pastel de Chocolate, porción', '1.00', 7, 'P3.jpg', 10, 33),
(429, 'Pastel de Chocolate con Fresas porción ', '1.00', 10, 'P5.jpg', 10, 33),
(430, 'Pastel Familiar Caramel Mix', '16.98', 12, 'Pastel1.jpe', 10, 33),
(431, 'Pastel Strawberry Tornado', '20.35', 9, 'Pastel2.jpe', 10, 33),
(432, 'Pastel Familiar Fresas con crema', '18.90', 10, 'Pastel3.jpe', 10, 33),
(433, 'Pastel Chocolate Tower', '22.10', 10, 'Pastel4.jpg', 10, 33),
(434, 'Pastel Oreo', '19.50', 10, 'Pastel5.jpg', 10, 33),
(435, 'adonis', '12.00', 10, 'campoE.png', 1, 1),
(436, 'adonis', '12.00', 10, 'campoE.png', 1, 1),
(437, 'ade', '12.00', 10, 'Horno1.jpg', 1, 1),
(438, 'jpj', '12.00', 10, 'helicecircular.png', 1, 1),
(454, 'co', '500.00', 10, 'A1(3).jpe', 1, 1),
(455, 'co', '50.00', 10, '2.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf16_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nombre`) VALUES
(1, 'Cocina'),
(2, 'Sala'),
(3, 'Comida'),
(4, 'Cuidado'),
(5, 'Pachas'),
(6, 'Ropa'),
(7, 'Smartphone'),
(8, 'Portátiles'),
(9, 'Accesorios'),
(10, 'Bebibles'),
(11, 'Jarabes'),
(12, 'Bucal'),
(13, 'Corporal'),
(14, 'Desodorante'),
(15, 'Pastillas'),
(16, 'Carnes'),
(17, 'Mariscos'),
(18, 'Infantil'),
(19, 'Niño'),
(20, 'Niña'),
(21, 'Alcohol'),
(22, 'Bebidas Calientes'),
(23, 'Carbonatadas'),
(24, 'Jugos'),
(25, 'Ambientadores'),
(26, 'Control de plaga'),
(27, 'Desinfectantes'),
(28, 'Lavandería'),
(29, 'Lavaplatos'),
(30, 'Escolar'),
(31, 'Pan Dulce'),
(32, 'Pan Fránces'),
(33, 'Pasteles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `password` varchar(20) CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci NOT NULL,
  `Categoria` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `email`, `telefono`, `password`, `Categoria`) VALUES
(9, 'adonis', 'asasa@oj.com', 12345678, '123', 'A'),
(10, 'gonzalo', 'gonzo@hotmail.com', 22992023, '1234', ''),
(11, 'carlos', 'carlos@ht.com', 12345678, '12', ''),
(12, 'Alejandra', 'ale@hotmail.com', 22334411, '123456', ''),
(13, 'adonis', 'asa@ho.com', 12121212, '123', ''),
(18, 'Delmy', 'prueba@gmail.com', 12345678, 'prueba123', 'C'),
(19, 'Ejemplo', 'ejemplo@h.com', 12345678, '12345678', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(5) NOT NULL AUTO_INCREMENT,
  `id_compra` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `producto` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(5) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cat` int(5) NOT NULL,
  `factura` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_venta`),
  UNIQUE KEY `id_compra` (`id_compra`),
  UNIQUE KEY `id_compra_5` (`id_compra`),
  KEY `id_compra_2` (`id_compra`),
  KEY `id_compra_3` (`id_compra`),
  KEY `id_compra_4` (`id_compra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=314 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_compra`, `id_producto`, `id_usuario`, `producto`, `cantidad`, `precio`, `imagen`, `id_cat`, `factura`, `direccion`, `fecha`) VALUES
(30, 20, 108, 18, 'Colado Heinz Botella sabor Manzana', 2, 2, 'G8.jpg', 2, 'zvhkdg', '', '2020-03-19'),
(31, 25, 108, 18, 'Colado Heinz Botella sabor Manzana', 2, 2, 'G8.jpg', 2, 'woqqx2', '', '2020-03-20'),
(32, 1, 245, 10, 'Juego de mesa Cranium', 1, 26, 'Craneo.jpg', 5, 'yt39hx', '', '2020-04-23'),
(33, 2, 192, 10, 'Cepillos Colgate 3 Pack', 1, 3, 'cepillo2.jpg', 4, 'yt39hx', '', '2020-04-23'),
(34, 4, 363, 10, 'Jabón para Ropa Casa Blanca', 1, 4, 'CB1(2).jpg', 8, 'yt39hx', '', '2020-04-23'),
(35, 5, 54, 10, 'DvD Samsung Blu-Ray', 1, 61, 'Dvd6.jpg', 1, 'yt39hx', '', '2020-04-23');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
