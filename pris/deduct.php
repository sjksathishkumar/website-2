<?php 
error_reporting();
include_once("include/config.php");
include("include/functions.php");

	if($_POST)
	{
		$val = "SELECT * FROM company_details";
		$query = mysql_query($val);
			while($rows = mysql_fetch_assoc($query))
			{
				if($rows['pf'] == 0 && $rows['esi'] == 0)
				{
					$one = $_POST['one'];
					$two = $_POST['two'];
					$three = $_POST['three'];
					$four = $_POST['four'];
					$five = $_POST['five'];
					$six = $_POST['six'];
					$seven = $_POST['seven'];
					
					$ins = "INSERT INTO deduct (one,two,three,four,five,six,seven) values ('$one','$two','$three','$four','$five','$six','$seven')";
					$insert = mysql_query($ins);
				}
				elseif($rows['esi'] == 0)
				{
					$two = $_POST['two'];
					$three = $_POST['three'];
					$four = $_POST['four'];
					$five = $_POST['five'];
					$six = $_POST['six'];
					$seven = $_POST['seven'];
					
					$ins = "INSERT INTO deduct1 (two,three,four,five,six,seven) values ('$two','$three','$four','$five','$six','$seven')";
					$insert = mysql_query($ins);
				}
				elseif($rows['pf'] == 0)
				{
					$one = $_POST['one'];
					$three = $_POST['three'];
					$four = $_POST['four'];
					$five = $_POST['five'];
					$six = $_POST['six'];
					$seven = $_POST['seven'];
					
					$ins = "INSERT INTO deduct2 (one,three,four,five,six,seven) values ('$one','$three','$four','$five','$six','$seven')";
					$insert = mysql_query($ins);
				}
				else
				{
					$three = $_POST['three'];
					$four = $_POST['four'];
					$five = $_POST['five'];
					$six = $_POST['six'];
					$seven = $_POST['seven'];
					
					$ins = "INSERT INTO deduct3 (three,four,five,six,seven) values ('$three','$four','$five','$six','$seven')";
					$insert = mysql_query($ins);
				}
			}
	}
	
	header("location:http://www.basspris.com/pris/CompanyDeductions.php");





?>