<?php

error_reporting();

include_once("../include/config.php");

$id = $_REQUEST['id'];

$query = "DELETE FROM `sales_contact` WHERE `id` = '$id'";

if($sql->query( $query ))
{
    echo 'success';
}	
else
{ 
    echo 'error';  
    
}
	$sql->close();


?>

