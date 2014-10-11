$(document).ready(function(){

$("#employee_name").on('blur',function(){
					$('#ename').text($(this).val());
});

$("#employee_id").on('blur',function(){
					$('#eid').text($(this).val());
});

$("#gender").on('blur',function(){
					$('#d_gender').text($(this).val());
});
	
$("#email_id").on('blur',function(){
					$('#d_mail_id').text($(this).val());
});
$("#dob").on('blur',function(){
					$('#d_dob').text($(this).val());
});
$("#doj").on('blur',function(){
					$('#d_doj').text($(this).val());
});

$("#m_no").on('blur',function(){
					$('#d_mob_no').text($(this).val());
});

$("#addr").on('blur',function(){
					$('#d_addr').text($(this).val());
});

$("#desig").on('blur',function(){
					$('#d_desig').text($(this).val());
});


$("#dept").on('blur',function(){
					$('#d_dept').text($(this).val());
});

$("#branch_loc").on('blur',function(){
					$('#d_branchloc').text($(this).val());
});

$("#salary").on('blur',function(){
					$('#d_sal').text($(this).val());
});

//function addr() {
//var addr=document.getElementById('addr') + <br>;
//var city=document.getElementById('city') + <br>;
//var state=document.getElementById('state') + <br>;
//var pincode=document.getElementById('pin_code') + <br>;
//var address=addr + city + state + pincode;
//$("#d_addr").append(address);
//}
});