// JavaScript Document
// JavaScript Document

$(document).ready(function()
{
	var field1 = $("#txtfield1");
	var field2 = $("#txtfield2");
	var field3 = $("#txtfield3");
	var error  = $("#error11");
	error.hide();
	
	
	var field4 = $("#txtfield4");
	var field5 = $("#txtfield5");
	var field6 = $("#txtfield6");
	var field7 = $("#txtfield7");
	var error3  = $("#error13");
	error3.hide();
	
	var field18 = $("#txtfield18");
	var field19 = $("#txtfield19");
	
	
	var field10 = $("#txtfield10");
	var field11 = $("#txtfield11");
	var field12 = $("#txtfield12");
	var error4  = $("#error14");
	error4.hide();
	
	var field15 = $("#txtfield15");
	var field13 = $("#txtfield13");
	var error5  = $("#error15");
	error5.hide();
	
	var ccode = $('#hid_code').val();
	var empid = $('#hid_empid').val();
	
	var notify_success = $('#notifiy-success');
	var notify_error = $('#notifiy-error');
	
	
	/*$("#EmpBasciInfo").live('click', function()
	{
		if(validateFields(field2, field3, error))
		{
			var uname = field1.val();
			var pwd = field2.val();
			var dname = field3.val();
			dataString = "uname="+uname+"&pwd="+pwd+"&dname="+dname+"&code="+ ccode +"&empid="+empid+"&type=info";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					//alert(request.responseText);
					//alert("An Error occured....");
					$('#loading-gif').hide();
					var options = $.parseJSON($(notify_error).attr('data-noty-options'));
					noty(options);
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					var options = $.parseJSON($(notify_success).attr('data-noty-options'));
					noty(options);
					
				}
				
			});
			return false;
		}
		else
			return false;
	});
	*/
	
	$("#update_dept").live('click', function()
	{
		if(validateFields(field4, field5, error3))
		{
			var dept = field4.val();
			var desg = field5.val();
			var dob = field6.val();
			var doj = field7.val();
			var st = field15.val();
			var esi =field18.val();
			var pf = field19.val();
			dataString = "dept="+dept+"&desg="+desg+"&dob="+dob+"&doj="+doj+"&code="+ccode+"&empid="+empid+"&st="+st+"&esi="+esi+"&pf="+pf+"&type=emp_update";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					//alert(request.responseText);
					//alert("An Error occured....");
					$('#loading-gif').hide();
					var options = $.parseJSON($(notify_error).attr('data-noty-options'));
					noty(options);
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					var options = $.parseJSON($(notify_success).attr('data-noty-options'));
					noty(options);
					
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
	/*$("#update_addr1").live('click', function()
	{
			var addr = field13.val();
			addr1 = jQuery.trim(addr);
			if(addr1.length == 0)
			{
			error15.show().html('Cannot be Empty !!!');
			field13.focus();
			return false;
			}
			else {
			
			dataString = "addr="+addr1+"&code="+ccode+"&empid="+empid+"&type=addr";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					//alert(request.responseText);
					//alert("An Error occured....");
					$('#loading-gif').hide();
					var options = $.parseJSON($(notify_error).attr('data-noty-options'));
					noty(options);
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					var options = $.parseJSON($(notify_success).attr('data-noty-options'));
					noty(options);
					
				}
				
			});
			return false;
			}
	}); */
	
	$("#UpDeoDet").live('click', function()
	{
		if(validateFields(field1, field6, error5))
		{
			var dname = field3.val();
			var email = field4.val();
			var doj = field5.val();
			var work = field6.val();
			var st = field7.val();
			//var deoid = field6.val();
			
			dataString = "dname="+dname+"&email="+email+"&doj="+doj+"&work="+work+"&st="+st+"&empid="+empid+"&code="+ ccode + "&type=deo_update";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateEmployee.php",
				data: dataString,
				error: function(request, status, error)
				{
					//alert(request.responseText);
					//alert("An Error occured....");
					$('#loading-gif').hide();
					var options = $.parseJSON($(notify_error).attr('data-noty-options'));
					noty(options);
				},
				beforeSend: function(){
					$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					$('#loading-gif').hide();
					//alert(data);
					var options = $.parseJSON($(notify_success).attr('data-noty-options'));
					noty(options);
					
				}
				
			});
		}
		else
		{
			return false;
		}
	});
	
	
	/*$("#SubmitButton").live('click', function()
	{
		$(this).hide();
		$('.loading').show();
		$('#Preview').hide();
		//return false;
	});
	*/
	
	function validateFields(fld1, fld2, error){
		 
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
		else
		{
			error.hide();
			return true;
		}
	}
	
	
	
	
		
});