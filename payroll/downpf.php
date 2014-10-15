<?php

error_reporting();
include_once("include/config.php");
include("include/functions.php");


// Fetch Record from Database
session_start();
					 $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
					  if($month[0] == January){$table = "jan";}
					 else if($month[0] == February){$table = "feb";}
					 else if($month[0] == March){$table = "march";}
					 else if($month[0] == April){$table = "april";}
					 else if($month[0] == May){$table = "may";}
					 else if($month[0] == June){$table = "june";}
					 else if($month[0] == July){$table = "july";}
					 else if($month[0] == August){$table = "august";}
					 else if($month[0] == September){$table = "september";}
					 else if($month[0] == October){$table = "october";}
					 else if($month[0] == November){$table = "november";}
					 else if($month[0] == December){$table = "december";}
		$ddd = mysql_query("SELECT SUM(val9) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
		$qqq = mysql_query("SELECT SUM(pensionfund) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
		$eee = mysql_query("SELECT SUM(providentfund) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
		$ggg = mysql_query("SELECT SUM(pfadmin) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
		$iii = mysql_query("SELECT SUM(empdeposit) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
		$mmm = mysql_query("SELECT SUM(edliadmin) FROM $table WHERE month='$month[0]' AND year='$year[0]'");
//$ddd = mysql_query("select * from $table WHERE month='$month[0]' AND year='$year[0]'");
    $output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Employee Contribution",';
	while($ttt = mysql_fetch_assoc($ddd))
	{
	$output .= '"'.round($ttt['SUM(val9)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Pendion Fund",';
	while($lll = mysql_fetch_assoc($qqq))
	{
	$output .= '"'.round($lll['SUM(pensionfund)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Provident Fund",';
	while($fff = mysql_fetch_assoc($eee))
	{
	$output .= '"'.round($fff['SUM(providentfund)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Admin charges for PF scheme",';
	while($hhh = mysql_fetch_assoc($ggg))
	{
	$output .= '"'.round($hhh['SUM(pfadmin)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Employee Deposit Linked Deposit",';
	while($jjj = mysql_fetch_assoc($iii))
	{
	$output .= '"'.round($jjj['SUM(empdeposit)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"Admin Charges for EDLI Scheme",';
	while($kkk = mysql_fetch_assoc($mmm))
	{
	$output .= '"'.round($kkk['SUM(edliadmin)'],0,PHP_ROUND_HALF_UP).'",';
	}
    $output .="\n";
$output .= '"Member ID",';
$output .= '"Member Name",';
$output .= '"EPF Wages",';
$output .= '"EPS Wages",';
$output .= '"EPF Contribution (EE Share) due",';
$output .= '"EPF Contribution (EE Share) being remitted",';
$output .= '"EPS Contribution due",';
$output .= '"EPS Contribution being remitted",';
$output .= '"Diff EPF and EPS Contribution (ER Share) due",';
$output .= '"Diff EPF and EPS Contribution (ER Share) being Remitted",';
$output .= '"NCP Days",';
$output .= '"Refund of Advances",';
$output .= '"Arrear EPF Wages",';
$output .= '"Arrear EPF EE Share",';
$output .= '"Arrear EPF ER Share",';
$output .= '"Arrear EPS Share",';
$output .= '"Father /Husband Name",';
$output .= '"Relationship with the Member",';
$output .= '"Date Of Birth",';
$output .= '"Gender",';
$output .= '"Date of Joining EPF",';
$output .= '"Date of Joining EPS",';
$output .= '"Date of Exit from EPF",';
$output .= '"Date of Exit from EPS",';
$output .= '"Reason for leaving",';


//$table = "test3"; // Enter Your Table Name 
$sql = mysql_query("select * from $table WHERE month='$month[0]' AND year='$year[0]' AND flag=1");
$output .="\n";
while ($row = mysql_fetch_assoc($sql)) {
$output .='"'.$row['emp_id'].'",';
$output .='"'.$row['emp_name'].'",';
$output .='"'.round($row['val1'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val1'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val9'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val9'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['pensionfund'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['pensionfund'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['providentfund'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['providentfund'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.$row['lop'].'",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .='"",';
$output .="\n";
}



// Download the file

$filename = "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>

?>