<?php
$l=2;
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
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
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
                <li class="active">Dashboard/ New Employee</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard/ New Employee</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
			  <a href="personaldetails.php"><button type="button" class="btn btn-success" style="float:left; margin:10px; margin-right:0px;">Create Employee</button></a>
              </br><a href="UploadEmployeeDetails.php"><button type="button" class="btn btn-success" style="float:right;">Import Employee</button></a>
              <!--</br><a href="up.php"><button type="button" class="btn btn-success" style="float:right;">Import Employee</button></a>-->
                <p>&nbsp;</p>
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
                              <th>Sl. No.</th>
                              <th>Employee Id</th>
                              <th>Employee Name</th>
                              <th>Designation</th>
                              <th>Department</th>
                              <th>DOJ</th>
                              <th>Status</th>
                             <th>Actions</th>
                          </tr>
                      </thead>   
                      <tbody>
                      <?php $resEmp = GetDetailsFromQuery("select * from emp_details order by id asc");
					  if($resEmp>0){ $z = 1; foreach($resEmp as $data){ ?>
                     
                      <tr id="del_<?php echo $data['emp_id'];?>">
                      	<td><?php echo $z;?></td>
                        <td><?php echo $data['emp_id'];?></td>
                        <td><?php echo $data['emp_name'];?></td>
                        <td><?php echo $data['desig'];?></td>
                        <td><?php echo $data['dpt_name'];?></td>
                        <td><?php echo $data['doj'];?></td>
                        <td><?php echo $data['job_status'];?></td>
                        
                        <td class="center"> 
                            <a class="" href="editemployee.php?empid=<?php echo $data['emp_id']; ?>">Edit</a><?php /* | 
                            <a class="" href="#" id="DelEmp" name="<?php echo $data['emp_id'];?>">Delete</a> */?>
                        </td>
                      </tr>
                      <?php $z++; } }?>
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
</body>
</html>