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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />


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
                    <a class="navbar-brand" href="index.php">Bass<span>Pris</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about-us.php">About</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="tutorials.php">Tutorials</a></li>
                        <li class="active"><a href="pricing.php">Pricing</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
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
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Signup</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


     <!--container start-->
    <div class="container">


        <div class="row">

            <div class="col-lg-7 col-sm-7 address">
                <h4>Send a Message</h4>
                <div class="contact-form">
                    <form role="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" placeholder="" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" placeholder="" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company-name">Company Name</label>
                            <input type="text" placeholder="" id="company-name" class="form-control">
                        </div>                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Message</label>
                            <textarea placeholder="" rows="5" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-danger" type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--container end-->



    <!--container end-->

     <!--footer start-->
      <?php
         include 'footer.php'
         ?>
     <!--footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  <script>

      //google map
      function initialize() {
          var myLatlng = new google.maps.LatLng(-37.815207, 144.963937);
          var mapOptions = {
              zoom: 15,
              scrollwheel: false,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: 'Hello World!'
          });
      }
      google.maps.event.addDomListener(window, 'load', initialize);



  </script>

  </body>
</html>

