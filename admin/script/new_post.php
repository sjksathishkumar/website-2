<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user


if(empty($_POST['post_tag']))
{
    echo "empty";
    break;
}
else
{
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_keywords = $_POST['post_keywords'];
    $post_description = $_POST['post_description'];
    $image_url = $_FILES['image_url'];
    $tags = isset($_POST['post_tag']) ? $_POST['post_tag'] : array();

    if(isset($_FILES["image_url"]) && $_FILES["image_url"]["error"]== UPLOAD_ERR_OK)
    {
        ############ Edit settings ##############
        $UploadDirectory    = '../../blog/blog-images/'; //specify upload directory ends with / (slash)
        ##########################################
        //check if this is an ajax request
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            die();
        }
        
        
        $File_Name          = strtolower($_FILES['image_url']['name']);
        $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
        $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
        $NewFileName        = $Random_Number.$File_Ext; //new file name
        $path               = $UploadDirectory.$NewFileName; // Full path for file

    }

    move_uploaded_file($_FILES['image_url']['tmp_name'], $path );

    $title=htmlentities($post_title);

    //Title to friendly URL conversion

    function string_limit_words($string, $word_limit)
    {
      $words = explode(' ', $string, ($word_limit + 1));
      if(count($words) > $word_limit)
      array_pop($words);
      return implode(' ', $words);
    }

    $newtitle = string_limit_words($title,6);

    $urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);

    $newurltitle=str_replace(" ","-",$urltitle);

    $newurltitle = rtrim($newurltitle , '-');

    $url=$newurltitle.'.html'; // Final URL

    $url = strtolower($url);

    $query = "INSERT INTO `article` (`post_id`, `author`, `post_title`, `post_content`, `keyword`, `description`, `url`, `img_url`, `post_date`) VALUES (NULL, 'Admin', '$post_title', '$post_content', '$post_keywords', '$post_description', '$url', '$path', CURRENT_TIMESTAMP);";

    $result = $sql->query($query);

    $last_post_id = $sql->insert_id;

    foreach ($tags as $tag) {

        if(!is_numeric($tag))
        {

            $query = "INSERT INTO `article_tag` (`tag_id`, `tag_name`) VALUES (NULL, '$tag')";

            $result = $sql->query($query);

            $last_tag_id = $sql->insert_id;

            $query = "INSERT INTO `article_tag_map` (`id`, `tag_id`, `post_id`) VALUES (NULL, '$last_tag_id', '$last_post_id')";

            $result = $sql->query($query);

        }
        else
        {

            $query = "INSERT INTO `article_tag_map` (`id`, `tag_id`, `post_id`) VALUES (NULL, '$tag', '$last_post_id')";

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
        $sql->close();
    }

}

?>