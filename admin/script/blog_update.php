<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

if(empty($_POST['tags']))
{
  echo "empty";
}
else
{

      $post_id = $_POST['post_id'];
      $post_title = $_POST['post_title'];                                                       
      $post_content = $_POST['post_contents'];
      $post_keywords = $_POST['post_keywords'];
      $post_description = $_POST['post_description'];
      $url = $_POST['url'];
      $img_url = $_POST['img_url'];
      $img_url_update = $_POST['img_url_update'];
      $tags = isset($_POST['tags']) ? $_POST['tags'] : array();

      if (empty($_FILES['img_url_update']['name'])) 
      {

          $sql->autocommit(FALSE); 

          $query_delete = "DELETE FROM `article_tag_map` WHERE `post_id` = $post_id";

          $result = $sql->query($query_delete);

          $query_update = "UPDATE `article` SET `post_title` = '$post_title', `post_content` = '$post_content', `keyword` = '$post_keywords', `description` = '$post_description', `url` = '$url', `img_url` = '$img_url' WHERE `post_id` = $post_id";

          $result = $sql->query($query_update); 

          foreach ($tags as $tag) 
          {
              if(!is_numeric($tag))
              {
                $match = false;

                $query= "select * from article_tag";

                $result = $sql->query($query);
                                
                while ( $row = $result->fetch_assoc() ) 
                    {
                      
                      $tag_data = $row['tag_name'];

                      if($tag == $tag_data)
                      {
                        $query = "SELECT * FROM `article_tag` WHERE `tag_name` = '$tag';";
                        
                        $result = $sql->query($query);
                        
                        while ( $row = $result->fetch_assoc() ) 
                        {
                          $find_tag_id = $row['tag_id'];
                        }
                      
                        $match = true;
                      
                      }
                      
                      else
                      {
                      
                        $match = false;
                      
                      }
                    }

                  if($match == false)
                  {
                    $query = "INSERT IGNORE INTO `article_tag` (`tag_id`, `tag_name`) VALUES (NULL, '$tag')";

                    $result = $sql->query($query);

                    $last_tag_id = $sql->insert_id;

                    $query = "INSERT IGNORE INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$last_tag_id', '$post_id')";

                    $result = $sql->query($query);

                  }

              }
              else
              {
                $query = "INSERT IGNORE INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$tag', '$post_id')";

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

      }
      else
      {
        if (($_FILES["img_url_update"]["type"] == "image/jpeg")|| ($_FILES["img_url_update"]["type"] == "image/png"))
        {
            if(isset($_FILES["img_url_update"]) && $_FILES["img_url_update"]["error"]== UPLOAD_ERR_OK)
            {
                ############ Edit settings ##############
                $UploadDirectory    = '../../blog/blog-images/'; //specify upload directory ends with / (slash)
                ##########################################
                //check if this is an ajax request
                if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
                    die();
                }
                
                
                $File_Name          = strtolower($_FILES['img_url_update']['name']);
                $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
                $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
                $NewFileName        = $Random_Number.$File_Ext; //new file name
                $path               = $UploadDirectory.$NewFileName; // Full path for file

            }

            move_uploaded_file($_FILES['img_url_update']['tmp_name'], $path );

            $sql->autocommit(FALSE); 

            $query_delete = "DELETE FROM `article_tag_map` WHERE `post_id` = $post_id";

            $result = $sql->query($query_delete);

            $query_update = "UPDATE `article` SET `post_title` = '$post_title', `post_content` = '$post_content', `keyword` = '$post_keywords', `description` = '$post_description', `url` = '$url', `img_url` = '$path' WHERE `post_id` = $post_id";

            $result = $sql->query($query_update); 

            foreach ($tags as $tag) 
            {
                if(!is_numeric($tag))
                {
                  $match = false;

                  $query= "select * from article_tag";

                  $result = $sql->query($query);
                                  
                  while ( $row = $result->fetch_assoc() ) 
                      {
                        
                        $tag_data = $row['tag_name'];

                        if($tag == $tag_data)
                        {
                          $query = "SELECT * FROM `article_tag` WHERE `tag_name` = '$tag';";
                          
                          $result = $sql->query($query);
                          
                          while ( $row = $result->fetch_assoc() ) 
                          {
                            $find_tag_id = $row['tag_id'];
                          }
                        
                          $match = true;
                        
                        }
                        
                        else
                        {
                        
                          $match = false;
                        
                        }
                      }

                    if($match == false)
                    {
                      $query = "INSERT IGNORE INTO `article_tag` (`tag_id`, `tag_name`) VALUES (NULL, '$tag')";

                      $result = $sql->query($query);

                      $last_tag_id = $sql->insert_id;

                      $query = "INSERT IGNORE INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$last_tag_id', '$post_id')";

                      $result = $sql->query($query);

                    }

                }
                else
                {
                  $query = "INSERT IGNORE INTO `article_tag_map` (`tag_id`, `post_id`) VALUES ('$tag', '$post_id')";

                  $result = $sql->query($query);

                }
            }
            if($result)
            {
              echo 'success'; 
              $sql->commit();
              $sql->close();
              unlink($img_url);
            } 
            else
            { 
              echo 'error';
              $sql->rollback();
              $sql->close();
            }
        
        }
        else
        {
          echo "file";
        }
      }
}

?>