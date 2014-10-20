<?php
require 'db-connect.php';

$name  = $sql->real_escape_string($_POST['name']);
$company_name = $sql->real_escape_string($_POST['company_name']);
$email = $sql->real_escape_string($_POST['email']);
$mobile = $sql->real_escape_string($_POST['mobile']);
$address = $sql->real_escape_string($_POST['address']);
$message = $sql->real_escape_string($_POST['message']);


echo "$name<br>$company_name<br>$email<br>$mobile<br>$address<br>$message";
?>