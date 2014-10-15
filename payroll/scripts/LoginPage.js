/*
$(document).ready(function(){$(".alert-error").hide();$(".alert-success").hide();$("#butsub").click(function(){var c=$("#category").val();var d=$("#username").val();var a=$("#password").val();if(c==0){$(".alert-error").show().html("Please Select <strong>Category</strong>");$(".alert-warning").hide();$("#category").focus();return false}else{if(d==0){$(".alert-error").show().html("Your <strong>Username</strong>");$(".alert-warning").hide();$("#username").focus();return false}else{if(a==0){$(".alert-error").show().html("Your <strong>Password</strong>");$(".alert-warning").hide();$("#password").focus();return false}else{$(".alert-warning").hide();$(".alert-success").show().html('<i class="icon-color icon-ok-sign"></i> <strong>Authenticating...</strong>');var b="cat="+c+"&name="+d+"&pwd="+a;$.ajax({type:"POST",url:"ImmediateLogin.php",data:b,async:true,error:function(g,e,f){alert(g.responseText)},dataType:"html",success:function(f){$(".alert-warning").hide();$(".alert-error").hide();var e=f.split(/#/);alert(f);if((e[0]=="1")&&(e[1]=="4")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="ViewEmployee.php?ref="+g;return false}else{if((e[0]=="1")&&(e[1]=="2")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="CompanyAdmin.php?ref="+g;return false}else{if((e[0]=="1")&&(e[1]=="3")){$(".alert-success").show().html("<strong>Redirecting...</strong>");var g=$.base64Encode(c);window.location.href="DeoMain.php?ref="+g;return false}else{}}}$(".alert-success").hide().html("");$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Username or Passwor is incorrect !!!! </strong>');$("#password").focus().val('');return false}})}}}return false})});






/******************************   LOGIN PAGE *****************************/

$(document).ready(function()						   
{
	$(".alert-error").hide();
	$(".alert-success").hide();
	
	/*$("#butsub").live('click', function()
   	{
	   var c=$("#domain").val();
	   var d=$("#username").val();
	   var e = $("#category").val();
	   var a=$("#password").val();
	   if(c==0)
	   {
		   $(".alert-error").show().html("Your <strong>Domain Name</strong>");
		   $(".alert-warning").hide();$("#domain").focus();
		   return false;
		}
		else
		{
			if(d==0){$(".alert-error").show().html("Your <strong>Username</strong>");
			$(".alert-warning").hide();$("#username").focus();
			return false;
		}
		else
		{
			if(a==0)
			{
				$(".alert-error").show().html("Your <strong>Password</strong>");
				$(".alert-warning").hide();
				$("#password").focus();
				return false;
			}
			else
			{
				$(".alert-warning").hide();
				$(".alert-success").show().html('<i class="icon-color icon-ok-sign"></i> <strong>Authenticating...</strong>');
				var b="cat="+c+"&name="+d+"&pwd="+a;
				//
				
				$.ajax
				({
				 	type:"POST",
					url:"ImmediateLogin.php",
					data:b,
					async:true,
					error:function(g,e,f)
					{
						alert(g.responseText)
					},
					dataType:"html",
					success:function(f)
					{
						$(".alert-warning").hide();
						$(".alert-error").hide();
						alert(f); return false;
						switch(f)
						{
							case '0':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Username or Passwor is incorrect !!!! </strong>');
							$("#password").val('').focus();
							break;
							
							case '1':
							$(".alert-success").show().html("<strong>Redirecting...</strong>");
							
							if(c == 'Master Admin'){
								window.location.href="MasterAdmin.php";
							}else{
								window.location.href="CompanyAdmin.php";
							}
							break;
							
							case '2':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Domain Name is Incorrect !!!! </strong>');
							$("#password").val('').focus();
							break;
							
							case '3':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong> Values Needed !!!! </strong>');
							$("#password").val('').focus();
							break;
							
						}
					}
				})
			}
		}
	}
	return false;
});*/
	
	$("#butsub").live('click', function()
   	{
	   var c=$("#domain").val();
	   var d=$("#username").val();
	   var e = $("#category").val();
	   var a=$("#password").val();
	   if(c==0)
	   {
		   $(".alert-error").show().html("Your <strong>Domain Name</strong>");
		   $(".alert-warning").hide();$("#domain").focus();
		   return false;
		}
		else
		{
			if(d==0){$(".alert-error").show().html("Your <strong>Username</strong>");
			$(".alert-warning").hide();$("#username").focus();
			return false;
		}
		else
		{
			if(a==0)
			{
				$(".alert-error").show().html("Your <strong>Password</strong>");
				$(".alert-warning").hide();
				$("#password").focus();
				return false;
			}
			else
			{
				$(".alert-warning").hide();
				$(".alert-success").show().html('<i class="icon-color icon-ok-sign"></i> <strong>Authenticating...</strong>');
				var b="cat="+e+"&name="+d+"&pwd="+a+"&domain="+c; 
				//alert(b); //return false;
				
				
				$.ajax
				({
				 	type:"POST",
					url:"ImmediateLogin.php",
					data:b,
					async:true,
					error:function(g,e,f)
					{
						alert(g.responseText)
					},
					dataType:"html",
					success:function(f)
					{
						$(".alert-warning").hide();
						$(".alert-error").hide();
						//alert(f);// return false;
						switch(f)
						{
							case '0':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Username or Passwor is incorrect !!!! </strong>');
							$("#password").val('').focus();
							break;
							
							case '1':
							$(".alert-success").show().html("<strong>Redirecting...</strong>");
							
							if(e == 'Master Admin'){
								window.location.href="MasterAdmin.php";
							}
							else if(e == 'User Admin'){
								window.location.href="CompanyAdmin.php";
							}
							else{
								window.location.href="Dashboard.php";
							}
							break;
							
							case '2':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Domain Name is Incorrect !!!! </strong>');
							$("#password").val('').focus();
							break;
							
							case '3':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong>Login Creditional is not Enabled !!!! <br />Contact your Admin </strong>');
							$("#password").val('').focus();
							break;
							
							case '5':
							$(".alert-success").hide().html("");
							$(".alert-error").show().html('<i class="icon-remove-sign"></i> <strong> Values Needed !!!! </strong>');
							$("#password").val('').focus();
							break;
							
						}
					}
				})
			}
		}
	}
	return false;
})
});