<script language="javascript" type="text/javascript" src="../scripts/script.js"></script>
<?php
error_reporting();
include_once("../include/config.php");
include("../include/functions.php");
if(($_GET['id']) && ($_GET['id']!= ''))
{
	$eid = $_GET['id']; 
	$result = GetDetailsFromQuery("select * from emp_login where user_name = '$eid'");
	
	echo '<table class="table table-striped bootstrap-datatable datatable">';
	if(count($result)>0){ foreach($result as $row){ 
	echo '<tr>';
	echo '<td>Employee Id</td>';
    $eid = $row['user_name'] ;
	echo '<td> : '.$eid.'</td>';
	echo '<input type="hidden" name="emp_id" id="emp_id" value="'.$eid.'" />';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td>Employee Name</td>';
	echo '<td> : '.$row['disp_name'].'</td>';
    echo '</tr>';
	
	echo '<tr>';
	echo '<td>Current Slab</td>';
	$sb = getPayStructure($row['user_name']);
	echo '<td> : '.$sb.'</td>';
	echo '</tr>';
	
	
	$result11 =  mysql_query("select slab_name from emp_pay_structure order by id asc");
	echo '<tr>';
	echo '<td>Update Pay Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result11); $i++)
	{
		$pay_name = mysql_result($result11, $i, 'slab_name');
		if($sb == $pay_name){
			echo "<input type='radio' name='slab1' id='slab1' value='$pay_name' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab1' id='slab1' value='$pay_name' />";
		}
		echo $pay_name .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	
	$result12 =  mysql_query("select pay_name from esi_master group by pay_name");
	$sa = getESIStructure($row['user_name']);
	echo '<tr>';
	echo '<td>Update ESI Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result12); $i++)
	{
		$pay_name1 = mysql_result($result12, $i, 'pay_name');
		if($sa == $pay_name1){
			echo "<input type='radio' name='slab2' id='slab2' value='$pay_name1' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab2' id='slab2' value='$pay_name1' />";
		}
		echo $pay_name1 .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	
	$result13 =  mysql_query("select pay_name from pf_master group by pay_name");
	$sc = getEPFStructure($row['user_name']);
	echo '<tr>';
	echo '<td>Update EPF Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result13); $i++)
	{
		$pay_name2 = mysql_result($result13, $i, 'pay_name');
		if($sc == $pay_name2){
			echo "<input type='radio' name='slab3' id='slab3' value='$pay_name2' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab3' id='slab3' value='$pay_name2' />";
		}
		echo $pay_name2 .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	
	$result14 =  mysql_query("select slab_name from emp_ptslab group by slab_name");
	$sd = getPTStructure($row['user_name']);
	echo '<tr>';
	echo '<td>Update PT Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result14); $i++)
	{
		$pay_name4 = stripslashes(mysql_result($result14, $i, 'slab_name'));
		if($sd == $pay_name4){
			echo "<input type='radio' name='slab4' id='slab4' value='$pay_name4' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab4' id='slab4' value='$pay_name4' />";
		}
		echo $pay_name4 .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	
	
	$result15 =  mysql_query("select slab_name from emp_leave_slab group by slab_name");
	$se = getLeaveSlab($row['user_name']);
	echo '<tr>';
	echo '<td>Update Leave Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result15); $i++)
	{
		$pay_name5 = mysql_result($result15, $i, 'slab_name');
		if($se == $pay_name5){
			echo "<input type='radio' name='slab5' id='slab5' value='$pay_name5' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab5' id='slab5' value='$pay_name5' />";
		}
		echo $pay_name5 .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	$result18 =  mysql_query("select slab_name from emp_ot_slab group by slab_name");
	$so = getOTStructure($row['user_name']);
	echo '<tr>';
	echo '<td>Update OT Slab </td>';
	echo '<td>';
	for($i=0; $i<mysql_num_rows($result18); $i++)
	{
		$pay_name8 = mysql_result($result18, $i, 'slab_name');
		if($so == $pay_name8){
			echo "<input type='radio' name='slab6' id='slab6' value='$pay_name8' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab6' id='slab6' value='$pay_name8' />";
		}
		echo $pay_name8 .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	}
	}
	echo '</table>';
	
	echo '<table><tr><td>&nbsp;</td><td><a class="btn btn-success" id="PayStrUpdate"><i class="icon-edit icon-white"></i> &nbsp;Update</a></td></<tr></table>';
}
?>