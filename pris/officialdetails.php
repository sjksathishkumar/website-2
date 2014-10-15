<?php
$l=2;
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

<script type="text/javascript" src="Colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>

<script type="text/javascript" src="scripts/AddNewEmployee.js"></script>
<script type="text/javascript" src="js/jquery.numeric.js"></script>
<script type="text/javascript">
 $(document).ready(function() {      
   $('.radio').click(function() {
		$('#sal').hide();
 
	});
      $('.checker').click(function() {
		$('#slab').toggle();
		$('#sal').toggle();
 
	});
	
});


</script>
<script>
  $(function() {
    $( "#field20" ).datepicker();
  });
  </script>
<script>
  $(function() {
    $( "#field21" ).datepicker();
  });
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
                <li class="active">Dashboard / ADD New Employee</li>
            </ul>
        </div><!--breadcrumbs-->
      	<div class="pagetitle">
        	<h1>Dashboard / ADD New Employee</h1> <span></span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
  
  
  <!-----------------------------------form start----------------------------------------------------->
   <form action="addemp.php" class="editprofileform" method="post" enctype="multipart/form-data">
                 	<div class="span6">
                        <p>
                            <label class="clsLabel1" style="width:120px;">Date of Join : </label>
                            <input type="text"  name="field20" id="field20" class="input-large" />
                        </p>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Date of exit : </label>
                            <input type="text"  name="field21" id="field21" class="input-large" />
                        </p>
                          <p>
                            <label class="clsLabel1" style="width:120px;">Job Status : </label>
                            <select class="input-large" name="field22" > 
                            <?php 
								$sql = GetDetailsFromQuery("select * from employee_status order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['status_name'].">".$row['status_name']."</option>";
								}
							?>
                            
                            </select>
                         </p>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Designation : </label>
                            <select class="input-large" name="field23" id="field23"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_desg order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['des_name'].">".$row['des_name']."</option>";
								}
							?>
                            
                            </select>
                         </p>
                         <p>
                          <label class="clsLabel1" style="width:120px;">Department : </label>
                            
                            <select class="input-large" name="field24" id="field24"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_dept order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['dept_name'].">".$row['dept_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>
                        <p>
                          <label class="clsLabel1" style="width:120px;">Branch Location : </label>
                            <select class="input-large" name="field25" id="field25"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from company_branch order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['branch_name'].">".$row['branch_name']."</option>";
								}
							?>
                            
                            </select>
                        </p>

                        <p>
                            <label class="clsLabel1" style="width:120px;">Reporting Manager : </label>
                            <input type="text"  name="field26" id="field26" class="input-large" value="" />
                        </p>
                        <p>
                                <label class="clsLabel1" style="width:120px;">PF Number :</label>
                                <input type="text"  name="field27" id="field27" class="input-large" required/>
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">ESI Number :</label>
                                <input type="text"  name="field28" id="field28" class="input-large" value="" required/>
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;">testing</label>
                                <input type="text"  name="field29" id="field29" class="input-large" value="" />
                            </p>
                            </div>
						    <p>
                                <label class="clsLabel1" style="width:120px;">Salary Amount :</label>
                                <input type="text"  name="field30" id="field30" class="input-large" value="" required/>
                            </p>
                            
                            <div id="slab">
                            <p>
                             
                                <label style="width:120px;">Select Salary Slab :</label>
                                <?php  $result11 =  mysql_query("select slab_name from emp_pay_structure order by id asc");
								for($i=0; $i<mysql_num_rows($result11); $i++)
								{
									$pay_name = mysql_result($result11, $i, 'slab_name');
									?>
									<input type='radio' name='field31' id='field31' value="<?php echo $pay_name;?>"/><?php echo $pay_name;?>&nbsp;&nbsp;
                                    
								<?php }

								?>
                                
                                
                             </p>
                             </div>
                             <p>
                             <label style="width:120px;">Enter without slab :</label>
                             <input type='checkbox' name="field40" id="field40" value="checked"/>
                             </p>
                            <div id="sal" style="display:none;">
                            <?php 
								$ret = "SELECT * FROM emp_payslip";
								$rete = mysql_query($ret);
								while($rrr = mysql_fetch_assoc($rete))
								{
							
							?>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['one'];?></label>
                                <input type="text"  name="field32" id="field32"  class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['two'];?></label>
                                <input type="text"  name="field33" id="field33"  class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['three'];?></label>
                                <input type="text"  name="field34" id="field34"  class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['four'];?></label>
                                <input type="text"  name="field35" id="field35" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['five'];?></label>
                                <input type="text"  name="field36" id="field36" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['six'];?></label>
                                <input type="text"  name="field37" id="field37" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['seven'];?></label>
                                <input type="text"  name="field38" id="field38" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['eight'];?></label>
                                <input type="text"  name="field39" id="field39" class="input-large" value="0" />
                            </p>
                            <?php } ?>
                            </div>
                            <p>
                    		<input type="submit" value="Submit" id="sss" class="btn btn-success"/>
                    		</p>
                            
                
                
                 </form>
                 
                 <?php
                	session_start();
	
$_SESSION['emp_id'] = $_POST['emp_id'];
$_SESSION['emp_name'] = $_POST['emp_name'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['addr'] = $_POST['addr'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['pin'] = $_POST['pin'];
$_SESSION['mob'] = $_POST['mob'];
$_SESSION['bname'] = $_POST['bname'];
$_SESSION['bank_no'] = $_POST['bank_no'];
$_SESSION['bank_branch'] = $_POST['bank_branch'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['bgroup'] = $_POST['bgroup'];
$_SESSION['martial'] = $_POST['martial'];
$_SESSION['pan'] = $_POST['pan'];
				 
				 
				 
				 ?>
                
  <!-----------------------------------form end------------------------------------------------------->
   
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
	$('#field4').datepicker({minDate: new Date(1910,0,1),
    maxDate: new Date(2013,24,4),
    yearRange: '1910:2013' ,
    changeYear: true,
    changeMonth: true});
	
	$('#field18').datepicker();
	$("#field2").numeric({negative: false });
	//NotificationInfo('divnotifify');

});
</script>
</body>
</html>