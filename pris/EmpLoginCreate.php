<?php
$l=6;
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
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
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
                              <th class="center">Employee Id</th>
                              <th class="center">Employee Name</th>
                              <th class="center">Password</th>
                              <th class="center">Status</th>
                             <?php  /*<th>Actions</th> */?>
                          </tr>
                      </thead>   
                      <tbody>
                      <?php $resEmp = GetDetailsFromQuery("select * from emp_details order by id desc");
					  if($resEmp>0){ foreach($resEmp as $data){ ?>
                      <tr id="del_<?php echo $data['emp_id'];?>">
                        <td><?php echo $data['emp_id'];?></td>
                        <td><?php echo GetEmployeeDisplayName($data['emp_id']);?></td>
                        <td><?php echo date('dmy', strtotime($data['dob']));?></td>
                        <td>
                        
                        	<input type="hidden" id="ret_url" value="<?php echo $_GET['ref']; ?>" />
							<?php $status = GetEmpLoginStatus($data['emp_id']);
							$rowid = $data['emp_id'];
							if($status == 0)
							{
								echo '<a class="btn btn-danger disabled" href="#">Disabled</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     									
									  <a class="btn btn-success" href="#" id="EnableLogin" name="'.$rowid.'">Enable</a>';
							}
							else
							{
								echo '<a class="btn btn-success disabled" href="#" id="$rowid">Enabled</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <a class="btn btn-danger" href="#" id="DisableLogin" name="'.$rowid.'">Disable</a>';
							}?>
                         </td>
                        
                        
                         <?php  /*
                        <td class="center">
                            <a class="" href="ViewEmpDetails.php?ref=<?php echo base64_encode($category); ?>&empid=<?php echo $data['emp_id'];?>">View</a> | 
                            <a class="" href="EditEmployee.php?ref=<?php echo base64_encode($category); ?>&cmpcode=<?php echo base64_encode($code);?>&empid=<?php echo base64_encode($data['emp_id']); ?>">Edit</a><?php /* | 
                            <a class="" href="#" id="DelEmp" name="<?php echo $data['emp_id'];?>">Delete</a> */?>
                      </tr>
                      <?php } } ?>
                    </tbody>
                </table>
  
   
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