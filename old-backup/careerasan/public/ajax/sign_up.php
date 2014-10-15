<?php
session_start();
error_reporting(0);
if ( 
		isset ( $_POST['full_name']) 
		&& !empty( $_POST['full_name'] ) 
		&& isset ( $_POST['username']) 
		&& !empty( $_POST['username'] ) 
		&& isset ( $_POST['email']) 
		&& !empty( $_POST['email'] ) 
		&& isset ( $_POST['password']) 
		&& isset ( $_POST['captcha']) 
)
{
	
	/*
	 * --------------------------
	 *   Require/Include Files
	 * -------------------------
	 */
	require_once('../../class_ajax_request/classAjax.php');
    include_once('../../application/functions.php'); 
	include_once('../../application/DataConfig.php');	
	/*
	 * ----------------------
	 *   Instance Class
	 * ----------------------
	 */
	$obj = new AjaxRequest();

 
		
	  $_POST['code']           = sha1 ( $_SERVER['REMOTE_ADDR'] . microtime() . mt_rand ( 1,100000 ) )._Function::randomString( 40, TRUE, TRUE, TRUE );
	  $_POST['email']          = trim( $_POST['email']);
	  $_POST['full_name']      = _Function::spaces( trim( $_POST['full_name']) );
	  $_POST['username']       = _Function::spaces( trim( $_POST['username'] ) );
	  $_POST['password']       = _Function::spaces( trim( $_POST['password'] ) );
	  $admin                   = $obj->getSettings();
	  $emailaddress            = $_POST['email'];
		
		if ( $_POST['full_name'] == '' || mb_strlen( $_POST['full_name'], 'utf8' ) < 2 || mb_strlen( $_POST['full_name'], 'utf8' )  > 20 )
		{
			echo '<strong>Full name</strong> not invalid..';
		}
		
		else if ( preg_match( '/[^a-z0-9\_]/i',$_POST['username'] ) )
		{
			echo '<strong>Username</strong> not invalid.';
		}
		
		else if ( strlen( $_POST['username'] ) < 1 || strlen( $_POST['username'] ) > 15 )
		{
			echo "<strong>Username</strong> not invalid";
		}
		
		else if ( mb_strlen( $_POST['password'], 'utf8' ) < 5 || mb_strlen( $_POST['password'], 'utf8' ) > 20 )
		{
			echo "Password must be between 5 and 20 characters.";
		}
		
		else if ( !filter_var( $emailaddress, FILTER_VALIDATE_EMAIL ) ) {
			
			echo '<strong>Email</strong> not invalid.';
		   
		}

		// TERMS
        else if ( $_POST['terms'] == '' )
		{
			echo 'Sorry I can not register.';
		}
		
else{
	
	 $res = $obj->signUp();
	 if( $res == 1 )
		  {
		  	$server = $_SERVER['SERVER_NAME'];
		  	$messageMail = 'Hi '. $_POST['full_name'] .' Thanks for signing up on '. $admin->title .' click on this <a href="'. URL_BASE .'?validate='. $_POST['code'].'">link</a> to activate your account';
			
		  	echo "True";
			_Function::send_mail(
			$admin->title.' <activate@'.$server.'>', 
			 $_POST['email'],
		     'Activate Account', 
		     $messageMail
			 );
		  }// $RES == 1
	 else if ( $res == 2 )
	 {
	 	echo 'Username "'.$_POST['username'].'" is already in use.';
	 }
	 else {
		 echo 'Email is already in use.';
		
	 }// ELSE
	 
}// ELSE

}// IF POST ISSET
else {
	echo 'Error';
	
}
 ?>