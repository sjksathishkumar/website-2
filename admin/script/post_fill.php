<?php 

error_reporting();
include_once("../include/config.php");
$aColumns = array('post_id', 'post_title', 'author', 'post_date', 'post_content', 'tag_name', 'tag_id', 'keyword', 'description');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "post_id";

/* DB table to use */
$sTable = "temp";
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

$query = "CREATE TEMPORARY TABLE IF NOT EXISTS temp AS ( select DISTINCT p.post_id,p.post_title,p.author,p.post_date,p.post_content,p.keyword,p.description,GROUP_CONCAT(DISTINCT t.tag_name) as tag_name, GROUP_CONCAT(DISTINCT t.tag_id) as tag_id from article_tag_map tm join article p on p.post_id = tm.post_id join article_tag t on t.tag_id = tm.tag_id GROUP BY p.post_id)";
$rResult = $sql->query($query);

$sWhere = "WHERE ";
$sWhere .= "`post_id` = '".$sql->real_escape_string($_POST['post_id'])."' ";

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
    
	$output = array('post_id' => $aRow['post_id'],'post_title' => $aRow['post_title'],'post_contents' => $aRow['post_content'],'post_keywords' => $aRow['keyword'],'post_description' => $aRow['description'],'tagss' => $aRow['tag_name']);
	
	
	
}
echo json_encode( $output );

?>
