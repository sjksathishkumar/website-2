<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


// Fetch Record from Database
$pay = mysql_query("SELECT * FROM emp_payslip WHERE uniq=1");
while($ppp = mysql_fetch_assoc($pay))
{
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
$output .= '"PF",';
$output .= '"ESI",';
$output .= '"PT",';

$table = "test3"; // Enter Your Table Name 
session_start();
					 $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
$sql = mysql_query("select * from $table WHERE month='$month[0]' AND year='$year[0]'");
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
$output .='"'.round($row['val9'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['esval10'],0,PHP_ROUND_HALF_UP).'",';
$output .='"'.round($row['pt'],0,PHP_ROUND_HALF_UP).'",';
$output .="\n";
}



// Download the file

$filename = "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>