<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


// Fetch Record from Database
$output .= '"Emp.Code",';
$output .= '"Employee Name",';
$output .= '"Leave",';
$output .= '"Lop",';
$output .= '"Over Time",';
$output .= '"Holiday Wages",';
$output .= '"Incentives",';
$output .= '"Professional Tax",';
$output .= '"Advance",';
$output .="\n";

$val = "SELECT * FROM emp_details";
$valque = mysql_query($val);
while($vvv = mysql_fetch_assoc($valque))
{
 $output.= "".$vvv['emp_id'].",";
 $output.= $vvv['emp_name'];
 $output.= "\n";
}

/*$output .= '"MB006",';
$output .= '"S.GOVINDARAJU",';
$output .= '"2",';
$output .= '"2",';
$output .= '"2000",';
$output .= '"105",';
$output .= '"1000",';
$output .= '"1000",';
$output .= '"1000",';
$output .="\n";
$output .= '"MB007",';
$output .= '"S.RAJU",';
$output .= '"1",';
$output .= '"1",';
$output .= '"1000",';
$output .= '"505",';
$output .= '"500",';
$output .= '"500",';
$output .= '"1000",';*/




// Download the file

$filename = "sample.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>