<?php

$con=mysqli_connect("localhost","bassbizi_antony","Bassbiz@12","bassbizi_data");
$sql = new mysqli('localhost','bassbizi_antony','Bassbiz@12','bassbizi_data');
if(!$con)
{
	echo "Faild to Connect Database!";
}
?>