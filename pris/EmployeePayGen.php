<?php
$l=4;
include('header.php');

if(!isset($_SESSION['username']))
{
	Header('Location:index.php');
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BassPris | Admin Dashboard</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="Colorbox/colorbox.css" type="text/css" />

<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="Colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

<script type="text/javascript" src="scripts/loadcontent.js"></script>
<script type="text/javascript" src="js/jquery.numeric.js"></script>

</head>

<body>
<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    
	<?php include("include/navigation.php");?> 
         
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<?php include("include/header.php");?>	
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li class="active">Dashboard / Employee Payroll Preview</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / Employee Payroll Preview</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
                <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">EMPLOYEE PAYROLL PREVIEW</h4>
                        
                     <div class="widgetcontent bordered" id="ListAttandance">
 <a class="btn btn-primary" id="btnd" style="float:right; margin-right:10px; margin-bottom:10px;" href="convertpdf.php">&nbsp;&nbsp;Payslip Download</a>
<a class="btn btn-primary" style="float:right; margin-right:10px; margin-bottom:10px;" href="runmail.php"><i class="icon-upload icon-white"></i>&nbsp;&nbsp;Send Mail</a>
                 
                 <input type="hidden" name="CompCode" id="CompCode" value="<?php echo $code; ?>" />
                  <?php
				  include_once("include/config.php");
				  	
					$head = "SELECT * FROM emp_payslip WHERE uniq=1";
					$val = mysql_query($head);
					while($rows = mysql_fetch_assoc($val))
					{
				?>
                 <div style="color:red;">
                   <p>&nbsp;</p>
                  <!-- <p>Note: If pay slab is not configured for the employee then Default payslab will calculated !!!</p>-->
                 </div>
                 
                 
                 <table class="table table-bordered" id="dyntable">
                <colgroup>
                    <col class="con0" style="align: center; width: 4%" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                </colgroup>
               
                 	<thead>
                    <tr>
                        
                        <th>Emp Id</th>
                        <th><?php echo $rows['one'];?></th>
                        <th><?php echo $rows['two'];?></th>
                        <th><?php echo $rows['three'];?></th>
                        <th><?php echo $rows['four'];?></th>
                        <th><?php echo $rows['five'];?></th>
                        <th><?php echo $rows['six'];?></th>
                        <th><?php echo $rows['seven'];?></th>
                        <th><?php echo $rows['eight'];?></th>
                        <th>Variable Pay</th>
                        <th>Gross Pay</th>
                        <th>PF</th>
                        <th>ESI</th>
                        <th>PT</th>
                        <th>Other Deductions</th>
                        <th>NET PAY</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
					
					session_start();
					 $value = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
					 
						if($value[0] == January)
						{$retrieve = "SELECT * FROM jan WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == February){$retrieve = "SELECT * FROM feb WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == March){$retrieve = "SELECT * FROM march WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == April){$retrieve = "SELECT * FROM april WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == May){$retrieve = "SELECT * FROM may WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == June){$retrieve = "SELECT * FROM june WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == July){$retrieve = "SELECT * FROM july WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == August){$retrieve = "SELECT * FROM august WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == September){$retrieve = "SELECT * FROM september WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == October){$retrieve = "SELECT * FROM october WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == November){$retrieve = "SELECT * FROM november WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						else if($value[0] == December){$retrieve = "SELECT * FROM december WHERE month='$value[0]' AND year='$year[0]' AND flag=0";}
						$result = mysql_query($retrieve);
						while($row = mysql_fetch_assoc($result)){
						$vpay = $row['ot']+$row['holiday_wages']+$row['incent'];                     
$gross =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['ot']+$row['holiday_wages']+$row['incent'];
$net =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['ot']+$row['holiday_wages']+$row['incent']-$row['val9']-$row['esval10']-$row['pt']-$row['advance'];?>	
					
                     <tr>
                        <td><?php echo $row['emp_id']; ?></td>
						<td><?php echo round($row['val1'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val2'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val3'],0,PHP_ROUND_HALF_UP); ?></td>
						<td><?php echo round($row['val4'],0,PHP_ROUND_HALF_UP); ?></td>	
						<td><?php echo round($row['val5'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val6'],0,PHP_ROUND_HALF_UP); ?></td>	
						<td><?php echo round($row['val7'],0,PHP_ROUND_HALF_UP);?></td>
                        <td><?php echo round($row['val8'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($vpay,0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($gross,0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val9'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['esval10'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['pt'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['advance'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($net,0,PHP_ROUND_HALF_UP); ?></td>
                    </tr>
                    
                    <?php } } 
					session_start();
					 $value = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
					
					    if($value[0] == January){$update = "UPDATE jan SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == February){$update = "UPDATE feb SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == March){$update = "UPDATE march SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == April){$update = "UPDATE april SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == May){$update = "UPDATE may SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == June){$update = "UPDATE june SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == July){$update = "UPDATE july SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == August){$update = "UPDATE august SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == September){$update = "UPDATE september SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == October){$update = "UPDATE october SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == November){$update = "UPDATE november SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
						else if($value[0] == December){$update = "UPDATE december SET flag=1 WHERE month='$value[0]' AND year='$year[0]'";}
					$val = mysql_query($update);
					
					
					?>
                    
                    </tbody>
                    
                </table>
                
                <table>
                <tr style="color:red">
                    	<!--<td colspan="4"><strong>NET PAYROLL FOR THE MONTH OF JUNE </strong><?php //echo strtoupper(convert_digit_to_words($tot_net)); ?></td>-->
                       
                    </tr>
                </table>
            </div>
          </div>
          </div>  
            
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
  <!--footer-->
<?php include("include/footer.php");?>
    
</div><!--mainwrapper-->
<script type="text/javascript">
$(document).ready(function(){
		// calendar
	$('#calendar').datepicker();
	$("#app_amount").numeric({negative: false });
	NotificationInfo('divnotifify');

});
</script>
</body>
</html>