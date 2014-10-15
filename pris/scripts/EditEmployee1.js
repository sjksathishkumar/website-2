// JavaScript Document

$(document).ready(function()
{

	var field1 = $("#txtfield1");
	var field2 = $("#txtfield2");
	var error1  = $("#txterror1");
	
	var field3 = $("#txtfield3");
	var field4 = $("#txtfield4");
	var error2  = $("#txterror2");
	
	
	var field14 = $("#txtfield14");
	var field15 = $("#txtfield15");
	var error3  = $("#txterror3");
	
	var field22 = $("#txtfield22");
	var field23 = $("#txtfield23");
	var error4  = $("#txterror4");
	
	
	var ccode = $('#ccode').val();
	var empid = $('#emp_id').val();
	
	var ret_url = $('#ret_url').val();
	
	$('#update_login').live('click',function()
	{
		//alert("hello");
		var _this = $(this);
		if(validateFields(field1, field2, error1))
		{
			
			var name = field2.val();
			var dataString = "empid="+empid+"&name="+name+"&code="+ccode+"&type=info_update";
			//alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					alert("An Error occured....");
				},
				beforeSend: function(){
					//$.jGrowl("Please Wait !!!");
					_this.html("Processing.....");
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					//alert(data);
					$.jGrowl(data);
										setInterval(function(){
					window.location.href = "ViewEmpDetails.php?ref="+ret_url+"&empid="+empid;
										 }, 2000);

				}
				
			});
			return false;
			
			
		}
		return false;
	});
	
	
	$('#personal_update').live('click',function()
	{
		//alert("hello");
		var _this = $(this);
		if(validateFields(field3, field4, error2))
		{
			
			var field = '';
			
			for(i=3;i<13;i++){
				field += "&field" +i + "=" + $("#txtfield"+i).val();
			}
			
			var dataString = "empid="+empid+"&code="+ccode+field+"&type=personal_update";
			///alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					alert("An Error occured....");
				},
				beforeSend: function(){
					//$.jGrowl("Please Wait !!!");
					_this.html("Processing.....");
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					//alert(data); return false;
					$.jGrowl(data);
										setInterval(function(){
					window.location.href = "ViewEmpDetails.php?ref="+ret_url+"&empid="+empid;
										 }, 2000);

				}
				
			});
			return false;
			
			
		}
		return false;
	});
	
	
	$('#comp_update').live('click',function()
	{
		//alert("hello");
		if(validateFields(field14, field15, error3))
		{
			
			var field = '';
			
			for(i=13;i<22;i++){
				field += "&field" +i + "=" + $("#txtfield"+i).val();
			}
			
			var dataString = "empid="+empid+"&code="+ccode+field+"&type=comp_update";
			//alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					alert("An Error occured....");
				},
				beforeSend: function(){
					//$.jGrowl("Please Wait !!!");
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					//alert(data); return false;
					$.jGrowl(data);
										setInterval(function(){
					window.location.href = "ViewEmpDetails.php?ref="+ret_url+"&empid="+empid;
										 }, 2000);

				}
				
			});
			return false;
			
			
		}
		return false;
	});

	$('#acc_update').live('click',function()
	{
		//alert("hello");
		if(validateFields(field22, field23, error4))
		{
			
			var field = '';
			
			for(i=22;i<33;i++){
				field += "&field" +i + "=" + $("#txtfield"+i).val();
			}
			
			var dataString = "empid="+empid+"&code="+ccode+field+"&type=acc_update";
			//alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					alert("An Error occured....");
				},
				beforeSend: function(){
					//$.jGrowl("Please Wait !!!");
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					//alert(data);
					$.jGrowl(data);
					setInterval(function(){
					window.location.href = "ViewEmpDetails.php?ref="+ret_url+"&empid="+empid;
										 }, 2000);
				}
				
			});
			return false;
			
			
		}
		return false;
	});



	function validateFields(field1, field2, error)
	{
		 if(field1.val().length == 0)
		 {
			error.show().html('Cannot be Empty !!!');
			field1.focus();
			return false;
		 }
		 else if (field2.val().length == 0)
		{
			error.show().html('Cannot be Empty !!!');
			field2.focus();
			return false;
		}
		else
		{
			error.hide();
			return true;
		}
	}
});