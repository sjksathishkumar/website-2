var urlbase    = $('base').attr('href');
//=========== TRIM
function trim ( cadena )
{
	return cadena.replace(/^\s+/g,'').replace(/\s+$/g,'')
}
//** FILTERS **//
var filter     = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var param_usr  = /^[a-zA-Z0-9\_]+$/;
//** Changes Form **//
function changesForm () {
var button = $('#editProfile');
$('form.formAjax input, select, textarea, checked').each(function () {
    $(this).data('val', $(this).val());
    $(this).data('checked', $(this).is(':checked'));
});


$('form.formAjax input, select, textarea, checked').bind('keyup change blur', function(){
    var changed = false;
    button.css({'opacity':'0.5','cursor':'default'});
    
    $('form.formAjax input, select, textarea, checked').each(function () {
        if( trim( $(this).val() ) != $(this).data('val') || $(this).is(':checked') != $(this).data('checked') ){
            changed = true;
            button.css({'opacity':'1','cursor':'pointer'})
        }
       
    });
    button.prop('disabled', !changed);
});
}//<<<--- Function
changesForm();

//<<<<--- * Options Mosaic * ---->>>>
$('#mosaic').click(function(){
	
	if( $(this).is(':checked') ) 
	{
		$(this).val('fixed')
		$('body').css({'background-attachment': 'fixed','background-repeat':'repeat repeat'});
	}
	else
	{
		$(this).val('scroll')
		$('body').css({'background-attachment': 'scroll','background-repeat':'no-repeat no-repeat'});
	}
});
//<<<-- Pos --->>>>
$('.radioIn').click(function(){
	
	if( $(this).is(':checked') && $(this).val() == 'left' ) 
	{
		$('body').css({'background-position': 'left 65px'});
	}
	else if( $(this).is(':checked') && $(this).val() == 'center' ) 
	{
		$('body').css({'background-position': 'center 65px'});
	}
	else if( $(this).is(':checked') && $(this).val() == 'right' )
	{
		$('body').css({'background-position': 'right 65px'});
	}
});

