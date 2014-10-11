<?php

//require_once ("config.php");

//finding perentage of two numbers int1 is number and int2 is what percentage
function percentage($int1,$int2)
			{
				$per = $int1/100;
				$res = $per * $int2;
				return $res;
			}

//finding earnings for appropriate days for given allowance $x is the allowance $y is the total days on the month $z is the days the employee worked in a month

function cal($x,$y,$z)
					{	
						$div = $x/$y;
						$mul = $div*$z;
						return $mul;
					}  


			
function GetDomainName($uname)
{
	$query = "select domain_name from company where primary_admin = '$uname'";
	$result = mysql_query($query);
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "domain_name");
	 }
	return $user_name;
}


function checkStatusLogin($table, $name, $pass)
{
	$searchquery = "select status from ".$table." where user_name = '".$name."' and user_pwd = '".$pass."'";
	$resquery = mysql_query($searchquery);	
	$count = mysql_num_rows($resquery);
	if($count>0)
		$response =  1;
	else
		$response =  0;
		
	return $response;
}

function randomPrefix($length)
{
	$random= "";
	srand((double)microtime()*1000000);
	$data = "0123456789";
	for($i = 0; $i < $length; $i++)
	{
	$random .= substr($data, (rand()%(strlen($data))), 1);
	}
	return $random;
}

function checkrandom($rand)
{
	 $randsql = "select * from emp_login where user_name='$rand'"; 
	 $randres = mysql_query($randsql);	
	 $rancount = mysql_num_rows($randres);
	 if($rancount>0)
	 {
	 	$ret = false;
	 }
	 else
	 {
	 $ret = true;
	 }
	 return $ret;  
}

function getDisplayName($username, $category)
{
	$sql = "select table_name from category where name = '$category'";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result))
    $data=$row['table_name'];
	
	$query = "select disp_name from $data where user_name = '$username'";
	$result = mysql_query($query);
	echo mysql_error();
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "disp_name");
	 }
	return $user_name;
}

function getAdminDisplayName($user_name)
{
	$query = "select disp_name from user_admin_login where user_name = '$user_name'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "disp_name");
	 }
	return $user_name;
}


function GetCompanyLogo($id)
{
	$query = "select logo from company_details where domain_name = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $logo= mysql_result($result,0, "logo");
	 }
	return $logo;
}

function GetCompanyCode($username)
{
	$query = "select company_code from company_admin where user_name = '$username'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "company_code");
	 }
	return $user_name;
}

function GetCompanyCodeFromEmpID($empId)
{
	$query = "select company_code from emp_details where emp_id = '$empId'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "company_code");
	 }
	return $user_name;
}

function GetEmployeePhoto($empId)
{
	$query = "select photo from emp_details where emp_id = '$empId'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "photo");
	 }
	return $user_name;
}

function GetDEOCompanyCode($username)
{
	$sql = "select deo_id from deo_login where user_name = '$username'";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result))
    $data=$row['deo_id'];
	
	$query = "select company_code from deo_details where deo_id = '$data'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "company_code");
	 }
	return $user_name;
}

function GetEmployeeDisplayName($username)
{
	$query = "select disp_name from emp_login where user_name = '$username'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "disp_name");
	 }
	return $user_name;
}

function GetDeoPassword($pwd)
{
	//include("include/encdec.php");
	$pass = convert($pwd,$key);
	return $pass;
}

function GetEmployeeStatus($stcode)
{
	$query = "select status_name from emp_status where status_code = '$stcode'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "status_name");
	 }
	 else
	 	$user_name= "";
	return $user_name;
}

function GetEmployeeStatusName($stname)
{
	$query = "select status_code from emp_status where status_name = '$stname'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "status_code");
	 }
	 else
	 	$user_name= "";
	return $user_name;
}

function GetDepartmentName($code)
{
	$query = "select dept_name from company_dept where dept_code = '$code'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $dept_name = mysql_result($result,0, "dept_name");
	 }
	 else
	 	$dept_name = "";
	return $dept_name;
}

function GetEmpBranchName($id)
{
	$query = "select emp_id, branch from  emp_comp_details where emp_id = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $user_name = mysql_result($result,0, "branch");
	 }
	return $user_name;
}

function GetDesignationName($code)
{
	$query = "select des_name from company_desg where des_code = '$code'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $des_name = mysql_result($result,0, "des_name");
	 }
	 else
	 	$des_name = "";
	return $des_name;
}

function GetDepartmentId($emp_id)
{
	$query = "select dept_code from emp_details where emp_id = '$emp_id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $dept_name = mysql_result($result,0, "dept_code");
	 }
	 else
	 	$dept_name = '';
	return $dept_name;
}

function GetDesignationId($emp_id)
{
	$query = "select desig_code from emp_details where emp_id = '$emp_id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $des_name = mysql_result($result,0, "desig_code");
	 }
	 else
	 	$des_name = '';
	return $des_name;
}

