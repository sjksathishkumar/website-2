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
 <!--<a class="btn btn-primary" style="float:right; margin-right:10px; margin-bottom:10px;" href="EmployeePayGen.php"><i class="icon-upload icon-white"></i>&nbsp;&nbsp;Run Payroll</a>-->
                   <form action="" method="post" >
                        <select name="month[]">
                        	<option value="select">month</option>
                        	<option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
							<option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                        </select>
                          <select name="year[]">
                        	<option value="select">year</option>
                        	<option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                        </select>
                         &nbsp;&nbsp;<input class="btn btn-success" style="margin-right:0px; margin-bottom:10px;" type="submit" value="List Employee"/>
                        <p>NOTE: YOU CAN VIEW ONLY FOR THE MONTH OF COMPLETED PAYROLL</p>
                        </form>
                 
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
							}
							else{}
							
							if($ddd['pt'] == 0)
							{ ?>
                            
							<th>PT</th>	
                            <?php 
							}
						}
						?>
                       
                        <th>NET PAY</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
						if($_POST)
						{
						$value = $_POST['month'];
						$year = $_POST['year'];
						$retrieve = "SELECT * FROM test3 WHERE month='$value[0]' AND year='$year[0]' AND flag=1";
						$result = mysql_query($retrieve);
						while($row = mysql_fetch_assoc($result)){
							$ded = "SELECT * FROM company_details";
					$dequery = mysql_query($ded);
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
						
						/*******Note in company_details table pf,esi,pt,  if zero should display if one should not display**********/
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
							if($ddd['pt'] == 0)
							{ ?>
                            
							<td><?php echo $row['pt'];?></td> 
							<?php }
						
						 }
						   
						   $net =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']-$row['val9']-$row['esval10']-$row['pt'];
						   ?>
                       
                        <td><?php echo round($net,0,PHP_ROUND_HALF_UP);?></td>
                    </tr>
                    <?php } } } ?>
                    
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