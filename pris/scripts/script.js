// JavaScript Document

$(document).ready(function()
{
	
	/*var field1 = $("#txtfield1");
	var field2 = $("#txtfield2");
	var error  = $("#error1");
	error.hide();
	
	var field3 = $("#txtfield3");
	var field4 = $("#txtfield4");
	var field5 = $("#txtfield5");
	var error3  = $("#error3");
	error3.hide();
	
	
	var field6 = $("#txtfield6");
	var field7 = $("#txtfield7");
	var field8 = $("#txtfield8");
	var field9 = $("#txtfield9");
	var field10 = $("#txtfield10");
	var error4  = $("#error4");
	error4.hide();
	
	var ccode = $('#hid_code').val();
	var notify_success = $('#notifiy-success');
	var notify_error = $('#notifiy-error');
	
	
	$("#update_basic_info").live('click', function()
	{
		if(validateFields(field1, field2, error))
		{
			var name = field1.val();
			var person = field2.val();
			var dataString = "name="+name+"&person="+person + "&code="+ ccode +"&type=info";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
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
	
	
	
	/******************************  WORKING DAYS CALENDAR ****************************/
	
	$("#createBuss").live('click', function()
	{
		var data = $('#field1').val();
		var name = $('#field2').val();
		var type = $('#field').val();
		
		var _this = $(this);
		var ret_url = $('#ret_url').val();
		
		if(data == "")
		{
			alert('This field cannot be empty !!!');
			$("#field1").focus();
			return false;
		}
		else if(name == "")
		{
			alert('This field cannot be empty !!!');
			$("#field2").focus();
			return false;
		}
		else
		{
			var code = $('#hide_code').val();
			var dataString = "code="+code+"&data="+data+"&name="+name+"&type="+type;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "WorkingDays.php?ref="+ret_url;
					}
				}
				
			});
		}
		return false;
		
		
	});
	
	$("#updateBuss").live('click', function()
	{
		var data = $('#field1').val();
		var name = $('#field2').val();
		var type = $('#field').val();
		
		var _this = $(this);
		var ret_url = $('#ret_url').val();
		var row_id = $('#row_id').val();
		
		if(data == "")
		{
			alert('This field cannot be empty !!!');
			$("#field1").focus();
			return false;
		}
		else if(name == "")
		{
			alert('This field cannot be empty !!!');
			$("#field2").focus();
			return false;
		}
		else
		{
			var code = $('#hide_code').val();
			var dataString = "code="+code+"&data="+data+"&name="+name+"&type="+type+"&row_id="+row_id;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "WorkingDays.php?ref="+ret_url;
					}
				}
				
			});
		}
		return false;
		
		
	});
	
	
	/******************************  CLAIM DATA ****************************/
	
	$("#updateClaimdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal = '';
		
		var num_rows = $('#num_rows').val();
		
		
		for(i=1;i<(parseInt(num_rows)+1);i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal += "&cal" +i + "=" + $("#cal_"+i).val();
		}
			//var code = $('#hide_code').val();
			var dataString = "type="+type+field+data+cal;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpClaims.php";
					}
				}
				
			});
			return false;
	});
	
	$("#createClaimdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal = '';
		
		var num = $('#nom_rows').val();
		num = parseInt(num) + 1;
		
		//var ret_url = $('#ret_url').val();
		
		for(i=1;i<num;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal += "&cal" +i + "=" + $("#cal_"+i).val();
		}
			//var code = $('#hide_code').val();
			var dataString = "type="+type+field+data+cal;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpClaims.php";
					}
				}
				
			});
			return false;
	});
	
	/******************************  LOAN DATA ****************************/
	
	
	$("#updateLoandata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var num = $('#nom_rows').val();
		num = parseInt(num) + 1;
		//alert(num);
		
		var field = '';
		var data = '';
		var cal = '';
		
		var ret_url = $('#ret_url').val();
		
		
		for(i=1;i<num;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal += "&cal" +i + "=" + $("#cal_"+i).val();
		}
			var code = $('#hide_code').val();
			var dataString = "type="+type+field+data+cal;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpLoan.php";
					}
				}
				
			});
			return false;
	});
	
	
	$("#createLoandata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal = '';
		
		var num = $('#nom_rows').val();
		num = parseInt(num) + 1;
		
		var ret_url = $('#ret_url').val();
		
		
		for(i=1;i<num;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal += "&cal" +i + "=" + $("#cal_"+i).val();
		}
			var code = $('#hide_code').val();
			var dataString = "type="+type+field+data+cal;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpLoan.php";
					}
				}
				
			});
			return false;
	});
	
	
	
	/******************************  PF DATA ****************************/
	
	
	$("#createPfdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		
		//var ret_url = $('#ret_url').val();
		
		
		for(i=1;i<6;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
		}
			var code = $('#pay_name').val();
			var dataString = "pay_name="+code+field+"&type="+type+data;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EpfSlab.php";
					}
					if(data == 'Esi_Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href ="EmpEsiSlab.php";
					}
				}
				
			});
			return false;
	});
	
	
	
	$("#createEsidata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		
		

			for(i=1;i<4;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			}
			
			var code = $('#pay_name').val();
			var dataString = "pay_name="+code+"&type="+type+field+data;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Added Successfully !!!');
						window.location.href = "EmpEsiSlab.php";
					}
				}
				
			});
			return false;
	});
	
		/******************************  PT DATA ****************************/

	
	
	
	$("#updatePtdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		alert("update pt data");
		for(i=1;i<8;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
				
			data += "&data" +i + "=" + $("#field_"+i).val();
		}
			var code = $('#hide_code').val();
			var dataString = "code="+code+field+"&type="+type+data;
			alert("data string"+dataString); //return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpPTSlab.php?name="+code;
					}
				}
				
			});
			return false;
	});
	
	$("#createPtdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		//if(type == 'epf_update' || type == 'epf_create'){

		for(i=1;i<8;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
				
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from ="&cal_from1=" + $("#cal_1").val();
			}
		/*}else{
			
			for(i=1;i<4;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			}
			
		}*/
			var code = $('#hide_code').val();
			var dataString = "code="+code+field+"&type="+type+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					alert(data);
					if(data == 'Success')
					{
						//if(type == 'epf_update' || type == 'epf_create'){
						_this.val('Added Successfully !!!');
						window.location.href = "EmpPTSlab.php?ref="+ret_url+"&id="+ret_id;
						/*}else{
							_this.val('Added Successfully !!!');
						window.location.href = "EmpEsiSlab.php?ref="+ret_url;
						} */
					}
				}
				
			});
			return false;
	});
												 	

	
		
			/*$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Error'){
						alert('This name is already present in db');
						$('#field1').focus();
						return false;
					}
					else
					{
						_this.val('Added Successfully !!!');
						parent.$.colorbox.close();
						window.parent.location.href = "EmpPTSlabView.php";
					}
				}
				
			});
		}
		return false;
	});*/
	
	
	
	
	
	
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
	

	$("#updateItdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		
		for(i=1;i<6;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
		}
			var code = $('#hide_code').val();
			var dataString = "code="+code+field+"&type="+type+data;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data); return false;
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpITSlab.php";
					}
				}
				
			});
			return false;
	});
	/**********************************Add Pay Struc*******************************/
	$("#AddPayStruc").live("click", function()
	{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		/*********For percentage alone*************/
		
		var field5 = document.getElementById("field5").value;
		var field6 = document.getElementById("field6").value;
		var field7 = document.getElementById("field7").value;
		var field8 = document.getElementById("field8").value;
		var field9 = document.getElementById("field9").value;
		var field10 = document.getElementById("field10").value;
		var field11 = document.getElementById("field11").value;
		var field12 = document.getElementById("field12").value;

	



			var total = parseInt(field5)+parseInt(field6)+parseInt(field7)+parseInt(field8)+parseInt(field9)+parseInt(field10)+parseInt(field11)+parseInt(field12);						        		
			if(total == 100)
				{
					alert("success your allowed");
				}	
			else
				{
				alert("Your total percentage is"+total+"but it should be equal to 100 %" );
				return false;
				}

	});
	/******************************  LIVE EDIT DATA ****************************/


