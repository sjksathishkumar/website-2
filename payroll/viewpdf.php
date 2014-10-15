<?php 

error_reporting();
include_once("include/config.php");
include ("include/functions.php");
require_once('tcpdf/tcpdf.php');

session_start();
ini_set('max_execution_time',120);
					  $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
$name = "SELECT * FROM emp_payslip LIMIT 0,1";
		$newname = mysql_query($name);
		$rrr = mysql_fetch_assoc($newname);
		$companyhead = $rrr['header'];
		$head1 = $rrr['one'];
		$head2 = $rrr['two'];
		$head3 = $rrr['three'];
		$head4 = $rrr['four'];
		$head5 = $rrr['five'];
		$head6 = $rrr['six'];
		$head7 = $rrr['seven'];
		$head8 = $rrr['eight'];
$pdf = new TCPDF('P', PDF_UNIT,'A4', true, 'UTF-8', false);	
$pdf->setFontSubsetting(false);

$pdf->SetHeaderData('MBSlogo.png',22,$companyhead,"No:233,Kutchery Road\nMylapore,Chennai-600004\nPhone:044-24641599");
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$new = "SELECT * FROM test3 WHERE month='$month[0]' AND year='$year[0]'";
$val = mysql_query($new);
while($rows = mysql_fetch_assoc($val))
{ 
		
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
		
		$ded = "SELECT * FROM emp_details WHERE `emp_id`= '$emp_id' LIMIT 0,1";
		$newded = mysql_query($ded) or die (mysql_error())	;
		$ddd = mysql_fetch_assoc($newded);
		$desig = $ddd['desig'];
		$dept = $ddd['dpt_name'];
		$pfno = $ddd['pf'];
		$bankac = $ddd['bank_ac'];
		$netpay=round($net,0,PHP_ROUND_HALF_UP);
		$netpay_words=convert_number_to_words($netpay);	

	
	//add a page
	$pdf->AddPage();
	$pdf->SetFont('Times', 'B', 15,'',false);
	$pdf->ln();
	$pdf->Write(0,'Pay slip for'.$month.','.$year.'', '', 0, 'C', true, 0, false, false, 0);
			
	$pdf->Ln();	
$pdf->SetFont('Times', '', 10,'',false);
$table ='<table width="555" style="border:1px solid black;" align="center">
  <tr>
    <th width="100" align="left" scope="row">Employee Name </th>
    <th width="10" align="left">:</th>
    <td width="125" align="left">'.$name.'</td>
    <th width="30" align="left">&nbsp;</th>
    <th width="100" align="left">Employee ID </th>
    <th width="11" align="left">:</th>
    <td width="120" align="left">'.$emp_id.'</td>
    <td width="10" align="left">&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">Designation </th>
    <th align="left">:</th>
    <td align="left">'.$desig.'</td>
    <th align="left">&nbsp;</th>
    <th align="left">Department </th>
    <th align="left">:</th>
    <td align="left">'.$dept.'</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">Bank A/C No </th>
    <th align="left">:</th>
    <td align="left">'.$bankac.'</td>
    <th align="left">&nbsp;</th>
    <th align="left">P.F No </th>
    <th align="left">:</th>
    <td align="left">'.$pfno.'</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">Total Days </th>
    <th align="left">:</th>
    <td align="left">'.$totaldays.'</td>
    <th align="left">&nbsp;</th>
    <th align="left">Days Paid </th>
    <th align="left">:</th>
    <td align="left">'.$present.'</td>
    <td align="left">&nbsp;</td>
  </tr>
</table>';
$pdf->writeHTML($table, true, false, false, false, '');
	$pdf->Ln();	
	$pdf->Ln();	

//------------------------------------------------------------------------------------------------------------------------------------------//
$pdf->SetFont('timesnewroman', '', 10, '', false);
$table ='<table width="540" align="center" style="border:1px solid black;">
 <tr>
    <th width="150" bgcolor="#D6D6D6" scope="row"><strong>Earnings</strong></th>
    <th width="130" bgcolor="#D6D6D6" scope="row"><strong>Amount(₹)</strong></th>
    <th width="125" bgcolor="#D6D6D6" scope="row"><strong>Deductions</strong></th>
    <th width="100" bgcolor="#D6D6D6" scope="row"><strong>Amount(₹)</strong></th>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head1.'</th>
    <td align="left">'.round($one,0,PHP_ROUND_HALF_UP).'</td>
    <th align="left">PF</th>
    <td align="left">'.round($pf,0,PHP_ROUND_HALF_UP).'</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head2.'</th>
    <td align="left">'.round($two,0,PHP_ROUND_HALF_UP).'</td>
    <th align="left">ESI</th>
    <td align="left">'.round($esi,0,PHP_ROUND_HALF_UP).'</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head3.'</th>
    <td align="left">'.round($three,0,PHP_ROUND_HALF_UP).'</td>
    <th align="left">PT</th>
    <td align="left">'.round($pt,0,PHP_ROUND_HALF_UP).'</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head4.'</th>
    <td align="left">'.round($four,0,PHP_ROUND_HALF_UP).'</td>
    <th align="left">Other Deductions</th>
    <td align="left">'.$otherded.'</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head5.'</th>
    <td align="left">'.round($five,0,PHP_ROUND_HALF_UP).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head6.'</th>
    <td align="left">'.round($six,0,PHP_ROUND_HALF_UP).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head7.'</th>
    <td align="left">'.round($seven,0,PHP_ROUND_HALF_UP).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">'.$head8.'</th>
    <td align="left">'.round($eight,0,PHP_ROUND_HALF_UP).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">Variable Pay</th>
    <td align="left">'.$vapay.'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" bgcolor="#E3E3E8" scope="row">Total Earnings</th>
    <td bgcolor="#E3E3E8" align="left">'.round($gross,0,PHP_ROUND_HALF_UP).'</td>
    <th align="left" bgcolor="#E3E3E8">Total Deductions</th>
    <td bgcolor="#E3E3E8" align="left">'.round($totalded,0,PHP_ROUND_HALF_UP).'</td>
  </tr>
  <tr>
    <th align="left" bgcolor="#E3E3E8" scope="row">Net Pay</th>
    <td align="Left" colspan="3" bgcolor="#E3E3E8">'.round($net,0,PHP_ROUND_HALF_UP).'</td>
  </tr>
  <tr>
    <th align="left" bgcolor="#E3E3E8" scope="row">Net Pay (In Words)</th>
    <td align="left" colspan="3" bgcolor="#E3E3E8">'.$netpay_words.' only</td>
  </tr>
</table>';
$pdf->writeHTML($table, true, false, false, false, '');
//-------------------------------------------------------------------------------------------------------------
	$pdf->Ln();	
	$pdf->Ln();	

$pdf->Write(0, "NOTE: This is confidential information and you are advised not to share it with others,\n             This is a computer generated pay slip and does not require any signature", '', 0, 'L', true, 0, false, false, 0);
$pdf->lastPage();

				
		 

}
$pdf->Output('payslip.pdf', 'I');
	
	

	
?>