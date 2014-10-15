<?php
ini_set('memory_limit', '-1');
session_start();
error_reporting(0);
include('../../application/functions.php'); 
$session_id  = $_SESSION['authenticated']; //$session id
$path        = "../../tmp/";
$path_upload = "../../upload/";

if ( isset( $session_id ) ) 
{
	$valid_formats = array("jpg", "JPG", "jpeg","png","x-png");
	if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photo']['name'];
			$size = $_FILES['photo']['size'];
			
			if( strlen( $name ) )
				{
					$ext = pathinfo( $name );
					if( in_array( $ext['extension'], $valid_formats))
					{
					if( $size < ( 3000 * 3000 ) )
						{
							$photo_post  = $session_id.""._Function::randomString( 10, FALSE, TRUE, FALSE ).".".strtolower ( $ext['extension'] );
							$tmp = $_FILES['photo']['tmp_name'];
							if( move_uploaded_file( $tmp, $path.$photo_post ) )
								{
									//=============== 440 px =================//
									$width  = _Function::getWidth( $path.$photo_post );
									$height = _Function::getHeight( $path.$photo_post );
									$max_width = '900';
									
									if( $width < $height )
											{
												$max_width = '600';
											}
											
											if ( $width > $max_width )
											{
												$scale = $max_width / $width;
												$uploaded = _Function::resizeImage( $path.$photo_post, $width, $height, $scale );
											}
											else
											{
												$scale = 1;
												$uploaded = _Function::resizeImage( $path.$photo_post, $width, $height, $scale );
											}

									//<=//   PHOTO LARGE     =//>
									$photo_post_id = $photo_post;
									
									//==================================================//
									//=            * COPY FOLDER AVATAR /         *    =//		
									//==================================================//
									if ( file_exists( $path.$photo_post ) && isset( $photo_post_id ) )
									{
										copy( $path.$photo_post, $path_upload.$photo_post );
										unlink( $path.$photo_post );
										
									}//<--- IF FILE EXISTS	#2

				echo json_encode( array ( 'output' => '', 'error' => 0, 'photo' => $photo_post ) ); 

}//<--- move_uploaded_file
							else
								{
									echo json_encode( array ( 'output' => '<div class="error_div">There was an error</div>', 'error' => 1 ) );
								}
								
						}
						else
							{
								echo json_encode( array ( 'output' => '<div class="error_div">Size max 9 MB</div>', 'error' => 1 ) );	
							}
										
						}
						else
							{
								echo json_encode( array ( 'output' => '<div class="error_div">Invalid format JPG and PNG format permitted.</div>', 'error' => 1 ) );
							}
							
				}
				
			else
				{
					echo json_encode( array ( 'output' => '<div class="error_div">Please select an image ..</div>', 'error' => 1 ) );
				    exit;
				}
				
		}
	
}// SESSION ACTIVE
else 
{
	echo json_encode( array ( 'output' => '<div class="error_div">Please login to perform this Action</div>', 'error' => 1 ) );
	exit;
}
?>