$('.editbox').live('click', function()
{
	//e.preventDefault();
	var text = $(this).html();
	var ID = $(this).attr("id");
	
	if(text == 'Edit'){
	$(this).html('Save');
	$("#one_"+ID).hide();
	$("#two_"+ID).hide();
	$("#one_input_"+ID).show();
	$("#two_input_"+ID).show();
	}
	else{
		//alert('Saved!!!');
	
	//$("#one_"+ID).show();
	$("#one_input_"+ID).show();
	$("#two_input_"+ID).show();
	var one_val=$("#one_input_"+ID).val();
	var two_val=$("#two_input_"+ID).val();
	var emp_id =$("#EmpId_"+ID).val();

		var dataString = "id="+ID+"&la="+one_val+"&lop="+two_val+"&empid="+emp_id;
		//alert(dataString); return false;
		$.ajax
		({
			type: "POST",
			url: "AjaxLiveEditTable.php",
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				//alert("An Error occured....");
				$("#loading_"+ID).hide();
			},
			beforeSend: function(){
				$("#loading_"+ID).show();
			},
			dataType:'html',
			success:function(data){
				var i = data.split(/#/);
				var la = i[0];
				var pdays = i[1];
				var lop = i[2];
				//alert("la="+la+"pdays="+pdays+"lop="+lop);
				$("#loading_"+ID).hide();
				$("#one_input_"+ID).hide();
				$("#two_input_"+ID).hide();
				$('.editbox').html('Edit');
				$("#one_"+ID).html(la).show();
				$("#two_"+ID).html(lop).show();
				$("#pdays_"+ID).html(pdays).show();
				
			}
			
		});
	return false;
	}
	return false;
});



	/******************************  MASTERS  ****************************/



	$('#master').live('change', function()
	{
		var master = $(this).val();
		var code = $('#hid_code').val();
		var dataString = "master="+master+"&code="+code;
		
		//alert(dataString); return false;
		$.ajax
		({
			type: "POST",
			url: "AjaxLoadData.php",
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				alert("An Error occured....");
				//$("#loading").hide();
			},
			beforeSend: function(){
				//$("#loading").show();
			},
			dataType:'html',
			success:function(data){
				//alert(data);
				if(master == '1')
				{
					$('#master_head').html('List of Departments');
				}
				else if(master == '3')
				{
					$('#master_head').html('List of Branches');
				}
				else
				{
					$('#master_head').html('List of Designations');
				}
				$('#LoadContent').html(data);
				//$("#loading").hide();
			}
			
		});
		return false;
	});
	
	
	
	
	$('#AddToMaster').live('click', function()
	{
		var master = $('#master').val();
		var mdata = $('#field2').val();
		var purl;
		
		if(mdata == ''){ alert('Master Cannot be Empty');$('#field2').focus(); return false; }
		if(mdata != '')
		{
			var characterReg = /^[a-zA-Z\s]+$/;
			if(!characterReg.test(mdata))
			{
				alert('Only Characters are Allowed Here !!!');
				$('#field2').focus();
				return false;
			}
		}
		
		
		if(master == '1') {purl = 'AjaxAddDept.php';}else if(master == '3'){purl = 'AjaxAddBranch.php';}else if(master == '4'){purl = 'AjaxAddEmployeeStatus.php'}else{ purl = 'AjaxAddDesg.php';}
		
		var dataString = "master="+master+"&mdata="+mdata+"&type=create";
		
		//alert(dataString); return false;
		$.ajax
		({
			type: "POST",
			url: purl,
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				alert("An Error occured....");
				//$("#loading").hide();
			},
			beforeSend: function(){
				//$("#loading").show();
			},
			dataType:'html',
			success:function(data){
				//alert(data);
				if(data == 'Error'){
					alert('This name is already present in db');
					$('#field2').focus();
				}else{
					$(data).appendTo('#dyntable');
					$('#field2').val('');
					$.colorbox.close();
				}
			}
			
		});
		return false;
	});
	
	
	$('.editMaster').live('click', function()
	{
		var text = $(this).html();
		var ID = $(this).attr("id");
		var mas = $(this).attr("name");
		var mas_code = $('#row_code').val();
		var purl;
		//alert(mas);  return false;
		if(text == 'Edit'){
			$(this).html('Save');
			$("#one_"+ID).hide();
			$("#one_input_"+ID).show();
		}
		else{
			$("#one_input_"+ID).show();
			var data = $("#one_input_"+ID).val();
			//alert(data);
			var dataString = "id="+ID+"&dept="+data+"&type=edit"+"&mcode="+mas_code;
			
			if(mas == 'Dept')
				purl = "AjaxAddDept.php";
			else if(mas == 'Branch')
				purl = "AjaxAddBranch.php";
			else if(mas == 'Status')
				purl = "AjaxAddEmployeeStatus.php";
			else
				purl = "AjaxAddDesg.php";
			
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: purl,
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					//alert("An Error occured....");
					//$("#loading_"+ID).hide();
				},
				beforeSend: function(){
					$("#loading_"+ID).show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Error')
					{
						alert('This Name is Already in Database !!!');
						$("#loading_"+ID).hide();
						return false;
					}
					else
					{
						$("#loading_"+ID).hide();
						$("#one_input_"+ID).hide();
						$('.editMaster').html('Edit');
						$("#one_"+ID).html(data).show();
					}
				}
				
		});
		return false;
		}
	return false;		
	});
	
	
	
	
	
	/******************************  DELETE DATA ****************************/



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
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
	// Delete Pay Structure //
	/*************DELETE STATUS************/
	
	$('#DelStatus').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			var dataString = "delid="+id+"&type=dept";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddEmployeeStatus.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					
				}
				
			});
			return false;
		}
		else
			return false;
	});
	//DELETE STATUS
	
	$('#DelPay').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			//alert(id);
			var dataString = "delid="+id+"&type=pay";
			//alert(dataString); // return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxDeletePay.php",
				data: dataString,
				
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					alert("Pay Structure Data Deleted Successfully !!!!!!");
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					window.location.href = "CompanyPayStructure.php"
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
		// Delete Pay Structure  END//
	
	/************* Add New EPF Slab *********************/
	
	
	$("#AddNewEPFStruc").live("click", function()
	{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=9;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=9; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var dataString = "empid="+empid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxAddNewEPFStructure.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/CompanyEPFStructure.php";
					/*;_this.val('Processing.....')*/
				},
				dataType:'html',
				success:function(data){ 
					//return false;
					if(data == 'Success')
					{

						_this.val('Added Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
	
	/************* END Add New EPF Slab *********************/
	
		/************* Add New ESI Slab *********************/
	
	
	$("#AddNewESIStruc").live("click", function()
	{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=7;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=7; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var dataString = "empid="+empid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxAddNewESIStructure.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/CompanyESIStructure.php";
					//_this.val('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert("Data come"+data);
					if(data == 'Success')
					{
						//alert("Added ESI Slab Successfully !!!!!"+data); //return false;
					_this.val('Added Successfully');
					window.location.href = "CompanyESIStructure.php";
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
	
	/************* END Add NewESI Slab *********************/


		/************* Update employee PF STRUCTURE *********************/
		
		//$("#UpdateEPFStruc").live("click", function()
//		{
//			
		//	var _this = $(this);
//					
//			var field = "";
//			var fieldsv = "";
//			var key = '';
//			
//			var ret_url = $('#ret_url').val();
//			//var uid = $('#pay_name').val();
//			
//			var num = $("#field_res").val();
//		    num = parseInt(num) + 2;
//			
//			//			num = parseInt(num);
//			alert(num);//return false;
//			for(i=0;i<num;i++){
//			field +="&field" +i + "=" + $("#field"+i).val();
//			}
//			for(k=0;k<=4;k++){
//			key +="&keyword" +k + "=" + $("#keyword"+k).html();
//			}
//			
//			for(j=3;j<=num;j++){
//			fieldsv +="&field_" +j + "=" + $("#field_"+j).val();
//			}
//			var uid = $("#sid").val();
		//	var uid = $("#user_id").val();
			//var dataString = "id="+uid+"&num="+num+field+fieldsv+key;
//			var dataString = "id="+uid;
//			alert(dataString);// return false;
//			
//			//alert(dataString); //return false;
//			
//			$.ajax({
//				type	:	'POST',
//				url		:	'AjaxUpdateEPFSlab.php',
//				data	:	dataString ,
//				error: function(request, status, error){
//					alert(request.responseText);
//					alert(request);
//				},
//				beforeSend: function(){
//					_this.val('Processing.....');
//				},
//				dataType:'html',
//				success:function(data){
//					alert("Added Successfully !!!!!"+data); //return false;
//					_this.val('Updated Successfully');
//					window.location.href = "CompanyEPFStructure.php";
//					
//				}
//			});
//			
//			//return false;
//			//}
//		});
		
		$("#UpdateEPFStruc").live("click", function()
		{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=9;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=9; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var uid = $("#sid").val();
		var dataString = "id="+uid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxUpdateEPFSlab.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/CompanyEPFStructure.php";
					/*;_this.val('Processing.....')*/
				},
				dataType:'html',
				success:function(data){ 
					//return false;
					if(data == 'Success')
					{

						_this.val('Updated Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
			
		
		
		
		/************* END Update employee PF STRUCTURE *********************/
	
		/*************  Update employee ESI STRUCTURE *********************/
	
		$("#UpdateESIStruc").live("click", function()
		{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=7;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=7; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var uid = $("#sid").val();
		var dataString = "id="+uid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxUpdateESISlab.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/CompanyESIStructure.php";
					//_this.val('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert("Data come"+data);
					if(data == 'Success')
					{
						//alert("Added ESI Slab Successfully !!!!!"+data); //return false;
					_this.val('Added Successfully');
					window.location.href = "CompanyESIStructure.php";
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
		
			
			/*$.ajax({
				type	:	'POST',
				url		:	'AjaxUpdateESISlab.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					_this.val('Processing.....');
				},
				dataType:'html',
				success:function(data){
					alert("Update ESI Slab Successfully !!!!!"+data); //return false;
					_this.val('Updated Successfully');
					window.location.href = "CompanyESIStructure.php";
					
				}
			});
			
			return false;
			//}
		});
		
		
		/************* END Update employee ESI STRUCTURE *********************/
		$("#UpdatePTSlabStructure").live("click", function()
		{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=18;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=9; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var uid = $("#sid").val();
		var dataString = "id="+uid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxUpdatePTSlabStructure.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/EmpPTSlabView.php";
					/*;_this.val('Processing.....')*/
				},
				dataType:'html',
				success:function(data){ 
					//return false;
					if(data == 'Success')
					{

						_this.val('Updated Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
	
	/*************Update Pay slab*****************/
	$("#UpdatePaySlab").live("click", function()
		{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=3;i<=18;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty!!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		//alert(field);
		for(j=5; j<=9; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
			//alert(j);
		}
		//alert(data);
		var uid = $("#sid").val();
		var dataString = "id="+uid+"&type=create"+field+data;
		//alert(dataString); 
		//return false;
		$.ajax({
			    type	:	'POST',
				url		:	'AjaxUpdatePaySlab.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
					 window.location="http://localhost/payroll_final/payroll_tester/CompanyPayStructure.php";
					/*;_this.val('Processing.....')*/
				},
				dataType:'html',
				success:function(data){ 
					//return false;
					if(data == 'Success')
					{

						_this.val('Updated Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
	/********End of update pay slab*******/
	
	// Delete EPF Structure //
	
	$('#DelEPF').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			//alert(id);
			var dataString = "delid="+id+"&type=epf";
			//alert(dataString); // return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxDeleteEPF.php",
				data: dataString,
				
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					alert("EPF Structure Data Deleted Successfully !!!!!!");
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					window.location.href = "CompanyEPFStructure.php"
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
		// Delete EPF Structure  END//
		
		// Delete PTSLAP Structure //
	
	$('#DelPT').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			alert(id);
			var dataString = "delid="+id+"&type=epf";
			alert(dataString); // return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxDeletePTSlab.php",
				data: dataString,
				
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					alert("PT SLAB Data Deleted Successfully !!!!!!");
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					window.location.href = "EmpPTSlabView.php"
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
		// Delete PT SLAP  END//
		
		// Delete ESI Structure //
	
	$('#DelESI').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			//alert(id);
			var dataString = "delid="+id+"&type=esi";
			//alert(dataString); // return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxDeleteESI.php",
				data: dataString,
				//alert(datastring);
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					alert("ESI Structure Data Deleted Successfully !!!!!!");
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp("slow");
					window.location.href = "CompanyESIStructure.php"
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
		// Delete ESIStructure  END//
	
		
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
				
					//$('#loading-gif').hide();
					error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					//$('#loading-gif').hide();
					$('#del_'+id).slideUp(400);
				}
				
			});
			return false;
		}
		else
			return false;
	});
	
	$('#DelBranch').live('click', function()
	{
		if(confirm('Do you want to Delete the Record'))
		{
			var id = $(this).attr('name');
			var dataString = "delid="+id+"&type=delete";
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxAddBranch.php",
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
			return false;
		}
		else
			return false;
	});
	
	
	$('#delmaster').live('click', function()
	{
		if(confirm("Do you really want to delete? Data will be deleted Permanently !!!"))
		{
			var table = $('#delmas_table').val();
			var id = $('#delmas_id').val();
			var purl = $('#purl').val();
			var type = $('#p_type').val();
			var dataString = "delid="+id+"&table="+table+"&type="+type;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxDelData.php",
				data: dataString,
				error: function(request, status, error)
				{
				
					//$('#loading-gif').hide();
					//error.show().html('An Error Occured !!!');
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data); return false;
					if(type == 'pt_details')
						window.location.href = "EmpPTSlabView.php?ref="+purl;
					else if(type == 'it_details')
						window.location.href = "EmpITSlab.php?ref="+purl;
					else
						window.location.href = "EmpLeaveDetails.php?ref="+purl;
						
				}
				
			});
		}
		else
			return false;
	});
	
	
	
	
	
/******************************  ATTANDANCE ****************************/

	
	
	
	
	$('#add_attendance').live('click', function()
	{
		var shiftbase = $('#shift').val();
		var punch_date = $('#punch_date').val();
		
		if(shiftbase == '' || shiftbase == null)
		{
			alert('Shift base is required');
			$('#shift').focus();
			return false;
		}
		if(punch_date == '' || punch_date == null)
		{
			alert('Punch Date is required');
			$('#punch_date').focus();
			return false;
		}
		else
		{
		var in_time = $('#first_punch').val();
		var out_time = $('#fourth_punch').val();
		var emp_id = $('#empId').val();
		var ccode = $('#hid_code').val();
		
		var dataString = "empid="+emp_id+"&code="+ccode+"&int="+in_time+"&oti="+out_time+"&sb="+shiftbase+"&pd="+punch_date+"&type=addatt";
		//alert(dataString); return false;
		$.ajax
		({
			type: "POST",
			url: "AjaxAddAttendance.php",
			data: dataString,
			error: function(request, status, error)
			{
				alert(request.responseText);
				//alert("An Error occured....");
				
			},
			dataType:'text',
			success:function(data){
				//alert(data);
				//$('#LoadData').html();
				$('#add_attendance').val('Added').attr("disabled", "disabled");
			}
			
		});
		return false;
		}
	});
	

	/************************  LEAVE DATA ***************************/

	$('#AddNewLeaveStruc').live('click', function()
	{
		var _this = $(this);
		var field = $('#field1').val();
		if(field == '')
		{
			alert('Structure Name Cannot be Empty !!!! ');
			$('#field1').focus();
			return false;
		}
		else
		{
			var code = $('#hid_code').val();
			var dataString = "field="+field+"&type=leave_struc";
			
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Error'){
						alert('This name is already present in db');
						$('#field1').focus();
						return false;
					}
					else
					{
						_this.val('Added Successfully !!!');
						parent.$.colorbox.close();
						window.parent.location.href = "AddNewLeaveSlab.php?id="+data;
					}
				}
				
			});
		}
		return false;
	});
	
	
	
	
	$("#updateLeavedata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		var n = $("#num_rows").val();
		//alert(n);
		
		for(i=1;i<n;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else if($("#field_"+i).val() == '')
				{
					alert('This field cannot be empty !!!');
					$("#field_"+i).focus();
					return false;
				}
				else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			
		}
			var code = $('#hide_code').val();
			var dataString = "code="+code+"&type="+type+field+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data); return false;
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpLeaveSlab.php?id="+ret_id;
					}
				}
				
			});
			return false;
	});
	
	$("#updateLeaveRow").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		
		if(counter1 == 0){
			alert('Add Some Rows and Update'); return false;
		}
		else
		{
		
		for(i=0;i<counter1;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else if($("#field_"+i).val() == '')
				{
					alert('This field cannot be empty !!!');
					$("#field_"+i).focus();
					return false;
				}
				else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			
		}
			var code = $('#hide_code').val();
			var dataString = "code="+code+"&type="+type+field+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data); return false;
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpLeaveSlab.php?ref="+ret_url+"&id="+ret_id;
					}
					else
					{
						alert(data);
						return false;
					}
				}
				
			});
		}
		return false;
	});
	
	$("#updateLeaveERow").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
			
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		var i = _this.attr('name');
		
		var field = "&field="+$("#field"+i).val();
		
		if($("#field"+i).val() == '')
		{ 
			alert('This field cannot be empty !!!');
			$("#field"+i).focus();
			return false;
		}
		else
		{
		
		var data = "&data="+$("#field_"+i).val();
		var cal_from = "&cal_from="+$("#cal_"+i).val();
		var code = $('#hide_code').val();
		var dataString = "code="+code+"&type=row_update"+field+data+cal_from;
		//alert(dataString); return false;
		$.ajax
		({
			type: "POST",
			url: "AjaxUpdateDetails.php",
			data: dataString,
			error: function(request, status, error)
			{
				
			},
			beforeSend: function(){
				//$('#loading-gif').show();
			},
			dataType:'html',
			success:function(data){
				//alert(data); return false;
				if(data == 'Success')
				{
					_this.val('Updated Successfully !!!');
					window.location.href = "AddNewLeaveSlab.php?ref="+ret_url+"&k=AddRow&id="+ret_id;
				}
				else
				{
					alert(data);
					return false;
				}
			}
			
		});
		}
		return false;
	});
	
	$("#delLeaveRow").live('click', function()
	{
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		var _this = $(this).attr('name');
		if(_this != '')
		{
			if(confirm('Do you want to delete the Row'))
			{
				var dataString = "delid="+_this+"&type=delLeaveRow";
				//alert(dataString);
				$.ajax({
				   
				type	:	'POST',
				url		:	'AjaxDelData.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success'){
						$('#updateLeavedata').val('Deleted Successfully');
						window.location.href = "AddNewLeaveSlab.php?ref="+ret_url+"&k=edit&id="+ret_id;
					}
					else
						alert('An error occured while doing the operations !!! ');
					}
				});
			}
					
		}
		else
			return false;
	});


