<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$uid = $sql->real_escape_string($_POST['uid']);

echo "$uid";

$query = "DELETE FROM `enquiry` WHERE `uid` = '$uid'";

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