<?php
<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


// Fetch Record from Database
$output .= '"Employee ID",';
$output .= '"Employee Name",';
$output .= '"Present",';
$output .= '"LOP",';
$output .= '"ESI",';

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
$output .='"'.round($row['esval10'],0,PHP_ROUND_HALF_UP).'",';
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