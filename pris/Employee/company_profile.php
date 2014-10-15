
<h4 class="widgettitle nomargin">Company Profile</h4>
<div class="widgetcontent bordered">
    <div class="row-fluid">
    	<?php if(count($result)>0){ foreach($result as $data){ ?>
         <div class="span3 profile-left">
            
            <h4>Company Logo</h4>
            <div class="profilethumb">
                
                <?php if($data['logo'] != ''){ ?>
                <img src="<?php echo $data['logo'];?>" alt="<?php echo $data['name'];?>" title="<?php echo $data['name'];?>" class="img-polaroid" />
                <?php }else{ ?>
                <img src="img/profilethumb.png" alt="<?php echo $data['name'];?>" title="<?php echo $data['name'];?>" class="img-polaroid" />
                <?php } ?>
            </div><!--profilethumb-->
        </div><!-- span3 -->
        <?php  } } ?>
         
         
         
         <?php if(count($result)>0){ foreach($result as $data){ ?>
         <div class="span9">
            <form action="" class="editprofileform" method="post">
                <h4>General Information</h4>
                <p>
                    <label class="clsLabel2" style="width:120px;">Company Name </label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['name'];?></strong></label>
                    <label class="clsLabel2" style="width:120px; margin-left:100px;">Company ID </label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['domain_name'];?></strong></label><br />
                </p>
                <p>
                    <label class="clsLabel2" style="width:120px;">Company Admin </label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo getAdminDisplayName($data['primary_admin']);?></strong></label>
                    <label class="clsLabel2" style="width:120px; margin-left:100px;">Address</label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['addr'];?></strong></label><br />
                </p>
                <p>
                    <label class="clsLabel2" style="width:120px;">Mail Id</label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['mail_id'];?></strong></label>
                    <label class="clsLabel2" style="width:120px; margin-left:100px;">Website </label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['web_addr'];?></strong></label><br />
                </p>
                <p>
                    <label class="clsLabel2" style="width:120px;">Telephone</label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['telephone'];?></strong></label>
                    <label class="clsLabel2" style="width:120px; margin-left:100px;">Fax Number</label>
                    <label class="clsLabel2" style="width:160px;"> : <strong><?php echo $data['fax_no'];?></strong></label><br />
                </p>
                
         	</form>
         </div><!-- span9 -->
         <?php } } ?>

    </div><!-- row-fluid -->
 </div><!-- widgetcontent -->
