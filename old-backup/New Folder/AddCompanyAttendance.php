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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / ADD Attendance</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>ADD Attendance</h1> <span></span>
        </div><!--pagetitle-->
        
<div class="maincontent">
    <div class="contentinner content-dashboard">
     <h4 class="widgettitle nomargin">ADD Attendance</h4>
        <div class="widgetcontent bordered">
            <div class="row-fluid">
                <div class="span12" style="width:500px;">
                <form action="AjaxAdd.php" class="editprofileform" method="post">
                         <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $_SESSION['username']; ?>" />
                        <div class="span12">
                            <select name="month[]">
                        	<option value="select">select</option>
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
						<!--<p>
                            
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_5">Employee ID</label>
                            : &nbsp;<input type="text" id="field3" name="username1" class="input-small Numeric" value="" required/> 
                        </p>-->
                          <p>
                            <label class="clsLabel2"style="width:200px; font-weight:bold;">Employee ID</label> : &nbsp;
                            <select class="input-large" name="username1" id="field3"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from emp_details order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['emp_id'].">".$row['emp_id']."</option>";
								}
							?>
                            
                            </select>
                         </p>
                        <p>
                            
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_6">Employee Name</label>
                            : &nbsp;<input type="text" id="field4" name="username2" class="input-small Numeric" value="" required/> 
                        </p>

                       
                        
                        <p>
                            
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_9">Leave availed</label>
                            : &nbsp;<input type="text" id="field7" name="username3" class="input-small Numeric" value="" required/> 
                        </p>

                        
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_11">Lop</label>
                            : &nbsp;<input type="text" id="field9" name="username4" class="input-small Numeric" value="" required/> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Over Time</label>
                            : &nbsp;<input type="text" id="field10" name="username5" class="input-small Numeric" value="" required/> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Holiday_wages</label>
                            : &nbsp;<input type="text" id="field10" name="username6" class="input-small Numeric" value="" required/> 
                        </p>
                         <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Incentives</label>
                            : &nbsp;<input type="text" id="field11" name="username7" class="input-small Numeric" value="" required/> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Professional Tax</label>
                            : &nbsp;<input type="text" id="field10" name="username8" class="input-small Numeric" value="" required/> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Advance</label>
                            : &nbsp;<input type="text" id="field12" name="username9" class="input-small Numeric" value="" required/> 
                        </p>
                       
                        
                        <p>
                            <label class="clsLabel2" style="width:200px;">&nbsp;</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="ViewCompanyAttendance.php" name="username" id="" class="btn btn-white">Back</a>
                            <!--&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="" id="" class="btn btn-primary" value="ADD ROW" />-->
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="username" id="test" class="btn btn-success" value="ADD NEW" />
                        </p>                        
                        

                        

                        </div>
                </form>
                </div>
            </div>
    	</div>
    </div>
</div>
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
  <!--footer-->
<?php include("include/footer.php");?>
    
</div><!--mainwrapper-->
<script type="text/javascript">
$(document).ready(function(){
	$('#field2').live('change', function()
	{
		var _this = $(this).val();
		if(_this == 'gross_pay')
		{
			$('#BasicPayRow').show();
			return false;
		}
		else
		{
			$('#BasicPayRow').hide();
			return false;
		}
	});
});
</script>
</body>
</html>