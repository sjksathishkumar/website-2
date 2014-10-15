-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2013 at 01:02 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_btip001`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_days`
--

CREATE TABLE IF NOT EXISTS `business_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `week_date` varchar(225) NOT NULL,
  `day` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `actual_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `business_days`
--

INSERT INTO `business_days` (`id`, `year`, `month`, `week_date`, `day`, `name`, `actual_date`) VALUES
(1, 2013, 'January', '1', 'Tuesday', 'New Year Day', '2013-01-01'),
(2, 2013, 'January', '14', 'Monday', 'Pongal Festival', '2013-01-14'),
(3, 2013, 'January', '15', 'Tuesday', 'Thiruvalluvar Day', '2013-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `cal_from`
--

CREATE TABLE IF NOT EXISTS `cal_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cal_value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cal_from`
--

INSERT INTO `cal_from` (`id`, `cal_value`) VALUES
(1, 'Monthly'),
(2, 'Weekly'),
(3, 'Yearly');

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
-- Table structure for table `claim_master`
--

CREATE TABLE IF NOT EXISTS `claim_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `claim_master`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `claim_request`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `no_admin`, `primary_admin`, `status`, `domain_name`, `db_name`) VALUES
(1, 'Bass Tech', 2, 'gunadat', 'Demo', 'btip001', 'payroll_btip001');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_admin`
--

INSERT INTO `company_admin` (`id`, `user_name`, `display_name`, `domain_name`) VALUES
(1, 'gunadat', 'Gunasegar Mani', 'btip001'),
(2, 'admin', 'Administrator', 'btip001');

-- --------------------------------------------------------

--
-- Table structure for table `company_branch`
--

CREATE TABLE IF NOT EXISTS `company_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(50) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company_branch`
--

INSERT INTO `company_branch` (`id`, `branch_code`, `branch_name`) VALUES
(1, 'BR11', 'Chennai'),
(2, 'BR12', 'Bangalore'),
(6, 'BR13', 'Madurai'),
(7, 'BR14', 'Mumbai123'),
(8, 'BR15', 'TIRUNELVELI');

-- --------------------------------------------------------

--
-- Table structure for table `company_dept`
--

CREATE TABLE IF NOT EXISTS `company_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `company_dept`
--

INSERT INTO `company_dept` (`id`, `dept_code`, `dept_name`) VALUES
(3, 'DPT03', 'Finance'),
(4, 'DPT04', 'Sales'),
(5, 'DPT05', 'IT'),
(6, 'DPT06', 'Staff'),
(7, 'DPT07', 'Research and Development'),
(8, 'DPT08', 'Business Development'),
(13, 'DPT12', 'Service  NEW'),
(27, 'DPT13', 'Management Team'),
(28, 'DPT14', 'ITD'),
(32, 'DPT15', 'SUPER USER');

-- --------------------------------------------------------

--
-- Table structure for table `company_desg`
--

CREATE TABLE IF NOT EXISTS `company_desg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des_code` varchar(100) NOT NULL,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `company_desg`
--

INSERT INTO `company_desg` (`id`, `des_code`, `des_name`) VALUES
(2, 'DESG2', 'supervisor'),
(3, 'DESG3', 'managing partner'),
(4, 'DESG4', 'general manager'),
(5, 'DESG5', 'admin executive'),
(6, 'DESG6', 'project engineer'),
(7, 'DESG7', 'service engineer'),
(8, 'DESG8', 'design engineer'),
(9, 'DESG9', 'maintenance engineer'),
(24, 'DESG10', 'Mainteneance Executive'),
(27, 'DESG11', 'Office Assistant'),
(28, 'DESG12', 'SUPER USER NEW');

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
  `contactperson` varchar(50) NOT NULL,
  `contactmobile` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `domain_name`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`, `contactperson`, `contactmobile`) VALUES
(1, 'btip001', 'Chennai-160', 'info@basstechs.com', 'www.basstechs.com', 'qwertyuiop', 'fgfgfgfgfgfg', '044-2245854', '9786903717', 'Sakthivel', 'company_logo/admin-admin-07-46-05.jpg', 'BTIP', 'suman', '9750513415');

-- --------------------------------------------------------

--
-- Table structure for table `company_feature`
--

