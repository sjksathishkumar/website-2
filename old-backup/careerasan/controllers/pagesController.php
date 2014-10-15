<?php

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : pagesController.php
 *  Class pagesController
 * 
 *  This class has the function of controlling the following pages:
 *  * Help 
 *  * Advertising
 *  * Terms
 *  * Privacy
 *  * About
 *  * Profile - "Settings"
 *  * Settings
 *  * Password
 *  * Design
 *  * Messages
 *  * Recover Pass
 *  * Discover
 *  * Connect
 * 
 **************************************/
 
class pagesController extends Controller
{
	//<-- * INDEX ERROR * --->
    public function index() {
    	header ('HTTP/1.0 404 Not Found');
	    include 'public/error/404.php'; // SHOW ERROR 404
    }
	
    public function help() {
    	$output                    = $this->loadModel('User');
		//<--- INFO USER SESSION ACTIVE
		$this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		$this->_view->settings     = $output->getSettings();
		//<--- WHO TO FOLLOWER
	    $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
	   
	   //<--- TRENDING TOPIC
	   $this->_view->trending = $output->getTrendsTopic();
	   
    	$out                = $this->loadModel( 'Pages' );
		$this->_view->data  = $out->getPage( 'help' );
        $this->_view->title = $this->_view->data->title;
		/* Show Views */
        $this->_view->render('static', null );
    }
	
	public function advertising() {
    	$output                   = $this->loadModel('User');
		//<--- INFO USER SESSION ACTIVE
		$this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
		$this->_view->settings    = $output->getSettings();
		//<--- WHO TO FOLLOWER
	    $this->_view->whoToFollow = $output->whoToFollow( $_SESSION['authenticated'] );
	   
	   //<--- TRENDING TOPIC
	   $this->_view->trending = $output->getTrendsTopic();
	   
    	$out                = $this->loadModel( 'Pages' );
		$this->_view->data  = $out->getPage( 'advertising' );
        $this->_view->title = $this->_view->data->title;
		/* Show Views */
        $this->_view->render('static', null );
	}
	
	public function terms() {
    	$output                    = $this->loadModel('User');
		//<--- INFO USER SESSION ACTIVE
		$this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		$this->_view->settings     = $output->getSettings();
		//<--- WHO TO FOLLOWER
	    $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
	   
	   //<--- TRENDING TOPIC
	   $this->_view->trending = $output->getTrendsTopic();
	   
    	$out                = $this->loadModel( 'Pages' );
		$this->_view->data  = $out->getPage( 'terms' );
        $this->_view->title = $this->_view->data->title;
		/* Show Views */
        $this->_view->render('static', null );
	}

	public function privacy() {
    	$output                    = $this->loadModel('User');
		//<--- INFO USER SESSION ACTIVE
		$this->_view->infoSession  = $output->infoUser( $_SESSION['authenticated'] );
		$this->_view->settings     = $output->getSettings();
		//<--- WHO TO FOLLOWER
	    $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
	   
	   //<--- TRENDING TOPIC
	   $this->_view->trending     = $output->getTrendsTopic();
	    
    	$out                = $this->loadModel( 'Pages' );
		$this->_view->data  = $out->getPage( 'privacy' );
        $this->_view->title = $this->_view->data->title;
		/* Show Views */
        $this->_view->render('static', null );
	}
		
	public function about() {
    	$output                   = $this->loadModel('User');
		//<--- INFO USER SESSION ACTIVE
		$this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
		$this->_view->settings    = $output->getSettings();
		//<--- WHO TO FOLLOWER
	    $this->_view->whoToFollow = $output->whoToFollow( $_SESSION['authenticated'] );
	   
	   //<--- TRENDING TOPIC
	   $this->_view->trending     = $output->getTrendsTopic();
		 
    	$out                = $this->loadModel( 'Pages' );
		$this->_view->data  = $out->getPage( 'about' );
        $this->_view->title = $this->_view->data->title;
		/* Show Views */
        $this->_view->render('static', null );
	}
	
	public function profile() {
		  $output                   = $this->loadModel('User');
		  $this->_view->settings    = $output->getSettings();
		  //<--- INFO USER SESSION ACTIVE
		  $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
		  //<--- TRENDING TOPIC
		  $this->_view->trending    = $output->getTrendsTopic();
		  $this->_view->module      = 'profile';
		   
		 $this->_view->title = 'Profile';
		 /* Show Views */
		 $this->_view->render('settings', null );
	}
	
