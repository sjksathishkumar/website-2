<?php 

error_reporting();
include_once("../include/config.php");
$aColumns = array('qus_id', 'question', 'description', 'ans_rply', 'answer');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "qus_id";

/* DB table to use */
$sTable = "questions";
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

$query = "select * from questions";
$rResult = $sql->query($query);

$sWhere = "WHERE ";
$sWhere .= "`qus_id` = '".$sql->real_escape_string($_POST['qus_id'])."' ";

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
    
	$output = array('qus_id' => $aRow['qus_id'],'question' => $aRow['question'],'answer' => $aRow['answer'],'description' => $aRow['description'],'ans_rply' => $aRow['ans_rply']);
	
	
	
}
echo json_encode( $output );

?>
