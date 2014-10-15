<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


$table = "test3"; // Enter Your Table Name 
session_start();
					 $month = $_SESSION['month_session'];
					 $valyear = $_SESSION['year_session'];
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
					 $desig = $_SESSION['field23'];
					 $branch = $_SESSION['field25'];
					 $dept = $_SESSION['field24'];
		if($branch[0] != '' && $dept[0] != '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND dept='$dept[0]' AND desig='$desig[0]'";
	
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"BRANCH",';
	$output .= '"'.$branch[0].'",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DEPARTMENT",';
	$output .= '"'.$dept[0].'",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DESIGNATION",';
	$output .= '"'.$desig[0].'",';
	}
	else if($branch[0] != '' && $dept[0] == '' && $desig[0] == '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]'";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"BRANCH",';
	$output .= '"'.$branch[0].'",';
	}
	else if($branch[0] == '' && $dept[0] != '' && $desig[0] == '')
	{
		$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND dept='$dept[0]'";
		
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DEPARTMENT",';
	$output .= '"'.$dept[0].'",';
	}
	else if($branch[0] == '' && $dept[0] == '' && $desig[0] != '')
	{
		$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND desig='$desig[0]'";
		
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DESIGNATION",';
	$output .= '"'.$desig[0].'",';
	}
	else if($branch[0] != '' && $dept[0] != '' && $desig[0] == '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND dept='$dept[0]'";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"BRANCH",';
	$output .= '"'.$branch[0].'",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DEPARTMENT",';
	$output .= '"'.$dept[0].'",';
	}
	else if($branch[0] != '' && $dept[0] == '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND desig='$desig[0]'";
	
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"BRANCH",';
	$output .= '"'.$branch[0].'",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DESIGNATION",';
	$output .= '"'.$desig[0].'",';
	}
	else if($branch[0] == '' && $dept[0] != '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND dept='$dept[0]' AND desig='$desig[0]'";
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DEPARTMENT",';
	$output .= '"'.$dept[0].'",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"",';
	$output .= '"DESIGNATION",';
	$output .= '"'.$desig[0].'",';
	}
	else
	{
	 $query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]'";
	}

// Fetch Record from Database
$pay = mysql_query("SELECT * FROM emp_payslip WHERE uniq=1");
while($ppp = mysql_fetch_assoc($pay))
{

$output .="\n";
$output .= '"Employee ID",';
$output .= '"Employee Name",';
$output .= '"Present",';
$output .= '"LOP",';
$output .= '"'.$ppp['one'].'",';
$output .= '"'.$ppp['two'].'",';
$output .= '"'.$ppp['three'].'",';
$output .= '"'.$ppp['four'].'",';
$output .= '"'.$ppp['five'].'",';
$output .= '"'.$ppp['six'].'",';
$output .= '"'.$ppp['seven'].'",';
$output .= '"'.$ppp['eight'].'",';
}
$output .= '"Variable Pay",';
$output .= '"Gross Pay",';
$output .= '"PF",';
$output .= '"ESI",';
$output .= '"PT",';
$output .= '"Other Deductions",';
$output .= '"Net Pay",';

	$sql = mysql_query($query);
//$sql = mysql_query("select * from $table WHERE month='$month[0]' AND year='$year[0]'");
$output .="\n";
while ($row = mysql_fetch_assoc($sql)) {
$output .='"'.$row['emp_id'].'",';
$output .='"'.$row['emp_name'].'",';
$output .='"'.$row['present'].'",';
$output .='"'.$row['lop'].'",';
$output .='"'.round($row['val1'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val2'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val3'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val4'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val5'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val6'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val7'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val8'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['incent']+$row['ot']+$row['holiday_wages'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['incent']+$row['ot']+$row['holiday_wages'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val9'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['esval10'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['pt'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['advance'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['incent']+$row['ot']+$row['holiday_wages']-$row['val9']-$row['esval10']-$row['pt']-$row['advance'],0,PHP_ROUND_HALF_UP).'",';
$output .="\n";
}



// Download the file

$filename = "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>