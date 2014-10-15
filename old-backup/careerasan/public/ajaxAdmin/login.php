<?php
session_start();
error_reporting(0);
if ( 
	isset ( $_POST['usr']) 
	&& !empty( $_POST['usr'] ) 
	&& isset( $_POST['pass'] ) 
	&& !empty( $_POST['pass'] )
)
{
if ( !isset( $_SESSION['id_admon'] ) )
{
	require_once('../../class_ajax_request/classAjax.php');
	$obj = new AjaxRequest();
		
		$_POST['usr'] = trim( $_POST['usr'] );
		$_POST['pass'] = trim( $_POST['pass'] );

			// LOGUEAMOS AL USUARIO
        $row = $obj->loginAdmin();
		
		if( isset( $row['id'] ) )
		{
			$_SESSION['id_admon']  = $row['id'];
			$_SESSION['usr_admon'] = $row['user'];
			
	        echo 'true';
		}
		//NOMBRE Y CONTRASEÑA
		else 
		{
			echo 'User and Password not valid.';
		
	  }// FIN LOGUEAMOS AL USUARIO
}// FIN DE EJECUCIÓN DE $_SESSION
	
	else
	{
		echo 'Error
		<script type="text/javascript">	
					$(document).ready(function(){
						window.location.reload();
			         });// FIN READY 
         </script>';
	}

}// IF POST ISSET
else {
	echo 'Error';
	
}
 ?>