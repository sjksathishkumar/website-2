<?php

require 'blog_function.php';

$query = "Select * FROM article ORDER BY date_posted DESC LIMIT 3 ";



$posts = get_posts($query); 


foreach($posts as $post)
{
	echo $post['post_id']."<br>";
	echo $post['post_title']."<br>";
	echo $post['comments']."<br>";
}


echo "Comments<br>";

$query = "Select * FROM comment where post_id='2' ORDER BY date DESC LIMIT 3 ";

$comments = get_comments($query); 


foreach($comments as $comment)
{
	echo $comment['name'].":";
	echo $comment['comment']."<br>";
	echo "Comment on:".$comment['date']."<br>";
	echo "Status".$comment['status']."<br>";

}

// Get tags
	
	$query= "select  t.tag_name  from tag_map tm  join article p on p.post_id = tm.post_id join tag t on t.tag_id = tm.tag_id where p.post_id = 2";
	$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
		{
    			$tags[] = $row;

   		}

   	foreach($tags as $tag)
{
	echo $tag['tag_name'].":";
	

}

?>
