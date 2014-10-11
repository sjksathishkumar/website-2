<?php


/*$hostname = "localhost";
                    $username = "root";
                    $password = "basstechs";

$dbname = "blog";

$conn = mysql_connect($hostname,$username,$password);
$dbhandle = mysql_select_db($dbname);
if(!$conn) echo "Unable to connect $hostname" . mysql_error();
if(!$dbhandle) echo "Unable to connect databse" . mysql_error()*/;

$sql = new mysqli('localhost','root','basstechs','question');
if(!$sql)
{
	echo "Faild to Connect Database!";
}