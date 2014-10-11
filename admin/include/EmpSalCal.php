<?php
function get_basic_pay($emp_id)
{
	$pay_type = check_pay_type($emp_id);
	$pay_name = check_structure($emp_id);
	$amount = check_pay_amount($pay_name);
	
	if($pay_type == 'Basic')
	{
		return $amount;
	}
	else if($pay_type == 'CTC')
	{
		$res = mysql_query("select value from  emp_pay_slab where slab_name = '$pay_name'");
		while($row=mysql_fetch_array($res)){
			$value = $row['value'];
		}
		
		$basic1 = $amount/12;
		$basic = round(($basic1 * $value)/100, 1);
		return $basic;
	}
	else
	{
		$res = mysql_query("select value from emp_pay_slab where slab_name = '$pay_name'");
		while($row=mysql_fetch_array($res))
			//$value = preg_replace("/[^a-zA-Z0-9]+/", "", $row['value']);
			
		$basic = round(($amount * $row['value'])/100,1);
		return $basic;
	}
}

function check_pay_type($emp_id)
{
	$sql	= "select pay_type from emp_pay_temp where emp_id = '$emp_id'";
	$result	= mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		while($row=mysql_fetch_array($result))
		{
			$pay_type = $row['pay_type'];
		}
	}
	else
		$pay_type = 'Basic';
	return $pay_type;
}

function check_structure($emp_id)
{
	$sql	= "select pay_slab from emp_pay_temp where emp_id = '$emp_id'";
	$result	= mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		while($row=mysql_fetch_array($result))
		{
			$pay_slab = $row['pay_slab'];
		}
	}
	else
		$pay_slab = 'slab1';
	return $pay_slab;
}

function check_pay_amount($pay_name)
{
	$sql	= "select amount from emp_pay_structure where slab_name = '$pay_name'";
	$result	= mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$pay_amnt = $row['amount'];
	}
	return $pay_amnt;
}

function getpay_details($pay_name)
{
	$sql	= "select table_name from emp_pay_structure where pay_name = '$pay_name'";
	$result	= mysql_query($sql);
	$count	= mysql_num_rows($result);
	while($row=mysql_fetch_array($result))
		$table_name = $row['table_name'];
	
	$sql	= "select * from $table_name";
	$result	= mysql_query($sql);
	while($row=mysql_fetch_array($result))
		$data[]=$row;
	return $data;
}

function get_gross_pay($emp_id)
{
	$pay_type = check_pay_type($emp_id);
	$pay_name = check_structure($emp_id);
	$amount = check_pay_amount($pay_name);
	
	if($pay_type == 'gross_pay')
	{
		return $amount;
	}
	else if($pay_type == 'CTC')
	{
		$gross_pay = round($amount/12,1);
		return $gross_pay;
	}
	else
	{
		$gross_pay = round($amount + ((300*$amount) / 100),1);
		return $gross_pay;
	}
}

function get_one_details($pay_name, $keyword)
{
	/*$sql	= "select table_name from emp_pay_structure where pay_name = '$pay_name'";
	$result	= mysql_query($sql);
	$count	= mysql_num_rows($result);
	while($row=mysql_fetch_array($result))
		$table_name = $row['table_name']; */
	
	$sql	= "select * from emp_pay_slab where slab_name = '$pay_name' and key_word = '$keyword'";
	$result	= mysql_query($sql);
	while($row=mysql_fetch_array($result))
		$data[]=$row;
	return $data;
}

function get_emp_pay_details($emp_id, $gross, $keyword)
{
	//$pay_type = check_pay_type($emp_id);
	$pay_name = check_structure($emp_id);
	
	$result = get_one_details($pay_name, $keyword);
	
	foreach($result as $row)
	{
		$field = $row['fields'];
		$value = $row['value'];
		$cal_from = $row['cal_from'];
	}
	if($cal_from == 'gross_pay')
	{
		//$gross_pay = get_gross_pay($emp_id);
		$hra1 = $value;
		//$hra2 = preg_replace("/[^a-zA-Z0-9]+/", "", $hra1);
		$hra = round(($hra1 * $gross) / 100,1);
	}
	else
	{
		$basic_pay = get_basic_pay($emp_id);
		$hra1 = $value;
		//$hra2 = preg_replace("/[^a-zA-Z0-9]+/", "", $hra1);
		$hra = round(($hra1 * $basic_pay) / 100,1);
	}
	return $hra;
}


function get_pf_details($emp_id, $gross, $who)
{
	$basic_pay = get_basic_pay($emp_id);
	$result = mysql_query("select epf_slab from emp_pay_temp where emp_id = '$emp_id'");
	$count	= mysql_num_rows($result);
	if($count>0){
	while($row=mysql_fetch_array($result))
		$pf_slab = $row['epf_slab'];
	}
	else
		$pf_slab = 'slab1';
	
	$pf11 = get_value_details($pf_slab, 'pf1');
	$pf1 = round(($pf11 * $basic_pay) / 100,1);
	$pf21 = get_value_details($pf_slab, 'pf2');
	$pf2 = round(($pf21 * $gross) / 100,1);

	$ac = get_value_details($pf_slab, 'ac');
	$ac11 = ($ac * ($pf1*2))/100;
	$acc21 = get_value_details($pf_slab, 'acc21');
	$ac21 = ($acc21 * ($pf1*2))/100;
	$acc22 = get_value_details($pf_slab, 'acc22');
	$ac22 = ($acc22 * ($pf1*2))/100;
	if($ac22 < 18)
			$ac22 = 18;
			
	if($who == 'EMPLOYEE'){
	$pf = $pf1 + $ac11 + $ac21 + $ac22;
	}else{
	$pf = $pf1 + $pf2 + $a11 + $ac21 + $ac22;
	}
	
	
	return $pf;
}

