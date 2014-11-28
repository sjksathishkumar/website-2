<?php
require 'db-connect.php';

$name  = $sql->real_escape_string($_POST['name']);
$company_name = $sql->real_escape_string($_POST['company_name']);
$email = $sql->real_escape_string($_POST['email']);
$mobile = $sql->real_escape_string($_POST['mobile']);
$address = $sql->real_escape_string($_POST['address']);
$message = $sql->real_escape_string($_POST['msg']);

$query = "INSERT INTO `basspris_bassadmin`.`contact` (`id`, `name`, `company_name`, `email`, `mobile`, `address`, `message`, `date`) VALUES (NULL, '$name', '$company_name', '$email', '$mobile', '$address', '$message', CURRENT_TIMESTAMP);";

$result = $sql->query($query);

if($result)
{
	echo "success";
}
else
{
	echo "failed";
}

?>