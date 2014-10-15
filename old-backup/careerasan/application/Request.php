<?php
/*
 * -------------------------------------
 * Miguel Vasquez
 * Request.php
 * Get all Requests of Site
 * -------------------------------------
 */
class Request
{
    private $_controller;
    private $_method;
    
    public function __construct() {
    	$page        = $_GET['page'];    //<-- //PAGES STATIC eg: http:website.com/about
    	$usr         = $_GET['usr'];     //<-- PAGE USR eg: http:website.com/user
    	$action      = $_GET['action'];  //<-- PAGE USR VIEW eg: http:website.com/user/followers
    	$search      = $_GET['search'];  //<-- PAGE SEARCH eg http:website.com/search/games-plus
    	$status      = $_GET['status'];  //<-- PAGE SEARCH eg http:website.com/user/status/1
    	$staticPages = array( 
				    	'help', 
				    	'about', 
				    	'terms', 
				    	'privacy', 
				    	'advertising', 
				    	'discover', 
				    	'connect', 
				    	'settings', 
				    	'profile', 
				    	'password', 
				    	'design', 
				    	'login',
				    	'messages',
				    	'recover',
				    	'validate' 
		);
		
		//<-- *  PAGES DEFAULT * -->
        if( !in_array( $page, $staticPages ) 
	        && isset( $page ) 
	        && !isset( $hashTag ) 
	        && !isset( $search ) 
	        && !isset( $action ) 
		) {
            $this->_controller = strtolower( $page );
			$this->_method     = strtolower( $page );
            
        }
		//<--- ************* STATIC PAGES ABOUT/TERMS/PRIVACY ********* --->
		else if( isset( $page ) 
				&& !isset( $hashTag ) 
				&& !isset( $search ) 
				&& !isset( $action ) 
				&& in_array( $page, $staticPages )  
		) {
			$this->_controller = 'pages';
			$this->_method     = strtolower( $page );
		}
		//<-- ***************** PAGE USER ************* -->
		if( isset( $usr ) 
			&& $action == '' 
			&& !isset( $page ) 
			&& !isset( $action ) 
			&& !isset( $hashTag ) 
			&& !isset( $search ) 
		) {
			$this->_controller = 'user';
			$this->_method     = 'user';
		}
		
		//<-- ************** PAGE USER ACTION ************ -->
		if( isset( $usr ) 
			&& isset( $action ) 
			&& !isset( $page ) 
			&& !isset( $hashTag ) 
			&& !isset( $search ) 
		) {
			$this->_controller = 'user';
			$this->_method     = $action;
		}
		//<-- * PAGE SEARCH * -->
		if( isset( $search ) && $search != '' ) {
			$this->_controller = 'search';
			$this->_method     = 'search';
		}
		
		//<-- * if no have variables defined $ _GET showed index * -->
        if( !$this->_controller ) {
            $this->_controller = DEFAULT_CONTROLLER;
        }
        
        if( !$this->_method ) {
            $this->_method = 'index';
        }
		
    }//<--- * END * -->
    
    public function getController() {
        return $this->_controller;
    }
    
    public function getMethod() {
        return $this->_method;
    }
 
}//<-- * END CLASS * -->

?>