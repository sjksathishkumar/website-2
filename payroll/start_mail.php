<?php
error_reporting();
//$logFile = 'mailing_log.txt';
//$command = 'nohup viewmail.php';
//$command.= ' > "'.$logFile.'" 2>&1';
$run=shell_exec('sh viewmail.php > /dev/null 2>/dev/null &');
//pclose(popen("start viewmail.php","r"));
//exec($command);
				echo '<script type="text/javascript">';
				echo "window.alert('Mailing Initiated.');";
				echo "window.location.href = 'EmployeeViewpayroll.php';";
				echo "</script>";
				exit;
?>