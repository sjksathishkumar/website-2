-- MySQL dump 10.13  Distrib 5.5.37, for Linux (x86_64)
--
-- Host: localhost    Database: basspris_bassadmin
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
-- Table structure for table `add_value`
--

DROP TABLE IF EXISTS `add_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_value` (
  `value_id` int(5) NOT NULL AUTO_INCREMENT,
  `qus_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `value_points` varchar(260) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(260) DEFAULT NULL,
  `value_date` datetime NOT NULL,
  PRIMARY KEY (`value_id`),
  KEY `user_id` (`user_id`),
  KEY `qus_id` (`qus_id`),
  CONSTRAINT `add_value_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `google_login` (`id`),
  CONSTRAINT `add_value_ibfk_2` FOREIGN KEY (`qus_id`) REFERENCES `questions` (`qus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_value`
--

LOCK TABLES `add_value` WRITE;
/*!40000 ALTER TABLE `add_value` DISABLE KEYS */;
INSERT INTO `add_value` (`value_id`, `qus_id`, `user_id`, `value_points`, `status`, `notes`, `value_date`) VALUES (16,22,7,'good answer.',1,'test.','2014-08-10 06:45:08');
/*!40000 ALTER TABLE `add_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `post_id` int(5) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL DEFAULT 'Admin',
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `keyword` varchar(80) NOT NULL,
  `description` varchar(180) NOT NULL,
  `url` varchar(250) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`post_id`, `author`, `post_title`, `post_content`, `keyword`, `description`, `url`, `post_date`) VALUES (42,'Admin','Income Tax Exemption Under section 12-A and 80-G of Income Tax Act 1961','<p style=\"margin: 0.5em 0px; line-height: 22.399999618530273px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px;\"><b>PHP</b>&nbsp;is a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Server-side_scripting\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Server-side scripting\">server-side scripting</a>&nbsp;language designed for&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_development\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web development\">web development</a>&nbsp;but also used as a&nbsp;<a href=\"http://en.wikipedia.org/wiki/General-purpose_programming_language\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"General-purpose programming language\">general-purpose programming language</a>. As of January 2013, PHP was installed on more than 240 million&nbsp;<a href=\"http://en.wikipedia.org/wiki/Website\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Website\">websites</a>&nbsp;(39% of those sampled) and 2.1 million&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_server\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web server\">web servers</a>.<sup class=\"reference\" id=\"cite_ref-4\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-4\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[4]</a></sup>Originally created by&nbsp;<a href=\"http://en.wikipedia.org/wiki/Rasmus_Lerdorf\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Rasmus Lerdorf\">Rasmus Lerdorf</a>&nbsp;in 1994,<sup class=\"reference\" id=\"cite_ref-History_of_PHP_5-0\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-History_of_PHP-5\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[5]</a></sup>&nbsp;the&nbsp;<a href=\"http://en.wikipedia.org/wiki/Reference_implementation\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Reference implementation\">reference implementation</a>&nbsp;of PHP (powered by the&nbsp;<a href=\"http://en.wikipedia.org/wiki/Zend_Engine\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Zend Engine\">Zend Engine</a>) is now produced by The PHP Group.<sup class=\"reference\" id=\"cite_ref-about_PHP_6-0\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-about_PHP-6\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[6]</a></sup>&nbsp;While PHP originally stood for&nbsp;<i>Personal Home Page</i>,<sup class=\"reference\" id=\"cite_ref-History_of_PHP_5-1\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-History_of_PHP-5\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[5]</a></sup>&nbsp;it now stands for&nbsp;<i>PHP: Hypertext Preprocessor</i>, which is a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Recursive_acronym\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Recursive acronym\">recursive acronym</a>.<sup class=\"reference\" id=\"cite_ref-7\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-7\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[7]</a></sup></p>\r\n\r\n<p style=\"margin: 0.5em 0px; line-height: 22.399999618530273px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px;\">PHP code can be simply mixed with&nbsp;<a href=\"http://en.wikipedia.org/wiki/HTML\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"HTML\">HTML</a>&nbsp;code, or it can be used in combination with various&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_template_system\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web template system\">templating engines</a>&nbsp;and&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Web_framework\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web framework\">web frameworks</a>. PHP code is usually processed by a PHP&nbsp;<a href=\"http://en.wikipedia.org/wiki/Interpreter_(computing)\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Interpreter (computing)\">interpreter</a>, which is usually implemented as a web server&#39;s native&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Plugin_(computing)\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Plugin (computing)\">module</a>&nbsp;or a<a href=\"http://en.wikipedia.org/wiki/Common_Gateway_Interface\" style=\"color: rgb(11, 0, 128); background: none;\" title=\"Common Gateway Interface\">Common Gateway Interface</a>&nbsp;(CGI) executable. After the PHP code is interpreted and executed, the web server sends resulting output to its client, usually in form of a part of the generated web page&nbsp;&ndash; for example, PHP code can generate a web page&#39;s HTML code, an image, or some other data. PHP has also evolved to include a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Command-line_interface\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Command-line interface\">command-line interface</a>&nbsp;(CLI) capability and can be used in&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Computer_software\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Computer software\">standalone</a><a href=\"http://en.wikipedia.org/wiki/Graphical_user_interface\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Graphical user interface\">graphical applications</a>.<sup class=\"reference\" id=\"cite_ref-8\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-8\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[8]</a></sup></p>\r\n','keyword','description','income-tax-exemption-under-12A.html','2014-07-16 17:24:44'),(48,'Admin','The main content of todays post.','<p style=\"margin: 0.5em 0px; line-height: 22.399999618530273px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px;\"><b>PHP</b>&nbsp;is a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Server-side_scripting\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Server-side scripting\">server-side scripting</a>&nbsp;language designed for&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_development\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web development\">web development</a>&nbsp;but also used as a&nbsp;<a href=\"http://en.wikipedia.org/wiki/General-purpose_programming_language\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"General-purpose programming language\">general-purpose programming language</a>. As of January 2013, PHP was installed on more than 240 million&nbsp;<a href=\"http://en.wikipedia.org/wiki/Website\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Website\">websites</a>&nbsp;(39% of those sampled) and 2.1 million&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_server\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web server\">web servers</a>.<sup class=\"reference\" id=\"cite_ref-4\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-4\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[4]</a></sup>Originally created by&nbsp;<a href=\"http://en.wikipedia.org/wiki/Rasmus_Lerdorf\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Rasmus Lerdorf\">Rasmus Lerdorf</a>&nbsp;in 1994,<sup class=\"reference\" id=\"cite_ref-History_of_PHP_5-0\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-History_of_PHP-5\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[5]</a></sup>&nbsp;the&nbsp;<a href=\"http://en.wikipedia.org/wiki/Reference_implementation\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Reference implementation\">reference implementation</a>&nbsp;of PHP (powered by the&nbsp;<a href=\"http://en.wikipedia.org/wiki/Zend_Engine\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Zend Engine\">Zend Engine</a>) is now produced by The PHP Group.<sup class=\"reference\" id=\"cite_ref-about_PHP_6-0\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-about_PHP-6\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[6]</a></sup>&nbsp;While PHP originally stood for&nbsp;<i>Personal Home Page</i>,<sup class=\"reference\" id=\"cite_ref-History_of_PHP_5-1\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-History_of_PHP-5\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[5]</a></sup>&nbsp;it now stands for&nbsp;<i>PHP: Hypertext Preprocessor</i>, which is a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Recursive_acronym\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Recursive acronym\">recursive acronym</a>.<sup class=\"reference\" id=\"cite_ref-7\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-7\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[7]</a></sup></p>\r\n\r\n<p style=\"margin: 0.5em 0px; line-height: 22.399999618530273px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px;\">PHP code can be simply mixed with&nbsp;<a href=\"http://en.wikipedia.org/wiki/HTML\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"HTML\">HTML</a>&nbsp;code, or it can be used in combination with various&nbsp;<a href=\"http://en.wikipedia.org/wiki/Web_template_system\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web template system\">templating engines</a>&nbsp;and&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Web_framework\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Web framework\">web frameworks</a>. PHP code is usually processed by a PHP&nbsp;<a href=\"http://en.wikipedia.org/wiki/Interpreter_(computing)\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Interpreter (computing)\">interpreter</a>, which is usually implemented as a web server&#39;s native&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Plugin_(computing)\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Plugin (computing)\">module</a>&nbsp;or a<a href=\"http://en.wikipedia.org/wiki/Common_Gateway_Interface\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Common Gateway Interface\">Common Gateway Interface</a>&nbsp;(CGI) executable. After the PHP code is interpreted and executed, the web server sends resulting output to its client, usually in form of a part of the generated web page&nbsp;&ndash; for example, PHP code can generate a web page&#39;s HTML code, an image, or some other data. PHP has also evolved to include a&nbsp;<a href=\"http://en.wikipedia.org/wiki/Command-line_interface\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Command-line interface\">command-line interface</a>&nbsp;(CLI) capability and can be used in&nbsp;<a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Computer_software\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Computer software\">standalone</a><a href=\"http://en.wikipedia.org/wiki/Graphical_user_interface\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Graphical user interface\">graphical applications</a>.<sup class=\"reference\" id=\"cite_ref-8\" style=\"line-height: 1; unicode-bidi: -webkit-isolate;\"><a href=\"http://en.wikipedia.org/wiki/PHP#cite_note-8\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[8]</a></sup></p>\r\n','php','main features of php.','sales-tax.html','2014-07-16 17:55:32'),(51,'Admin','Java programming.','<p><b style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">Java</b><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;is a&nbsp;</span><a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Computer_programming_language\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Computer programming language\">computer programming language</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;that is&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Concurrent_computing\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Concurrent computing\">concurrent</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">,&nbsp;</span><a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Class-based\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Class-based\">class-based</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">,&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Object-oriented_programming\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Object-oriented programming\">object-oriented</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">, and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers &quot;</span><a href=\"http://en.wikipedia.org/wiki/Write_once,_run_anywhere\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Write once, run anywhere\">write once, run anywhere</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&quot; (WORA), meaning that code that runs on one platform does not need to be recompiled to run on another. Java applications are typically&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Compiler\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Compiler\">compiled</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;to</span><a href=\"http://en.wikipedia.org/wiki/Java_bytecode\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Java bytecode\">bytecode</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;(</span><a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Class_(file_format)\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Class (file format)\">class file</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">) that can run on any&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Java_virtual_machine\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Java virtual machine\">Java virtual machine</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;(JVM) regardless of&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Computer_architecture\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Computer architecture\">computer architecture</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">. Java is, as of 2014, one of the most popular programming languages in use, particularly for client-server web applications, with a reported 9 million developers.</span><sup class=\"reference\" id=\"cite_ref-10\" style=\"line-height: 1; unicode-bidi: -webkit-isolate; color: rgb(37, 37, 37); font-family: sans-serif;\"><a href=\"http://en.wikipedia.org/wiki/Java_(programming_language)#cite_note-10\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[10]</a></sup><sup class=\"reference\" id=\"cite_ref-11\" style=\"line-height: 1; unicode-bidi: -webkit-isolate; color: rgb(37, 37, 37); font-family: sans-serif;\"><a href=\"http://en.wikipedia.org/wiki/Java_(programming_language)#cite_note-11\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[11]</a></sup><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;Java was originally developed by&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/James_Gosling\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"James Gosling\">James Gosling</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;at&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Sun_Microsystems\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Sun Microsystems\">Sun Microsystems</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;(which has since&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Sun_acquisition_by_Oracle\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Sun acquisition by Oracle\">merged into Oracle Corporation</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">) and released in 1995 as a core component of Sun Microsystems&#39;&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Java_(software_platform)\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Java (software platform)\">Java platform</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">. The language derives much of its&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Syntax_(programming_languages)\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Syntax (programming languages)\">syntax</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">from&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/C_(programming_language)\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"C (programming language)\">C</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;and&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/C%2B%2B\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"C++\">C++</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">, but it has fewer&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Low-level_programming_language\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Low-level programming language\">low-level</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;facilities than either of them.</span></p>\r\n','java programming','java is life.','pf.html\r\n','2014-07-16 18:41:22'),(56,'Admin','Test file from india.','<p><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">The Central Government has been empowered by Entry 82 of the Union List of Schedule VII of the&nbsp;</span><a href=\"http://en.wikipedia.org/wiki/Constitution_of_India\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Constitution of India\">Constitution of India</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;to levy tax on all income other than agricultural income (</span><i style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">subject to Section 10(1)</i><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">).</span><sup class=\"reference\" id=\"cite_ref-1\" style=\"line-height: 1; unicode-bidi: -webkit-isolate; color: rgb(37, 37, 37); font-family: sans-serif;\"><a href=\"http://en.wikipedia.org/wiki/Income_tax_in_India#cite_note-1\" style=\"text-decoration: none; color: rgb(11, 0, 128); white-space: nowrap; background: none;\">[1]</a></sup><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;The Income Tax Law comprises The Income Tax Act 1961, Income Tax Rules 1962, Notifications and Circulars issued by&nbsp;</span><a class=\"mw-redirect\" href=\"http://en.wikipedia.org/wiki/Central_Board_of_Direct_Taxes\" style=\"text-decoration: none; color: rgb(11, 0, 128); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\" title=\"Central Board of Direct Taxes\">Central Board of Direct Taxes</a><span style=\"color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; line-height: 22.399999618530273px;\">&nbsp;(CBDT), Annual Finance Acts and Judicial pronouncements by Supreme Court and High Courts.</span></p>\r\n','keyword','description','tax.html','2014-07-17 12:32:37'),(83,'Admin','Income Tax Exemption Under section 12-A and 80-G of Income Tax Act 1961','<div><strong>80G - Income Tax Exemption&nbsp;</strong><br />\r\nNGO can avail income tax exemption by getting itself registered and complying with certain other formalities, but such registration does not provide any benefit to the persons making donations. The Income Tax Act has certain provisions which offer tax benefits to the &quot;donors&quot;. All NGO&#39;s should avail the advantage of these provisions to attract potential donors. Section 80G is one of such sections.</div>\r\n\r\n<div>If an organization has obtained certification under section 80-G of Income Tax Act then donors of that NGO can claim exemption from Income Tax.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Registration Under 80G:</strong></div>\r\n\r\n<div>If an NGO gets itself registered under section 80G then the person or the organisation making a donation to the NGO will get a deduction of 50% from his/its taxable income. The NGO has to apply in Form No. 10G &nbsp;to the Commissioner of Income Tax for such registration</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>What is section 12-A of Income Tax Act. ?</div>\r\n\r\n<div>Income of an organization is exempted if&nbsp; NGO has 12-A registration. All income shall not be taxable after 12-A registration. This is one time registration.</div>\r\n\r\n<div>When an organization can apply for registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>Application for registration under section 12A and 80G can be applied just after registration of the NGO.</div>\r\n\r\n<div>Where to apply for registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>Application for registration under section 12A and 8OG can be applied to the Commissioner of Income-tax having jurisdiction over the institution.</div>\r\n\r\n<div>Can both the applications under section 12A and 80G of Income Tax Act be applied together?</div>\r\n\r\n<div>Yes! Both applications can be applied together or it can also be applied separately also. If some organization is willing to apply both applications separately, then application for registration u/s 12A will be applied first. Getting 12A registration is must for applying application for registration<br />\r\nu/s 80G of Income Tax Act.</div>\r\n\r\n<div>Generally what is the timeline for getting registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>If application for registration under section 12A and 80G will be applied through NGO Factory, it should take 3 to 4 months.</div>\r\n\r\n<div>What is the procedure for getting registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Step-1:&nbsp;</strong>Dully filled-in application will be submitted to the exemption section of the lncome Tax Department.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Step-2:&nbsp;</strong>NGO will receive notice for clarifications from Income Tax Department in 2-3 months after applying.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Step-3:&nbsp;</strong>Reply of notice will be submitted by the consultant along with all relevant desired documents to the Income Tax Departments.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Step-4:&nbsp;</strong>Consultant will personally visit the Income Tax Departments to follow-up the case on behalf of the applicant organization.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Step-5:&nbsp;</strong>Exemption Certificates will be issued.</div>\r\n\r\n<div>What is the validity period of the registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>12A &amp; 80G registration: Lifetime validity</div>\r\n\r\n<div>What application forms are being used for applying for registration under section 12A and 80G of Income Tax Act?</div>\r\n\r\n<div>12A registration: Form 10B</div>\r\n\r\n<div><br />\r\n80G registration: Form 10G&nbsp;</div>\r\n\r\n<div>What are the conditions on Section 80G?</div>\r\n\r\n<div>There are few conditions to be fulfilled under the section 80G:</div>\r\n\r\n<ul>\r\n	<li>The NGO should not have any incomes which are not exempted, such as business income. lf, the NGO has business income then it should maintain separate books of accounts and should not divert donations received for the purpose of such business.</li>\r\n	<li>The bylaws or objectives of the NGOs should not contain any provision for spending the income or assets of the NGO for purposes other than charitable.</li>\r\n	<li>The NGO is not working for the benefit of particular religious community or caste.</li>\r\n	<li>The NGO maintains regular accounts of its receipts &amp; expenditures.</li>\r\n	<li>The NGO is properly registered under the Societies Registration Act 1860 or under any law corresponding to that act or is registered under section 25 of the Companies Act 1956.</li>\r\n</ul>\r\n\r\n<div>What is Tax Exemption limit on donations?</div>\r\n\r\n<div>There is a limit on how much money can be exempted from the Income Tax.</div>\r\n\r\n<ul>\r\n	<li>If the amount of deduction to a charitable organisation or trust is more than 10% of the Gross Total Income computed under the Act (as reduced by income on which income-tax is not payable under any provision of this Act and by any amount in respect of which the assesse is entitled to a deduction under any other provision of this Chapter), then the amount in excess of 10% of Gross Total Income shall not qualify for deduction under section 80G.</li>\r\n	<li>The persons or organisations who donate under section 80G gets a deduction of 50% from their taxable income. Here at times a confusion creeps in, that the tax advantage under section 80G is 50%, but actually it is not so. 50% of the donation made is allowed to be deducted from the taxable income and consequently tax is calculated.</li>\r\n	<li>The ultimate benefit will depend on the tax rates applicable to the assesse.&nbsp;</li>\r\n</ul>\r\n\r\n<div>Documents required for registration u/s 12A AND 80G:</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>1.&nbsp;&nbsp;&nbsp;&nbsp;Dully filled in Form - 10B for registration u/s 12A registration;</div>\r\n\r\n<div>2.&nbsp;&nbsp;&nbsp;&nbsp;Dully filled in Form - 10G for registration u/s 80G registration;</div>\r\n\r\n<div>3.&nbsp;&nbsp;&nbsp;&nbsp;Registration Certificate and MOA /Trust Deed (two copies - self attested by NGO head);</div>\r\n\r\n<div>4.&nbsp;&nbsp;&nbsp;&nbsp;NOC from Landlord (where registered office is situated);</div>\r\n\r\n<div>5.&nbsp;&nbsp;&nbsp;&nbsp;Copy of PAN card of NGO;</div>\r\n\r\n<div>6.&nbsp;&nbsp;&nbsp;&nbsp;Electricity Bill / House tax Receipt /Water Bill (photocopy);</div>\r\n\r\n<div>7.&nbsp;&nbsp;&nbsp;&nbsp;Evidence of welfare activities carried out &amp; Progress Report since inception or last 3 years;</div>\r\n\r\n<div>8.&nbsp;&nbsp;&nbsp;&nbsp;Books of Accounts, Balance Sheet &amp; ITR (if any), since inception or last 3 years;</div>\r\n\r\n<div>9.&nbsp;&nbsp;&nbsp;&nbsp;List of donors along with their address and PAN;</div>\r\n\r\n<div>10.&nbsp;&nbsp;List of governing body I board of trustees members with their contact details;</div>\r\n\r\n<div>11.&nbsp;&nbsp;Original RC and MOA /Trust Deed for verification;</div>\r\n\r\n<div>12.&nbsp;&nbsp;Authority letter in favour of NGO Factory;</div>\r\n\r\n<div>13.&nbsp;&nbsp;Any other document I affidavit / undertaking I information asked by the Income Tax department</div>\r\n','Income Tax Exemption Under section 12-A and 80-G of Income Tax Act 1961','Income Tax Exemption Under section 12-A and 80-G of Income Tax Act 1961','','2014-08-02 11:42:18'),(84,'Admin','Income Tax Rebate Sec 87A-A to Resident Individuals','<div><strong>Sec 87A- A small Rebate of income-tax to Resident Individuals.</strong></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>In Budget 2013 Finance Minister Mr. P. Chidambaram choose a middle way to give benefit to small tax payers and save a big amount of tax for tax revenue by neglected bigger slab tax payers. Sec 87A was introduced- A tax rebate which is not so high to affect a lot to revenue and it is only for middle class.</div>\r\n\r\n<div>The Finance Minister had said in the parliament:</div>\r\n\r\n<div>&ldquo;Nevertheless, I am inclined to give some relief to the tax payers in the first bracket of Rs. 2 Lakh to Rs. 5 Lakh. Assuming an inflation rate of 10% and a notional rise in the threshold exemption from Rs. 2,00,000/- to Rs. 2,20,000/- I propose to provide a tax credit of Rs. 2,000/- to every person who has a total income upto Rs. 5 Lakh&rdquo;</div>\r\n\r\n<div>It is assumed that about 1.8 crore taxpayers will get benefit of this rebate. So a little amount of Rs. 2,000/- per tax payer made a huge revenue loss of approx. 3,600 crore Indian rupees to income tax department.</div>\r\n\r\n<div>This section is applicable from 1-4-2014 i.e. it is applicable for A.Y. 2014-15.</div>\r\n\r\n<div>Sec 87A says:</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><em>The section 87A seeks to provide that an tax payer being an individual , whose total Taxable Income does not exceed 5,00,000/-( After deduction of U/s 10, 16, 80C and under chapter VI A). It is must be great opportunity to tax relief for below tax payers.</em></li>\r\n	<li><em>This amendment will take effect from 1st April 2013 which effect for the Financial Year 2013-14 and Assessment Year 2014-15.</em></li>\r\n</ol>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>Section 87A&nbsp;</strong>provides a tax rebate upto Rs. 2,000/- to individuals who have total income upto 5,00,000/-. The tax slab remained same there is no change in it. This is only giving a rebate of tax amount which is equal to hundred percent of income tax or 2,000/- whichever is less i.e. minimum tax rebate is the tax amount in normal course and maximum is Rs. 2,000/-. Thus it will not be deducted from the income, it will be deducted from the tax amount. One point to be noted, education cess and secondary and Higher education cess will be charged after adjusting this rebate.</div>\r\n\r\n<div><strong>Understanding of rebate u/s 87A</strong></div>\r\n\r\n<ul>\r\n	<li>Only&nbsp;<strong>individuals</strong>&nbsp;can take benefit of this. Individual can be male, female or senior citizen. HUF, Companies, Partnership Firms, LLPs are not allowed to claim this rebate.</li>\r\n	<li>Only&nbsp;<strong>Resident</strong>&nbsp;individuals are eligible.</li>\r\n	<li>This rebate is&nbsp;<strong>not applicable to Super Senior Citizens&nbsp;</strong>i.e. individuals who has attained the age of 80 because their income upto 5,00,000/- is exempt from Income tax and this section doesn&rsquo;t applicable on above 5,00,000/- total income.</li>\r\n	<li>This relief is for all individuals whose total income is not more than 5,00,000/-. This means total income can be 5,00,000/-.</li>\r\n	<li>This is applicable from 1-4-2014 it means it is for assessment year 2014-15 or financial year 2013-14.</li>\r\n	<li>87A is<strong>&nbsp;applicable on total Income not on Gross Income</strong>. Gross income means total of income under all five heads i.e. Salary, House Property, Business or Profession, Capital Gains and Income from other sources. When we deduct all losses of business or other under other heads and deductions u/s 10, 16 and chapter VI A then it becomes Total Income.&nbsp; It means this income must be reduced by all available deductions and rebate except sec 87A. So this makes possible that Gross income can be more than 5,00,000/-. It must be equal or below 5,00,000/- after deductions of sec 10, 16 and all deductions of chapter VI A for claiming rebate under this section.</li>\r\n	<li>Filing of income tax return is necessary in spite of fact that total income is below exempt limit after this rebate.</li>\r\n</ul>\r\n\r\n<div><strong>Calculation method of rebate amount u/s 87A</strong></div>\r\n\r\n<ol>\r\n	<li>First calculate total income by deducted all possible deductions and rebates from Gross total income except sec 87A, it is total income for normal tax rate.</li>\r\n	<li>From this total income liable to tax, calculate tax in normal course which will be 10% slab as it is normal rate for total income upto 5,00,000/-.</li>\r\n	<li>Now deduct total tax or 2,000/- whichever is less from above calculated tax.</li>\r\n	<li>Calculate education cess and secondary and higher education cess on this amount.</li>\r\n	<li>Total of this will be tax payable by individual.</li>\r\n</ol>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><strong>For example</strong>: Let&rsquo;s assume Mr. X is a businessman. In F.Y. 2013-14 Mr. X&rsquo;s total income is 5,80,000/-. He deposited 30,000/- in Mutual fund, deposited 20,000/- in PPF and purchased 10,000/- NSC and home loan installment payment of Rs. 80,000/-. So he got 1,00,000/- deduction u/s 80C. He paid home loan interest of Rs. 15,000/- so his loss from house property is 15,000/-. Now his total income is 5,80,000 - 1,00,000 - 15,000 = 4,65,000/-</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Normal tax 10% of (4,65,000-2,00,000 = 2,65,000) is 26,500/-. Now deduct 2,000/- as rebate u/s 87A. Remaining tax is 24,500/-. Education cess and secondary and Higher education cess will be calculated on this amount.</div>\r\n','Income Tax Rebate Sec 87A-A to Resident Individuals','Income Tax Rebate Sec 87A-A to Resident Individuals','','2014-08-02 11:47:35');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag` (
  `tag_id` int(4) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag`
--

LOCK TABLES `article_tag` WRITE;
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
INSERT INTO `article_tag` (`tag_id`, `tag_name`) VALUES (21,'Income Tax'),(27,'php'),(31,'java'),(32,'bass biz'),(33,'service tax'),(34,'companies act-2013'),(36,'bass biz'),(37,'Tax Planning'),(38,'java');
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tag_map`
--

DROP TABLE IF EXISTS `article_tag_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag_map` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tag_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `article_tag_map_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `article_tag` (`tag_id`),
  CONSTRAINT `article_tag_map_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `article` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag_map`
--

LOCK TABLES `article_tag_map` WRITE;
/*!40000 ALTER TABLE `article_tag_map` DISABLE KEYS */;
INSERT INTO `article_tag_map` (`id`, `tag_id`, `post_id`) VALUES (2,21,42),(3,31,42),(14,32,56),(34,27,48),(35,21,83),(39,21,84),(40,37,84),(41,38,51),(42,27,51);
/*!40000 ALTER TABLE `article_tag_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` double NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pemail` varchar(100) NOT NULL,
  `pmobile` double NOT NULL,
  `noofemp` int(11) NOT NULL,
  `package` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `companyname`, `address`, `email`, `mobile`, `pname`, `pemail`, `pmobile`, `noofemp`, `package`) VALUES (1,'','','',0,'','',0,5,'sliver'),(2,'','','',0,'','',0,0,''),(3,'','','',0,'','',0,0,''),(4,'','','',0,'','',0,5,'sliver'),(5,'','','',0,'','',0,0,''),(6,'','','',0,'','',0,0,''),(7,'','','',0,'','',0,5,'sliver'),(8,'','','',0,'','',0,0,''),(9,'','','',0,'','',0,5,'sliver'),(10,'','','',0,'','',0,5,'sliver'),(11,'','','',0,'','',0,0,''),(12,'','','',0,'','',0,0,''),(13,'','','',0,'','',0,5,'sliver'),(14,'','','',0,'','',0,5,'sliver'),(15,'','','',0,'','',0,0,''),(16,'','','',0,'','',0,0,''),(17,'','','',0,'','',0,5,'sliver'),(18,'','','',0,'','',0,0,''),(19,'','','',0,'','',0,5,'sliver'),(20,'','','',0,'','',0,0,''),(21,'','','',0,'','',0,0,''),(22,'','','',0,'','',0,5,'sliver');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_contact`
--

DROP TABLE IF EXISTS `feedback_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `who` varchar(120) NOT NULL,
  `what` varchar(120) NOT NULL,
  `name` varchar(160) NOT NULL,
  `designation` varchar(160) NOT NULL,
  `company` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `mobile` bigint(160) NOT NULL,
  `feedback` varchar(260) NOT NULL,
  `file` varchar(250) DEFAULT 'No File',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_contact`
--

LOCK TABLES `feedback_contact` WRITE;
/*!40000 ALTER TABLE `feedback_contact` DISABLE KEYS */;
INSERT INTO `feedback_contact` (`id`, `who`, `what`, `name`, `designation`, `company`, `email`, `mobile`, `feedback`, `file`, `date`) VALUES (37,'Business Partner','Complaint','Sathish','CEO','Bass','mail@mail.com',9994788678,'good.','feedback_files/2054772636.','2014-08-09 13:11:49'),(38,'Business Partner','Complaint','Sathish','CEO','JJ corp','mail@mail.com',9994788938,'good.','feedback_files/493151398.','2014-08-09 16:51:21'),(39,'Business Partner','Complaint','Kumar','CEO','Techs','mail@mail.com',9994567834,'good.','feedback_files/1419170147.','2014-08-09 16:56:24'),(40,'Business Partner','Complaint','Sathish','CEO','Techs','mail@mail.com',9994578390,'good.','feedback_files/731721253.','2014-08-09 17:12:51'),(41,'Business Partner','Complaint','Kumar','CEO','Bass Techs','mail@mail.com',9994567823,'godd.','feedback_files/596107398.','2014-08-09 17:25:10'),(42,'Business Partner','Complaint','Test','CEO','test','mail@mail.com',9983938930,'test','feedback_files/1900028557.','2014-08-09 17:27:49');
/*!40000 ALTER TABLE `feedback_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `google_login`
--

DROP TABLE IF EXISTS `google_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `google_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `inserted_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `google_login`
--

LOCK TABLES `google_login` WRITE;
/*!40000 ALTER TABLE `google_login` DISABLE KEYS */;
INSERT INTO `google_login` (`id`, `name`, `email`, `mobile`, `inserted_on`) VALUES (7,'Sathish','sjksathishkumar@gmail.com',9997866789,'2014-07-09 09:45:30'),(8,'basstechs','basstechsindia@gmail.com',9994788682,'2014-07-12 15:26:46'),(9,'Balaji M','balajikarthiq@gmail.com',9994788645,'2014-07-12 22:23:25'),(15,'Rinsy Ullas','rinsy.ullas@gmail.com',5685336664,'2014-07-21 18:31:27'),(19,'karthiq m','karthiq.m@gmail.com',NULL,'2014-07-23 08:09:52'),(24,'Bass Biz','bassbizindia@gmail.com',NULL,'2014-07-23 11:52:30'),(25,'VGrow Monger','vgrowmonger@gmail.com',NULL,'2014-07-23 11:58:37'),(26,'Antony B Adaikalam','aantonycma@gmail.com',9884040580,'2014-07-23 12:03:25');
/*!40000 ALTER TABLE `google_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `candidate_id` int(5) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(130) NOT NULL,
  `name` varchar(150) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `Experience` varchar(250) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(160) NOT NULL,
  `resume` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`candidate_id`, `job_id`, `name`, `qualification`, `Experience`, `mobile`, `email`, `resume`, `date`) VALUES (17,'1','Sathish','b.Tech','Fresher',9994788682,'sjksathishkumar@gmail.com','resume/390961300.','2014-08-09 16:22:27');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knowledge_center`
--

DROP TABLE IF EXISTS `knowledge_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knowledge_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(260) NOT NULL,
  `content` longtext NOT NULL,
  `category` varchar(132) NOT NULL,
  `kc_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledge_center`
--

LOCK TABLES `knowledge_center` WRITE;
/*!40000 ALTER TABLE `knowledge_center` DISABLE KEYS */;
INSERT INTO `knowledge_center` (`id`, `title`, `content`, `category`, `kc_date`) VALUES (1,'Income tax content by sathishkumar.','<p>Income tax content</p>\r\n','service_tax','0000-00-00 00:00:00'),(2,'Sales tax','sales tax content','custom_duty','0000-00-00 00:00:00'),(3,'Income tax in India','The Central Government has been empowered by Entry 82 of the Union List of Schedule VII of the Constitution of India to levy tax on all income other than agricultural income (subject to Section 10(1)).[1] The Income Tax Law comprises The Income Tax Act 1961, I','excise_duty','0000-00-00 00:00:00'),(5,'Test title for knowledge center.','Test content for knowledge center.','esi','2014-07-24 13:48:44'),(6,'Test title for knowledge center.','Test content for knowledge center.','professional_tax','2014-07-24 13:48:44'),(7,'Test title for knowledge center.','Test content for knowledge center.','vat','2014-07-24 13:48:44'),(8,'Test title for knowledge center.','Test content for knowledge center.','cst','2014-07-24 13:48:44'),(9,'Test title for knowledge center.','Test content for knowledge center.','pf','2014-07-24 13:48:44'),(10,'Test title for knowledge center.','Test content for knowledge center.','gst','2014-07-24 13:48:44'),(11,'Test title for knowledge center.','Test content for knowledge center.','company_act','2014-07-24 13:48:44'),(12,'Test title for knowledge center.','Test content for knowledge center.','labour_act','2014-07-24 13:48:44'),(13,'Test title for knowledge center.','Test content for knowledge center.','llp','2014-07-24 13:48:44'),(14,'Test title for knowledge center.','Test content for knowledge center.','firm','2014-07-24 13:48:44'),(15,'Test title for knowledge center.','Test content for knowledge center.','start_up','2014-07-24 13:48:44'),(16,'Test title for knowledge center.','Test content for knowledge center.','other','2014-07-24 13:48:44'),(41,'Sec 87A- A small Rebate of income-tax to Resident Individuals.','<p>&nbsp; In Budget 2013 Finance Minister Mr. P. Chidambaram choose a middle way to give benefit to small tax payers and save a big amount of tax for tax revenue by neglected bigger slab tax payers. Sec 87A was introduced- A tax rebate which is not so high to affect a lot to revenue and it is only for middle class. The Finance Minister had said in the parliament: &ldquo;Nevertheless, I am inclined to give some relief to the tax payers in the first bracket of Rs. 2 Lakh to Rs. 5 Lakh. Assuming an inflation rate of 10% and a notional rise in the threshold exemption from Rs. 2,00,000/- to Rs. 2,20,000/- I propose to provide a tax credit of Rs. 2,000/- to every person who has a total income upto Rs. 5 Lakh&rdquo; It is assumed that about 1.8 crore taxpayers will get benefit of this rebate. So a little amount of Rs. 2,000/- per tax payer made a huge revenue loss of approx. 3,600 crore Indian rupees to income tax department. This section is applicable from 1-4-2014 i.e. it is applicable for A.Y. 2014-15. Sec 87A says: &nbsp;The section 87A seeks to provide that an tax payer being an individual , whose total Taxable Income does not exceed 5,00,000/-( After deduction of U/s 10, 16, 80C and under chapter VI A). It is must be great opportunity to tax relief for below tax payers. This amendment will take effect from 1st April 2013 which effect for the Financial Year 2013-14 and Assessment Year 2014-15. &nbsp;Section 87A provides a tax rebate upto Rs. 2,000/- to individuals who have total income upto 5,00,000/-. The tax slab remained same there is no change in it. This is only giving a rebate of tax amount which is equal to hundred percent of income tax or 2,000/- whichever is less i.e. minimum tax rebate is the tax amount in normal course and maximum is Rs. 2,000/-. Thus it will not be deducted from the income, it will be deducted from the tax amount. One point to be noted, education cess and secondary and Higher education cess will be charged after adjusting this rebate. Understanding of rebate u/s 87A Only individuals can take benefit of this. Individual can be male, female or senior citizen. HUF, Companies, Partnership Firms, LLPs are not allowed to claim this rebate. Only Resident individuals are eligible. This rebate is not applicable to Super Senior Citizens i.e. individuals who has attained the age of 80 because their income upto 5,00,000/- is exempt from Income tax and this section doesn&rsquo;t applicable on above 5,00,000/- total income. This relief is for all individuals whose total income is not more than 5,00,000/-. This means total income can be 5,00,000/-. This is applicable from 1-4-2014 it means it is for assessment year 2014-15 or financial year 2013-14. 87A is applicable on total Income not on Gross Income. Gross income means total of income under all five heads i.e. Salary, House Property, Business or Profession, Capital Gains and Income from other sources. When we deduct all losses of business or other under other heads and deductions u/s 10, 16 and chapter VI A then it becomes Total Income. &nbsp;It means this income must be reduced by all available deductions and rebate except sec 87A. So this makes possible that Gross income can be more than 5,00,000/-. It must be equal or below 5,00,000/- after deductions of sec 10, 16 and all deductions of chapter VI A for claiming rebate under this section. Filing of income tax return is necessary in spite of fact that total income is below exempt limit after this rebate. Calculation method of rebate amount u/s 87A First calculate total income by deducted all possible deductions and rebates from Gross total income except sec 87A, it is total income for normal tax rate. From this total income liable to tax, calculate tax in normal course which will be 10% slab as it is normal rate for total income upto 5,00,000/-. Now deduct total tax or 2,000/- whichever is less from above calculated tax. Calculate education cess and secondary and higher education cess on this amount. Total of this will be tax payable by individual. &nbsp;For example: Let&rsquo;s assume Mr. X is a businessman. In F.Y. 2013-14 Mr. X&rsquo;s total income is 5,80,000/-. He deposited 30,000/- in Mutual fund, deposited 20,000/- in PPF and purchased 10,000/- NSC and home loan installment payment of Rs. 80,000/-. So he got 1,00,000/- deduction u/s 80C. He paid home loan interest of Rs. 15,000/- so his loss from house property is 15,000/-. Now his total income is 5,80,000 - 1,00,000 - 15,000 = 4,65,000/- Normal tax 10% of (4,65,000-2,00,000 = 2,65,000) is 26,500/-. Now deduct 2,000/- as rebate u/s 87A. Remaining tax is 24,500/-. Education cess and secondary and Higher education cess will be calculated on this amount.</p>\r\n.','income_tax','2014-08-02 12:07:00');
/*!40000 ALTER TABLE `knowledge_center` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`user_id`, `time`) VALUES (5,'1405184580'),(5,'1405495622'),(5,'1405587551'),(5,'1406013147'),(5,'1406097497'),(5,'1406097512'),(5,'1406191041'),(5,'1406265608');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`) VALUES (5,'kumar','kumar@gmail.com','e3b9a522ac3a5bf8fbb9fdc788d0cf1a8c24b1e78ab6eb0f216efac40cd0d03c2925e52769b76edbffc9fc323cb75d298835951da4abd31b97deeb919d548d8e','8228a9f09aeb06fbac673a163ac65fbdb62daad60a86c3729ba2ff7386d17181620866a9106b1afc708650b9c684d4be57f4bd1f262abacb35847f3e3205ee5a');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_contact`
--

DROP TABLE IF EXISTS `partner_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(160) NOT NULL,
  `designation` varchar(160) NOT NULL,
  `company` varchar(280) NOT NULL,
  `investment` varchar(280) NOT NULL,
  `mobile` bigint(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `postal_code` int(120) NOT NULL,
  `reason` varchar(280) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_contact`
--

LOCK TABLES `partner_contact` WRITE;
/*!40000 ALTER TABLE `partner_contact` DISABLE KEYS */;
INSERT INTO `partner_contact` (`id`, `name`, `designation`, `company`, `investment`, `mobile`, `email`, `city`, `state`, `country`, `postal_code`, `reason`, `time`) VALUES (21,'Sathish','Head','Team-s','Upto 5 Laks',9989389098,'kumar@gmail.com','Chennai','TN','IN',898789,'For fun.','2014-07-11 15:04:33'),(23,'Rinsy Ullas','fghdsaa','xyz','Upto 5 Laks',9876543212,'rinsy.ulls@gmail.com','chennai','tamilnadu','india',234565,'eryuiioooookh','2014-07-22 14:53:26');
/*!40000 ALTER TABLE `partner_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `qus_id` int(4) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `description` varchar(280) NOT NULL,
  `user_id` int(5) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `ans_rply` tinyint(1) NOT NULL DEFAULT '0',
  `qus_date` datetime NOT NULL,
  PRIMARY KEY (`qus_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `google_login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`qus_id`, `question`, `description`, `user_id`, `answer`, `ans_rply`, `qus_date`) VALUES (20,'Test question.','Need description.',8,'Answer will given you shortly.',1,'2014-07-14 12:42:36'),(21,'Updated question by Sathish. ','description change.',26,'<p>Content would be updated by sathish.</p>\r\n',1,'2014-07-23 12:07:16'),(22,'Test question by vimal.','Description.',7,'<p>Answer will be give soon.</p>\r\n',1,'2014-08-10 06:41:12');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions_tag`
--

DROP TABLE IF EXISTS `questions_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_tag` (
  `tag_id` int(5) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(120) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_tag`
--

LOCK TABLES `questions_tag` WRITE;
/*!40000 ALTER TABLE `questions_tag` DISABLE KEYS */;
INSERT INTO `questions_tag` (`tag_id`, `tag_name`) VALUES (11,'income tax'),(12,'sales tax'),(13,'income tax'),(14,'CA2013'),(15,'ROC Compliance'),(16,'vat');
/*!40000 ALTER TABLE `questions_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions_tag_map`
--

DROP TABLE IF EXISTS `questions_tag_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_tag_map` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tag_id` int(5) NOT NULL,
  `qus_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tag_id` (`tag_id`),
  KEY `fk_qus_id` (`qus_id`),
  CONSTRAINT `fk_qus_id` FOREIGN KEY (`qus_id`) REFERENCES `questions` (`qus_id`),
  CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `questions_tag` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_tag_map`
--

LOCK TABLES `questions_tag_map` WRITE;
/*!40000 ALTER TABLE `questions_tag_map` DISABLE KEYS */;
INSERT INTO `questions_tag_map` (`id`, `tag_id`, `qus_id`) VALUES (3,13,20),(4,14,21),(5,15,21),(6,11,22),(7,16,22);
/*!40000 ALTER TABLE `questions_tag_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_contact`
--

DROP TABLE IF EXISTS `sales_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `company_name` varchar(180) NOT NULL,
  `company_type` varchar(180) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(120) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `requirements` varchar(260) NOT NULL,
  `description` varchar(260) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_contact`
--

LOCK TABLES `sales_contact` WRITE;
/*!40000 ALTER TABLE `sales_contact` DISABLE KEYS */;
INSERT INTO `sales_contact` (`id`, `name`, `designation`, `company_name`, `company_type`, `mobile`, `email`, `city`, `state`, `country`, `postal_code`, `requirements`, `description`, `date`) VALUES (37,'Sathishkumar','Developer','Bass Techs','Partnership',9994788678,'kumar@gmail.com ','Chennai ','Tamilnadu','India',600106,'',' Need to deal with your company.','2014-07-11 12:43:17'),(39,'Sathish','Developer','Bass Techs','Partnership',8973878987,'bass@mail.com ','Trichy ','TN','IN',789076,'business_registration,',' TEst','2014-07-11 13:04:18'),(40,'Sathishkumar','Developer','Bass Techs','Partnership',8938495890,'sjksathishkumar@gmail.com ','Chennai ','TN','IN',787809,'',' Need Details.','2014-07-11 14:08:35'),(43,'aji','xxxx','www','Properatorship',9876543212,'rinsy.ulls@gmail.com ','chennai ','tamilnadu','india',234565,'business_registration,','rtuvfj ','2014-07-22 14:52:00');
/*!40000 ALTER TABLE `sales_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'basspris_bassadmin'
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