CREATE TABLE IF NOT EXISTS `company_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `ess` tinyint(4) NOT NULL,
  `it` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company_feature`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deo_details`
--


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
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deo_login`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `emp_id`, `working_days`, `present_days`, `no_leave`, `month`, `year`, `lop_days`) VALUES
(1, 'BTIP092', 30, 28, 2, 'June', '2013', 0),
(2, 'BTIP505', 30, 20, 10, 'June', '2013', 0),
(3, 'BTIP125', 30, 25, 5, 'June', '2013', 0),
(4, 'BTIP054', 30, 28, 2, 'June', '2013', 1),
(5, 'BTIP430', 30, 28, 2, 'June', '2013', 0),
(6, 'BTIP109', 30, 29, 1, 'June', '2013', 0),
(7, 'BTIP892', 30, 15, 15, 'June', '2013', 0),
(8, 'BTIP254', 30, 29, 1, 'June', '2013', 0),
(9, 'BTIP074', 30, 20, 10, 'June', '2013', 2),
(10, 'BTIP694', 30, 19, 11, 'June', '2013', 0),
(11, 'BTIP509', 30, 29, 1, 'June', '2013', 0),
(12, 'BTIP585', 30, 28, 2, 'June', '2013', 0),
(13, 'BTIP872', 30, 29, 1, 'June', '2013', 0),
(14, 'BTIP250', 30, 29, 1, 'June', '2013', 0),
(15, 'BTIP769', 30, 29, 1, 'June', '2013', 0),
(16, 'BTIP985', 30, 30, 0, 'June', '2013', 0),
(17, 'BTIP834', 30, 30, 0, 'June', '2013', 0),
(18, 'BTIP187', 30, 30, 0, 'June', '2013', 5),
(19, 'BTIP096', 30, 30, 0, 'June', '2013', 0),
(20, 'BTIP678', 30, 30, 0, 'June', '2013', 0),
(21, 'BTIP103', 30, 30, 0, 'June', '2013', 0),
(22, 'BTIP583', 30, 30, 0, 'June', '2013', 0),
(23, 'BTIP216', 30, 29, 1, 'June', '2013', 0),
(24, 'BTIP727', 30, 29, 1, 'June', '2013', 0),
(25, 'BTIP296', 30, 30, 0, 'June', '2013', 0),
(26, 'BTIP969', 30, 30, 0, 'June', '2013', 0),
(27, 'BTIP612', 30, 30, 0, 'June', '2013', 2),
(28, 'BTIP325', 30, 30, 0, 'June', '2013', 0),
(29, 'BTIP725', 30, 30, 0, 'June', '2013', 0),
(30, 'BTIP214', 30, 30, 0, 'June', '2013', 0),
(31, 'BTIP252', 30, 30, 0, 'June', '2013', 0),
(32, 'BTIP472', 30, 30, 0, 'June', '2013', 0),
(33, 'BTIP672', 30, 30, 0, 'June', '2013', 0),
(34, 'BTIP856', 30, 30, 0, 'June', '2013', 0),
(35, 'BTIP161', 30, 28, 2, 'June', '2013', 0),
(36, 'BTIP521', 30, 28, 2, 'June', '2013', 1),
(37, 'BTIP349', 30, 28, 2, 'June', '2013', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `emp_claims`
--

INSERT INTO `emp_claims` (`id`, `emp_id`, `company_code`, `claim_month`, `claim_amount`, `app_amount`, `claim_pro_month`, `claim_status`, `description`) VALUES
(1, 'BTIP092', '', 'Jun-2013', '1200', 0, '', 'rejected', 'dsfsdfsfs'),
(2, 'BTIP092', '', 'Jun-2013', '1200', 0, '', 'rejected', 'adsadasdad'),
(3, 'BTIP092', '', 'Jun-2013', '1200', 1200, 'Oct-2013', 'approved', 'sdafsfs'),
(4, 'BTIP092', '', 'Jun-2013', '1200', 1100, 'Jan-2013', 'approved', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `emp_claim_master`
--

CREATE TABLE IF NOT EXISTS `emp_claim_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `desg_code` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `emp_claim_master`
--

INSERT INTO `emp_claim_master` (`id`, `company_code`, `desg_code`, `value`, `cal_from`) VALUES
(1, '', 'Site Engineer', 15000, 'Monthly'),
(2, '', 'supervisor', 15000, 'Monthly'),
(3, '', 'managing partner', 10000, 'Monthly'),
(4, '', 'general manager', 10000, 'Monthly'),
(5, '', 'admin executive', 10000, 'Monthly'),
(6, '', 'project engineer', 10000, 'Monthly'),
(7, '', 'service engineer', 10000, 'Monthly'),
(8, '', 'design engineer', 10000, 'Monthly'),
(9, '', 'maintenance engineer', 10000, 'Monthly'),
(10, '', 'Mainteneance Executive', 10000, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `emp_comp_details`
--

CREATE TABLE IF NOT EXISTS `emp_comp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `emp_comp_details`
--

INSERT INTO `emp_comp_details` (`id`, `emp_id`, `branch`, `pan_no`, `bank_name`, `bank_acc_no`, `pf_no`, `esi_no`, `driving_license`, `passport`, `bank_branch`, `ifsc_code`, `micr_code`) VALUES
(1, 'BTIP092', '', '', '', '', 'TN/MAS/84226/03', '5121240787', '', '', '', '', ''),
(2, 'BTIP505', '', '', '', '', 'TN/MAS/84226/06', '-', '', '', '', '', ''),
(3, 'BTIP125', '', '', '', '', 'TN/MAS/84226/13', '5121240797', '', '', '', '', ''),
(4, 'BTIP054', '', '', '', '', 'TN/MAS/84226/14', '5121240798', '', '', '', '', ''),
(5, 'BTIP430', '', '', '', '', 'TN/MAS/84226/15', '-', '', '', '', '', ''),
(6, 'BTIP109', '', '', '', '', 'TN/MAS/84226/16', '-', '', '', '', '', ''),
(7, 'BTIP892', '', '', '', '', 'TN/MAS/84226/22', '-', '', '', '', '', ''),
(8, 'BTIP254', '', '', '', '', 'TN/MAS/84226/23', '-', '', '', '', '', ''),
(9, 'BTIP074', '', '', '', '', 'TN/MAS/84226/24', '-', '', '', '', '', ''),
(10, 'BTIP694', '', '', '', '', 'TN/MAS/84226/25', '-', '', '', '', '', ''),
(11, 'BTIP509', '', '', '', '', 'TN/MAS/84226/26', '-', '', '', '', '', ''),
(12, 'BTIP585', '', '', '', '', 'TN/MAS/84226/27', '5121983529', '', '', '', '', ''),
(13, 'BTIP872', '', '', '', '', 'TN/MAS/84226/28', '-', '', '', '', '', ''),
(14, 'BTIP250', '', '', '', '', 'TN/MAS/84226/29', '-', '', '', '', '', ''),
(15, 'BTIP769', '', '', '', '', 'TN/MAS/84226/30', '-', '', '', '', '', ''),
(16, 'BTIP985', '', '', '', '', 'TN/MAS/84226/32', '-', '', '', '', '', ''),
(17, 'BTIP834', '', '', '', '', 'TN/MAS/84226/34', '5121983532', '', '', '', '', ''),
(18, 'BTIP187', '', '', '', '', 'TN/MAS/84226/36', '5121983536', '', '', '', '', ''),
(19, 'BTIP096', '', '', '', '', 'TN/MAS/84226/37', '5121983537', '', '', '', '', ''),
(20, 'BTIP678', '', '', '', '', 'TN/MAS/84226/38', '5121983706', '', '', '', '', ''),
(21, 'BTIP103', '', '', '', '', 'TN/MAS/84226/39', '5121983728', '', '', '', '', ''),
(22, 'BTIP583', '', '', '', '', 'TN/MAS/84226/40', '5121983753', '', '', '', '', ''),
(23, 'BTIP216', '', '', '', '', 'TN/MAS/84226/41', '5122127192', '', '', '', '', ''),
(24, 'BTIP727', '', '', '', '', 'TN/MAS/84226/42', '5122127226', '', '', '', '', ''),
(25, 'BTIP296', '', '', '', '', 'TN/MAS/84226/43', '5122220235', '', '', '', '', ''),
(26, 'BTIP969', '', '', '', '', 'TN/MAS/84226/44', '5122220242', '', '', '', '', ''),
(27, 'BTIP612', '', '', '', '', 'TN/MAS/84226/45', '5122220247', '', '', '', '', ''),
(28, 'BTIP325', '', '', '', '', '-', '-', '', '', '', '', ''),
(29, 'BTIP725', '', '', '', '', '-', '-', '', '', '', '', ''),
(30, 'BTIP214', '', '', '', '', '-', '-', '', '', '', '', ''),
(31, 'BTIP252', '', '', '', '', '-', '-', '', '', '', '', ''),
(32, 'BTIP472', '', '', '', '', '-', '-', '', '', '', '', ''),
(33, 'BTIP672', '', '', '', '', '-', '-', '', '', '', '', ''),
(34, 'BTIP856', '', '', '', '', '-', '-', '', '', '', '', ''),
(35, 'BTIP161', '', '', '', '', '-', '-', '', '', '', '', ''),
(36, 'BTIP521', '', '', '', '', '-', '-', '', '', '', '', ''),
(37, 'BTIP349', '', '', '', '', '-', '-', '', '', '', '', ''),
(38, 'BTIP505', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'BTIP505', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'BTIP505', '', '', '', '', '', '234242', '', '', '', '', ''),
(41, 'BTIP505', '', '', '', '', '', '234242', '', '', '', '', ''),
(42, 'BTIP505', '', '', '', '', '', '234242', '', '', '', '', ''),
(43, 'BTIP303', '', '', '', '', '', '', '', '', '', '', ''),
(44, 'BTIP630', '', '', '', '', '', '', '', '', '', '', ''),
(45, 'BTIP567', '', '', '', '', '', '', '', '', '', '', ''),
(46, 'BTIP743', '', '', '', '', '', '', '', '', '', '', ''),
(47, 'BTIP832', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'BTIP123', '', '', '', '', '', '', '', '', '', '', ''),
(49, 'BTIP109', '', '', '', '', '', '', '', '', '', '', ''),
(50, 'BTIP296', '', '', '', '', '', '', '', '', '', '', ''),
(51, 'BTIP698', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'BTIP905', '', '', '', '', '', '', '', '', '', '', ''),
(53, 'BTIP056', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'BTIP856', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'BTIP785', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'BTIP056', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'BTIP501', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'BTIP674', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'BTIP143', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'BTIP418', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'BTIP941', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'BTIP836', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'BTIP925', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'BTIP252', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'BTIP309', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'BTIP090', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'BTIP541', '', '', '', '', '', '', '', '', '', '', ''),
(68, 'BTIP181', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'BTIP741', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'BTIP212', '', '', '', '', '', '', '', '', '', '', ''),
(71, 'BTIP783', '', '', '', '', '', '', '', '', '', '', ''),
(72, 'BTIP363', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'BTIP769', '', '', '', '', '', '', '', '', '', '', ''),
(74, 'BTIP298', '', '', '', '', '', '', '', '', '', '', ''),
(75, 'BTIP450', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'BTIP103', '', '', '', '', '', '', '', '', '', '', ''),
(77, 'BTIP787', '', '', '', '', '', '', '', '', '', '', ''),
(78, 'BTIP167', '', '', '', '', '', '', '', '', '', '', ''),
(79, 'BTIP416', '', '', '', '', '', '', '', '', '', '', ''),
(80, 'BTIP414', '', '', '', '', '', '', '', '', '', '', ''),
(81, 'BTIP545', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'BTIP896', '', '', '', '', '', '', '', '', '', '', ''),
(83, 'BTIP436', '', '', '', '', '', '', '', '', '', '', ''),
(84, 'BTIP141', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'BTIP674', '', '', '', '', '', '', '', '', '', '', ''),
(86, 'BTIP218', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'BTIP010', '', '', '', '', '', '', '', '', '', '', ''),
(88, 'BTIP725', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'BTIP496', '', '', '', '', '', '', '', '', '', '', ''),
(90, 'BTIP345', '', '', '', '', '', '', '', '', '', '', ''),
(91, 'BTIP230', '', '', '', '', '', '', '', '', '', '', ''),
(92, 'BTIP836', '', '', '', '', '', '', '', '', '', '', ''),
(93, 'BTIP503', '', '', '', '', '', '', '', '', '', '', ''),
(94, 'BTIP430', '', '', '', '', '', '', '', '', '', '', ''),
(95, 'BTIP658', '', '', '', '', '', '', '', '', '', '', ''),
(96, 'BTIP010', '', '', '', '', '', '', '', '', '', '', ''),
(97, 'BTIP325', '', '', '', '', '', '', '', '', '', '', ''),
(98, 'BTIP105', '', '', '', '', '', '', '', '', '', '', ''),
(99, 'BTIP165', '', '', '', '', '', '', '', '', '', '', ''),
(100, 'BTIP074', '', '', '', '', '', '', '', '', '', '', ''),
(101, 'BTIP072', '', '', '', '', '', '', '', '', '', '', ''),
(102, 'BTIP381', '', '', '', '', '', '', '', '', '', '', ''),
(103, 'BTIP343', '', '', '', '', '', '', '', '', '', '', ''),
(104, 'BTIP650', '', '', '', '', '', '', '', '', '', '', ''),
(105, 'BTIP541', '', '', '', '', '', '', '', '', '', '', ''),
(106, 'BTIP892', '', '', '', '', '', '', '', '', '', '', ''),
(107, 'BTIP147', '', '', '', '', '', '', '', '', '', '', ''),
(108, 'BTIP703', '', '', '', '', '', '', '', '', '', '', ''),
(109, 'BTIP034', '', '', '', '', '', '', '', '', '', '', ''),
(110, 'BTIP096', '', '', '', '', '', '', '', '', '', '', ''),
(111, 'BTIP981', '', '', '', '', '', '', '', '', '', '', ''),
(112, 'BTIP410', '', '', '', '', '', '', '', '', '', '', ''),
(113, 'BTIP767', '', '', '', '', '', '', '', '', '', '', ''),
(114, 'BTIP870', '', '', '', '', '', '', '', '', '', '', ''),
(115, 'BTIP214', '', '', '', '', '', '', '', '', '', '', ''),
(116, 'BTIP581', '', '', '', '', '', '', '', '', '', '', ''),
(117, 'BTIP0', 'ICICI', '23/07/2013', '1111111', 'Chennai', '1111111', '50000', '', '30', '1111111', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emp_daily_attandance`
--


-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `emp_id`, `desig_code`, `dept_code`, `dob`, `doj`, `telephone`, `mobile`, `email_id`, `photo`, `status`, `addr`) VALUES
(1, 'BTIP092', 'DESG01', 'DPT14', '1985-11-08', '2011-01-10', '', '', '', 'photos/btip092-gunasegar mani-10-14-02.jpg', '', ''),
(2, 'BTIP505', 'DESG2', 'DPT14', '1970-01-01', '2011-01-10', '', '', '', 'photos/btip505-l thomas.jpg', '', ''),
(3, 'BTIP125', 'DESG2', 'DPT14', '1970-01-01', '2011-01-10', '', '', '', 'photos/btip125-jayakumar.jpg', '', ''),
(4, 'BTIP054', 'DESG2', 'DPT14', '1970-01-01', '2011-01-10', '', '', '', 'photos/btip054-samuel s.jpg', '', ''),
(5, 'BTIP430', 'DESG3', 'DPT14', '1970-01-01', '2011-01-10', '', '', '', 'photos/btip430-p mahendra raja.jpg', '', ''),
(6, 'BTIP109', 'DESG3', 'DPT14', '1970-01-01', '2011-01-10', '', '', '', '', '', ''),
(7, 'BTIP892', 'DESG3', 'DPT16', '1970-01-01', '2012-01-06', '', '', '', '', '', ''),
(8, 'BTIP254', 'DESG3', 'DPT16', '1970-01-01', '2012-01-06', '', '', '', '', '', ''),
(9, 'BTIP074', 'DESG3', 'DPT16', '1970-01-01', '2012-01-06', '', '', '', 'photos/btip074-dhanasekaran g.jpg', '', ''),
(10, 'BTIP694', 'DESG3', 'DPT16', '1970-01-01', '2012-01-06', '', '', '', '', '', ''),
(11, 'BTIP509', 'DESG4', 'DPT13', '1970-01-01', '2012-01-06', '', '', '', '', '', ''),
(12, 'BTIP585', 'DESG5', 'DPT13', '1985-11-08', '2012-01-09', '', '', '', '', '', ''),
(13, 'BTIP872', 'DESG6', 'DPT14', '1979-04-10', '2012-01-09', '', '', '', '', '', ''),
(14, 'BTIP250', 'DESG6', 'DPT14', '1982-06-03', '2012-01-09', '', '', '', '', '', ''),
(15, 'BTIP769', 'DESG7', 'DPT14', '1983-08-29', '2012-01-09', '', '', '', '', '', ''),
(16, 'BTIP985', 'DESG8', 'DPT15', '1984-08-09', '2012-01-09', '', '', '', '', '', ''),
(17, 'BTIP834', 'DESG9', 'DPT14', '1990-03-21', '2012-01-09', '', '', '', '', '', ''),
(18, 'BTIP187', 'DESG9', 'DPT14', '1987-02-16', '2012-01-09', '', '', '', '', '', ''),
(19, 'BTIP096', 'DESG9', 'DPT14', '1989-07-03', '2012-01-09', '', '', '', '', '', ''),
(20, 'BTIP678', 'DESG9', 'DPT14', '1986-01-31', '2012-01-09', '', '', '', '', '', ''),
(21, 'BTIP103', 'DESG01', 'DPT14', '1987-10-11', '2012-01-09', '', '', '', '', '', ''),
(22, 'BTIP583', 'DESG01', 'DPT14', '1988-05-05', '2012-01-09', '', '', '', '', '', ''),
(23, 'BTIP216', 'DESG01', 'DPT14', '1970-01-01', '2012-01-12', '', '', '', '', '', ''),
(24, 'BTIP727', 'DESG01', 'DPT14', '1970-01-01', '2012-01-12', '', '', '', '', '', ''),
(25, 'BTIP296', 'DESG01', 'DPT14', '1991-02-27', '2013-01-01', '', '', '', '', '', ''),
(26, 'BTIP969', 'DESG01', 'DPT14', '1991-02-18', '2013-01-01', '', '', '', '', '', ''),
(27, 'BTIP612', 'DESG01', 'DPT11', '1983-08-01', '2013-01-01', '', '', '', '', '', ''),
(28, 'BTIP325', 'DESG6', 'DPT14', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(29, 'BTIP725', 'DESG10', 'DPT12', '1970-01-01', '2012-06-09', '', '', '', '', '', ''),
(30, 'BTIP214', 'DESG10', 'DPT12', '1970-01-01', '2012-08-11', '', '', '', '', '', ''),
(31, 'BTIP252', 'DESG6', 'DPT14', '1970-01-01', '2012-01-11', '', '', '', '', '', ''),
(32, 'BTIP472', 'DESG6', 'DPT14', '1970-01-01', '2012-01-11', '', '', '', '', '', ''),
(33, 'BTIP672', 'DESG6', 'DPT14', '1970-01-01', '2012-07-11', '', '', '', '', '', ''),
(34, 'BTIP856', 'DESG11', 'DPT13', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(35, 'BTIP161', 'DESG10', 'DPT12', '1970-01-01', '2012-12-12', '', '', '', '', '', ''),
(36, 'BTIP521', 'DESG6', 'DPT14', '1970-01-01', '2013-05-02', '', '', '', '', '', ''),
(37, 'BTIP349', 'DESG6', 'DPT14', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(38, 'BTIP303', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(39, 'BTIP630', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(40, 'BTIP567', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(41, 'BTIP743', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(42, 'BTIP832', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(43, 'BTIP123', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(44, 'BTIP109', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(45, 'BTIP296', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(46, 'BTIP698', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(47, 'BTIP905', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(48, 'BTIP056', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(49, 'BTIP856', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(50, 'BTIP785', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(51, 'BTIP056', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(52, 'BTIP501', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(53, 'BTIP674', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(54, 'BTIP143', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(55, 'BTIP418', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(56, 'BTIP941', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(57, 'BTIP836', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(58, 'BTIP925', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(59, 'BTIP252', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(60, 'BTIP309', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(61, 'BTIP090', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(62, 'BTIP541', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(63, 'BTIP181', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(64, 'BTIP741', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(65, 'BTIP212', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(66, 'BTIP783', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(67, 'BTIP363', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(68, 'BTIP769', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(69, 'BTIP298', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(70, 'BTIP450', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(71, 'BTIP103', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(72, 'BTIP787', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(73, 'BTIP167', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(74, 'BTIP416', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(75, 'BTIP414', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(76, 'BTIP545', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(77, 'BTIP896', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(78, 'BTIP436', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(79, 'BTIP141', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(80, 'BTIP674', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(81, 'BTIP218', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(82, 'BTIP010', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(83, 'BTIP725', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(84, 'BTIP496', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(85, 'BTIP345', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(86, 'BTIP230', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(87, 'BTIP836', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(88, 'BTIP503', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(89, 'BTIP430', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(90, 'BTIP658', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(91, 'BTIP010', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(92, 'BTIP325', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(93, 'BTIP105', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(94, 'BTIP165', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(95, 'BTIP074', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(96, 'BTIP072', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(97, 'BTIP381', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(98, 'BTIP343', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(99, 'BTIP650', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(100, 'BTIP541', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(101, 'BTIP892', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(102, 'BTIP147', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(103, 'BTIP703', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(104, 'BTIP034', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(105, 'BTIP096', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(106, 'BTIP981', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(107, 'BTIP410', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(108, 'BTIP767', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(109, 'BTIP870', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(110, 'BTIP214', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(111, 'BTIP581', '', '', '1970-01-01', '1970-01-01', '', '', '', '', '', ''),
(112, 'BTIP0', 'DESG12', 'DPT05', '0000-00-00', '0000-00-00', '', '23/07/2013', 'sakthivelaumkii@gmail.com', 'photos/btip0-.jpg', '', 'chennai');

-- --------------------------------------------------------

--
-- Table structure for table `emp_itslab`
--

CREATE TABLE IF NOT EXISTS `emp_itslab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `field` varchar(225) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `emp_itslab`
--

INSERT INTO `emp_itslab` (`id`, `slab_name`, `field`, `value`) VALUES
(1, 'Slab1', '0-300000', '30'),
(2, 'Slab1', '200001 - 600000 ', '30'),
(3, 'Slab1', '500001 - 11000000 ', '30'),
(4, 'Slab1', 'Above 15000000', '30'),
(5, 'Slab1', 'Education cess ( EC and SHEC )', '3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `emp_leave_slab`
--

INSERT INTO `emp_leave_slab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES
(1, 'Slab1', 'SL', '4', 'Monthly'),
(4, 'Slab1', 'CL', '2', 'Monthly'),
(5, 'Slab1', 'SPL', '1', 'Monthly'),
(6, 'Slab1', 'HDW', '0', 'Monthly'),
(10, 'Slab2', 'SL', '3', 'Monthly'),
(11, 'Slab2', 'CL', '3', 'Monthly'),
(24, 'Slab1', 'CMP', '1', 'Monthly'),
(25, 'Slab1', 'WFH', '1', 'Monthly'),
(26, 'Slab1', 'PER', '0', 'Monthly'),
(28, 'Slab2', 'SPL', '3', 'Monthly'),
(29, 'Slab2', 'HDW', '3', 'Monthly'),
(30, 'Slab2', 'CMP', '3', 'Monthly'),
(31, 'Slab2', 'WFH', '3', 'Monthly'),
(34, '', 'PER', '3', 'Monthly'),
(35, '', 'PER', '3', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_status`
--

CREATE TABLE IF NOT EXISTS `emp_leave_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `leave_eligible` int(11) NOT NULL,
  `leave_acquired` int(11) NOT NULL,
  `leave_remaining` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_leave_status`
--

INSERT INTO `emp_leave_status` (`id`, `emp_id`, `leave_eligible`, `leave_acquired`, `leave_remaining`) VALUES
(1, 'BTIP001', 18, 2, 16),
(2, 'BTIP002', 16, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_loan_master`
--

CREATE TABLE IF NOT EXISTS `emp_loan_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `emp_loan_master`
--

INSERT INTO `emp_loan_master` (`id`, `dept_code`, `value`, `cal_from`) VALUES
(1, 'DPT01', 2000, 'Weekly'),
(2, 'DPT04', 2000, 'Weekly'),
(3, 'DPT03', 2000, 'Weekly'),
(4, 'DPT05', 2000, 'Weekly'),
(5, 'DPT06', 2000, 'Weekly'),
(6, 'DPT08', 2000, 'Weekly'),
(7, 'DPT07', 2000, 'Monthly');

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
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emp_login`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_notification`
--

INSERT INTO `emp_notification` (`id`, `content`, `post_date`, `exp_date`, `status`, `emp_id`) VALUES
(1, 'ddgdfgd', '06/21/2013', '07/25/2013', 'opened', 'BTIP092');

-- --------------------------------------------------------

--
-- Table structure for table `emp_ot_slab`
--

CREATE TABLE IF NOT EXISTS `emp_ot_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `emp_ot_slab`
--

INSERT INTO `emp_ot_slab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES
(1, 'Slab1', 'Human Resources', '0', 'Monthly'),
(2, 'Slab1', 'Sales', '0', 'Monthly'),
(3, 'Slab1', 'Purchasing', '0', 'Monthly'),
(4, 'Slab1', 'IT', '0', 'Monthly'),
(5, 'Slab1', 'Staff', '0', 'Monthly'),
(6, 'Slab1', 'Business Development', '1', 'Monthly'),
(7, 'Slab1', 'Research and Development', '1', 'Monthly'),
(8, 'Slab1', 'Management Team', '1', 'Monthly'),
(9, 'Slab1', 'Junior Assistant', '1', 'Monthly'),
(10, 'Slab1', 'management team', '1', 'Monthly'),
(11, 'Slab1', 'Managing Director', '1', 'Monthly'),
(12, 'Slab2', 'Human Resources', '0', 'Monthly'),
(13, 'Slab2', 'Sales', '0', 'Monthly'),
(14, 'Slab2', 'Purchasing', '0', 'Monthly'),
(15, 'Slab2', 'IT', '0', 'Monthly'),
(16, 'Slab2', 'Staff', '1', 'Monthly'),
(17, 'Slab2', 'Business Development', '2', 'Monthly'),
(18, 'Slab2', 'Research and Development', '3', 'Monthly'),
(19, 'Slab2', 'Management Team', '6', 'Monthly'),
(20, 'Slab2', 'Junior Assistant', '5', 'Monthly'),
(21, 'Slab2', 'management team', '6', 'Monthly'),
(22, 'Slab2', 'Managing Director', '7', 'Monthly');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `emp_paygen`
--

INSERT INTO `emp_paygen` (`id`, `emp_id`, `pay_month`, `pay_year`, `pay_status`) VALUES
(1, 'BTIP092', 'June', 2013, 'PAID'),
(2, 'BTIP505', 'June', 2013, 'PAID'),
(3, 'BTIP125', 'June', 2013, 'PAID'),
(4, 'BTIP054', 'June', 2013, 'PAID'),
(5, 'BTIP430', 'June', 2013, 'PAID'),
(6, 'BTIP109', 'June', 2013, 'PAID'),
(7, 'BTIP892', 'June', 2013, 'PAID'),
(8, 'BTIP254', 'June', 2013, 'PAID'),
(9, 'BTIP074', 'June', 2013, 'PAID'),
(10, 'BTIP694', 'June', 2013, 'PAID'),
(11, 'BTIP509', 'June', 2013, 'PAID'),
(12, 'BTIP585', 'June', 2013, 'PAID'),
(13, 'BTIP872', 'June', 2013, 'PAID'),
(14, 'BTIP250', 'June', 2013, 'PAID'),
(15, 'BTIP769', 'June', 2013, 'PAID'),
(16, 'BTIP985', 'June', 2013, 'PAID'),
(17, 'BTIP834', 'June', 2013, 'PAID'),
(18, 'BTIP187', 'June', 2013, 'PAID'),
(19, 'BTIP096', 'June', 2013, 'PAID'),
(20, 'BTIP678', 'June', 2013, 'PAID'),
(21, 'BTIP103', 'June', 2013, 'PAID'),
(22, 'BTIP583', 'June', 2013, 'PAID'),
(23, 'BTIP216', 'June', 2013, 'PAID'),
(24, 'BTIP727', 'June', 2013, 'PAID'),
(25, 'BTIP296', 'June', 2013, 'PAID'),
(26, 'BTIP969', 'June', 2013, 'PAID'),
(27, 'BTIP612', 'June', 2013, 'PAID'),
(28, 'BTIP325', 'June', 2013, 'PAID'),
(29, 'BTIP725', 'June', 2013, 'PAID'),
(30, 'BTIP214', 'June', 2013, 'PAID'),
(31, 'BTIP252', 'June', 2013, 'PAID'),
(32, 'BTIP472', 'June', 2013, 'PAID'),
(33, 'BTIP672', 'June', 2013, 'PAID'),
(34, 'BTIP856', 'June', 2013, 'PAID'),
(35, 'BTIP161', 'June', 2013, 'PAID'),
(36, 'BTIP521', 'June', 2013, 'PAID'),
(37, 'BTIP349', 'June', 2013, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_slab`
--

CREATE TABLE IF NOT EXISTS `emp_pay_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fields` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `emp_pay_slab`
--

INSERT INTO `emp_pay_slab` (`id`, `fields`, `slab_name`, `cal_from`, `key_word`, `value`) VALUES
(1, 'House Rent Allowance (HRA)', 'slab1', 'gross_pay', 'hra', 20),
(2, 'Conveyance Allowance (CA)', 'slab1', 'gross_pay', 'ca', 5),
(3, 'Special Allowance (SA)', 'slab1', 'gross_pay', 'sa', 35),
(4, 'Education Allowance (EA)', 'slab1', 'gross_pay', 'ea', 4),
(5, 'Medical Allowance (MA)', 'slab1', 'gross_pay', 'ma', 5),
(6, 'LTA', 'slab1', 'gross_pay', 'lta', 6),
(7, 'House Rent Allowance (HRA)', 'slab2', 'gross_pay', 'hra', 35),
(8, 'Conveyance Allowance (CA)', 'slab2', 'gross_pay', 'ca', 4),
(9, 'Special Allowance (SA)', 'slab2', 'gross_pay', 'sa', 5),
(10, 'Education Allowance (EA)', 'slab2', 'gross_pay', 'ea', 6),
(11, 'Medical Allowance (MA)', 'slab2', 'gross_pay', 'ma', 0),
(12, 'LTA', 'slab2', 'gross_pay', 'lta', 0),
(13, 'House Rent Allowance (HRA)', 'slab3', 'gross_pay', 'hra', 45),
(14, 'Conveyance Allowance (CA)', 'slab3', 'gross_pay', 'ca', 45),
(15, 'Special Allowance (SA)', 'slab3', 'gross_pay', 'sa', 45),
(16, 'Education Allowance (EA)', 'slab3', 'gross_pay', 'ea', 45),
(17, 'Medical Allowance (MA)', 'slab3', 'gross_pay', 'ma', 0),
(18, 'LTA', 'slab3', 'gross_pay', 'lta', 0),
(19, 'House Rent Allowance (HRA)', 'slab4', 'gross_pay', 'hra', 20),
(20, 'Conveyance Allowance (CA)', 'slab4', 'gross_pay', 'ca', 5),
(21, 'Special Allowance (SA)', 'slab4', 'gross_pay', 'sa', 35),
(22, 'Education Allowance (EA)', 'slab4', 'gross_pay', 'ea', 4),
(23, 'Medical Allowance (MA)', 'slab4', 'gross_pay', 'ma', 5),
(24, 'LTA', 'slab4', 'gross_pay', 'lta', 6),
(25, 'Basic', 'slab2', 'gross_pay', 'basic', 0),
(26, 'Basic', 'slab3', 'gross_pay', 'basic', 0),
(27, 'House Rent Allowance (HRA)', 'Slab1', '15', '', 800),
(28, 'Conveyance Allowance (CA)', 'Slab1', '15', '', 0),
(29, 'Special Allowance (SA)', 'Slab1', '15', '', 1000),
(30, 'Education Allowance (EA)', 'Slab1', '15', '', 1500),
(31, 'Medical Allowance (MA)', 'Slab1', '15', '', 0),
(32, 'House Rent Allowance (HRA)', 'slap9', '423', '', 324),
(33, 'Conveyance Allowance (CA)', 'slap9', '423', '', 34),
(34, 'Special Allowance (SA)', 'slap9', '423', '', 34),
(35, 'Education Allowance (EA)', 'slap9', '423', '', 34),
(36, 'Medical Allowance (MA)', 'slap9', '423', '', 34),
(37, 'House Rent Allowance (HRA)', 'dsfdfd', '23', '', 23),
(38, 'Conveyance Allowance (CA)', 'dsfdfd', '23', '', 23),
(39, 'Special Allowance (SA)', 'dsfdfd', '23', '', 23),
(40, 'Education Allowance (EA)', 'dsfdfd', '23', '', 23),
(41, 'Medical Allowance (MA)', 'dsfdfd', '23', '', 23),
(42, 'House Rent Allowance (HRA)', 'slap10', 'Rs', '', 50),
(43, 'Conveyance Allowance (CA)', 'slap10', 'Rs', '', 50),
(44, 'Special Allowance (SA)', 'slap10', 'Rs', '', 50),
(45, 'Education Allowance (EA)', 'slap10', 'Rs', '', 50),
(46, 'Medical Allowance (MA)', 'slap10', 'Rs', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `emp_pay_structure`
--

CREATE TABLE IF NOT EXISTS `emp_pay_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `emp_pay_structure`
--

INSERT INTO `emp_pay_structure` (`id`, `slab_name`, `pay_type`, `amount`) VALUES
(2, 'slab1', 'Basic', 6500),
(3, 'slab2', 'gross_pay', 18000),
(4, 'slab3', 'CTC', 100000),
(14, 'slab4', 'Basic', 6250),
(15, 'Slab1', 'gross_pay', 35),
(16, 'slap9', 'gross_pay', 22000),
(17, 'dsfdfd', 'gross_pay', 12000),
(18, 'slap10', 'gross_pay', 23);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `emp_pay_temp`
--

INSERT INTO `emp_pay_temp` (`id`, `emp_id`, `pay_slab`, `esi_slab`, `epf_slab`, `pt_slab`, `leave_slab`, `ot_slab`, `pay_type`) VALUES
(1, 'BTIP969', 'slab1', 'slab1', 'slab1', 'Madurai', 'Slab1', 'Slab2', 'Basic'),
(2, 'BTIP729', 'slab1', 'slab1', 'slab1', 'Chennai', 'Slab1', 'Slab1', 'Basic'),
(3, 'BTIP290', 'slab1', 'slab1', 'slab1', 'Madurai', 'Slab1', 'Slab2', 'Basic'),
(4, 'BTIP092', 'slab1', 'slab1', 'slab1', 'Madurai', 'Slab1', 'Slab1', 'Basic'),
(5, 'BTIP505', 'slab4', 'slab1', 'slab1', 'Chennai', 'Slab1', 'Slab1', 'Basic'),
(6, 'BTIP125', 'slab4', 'slab1', 'slab1', 'Chennai', 'Slab2', 'Slab1', 'Basic'),
(7, 'BTIP054', 'slab4', 'slab1', 'slab1', 'Chennai', 'Slab2', 'Slab1', 'Basic'),
(8, 'BTIP430', 'slab1', 'slab1', 'slab1', 'Chennai', 'Slab1', 'Slab1', 'Basic'),
(9, 'BTIP109', 'slab4', 'slab1', 'slab1', 'Madurai', 'Slab2', 'Slab2', 'Basic'),
(10, 'BTIP892', 'slab1', 'slab1', 'slab1', 'Chennai', 'Slab1', 'Slab1', 'Basic'),
(11, 'BTIP254', 'slab2', 'slab1', 'slab1', 'Chennai', 'Slab2', 'Slab1', 'gross_pay'),
(12, 'BTIP074', 'slab1', 'slab1', 'slab1', 'Chennai', 'Slab2', 'Slab1', 'Basic'),
(13, 'BTIP694', 'slab1', 'slab1', '', '', '', '', 'Basic'),
(24, 'BTIP509', 'slab1', '', '', '', '', '', 'Basic'),
(25, 'BTIP585', 'slab4', '', '', '', '', '', 'Basic'),
(26, 'BTIP505', 'DESG11', '', '', '', '', '', ''),
(27, 'BTIP505', 'DESG11', '', '', '', '', '', ''),
(28, 'BTIP505', 'slab2', '', '', '', '', '', ''),
(29, 'BTIP092', '', '', '', '', '', '', ''),
(30, 'BTIP092', '', '', '', '', '', '', ''),
(31, 'BTIP092', '', '', '', '', '', '', ''),
(32, 'BTIP092', '', '', '', '', '', '', ''),
(33, 'BTIP092', '', '', '', '', '', '', ''),
(34, 'BTIP092', 'slab1', '', '', '', '', '', ''),
(35, 'BTIP092', 'slab1', '', '', '', '', '', ''),
(36, 'BTIP092', 'slab1', '', '', '', '', '', ''),
(37, 'BTIP0', 'slab2', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_personal_details`
--

CREATE TABLE IF NOT EXISTS `emp_personal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `fathers_name` varchar(225) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `emergency_number` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `emp_personal_details`
--

INSERT INTO `emp_personal_details` (`id`, `emp_id`, `first_name`, `last_name`, `fathers_name`, `gender`, `blood_group`, `city`, `state`, `pincode`, `marital_status`, `emergency_number`) VALUES
(1, 'BTIP430', 'sdfsafadssafsa', 'sdfasfasfadsfdsa', '', '', '', '', '', 0, '', '0'),
(2, 'BTIP505', '', '', 'sdfsdfasdsd', 'Male', '', '', '', 0, '2423424234', ','),
(3, 'BTIP505', '', '', 'sdfsdfasdsd', 'Male', '', '', '', 0, '2423424234', ','),
(4, 'BTIP505', '', '', 'sdfsdfasdsd', 'Male', '', '', '', 0, '2423424234', ','),
(5, 'BTIP505', '', '', 'sdfsdfasdsd', 'Male', '', '', '', 0, '2423424234', ','),
(6, 'BTIP0', '', '', 'Shunmugam', 'Male', 'Married', 'Tamilnadu', '600049', 2147483647, '23/07/2013', '9750513415,b ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `emp_ptslab`
--

INSERT INTO `emp_ptslab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES
(1, 'Chennai', 'PT Employer Contribution', '1095', 'gross_pay'),
(2, 'Chennai', '0 - 21,000', '0', ''),
(3, 'Chennai', '21,001 - 30,000', '100', ''),
(4, 'Chennai', '30,001 - 45,000', '235', ''),
(5, 'Chennai', '45,001 - 60,000', '510', ''),
(6, 'Chennai', '60,001 - 75,000', '760', ''),
(7, 'Chennai', '75,001 and above', '1095', ''),
(23, 'Madurai', 'PT Employer Contribution', '1095', 'gross_pay'),
(24, 'Madurai', '0-21,000', '0', ''),
(25, 'Madurai', '21,001-30,000', '100', ''),
(26, 'Madurai', '30,001-45,000', '235', ''),
(27, 'Madurai', '45,001-60,000', '510', ''),
(28, 'Madurai', '60,001-75,000', '760', ''),
(29, 'Madurai', '75,001 and above', '1095', ''),
(30, 'COIMBATORE', 'PT Employer Contribution', '', 'gross_pay'),
(31, 'COIMBATORE', 'up to 21,000', '', ''),
(32, 'COIMBATORE', '21,001-30,000', '', ''),
(33, 'COIMBATORE', '30,001-45,000', '', ''),
(34, 'COIMBATORE', '45,001-60,000', '', ''),
(35, 'COIMBATORE', '60,001-75,000', '', ''),
(36, 'COIMBATORE', '75,001 and above', '', ''),
(37, 'TIRUNELVELI', 'PT Employer Contribution', '30', 'gross_pay'),
(38, 'TIRUNELVELI', '10000', '21000', ''),
(39, 'TIRUNELVELI', '30000', '30000', ''),
(40, 'TIRUNELVELI', '45500', '45500', ''),
(41, 'TIRUNELVELI', '60000', '60000', ''),
(42, 'TIRUNELVELI', '75000', '75000', ''),
(43, 'TIRUNELVELI', '80000', '75001', '');

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
  `key_word` varchar(50) NOT NULL,
  `value` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `esi_master`
--

INSERT INTO `esi_master` (`id`, `field`, `pay_name`, `cal_from`, `key_word`, `value`) VALUES
(1, 'ESI Employee Contribution', 'slab1', 'gross_pay', 'esi1', '1.75'),
(2, 'ESI Employer Contribution', 'slab1', 'gross_pay', 'esi2', '4.75'),
(3, 'ESI Eligibility', 'slab1', 'gross_pay', 'elig', '15000'),
(4, 'ESI Employee Contribution', 'slab21', 'basic_pay', 'basic_pay', '21'),
(5, 'ESI Employer Contribution', 'slab21', 'basic_pay', 'basic_pay', '21'),
(6, 'ESI Eligibility', 'slab21', 'basic_pay', 'basic_pay', '21'),
(7, 'ESI Employee Contribution', 'slab22', 'basic_pay', 'basic_pay', '22'),
(8, 'ESI Employer Contribution', 'slab22', 'basic_pay', 'basic_pay', '22'),
(9, 'ESI Eligibility', 'slab22', 'basic_pay', 'basic_pay', '22'),
(10, 'ESI Employee Contribution', 'SLAB7', 'basic_pay', 'basic_pay', '22'),
(11, 'ESI Employer Contribution', 'SLAB7', 'basic_pay', 'basic_pay', '234'),
(12, 'ESI Eligibility', 'SLAB7', 'basic_pay', 'basic_pay', '2345'),
(13, 'ESI Employee Contribution', 'slab24', 'basic_pay', 'basic_pay', '24'),
(14, 'ESI Employer Contribution', 'slab24', 'basic_pay', 'basic_pay', '24'),
(15, 'ESI Eligibility', 'slab24', 'basic_pay', 'basic_pay', '24'),
(16, 'ESI Employee Contribution', 'slab29', 'basic_pay', 'basic_pay', '29'),
(17, 'ESI Employer Contribution', 'slab29', 'basic_pay', 'basic_pay', '29'),
(18, 'ESI Eligibility', 'slab29', 'basic_pay', 'basic_pay', '29'),
(19, 'ESI Employee Contribution', 'slab40', 'basic_pay', 'basic_pay', '40'),
(20, 'ESI Employer Contribution', 'slab40', 'basic_pay', 'basic_pay', '40'),
(21, 'ESI Eligibility', 'slab40', 'basic_pay', 'basic_pay', '40'),
(22, 'ESI Employee Contribution', 'slab51', 'basic_pay', 'basic_pay', '2345'),
(23, 'ESI Employer Contribution', 'slab51', 'basic_pay', 'basic_pay', '2345'),
(24, 'ESI Eligibility', 'slab51', 'basic_pay', 'basic_pay', '23');

-- --------------------------------------------------------

--
-- Table structure for table `esi_master_slap`
--

CREATE TABLE IF NOT EXISTS `esi_master_slap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `esi_master_slap`
--

INSERT INTO `esi_master_slap` (`id`, `slab_name`, `pay_type`, `amount`) VALUES
(1, 'slab1', 'basic_pay', 6500),
(2, 'slab21', 'basic_pay', 0),
(3, 'slab22', 'basic_pay', 0),
(4, 'SLAB7', 'basic_pay', 0),
(5, 'slab24', 'basic_pay', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE IF NOT EXISTS `leave_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`id`, `slab_name`) VALUES
(1, 'Slab1'),
(2, 'Slab2');

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
-- Table structure for table `ot_master`
--

CREATE TABLE IF NOT EXISTS `ot_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ot_master`
--

INSERT INTO `ot_master` (`id`, `slab_name`) VALUES
(1, 'Slab1'),
(2, 'Slab2');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_status`
--

CREATE TABLE IF NOT EXISTS `payroll_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payroll_status`
--

INSERT INTO `payroll_status` (`id`, `pay_month`, `pay_year`, `status`) VALUES
(1, 'June', 2013, 'YES');

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
  `value` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `pf_master`
--

INSERT INTO `pf_master` (`id`, `field`, `pay_name`, `key_word`, `cal_from`, `value`) VALUES
(1, 'PF Employee Contribution', 'slab1', 'pf1', 'basic_pay', '12'),
(2, 'PF Employer Contribution', 'slab1', 'pf2', 'basic_pay', '12'),
(3, 'Admin Charges', 'slab1', 'ac', 'total_epf_wages', '1.1'),
(4, 'Account 21', 'slab1', 'acc21', 'total_epf_wages', '0.21'),
(6, 'Account 22', 'slab1', 'acc22', 'total_epf_wages', '0.01'),
(7, 'PF Employee Contribution', 'angel', '33', '33', '33'),
(8, 'PF Employer Contribution', 'angel', '33', '33', '33'),
(9, 'Account 22', 'angel', '33', '33', '33'),
(10, 'Admin Charges', 'angel', '33', '33', '33'),
(11, 'PF Employee Contribution', 'tr', '45', '45', '45'),
(12, 'PF Employer Contribution', 'tr', '45', '45', '45'),
(13, 'Account 22', 'tr', '45', '45', '45'),
(14, 'Admin Charges', 'tr', '45', '45', '45'),
(15, 'Account 21', 'tr', '45', '45', '45'),
(16, 'PF Employee Contribution', 'gtr', '56', '56', '56'),
(17, 'PF Employer Contribution', 'gtr', '56', '56', '56'),
(18, 'Account 22', 'gtr', '56', '56', '56'),
(19, 'Admin Charges', 'gtr', '56', '56', '56'),
(20, 'Account 21', 'gtr', '56', '56', '56'),
(26, 'PF Employee Contribution', 'hu', 'PF Employee Contribution', '4', '435'),
(27, 'PF Employer Contribution', 'hu', 'PF Employer Contribution', '4', '4'),
(28, 'Account 22', 'hu', 'Account 22', '4', '45'),
(29, 'Admin Charges', 'hu', 'Admin Charges', '4', '45'),
(30, 'Account 21', 'hu', 'Account 21', '4', '45'),
(31, 'PF Employee Contribution', 'SLAB5', 'PF Employee Contribution', '12', '12'),
(32, 'PF Employer Contribution', 'SLAB5', 'PF Employer Contribution', '12', '12'),
(33, 'Account 22', 'SLAB5', 'Account 22', '12', '12'),
(34, 'Admin Charges', 'SLAB5', 'Admin Charges', '12', '12'),
(35, 'Account 21', 'SLAB5', 'Account 21', '12', '12'),
(36, 'PF Employee Contribution', 'slab6', 'PF Employee Contribution', 'gross_pay', '70'),
(37, 'PF Employer Contribution', 'slab6', 'PF Employer Contribution', 'gross_pay', '70'),
(38, 'Account 22', 'slab6', 'Account 22', 'gross_pay', '70'),
(39, 'Admin Charges', 'slab6', 'Admin Charges', 'gross_pay', '70'),
(40, 'Account 21', 'slab6', 'Account 21', 'gross_pay', '70');

-- --------------------------------------------------------

--
-- Table structure for table `pf_master_slap`
--

CREATE TABLE IF NOT EXISTS `pf_master_slap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pf_master_slap`
--

INSERT INTO `pf_master_slap` (`id`, `slab_name`, `pay_type`, `amount`) VALUES
(2, 'sulo', 'basic_pay', 0),
(3, 'rt', 'basic_pay', 0),
(7, 'slab6', '50', 0);

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
-- Table structure for table `salary_param`
--

CREATE TABLE IF NOT EXISTS `salary_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salary_param`
--

INSERT INTO `salary_param` (`id`, `type`) VALUES
(1, 'Rs'),
(2, 'Percentage');

-- --------------------------------------------------------

--
-- Table structure for table `salary_temp`
--

CREATE TABLE IF NOT EXISTS `salary_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salary_temp`
--

INSERT INTO `salary_temp` (`id`, `type`) VALUES
(1, 'gross_pay'),
(2, 'basic_pay');

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
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_admin_login`
--

INSERT INTO `user_admin_login` (`id`, `user_name`, `user_pwd`, `user_email`, `disp_name`, `status`) VALUES
(1, 'admin', 'm7dtMdv1eXXvfMp8CFisYmw7nk8l4+aiBnrLVWFQhVk=', 'gunadat@gmail.com', 'Gunasegar Mani', 1);

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
