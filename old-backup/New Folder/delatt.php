<?php
include_once("include/config.php");

		$del = "DELETE FROM emp_attendance WHERE flags=0";
		$delquery = mysql_query($del);
		
		$upid = "DELETE FROM uploadid";
		$upidquery = mysql_query($upid);

Header('Location:http://localhost/payroll_final/payroll_tester/ViewCompanyAttendance.php');




?>