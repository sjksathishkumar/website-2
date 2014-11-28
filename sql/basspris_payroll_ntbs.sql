-- MySQL dump 10.13  Distrib 5.5.40, for Linux (x86_64)
--
-- Host: localhost    Database: basspris_payroll_ntbs
-- ------------------------------------------------------
-- Server version	5.5.32-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `business_days`
--

DROP TABLE IF EXISTS `business_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `week_date` varchar(225) NOT NULL,
  `day` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `actual_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_days`
--

LOCK TABLES `business_days` WRITE;
/*!40000 ALTER TABLE `business_days` DISABLE KEYS */;
/*!40000 ALTER TABLE `business_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cal_from`
--

DROP TABLE IF EXISTS `cal_from`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cal_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cal_value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cal_from`
--

LOCK TABLES `cal_from` WRITE;
/*!40000 ALTER TABLE `cal_from` DISABLE KEYS */;
INSERT INTO `cal_from` (`id`, `cal_value`) VALUES (1,'Monthly'),(2,'Weekly'),(3,'Yearly');
/*!40000 ALTER TABLE `cal_from` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `table_name`) VALUES (1,'Employee','emp_login'),(2,'User Admin','user_admin_login'),(3,'Data Entry Operators','deo_login'),(4,'Master Admin','master_admin_login');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_master`
--

DROP TABLE IF EXISTS `claim_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claim_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_master`
--

LOCK TABLES `claim_master` WRITE;
/*!40000 ALTER TABLE `claim_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `claim_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_request`
--

DROP TABLE IF EXISTS `claim_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claim_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `claim_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_request`
--

LOCK TABLES `claim_request` WRITE;
/*!40000 ALTER TABLE `claim_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `claim_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `no_admin` int(11) NOT NULL,
  `primary_admin` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `domain_name` varchar(225) NOT NULL,
  `db_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `name`, `no_admin`, `primary_admin`, `status`, `domain_name`, `db_name`) VALUES (1,'New Tech Building Solutions Private Limited',0,'NTBS','','ntbs','basspris_payroll_ntbs');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_admin`
--

DROP TABLE IF EXISTS `company_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `display_name` varchar(225) NOT NULL,
  `domain_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_admin`
--

LOCK TABLES `company_admin` WRITE;
/*!40000 ALTER TABLE `company_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_branch`
--

DROP TABLE IF EXISTS `company_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(50) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_branch`
--

LOCK TABLES `company_branch` WRITE;
/*!40000 ALTER TABLE `company_branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_dept`
--

DROP TABLE IF EXISTS `company_dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_dept`
--

LOCK TABLES `company_dept` WRITE;
/*!40000 ALTER TABLE `company_dept` DISABLE KEYS */;
INSERT INTO `company_dept` (`id`, `dept_code`, `dept_name`) VALUES (1,'DPT1','Human Resources'),(2,'DPT2','Finance'),(3,'DPT3','Purchase'),(4,'DPT4','Sales'),(5,'DPT5','IT'),(6,'DPT6','Staff'),(7,'DPT7','Research and Development'),(8,'DPT8','Business Development'),(12,'DPT9','Accounts'),(13,'DPT10','Service'),(14,'DPT11','Admin'),(15,'DPT12','Operations'),(16,'DPT13','Design'),(17,'DPT14','Management Team');
/*!40000 ALTER TABLE `company_dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_desg`
--

DROP TABLE IF EXISTS `company_desg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_desg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des_code` varchar(100) NOT NULL,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_desg`
--

LOCK TABLES `company_desg` WRITE;
/*!40000 ALTER TABLE `company_desg` DISABLE KEYS */;
INSERT INTO `company_desg` (`id`, `des_code`, `des_name`) VALUES (1,'DESG1','Site Engineer'),(2,'DESG2','Supervisor'),(3,'DESG3','Managing Partner'),(4,'DESG4','General Manager'),(5,'DESG5','Admin Executive'),(6,'DESG6','Project Engineer'),(7,'DESG7','Service Engineer'),(8,'DESG8','Design Engineer'),(9,'DESG9','Maintenance Engineer'),(24,'DESG10','Mainteneance Executive'),(27,'DESG11','Office Assistant');
/*!40000 ALTER TABLE `company_desg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_details` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` (`id`, `domain_name`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`) VALUES (1,'ntbs','Ashok Nagar, Chennai','careerasan@gmail.com','www.ntbs.in','AAPRN8976N','04464572123','0446457212','9884040580','04464572123','','NTBS');
/*!40000 ALTER TABLE `company_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_feature`
--

DROP TABLE IF EXISTS `company_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `ess` tinyint(4) NOT NULL,
  `it` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_feature`
--

LOCK TABLES `company_feature` WRITE;
/*!40000 ALTER TABLE `company_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deo_details`
--

DROP TABLE IF EXISTS `deo_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deo_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deo_id` varchar(100) NOT NULL,
  `company_code` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `work_hour` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deo_details`
--

LOCK TABLES `deo_details` WRITE;
/*!40000 ALTER TABLE `deo_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `deo_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deo_login`
--

DROP TABLE IF EXISTS `deo_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deo_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deo_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deo_login`
--

LOCK TABLES `deo_login` WRITE;
/*!40000 ALTER TABLE `deo_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `deo_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_attendance`
--

DROP TABLE IF EXISTS `emp_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `working_days` int(11) NOT NULL,
  `present_days` int(11) NOT NULL,
  `no_leave` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `lop_days` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_attendance`
--

LOCK TABLES `emp_attendance` WRITE;
/*!40000 ALTER TABLE `emp_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_claim_master`
--

DROP TABLE IF EXISTS `emp_claim_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_claim_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(50) NOT NULL,
  `desg_code` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_claim_master`
--

LOCK TABLES `emp_claim_master` WRITE;
/*!40000 ALTER TABLE `emp_claim_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_claim_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_claims`
--

DROP TABLE IF EXISTS `emp_claims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_claims` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_claims`
--

LOCK TABLES `emp_claims` WRITE;
/*!40000 ALTER TABLE `emp_claims` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_claims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_comp_details`
--

DROP TABLE IF EXISTS `emp_comp_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_comp_details` (
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_comp_details`
--

LOCK TABLES `emp_comp_details` WRITE;
/*!40000 ALTER TABLE `emp_comp_details` DISABLE KEYS */;
INSERT INTO `emp_comp_details` (`id`, `emp_id`, `branch`, `pan_no`, `bank_name`, `bank_acc_no`, `pf_no`, `esi_no`, `driving_license`, `passport`, `bank_branch`, `ifsc_code`, `micr_code`) VALUES (1,'NTBS314','','','idbi bank','','TN/MAS/84226/03','5121240787','','','Tiruvanmiyur','',''),(2,'NTBS382','','','idbi bank','','TN/MAS/84226/06','-','','','Tiruvanmiyur','',''),(3,'NTBS966','','','idbi bank','','TN/MAS/84226/13','5121240797','','','Tiruvanmiyur','',''),(4,'NTBS714','','','idbi bank','','TN/MAS/84226/14','5121240798','','','Tiruvanmiyur','',''),(5,'NTBS353','','','idbi bank','','TN/MAS/84226/15','-','','','Tiruvanmiyur','',''),(6,'NTBS718','','','idbi bank','','TN/MAS/84226/16','-','','','Tiruvanmiyur','',''),(7,'NTBS636','','','idbi bank','','TN/MAS/84226/22','-','','','Tiruvanmiyur','',''),(8,'NTBS674','','','idbi bank','','TN/MAS/84226/23','-','','','Tiruvanmiyur','',''),(9,'NTBS023','','','idbi bank','','TN/MAS/84226/24','-','','','Tiruvanmiyur','',''),(10,'NTBS137','','','idbi bank','','TN/MAS/84226/25','-','','','Tiruvanmiyur','',''),(11,'NTBS048','','','idbi bank','','TN/MAS/84226/26','-','','','Tiruvanmiyur','',''),(12,'NTBS880','','','idbi bank','','TN/MAS/84226/27','5121983529','','','Tiruvanmiyur','',''),(13,'NTBS589','','','idbi bank','','TN/MAS/84226/28','-','','','Tiruvanmiyur','',''),(14,'NTBS004','','','idbi bank','','TN/MAS/84226/29','-','','','Tiruvanmiyur','',''),(15,'NTBS889','','','idbi bank','','TN/MAS/84226/30','-','','','Tiruvanmiyur','',''),(16,'NTBS926','','','idbi bank','','TN/MAS/84226/32','-','','','Tiruvanmiyur','',''),(17,'NTBS653','','','idbi bank','','TN/MAS/84226/34','5121983532','','','Tiruvanmiyur','',''),(18,'NTBS255','','','idbi bank','','TN/MAS/84226/36','5121983536','','','Tiruvanmiyur','',''),(19,'NTBS782','','','idbi bank','','TN/MAS/84226/37','5121983537','','','Tiruvanmiyur','',''),(20,'NTBS834','','','idbi bank','','TN/MAS/84226/38','5121983706','','','Tiruvanmiyur','',''),(21,'NTBS198','','','idbi bank','','TN/MAS/84226/39','5121983728','','','Tiruvanmiyur','',''),(22,'NTBS186','','','idbi bank','','TN/MAS/84226/40','5121983753','','','Tiruvanmiyur','',''),(23,'NTBS741','','','idbi bank','','TN/MAS/84226/41','5122127192','','','Tiruvanmiyur','',''),(24,'NTBS839','','','idbi bank','','TN/MAS/84226/42','5122127226','','','Tiruvanmiyur','',''),(25,'NTBS152','','','idbi bank','','TN/MAS/84226/43','5122220235','','','Tiruvanmiyur','',''),(26,'NTBS053','','','idbi bank','','TN/MAS/84226/44','5122220242','','','Tiruvanmiyur','',''),(27,'NTBS344','','','idbi bank','','TN/MAS/84226/45','5122220247','','','Tiruvanmiyur','',''),(28,'NTBS134','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(29,'NTBS442','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(30,'NTBS185','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(31,'NTBS717','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(32,'NTBS515','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(33,'NTBS416','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(34,'NTBS659','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(35,'NTBS649','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(36,'NTBS921','','','idbi bank','','-','-','','','Tiruvanmiyur','',''),(37,'NTBS831','','','idbi bank','','-','-','','','Tiruvanmiyur','','');
/*!40000 ALTER TABLE `emp_comp_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_daily_attandance`
--

DROP TABLE IF EXISTS `emp_daily_attandance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_daily_attandance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `shift_base` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_daily_attandance`
--

LOCK TABLES `emp_daily_attandance` WRITE;
/*!40000 ALTER TABLE `emp_daily_attandance` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_daily_attandance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_details`
--

DROP TABLE IF EXISTS `emp_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_details` (
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_details`
--

LOCK TABLES `emp_details` WRITE;
/*!40000 ALTER TABLE `emp_details` DISABLE KEYS */;
INSERT INTO `emp_details` (`id`, `emp_id`, `desig_code`, `dept_code`, `dob`, `doj`, `telephone`, `mobile`, `email_id`, `photo`, `status`, `addr`) VALUES (1,'NTBS314','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','photos/ntbs314-balaji r.jpg','','Chennai - 10'),(2,'NTBS382','','','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(3,'NTBS966','DESG2','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(4,'NTBS714','DESG2','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(5,'NTBS353','','','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(6,'NTBS718','','','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(7,'NTBS636','DESG3','DPT14','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(8,'NTBS674','DESG3','DPT14','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(9,'NTBS023','DESG3','DPT14','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(10,'NTBS137','DESG3','DPT14','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(11,'NTBS048','DESG4','DPT11','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(12,'NTBS880','DESG5','DPT11','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(13,'NTBS589','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(14,'NTBS004','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(15,'NTBS889','DESG7','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(16,'NTBS926','DESG8','DPT13','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(17,'NTBS653','DESG9','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(18,'NTBS255','DESG9','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(19,'NTBS782','DESG9','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(20,'NTBS834','DESG9','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(21,'NTBS198','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(22,'NTBS186','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(23,'NTBS741','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(24,'NTBS839','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(25,'NTBS152','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(26,'NTBS053','DESG1','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(27,'NTBS344','','DPT9','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(28,'NTBS134','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(29,'NTBS442','DESG10','DPT10','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(30,'NTBS185','DESG10','DPT10','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(31,'NTBS717','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(32,'NTBS515','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(33,'NTBS416','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(34,'NTBS659','DESG11','DPT11','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(35,'NTBS649','DESG10','DPT10','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(36,'NTBS921','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10'),(37,'NTBS831','DESG6','DPT12','1969-12-31','1969-12-31','','9786903717','','','','Chennai - 10');
/*!40000 ALTER TABLE `emp_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_itslab`
--

DROP TABLE IF EXISTS `emp_itslab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_itslab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `field` varchar(225) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_itslab`
--

LOCK TABLES `emp_itslab` WRITE;
/*!40000 ALTER TABLE `emp_itslab` DISABLE KEYS */;
INSERT INTO `emp_itslab` (`id`, `slab_name`, `field`, `value`) VALUES (1,'Slab1','0-200000 ','1'),(2,'Slab1','200001 - 500000 ','10%'),(3,'Slab1','500001 - 1000000 ','20%'),(4,'Slab1','Above 1000000','30%'),(5,'Slab1','Education cess ( EC and SHEC )','3%');
/*!40000 ALTER TABLE `emp_itslab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_leave_slab`
--

DROP TABLE IF EXISTS `emp_leave_slab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_leave_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_leave_slab`
--

LOCK TABLES `emp_leave_slab` WRITE;
/*!40000 ALTER TABLE `emp_leave_slab` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_leave_slab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_leave_status`
--

DROP TABLE IF EXISTS `emp_leave_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_leave_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `leave_eligible` int(11) NOT NULL,
  `leave_acquired` int(11) NOT NULL,
  `leave_remaining` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_leave_status`
--

LOCK TABLES `emp_leave_status` WRITE;
/*!40000 ALTER TABLE `emp_leave_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_leave_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_loan_master`
--

DROP TABLE IF EXISTS `emp_loan_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_loan_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_loan_master`
--

LOCK TABLES `emp_loan_master` WRITE;
/*!40000 ALTER TABLE `emp_loan_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_loan_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_login`
--

DROP TABLE IF EXISTS `emp_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_pwd` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_login`
--

LOCK TABLES `emp_login` WRITE;
/*!40000 ALTER TABLE `emp_login` DISABLE KEYS */;
INSERT INTO `emp_login` (`id`, `user_pwd`, `disp_name`, `user_name`, `status`) VALUES (1,'MywpHrJbFT7OiYPY5gai761822SF9VRkZWueN1vgp40=','BALAJI R','NTBS314',0),(2,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','L THOMAS','NTBS382',0),(3,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','JAYAKUMAR','NTBS966',0),(4,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','SAMUEL S','NTBS714',0),(5,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','P MAHENDRA RAJA ','NTBS353',0),(6,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','V KUMARAVEL','NTBS718',0),(7,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','SAHBAZ AHMED','NTBS636',0),(8,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','VARADHARAJ B','NTBS674',0),(9,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','DHANASEKARAN G','NTBS023',0),(10,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','DURAI MANIKANDAN R','NTBS137',0),(11,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','RANGARAJAN R','NTBS048',0),(12,'MywpHrJbFT7OiYPY5gai761822SF9VRkZWueN1vgp40=','SRIRAM PRASAD R','NTBS880',0),(13,'tgTVl00yPPqQE1YNKy+RuKTy8WqX0NLMDmBJ6OnMvlI=','NATESAN R','NTBS589',0),(14,'gxiwxsGBVqGSIhYsIAa361YSCu51M/JAQdKtN9gcm1M=','THUKILAN S','NTBS004',0),(15,'rUz+pWsE41kzQE4YrOh7k7fFUS5rQyoo2v9UyvlliH8=','LOGANTHAN D','NTBS889',0),(16,'fy7Al/xSJESZMXO0UBdl4QL+298Vy/EPuy/TxTOlp/0=','MANIKANDAN V','NTBS926',0),(17,'ZISLyxxE6ciUEB+8oCcNvNiE1FhZQrTgUmvJral3bFA=','SHAHINSA T','NTBS653',0),(18,'RmMIJDvFXI6gENsbxsBceY8QjgU5r9aqLgR5oP4TWKU=','SARAVANAN S','NTBS255',0),(19,'iOgX5piUhs20nmZIo9iqiT+o1g96sexEjH+wvHT1xHw=','GANESH S','NTBS782',0),(20,'bQLTQNyjsPCiKxRJ2rO6tyHMKkGLXrdDryasqsvqOJQ=','ALICEAN B','NTBS834',0),(21,'on3UjEh2JVQ3kcg8dtyacu0uz8j22qdBPPujGsFuC48=','MANI MARAN M','NTBS198',0),(22,'gtv5L2cRZwTgZVrLmoaxnYeFO9Ia52Z2WF+jHpp+4Qs=','PANDIYAN G','NTBS186',0),(23,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','VISHNU VARDHANAN R R','NTBS741',0),(24,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','DHEENA DHAYALAN A','NTBS839',0),(25,'85Rffl5ItsJMKnrJvz0Mu5a710mapTbAlXDD0zP9zZc=','RAJA RAMAN R','NTBS152',0),(26,'Y1AX/278ylV1DtWXKZNmzZlpU5ZiZKvfdcO7PgSO+o0=','MOHAMMED UMER AKTHAR A','NTBS053',0),(27,'lLuUREm2N+v5VYI0uptAJguClzqx9uSyjeOj/YPJmBo=','PRAVEEN THOMAS F','NTBS344',0),(28,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','KAMALA KANNAN.R','NTBS134',0),(29,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','THIYAGARAJAN.P','NTBS442',0),(30,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','ASHOK KUMAR.R','NTBS185',0),(31,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','SHIVA KUMAR.S','NTBS717',0),(32,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','MANIKANDAN.K','NTBS515',0),(33,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','PRAVEEN SINGH.S','NTBS416',0),(34,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','KANDAN.N','NTBS659',0),(35,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','DANIEL JEYARAJ.A','NTBS649',0),(36,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','SELVA KUMAR.I','NTBS921',0),(37,'kT5ZTGv6HWI63yEseS6+tkUuTTF5xdbWyj7M59sxZnE=','BOOPATHI.P','NTBS831',0);
/*!40000 ALTER TABLE `emp_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_notification`
--

DROP TABLE IF EXISTS `emp_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(225) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `exp_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_notification`
--

LOCK TABLES `emp_notification` WRITE;
/*!40000 ALTER TABLE `emp_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_ot_slab`
--

DROP TABLE IF EXISTS `emp_ot_slab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_ot_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ot_slab`
--

LOCK TABLES `emp_ot_slab` WRITE;
/*!40000 ALTER TABLE `emp_ot_slab` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_ot_slab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_pay_slab`
--

DROP TABLE IF EXISTS `emp_pay_slab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_pay_slab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fields` varchar(50) NOT NULL,
  `slab_name` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_pay_slab`
--

LOCK TABLES `emp_pay_slab` WRITE;
/*!40000 ALTER TABLE `emp_pay_slab` DISABLE KEYS */;
INSERT INTO `emp_pay_slab` (`id`, `fields`, `slab_name`, `cal_from`, `key_word`, `value`) VALUES (1,'House Rent Allowance (HRA)','Gross','gross_pay','',50),(2,'Conveyance Allowance (CA)','Gross','gross_pay','',5),(3,'Special Allowance (SA)','Gross','gross_pay','',2),(4,'Education Allowance (EA)','Gross','gross_pay','',3),(5,'Medical Allowance (MA)','Gross','gross_pay','',1),(6,'LTA','Gross','gross_pay','',3),(7,'House Rent Allowance (HRA)','Gross','gross_pay','',50),(8,'Conveyance Allowance (CA)','Gross','gross_pay','',5),(9,'Special Allowance (SA)','Gross','gross_pay','',2),(10,'Education Allowance (EA)','Gross','gross_pay','',3),(11,'Medical Allowance (MA)','Gross','gross_pay','',1),(12,'LTA','Gross','gross_pay','',3);
/*!40000 ALTER TABLE `emp_pay_slab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_pay_structure`
--

DROP TABLE IF EXISTS `emp_pay_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_pay_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_pay_structure`
--

LOCK TABLES `emp_pay_structure` WRITE;
/*!40000 ALTER TABLE `emp_pay_structure` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_pay_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_pay_temp`
--

DROP TABLE IF EXISTS `emp_pay_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_pay_temp` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_pay_temp`
--

LOCK TABLES `emp_pay_temp` WRITE;
/*!40000 ALTER TABLE `emp_pay_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_pay_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_paygen`
--

DROP TABLE IF EXISTS `emp_paygen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_paygen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) NOT NULL,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `pay_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_paygen`
--

LOCK TABLES `emp_paygen` WRITE;
/*!40000 ALTER TABLE `emp_paygen` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_paygen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_personal_details`
--

DROP TABLE IF EXISTS `emp_personal_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_personal_details` (
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
  `emergency_number` bigint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_personal_details`
--

LOCK TABLES `emp_personal_details` WRITE;
/*!40000 ALTER TABLE `emp_personal_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_personal_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_ptslab`
--

DROP TABLE IF EXISTS `emp_ptslab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_ptslab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  `field` varchar(225) NOT NULL,
  `value` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ptslab`
--

LOCK TABLES `emp_ptslab` WRITE;
/*!40000 ALTER TABLE `emp_ptslab` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_ptslab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_status`
--

DROP TABLE IF EXISTS `emp_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(100) NOT NULL,
  `status_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_status`
--

LOCK TABLES `emp_status` WRITE;
/*!40000 ALTER TABLE `emp_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esi_master`
--

DROP TABLE IF EXISTS `esi_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esi_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `value` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esi_master`
--

LOCK TABLES `esi_master` WRITE;
/*!40000 ALTER TABLE `esi_master` DISABLE KEYS */;
INSERT INTO `esi_master` (`id`, `field`, `pay_name`, `cal_from`, `key_word`, `value`) VALUES (1,'ESI Employee Contribution','slab1','gross_pay','esi1','1.75'),(2,'ESI Employer Contribution','slab1','gross_pay','esi2','4.75'),(3,'ESI Eligibility','slab1','gross_pay','elig','15000');
/*!40000 ALTER TABLE `esi_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_master`
--

DROP TABLE IF EXISTS `leave_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_master`
--

LOCK TABLES `leave_master` WRITE;
/*!40000 ALTER TABLE `leave_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_code` varchar(100) NOT NULL,
  `leave_name` varchar(100) NOT NULL,
  `pay_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_type`
--

LOCK TABLES `leave_type` WRITE;
/*!40000 ALTER TABLE `leave_type` DISABLE KEYS */;
INSERT INTO `leave_type` (`id`, `leave_code`, `leave_name`, `pay_status`) VALUES (1,'SL','Sick Leave',0),(2,'CL','Casual Leave',0),(3,'SPL','Special Leave',1),(4,'HDW','Holiday Work',2),(5,'CMP','Comp Off',1),(6,'WFH','Work From Home',1),(7,'PER','Permission',3);
/*!40000 ALTER TABLE `leave_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ot_master`
--

DROP TABLE IF EXISTS `ot_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ot_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slab_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ot_master`
--

LOCK TABLES `ot_master` WRITE;
/*!40000 ALTER TABLE `ot_master` DISABLE KEYS */;
INSERT INTO `ot_master` (`id`, `slab_name`) VALUES (1,'Ant');
/*!40000 ALTER TABLE `ot_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payroll_status`
--

DROP TABLE IF EXISTS `payroll_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payroll_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payroll_status`
--

LOCK TABLES `payroll_status` WRITE;
/*!40000 ALTER TABLE `payroll_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pf_master`
--

DROP TABLE IF EXISTS `pf_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pf_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `key_word` varchar(50) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  `value` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pf_master`
--

LOCK TABLES `pf_master` WRITE;
/*!40000 ALTER TABLE `pf_master` DISABLE KEYS */;
INSERT INTO `pf_master` (`id`, `field`, `pay_name`, `key_word`, `cal_from`, `value`) VALUES (1,'PF Employee Contribution','slab1','pf1','basic_pay','12'),(2,'PF Employer Contribution','slab1','pf2','basic_pay','12'),(3,'Admin Charges','slab1','ac','total_epf_wages','1.2'),(4,'Account 21','slab1','acc21','total_epf_wages','0.5'),(6,'Account 22','slab1','acc22','total_epf_wages','0.01');
/*!40000 ALTER TABLE `pf_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pt_master`
--

DROP TABLE IF EXISTS `pt_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pt_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(225) NOT NULL,
  `cal_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pt_master`
--

LOCK TABLES `pt_master` WRITE;
/*!40000 ALTER TABLE `pt_master` DISABLE KEYS */;
INSERT INTO `pt_master` (`id`, `field`, `cal_from`) VALUES (1,'PT Employer Contribution','gross_pay'),(2,'up to 21,000',''),(3,'21,001-30,000',''),(4,'30,001-45,000',''),(5,'45,001-60,000',''),(6,'60,001-75,000',''),(7,'75,001 and above','');
/*!40000 ALTER TABLE `pt_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary_temp`
--

DROP TABLE IF EXISTS `salary_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salary_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary_temp`
--

LOCK TABLES `salary_temp` WRITE;
/*!40000 ALTER TABLE `salary_temp` DISABLE KEYS */;
INSERT INTO `salary_temp` (`id`, `type`) VALUES (1,'gross_pay'),(2,'basic_pay');
/*!40000 ALTER TABLE `salary_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_admin_login`
--

DROP TABLE IF EXISTS `user_admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_admin_login` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin_login`
--

LOCK TABLES `user_admin_login` WRITE;
/*!40000 ALTER TABLE `user_admin_login` DISABLE KEYS */;
INSERT INTO `user_admin_login` (`id`, `user_name`, `user_pwd`, `user_email`, `disp_name`, `status`) VALUES (1,'ntbs','JPN2tl1cEWMQcWK5kxmLMy0rJ3lY03CaadbYPJc5rqg=','','NTBS ADMIN',1);
/*!40000 ALTER TABLE `user_admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `working_days`
--

DROP TABLE IF EXISTS `working_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `working_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(100) NOT NULL,
  `no_days` int(11) NOT NULL,
  `working_day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `working_days`
--

LOCK TABLES `working_days` WRITE;
/*!40000 ALTER TABLE `working_days` DISABLE KEYS */;
INSERT INTO `working_days` (`id`, `month`, `no_days`, `working_day`) VALUES (1,'January',31,30),(2,'February',28,30),(3,'March',31,30),(4,'April',30,30),(5,'May',31,30),(6,'June',30,30),(7,'July',31,30),(8,'August',31,30),(9,'September',30,30),(10,'October',31,30),(11,'November',30,30),(12,'December',31,30);
/*!40000 ALTER TABLE `working_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'basspris_payroll_ntbs'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-28 11:07:21
