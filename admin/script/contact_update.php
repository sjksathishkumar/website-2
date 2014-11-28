<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$id = $sql->real_escape_string($_POST['id']);

$status = $sql->real_escape_string($_POST['status']);

$query = "UPDATE `contact` SET `status` = '$status' WHERE `id` = '$id'";

$result = $sql->query($query);

if($result)
{
  echo "success";
  $sql->close;
}
else
{
  echo "error";
  $sql->close;
}

?>