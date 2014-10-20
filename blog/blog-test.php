<?php
  require '../db-connect.php';
/*  $tag_name = $_GET['tag_name'];
  echo "$tag_name";
  echo "Page is tested.";
  $query = "select * from article_tag where tag_name='Income-Tax' ";
  $result = $sql->query($query);
  while ( $row = $result->fetch_object() ) 
      {
          echo $row['tag_id'];
      }
  $sql->close;*/
                            $tag_name = $_GET['tag_name'];
                            $query= "select * from article_tag where tag_name= '$tag_name' ";
                            $result = $sql->query($query);
                            if ( $result->num_rows > 0 ) 
                            {
                                while ( $row = $result->fetch_object() ) 
                                {
                                    $tag_id = $row->tag_id;
                                    echo "<li><a href='tag_view.php?tag_id=$tag_id'> <i class='fa fa-angle-right'></i> $tag_id </a></li>";
                                }
                            } 
                            else 
                            {
                                echo 'There are no results to display.';
                            }
                            $sql->close();

?>