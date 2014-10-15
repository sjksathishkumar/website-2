-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2013 at 08:49 AM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `table_name`) VALUES
(1, 'Master Admin', 'master_admin_login'),
(2, 'User Admin', 'user_admin_login'),
(3, 'Data Entry Operators', 'deo_login');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `primary_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `code`, `name`, `primary_admin`) VALUES
(1, 'BTIP', 'Bass Techs India Pvt., Ltd.,', 'gunadat');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `emp_prefix` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `code`, `logo`, `emp_prefix`) VALUES
(1, 'BTIP', 'company_logo/btip.jpg', 'BTIP');

-- --------------------------------------------------------

--
-- Table structure for table `deo_details`
--

CREATE TABLE IF NOT EXISTS `deo_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deo_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `work_hour` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deo_details`
--

INSERT INTO `deo_details` (`id`, `deo_id`, `company_code`, `doj`, `work_hour`, `status`) VALUES
(1, 'BTIP-DEO001', 'BTIP', '2012-03-11', 12, 'ST01'),
(2, 'BTIP-DEO6243', 'BTIP', '2013-03-11', 12, 'ST01');

-- --------------------------------------------------------

--
-- Table structure for table `deo_login`
--

CREATE TABLE IF NOT EXISTS `deo_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deo_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `dis_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deo_login`
--

INSERT INTO `deo_login` (`id`, `deo_id`, `user_name`, `user_pwd`, `user_email`, `dis_name`) VALUES
(1, 'BTIP-DEO001', 'gunadat', '>8<?*7!20#', 'gunadat@gmail.com', 'Gunasegar Mani'),
(2, 'BTIP-DEO6243', 'gunadat', '>8<?*7!20#', '', 'Gunasegar Mani');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_code`, `dept_name`) VALUES
(1, 'DPT01', 'Human Resources'),
(2, 'DPT02', 'Financial'),
(3, 'DPT03', 'Purchasing'),
(4, 'DPT04', 'Sales'),
(5, 'DPT05', 'IT'),
(6, 'DPT06', 'Staff'),
(7, 'DPT07', 'Research & Development'),
(8, 'DPT08', 'Business Development');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des_code` varchar(100) NOT NULL,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `des_code`, `des_name`) VALUES
(1, 'DESG01', 'Managing Director'),
(2, 'DESG02', 'General Manager'),
(3, 'DESG03', 'Manager'),
(4, 'DESG04', 'Supervisor'),
(5, 'DESG05', 'Senior Assistant'),
(6, 'DESG06', 'Junior Assistant'),
(7, 'DESG07', 'Office Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE IF NOT EXISTS `emp_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `leave_acquired` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `emp_id`, `company_code`, `leave_acquired`, `month`, `year`) VALUES
(1, 'BTIP001', 'BTIP', 2, 'March', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `emp_comp_details`
--

CREATE TABLE IF NOT EXISTS `emp_comp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acc_no` varchar(100) NOT NULL,
  `pf_no` varchar(100) NOT NULL,
  `esi_no` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_comp_details`
--

INSERT INTO `emp_comp_details` (`id`, `emp_id`, `company_code`, `pan_no`, `bank_name`, `acc_no`, `pf_no`, `esi_no`) VALUES
(1, 'BTIP001', 'BTIP', '044-2245854', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `desig_code` varchar(100) NOT NULL,
  `dept_code` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `addr` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `emp_id`, `company_code`, `desig_code`, `dept_code`, `dob`, `doj`, `photo`, `status`, `addr`) VALUES
(1, 'BTIP001', 'BTIP', 'DESG01', 'DPT01', '1987-05-27', '2013-02-04', 'photos/btip1429-gunadat-07-36-18.jpg', 'ST01', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE IF NOT EXISTS `emp_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `leave_code` varchar(50) NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `emp_id`, `company_code`, `leave_code`, `pay_status`) VALUES
(1, 'BTIP001', 'BTIP', 'SL', '0');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_status`
--

CREATE TABLE IF NOT EXISTS `emp_leave_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `leave_eligible` int(11) NOT NULL,
  `leave_acquired` int(11) NOT NULL,
  `leave_remaining` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_leave_status`
--

INSERT INTO `emp_leave_status` (`id`, `emp_id`, `company_id`, `leave_eligible`, `leave_acquired`, `leave_remaining`) VALUES
(1, 'BTIP001', 'BTIP', 18, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE IF NOT EXISTS `emp_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`id`, `user_name`, `user_pwd`, `user_email`, `disp_name`, `emp_id`) VALUES
(1, 'gunadat', '>8<?*7!20#', '', 'Gunasegar Mani', 'BTIP001');

-- --------------------------------------------------------

--
-- Table structure for table `emp_paydetails`
--

CREATE TABLE IF NOT EXISTS `emp_paydetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `leave_eligible` int(11) NOT NULL,
  `leave_eligible_routine` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_paydetails`
--

INSERT INTO `emp_paydetails` (`id`, `emp_id`, `company_id`, `leave_eligible`, `leave_eligible_routine`) VALUES
(1, 'BTIP001', 'BTIP', 18, 'year');

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE IF NOT EXISTS `emp_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(100) NOT NULL,
  `status_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `emp_status`
--

INSERT INTO `emp_status` (`id`, `status_code`, `status_name`) VALUES
(1, 'ST01', 'Permanent'),
(2, 'ST02', 'Off-Site Employee'),
(3, 'ST03', 'Temporary'),
(4, 'ST04', 'On Contract');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_code` varchar(100) NOT NULL,
  `leave_name` varchar(100) NOT NULL,
  `pay_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_code`, `leave_name`, `pay_status`) VALUES
(1, 'SL', 'Sick Leave', 0),
(2, 'CL', 'Casual Leave', 0),
(3, 'SPL', 'Special Leave', 1),
(4, 'HDW', 'Holiday Work', 2),
(5, 'CMP', 'Comp Off', 1),
(6, 'WFH', 'Work From Home', 1),
(7, 'PER', 'Permission', 3);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_admin_login`
--

INSERT INTO `master_admin_login` (`id`, `user_name`, `user_email`, `user_pwd`, `disp_name`) VALUES
(1, 'gunadat', 'gunadat@gmail.com', '>8<?*7!20#', 'Gunasegar Mani');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_login`
--

CREATE TABLE IF NOT EXISTS `user_admin_login` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_admin_login`
--

INSERT INTO `user_admin_login` (`id`, `user_name`, `user_pwd`, `user_email`, `disp_name`) VALUES
(1, 'gunadat', '>8<?*7!20#', 'gunadat@gmail.com', 'Gunasegar Mani');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE IF NOT EXISTS `working_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(100) NOT NULL,
  `no_days` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `month`, `no_days`) VALUES
(1, 'January', 31),
(2, 'February', 28),
(3, 'March', 31),
(4, 'April', 30),
(5, 'May', 31),
(6, 'June', 30),
(7, 'July', 31),
(8, 'August', 31),
(9, 'September', 30),
(10, 'October', 31),
(11, 'November', 30),
(12, 'December', 31);
