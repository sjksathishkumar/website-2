<?php
session_start();
error_reporting(0);
if( 
		isset ( $_POST['offset']) 
		&& isset ( $_POST['number'])	
)
{
if ( isset ( $_SESSION['authenticated'] ) )
{
  if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == "POST" )
   {
   	
   	/*
	 * ---------------------------------------
	 *   Valid $offset && Valid $postnumbers
	 * ---------------------------------------
	 */
	$offset                 = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
	$postnumbers            = is_numeric($_POST['number']) ? $_POST['number'] : die();
	
	/*
	 * ---------------------------------------
	 *   Query > ID || Query < ID
	 * ---------------------------------------
	 */
	if( $_POST['query'] == 1 )
	{
		$query = '<';
	}
	else 
	{
		$query = '>';
	}
	
	/*
	 * --------------------------
	 *   Require/Include Files
	 * -------------------------
	 */
	require_once('../../class_ajax_request/classAjax.php');
	include_once('../../application/functions.php'); 
	include_once('../../application/DataConfig.php');
	
	/*
	 * ----------------------
	 *   Instance Class
	 * ----------------------
	 */
	$obj              = new AjaxRequest();
	$response         = $obj->discover(
	'WHERE P.user != '. $_SESSION['authenticated'] .' 
		   && U.status = "active" && P.status = "1" && B.id IS NULL && U.mode = "1" && P.id '.$query.' '.$offset .' && F.id IS NULL', 'LIMIT '.$postnumbers, $_SESSION['authenticated'] );
	
	?>
	<?php $countPosts = count( $response );
   		 if( $countPosts != 0 ) : 
			 foreach ( $response as $key ) 
			 {
			 	if( $key['video_site'] != '' && $key['photo'] == '' )
				{
					$typeMedia            = 'Video';
					$icon                 = '<i class="video_img_sm icons"></i>';
				}
				else if( $key['video_site'] == '' && $key['photo'] != '' )
				{
					$typeMedia            = 'Image';
					$icon                 = '<i class="ico_img_sm icons"></i>';
				}
				else 
				{
					$typeMedia            = null;
					$icon                 = null;
				}
				//============ VERIFIED
				if( $key['type_account'] == '1' )
				{
					$verified = ' <img class="verified_img" src="'.URL_BASE.'public/img/verified_min.png">';
				}
				else 
				{
					$verified = null;
				}
				//============ FAVORITES
				if( $key['favoriteUser'] == 1 )
				{
					$iconFav      = ' iconfavorited';
					$spanFav      = ' class="favorited"';
					$spanAbsolute = '<span class="add_fav"></span>';
					$textFav      = 'Favorited';
				}
				else 
				{
					$iconFav      = null;
					$spanFav      = null;
					$spanAbsolute = null;
					$textFav      = 'Favorite';
				}
				
				/*
				 * -------------------------------------------------
				 *      If the picture is larger than 440 pixels, 
				 *      show the thumbnail
				 * -------------------------------------------------
				 */
				$widthPhoto = _Function::getWidth( URL_BASE.'upload/'.$key['photo'] ); 
				
				if( $widthPhoto > 440 )
				{
					$thumbPic = 'thumb/450-450-';
				}
				else 
				{
					$thumbPic = null;
				}
				?>
				<!-- POSTS -->
			   		<li class="hoverList" data="<?php echo $key['id']; ?>">
			   			<span class="paddingPost">
			   				<?php echo $spanAbsolute; ?>
			   				<a  href="<?php echo URL_BASE.$key['username']; ?>">
			   					<img class="avatar_user" src="<?php echo URL_BASE."thumb/48-48-public/avatar/".$key['avatar']; ?>">
			   			      </a>
			   			<span class="detail_grid">
			   				<span class="timestamp timeAgo" data="<?php echo date('Y-m-d G:i:s', strtotime( $key['date'] ) ); ?>"></span>
			   				<a  href="<?php echo URL_BASE.$key['username']; ?>" class="username"><?php echo stripslashes( $key['name'] ).$verified; ?> </a> <strong class="usernameClass">@<?php echo $key['username']; ?></strong>
			   				<p>
			   					<?php echo _Function::checkText( $key['post_details'] ); ?>
			   					<?php if( $key['video_site'] != '' ) : 
			   						
									echo $key['video_title'].' '. _Function::linkText( $key['video_url'] );
					                 endif;
			   						?>
			   						
			   						<?php if( $key['video_site'] == '' && $key['post_details'] == '' ): ?>
			   						<a class="linkImage galeryAjax cboxElement" href="<?php echo URL_BASE.'upload/'.$key['photo']; ?>" rel="lightbox">
			   							<?php echo 'pic.thumb/'.$key['photo']; ?>
			   							</a>
			   						<?php endif; ?>
			   				</p>
			   				
			   				<a class="expand getData" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
			   					<?php echo $icon; ?>
			   					<span class="textEx">Expand</span> <?php echo $typeMedia; ?>
			   					</a>
			   					
			   					
			   					
			   					<a class="favorite favoriteIcon" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
			   					<i class="favorite_ico icons<?php echo $iconFav; ?>"></i>
			   					<span<?php echo $spanFav; ?>><?php echo $textFav; ?></span>
			   					</a>
			   					
			   					<?php if( $key['user'] == $_SESSION['authenticated'] ): ?>
			   					<a class="trash" data-image="<?php echo $key['photo']; ?>" data="<?php echo $key['id']; ?>" data-token="<?php echo $key['token_id']; ?>">
				   					<i class="trash_ico icons"></i>
				   					<span>Trash</span>
			   					</a>
			   					<?php endif; ?>

			   			<!-- details-post -->
			   			<span class="details-post">
			   			</span><!-- details_post -->
			   			
			   			<!-- Grid Reply -->
			   		   <div class="grid-reply" style="display: none;"> 
			   				<form action="" method="post" accept-charset="UTF-8" id="form_reply_post">
			   					<input type="hidden" name="id_reply" id="id_reply" value="<?php echo $key['id']; ?>">
			   					<input type="hidden" name="token_reply" id="token_reply" value="<?php echo $key['token_id']; ?>">
			   					<textarea name="reply_post" id="reply_post"></textarea>
			   					<div class="counter"></div> 
			   					<button id="button_reply" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Reply</button> 
			   					</form>
			   			</div><!-- Grid Reply -->
			   		  </span><!-- paddingPost  -->	
		   		</li> <?php } endif; 
     }//<-- SESSION
  }//<-- if token id
}//<-- ISSET
?>