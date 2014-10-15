<!DOCTYPE HTML>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
</style>
</head>
<body>
<?php 
define('DB_SERVER', 'localhost');
define('DB_USER', 'basspris_paysli');
define('DB_PASSWORD', 'Bass2013!');
define('DB_NAME', 'basspris_payroll_master');
 
@$conn = mysql_connect (DB_SERVER, DB_USER, DB_PASSWORD);
mysql_select_db (DB_NAME,$conn);
$query = "SELECT * FROM payslip WHERE emp_code=".$_REQUEST['emp_code'];
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
 $emp_code = $row['emp_code'];
 $emp_name = $row['emp_name'];
 $basic = $row['basic'];
 $hra = $row['hra'];
 $edu_allowance = $row['edu_allowance'];
 $utility_allowance = $row['utility_allowance'];
 $spl_allowance = $row['spl_allowance'];
 $working_days = $row['working_days'];
 $gross = $row['gross'];
 $basic_da = $row['basic_da'];
 $house_on_rent = $row['house_on_rent'];
 $gedu_allowance = $row['gedu_allowance'];
 $gutility_allowance = $row['gutility_allowance'];
 $gspl_allowance = $row['gspl_allowance'];
 $total = $row['total'];
 $pf = $row['pf'];
 $esi = $row['esi'];
 $pt = $row['pt'];
 $total_ded = $row['total_ded'];
 $net = $row['net'];
 $month = $row['month'];
	$file = "folder/type.html";
	
	$out = fopen("folder/type.html", "a");
	fwrite($out,"<!DOCTYPE HTML>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
</style>
</head>
<body>
<h1 align='center'>MAXWIN BUSINESS SOLUTIONS</h1>
<h2 align='center'>Pay slip for $month</h2>
<table align='center'>
	<tr>
		<td style='width:100px;'>
			Employee Name
		</td>
		<td style='width:200px; text-align:right;'>
			$emp_name
		</td>
		<td style='width:100px; text-align:right;'>
			Designation
		</td>
		<td style='width:200px; text-align:right;'>
			
		</td>
	</tr>
	<tr>
		<td style='width:100px;'>
			Employee Code
		</td>
		<td style='width:200px; text-align:right;'>
			 $emp_code
		</td>
		<td style='width:100px; text-align:right;'>
			Department
		</td>
		<td style='width:200px; text-align:right;'>
			
		</td>
	</tr>
	<tr>
		<td style='width:100px;'>
			PF.NO
		</td>
		<td style='width:200px; text-align:right;'>
			
		</td>
		<td style='width:100px; text-align:right;'>
			Total Days
		</td>
		<td style='width:200px; text-align:right;'>
			30
		</td>
	</tr>
	<tr>
		<td style='width:100px;'>
			Bank A/C No
		</td>
		<td style='width:200px; text-align:right;'>
			
		</td>
		<td style='width:100px; text-align:right;'>
			Days Paid
		</td>
		<td style='width:200px; text-align:right;'>
			$working_days
		</td>
	</tr>
	<tr>
		<th colspan='2'>Earnings</th>
		<th colspan='2'>Deductions</th>
	</tr>
	<tr>
		<td style='width:100px;'><strong>Emoulements</strong></td>
		<td style='width:200px; text-align:right;'><strong>Amount(Rs.)</strong></td>
		<td style='width:100px; text-align:right;'>Common Deductions</td>
		<td style='width:200px; text-align:right;'><strong>Amount(Rs.)</strong></td>
	</tr>
	<tr>
		<td style='width:100px;'>Basic</td>
		<td style='width:200px; text-align:right;'>$basic_da</td>
		<td style='width:100px; text-align:right;'>PF</td>
		<td style='width:200px; text-align:right;'>$pf</td>
	</tr>
	<tr>
		<td style='width:100px;'>HRA</td>
		<td style='width:200px; text-align:right;'>$hra</td>
		<td style='width:100px; text-align:right;'>ESI</td>
		<td style='width:200px; text-align:right;'>$esi</td>
	</tr>
	<tr>
		<td style='width:100px;'>Education allowance</td>
		<td style='width:200px; text-align:right;'>$gedu_allowance</td>
		<td style='width:100px; text-align:right;'>PT</td>
		<td style='width:200px; text-align:right;'>$pt</td>
	</tr>
	<tr>
		<td style='width:100px;'>Utility Allowance</td>
		<td style='width:200px; text-align:right;'>$gutility_allowance</td>
		<td style='width:100px; text-align:right;'>Other Deductions</td>
		<td style='width:200px; text-align:right;'>0</td>
	</tr>
	<tr>
		<td style='width:100px;'>Special Allowance</td>
		<td style='width:200px; text-align:right;'>$gspl_allowance</td>
		<td style='width:100px; text-align:right;'></td>
		<td style='width:200px; text-align:right;'></td>
	</tr>
	<tr>
		<td style='width:100px;'>Rental Allowance</td>
		<td style='width:200px; text-align:right;'>$house_on_rent</td>
		<td style='width:100px; text-align:right;'></td>
		<td style='width:200px; text-align:right;'></td>
	</tr>
	<tr>
		<td style='width:100px;'>Total</td>
		<td style='width:200px; text-align:right;'>$total</td>
		<td style='width:100px; text-align:right;'></td>
		<td style='width:200px; text-align:right;'></td>
	</tr>
	<tr>
		<td style='width:100px;'>Net Pay</td>
		<td style='width:200px; text-align:right;'>$net</td>
		<td style='width:100px; text-align:right;'>Total Deductions</td>
		<td style='width:200px; text-align:right;'>$total_ded</td>
	</tr>
		</table>
		<div>
    	  <p align='center'>&nbsp;</p>
    	  <p align='center'>&nbsp;</p>
    	  <p align='center' style='font-size:20px; font-weight:10px;'>EmployeeSign&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager Sign</p>
		</div>
		</body>
		</html>");
	fclose($out);
	  

?>

<h1 align="center">MAXWIN BUSINESS SOLUTIONS</h1>
<h2 align="center">Pay slip for <?php echo $row['month'];?></h2>
<form action="convert3.php" method="get">
	<table align="center">
	<tr>
		<td style="width:100px;">
			Employee Name
		</td>
		<td style="width:200px; text-align:right;">
			<?php echo $row['emp_name']; ?>
		</td>
		<td style="width:100px; text-align:right;">
			Designation
		</td>
		<td style="width:200px; text-align:right;">
			
	  </td>
	</tr>
	<tr>
		<td style="width:100px;">
			Employee Code
		</td>
		<td style="width:200px; text-align:right;">
			 <?php echo $row['emp_code']; ?>
		</td>
		<td style="width:100px; text-align:right;">
			Department
		</td>
		<td style="width:200px; text-align:right;">
			
		</td>
	</tr>
	<tr>
		<td style="width:100px;">
			PF.NO
		</td>
		<td style="width:200px; text-align:right;">
			
		</td>
		<td style="width:100px; text-align:right;">
			Total Days
		</td>
		<td style="width:200px; text-align:right;">
			30
		</td>
	</tr>
	<tr>
		<td style="width:100px;">
			Bank A/C No
		</td>
		<td style="width:200px; text-align:right;">
			
</td>
		<td style="width:100px; text-align:right;">
			Days Paid
		</td>
		<td style="width:200px; text-align:right;">
			<?php echo $row['working_days']; ?>
		</td>
	</tr>
	<tr>
		<th colspan="2">Earnings</th>
		<th colspan="2">Deductions</th>
	</tr>
	<tr>
		<td style="width:100px;"><strong>Emoulements</strong></td>
		<td style="width:200px; text-align:right;"><strong>Amount(Rs.)</strong></td>
		<td style="width:100px; text-align:right;"><strong>Common Deductions</strong></td>
		<td style="width:200px; text-align:right;"><strong>Amount(Rs.)</strong></td>
	</tr>
	<tr>
		<td style="width:100px;">Basic</td>
		<td style="width:200px; text-align:right;"><?php echo $row['basic_da']; ?></td>
		<td style="width:100px; text-align:right;">PF</td>
		<td style="width:200px; text-align:right;"><?php echo $row['pf']; ?></td>
	</tr>
	<tr>
		<td style="width:100px;">HRA</td>
		<td style="width:200px; text-align:right;"><?php echo $row['hra']; ?></td>
		<td style="width:100px; text-align:right;">ESI</td>
		<td style="width:200px; text-align:right;"><?php echo $row['esi']; ?></td>
	</tr>
	<tr>
		<td style="width:100px;">Education allowance</td>
		<td style="width:200px; text-align:right;"><?php echo $row['gedu_allowance']; ?></td>
		<td style="width:100px; text-align:right;">PT</td>
		<td style="width:200px; text-align:right;"><?php echo $row['pt'] ?></td>
	</tr>
	<tr>
		<td style="width:100px;">Utility Allowance</td>
		<td style="width:200px; text-align:right;"><?php echo $row['gutility_allowance']; ?></td>
		<td style="width:100px; text-align:right;">Other Deductions</td>
		<td style="width:200px; text-align:right;">0</td>
	</tr>
	<tr>
		<td style="width:100px;">Special Allowance</td>
		<td style="width:200px; text-align:right;"><?php echo $row['gspl_allowance']; ?></td>
	</tr>
	<tr>
		<td style="width:100px;">Rental Allowance</td>
		<td style="width:200px; text-align:right;"><?php echo $row['house_on_rent']; ?></td>
	</tr>
	<tr>
		<td style="width:100px;">Total</td>
		<td style="width:200px; text-align:right;"><?php echo $row['total'];?></td>
	</tr>
	<tr>
		<td style="width:100px;">Net Pay</td>
		<td style="width:200px; text-align:right;"><?php echo $row['net']; ?></td>
		<td style="width:100px; text-align:right;">Total Deductions</td>
		<td style="width:200px; text-align:right;"><?php echo $row['total_ded']; ?></td>
	</tr>
        <tr>
        	<td align="center">
            	<input type="submit" value="convert to pdf"/>
            </td>
        </tr>
    </table>
</form>
<?php } ?>
    	<div>
    	  <p align="center">&nbsp;</p>
    	  <p align="center">&nbsp;</p>
    	  <p align="center" style='font-size:20px; font-weight:10px;'>Employee Sign&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager Sign</p>
		</div>
    	<input type="button" name="disform" id="disform" value="To send mail"/>
    <div id="mail">
    <form  action="mail2.php" method="post">
    	<input type="text" id="to" name="to"/>
        <input type="submit" value="Send">
    </form>
    </div>
    
<script type="text/javascript" src="js/jquery-1.10.0.min.js"></script>
            <script type="text/javascript" src="js/functions.js"></script>
</body>
</html>