$("#createLeavedata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		
		//var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		//if(type == 'epf_update' || type == 'epf_create'){

		for(i=1;i<8;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			}
		/*}else{
			
			for(i=1;i<4;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			}
			
		}*/
			var code = $('#hide_code').val();
			var dataString = "code="+code+field+"&type="+type+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						//if(type == 'epf_update' || type == 'epf_create'){
						_this.val('Added Successfully !!!');
						window.location.href = "EmpLeaveSlab.php?id="+ret_id;
						/*}else{
							_this.val('Added Successfully !!!');
						window.location.href = "EmpEsiSlab.php?ref="+ret_url;
						} */
					}
				}
				
			});
			return false;
	});




var counter1 = 0;
	$("#AddNewRowLeave1").live("click", function()
	{
		//alert('sdfsdfdsf');
		if(counter1>10){
		alert("Only 10 textboxes allow");
		return false;
		}   
		
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter1);
		
		newTextBoxDiv.html('<p><label class="clsLabel2" style="width:200px;" ><input type="text" class="input-medium" id="field_'+ counter1 + '" /></label>' +
		': &nbsp;<input type="text" class="input-small" name="field' + counter1 + 
		'" id="field' + counter1 + '" value="" > <select class="input-medium" id="cal_'+counter1+'"> <option value="Monthly">Monthly</option> <option value="Yearly">Yearly</option> </select> <input type="button" class="btn btn-danger" id="removeButton1" value="Remove"  /></p>');
		newTextBoxDiv.appendTo("#TextBoxesGroup");
		
		//alert(counter1++);
		
		counter1++;
	});
		
		$("#removeButton1").live("click", function () {
			if(counter1==0){
			alert("No more textbox to remove");
			return false;
			}   
			
			counter1--;
			
			$("#TextBoxDiv" + counter1).remove();
		
		});



