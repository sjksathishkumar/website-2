<?php
session_start();
error_reporting(0);

if ( isset( $_GET['token_id'] ) )
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
		$obj         = new AjaxRequest();	
		/*
			 * --------------------------
			 *   Root of Photo
			 * -------------------------
			 */
		$root      = '../cover/';
		$photo_id  = $_GET['token_id'];
		/*
			 * --------------------------
			 *   folder permissions
			 * -------------------------
			 */
		chmod( $root.$photo_id, 0777 );
		
			 if ( file_exists( $root.$photo_id ) ) 
			 {
				 unlink( $root.$photo_id );
				 $obj->uploadCover( '' );
				 
				 echo 'TRUE';
			 }
		   }//<-- session
}//<-- if token id
?>