<?php 

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : adminController.php
 *  Class adminController
 * 
 *  This class has the function of controlling the following page:
 *  * Index and sections on Admin Panel 
 * 
 **************************************/
class adminController extends Controller
{
	/* INDEX */
    public function index() {  
    	$out = $this->loadModel( 'Admin' );
		$this->_view->settings      = $out->getSettings();
		$this->_view->users         = $out->getUsers( " WHERE status = 'active' || status = 'pending'", 'LIMIT '.( 20 ) );
		$this->_view->countUser     = count( $this->_view->users );
		$this->_view->usersGrid     = $out->getUsers( null, null );
		$this->_view->countUserGrid = count( $this->_view->usersGrid );
		$this->_view->usersReported = $out->getUsersReported();
		$this->_view->postsReported = $out->getPostReported();
		$this->_view->pageId        = $out->getPageId( $_GET['edit'] );
        $this->_view->title         = 'Admin';
		/* Show Views */
        $this->_view->render('index', null );
    }
	
}//<<<<<<<<<-- * END CLASS * -->>>>>>>>>>>>>

?>
