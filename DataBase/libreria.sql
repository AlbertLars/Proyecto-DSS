-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2022 at 02:44 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `Carnet` varchar(125) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL,
  PRIMARY KEY (`Carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `ID_Autor` varchar(8) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Nacionalidad` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`ID_Autor`, `Nombres`, `Apellidos`, `Nacionalidad`) VALUES
('A056', 'Oscar', 'Wilde', 'Irlandesa'),
('A456', 'Ivonne', 'Delgado', 'SALVADORENA');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_Categoria` varchar(8) NOT NULL,
  `Nombre_Categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `Nombre_Categoria`) VALUES
('C120', 'Documentos '),
('C479', 'Documentos Oficiales'),
('C541', 'No Ficcion');

-- --------------------------------------------------------

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
CREATE TABLE IF NOT EXISTS `editorial` (
  `ID_Editorial` varchar(8) NOT NULL,
  `Nombre_Editorial` varchar(50) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editorial`
--

INSERT INTO `editorial` (`ID_Editorial`, `Nombre_Editorial`, `Pais`) VALUES
('E323', 'SANTILLANA', 'Colombia'),
('E839', 'UDB', 'El salvador');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `ID_Libro` varchar(8) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `ISBN` varchar(18) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Resumen` varchar(30) NOT NULL,
  `Ejemplares` int(10) NOT NULL,
  `Ano_edicion` varchar(11) NOT NULL,
  `ID_Categoria` varchar(8) NOT NULL,
  `ID_Editorial` varchar(8) NOT NULL,
  `ID_Autor` varchar(8) NOT NULL,
  PRIMARY KEY (`ID_Libro`),
  KEY `ID_Categoria` (`ID_Categoria`),
  KEY `ID_Autor` (`ID_Autor`),
  KEY `ID_Editorial` (`ID_Editorial`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`ID_Libro`, `Titulo`, `ISBN`, `Descripcion`, `Resumen`, `Ejemplares`, `Ano_edicion`, `ID_Categoria`, `ID_Editorial`, `ID_Autor`) VALUES
('L066', 'CSS Manual avanzado', '978-84-415-2137-7', 'aaaaaaa', 'aaaaaa', 3, '2000', 'C120', 'E323', 'A456'),
('L100', 'PHP 5 a través de ejemplos', '978-84-415-2595-3', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 5, '2015', 'C120', 'E323', 'A456'),
('L536', 'Base de Datos', '777-77-8888-9', 'aaaaaaa', 'aaaaaa', 5, '2012', 'C479', 'E839', 'A056');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `ID_Prestamo` varchar(8) NOT NULL,
  `ID_Libro` varchar(8) NOT NULL,
  `Carnet` varchar(8) NOT NULL,
  `FP` date NOT NULL,
  `FR` date NOT NULL,
  `mora` float(10,4) NOT NULL,
  PRIMARY KEY (`ID_Prestamo`),
  KEY `ID_Libro` (`ID_Libro`),
  KEY `Carnet` (`Carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_Usuario` varchar(8) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido` varchar(120) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT '1',
  `Acceso` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`ID_Autor`) REFERENCES `autor` (`ID_Autor`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`ID_Editorial`) REFERENCES `editorial` (`ID_Editorial`);

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`ID_Libro`) REFERENCES `libro` (`ID_Libro`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`Carnet`) REFERENCES `alumnos` (`Carnet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
