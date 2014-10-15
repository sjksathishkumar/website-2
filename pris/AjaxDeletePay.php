<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

	
	if(isset($_POST['type']))
	{
		if($_POST['type'] == 'pay'){
		
			$delid = htmlspecialchars(trim($_POST['delid']));
			
			if($delid != '') {
				
				$insert = mysql_query("delete from emp_pay_structure where slab_name= '$delid'") or die("Error delete emp pay structure");
				if($insert){ echo 'Success';}
			} }
		}
		
?>