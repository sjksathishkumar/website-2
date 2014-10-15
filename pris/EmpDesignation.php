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
                <li class="active"><a href="CompanyAdmin.php">Dashboard</a> / Designations</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Designations</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
			  <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">Configure designations</h4>
                        <div class="widgetcontent bordered">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <a id="mail" class="btn btn-success" style="float:right; margin:10px; margin-right:0px;"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;ADD NEW</a>
                        <div id="disform">
                        <form action="AddDesignation.php" class="editprofileform" method="post">
     						<input type="hidden" id="master" name="master" value="2" />
        					<label class="clsLabel2" style="width:200px;"><strong>Designation Name</strong></label>
							<input type="text" id="field2" name="field2" class="input-small" value="" />
							<input type="submit" name="username" id="AddToMaster" class="btn btn-success" value="ADD NEW" />
                            <!--&nbsp;<input type="button" name="cancel"  class="btn btn-success" value="CANCEL"  onclick="javascript:window.history.back()"/>-->
						</form>
                        </div>
                        <!--<a href="AddDesignation.php" class="btn btn-success" style="float:right; margin:10px; margin-right:0px;"><i class="icon-pencil icon-white"></i>&nbsp;&nbsp;ADD NEW</a>-->
                        
                        <?php /*
                        
                        <a href="Downloads/download_data.php?ref=dept_temp" class="btn btn-primary" style="float:right; margin:10px; margin-right:0px;"><i class="icon-download icon-white"></i>&nbsp;&nbsp;DOWNLOAD TEMPLETE</a>
						
						*/?>
                        </table>
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
          <th>S.No</th>
          <!--<th>Designation Code</th>-->
          <th>Designation Name</th>
          <th>Action</th>
        </tr>
        </thead>   
        <tbody>
        <?php
		$i=1;
		$resEmp1 = GetDetailsFromQuery("select * from company_desg order by id asc");
		if($resEmp1>0){ foreach($resEmp1 as $data){ ?>
        <tr class="edit_td" id="del_<?php echo $data['id'];?>">
        <td class="center"><?php echo $i;?></td>
        <?php
           
                //echo '<td>'.$data['des_code'].'</td>';
                echo '<td>
						<span style="" id="one_'.$data['id'].'" class="text">'.$data['des_name'].'</span>
						<input style="width:200px; display:none;" type="text" value="'.$data['des_name'].'"  id="one_input_'.$data['id'].'" />
					    <input type="hidden" value="'.$data['des_code'].'" id="row_code" />
						<img src="img/ajax-loaders/ajax-loader.gif" alt="Loading..." id="loading_'.$data['id'].'" style="display:none;" />
					 </td>';
				echo '<td>
		        	    <i class="icon-edit"></i>&nbsp;<a href="#" class="editMaster" name="Desg" id="'.$data['id'].'">Edit</a>&nbsp;&nbsp;|&nbsp;
        		    	<i class="icon-trash"></i>&nbsp;<a href="#" id="DelDesg" name="'.$data['id'].'">Delete</a>
        			  </td>';
				
            
        ?>
        </tr>
        <?php $i++; } } ?>
        </tbody>
        </table>
                        </div>
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
<!--<script type="text/javascript">
$(document).ready(function(){
		// calendar
	$('#calendar').datepicker();
	$("#app_amount").numeric({negative: false });
	$(".btn-warning").colorbox({inline:false, title:"Employee Salary Detials" });
	$(".btn-success").colorbox({inline:false, title:"Employee Salary Detials", height:"300px"});
	NotificationInfo('divnotifify');
});
</script>-->
         <script type="text/javascript">
$(document).ready(function() {

   $("#disform").hide();

  $("#mail").click(function() {
    $(this).next().slideToggle(300);
  });
  
});
</script>
</body>
</html>