var urlbase    = $('base').attr('href');

/*================================================== LOGIN ===========================================*/
	jQuery.fn.reset = function () {
	$(this).each (function() { this.reset(); });
	}
$(document).ready(function(){
			
	        var param = /^[a-z0-9]+$/i;
			$('#buttonLogin').click(function(e){
				
				e.preventDefault();

				var error   = false;
				var usr    = $('#usr').val();
				var pass    = $('#pass').val();

				if(  usr.length == 0 || !param.test(usr) ){
					var error = true;
					$('#usr').css('border', '1px #F00 solid');
					$('#usr').focus();
				}
				
				else if ( pass == 0 || pass.length == 0 || pass.length < 4 )
				{
					var error = true;
					$('#pass').css('border', '1px #F00 solid');
					$('#pass').focus();
				}
				
				else if ( !param.test(pass) )
				{
					var error = true;
					$('#pass').css('border', '1px #F00 solid');
					$('#pass').focus();
				}
				
				
	             else {
					$('#usr,#pass').css('border', '1px #DDD solid');
				
					}//FIN ELSE
					
				
				if( error == false ){

					$('#buttonLogin').attr({'disabled' : 'true'}).html('...').css({'opacity':'0.5'});

					$.post( urlbase + "public/ajaxAdmin/login.php", $("#access").serialize(),function(result){
						if( result == 'true' ){ 
							$('#buttonLogin').attr({'disabled' : 'true'}).remove();
							
							 $('.form_login').remove();
							$('#errores').fadeOut(500);

							setTimeout(function(){
								window.location.reload();
								
								},200);
							
						}
						else{
							alert( result );
							$('#buttonLogin').removeAttr('disabled').html('Log in').css({'opacity':1});
							$("#usr,#pass").attr({'value': ''});
							
						}          //ELSE
					});      //
				}      //
			});    //
			
			$('#usr').keyup(function(){
			if ( $(this).val() != 0 && $(this).val() !='' && param.test($(this).val()) )
			{
				$('#usr').css('border', '1px #DDD solid');
				return false;
			}
			else
			{
				$('#usr').css('border', '1px #F00 solid');
				return false;
			}
			
		});
		
		$('#pass').keyup(function(){
			if ( $(this).val() != 0 && $(this).val() !='' && $(this).val().length > 4 && param.test($(this).val()) )
			{
				$('#pass').css('border', '1px #DDD solid');
				return false;
			}
			else
			{
				$('#pass').css('border', '1px #F00 solid');
				return false;
			}
		});

});//<================================== DOCUMENT READY ===============================> 