<?php
include("include/config.php");
include("include/functions.php");
include("include/alphaID.inc.php");

ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);

session_start();

//$category = base64_decode($_GET['ref']);


$Url = curPageURL();
//$catresult = GetDetailsFromQuery("select * from category");

error_reporting(0);
if(isset($_SESSION['username']))
{ 
	//echo '<div class="span6" style="border:0px solid #CCC;">
	  //<div class="logo"><img src="../img/logo.png" alt="" title="" /></div>';
$username = $_SESSION['username'];
$cat = $_SESSION['cat'];
//echo "Welcome :<span style='color:#E74C3C; font-weight:bold;'>&nbsp;".."</span>";
//echo '</div><div class="span2">Date: '.date("d-m-Y").'</div>';
//echo '<div class="span2"><a style="" href="Logout.php">Logout</a></div>';
}?>