<?php
    $mysql = new mysqli('localhost','basspris_prisadm','Bass1987$','basspris_bassadmin');
    $result = $mysql->query("select * from article_tag");
    $rows = array();
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
        $rows[] = array_map("utf8_encode", $row);
    }
    echo json_encode($rows);
    $result->close();
    $mysql->close();

?>
