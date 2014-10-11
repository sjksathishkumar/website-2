
 
<div class="logopanel">
		<?php $ref_get = $_SESSION['cat']; ?>
        
        <?php if($ref_get == 'Employee'){ ?>
	   	<h1><a href="Dashboard.php">BassPris<span> Admin</span></a></h1>
        <?php } else if ($ref_get == 'User Admin'){ ?>
        <h1><a href="CompanyAdmin.php">BassPris<span> Admin</span></a></h1>
        <?php } ?>
        </div><!--logopanel-->
        
        <div class="datewidget"><?php $date = date('M d, Y, H:m', time()); echo 'Today is '.$date; ?></div>
    	
        
    	<div class="searchwidget" style="border:none;">
        	<div class="input-append" style="padding-bottom:5px;">&nbsp;</div>
        	<?php /*
            <form action="#" method="post">
            	<div class="input-append">
                    <input type="text" class="span2 search-query" placeholder="Search here...">
                    <button type="submit" class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
			*/?>
        </div><!--searchwidget-->        
        
        <?php if($ref_get == 'Employee'){?>
        
        
        
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	
                <?php if($l==0){?>
                <li class="active"><a class="Nav1Call" href="Dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
                <?php }else{ ?>
                <li><a class="Nav1Call" href="Dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
                <?php } if($l==1){?>
                <li class="active dropdown"><a class="Nav1Call" href="#"><span class="icon-briefcase"></span>MY SPACE</a>
                	<ul style="display: block">
                    	<li><a class="Nav1Call" href="ViewEmployee.php">My Profile</a></li>
                        <li><a class="Nav1Call" href="ViewCompanyProfile.php">Company Profile</a></li>
                        <li><a class="Nav1Call" href="ViewEmployeeHolidays.php">Holidays</a></li>
                    </ul>
                </li>
                 <?php }else{ ?>
                 <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-briefcase"></span>MY SPACE</a>
                	<ul>
                    	<li><a class="Nav1Call" href="ViewEmployee.php">Profile</a></li>
                        <li><a class="Nav1Call" href="ViewCompanyProfile.php">Company Profile</a></li>
                        <li><a class="Nav1Call" href="ViewEmployeeHolidays.php">Holidays</a></li>
                    </ul>
                </li>
                 <?php } if($l==2){?>
                
                <li class="active dropdown"><a class="Nav1Call" href="#"><span class="icon-th-list"></span>SPEND MANAGEMENT</a>
                	<ul style="display: block">
                    	<li><a class="Nav1Call" href="EmployeeSpendMgmt.php">My Claims</a></li>
                        <?php /*
                        <li><a class="Nav1Call" href="#">Claims Reports</a></li>
                        <li><a class="Nav1Call" href="#">Submit Direct Claims</a></li>
						*/ ?>
                     </ul>
                </li>
                 <?php }else{ ?>
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-th-list"></span>SPEND MANAGEMENT</a>
                	<ul>
                    	<li><a class="Nav1Call" href="EmployeeSpendMgmt.php">My Claims</a></li>
                        <?php /*
                        <li><a class="Nav1Call" href="#">Claims Reports</a></li>
                        <li><a class="Nav1Call" href="#">Submit Direct Claims</a></li>
						*/ ?>
                     </ul>
                </li>
                <?php } ?>
                
                
                  <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-tag"></span>MY LEAVES</a>
                	<ul>
                    	<li><a class="Nav1Call" href="#">Leave Request</a></li>

                        <li><a class="Nav1Call" href="#">Leave History</a></li>

                     </ul>
                </li>
                
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-plus"></span>COMP OFF</a>
                	<ul>
                    	<li><a class="Nav1Call" href="#">Raise Request</a></li>
                     </ul>
                </li>
                
             
                <li><a class="Nav1Call" href="#"><span class="icon-tasks"></span>MY SHIFT</a></li>
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-star"></span>MY REPORTS</a>
                        <ul>
                        <li><a class="Nav1Call" href="EmpPaySlipList.php?id=<?php echo $username;?>">Payslip</a></li>
                        <?php /*
                        <li><a class="Nav1Call" href="#">Pf Balance</a></li>
                        <li><a class="Nav1Call" href="#">Holiday List</a></li>
                        <li><a class="Nav1Call" href="#">My Loan</a></li>
						*/ ?>
                        <li><a class="Nav1Call" href="EmpAnualSal.php?id=<?php echo $username;?>">Anual Salary Statement</a></li>
                        </ul>
                </li>
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-star"></span>MY TRANSACTIONS</a>
                        <ul>
	                        <li><a class="Nav1Call" href="#">Income Tax Statement</a></li>
                        </ul>
                </li>
            </ul>
  </div>
  
  <?php } else if($ref_get == 'User Admin'){?>
  
  <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	
                <?php if($l==0){?>
                <li class="active"><a class="Nav1Call" href="CompanyAdmin.php"><span class="icon-align-justify"></span> Dashboard</a></li>
                <?php }else{ ?>
                <li><a class="Nav1Call" href="CompanyAdmin.php"><span class="icon-align-justify"></span> Dashboard</a></li>
                <?php } if($l==1){?>
                <li class="active dropdown"><a class="Nav1Call" href="#"><span class="icon-briefcase"></span>MASTERS</a>
                	<ul style="display: block">
                        <li><a class="Nav1Call" href="CompanyProfile.php">Company Profile</a></li>
                        <li><a class="Nav1Call" href="WorkingDays.php">Working Days Calendar</a></li>
                        <?PHP /*<li><a class="Nav1Call" href="EmpPayStructure.php">Employee Pay Structure</a></li> */?>
                        <li><a class="Nav1Call" href="EmployeeStatus.php">Employee Status</a></li>
                        <li><a class="Nav1Call" href="EmpDepartment.php">Departments</a></li>
                        <li><a class="Nav1Call" href="EmpDesignation.php">Designations</a></li>
                        <li><a class="Nav1Call" href="EmpBranch.php">Branches</a></li>
                   <!--     <li><a class="Nav1Call" href="EpfSlab.php">EPF Slap</a></li>-->
                         <!--<li><a class="Nav1Call" href="CompanyEPFStructure.php">EPF Slap</a></li>
                        <li><a class="Nav1Call" href="CompanyESIStructure.php"">ESI Slap</a></li>-->
                        <li><a class="Nav1Call" href="EmpPTSlabView.php">Professional Tax Slaps</a></li>
                       <!-- <li><a class="Nav1Call" href="EmpITSlab.php">Income Tax Slaps</a></li>
                        <li><a class="Nav1Call" href="EmpLeaveDetails.php">Leave Rules</a></li>
                        <li><a class="Nav1Call" href="EmpOTDetails.php">Over Time Slaps</a></li>-->
                        <li><a class="Nav1Call" href="CompanyPayslipStructure.php">PAY Master</a></li>
                        <li><a class="Nav1Call" href="CompanyDeductions.php">Deductions</a></li>
                        <li><a class="Nav1Call" href="CompanyPayStructure.php">PAY Structure</a></li>
                        <!--<li><a class="Nav1Call" href="EmpClaims.php">Claim Rules</a></li>
                        <li><a class="Nav1Call" href="EmpLoan.php">Loan Rules</a></li>
                        <li><a class="Nav1Call" href="EmpNotification.php">Notifications</a></li>-->
                    </ul>
                </li>
                 <?php }else{ ?>
                 <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-briefcase"></span>MASTERS</a>
                	<ul>
                        <li><a class="Nav1Call" href="CompanyProfile.php">Company Profile</a></li>
                        <li><a class="Nav1Call" href="WorkingDays.php">Working Days Calendar</a></li>
                        <?PHP /*<li><a class="Nav1Call" href="EmpPayStructure.php">Employee Pay Structure</a></li> */?>
                        <li><a class="Nav1Call" href="EmployeeStatus.php">Employee Status</a></li>
                        <li><a class="Nav1Call" href="EmpDepartment.php">Departments</a></li>
                        <li><a class="Nav1Call" href="EmpDesignation.php">Designations</a></li>
                        <li><a class="Nav1Call" href="EmpBranch.php">Branches</a></li>
                       <!-- <li><a class="Nav1Call" href="CompanyEPFStructure.php">EPF Slap</a></li>
                        <li><a class="Nav1Call" href="CompanyESIStructure.php">ESI Slap</a></li>-->
                        <li><a class="Nav1Call" href="EmpPTSlabView.php">Professional Tax Slaps</a></li>
                      <!--  <li><a class="Nav1Call" href="EmpITSlab.php">Income Tax Slaps</a></li>
                        <li><a class="Nav1Call" href="EmpLeaveDetails.php">Leave Rules</a></li>
                        <li><a class="Nav1Call" href="EmpOTDetails.php">Over Time Slaps</a></li>-->
                        <li><a class="Nav1Call" href="CompanyPayslipStructure.php">PAY Master</a></li>
                        <li><a class="Nav1Call" href="CompanyDeductions.php">Deductions</a></li>
                        <li><a class="Nav1Call" href="CompanyPayStructure.php">PAY Structure</a></li>
                        <!--<li><a class="Nav1Call" href="EmpClaims.php">Claim Rules</a></li>
                        <li><a class="Nav1Call" href="EmpLoan.php">Loan Rules</a></li>
                        <li><a class="Nav1Call" href="EmpNotification.php">Notifications</a></li>-->
                    </ul>
                </li>
                 <?php } if($l==2){?>
                
                <li><a class="dropdown" href="CompanyEmployee.php"><span class="icon-th-list"></span>EMPLOYEE</a>

                </li>
                 <?php }else{ ?>
                <li><a class="Nav1Call" href="CompanyEmployee.php"><span class="icon-th-list"></span>EMPLOYEE</a>

                </li>
                <?php } /*if($l==3){?>
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-tag"></span>MASTERS</a>
                	<ul style="display: block">
                    	<li><a class="Nav1Call" href="ViewMaster.php">Add Master</a></li>
                        <li><a class="Nav1Call" href="EmpLocation.php">Location Details</a></li>
                        <li><a class="Nav1Call" href="EmpBankDetails.php">Bank Details</a></li>
                        <?php /*
                        <li><a class="Nav1Call" href="#">Loans</a></li>
                        <li><a class="Nav1Call" href="#">PF Master</a></li>
                        <li><a class="Nav1Call" href="#">Leave Master</a></li>
                        <li><a class="Nav1Call" href="#">Shift Master</a></li>
						?>
                     </ul>
                </li>
                <?php }else{ ?>
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-tag"></span>MASTERS</a>
                	<ul>
                    	<li><a class="Nav1Call" href="ViewMaster.php">Add Master</a></li>
                        <li><a class="Nav1Call" href="EmpLocation.php">Location Details</a></li>
                        <li><a class="Nav1Call" href="EmpBankDetails.php">Bank Details</a></li>
                        <?php /*
                        <li><a class="Nav1Call" href="#">Loans</a></li>
                        <li><a class="Nav1Call" href="#">PF Master</a></li>
                        <li><a class="Nav1Call" href="#">Leave Master</a></li>
                        <li><a class="Nav1Call" href="#">Shift Master</a></li>
						?>
                     </ul>
                </li>
				  <?php  } */ if($l==3){?>
                  <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-tag"></span>TRANSACTIONS</a>
                	<ul style="display: block">
                    	<li><a class="Nav1Call" href="ViewCompanyAttendance.php">Attendance</a></li>
                         <?php /*
                        <li><a class="Nav1Call" href="EmpOTDetails.php">Over Time Slaps</a></li>
                       
                        <li><a class="Nav1Call" href="#">Attandance Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Leave Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Pay Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Loan Details</a></li>
                        <li><a class="Nav1Call" href="#">Loan Payment</a></li>
                        <li><a class="Nav1Call" href="#">Loan Closure / Waiver</a></li>
						*/?>
                     </ul>
                </li>
                
                <?php } else { ?>
                
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-tag"></span>TRANSACTIONS</a>
                	<ul>
                    	<li><a class="Nav1Call" href="ViewCompanyAttendance.php">Attendance</a></li>
                         <?php /*
                        <li><a class="Nav1Call" href="EmpOTDetails.php">Over Time Slaps</a></li>
                        
                        <li><a class="Nav1Call" href="#">Attandance Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Leave Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Pay Adjustment</a></li>
                        <li><a class="Nav1Call" href="#">Loan Details</a></li>
                        <li><a class="Nav1Call" href="#">Loan Payment</a></li>
                        <li><a class="Nav1Call" href="#">Loan Closure / Waiver</a></li>
						*/?>
                     </ul>
                </li>
                <?php } /*?>
                
                
                <li class="dropdown"><a class="Nav1Call" href="#"><span class="icon-plus"></span>MAIL MERG</a>
                	<ul>
                    	<li><a class="Nav1Call" href="#">Templete List</a></li>
                        <li><a class="Nav1Call" href="#">Templete Master</a></li>
                        <li><a class="Nav1Call" href="#">Document Process</a></li>
                     </ul>
                </li>
				<?php */ if($l==4){?>
                <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>PAYROLL</a>
                        <ul style="display: block">
                        <li><a class="Nav1Call" href="EmployeeViewpayroll.php">view Payroll</a></li>
                        <li><a class="Nav1Call" href="EmployeePayPreview.php">Preview Payroll</a></li>
                        <li><a class="Nav1Call" href="sendmail.php">Send Mail</a></li>
                        <?php /*
						<li><a class="Nav1Call" href="EmployeePayGen.php">Run Payroll</a></li>
                        <li><a class="Nav1Call" href="#">Reimbursements</a></li>
                        <li><a class="Nav1Call" href="#">Stop / Release Payments</a></li>
						*/ ?>
                        </ul>
                </li>
                
               <?php }else{ ?> 
                 <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>PAYROLL</a>
                        <ul>
                        <li><a class="Nav1Call" href="EmployeeViewpayroll.php">view Payroll</a></li>
                        <li><a class="Nav1Call" href="EmployeePayPreview.php">Preview Payroll</a></li>
                        <li><a class="Nav1Call" href="sendmail.php">Send Mail</a></li>
                        <?php /*  <li><a class="Nav1Call" href="EmployeePayGen.php">Run Payroll</a></li>
                        <li><a class="Nav1Call" href="#">Reimbursements</a></li>
                        <li><a class="Nav1Call" href="#">Stop / Release Payments</a></li>
						*/ ?>
                        </ul>
                </li>
                
                <?php }
				if($l==5){?>
                <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>REPORTS</a>
                        <ul style="display: block">
                        <li><a class="Nav1Call" href="salrepo.php">Monthly Salary Report</a></li>
                        <?php include_once("include/config.php");
						$main = "SELECT * FROM company_details";
						$newmain = mysql_query($main);
						while($row = mysql_fetch_assoc($newmain))
						{
							if($row['pf'] == 0)
							{
						
						?>
                        <li><a class="Nav1Call" href="pfrepo.php">Monthly PF Report</a></li>
                        <?php 
							}
							if($row['esi'] == 0)
							{
						?>
                        <li><a class="Nav1Call" href="esrepo.php">Monthly ESI Report</a></li>
                        <?php 
							}
							if($row['pt'] == 0)
							{
						?>
                        <li><a class="Nav1Call" href="ptrepo.php">Monthly PT Report</a></li>
                        <?php 
							}
						}
						?>
                        </ul>
                </li>
                <?php }
				else
				{	?>
				 <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>REPORTS</a>
                        <ul>
                        <li><a class="Nav1Call" href="salrepo.php">Monthly Salary Report</a></li>
                            <?php include_once("include/config.php");
						$main = "SELECT * FROM company_details";
						$newmain = mysql_query($main);
						while($row = mysql_fetch_assoc($newmain))
						{
							if($row['pf'] == 0)
							{
						
						?>
                        <li><a class="Nav1Call" href="pfrepo.php">Monthly PF Report</a></li>
                        <?php 
							}
							if($row['esi'] == 0)
							{
						?>
                        <li><a class="Nav1Call" href="esrepo.php">Monthly ESI Report</a></li>
                        <?php 
							}
							if($row['pt'] == 0)
							{
						?>
                        <li><a class="Nav1Call" href="ptrepo.php">Monthly PT Report</a></li>
                        <?php 
							}
						}
						?>
                        </ul>
                </li>
				<?php }
				if($l==6){?>
                <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>MISC</a>
                         <ul style="display: block">
                         <?php /*
                        <li><a class="Nav1Call" href="#">Pending Loans</a></li>
                        <li><a class="Nav1Call" href="#">Claims</a></li>
                        <li><a class="Nav1Call" href="#">Deptwise CTC</a></li>
						*/ ?>
                        <li><a class="Nav1Call" href="EmpLoginCreate.php">Login Credential Report</a></li>
                        </ul>
                </li>
                <?php }else { ?>
                <li class="dropdown"><a class="Nav1Call" href="buttons.html"><span class="icon-star"></span>MISC</a>
                         <ul>
                         <?php /*
                        <li><a class="Nav1Call" href="#">Pending Loans</a></li>
                        <li><a class="Nav1Call" href="#">Claims</a></li>
                        <li><a class="Nav1Call" href="#">Deptwise CTC</a></li>
						*/ ?>
                        <li><a class="Nav1Call" href="EmpLoginCreate.php">Login Credential Report</a></li>
                        </ul>
                </li>
                <?php } ?>
                
            </ul>
  </div>
  <?php } else if($ref_get == 'Date Entry Operators'){?>
  <?php } else { ?>
	
  <?php }?>
