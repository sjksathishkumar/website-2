<?php 
sleep(5); 
error_reporting();
include_once("include/config.php");
include ("include/functions.php");
session_start();
ini_set('max_execution_time',120);
include('tcpdf/tcpdf.php');
$name = "SELECT * FROM emp_payslip LIMIT 0,1"; //selecting header files
		
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
		
		
					 $value = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];

                        if($value[0] == January)
						{$retrieve = "SELECT * FROM jan WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == February){$retrieve = "SELECT * FROM feb WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == March){$retrieve = "SELECT * FROM march WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == April){$retrieve = "SELECT * FROM april WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == May){$retrieve = "SELECT * FROM may WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == June){$retrieve = "SELECT * FROM june WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == July){$retrieve = "SELECT * FROM july WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == August){$retrieve = "SELECT * FROM august WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == September){$retrieve = "SELECT * FROM september WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == October){$retrieve = "SELECT * FROM october WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == November){$retrieve = "SELECT * FROM november WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == December){$retrieve = "SELECT * FROM december WHERE month='$value[0]' AND year='$year[0]'";}
$val = mysql_query($retrieve);




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
		$mail=$rows['mail_id']; 
		//$mail='tinfcadyar@gmail.com';
		
		$ded = "SELECT * FROM emp_details WHERE `emp_id`= '$emp_id' LIMIT 0,1";
		$newded = mysql_query($ded) or die (mysql_error())	;
		$ddd = mysql_fetch_assoc($newded);
		$desig = $ddd['desig'];
		$dept = $ddd['dpt_name'];
		$pfno = $ddd['pf'];
		$bankac = $ddd['bank_ac'];
		$netpay=round($net,0,PHP_ROUND_HALF_UP);
		$netpay_words=convert_number_to_words($netpay);	

	$pdf = new TCPDF('P', PDF_UNIT,'A4', true, 'UTF-8', false);	
	$pdf->setFontSubsetting(false);

	$pdf->SetHeaderData('MBSlogo.png',22,$companyhead,"No:233,Kutchery Road \n Mylapore,Chennai-600004\nPhone:044-24641599");
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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

			$fileatt = $pdf->Output('payslip.pdf', 'E');
			$data = chunk_split($fileatt);
			$fileatt_type = "pdf/type.pdf";
			$fileatt_name = "Payslip.pdf";
			$email_from = "no-reply@basspris.com";
			$email_subject = "Payslip";
			$email_message = 'HI,<br /><br />Check Your Pay Slip<br>';
			$email_message .= "<br /><br />Thanks & Regards<br>";
			$email_message .= "<br /><br />Admin<br>";
			$email_to =$mail; 
			$headers = "From: ".$email_from;
			
			$semi_rand = md5(time());
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			$headers .= "\nMIME-Version: 1.0\n" .
			'X-Mailer: PHP/' . phpversion() . "\r\n" .
			"Content-Type: multipart/mixed;\n" .
			" boundary=\"{$mime_boundary}\"";
			$email_message .= "This is a multi-part message in MIME format.\n\n" .
			"--{$mime_boundary}\n" .
			"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
			"Content-Transfer-Encoding: 7bit\n\n" .
			$email_message .= "\n\n";
			$email_message .= "--{$mime_boundary}\n" .
			"Content-Type: {$fileatt_type};\n" .
			" name=\"{$fileatt_name}\"\n" .
			"Content-Disposition: attachment;\n" .
			" filename=\"{$fileatt_name}\"\n" .
			"Content-Transfer-Encoding: base64\n\n" .
			$data .= "\n\n" . "--{$mime_boundary}--\n";
			$ok = @mail($email_to, $email_subject, $email_message, $headers);
			
							
				
}

if($ok)
				{
				echo '<script type="text/javascript">';
				echo "window.alert('Mail Sent.');";
				echo "window.location.href = 'EmployeeViewpayroll.php';";
				echo "</script>";
				exit;					
				
				}
			else
				{
				echo '<script type="text/javascript">';
				echo "window.alert('Mail could not be Sent.Please Try again Later');";
				echo "window.location.href = 'EmployeeViewpayroll.php';";
				echo "</script>";
				exit;
				}
?>