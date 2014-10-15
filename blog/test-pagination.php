<?php 
    require('../db-connect.php');
    $query = "Select * FROM article"; 
    $result = $sql->query($query); //run the query
    $total_records = $result->num_rows;  //count number of records
    echo "Total records - $total_records";
/*    $total_pages = ceil($total_records / 3); 

    echo "<a href='index.php?page=1'>".'|<'."</a> "; // Goto 1st page  

    for ($i=1; $i<=$total_pages; $i++) { 
                echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
    }
    echo "<a href='inde.php?page=$total_pages'>".'>|'."</a> "; // Goto last page*/
?> 