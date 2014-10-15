<?php

error_reporting();
include_once("include/config.php");
include("include/functions.php");


session_start();

$emp_id = $_SESSION['emp_id'];
$emp_name = $_SESSION['emp_name'];
$dob = $_SESSION['dob'];
$fname = $_SESSION['fname'];
$gender = $_SESSION['gender'];
$mail = $_SESSION['email'];
$addr = $_SESSION['addr'];
$city = $_SESSION['city'];
$state = $_SESSION['state'];
$pin = $_SESSION['pin'];
$mob = $_SESSION['mob'];
$bname = $_SESSION['bname'];
$bank_no = $_SESSION['bank_no'];
$bank_branch = $_SESSION['bank_branch'];
$pass = $_SESSION['pass'];
$bgroup = $_SESSION['bgroup'];
$martial = $_SESSION['martial'];
$pan = $_SESSION['pan'];

$doj = $_POST['field20'];
$doexit = $_POST['field21'];
$job_status = $_POST['field22'];
$desig = $_POST['field23'];
$dept = $_POST['field24'];
$branch_location = $_POST['field25'];
$reporting_manager = $_POST['field26'];
$pf = $_POST['field27'];
$esi = $_POST['field28'];
$test = $_POST['field29'];
$salary = $_POST['field30'];
$val1 = $_POST['field32'];
$val2 = $_POST['field33'];
$val3 = $_POST['field34'];
$val4 = $_POST['field35'];
$val5 = $_POST['field36'];
$val6 = $_POST['field37'];
$val7 = $_POST['field38'];
$val8 = $_POST['field39'];



$update = "UPDATE emp_details SET  `f_name`='$fname',`dob`='$dob',`emp_name`='$emp_name',`gender`='$gender',`mail_id`='$mail',`addr`='$addr',`city`='$city',`state`='$state',`pin_code`='$pin',`bank_name`='$bname',`passport`='$pass',`mobile`='$mob',`bd_group`='$bgroup',`status`='$martial',`bank_ac`='$bank_no',`bank_branch`='$bank_branch',`pan_no`='$pan',`doj`='$doj',`job_status`='$job_status',`desig`='$desig',`repo_man`='$reporting_manager',`pf`='$pf',`dpt_name`='$dept',`branch_loc`='$branch_location',`esi`='$esi',`salary`='$salary',`proft`='$doexit' WHERE emp_id=".$emp_id;

$upquery = mysql_query($update);


				$iii = mysql_query("UPDATE test1 SET `val1`='$val1',`val2`='$val2',`val3`='$val3',`val4`='$val4',`val5`='$val5',`val6`='$val6',`val7`='$val7',`val8`='$val8' WHERE emp_id=".$emp_id);
				
				
Header('Location:http://localhost/payroll_final/payroll_tester/CompanyEmployee.php');



?>