<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

$emp_id = $_POST['username1'];
$emp_name = $_POST['username2'];
$leave = $_POST['username3'];
$lop = $_POST['username4'];
$ot = $_POST['username5'];
$holi = $_POST['username6'];
$incent = $_POST['username7'];
$newpt = $_POST['username8'];
$advance = $_POST['username9'];
$month = $_POST['month'];
$year = $_POST['year'];

function cal($x,$y,$z)
					{	
						$div = $x/$y;
						$mul = $div*$z;
						return $mul;
					}

				$insert = "REPLACE INTO emp_attendance (`emp_id`, `emp_name`, `leave`, `lop`, `ot`, `holiday_wages`, `incent`, `pt`, `advance`, `month`, `year`) 
VALUES ('$emp_id','$emp_name','$leave','$lop','$ot','$holi','$incent','$newpt','$advance','$month[0]','$year[0]')";

				
				
				
				$result = (mysql_query($insert));
	
				$retrieve = "SELECT * FROM test1 WHERE emp_id='".$emp_id."'";
				$val = mysql_query($retrieve);
				
				
				while($row = mysql_fetch_assoc($val))
				{
					
					$newpt = $_POST['username8'];	
					$emp_name = $_POST['username2'];
					$month = $_POST['month'];
					$lop = $_POST['username4'];
					$year = $_POST['year'];
					$ot = $_POST['username5'];
					$holi = $_POST['username6'];
					$incent = $_POST['username7'];
					$advance = $_POST['username9'];
					
					include("include/config.php");
					
					if($month[0] == January || $month[0] == March || $month[0] == May || $month[0] == July || $month[0] == August || $month[0] == October || $month[0] == December)
					{
					$days = 31;
					}
					else if($month[0] == February)
					{
						if($year[0]%4 == 0 && $year[0]%100 != 0 || $year[0]%400 == 0)
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
					
					$salday = $days-$lop;
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
					/*************pt calculation*************/
				$emp = "SELECT * FROM emp_details WHERE emp_id='".$emp_id."'";
				$query = mysql_query($emp);
				while($rrr = mysql_fetch_assoc($query))
				{
					$pt = "SELECT * FROM proft WHERE name='".$rrr['proft']."'";
					$new = mysql_query($pt);
					while($prval = mysql_fetch_assoc($new))
					{
					 if($rrr['salary'] > $prval['eone'] )
					 {
					 	if($rrr['salary'] > $prval['etwo'])
						{
							if($rrr['salary'] > $prval['ethree'])
							{
								if($rrr['salary'] > $prval['efour'])
								{
									if($rrr['salary'] > $prval['efive'])
									{
										if($rrr['salary'] > $pr['esix'])
										{
											$dpt = $prval['dsix'];
										}
									}
									else
									{
										$dpt = $prval['dfive'];
									}
								
								}
								else
								{
									$dpt = $prval['dfour'];
								}
							
							}
							else
							{
								$dpt = $prval['dthree'];
							}
						}
						else
						{
							$dpt = $prval['dtwo'];
						}
					 }
					 else
					 {
					 	$dpt = $prval['done'];
					 }
					
					
					
					}
				}
				/******pt cal ends here********/
				
					$ins = "REPLACE INTO test3 (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`,`holiday_wages`,`advance`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month[0]."','".$emp_name."','".$salday."','".$lop."','".$year[0]."','".$incent."','".$ot."','".$holi."','".$advance."')";
					$run = mysql_query ($ins);                        		
					
				}


				
				header( 'Location: http://localhost/payroll_final/payroll_tester/ViewCompanyAttendance.php' );

	
	
	
?>