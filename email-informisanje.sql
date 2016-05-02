-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 06:46 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email-informisanje`
--

-- --------------------------------------------------------

--
-- Table structure for table `abook`
--

DROP TABLE IF EXISTS `abook`;
CREATE TABLE IF NOT EXISTS `abook` (
  `idkomp` int(11) NOT NULL AUTO_INCREMENT,
  `poslednjidatum` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `lista500` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `komercijalista` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `pozicija` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `kontakt` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `www` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `mob` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ulicabroj` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `postbroj` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `drzava` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `grad` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `brojviljuskara` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `prvidatum` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `podkategorija` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `kategorija` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `napomena` text CHARACTER SET utf8,
  `kompanija` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pib` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `distributer` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT 'ne',
  `osvezeno` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Dodati 8 sati po zimskom računanju',
  `uneo` varchar(30) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'Korisnik koji je prvi uneo kontakt firme',
  `menjali` varchar(3000) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'Korisnici koji su menjali kontakt',
  `pemdat` date DEFAULT NULL COMMENT 'datum poslednjeg poslatog email-a',
  `serviser` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'Serviser koji je zadužen za firmu',
  `spem` date DEFAULT NULL COMMENT 'Datum poslednjeg poslatog emaila od strane servisera',
  `posserv` date DEFAULT NULL COMMENT 'Datum poslednjeg servisa',
  PRIMARY KEY (`idkomp`)
) ENGINE=MyISAM AUTO_INCREMENT=48871 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `imeiprezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `posao` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(64) CHARACTER SET latin1 NOT NULL,
  `salt` varchar(64) CHARACTER SET latin1 NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
