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
                              Add Attendance
                          </header>
                          <div class="panel-body">
                             <form action="AjaxAdd.php" class="editprofileform" method="post">
                         <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $_SESSION['username']; ?>" />
                        
                            <select name="month[]" required>
                        	<option value="">select</option>
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
                         <select name="year[]" required>
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
						
                          <p>
                            <label class="clsLabel2"style="width:200px; font-weight:bold;">Employee ID</label> : &nbsp;
                            <select class="input-large" name="username1" id="field3"> 
                            <?php 
								$sql = GetDetailsFromQuery("select * from emp_details order by id desc");
								foreach($sql as $row)
								{
									echo "<option value=".$row['emp_id'].">".$row['emp_id']."</option>";
								}
							?>
                            
                            </select>
                         </p>
                        <p>
                            
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_6">Employee Name</label>
                            : &nbsp;<input type="text" id="field4" name="username2" class="input-small Numeric" value="" required/> 
                        </p>

                       
                        
                        <p>
                            
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_9">Leave availed</label>
                            : &nbsp;<input type="text" id="field7" name="username3" class="input-small Numeric" value="" required/> 
                        </p>

                        
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;" id="field_11">Lop</label>
                            : &nbsp;<input type="text" id="field9" name="username4" class="input-small Numeric" value="" required/> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Over Time</label>
                            : &nbsp;<input type="text" id="field10" name="username5" class="input-small Numeric" value="" /> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Holiday_wages</label>
                            : &nbsp;<input type="text" id="field10" name="username6" class="input-small Numeric" value="" /> 
                        </p>
                         <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Incentives</label>
                            : &nbsp;<input type="text" id="field11" name="username7" class="input-small Numeric" value="" /> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Professional Tax</label>
                            : &nbsp;<input type="text" id="field10" name="username8" class="input-small Numeric" value="" /> 
                        </p>
                        <p>
                            <label class="clsLabel2" style="width:200px; font-weight:bold;">Advance</label>
                            : &nbsp;<input type="text" id="field12" name="username9" class="input-small Numeric" value="" /> 
                        </p>
                       
                        
                        <p>
                            <label class="clsLabel2" style="width:200px;">&nbsp;</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="ViewCompanyAttendance.php" name="username" id="" class="btn btn-white">Back</a>
                            <!--&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="" id="" class="btn btn-primary" value="ADD ROW" />-->
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="username" id="test" class="btn btn-success" value="ADD NEW" />
                        </p>                        
                        

                        

                        
                </form>
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

   $("#disform").hide();

  $("#mail").click(function() {
    $(this).next().slideToggle(300);
  });
  
});
</script>
  </body>
</html>