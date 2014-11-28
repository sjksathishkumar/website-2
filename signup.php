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
                        <li><a href="blog/index.php">Blog</a></li>
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
            <div class="col-lg-1 col-sm-1 address">
            </div>
            <div class="col-lg-6 col-sm-6 address">
                <h4>Send a Message</h4>
                <div class="contact-form">
                    <form role="form" name="purchase" id="purchase" action="signup-process.php" method="post">
                        <?php
                            $package = $_GET['package'];
                            $no_of_emp = $_GET['noofemp'];
                            $amount    = $_GET['amount'];
                            echo "<div class='information' align='center'><h5>You are Choosing <strong>$package</strong> Package for <strong>$no_of_emp Employees</strong>.<br><br>And your total is <strong>$amount</strong></h5></div>";
                        ?>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo "$package"; ?>" name="package" id="package">
                            <input type="hidden" value="<?php echo "$no_of_emp"; ?>" name="no_emp" id="no_emp">
                            <input type="hidden" value="<?php echo "$amount"; ?>" name="amount" id="amount">
                            <label for="name">Name</label>
                            <input type="text" placeholder="" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" placeholder="" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" placeholder="" id="company_name" name="company_name" class="form-control">
                        </div>   
                        <div class="form-group">
                            <label for="designation">Designation</label><br>
                            <select name="designation" id="designation">
                              <option>CEO</option>
                              <option>Director</option>
                              <option>Executive Officer</option>
                              <option>Executive Director</option>
                              <option>Manager</option>
                              <option>Senior Manager</option>
                              <option>Others</option>
                            </select>
                        </div>                     
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="industry">Industry</label><br>
                          <select id="industry" name="industry">
                            <option value="Accounting-Payroll">Accounting and Payroll</option>
                            <option value="Advertising">Advertising</option>
                            <option value="Aerospace">Aerospace</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Apparel">Apparel</option>
                            <option value="Auditing-Taxation">Auditing and Taxation</option>
                            <option value="Automobile">Automobile Industry</option>
                            <option value="Aviation">Aviation</option>
                            <option value="Banking-Finacial-Service">Banking/Finacial Services</option>
                            <option value="Biotechnology">Biotechnology</option>
                            <option value="BPO">BPO</option>
                            <option value="Broadcasting">Broadcasting</option>
                            <option value="Brokerage">Brokerage</option>
                            <option value="Capital-Goods">Capital Goods</option>
                            <option value="Cargo-Courier">Cargo / Courier</option>
                            <option value="Chemicals">Chemicals</option>
                            <option value="Commertial-Professional-Service">Commertial & Professional Service</option>
                            <option value="Communication">Communication</option>
                            <option value="Construction">Construction</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Consumer-Products">Consumer Products</option>
                            <option value="Cosmetics">Cosmetics</option>
                            <option value="Defense">Defense</option>
                            <option value="Department-Stores">Department Stores</option>     
                            <option value="Education">Education</option>
                            <option value="Electrical-Electronics-Manufacturing">Electrical/Electronics Manufacturing</option>
                            <option value="Energy">Energy</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Entrainment">Entrainment</option>
                            <option value="Environmental">Environmental</option>
                            <option value="Executive-Search">Executive Search</option>
                            <option value="Fecility-Management">Fecility Management</option>
                            <option value="Finance">Finance</option>
                            <option value="Food-Agro-Product">Food / Agro Product</option>
                            <option value="Food-Beverage-Tobacco">Food / Beverage, Tobacco</option>
                            <option value="Food-Staples-Retailing">Food / Staples Retailing </option>
                            <option value="Gaming-Animation">Gaming/Animation</option>
                            <option value="Government">Government</option>
                            <option value="Grocery">Grocery</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Healthcare-equipment-services">Healthcare equipment & services</option>
                            <option value="Hospitality">Hospitality</option>
                            <option value="Hotel">Hotel Industry</option>
                            <option value="Household-Personal-Product">Household & Personal Product</option>
                            <option value="HR-Accounting">HR/Accounting</option>
                            <option value="HR-Consultant">HR Consultant</option>
                            <option value="HRO">HRO</option>
                            <option value="Information-Technology">Information Technology</option>
                            <option value="Insurence">Insurence</option>
                            <option value="Internet-Publishing">Internet Publishing</option>
                            <option value="Investment-Banking">Investment Banking</option>
                            <option value="IT-Hardware-Solution">IT - Hardware Solution</option>
                            <option value="IT-ITES-KBP-BPO">IT ITES-KBP BPO</option>     
                            <option value="IT-Software-Products">IT - Software Products</option>
                            <option value="IT-Software-Services">IT - Software Services</option>
                            <option value="Legal">Legal</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Machinery">Machinery</option>
                            <option value="Management-Consulting">Management Consulting</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Manufacturing-Garments">Manufacturing - Garments</option>
                            <option value="Manufacturing-Others">Manufacturing - Others</option>
                            <option value="Materials">Materials</option>
                            <option value="Media">Media</option>
                            <option value="Media-Marketing">Media / Marketing</option>
                            <option value="Motion-Picture-Video">Motion Picture & Video</option>
                            <option value="Music">Music</option>
                            <option value="Newspaper-Publisher">Newspaper Publisher</option>
                            <option value="Non-Profit-NGO">Non-Profit / NGO</option>
                            <option value="Online-Actions">Online Actions</option>
                            <option value="Other">Other</option>
                            <option value="Payroll-Processor">Payroll Processor</option>     
                            <option value="Pension-Funds">Pension Funds</option>
                            <option value="PF-Consultant">PF Consultant</option>
                            <option value="Pharmaceutical-Healthcare">Pharmaceutical/Healthcare</option>
                            <option value="Private-Equity">Private Equity</option>
                            <option value="Product-Engineering-Solutions">Product Engineering Solutions</option>
                            <option value="Publications">Publications</option>
                            <option value="Real-Estate">Real Estate</option>
                            <option value="Recreation">Recreation</option>
                            <option value="Retail-Supplier-Trading">Retail/Supplier/Trading</option>     
                            <option value="Security-Systems">Security Systems</option>
                            <option value="Semiconductor-Semiconductor-Equipment">Semiconductor / Semiconductor Equipment</option>
                            <option value="Service">Service</option>
                            <option value="Shipping">Shipping</option>
                            <option value="Soap-and-Detergent">Soap and Detergent</option>
                            <option value="Software">Software</option>
                            <option value="Sports">Sports</option>
                            <option value="Technology">Technology</option>
                            <option value="Telecom">Telecom</option>
                            <option value="Television">Television</option>
                            <option value="Textile-Industry">Textile Industry</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Travel-Industry">Travel Industry</option>
                            <option value="Trucking">Trucking</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Venture-Capital">Venture Capital</option>
                          </select>                        
                        </div>
                        <div class="form-group">
                            <label for="message">Description (Optional)</label>
                            <textarea placeholder="" rows="5" class="form-control" id="message" name="message"></textarea><br>
                        </div>
                        <button class="btn btn-danger" type="submit">Submit</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-1 col-sm-1 address">
            </div>
            <div class="col-lg-4 col-sm-4 address">
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
         include 'footer.php'
      ?>
     <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <!-- Script for Validation Form -->

    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        $("#purchase").validate({
          rules: {
            name: "required",
            company_name: "required",
            email: {
              required: true,
              email: true
            },
            mobile: {
              required: true,
              digits: true,
              minlength: 10,
              maxlength: 10
            }
          },
          messages: {
            name: "Please specify your Name",
            company_name: "Please enter your company name",
            email: {
              required: "Please Enter your Email.",
              email: "Your email address must be in the format of name@domain.com"
            },
            mobile: {
              required: "Please enter Mobile Number"
            }
          },
          submitHandler:
              function(){
              var form = $("#purchase");
              var postData = $("#purchase").serializeArray();
              var formURL = $("#purchase").attr("action");
              $.ajax(
              {
                  url : formURL,
                  type: "POST",
                  data : postData,
                  success:function(msg) 
                  {
                    if(msg == "success")
                    {
                     $(form).fadeOut(800, function(){
                              form.html('<div class="information"><header>Thanks for your Enquiry ! Please activate email !</header><p>We will contact you shortly. If you have queries please mail to <strong>info@basspris.com</strong></p></div>').fadeIn().delay(2000);
                           });
                   }
                   else
                   {
                    $(form).fadeOut(800, function(){
                              form.html('<div class="information"><header>Your Application submition Failed!</header><p>Please try again! If you have queries please mail to <strong>info@bassbiz.in</strong></p></div>').fadeIn().delay(2000);
                           });
                   }
                    
                  }
              });
          }

        });
       });
	</script>

	

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  </body>
</html>

 