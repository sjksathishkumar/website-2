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
					$desig = $row['desig'];
					$dpt_name = $row['dpt_name'];
					$branch_loc = $row['branch_loc'];
					$repo_man = $row['repo_man'];
					$mail = $row['mail_id'];
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
					$val11 = $val1+$val2+$val3+$val4+$val5+$val6+$val7+$val8+$ot+$holi+$incent;
					
					$esval10 = cal($val11,100,1.75);
					$penfund = cal($val1,100,8.33);
					$provfund = cal($val1,100,3.67);
					$empdeposit = cal($val1,100,0.5);
					$pfadmin = cal($val1,100,1.10);
					$edliadmin = cal($val1,100,0.01);
					$esiemp = cal($val1,100,4.75);
					if($val1 > 6500)
					{
						$pfval9 = 780;
					}
					else
					{
						$pfval9 = cal($val1,100,12);
					}
					if($penfund > 541)
					{
					  $pensionfund = 541;
					  $new = $penfund-541;
					  $providentadd = $provfund+$new;
					  $providentfund = $providentadd;
					}
					else
					{
						$pensionfund = $penfund;
						$providentfund = $provfund;
					
					}
					
					if($month == January)
					{
						$ins = "REPLACE INTO jan (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($month == February) 
					{
					$ins = "REPLACE INTO feb (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == March) 
					{
					$ins = "REPLACE INTO march (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == April) 
					{
					$ins = "REPLACE INTO april (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == May) 
					{
					$ins = "REPLACE INTO may (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == June) 
					{
					$ins = "REPLACE INTO june (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == July) 
					{
					$ins = "REPLACE INTO july (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == August) 
					{
					$ins = "REPLACE INTO august (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == September) 
					{
					$ins = "REPLACE INTO september (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == October) 
					{
					$ins = "REPLACE INTO october (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == November)
					{
					$ins = "REPLACE INTO november (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					else if($aaa['month'] == December) 
					{
					$ins = "REPLACE INTO december (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`, `pensionfund`, `providentfund`, `empdeposit`, `pfadmin`, `edliadmin`, `esiemp`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."','".$pensionfund."','".$providentfund."','".$empdeposit."','".$pfadmin."','".$edliadmin."','".$esiemp."')";
					$run = mysql_query ($ins);  
					}
					$ins = "REPLACE INTO test3 (`emp_id`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `esval10`, `pt`, `month`, `emp_name`, `present`, `lop`, `year`, `incent`, `ot`, `holiday_wages`, `advance`, `desig`, `dept`, `branch`, `repo_man`, `mail_id`) VALUES ('".$row['emp_id']."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$pfval9."','".$esval10."','".$newpt."','".$month."','".$emp_name."','".$present."','".$lop."','".$year."','".$incent."','".$ot."','".$holi."','".$advance."','".$desig."','".$dpt_name."','".$branch_loc."','".$repo_man."','".$mail."')";
					$run = mysql_query ($ins);                        		
					
				} 
		
	}
	
	
}


$del = "TRUNCATE TABLE uploadid";
mysql_query($del);


Header('Location:http://www.basspris.com/pris/ViewCompanyAttendance.php');

?>


