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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / Deduction Structure</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Deduction Structure</h1> <span></span>
        </div><!--pagetitle-->
        
<div class="maincontent">
    <div class="contentinner content-dashboard">
     <h4 class="widgettitle nomargin">Deduction Structure</h4>
        <div class="widgetcontent bordered">
            <div class="row-fluid">
                <div class="span12" style="width:1000px;">
					              

                	<form action="deduct.php" method="post">
                     <?php
					 
					 $val = "SELECT * FROM company_details";
					 $query = mysql_query($val);
					 while($row = mysql_fetch_assoc($query))
					 {
						
						 if($row['pf'] == 0 && $row['esi'] == 0)
						 {
						echo "<p>
							<input type='hidden' name='one' value='PF'/>
					  </p>";
					  	echo "<p>
							<input type='hidden' name='two' value='ESI'/>
					  </p>";
						 }
						 elseif ($row['pf'] == 0)
						 {
						echo "<p>
							<input type='hidden' name='one' value='PF'/>
					  </p>";
						 }
						 elseif ($row['esi'] == 0)
						 {
						 	echo "<p>
							<input type='hidden' name='two' value='ESI'/>
					  </p>";
						 }
						 else
						 {
									
						 }
					 }?>
                     <input type="hidden" name="six" value="Deductions">
                     <input type="hidden" name="seven" value="1">
						<p>
						  <select name="three">
						    <option>Select</option>
						    <option>Professional Tax</option>
						    <option>Advance</option>
						    <option>Loan Repayment</option>
						    <option>Rent</option>
                            <option>Other Deduction</option>
					      </select>
						  </br>
					  </p>
						<p>
						  <select name="four">
						    <option>Select</option>
						    <option>Professional Tax</option>
						    <option>Advance</option>
						    <option>Loan Repayment</option>
						    <option>Rent</option>
                            <option>Other Deduction</option>
					      </select>
						  </br>
					  </p>
						<p>
						  <select name="five">
						    <option>Select</option>
						    <option>Professional Tax</option>
						    <option>Advance</option>
						    <option>Loan Repayment</option>
						    <option>Rent</option>
                            <option>Other Deduction</option>
					      </select>
					  </p>
						</br>
                        <input type="submit" class="btn btn-success"/>
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