<?php
session_start();
if( 
		isset ( $_GET['since_id'] ) 
		&& !empty ( $_GET['since_id'] )
	
)
{
	/*
	 * --------------------------
	 *   Require File
	 * -------------------------
	 */
	require_once('../../class_ajax_request/classAjax.php');
	include_once('../../application/functions.php'); 
	include_once('../../application/DataConfig.php');	

	if( isset( $_GET ) && $_SERVER['REQUEST_METHOD'] == "GET" && isset( $_SESSION['authenticated'] ) )
	 {
	 	$since_id     = is_numeric( $_GET['since_id'] ) ? $_GET['since_id'] : die();
		$_array       = array();
		/*
		 * ----------------------
		 *   Instance Class
		 * ----------------------
		 */
		$obj          = new AjaxRequest();
		$getPosts     = $obj->discover( 
			   'WHERE P.user != '. $_SESSION['authenticated'] .' 
			   && U.status = "active" && P.status = "1" && P.id > '.$since_id.' && U.mode = "1" && F.id IS NULL', null , $_SESSION['authenticated']
			   );
	    
	    $count = count( $getPosts );
		if( $count != 0 )
		{
			for ( $i = 0; $i < $count; ++$i )
			{
				//<---- DELETE POST
			    if( $_SESSION['authenticated'] == $getPosts[$i]['user'] ){
					$removePost = ' <a class="trash" data="'.$getPosts[$i]['id'].'" data-token="'.$getPosts[$i]['token_id'].'"> <i class="trash_ico icons"></i> <span>Trash</span> </a>';
				} else {
					$removePost = null;
				}
				//<---- VERIFIED
				if( $getPosts[$i]['type_account'] == 1 ){
					$verified = ' <img class="verified_img" src="'.URL_BASE.'public/img/verified_min.png">';
				} else {
					$verified = null;
				}
				//<---- TYPE MEDIA
				if( $getPosts[$i]['video_site'] != '' && $getPosts[$i]['photo'] == '' ){
					$typeMedia            = 'Video';
					$icon                 = '<i class="video_img_sm icons"></i>';
				} else if( $getPosts[$i]['video_site'] == '' && $getPosts[$i]['photo'] != '' ){
					$typeMedia            = 'Image';
					$icon                 = '<i class="ico_img_sm icons"></i>';
				} else {
					$typeMedia            = null;
					$icon                 = null;
				}
				if( $getPosts[$i]['video_site'] != '' )
				{
					$titleVideo = $getPosts[$i]['video_title'].' '. _Function::linkText( $getPosts[$i]['video_url'] );
				}
				
				if( $getPosts[$i]['video_site'] == '' && $getPosts[$i]['post_details'] == '' )
				{
					$picImage = '<a class="linkImage" href="'.URL_BASE.'upload/'.$getPosts[$i]['photo'].'" rel="lightbox"> pic.thumb/'.$getPosts[$i]['photo'].' </a>';
				}
				
				$_array[] = '<li class="hoverList" data="'.$getPosts[$i]['id'].'"> <span class="paddingPost"> <a href="'.URL_BASE.$getPosts[$i]['username'].'"> <img class="avatar_user" src="'.URL_BASE.'thumb/48-48-public/avatar/'.$getPosts[$i]['avatar'].'"> </a> <span class="detail_grid"> <span class="timestamp timeAgo" data="'.date('Y-m-d G:i:s', strtotime( $getPosts[$i]['date'] ) ).'"></span> <a href="'.URL_BASE.$getPosts[$i]['username'].'" class="username">'.stripslashes( $getPosts[$i]['name'] ).' '.$verified.' </a> <strong class="usernameClass">@'.$getPosts[$i]['username'].'</strong> <p> '._Function::checkText( $getPosts[$i]['post_details'] ).' '.$titleVideo.' '.$picImage.' </p> <a class="expand getData" data="'.$getPosts[$i]['id'].'" data-token="'.$getPosts[$i]['token_id'].'"> '.$icon.' <span class="textEx">Expand</span> '.$typeMedia.'</a> <a class="favorite favoriteIcon" data="'.$getPosts[$i]['id'].'" data-token="'.$getPosts[$i]['token_id'].'"> <i class="favorite_ico icons"></i> <span>Favorite</span> </a> '.$removePost.' <!-- details-post --> <span class="details-post"> </span><!-- details_post --> <!-- Grid Reply --> <div class="grid-reply" style="display: none;"> <form action="" method="post" accept-charset="UTF-8" id="form_reply_post"> <input type="hidden" name="id_reply" id="id_reply" value="'.$getPosts[$i]['id'].'"> <input type="hidden" name="token_reply" id="token_reply" value="'.$getPosts[$i]['token_id'].'"> <textarea name="reply_post" id="reply_post"></textarea> <div class="counter"></div> <button id="button_reply" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Reply</button> </form> </div><!-- Grid Reply --> </span><!-- paddingPost --> </span></li>';
			}
			
		}
		
	echo json_encode( array ( 'posts' => $_array ) ); 
	
	 }
}//<---isset ( $_GET['offset']) &&
 ?>