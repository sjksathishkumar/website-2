<?php
error_reporting();
include('header.php');
if(!isset($_SESSION['username']))
{
	Header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Basspris</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="#" class="logo" >Bass<span>Pris</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="icon-tasks"></i>
                      <span class="badge bg-success">6</span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">You have 6 pending tasks</p>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Dashboard v1.3</div>
                                  <div class="percent">40%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                      <span class="sr-only">40% Complete (success)</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Database Update</div>
                                  <div class="percent">60%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                      <span class="sr-only">60% Complete (warning)</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Iphone Development</div>
                                  <div class="percent">87%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                      <span class="sr-only">87% Complete</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Mobile App</div>
                                  <div class="percent">33%</div>
                              </div>
                              <div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                      <span class="sr-only">33% Complete (danger)</span>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info">
                                  <div class="desc">Dashboard v1.3</div>
                                  <div class="percent">45%</div>
                              </div>
                              <div class="progress progress-striped active">
                                  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                      <span class="sr-only">45% Complete</span>
                                  </div>
                              </div>

                          </a>
                      </li>
                      <li class="external">
                          <a href="#">See All Tasks</a>
                      </li>
                  </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="icon-envelope-alt"></i>
                      <span class="badge bg-important">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <div class="notify-arrow notify-arrow-red"></div>
                      <li>
                          <p class="red">You have 5 new messages</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">See all messages</a>
                      </li>
                  </ul>
              </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                      <i class="icon-bell-alt"></i>
                      <span class="badge bg-warning">7</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                      <div class="notify-arrow notify-arrow-yellow"></div>
                      <li>
                          <p class="yellow">You have 7 new notifications</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-danger"><i class="icon-bolt"></i></span>
                              Server #3 overloaded.
                              <span class="small italic">34 mins</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-warning"><i class="icon-bell"></i></span>
                              Server #10 not respoding.
                              <span class="small italic">1 Hours</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-danger"><i class="icon-bolt"></i></span>
                              Database overloaded 24%.
                              <span class="small italic">4 hrs</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-success"><i class="icon-plus"></i></span>
                              New user registered.
                              <span class="small italic">Just now</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-info"><i class="icon-bullhorn"></i></span>
                              Application error.
                              <span class="small italic">10 mins</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">See all notifications</a>
                      </li>
                  </ul>
              </li>
              <!-- notification dropdown end -->
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="img/avatar1_small.jpg">
                          <span class="username">Jhon Doue</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
						  <li><a href="Logout.php"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="CompanyAdmin.php">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>MASTERS</span>
                          <span class="arrow"></span>
                      </a>
                        <ul class="sub">
                          <li><a class="" href="CompanyProfile.php">Company Profile</a></li>
                          <li><a class="" href="buttons.html">Calendar</a></li>
                          <li><a class="" href="EmployeeStatus.php">Employee Status</a></li>
                          <li><a class="" href="EmpDepartment.php">Departments</a></li>
                          <li><a class="" href="EmpDesignation.php">Designations</a></li>
                          <li><a class="" href="EmpBranch.php">Branches</a></li>
                          <li><a class="" href="500.html">Professional Tax Slaps</a></li>
                          <li><a class="" href="CompanyPayslipStructure.php">Pay Master</a></li>
                          <li><a class="" href="500.html">Deductions</a></li>
                          <li><a class="" href="CompanyPayStructure.php">Pay Structure</a></li>
                      </ul>
                  </li>
                 <li class="">
                      <a class="" href="CompanyEmployee.php">
                          <i class="icon-dashboard"></i>
                          <span>EMPLOYEE</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>Transactions</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="ViewCompanyAttendance.php">Attendance</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>PAYROLL</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="EmployeeViewpayroll.php">View Payroll</a></li>
                          <li><a class="" href="EmployeePayPreview.php">Preview Payroll</a></li>
                      </ul>
                  </li>
                 <!-- <li>
                      <a class="" href="inbox.html">
                          <i class="icon-envelope"></i>
                          <span>REPORTS</span>
                          <span class="label label-danger pull-right mail-info">2</span>
                      </a>
                  </li>-->
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>REPORTS</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="salrepo.php">Monthly Salary Report</a></li>
                          <li><a class="" href="pfrepo.php">Monthly PF Report</a></li>
                          <li><a class="" href="esrepo.php">Monthly ESI Report</a></li>
                          <li><a class="" href="ptrepo.php">Monthly PT Report</a></li>
                      </ul>
                  </li>
                  <!--<li>
                      <a class="" href="login.html">
                          <i class="icon-user"></i>
                          <span>Login Page</span>
                      </a>
                  </li>-->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
               <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Create Employee
                          </header>
                          <div class="panel-body">
                            <form action="addemp.php" class="editprofileform" method="post" enctype="multipart/form-data">
                 	<div class="col-lg-6">
                        <p>
                            <label class="clsLabel1" style="width:120px;">Date of Join : </label>
                            <input type="date"  name="field20" id="field20" class="input-large" />
                        </p>
                        <p>
                            <label class="clsLabel1" style="width:120px;">Date of exit : </label>
                            <input type="date"  name="field21" id="field21" class="input-large" />
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
                            <div id="sal">
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['one'];?></label>
                                <input type="text"  name="field32" id="field32" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['two'];?></label>
                                <input type="text"  name="field33" id="field33" class="input-large" value="0" />
                            </p>
                            <p>
                                <label class="clsLabel1" style="width:120px;"><?php echo $rrr['three'];?></label>
                                <input type="text"  name="field34" id="field34" class="input-large" value="0" />
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
                           </div> 
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
                          </div>
                      </section>
                  </div>
             
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
    <script type="text/javascript" src="scripts/loadcontent.js"></script>



    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>


<script type="text/javascript">
 $(document).ready(function() {      
       $('#field40').click(function() {
		$('#slab').toggle();
		$('#sal').toggle();
 
	});
	
});


</script>

  </body>
</html>