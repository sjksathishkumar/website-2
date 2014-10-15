<?php
$l=1;
include('header.php');
date_default_timezone_get('Asia/Kolkata');
//include("include/functions.php");

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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / PT Slab</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Professional Tax Slab</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			  <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">Configure employee Professional Tax (PT)</h4>
                        <div class="widgetcontent bordered">
                       <a href="PTSlab.php" class="btn btn-success" style="float:right; margin:10px; margin-right:0px;"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;ADD NEW</a>
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            	<thead>
                                	<th>Id</th>
                                    <th>City Name</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                
									<?php 
										$i=1;
										//$resEmp = GetDetailsFromQuery("select * from emp_ptdetails where company_code = '$code'");
										
										//if(count($resEmp)>0){ foreach($resEmp as $data){
											//$pay_name = $data['pay_name'];
											
											$resEmp1 = GetDetailsFromQuery("select * from proft group by name");
											if($resEmp1>0){ foreach($resEmp1 as $data){
											echo '<tr>'	;
														echo '<td>'.$i.'</td>';
														$sid = $data['id'];
														echo '<td>'.$data['name'].'</td>';
														echo '<td>'.$data['amt'].'</td>';
														//echo '<td>'.$data1['amount'].'</td>';
													//	echo '<td><a href="EmpPTSlab.php?name='.$data1['slab_name'].'" class="btn btn-warning"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;Modify</a></td>';
															echo '<td><a href="EditPTSlabStructure.php?id='.$sid.'"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;<i class="icon-edit"></i>Modify</a></td>';
									echo '<td><a href="DeletePTSlab.php?id='.$sid.'" id="PT"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;<i class="icon-trash"></i>Delete</a></td>';	
														
														$i++;
											echo '</tr>'	;
													}
												}
												else
												{
													echo "<tr><td colspan='3'>No Data to Display !!!</td></tr>";
												}

									//		}
									//	}
                                    ?>
                                </tbody>
                            </table>
                        
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
<!--<script type="text/javascript">
$(document).ready(function(){
		// calendar
	$('#calendar').datepicker();
	$("#app_amount").numeric({negative: false });
	$(".btn-success").colorbox({inline:false, width:"600px", title:"Employee Profession Tax Structure" });
	NotificationInfo('divnotifify');
});
</script>-->
</body>
</html>
</script>
</body>
</html>