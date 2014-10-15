<?php
session_start();
error_reporting(0);

if ( 
	isset( $_GET['token'] ) 
	&& !empty( $_GET['token'] ) 
	&& isset( $_GET['id'] ) 
	&& !empty( $_GET['id'] )
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
	$_GET['token']    = trim( $_GET['token'] );
	$_GET['id']       = (int)trim( $_GET['id'] );
	
	$query = $obj->favorites();
	
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