<?php
error_reporting();
$visible_elements = false;
//include('header.php'); 
include("include/config_master.php");
include("include/functions.php");
$Url = curPageURL();
$result = GetDetailsFromQuery("select * from category where id < 4 order by id");
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

    
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="application/javascript" language="javascript" src="scripts/LoginPage.js"></script>
	<script type="application/javascript" language="javascript" src="js/base64.js"></script>
</head>

  <body class="login-body">

    <div class="container">

        <form id="loginform" class="form-signin" action="ImmediateLogin.php" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
        <input type="hidden" id="category" name="username" value="User Admin" />
            <input type="text" class="form-control"  id="domain" name="username" placeholder="Domain Name" autofocus>    
            <input type="text" class="form-control" id="username" name="username" placeholder="Admin Name" autofocus>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" id="butsub" type="submit">Sign in</button>
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div>

        </div>

      </form>

    </div>


  </body>
</html>
