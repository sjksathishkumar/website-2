<?php
ini_set('memory_limit', '-1');
session_start();
error_reporting(0);
require('../../class_ajax_request/classAjax.php');
include('../../application/functions.php'); 
include('../../application/DataConfig.php');
$session_id  = $_SESSION['authenticated']; //$session id
$path        = "../../tmp/";
$path_cover = "../cover/";
$obj         = new AjaxRequest();
$infoUser    = $obj->infoUserLive( $_SESSION['authenticated'] );
$coverOld      = $path_cover.$infoUser->cover_image;


if ( isset( $session_id ) ) 
{
	$valid_formats = array("jpg", "JPG", "jpeg","png","x-png","gif","pjpeg");
	if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photo']['name'];
			$size = $_FILES['photo']['size'];
			
			if( strlen( $name ) )
				{
					$ext = pathinfo( $name );
					if( in_array( $ext['extension'], $valid_formats ) )
					{
					if( $size < ( 2250 * 2250 ) )
						{
							$photo_post  = 'cover_'.strtolower( $infoUser->username )."_".$session_id.""._Function::randomString( 5, FALSE, TRUE, FALSE ).".".strtolower ( $ext['extension'] );
							$tmp = $_FILES['photo']['tmp_name'];
							
							$dimensionsImage = getimagesize( $tmp );
							$widthImage       = $dimensionsImage[0];
							$heightImage        = $dimensionsImage[1];
						
						if( $widthImage >= 500 && $heightImage >= 200 )
						{		
							if( move_uploaded_file( $tmp, $path.$photo_post ) )
								{
								
									_Function::resizeImageFixed( $path.$photo_post, 860, 260 );
									
									//<=//   PHOTO LARGE     =//>
									$photo_post_id = $photo_post;
									
									//==================================================//
									//=            * COPY FOLDER AVATAR /         *    =//		
									//==================================================//
									if ( file_exists( $path.$photo_post ) && isset( $photo_post_id ) )
									{
										copy( $path.$photo_post, $path_cover.$photo_post );
										unlink( $path.$photo_post );
										
									}//<--- IF FILE EXISTS	#2
									
									//<<<-- Delete old image -->>>/
									if ( file_exists( $coverOld ) && $infoUser->cover_image != '' && $photo_post_id )
									{
										unlink( $coverOld );
									}//<--- IF FILE EXISTS #1
									
									//<<<--- * UPDATE DB * -->>>
									$obj->uploadCover( $photo_post_id );
									
									

				echo json_encode( array ( 'output' => '', 'error' => 0, 'photo' => $photo_post ) ); 

}//<--- move_uploaded_file
							else
								{
									echo json_encode( array ( 'output' => 'There was an error', 'error' => 1 ) );
								}
							
							}//<--- Width && Height
else {
	echo json_encode( array ( 'output' => 'The image must be greater than, or equal to 500 x 200px', 'error' => 1 ) );	
}	
						}
						else
							{
								echo json_encode( array ( 'output' => 'Size max 5MB', 'error' => 1 ) );	
							}
						
										
						}
						else
							{
								echo json_encode( array ( 'output' => 'Invalid format JPG, GIF and PNG permitted.', 'error' => 1 ) );
							}
							
				}
				
			else
				{
					echo json_encode( array ( 'output' => 'Please select an image...', 'error' => 1 ) );
				    exit;
				}
				
		}
	
}// SESSION ACTIVE
else 
{
	echo json_encode( array ( 'output' => 'Please login to perform this Action', 'error' => 1, 'reload' => 1 ) );
	exit;
}
?>