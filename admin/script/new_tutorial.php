<?php

error_reporting();
include_once("../include/config.php");

//getting all input given from user

     if(empty($_POST['post_tag']))
{
    echo "Transaction Faild";
    break;
}
else
{

    //echo "Post Tilte - ".$post_title."<br>";
    //echo "Post Keywords - ".$post_keywords."<br>";
    //echo "Post Description - ".$post_description."<br>";
    //echo "Proceed with transaction.";
//INSERT INTO `bassbiz1_data`.`tutorial` (`post_id`, `author`, `post_title`, `post_content`, `keyword`, `description`, `post_date`) VALUES (NULL, 'Admin', 'title', 'content', 'bassbiz', 'description', '2014-07-17 07:32:50');

$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$post_keywords = $_POST['post_keywords'];
$post_description = $_POST['post_description'];
$tags = isset($_POST['post_tag']) ? $_POST['post_tag'] : array();

$query = "INSERT INTO `tutorial` (`post_id`, `author`, `post_title`, `post_content`, `keyword`, `description`, `post_date`) VALUES (NULL, 'Admin', '$post_title', '$post_content', '$post_keywords', '$post_description', CURRENT_TIMESTAMP);";

$result = $sql->query($query);

$last_post_id = $sql->insert_id;


foreach ($tags as $tag) {

    if(!is_numeric($tag))
    {
        $query = "INSERT INTO `tutorial_tag` (`tag_id`, `tag_name`) VALUES (NULL, '$tag')";

        $result = $sql->query($query);

        $last_tag_id = $sql->insert_id;

        //echo "Last Inserted tag_ID :".$last_tag_id;

        //echo "Last Inserted post_id".$last_post_id;

        $query = "INSERT INTO `tutorial_tag_map` (`tag_id`, `post_id`) VALUES ($last_tag_id, $last_post_id)";

        $result = $sql->query($query);

    }
    else
    {
        //echo "Last Inserted post_id".$last_post_id;

        $query = "INSERT INTO `tutorial_tag_map` (`tag_id`, `post_id`) VALUES ($tag, $last_post_id)";

        $result = $sql->query($query);

    }
}


if($result)
{
    echo 'success';
    $sql->close();
}
else
{
    echo 'error';
}

}

?>
