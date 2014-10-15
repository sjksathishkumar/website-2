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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / PAYSLIP Structure</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>PAYSLIP Structure</h1> <span></span>
        </div><!--pagetitle-->
        
<div class="maincontent">
    <div class="contentinner content-dashboard">
     <h4 class="widgettitle nomargin">Create Payslip Structure</h4>
        <div class="widgetcontent bordered">
            <div class="row-fluid">
                <div class="span12" style="width:1000px;">
                

                	<form action="old.php" method="post">
                    	<p align="left">
                        	<input type="text" name="header" value="" placeholder="Enter Payslip Header" required/> 
                            <input type="hidden" name="uniq" value="1">
                        	&nbsp;&nbsp;Ex:Name of the company
                        </p>
                    	<p>
                    	  <select name="test1">
                    	    <option value="Basic">Basic</option>
                            <option value="Basic+da">Basic+da</option>
                  	    </select>
                   	  </p>
                    	<p>
                    	  <select name="test2">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                    	  <select name="test3">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                    	  <select name="test4">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                    	  <select name="test5">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                    	  <select name="test6">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                          	  <select name="other1">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                          	  <select name="other2">
                    	    <option value="">select</option>
                    	    <option value="House Rent Allowance">House Rent Allowance</option>
                            <option value="City Compensation Allowance">City Compensation Allowance</option>
                            <option value="Foreign Allowance">Foreign Allowance</option>
                            <option value="Fixed Medical Allowance">Fixed Medical Allowance</option>
                            <option value="Project Allowance">Project Allowance</option>
                            <option value="Servent Allowance">Servent Allowance</option>
                            <option value="Transport Allowance">Transport Allowance</option>
                            <option value="Conveyance Allowance">Conveyance Allowance</option>
                            <option value="Uniform Allowance">Uniform Allowance</option>
                            <option value="Children Education Allowance">Children Education Allowance</option>
                            <option value="Children Hostel Allowance">Children Hostel Allowance</option>
                            <option value="Entertainment Allowance">Entertainment Allowance</option>
                            <option value="Utility Allowance">Utility Allowance</option>
                            <option value="Special MT Allowance">Special MT Allowance</option>
                            <option value="SPL Allowance">SPL Allowance</option>
                            <option value="Other Allowance">Other Allowance</option>
                   	      </select>
                   	  </p>
                    	<p>
                    	  <input class="btn btn-success" type="submit"/>
                  	  </p>
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
$(document).ready(function() {

  $("#arow").hide();

  $("#rrr").click(function() {
    $("#arow").slideToggle(300);
  });

});
</script>
<script type="text/javascript">
$(document).ready(function() {

$('#field4').change(function() {
    var selected = $(this).val();
    if(selected == 'Gross Pay'){
      $('#other').show();
    }
    else{
      $('#other').hide();
    }
});


});
</script>
<script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>
</body>
</html>