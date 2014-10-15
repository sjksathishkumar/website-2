<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");
include('include/EmpSalCal.php');
//sleep(3);
	if(isset($_POST['type']))
	{
		
		$type = $_POST['type'];
		if($type == 'claim'){
			
			$sql = GetDetailsFromQuery("select * from claim_request order by id desc"); ?>
			
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
	        <thead>
                <tr>
                  <th>Employee Id</th>
                  <th>Employee Name</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
           </thead>
           <tbody>
           	<?php if($sql>0){ foreach($sql as $data){ ?>	
                <tr>
                	<td><?php echo $data['emp_id'];?></td>
                    <td><?php echo GetEmployeeDisplayName($data['emp_id']);?></td>
                    <td><?php echo $data['type'];?></td>
                    <td id="req_amnt"><?php echo $data['amount'];?></td>
                    <td><?php echo $data['date'];?></td>
                    <td><?php echo $data['description'];?></td>
                    
                                  
                    
                    
                    <td><a href="Company/ajax_claim_pending.php" name="<?php echo $data['claim_id'];?>" class="claimres2">Pending</a> | <a href="Company/ajax_claim_rejection.php" class="claimres1" name="<?php echo $data['claim_id'];?>">Reject</a> | <a href="Company/ajax_claim_approved.php?id=<?php echo $data['claim_id'];?>" name="<?php echo $data['claim_id'];?>" class="claimres3">Approve</a></td>
                </tr>
                <?php } }else { echo '<tr><td colspan="7">There is no notification to show....</td></tr>'; }?>
           </tbody>
           </table>
	<?php	}
		
		else if ($type == 'claimreject'){
			$rowid = htmlspecialchars(trim($_POST['id']));
			$descr = htmlspecialchars(trim($_POST['descr']));
			if($rowid != '')
			{
				$query = executeStatement("update emp_claims set claim_status = 'rejected', description = '$descr' where id = $rowid");
				echo mysql_error();
				if($query){
					$query1 = executeStatement("delete from claim_request where id = $rowid");
					echo 'Success';
				}
			}
		}
		
		else if ($type == 'claimpending'){
			$rowid = htmlspecialchars(trim($_POST['id']));
			$descr = htmlspecialchars(trim($_POST['descr']));
			$promonth = htmlspecialchars(trim($_POST['promonth']));
			if($rowid != '')
			{
				$sql = GetDetailsFromQuery("select * from claim_request where id = $rowid");
				if($sql>0){ foreach($sql as $data){
				$empid = $data['emp_id'];
				//$ccode = GetCompanyCodeFromEmpID($empid);
				$month = date('M-Y', strtotime($data['date']));
				$amount = $data['amount'];
				}}

				//$promonth = date('M-Y');
				
				$query = executeStatement("update emp_claims set claim_status = 'pending', claim_pro_month = '$promonth', description = '$descr' where id = $rowid");
				echo mysql_error();
				if($query){
					//$query1 = executeStatement("delete from claim_request where id = $rowid");
					echo 'Success';
				}
			}
		}
		else if ($type == 'claimapproved'){
			$rowid = htmlspecialchars(trim($_POST['id']));
			$descr = htmlspecialchars(trim($_POST['descr']));
			$promonth = htmlspecialchars(trim($_POST['promonth']));
			$amount = htmlspecialchars(trim($_POST['amount']));
			if($rowid != '')
			{
				$sql = GetDetailsFromQuery("select * from emp_claims where id = $rowid");
				if($sql>0){ foreach($sql as $data){
				$empid = $data['emp_id'];
				//$ccode = GetCompanyCodeFromEmpID($empid);
				$month = $data['claim_month'];
				//$amount = $data['amount'];
				}}
				
				$promonth = substr($promonth, 0, 3);
				$promonth1 = $promonth .'-'. date('Y');
				$query = executeStatement("update emp_claims set claim_status = 'pending', app_amount = $amount, claim_pro_month = '$promonth1', description = '$descr', claim_status='approved' where id = $rowid");
				echo mysql_error();
				if($query){
					$query1 = executeStatement("delete from claim_request where id = $rowid");
					echo 'Success';
				}
			}
		}
		else if($type == 'empnotify'){ 
			$rowid = htmlspecialchars(trim($_POST['id']));
			$sql = GetDetailsFromQuery("select * from emp_notification where status = 'posted' and emp_id = '$rowid'"); ?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
           	<?php if($sql>0){ foreach($sql as $data){ ?>	
                <tr id="remove_<?php echo $data['id'];?>">
                	<td><?php echo $data['content'];?><a href="#" id="EmpNotiUpdate" name="<?php echo $data['id'];?>" style="float:right;">Remove</a></td>
                </tr>
                <?php } }else { echo '<tr><td colspan="7">There is no notification to show....</td></tr>'; }?>
           </table>
		<?php }
		
		else if($type == 'EmpNotiUpdate'){ 
			$rowid = htmlspecialchars(trim($_POST['rowid']));
			$valid = executeStatement("update emp_notification set status='opened' where id=$rowid");
			if($valid)
				echo 'Success';
			
			}
		
		
		
		
		
		else if($type == 'postnotify'){
			
			$j  = 0;
			foreach($_POST as $key => $value)
			{
				$arr[$j] = $value; 
				$j++;
			}
			
			print_r($arr);
			
			if(($arr[4]=='null') && ($arr[5]=='null') && ($arr[6]=='null'))
			{
				echo "Error !!!";
			}
			else
			{
				if($arr[4]!='null')
				{
					$pieces = explode(",", $arr[4]);
					
					if(in_array('All Employee', $pieces))
					{
						$sql = GetDetailsFromQuery("select user_name from emp_login order by id desc");
							if(count($sql)>0)
							{
								foreach($sql as $data)
								{
									$empid = $data['user_name'];
									$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
									//if($result)
									//		echo 'Success';
								}
							}
					}
					else
					{
						for($i=0; $i<count($pieces); $i++)
						{
							$empid = getEmployeIdFromName($pieces[$i]);
							$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
							//if($result)
									//		echo 'Success';
						}
					}
					
				} /*sdfsfsfsf*/
				if($arr[5]!='null')
				{
					$pieces = explode(",", $arr[5]);
					if(in_array('All Departments', $pieces))
					{
						//echo "select emp_id from emp_details where dept_code in (select dept_code from company_dept) order by id desc";
						$sql = GetDetailsFromQuery("select emp_id from emp_details where dept_code in (select dept_code from company_dept) order by id desc");
						if(count($sql)>0)
						{
							foreach($sql as $data)
							{
								$empid = $data['emp_id'];
								$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values
																						  ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
								//if($result)
									//		echo 'Success';
							}
						}
					}
					else
					{
						for($i=0; $i<count($pieces); $i++)
						{
							//print_r($pieces);
							$sql32 = GetDetailsFromQuery("select dept_code from company_dept where dept_name = '$pieces[$i]'");
							foreach($sql32 as $data1)
							{
								$dept_code = $data1['dept_code'];
								$sql = GetDetailsFromQuery("select emp_id from emp_details where dept_code = '$dept_code'");
								if(count($sql)>0)
								{
									foreach($sql as $data)
									{
										$empid = $data['emp_id'];
										$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values
																								  ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
										//if($result)
									//		echo 'Success';
									}
								}
							}
						}
					}
				}/*sdfsfsfsf*/
				if($arr[6]!='null')
				{
					$pieces = explode(",", $arr[6]);
					if(in_array('All Designations', $pieces))
					{
						//echo "select emp_id from emp_details where dept_code in (select dept_code from company_dept) order by id desc";
						$sql = GetDetailsFromQuery("select emp_id from emp_details where desig_code in (select des_code from company_desg) order by id desc");
						if(count($sql)>0)
						{
							foreach($sql as $data)
							{
								$empid = $data['emp_id'];
								$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values
																						  ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
								//if($result)
									//		echo 'Success';
							}
						}
					}
					else
					{
						for($i=1; $i<count($pieces); $i++)
						{
							$sql32 = GetDetailsFromQuery("select des_code from company_desg where des_name = '$pieces[$i]'");
							foreach($sql32 as $data1)
							{
								$dept_code = $data1['des_code'];
								$sql = GetDetailsFromQuery("select emp_id from emp_details where desig_code = '$dept_code'");
								if(count($sql)>0)
								{
									foreach($sql as $data)
									{
										$empid = $data['emp_id'];
										$result = executeStatement("insert into emp_notification (content, post_date, exp_date, status, emp_id) values
																								  ('$arr[1]', '$arr[2]', '$arr[3]', 'posted', '$empid')");
										//if($result)
									//		echo 'Success';
									}
								}
							}
						}
					}
				}/*sdfsfsfsf*/

	        }
		}
		else if($type == 'update_empnotify')
		{
			$rowid = htmlspecialchars(trim($_POST['rowid']));
			$content = htmlspecialchars(trim($_POST['content']));
			$pdate = htmlspecialchars(trim($_POST['pdate']));
			$edate = htmlspecialchars(trim($_POST['edate']));
			$topost = html_entity_decode(trim($_POST['id']));
			
			if($rowid != "")
			{
				$result = executeStatement("update emp_notification set content='$content', post_date='$pdate', exp_date='$edate' where id=$rowid");
				if($result)
					echo 'Success';
			}
		}
		else if($type == 'checknotify')
		{
			$todays_date = date("Y-m-d");
			$today = strtotime($todays_date);
			
			$sql = mysql_query("select * from emp_notification order by id asc");
			$valid = '';
			for($i=0; $i<mysql_num_rows($sql); $i++)
			{
				$exp_date = mysql_result($sql,$i,'exp_date');
				$rowid = mysql_result($sql,$i,'id');
				$expiration_date = strtotime($exp_date);
				if ($expiration_date > $today)
				{ 
					$st = mysql_result($sql,$i,'status');
					if($st == 'expired')
					$valid = executeStatement("update emp_notification set status='posted' where id=$rowid");
				}
				else
				{ 
					$valid = executeStatement("update emp_notification set status='expired' where id=$rowid");
				}
			}
		}
		else if($type == 'EnableLogin')
		{
			$rowid = htmlspecialchars(trim($_POST['rowid']));
			//echo "update emp_login set status='1' where user_name='$rowid'";
			$success = executeStatement("update emp_login set status='1' where user_name='$rowid'");
			echo mysql_error();
			if($success)
				echo "Success";
		}
		else if($type == 'DisableLogin')
		{
			$rowid = htmlspecialchars(trim($_POST['rowid']));
			//echo "update emp_login set status='1' where user_name='$rowid'";
			$success = executeStatement("update emp_login set status=0 where user_name='$rowid'");
			echo mysql_error();
			if($success)
				echo "Success";
		}
		else{
		}
		
	}
?>