// JavaScript Document

$(document).ready(function()
{
	var error = $('#error26');
	var success = $('#success6');
	
	
	error.hide();
	success.hide();
	
	$('#txtsub').live('click', function()
	{
		//if(validateFields(fld1, fld2, fld3, fld4, error))
		
		if($("#field").val() == '')
		{
			error.show().html('Cannot be Empty !!!');
			$("#field").focus();
			return false;
		}
		else if($("#field").val() != '')
		{
			 var inputVal = $("#field").val();
			var characterReg = /^([a-zA-Z0-9]{0,8})$/;
			if(!characterReg.test(inputVal)) {
				//$(this).after('<span class="error error-keyup-3">Maximum 8 characters.</span>');
				error.show().html("Maximum 8 characters and ONLY Character and Numbers are allowed ");
				$("#field").focus();
				return false;
			}
			//return false;
		}
		
		if($("#field8").val() == '')
		{
			error.show().html('Cannot be Empty !!!');
			$("#field8").focus();
			return false;
		}
		else if($("#field8").val() != '')
		{
			 var inputVal = $("#field8").val();
			var characterReg = /^([a-zA-Z0-9]{0,8})$/;
			if(!characterReg.test(inputVal)) {
				//$(this).after('<span class="error error-keyup-3">Maximum 8 characters.</span>');
				error.show().html("Maximum 8 characters and ONLY Character and Numbers are allowed ");
				$("#field8").focus();
				return false;
			}
			//return false;
		}
		
		if($("#field2").val() != '')
		{
			var a = $("#field2").val();
			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
			if(!filter.test(a)){
				error.show().html('*Enter valid email !!!');
				$("#field2").focus();
				return false;
			}
		}
		if($("#field4").val() != $("#field5").val())
		{
			error.show().html('PASSWORD Didnot Match !!!');
			$("#field5").focus();
			return false;
		}
		if($("#field6").val() == '')
		{
			error.show().html('Admin Display Name !!!');
			$("#field6").focus();
			return false;
		}
		for(i=1;i<7;i++){
			if($("#field"+i).val() == '')
			{ 
				error.show().html('Cannot be Empty !!!');
				$("#field"+i).focus();
				return false;
			}
			//else{ 
				//field += "&field" +i + "=" + $("#field"+i).val();
			//}
		}
				
	    //{
			var data = $('#field').val();
			var data1 = $('#field1').val();
			var data2 = $('#field2').val();
			var data3 = $('#field3').val();
			var data4 = $('#field4').val();
			var data5 = $('#field5').val();
			var data6 = $('#field6').val();
			var data8 = $('#field8').val();
			
			var ret_url = $('#ret_url').val();
			
			var dataString = "field="+data+"&field1="+data1+"&field2="+data2+"&field3="+data3+"&field4="+data4+"&field5="+data5+"&field6="+data6+"&field8="+data8;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddNewCompany.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
				},
				beforeSend: function(){
					error.hide();
					success.show().html("<div>Our Robots are Preparing your database !!!! Please Wait <strong>...</strong></div>");
				},
				dataType:'html',
				success:function(data){
					//alert(data); //return false;
					if(data == 'Success'){
					//$('#loading-gif').hide();
						success.show().html('New Company has be Added !!!');
						window.location.href = "CompanyDetails.php";
					}
					else
					{
						error.show().html(data);
						return false;
					}
				}
				
			});
			return false;
		//}
		//else
		//return false;
	});
});
function validateFields(fld1, fld2, fld3, fld4, error){
		 
		 if(fld1.val().length == 0)
		 {
			error.show().html('Cannot be Empty !!!');
			fld1.focus();
			return false;
		 }
		 else if (fld2.val().length == 0)
		{
			error.show().html('Cannot be Empty !!!');
			fld2.focus();
			return false;
		}
		else if (fld3.val().length == 0)
		{
			error.show().html('Cannot be Empty !!!');
			fld3.focus();
			return false;
		}
		else if (fld4.val().length == 0)
		{
			error.show().html('Cannot be Empty !!!');
			fld4.focus();
			return false;
		}
		else
		{
			error.hide();
			return true;
		}
}

$(function()
{
	$('').keyup(function()
	{
		var checkname=$(this).val();
		var availname=remove_whitespaces(checkname);
		if(availname!=''){
		$('.check').show();
		$('.check').fadeIn(400).html('<img src="img/spinner-mini.gif" /> ');
		var dataString = 'code='+ availname;
			$.ajax({
			type: "POST",
			url: "CheckAvailableCode.php",
			data: dataString,
			cache: false,
			error: function(request, status, error)
				{
					alert(request.responseText);
				},
			success: function(result){
			var result=remove_whitespaces(result);
			//alert(result);
			if(result==''){
			$('.check').html('&nbsp;&nbsp;<img src="img/accept.png" /> This Username Is Avaliable');
			$(".check").removeClass("red");
			$('.check').addClass("green");
			$(".user_name").removeClass("yellow");
			$(".user_name").addClass("white");
			}else{
			$('.check').html('&nbsp;&nbsp;<img src="img/cross.png" /> This Username Is Already Taken');
			$(".check").removeClass("green");
			$('.check').addClass("red")
			$(".user_name").removeClass("white");
			$(".user_name").addClass("yellow");
			}
			}
			});
		}
		else
		{
			$('.check').html('');
		}
	});
});