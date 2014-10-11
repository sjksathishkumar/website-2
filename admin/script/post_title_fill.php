<?php

include_once ("../include/config.php");

$aColumns = array('post_title');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "post_id";

/* DB table to use */
$sTable = "article";
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


$sWhere = "WHERE ";
$sWhere .= "post_title LIKE '%".$_REQUEST['term']."%' ";

/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
    SELECT DISTINCT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
    FROM   $sTable
	$sWhere
    ";
$rResult = $sql->query($sQuery) or fatal_error( 'MySQL Error1: ' . mysqli_errno() . " " .mysqli_error() );



/*
 * Output
 */
while ( $aRow = mysqli_fetch_array( $rResult ) )
{
    
	$output[] = array( 'label' => $aRow['post_title'] );
	
	
	
}

	echo json_encode( $output );
?>