<?php

error_reporting();

include_once("../include/config.php");

$id = $_REQUEST['id'];

$sql->autocommit(FALSE); 

$query_delete = "DELETE FROM `knowledge_center` WHERE `id` = $id";
$result = $sql->query($query_delete);

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

