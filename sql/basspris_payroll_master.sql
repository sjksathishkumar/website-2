-- MySQL dump 10.13  Distrib 5.5.37, for Linux (x86_64)
--
-- Host: localhost    Database: basspris_payroll_master
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
  `admin_pwd` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `name`, `no_admin`, `primary_admin`, `status`, `domain_name`, `db_name`, `admin_pwd`) VALUES (1,'Bass Techs India Pvt., Ltd.',2,'gunadat','Demo','max','basspris_payroll_btip001',''),(15,'New Tech Building Solutions Private Limited',0,'NTBS','','ntbs','basspris_payroll_ntbs','7dae8235d604eb1619d370ab1d3c0a3f');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_admin`
--

LOCK TABLES `company_admin` WRITE;
/*!40000 ALTER TABLE `company_admin` DISABLE KEYS */;
INSERT INTO `company_admin` (`id`, `user_name`, `display_name`, `domain_name`) VALUES (1,'gunadat','Gunasegar Mani','btip001'),(2,'admin','Administrator','btip001'),(13,'NTBS','NTBS ADMIN','ntbs');
/*!40000 ALTER TABLE `company_admin` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` (`id`, `domain_name`, `addr`, `mail_id`, `web_addr`, `pan_no`, `tan_no`, `telephone`, `mobile_no`, `fax_no`, `logo`, `emp_prefix`) VALUES (1,'btip001','Ashok Nagar, Chennai','careerasan@gmail.com','www.ntbs.in','AAPRN8976N','04464572123','0446457212','9884040580','04464572123','company_logo/BTIP-btip-08-51-22.jpg','BTIP'),(13,'ASDF123','','asdf@gmail.com','','','','','','','','214123131231'),(20,'ntbs','Ashok Nagar, Chennai','careerasan@gmail.com','www.ntbs.in','AAPRN8976N','04464572123','0446457212','9884040580','04464572123','','NTBS');
/*!40000 ALTER TABLE `company_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `telephone`) VALUES (1,'test','test2','test@test.com','1234567891'),(2,'test2','tst2','fsdfsf','2451212'),(3,'test3','test3','dsdfsdf','24514'),(4,'test4','test4','sdfsdf','2152454');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ptslab`
--

LOCK TABLES `emp_ptslab` WRITE;
/*!40000 ALTER TABLE `emp_ptslab` DISABLE KEYS */;
INSERT INTO `emp_ptslab` (`id`, `slab_name`, `field`, `value`, `cal_from`) VALUES (1,'Chennai','PT Employer Contribution','1095','gross_pay'),(2,'Chennai','0 - 21,000','0',''),(3,'Chennai','21,001 - 30,000','100',''),(4,'Chennai','30,001 - 45,000','235',''),(5,'Chennai','45,001 - 60,000','510',''),(6,'Chennai','60,001 - 75,000','760',''),(7,'Chennai','75,001 and above','1095',''),(23,'Madurai','PT Employer Contribution','1095','gross_pay'),(24,'Madurai','0-21,000','0',''),(25,'Madurai','21,001-30,000','100',''),(26,'Madurai','30,001-45,000','235',''),(27,'Madurai','45,001-60,000','510',''),(28,'Madurai','60,001-75,000','760',''),(29,'Madurai','75,001 and above','1095','');
/*!40000 ALTER TABLE `emp_ptslab` ENABLE KEYS */;
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
-- Table structure for table `master_admin_login`
--

DROP TABLE IF EXISTS `master_admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_admin_login` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `disp_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_admin_login`
--

LOCK TABLES `master_admin_login` WRITE;
/*!40000 ALTER TABLE `master_admin_login` DISABLE KEYS */;
INSERT INTO `master_admin_login` (`id`, `user_name`, `user_email`, `user_pwd`, `disp_name`, `status`) VALUES (1,'admin','gunadat@gmail.com','m7dtMdv1eXXvfMp8CFisYmw7nk8l4+aiBnrLVWFQhVk=','Gunasegar Mani',1);
/*!40000 ALTER TABLE `master_admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payslip`
--

DROP TABLE IF EXISTS `payslip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(50) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `basic` varchar(50) NOT NULL,
  `hra` varchar(50) NOT NULL,
  `edu_allowance` varchar(50) NOT NULL,
  `utility_allowance` varchar(50) NOT NULL,
  `spl_allowance` varchar(50) NOT NULL,
  `working_days` varchar(50) NOT NULL,
  `gross` varchar(50) NOT NULL,
  `basic_da` varchar(50) NOT NULL,
  `house_on_rent` varchar(50) NOT NULL,
  `gedu_allowance` varchar(50) NOT NULL,
  `gutility_allowance` varchar(50) NOT NULL,
  `gspl_allowance` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `pf` varchar(50) NOT NULL,
  `esi` varchar(50) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `total_ded` varchar(50) NOT NULL,
  `net` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payslip`
--

LOCK TABLES `payslip` WRITE;
/*!40000 ALTER TABLE `payslip` DISABLE KEYS */;
INSERT INTO `payslip` (`id`, `emp_code`, `emp_name`, `basic`, `hra`, `edu_allowance`, `utility_allowance`, `spl_allowance`, `working_days`, `gross`, `basic_da`, `house_on_rent`, `gedu_allowance`, `gutility_allowance`, `gspl_allowance`, `total`, `pf`, `esi`, `pt`, `total_ded`, `net`, `month`) VALUES (1,'101','ram.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August'),(2,'102','ramesh.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August'),(3,'103','ravi.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August'),(4,'101','ram.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August'),(5,'102','ramesh.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August'),(6,'103','ravi.M','5000','1000','500','200','35','30','5000','5000','2000','2000','500','200','20000','500','400','300','20000','15000','August');
/*!40000 ALTER TABLE `payslip` ENABLE KEYS */;
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
-- Dumping routines for database 'basspris_payroll_master'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-15 14:26:15
