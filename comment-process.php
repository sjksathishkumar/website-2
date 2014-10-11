<?php
include 'db_connect.php';

$name  = $sql->real_escape_string($_POST['name']);
$email = $sql->real_escape_string($_POST['email']);
$comment = $sql->real_escape_string($_POST['comment']);
$post_id = $sql->real_escape_string($_POST['post_id']);


$query = "INSERT INTO `comment` (`comment_id`, `post_id`, `comment`, `status`, `name`, `email`, `date`) VALUES (NULL, '$post_id', '$comment', '0', '$name', '$email', CURRENT_TIMESTAMP);";

if ( !$sql->query($query) ) {
    echo "Error code ({$sql->errno}): {$sql->error}";
} else {
     header('Location: ../blog/index.php');
}

$sql->close();


?>