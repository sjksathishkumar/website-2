<html>
<head>
<title>Test Page for basspris</title>
</head>
<body>


	<?php

/* so again, make your connection */
$sql = new mysqli('localhost','root','','basspris');

/* write our query */

$query = "SELECT * from article ORDER BY post_date DESC;";
//$query = "SELECT * FROM `article` ORDER BY `post_date` DESC;";
//$query2="SELECT MONTHNAME(post_date) as i_month,post_id from article group by i_mon";

/* set our result information */
$result = $sql->query($query);

/*if ( $result->num_rows > 0 ) {
    echo "We found {$result->num_rows} records:<br />";
 */   /*while ( $row = $result->fetch_object() ) {
        echo "{$row->post_title} <br> {$row->post_date}<br />";
    }*/
/*} else {
    echo 'There are no results to display.';
}*/

/*echo 'Display using objects.<br />';
while ( $row = $result->fetch_object() ) {
    echo "{$row->post_id}<br>{$row->post_date}<br>{$row->post_title}<br />---------------------------------------------<br>";
}
*/
if($result && $result->num_rows > 0)
{
    // An array to store the data in a more managable order.

        $data = array();

    // Add each entry to the $data array, sorted by Year and Month
    while($row = $result->fetch_assoc())
    {
        $year = date('Y', strtotime($row['post_date']));
        $month = date('M', strtotime($row['post_date']));
        $data[$year][$month][] = $row;
    }

    // Go through each Year and Month and print a list of entries, sorted by month.
    echo "<ul id='year'>";
    foreach($data as $_year => $_months)
    {
        echo "{$_year}<li id='month'>";
        foreach($_months as $_month => $_entries)
        {
            echo "{$_month}";
            echo "<ul>";
            foreach($_entries as $_entry)
            {
                echo "<li id='data'><a href=\"show_entry.php?id={$_entry['post_id']}\">{$_entry['post_title']}</a></li>";
            }
            echo "</ul>";
        }
        echo "</li>";
    }
            echo "</ul>";
}
    $result->free();


/* and close up */
$sql->close();


?>


</body>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#year").parent().click(function(){
    $("#month").slideToggle("slow");
  });
});
</script>
</html>

