<?php
$l=1;
include('header.php');
date_default_timezone_get('Asia/Kolkata');
//include("include/functions.php");

if(!isset($_SESSION['username']))
{
	Header('Location:index.php');
}
include_once("include/config.php");
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
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>

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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / Deductions Structure</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Deductions Structure</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			  <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">EMPLOYEE Deductions</h4>
                        <div class="widgetcontent bordered">
                    <?php 
					
					$val = "SELECT * FROM company_details";
					$query = mysql_query($val);
					while($rrr = mysql_fetch_assoc($query))
					{ 
					 		if($rrr['pf'] == 0 && $rrr['esi'] == 0)
							{
								$one = "SELECT * FROM deduct";
								$onequery = mysql_query($one);
								$count = mysql_num_rows($onequery);
								
								if($count > 0)
								{
	echo "<a href='' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;EDIT</a>";
								while($rows = mysql_fetch_array($onequery)){ ?>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
                            	<thead>
                                	<th>S.NO</th>
                                    <th>Pay Slip Header</th>
                                </thead>
                                <tbody>
									<td>
										<?php echo $rows['seven'];?>
                                    </td>
                                    <td>
										<?php echo $rows['six'];?>
                                    </td>
                                </tbody>
                 </table><?php }
								}
								else
								{
	echo "<a href='deduction.php' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;ADD NEW</a>";
								}
							}
							elseif($rrr['esi'] == 0 && $rrr['pf'] == 1)
							{
								$one = "SELECT * FROM deduct1";
								$onequery = mysql_query($one);
								$count = mysql_num_rows($onequery);
								
								if($count > 0)
								{
echo "<a href='' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;EDIT</a>";
		while($rows = mysql_fetch_array($onequery)){ ?>
	<table class='table table-striped table-bordered bootstrap-datatable datatable'>
                            	<thead>
                                	<th>S.NO</th>
                                    <th>Pay Slip Header</th>
                                </thead>
                                <tbody>
									<td>
										<?php echo $rows['seven'];?>
                                    </td>
                                    <td>
										<?php echo $rows['six'];?>
                                    </td>
                                </tbody>
                 </table> <?php }
								}
								else
								{
	echo "<a href='deduction.php' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;ADD NEW</a>";
								}
							}
							elseif($rrr['esi'] == 1 && $rrr['pf'] == 0)
							{
								$one = "SELECT * FROM deduct2";
								$onequery = mysql_query($one);
								$count = mysql_num_rows($onequery);
								
								
								if($count > 0)
								{
echo "<a href='' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;EDIT</a>";
										while($rows = mysql_fetch_array($onequery)){?>
	<table class='table table-striped table-bordered bootstrap-datatable datatable'>
                            	<thead>
                                	<th>S.NO</th>
                                    <th>Pay Slip Header</th>
                                </thead>
                                <tbody>
									<td>
										<?php echo $rows['seven'];?>
                                    </td>
                                    <td>
										<?php echo $rows['six'];?>
                                    </td>
                                </tbody>
                 </table><?php }
								}
								else
								{
	echo "<a href='deduction.php' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;ADD NEW</a>";
								}
							}
							else
							{
								$one = "SELECT * FROM deduct3";
								$onequery = mysql_query($one);
								$count = mysql_num_rows($onequery);
								
								if($count > 0)
								{
echo "<a href='' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;EDIT</a>";
										while($rows = mysql_fetch_array($onequery)){ ?>
	<table class='table table-striped table-bordered bootstrap-datatable datatable'>
                            	<thead>
                                	<th>S.NO</th>
                                    <th>Pay Slip Header</th>
                                </thead>
                                <tbody>
									<td>
										<?php echo $rows['seven'];?>
                                    </td>
                                    <td>
										<?php echo $rows['six'];?>
                                    </td>
                                </tbody>
                 </table><?php }
								}
								else
								{
	echo "<a href='deduction.php' class='btn btn-success' style='float:right; margin:10px; margin-right:0px;'><i class='icon-pencil icon-white'></i>&nbsp;&nbsp;ADD NEW</a>";
								}
							}
							
					}?>
               		
               
                  
                   
                   
					 
					 
					
                    
               
               			
                        </div>
                 </div><!-- span12 -->
             	</div><!-- row-fluid -->
   
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
	//$(".btn-warning").colorbox({inline:false, title:"Employee Salary Detials" });
	//$(".btn-success").colorbox({inline:false, title:"Employee Salary Detials" });
	NotificationInfo('divnotifify');
});
</script>
</body>
</html>