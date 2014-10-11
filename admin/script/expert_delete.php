<?php

error_reporting();

include_once("../include/config.php");

$qus_id = $_REQUEST['qus_id'];

echo $qus_id;

$sql->autocommit(FALSE); 

$query_add_delete = "DELETE FROM `add_value` WHERE `qus_id` = '$qus_id'";
$result = $sql->query($query_add_delete);

$query_tag_delete = "DELETE FROM `questions_tag_map` WHERE `qus_id` = '$qus_id'";
$result = $sql->query($query_tag_delete);

$query_article_delete = "DELETE FROM `questions` WHERE `qus_id` = '$qus_id'";
$result = $sql->query($query_article_delete);

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

