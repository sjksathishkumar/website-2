<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

	
	if(isset($_POST['type']))
	{
		if($_POST['type'] == 'delete'){
			$delid = htmlspecialchars(trim($_POST['delid']));
			
			if($delid != '') {
				
				$insert = mysql_query("delete from company_desg where id= $delid");
				
				echo mysql_error();
				if($insert){ echo 'Success';}
			}
		}
		/*if($_POST['type'] == 'update')
		{
			$code = htmlspecialchars(trim($_POST['code']));
			$dept = htmlspecialchars(trim($_POST['desg']));
			
			if(($code != '') && ($dept!= '')){
			
			$insert = executeStatement("insert into company_desg (company_code, des_code) values ('$code', '$dept')");
			if($insert){ echo 'Success';}
			}
		}*/
		if($_POST['type'] == 'create')
		{
			//$code = htmlspecialchars(trim($_POST['code']));
			$dept = htmlspecialchars(trim($_POST['mdata']));
			
			$dept1 = strtolower($dept);
			if($dept!= ''){
			
			$query = "select * from company_desg where des_name = '$dept1'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count>0)
			{
				echo 'Error';
			}
			else
			{		
				$query1 = "select des_code from company_desg order by id desc limit 1";
				$result1 = mysql_query($query1);
				if(mysql_num_rows($result1)>0)
				{
					while($row = mysql_fetch_array($result1))
					$data = $row['des_code'];
					$n = str_split($data,4);
					$n[1] = $n[1]+1;
					$dept_code1 = $n[0].$n[1];
					///print($n[1]);
				}
				else
				{
					$dept_code1 = "DESG1";
				}
				
				$insert = executeStatement("insert into company_desg (des_name, des_code) values ('$dept', '$dept_code1')");
				if($insert){ 
				$resEmp1 = GetDetailsFromQuery("select * from company_desg order by id desc Limit 1");
				$result = mysql_query("select * from company_desg");
					$rows = mysql_num_rows($result);
				?>
                <?php if($resEmp1>0){ foreach($resEmp1 as $data){ ?>
                    <tr class="" id="del_<?php echo $data['id'];?>">
                    <td class="center"><?php echo $rows;?></td>
                    <?php
                            echo '<td>'.$data['des_code'].'</td>';
                            echo '<td>'.$data['des_name'].'</td>';
							echo '<td>
									<i class="icon-edit"></i>&nbsp;<a href="#" class="editbox" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
									<i class="icon-trash"></i>&nbsp;<a href="#" id="DelDesg" name="'.$data['id'].'">Delete</a>
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
			
			if(($mcode != '') && ($dept!= '')){
			
			$dept1 = strtolower($dept);
					
			$query = "select * from company_desg where des_name = '$dept1'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count>0)
			{
				$old_name = mysql_result($result, 0, 'des_name');
				if($old_name == $dept)
				{
					$insert = executeStatement("update company_desg set des_name = '$dept' where id = $id");
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
				$insert = executeStatement("update company_desg set des_name = '$dept' where id = $id");
				if($insert){ echo $dept;}
				}
			}
		}
		
	}
?>