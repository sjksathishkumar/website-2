$(document).ready(function() 
{
	if($("#sat").attr("checked"))
	{
		$("#weken").show(); 
	}
	else
	{
		$("#weken").hide(); 
	}

	if($("#sun").attr("checked"))
	{
		$("#wekla").show();
	}
	else
	{
		$("#wekla").hide();
	}
});

function checnum(as)
{
  var a = as.value;

  for(var x=0; x<a.length; x++)
  {
     var ff = a[x];
     if(isNaN(a) || ff==" ")
     {
	  a = a.substring(0,(a.length-1));
	  as.value = a;
     }	
   }	
}

function satu_list()
{
	if ($("#sat").attr("checked")) 
	{
	    $("#weken").show();
	}
	else
	{
	    $("#weken").hide();
	    $("#wend1").removeAttr("checked").removeAttr("disabled");
	    $("#wend2").removeAttr("checked").removeAttr("disabled");
	    $("#wend3").removeAttr("checked").removeAttr("disabled");
	    $("#wend4").removeAttr("checked").removeAttr("disabled");
	    $("#wend5").removeAttr("checked").removeAttr("disabled");
	    $("#all").removeAttr("checked").removeAttr("disabled");
	}
}

function sun_list()
{
	if ($("#sun").attr("checked")) 
	{
	    $("#wekla").show();
	}
	else
	{
	    $("#wekla").hide();
	    $("#sund1").removeAttr("checked").removeAttr("disabled");
	    $("#sund2").removeAttr("checked").removeAttr("disabled");
	    $("#sund3").removeAttr("checked").removeAttr("disabled");
	    $("#sund4").removeAttr("checked").removeAttr("disabled");
	    $("#sund5").removeAttr("checked").removeAttr("disabled");
	    $("#sunall").removeAttr("checked").removeAttr("disabled");
	}
}

function hide_all()
{
	var wend = "#wend";
	var valid = $("#all:checked").val();
	if(valid=="all")
	{
		for(i=1;i<=5;i++)
		{
			$(wend+i).attr("disabled", true);
		}
	}
	else
	{
		for(i=1;i<=5;i++)
		{
			$(wend+i).removeAttr("disabled");	
		}
	}
}

function hide_sun()
{
	var wend = "#sund";
	var valid = $("#sunall:checked").val();
	if(valid=="all")
	{
		for(i=1;i<=5;i++)
		{
			$(wend+i).attr("disabled", true);
		}
	}
	else
	{
		for(i=1;i<=5;i++)
		{
			$(wend+i).removeAttr("disabled");	
		}
	}
}

function DaysInMonth(Y, M)
{
    with (new Date(Y, M, 1, 12)) 
    {
        setDate(0);
        return getDate();
    }
}

