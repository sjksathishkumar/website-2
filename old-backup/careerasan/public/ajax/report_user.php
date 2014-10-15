<?php
session_start();
error_reporting(0);
if ( 
	isset( $_POST['_userId'] ) 
	&& !empty( $_POST['_userId'] )
)
{
  if ( isset( $_SESSION['authenticated'] ) )
	{
		/*
		 * --------------------------
		 *   Require File
		 * -------------------------
		 */
		require('../../class_ajax_request/classAjax.php');
		/*
		 * ----------------------
		 *   Instance Class
		 * ----------------------
		 */
		$obj             = new AjaxRequest();
		$_POST['_userId'] = is_numeric( $_POST['_userId'] ) ? $_POST['_userId'] : die();
		
		$query = $obj->reportUser();
		
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