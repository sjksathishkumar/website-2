<?php

	if($_GET['ref']=='emp_temp' && $_GET['ref']!= ''){
	
	$file_name = 'EMPLOYEE TEMPLETE.xls';
	
	header("Content-disposition: attachment; filename=\"$file_name\"");
	header("Content-type: application/vnd.ms-excel");
	readfile($file_name);
	exit;
	}
	
	if($_GET['ref']=='attan_temp' && $_GET['ref']!= ''){
	
	
	include("../include/config.php");
	
	function cleanData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"'))
			$str = '"' . str_replace('"', '""', $str) . '"';
	}

	//filename for download 
	$file_name = "website_data_" . date('Ymd') . ".xls"; 
	header("Content-disposition: attachment; filename=\"$file_name\"");
	header("Content-type: application/vnd.ms-excel");
	$flag = false; 
	$result = mysql_query("SELECT id, user_name as Employee_Code, disp_name as Name FROM emp_login ORDER BY id asc") or die('Query failed!'); 
	echo mysql_error();
	while(false !== ($row = mysql_fetch_assoc($result)))
	{ 
		if(!$flag) 
		{ 
			// display field/column names as first row 
			echo implode("\t", array_keys($row)) . "\t" . 'Year' . "\t" . 'Month' . "\t" . 'Working Days' . "\t" . 'Present Days' . "\r\n"; 
			$flag = true;
		} 
		array_walk($row, 'cleanData'); 
		echo implode("\t", array_values($row)) . "\r\n"; 
	}
	exit;
	
	}
	
	if($_GET['ref']=='dept_temp' && $_GET['ref']!= ''){
	
	
	include("../include/config.php");
	
	function cleanData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"'))
			$str = '"' . str_replace('"', '""', $str) . '"';
	}

	//filename for download 
	$file_name = "website_data_" . date('Ymd') . ".xls"; 
	header("Content-disposition: attachment; filename=\"$file_name\"");
	header("Content-type: application/vnd.ms-excel");
	
	$flag = false; 
	$result = mysql_query("SELECT id, user_name as Employee_Code, disp_name as Name FROM emp_login ORDER BY id asc") or die('Query failed!'); 
	echo mysql_error();
	while(false !== ($row = mysql_fetch_assoc($result)))
	{ 
		if(!$flag) 
		{ 
			// display field/column names as first row 
			echo implode("\t", array_keys($row)) . "\t" . 'Department Name'. "\r\n"; 
			$flag = true;
		} 
		array_walk($row, 'cleanData'); 
		echo implode("\t", array_values($row)) . "\r\n"; 
	} 
	exit;
	
	}
?>