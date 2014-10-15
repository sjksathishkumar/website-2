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

<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function checkButton(){
if(document.form.check1.checked == true || document.form.check1.checked == true ){

} else
  alert("check any one box");
  return false;
}
}


</script>

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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / EPF Structuring</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>EPF Structuring</h1> <span></span>
        </div><!--pagetitle-->
        
<div class="maincontent">
    <div class="contentinner content-dashboard">
     <h4 class="widgettitle nomargin">ADD NEW EMLOYEE EPF STRUCTURE</h4>
        <div class="widgetcontent bordered">
            <div class="row-fluid">
                <div class="span12" style="width:750px;">
                <form action="addpt.php" class="editprofileform" method="post">
                         <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $_SESSION['username']; ?>" />
                        <div class="span12">
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>Enter the City Name</strong></label>
                            <input type="text" name="city" required/>
						</p>
                        <p>
                            <label class="clsLabel2" style="width:200px;"><strong>Enter the from value</strong></label>
							<label class="clsLabel2" style="width:200px;"><strong>Enter end value</strong></label>
                            <label class="clsLabel2" style="width:200px;"><strong>Deduction amount</strong></label>
                        </p>
                        <p>
						<input type="text" name="one" placeholder="0" onKeyPress="return isNumberKey(event)"/>
                        <input type="text" name="eone" placeholder="21000" required onKeyPress="return isNumberKey(event)"/>
                        <input type="text" name="done" placeholder="0" required onKeyPress="return isNumberKey(event)"/>
                        </p>
                        
                        <p>
						<input type="text" name="two" placeholder="21001" onKeyPress="return isNumberKey(event)"/>
                        <input type="text" name="etwo" placeholder="30000" required onKeyPress="return isNumberKey(event)"/>
                        <input type="text" name="dtwo" placeholder="100" required onKeyPress="return isNumberKey(event)"/>
                        </p>
                        <p>
						  <input type="text" name="three" placeholder="30001"  onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="ethree" placeholder="45000" required onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="dthree" placeholder="235" required onKeyPress="return isNumberKey(event)"/>
                        </p>
                        <p>
						  <input type="text" name="four" placeholder="45001"  onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="efour"  placeholder="60000" required onKeyPress="return isNumberKey(event)"/>
                            <input type="text" name="dfour" placeholder="510" required onKeyPress="return isNumberKey(event)"/>
                        </p>
                        <p>
						  <input type="text" name="five" placeholder="60001" onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="efive" placeholder="75000" required onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="dfive" placeholder="760" required onKeyPress="return isNumberKey(event)"/>
                        </p>
                        <p>
						  <input type="text" name="six" placeholder="75001" onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="esix" required placeholder="above" onKeyPress="return isNumberKey(event)"/>
                          <input type="text" name="dsix" placeholder="1095" required onKeyPress="return isNumberKey(event)"/>
                        </p>

                        
                        <p>
                            <label class="clsLabel2" style="width:200px;">&nbsp;</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="EmpPTSlabView.php" class="btn btn-white">Back</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="ADD NEW" />
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