/********************************  OT DATA *********************************************************/
	$('#AddNewOtStruc').live('click', function()
	{
		var _this = $(this);
		var field = $('#field1').val();
		if(field == '')
		{
			alert('Structure Name Cannot be Empty !!!! ');
			$('#field1').focus();
			return false;
		}
		else
		{
			//var code = $('#hid_code').val();
			var dataString = "field="+field+"&type=ot_struc";
			
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Error'){
						alert('This name is already present in db');
						$('#field1').focus();
						return false;
					}
					else
					{
						_this.val('Added Successfully !!!');
						parent.$.colorbox.close();
						window.parent.location.href = "AddNewOtSlab.php?id="+data;
					}
				}
				
			});
		}
		return false;
	});

	$("#createOtdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		var hide_rows = $('#hide_rows').val();
		var ret_id  = $('#ret_id').val();

		for(i=1;i<(parseInt(hide_rows)+1);i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			}
			var code = $('#hide_code').val();
			var dataString = "code="+code+field+"&type="+type+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					///alert(data);
					if(data == 'Success')
					{
						//if(type == 'epf_update' || type == 'epf_create'){
						_this.val('Added Successfully !!!');
						window.location.href = "EmpOtSlab.php?id="+ret_id;
						/*}else{
							_this.val('Added Successfully !!!');
						window.location.href = "EmpEsiSlab.php?ref="+ret_url;
						} */
					}
				}
				
			});
			return false;
	});


	$("#updateOtdata").live('click', function()
	{
		var _this = $(this);
		var type = $('#field').val();
		var field = '';
		var data = '';
		var cal_from = '';
		
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		var n = $("#num_rows").val();
		//alert(n);
		
		for(i=1;i<n;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else if($("#field_"+i).val() == '')
				{
					alert('This field cannot be empty !!!');
					$("#field_"+i).focus();
					return false;
				}
				else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
			data += "&data" +i + "=" + $("#field_"+i).val();
			cal_from +="&cal_from" +i + "=" + $("#cal_"+i).val();
			
		}
			var code = $('#hide_code').val();
			var dataString = "code="+code+"&type="+type+field+data+cal_from;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateDetails.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					//$('#loading-gif').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data); return false;
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EmpOtSlab.php?id="+ret_id;
					}
				}
				
			});
			return false;
	});

