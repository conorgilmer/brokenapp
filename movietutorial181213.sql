-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2013 at 01:06 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movietutorial`
--
CREATE DATABASE IF NOT EXISTS `movietutorial` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `movietutorial`;

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'letmein');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(35) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Ireland'),
(2, 'USA'),
(3, 'France'),
(4, 'Norway'),
(5, 'Scotland'),
(6, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `mfs`
--

CREATE TABLE IF NOT EXISTS `mfs` (
  `mf_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_title` varchar(50) NOT NULL,
  PRIMARY KEY (`mf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mfs`
--

INSERT INTO `mfs` (`mf_id`, `mf_title`) VALUES
(12, 'Rowntree-Mac'),
(11, 'Nestles'),
(10, 'Storck'),
(9, 'Freia'),
(5, 'Cadburys'),
(6, 'Rowntree'),
(7, 'Jacobs'),
(8, 'Nestle'),
(22, 'Grays choc'),
(17, 'GlaxoSmithKline');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `taste` enum('Sweet','Sour','Savoury') NOT NULL,
  `description` varchar(50) NOT NULL,
  `imagefile` varchar(150) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `mf_id`, `title`, `price`, `taste`, `description`, `imagefile`, `country_id`) VALUES
(41, 9, 'Trokia', 1, 'Savoury', 'Never liked them funnily', '', 4),
(40, 9, 'Kwik Lunsj', 2, 'Sweet', 'Kit Kat Clone', '', 4),
(34, 5, 'Caramel', 1, 'Sweet', ' Carmel covered in Chocolate   \r\n ', '', 1),
(35, 6, 'Lemon Drops', 2, 'Sour', '', '', 2),
(36, 7, 'Fig Rolls', 2, 'Sweet', '      Its a mystery  \r\n    \r\n    \r\n  ', 'figroll90_1386018091.png', 1),
(46, 5, 'kinder', 12, 'Sweet', '  jkhkjhjkh    \r\n    \r\n  ', '', 1),
(42, 10, 'Reisen', 2, 'Sweet', '  Never knew who made them  \r\n  ', '', 6),
(43, 7, 'Lemon-Puffs', 3, 'Sweet', '    Lemon sugary cream inside biscuits    \r\n    \r\n', '', 2),
(76, 5, 'Custard Creams', 88, 'Sweet', '                hugu    \r\n    \r\n    \r\n    \r\n    \r\n', 'custard_1386018056.png', 1),
(101, 6, 'you', 7, 'Savoury', 'uuu    \r\n  ', 'jammy_1386078151.jpg', 1),
(100, 7, 'ytioh', 1, 'Sweet', 'ioihoi    \r\n  ', 'chocdig90_1386016135.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
