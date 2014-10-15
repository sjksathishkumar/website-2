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

<script type="text/javascript" src="scripts/AddNewEmployee.js"></script>
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
                <li class="active">Dashboard / ADD New Employee</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / ADD New Employee</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  <?php 
  include_once("include/config.php");
  $emp_id = $_GET['empid'];
  
  $val = "SELECT * FROM emp_details WHERE emp_id='".$emp_id."'";
  $valquery = mysql_query($val);
  while($row = mysql_fetch_assoc($valquery))
  {
  ?>
  
  <!-----------------------------------form start----------------------------------------------------->
   <form action="editofficialdetails.php" class="editprofileform" method="post" enctype="multipart/form-data">
                   <div class="span6">
                    <p>
                    <label class="clsLabel1" style="width:120px; float:left;">Employee Id : </label>
                    <input type="text" name="emp_id" class="input-large" value="<?php echo $row['emp_id'];?>" readonly/>
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Employee's Name : </label>
                    <input type="text" name="emp_name"  class="input-large"  value="<?php echo $row['emp_name'];?>" required/>
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Date of Birth : </label>
                    <input type="text" name="dob" class="input-large"  value="<?php echo $row['dob'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Father's Name : </label>
                    <input type="text" name="fname"  class="input-large"  value="<?php echo $row['f_name'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Gender : </label>
                    <select name="gender" id="" class="uniformselect" style="width:120px;">
                        <option  value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Email ID : </label>
                    <input type="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" name="email" id="" class="input-large"  value="<?php echo $row['mail_id'];?>" required/>
                    </p>
                    <p>
                    <label class="clsLabel1">Address :</label>
                    <textarea name="addr" id="" class="input-large"><?php echo $row['addr'];?></textarea>
                    </p>
                    <p>
                    <label class="clsLabel1">City : </label>
                    <input type="text" name="city" id="" class="input-large"  value="<?php echo $row['city'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1">State :</label>
                    <input type="text" name="state" id="" class="input-large"  value="<?php echo $row['state'];?>" />
                    </p>
                                        </div>
                    <p>
                    <label class="clsLabel1">Pincode :</label>
                    <input type="text" name="pin" id="" class="input-large"  value="<?php echo $row['pin_code'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1">Mobile :</label>
                    <input type="text" name="mob" id="" class="input-large"  value="<?php echo $row['mobile'];?>" required/>
                    </p>
                    <p>
                    <label class="clsLabel1">Bank Name : </label>
                    <input type="text"  name="bname" id="" class="input-large"  value="<?php echo $row['bank_name'];?>" /> 
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Bank Account No. : </label>
                    <input type="text"  name="bank_no" id="" class="input-large"  value="<?php echo $row['bank_ac'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Bank Branch : </label>
                    <input type="text"  name="bank_branch" id="" class="input-large"  value="<?php echo $row['bank_branch'];?>"/>
                    </p>
                    <p>
                    <label class="clsLabel1">Passport No : </label>
                    <input type="text" name="pass" id="" class="input-large"  value="<?php echo $row['passport'];?>" />
                    </p>

                    <p>
                    <label class="clsLabel1" style="width:120px;">Blood Group :</label>
                    <input type="text" name="bgroup" id="" class="input-large"  value="<?php echo $row['bd_group'];?>" />
                    </p>
                    <p>
                    <label class="clsLabel1" style="width:120px;">Martial Status :</label>
                    <input type="text" name="martial" id="" class="input-large"  value="<?php echo $row['status'];?>" />
                    </p>
                   
                    <p>
                    <label class="clsLabel1" style="width:120px;">PAN Number :</label>
                    <input type="text"  name="pan" id="" class="input-large"  value="<?php echo $row['pan_no'];?>" />
                    </p>
                    <p>
                    <input type="submit" value="NEXT" class="btn btn-success" style="float:center;"/>
                    </p>
                    </form>
  <!-----------------------------------form end------------------------------------------------------->
   			<?php } ?>
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
	$('#field4').datepicker({minDate: new Date(1910,0,1),
    maxDate: new Date(2013,24,4),
    yearRange: '1910:2013' ,
    changeYear: true,
    changeMonth: true});
	
	$('#field18').datepicker();
	$("#field2").numeric({negative: false });
	//NotificationInfo('divnotifify');

});
</script>
</body>
</html>

