<?php
session_start();
error_reporting(0);

if( 
	isset( $_POST['_msgId'] ) 
	&& !empty( $_POST['_msgId'] )
)
{
  if ( isset( $_SESSION['authenticated'] ) ){
  	
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
	$obj              = new AjaxRequest();
	$_POST['_msgId']  = is_numeric( $_POST['_msgId'] ) ? $_POST['_msgId'] : die();
	
	$query = $obj->deleteMsg();
	
	if( $query == 1 ){
		 	
		 echo( 1 );
		
	}//<--- $QUERY
  }//<-- SESSION
}//<-- if token id
?>