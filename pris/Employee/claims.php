
<h4 class="widgettitle nomargin">Claim Details</h4>
<div class="widgetcontent bordered">
    <div class="row-fluid">
    	<a href="#Claims" class="btn btn-primary" id="NewClaims" style="float:right;margin-bottom:10px;">New Claims</a>
        <table class="table table-bordered dataTables_wrapper">
        	<thead>
            	<tr bgcolor="#BBB">
                	<th>Sl. No</th>
                    <th>Claimed Month</th>
                    <th>Processed Month</th>
                    <th>Req. Amount</th>
                    <th>App. Amount</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	<?php $i=1; if($resEmp>0){ foreach($resEmp as $data){ ?>
                <tr>
                	<td><?php echo $i;?></td>
                    <td><?php echo $data['claim_month'];?></td>
                    <td><?php echo $data['claim_pro_month'];?></td>
                    <td><?php echo $data['claim_amount'];?></td>
                    <td><?php echo $data['app_amount'];?></td>
                    <td><?php echo $data['claim_status'];?></td>
                    <td><?php echo $data['description'];?></td>
                    <td><a href="#">Edit</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Delete</a></td>
                </tr>
                <?php $i++; } }else { echo "<td colspan='8'>Nothing to display !!!</td>"; } ?>
            </tbody>
        </table>
    </div><!-- row-fluid -->
 </div><!-- widgetcontent -->


<div style="display:none;">
	<div id="Claims" style='padding:10px; background:#fff;'>
    <h4 class="tab-head">Request New Claims</h4>
    <table class="table table-bordered dataTables_wrapper">
    	<tr>
        	<th>Discription</th>
            <th>Amount</th>
            <th>Date</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
        	<input type="hidden" name="claim_id" id="claim_id" value="<?php echo $username; ?>" />
            <td><input type="text" name="claim_desc" class="input-small" id="claim_desc" /></td>
            <td><input type="text" name="claim_amount" class="input-small" id="claim_amount" /></td>
            <td><input type="text" name="claim_date" class="input-small" id="claim_date" /></td>
            <td><input type="submit" name="claim_desc" class="btn btn-primary" id="SubmitClaim" /></td>
        </tr>
    </table>
    			<div class="alert alert-error" id="claim_error" style="width:250px; margin-top:15px; display:none;">
                    * This Field can't be Empty !!!
                </div>
                <div class="alert alert-success" id="claim_success" style="width:250px; margin-top:15px;display:none;">
                    * This Field can't be Empty !!!
                </div>
    
    </div>
</div>