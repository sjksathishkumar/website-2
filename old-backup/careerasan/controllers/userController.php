<?php

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : userController.php
 *  Class userController
 * 
 *  This class has the function of controlling the following pages:
 *  * Page main User 
 *  * Favorites
 *  * Followers
 *  * Following
 *  * Media
 *  * Status
 * 
 **************************************/
 
class userController extends Controller
{ 
    public function index() {
        $output                = $this->loadModel('User');
		$this->_view->settings = $output->getSettings();
        $this->_view->data     = $output->getUserId( $_GET['usr'] );
		$this->_view->_count   = count( $this->_view->data );
		
		//<---- Data User
		if( $this->_view->_count != 0 ) {
			$this->_view->title = stripslashes( $this->_view->data[0]['name'] )." @".$this->_view->data[0]['username']." ";
			$this->_view->titleH4 = 'Posts';
			
			//<----- ALL POST INDEX PAGE
		   $this->_view->posts = $output->getAllPosts( 
		   'WHERE P.user = '. $this->_view->data[0]['id'] .'  ', null , $this->_view->data[0]['id']
		   );
		
		//<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowers = $output->getFollowers( 
		   'WHERE F.following = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
		   //<----- ALL POST FAVORITE PAGE
		   $this->_view->postsFavs = $output->getPostsFavs( 
		   'WHERE F.id_usr = '. $this->_view->data[0]['id'] .' ', null , null
		   );
		   
		   //<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowing = $output->getFollowing( 
		   'WHERE F.follower = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   //<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 //<--- INFO USER ALL
		   $this->_view->info  = $output->infoUser( $this->_view->data[0]['id'] );
		
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
		   
		   //<-- Follower -> Following
		   $this->_view->followActive = $output->checkFollow( $this->_view->data[0]['id'],  $_SESSION['authenticated']);
		   
		   //<-- Following -> Follower
		   $this->_view->followingActive = $output->checkFollow( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   //<--- Show Last Photos
		   $this->_view->lastPhotos = $output->getPhotos( $this->_view->data[0]['id'] );
		 	
		   $this->_view->checkBlock  = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		 	
		   $this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data[0]['id'], $_SESSION['authenticated'] );

			//<<<--- * File Ajax * --->>>
			$this->_view->_file  = 'get_posts.php';
			
		 }//<--- IF COUNT != 0
		 
		 /* Show Views */
         $this->_view->render('profile', null );
    }
	
	public function favorites() {
    	$output                = $this->loadModel('User');
        $this->_view->data     = $output->getUserId( $_GET['usr'] );
		$this->_view->settings = $output->getSettings();
		$this->_view->_count   = count( $this->_view->data );
		
		//<---- Data User
		if( $this->_view->_count != 0 ) {
			$this->_view->title = 'Favorites - '.stripslashes( $this->_view->data[0]['name'] )." @".$this->_view->data[0]['username']." ";
			$this->_view->titleH4 = 'Favorites';
			
			//<----- ALL POST INDEX PAGE
		   $this->_view->posts = $output->getAllPosts( 
		   'WHERE P.user = '. $this->_view->data[0]['id'] .'  ', null , $this->_view->data[0]['id']
		   );
		   
			//<----- ALL POST FAVORITE PAGE
		   $this->_view->postsFavs = $output->getPostsFavs( 
		   'WHERE F.id_usr = '. $this->_view->data[0]['id'] .' ', null , null
		   );
		
		//<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowers = $output->getFollowers( 
		   'WHERE F.following = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
		   //<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowing = $output->getFollowing( 
		   'WHERE F.follower = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   //<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 //<--- INFO USER ALL
		   $this->_view->info  = $output->infoUser( $this->_view->data[0]['id'] );
		
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
		   
		   //<-- Follower -> Following
		   $this->_view->followActive = $output->checkFollow( $this->_view->data[0]['id'],  $_SESSION['authenticated']);
		   
		   //<-- Following -> Follower
		   $this->_view->followingActive = $output->checkFollow( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   //<--- Show Last Photos
		   $this->_view->lastPhotos = $output->getPhotos( $this->_view->data[0]['id'] );
		 	
		   $this->_view->checkBlock  = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   $this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data[0]['id'], $_SESSION['authenticated'] );
		   
			//<<<--- * File Ajax * --->>>
			$this->_view->_file  = 'get_posts_favorites.php';
			
		 }//<--- IF COUNT != 0
		 
		 /* Show Views */
         $this->_view->render('profile', null );
    }
	
