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
                 
                 <input type="hidden" name="CompCode" id="CompCode" value="<?php echo $code; ?>" />
                  <?php 
				  	$ded = "SELECT * FROM company_details";
					$dequery = mysql_query($ded);
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
                        <?php while($ddd = mysql_fetch_assoc($dequery))
                        {
							if($ddd['pf'] == 0  && $ddd['esi'] == 0)
							{ ?>
                        <th>PF</th>
                        <th>ESI</th>
                        	<?php }
							elseif($ddd['pf'] == 0 && $ddd['esi'] == 1)
							{ ?>
						<th>PF</th>
                        	<?php 
							}
							elseif($ddd['esi'] == 0 && $ddd['pf'] == 1)
							{
							?>
						<th>ESI</th>
                        <?php 
							} }
						?>
						<th>PT</th>
                        <th>Other Deductions</th>	
                        <th>NET PAY</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
					
					session_start();
					 $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
						$retrieve = "SELECT * FROM test3 WHERE month='$month[0]' AND year='$year[0]' AND flag=0";
						$result = mysql_query($retrieve);
						while($row = mysql_fetch_assoc($result)){
							
					?>
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
                         <?php 
						$vp = "SELECT * FROM emp_attendance WHERE emp_id='".$row['emp_id']."'";
						$vpquery = mysql_query($vp);
						while($vvv = mysql_fetch_assoc($vpquery))
						{
						
						
						?>
                        <td><?php echo $vvv['ot']+$vvv['holiday_wages']+$vvv['incent'];?></td>
                        <?php 
						$ded = "SELECT * FROM company_details";
					$dequery = mysql_query($ded);
						 while($ddd = mysql_fetch_assoc($dequery))
						 {
							 if($ddd['pf'] == 0 && $ddd['esi'] == 0)
							 { ?>
                        <td><?php echo round($row['val9'],0,PHP_ROUND_HALF_UP);?></td>
                        <td><?php echo round($row['esval10'],0,PHP_ROUND_HALF_UP);?></td>
                        	 <?php }
							 elseif($ddd['pf'] == 0 && $ddd['esi'] == 1)
							 { ?>
                        <td><?php echo round($row['val9'],0,PHP_ROUND_HALF_UP);?></td>
						<?php
							 }
							elseif($ddd['esi'] == 0 && $ddd['pf'] == 1)
							{ ?>
                           <td><?php echo round($row['esval10'],0,PHP_ROUND_HALF_UP);?></td>
                           <?php  }
						   else{}
						 }
						   
						  $net =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$vvv['ot']+$vvv['holiday_wages']+$vvv['incent']-$row['val9']-$row['esval10']-$row['pt']-$vvv['advance'];
						   ?>
                        <td><?php echo $row['pt'];?></td>
                        <td><?php echo $vvv['advance'];?></td>        
                        <td><?php echo round($net,0,PHP_ROUND_HALF_UP);?></td>
                    </tr>
                    <?php } } }
					session_start();
					 $month = $_SESSION['month_session'];
					 $year = $_SESSION['year_session'];
					$update = "UPDATE test3 SET flag=1 WHERE month='$month[0]' AND year='$year[0]'";
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