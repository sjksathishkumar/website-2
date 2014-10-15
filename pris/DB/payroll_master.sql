-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2013 at 08:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `table_name`) VALUES
(1, 'Employee', 'emp_login'),
(2, 'User Admin', 'user_admin_login'),
(3, 'Data Entry Operators', 'deo_login'),
(4, 'Master Admin', 'master_admin_login');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `no_admin` int(11) NOT NULL,
  `primary_admin` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `domain_name` varchar(225) NOT NULL,
  `db_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `no_admin`, `primary_admin`, `status`, `domain_name`, `db_name`) VALUES
(1, 'Bass Techs India Pvt., Ltd.', 2, 'gunadat', 'Demo', 'btip001', 'payroll_btip001'),
(8, 'sadfasdfsad', 0, 'asdf', '', 'ASDF123', 'payroll_asdf123');

-- --------------------------------------------------------

--
-- Table structure for table `company_admin`
--

CREATE TABLE IF NOT EXISTS `company_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `display_name` varchar(225) NOT NULL,
  `domain_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `company_admin`
--

INSERT INTO `company_admin` (`id`, `user_name`, `display_name`, `domain_name`) VALUES
(1, 'gunadat', 'Gunasegar Mani', 'btip001'),
(2, 'admin', 'Administrator', 'btip001'),
(6, 'asdf', 'Rajasekar', 'ASDF123');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(100) NOT NULL,
  `addr` text NOT NULL,
  `mail_id` varchar(100) NOT NULL,
  `web_addr` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `tan_no` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `fax_no` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `emp_prefix` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `domain_name`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`) VALUES
(1, 'btip001', 'Chennai-160', 'info@basstechs.com', 'www.basstechs.com', 'dfsdfsfsfsfd', '1111111111111', '044-2245854', '9786903717', '1dasfafadf1', 'company_logo/BTIP-btip-08-51-22.jpg', 'BTIP'),
(13, 'ASDF123', '', 'asdf@gmail.com', '', '', '', '', '', '', '', '214123131231');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin_login`
--

CREATE TABLE IF NOT EXISTS `master_admin_login` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_admin_login`
--

INSERT INTO `master_admin_login` (`id`, `user_name`, `user_email`, `user_pwd`, `disp_name`, `status`) VALUES
(1, 'gunadat', 'gunadat@gmail.com', '493f73746a284ae6e5d487fad7f30163', 'Gunasegar Mani', 1);