	public function followers() {
        $output                = $this->loadModel('User');
        $this->_view->data     = $output->getUserId( $_GET['usr'] );
		$this->_view->settings = $output->getSettings();
		$this->_view->_count   = count( $this->_view->data );
		
		//<---- Data User
		if( $this->_view->_count != 0 ) {
			$this->_view->title = 'Followers - '.stripslashes( $this->_view->data[0]['name'] )." @".$this->_view->data[0]['username']." ";
			$this->_view->titleH4 = 'Followers';
			
			//<<<<----- ALL POST INDEX PAGE
		   $this->_view->posts = $output->getAllPosts( 
		   'WHERE P.user = '. $this->_view->data[0]['id'] .'  ', null , $this->_view->data[0]['id']
		   );
		   
		   //<<<<----- ALL FAVORITE PAGE
		   $this->_view->postsFavs = $output->getPostsFavs( 
		   'WHERE F.id_usr = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
			//<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowers = $output->getFollowers( 
		   'WHERE F.following = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
		   //<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowing = $output->getFollowing( 
		   'WHERE F.follower = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		
		   //<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 //<--- INFO USER ALL
		   $this->_view->info  = $output->infoUser( $this->_view->data[0]['id'] );
		
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
		   
		   //<-- Follower -> Following
		   $this->_view->followActive = $output->checkFollow( $this->_view->data[0]['id'],  $_SESSION['authenticated']);
		   
		   //<-- Following -> Follower
		   $this->_view->followingActive = $output->checkFollow( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   //<--- Show Last Photos
		   $this->_view->lastPhotos = $output->getPhotos( $this->_view->data[0]['id'] );
		 	
			$this->_view->checkBlock  = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
			
			$this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data[0]['id'], $_SESSION['authenticated'] );
			
			//<<<--- * File Ajax * --->>>
			$this->_view->_file  = 'get_followers.php';
			
		 }//<--- IF COUNT != 0
		 
		 /* Show Views */
         $this->_view->render('profile', null );
    }

	public function following() {
        $output                = $this->loadModel('User');
        $this->_view->data     = $output->getUserId( $_GET['usr'] );
		$this->_view->settings = $output->getSettings();
		$this->_view->_count   = count( $this->_view->data );
		
		//<---- Data User
		if( $this->_view->_count != 0 ) {
			$this->_view->title = 'Following - '.stripslashes( $this->_view->data[0]['name'] )." @".$this->_view->data[0]['username']." ";
			$this->_view->titleH4 = 'Following';
			
			//<<<<----- ALL POST INDEX PAGE
		   $this->_view->posts = $output->getAllPosts( 
		   'WHERE P.user = '. $this->_view->data[0]['id'] .'  ', null , $this->_view->data[0]['id']
		   );
		   
		   //<<<<----- ALL FAVORITE PAGE
		   $this->_view->postsFavs = $output->getPostsFavs( 
		   'WHERE F.id_usr = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
			//<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowers = $output->getFollowers( 
		   'WHERE F.following = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		   
		   //<<<<<----- ALL Followers PAGE
		   $this->_view->_getFollowing = $output->getFollowing( 
		   'WHERE F.follower = '. $this->_view->data[0]['id'] .' ', null , $this->_view->data[0]['id']
		   );
		
		   //<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 //<--- INFO USER ALL
		   $this->_view->info  = $output->infoUser( $this->_view->data[0]['id'] );
		
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
		   
		   //<-- Follower -> Following
		   $this->_view->followActive = $output->checkFollow( $this->_view->data[0]['id'],  $_SESSION['authenticated']);
		   
		   //<-- Following -> Follower
		   $this->_view->followingActive = $output->checkFollow( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   $this->_view->checkBlock  = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   $this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data[0]['id'], $_SESSION['authenticated'] );
		   
		   //<--- Show Last Photos
		   $this->_view->lastPhotos = $output->getPhotos( $this->_view->data[0]['id'] );
		   
			//<<<--- * File Ajax * --->>>
			$this->_view->_file  = 'get_following.php';
			
		 }//<--- IF COUNT != 0
		 
		 //<-- Render
         $this->_view->render('profile', null );
    }

	public function media() {
		$output                = $this->loadModel('User');
        $this->_view->data     = $output->getUserId( $_GET['usr'] );
		$this->_view->settings = $output->getSettings();
		$this->_view->_count   = count( $this->_view->data );
		
		//<---- Data User
		if( $this->_view->_count != 0 ) {
			$this->_view->title = 'Media - '.stripslashes( $this->_view->data[0]['name'] )." @".$this->_view->data[0]['username']." ";
			
			//<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 //<--- INFO USER ALL
		   $this->_view->info  = $output->infoUser( $this->_view->data[0]['id'] );
		   
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   
		   $this->_view->checkBlock  = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data[0]['id'] );
		   
		   $this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data[0]['id'], $_SESSION['authenticated'] );
		   
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
			
			//<--- Show Last Photos
		   $this->_view->_media = $output->getAllMedia( $this->_view->data[0]['id'], null, null );
			
		}
		
		 /* Show Views */
         $this->_view->render('media', null );
	}

	public function status() {
		 $output                       = $this->loadModel('User');
    	 $this->_view->data            = $output->getStatus( $_GET['usr'], $_GET['id_status'] );
		 $this->_view->followingActive = $output->checkFollow( $_SESSION['authenticated'] , $this->_view->data->user_id);
		 $this->_view->favorites       = $output->getFavorites( $_GET['id_status'] );
		 $this->_view->reply           = $output->getReply( $_GET['id_status'] );
		 $this->_view->countReply      = count( $this->_view->reply );
		 $this->_view->checkBlock      = $output->checkUserBlock( $_SESSION['authenticated'], $this->_view->data->user_id );
			
		 $this->_view->checkBlocked  = $output->checkUserBlock( $this->_view->data->user_id, $_SESSION['authenticated'] );
		   
		 //<--- INFO USER SESSION ACTIVE
		   $this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		   
		 $chars = mb_strlen( $this->_view->data->post_details, 'utf8' );
		 if( $chars > 20 ) {
		 	$post_details = _Function::cropString( $this->_view->data->post_details, 20 )." // ";
		 } else if( $this->_view->data->post_details == '' ) {
		 	$post_details = null;
		 } else {
			 $post_details = $this->_view->data->post_details." // ";
		 }
		 
		 $this->_view->title = 'Status - '.$post_details.stripslashes( $this->_view->data->name )." @".$this->_view->data->username." ";
			
		/* Show Views */
         $this->_view->render('status', null );
	}
	
}//<<<<<<<---------- * End Class * ------------>>>>>>>>>

?>