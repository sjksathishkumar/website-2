<?php 

error_reporting();
include_once("../include/config.php");
$aColumns = array('uid', 'work_status', 'company_name');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "uid";

/* DB table to use */
$sTable = "enquiry";
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */

/* 
 * Local functions
 */
function fatal_error ( $sErrorMessage = '' )
{
    header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
    die( $sErrorMessage );
}

$query = "SELECT * FROM `enquiry`";
$rResult = $sql->query($query);

$sWhere = "WHERE ";
$sWhere .= "`uid` = '".$sql->real_escape_string($_POST['uid'])."' ";

/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
    SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
    FROM   $sTable
	$sWhere
    ";
$rResult = $sql->query( $sQuery) or fatal_error( 'MySQL Error1: ' . mysqli_errno() . " " .mysqli_error() );

/*
 * Output
 */

while ( $aRow = mysqli_fetch_array( $rResult ) )
{
	$output = array('uid' => $aRow['uid'],'status' => $aRow['work_status'],'company_name' => $aRow['company_name']);
}
echo json_encode( $output );

?>