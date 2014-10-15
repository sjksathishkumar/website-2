<?php
$l=5;
include('header.php');

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
                <li class="active">Dashboard / PF Report</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / PF Report</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
                <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">PF Report</h4>
                        
                     <div class="widgetcontent bordered" id="ListAttandance">
                    <table class="table table-bordered">
<a class="btn btn-primary" style="float:right; margin-right:10px; margin-bottom:10px;" href="downpf.php"><i class="icon-upload icon-white"></i>&nbsp;&nbsp;Download Report</a>
                    
                    <form action="" method="post" >
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
                        &nbsp;&nbsp;<input class="btn btn-success" style="margin-right:0px; margin-bottom:10px;" type="submit" value="List Employee"/>
                        </form>
                    
                   <div id="LoadingImg" style="display:none"><img src="img/colorbox/loading.gif" alt="Loading" /></div>
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
                              <th>Employee Id</th>
                              <th>Employee Name</th>
                              <th>Present</th>
                              <th>Lop</th>
                              <th>PF</th>

                              <?php 
							    session_start();
									$_SESSION['month_session'] = $_POST['month'];
									$_SESSION['year_session'] = $_POST['year'];
							  $value = $_POST['month'];
							  		$valyear = $_POST['year'];
			$query = "SELECT * FROM test3 WHERE month='$value[0]' AND year='$valyear[0]'";
			//print_r($query);
			$val = mysql_query($query);
			while($row = mysql_fetch_assoc($val))
			{
				
			?>
                          </tr>
                      </thead>   
                      <tbody>
                      
                      <tr class="edit_td">
                        <td class="center"><?php echo $row['emp_id'];?></td>
                        <td><?php echo $row['emp_name']; ?></td>
                        <td><?php echo $row['present'];?></td>
                        <td><?php echo $row['lop']; ?></td>
                        <td><?php echo round($row['val9'],0,PHP_ROUND_HALF_UP);?></td>
                      <?php }  ?>
                    </tbody>
                </table>
            </div>
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
	//$(".EditAttan").colorbox({width:"500px", height:"340px", inline:true, href:"#Edit_Attan", title:"Employee Salary Detials"});
	NotificationInfo('divnotifify');

});
</script>
</body>
</html>
