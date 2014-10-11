<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$value_id = $sql->real_escape_string($_POST['value_id']);
$value_points = $sql->real_escape_string($_POST['value_points']);
$status = $sql->real_escape_string($_POST['status']);
$notes = $sql->real_escape_string($_POST['notes']);

$query = "UPDATE `add_value` SET `value_points` = '$value_points',`status` = '$status', `notes` = '$notes' WHERE `value_id` = '$value_id'";

$result = $sql->query($query);

$sql->autocommit(FALSE); 

if($result)
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
