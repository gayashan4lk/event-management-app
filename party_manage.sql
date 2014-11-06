-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2013 at 08:07 AM
-- Server version: 5.5.21
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `party_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_name` varchar(32) NOT NULL,
  `cust_add` varchar(32) NOT NULL,
  `cust_email` varchar(32) NOT NULL,
  `cust_tel_off` int(11) NOT NULL,
  `cust_tel_mob` int(11) NOT NULL,
  `un` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `cust_id` int(32) NOT NULL AUTO_INCREMENT,
  `contact_method` varchar(32) NOT NULL,
  `cust_order` varchar(32) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_name`, `cust_add`, `cust_email`, `cust_tel_off`, `cust_tel_mob`, `un`, `pw`, `cust_id`, `contact_method`, `cust_order`) VALUES
('prasanna', 'no 87 colombo 10', 'iusdissanayaka99@yahoo.com', 273284822, 712806784, 'admin', 'malee', 1, 'Telephone(Office)', 'Wedding party arrangement'),
('eran', 'hsdf', 'ds@ymail.com', 23, 0, 'podi', 'podi', 3, 'Telephone(Office)', 'Birthday party arrangement'),
('buddika', 'fgvh', ',n', 0, 0, 'rosi', 'rosi', 4, 'Telephone(Office)', 'Wedding party arrangement');

-- --------------------------------------------------------

--
-- Table structure for table `cust_comment`
--

CREATE TABLE IF NOT EXISTS `cust_comment` (
  `cust_com` varchar(255) NOT NULL,
  `ad_reply` varchar(100) NOT NULL,
  `cust_com_id` int(32) NOT NULL,
  `cust_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_comment`
--

INSERT INTO `cust_comment` (`cust_com`, `ad_reply`, `cust_com_id`, `cust_id`) VALUES
('hffjgf', 'hukahan', 0, 3),
('great party', 'hukahan', 0, 4),
('fuck you too', 'hukahan', 0, 4),
('fuck you too', '', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
