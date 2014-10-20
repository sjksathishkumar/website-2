<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; iso-8859-1"/>
    <meta name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="description" content="Call +91-7299040580 email us info@basspris.com for recruitment consulting, recruitment outsource, payroll outsource and payroll consulting"/>
    <meta name="keywords" content="payroll services, payroll consultants, pris, payroll and recruitment information system, payroll processing"/>
    <meta name="author" content="Bass PRIS"/>
    <meta name="publisher" content="Bass Desio"/>
    <meta name="copyright" content="Bass PRIS"/>
    <meta http-equiv="Reply-to" content="antony@basspris.com"/>
    <meta name="creation_Date" content="12/06/2011"/>
    <meta name="expires" content="11 June 2222"/>
    <meta name="language" content="EN"/>
    <meta name="rating" content="general"/>
    <meta name="revisit-after" content="7 days"/>


    <title>Get Price | Bass PRIS, a payroll and recruitment information system | outsourcing team</title>


    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/flexslider.css"/>
    <link href="/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />


      <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/index.php">Bass<span>Pris</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/about-us.php">About</a></li>
                        <li><a href="/services.php">Services</a></li>
                        <li><a href="/tutorials.php">Tutorials</a></li>
                        <li><a href="/pricing.php">Pricing</a></li>
                        <li><a href="/blog/index.php">Blog</a></li>
                        <li><a href="/contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Signup</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="/index.php">Home</a></li>
                        <li class="active">Activate</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


     <!--container start-->
    <div class="container">


        <div class="row">
            <div class="col-lg-2 col-sm-2 address">
            </div>
            <div class="col-lg-6 col-sm-6 address">
            <?php
                include 'db.php';
                if(!empty($_GET['code']) && isset($_GET['code']))
                {
                    $code=mysqli_real_escape_string($connection,$_GET['code']);

                    $c=mysqli_query($connection,"SELECT uid FROM enquiry WHERE activation='$code'");

                    if(mysqli_num_rows($c) > 0)
                    {

                    $count=mysqli_query($connection,"SELECT uid FROM enquiry WHERE activation='$code' and status='0'");

                    if(mysqli_num_rows($count) == 1)
                    {
                    mysqli_query($connection,"UPDATE enquiry SET status='1' WHERE activation='$code'");
                    echo "<h4>Your account is activated</h4>";   
                    }
                    else
                    {
                    echo "<h4>Your account is already active, no need to activate again</h4>";
                    }

                    }
                    else
                    {
                    echo "<h4>Wrong activation code.</h4>";
                    }

                }
            ?>

            </div>
            <div class="col-lg-3 col-sm-3 address">
                <div class="pricing-table">
                    <div class="pricing-head">
                        <h1> Diamond </h1>
                        <h2><span class="note">&#8377</span><label1 id="amount3"></label1> <span class="note1">pm</span></h2>
                    </div>
                    <ul class="list-unstyled">
                         <li><strong>Base Fee : &#8377 7999 </strong></li>
                         <li>No of Employee's : <var id="emp-diamond"></var></li>
                         <li>Core Payroll</li>
                         <li>MIS Reports</li>
                         <li>Statutory Compliance (India)</li>
                         <li>Leave Management System</li>
                         <li>Multiple Companies*</li>
                         <li>-</li>
                         <li>-</li>
                    </ul>
                    <div class="price-actions">
                        <a href="signup.php" id="basspris4"  class="btn">Get Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container end-->



    <!--container end-->

     <!--footer start-->
      <?php
         include '../footer.php'
         ?>
     <!--footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/hover-dropdown.js"></script>
    <script type="text/javascript" src="/assets/bxslider/jquery.bxslider.js"></script>

    <!--common script for all pages-->
    <script src="/js/common-scripts.js"></script>
  </body>
</html>

