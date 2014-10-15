<?php
session_start();
error_reporting(0);
if ( 
		isset ( $_POST['user'] ) 
		&& !empty( $_POST['user'] ) 
		&& isset ( $_POST['password'] ) 
)
{
if ( !isset( $_SESSION['authenticated'] ) )
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
	  
	  $_POST['user']      = trim( _Function::spaces( $_POST['user'] ) );
	  $_POST['password']  = trim( _Function::spaces( $_POST['password'] ) );

		if ( $_POST['user'] == '' || strlen( $_POST['user'] ) == 0 )
		{
			echo '<strong>Field</strong> is required.';
		}
		
		else if ( preg_match( '/[^a-z0-9\_]/i',$_POST['user'] ) && !_Function::checkEmail( $_POST['user'] ) )
		{
			echo '<strong>Username or Email</strong> not invalid.';
		}
		
		else if ( strlen( utf8_decode( $_POST['password'] ) ) < 5 || strlen( utf8_decode( $_POST['password'] ) ) > 20 )
		{
			echo "Password must be between 5 and 20 characters.";
		}
		
else{
	
	 $res    = $obj->signIn();
	
	 if( isset( $res['id'] ) )
	  {
	  	echo 'True';
		$_SESSION['username']      = $res['username'];
		$_SESSION['authenticated'] = $res['id'];
		
      }// $RES == 1

	 else {
		 echo 'Username or email not belong to any account <br />
		  Or Your account has not been activated';
		
	 }// ELSE
}// ELSE
 }//<-------- SESSIONS
 else
	{
		echo '
		<script type="text/javascript">	
					$(document).ready(function(){
						window.location.reload();
			         });// FIN READY 
         </script>';
	}

}// IF POST ISSET
else {
	echo 'Error';
	
}
 ?>