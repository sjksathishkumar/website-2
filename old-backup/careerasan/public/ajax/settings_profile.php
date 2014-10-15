<?php
session_start();
error_reporting(0);
if ( 
		isset ( $_POST['name']) 
		&& !empty( $_POST['name'] )
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
		
	  $_POST['name']           = _Function::spaces( trim( $_POST['name']) );
	  $_POST['location']       = _Function::spaces( trim( $_POST['location'] ) );
	  $_POST['website']        = _Function::spaces( trim( $_POST['website'] ) );
	  $_POST['website']        = trim( $_POST['website'], '/' );
	  $_POST['bio']            = _Function::checkTextDb( trim( $_POST['bio'] ) );
	  $admin                   = $obj->getSettings();
		
		//<-------- *  * --------->
		if( strlen( utf8_decode( $_POST['bio'] ) ) > $admin->post_length  )
		{
			$_POST['bio'] = _Function::cropStringLimit( $_POST['bio'], $admin->post_length );
			
		}
		
		if ( $_POST['name'] == '' || strlen( utf8_decode( $_POST['name'] ) ) < 2 || strlen( utf8_decode( $_POST['name'] ) ) > 20 )
		{
			echo '<strong>Full name</strong> not invalid..';
		}
		
else {
	
	 $res = $obj->updateProfile();
	 if( $res == 1 ){
			
		  	echo 'true';
			
	 }// $RES == 1
  }// ELSE
}// IF POST ISSET
 ?>