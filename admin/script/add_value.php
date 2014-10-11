<?php 

error_reporting();
include_once("../include/config.php");
$aColumns = array('value_id', 'question', 'name', 'value_date', 'value_points', 'status', 'email', 'notes');


/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "value_id";

/* DB table to use */
$sTable = "value_temp";
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

$query = " CREATE TEMPORARY TABLE IF NOT EXISTS value_temp AS (select DISTINCT v.value_id,q.question,a.name,a.email,v.value_points,v.status,v.value_date,v.notes from add_value v join questions q on v.qus_id = q.qus_id join google_login a on v.user_id = a.id GROUP BY v.value_id)";
//$query = "CREATE TEMPORARY TABLE IF NOT EXISTS post_temp AS ( select DISTINCT p.post_id,p.post_title,p.author,p.post_date,p.post_content,GROUP_CONCAT(DISTINCT t.tag_name) as tag_name, GROUP_CONCAT(DISTINCT t.tag_id) as tag_id from tag_map tm join article p on p.post_id = tm.post_id join tag t on t.tag_id = tm.tag_id GROUP BY p.post_id)";
$rResult = $sql->query($query);
/* 
 * Paging
 */
$sLimit = "";
if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' )
{
    $sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
        intval( $_POST['iDisplayLength'] );
}


/*
 * Ordering
 */
$sOrder = "";
if ( isset( $_POST['iSortCol_0'] ) )
{
    $sOrder = "ORDER BY  ";
    for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ )
    {
        if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" )
        {
            $sOrder .= "`".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]."` ".
                ($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
        }
    }

    $sOrder = substr_replace( $sOrder, "", -2 );
    if ( $sOrder == "ORDER BY" )
    {
        $sOrder = "";
    }
}


/* 
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "";
if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" )
{
    $sWhere = "WHERE (";
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" )
        {
            $sWhere .= "`".$aColumns[$i]."` LIKE '%".$sql->real_escape_string( $_POST['sSearch'] )."%' OR ";
        }
    }
    $sWhere = substr_replace( $sWhere, "", -3 );
    $sWhere .= ')';
}

/* Individual column filtering */
for ( $i=0 ; $i<count($aColumns) ; $i++ )
{
    if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' )
    {
        if ( $sWhere == "" )
        {
            $sWhere = "WHERE ";
        }
        else
        {
            $sWhere .= " AND ";
        }
        $sWhere .= "`".$aColumns[$i]."` LIKE '%".$sql->real_escape_string( $_POST['sSearch_'.$i])."%' ";
    }
}


/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
    SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
    FROM   $sTable
    $sWhere
    $sOrder
    $sLimit
    ";
$rResult = $sql->query($sQuery) or fatal_error( 'MySQL Error1: ' . mysqli_errno() . " " .mysqli_error() );

/* Data set length after filtering */
$sQuery = "
    SELECT FOUND_ROWS()
";
$rResultFilterTotal = $sql->query( $sQuery) or fatal_error( 'MySQL Error2: ' . mysqli_errno() . " " .mysqli_error()  );
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
    SELECT COUNT(`".$sIndexColumn."`)
    FROM   $sTable
";
$rResultTotal = $sql->query( $sQuery ) or fatal_error( 'MySQL Error3: ' . mysqli_errno()  . " " .mysqli_error() );
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];
//echo $sQuery;
//exit;



/*
 * Output
 */
$output = array(
    "sEcho" => intval($_POST['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

while ( $aRow = mysqli_fetch_array( $rResult ) )
{
    $row = array();
	//$row['DT_RowId'] = 'row_' . $aRow['id'];
	$row[]="<img src='assets/advanced-datatable/examples/examples_support/details_open.png'>";
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
            /* General output */
            $row[] = $aRow[ $aColumns[$i] ];
       
    }
	//$row['DT_RowId'] = 'row_' . $aRow['id'];
	//$row[] = '<a href="#edit_employee" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>';
	$output['aaData'][] = $row;
}



echo json_encode( $output );
?>
