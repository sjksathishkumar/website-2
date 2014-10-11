<?php

error_reporting();

include_once("../include/config.php");

$id = $_REQUEST['id'];

$sql->autocommit(FALSE); 

$query = "SELECT * FROM `jobs` WHERE `id` = '$id'";

$result = $sql->query( $query );

$resume = "/home/bassbiz1/public_html/";

while ( $row = $result->fetch_assoc() ) 
{
  	$resume .= $row['resume'];
}

$del = unlink($resume);

if($del)
{

$query = "DELETE FROM `jobs` WHERE `candidate_id` = '$id'";
$result_del = $sql->query( $query );

}

if($result_del)
{
	echo 'success';	
	$sql->commit();
	$sql->close();
}	
else
{ 
    	echo 'error';
	$sql->rollback();
  	$sql->close();
}


?>

