// OTHERS
var urlbase    = $('base').attr('href');
function trim ( cadena )
{
	return cadena.replace(/^\s+/g,'').replace(/\s+$/g,'')
}
jQuery.fn.reset = function () 
{
	$(this).each (function() { this.reset(); });
}
//<<<-- POPOUT --->>>>
$('.popout').click(function(){
	$(this).fadeOut();
});

//** FILTERS **//
var filter     = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var param_usr  = /^[a-zA-Z0-9\_]+$/;
var param_pass = /^[a-zA-Z0-9]+$/i;

$('.buttonForgot').click(function(){
				$('.signInForm').slideUp();
				$('.recoverForm').slideDown();
				$('#email_recover').focus();
			});
			
			$('.buttonBack').click(function(){
				$('.signInForm').slideDown();
				$('.recoverForm').slideUp();
			});
			
$(document).ready(function(){

 /*=============== RECOVER PASS ===================*/
 $('#buttonRecoverPass').click(function(r){
 	
 	r.preventDefault();
 	var error  = false;
	var email_recover   = $('#email_recover').val();
	
	if( email_recover == '' || email_recover == 0 || trim( email_recover ).length  == 0 ){
				var error = true;
				$('#email_recover').focus();
			}
			
			else if( !filter.test( email_recover ) ){
				var error = true;
				$('#email_recover').focus();
			}
			
           else {
				$('#error_recover').fadeOut(500);
				}

			if( error == false ){
				$('#buttonRecoverPass').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
				
				$.post(urlbase+"public/ajax/recover_pass.php", $("#recover_pass_form").serialize(),function( res ){
					
					if( res.status == 'true' ){
						 $('#success_recover').html(res.html).fadeIn(500);
						 $('#error_recover').fadeOut(500);
						 $("#recover_pass_form").reset();
						 $('#buttonRecoverPass').removeAttr('disabled').html('Send').css({'opacity': 1});
						 $('#buttonRecoverPass,#email_recover').remove();
					
					}
					else{
						 $('#error_recover').html( res.html ).fadeIn(500);
						 $("#recover_pass_form").reset();
						 $('#buttonRecoverPass').removeAttr('disabled').html('Send').css({'opacity': 1});
					}//<-- ELSE
				},'json');//<-- END $POST AJAX
			}//<-- END ERROR == FALSE
});//<-- END FUNCTION CLICK
			
 /*=============== SIGN IN ===================*/	
			$('#buttonSignIn').click(function(s){
				
				s.preventDefault();

				var error  = false;
				var user   = $('#user').val();
				var pass   = $('#password_signin').val();

				if( user == '' || user == 0 || trim( user ).length  == 0 ){
					var error = true;
					$('#user').focus();
					$('#error').html('<strong>Field</strong> is required.');
					$('#error').fadeIn(500);
				}
				
				else if( !param_usr.test( user ) && !filter.test( user ) ){
					var error = true;
					$('#user').focus();
					$('#error').html('<strong>Username or Email</strong> not invalid.');
					$('#error').fadeIn(500);
				}
				
	           else {
					$('#error').fadeOut(500);
					}

				if( error == false ){
					$('#buttonSignIn').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
					
					$.post(urlbase+"public/ajax/sign_in.php", $("#signin_form").serialize(),function(result){
						
						if( result == 'True' ){
							 $('#signin_form input, .forgot, #buttonSignIn, #recover_pass_form').remove();
							 $('#success_signin').fadeIn(500).html('<img src="'+urlbase+'public/img/loader.gif" />');
							 $('#error').fadeOut(500);
							 $("#signin_form").reset();
							
							$('body,html').animate({
								scrollTop: 0
							}, 500);
							
							 setTimeout(function()
							 {
								location.reload();
							  },1000 );
						}
						else{
							 $('#error').fadeIn(500);
							 $('#error').html( result );
							 $("#signin_form").reset();
							 $('#buttonSignIn').removeAttr('disabled').html('Sign In').css({'opacity': 1});
						}//<-- ELSE
					});//<-- END $POST AJAX
				}//<-- END ERROR == FALSE
			});//<-- END FUNCTION CLICK
			
			
   /*================== SIGN UP =======================*/	
			$('#buttonSubmit').click(function(e){
				
				e.preventDefault();

				var error          = false;
				var fullname       = $('#full_name').val();
				var username       = $('#username').val();
				var email          = $('#email').val();
				var pass           = $('#password').val().length;
				var terms          = $("input[type='checkbox'][name='terms']:checked").length;
				var captcha        = $("#lcaptcha").val();

				if( fullname == '' || fullname == 0 || trim( fullname ).length < 2 || trim( fullname ).length > 20 ){
					var error = true;
					$('#full_name').focus();
					$('#errorSignUp').html('<strong>Full name</strong> not invalid, min 2 and max 20 characters.');
					$('#errorSignUp').fadeIn(500);
				}
				
				else if( username == 0 || trim( username ).length < 1 || trim( username ).length > 15 ){
					var error = true;
					$('#username').focus();
					$('#errorSignUp').html('<strong>Username</strong> not invalid, max 15 characters without spaces.');
					$('#errorSignUp').fadeIn(500);
				}
				
				else if( !param_usr.test( username ) ){
					var error = true;
					$('#username').focus();
					$('#errorSignUp').html('<strong>Username</strong> not invalid.');
					$('#errorSignUp').fadeIn(500);
				}
				
				else if( email.length == 0 || !filter.test( email ) ){
					var error = true;
					$('#email').focus();
					$('#errorSignUp').html('<strong>Email</strong> not invalid.');
					$('#errorSignUp').fadeIn(500);
				}
				
				else if( pass < 5 || pass > 20 ){
					var error = true;
					$('#password').focus();
					$('#errorSignUp').html('Password must be between 5 and 20 characters.');
					$('#errorSignUp').fadeIn(500);
				}
				
				
				else if( captcha != captcha_e ){
				var error = true;
		        $('#errorSignUp').html('Captcha Error');
		        $("#errorSignUp").fadeIn(500);
		        $('#lcaptcha').focus();
		        return false;
	             }
	             
	             else if( terms == '' ){
					var error = true;
					$('#errorSignUp').html('Sorry I can not register.');
					$('#errorSignUp').fadeIn(500);
					return false;
				}
				
	           else {
					$('#errorSignUp').fadeOut(500);
					}

				if( error == false ){
					$('#buttonSubmit').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
					
					$.post(urlbase+"public/ajax/sign_up.php", $("#signup_form").serialize(),function(result){
						
						if( result == 'True' ){
							 $('#signup_form input, .termsLegal, #buttonSubmit').remove();
							 $('#success').fadeIn(500).html('Check your email to activate your account.');
							 $('#errorSignUp').fadeOut(500);
							 $("#signup_form").reset();
						}
						else{
							 $('#errorSignUp').fadeIn(500);
							 $('#errorSignUp').html( result )
							 $('#buttonSubmit').removeAttr('disabled').html('Sign Up').css({'opacity': 1});
						}//<-- ELSE
					});//<-- END $POST AJAX
				}//<-- END ERROR == FALSE
			});//<-- END FUNCTION CLICK
			
			
			//<<---------------- * Passwords * -------------->>
	 $('#buttonUpdatePass').click(function(e){
	 	
	 	e.preventDefault();

				
			$('#buttonUpdatePass').attr({'disabled' : 'true'}).html('Wait...').css({'opacity':'0.5'});
			$.post(urlbase+"public/ajax/update_pass_recover.php", $("#updatePass").serialize(),function( data )
			{
				if( data.reload == 1 )
				{
					window.location.reload();
				}
				if( data.response == 'true' )
				{
					$('.popout').html('').fadeOut();
					$("#updatePass").remove();
					$('.statusBar').html(data.success).css({'text-align':'center'});
					setTimeout(function(){
						window.location.href = urlbase;
					},2000);
					
					
				}
				else
				{
					$('.popout').html( data.response ).fadeIn(200);
					if( data.focus )
					{
						$('#'+data.focus).focus();
					}
					
					$('#buttonUpdatePass').html('Send').removeAttr('disabled').css({'opacity': 1});
				}
			},'json');//<<<--- * POST * --->>>
	 });//<<---- * CLICK * --->
		
});// <=========================== END DOCUMENT READY REGISTRO ======================================>

/*
 *  ==============================================  Captcha  ============================== * /
 */
   var captcha_a = Math.ceil( Math.random() * 5 );
   var captcha_b = Math.ceil( Math.random() * 5 );
   var captcha_c = Math.ceil( Math.random() * 5 );
   var captcha_e = ( captcha_a + captcha_b ) - captcha_c;
   
function generate_captcha( id )
{
	var id = ( id ) ? id : 'lcaptcha';
	$("#" + id ).html( captcha_a + " + " + captcha_b + " - " + captcha_c + " = ").attr({'placeholder' : captcha_a + " + " + captcha_b + " - " + captcha_c, title: 'Captcha = '+captcha_a + " + " + captcha_b + " - " + captcha_c });
}
$("input").attr('autocomplete','off');