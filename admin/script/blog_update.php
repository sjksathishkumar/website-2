<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$post_id = $_POST['post_id'];
$post_title = $_POST['post_title'];
$post_content = $_POST['post_contents'];
$post_keywords = $_POST['post_keywords'];
$post_description = $_POST['post_description'];
$tags = isset($_POST['tags']) ? $_POST['tags'] : array();

$sql->autocommit(FALSE); 

$query_delete = "DELETE FROM `article_tag_map` WHERE `post_id` = $post_id";
$result = $sql->query($query_delete);


$query_update = "UPDATE `article` SET `post_title` = '$post_title', `post_content` = '$post_content', `keyword` = '$post_keywords', `description` = '$post_description' WHERE `post_id` = $post_id";

$result = $sql->query($query_update);

foreach ($tags as $tag) {

	if(!is_numeric($tag))
	{
		$query = "INSERT INTO `article_tag` (`tag_id`, `tag_name`) VALUES (NULL, '$tag')";

		$result = $sql->query($query);

		$last_tag_id = $sql->insert_id;

		$query = "INSERT INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$last_tag_id', '$post_id')";

		$result = $sql->query($query);

	}
	else
	{
		$query = "INSERT INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$tag', '$post_id')";

		$result = $sql->query($query);

	}
}

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
