
$(document).ready(function()
{
	$('#CreateNewEmployee').live('click', function()
	{
		var _this = $(this);
		var error = $('.alert-error');
		var field= "";
		var a = $("#field7").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
			for(i=2;i<40;i++){
				
				if((i==2) || (i==3) || (i==4) || (i==5) || (i==6) || (i==36))
				{
					if($("#field"+i).val() == '')
					{ 
						error.html("<strong>" + $("#field"+i).attr("name") + " </strong> cannot be empty").show();
						$("#field"+i).focus();
						return false;
					}else{ 
						field += "&field" +i + "=" + $("#field"+i).val();
					}
				}
				
				else if(i==7)
				{
					if($("#field"+i).val() == '')
					{ 
						error.html("<strong>" + $("#field"+i).attr("name") + " </strong> cannot be empty").show();
						$("#field"+i).focus();
						return false;
					}else if(filter.test(a)){ 
						//return CheckEMailId('#field7');
						field += "&field" +i + "=" + $("#field"+i).val();
						//return true;						
					}else{
						error.html("Please Enter valid <strong>Email Id</strong>").show();
						$("#field7").val('');
						$("#field7").focus();
						return false;
					}
					
				}
				
				else if(i==13)
				{
					if($("#field13").val() == '')
					{ 
						error.html("<strong>" + $("#field13").attr("name") + "</strong> cannot be empty IN PERSONAL DETAILS TAB").show();
						$("#field13").focus();
						return false;
					}else{ 
						field += "&field13=" + $("#field13").val();
					}
				}
				
				else if(i==18)
				{
					if($("#field18").val() == '')
					{ 
						error.html("<strong>" + $("#field18").attr("name") + "</strong> cannot be empty IN OFFICIAL DETAILS TAB").show();
						$("#field18").focus();
						return false;
					}else{ 
						field += "&field18=" + $("#field18").val();
					}
				}
				
				else if(i==20)
				{
					if($("#field20").val() == '')
					{ 
						error.html("<strong>" + $("#field20").attr("name") + "</strong> cannot be empty IN OFFICIAL DETAILS TAB").show();
						$("#field20").focus();
						return false;
					}else{ 
						field += "&field20=" + $("#field20").val();
					}
				}
				
				else if(i==24)
				{
					if($("#field24").val() == '')
					{ 
						error.html("<strong>" + $("#field24").attr("name") + "</strong> cannot be empty IN OFFICIAL DETAILS TAB").show();
						$("#field24").focus();
						return false;
					}else{ 
						field += "&field24=" + $("#field24").val();
					}
				}
				
				else if(i==37)
				{
					if($("input[name=PayType]:checked").length == 0)
					{ 
						error.html("Please Check <strong>" + $("#field37").attr("name") + "</strong> IN SALARY DETAILS TAB ").show();
						$("#field37").focus();
						return false;
					}else{ 
						field += "&field37=" + $("input:radio[name=PayType]:checked").val();
					}
				}
				
				else
				{
					field += "&field" +i + "=" + $("#field"+i).val();
				}
				
			}

		var code = $('#field1').val();
		//alert($('#field42').val());
		var dataString = "code="+code+field;
		alert(dataString); //return false;
		$.ajax
		({
			type: "POST",
			url: "AjaxAddNewEmployee.php",
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				alert("An Error occured....");
			},
			dataType:'html',
			success:function(data){
				//alert(data); return false;
				if(data == 'Success')
				{
					_this.val('Updated Successfully !!!');
					window.location.href = "CompanyEmployee.php";
				}
				else
				{
					error.html(data);
					return false;
				}
			}
		});
		return false;
	});
	
	
	$('#ButNewEmpExcel').live('click', function()
	{
		var file_name = $('#txtexcel').val();
		if(validate_fileupload(file_name)){
			$('#ButNewEmpExcel').val('Reading Data.....');
			$("#myform").ajaxForm({
			target: '#Preview'
			}).submit();
		}
		else{
			alert("Upload Only XLS or xls file format only");
			return false;
		}
		//return false;
	});
	
	var allow = 0;
	function validate_fileupload(fileName)
	{
		if(fileName == '')
		{
			allow = 0;
		}else{
		
		
		var allowed_extensions = new Array("XLS", "xls");
		var file_extension = fileName.split('.').pop(); 
		// split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well.
		//If there will be no extension then it will return the filename.
		//alert(file_extension);
		for(var i = 0; i <= allowed_extensions.length; i++)
		{
			if(allowed_extensions[i]==file_extension)
			{
				allow = 1;  // valid file extension
			}
		}
		}
		return allow;
	}
	
	
	
		
/****************** Reloading employee id **********************/

	$('#ReloadEmpId').live("click", function()
	{
		var ran = $('#field1').val();
		var ran2 = $('#field2').val();
		var dataString ="number="+ran+ran2;
		//alert(dataString);
		$.ajax
		({
			type: "POST",
			url: "AjaxLoadData.php",
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				alert("An Error occured....");
			},
			dataType:'html',
			success:function(data, text, xhr){
				//alert(data);
				$('#field2').val(data);
			}
		});
		return false;
	});
	$("#field2").keyup(function()
	{
		var checkname=$(this).val();
		var availname=remove_whitespaces(checkname);
		if(availname!=''){
		$('#check').show();
		$('#check').fadeIn(400).html('<img src="img/ajax-loader/ajax-loader.gif" /> ');
		var dataString = 'username='+ availname;
			$.ajax({
			type: "POST",
			url: "CheckAvailable.php",
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
				$('#check').html('<img src="img/Accept-icon.png" />');
				}else{
				$('#check').html('<img src="img/Actions-dialog-cancel-icon.png" />');
				}
			}
			});
		}
		else
		{
			$('#check').html('');
		}
	});
//});
function remove_whitespaces(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
/*******retrieve slab id*********/
	$('#slabid').on('click',function(){
		var test = $("#field37").val();					 
			alert(test);
		});
});