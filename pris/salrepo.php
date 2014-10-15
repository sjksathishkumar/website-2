<?php
$l=5;
include('header.php');

if(!isset($_SESSION['username']))
{
	Header('Location:index.php');
}
include_once("include/config.php");
//include("include/functions.php");
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
                <li class="active">Dashboard / Salary Report</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / Salary Report</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
                <div class="row-fluid">
     
                 <div class="span12">
                    <h4 class="widgettitle nomargin">Salary Report</h4>
                        
                     <div class="widgetcontent bordered" id="ListAttandance">
                    <table class="table table-bordered">
<a class="btn btn-primary" style="float:right; margin-right:10px; margin-bottom:10px;" href="downcsv.php"><i class="icon-upload icon-white"></i>&nbsp;&nbsp;Download Report</a>
                    
                    <form action="" method="post" >
                        <select name="month[]" style="height:30px; width:80px;" required>
                        	<option value="">Month</option>
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
                            <option>December</option>
                        </select>
                        &nbsp;&nbsp;&nbsp; <select name="year[]" style="height:30px; width:80px;" required>
                        	<option value="">year</option>
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
                          &nbsp;&nbsp;&nbsp; <input type=text list="field25" name="field25[]" value="" placeholder="Branch" style="height:20px; width:80px;">
                            <datalist class="input-large" name="field25[]" id="field25"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_branch order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['branch_name'].">".$row['branch_name']."</option>";
								}
							?>
                            
                            </datalist>
                             &nbsp;&nbsp;&nbsp;<input type=text list="field24" name="field24[]"  value="" placeholder="Department" style="height:20px; width:80px;">
                            <datalist class="input-large" name="field24[]" id="field24"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_dept order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['dept_name'].">".$row['dept_name']."</option>";
								}
							?>
                            
                            </datalist>
