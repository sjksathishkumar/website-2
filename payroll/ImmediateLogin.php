<?php
include ('include/config_master.php');
include ('include/functions.php');
session_start();

if(isset($_POST['cat']))
{
	$cat = htmlspecialchars(trim($_POST['cat']));
	$name = htmlspecialchars(trim($_POST['name']));
	$domain = htmlspecialchars(trim($_POST['domain']));
	$name=strtolower($name);
	$pwd = htmlspecialchars(trim($_POST['pwd']));
	$pass = encrypt_decrypt('encrypt', $pwd);
	
	/*$j  = 0;
	foreach($_POST as $key => $value)
	{
		$arr[$j] = $value; 
		$j++;
	}
	print_r($arr);
	*/
	
	if($cat == 'Master Admin')
	{
		$searchquery = "select * from master_admin_login where user_name = '".$name."' and user_pwd = '".$pass."' and status = 1";
		$resquery = mysql_query($searchquery);
		echo mysql_error();
		$count = mysql_num_rows($resquery);
		if($count>0)
		{	 	
			while($row=mysql_fetch_array($resquery))
			{
				$_SESSION['username'] = $row['user_name'];
				$_SESSION['cat'] = 'Master Admin';
			}
			$response =  1;
		}
		else
		{
			$response =  0;
		}
	}
	
	else if(($domain != "") && ($name != "") && ($pwd != ""))
	{
		$resquery = mysql_query("select db_name from company where domain_name = '".$domain."'");
		echo mysql_error();
		$count = mysql_num_rows($resquery);
		if($count>0)
		{
			while($row=mysql_fetch_array($resquery))
			{
				$dbname = $row['db_name'];

				$string = '<?php
							$hostname = "localhost";
		                                        $username = "basspris_payer";
		                                        $password = "Bass2013!";
							
							$dbname = "'.$dbname.'";
							
							$conn = mysql_connect($hostname,$username,$password);
							$dbhandle = mysql_select_db($dbname);
							if(!$conn) echo "Unable to connect $hostname" . mysql_error();
							if(!$dbhandle) echo "Unable to connect databse" . mysql_error();
						?>';

				$my_file = "include/config.php";
				$fp = fopen($my_file, "w") or die('Cannot open file:  '.$my_file);
				
				fwrite($fp, $string);
				
				fclose($fp);
				
				mysql_close();
				
				//include("ImmediateLogin.php");
				
				
				include ('include/config.php');
				
				//echo $cat;
				if($cat == 'Employee')
				{
					$pass1 = md5($pwd);
					if(checkStatusLogin('emp_login', $name, $pass1) == 1)
					{
						//echo "select * from emp_login where user_name = '".$name."' and user_pwd = '".$pass."'";
						$searchquery = "select * from emp_login where user_name = '".$name."' and user_pwd = '".$pass1."'";
						$resquery = mysql_query($searchquery);
						echo mysql_error();
						$count = mysql_num_rows($resquery);
						if($count>0)
						{	 	
							while($row=mysql_fetch_array($resquery))
							{
								$_SESSION['username'] = $row['user_name'];
								$_SESSION['cat'] = 'Employee';
							}
							$response =  1;
						}
						else
						{
							$response =  0;
						}
					}
					else
					{
						$response = 3;
					}
				}
				else
				{
					$searchquery = "select * from user_admin_login where user_name = '".$name."' and user_pwd = '".$pass."' and status = 1";
					$resquery = mysql_query($searchquery);
					echo mysql_error();
					$count = mysql_num_rows($resquery);
					if($count>0)
					{	 	
						while($row=mysql_fetch_array($resquery))
						{
							$_SESSION['username'] = $row['user_name'];
							$_SESSION['cat'] = 'User Admin';
						}
						$response =  1;
					}
					else
					{
						$response =  0;
					}
				}
			}
			
		}
		else
		{
			$response = 2;
		}
		
	}
	else
	{
		$response = 5;
	}
	echo $response;
}
	?>