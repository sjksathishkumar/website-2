<?php
session_start();
error_reporting(0);
if ( 
	 isset( $_POST['id'] )
	 && !empty( $_POST['id'] )
)
{
if ( isset( $_SESSION['authenticated'] ) )
{
	if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == "POST"){
		
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
	$_POST['id']       = trim( $_POST['id'] );
	$explode          = explode( '-', $_POST['id'] );
	$_POST['id']       = $explode[1];
	
	$query = $obj->follow();
	
	if( $query == 1 ){
		 echo '1';
	} else if( $query == 2 ){
		 echo '2';
	} else if( $query == 3 ){
		 echo '3';
	} else {
		return false;
	}
		}//<-- POST ISSET
  }//<-- SESSION
}//<-- if token id
?>