&nbsp;&nbsp;&nbsp; <input type="text" list="field23" name="field23[]" value="" placeholder="Designation" style="height:20px; width:80px;"/>
                            <datalist class="input-large" name="field23[]" id="field23">
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_desg order by id desc");
								foreach($sql as $rowss)
								{
									echo "<option value=".$rowss['des_name'].">".$rowss['des_name']."</option>";
								}
							?>
                            
                            </datalist>
                          <!-- &nbsp;&nbsp;&nbsp; <input type=text list="field26" name="field26[]" value="" placeholder="Manager" style="height:20px; width:80px;">
                            <datalist class="input-large" name="field26[]" id="field26"> 
                            <?php 
								/*$sql = GetDetailsFromQuery("select * from emp_details order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['repo_man'].">".$row['repo_man']."</option>";
								}*/
							?>
                            
                            </datalist>-->
                        
                            
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
                    <?php 
					$head = "SELECT * FROM emp_payslip";
					$newhead = mysql_query($head);
					while($row = mysql_fetch_assoc($newhead))
					{
						
					
					?>
                      <thead>
                          <tr>
                              <th>Employee Id</th>
                              <th>Employee Name</th>
                              <th>Present</th>
                              <th>Lop</th>
                              <th><?php echo $row['one'];?></th>
                              <th><?php echo $row['two'];?></th>
                              <th><?php echo $row['three'];?></th>
                              <th><?php echo $row['four'];?></th>
                              <th><?php echo $row['five'];?></th>
                              <th><?php echo $row['six'];?></th>
                              <th><?php echo $row['seven'];?></th>
                              <th><?php echo $row['eight'];?></th>
                              <th>Variable Pay</th>
                       		  <th>Gross Pay</th>
							  <?php } ?>
                              <th>PF</th>
                              <th>ESI</th>
                              <th>PT</th>
                              <th>Other Deductions</th>
                              <th>Net Pay</th>

                              <?php 
							  session_start();
									$_SESSION['month_session'] = $_POST['month'];
									$_SESSION['year_session'] = $_POST['year'];

									$_SESSION['field25'] = $_POST['field25'];
									$_SESSION['field24'] = $_POST['field24'];
									$_SESSION['field23'] = $_POST['field23'];
									
									$desig = $_POST['field23'];
									$branch = $_POST['field25'];
									$dept = $_POST['field24'];

									
							  		$month = $_POST['month'];
							  		$valyear = $_POST['year'];
									if($month[0] == January){$table = "jan";}
					 else if($month[0] == February){$table = "feb";}
					 else if($month[0] == March){$table = "march";}
					 else if($month[0] == April){$table = "april";}
					 else if($month[0] == May){$table = "may";}
					 else if($month[0] == June){$table = "june";}
					 else if($month[0] == July){$table = "july";}
					 else if($month[0] == August){$table = "august";}
					 else if($month[0] == September){$table = "september";}
					 else if($month[0] == October){$table = "october";}
					 else if($month[0] == November){$table = "november";}
					 else if($month[0] == December){$table = "december";}
	if($branch[0] != '' && $dept[0] != '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND dept='$dept[0]' AND desig='$desig[0]'";
	}
	else if($branch[0] != '' && $dept[0] == '' && $desig[0] == '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]'";
	}
	else if($branch[0] == '' && $dept[0] != '' && $desig[0] == '')
	{
		$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND dept='$dept[0]'";
	}
	else if($branch[0] == '' && $dept[0] == '' && $desig[0] != '')
	{
		$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND desig='$desig[0]'";
	}
	else if($branch[0] != '' && $dept[0] != '' && $desig[0] == '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND dept='$dept[0]'";
	}
	else if($branch[0] != '' && $dept[0] == '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND desig='$desig[0]'";
	}
	else if($branch[0] == '' && $dept[0] != '' && $desig[0] != '')
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]' AND dept='$dept[0]' AND desig='$desig[0]'";
	}
	else
	{
	$query = "SELECT * FROM $table WHERE month='$month[0]' AND year='$valyear[0]'";
	}
	/*
	else if()
	{
	$query = "SELECT * FROM test3 WHERE month='$value[0]' AND year='$valyear[0]' AND branch='$branch[0]' AND dept='$dept[0]' AND desig='$desig[0]'";
	}*/
			//print_r($query);
			$val = mysql_query($query);
			while($row = mysql_fetch_assoc($val))
			{
				 $vpay = $row['ot']+$row['holiday_wages']+$row['incent'];                     
$gross =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['ot']+$row['holiday_wages']+$row['incent'];
$net =  $row['val1']+$row['val2']+$row['val3']+$row['val4']+$row['val5']+$row['val6']+$row['val7']+$row['val8']+$row['ot']+$row['holiday_wages']+$row['incent']-$row['val9']-$row['esval10']-$row['pt']-$row['advance'];
			?>
                          </tr>
                      </thead>   
                      <tbody>
                      
                     
                    <tr>
                        <td><?php echo $row['emp_id']; ?></td>
                        <td><?php echo $row['emp_name']; ?></td>
                        <td><?php echo $row['present']; ?></td>
                        <td><?php echo $row['lop']; ?></td>
						<td><?php echo round($row['val1'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val2'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val3'],0,PHP_ROUND_HALF_UP); ?></td>
						<td><?php echo round($row['val4'],0,PHP_ROUND_HALF_UP); ?></td>	
						<td><?php echo round($row['val5'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val6'],0,PHP_ROUND_HALF_UP); ?></td>	
						<td><?php echo round($row['val7'],0,PHP_ROUND_HALF_UP);?></td>
                        <td><?php echo round($row['val8'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($vpay,0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($gross,0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['val9'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['esval10'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['pt'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($row['advance'],0,PHP_ROUND_HALF_UP); ?></td>
                        <td><?php echo round($net,0,PHP_ROUND_HALF_UP); ?></td>
                    </tr>
                    
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
