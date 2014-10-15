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
	echo '<td width="30%">Employee Id</td>';
    $eid = $row['user_name'] ;
	echo '<td> : '.$eid.'</td>';
	echo '<input type="hidden" name="emp_id" id="emp_id" value="'.$eid.'" />';
	echo '</tr>';
	
	echo '<tr>';
	echo '<td>Employee Name</td>';
	echo '<td> : '.$row['disp_name'].'</td>';
    echo '</tr>';
	
	echo '<tr>';
	echo '<td>Current Branch</td>';
	$sb = GetEmpBranchName($row['user_name']);
	echo '<td> : '.$sb.'</td>';
	echo '</tr>';
	
	
	$result11 =  mysql_query("select * from company_branch order by id asc");
	echo '<tr>';
	echo '<td>Update to '.mysql_num_rows($result11).'</td>';
	echo ': <td>';
	for($i=0; $i<mysql_num_rows($result11); $i++)
	{
		$branch = mysql_result($result11, $i, 'branch_name');
		if($sb == $branch){
			echo "<input type='radio' name='slab1' value='$branch' checked='checked' />";
		}else{
			echo "<input type='radio' name='slab1' value='$branch' />";
		}
		echo $branch .'&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	echo '</td>';
	
	echo '</tr>';
	
	echo '<tr>';
	echo '<td>&nbsp;</td>';
	echo '<td><a class="btn btn-success" id="EmpLocUpdate"><i class="icon-edit icon-white"></i> &nbsp;Update</a></td>';
	echo '</tr>';
	
	
	}
	}
	echo '</table>';
}
?>