$(document).ready(function(){
	
	 //<<---------------- * Profile * -------------->>
	 $('.profile-settings').live('click',function(e){
	 	
	 	e.preventDefault();
	 	var name = $('#nameEdit').val();
	 	
	 	if( name == '' || name == 0 || trim( name ).length < 2 || trim( name ).length > 20 )
	 	{
			var error = true;
			$('#nameEdit').focus();
			$('.popout').html('Full name not invalid, min 2 and max 20 characters.').fadeIn(200).delay(10000).fadeOut(200);
			return false;
		}
		else
		{
			$('.profile-settings').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
			$.post(urlbase+"public/ajax/settings_profile.php", $("#formSettings").serialize(),function(result)
			{
				if( result == 'true' )
				{
					$('.popout').html('Saved successfully').fadeIn(200).delay(2500).fadeOut(200);
					$('.profile-settings').html('Save');
					changesForm();
				}
				else
				{
					$('.popout').html('Error occurred').fadeIn(200).delay(5000).fadeOut(200);
					$('.profile-settings').html('Save');
				}
			});//<<<--- * POST * --->>>
		}//<<<--- * ELSE * --->
	 });//<<---- * CLICK * --->
	 
	 
	 //<<---------------- * Settings * -------------->>
	 $('.profile-settings-account').live('click',function(e){
	 	
	 	e.preventDefault();
	 	var username       = $('#username').val();
		var email          = $('#email').val();
	 	
	 	if( username == 0 || trim( username ).length < 1 || trim( username ).length > 15 )
	 	{
			var error = true;
			$('#username').focus();
			$('.error-update').html('Username not invalid, max 15 characters without spaces _.').fadeIn( 500 );
	    }
		
		else if( !param_usr.test( username ) ){
					var error = true;
					$('#username').focus();
					$('.error-update').html('Username not invalid, max 15 characters without spaces _.').fadeIn( 500 );
				}
						
		else if( email.length == 0 || !filter.test( email ) )
		{
			var error = true;
			$('#email').focus();
			$('.error-update').html('<strong>Email</strong> not invalid.').fadeIn( 500 );
		}
		else
		{
			$('.profile-settings-account').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
			$.post(urlbase+"public/ajax/settings_account.php", $("#formSettings").serialize(),function( data )
			{
				if( data.action == 'true' )
				{
					$('.popout').html('Saved successfully').fadeIn(200).delay(2500).fadeOut(200);
					$('.profile-settings-account').html('Save');
					
					if( data.user == 1  )
					{
						$('.myprofile').attr({href: urlbase+data.newuser})
					}
					
					changesForm();
					$('.error-update').fadeOut();
				}
				else
				{
					$('.error-update').html( data.action ).fadeIn(200);
					$('.profile-settings-account').html('Save');
				}
			},'json');//<<<--- * POST * --->>>
		}//<<<--- * ELSE * --->
	 });//<<---- * CLICK * --->
	 
	 
	 //<<---------------- * Passwords * -------------->>
	 $('.profile-settings-password').live('click',function(e){
	 	
	 	e.preventDefault();
	 	
			$('.profile-settings-password').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
			$.post(urlbase+"public/ajax/update_pass.php", $("#formSettings").serialize(),function( data )
			{
				if( data.response == 'true' )
				{
					$('.popout').html('Saved successfully').fadeIn(200).delay(2500).fadeOut(200);
					$('.profile-settings-password').html('Save');
					$("#formSettings input").val('');
					
					changesForm();
					$('.error-update').fadeOut();
				}
				else
				{
					$('.error-update').html( data.response ).fadeIn(200);
					if( data.focus )
					{
						$('#'+data.focus).focus();
					}
					
					$('.profile-settings-password').html('Save');
				}
			},'json');//<<<--- * POST * --->>>
	 });//<<---- * CLICK * --->
	 
	 //<<<<----- Change Theme ------>>>>>
	 $(".themeChange").live('click',function(){ 
			//=== PARAM
			var element     = $(this);
			var id          = element.attr("data");
			var info        = 'theme_id=' + id;
			var dataStatus  = element.attr("data-status");
			
			if( dataStatus != 1 )
			{
				
				$('.themeChange').attr( 'data-status', 0 );
				$(".themeChange").css({border: 'none'});
				element.attr( 'data-status', 1 );

				$.ajax({
				   type: "POST",
				   dataType : 'json',
				   url: urlbase+"public/ajax/themes.php",
				   data: info,
				   success: function( data ){
				   if( data )
				   {
				   	if( data.session == 0 )
				   	{
				   		window.location.reload();
				   	}
				   	$('#loader_gif').remove();
				   	$('<div class="deleteBg" data-id="'+data.theme+'" style="background: none; cursor: pointer;" title="Delete Image" id="loader_gif"></div>').appendTo('.labelAvatar');
				   	$('body,.labelAvatar').css({backgroundImage:'url("public/backgrounds/'+data.theme+'")'});
						   }
						}//<-- OUTPUT
					});//<-- AJAX
			  }//<<-- Active
			  else
			  {
			  	return false;
			  }
			});//<<<<<<<--- * CLICK * --->>>>>>>>>>>
	
	//===== DELETE PHOTO
		$(".deleteBg").live('click',function(){ 
			//=== PARAM
			var element     = $(this);
			var id          = element.attr("data");
			var bg          = element.attr("data-id");
			var info        = 'id_session=' + id + '&bg='+bg;
			$.ajax({
			   type: "POST",
			   url: urlbase+"public/ajax/no_bg.php",
			   data: info,
			   success: function( output ){
			   if( output == 'TRUE' )
			   {
			   		$('body,.labelAvatar').css({backgroundImage:'none'});
			   	     element.fadeOut('fast',function(){
		   		      element.remove();
		   		});//<-- FUNCTION
					   }
					 }//<-- OUTPUT
				});//<-- AJAX
			});//<<<<<<<--- * CLICK * --->>>>>>>>>>>
			
			
			//<<---------------- * Design Settings * -------------->>
	 $('.profile-settings-design').live('click',function(e){
	 	
	 	e.preventDefault();
	 	
	 	$('.profile-settings-design').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
	 	setTimeout(function(){
			$.post(urlbase+"public/ajax/settings_design.php", $("#formSettings").serialize(),function( data )
			{
				if( data.session == 0 )
				   	{
				   		window.location.reload();
				   	}
				if( data.action == 'true' )
				{
					$('.profile-settings-design').removeAttr('disabled').css({'opacity':1}).html('Save');
					$('.popout').html('Saved successfully').fadeIn(200).delay(2500).fadeOut(200);
					
				}
				else
				{
					$('.popout').html( data.action ).fadeIn(200);
					$('.profile-settings-design').removeAttr('disabled').css({'opacity':1}).html('Save');
				}
			},'json');//<<<--- * POST * --->>>
		},1000);//<<---- * Wait * --->
	 });//<<---- * CLICK * --->
			
});//<<--------------------- * DOM * -------------------->>
