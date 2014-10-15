<?php
error_reporting();
$visible_elements = false;
//include('../header.php'); 
include("../include/config.php");
include("../include/functions.php");
$Url = curPageURL();
$result = GetDetailsFromQuery("select * from category order by id");

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BassPris | Login</title>
<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../prettify/prettify.css" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<script type="application/javascript" language="javascript" src="../scripts/LoginPage.js"></script>
<script type="application/javascript" language="javascript" src="../js/base64.js"></script>
</head>

<body class="loginbody">

<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span>Admin Login - BassPris<span class="subtitle">Payroll Management System</span></h1>
        <div class="loginwrapperinner">
            <div class="alert alert-error" style="text-align:center;">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
            <div class="alert alert-success" id="Success" style="text-align:center;">
            <strong>Well done!</strong> You successfully read this important alert message.
            </div>
            <div class="alert alert-warning" style="text-align:center;">
            Please login with your Username and Password.
            </div>
            <form id="loginform" action="../ImmediateLogin.php" method="post" enctype="multipart/form-data">
                <p class="animate4 bounceIn"><input type="hidden" id="category" name="category" value="Admin" /></p>
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block" id="butsub">Submit</button></p>
                <p class="animate7 fadeIn"><a href="#"><span class="icon-question-sign icon-white"></span> Forgot Password?</a></p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

<script language="javascript" type="text/javascript">
$(document).ready(function(){$(".alert-error").hide();$(".alert-success").hide();$("#butsub").live("click",function(){var c=$("#category").val();var d=$("#username").val();var a=$("#password").val();if(c==0){$(".alert-error").show().html("Please Select <strong>Category</strong>");$(".alert-warning").hide();$("#category").focus();return false}else{if(d==0){$(".alert-error").show().html("Your <strong>Username</strong>");$(".alert-warning").hide();$("#username").focus();return false}else{if(a==0){$(".alert-error").show().html("Your <strong>Password</strong>");$(".alert-warning").hide();$("#password").focus();return false}else{$(".alert-warning").hide();$(".alert-success").show().html('<i class="icon-color icon-ok-sign"></i> <strong>Authenticating...</strong>');var b="cat="+c+"&name="+d+"&pwd="+a;$.ajax({type:"POST",url:"../ImmediateLogin.php",data:b,async:true,error:function(g,e,f){alert(g.responseText)},dataType:"html",success:function(f){$(".alert-warning").hide();$(".alert-error").hide();var e=f.split(/#/);if((e[0]=="1")&&(e[1]=="1")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="../CompanyDetails.php?ref="+g;return false}else{if((e[0]=="1")&&(e[1]=="2")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="CompanyAdmin.php?ref="+g;return false}else{if((e[0]=="1")&&(e[1]=="3")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="DeoMain.php?ref="+g;return false}else{}}}$(".alert-success").hide().html("");$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Username or Passwor is incorrect !!!! </strong>');$("#password").focus();return false}})}}}return false})});
</script>
</body>
</html>