function GetDepartmentCode($name)
{
	$name = stripslashes($name);
	$query = "select dept_code from company_dept where dept_name = '$name'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $dept_name = mysql_result($result,0, "dept_code");
	 }
	 else
	 	$dept_name = "";
	return $dept_name;
}

function GetDesignationCode($name)
{
	$name = stripslashes($name);
	$query = "select des_code from company_desg where des_name = '$name'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $dept_name = mysql_result($result,0, "des_code");
	 }
	 else
	 	$dept_name = "";
	return $dept_name;
}

function GetLeaveCode($name)
{
	$query = "select leave_name from leave_type where leave_code = '$name'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $dept_name = mysql_result($result,0, "leave_name");
	 }
	return $dept_name;
}


function GetDetailsFromQuery($query)
{
	$result = mysql_query($query);
	$norows = mysql_num_rows($result);
	if($norows>0){
    while($row=mysql_fetch_array($result))
    $data[]=$row;
	}
	else
		$data = $norows;
	return $data;
}
function executeStatement($query)
{
	$result = mysql_query($query);
	return $result;
}
function curPageURL()
{ 
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
} 
function strleft($s1, $s2) 
{ 
	return substr($s1, 0, strpos($s1, $s2)); 
}
function getExtension($str)
{
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
function char_count($str)
{
	$stringlen = $str;
	$num_char = strlen($stringlen);
	if ($num_char <= 60)
	{
		$newstr = $stringlen;
	}
	else
	{
		$stringlen = substr($stringlen,0,65);
		$newstr = $stringlen . "...";
	}
	return $newstr;
}

function getEmployeIdPrefix()
{
	$query = "select emp_prefix from company_details";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $prefix= mysql_result($result,0, "emp_prefix");
	 }
	return $prefix;
}

function getEmployeIdFromName($name)
{
	$query = "select user_name from emp_login where disp_name = '$name'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $prefix= mysql_result($result,0, "user_name");
	 }
	return $prefix;
}

function GetLeaveEligibleEmployee($id)
{
	echo $query = "select leave_eligible, leave_eligible_routine from emp_paydetails where emp_id = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $le= mysql_result($result,0, "leave_eligible");
		 $ler = mysql_result($result,0, "leave_eligible_routine");
		 //$lea = $le.'&nbsp;days/'.$ler;
	 }
	return $le;
}

function CheckLeaveOPEmployee($id)
{
	$query = "select leave_remaining from emp_leave_status where emp_id = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 $le= mysql_result($result,0, "leave_remaining");
		 //$la= mysql_result($result,0, "leave_acquired");
	 }
	return $le;
}
function GetLeaveOPEmployee($id)
{
	$query = "select leave_acquired from emp_leave_status where emp_id = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	 if($rancount>0)
	 {
		 //$le= mysql_result($result,0, "leave_remaining");
		 $la= mysql_result($result,0, "leave_acquired");
	 }
	return $la;
}

function GetWorkingDays($month, $id)
{
	$query = "select working_days from emp_attendance where month = '$month' and emp_id = '$id'";
	$result = mysql_query($query);	
	$rancount = mysql_num_rows($result);
	if($rancount>0)
	{
		$le= mysql_result($result,0, "working_days");
	}
	else
		$le = 30;
	return $le;
}

function GetPresentDaysEmp($eid, $month)
{
	/*$sql = mysql_query("select working_day from working_days where month = '$month'");
	while($row=mysql_fetch_array($sql))
    $wdays=$row['working_day'];
	
	$sql1 = mysql_query("select * from emp_leave where emp_id = '$eid'");
	$count = mysql_num_rows($sql1); */
	//echo "select present_days from emp_attendance where emp_id = '$eid' and month = '$month'";
	$sql2 = mysql_query("select present_days from emp_attendance where emp_id = '$eid' and month = '$month'");
	$count2 = mysql_num_rows($sql2);
		if($count2 >0){
			while($row1=mysql_fetch_array($sql2))
		    $pdays=$row1['present_days'];
		}else{
			$pdays = 28;
		}
	return $pdays;
}

function getPayStructure($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select pay_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "pay_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getESIStructure($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select esi_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "esi_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getEPFStructure($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select epf_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "epf_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getPTStructure($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select pt_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "pt_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getOTStructure($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select ot_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "ot_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getLeaveSlab($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select leave_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "leave_slab");
	}
	else
		$slab = '';
	return $slab;
}

function getOTSlab($eid)
{
	//echo "select * from emp_pay_temp where emp_id = '$eid'" ;
	$sql = mysql_query("select ot_slab from emp_pay_temp where emp_id = '$eid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$slab = mysql_result($sql,0, "ot_slab");
	}
	else
		$slab = '';
	return $slab;
}


function check_pay_type11($pay_name)
{
	$sql	= "select pay_type from emp_pay_structure where slab_name = '$pay_name'";
	$result	= mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
		$pay_type = $row['pay_type'];
	}
	return $pay_type;
}

