<?php 
	include_once("include/config.php");
include("include/functions.php");
$name = $_POST['city'];
$eone = $_POST['eone'];
$etwo = $_POST['etwo'];
$ethree = $_POST['ethree'];
$efour = $_POST['efour'];
$efive = $_POST['efive'];
$esix = $_POST['esix'];
$done = $_POST['done'];
$dtwo = $_POST['dtwo'];
$dthree = $_POST['dthree'];
$dfour = $_POST['dfour'];
$dfive = $_POST['dfive'];
$dsix = $_POST['dsix'];

$val = "INSERT INTO proft (`name`, `eone`, `etwo`, `ethree`, `efour`, `efive`, `esix`, `done`, `dtwo`, `dthree`, `dfour`, `dfive`, `dsix`) values ('$name','$eone','$etwo','$ethree','$efour','$efive','$esix','$done','$dtwo','$dthree','$dfour','$dfive','$dsix')";
$insert = mysql_query($val);
header("location:http://www.basspris.com/pris/EmpPTSlabView.php");

?>