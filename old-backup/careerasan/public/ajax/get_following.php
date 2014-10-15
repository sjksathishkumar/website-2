<?php
session_start();
error_reporting(0);
if( 
		isset ( $_POST['offset'])
		&& isset ( $_POST['number']) 
		&& isset ( $_POST['_userId']) 
		&& !empty( $_POST['_userId'] )
	
)
{
  if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == "POST" )
   {
   	
   	/*
	 * --------------------------------------------------
	 *   Valid $offset, $id_user && Valid $postnumbers
	 * --------------------------------------------------
	 */
	$offset                 = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
	$postnumbers            = is_numeric($_POST['number']) ? $_POST['number'] : die();
    $id_user                = is_numeric($_POST['_userId']) ? $_POST['_userId'] : die();
	
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
	
	if( !$_SESSION['authenticated'] )
	{
		$id_user_favs = 0;
	}
	else {
		$id_user_favs = $_SESSION['authenticated'];
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
	$infoUser         = $obj->infoUserLive( $id_user );
	$response         = $obj->getFollowing(
	'WHERE F.follower = '. $id_user .' && F.id '.$query.' '.$offset .'', 'LIMIT '.$postnumbers, $id_user_favs );
	$checkFollow       = $obj->checkFollow( $_SESSION['authenticated'], $id_user );
	
	$_countTotal = count( $response );
	$user        = $id_user;
	
	if( $_countTotal == 0 )
	{
		$nofound = '<span class="notfound">No result</span>';
	}
	
	if( $infoUser->mode == 0 && $checkFollow[0]['status'] == 0 && $_SESSION['authenticated'] != $user )
	{
		$response = null;
		$nofound  = null;
		$mode     = '<span style="padding: 25px 0; background: url('.URL_BASE.'public/img/private.png) right bottom no-repeat;" class="notfound">This profile is private, only followers can access the full profile.';
	}

	else
	{
		$response = $response;
		$mode     = null;
	}
	?>
	<?php $countPosts = count( $response );
   		 if( $countPosts != 0 ) : 
			 foreach ( $response as $key ) 
			 {
			 	
				//============ VERIFIED
				if( $key['type_account'] == '1' )
				{
					$verified = ' <img class="verified_img" src="'.URL_BASE.'public/img/verified_min.png">';
				}
				else 
				{
					$verified = null;
				}
				$checkBlock      = $obj->checkUserBlock( $key['id'], $_SESSION['authenticated'] );
				$checkBlocked    = $obj->checkUserBlock( $_SESSION['authenticated'], $key['id'] );
				
				?>
				<!-- POSTS -->
			   		<li class="hoverList" data="<?php echo $key['id']; ?>">
			   		
			   		<?php if( $checkBlock[0]['status'] == 0 && $checkBlocked[0]['status'] == 0 ): ?>	
			   				
			   			<?php if(  isset( $_SESSION['authenticated'] ) && $_SESSION['authenticated'] != $key['id'] && $key['followActive'] == 0 ): ?>
			   			<span data-username="<?php echo $key['username']; ?>" data-id="<?php echo _Function::randomString( 10, FALSE, TRUE, FALSE ).'-'.$key['id']; ?>" class="followBtn follow_button followBtnMin">Follow</span>
			   			<?php endif; ?>
			   			
			   			<?php if(  isset( $_SESSION['authenticated'] ) && $_SESSION['authenticated'] != $key['id'] && $key['followActive'] == 1 ): ?>
			   			<span data-username="<?php echo $key['username']; ?>" data-id="<?php echo _Function::randomString( 10, FALSE, TRUE, FALSE ).'-'.$key['id']; ?>" class="followBtn follow_button follow_active followBtnMin">Following</span>
			   			<?php endif; ?>
			   		
			   		<?php endif;//<<-- Blocked ?>
			   			
			   			<span class="paddingPost">
			   				<a  href="<?php echo URL_BASE.$key['username']; ?>">
			   					<img class="avatar_user" src="<?php echo URL_BASE."thumb/48-48-public/avatar/".$key['avatar']; ?>">
			   			      </a>
			   			<span class="detail_grid">
			   				<span style="width:100%; float: left;">
			   					<a  href="<?php echo URL_BASE.$key['username']; ?>" class="username"><?php echo stripslashes( $key['name'] ).$verified; ?> </a> <strong class="usernameClass">@<?php echo $key['username']; ?></strong>
			   				</span><!-- SPAN 100% -->
			   				
			   				<span style="width:70%; float: left;">
			   				<p>
			   					<?php echo _Function::checkText( $key['bio'] ); ?>
			   				</p>
			   				</span><!-- SPAN 50% -->
			   		  </span><!-- detail_grid  -->	
			   		</span><!-- paddingPost  -->	
		   		</li> <?php }//<<--- Foreach 
		   endif;
				echo $mode;  
     }//<-- ISSET POST
}//<-- ISSET DATA
?>