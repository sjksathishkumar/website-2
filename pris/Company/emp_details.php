<?php

$emp_id = $_GET['empid'];



?>
<h4 class="widgettitle nomargin">Edit Profile</h4>
                <div class="widgetcontent bordered">
                	
                    
                    <div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                            	<a href="EmpPhotoUpload.php?empid=<?php echo $emp_id; ?>">Change Thumbnail</a>
                                <?php $photo = GetEmployeePhoto($emp_id); if($photo == ''){?>
                                <img src="img/profilethumb.png" alt="<?php echo GetEmployeeDisplayName($emp_id);?>" title="<?php echo GetEmployeeDisplayName($emp_id);?>" class="img-polaroid" />
                                <?php } else {?>
                                <img src="<?php echo $photo; ?>" width="177px" height="171px" alt="<?php echo GetEmployeeDisplayName($emp_id);?>" title="<?php echo GetEmployeeDisplayName($emp_id);?>" class="img-polaroid" />
                                <?php } ?>
                            </div><!--profilethumb-->
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="EditEmployee.php?empid=<?php echo base64_encode($emp_id);?>" class="editprofileform" method="post">
                            	<h4>Login Information</h4>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Employee Id</label>
                                	: &nbsp;&nbsp;<?php echo $emp_id;?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Employee Name</label>
                                    : &nbsp;&nbsp;<?php echo GetEmployeeDisplayName($emp_id);?>
                                </p>
                                <!--
                                <p>
                                	<label style="padding:0">Password</label>
                                    : &nbsp;&nbsp;themepixels <a href="">Change Password?</a>
                                </p>
                                -->
                                <br />
                                
                                <h4>Personal Information</h4>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_personal_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">First Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['first_name'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Last Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['last_name'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Father's Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['fathers_name'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Gender</label>
                                	: &nbsp;&nbsp;<?php echo $row['gender'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Blood Group</label>
                                	: &nbsp;&nbsp;<?php echo $row['blood_group'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">City</label>
                                	: &nbsp;&nbsp;<?php echo $row['city'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">State</label>
                                	: &nbsp;&nbsp;<?php echo $row['state'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Pincode</label>
                                	: &nbsp;&nbsp;<?php echo $row['pincode'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Marital Status</label>
                                	: &nbsp;&nbsp;<?php echo $row['marital_status'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Emergency Contact Number</label>
                                	: &nbsp;&nbsp;<?php echo $row['emergency_number'];?>
                                </p>
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="EditEmployee.php?ref=<?php echo $_GET['ref'];?>&cmpcode=<?php echo base64_encode($code);?>&empid=<?php echo base64_encode($emp_id);?>#PerInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <br />
                                
                                <h4>Company Information</h4>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Email Id</label>
                                	: &nbsp;&nbsp;<?php echo $row['email_id'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Designation</label>
                                	: &nbsp;&nbsp;<?php echo GetDesignationName($row['desig_code']);?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Department</label>
                                	: &nbsp;&nbsp;<?php echo GetDepartmentName($row['dept_code']);?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Date of Birth</label>
                                	: &nbsp;&nbsp;<?php echo date('d M Y',strtotime($row['dob']));?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Date of Join</label>
                                	: &nbsp;&nbsp;<?php echo date('d M Y',strtotime($row['doj']));?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Telephone No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['telephone'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Mobile No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['mobile'];?>
                                </p>
                                
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Status</label>
                                	: &nbsp;&nbsp;<?php echo GetEmployeeStatus($row['status']);?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Address</label>
                                	: &nbsp;&nbsp;<?php echo $row['addr'];?>
                                </p>
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="EditEmployee.php?ref=<?php echo $_GET['ref'];?>&cmpcode=<?php echo base64_encode($code);?>&empid=<?php echo base64_encode($emp_id);?>#CompInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <br />
                                
                                <h4>Accounts Information</h4>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_comp_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Company Branch</label>
                                	: &nbsp;&nbsp;<?php echo $row['branch'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">PAN NO.</label>
                                	: &nbsp;&nbsp;<?php echo $row['pan_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['bank_name'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Account Number</label>
                                	: &nbsp;&nbsp;<?php echo $row['bank_acc_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank Branch</label>
                                	: &nbsp;&nbsp;<?php echo $row['bank_branch'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank IFSC Code</label>
                                	: &nbsp;&nbsp;<?php echo $row['ifsc_code'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank MICR Code</label>
                                	: &nbsp;&nbsp;<?php echo $row['micr_code'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">PF Number</label>
                                	: &nbsp;&nbsp;<?php echo $row['pf_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">ESI Number</label>
                                	: &nbsp;&nbsp;<?php echo $row['esi_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Driving License No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['driving_license'];?>
                                </p>
                                
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Passport Number</label>
                                	: &nbsp;&nbsp;<?php echo $row['passport'];?>
                                </p>
                                
                               
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="EditEmployee.php?ref=<?php echo $_GET['ref'];?>&cmpcode=<?php echo base64_encode($code);?>&empid=<?php echo base64_encode($emp_id);?>#AccInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <br />
                                <p>
                                	<button type="submit" class="btn btn-primary">Update Profile</button>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
