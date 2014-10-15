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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / PAY Structure</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>PAY Structure</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			  <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">EMPLOYEE PAY STRUCTURE</h4>
                        <div class="widgetcontent bordered">
                        <a href="paystruc.php" class="btn btn-success" style="float:right; margin:10px; margin-right:0px;"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;ADD NEW</a>
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            	<thead>
                                	<th>Id</th>
                                    <th>Salb Name</th>
                                    <?php /*<th>Amount</th> */?>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                
									<?php 
										$i=1;
										$resEmp = GetDetailsFromQuery("select * from  emp_pay_structure order by id asc");
										
										if($resEmp>0){ foreach($resEmp as $data){
											$pay_name = $data['slab_name'];
											?>
											 <tr class="edit_td" id="del_<?php echo $data['id'];?>">
											<?php
                                            $resEmp1 = GetDetailsFromQuery("select * from  emp_pay_structure where slab_name = '$pay_name'");
											if(count($resEmp1)>0){ foreach($resEmp1 as $data1){
														echo '<td>'.$i.'</td>';
														$sid = $data1['id'];
														echo '<td>'.$data1['slab_name'].'</td>';
														//echo '<td>'.$data1['pay_type'].'</td>';
														//echo '<td>'.$data1['amount'].'</td>';
													//	echo '<td><a href="EditPayStructure.php?id='.$sid.'" class="btn btn-warning"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;Modify</a></td>';
														echo '<td><a href="EditPayStructure.php?id='.$sid.'" ><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;<i class="icon-edit"></i>Modify</a></td>';
									echo '<td><a href="#" id="DelPay" name="'.$data['slab_name'].'"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;<i class="icon-trash"></i>Delete</a></td>';					
														$i++;
													}
												}
											echo '</tr>'	;

											}
										}
										else
											{
												echo '<tr>'	;
												echo '<td colspan="4">There is no Slab Defined....</td>';
												echo '</tr>'	;
											}
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