function get_value_details($slab_name, $keyword)
{
	//echo "select value from  pf_master where pay_name = '$slab_name' and key_word = '$keyword'";
	$result = mysql_query("select value from  pf_master where pay_name = '$slab_name' and key_word = '$keyword'");
	$count	= mysql_num_rows($result);
	if($count>0){
	while($row=mysql_fetch_array($result))
		$value = $row['value'];
	}
	return $value;
}


function get_esi_details($emp_id)
{
	
	$basic_pay = get_basic_pay($emp_id);
	//echo "select esi_slab from emp_pay_temp where emp_id = '$emp_id'";
	$result = mysql_query("select esi_slab from emp_pay_temp where emp_id = '$emp_id'");
	$count	= mysql_num_rows($result);
	if($count>0){
	while($row=mysql_fetch_array($result))
		$esi_slab = $row['esi_slab'];
	}
	else
		$esi_slab = 'slab1';
	$result = mysql_query("select * from  esi_master where pay_name = '$esi_slab'");
	//$result = mysql_query("select * from emp_esislab where slab_name = '$esi_slab'");
	$count	= mysql_num_rows($result);
	if($count>0){
	
		$cal_from = mysql_result($result, 0, 'cal_from');
	
		if($cal_from == 'gross_pay')
		{
			$gross = get_gross_pay($emp_id);
			$hra1 = mysql_result($result, 0, 'value');
			//$hra2 = preg_replace("/[^a-zA-Z0-9\/_|+ .-]/", "", $hra1);
			
			if($gross > mysql_result($result, 2, 'value'))
			{
				$esi1 = ($hra1 * $gross)/100;
			}
			else
			{
				$esi1 = 0;
			}
		}
		else
		{
			$gross = get_gross_pay($emp_id);
			$hra1 = mysql_result($result, 0, 'value');
			//$hra2 = preg_replace("/[^a-zA-Z0-9\/_|+ .-]/", "", $hra1);
			
			if($gross > mysql_result($result, 2, 'value'))
			{
				$esi1 = ($hra1 * $gross)/100;
			}
			else
			{
				$esi1 = 0;
			}
		}
	}
	
	//$esi = $esi1 + $esi2;
	return $esi1;
}

function get_pt_details($emp_id)
{
	$pay = get_basic_pay($emp_id);
	$pti = $pay * 6;
	$empl_c = 1095;
	switch($pti)
	{
		case 	($pti<=21000):
				$tax = 0;
				break;
		case	($pti>=21001 && $pti<=30000):
				$tax = 100;
				break;
		case	($pti >=30001 && $pti<=45000):
				$tax = 235;
				break;
		case	($pti>=45001 && $pti<=60000):
				$tax = 510;
				break;
		case	($pti>=60001 && $pti<=75000):
				$tax = 760;
				break;
		case	(75001>=$pti):
				$tax = 1095;
				break;
	}
	$net_tax = $empl_c + $tax;
	return $net_tax;
}

function CalNetPay($emp_id, $month)
{
	$pdays = GetPresentDaysEmp($emp_id, $month);
	$gross_pay = get_gross_pay($emp_id);
	$wdays = GetWorkingDays('March', $emp_id);
	$gross = ($gross_pay/$wdays) * $pdays ;
	
	$basic = (get_basic_pay($emp_id));
	$hra = get_emp_pay_details($emp_id, $gross, 'hra');
	$ca = get_emp_pay_details($emp_id, $gross, 'ca');
	$sa = get_emp_pay_details($emp_id, $gross, 'sa');
	$ea = get_emp_pay_details($emp_id, $gross, 'ea');
	$ma = get_emp_pay_details($emp_id, $gross, 'ma');
	$lta = get_emp_pay_details($emp_id, $gross, 'lta');

	$tot 	= $basic + $hra + $ca + $sa + $ea + $ma + $lta;
	
	$pf = round(get_pf_details($emp_id, $gross, 'EMPLOYEE'),1);
	$esi = round(get_esi_details($emp_id, $gross),1);
	$pt = round(get_pt_details($emp_id)/6,1);
	
	$totd	= $pf + $esi + $pt;
	$net 	= round($tot-$totd,1);
	
	return $net;
}

function formatInIndianStyle($num){
     $pos = strpos((string)$num, ".");
     if ($pos === false) {
        $decimalpart="00";
     }
     if (!($pos === false)) {
        $decimalpart= substr($num, $pos+1, 2); $num = substr($num,0,$pos);
     }

     if(strlen($num)>3 & strlen($num) <= 12){
         $last3digits = substr($num, -3 );
         $numexceptlastdigits = substr($num, 0, -3 );
         $formatted = makeComma($numexceptlastdigits);
         $stringtoreturn = $formatted.",".$last3digits.".".$decimalpart ;
     }elseif(strlen($num)<=3){
        $stringtoreturn = $num.".".$decimalpart ;
     }elseif(strlen($num)>12){
        $stringtoreturn = number_format($num, 2);
     }

     if(substr($stringtoreturn,0,2)=="-,"){
        $stringtoreturn = "-".substr($stringtoreturn,2 );
     }

     return $stringtoreturn;
 }

 function makeComma($input){ 
     if(strlen($input)<=2)
     { return $input; }
     $length=substr($input,0,strlen($input)-2);
     $formatted_input = makeComma($length).",".substr($input,-2);
     return $formatted_input;
 }

?>