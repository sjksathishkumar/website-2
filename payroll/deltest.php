<?php
include_once("include/config.php");

$empdet = mysql_query("TRUNCATE TABLE emp_details");
$empatt = mysql_query("TRUNCATE TABLE emp_attendance");
$test1 = mysql_query("TRUNCATE TABLE test1");
$test3 = mysql_query("TRUNCATE TABLE test3");
mysql_query("TRUNCATE TABLE jan");
mysql_query("TRUNCATE TABLE feb");
mysql_query("TRUNCATE TABLE march");
mysql_query("TRUNCATE TABLE april");
mysql_query("TRUNCATE TABLE may");
mysql_query("TRUNCATE TABLE june");
mysql_query("TRUNCATE TABLE july");
mysql_query("TRUNCATE TABLE august");
mysql_query("TRUNCATE TABLE september");
mysql_query("TRUNCATE TABLE october");
mysql_query("TRUNCATE TABLE november");
mysql_query("TRUNCATE TABLE december");

Header('Location:http://localhost/payrollflat/index.php');

?>