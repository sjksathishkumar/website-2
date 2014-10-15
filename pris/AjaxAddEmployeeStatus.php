<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

	
	if(isset($_POST['type']))
	{
		if($_POST['type'] == 'dept'){
			$delid = htmlspecialchars(trim($_POST['delid']));
			
			if($delid != '') {
				
				/*$query = "select dept_code from company_dept where id= $delid";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				$data = $row['dept_code'];*/
				$insert = mysql_query("delete from employee_status where id= $delid");
				//$insert1 = mysql_query("delete from departments where dept_code='$data'");
				echo mysql_error();
				if($insert){ echo 'Success';}
			}
		}
		/*if($_POST['type'] == 'update')
		{
			$code = htmlspecialchars(trim($_POST['code']));
			$dept = htmlspecialchars(trim($_POST['dept']));
			
			if(($code != '') && ($dept!= '')){
			
			$insert = executeStatement("insert into company_dept (company_code, dept_code) values ('$code', '$dept')");
			if($insert){ echo 'Success';}
			}
		}*/
		if($_POST['type'] == 'create')
		{
			//$code = htmlspecialchars(trim($_POST['code']));
			$dept = htmlspecialchars(trim($_POST['mdata']));
			
			$dept1 = strtolower($dept);
			if($dept!= ''){
			
			$query = "select * from employee_status where status_name = '$dept1'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count>0)
			{
				echo 'Error';
			}
			else
			{		
				$query1 = "select * from employee_status order by id desc limit 1";
				$result1 = mysql_query($query1);
				if(mysql_num_rows($result1)>0)
				{
					while($row = mysql_fetch_array($result1))
					$data = $row['status_code'];
					$n = str_split($data,3);
					$n[1] = $n[1]+1;
					$status_code1 = $n[0].$n[1];
					///print($n[1]);
				}
				else
				{
					$status_code1 = "DPT1";
				}
				
				
				
				//$insert = executeStatement("insert into departments (dept_code, dept_name) values ('$dept_code1', '$dept')");
				$insert = executeStatement("insert into employee_status (status_name, status_code) values ('$dept', '$status_code1')");
				if($insert){ 
					//$resEmp1 = GetDetailsFromQuery("select * from company_dept order by id desc LIMIT 1");
					$resEmp1 = GetDetailsFromQuery("select * from employee_status order by id desc LIMIT 1");
					$result = mysql_query("select * from employee_status");
					$rows = mysql_num_rows($result);
				?>
                    
                    <?php if($resEmp1>0){ foreach($resEmp1 as $data){ ?>
                    <tr class="" id="del_<?php echo $data['id'];?>">
                    <td class="center"><?php echo $rows;?></td>
                    <?php
                            echo '<td>'.$data['status_code'].'</td>';
                            echo '<td>'.$data['status_name'].'</td>';
							echo '<td>
									<i class="icon-edit"></i>&nbsp;<a href="#" class="editbox" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
									<i class="icon-trash"></i>&nbsp;<a href="#" id="DelStatus" name="'.$data['id'].'">Delete</a>
        			  			  </td>';
                    ?>
                    </tr>
                    <?php } } ?>
				
				<?php }
				}
			}
		}
		
		if($_POST['type'] == 'edit')
		{
			$id = htmlspecialchars(trim($_POST['id']));
			$dept = htmlspecialchars(trim($_POST['dept']));
			$mcode = htmlspecialchars(trim($_POST['mcode']));
			
			if(($id != '') && ($dept!= '')){
			$dept1 = strtolower($dept);
			$query = "select * from employee_status where status_name = '$dept1'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count>0)
			{
				$old_name = mysql_result($result, 0, 'status_name');
				if($old_name == $dept)
				{
					$insert = executeStatement("update employee_status set status_name='$dept' where id = $id");
					if($insert){ echo $dept;}
					//}
				}
				else
				{
					echo 'Error';
				}
			}
			else
			{
				$insert = executeStatement("update employee_status set status_name='$dept' where id = $id");
				if($insert)
					echo $dept;
			}
		}
	}
}
?>