	public function settings() {
		 $output                   = $this->loadModel('User');
		 $this->_view->settings    = $output->getSettings();
		 //<--- INFO USER SESSION ACTIVE
		 $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
		 //<--- TRENDING TOPIC
		 $this->_view->trending    = $output->getTrendsTopic();
		 //<--- countries
		 $this->_view->countries   = $output->countries();
		 $this->_view->module      = 'settings';
		   
		 $this->_view->title = 'Settings';
		 /* Show Views */
		 $this->_view->render('settings', null );
	}
	
	public function password() {
	  $output                   = $this->loadModel('User');
	  $this->_view->settings    = $output->getSettings();
	  //<--- INFO USER SESSION ACTIVE
	  $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
	  //<--- TRENDING TOPIC
	  $this->_view->trending    = $output->getTrendsTopic();
	  //<--- pass
	  $this->_view->module      = 'password';
	   
	 $this->_view->title = 'Password';
	 /* Show Views */
	 $this->_view->render('settings', null );
	}
	
	public function design() {
	  $output                   = $this->loadModel('User');
	  $this->_view->settings    = $output->getSettings();
      //<--- INFO USER SESSION ACTIVE
	  $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
	  //<--- TRENDING TOPIC
	  $this->_view->trending    = $output->getTrendsTopic();
	  //<--- design
	  $this->_view->module      = 'design';
	   
	 $this->_view->title = 'Design';
	 /* Show Views */
	 $this->_view->render('settings', null );
	}
	
	public function messages() {
	 $output                   = $this->loadModel('User');
	//<--- INFO USER SESSION ACTIVE
	 $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
	 $this->_view->settings    = $output->getSettings();
	 //<--- TRENDING TOPIC
	 $this->_view->trending    = $output->getTrendsTopic();
	 
	 //<<<<-- Messages --->>>>
	 $this->_view->messages    = $output->getMessages( $_SESSION['authenticated'] );
	 $this->_view->countMgs    = count( $this->_view->messages  );
	 
	 $this->_view->title  = 'Messages';
	 //<--- msg
	 $this->_view->module = 'messages';
	/* Show Views */
     $this->_view->render('settings', null );
	}
	
	public function recover() {
	 $output                 = $this->loadModel( 'Pages' );
	 $this->_view->codeValid = $output->getCodePass( $_GET['c'] ) ? 1 : 0;
	 /* Show Views */
	 $this->_view->render('recover', null );
	}
	
	public function discover() {
		$output                = $this->loadModel('User');
		$this->_view->settings = $output->getSettings();
		//<----- ALL POST INDEX PAGE
	   $this->_view->posts     = $output->discover( 
	   'WHERE P.user != '. $_SESSION['authenticated'] .' && U.status = "active" && P.status = "1" && U.mode = "1" && F.id IS NULL', null , $_SESSION['authenticated']
	   );
		     
		//<--- INFO USER SESSION ACTIVE
	   $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
	   //<--- TRENDING TOPIC
	   $this->_view->trending    = $output->getTrendsTopic();
		 
	   //<--- WHO TO FOLLOWER
	   $this->_view->whoToFollow = $output->whoToFollow( $_SESSION['authenticated'] );
	   
		   
	   $this->_view->title = 'Discover';
	   /* Show Views */
	   $this->_view->render('discover', null );
	}

	public function connect() {
		$output                  = $this->loadModel('User');
		$this->_view->settings   = $output->getSettings();
		//<--- INFO USER SESSION ACTIVE
	   $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
	   
		//<----- ALL POST INDEX PAGE
	   $this->_view->data = $output->connect( 
	   'WHERE post_details LIKE \'%@'.$this->_view->infoSession->username.'%\' &&
		U.status = "active" && 
		P.status = "1" && 
		U.mode = "1" && 
        P.user != '.$_SESSION['authenticated'].'', null , $_SESSION['authenticated']
	   );
		     
	   //<--- TRENDING TOPIC
	   $this->_view->trending = $output->getTrendsTopic();
		 
	   //<--- WHO TO FOLLOWER
	   $this->_view->whoToFollow = $output->whoToFollow( $_SESSION['authenticated'] );
	   
		   
	   $this->_view->title = 'Connect ';
	   /* Show Views */
	   $this->_view->render('connect', null );
	}

}//<<<<<<<<<-- * END CLASS * -->>>>>>>>>>>>>

?>
