<?php
?>
<h4 class="widgettitle nomargin">ADD NEW EMPLOYEE </h4>
<div class="widgetcontent bordered">
    <div class="row-fluid">
    	
         <div class="span12 profile-left">
            
            <h4>Employee Details</h4>
            <div class="profilethumb">
            </div><!--profilethumb-->
        </div><!-- span3 -->
         
         
         <form action="addemploy.php" class="editprofileform" method="post" enctype="multipart/form-data">
         <div class="span6">
                <p style="border:0px solid #000; float:left;">
                    <label class="clsLabel1" style="width:120px; float:left;">Employee Id : </label>
                    <input type="text" name="field1" class="input-small" readonly="readonly" id="field1" value="<?php echo getEmployeIdPrefix();?>" />
                    <input type="text" name="field2" class="input-small" id="field2" value="" />
                     <!--<span class="help-inline" style="color:#F00; display:none;" id="check"><img src="img/Accept-icon.png" /></span>-->
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Father's Name : </label>
                    <input type="text" name="field3" id="field3" class="input-large" value="" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Date of Birth : </label>
                    <input type="text" name="field4" id="field4" class="input-large" value="" />
                </p>
         </div>
          <div class="span6">

                <p>
                    <label class="clsLabel1" style="width:120px;">Employee's Name : </label>
                    <input type="text" name="field5" id="field5" class="input-large" value="" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Gender : </label>
                    <select name="field6" id="field6" class="uniformselect" style="width:120px;">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Email ID : </label>
                    <input type="text" name="field7" id="field7" class="input-large" value="" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Upload photo : </label>
                    <input type="file" name="field27" id="field27" class="input-large" value="" />
                </p>
             </div>
          <div class="span12" style="margin:0px; padding:0px;">
                <div id="tabs">
                <ul>
                <li><a href="#tabs-1" class="selected">Personal Details</a></li> 
                <li><a href="#tabs-2">Official Details</a></li> 
               <!-- <li><a href="#tabs-3">PF and ESI</a></li> -->
                 <?php /*<li><a href="#tabs-4">Salary Details</a></li> 
                
                <li><a href="#tabs-5">Leave Details</a></li> */ ?>
                
                </ul>
                <div id="tabs-1">
                	<div class="row-fluid">
                        <div class="span12" style="border:0px solid #CCC;">
                            <div class="span6">
                            <h4>Personal Information</h4>
                            <p>
                                <label class="clsLabel1">Address :</label>
                                <textarea name="field8" id="field8" class="input-large"></textarea>
                            </p>
                            <p>
                                <label class="clsLabel1">City : </label>
                                <input type="text" name="field9" id="field9" class="input-large" value="" />
                            </p>
                            <p>
                                <label class="clsLabel1">State :</label>
                                <input type="text" name="field10" id="field10" class="input-large" value="" />
                            </p>
                            <p>
                                <label class="clsLabel1">Pincode :</label>
                                <input type="text" name="field11" id="field11" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1">Phone :</label>
                                <input type="text" name="field12" id="field12" class="input-large" />
                            </p>
                            <p>
                                <label class="clsLabel1">Bank Name : </label>
                                <input type="text"  name="field26" id="field26" class="input-large" value="" /> 
                            </p>
                            <p>
                                <label class="clsLabel1">Passport No : </label>
                                <input type="text" name="field22" id="field22" class="input-large" value="" />
                            </p>
                            </div>
                            <div class="span6" style="padding-top:45px;">
                            
                            <p>
                              <label class="clsLabel1" style="width:120px;">Mobile :</label>
                                <input type="text" name="field13" id="field13" class="input-large" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Emergency No 1 :</label>
                                <input type="text" name="field14" id="field14" class="input-large" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Emergency No 2 :</label>
                                <input type="text" name="field15" id="field15" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Blood Group :</label>
                                <input type="text" name="field16" id="field16" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Martial Status :</label>
                              <input type="text" name="field17" id="field17" class="input-large" value="" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">Bank Account No. : </label>
                                <input type="text"  name="field28" id="field28" class="input-large" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">Bank Branch : </label>
                                <input type="text"  name="field29" id="field29" class="input-large" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">PAN Number :</label>
                                <input type="text"  name="field32" id="field32" class="input-large" />
                            </p>
                            
                            </div>
                        </div>
                        </div>
                </div>
                <div id="tabs-2">
                <div class="row-fluid">
                    <div class="span12" style="border:0px solid #CCC;">
                        <div class="span6">
                        <h4>Official Information</h4>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Date of Join : </label>
                            <input type="text"  name="field18" id="field18" class="input-large" />
                        </p>
                        <!--<p>
                            <label class="clsLabel1" style="width:120px;">Date of resignation : </label>
                            <input type="text"  name="Date of resig" id="field40" class="input-large" />
                        </p>-->
                        <p>
                            <label class="clsLabel1" style="width:120px;">Job Status : </label>
                            <select class="input-large" name="field19" id="field19"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from employee_status order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['status_name'].">".$row['status_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Designation : </label>
                            <select class="input-large" name="field20" id="field20"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_desg order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['des_name'].">".$row['des_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                         <p>
                            <label class="clsLabel1" style="width:120px;">Professional Tax : </label>
                            <select class="input-large" name="field38" id="field38"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from proft order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['name'].">".$row['name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Reporting Manager : </label>
                            <input type="text"  name="field21" id="field21" class="input-large" value="" />
                        </p>
                        <p>
                                <label class="clsLabel1" style="width:120px;">PF Number :</label>
                                <input type="text"  name="field30" id="field30" class="input-large" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">EPF Number :</label>
                                <input type="text"  name="field31" id="field31" class="input-large" value="" />
                            </p>
                            
                            <p>
                                <label class="clsLabel1" style="width:120px;">Select Salary Slab :</label>
                                <?php $result11 =  mysql_query("select slab_name from emp_pay_structure order by id asc");
								for($i=0; $i<mysql_num_rows($result11); $i++)
								{
									$pay_name = mysql_result($result11, $i, 'slab_name');
									echo "<input type='radio' name='field37' id='field37' value='".$pay_name."' />".$pay_name .'&nbsp;&nbsp;&nbsp;&nbsp;';
								}
								/*$val = mysql_query("SELECT * FROM emp_pay_structure WHERE id=53");
								
								while($row=mysql_fetch_assoc($val))
								{ ?>
								<input type="hidden" name="username" id="field38" value="<?php echo $row['value_1']; ?>"/>
								<input type="hidden" name="username" id="field39" value="<?php echo $row['value_6']; ?>"/> 
                                <input type="hidden" name="username" id="field40" value="<?php echo $row['value_2']; ?>"/>
                                <input type="hidden" name="username" id="field41" value="<?php echo $row['value_3']; ?>"/>
                                <input type="hidden" name="username" id="field42" value="<?php echo $row['value_4']; ?>"/>
                                <input type="hidden" name="username" id="field43" value="<?php echo $row['value_5']; ?>"/>
								<?php	
                                    }*/
								?> 
                            </p>
                        	
                       
                        </div>
                        <div class="span6" style="padding-top:45px;">
                        
                        <p>
                          <label class="clsLabel1" style="width:120px;">Department : </label>
                            
                            <select class="input-large" name="field24" id="field24"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_dept order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['dept_name'].">".$row['dept_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                        
                        
                        
                        <p>
                          <label class="clsLabel1" style="width:120px;">Branch Location : </label>
                            <select class="input-large" name="field25" id="field25"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_branch order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['branch_name'].">".$row['branch_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                         <p>
                          <label class="clsLabel1" style="width:120px;">Payment Mode : </label>
                            <input type="text"  name="field23" id="field23" class="input-large" value="" />
                        </p>
                          <p>
                              <label class="clsLabel1" style="width:120px;">PF Join Date :</label>
                                <input type="text"  name="field33" id="field33" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Old PF Amount : </label>
                                <input type="text"  name="field34" id="field34" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">ESI Number :</label>
                                <input type="text"  name="field35" id="field35" class="input-large" />
                            </p>
                            
                             <p>
                                <label class="clsLabel1" style="width:120px;">Salary Amount :</label>
                                <input type="text"  name="field36" id="field36" class="input-large" value="" />
                            </p>
                        
                     
                        </div>
                       
                    </div>
                </div>
</div>
                               
                 
                
                </div>

            <div class="span12" style="margin:0px; padding:0px;">
                <div class="alert alert-error" style="text-align:center; margin-top:10px; display:none;">
                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                </div>
                <div class="alert alert-success" id="Success" style="text-align:center; display:none;">
                <strong>Well done!</strong> You successfully read this important alert message.
                </div>
                  <p class="stdformbutton" style="float:right; margin-top:10px; margin-right:25px;">
            <input type="submit" class="btn btn-primary" value="ADD NEW"/>
            </p>
             </form>
            </div>

          </div><!-- span12 -->

         
    </div><!-- row-fluid -->
 </div><!-- widgetcontent -->
