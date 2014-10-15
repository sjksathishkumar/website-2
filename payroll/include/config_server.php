<?php
		$hostname = "localhost";
		$username = "basspris_payuser";
		$password = "admin@123";
		$dbname = "basspris_payroll_btip001";
		$conn = mysql_connect($hostname,$username,$password);
		$dbhandle = mysql_select_db($dbname);
		if(!$conn) echo "Unable to connect $hostname" . mysql_error();
		if(!$dbhandle) echo "Unable to connect databse" . mysql_error();
?>
