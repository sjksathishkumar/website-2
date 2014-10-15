
<h4 class="widgettitle nomargin">Edit Profile</h4>
<div class="widgetcontent bordered">
    <div class="row-fluid">
    	<?php if(count($resEmp)>0){ foreach($resEmp as $data){ ?>
         <div class="span3 profile-left">
            
            <h4>Your Profile Photo</h4>
            <div class="profilethumb">
                <a href="EmpPhotoUpload.php?empid=<?php echo $data['emp_id']; ?>&type=emp" id="ProImgChange"><i class="icon-pencil icon-white"></i>Change Thumbnail</a>
                <?php if($data['photo'] != ''){ ?>
                <img src="<?php echo $data['photo'];?>" alt="<?php echo GetEmployeeDisplayName($data['emp_id']);?>" title="<?php echo GetEmployeeDisplayName($data['emp_id']);?>" class="img-polaroid" />
                <?php }else{ ?>
                <img src="img/profilethumb.png" alt="<?php echo GetEmployeeDisplayName($data['emp_id']);?>" title="<?php echo GetEmployeeDisplayName($data['emp_id']);?>" class="img-polaroid" />
                <?php } ?>
            </div><!--profilethumb-->
        </div><!-- span3 -->
        <?php  } } ?>
         
         
         
         <?php if(count($resEmp)>0){ foreach($resEmp as $data){ ?>
         <div class="span9">
            <form action="editprofile.html" class="editprofileform" method="post">
                <h4>General Information</h4>
                <p>
                    <label class="clsLabel1" style="width:120px;">Employee Id : </label>
                    <input type="text" readonly="readonly" name="username" class="input-large" value="<?php echo $data['emp_id'];?>" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Employee Name : </label>
                    <input type="text" name="username" class="input-large" value="<?php echo GetEmployeeDisplayName($data['emp_id']);?>" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Father's Name : </label>
                    <input type="text" name="username" class="input-large" value="" />
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Gender : </label>
                    <select name="select" class="uniformselect">
                        <option value="0">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </p>
                <p>
                    <label class="clsLabel1" style="width:120px;">Date of Birth : </label>
                    <input type="text" name="username" class="input-large" value="<?php echo date('d-m-Y', strtotime($data['dob']));?>" />
                </p>
         	</form>
         </div><!-- span9 -->
         <?php } } ?>
          <div class="span12" style="margin:0px; padding:0px;">
                <div id="tabs">
                <ul>
                <li><a href="#tabs-1" class="selected">Personal Details</a></li> 
                <li><a href="#tabs-2">Official Details</a></li> 
                <li><a href="#tabs-3">PF and ESI</a></li> 
                <li><a href="#tabs-4">Salary Details</a></li> 
              <?php /* <li><a href="#tabs-5">Docments</a></li>  */ ?>
                </ul>
                <div id="tabs-1">
                	<?php /******** Personal Details *******/ include('EmployeePersonalDetails.php')?>
                </div>
                <div id="tabs-2"><?php /******** Official Details *******/  include('EmployeeOfficialDetails.php')?></div>
                <div id="tabs-3">
                    <div class="row-fluid">
                    <?php if(count($resEmp)>0){ foreach($resEmp as $data){ ?>
                        <div class="span12" style="border:0px solid #CCC;">
                            <form action="" class="editprofileform" method="post" enctype="multipart/form-data">
                            <div class="span6">
                            <h4>PF and ESI Information</h4>
                            <p>
                                <label class="clsLabel1" style="width:120px;">PF Number :</label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="<?php echo $data['pf_no'];?>" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">EPF Number :</label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">PAN Number :</label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="<?php echo $data['pan_no'];?>" />
                            </p>
                           
                            </div>
                            <div class="span6" style="padding-top:45px;">
                            
                            <p>
                              <label class="clsLabel1" style="width:120px;">PF Join Date :</label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">Old PF Amount : </label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="" />
                            </p>
                            <p>
                              <label class="clsLabel1" style="width:120px;">ESI Number :</label>
                                <input type="text" readonly="readonly" name="username" class="input-large" value="<?php echo $data['esi_no'];?>" />
                            </p>
                            
                            </div>
                            
                            
                            
                            </form>
                        </div>
                    <?php } } ?>
                    </div>                
                    
                 </div>
                <div id="tabs-4">
                    <div class="span12" style="border:0px solid #CCC;">
                    <form action="" class="editprofileform" method="post" enctype="multipart/form-data">
                    <div class="span6">
                    <h4>Salary Details</h4>
                    <p>
                        <label class="clsLabel1" style="width:120px;">Amount :</label>
                        <input type="text"  name="Salary Amount" id="field36" readonly="readonly" class="input-large" value="" />
                    </p>
                    <p>
                        <label class="clsLabel1" style="width:120px;">Select Salary Slab :</label>
                        <?php $result11 =  mysql_query("select slab_name  from emp_pay_structure order by id asc");
                        for($i=0; $i<mysql_num_rows($result11); $i++)
                        {
                            $pay_name = mysql_result($result11, $i, 'slab_name');
                            echo "<input type='radio' name='PayType' id='field".($i+37)."' value='".$pay_name."' />".$pay_name .'&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        ?>
                    </p>
                    </div>
                    
                    </div>
                </div>
                <?php /*    <div id="tabs-5">
                        <div class="row-fluid">
                        <h4 class="tab-head">Upload your Documents</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Discription</th>
                                    <th>Add / Edit Attachments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pan Card</td>
                                    <td>Pan Card Image</td>
                                    <td><span class="field">
                            	<input type="file" class="uniform-file" name="filename" />
                            </span><a href="#" class="btn btn-primary">Upload</a></td>
                                </tr>
                            </tbody>
                        </table>                    
                    	</div>
                    
                    </div>
                </div> */ ?>
                
                </div>
                <p>
                    <label class="clsLabel1" style="width:120px;">&nbsp;</label>
                    <input type="submit" name="button" class="btn btn-success" value="Update" style="margin-left:5px;" />
                </p>
          </div><!-- span12 -->
         
    </div><!-- row-fluid -->
 </div><!-- widgetcontent -->