function GetEmployeeSalaryPayType($id)
{
	$sql = mysql_query("select pay_type from  emp_pay_temp where emp_id = '$id'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$ptype = mysql_result($sql,0, "pay_type");
	}
	return $ptype;
}

function CheckEmpPayStatusReport($id, $month, $year)
{
	$sql = mysql_query("select * from emp_paygen where emp_id = '$id' and pay_month = '$month' and pay_year = $year");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "pay_status");
		return $status;
	}
	else
		return 'Not Paid';
}

function chck_pay_status($month)
{
	$sql = mysql_query("select * from payroll_status where pay_month = '$month'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "status");
		return $status;
	}
	else
		return 'No';
}

function getLeaveSlabName($rid)
{
	$sql = mysql_query("select slab_name from leave_master where id=$rid");
	$pay_name = mysql_result($sql,0,'slab_name');
	return $pay_name;
}
function getOTSlabName($rid)
{
	$sql = mysql_query("select slab_name from ot_master where id=$rid");
	$pay_name = mysql_result($sql,0,'slab_name');
	return $pay_name;
}

function getPaySlabValue($sname, $keyword)
{
	$sql = mysql_query("select value from  emp_pay_slab2 where slab_name= '$sname' and key_word = '$keyword'");
	$value = mysql_result($sql,0,'value');
	return trim($value);
}

function GetPfmasterField($keyword)
{
	$sql = mysql_query("select field from pf_master where key_word = '$keyword'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "field");
		return $status;
	}
}

function GetEsimasterField($keyword)
{
	$sql = mysql_query("select field from esi_master where key_word = '$keyword'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "field");
		return $status;
	}
}

function GetEsimasterCalFrom($keyword)
{
	$sql = mysql_query("select cal_from from esi_master where key_word = '$keyword'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "cal_from");
		return $status;
	}
}

function GetEmpLoginStatus($uid)
{
	$sql = mysql_query("select status from  emp_login where user_name = '$uid'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "status");
	}
	return $status;
}

function GetCompanyName($code)
{
	//echo "select name from company where domain_name = '$code'";
	$sql = mysql_query("select name from company where domain_name = '$code'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "name");
	}
	return $status;
}

function GetCompanyAdminUserName($code)
{
	$sql = mysql_query("select primary_admin from company where domain_name = '$code'");
	$count = mysql_num_rows($sql);
	if($count>0)
	{
		$status = mysql_result($sql,0, "primary_admin");
	}
	return $status;
}







/********************************* image crop function **************************************************/


function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
			case 'image/jpg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees up memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}
	  
}

function convert_digit_to_words($no)  //taking number as parameter
{   

//creating array  of word for each digit
 $words = array('00'=> 'Zero', '0'=> 'Zero' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fourteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'forty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
 
 
 //for decimal number taking decimal part
 
$cash=(int)$no;  //take number wihout decimal
$decpart = $no - $cash; //get decimal part of number

$decpart=sprintf("%01.2f",$decpart); //take only two digit after decimal

$decpart1=substr($decpart,2,1); //take first digit after decimal
$decpart2=substr($decpart,3,1);   //take second digit after decimal  

$decimalstr='';

//if given no. is decimal than  preparing string for decimal digit's word

if($decpart>0)
{
 $decimalstr.="and ".$words[$decpart1.$decpart2].' paisa';//." ".$words[$decpart2];
}
 
    if($no == 0)
        return ' ';
    else {
    $novalue='';
    $highno=$no;
    $remainno=0;
    $value=100;
    $value1=1000;       
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }       
          if(array_key_exists("$highno",$words))  //check if $high value is in $words array
              return $words["$highno"]." ".$novalue." ".convert_digit_to_words($remainno).$decimalstr;  //recursion
          else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".convert_digit_to_words($remainno
             ).$decimalstr; //recursion
           }
    }
}

/*
function getMonthlyLeave($eid, $cid)
{
	$result = GetDetailsFromQuery("select * from  emp_leave where company_code = '$ccode' and emp_id = '$emp1_id' order by id desc");
	$result = GetDetailsFromQuery("select * from  emp_leave where company_code = '$ccode' and emp_id = '$emp1_id' order by id desc");
}
*/



/************************************    ENCRYPTION AND DECRYPTIONS ****************************************/
function encrypt_decrypt($action, $string) {
   $output = false;

   $key = 'My strong random secret key';

   // initialization vector 
   $iv = md5(md5($key));

   if( $action == 'encrypt' ) {
       $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
       $output = base64_encode($output);
   }
   else if( $action == 'decrypt' ){
       $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
       $output = rtrim($output, "");
   }
   return $output;
}


function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}



?>