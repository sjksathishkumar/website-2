<?php
error_reporting();
include_once("../include/config.php");
include("../include/functions.php");
if(($_GET['id']) && ($_GET['id']!= ''))
{
	$eid = $_GET['id']; 
	
	include('../include/EmpSalCal.php'); 
	
	$result = GetDetailsFromQuery("select * from emp_login where user_name = '$eid'");
	echo '<table class="table table-striped bootstrap-datatable datatable">';
   	if(count($result)>0){ foreach($result as $row){ 
	echo '<tr>';
	echo '<td width="50%"><strong>Employee Id</strong></td>';
    echo '<td> : '.$row['user_name'].'</td>';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td><strong>Employee Name</strong></td>';
	echo '<td> : '.$row['disp_name'].'</td>';
    echo '</tr>';
	
	$pay_type = GetEmployeeSalaryPayType($eid);
	$sql = mysql_query("select * from emp_pay_temp where emp_id = '$eid'");
	//$count = mysql_num_rows($sql);
	while($row=mysql_fetch_array($sql))
    $data=$row['pay_slab'];
	
	$result = mysql_query("select * from emp_pay_structure where pay_name = '$data'");
	$count = mysql_num_rows($result);
	if($count>0)
	{
		$table_name = mysql_result($result,0, "table_name");
		$pay_name =  mysql_result($result,0, "pay_name");
		$pay_type =  mysql_result($result,0, "pay_type");
	}
	
	$resEmp = mysql_query("select * from $table_name");
	$count11 = mysql_num_rows($resEmp);
	echo '<tr>';
	echo '<td><strong>Name of Structure</strong></td>';
	echo '<td> : '.$pay_name.'</td>';
    echo '</tr>';
	
	echo '<tr>';
	echo '<td><strong>Type of Structure</strong></td>';
	echo '<td> : '.$pay_type.'&nbsp;&nbsp;&nbsp;[&nbsp;'.get_basic_pay($eid).'&nbsp;]</td>';
    echo '</tr>';
	
	$pdays = GetPresentDaysEmp($eid, 'March');
	$gross_pay = get_gross_pay($eid);
	$wdays = GetWorkingDays('March', $eid);
	$gross = ($gross_pay/$wdays) * $pdays ;
								
	for($i=0; $i<$count11; $i++)
	{
		echo '<tr>';
		echo '<td><strong>'.mysql_result($resEmp, $i, 'fields').'</strong></td>';
		
		$key_word = mysql_result($resEmp, $i, 'key_word');
		if($key_word == 'esi1' || $key_word == 'esi2'){
		echo '<td> : '.mysql_result($resEmp, $i, 'value').'&nbsp;from&nbsp;'.mysql_result($resEmp, $i, 'cal_from').'&nbsp;&nbsp;&nbsp;[&nbsp;'.round(get_esi_details($eid, $gross),1).'&nbsp;]</td>';
		}else if($key_word == 'pf1' || $key_word == 'pf2'){
			echo '<td> : '.mysql_result($resEmp, $i, 'value').'&nbsp;from&nbsp;'.mysql_result($resEmp, $i, 'cal_from').'&nbsp;&nbsp;&nbsp;[&nbsp;'.round(get_pf_details($eid, $gross, 'EMPLOYEE'),1).'&nbsp;]</td>';
		}else {
			echo '<td> : '.mysql_result($resEmp, $i, 'value').'&nbsp;from&nbsp;'.mysql_result($resEmp, $i, 'cal_from').'&nbsp;&nbsp;&nbsp;[&nbsp;'.get_emp_pay_details($eid, $gross, $key_word).'&nbsp;]</td>';
		}
		
		
		echo '</tr>';
	}
	
	} }
	echo '</table>';
	
    
}
?>