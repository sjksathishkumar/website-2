<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");
include('include/EmpSalCal.php');
//sleep(3);
	
	
	if(isset($_POST['number']))
	{
		$eid = $_POST['number'];
		$num = str_split($eid, 4);
		
		 $id = randomPrefix(3); 
		 $check = checkrandom($num[0].$id); 
		 while ( $check == false ) 
		 {			
			$id = randomPrefix(3); 
			$check = checkrandom($num[0].$id);
		 }
		echo $id;
	}
	if(isset($_POST['master']))
	{
		$mas = htmlspecialchars(trim($_POST['master']));
		$code = htmlspecialchars(trim($_POST['code']));
		
		if($mas == 1)
			$resEmp1 = GetDetailsFromQuery("select * from company_dept where company_code ='$code'");
		else if($mas == 3)
			$resEmp1 = GetDetailsFromQuery("select * from company_branch where company_code ='$code'");
		else
			$resEmp1 = GetDetailsFromQuery("select * from company_desg where company_code ='$code'");
		$i=1;
		?>
        <table class="table table-striped table-bordered bootstrap-datatable datatable" id="new_data">
        <thead>
        <tr>
          <th>Sl. No.</th>
          <th>Master Code</th>
          <th>Master Data</th>
          <th>Action</th>
        </tr>
        </thead>   
        <tbody>
        <?php if($resEmp1>0){ foreach($resEmp1 as $data){ ?>
        <tr class="edit_td" id="del_<?php echo $data['id'];?>">
        <td class="center"><?php echo $i;?></td>
        <?php
            if($mas == 1){
                echo '<td>'.$data['dept_code'].'</td>';
                echo '<td>
				<span style="" id="one_'.$data['id'].'" class="text">'.GetDepartmentName($data['dept_code']).'</span>
					<input style="width:200px; display:none;" type="text" value="'.GetDepartmentName($data['dept_code']).'"  id="one_input_'.$data['id'].'" />
					<input type="hidden" value="'.$data['dept_code'].'" id="row_code" />
					</td>';
				echo '<td>
		        	    <i class="icon-edit"></i>&nbsp;<a href="#" name="Dept" class="editMaster" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
        		    	<i class="icon-trash"></i>&nbsp;<a href="#" id="DelDept" name="'.$data['id'].'">Delete</a>
        			  </td>';
				
				
            }else if($mas == 3){
                echo '<td>'.$data['branch_code'].'</td>';
                echo '<td>
				<span style="" id="one_'.$data['id'].'" class="text">'.$data['branch_name'].'</span>
					<input style="width:200px; display:none;" type="text" value="'.$data['branch_name'].'"  id="one_input_'.$data['id'].'" />
					<input type="hidden" value="'.$data['branch_code'].'" id="row_code" />
					</td>';
				echo '<td>
		        	    <i class="icon-edit"></i>&nbsp;<a href="#" name="Branch" class="editMaster" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
        		    	<i class="icon-trash"></i>&nbsp;<a href="#" id="DelBranch" name="'.$data['id'].'">Delete</a>
        			  </td>';
            }
			else{
                echo '<td>'.$data['desg_code'].'</td>';
                echo '<td>
						<span style="" id="one_'.$data['id'].'" class="text">'.GetDesignationName($data['desg_code']).'</span>
						<input style="width:200px; display:none;" type="text" value="'.GetDesignationName($data['desg_code']).'"  id="one_input_'.$data['id'].'" />
					    <input type="hidden" value="'.$data['desg_code'].'" id="row_code" />
					 </td>';
				echo '<td>
		        	    <i class="icon-edit"></i>&nbsp;<a href="#" class="editMaster" name="Desg" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
        		    	<i class="icon-trash"></i>&nbsp;<a href="#" id="DelDesg" name="'.$data['id'].'">Delete</a>
        			  </td>';
            }
        ?>
        </tr>
        <?php $i++; } } ?>
        </tbody>
        </table>
<?php	}

		if(isset($_POST['attan']))
		{
			//sleep(3);
			$code = htmlspecialchars(trim($_POST['code']));
			$result = GetDetailsFromQuery("select * from emp_daily_attandance where company_id = '$code' order by date desc");
		?>
			<div class="box-content" id="">
             <table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
              <thead>
                  <tr>
                      <th>Employee Id</th>
                      <th>Employee Name</th>
                      <th>Shift</th>
                      <th>Date</th>
                      <th>In-Time</th>
                      <th>Out-Time</th>
                  </tr>
              </thead>   
              <tbody>
                    	 <?php if(count($result)>0){ foreach($result as $data){ ?>
                         <tr>
                         <td class="center" id="emp_id"><?php echo $data['emp_id'];?></td>
                         <td class="center"><?php echo GetEmployeeDisplayName($data['emp_id']);?></td>
                         <td class="center"><?php if($data['shift_base'] == 1) echo 'Main Shift';?></td>
                         <td class="center"><?php echo date('d-m-Y', strtotime($data['date']));?></td>
                         <td><?php echo date('H:i',strtotime($data['in_time']));?></td>
                         <td><?php echo date('H:i', strtotime($data['out_time']));?></td>
                   		 </tr>      
                         <?php }} ?>
                   
              </tbody>
              </table>
              </div>
   <?php }
   
   		if(isset($_POST['type']))
		{
			$emp_id = htmlspecialchars(trim($_POST['id']));
			
		?>
        <table width="768" class="table table-striped table-bordered bootstrap-datatable datatable">
            <tr>
                <th width="374">Employee Id : <?php echo $emp_id; ?></th>
                <th width="382">Department : <?php echo GetDepartmentName(GetDepartmentId($emp_id)); ?></th>
                
            </tr>
            <tr>
                <th>Employee Name : <?php echo GetEmployeeDisplayName($emp_id); ?></th>
                <th>Working Days : 30</th>
               
            </tr>
            <tr>
                <th>Designation : <?php echo GetDesignationName(GetDesignationId($emp_id)); ?></th>
                <th>Location : Chenai</th>
            </tr>
            <tr>
                <th>Working Days : 30</th>
                <th>Leave : 0</th>
            </tr>
            <tr style="width:50%;">
                <td>Earning <?php $gross = GetGrossPay(GetDesignationId($emp_id)); ?></td>
                <td>Deduction</td>
            </tr>
            <tr>
                <td><table width="100%" class="" style="text-align:right;">
                        <tr style="">
                            <td style="border-left:none; border-right:none;">BASIC</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $basic = CalBasicPay($gross); ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">HRA</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $hra = CalHRA($gross); ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Conveyance Allowance</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $ca = (2*$gross)/100; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Special Allowance</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $sa = (35*$gross)/100; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Educational Allowance</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $ea = (5*$gross)/100; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Medical Allowance</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $ma = (7*$gross)/100; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">LTA</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $lta = (6*$gross)/100; ?></td>
                        </tr>
                        
                        <tr style="">
                            <td style="border-left:none; border-right:none;"><span style="color:#F00;">Total Earning</span>&nbsp;: </td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $tot = $basic + $hra + $ca + $sa + $ea + $ma + $lta;?></td>
                        </tr>
                        
                </table></td>
                <td><table width="100%" class="" style="text-align:right;">
                        <tr style="">
                            <td style="border-left:none; border-right:none;">P.F (Total)</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $pf = CalPf($gross); ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">ESI</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $esi = CalEsi($gross); ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Profectional Tax</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $pt = round(CalPT($gross)/6,0); ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">TDS</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo '0.00'; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;">Loan</td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo '0.00'; ?></td>
                        </tr>
                        <tr style="">
                            <td style="border-left:none; border-right:none;"><span style="color:#F00;">Total Deduction</span>&nbsp;: </td>
                            <td style="border-left:none; border-right:none; text-align:right;"><?php echo $totd = $pf + $esi + $pt;?></td>
                        </tr>
                        
                </table></td>
                <tr style="border-right:none;">
                    <td style="border-right:none;">Net Pay</td>
                    <td style="text-align:right; border-left:none;"><?php echo $net = $tot-$totd;?></td>
            	</tr>
            </tr>
        </table>
	<?php }
	if(isset($_POST['month']))
	{
		$month = htmlspecialchars(trim($_POST['month']));
		
		
		$resEmp = GetDetailsFromQuery("select * from emp_attendance where month ='$month'");// where month = ".date('F'));

		
		$resWdays = GetDetailsFromQuery("select * from working_days order by id asc");
		?>
        <a class="btn btn-success" style="float:right; margin-right:0px; margin-bottom:10px;" href="Downloads/download_data.php?ref=attan_temp"><i class="icon-download icon-white"></i>&nbsp;&nbsp;Download Templete</a>
        <a class="btn btn-primary" style="float:right; margin-right:10px; margin-bottom:10px;" href="UploadCompanyAttendance.php?ref=<?php echo $_GET['ref']; ?>"><i class="icon-upload icon-white"></i>&nbsp;&nbsp;Upload Attandance</a>
        <input type="hidden" id="c_code" value="<?php echo $code ;?>" />
        
        
        <select class="input-medium" id="ChangeMonth">
        <?php $result2 = mysql_query("select month from working_days order by id asc"); 
            $n_rows = mysql_num_rows($result2);
            for($j=0; $j<$n_rows; $j++)
            { if((mysql_result($result2, $j, 'month')) == $month) {?>
            
                <option value="<?php echo mysql_result($result2, $j, 'month'); ?>" selected><?php echo mysql_result($result2, $j, 'month'); ?></option>
          <?php }
                else
                {?>
                <option value="<?php echo mysql_result($result2, $j, 'month'); ?>"><?php echo mysql_result($result2, $j, 'month'); ?></option>
           <?php }
             }
            ?>
         </select>
        
        
        <?php if($resEmp>0){ ?>
        
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
          <thead>
              <tr>
                  <th>Employee Id</th>
                  <th>Employee Name</th>
                  <th>Month</th>
                  <th>No. Working Days</th>
                  <th>Leave Acquired</th>
                  <th>Present</th>
                  <th>LOP</th>
                  <th>Action</th>
    
                  <?php //<th>Action</th> ?>
              </tr>
          </thead>   
          <tbody>
          
          <?php foreach($resEmp as $data){ ?>
          
          <tr>
            <td class="center"><?php echo $data['emp_id'];?></td>
            <td><?php echo GetEmployeeDisplayName($data['emp_id']); ?></td>
            <td><?php echo $data['month'];?></td>
            <td><?php echo $w = $data['working_days']; ?></td>
            <td>
                <span style="" id='one_<?php echo $data['id'];?>' class='text'><?php echo $pdays = $data['no_leave'];?></span>
                <img src="img/spinner-mini.gif" id="loading_<?php echo $data['id'];?>" style="display:none;" />
                <input style="width:25px; display:none;" type="hidden" value='<?php echo $data['emp_id'];?>'  id='EmpId_<?php echo $data['id'];?>' />
                <input style="width:25px; display:none;" type='text' value='<?php echo $pdays;?>'  id='one_input_<?php echo $data['id'];?>' />
            </td>
            <td id='pdays_<?php echo $data['id'];?>'><?php echo $p = $w-$pdays;?></td>
            <td>
                <span style="" id='two_<?php echo $data['id'];?>' class='text'><?php echo $lop = $data['lop_days'];?></span>
                <input style="width:25px; display:none;" type='text' value='<?php echo $lop;?>'  id='two_input_<?php echo $data['id'];?>' />
            </td>
            <td>
                <i class="icon-edit"></i>&nbsp;<a href="#" class='editbox' id="<?php echo $data['id'];?>">Edit</a>
            </td>
          </tr>
          <?php } ?>
		  
        </tbody>
    </table>
    
    <?php 
	}
	else
	{
	?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
    	<tr>
        	<td>There is no attandance Histry !!!! For this Month <strong><?php echo $month; ?></strong></td>
        </tr>
    </table>
    <?php
	}
    ?>        
            
            
    
	<?php }
	if(isset($_POST['PayGen']))
	{
		$month = htmlspecialchars(trim($_POST['Paymonth']));
		//$code = htmlspecialchars(trim($_POST['code']));
		
		$insert = executeStatement("insert into payroll_status (pay_month, pay_year, status) values ('$month', 2013, 'YES')");
		echo mysql_error();
		//$pay =  htmlspecialchars(trim($_POST['pay']));
	?>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
    	<thead>
        	<tr>
                 <th>Emp Id</th>
                 <th>Emp Name</th>
                 <th>Email Id</th>
                 <th>Mobile No.</th>
                 <th>Payment Mode</th>
                 <th>Net Pay</th>
                 <th>Bank Name</th>
                 <th>Acc No.</th>
                 <th>Branch</th>
                 <th>Status</th>
            </tr>
        </thead>
        <tbody>
        	<?php $resEmp = GetDetailsFromQuery("select * from emp_login order by id asc");
					if(count($resEmp)>0){ foreach($resEmp as $data){
            		$emp_id = $data['user_name'];
                    $insert = executeStatement("insert into emp_paygen (emp_id, pay_month, pay_year, pay_status) values ('$emp_id', '$month', 2013, 'PAID')");
		echo mysql_error();
        	?>
            
            <tr>
            	<td><?php echo $emp_id; ?></td>
                <td><?php echo $data['disp_name']; ?></td>
				<?php //$resEmpDet = GetDetailsFromQuery("select * from emp_details where company_code = '$code' and emp_id = '$emp_id' order by id desc");
					//if(count($resEmpDet)>0){ foreach($resEmpDet as $row){ ?>

                     <td><?php //echo $row['email_id']; ?></td>
                     <td><?php //echo $row['mobile']; ?></td>
                    
                <?php //} } ?>
                <td>via Bank</td>
                <td><?php echo CalNetPay($emp_id, $month); ?></td>
                <?php //$resEmpDet = GetDetailsFromQuery("select * from emp_comp_details where company_code = '$code' and emp_id = '$emp_id' order by id desc");
					//if(count($resEmpDet)>0){ foreach($resEmpDet as $row2){ ?>
                     <td><?php //echo $row2['bank_name']; ?></td>
                     <td><?php //echo $row2['bank_acc_no']; ?></td>
                     <td><?php //echo $row2['bank_branch']; ?></td>
                 <?php //} } ?>
                <td>Send</td>
            </tr>
            <?php } } ?>
        </tbody>
   	</table>
	<?php
	}
	?>