<?php
session_start();
error_reporting(0);

if ( 
	isset ( $_POST['email_recover'] ) 
	&& !empty( $_POST['email_recover'] )

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
	 * --------------------------
	 *   Instance Class
	 * -------------------------
	 */
	$obj               = new AjaxRequest();
	$admin             = $obj->getSettings();
	  
	  $linkHash    = sha1 ( $_SERVER['REMOTE_ADDR'] . microtime() . mt_rand ( 1,100000 ).'%(asqWas8*)' );
	  $link        = _Function::idHash( $linkHash )._Function::randomString( 40, TRUE, TRUE, TRUE );
	  $linkRecover = ''. URL_BASE .'recover/?c='.$link .'';
	  
	  // <------------------ DATA ----------->
	  $_POST['email_recover'] = trim( $_POST['email_recover'] );	 
	  $_POST['id_hash']       = $link;		
		
       //================ * EMAIL * =================//
		if ( !_Function::checkEmail( $_POST['email_recover'] ) )
		{
			echo '<strong>Email</strong> not invalid.';
		}
		
else{
	 $res = $obj->recoverPass();
	 
	 	 if( $res == 1 )
		  {
		  	$server = $_SERVER['SERVER_NAME'];
		  	$message = '<strong>Recover Pass:</strong>
					<a rel="nofollow" href="'. $linkRecover .'" target="_blank">'.$linkRecover.'</a>
					<br />
					PD: If asked for password change not ignore this email.';
		  	
		  	echo json_encode( array( 'status' => 'true', 'html' => 'Sent successfully, check your email' ) );
			_Function::send_mail(
			$admin->title.' <recover@'.$server.'>', 
			 $_POST['email_recover'],
		     'Recover passwords',
		     $message
		     );
		  
		  }
	 else {
		 echo json_encode( array( 'status' => 'false', 'html' => 'The email entered does not exist in our Data Base' ) );
		 //print_r( $res );
	 }// END ELSE
   }// END ELSE 
  }// IF SESSION 
}// END IF POST ISSET

 ?>