<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");

$upd = "UPDATE emp_attendance SET flags=1";
$update =  mysql_query($upd);

function cal($x,$y,$z)
					{	
						$div = $x/$y;
						$mul = $div*$z;
						return $mul;
					}

$getid = "SELECT * FROM uploadid";
$getfullid = mysql_query($getid);
while($iii = mysql_fetch_assoc($getfullid))
{
	$emp_id = $iii['emp_id'];
	$mnt = $iii['month'];
	$yr = $iii['year'];
	$att = "SELECT * FROM emp_attendance WHERE emp_id='".$emp_id."' AND month='".$mnt."' AND year='".$yr."'";
	$getatt = mysql_query($att);
	while($aaa = mysql_fetch_assoc($getatt))
	{
		$aemp_id = $aaa['emp_id'];
		$retrieve = "SELECT * FROM test1 WHERE emp_id='".$aemp_id."'";
		$val = mysql_query($retrieve);
		while($row = mysql_fetch_assoc($val))
				{
					
					$newpt = $aaa['pt'];	
					$emp_name = $aaa['emp_name'];
					$month = $aaa['month'];
					$lop = $aaa['lop'];
					$year = $aaa['year'];
					$incent = $aaa['incent'];
					$ot = $aaa['ot'];
					$holi = $aaa['holiday_wages'];
					$advance = $aaa['advance'];
					if($aaa['month'] == January || $aaa['month'] == March || $aaa['month'] == May || $aaa['month'] == July || $aaa['month'] == August || $aaa['month'] == October || $aaa['month'] == December)
					{
					$days = 31;
					}
					else if($aaa['month'] == February)
					{
						if($aaa['year']%4 == 0 && $aaa['year']%100 != 0 || $aaa['year']%400 == 0)
						{
							$days = 29;
						}
						else
						{
							$days = 28;
						}
						
					}
					else
					{
						$days = 30;
					}
					include("include/config.php");
					
					$salday = $days-$lop;
					$present = $days-$lop;
					$val1 = cal($row['val1'],$days,$salday);
					$val2 = cal($row['val2'],$days,$salday);
					$val3 = cal($row['val3'],$days,$salday);
					$val4 = cal($row['val4'],$days,$salday);
					$val5 = cal($row['val5'],$days,$salday);
					$val6 = cal($row['val6'],$days,$salday);
					$val7 = cal($row['val7'],$days,$salday);
					$val8 = cal($row['val8'],$days,$salday);
					$val10 = $val1+$val2+$val3+$val4+$val5+$val6+$val7+$val8;
					$pfval9 = cal($val1,100,12);
					$esval10 = cal($val10,100,1.75);
						$ins = "REPLACE INTO test3 (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."')";
					$run = mysql_query ($ins);                        		
					
				}
		
	}
	
	
}


$del = "TRUNCATE TABLE uploadid";
mysql_query($del);

Header('Location:http://localhost/payroll_final/payroll_tester/ViewCompanyAttendance.php');


?>


