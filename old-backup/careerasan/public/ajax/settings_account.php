<?php
session_start();
error_reporting(0);
if ( 
		isset ( $_POST['username']) 
		&& !empty( $_POST['username'] ) 
		&& isset ( $_POST['email']) 
		&& !empty( $_POST['email'] )
)
{
		/*
		 * --------------------------
		 *   Require File
		 * -------------------------
		 */
		require_once('../../class_ajax_request/classAjax.php');
	   /*
		 * ----------------------
		 *   Instance Class
		 * ----------------------
		 */
	   $obj = new AjaxRequest();
	  include('../../application/functions.php'); 
	  include('../../application/DataConfig.php');	
	 
	  $_POST['email']          = trim( $_POST['email']);
	  $_POST['mode']           = _Function::spaces( trim( $_POST['mode']) );
	  $_POST['username']       = _Function::spaces( trim( $_POST['username'] ) );
	  $_POST['country']        = _Function::spaces( trim( $_POST['country'] ) );
	  $infoUser                = $obj->infoUserLive( $_SESSION['authenticated'] );
	  
	  //<<<<--- Username
	  if( $infoUser->username != $_POST['username'] )
	  {
	  	$changeUser = 1;
	  	$_POST['username'] = $_POST['username'];
		
	  }
	  else 
	  {
	  	  $changeUser = 0;
		  $_POST['username'] = '';
	  }
	  
	  //<<<--- Email
	   if( $infoUser->email != $_POST['email'] )
	  {
	  	$changeMail = 1;
	  	$_POST['email'] = $_POST['email'];
		
	  }
	  else 
	  {
	  	 $changeMail = 0;
		 $_POST['email'] = '';
	  }
		if ( preg_match( '/[^a-z0-9\_]/i',$_POST['username'] ) && $changeUser == 1 ){
				
			echo '<strong>Username</strong> not invalid.';
			
		} else if ( strlen( $_POST['username'] ) < 1 && $changeUser == 1 || strlen( $_POST['username'] ) > 15  && $changeUser == 1 ){
				
			echo json_encode( array( 'action' => "Username not invalid" ) );
			
		} else if ( !_Function::checkEmail( $_POST['email'] )  && $changeMail == 1 ) {
				
			echo json_encode( array( 'action' => 'Email not invalid.' ) );
		}
else{
	
	 $res = $obj->updateSettings();
	 if( $res == 1 ){
	  	echo json_encode( array( 'action' => 'true', 'user' => $changeUser, 'newuser' => $_POST['username'] ) );
		
	  } else if ( $res == 2 ){
	  	
	 	echo json_encode( array( 'action' => 'Username "'.$_POST['username'].'" is already in use.' ) );
		
	 } else if ( $res == 3 ){
	 	
	 	echo json_encode( array( 'action' => 'No changes!' ) );
		
	 } else {
		 echo json_encode( array( 'action' => 'Email is already in use.' ) );
		
	 }// ELSE
}// ELSE

}// IF POST ISSET
else {
	echo 'Error';
}
 ?>