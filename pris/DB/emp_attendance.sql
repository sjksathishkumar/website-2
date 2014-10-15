-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2013 at 03:05 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE IF NOT EXISTS `emp_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `working_days` int(11) NOT NULL,
  `present_days` int(11) NOT NULL,
  `no_leave` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `lop_days` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `emp_id`, `working_days`, `present_days`, `no_leave`, `month`, `year`, `lop_days`) VALUES
(1, 'BTIP001', 30, 20, 10, 'March', '2013', 0),
(2, 'BTIP002', 30, 29, 1, 'March', '2013', 0),
(3, 'BTIP7852', 30, 2, 28, 'March', '2013', 0),
(78, 'BTIP011', 30, 29, 1, 'March', '2013', 0),
(79, 'BTIP012', 30, 28, 2, 'March', '2013', 0),
(80, 'BTIP013', 30, 20, 10, 'March', '2013', 0),
(81, 'BTIP014', 30, 25, 5, 'March', '2013', 0),
(82, 'BTIP015', 30, 28, 2, 'March', '2013', 1),
(83, 'BTIP016', 30, 28, 2, 'March', '2013', 0),
(84, 'BTIP017', 30, 29, 1, 'March', '2013', 0),
(85, 'BTIP018', 30, 15, 15, 'March', '2013', 0),
(86, 'BTIP019', 30, 29, 1, 'March', '2013', 0),
(87, 'BTIP0110', 30, 20, 10, 'March', '2013', 2),
(88, 'BTIP0111', 30, 19, 11, 'March', '2013', 0),
(89, 'BTIP0112', 30, 29, 1, 'March', '2013', 0),
(90, 'BTIP0113', 30, 28, 2, 'March', '2013', 0),
(91, 'BTIP0114', 30, 28, 2, 'March', '2013', 0),
(92, 'BTIP0115', 30, 29, 1, 'March', '2013', 0),
(93, 'BTIP0116', 30, 29, 1, 'March', '2013', 0),
(94, 'BTIP0117', 30, 30, 0, 'March', '2013', 0),
(95, 'BTIP0118', 30, 30, 0, 'March', '2013', 0),
(96, 'BTIP0119', 30, 30, 0, 'March', '2013', 5),
(97, 'BTIP0120', 30, 30, 0, 'March', '2013', 0),
(98, 'BTIP0121', 30, 30, 0, 'March', '2013', 0),
(99, 'BTIP0122', 30, 30, 0, 'March', '2013', 0),
(100, 'BTIP0123', 30, 30, 0, 'March', '2013', 0),
(101, 'BTIP0124', 30, 29, 1, 'March', '2013', 0),
(102, 'BTIP0125', 30, 29, 1, 'March', '2013', 0),
(103, 'BTIP0126', 30, 30, 0, 'March', '2013', 0),
(104, 'BTIP0127', 30, 30, 0, 'March', '2013', 0),
(105, 'BTIP0128', 30, 30, 0, 'March', '2013', 2),
(106, 'BTIP0129', 30, 30, 0, 'March', '2013', 0),
(107, 'BTIP0130', 30, 30, 0, 'March', '2013', 0),
(108, 'BTIP0131', 30, 30, 0, 'March', '2013', 0),
(109, 'BTIP0132', 30, 30, 0, 'March', '2013', 0),
(110, 'BTIP0133', 30, 30, 0, 'March', '2013', 0),
(111, 'BTIP0134', 30, 30, 0, 'March', '2013', 0),
(112, 'BTIP0135', 30, 30, 0, 'March', '2013', 0),
(113, 'BTIP0136', 30, 29, 1, 'March', '2013', 0),
(114, 'BTIP0137', 30, 30, 0, 'March', '2013', 0);
