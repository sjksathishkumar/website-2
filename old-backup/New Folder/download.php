<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");


// Fetch Record from Database
$output .= '"Emp.Code",';
$output .= '"Employee Name",';
$output .= '"Branch",';
$output .= '"Date of joining",';
$output .= '"BANK A/C",';
$output .= '"BANK Name",';
$output .= '"Designation",';
$output .= '"Department",';
$output .= '"ASM NAME",';
$output .= '"PF.NO",';
$output .= '"ESI.NO",';
$output .= '"BASIC",';
$output .= '"Utility Allowance",';
$output .= '"Special Allowance",';
$output .= '"Other Allowance",';
$output .= '"SPL Allowance",';
$output .= '"Other Allowance1",';
$output .= '"Other Allowance2",';
$output .= '"Other Allowance3",';
$output .="\n";
$output .= '"MB006",';
$output .= '"S.GOVINDARAJU",';
$output .= '"CHENNAI",';
$output .= '"1-Sep-08",';
$output .= '"600013133",';
$output .= '"INDIAN BANK",';
$output .= '"TERRITORY SALES INCHARAGE",';
$output .= '"TST (TT)",';
$output .= '"Sri Krishnan",';
$output .= '"57",';
$output .= '"5117433768",';
$output .= '"4900",';
$output .= '"0",';
$output .= '"600",';
$output .= '"0",';
$output .= '"3576",';
$output .= '"0",';
$output .= '"0",';
$output .= '"0",';
$output .="\n";
$output .= '"MB007",';
$output .= '"S.RAMESH",';
$output .= '"Tiruchi",';
$output .= '"1-Sep-08",';
$output .= '"600013134",';
$output .= '"INDIAN BANK",';
$output .= '"TERRITORY SALES INCHARAGE",';
$output .= '"TST (TT)",';
$output .= '"Sri Krishnan",';
$output .= '"58",';
$output .= '"5117433769",';
$output .= '"4900",';
$output .= '"0",';
$output .= '"600",';
$output .= '"0",';
$output .= '"3576",';
$output .= '"1000",';
$output .= '"2000",';
$output .= '"0",';




// Download the file

$filename = "sample.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>