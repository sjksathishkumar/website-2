<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


$uniq = $_POST['uniq'];
$header = $_POST['header'];
$one = $_POST['test1'];
$two = $_POST['test2'];
$three = $_POST['test3'];
$four = $_POST['test4'];
$five = $_POST['test5'];
$six = $_POST['test6'];
$seven = $_POST['other1'];
$eight = $_POST['other2'];




$insert = "INSERT INTO emp_payslip(uniq,header,one,two,three,four,five,six,seven,eight) values ('$uniq','$header','$one','$two','$three','$four','$five','$six','$seven','$eight')";
$update = "UPDATE emp_payslip SET `header` = '$header',`one` = '$one',`two` = '$two',`three` = '$three',`four` = '$four',`five` = '$five',`six` = '$six',`seven` = '$seven',`eight` = '$eight' WHERE uniq=1";

$cou = "SELECT * FROM emp_payslip";
$query = mysql_query($cou);
$count = mysql_num_rows($query);

if($count > 0)
{
	$result = mysql_query($update);
}
else 
{
	$result = mysql_query($insert);
}

header("location:http://localhost/payroll_final/payroll_tester/CompanyPayslipStructure.php");


?>