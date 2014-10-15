<?php
$l=0;
include("include/config_master.php");
include("include/functions.php");
include("include/alphaID.inc.php");

session_start();

//$category = base64_decode($_GET['ref']);


$Url = curPageURL();
//$catresult = GetDetailsFromQuery("select * from category");

error_reporting();
if(isset($_SESSION['username']))
{ 
	//echo '<div class="span6" style="border:0px solid #CCC;">
	  //<div class="logo"><img src="../img/logo.png" alt="" title="" /></div>';
$username = $_SESSION['username'];
$cat = $_SESSION['cat'];
//echo "Welcome :<span style='color:#E74C3C; font-weight:bold;'>&nbsp;".."</span>";
//echo '</div><div class="span2">Date: '.date("d-m-Y").'</div>';
}

//echo '<div class="span2"><a style="" href="Logout.php">Logout</a></div>';
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

<script type="text/javascript" src="scripts/loadcontent.js"></script>
<script type="text/javascript" src="js/jquery.numeric.js"></script>
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    
	
    <div class="logopanel">
    <h1><a href="">Master Admin</a></h1>
	</div>
    <div class="datewidget"><?php $date = date('M d, Y, H:m', time()); echo 'Today is '.$date; ?></div>
    <div class="searchwidget" style="border:none;">
        	<div class="input-append" style="padding-bottom:4px;">&nbsp;</div>
        </div><!--searchwidget-->  
    <div class="leftmenu">        
    	<?php include("MasterAdmin/MasterNav.php");?> 	
	</div>
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
  
			 <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">Notifications</h4>
                        <div class="widgetcontent bordered" id="divnotifify">
                            Notificationsssssssss
                        </div><!--widgetcontent-->
                 </div><!--span8-->
                 
                <?php /* <div class="span4">
                    <h4 class="widgettitle nomargin">Events this month</h4>
                        <div class="widgetcontent">
                            <div id="calendar" class="widgetcalendar"></div>
                        </div>
                 </div><!--span4-->
				 */ ?>
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
		$('#calendar').datepicker();
});
</script>
</body>
</html>
