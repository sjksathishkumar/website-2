<?php
$l=1;
include('header.php');
date_default_timezone_get('Asia/Kolkata');
include_once("include/config.php");

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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / PAY Structure</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>PAY Structure</h1> <span></span>
        </div><!--pagetitle-->
        
<div class="maincontent">
    <div class="contentinner content-dashboard">
     <h4 class="widgettitle nomargin">ADD NEW PAY STRUCTURE</h4>
        <div class="widgetcontent bordered">
            <div class="row-fluid">
                <div class="span12" style="width:500px;">
                 <?php 
				$val = "SELECT * FROM emp_payslip";
				$query = mysql_query($val);
				while($row = mysql_fetch_array($query))
				{ 
				  $output = "SELECT * FROM emp_pay_structure WHERE id=".$_GET['id'];
				  $outquery = mysql_query($output);
				  while($va = mysql_fetch_assoc($outquery))
				  {
			?>
               <form action="Addpayslab.php" class="editprofileform" method="post" >
                         
                        	<table width="409" height="289">
                            	<tr>
                                	<input type="hidden" id="emp_id" name="emp_id" value="<?php echo $_SESSION['username']; ?>" />
                                </tr>
                            	<tr>
                                	<td width="165">
                                    	<label>District Name</label>
                                    </td>
                                    <td width="120">
                                    	 <input type="text" id="field3" name="field3" class="in-sm" value="<?php echo $va['slab_name'];?>" readonly/>
                           				 <span style="color:#999;"><strong><em>Eg.Slab1,Slab2</em></strong></span>
                                    </td>
                                </tr>
                               
                                <tr>
                                	<td>
                                    	<?php echo $row['one'];?> 
                                    </td>
                                    <td>
                                      <input type="text"  name="field5" id="field5" class="input-small Numeric" value="<?php echo $va['value_1'];?>" readonly />
                            Vaue in % </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<?php echo $row['two'];?>
                                    </td>
                                    <td>
                                    	  <input type="text" id="field6" name="field6" class="input-small Numeric" value="<?php echo $va['value_2'];?>" readonly />
                            Value in % </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<?php echo $row['three'];?>
                                    </td>
                                    <td>
                                       <input type="text" id="field7" name="field7" class="input-small Numeric" value="<?php echo $va['value_3'];?>" readonly />
                            Value in %
                                    
                                   </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<?php echo $row['four'];?>
                                    </td>
                                    <td>
                                    	<input type="text" id="field8" name="field8" class="input-small Numeric" value="<?php echo $va['value_4'];?>" readonly/>
                            Value in %
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<?php echo $row['five'];?>
                                    </td>
                                    <td>
                                  		<input type="text" id="field9" name="field9" class="input-small Numeric" value="<?php echo $va['value_5'];?>" readonly/> 
                            Value in %
                                    </td>
                                </tr>
                                  <tr>
                                	<td>
                                    	<?php echo $row['six'];?>
                                    </td>
                                    <td>
                                    	 <input type="text" id="field10" name="field10" class="input-small Numeric" value="<?php echo $va['value_6'];?>" readonly />
                            Value in %
                                    </td>
                                </tr>
                                  <tr>
                                	<td>
                                    	<?php echo $row['seven'];?>
                                    </td>
                                    <td>
                                    	  <input type="text" id="field11" name="field11" class="input-small Numeric" value="<?php echo $va['other_1'];?>" readonly />
                            Value in %
                       		       </td>
                                </tr>
                                  <tr>
                                	<td>
                                    	<?php echo $row['eight'];?>
                                    </td>
                                    <td>
                              <input type="text" id="field12" name="field12" class="input-small Numeric" value="<?php echo $va['other_2'];?>" readonly/>
                            Value in %
                                   </td>
                                </tr>
                                <tr>
                                	<td>
                                		<a href="CompanyPayStructure.php" name="username" class="btn btn-white">Back</a>
                                    </td>
                                	
                                </tr>
                             </table>
							
					  </form>
                      <?php } }?>
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

</body>
</html>