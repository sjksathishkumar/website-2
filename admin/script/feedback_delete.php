<?php

error_reporting();

include_once("../include/config.php");

$id = $_REQUEST['id'];

$sql->autocommit(FALSE); 

$query = "SELECT * FROM `feedback_contact` WHERE `id` = '$id'";

$result = $sql->query( $query );

$file = "/home/bassbiz1/public_html/";

while ( $row = $result->fetch_assoc() ) 
{
  	$file .= $row['file'];
}

//echo $file."<br>";

$del = unlink($file);

//echo $del;

if($del)
{

$query = "DELETE FROM `feedback_contact` WHERE `id` = '$id'";
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

