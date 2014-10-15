// JavaScript Document


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
				url: "MasterAdmin/AjaxMasterUpdate.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					_this.val('Processing....');
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href = "EpfMaster.php";
					}
					if(data == 'Esi_Success')
					{
						_this.val('Updated Successfully !!!');
						window.location.href ="EmpEsiMaster.php";
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
				url: "MasterAdmin/AjaxMasterUpdate.php",
				data: dataString,
				error: function(request, status, error)
				{
					
				},
				beforeSend: function(){
					_this.val('Processing....');
				},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data == 'Success')
					{
						_this.val('Added Successfully !!!');
						window.location.href = "EmpEsiMaster.php";
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
	
	
	/*$('#AddNewPtStruc').live("click", function()
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
			var dataString = "field="+field+"&type=pt_struc";
			
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
						window.parent.location.href = "EmpPTSlabView.php";
					}
				}
				
			});
		}
		return false;
	});*/