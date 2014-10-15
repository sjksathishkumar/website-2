<?php
		$hostname = "localhost";
		$username = "basspris_payer";
		$password = "Bass2013!";
		
		$dbname = "basspris_payroll_master";
		
		$conn = mysql_connect($hostname,$username,$password);
		$dbhandle = mysql_select_db($dbname);
		if(!$conn) echo "Unable to connect $hostname" . mysql_error();
		if(!$dbhandle) echo "Unable to connect databse" . mysql_error();
?>