//JavaScript Document
function  NotificationInfo(divname)
{
	var _this = $('#'+divname);
	//_this.html('hejhksdflafhlfajahfdlkj');
	
	$.ajax
		({
			type: "POST",
			url: "AjaxLoadContent.php",
			data: 'type=claim',
			error: function(request, status, error)
			{
				alert(request.responseText);
			},
			dataType:'html',
			success:function(data){
				_this.html(data);
				$(".claimres1").colorbox({width:"400px", height:"250px", title:"Claims Request - Rejection"});
				$(".claimres2").colorbox({width:"500px", height:"350px", title:"Claims Request - Pending"});
				$(".claimres3").colorbox({width:"520px", height:"450px", title:"Claims Request - Approved"});
			}
		});
		return false;
}

function GetRequestedAmount()
{
	var req_amnt = $('#req_amnt').html();
}

function EmployeeNotify(divname)
{
	var _this = $('#'+divname);
	//_this.html('hejhksdflafhlfajahfdlkj');
	var empid = $("#emp_id").val();
	
	$.ajax
		({
			type: "POST",
			url: "AjaxLoadContent.php",
			data: 'id='+empid+'&type=empnotify',
			error: function(request, status, error)
			{
				alert(request.responseText);
			},
			dataType:'html',
			success:function(data){
				_this.html(data);
				//$(".claimres1").colorbox({width:"400px", height:"250px", title:"Claims Request - Rejection"});
				//$(".claimres2").colorbox({width:"500px", height:"350px", title:"Claims Request - Pending"});
				//$(".claimres3").colorbox({width:"520px", height:"450px", title:"Claims Request - Approved"});
			}
		});
		return false;
}


function CheckNotificationValidity()
{
	$.ajax
	({
		type: "POST",
		url: "AjaxLoadContent.php",
		data: 'type=checknotify',
		error: function(request, status, error)
		{
			alert(request.responseText);
		},
		dataType:'html',
		success:function(data){
			//alert(data);
		}
	});
	return false;
}