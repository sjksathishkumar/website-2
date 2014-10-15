<?php
$l=2;
include('header.php');
include_once("include/config.php");
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
                <li class="active">Dashboard / Upload Employee Details</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / Upload Employee Details</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			<h4 class="widgettitle nomargin">Upload Employee Details</h4>
            <div class="widgetcontent bordered">
                <div class="row-fluid">
                	<div class="span12">
                    
                    <?php //include('include/cabinet_excel.php'); ?>

                    <!--<a href="Downloads/download_data.php?ref=emp_temp" class="btn btn-success" style="float:right;" id="downTemp">Download Templete</a>-->
                    
                    <form action="download.php" class="editprofileform" method="post" enctype="multipart/form-data">
                        <p>
                        <input type="hidden" name="file_name" value="Employee Template.csv"/>
                        <input type="submit" class="btn btn-success" value="Dowmload Template" />
                    </form>
                    
                    </div>
                    
                  
                   
<?php
 
function get_file_extension($file_name) {
    return end(explode('.',$file_name));
}
 
function errors($error){
    if (!empty($error))
    {
            $i = 0;
            while ($i < count($error)){
            $showError.= '<div class="msg-error">'.$error[$i].'</div>';
            $i ++;}
            return $showError;
    }// close if empty errors
} // close function
 
 
if (isset($_POST['upfile'])){
// check feilds are not empty
 
if(get_file_extension($_FILES["uploaded"]["name"])!= 'csv')
{
$error[] = 'Only CSV files accepted!';
}
 
if (!$error){
 
$tot = 0;
$handle = fopen($_FILES["uploaded"]["tmp_name"], "r");
while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
    for ($c=0; $c < 1; $c++) {
 
            //only run if the first column if not equal to firstname
             if($data[0] !='Emp.Code'){
                mysql_query("INSERT INTO emp_details(
emp_id,emp_name,branch_loc,doj,bank_ac,bank_branch, desig,dpt_name,repo_man,pf,esi
					)VALUES(
                    '".mysql_real_escape_string($data[0])."',
                    '".mysql_real_escape_string($data[1])."',
                    '".mysql_real_escape_string($data[2])."',
                    '".mysql_real_escape_string($data[3])."',
					'".mysql_real_escape_string($data[4])."',
					'".mysql_real_escape_string($data[5])."',
					'".mysql_real_escape_string($data[6])."',
					'".mysql_real_escape_string($data[7])."',
					'".mysql_real_escape_string($data[8])."',
					'".mysql_real_escape_string($data[9])."',
					'".mysql_real_escape_string($data[10])."'
                )")or die(mysql_error());
				
            }
			if($data[11] !='Basic'){
			mysql_query("INSERT INTO test1(emp_id,val1,val2,val3,val4,val5,val6,val7,val8)VALUES
				(	'".mysql_real_escape_string($data[0])."', 	
				 	'".mysql_real_escape_string($data[11])."',
					'".mysql_real_escape_string($data[12])."',
					'".mysql_real_escape_string($data[13])."',
					'".mysql_real_escape_string($data[14])."',
					'".mysql_real_escape_string($data[15])."',
					'".mysql_real_escape_string($data[16])."',
					'".mysql_real_escape_string($data[17])."',
					'".mysql_real_escape_string($data[18])."')")or die(mysql_error());
			}
 
 
    $tot++;}
}
fclose($handle);
$content.= "<div class='success' id='message'> CSV File Imported, $tot records added </div>";
 
}// end no error
}//close if isset upfile
 
$er = errors($error);
$content.= <<<EOF
<h3>Import CSV Data</h3>
$er
<form enctype="multipart/form-data" action="" method="post">
    File:<input name="uploaded" type="file" maxlength="20" /><input class="btn btn-primary" type="submit" name="upfile" value="Upload File">
</form>
EOF;
echo $content;
?>				   

                    
                   
                </div>
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
		// calendar
	$('#calendar').datepicker();
	$("#app_amount").numeric({negative: false });
	NotificationInfo('divnotifify');

});
</script>

<script src="scripts/AddNewEmployee.js" language="javascript" type="application/javascript"></script>

</body>
</html>