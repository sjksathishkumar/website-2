<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$title = $_POST['kc_title'];
$content = $_POST['kc_content'];
$category = $_POST['kc_category'];

//echo $category;
//echo $content;

	$query = "INSERT INTO `knowledge_center` (`id`, `title`, `content`, `category`, `kc_date`) VALUES (NULL, '$title', '$content.', '$category', CURRENT_TIMESTAMP);";

	$result = $sql->query($query);


if($result)
{
    echo 'success';
	$sql->close();
}	
else
{ 
    echo 'error';  
}



?>
