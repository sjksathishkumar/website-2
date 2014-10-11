<?php

error_reporting();

include_once("../include/config.php");

$value_id = $_REQUEST['value_id'];

$query = "DELETE FROM `add_value` WHERE `value_id` = '$value_id'";

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

