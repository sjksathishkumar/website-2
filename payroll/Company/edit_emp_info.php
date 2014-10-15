<?php
?>
<h4 class="widgettitle nomargin">Edit Profile</h4>
                <div class="widgetcontent bordered">
                	
                    
                    <div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                            	<a href="EmpPhotoUpload.php?empid=<?php echo $emp_id; ?>" id="showShange">Change Thumbnail</a>
                                <?php $photo = GetEmployeePhoto($emp_id); if($photo == ''){?>
                                <img src="img/profilethumb.png" alt="<?php echo GetEmployeeDisplayName($emp_id);?>" title="<?php echo GetEmployeeDisplayName($emp_id);?>" class="img-polaroid" />
                                <?php } else {?>
                                <img src="<?php echo $photo; ?>" width="177px" height="171px" alt="<?php echo GetEmployeeDisplayName($emp_id);?>" title="<?php echo GetEmployeeDisplayName($emp_id);?>" class="img-polaroid" />
                                <?php } ?>
                                
                            </div><!--profilethumb-->
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="#" class="editprofileform" method="post">
                            	<div id="LoginInfo"></div>
                                
                                
                                
                                <input type="hidden" id="emp_id" value="<?php echo $emp_id;?>" />
                                <input type="hidden" id="ccode" value="<?php echo $code;?>" />
                                <input type="hidden" id="ret_url" value="<?php echo $_GET['ref'];?>" />
                                <h4>Login Information</h4>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Employee Id</label>
                                	: <input type="text" name="field1" id="txtfield1" readonly class="input-xlarge" value="<?php echo $emp_id;?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Employee Name</label>
                                    : <input type="text" name="field2" id="txtfield2" class="input-xlarge" value="<?php echo GetEmployeeDisplayName($emp_id);?>" />
                                </p>
                                
                                <div class="alert alert-error" id="txterror1" style="display:none;">
                              	<strong>Oh snap!</strong> Change a few things up and try submitting again.
                            	</div><!--alert-->
                                
                                 <p>
                                    <button type="submit" class="btn btn-primary" id="update_login">Update Profile</button>
                                </p>
                                
                                <!--
                                <p>
                                	<label style="padding:0">Password</label>
                                    : &nbsp;&nbsp;themepixels <a href="">Change Password?</a>
                                </p>
                                -->
                                <br />
                                
                                <h4>Personal Information</h4>
                                <div id="PerInfo"></div>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_personal_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">First Name</label>
                                	: <input type="text" name="field1" id="txtfield3" class="input-xlarge" value="<?php echo $row['first_name'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Last Name</label>
                                	: <input type="text" name="field1" id="txtfield4" class="input-xlarge" value="<?php echo $row['last_name'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Father's Name</label>
                                	: <input type="text" name="field1" id="txtfield5" class="input-xlarge" value="<?php echo $row['fathers_name'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Gender</label>
                                	: <input type="text" name="field1" id="txtfield6" class="input-xlarge" value="<?php echo $row['gender'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Blood Group</label>
                                	: <input type="text" name="field1" id="txtfield7" class="input-xlarge" value="<?php echo $row['blood_group'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">City</label>
                                	: <input type="text" name="field1" id="txtfield8" class="input-xlarge" value="<?php echo $row['city'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">State</label>
                                	: <input type="text" name="field1" id="txtfield9" class="input-xlarge" value="<?php echo $row['state'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Pincode</label>
                                	: <input type="text" name="field1" id="txtfield10" class="input-xlarge" value="<?php echo $row['pincode'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Marital Status</label>
                                	: <input type="text" name="field1" id="txtfield11" class="input-xlarge" value="<?php echo $row['marital_status'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Emergency Contact Number</label>
                                	: <input type="text" name="field1" id="txtfield12" class="input-xlarge" value="<?php echo $row['emergency_number'];?>" />
                                </p>
                                
                                <div class="alert alert-error" id="txterror2" style="display:none;">
                              	<strong>Oh snap!</strong> Change a few things up and try submitting again.
                            	</div><!--alert-->
                                
                                 <p>
                                    <button type="submit" class="btn btn-primary" id="personal_update">Update Profile</button>
                                </p>
                                
                                <?php } }else {?>
                                
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">First Name</label>
                                	: <input type="text" name="field1" id="txtfield3" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Last Name</label>
                                	: <input type="text" name="field1" id="txtfield4" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Father's Name</label>
                                	: <input type="text" name="field1" id="txtfield5" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Gender</label>
                                	: <input type="text" name="field1" id="txtfield6" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Blood Group</label>
                                	: <input type="text" name="field1" id="txtfield7" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">City</label>
                                	: <input type="text" name="field1" id="txtfield8" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">State</label>
                                	: <input type="text" name="field1" id="txtfield9" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Pincode</label>
                                	: <input type="text" name="field1" id="txtfield10" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Marital Status</label>
                                	: <input type="text" name="field1" id="txtfield11" class="input-xlarge" value="" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Emergency Contact Number</label>
                                	: <input type="text" name="field1" id="txtfield12" class="input-xlarge" value="" />
                                </p>
                                
                                <div class="alert alert-error" id="txterror2" style="display:none;">
                              	<strong>Oh snap!</strong> Change a few things up and try submitting again.
                            	</div><!--alert-->
                                
                                 <p>
                                    <button type="submit" class="btn btn-primary" id="personal_update">Update Profile</button>
                                </p>
                                
                                <?php } ?>
                                
                                <br />
                                
                                <h4>Company Information</h4>
                                <div id="CompInfo"></div>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                 <input type="hidden" id="ccode" value="<?php echo $code;?>" />
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Email Id</label>
                                	: <input type="text" name="field2" id="txtfield13" class="input-xlarge" value="<?php echo $row['email_id'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Designation</label>
                                	: <input type="text" name="field2" id="txtfield14" class="input-xlarge" value="<?php echo GetDesignationName($row['desig_code']);?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Department</label>
                                	: <input type="text" name="field2" id="txtfield15" class="input-xlarge" value="<?php echo GetDepartmentName($row['dept_code']);?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Date of Birth</label>
                                	: <input type="text" name="field2" id="txtfield16" class="input-xlarge" value="<?php echo date('d M Y',strtotime($row['dob']));?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Date of Join</label>
                                	: <input type="text" name="field2" id="txtfield17" class="input-xlarge" value="<?php echo date('d M Y',strtotime($row['doj']));?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Telephone No.</label>
                                	: <input type="text" name="field2" id="txtfield18" class="input-xlarge" value="<?php echo $row['telephone'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Mobile No.</label>
                                	: <input type="text" name="field2" id="txtfield19" class="input-xlarge" value="<?php echo $row['mobile'];?>" />
                                </p>
                                
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Status</label>
                                	: <input type="text" name="field2" id="txtfield20" class="input-xlarge" value="<?php echo GetEmployeeStatus($row['status']);?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Address</label>
                                	: <input type="text" name="field2" id="txtfield21" class="input-xlarge" value="<?php echo $row['addr'];?>" />
                                </p>
                                <div class="alert alert-error" id="txterror3" style="display:none;">
                              	<strong>Oh snap!</strong> Change a few things up and try submitting again.
                            	</div><!--alert-->
                                
                                 <p>
                                    <button type="submit" class="btn btn-primary" id="comp_update">Update Profile</button>
                                </p>
                                <?php } } ?>
                                <br />
                                
                                <h4>Accounts Information</h4>
                                <div id="AccInfo"></div>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from  emp_comp_details where emp_id = '$emp_id'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Company Branch</label>
                                	: <input type="text" name="field2" id="txtfield22" class="input-xlarge" value="<?php echo $row['branch'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">PAN NO.</label>
                                	: <input type="text" name="field2" id="txtfield23" class="input-xlarge" value="<?php echo $row['pan_no'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank Name</label>
                                	: <input type="text" name="field2" id="txtfield24" class="input-xlarge" value="<?php echo $row['bank_name'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Account Number</label>
                                	: <input type="text" name="field2" id="txtfield25" class="input-xlarge" value="<?php echo $row['bank_acc_no'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank Branch</label>
                                	: <input type="text" name="field2" id="txtfield26" class="input-xlarge" value="<?php echo $row['bank_branch'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank IFSC Code</label>
                                	: <input type="text" name="field2" id="txtfield27" class="input-xlarge" value="<?php echo $row['ifsc_code'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Bank MICR Code</label>
                                	: <input type="text" name="field2" id="txtfield28" class="input-xlarge" value="<?php echo $row['micr_code'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">PF Number</label>
                                	: <input type="text" name="field2" id="txtfield29" class="input-xlarge" value="<?php echo $row['pf_no'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">ESI Number</label>
                                	: <input type="text" name="field2" id="txtfield30" class="input-xlarge" value="<?php echo $row['esi_no'];?>" />
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Driving License No.</label>
                                	: <input type="text" name="field2" id="txtfield31" class="input-xlarge" value="<?php echo $row['driving_license'];?>" />
                                </p>
                                
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Passport Number</label>
                                	: <input type="text" name="field2" id="txtfield32" class="input-xlarge" value="<?php echo $row['passport'];?>" />
                                </p>
                                <div class="alert alert-error" id="txterror4" style="display:none;">
                              	<strong>Oh snap!</strong> Change a few things up and try submitting again.
                            	</div><!--alert-->
                               
                               
                                <br />
                                <p>
                                	<button type="submit" class="btn btn-primary" id="acc_update">Update Profile</button>
                                </p>
                                 <?php } } ?>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
