<?php
include_once("include/config.php");

$type = htmlspecialchars(trim($_POST['type']));
if($type == 'checkid')
	{
	$emp_id = htmlspecialchars(trim($_POST['emp_id']));
	$check = mysql_query("SELECT * FROM emp_details WHERE emp_id='".$emp_id."'");
	$count = mysql_num_rows($check);
	if($count>0)
	{
		echo 'Success';die;
	}
		
}

if($type == 'checkbankid')
	{
	$bank_no = htmlspecialchars(trim($_POST['bank_no']));
	$check = mysql_query("SELECT * FROM emp_details WHERE bank_ac='".$bank_no."'");
	$count = mysql_num_rows($check);
	if($count>0)
	{
		echo 'Success';die;
	}
		
}

?>