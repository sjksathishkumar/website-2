<?php

$con=mysqli_connect("localhost","root","basstechs","basspris");
$sql = new mysqli('localhost','root','basstechs','basspris');
if(!$con)
{
	echo "Faild to Connect Database!";
}
?>
