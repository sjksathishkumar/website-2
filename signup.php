<?php
require 'db-connect.php';
$companyname=   $sql->real_escape_string($_POST['companyname']);
$address  = $sql->real_escape_string($_POST['address']);
$email   =$sql->real_escape_string($_POST['email']);
$mobile = $sql->real_escape_string($_POST['mobile']);
$pname  = $sql->real_escape_string($_POST['pname']);
$pemail   =$sql->real_escape_string($_POST['pemail']);
$pmobile = $sql->real_escape_string($_POST['pmobile']);
 $noofemp=  $_GET["noofemp"];
 $package= $_GET["package"];


$query ="INSERT INTO `client` (`id`, `companyname`, `address`, `email`, `mobile`, `pname`, `pemail`, `pmobile`, `noofemp`, `package`) VALUES (NULL, '$companyname', '$address', '$email', '$mobile', '$pname', '$pemail', '$pmobile','$noofemp','$package' );";

      if ( !$sql->query($query) ) {
    echo "Error code ({$sql->errno}): {$sql->error}";
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo 'success';
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
}
$sql->close();
//print_r($_GET);
// echo $_GET["package"];
 // echo $_GET["emp"];
//$sliver=$_POST['id'];
//echo $sliver;
?>
