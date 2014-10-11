<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$kc_id = $_POST['kc_id'];
$kc_title = $_POST['kc_title'];
$kc_content = $_POST['kc_content'];
$kc_category = $_POST['kc_category'];

$sql->autocommit(FALSE); 


$query_update = "UPDATE `knowledge_center` SET `title` = '$kc_title', `content` = '$kc_content', `category` = '$kc_category' WHERE `id` = $kc_id";

$result = $sql->query($query_update);

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
