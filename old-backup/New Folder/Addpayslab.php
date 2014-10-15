<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

$name = $_POST['field3'];
$value1 = $_POST['field5'];
$value2 = $_POST['field6'];
$value3 = $_POST['field7'];
$value4 = $_POST['field8'];
$value5 = $_POST['field9'];
$value6 = $_POST['field10'];
$value7 = $_POST['field11'];
$value8 = $_POST['field12'];



 $val = "INSERT INTO emp_pay_structure(slab_name,value_1,value_2,value_3,value_4,value_5,value_6,other_1,other_2) values ('$name','$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8')";

$result = mysql_query($val);

header("location:http://localhost/payroll_final/payroll_tester/CompanyPayStructure.php");




?>