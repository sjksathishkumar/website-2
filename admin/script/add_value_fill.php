<?php 

error_reporting();
include_once("../include/config.php");
$aColumns = array('value_id', 'value_points', 'status', 'notes');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "value_id";

/* DB table to use */
$sTable = "add_value";
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

$query = "select * from add_value";
$rResult = $sql->query($query);

$sWhere = "WHERE ";
$sWhere .= "`value_id` = '".$sql->real_escape_string($_POST['value_id'])."' ";

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
    
	$output = array('value_id' => $aRow['value_id'],'value_points' => $aRow['value_points'],'status' => $aRow['status'],'notes' => $aRow['notes']);
	
	
	
}
echo json_encode( $output );

?>
