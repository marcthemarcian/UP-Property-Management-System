-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2014 at 06:00 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uppms`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposed`
--

CREATE TABLE IF NOT EXISTS `disposed` (
  `D_ID` int(11) NOT NULL AUTO_INCREMENT,
  `E_ID` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`D_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `disposed`
--

INSERT INTO `disposed` (`D_ID`, `E_ID`, `date_time`) VALUES
(1, 2, '2014-01-30 12:59:06'),
(2, 5, '2014-01-30 13:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `E_ID` int(11) NOT NULL AUTO_INCREMENT,
  `article` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `property_number` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `unit_measure` varchar(255) DEFAULT NULL,
  `unit_value` varchar(255) DEFAULT NULL,
  `OHC_quantity` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `point_person` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `date_acquired` date NOT NULL,
  `ohc_date` date NOT NULL,
  PRIMARY KEY (`E_ID`),
  UNIQUE KEY `property_number` (`property_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fixed`
--

CREATE TABLE IF NOT EXISTS `fixed` (
  `F_ID` int(11) NOT NULL AUTO_INCREMENT,
  `E_ID` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`F_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `removed_equipments`
--

CREATE TABLE IF NOT EXISTS `removed_equipments` (
  `RE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `E_ID` int(11) NOT NULL,
  `article` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `property_number` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `unit_measure` varchar(255) DEFAULT NULL,
  `unit_value` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `OHC_quantity` varchar(255) DEFAULT NULL,
  `shortage_overage` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `point_person` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `date_acquired` date NOT NULL,
  `ohc_date` date NOT NULL,
  PRIMARY KEY (`RE_ID`),
  UNIQUE KEY `property_number` (`property_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `removed_equipments`
--

INSERT INTO `removed_equipments` (`RE_ID`, `E_ID`, `article`, `description`, `account_title`, `property_number`, `location`, `unit_measure`, `unit_value`, `balance`, `OHC_quantity`, `shortage_overage`, `remarks`, `qr_code`, `point_person`, `department`, `date_time`, `file_path`, `date_acquired`, `ohc_date`) VALUES
(1, 8, 'sample8', 'sample8', 'sample8', 'sample8', 'sample8', 'sample8', 'sample8', '', '0', '', 'sample8', '', 'sample8', 'sample8', '2014-01-30 13:04:51', '', '0000-00-00', '0000-00-00'),
(2, 9, 'sample9', 'sample9', 'sample9', 'sample9', 'sample9', 'sample9', 'sample9', '', '0', '', 'sample9', '', 'sample9', 'sample9', '2014-02-10 09:25:40', '', '0000-00-00', '0000-00-00'),
(3, 10, 'sample10', 'sample10', 'sample10', 'sample10', 'sample10', 'sample10', 'sample10', '', '0', '', 'sample10', '', 'sample10', 'sample10', '2014-02-10 09:27:49', '', '0000-00-00', '0000-00-00'),
(4, 1, 'sample1', 'sample1', 'sample123', 'sample1', 'sample1', 'sample1', 'sample1', '', '0', '', 'sample1', '', 'sample1', 'sample1', '2014-02-10 09:37:46', '../qrcodes/UPPMS_1.png', '2014-02-01', '0000-00-00'),
(5, 2, 'sample2', 'sample2 ', 'sample 213', 'sample2 ', 'sample2 ', 'sample2 ', 'sample2 ', '', '0', '', 'sample2 ', '', 'sample2 ', 'sample2 ', '2014-02-10 09:44:29', '../qrcodes/UPPMS_2.png', '2014-02-01', '0000-00-00'),
(6, 11, 'sample20', 'sample20', 'sample20', 'sample20', 'sample20', 'sample20', 'sample20', 'sample20', '0', 'sample20', 'sample20', 'sample20', 'sample20', 'sample20', '2014-02-10 10:09:25', '', '2014-02-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `R_ID` int(11) NOT NULL AUTO_INCREMENT,
  `E_ID` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(16) NOT NULL,
  `user_type` varchar(2) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`U_ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `username`, `password`, `user_type`, `date_time`) VALUES
(1, 'admin', '1234', 'i', '2014-01-31 07:25:44'),
(2, 'admin1', '4321', 'v', '2014-01-31 07:25:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
