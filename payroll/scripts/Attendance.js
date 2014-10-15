// JavaScript Document

$(document).ready(function()
{
	//
	
	
	/*$("#update_atten").live('click', function()
	{
		var status = $('input:radio[name=leave]:checked').val();
		var absent = $('input:radio[name=leave_st]:checked').val();
		var date	= $('#date').val();
		var intime = $('#in_time').val();
		var outtime = $('#out_time').val();
		
		var code = $("#company_code").val();
		var empid = $('#user_name').val();
		
		if(validateFields($('#in_time'), $('#out_time'))){
		
		var dataString = "code="+code+"&empid="+empid+"&st="+status+"&ab="+absent+"&dat="+date+"&it="+intime+"&ot="+outtime;
		//alert(dataString); return false;
				$.ajax({
				   type: "POST",
				   url: "Attendance.php",
				   data: dataString,
				   async:false,
				   beforeSend: function(){
					$('#loading-spinner').show();
					},
				   error: function(request, status, error)
					{
						alert(request.responseText);
					//alert("An Error occured....");
					},
					dataType:"html",
					success: function(data){
						//alert(data);
						if(data == 'Success'){
						$('#loading-spinner').hide();
						$("#update_atten").hide();
						$("#update_suc").show();
						}
						else
						{
							$("#update_suc").removeClass('btn-success').addClass('btn-error').html('Error Occured');
						}
					}
			   });
		}
		else
			return false;
	});
	return false;
*/



$('.AddAttanMonthly').live('click', function()
{
	var _this = $(this);
	var ID = _this.attr('id');
	var absent = $('#txtdataabs_'+ID);
	var present = $('#txtdatapre_'+ID);
	
	var empid = $('#hid_id_'+ID).val();
	var code = $('#hid_code').val();
	var mnth = $('#hid_month').val();
	var year = $('#hid_year').val();
	//alert(present.val());
	if(validateFields(absent, present))
	{
		//alert('Will update ');
		var dataString = "code="+code+"&empid="+empid+"&ab="+absent.val()+"&pre="+present.val()+"&month="+mnth+"&year="+year;
		//alert(dataString);return false;
		$.ajax({
			   type: "POST",
			   url: "Attendance.php",
			   data: dataString,
			   async:false,
			   beforeSend: function(){
				_this.html('Loading...');
				},
			   error: function(request, status, error)
				{
					alert(request.responseText);
					//alert("An Error occured....");
				},
				dataType:"html",
				success: function(data){
					//alert(data);
					if(data == 'Success-Absent'){
					$('#DelStEntry').html('Added');//.colorbox({width:"500px", height:"300px", iframe:true, title:"Login", href:"../header.php" });
					}
					else if(data == 'Success')
					{
						$('#DelStEntry').html('Added');
					}
					else
					{
						_this.html('Error Occured !!!!');
					}
				}
		   });
	}
	else
	{
		//alert('Something Wrong There !!!');
		return false;
	}
})





function validateFields(fld1, fld2){
	 
	 if(fld1.val().length == 0)
	 {
		alert('Cannot be Empty !!!');
		fld1.focus();
		return false;
	 }
	 /*else if(fld1.val().length != 0)
	 {
		 
	 }*/
	 else if (fld2.val().length == 0)
	{
		alert('Cannot be Empty !!!');
		fld2.focus();
		return false;
	}
	else
	{
		//error.hide();
		return true;
	}
}

});
