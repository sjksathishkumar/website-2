<?php
/*$con=mysqli_connect("localhost","root","","bassbiz1_data");
//mysql_select_db('blog',$con);

 $post_id = '5';
/*if($_GET['post_id'])
{*/
/*$query= mysqli_query($con,"select t.tag_name from tag_map tm join article p on p.post_id = tm.post_id join tag t on t.tag_id = tm.tag_id where p.post_id = '$post_id'");
while($que = mysqli_fetch_row($query))
{*/
//echo "<pre>";
//print_r($que);
	/*echo $que['0']."<br>";
}
*/
//}*/



// initiate database connection
$db = mysqli_connect(
    "localhost",
     "root",
     "",
     "bassbiz1_data"
);

// set up your statement with ? parameters
$statment = $db->prepare('
    SELECT
        t.tag_name
    FROM
        tag_map tm
    JOIN
        article p ON
            p.post_id = tm.post_id
    JOIN
        tag t ON
            t.tag_id = tm.tag_id
    WHERE
        p.post_id = ?
');

// bind values for each parameter
$statement->bind_param('i', $post_id);

// execute the statement
$statement->execute();

// list the columns you want to get from each row as variables
$statement->bind_result($tagName);

// then loop the results and output the columns you bound above
while($statement->fetch()){
    echo $tagName.'<br>';
}


$statement->free_result();

?>