$("#delOtRow").live('click', function()
	{
		var ret_url = $('#ret_url').val();
		var ret_id  = $('#ret_id').val();
		
		var _this = $(this).attr('name');
		if(_this != '')
		{
			if(confirm('Do you want to delete the Row'))
			{
				var dataString = "delid="+_this+"&type=delOtRow";
				//alert(dataString); return false;
				$.ajax({
				type	:	'POST',
				url		:	'AjaxDelData.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success'){
						$('#updateLeavedata').val('Deleted Successfully');
						window.location.href = "AddNewOtSlab.php?k=edit&id="+ret_id;
					}
					else
						alert('An error occured while doing the operations !!! ');
					}
				});
			}
					
		}
		else
			return false;
	});









	
/******************************  LOAD DATA ****************************/
	
	
	
	$('#summary').live('click', function()
	{
		var _this = $(this);
		var code = _this.attr('name');
		//alert(_this);
		$.ajax
		({
			type: "POST",
			url: "AjaxLoadData.php",
			data: 'attan=1&code='+code,
			error: function(request, status, error)
			{
				alert(request.responseText);
				alert("An Error occured....");
				//$("#loading").hide();
			},
			beforeSend: function(){
				_this.html('Loading...');
			},
			dataType:'html',
			success:function(data){
				//alert(data);
				$('#Load-Content').html(data);
				_this.hide();
			}
			
		});
		return false;
	});
	
	
	$('#EmpSalary').live('change', function()
	{
		//alert('sfdsfsfs');
		$("#loading1").hide();
		var _this = $(this).val();
		//alert(_this);
		if(_this == '0')
		{
			alert('Please Select an Employee ID');
			return false;
		}
		else
		{
			$.ajax
			({
				type: "POST",
				url: "AjaxLoadData.php",
				data: 'type=emp&id='+_this,
				error: function(request, status, error)
				{
					alert(request.responseText);
					alert("An Error occured....");
					$("#loading1").hide();
				},
				beforeSend: function(){
					$("#loading1").show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					$('#ListEmpSalary').html(data);
					$("#loading1").hide();
				}
				
			});
			return false;
		}
	});
	
	
	$('.editbox11').live('click', function()
	{
		$('#edit_box11').hide();
		$('#show_box').show();
	});
	
	
	
	
	$('.editbox1').live('click', function()
	{
		var text = $(this).html();
		var ID = $(this).attr("id");
		//alert(ID);  return false;
		if(text == 'Edit'){
			$(this).html('Save');
			$("#one_"+ID).hide();
			$("#one_input_"+ID).show();
		}
		else{
			$("#one_input_"+ID).show();
			var data = $("#one_input_"+ID).val();
			var emp_id =$("#EmpID_"+ID).val();
			var table =$("#EmpTable_"+ID).val();
			var type =$("#Emptype_"+ID).val();
			
			var dataString = "empid="+emp_id+"&data="+data+"&type="+type+"&table="+table;
			//alert(dataString); return false;
			$.ajax
			({
				type: "POST",
				url: "AjaxLiveEditTable.php",
				data: dataString,
				error: function(request, status, error)
				{
					alert(request.responseText);
					//alert("An Error occured....");
					$("#loading_"+ID).hide();
				},
				beforeSend: function(){
					$("#loading_"+ID).show();
				},
				dataType:'html',
				success:function(data){
					$("#loading_"+ID).hide();
					$("#one_input_"+ID).hide();
					$('.editbox1').html('Edit');
					$("#one_"+ID).html(data).show();
					//alert(data);
				}
				
		});
		return false;
		}
	});
	
	
