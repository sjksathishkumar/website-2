<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

	
	if(isset($_POST['type']))
	{
		if($_POST['type'] == 'delete'){
			$delid = htmlspecialchars(trim($_POST['delid']));
			
			if($delid != '') {
				$insert = mysql_query("delete from company_branch where id= $delid");
				echo mysql_error();
				if($insert){ echo 'Success';}
			}
		}
		
		if($_POST['type'] == 'create')
		{
			$dept = htmlspecialchars(trim($_POST['mdata']));
			
			$dept1 = strtolower($dept);
			if($dept != ''){
			
			$query = "select * from company_branch where branch_name = '$dept1'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count>0)
			{
				echo 'Error';
			}
			else
			{		
				$query = "select branch_code from company_branch order by branch_code desc limit 1";
				$result = mysql_query($query);
				if(mysql_num_rows($result)>0)
				{
					while($row = mysql_fetch_array($result))
					$data = $row['branch_code'];
					$n = str_split($data,2);
					$n[1] = $n[1]+1;
					$dept_code1 = $n[0].$n[1];
				}
				else
				{
					$dept_code1 = "BR1";
				}
				//print($n[1]);
				$insert = executeStatement("insert into company_branch (branch_code, branch_name) values ('$dept_code1', '$dept')");
				//$insert = executeStatement("insert into company_dept (company_code, dept_code) values ('$code', '$dept_code1')");
				if($insert){ 
					$resEmp1 = GetDetailsFromQuery("select * from company_branch order by id desc LIMIT 1");
					$result = mysql_query("select * from company_branch");
					$rows = mysql_num_rows($result);
				?>
                    
                    <?php if($resEmp1>0){ foreach($resEmp1 as $data){ ?>
                    <tr class="" id="del_<?php echo $data['id'];?>">
                    <td class="center"><?php echo $rows;?></td>
                    <?php
                            echo '<td>'.$data['branch_code'].'</td>';
                            echo '<td>'.$data['branch_name'].'</td>';
							echo '<td>
									<i class="icon-edit"></i>&nbsp;<a href="#" class="editbox" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
									<i class="icon-trash"></i>&nbsp;<a href="#" id="DelBranch" name="'.$data['id'].'">Delete</a>
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
				$query = "select * from company_branch where branch_name = '$dept1'";
				$result = mysql_query($query);
				$count = mysql_num_rows($result);
			if($count>0)
			{
				$old_name = mysql_result($result, 0, 'branch_name');
				if($old_name == $dept)
				{
					$insert = executeStatement("update company_branch set branch_name='$dept' where id = $id");
					if($insert)
						echo $dept;
				}
				else
				{
					echo 'Error';
				}
			}
			else
			{
				$insert = executeStatement("update company_branch set branch_name='$dept' where id = $id");
				if($insert){ echo $dept;}
				}
			}
		}
	}
?>