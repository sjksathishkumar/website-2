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
  `admin_pwd` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `no_admin`, `primary_admin`, `status`, `domain_name`, `db_name`, `admin_pwd`) VALUES
(1, 'Bass Techs India Pvt., Ltd.', 2, 'gunadat', 'Demo', 'btip001', 'payroll_btip001', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `domain_name`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`) VALUES
(1, 'btip001', 'Chennai-160', 'info@basstechs.com', 'www.basstechs.com', 'qwertyuiop', 'fgfgfgfgfgfg', '044-2245854', '9786903717', 'Sakthivel', 'company_logo/BTIP-btip-08-51-22.jpg', 'BTIP');

--
-- Triggers `company_details`
--
DROP TRIGGER IF EXISTS `after_update_user`;
DELIMITER //
CREATE TRIGGER `after_update_user` AFTER INSERT ON `company_details`
 FOR EACH ROW UPDATE payroll_asdf123.company_details SET mail_id = NEW.mail_id, web_addr = NEW.web_addr, pan_no = NEW.pan_no, tan_no = NEW.tan_no, telephone = NEW.telephone, mobile_no = NEW.mobile_no, fax_no = NEW.fax_no WHERE domain_name = NEW.domain_name
//
DELIMITER ;

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
(1, 'Slab1', '0-200000 ', '1'),
(2, 'Slab1', '200001 - 500000 ', '10%'),
(3, 'Slab1', '500001 - 1000000 ', '20%'),
(4, 'Slab1', 'Above 1000000', '30%'),
(5, 'Slab1', 'Education cess ( EC and SHEC )', '3%');

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
(29, 'Madurai', '75,001 and above', '1095', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `esi_master`
--

INSERT INTO `esi_master` (`id`, `field`, `pay_name`, `cal_from`, `key_word`, `value`) VALUES
(1, 'ESI Employee Contribution', 'slab1', 'gross_pay', 'esi1', '1.75'),
(2, 'ESI Employer Contribution', 'slab1', 'gross_pay', 'esi2', '1.75'),
(3, 'ESI Eligibility', 'slab1', 'gross_pay', 'elig', '15000');

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
(1, 'admin', 'gunadat@gmail.com', 'm7dtMdv1eXXvfMp8CFisYmw7nk8l4+aiBnrLVWFQhVk=', 'Gunasegar Mani', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pf_master`
--

INSERT INTO `pf_master` (`id`, `field`, `pay_name`, `key_word`, `cal_from`, `value`) VALUES
(1, 'PF Employee Contribution', 'slab1', 'pf1', 'basic_pay', '12'),
(2, 'PF Employer Contribution', 'slab1', 'pf2', 'basic_pay', '12'),
(3, 'Admin Charges', 'slab1', 'ac', 'total_epf_wages', '1.1'),
(4, 'Account 21', 'slab1', 'acc21', 'total_epf_wages', '0.5'),
(6, 'Account 22', 'slab1', 'acc22', 'total_epf_wages', '0.01');

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