/******** DELETE EXPLOYEE **************/
	$('#DelEmp').live('click', function()
	{
		var _this = $(this).attr('name');
		if(_this != '')
		{
			if(confirm('Do you want to delete the Employee'))
			{
					var dataString = "empid="+_this+"&type=EmpDel";
					$.ajax({
						   
						type	:	'POST',
						url		:	'AjaxDelData.php',
						data	:	dataString,
						error: function(request, status, error){
							alert(request.responseText);
						},
						dataType:'html',
						success:function(data){
							if(data== '1'){
								$('#del_'+_this).slideUp(400);
							}
							else
								alert('An error occured while doing the operations !!! ');
						}
					});
				}
					
			}
			else
				return false;
		});
	
		$('#DelDeo').live('click', function()
		{
			var _this = $(this).attr('name');
			if(_this != '')
			{
				if(confirm('Do you want to delete the Employee'))
				{
					var dataString = "deoid="+_this+"&type=DeoDel";
					//alert(dataString);
					$.ajax({
						   
						type	:	'POST',
						url		:	'AjaxDelData.php',
						data	:	dataString,
						error: function(request, status, error){
							alert(request.responseText);
						},
						dataType:'html',
						success:function(data){
							if(data== '1'){
								$('#del_'+_this).slideUp(400);
							}
							else
								alert('An error occured while doing the operations !!! ');
						}
					});
				}
			}
		});
		
		
		/********** attandance yearly details ********/
		
		$('#ChangeMonth').live('change', function()
		{
			//alert('hello');
			var month = $(this).val();
			
			var ccode = $('#c_code').val();
			$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadData.php',
				data	:	'month='+month,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					$('#LoadingImg').show();
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					//$('#AttanYearly').hide();
					$('#ListAttandance').html(data);
				}
			});
		});
		
	/*************** PAYROLL GENERATION ***************/	
	$('#BtnGenPayroll').live('click', function()
	{
		//alert('payroll will be generated !!!');
		var _this = $(this);
		var month = _this.attr('name');
		//var code = $('#CompCode').val();
		//var c_url = $('#CompUrl').val();
		var dataString = "Paymonth="+month+"&PayGen=true";
		
		$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadData.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					_this.html('Generating....');
				},
				dataType:'html',
				success:function(data){
					_this.hide();
					$('#PayGenStatus').html(data);
				}
			});
		return false;
	});
	
	
	
	
	
	/************* Empoloyee Claims **********************/
	$('#SubmitClaim').live('click', function()
	{
		var desc = $('#claim_desc').val();
		var amount = $('#claim_amount').val();
		var date = $('#claim_date').val();
		if(desc == ''){ $('#claim_error').show(); $('#claim_desc').focus(); return false; }
		else if(amount == ''){ $('#claim_error').show(); $('#claim_amount').focus(); return false; }
		else if(date == ''){ $('#claim_error').show(); $('#claim_date').focus(); return false;}
		else{
			var id = $('#claim_id').val();
			var dataString = "id="+id+"&desc="+desc+"&amt="+amount+"&date="+date+"&type=claim";
			//alert(dataString);
			$.ajax({
				type	:	'POST',
				url		:	'AjaxEmpClaim.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					$('#claim_error').hide();
					$('#claim_success').show().html('Processing');
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success'){
					$('#claim_error').hide();
					$('#claim_success').show().html('Added Successfully');
					window.setTimeout(function() {
    						$.colorbox.close();
					}, 2000);
					}else{ $('#claim_error').show().html('An Error Occured While Processing...');
					$('#claim_success').hide();}
					//parent.$.fn.colorbox.close();
					//window.parent.location.href='Profile.php?uid=<?php echo $usid; ?>';
				}
			});
		return false;
		}
		return false;
	});
	

	/************* Empoloyee Claims Reject by Admin **********************/
	
	$("#rejectclaim").live("click", function()
	{
		//$('#rejectdesc').show();
		var descr = $('#rejectdesc').val();
		if(descr == ''){ descr = 'Rejected'; }
		var id = $('.claimres1').attr("name");
		//alert(id);
		var dataString = "id="+id+"&type=claimreject"+"&descr="+descr;
		$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadContent.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					$('.response').html('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert(data);
					if(data == 'Success'){
					$('.response').html('Rejected Successfully');
					//$('#claim_success').show().html('Added Successfully');
					window.setTimeout(function() {
    						$.colorbox.close();
					}, 1000);
					}else{ $('#claim_error').show().html('An Error Occured While Processing...');
					$('#claim_success').hide();}
					//parent.$.fn.colorbox.close();
					//window.parent.location.href='Profile.php?uid=<?php echo $usid; ?>';
				}
			});
	});
	
	/************* Empoloyee Claims Pending **********************/
	
	$("#pendingclaim").live("click", function()
	{
		//$('#rejectdesc').show();
		var descr = $('#rejectdesc').val();
		var pmonth = $('#pro_month').val();
		if(descr == ''){ descr = 'Pending'; }
		var id = $('.claimres1').attr("name");
		//alert(id);
		var dataString = "id="+id+"&type=claimpending"+"&descr="+descr+"&promonth="+pmonth;
		$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadContent.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					$('.response').html('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert(data);
					if(data == 'Success'){
					$('.response').html('Posted Successfully');
					//$('#claim_success').show().html('Added Successfully');
					window.setTimeout(function() {
    						$.colorbox.close();
					}, 1000);
					}else{ $('#claim_error').show().html('An Error Occured While Processing...');
					$('#claim_success').hide();}
					//parent.$.fn.colorbox.close();
					//window.parent.location.href='Profile.php?uid=<?php echo $usid; ?>';
				}
			});
	});
	
	/************* Empoloyee Claims Approved **********************/
	
	$("#claimapproved").live("click", function()
	{
		//$('#rejectdesc').show();
		var descr = $('#rejectdesc').val();
		var pmonth = $('#pro_month').val();
		var amnt = $('#app_amount').val();
		var req_amnt = $('#req_amount').val();
		
		
		if(descr == ''){ descr = 'Approved'; }
		var id = $('.claimres1').attr("name");
		//alert(id);
		
		if(amnt == ''){ $('#claim_error').show(); $('#app_amount').focus(); return false; }
		else if(isNaN(amnt)){$('#claim_error').show().html('Only Numbers are allowed');$('#app_amount').focus(); return false;}
		else if(parseInt(amnt) > parseInt(req_amnt)){$('#claim_error').show().html('Processed amount should not exceed requested amount...'); $('#app_amount').focus(); return false;}
			
		else{
		var dataString = "id="+id+"&type=claimapproved"+"&descr="+descr+"&promonth="+pmonth+"&amount="+amnt;
		//alert(dataString);
		$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadContent.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					$('.response').html('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert(data);
					$('#claim_error').hide();
					if(data == 'Success'){
					$('.response').html('Posted Successfully');
					
					//$('#claim_success').show().html('Added Successfully');
					window.setTimeout(function() {
    						$.colorbox.close();window.parent.reload();
					}, 1000);
					}else{ $('#claim_error').show().html('An Error Occured While Processing...');
					$('.response').hide();}
					//parent.$.fn.colorbox.close();
					//.href='Profile.php?uid=<?php echo $usid; ?>';
				}
			});
		}
		return false;
	});
	
	
	/************* Empoloyee Pay Structure update *********************/
	
	$("#PayStrUpdate").live("click", function()
	{
		var _this = $(this);
		var id = $('#emp_id').val();
		
		var slab1 = $("input:radio[name=slab1]:checked").val();
		var slab2 = $("input:radio[name=slab2]:checked").val();
		var slab3 = $("input:radio[name=slab3]:checked").val();
		var slab4 = $("input:radio[name=slab4]:checked").val();
		var slab5 = $("input:radio[name=slab5]:checked").val();
		var slab6 = $("input:radio[name=slab6]:checked").val();
		
		var dataString = "id="+id+"&pay="+slab1+"&esi="+slab2+"&epf="+slab3+"&pt="+slab4+"&lve="+slab5+"&ot="+slab6;
		//alert(dataString); return false;
		$.ajax({
				type	:	'POST',
				url		:	'AjaxEmpSalUpdate.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					_this.html('Processing.....')
				},
				dataType:'html',
				success:function(data){
					alert(data); //return false;
					_this.html('Updated Successfully')
					window.setTimeout(function() {
    						$.colorbox.close();window.parent.reload();
					}, 1000);
				}
			});
		
	}); 
	
	/************* Add New Pay Slab *********************/
	
	
	$("#AddNewPayStruc").live("click", function()
	{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		var field = '';
		for(i=1;i<10;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		
		for(j=5; j<=10; j++)
		{
			data += "&data" + j + "=" + $("#field_"+j).html();
		}
		
		var dataString = "empid="+empid+"&type=create"+field+data;
		//alert(dataString); return false;
		$.ajax({
				type	:	'POST',
				url		:	'AjaxAddNewPayStructure.php',
				data	:	dataString,
				error: function(request, status, error){
					//alert(request.responseText);
				},
				beforeSend: function(){
			 		window.location="http://localhost/payroll_final/payroll_tester/CompanyPayStructure.php";
					//_this.val('Processing.....')
				},
				dataType:'html',
				success:function(data){
					//alert(data); //return false;
					if(data == 'Success')
					{
						_this.val('Added Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
					else
					{
						//alert(data);
					}
				}
			});
		return false;
	});
	
	/************* Add new field in employeee salary field *********************/

	var counter = 3;
	$("#AddNewRowLeave").live("click", function()
	{
		//alert('sdfsdfdsf');
		if(counter>13){
		alert("Only 10 textboxes allow");
		return false;
		}   
		
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
		
		newTextBoxDiv.html('<p><label class="clsLabel2" style="width:200px;" ><input type="text" class="input-medium" id="field_'+ counter + '" /></label>' +
		': &nbsp;<input type="text" class="input-small" name="field' + counter + 
		'" id="field' + counter + '" value="" > <select class="input-medium" id="cal_'+counter+'"> <option value="Monthly">Monthly</option> <option value="Yearly">Yearly</option> </select> <input type="button" class="btn btn-danger" id="removeButton" value="Remove"  /></p>');
		newTextBoxDiv.appendTo("#TextBoxesGroup");
		
		//alert(counter++);
		
		counter++;
	});
		
		$("#removeButton").live("click", function () {
			if(counter==0){
			alert("No more textbox to remove");
			return false;
			}   
			
			counter--;
			
			$("#TextBoxDiv" + counter).remove();
		
		});
		
		$("#getButtonValue").click(function () {
		
			var msg = '';
			for(i=1; i<counter; i++){
			msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
			}
			alert(msg);
		});
		
		
		
		/************* Update employee salary fields *********************/
		$("#UpdatePayStruc").live("click", function()
		{
			//alert('sdfdsfs');v
			var _this = $(this);
					
			var field = "";
			var fieldsv = "";
			var key = '';
			
			var ret_url = $('#ret_url').val();
			//var uid = $('#pay_name').val();
			
			var num = $("#field_res").val();
			num = parseInt(num) + 3;
			//alert(num);//return false;
			for(i=1;i<num;i++){
			field +="&field" +i + "=" + $("#field"+i).val();
			}
			for(k=3;k<num;k++){
			key +="&keyword" +k + "=" + $("#keyword"+k).html();
			}
			
			for(j=3;j<num;j++){
			fieldsv +="&field_" +j + "=" + $("#field_"+j).val();
			}
			
			var uid = $("#user_id").val();
			var dataString = "id="+uid+"&num="+num+field+fieldsv+key;
			
			//alert(dataString); //return false;
			
			$.ajax({
				type	:	'POST',
				url		:	'AjaxUpdateSalarySlab.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					_this.val('Processing.....');
				},
				dataType:'html',
				success:function(data){
					alert("Added Successfully !!!!!"+data); //return false;
					_this.val('Updated Successfully');
					window.location.href = "CompanyPayStructure.php";
					
				}
			});
			
			return false;
			//}
		});
		
		
		
		
		/***************************** location update ***************************************** */
		
		$('#EmpLocUpdate').live("click", function()
		{
			var id = $('#emp_id').val();
			var slab = $("input:radio[name=slab1]:checked").val();
			var _this = $(this);
			//alert(id+slab1);
			var dataString = "id="+id+"&branch="+slab;
			//alert(dataString);
			$.ajax({
					type	:	'POST',
					url		:	'AjaxEmpLocUpdate.php',
					data	:	dataString,
					error: function(request, status, error){
						alert(request.responseText);
					},
					beforeSend: function(){
						_this.html('Processing.....')
					},
					dataType:'html',
					success:function(data){
						//alert(data);
						_this.html('Updated Successfully')
						window.setTimeout(function() {
								$.colorbox.close();window.parent.reload();
						}, 1000);
					}
				});
			return false;
		});
		
		
	/************************************ notification **************************/	
	
		
	$('#show_all_dept').click(function() {
		$("#Show_Dept").slideToggle();
	});
	
	$('#show_all_desg').click(function() {
		$("#Show_Desg").slideToggle();
	});
	
	$('#post_notify').live("click", function()
	{
		//alert('sdfsdfdfsf');
		var _this = $(this);
		var field = "";
		var result = "";
		var result1 = "";
		var result2 = "";
		
		for(i=1;i<7;i++){
			if($("#field"+i).val() == '')
				{ 
					alert('This field cannot be empty !!!');
					$("#field"+i).focus();
					return false;
				}else{ 
					field += "&field" +i + "=" + $("#field"+i).val();
				}
		}
		var dataString = "type=postnotify"+field;
		//alert(dataString); return false;
		$.ajax({
				type	:	'POST',
				url		:	'AjaxLoadContent.php',
				data	:	dataString,
				error: function(request, status, error){
					alert(request.responseText);
				},
				beforeSend: function(){
					_this.html('Processing.....')
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					_this.html('Updated Successfully');
					window.location.href = "EmpNotification.php";
					
				}
			});
		return false;
	});
	
	
	$('#UpdateNotify').live("click", function()
		{
			var id = $('#field4').val();
			var _this = $(this);
			var content = $('#field1').val();
			var pdate = $('#field2').val();
			var edate = $('#field3').val();
			var rowid = $('#field5').val();
			
			var ret_url = $('#ret_url').val();

			var dataString = "id="+id+"&content="+content+"&pdate="+pdate+"&edate="+edate+"&rowid="+rowid+"&type=update_empnotify";
			//alert(dataString); return false;
			$.ajax({
					type	:	'POST',
					url		:	'AjaxLoadContent.php',
					data	:	dataString,
					error: function(request, status, error){
						alert(request.responseText);
					},
					beforeSend: function(){
						_this.html('Processing.....')
					},
					dataType:'html',
					success:function(data){
						//
						if(data == 'Success'){
						_this.val('Updated Successfully');
						window.location.href = "EmpNotification.php";
						}else{
							alert(data); return false;
							
						}
					}
				});
			return false;
		});
	
		$('.DelNoti').live("click", function()
		{
			
			if(confirm('Do you want to Delete the Record'))
			{
				var id = $(this).attr('id');
				var _this = $(this);
				var dataString = "delid="+id+"&type=notify";
				$.ajax
				({
					type: "POST",
					url: "AjaxDelData.php",
					data: dataString,
					dataType:'html',
					success:function(data){
						$('#del_'+id).slideUp("slow");
					}
				});
				return false;
			}
			else
			{
				return false;
			}
			return false;
		});
		
		
	/***********************     LOGIN CREDENTIALS **********************************************/
		
		
		$('#EnableLogin').live("click", function()
		{
			if(confirm('Do you want to Enable Login For this User'))
			{
				var rowid = $(this).attr('name');
				var _this = $(this);
				
				var ret_url = $('#ret_url').val();
				var dataString = "rowid="+rowid+"&type=EnableLogin";
				//alert(dataString);
				$.ajax
				({
					type: "POST",
					url: "AjaxLoadContent.php",
					data: dataString,
					dataType:'html',
					success:function(data){
						//alert(data);
						if(data == 'Success')
						{
							window.location.href = "EmpLoginCreate.php?ref="+ret_url;
						}
						//$('#del_'+id).slideUp("slow");
					}
				});
				return false;
			}
			else
			{
				return false;
			}
			return false;
		});
		
		$("#DisableLogin").live("click", function()
		{
			if(confirm('Do you want to Disable Login For this User'))
			{
				var rowid = $(this).attr('name');
				var _this = $(this);
				
				var ret_url = $('#ret_url').val();
				var dataString = "rowid="+rowid+"&type=DisableLogin";
				//alert(dataString);
				$.ajax
				({
					type: "POST",
					url: "AjaxLoadContent.php",
					data: dataString,
					dataType:'html',
					success:function(data){
						//alert(data);
						if(data == 'Success')
						{
							window.location.href = "EmpLoginCreate.php?ref="+ret_url;
						}
						//$('#del_'+id).slideUp("slow");
					}
				});
				return false;
			}
			else
			{
				return false;
			}
			return false;
		});
		
		
		$("#EmpNotiUpdate").live("click", function()
		{
			var rowid = $(this).attr('name');
			var _this = $(this);
			var dataString = "rowid="+rowid+"&type=EmpNotiUpdate";
				//alert(dataString);
				$.ajax
				({
					type: "POST",
					url: "AjaxLoadContent.php",
					data: dataString,
					dataType:'html',
					success:function(data){
						//alert(data);
						if(data == 'Success')
						{
							$('#remove_'+rowid).slideUp("slow");
						}
					}
				});
				return false;
		});
		
	$('#CancelBtn').click(function(){
        parent.history.back();
        return false;
    });	
		
	
	$('#DelCompany').live('click', function()
	{
		if(confirm('Do you want to Delete the Record ! It cannot be Rolled back !!!'))
		{
		var rowid = $(this).attr('name');
		var _this = $(this);
		var dataString = "row_id="+rowid+"&type=DelCompany";
		$.ajax
		({
			type: "POST",
			url: "AjaxUpdateCompany.php",
			data: dataString,
			dataType:'html',
			success:function(data){
				alert(data);
				if(data == 'Success')
				{
					$.jGrowl('Company Deleted Successfully !!!');
					window.location.href = "CompanyDetails.php";
				}
			}
		});
		return false;
		}
		else
			return false;
	});
			



/****************employee id exists or not********************/
	
	 $("#emp_id").focusout(function() {
		var emp_id = $('#emp_id').val();
		var dataString = "emp_id="+emp_id+"&type=checkid";

        $.ajax({
            type:"POST",
            url:"ajaxemployid.php",
            data:dataString,
            dataType:'html',
            success:function(data){
				 if(data == 'Success')
				 	{ 
				 	alert("Employee ID already exits");
                      return false;
                    }

            }
        });  
    });



/***************bank account no exists**********************************/
	
	
	 $("#bank_no").focusout(function() {
		var bank_no = $('#bank_no').val();
		var dataString = "bank_no="+bank_no+"&type=checkbankid";
		//alert(dataString);

        $.ajax({
            type:"POST",
            url:"ajaxemployid.php",
            data:dataString,
            dataType:'html',
            success:function(data){
				 if(data == 'Success')
				 	{ 
				 	alert("Bank account no already exists");
                      return false;
                    }

            }
        });  
    });



/***************salary checkbox calculation******************/
	
	$("#sss").live("click", function()
	{
		var _this = $(this);
		var data = "";
		var field = "";
		var empid = $("#emp_id").val();
		
		/*********For percentage alone*************/
		
		var salary = document.getElementById("field30").value; 
		var field32 = document.getElementById("field32").value;
		var field33 = document.getElementById("field33").value;
		var field34 = document.getElementById("field34").value;
		var field35 = document.getElementById("field35").value;
		var field36 = document.getElementById("field36").value;
		var field37 = document.getElementById("field37").value;
		var field38 = document.getElementById("field38").value;
		var field39 = document.getElementById("field39").value;
		var field40 = document.getElementById("field40").value;
  



			var total = parseInt(field32)+parseInt(field33)+parseInt(field34)+parseInt(field35)+parseInt(field36)+parseInt(field37)+parseInt(field38)+parseInt(field39);						        		
			if(document.getElementById("field40").checked == true){
			if(total == salary)
				{
					//alert("success your allowed");
				}	
			else
				{
				alert("Your total" +total+ "but it should be equal to your salary"+salary );
				return false;
				}
			}

	});




});