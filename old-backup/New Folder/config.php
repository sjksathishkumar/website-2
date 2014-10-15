<?php
								$hostname = "localhost";
								$username = "payroll_user1";
								$password = "pUv6UDh7C8YJBjR2";
								
								$dbname = "payroll_btip001";
								
								$conn = mysql_connect($hostname,$username,$password);
								$dbhandle = mysql_select_db($dbname);
								if(!$conn) echo "Unable to connect $hostname" . mysql_error();
								if(!$dbhandle) echo "Unable to connect databse" . mysql_error();
							?>