<?php

error_reporting();

include_once("../include/config.php");

$id = $_REQUEST['id'];

$sql->autocommit(FALSE); 

$query_tag_delete = "DELETE FROM `article_tag_map` WHERE `post_id` = $id";
$result = $sql->query($query_tag_delete);

$query_article_delete = "DELETE FROM `article` WHERE `post_id` = $id";
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

