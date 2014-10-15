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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BassPris | Login</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<link rel="shortcut icon" href="../img/favicon.ico.png">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="application/javascript" language="javascript" src="scripts/LoginPage.js"></script>
<script type="application/javascript" language="javascript" src="js/base64.js"></script>
</head>

<body class="loginbody">

<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span><img src="icons/logo-index.png"></h1>
        <div class="loginwrapperinner">
            <div class="alert alert-error" style="text-align:center;">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
            <div class="alert alert-success" id="Success" style="text-align:center;">
            <strong>Well done!</strong> You successfully read this important alert message.
            </div>
            <div class="alert alert-warning" style="text-align:center;">
            <strong>admin</strong> as Username and <strong>admin</strong> as Password.
            </div>
            <form id="loginform" action="ImmediateLogin.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="category" name="username" value="User Admin" />
                <p class="animate3 bounceIn"><input type="text" id="domain" name="username" placeholder="Domain Name" /></p>
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Admin Name" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block" id="butsub">Submit</button></p>
                <p class="animate7 fadeIn"><a href="EmployeeLogin.php">Employee Login</a> <a href="MasterAdminLogin.php" style="float:right;">Admin Login</a></p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

</body>
</html>
