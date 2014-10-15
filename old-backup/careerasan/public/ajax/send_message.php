<?php
session_start();
error_reporting(0);
if ( 
	 isset( $_POST['id_user'] ) 
	 && !empty( $_POST['id_user'] ) 
	 && isset( $_POST['message'] )
)
{
if ( isset( $_SESSION['authenticated'] ) )
	{
		/*
		 * --------------------------
		 *   Require File
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
		$obj                  = new AjaxRequest();
		$_POST['id_user']     = is_numeric( $_POST['id_user'] ) ? $_POST['id_user'] : die();
		$_POST['message']     = trim( $_POST['message'] );
		$infoUser             = $obj->infoUserLive( $_SESSION['authenticated'] );
		$admin                = $obj->getSettings();
		
		//<-------- *  * --------->
		if( mb_strlen( $_POST['message'], 'utf8' )  > $admin->post_length  )
		{
			$_POST['message'] = _Function::cropStringLimit( $_POST['message'], $admin->post_length );
			
		}
					
		$query = $obj->sendMessage();
		
		if( $query == 1 ){
			 echo 'true';
		} else {
			return false;
		}
	
  }//<-- SESSION
}//<-- if token id
?>