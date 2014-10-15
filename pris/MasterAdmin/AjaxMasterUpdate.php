<?php

$l=0;
include("../include/config_master.php");
include("../include/functions.php");
include("../include/alphaID.inc.php");

if(isset($_POST['type']))
{
	$type = htmlspecialchars(trim($_POST['type']));
	
	if($type == 'epf_update')
	{
		$j  = 0;
		foreach($_POST as $key => $value)
		{
			$arr[$j] = $value; 
			$j++;
		}
		//print_r($arr);
		$query = "select db_name from company order by id asc";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		
		for($j=0; $j<$count; $j++)
		{
			$dbname = mysql_result($result, $j, 'db_name');
			for($i=1; $i<6; $i++)
			{
				$k = $i+6;
				$l = $i+11;
				$insert1 = executeStatement("update $dbname.pf_master set value = '$arr[$i]' where key_word = '$arr[$k]'");
				echo mysql_error();
			}
		}
		
		for($i=1; $i<6; $i++)
			{
				$k = $i+6;
				$l = $i+11;
				$insert = executeStatement("update payroll_master.pf_master set value = '$arr[$i]' where key_word = '$arr[$k]'");
				echo mysql_error();
			}
		if($insert)
			echo "Success";
	}
	if($type == 'esi_update')
	{
		$j  = 0;
		foreach($_POST as $key => $value)
		{
			$arr[$j] = $value; 
			$j++;
		}
		//print_r($arr);
		
		$query = "select db_name from company order by id asc";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		
		for($j=0; $j<$count; $j++)
		{
			$dbname = mysql_result($result, $j, 'db_name');
			for($i=2; $i<5; $i++)
			{
				$k = $i+3;
				//$l = $i+7;
				$insert = executeStatement("update $dbname.esi_master set value = '$arr[$i]' where key_word = '$arr[$k]'");
				echo mysql_error();
			}
		}
		
		for($i=2; $i<5; $i++)
		{
			$k = $i+3;
			//$l = $i+7;
			$insert = executeStatement("update payroll_master.esi_master set value = '$arr[$i]' where key_word = '$arr[$k]'");
			echo mysql_error();
		}
		if($insert)
			echo "Success";
	}
}
?>