function working_days()
{
	var frmon = $("#frmon").val();
	var frmyear = $("#frmyear").val();
	var tomon = $("#tomon").val();
	var toyear = $("#toyear").val();
	var opt = $("#opt").val();
	if(opt=="")
	{
		opt=0;
		$("#opt").val(0);
	}

	frmyear = parseFloat(frmyear);
	frmon = parseFloat(frmon); 
	toyear = parseFloat(toyear);
	tomon = parseFloat(tomon);
	opt = parseFloat(opt);

	var valid = $("#all:checked").val();
	var sunvalid = $("#sunall:checked").val();
	var satval = $("#sat:checked").val();
	var sunval = $("#sun:checked").val();

	var yeardiff = toyear - frmyear;
	var mondiff = tomon - frmon;
	var totmon = (yeardiff * 12) + mondiff; 
	var strmon = frmon;
	var stryear = frmyear;

	var dayslist = new Array();
	var monlist = new Array();
	var yearlist = new Array();
	var sundaylist = new Array();
	var saturdaylist = new Array();
	var satur = new Array();
	var suns = new Array();
	var firstsat = new Array();
	var secondsat = new Array();
	var thirdsat = new Array();
	var fourthsat = new Array();
	var fifthsat = new Array();
	var firstsun = new Array();
	var secondsun = new Array();
	var thirdsun = new Array();
	var fourthsun = new Array();
	var fifthsun = new Array();
	var totdays = 0;
	var totsat = 0;
	var totsun = 0;
	var k=0;
	var l=0;
	var n=0;
	var o=0;
	var p=0;
	var q=0;
	var r=0;
	var s=0;
	var ls=0;
	var ns=0;
	var os=0;
	var ps=0;
	var qs=0;
	var rs=0;
	var ss=0;

	if(totmon<0)
	{
		alert("Enter the month and year properly.");
		$("#toyear").focus();
	}
	else
	{
		for(i=0;i<=totmon;i++)
		{
			monlist[i] = strmon;
			yearlist[i] = stryear;
			strmon = strmon + 1; 
			if(strmon%12==0)
			{
				strmon = 0;
				stryear++;
			}
			days = DaysInMonth(stryear, strmon);
			dayslist[i] = days;
			totdays = totdays + days;
			if(satval=="saturday" || sunval=="sunday")
			{
				if(sunvalid=="all")
				{
					for(j=1;j<=days;j++)
					{
						var curd = new Date(stryear,strmon-1,j);	
						var day = curd.getDay(); 
						if(day==0)
						{
							sundaylist[ls] = j;
							ls++;
						}
					}	
					totsun = sundaylist.length; 
				}
				else
				{
					var sund = "#sund";
					for(ms=0;ms<5;ms++)
					{
						suns[ms] = $(sund+(ms+1)+":checked").val();
					}
	
					if(suns[0]=="first")
					{
						firsts:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==0)
							{
								firstsun[os] = j;
								os++;
								break firsts;
							}
						}								
					}
	
					if(suns[1]=="second")
					{
						var as = 0;
						seconds:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
	
							if(day==0)
							{
								if(as==1)
								{
									secondsun[ps] = j;
									ps++;
									break seconds;
								}
								as++;
							}
						}								
					}
	
					if(suns[2]=="third")
					{
						var bs = 0;
						thirds:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
	
							if(day==0)
							{
								if(bs==2)
								{
									thirdsun[qs] = j;
									qs++;
									break thirds;
								}
								bs++;
							}
						}								
					}
	
					if(suns[3]=="fourth")
					{
						var cs = 0;
						fourths:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==0)
							{
								if(cs==3)
								{
									fourthsun[rs] = j;
									rs++;
									break fourths;
								}
								cs++;
							}
						}								
					}
	
					if(suns[4]=="fifth")
					{
						var ds = 0;
						fifths:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==0)
							{
								if(ds==4)
								{
									fifthsun[ss] = j;
									ss++;
									break fifths;
								}
								ds++;
							}
						}								
					}
					totsun = firstsun.length + secondsun.length + thirdsun.length + fourthsun.length + fifthsun.length;
				}
	
				if(valid=="all")
				{
					for(j=1;j<=days;j++)
					{
						var curd = new Date(stryear,strmon-1,j);	
						var day = curd.getDay(); 
						if(day==6)
						{
							saturdaylist[l] = j;
							l++;
						}
					}	
					totsat = saturdaylist.length; 
				}
				else
				{
					var wend = "#wend";
					for(m=0;m<5;m++)
					{
						satur[m] = $(wend+(m+1)+":checked").val();
					}
	
					if(satur[0]=="first")
					{
						first:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==6)
							{
								firstsat[o] = j;
								o++;
								break first;
							}
						}								
					}
	
					if(satur[1]=="second")
					{
						var a = 0;
						second:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
	
							if(day==6)
							{
								if(a==1)
								{
									secondsat[p] = j;
									p++;
									break second;
								}
								a++;
							}
						}								
					}
	
					if(satur[2]=="third")
					{
						var b = 0;
						third:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
	
							if(day==6)
							{
								if(b==2)
								{
									thirdsat[q] = j;
									q++;
									break third;
								}
								b++;
							}
						}								
					}
	
					if(satur[3]=="fourth")
					{
						var c = 0;
						fourth:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==6)
							{
								if(c==3)
								{
									fourthsat[r] = j;
									r++;
									break fourth;
								}
								c++;
							}
						}								
					}
	
					if(satur[4]=="fifth")
					{
						var d = 0;
						fifth:
						for(j=1;j<=days;j++)
						{
							var curd = new Date(stryear,strmon-1,j);	
							var day = curd.getDay(); 
							if(day==6)
							{
								if(d==4)
								{
									fifthsat[s] = j;
									s++;
									break fifth;
								}
								d++;
							}
						}								
					}
					totsat = firstsat.length + secondsat.length + thirdsat.length + fourthsat.length + fifthsat.length;
				}
			} 
		}	
		
		var twd = (totdays - (totsun+totsat)); 
		if(twd>=opt)
		{
			$("#twd").val(twd-opt);
			$("#totd").val(totdays);
			$("#thd").val(totdays-(twd-opt));
			var twdper = Math.round(100* ((twd-opt) / totdays) * 100) / 100;
			$("#twdper").val(twdper+" %");
			var thdper = Math.round(100* ((totdays-(twd-opt)) / totdays) * 100) / 100;
			$("#thdper").val(thdper+" %");
		}
		else
		{
			alert("Enter proper value for Optional leave days");
			$("#twd").val("");
			$("#totd").val("");
			$("#thd").val("");
			$("#twdper").val("");
			$("#thdper").val("");
		}
	}
}