<?php
session_start();
error_reporting(0);
if ( 
		isset ( $_POST['add_post'] ) 
		&& !empty( $_POST['add_post'] ) 
		|| isset ( $_POST['photoId'] ) 
		&& !empty( $_POST['photoId'] ) 
		|| isset ( $_POST['video'] ) 
		&& !empty( $_POST['video'] ) 
)
{
  if ( isset ( $_SESSION['authenticated'] ) )
	{
		/*
		 * --------------------------
		 *   Require/Include Files
		 * -------------------------
		 */
		require_once('../../class_ajax_request/classAjax.php');
		include_once('../../application/functions.php'); 
		include_once('../../application/DataConfig.php');
		/*
		 * ----------------------------
		 * Instance Class
		 * ----------------------------
		 */
		$obj      = new AjaxRequest();
		$infoUser = $obj->infoUserLive( $_SESSION['authenticated'] );
		$admin    = $obj->getSettings();
		
		
		$error             = 0;
		$_POST['token_id'] = _Function::idHash( $_SESSION['authenticated'] );
		$pos_details       = _Function::checkText( $_POST['add_post'] );
		$_POST['add_post'] = _Function::checkTextDb( $_POST['add_post'] );
		$urlVideo          = trim( $_POST['video'] );
		$isValidYoutube    = _Function::isValidYoutubeURL( $urlVideo ) ? 1: 0; // 1 Valid 0 Not Valid
		$dataVideoYoutube  = _Function::isValidYoutubeURL( $urlVideo ); 
		$isValidVimeoURL   = _Function::isValidVimeoURL( $urlVideo ) ? 1 : 0; // 1 Valid 0 Not Valid
		$dataVideoVimeo    = _Function::isValidVimeoURL( $urlVideo ); 
		$idVideoYoutube    = _Function::getYoutubeId( $urlVideo );
		
		/*
		 * -------------------------------------------
		 * If is greater than the default character 
		 * -------------------------------------------
		 */
		if( mb_strlen( $_POST['add_post'], 'utf8' ) > $admin->post_length  )
		{
			$_POST['add_post'] = _Function::cropStringLimit( $_POST['add_post'], $admin->post_length );
			
		}
		
		/*
		 * -------------------------------------------
		 *                isValidYoutube
		 * -------------------------------------------
		 */
		if( $isValidYoutube ==  1 && $_POST['photoId'] == '' )
		{
			$dataVideo                = $dataVideoYoutube->{'title'};
			$typeMedia                = 'Video';
			$icon                     = '<i class="video_img_sm icons"></i>';
			$_POST['video_code']      = $idVideoYoutube;
			$_POST['video_title']     = $dataVideoYoutube->{'title'};
			$_POST['video_site']      = 'youtube';
			$_POST['video_url']       = 'http://www.youtube.com/v/'.$idVideoYoutube.'?rel=0&wmode=transparent';
			$_POST['video_thumbnail'] = 'http://img.youtube.com/vi/'.$idVideoYoutube.'/1.jpg';
		}
		/*
		 * -------------------------------------------
		 *                isValidVimeoURL
		 * -------------------------------------------
		 */
		else if( $isValidVimeoURL ==  1 && $_POST['photoId'] == '' )
		{
			$dataVideo                = $dataVideoVimeo->{'title'};
			$typeMedia                = 'Video';
			$icon                     = '<i class="video_img_sm icons"></i>';
			$_POST['video_code']      = $dataVideoVimeo->{'video_id'};
			$_POST['video_title']     = $dataVideoVimeo->{'title'};
			$_POST['video_site']      = 'vimeo';
			$_POST['video_url']       = 'http://player.vimeo.com/video/'.$dataVideoVimeo->{'video_id'}.'';
			$_POST['video_thumbnail'] = str_replace( '_640', '_200', $dataVideoVimeo->{'thumbnail_url'} );
		}
		else 
		{
			$_POST['video_code']      = '';
			$_POST['video_title']     = '';
			$_POST['video_site']      = '';
			$_POST['video_url']       = '';
			$_POST['video_thumbnail'] = '';
			$typeMedia = 'Image';
			$icon = '<i class="ico_img_sm icons"></i>';
		}
		
		//<-------- * NO SHOW ICON * ------>
		if( $isValidYoutube ==  0 && $isValidVimeoURL == 0 && $_POST['photoId'] == '' )
		{
			$typeMedia = null;
			$icon = null;
		}
		
		if( $isValidYoutube ==  0 && $isValidVimeoURL == 0 && $_POST['add_post'] == '' && $_POST['photoId'] == '' && $urlVideo != '' )
		{
			$error = 1;
			return false;
		}
		
		$widthPhoto = _Function::getWidth( URL_BASE.'upload/'.$_POST['photoId'] ); 
				
		if( $widthPhoto > 440 )
		{
			$thumbPic = 'thumb/440-440-';
		}
		else 
		{
			$thumbPic = null;
		}
		
		/*
		 * ---------------------------------------------
		 *    If everything is fine publication insert
		 * --------------------------------------------
		 */	
		$response = $obj->insertPost();
			
		
		if( !empty( $response ) )
		{
           ?>
           
           <!-- Post -->
			   		<li class="hoverList">
			   		  <span class="paddingPost">
			   		  	<a href="<?php echo URL_BASE.$infoUser->username; ?>">
			   			<img class="avatar_user" src="<?php echo URL_BASE.'thumb/48-48-public/avatar/'.$infoUser->avatar; ?>">
			   			</a>
			   			<span class="detail_grid">
			   				<span class="timestamp timeAgo" data="<?php echo date('Y-m-d G:i:s', time()); ?>"><?php echo date('d/m/y', time()); ?></span>
			   				<a href="<?php echo URL_BASE.$infoUser->username; ?>" class="username"><?php echo stripslashes( $infoUser->name ); ?></a> <strong class="usernameClass">@<?php echo $infoUser->username; ?></strong>
			   				<p>
			   					<span id="padding_paragraph">
			   				 	<?php
			   				 	if( isset( 
			   				 	$_POST['video'] ) && $_POST['video'] != '' && $isValidYoutube ==  1 ||
			   				 	isset( $_POST['video'] ) && $_POST['video'] != '' && $isValidVimeoURL == 1
								)
								{
									echo $dataVideo.' '. _Function::linkText( $urlVideo );
									
								}
			   				 	  ?> 
			   				 	 	<?php echo $pos_details; ?> 
			   				 	 	
			   				 	 	<?php if( $isValidYoutube == 0 && $isValidVimeoURL == 0 && isset ( $_POST['photoId'] ) && $_POST['photoId'] != '' && $_POST['add_post'] == '' ): ?>
			   					<a href="<?php echo URL_BASE.'upload/'.$_POST['photoId']; ?>" class="linkImage" rel="lightbox"><?php echo 'pic.thumb/'.$_POST['photoId']; ?></a>
			   					<?php endif; ?>
			   				 	 	</span>
			   				</p>
			   				
			   				<a class="expand getData" data="<?php echo $response; ?>" data-token="<?php echo $_POST['token_id']; ?>">
			   					<?php echo $icon; ?>
			   					<span class="textEx">Expand</span> <?php echo $typeMedia; ?>
			   					</a>
			   					
			   					<a class="favorite favoriteIcon" data="<?php echo $response; ?>" data-token="<?php echo $_POST['token_id']; ?>">
				   					<i class="favorite_ico icons"></i>
				   					<span>Favorite</span>
			   					</a>
			   					
			   					<a class="trash" data="<?php echo $response; ?>" data-token="<?php echo $_POST['token_id']; ?>">
				   					<i class="trash_ico icons"></i>
				   					<span>Trash</span>
			   					</a>
			   					
			   				<!-- details-post -->
			   				<span class="details-post">
			   				</span><!-- details-post -->
	
			   				
			   				<!-- Grid Reply -->
			   		   <div class="grid-reply" style="display: none;"> 
			   				<form action="" method="post" accept-charset="UTF-8" id="form_reply_post">
			   					<input type="hidden" name="id_reply" id="id_reply" value="<?php echo $response; ?>">
			   					<input type="hidden" name="token_reply" id="token_reply" value="<?php echo $_POST['token_id']; ?>">
			   					<textarea name="reply_post" id="reply_post"></textarea>
			   					<div class="counter"></div> 
			   					<button id="button_reply" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Reply</button> 
			   					</form>
			   			 </div><!-- Grid Reply -->
			   		 </span><!-- detail_grid -->
			   	  </span><!-- paddingPost  -->
			   </li>
           <?php
      }//<--- $RESPONSE
   }//<---- authenticated
   else
	{
		echo '<script type="text/javascript">	
					$(document).ready(function(){
						window.location.reload();
			         });// END READY 
         </script>';
	}
}//<------ IF PARENT
 ?>