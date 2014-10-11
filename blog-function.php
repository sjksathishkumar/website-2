<?php

include "db-connect.php";

//For Getting Posts

function get_posts($query)
{
	include 'db-connect.php';

        $result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
		{
    			$posts[] = $row;
   		}
   return $posts;
}

// For Getting Comments


function get_comments($query)
{
	include 'db-connect.php';
	$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
		{
    			$comments[] = $row;
   		}
   return $comments;

}

// For Getting Tags


function get_tags($query)
{
	include 'db_connect.php';
	$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
		{
    			$tags[] = $row;
   		}
   return $tags;

}


?>