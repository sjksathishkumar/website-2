-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 02:04 PM
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
(1, 'Employee', 'emp_login'),
(2, 'User Admin', 'user_admin_login'),
(3, 'Data Entry Operators', 'deo_login');

-- --------------------------------------------------------

--
-- Table structure for table `claim_request`
--

CREATE TABLE IF NOT EXISTS `claim_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `claim_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `claim_request`
--

INSERT INTO `claim_request` (`id`, `claim_id`, `emp_id`, `type`, `amount`, `date`, `description`, `status`) VALUES
(1, 1, 'BTIP001', 'claim', 12324, '2013-04-02', 'sfsfsd', 'posted'),
(2, 2, 'BTIP001', 'claim', 12112, '2013-04-20', 'sdasdfasf', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `no_admin` int(11) NOT NULL,
  `primary_admin` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `code`, `name`, `no_admin`, `primary_admin`, `status`) VALUES
(1, 'BTIP', 'Bass Techs India Pvt., Ltd.,', 3, 'gunadat', 'Demo'),
(5, 'ABCD', 'abcd india', 0, 'priyanka', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_admin`
--

CREATE TABLE IF NOT EXISTS `company_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company_admin`
--

INSERT INTO `company_admin` (`id`, `company_code`, `admin_name`) VALUES
(1, 'BTIP', 'gunadat'),
(2, 'BTIP', 'admin'),
(5, 'ABCD', 'priyanka');

-- --------------------------------------------------------

--
-- Table structure for table `company_branch`
--

CREATE TABLE IF NOT EXISTS `company_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company_branch`
--

INSERT INTO `company_branch` (`id`, `company_code`, `branch_code`, `branch_name`) VALUES
(1, 'BTIP', 'BR11', 'Chennai'),
(2, 'BTIP', 'BR12', 'Bangalore'),
(6, 'BTIP', 'BR13', 'Madurai'),
(7, 'BTIP', 'BR14', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `company_dept`
--

CREATE TABLE IF NOT EXISTS `company_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(100) NOT NULL,
  `dept_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `company_dept`
--

INSERT INTO `company_dept` (`id`, `company_code`, `dept_code`) VALUES
(24, 'BTIP', 'DPT02'),
(25, 'BTIP', 'DPT04'),
(26, 'BTIP', 'DPT03'),
(27, 'BTIP', 'DPT05'),
(28, 'BTIP', 'DPT06'),
(29, 'BTIP', 'DPT08'),
(44, 'BTIP', 'DPT07');

-- --------------------------------------------------------

--
-- Table structure for table `company_desg`
--

CREATE TABLE IF NOT EXISTS `company_desg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(100) NOT NULL,
  `desg_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company_desg`
--

INSERT INTO `company_desg` (`id`, `company_code`, `desg_code`) VALUES
(2, 'BTIP', 'DESG02'),
(5, 'BTIP', 'DESG06'),
(7, 'BTIP', 'DESG8'),
(8, 'BTIP', 'DESG01');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `code`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`) VALUES
(1, 'BTIP', 'Chennai-160', 'info@basstechs.com', 'www.basstechs.com', 'dfsdfsfsfsfd', '1111111111111', '044-2245854', '9786903717', '1', 'company_logo/btip_bcd3020b-e88b-4dbe-b7c9-39a222c135f6_6.jpg', 'BTIP'),
(4, 'ABCD', '', '', '', '', '', '', '', '', 'company_logo/abcd_a488a0f4-7d8e-4ac2-a43b-2d89fb67446b_20.jpg', 'ABCD');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `deo_details`
--

INSERT INTO `deo_details` (`id`, `deo_id`, `company_code`, `doj`, `work_hour`, `status`) VALUES
(1, 'BTIP-DEO001', 'BTIP', '2013-11-30', 12, 'ST03'),
(2, 'BTIP-DEO6243', 'BTIP', '2013-11-25', 12, 'ST02'),
(5, 'ABCD-DEO9084', 'ABCD', '2013-03-25', 12, 'ST01');

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
  `disp_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deo_login`
--

INSERT INTO `deo_login` (`id`, `deo_id`, `user_name`, `user_pwd`, `user_email`, `disp_name`) VALUES
(1, 'BTIP-DEO001', 'gunadat', '493f73746a284ae6e5d487fad7f30163', 'gunadat@gmail.com', 'Gunasegar Mani'),
(2, 'BTIP-DEO6243', 'gunadat', '493f73746a284ae6e5d487fad7f30163', 'asdfsdadadsad sadsa dad', 'Gunasegar Mani'),
(3, 'ABCD-DEO9084', 'gunadat1', 'e10adc3949ba59abbe56e057f20f883e', '', 'Guna'),
(4, 'BTIP-DEO002', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'info@basstechs.com', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(7, 'DPT07', 'Research and Development'),
(8, 'DPT08', 'Business Development'),
(10, 'DPT09', 'operations'),
(23, 'DPT10', '12345'),
(24, 'DPT11', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des_code` varchar(100) NOT NULL,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(7, 'DESG07', 'Office Assistant'),
(9, 'DESG8', 'management team'),
(22, 'DESG9', '12345');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `emp_id`, `working_days`, `present_days`, `no_leave`, `month`, `year`, `lop_days`) VALUES
(1, 'BTIP1111', 30, 28, 2, 'March', '2013', 0),
(2, 'BTIP303', 30, 28, 2, 'March', '2013', 0),
(3, 'BTIP509', 30, 20, 10, 'March', '2013', 0),
(4, 'BTIP325', 30, 25, 5, 'March', '2013', 0),
(5, 'BTIP694', 30, 28, 2, 'March', '2013', 1),
(6, 'BTIP323', 30, 28, 2, 'March', '2013', 0),
(7, 'BTIP521', 30, 29, 1, 'March', '2013', 0),
(8, 'BTIP749', 30, 15, 15, 'March', '2013', 0),
(9, 'BTIP369', 30, 29, 1, 'March', '2013', 0),
(10, 'BTIP563', 30, 20, 10, 'March', '2013', 2),
(11, 'BTIP961', 30, 19, 11, 'March', '2013', 0),
(12, 'BTIP232', 30, 29, 1, 'March', '2013', 0),
(13, 'BTIP745', 30, 28, 2, 'March', '2013', 0),
(14, 'BTIP383', 30, 29, 1, 'March', '2013', 0),
(15, 'BTIP478', 30, 29, 1, 'March', '2013', 0),
(16, 'BTIP989', 30, 29, 1, 'March', '2013', 0),
(17, 'BTIP830', 30, 30, 0, 'March', '2013', 0),
(18, 'BTIP747', 30, 30, 0, 'March', '2013', 0),
(19, 'BTIP365', 30, 30, 0, 'March', '2013', 5),
(20, 'BTIP632', 30, 30, 0, 'March', '2013', 0),
(21, 'BTIP589', 30, 29, 1, 'March', '2013', 0),
(22, 'BTIP032', 30, 30, 0, 'March', '2013', 0),
(23, 'BTIP345', 30, 30, 0, 'March', '2013', 0),
(24, 'BTIP496', 30, 29, 1, 'March', '2013', 0),
(25, 'BTIP418', 30, 29, 1, 'March', '2013', 0),
(26, 'BTIP298', 30, 30, 0, 'March', '2013', 0),
(27, 'BTIP743', 30, 30, 0, 'March', '2013', 0),
(28, 'BTIP870', 30, 30, 0, 'March', '2013', 2),
(29, 'BTIP503', 30, 30, 0, 'March', '2013', 0),
(30, 'BTIP905', 30, 30, 0, 'March', '2013', 0),
(31, 'BTIP698', 30, 30, 0, 'March', '2013', 0),
(32, 'BTIP638', 30, 30, 0, 'March', '2013', 0),
(33, 'BTIP309', 30, 30, 0, 'March', '2013', 0),
(34, 'BTIP432', 30, 30, 0, 'March', '2013', 0),
(35, 'BTIP703', 30, 30, 0, 'March', '2013', 0),
(36, 'BTIP361', 30, 28, 2, 'March', '2013', 0),
(37, 'BTIP143', 30, 28, 2, 'March', '2013', 1),
(38, 'BTIP001', 30, 30, 0, 'March', '2013', 0),
(39, 'BTIP002', 30, 30, 0, 'March', '2013', 0),
(40, 'BTIP7852', 30, 30, 0, 'March', '2013', 0),
(42, 'BTIP129', 30, 28, 2, 'March', '2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_claims`
--

CREATE TABLE IF NOT EXISTS `emp_claims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `claim_month` varchar(100) NOT NULL,
  `claim_amount` varchar(100) NOT NULL,
  `app_amount` int(11) NOT NULL,
  `claim_pro_month` varchar(100) NOT NULL,
  `claim_status` varchar(100) NOT NULL,
  `description` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_claims`
--

INSERT INTO `emp_claims` (`id`, `emp_id`, `company_code`, `claim_month`, `claim_amount`, `app_amount`, `claim_pro_month`, `claim_status`, `description`) VALUES
(1, 'BTIP001', 'BTIP', 'Apr-2013', '12324', 1121, 'Jun-2013', 'approved', 'Approved'),
(2, 'BTIP001', 'BTIP', 'Apr-2013', '12112', 0, 'December', 'pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `emp_comp_details`
--

CREATE TABLE IF NOT EXISTS `emp_comp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_acc_no` varchar(100) NOT NULL,
  `pf_no` varchar(100) NOT NULL,
  `esi_no` varchar(100) NOT NULL,
  `driving_license` varchar(100) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `bank_branch` varchar(225) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `micr_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `emp_comp_details`
--

INSERT INTO `emp_comp_details` (`id`, `emp_id`, `company_code`, `branch`, `pan_no`, `bank_name`, `bank_acc_no`, `pf_no`, `esi_no`, `driving_license`, `passport`, `bank_branch`, `ifsc_code`, `micr_code`) VALUES
(1, 'BTIP001', 'BTIP', 'Mumbai', '', '', '', '', '', '', '', '', '', ''),
(2, 'BTIP1111', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(3, 'BTIP7852', 'BTIP', 'Bangalore', '', '', '', '', '', '', '', '', '', ''),
(118, 'BTIP129', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(119, 'BTIP303', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(120, 'BTIP509', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(121, 'BTIP325', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(122, 'BTIP694', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(123, 'BTIP323', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(124, 'BTIP521', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(125, 'BTIP749', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(126, 'BTIP369', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(127, 'BTIP563', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(128, 'BTIP961', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(129, 'BTIP232', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(130, 'BTIP745', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(131, 'BTIP383', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(132, 'BTIP478', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(133, 'BTIP989', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(134, 'BTIP830', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(135, 'BTIP747', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(136, 'BTIP365', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(137, 'BTIP632', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(138, 'BTIP589', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(139, 'BTIP032', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(140, 'BTIP345', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(141, 'BTIP496', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(142, 'BTIP418', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(143, 'BTIP298', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(144, 'BTIP743', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(145, 'BTIP870', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(146, 'BTIP503', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(147, 'BTIP905', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(148, 'BTIP698', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(149, 'BTIP638', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(150, 'BTIP309', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(151, 'BTIP432', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(152, 'BTIP703', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(153, 'BTIP361', 'BTIP', 'Chennai', '', '', '', '', '', '', '', '', '', ''),
(154, 'BTIP143', 'BTIP', 'Bangalore', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_daily_attandance`
--

CREATE TABLE IF NOT EXISTS `emp_daily_attandance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `shift_base` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `emp_daily_attandance`
--

INSERT INTO `emp_daily_attandance` (`id`, `emp_id`, `company_id`, `shift_base`, `date`, `in_time`, `out_time`) VALUES
(1, 'BTIP001', 'BTIP', '1', '2013-03-04', '09:45:00', '06:00:00'),
(2, 'BTIP001', 'BTIP', '1', '2013-03-03', '09:00:00', '07:30:00'),
(3, 'BTIP001', 'BTIP', '1', '2013-03-10', '09:00:00', '07:30:00'),
(4, 'BTIP001', 'BTIP', '1', '2013-03-03', '09:00:00', '08:30:00'),
(6, 'BTIP002', 'BTIP', '1', '2013-03-01', '09:00:00', '02:30:00'),
(7, 'BTIP001', 'BTIP', '1', '2013-03-27', '09:00:00', '04:00:00'),
(8, 'BTIP001', 'BTIP', '1', '2013-03-30', '09:30:00', '06:00:00'),
(9, 'ABCD2427', 'ABCD', '1', '2013-03-01', '09:00:00', '06:30:00'),
(10, 'BTIP001', 'BTIP', '1', '2031-03-13', '09:00:00', '03:30:00'),
(11, 'BTIP002', 'BTIP', '1', '2013-05-02', '09:00:00', '12:00:00');

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
  `telephone` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `addr` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `emp_id`, `company_code`, `desig_code`, `dept_code`, `dob`, `doj`, `telephone`, `mobile`, `email_id`, `photo`, `status`, `addr`) VALUES
(1, 'BTIP001', 'BTIP', 'DESG03', 'DPT01', '1987-05-27', '2013-02-04', '044-2245854', '9786903717', 'gunadat@gmail.com', 'photos/btip001-gunasegar mani-11-11-13.jpg', 'ST01', 'Chennai-5'),
(2, 'BTIP1111', 'BTIP', 'DESG03', 'DPT01', '1987-03-10', '2012-03-01', '', '', '', 'photos/btip1111-admin-08-27-28.jpg', 'ST01', 'Madurai-66'),
(5, 'BTIP7852', 'BTIP', 'DESG03', 'DPT01', '1987-11-12', '2012-01-01', '', '', '', 'photos/btip7852-rajasekar.jpg', 'ST01', ''),
(195, 'BTIP129', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', 'photos/btip129-balaji r.jpg', '', ''),
(196, 'BTIP303', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(197, 'BTIP509', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(198, 'BTIP325', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(199, 'BTIP694', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(200, 'BTIP323', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(201, 'BTIP521', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(202, 'BTIP749', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(203, 'BTIP369', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(204, 'BTIP563', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(205, 'BTIP961', 'BTIP', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(206, 'BTIP232', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(207, 'BTIP745', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(208, 'BTIP383', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(209, 'BTIP478', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(210, 'BTIP989', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(211, 'BTIP830', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(212, 'BTIP747', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(213, 'BTIP365', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(214, 'BTIP632', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(215, 'BTIP589', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(216, 'BTIP032', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(217, 'BTIP345', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(218, 'BTIP496', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(219, 'BTIP418', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(220, 'BTIP298', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(221, 'BTIP743', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(222, 'BTIP870', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(223, 'BTIP503', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(224, 'BTIP905', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(225, 'BTIP698', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(226, 'BTIP638', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(227, 'BTIP309', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(228, 'BTIP432', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(229, 'BTIP703', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(230, 'BTIP361', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(231, 'BTIP143', 'BTIP', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_esislab`
--

CREATE TABLE IF NOT EXISTS `emp_esislab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emp_esislab`
--

INSERT INTO `emp_esislab` (`id`, `company_code`, `slab_name`, `value`, `key_word`) VALUES
(1, 'BTIP', 'slab1', '12%', 'esi1'),
(2, 'BTIP', 'slab1', '12%', 'esi2'),
(3, 'BTIP', 'slab1', '15000', 'elig');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_slab`
--

CREATE TABLE IF NOT EXISTS `emp_leave_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `emp_leave_slab`
--

INSERT INTO `emp_leave_slab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES
(1, 'Slab1', 'SL', '10', 'Monthly'),
(4, 'Slab1', 'CL', '0', 'Monthly'),
(5, 'Slab1', 'SPL', '0', 'Monthly'),
(6, 'Slab1', 'HDW', '0', 'Monthly'),
(10, 'Slab2', 'SL', '1', 'Monthly'),
(11, 'Slab2', 'CL', '1', 'Monthly'),
(24, 'Slab1', 'CMP', '1', 'Monthly'),
(25, 'Slab1', 'WFH', '0', 'Monthly'),
(26, 'Slab1', 'PER', '0', 'Monthly'),
(28, 'Slab2', 'SPL', '0', 'Monthly'),
(29, 'Slab2', 'HDW', '0', 'Monthly'),
(30, 'Slab2', 'CMP', '1', 'Monthly'),
(31, 'Slab2', 'WFH', '1', 'Monthly'),
(33, 'Slab2', 'PER', '1', 'Monthly');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_leave_status`
--

INSERT INTO `emp_leave_status` (`id`, `emp_id`, `company_id`, `leave_eligible`, `leave_acquired`, `leave_remaining`) VALUES
(1, 'BTIP001', 'BTIP', 18, 2, 16),
(2, 'BTIP002', 'BTIP', 16, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE IF NOT EXISTS `emp_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`id`, `company_code`, `user_pwd`, `disp_name`, `user_name`) VALUES
(1, 'BTIP', '1fd96777aedeadb325c66f3780054765', 'Priyanka', 'BTIP002'),
(2, 'BTIP', 'a664b17725e022847ef770cca39be454', 'Gunasegar Mani', 'BTIP001'),
(232, 'BTIP', 'a664b17725e022847ef770cca39be454', 'RAJASEKAR', 'BTIP7852'),
(233, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'BALAJI R', 'BTIP129'),
(234, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'L THOMAS', 'BTIP303'),
(235, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'JAYAKUMAR', 'BTIP509'),
(236, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SAMUEL S', 'BTIP325'),
(237, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'P MAHENDRA RAJA ', 'BTIP694'),
(238, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'V KUMARAVEL', 'BTIP323'),
(239, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SAHBAZ AHMED', 'BTIP521'),
(240, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'VARADHARAJ B', 'BTIP749'),
(241, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'DHANASEKARAN G', 'BTIP369'),
(242, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'DURAI MANIKANDAN R', 'BTIP563'),
(243, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'RANGARAJAN R', 'BTIP961'),
(244, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SRIRAM PRASAD R', 'BTIP232'),
(245, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'NATESAN R', 'BTIP745'),
(246, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'THUKILAN S', 'BTIP383'),
(247, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'LOGANTHAN D', 'BTIP478'),
(248, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'MANIKANDAN V', 'BTIP989'),
(249, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SHAHINSA T', 'BTIP830'),
(250, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SARAVANAN S', 'BTIP747'),
(251, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'GANESH S', 'BTIP365'),
(252, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'ALICEAN B', 'BTIP632'),
(253, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'MANI MARAN M', 'BTIP589'),
(254, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'PANDIYAN G', 'BTIP032'),
(255, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'VISHNU VARDHANAN R R', 'BTIP345'),
(256, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'DHEENA DHAYALAN A', 'BTIP496'),
(257, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'RAJA RAMAN R', 'BTIP418'),
(258, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'MOHAMMED UMER AKTHAR A', 'BTIP298'),
(259, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'PRAVEEN THOMAS F', 'BTIP743'),
(260, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'KAMALA KANNAN.R', 'BTIP870'),
(261, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'THIYAGARAJAN.P', 'BTIP503'),
(262, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'ASHOK KUMAR.R', 'BTIP905'),
(263, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SHIVA KUMAR.S', 'BTIP698'),
(264, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'MANIKANDAN.K', 'BTIP638'),
(265, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'PRAVEEN SINGH.S', 'BTIP309'),
(266, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'KANDAN.N', 'BTIP432'),
(267, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'DANIEL JEYARAJ.A', 'BTIP703'),
(268, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'SELVA KUMAR.I', 'BTIP361'),
(269, 'BTIP', 'fa3e5edac607a88d8fd7ecb9d6d67424', 'BOOPATHI.P', 'BTIP143'),
(270, 'BTIP', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'BTIP1111');

-- --------------------------------------------------------

--
-- Table structure for table `emp_notification`
--

CREATE TABLE IF NOT EXISTS `emp_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(225) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `exp_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emp_notification`
--


-- --------------------------------------------------------

--
-- Table structure for table `emp_paydetails`
--

CREATE TABLE IF NOT EXISTS `emp_paydetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(100) NOT NULL,
  `pay_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `emp_paydetails`
--

INSERT INTO `emp_paydetails` (`id`, `company_code`, `pay_name`) VALUES
(1, 'BTIP', 'slab1'),
(2, 'BTIP', 'slab2'),
(3, 'BTIP', 'slab3'),
(15, 'BTIP', 'slab4');

-- --------------------------------------------------------

--
-- Table structure for table `emp_paygen`
--

CREATE TABLE IF NOT EXISTS `emp_paygen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `pay_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `emp_paygen`
--

INSERT INTO `emp_paygen` (`id`, `emp_id`, `pay_month`, `pay_year`, `pay_status`) VALUES
(1, 'BTIP002', 'March', 2013, 'PAID'),
(2, 'BTIP001', 'March', 2013, 'PAID'),
(3, 'BTIP7852', 'March', 2013, 'PAID'),
(4, 'BTIP129', 'March', 2013, 'PAID'),
(5, 'BTIP303', 'March', 2013, 'PAID'),
(6, 'BTIP509', 'March', 2013, 'PAID'),
(7, 'BTIP325', 'March', 2013, 'PAID'),
(8, 'BTIP694', 'March', 2013, 'PAID'),
(9, 'BTIP323', 'March', 2013, 'PAID'),
(10, 'BTIP521', 'March', 2013, 'PAID'),
(11, 'BTIP749', 'March', 2013, 'PAID'),
(12, 'BTIP369', 'March', 2013, 'PAID'),
(13, 'BTIP563', 'March', 2013, 'PAID'),
(14, 'BTIP961', 'March', 2013, 'PAID'),
(15, 'BTIP232', 'March', 2013, 'PAID'),
(16, 'BTIP745', 'March', 2013, 'PAID'),
(17, 'BTIP383', 'March', 2013, 'PAID'),
(18, 'BTIP478', 'March', 2013, 'PAID'),
(19, 'BTIP989', 'March', 2013, 'PAID'),
(20, 'BTIP830', 'March', 2013, 'PAID'),
(21, 'BTIP747', 'March', 2013, 'PAID'),
(22, 'BTIP365', 'March', 2013, 'PAID'),
(23, 'BTIP632', 'March', 2013, 'PAID'),
(24, 'BTIP589', 'March', 2013, 'PAID'),
(25, 'BTIP032', 'March', 2013, 'PAID'),
(26, 'BTIP345', 'March', 2013, 'PAID'),
(27, 'BTIP496', 'March', 2013, 'PAID'),
(28, 'BTIP418', 'March', 2013, 'PAID'),
(29, 'BTIP298', 'March', 2013, 'PAID'),
(30, 'BTIP743', 'March', 2013, 'PAID'),
(31, 'BTIP870', 'March', 2013, 'PAID'),
(32, 'BTIP503', 'March', 2013, 'PAID'),
(33, 'BTIP905', 'March', 2013, 'PAID'),
(34, 'BTIP698', 'March', 2013, 'PAID'),
(35, 'BTIP638', 'March', 2013, 'PAID'),
(36, 'BTIP309', 'March', 2013, 'PAID'),
(37, 'BTIP432', 'March', 2013, 'PAID'),
(38, 'BTIP703', 'March', 2013, 'PAID'),
(39, 'BTIP361', 'March', 2013, 'PAID'),
(40, 'BTIP143', 'March', 2013, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_slab1`
--

CREATE TABLE IF NOT EXISTS `emp_pay_slab1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fields` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `emp_pay_slab1`
--

INSERT INTO `emp_pay_slab1` (`id`, `fields`, `slab_name`, `cal_from`, `key_word`) VALUES
(1, 'House Rent Allowance (HRA)', 'slab1', 'gross_pay', 'hra'),
(2, 'Conveyance Allowance (CA)', 'slab1', 'gross_pay', 'ca'),
(3, 'Special Allowance (SA)', 'slab1', 'gross_pay', 'sa'),
(4, 'Education Allowance (EA)', 'slab1', 'gross_pay', 'ea'),
(5, 'Medical Allowance (MA)', 'slab1', 'gross_pay', 'ma'),
(6, 'LTA', 'slab1', 'gross_pay', 'lta'),
(7, 'House Rent Allowance (HRA)', 'slab2', 'basic_pay', 'hra'),
(8, 'Conveyance Allowance (CA)', 'slab2', 'gross_pay', 'ca'),
(9, 'Special Allowance (SA)', 'slab2', 'gross_pay', 'sa'),
(10, 'Education Allowance (EA)', 'slab2', 'gross_pay', 'ea'),
(11, 'Medical Allowance (MA)', 'slab2', 'gross_pay', 'ma'),
(12, 'LTA', 'slab2', 'gross_pay', 'lta'),
(13, 'House Rent Allowance (HRA)', 'slab3', 'gross_pay', 'hra'),
(14, 'Conveyance Allowance (CA)', 'slab3', 'gross_pay', 'ca'),
(15, 'Special Allowance (SA)', 'slab3', 'gross_pay', 'sa'),
(16, 'Education Allowance (EA)', 'slab3', 'gross_pay', 'ea'),
(17, 'Medical Allowance (MA)', 'slab3', 'gross_pay', 'ma'),
(18, 'LTA', 'slab3', 'gross_pay', 'lta'),
(19, 'House Rent Allowance (HRA)', 'slab4', 'gross_pay', 'hra'),
(20, 'Conveyance Allowance (CA)', 'slab4', 'gross_pay', 'ca'),
(21, 'Special Allowance (SA)', 'slab4', 'gross_pay', 'sa'),
(22, 'Education Allowance (EA)', 'slab4', 'gross_pay', 'ea'),
(23, 'Medical Allowance (MA)', 'slab4', 'gross_pay', 'ma'),
(24, 'LTA', 'slab4', 'gross_pay', 'lta'),
(25, 'Basic', 'slab2', 'gross_pay', 'basic'),
(26, 'Basic', 'slab3', 'gross_pay', 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_slab2`
--

CREATE TABLE IF NOT EXISTS `emp_pay_slab2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `emp_pay_slab2`
--

INSERT INTO `emp_pay_slab2` (`id`, `value`, `slab_name`, `key_word`) VALUES
(1, '22% ', 'slab1', 'hra'),
(2, '4% ', 'slab1', 'ca'),
(3, '35% ', 'slab1', 'sa'),
(4, '6% ', 'slab1', 'ea'),
(5, '6% ', 'slab1', 'ma'),
(6, '6% ', 'slab1', 'lta'),
(12, '22% ', 'slab2', 'hra'),
(13, '4% ', 'slab2', 'ca'),
(14, '35% ', 'slab2', 'sa'),
(15, '4% ', 'slab2', 'ea'),
(16, '4% ', 'slab2', 'ma'),
(17, '6% ', 'slab2', 'lta'),
(22, '30% ', 'slab2', 'basic'),
(23, '22% ', 'slab3', 'hra'),
(24, '4% ', 'slab3', 'ca'),
(25, '35% ', 'slab3', 'sa'),
(26, '4% ', 'slab3', 'ea'),
(27, '4% ', 'slab3', 'ma'),
(28, '6% ', 'slab3', 'lta'),
(33, '60%', 'slab3', 'basic'),
(34, '4% ', 'slab4', 'hra'),
(35, '35% ', 'slab4', 'ca'),
(36, '4% ', 'slab4', 'sa'),
(37, '4% ', 'slab4', 'ea'),
(38, '6% ', 'slab4', 'ma'),
(39, '6%', 'slab4', 'lta');

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_structure`
--

CREATE TABLE IF NOT EXISTS `emp_pay_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `emp_pay_structure`
--

INSERT INTO `emp_pay_structure` (`id`, `pay_name`, `pay_type`, `amount`) VALUES
(2, 'slab1', 'Basic', 6500),
(3, 'slab2', 'gross_pay', 18000),
(4, 'slab3', 'CTC', 100000),
(14, 'slab4', 'Basic', 6250);

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_temp`
--

CREATE TABLE IF NOT EXISTS `emp_pay_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `pay_slab` varchar(225) NOT NULL,
  `esi_slab` varchar(50) NOT NULL,
  `epf_slab` varchar(50) NOT NULL,
  `pt_slab` varchar(50) NOT NULL,
  `leave_slab` varchar(50) NOT NULL,
  `ot_slab` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `emp_pay_temp`
--

INSERT INTO `emp_pay_temp` (`id`, `emp_id`, `pay_slab`, `esi_slab`, `epf_slab`, `pt_slab`, `leave_slab`, `ot_slab`, `pay_type`) VALUES
(1, 'BTIP001', 'slab1', 'slab1', 'slab1', 'Chennai', 'Slab2', '', 'Basic'),
(2, 'BTIP002', 'slab3', 'slab1', 'slab1', 'Chennai', 'Slab1', '', 'CTC'),
(3, 'BTIP7852', 'slab3', 'slab1', 'slab1', 'Chennai', 'Slab1', '', 'CTC'),
(42, 'BTIP129', 'slab3', 'slab1', 'slab1', 'Chennai', '', '', 'CTC'),
(43, 'BTIP303', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(44, 'BTIP703', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(45, 'BTIP509', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(46, 'BTIP325', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(47, 'BTIP694', 'slab4', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(48, 'BTIP323', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(49, 'BTIP521', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(50, 'BTIP749', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(51, 'BTIP369', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(52, 'BTIP563', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(53, 'BTIP961', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(54, 'BTIP232', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(55, 'BTIP745', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(56, 'BTIP383', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(57, 'BTIP478', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(58, 'BTIP989', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(59, 'BTIP830', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(60, 'BTIP747', 'slab4', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(61, 'BTIP365', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(62, 'BTIP632', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(63, 'BTIP589', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(64, 'BTIP032', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(65, 'BTIP345', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(66, 'BTIP496', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(67, 'BTIP418', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(68, 'BTIP298', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(69, 'BTIP743', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(70, 'BTIP870', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(71, 'BTIP503', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(72, 'BTIP905', 'slab4', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(73, 'BTIP698', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(74, 'BTIP638', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(75, 'BTIP309', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(76, 'BTIP432', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic'),
(77, 'BTIP361', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(78, 'BTIP143', 'slab2', 'slab1', 'slab1', 'Chennai', '', '', 'gross_pay'),
(79, 'BTIP1111', 'slab1', 'slab1', 'slab1', 'Chennai', '', '', 'Basic');

-- --------------------------------------------------------

--
-- Table structure for table `emp_personal_details`
--

CREATE TABLE IF NOT EXISTS `emp_personal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `fathers_name` varchar(225) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `emergency_number` bigint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_personal_details`
--

INSERT INTO `emp_personal_details` (`id`, `emp_id`, `company_code`, `first_name`, `last_name`, `fathers_name`, `gender`, `blood_group`, `city`, `state`, `pincode`, `marital_status`, `emergency_number`) VALUES
(1, 'BTIP001', 'BTIP', 'Gunasegar', 'Mani', 'Mani', 'Male', 'A1B ve', 'Pondicherry', 'Pondicherry', 605008, 'Single', 9360513624),
(2, 'BTIP961', 'BTIP', 'Raja', 'RANGARAJAN', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_pfslab`
--

CREATE TABLE IF NOT EXISTS `emp_pfslab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `emp_pfslab`
--

INSERT INTO `emp_pfslab` (`id`, `company_code`, `pay_name`, `key_word`, `value`, `cal_from`) VALUES
(1, 'BTIP', 'slab1', 'pf1', '12', 'basic_pay'),
(2, 'BTIP', 'slab1', 'pf2', '12', 'basic_pay'),
(3, 'BTIP', 'slab1', 'ac', '0.5', 'total_epf_wages'),
(4, 'BTIP', 'slab1', 'acc21', '0.5', 'total_epf_wages'),
(5, 'BTIP', 'slab1', 'acc22', '0.01', 'total_epf_wages');

-- --------------------------------------------------------

--
-- Table structure for table `emp_ptdetails`
--

CREATE TABLE IF NOT EXISTS `emp_ptdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(100) NOT NULL,
  `pay_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_ptdetails`
--

INSERT INTO `emp_ptdetails` (`id`, `company_code`, `pay_name`) VALUES
(1, 'BTIP', 'Chennai'),
(2, 'BTIP', 'Madurai');

-- --------------------------------------------------------

--
-- Table structure for table `emp_ptslab`
--

CREATE TABLE IF NOT EXISTS `emp_ptslab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `field` varchar(225) NOT NULL,
  `value` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `emp_ptslab`
--

INSERT INTO `emp_ptslab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES
(1, 'Chennai', 'PT Employer Contribution', '1095', 'gross_pay'),
(2, 'Chennai', '0 to 21,000', '0', ''),
(3, 'Chennai', '21,001-30,000', '100', ''),
(4, 'Chennai', '30,001-45,000', '235', ''),
(5, 'Chennai', '45,001-60,000', '510', ''),
(6, 'Chennai', '60,001-75,000', '760', ''),
(7, 'Chennai', '75,001 and above', '1095', ''),
(23, 'Madurai', 'PT Employer Contribution', '1095', 'gross_pay'),
(24, 'Madurai', '0-21,000', '0', ''),
(25, 'Madurai', '21,001-30,000', '100', ''),
(26, 'Madurai', '30,001-45,000', '235', ''),
(27, 'Madurai', '45,001-60,000', '510', ''),
(28, 'Madurai', '60,001-75,000', '760', ''),
(29, 'Madurai', '75,001 and above', '1095', '');

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
-- Table structure for table `esi_master`
--

CREATE TABLE IF NOT EXISTS `esi_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esi_master`
--

INSERT INTO `esi_master` (`id`, `field`, `pay_name`, `cal_from`) VALUES
(1, 'ESI Employee Contribution', 'slab1', 'gross_pay'),
(2, 'ESI Employer Contribution', 'slab1', 'gross_pay'),
(3, 'ESI Eligibility', 'slab1', 'gross_pay');

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE IF NOT EXISTS `leave_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`id`, `company_code`, `slab_name`) VALUES
(1, 'BTIP', 'Slab1'),
(2, 'BTIP', 'Slab2');

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
(1, 'gunadat', 'gunadat@gmail.com', '493f73746a284ae6e5d487fad7f30163', 'Gunasegar Mani');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_status`
--

CREATE TABLE IF NOT EXISTS `payroll_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payroll_status`
--

INSERT INTO `payroll_status` (`id`, `company_code`, `pay_month`, `pay_year`, `status`) VALUES
(1, 'BTIP', 'March', 2013, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `pf_master`
--

CREATE TABLE IF NOT EXISTS `pf_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pf_master`
--

INSERT INTO `pf_master` (`id`, `field`, `pay_name`, `key_word`, `cal_from`) VALUES
(1, 'PF Employee Contribution', 'slab1', 'pf1', 'basic_pay'),
(2, 'PF Employer Contribution', 'slab1', 'pf2', 'basic_pay'),
(3, 'Admin Charges', 'slab1', 'ac', 'total_epf_wages'),
(4, 'Account 21', 'slab1', 'acc21', 'total_epf_wages'),
(6, 'Account 22', 'slab1', 'acc22', 'total_epf_wages');

-- --------------------------------------------------------

--
-- Table structure for table `pt_master`
--

CREATE TABLE IF NOT EXISTS `pt_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pt_master`
--

INSERT INTO `pt_master` (`id`, `field`, `cal_from`) VALUES
(1, 'PT Employer Contribution', 'gross_pay'),
(2, 'up to 21,000', ''),
(3, '21,001-30,000', ''),
(4, '30,001-45,000', ''),
(5, '45,001-60,000', ''),
(6, '60,001-75,000', ''),
(7, '75,001 and above', '');

-- --------------------------------------------------------

--
-- Table structure for table `salary_temp`
--

CREATE TABLE IF NOT EXISTS `salary_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `salary_temp`
--

INSERT INTO `salary_temp` (`id`, `name`, `type`) VALUES
(1, 'slab1', 'gross_pay'),
(2, 'slab1', 'basic_pay'),
(3, 'slab2', 'basic_pay'),
(4, 'slab2', 'gross_pay'),
(5, 'slab3', 'basic_pay'),
(6, 'slab3', 'gross_pay'),
(7, 'slab4', 'basic_pay'),
(8, 'slab4', 'gross_pay'),
(9, 'slab5', 'basic_pay'),
(10, 'slab5', 'gross_pay');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_admin_login`
--

INSERT INTO `user_admin_login` (`id`, `user_name`, `user_pwd`, `user_email`, `disp_name`) VALUES
(1, 'gunadat', '493f73746a284ae6e5d487fad7f30163', 'gunadat@gmail.com', 'Gunasegar Mani'),
(2, 'deepika', '3dcec89bbac898667700f0d73db88a90', '', 'Deepika'),
(5, 'priyanka', '1fd96777aedeadb325c66f3780054765', '', 'Priyanka'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'info@basstechs.com', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE IF NOT EXISTS `working_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(100) NOT NULL,
  `no_days` int(11) NOT NULL,
  `working_day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `month`, `no_days`, `working_day`) VALUES
(1, 'January', 31, 30),
(2, 'February', 28, 30),
(3, 'March', 31, 30),
(4, 'April', 30, 30),
(5, 'May', 31, 30),
(6, 'June', 30, 30),
(7, 'July', 31, 30),
(8, 'August', 31, 30),
(9, 'September', 30, 30),
(10, 'October', 31, 30),
(11, 'November', 30, 30),
(12, 'December', 31, 30);
