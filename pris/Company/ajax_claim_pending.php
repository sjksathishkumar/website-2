<?php
error_reporting();
include_once("../include/config.php");
include("../include/functions.php");
	

?>
<div id="ClaimPending" class="span4">
             <form action="#" class="editprofileform" method="post">
            <p>
                <label class="clsLabel1" style="width:120px;">Processing Month: </label>
                 <select name="pro_month" id="pro_month" class="uniformselect">
				   <?php $resMonth = GetDetailsFromQuery("select month from working_days");
                         if($resMonth>0){ foreach($resMonth as $row){?>
                         <option value="<?php echo $row['month']; ?>"><?php echo $row['month']; ?></option>
                         <?php } } ?>
                 </select>
            </p>
            <p>
                <label class="clsLabel1" style="width:120px;">Description : </label>
                <input type="text" class="input-large" id="rejectdesc" name="rejectdesc" title="" />
            </p>
			<p>
            <label class="clsLabel1" style="width:120px;">&nbsp;</label>
            <a href="#" class="btn btn-success" id="pendingclaim">Pending</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:$.colorbox.close();" class="btn btn-white">Cancel</a>
            </p>
            <p class="response" style="font-size:14px; font-weight:bold; line-height:25px;"><!-- --></p>
            </form>
 		</div>