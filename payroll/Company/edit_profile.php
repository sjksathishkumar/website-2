<form action="#" class="editprofileform" method="post">

<div class="row-fluid">
    <div class="span3 profile-left">
        <h4>Compnay Profile Photo</h4>
        
        <div class="profilethumb">
            <a href="CompanyLogoUpload.php">Change Thumbnail</a>
            <?php $photo = GetCompanyLogo($code); if($photo == ''){?>
            <img src="img/profilethumb.png" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($code);?>" class="img-polaroid" />
            <?php } else {?>
            <img src="<?php echo $photo; ?>" width="177px" height="171px" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($code);?>" class="img-polaroid" />
            <?php } ?>
        </div><!--profilethumb-->
    </div><!--span3-->
    <div class="span9">
    
        <?php
		$ComResult = GetDetailsFromQuery("select * from company_details where domain_name = '$code'");
		if($ComResult>0){
			foreach($ComResult as $row){
		?>
        <div id="LoginInfo"></div>
        <input type="hidden" id="row_id" value="<?php echo $_GET['id'];?>" />
        <input type="hidden" id="ret_url" value="<?php echo $_GET['ref'];?>" />
        <input type="hidden" id="edit_type" value="UserAdmin" />
        <h4>Login Information</h4>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Company Name</label>
            : <input type="text" name="field1" id="txtfield1" class="input-xlarge" value="<?php echo GetCompanyName($row['domain_name']);?>"  readonly="readonly"/>
        </p>
       <!-- <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Company Address</label>
            :<textarea name="address">
            
             <?php //echo GetCompanyName($row['domain_name']);?>
            </textarea>
        </p>
      -->
      
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Domain Name</label>
            : <input type="text" name="field2" id="txtfield2" readonly class="input-xlarge" value="<?php echo $row['domain_name'];?>" />
        </p>
       <!-- <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Master Admin Username</label>
            : <input type="text" name="field2" id="txtfield3" readonly class="input-xlarge" value="<?php // echo GetCompanyAdminUserName($row['domain_name']);?>" />
        </p>-->
        <?php if($row['emp_prefix'] == ''){ ?>
        
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Employee Prefix</label>
            : <input type="text" name="field2" id="txtfield4" class="input-xlarge" value="<?php echo $row['emp_prefix'];?>" />
            <span style="color:red;">You can edit it only once !!!</span>
        </p>
        <?php } else { ?>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Employee Prefix</label>
            : <input type="text" name="field2" id="txtfield4" readonly="readonly" class="input-xlarge" value="<?php echo $row['emp_prefix'];?>" />
        </p>
        <?php } ?>
        
        <div class="alert alert-error" id="txterror1" style="display:none;">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
        </div><!--alert-->
        
         <p>
            <button type="submit" class="btn btn-primary" id="update_login">Update Profile</button>
        </p>
        
        <?php } }/* ?>
        <br />
        
        <h4>Admin Information</h4>
        <div id="PerInfo"></div>
        <?php
            $pinfo = GetDetailsFromQuery("select * from company_admin where company_code = '$code'");
            if($pinfo>0){
                foreach($pinfo as $row1){
        ?>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">User Name</label>
            : <input type="text" name="field1" id="txtfield5" class="input-xlarge" value="<?php echo $row1['user_name'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Display Name</label>
            : <input type="text" name="field1" id="txtfield6" class="input-xlarge" value="<?php echo $row1['display_name'];?>" />
        </p>
                
        <div class="alert alert-error" id="txterror2" style="display:none;">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
        </div><!--alert-->
        
         
        <?php } } 
        <p>
            <button type="submit" class="btn btn-primary" id="personal_update">Update Profile</button>
        </p>
		*/?>
        <br />
        
        <h4>Company Information</h4>
        <div id="CompInfo"></div>
        <input type="hidden" id="row_id" value="<?php echo $_GET['id'];?>" />
        <input type="hidden" id="ret_url" value="<?php echo $_GET['ref'];?>" />
        
        <?php
            $pinfo = GetDetailsFromQuery("select * from company_details where domain_name = '$code'");
            if($pinfo>0){
                foreach($pinfo as $row){
        ?>
        
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Email Id</label>
            : <input type="text" name="field2" id="txtfield13" class="input-xlarge" value="<?php echo $row['mail_id'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Website</label>
            : <input type="text" name="field2" id="txtfield14" class="input-xlarge" value="<?php echo $row['web_addr'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Pan No</label>
            : <input type="text" name="field2" id="txtfield15" class="input-xlarge" value="<?php echo $row['pan_no'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Tan No</label>
            : <input type="text" name="field2" id="txtfield16" class="input-xlarge" value="<?php echo $row['tan_no'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Telephone No.</label>
            : <input type="text" name="field2" id="txtfield17" class="input-xlarge" value="<?php echo $row['telephone'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Mobile No.</label>
            : <input type="text" name="field2" id="txtfield18" class="input-xlarge" value="<?php echo $row['mobile_no'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Fax No.</label>
            : <input type="text" name="field2" id="txtfield19" class="input-xlarge" value="<?php echo $row['fax_no'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Address</label>
            : <input type="text" name="field2" id="txtfield20" class="input-xlarge" value="<?php echo $row['addr'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Contact Person</label>
            : <input type="text" name="contactperson" id="txtfield21" class="input-xlarge" value="<?php echo $row['contactperson'];?>" />
        </p>
        <p>
            <label class="clsLabel" style="padding-top:0px; width:200px;">Contact Person Mobile</label>
            : <input type="text" name="contactmobile" id="txtfield22" class="input-xlarge" value="<?php echo $row['contactmobile'];?>" />
        </p>
        <div class="alert alert-error" id="txterror3" style="display:none;"></div>
        <p>
            <button type="submit" class="btn btn-primary" id="comp_update">Update Profile</button> <button type="submit" class="btn btn-primary" id="comp_update" onclick="window.history.back();">Cancel</button>
        </p>
        <?php } } ?>

</div>
</div>
</form>