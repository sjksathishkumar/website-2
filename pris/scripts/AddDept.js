// JavaScript Document

$(document).ready(function()
{
		var error = $('#error16');
		error.hide();
		var success = $('#success1');
		success.hide();
		var text = $('#DeptVal');
		var code = $('#hid_code').val();
		$('#loading-gif').hide();
	$('#ButNewDept').live('click', function()
	{
		//alert(text);
		if(text.val() == '0')
		{
			error.show().html('Please Select a Department!!!');
			$('#DeptVal').focus();
			return false;
		}
		else
		{
			dataString = "code="+code + "&type=update"+"&dept="+text.val();
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDept.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					success.show().html('Data Updated Successfully !!!');
					//setInterval(success,400);
					
				}
				
			});
			return false;
		}
	return false;
	});
	
	
	
	$('#DelDept').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			var dataString = "delid="+id+"&type=dept";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDept.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					$('#del_'+id).slideUp(400);
				}
				
			});
		}
		else
			return false;
	});
	
});

$(document).ready(function()
{
	
	var deptname = $('#textfield1');
	var error17 = $('#error17');
	var code = $('#hid_code').val();
	error17.hide();
	var success = $('#success2');
		success.hide();
	
	$('#ButCreDept').live('click', function()
	{
		//alert(text);
		if(deptname.val() == 0)
		{
			error17.show().html('Please Add a Department!!!');
			deptname.focus();
			return false;
		}
		else
		{
			dataString = "code="+code + "&type=creDept"+"&dept="+deptname.val();
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDept.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					error17.hide()
					if(data == 'Success'){
					success.show().html('Data Updated Successfully !!!');
					}
					else{
					error17.show().html('This value is already available !!!');
					}
					return false;
				}
				
			});
			return false;
		}
	return false;
	});
	

});



/***** ADD DESIGNATION *****/

$(document).ready(function()
{
		var error = $('#error16');
		error.hide();
		var success = $('#success1');
		success.hide();
		var text = $('#DeptVal');
		var code = $('#hid_code').val();
		$('#loading-gif').hide();
	$('#ButNewDesg').live('click', function()
	{
		//alert(text);
		if(text.val() == '0')
		{
			error.show().html('Please Select a Designation!!!');
			$('#DeptVal').focus();
			return false;
		}
		else
		{
			dataString = "code="+code + "&type=update"+"&desg="+text.val();
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDesg.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					success.show().html('Data Updated Successfully !!!');
					//setInterval(success,400);
					
				}
				
			});
			return false;
		}
	return false;
	});
	
	
	
	$('#DelDesg').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			var dataString = "delid="+id+"&type=delete";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDesg.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					$('#del_'+id).slideUp(400);
				}
				
			});
		}
		else
			return false;
	});
	
});

$(document).ready(function()
{
	
	var deptname = $('#textfield1');
	var error17 = $('#error17');
	var code = $('#hid_code').val();
	error17.hide();
	var success = $('#success2');
		success.hide();
	
	$('#ButCreDesg').live('click', function()
	{
		//alert(text);
		if(deptname.val() == 0)
		{
			error17.show().html('Please Add a Department!!!');
			deptname.focus();
			return false;
		}
		else
		{
			dataString = "code="+code + "&type=create"+"&dept="+deptname.val();
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddDesg.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					error17.hide()
					if(data == 'Success'){
					success.show().html('Data Updated Successfully !!!');
					}
					else{
					error17.show().html('This value is already available !!!');
					}
					return false;
				}
				
			});
			return false;
		}
	return false;
	});
	

});
