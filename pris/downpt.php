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
$output .= '"PT",';

//$table = "test3"; // Enter Your Table Name 
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
$sql = mysql_query("select * from $table WHERE month='$month[0]' AND year='$year[0]'");
$output .="\n";
while ($row = mysql_fetch_assoc($sql)) {
$output .='"'.$row['emp_id'].'",';
$output .='"'.$row['emp_name'].'",';
$output .='"'.$row['present'].'",';
$output .='"'.$row['lop'].'",';
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



?>