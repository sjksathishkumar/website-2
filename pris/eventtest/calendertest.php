<?php
if ((!isset($_POST['month'])) || (!isset($_POST['year']))) {
	$nowArray = getdate();
	$month = $nowArray['mon'];
	$year = $nowArray['year'];
} else {
	$month = $_POST['month'];
	$year = $_POST['year'];
}
$start = mktime(12,0,0,$month,1,$year);
$firstDayArray = getdate($start);
?>
<html>
<head>
<title><?php echo "Calendar: ".$firstDayArray['month']."" . $firstDayArray['year']; ?></title>
</head>
<body>
<h1>Select a Month/Year</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<select name="month">
<?php
$months = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

for ($x=1; $x<=count($months); $x++){
	echo "<option value=\"$x\"";
	if ($x == $month){
		echo " selected";
	}
	echo ">".$months[$x-1]."</option>";
}
?>
</select>
<select name="year">
<?php
for ($x=1980; $x<=2010; $x++){
	echo "<option";
	if ($x == $year){
		echo " selected";
	}
	echo ">$x</option>";
}
?>
</select>
<input type="submit" name="submit" value="Go!">
</form>
<br />
<?php
$days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
echo "<table border=\"1\" cellpadding=\"3\"><tr>\n";
foreach ($days as $day){
	echo "<td style=\"background-color: #CCCCCC; text-align: center; width: 14% \"><strong>$day</strong></td>\n";
}
for ($count=0; $count < (6*7); $count++){
	$dayArray = getdate($start);
	if (($count % 7) == 0){
		if ($dayArray['mon'] != $month){
			break;
		} else {
			echo "</tr><tr>\n";
		}
	}
	if ($count < $firstDayArray['wday'] || $dayArray['mon'] != $month){
		echo "<td> </td>\n";
	} else {
		echo "<td>".$dayArray['mday']."    </td>\n";
		$start += ADAY;
	}
}
echo "</tr></table>";
?>
</body>
</html>

