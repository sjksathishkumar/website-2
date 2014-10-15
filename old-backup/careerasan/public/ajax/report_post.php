<?php
session_start();
error_reporting(0);
if ( 
	isset( $_POST['_postId'] ) 
	&& !empty( $_POST['_postId'] ) 
	&& isset( $_POST['_token'] ) 
	&& !empty( $_POST['_token'] )
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
	
	/*
	 * ----------------------
	 *   Instance Class
	 * ----------------------
	 */
	$obj             = new AjaxRequest();
	$_POST['_token']  = trim( $_POST['_token'] );
	$_POST['_postId'] = is_numeric( $_POST['_postId'] ) ? $_POST['_postId'] : die();
	
	$query = $obj->reportPost();
	
	if( $query == 1 ){
		 echo '1';
	} else if( $query == 2 ){
		 echo '2';
	} else if( $query == 3 ){
		 echo '3';
	} else {
		return false;
	}
  }//<-- SESSION
}//<-- if token id
?>