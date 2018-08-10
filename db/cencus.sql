-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2015 at 10:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cencus`
--

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE IF NOT EXISTS `lga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` text NOT NULL,
  `lga` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`id`, `state`, `lga`) VALUES
(1, '1', 'Okitipupa'),
(2, '1', 'Akure South'),
(3, '3', 'Ada'),
(4, '2', 'Ugwelehi'),
(5, '1', 'Ido'),
(6, '2', 'Usmandans fodio'),
(7, '1', 'Bolorunduro');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `oc`) VALUES
(1, 'Farming'),
(2, 'Student'),
(3, 'Civil Servant'),
(4, 'Driver'),
(5, 'Mechanic'),
(6, 'Doctor'),
(7, 'Carpenter'),
(8, 'Maid'),
(9, 'Dry Cleaner'),
(10, 'Mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `performancetab`
--

CREATE TABLE IF NOT EXISTS `performancetab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ifr` text NOT NULL,
  `tg` text NOT NULL,
  `st` int(11) NOT NULL,
  `lm` varchar(78) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `performancetab`
--

INSERT INTO `performancetab` (`id`, `ifr`, `tg`, `st`, `lm`) VALUES
(1, '1436873630', '1447504430', 1, '1438589424');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'Ondo'),
(2, 'Lagos'),
(3, 'Anambra'),
(4, 'Akwa Ibom'),
(5, 'Jos'),
(6, 'Enugu'),
(7, 'Osun'),
(8, 'Kebbi'),
(9, 'Edo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `pix` text NOT NULL,
  `sex` text NOT NULL,
  `bk` int(11) NOT NULL,
  `dateofbirth` int(11) NOT NULL,
  `lga` text NOT NULL,
  `occupation` text NOT NULL,
  `sto` text NOT NULL,
  `date` text NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `officer` text NOT NULL,
  `reg_state` text NOT NULL,
  `reg_lga` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `pix`, `sex`, `bk`, `dateofbirth`, `lga`, `occupation`, `sto`, `date`, `father`, `mother`, `officer`, `reg_state`, `reg_lga`) VALUES
(1, 'Registrar', 'Akinsuyi Grate Wilson', 'cliqs@403.com', 'cbaac6303676c08e8dfa39d51d0d09e947878ad5', '1274882akinsuyi.jpg', 'Male', 0, 0, '', '', '', '', '', '', '', '', ''),
(2, 'Registration Officer', 'Alake Juliet Sarah', 'sarah@gmail.com', 'be8ec20d52fdf21c23e83ba2bb7446a7fecb32ac', '14378452851 (34).jpg', 'Female', 0, 19, '', 'Dry Cleaner', '', '25 Jul 2015', '', '', 'Akinsuyi Grate Wilson', '1', 'Akure South'),
(3, 'People', 'Akindutire Ayomide', 'ak@a.com', '', '14382092821 (34).jpg', 'Female', 0, 23, 'Ido', 'Civil Servant', '1', '29 Jul 2015', 'Akindutire Simon', 'Oh Hhh', 'Alake Juliet Sarah', '1', 'Akure South');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
