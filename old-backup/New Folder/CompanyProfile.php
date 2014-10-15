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
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="Colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

<script type="text/javascript" src="js/jquery.numeric.js"></script>
<script type="text/javascript" src="scripts/Company_Details.js"></script>

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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / Company Profile</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Company Profile</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			  <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">COMPANY PROFILE</h4>
                        

						  	 <?php if(isset($_GET['k']))
							  {
								$rowid = $_GET['id'];
							  	$sqlQuery = mysql_query("select domain_name from company_details where id = $rowid");
								$code = mysql_result($sqlQuery, 0, 'domain_name');
									
								  $k = $_GET['k'];
								  if($k =='Edit')
								  {
									
						?>
                        
                        
                        
                        <div class="widgetcontent bordered">
                            <?php include("Company/edit_profile.php");?>
                        </div>
                        
                        <?php }
							  }
							  else {
                            //$sqlQuery = mysql_query("select code from company_details where code = $code");

							$ComResult = GetDetailsFromQuery("select * from company_details");
							if($ComResult>0){
										foreach($ComResult as $row){
											
											$code = $row['domain_name'];
											$_SESSION['domainname']=$code;
							?>
                <div class="widgetcontent bordered">
                    <div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Compnay Profile Photo</h4>
                            
                            <?php if($_SESSION['cat'] == 'Master Admin'){ ?>
                            
                            <div class="profilethumb">
                            	<a href="CompanyLogoUpload.php">Change Thumbnail</a>
                                <?php $photo = $row['logo']; if($photo == ''){?>
                                <img src="img/profilethumb.png" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($code);?>" class="img-polaroid" />
                                <?php } else {?>
                                <img src="<?php echo $photo; ?>" width="177px" height="171px" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($row['code']);?>" class="img-polaroid" />
                                <?php } ?>
                            </div><!--profilethumb-->
                            
                            <?php } else {?>
                            <div class="profilethumb">
                            	<a href="UploadCompanyLogo.php">Change Thumbnail</a>
                                <?php $photo = $row['logo']; if($photo == ''){?>
                                <img src="img/profilethumb.png" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($code);?>" class="img-polaroid" />
                                <?php } else {?>
                                <img src="<?php echo $photo; ?>" width="177px" height="171px" alt="<?php echo GetCompanyName($code);?>" title="<?php echo GetCompanyName($row['code']);?>" class="img-polaroid" />
                                <?php } ?>
                            </div><!--profilethumb-->
                            
                            <?php } ?>
                            
                            
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="" class="editprofileform" method="post">
                            	<h4>Login Information</h4>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Company Name</label>
                                	: &nbsp;&nbsp;<?php echo GetCompanyName($row['domain_name']);?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Domain Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['domain_name'];?>
                                </p>
                               <!-- <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Master Admin Username</label>
                                    : &nbsp;&nbsp;<?php  //echo GetCompanyAdminUserName($row['domain_name']);?>
                                </p>-->
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Employee Prefix</label>
                                	: &nbsp;&nbsp;<?php echo $row['emp_prefix'];?>
                                </p>
                                
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="ManageAdmin.php?id=<?php echo $_GET['id'];?>&k=Edit#PerInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <br />
                                
                                <?php /* <h4>Admin Information</h4>
                               
									$pinfo = GetDetailsFromQuery("select * from company_admin where domain_name  = '$code'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">User Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['user_name'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Display Name</label>
                                	: &nbsp;&nbsp;<?php echo $row['display_name'];?>
                                </p>
                                
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="ManageAdmin.php?id=<?php echo $_GET['id'];?>&k=Edit#PerInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <br />
                                */ ?>
                                <h4>Company Information</h4>
                                <?php
									$pinfo = GetDetailsFromQuery("select * from company_details where domain_name = '$code'");
									if($pinfo>0){
										foreach($pinfo as $row){
								?>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Email Id</label>
                                	: &nbsp;&nbsp;<?php echo $row['mail_id'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Website</label>
                                	: &nbsp;&nbsp;<?php echo $row['web_addr'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Pan No</label>
                                	: &nbsp;&nbsp;<?php echo $row['pan_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Tan No</label>
                                	: &nbsp;&nbsp;<?php echo $row['tan_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Telephone No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['telephone'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Mobile No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['mobile_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Fax No.</label>
                                	: &nbsp;&nbsp;<?php echo $row['fax_no'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Address</label>
                                	: &nbsp;&nbsp;<?php echo $row['addr'];?>
                                </p>
                                 <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Contact Person.</label>
                                	: &nbsp;&nbsp;<?php echo $row['contactperson'];?>
                                </p>
                                <p>
                                	<label class="clsLabel" style="padding-top:0px; width:200px;">Contact Mobile</label>
                                	: &nbsp;&nbsp;<?php echo $row['contactmobile'];?>
                                </p>
                                <?php } } else { ?>
                                <p>
                                	No Information is added yet...<br />
                                    <a href="CompanyProfile.php?id=<?php echo $row['id'];?>&k=Edit#CompInfo" class="btn btn-primary">Add Info</a>
                                </p>
                                <?php } ?>
                                <p>
                                	<a class="btn btn-primary" href="CompanyProfile.php?id=<?php echo $row['id'];?>&k=Edit">Update Profile</a>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
                        
                        
                     <?php } ?>   
                        
                        
                        
                        
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
	$('.profilethumb').hover(function(){
	$(this).find('a').fadeIn();
	},function(){
		$(this).find('a').fadeOut();
	});

});
</script>
</body>
</html>