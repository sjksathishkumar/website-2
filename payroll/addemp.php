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
$slab = $_POST['field31'];
$val1 = $_POST['field32'];
$val2 = $_POST['field33'];
$val3 = $_POST['field34'];
$val4 = $_POST['field35'];
$val5 = $_POST['field36'];
$val6 = $_POST['field37'];
$val7 = $_POST['field38'];
$val8 = $_POST['field39'];
$check = $_POST['field40'];



$insert = "INSERT INTO emp_details (`emp_id`,`f_name`,`dob`,`emp_name`,`gender`,`mail_id`,`addr`,`city`,`state`,`pin_code`,`bank_name`,`passport`,`mobile`,`bd_group`,`status`,`bank_ac`,`bank_branch`,`pan_no`,`doj`,`job_status`,`desig`,`repo_man`,`pf`,`sal_slab`,`dpt_name`,`branch_loc`,`esi`,`salary`,`proft`) values ('$emp_id','$fname','$dob','$emp_name','$gender','$mail','$addr','$city','$state','$pin','$bname','$pass','$mob','$bgroup','$martial','$bank_no','$bank_branch','$pan','$doj','$job_status','$desig','$reporting_manager','$pf','$slab','$dept','$branch_location','$esi','$salary','$doexit')";



$success =  mysql_query($insert);


if($check != checked){
			$emp_id = $_SESSION['emp_id'];
			$salary = $_POST['field30'];
			$slab = $_POST['field31'];
			$desig = $_POST['field23'];
			$dept = $_POST['field24'];
			$branch_location = $_POST['field25'];
			$reporting_manager = $_POST['field26'];
			$mail = $_SESSION['email'];
			
			$sal = "select * from emp_pay_structure where slab_name='$slab'";
			$salres = mysql_query($sal);
			function percentage($int1,$int2)
			{
				$per = $int1/100;
				$res = $per * $int2;
				return $res;
			}
					
					while($row = mysql_fetch_assoc($salres))
					{
						$on = $row['value_1'];
						$tw = $row['value_2'];
						$th = $row['value_3'];
						$fo = $row['value_4'];
						$fi = $row['value_5'];
						$si = $row['value_6'];
						$se = $row['other_1'];
						$ei = $row['other_2'];
						$int1 = $salary;
						$one = percentage($int1,$on);
						$two = percentage($int1,$tw);
						$three = percentage($int1,$th);
						$four = percentage($int1,$fo);
						$five = percentage($int1,$fi);
						$six = percentage($int1,$si);
						$seven = percentage($int1,$se);
						$eight = percentage($int1,$ei);
						 
						$iii = mysql_query("insert into test1(emp_id, val1, val2, val3, val4, val5, val6, val7, val8, desig, dpt_name, branch_loc, repo_man, mail_id) values ('$emp_id', '$one', '$two','$three','$four','$five','$six','$seven','$eight','$desig','$dept','$branch_location','$reporting_manager','$mail')");
					}
					
					
					
				}
				
				else
				{
					$emp_id = $_SESSION['emp_id'];
					$val1 = $_POST['field32'];
					$val2 = $_POST['field33'];
					$val3 = $_POST['field34'];
					$val4 = $_POST['field35'];
					$val5 = $_POST['field36'];
					$val6 = $_POST['field37'];
					$val7 = $_POST['field38'];
					$val8 = $_POST['field39'];
					$desig = $_POST['field23'];
					$dept = $_POST['field24'];
					$branch_location = $_POST['field25'];
					$reporting_manager = $_POST['field26'];
				$iii = mysql_query("insert into test1(emp_id, val1, val2, val3, val4, val5, val6, val7, val8, desig, dpt_name, branch_loc, repo_man, mail_id) values ('$emp_id', '$val1', '$val2','$val3','$val4','$val5','$val6','$val7','$val8','$desig','$dept','$branch_location','$reporting_manager','$mail')");
				}
				

Header('Location:http://www.basspris.com/payroll/CompanyEmployee.php');





?>