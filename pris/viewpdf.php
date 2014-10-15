<?php 

error_reporting();
include_once("include/config.php");

session_start();
					 $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
$new = "SELECT * FROM test3 WHERE month='$month[0]' AND year='$year[0]'";
$val = mysql_query($new);

require_once("dompdf/dompdf_config.inc.php");


$html = <<<HTML
  <html>
      <head>
            <style type="text/css">
                /* Your document styling goes here */
            </style>
      </head>
      <body>
HTML;

while($rows = mysql_fetch_assoc($val))
{ 
	$name = "SELECT * FROM emp_payslip";
	$newname = mysql_query($name);
	while($rrr = mysql_fetch_assoc($newname))
	{
		$ded = "SELECT * FROM emp_details";
		$newded = mysql_query($ded);
		while($ddd = mysql_fetch_assoc($newded))
		{
	    $companyhead = $rrr['header'];
		$head1 = $rrr['one'];
		$head2 = $rrr['two'];
		$head3 = $rrr['three'];
		$head4 = $rrr['four'];
		$head5 = $rrr['five'];
		$head6 = $rrr['six'];
		$head7 = $rrr['seven'];
		$head8 = $rrr['eight'];
		$emp_id = $rows['emp_id'];
		$name = $rows['emp_name'];
		$one =  $rows['val1'];
  		$two =  $rows['val2'];
  		$three =  $rows['val3'];
  		$four =  $rows['val4'];
  		$five =  $rows['val5'];
  		$six =  $rows['val6'];
  		$seven =  $rows['val7'];
  		$eight =  $rows['val8'];
  		$pf =  $rows['val9'];
  		$esi =  $rows['esval10'];
  		$pt =  $rows['pt'];
		$gross =  $rows['val1']+$rows['val2']+$rows['val3']+$rows['val4']+$rows['val5']+$rows['val6']+$rows['val7']+$rows['val8']+$rows['ot']+$rows['holiday_wages']+$rows['incent'];
		$totalded = $rows['val9']+$rows['esval10']+$rows['pt']+$rows['advance'];
		$vapay = $rows['ot']+$rows['holiday_wages']+$rows['incent'];
		$otherded = $rows['advance'];
        $net = $rows['val1']+$rows['val2']+$rows['val3']+$rows['val4']+$rows['val5']+$rows['val6']+$rows['val7']+$rows['val8']+$rows['ot']+$rows['holiday_wages']+$rows['incent']-			$rows['val9']-$rows['esval10']-$rows['pt']-$rows['advance'];
  		$month = $rows['month'];
 		$present = $rows['present'];
		$year = $rows['year'];
		$totaldays = $rows['present']+$rows['lop'];
		$desig = $ddd['desig'];
		$dept = $ddd['dpt_name'];
		$pfno = $ddd['pf'];
		$bankac = $ddd['bank_ac'];
		}}

    $html .= '<h1 align="center">'.$companyhead .'</h1>
<h2 align="center">Pay slip for '.$month.' '.$year.'</h2>
<style>
table
{
border-collapse:collapse;
}
table,th,td,tr
{
border:1px solid black;
}
</style>
<table align="center">
	<tr>
		<td style="width:100px;">
			Employee Name
		</td>
		<td style="width:200px; text-align:right;">
			'.$name.'
		</td>
		<td style="width:100px; text-align:right;">
			Designation
		</td>
		<td style="width:200px; text-align:right;">
			'.$desig.'
		</td>
	</tr>
	<tr>
		<td style="width:100px;">
			Employee Code
		</td>
		<td style="width:200px; text-align:right;">
			 '.$emp_id.'
		</td>
		<td style="width:100px; text-align:right;">
			Department
		</td>
		<td style="width:200px; text-align:right;">
			'.$dept.'
		</td>
	</tr>
	<tr>
		<td style="width:100px;">
			PF.NO
		</td>
		<td style="width:200px; text-align:right;">
			'.$pfno.'
		</td>
		<td style="width:100px; text-align:right;">
			Total Days
		</td>
		<td style="width:200px; text-align:right;">
			'.$totaldays.'
		</td>
	</tr>
	<tr>
		<td style="width:100px;">
			Bank A/C No
		</td>
		<td style="width:200px; text-align:right;">
			'.$bankac.'
		</td>
		<td style="width:100px; text-align:right;">
			Days Paid
		</td>
		<td style="width:200px; text-align:right;">
			'.$present.'
		</td>
	</tr>
	<tr>
		<th colspan="2">Earnings</th>
		<th colspan="2">Deductions</th>
	</tr>
	<tr>
		<td style="width:100px;"><strong>Emoulements</strong></td>
		<td style="width:200px; text-align:right;"><strong>Amount(Rs.)</strong></td>
		<td style="width:100px; text-align:right;">Common Deductions</td>
		<td style="width:200px; text-align:right;"><strong>Amount(Rs.)</strong></td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head1.'</td>
		<td style="width:200px; text-align:right;">'.round($one,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;">PF</td>
		<td style="width:200px; text-align:right;">'.round($pf,0,PHP_ROUND_HALF_UP).'</td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head2.'</td>
		<td style="width:200px; text-align:right;">'.round($two,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;">ESI</td>
		<td style="width:200px; text-align:right;">'.round($esi,0,PHP_ROUND_HALF_UP).'</td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head3.'</td>
		<td style="width:200px; text-align:right;">'.round($three,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;">PT</td>
		<td style="width:200px; text-align:right;">'.round($pt,0,PHP_ROUND_HALF_UP).'</td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head4.'</td>
		<td style="width:200px; text-align:right;">'.round($four,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;">Other Deductions</td>
		<td style="width:200px; text-align:right;">'.$otherded.'</td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head5.'</td>
		<td style="width:200px; text-align:right;">'.round($five,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head6.'</td>
		<td style="width:200px; text-align:right;">'.round($six,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head7.'</td>
		<td style="width:200px; text-align:right;">'.round($seven,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
	<tr>
		<td style="width:100px;">'.$head8.'</td>
		<td style="width:200px; text-align:right;">'.round($eight,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
	<tr>
		<td style="width:100px;">Variable Pay</td>
		<td style="width:200px; text-align:right;">'.$vapay.'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
	<tr>
		<td style="width:100px;">Total Earnings</td>
		<td style="width:200px; text-align:right;">'.round($gross,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;">Total Deductions</td>
		<td style="width:200px; text-align:right;">'.round($totalded,0,PHP_ROUND_HALF_UP).'</td>
	</tr>
	<tr>
		<td style="width:100px;">Net Pay</td>
		<td style="width:200px; text-align:right;">'.round($net,0,PHP_ROUND_HALF_UP).'</td>
		<td style="width:100px; text-align:right;"></td>
		<td style="width:200px; text-align:right;"></td>
	</tr>
		</table>
		<div>
    	  <p align="center">&nbsp;</p>
    	  <p align="center">&nbsp;</p>
    	  <p align="center" style="font-size:20px; font-weight:10px;">EmployeeSign&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager Sign</p>
                  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
		</div>';
						
		 

}

$html .= '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream(payslip);
//$pdf = $dompdf->output();
//file_put_contents("E:/Program Files/xampp/htdocs/payroll_final/pdf/test.pdf", $pdf);
//session_destroy();
	
	

	
?>