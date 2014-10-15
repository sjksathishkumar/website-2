$(document).ready(function()
{
	
	var edit_type = $("#edit_type").val();
	//alert(edit_type); return false;
	
	
	$('#update_login').live('click',function()
	{
		if($('#txtfield1').val() == "")
		{
			$('#txterror1').show().html('Cannot be Empty !!!');
			$('#txtfield1').focus();
			return false;
		}
		else if($('#txtfield2').val() == "")
		{
			$('#txterror1').show().html('Cannot be Empty !!!');
			$('#txtfield2').focus();
			return false;
		}
		else
		{
			var field = '';
			var row_id = $("#row_id").val();
			//var ret_url = $("#ret_url").val();
		
			for(i=1;i<5;i++){
			field += "&field" +i + "=" + $("#txtfield"+i).val();
			}			
			var dataString = "row_id="+row_id+field+"&type=update_login"; //+"&code="+code+"&name="+name+"&admin="+admin+"&pref="+prefix;
			//alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateCompany.php",
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
					if(edit_type == 'MasterAdmin'){
					window.location.href = "CompanyDetails.php";
					}else{
						window.location.href = "CompanyProfile.php";
					}
					
					}, 2000);

				}
				
			});
			return false;
			
			
		}
		return false;
	});
	
	$('#comp_update').live('click',function()
	{
		
		if($('#txtfield13').val() == "")
		{
			$('#txterror3').show().html('Cannot be Empty !!!');
			$('#txtfield13').focus();
			return false;
		}
		else if($('#txtfield17').val() == "")
		{
			$('#txterror3').show().html('Cannot be Empty !!!');
			$('#txtfield17').focus();
			return false;
		}
		else
		{
			//var code = $('#hide_code').val();
			var row_id = $("#row_id").val();
			//var ret_url = $("#ret_url").val();
			
			var field = '';
			for(i=13;i<23;i++){
			field += "&field" +i + "=" + $("#txtfield"+i).val();
			}
			var dataString = "row_id="+row_id+field+"&type=comp_update";
			//alert(dataString); return false;
			
			$.ajax
			({
				type: "POST",
				url: "AjaxUpdateCompany.php",
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
					alert(data);
					$.jGrowl(data);
					setInterval(function(){
					if(edit_type == 'MasterAdmin'){
					window.location.href = "CompanyDetails.php";
					}else{
						window.location.href = "CompanyProfile.php";
					}
					}, 2000);
				}
			});
			return false;
		}
	return false;
	});
});