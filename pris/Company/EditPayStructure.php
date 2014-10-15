<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<script language="javascript" type="text/javascript" src="../scripts/script.js"></script>
<?php
error_reporting();
include_once("../include/config.php");
include("../include/functions.php");
if(($_GET['id']) && ($_GET['id']!= ''))
{
	$sid = $_GET['id']; 
	$result = mysql_query("select * from  emp_pay_structure where id = $sid");
	
	?>
<div class="maincontent">
    <div class="contentinner content-dashboard">
        <div class="widgetcontent">
            <div class="row-fluid">
                <div class="span12" style="width:500px;" >
                <form action="#" class="editprofileform" method="post">
                    
                        <?php	while($data=mysql_fetch_array($result)){
								$table_name=$data['table_name'];
								//$table_name=$row['table_name'];
								
						?>
                        <div class="span12">
                        <input type="hidden" value="<?php echo $sid; ?>" id="user_id" />
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>Structure Name</strong></label>
                            : &nbsp;<input type="text" readonly name="username" id="field1" class="input-small" value="<?php echo $name = $data['pay_name'];?>" />
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>Structure Type</strong></label>
                            : &nbsp;<input type="text" readonly name="username" id="field2" class="input-small" value="<?php echo $data['pay_type'];?>" />
                        </p>
                        
                        <?php if($data['pay_type'] == 'gross_pay' || $data['pay_type'] == 'CTC' ){
							$result1 = mysql_query("select * from $table_name");
							  $nrows = mysql_num_rows($result1);
							  $nrows = $nrows-1;
							  ?><p>
                            <label class="clsLabel2" style="width:200px;"><strong>Basic Pay</strong></label>
                            : &nbsp;<input type="text" name="username" id="field3" class="input-small" value="<?php echo mysql_result($result1, 10, 'value'); ?>" />
                        </p><?php 
							  }else{?>
                        <?php $result1 = mysql_query("select * from $table_name");
							  $nrows = mysql_num_rows($result1);
							  }
							  for($i=0; $i<$nrows; $i++)
							  {
						?>
                        <p>
                            <input type="hidden" value="<?php echo $i; ?>" id="field_res" />
                            <label class="clsLabel2" style="width:200px;"><strong><?php echo mysql_result($result1, $i, 'fields'); ?></strong></label>
                            : &nbsp;<input type="text" name="username" class="input-small" id="field<?php echo $i+4; ?>" value="<?php echo mysql_result($result1, $i, 'value'); ?>" />
                            
                            <select class="input-medium" id="field_<?php echo $i+4; ?>">
                            	<?php 	$result2 = mysql_query("select * from salary_temp where name ='$name'"); 
										$n_rows = mysql_num_rows($result2);
									  	for($j=0; $j<$n_rows; $j++)
									  	{ if((mysql_result($result2, $j, 'type')) == (mysql_result($result1, $i, 'cal_from'))) {?>
                            	<option value="<?php echo mysql_result($result2, $j, 'type'); ?>" selected><?php echo mysql_result($result2, $j, 'type'); ?></option>
                                
                                <?php 	}else { ?>
                                <option value="<?php echo mysql_result($result2, $j, 'type'); ?>"><?php echo mysql_result($result2, $j, 'type'); ?></option>
								<?php }
								  } ?>
                            </select>
                        </p>
                        <?php 	}?>
                         
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>ESI Slab</strong></label>
                            <?php $result12 =  mysql_query("select pay_name from esi_master group by pay_name");
							for($i=0; $i<mysql_num_rows($result12); $i++)
							{
							$pay_name1 = mysql_result($result12, $i, 'pay_name');
							?>
                            : &nbsp;<input type='radio' name='slab2' value='<?php echo $pay_name1;?>' />&nbsp;&nbsp;<?php echo $pay_name1;?>
                            <?php } ?>
                        </p>
                        
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>EPF Slab</strong></label>
                            <?php $result13 =  mysql_query("select pay_name from pf_master group by pay_name");
							for($i=0; $i<mysql_num_rows($result13); $i++)
							{
							$pay_name2 = mysql_result($result13, $i, 'pay_name');
							?>
                            : &nbsp;<input type='radio' name='slab3' value='<?php echo $pay_name2;?>' />&nbsp;&nbsp;<?php echo $pay_name2;?>
                            <?php } ?>
                        </p>
                        
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>PT Slab</strong></label>
                            <?php $result14 =  mysql_query("select pay_name from emp_ptdetails group by pay_name");
							for($i=0; $i<mysql_num_rows($result14); $i++)
							{
							$pay_name4 = mysql_result($result14, $i, 'pay_name');
							?>
                            : &nbsp;<input type='radio' name='slab4' value='<?php echo $pay_name4;?>' />&nbsp;&nbsp;<?php echo $pay_name4;?>
                            <?php } ?>
                        </p>
                       
                        <div id="TextBoxesGroup"></div>
                        <p>
                            <label class="clsLabel2" style="width:200px;">&nbsp;</label>
                            <?php /*&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-primary" id="AddNewField" value="Add New Field"  /> */?>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="username" id="UpdatePayStruc" class="btn btn-success" value="Update" />
                        </p>
                        
                        </div>
						<?php	
							}
						?>
                </form>
                </div>
            </div>
    	</div>
    </div>
</div>
<?php }
?>