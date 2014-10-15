<?php
ini_set('memory_limit', '-1');
session_start();
error_reporting(0);
require('../../class_ajax_request/classAjax.php');
include('../../application/functions.php'); 
include('../../application/DataConfig.php');
$session_id  = $_SESSION['authenticated']; //$session id
$path        = "../../tmp/";
$path_avatar = "../avatar/";
$obj         = new AjaxRequest();
$infoUser    = $obj->infoUserLive( $_SESSION['authenticated'] );
$imgOld      = $path_avatar.$infoUser->avatar;


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
							$photo_post  = strtolower( $infoUser->username )."_".$session_id.""._Function::randomString( 5, FALSE, TRUE, FALSE ).".".strtolower ( $ext['extension'] );
							$tmp = $_FILES['photo']['tmp_name'];
							if( move_uploaded_file( $tmp, $path.$photo_post ) )
								{
									$_size = 62;
									$file = $path.$photo_post;
									list( $width, $height, $imageType  ) = getimagesize( $file );
									$imageType = image_type_to_mime_type($imageType);
									$newImage = imagecreatetruecolor( $_size, $_size);
									
									switch($imageType) {
									case "image/gif":
										$source=imagecreatefromgif($file); 
										break;
								    case "image/pjpeg":
									case "image/jpeg":
									case "image/jpg":
										$source=imagecreatefromjpeg($file); 
										break;
								    case "image/png":
									case "image/x-png":
										$source=imagecreatefrompng($file); 
										imagefill( $newImage, 0, 0, imagecolorallocate( $newImage, 255, 255, 255 ) );
										imagealphablending( $newImage, TRUE );
										break;
							  	}
	
									if ( $width > $height )
									{
									    $new_height = $_size;
									    $new_width = ( $width / $height ) * $new_height;
									
									    $x = ( $width - $height ) / 2;
									    $y = 0;
									}
									else {
									    $new_width = $_size;
									    $new_height = ( $height / $width ) * $new_width;
									    
										//($height-$width)/2
									    $y = ( $height - $width ) / 2;
									    $x = 0;
									}
						
						            imagecopyresampled( $newImage, $source, 0, 0, $x, $y, $new_width, $new_height, $width, $height ); 
						            
						            switch($imageType) {
									case "image/gif":
								  		imagegif($newImage,$file); 
										break;
							      	case "image/pjpeg":
									case "image/jpeg":
									case "image/jpg":
								  		imagejpeg($newImage,$file,90); 
										break;
									case "image/png":
									case "image/x-png":
										imagepng($newImage,$file);  
										break;
							         }
						            
						            //imagedestroy( $temp );  
									
									
									//<=//   PHOTO LARGE     =//>
									$photo_post_id = $photo_post;
									
									//==================================================//
									//=            * COPY FOLDER AVATAR /         *    =//		
									//==================================================//
									if ( file_exists( $path.$photo_post ) && isset( $photo_post_id ) )
									{
										copy( $path.$photo_post, $path_avatar.$photo_post );
										unlink( $path.$photo_post );
										
									}//<--- IF FILE EXISTS	#2
									
									//<<<-- Delete old image -->>>/
									if ( file_exists( $imgOld ) && $imgOld != $path_avatar.'avatar.png' && $photo_post_id )
									{
										unlink( $imgOld );
									}//<--- IF FILE EXISTS #1
									
									//<<<--- * UPDATE DB * -->>>
									$obj->uploadAvatar( $photo_post_id );
									
									

				echo json_encode( array ( 'output' => '', 'error' => 0, 'photo' => $photo_post ) ); 

}//<--- move_uploaded_file
							else
								{
									echo json_encode( array ( 'output' => 'There was an error', 'error' => 1 ) );
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