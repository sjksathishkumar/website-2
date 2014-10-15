<?php

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : indexController.php
 *  Class indexController
 * 
 *  This class has the function of controlling the following page:
 *  * Index
 * 
 **************************************/
 
class indexController extends Controller
{ 
    public function index() {
		if( Session::get( 'authenticated' ) ) {
		   $output                   = $this->loadModel('User');
		   $this->_view->settings    = $output->getSettings();
		   //<--- INFO USER SESSION
		   $this->_view->infoSession = $output->infoUser( $_SESSION['authenticated'] );
		   
		   //<----- ALL POST INDEX PAGE
		   $this->_view->posts = $output->getAllPosts( 
		   'WHERE P.user = '. $_SESSION['authenticated'] .' 
		   && U.status = "active" && P.status = "1" || F.follower = '. $_SESSION['authenticated'] .'
		   && F.status = "1" ', null , $_SESSION['authenticated']
		   );
		   //<--- WHO TO FOLLOWER
		   $this->_view->whoToFollow  = $output->whoToFollow( $_SESSION['authenticated'] );
		   //<--- TRENDING TOPIC
		   $this->_view->trending     = $output->getTrendsTopic();
		   
		}
		
		if( !Session::get( 'authenticated' ) ) {
			$output = $this->loadModel('User');
			if( isset( $_GET['validate'] ) ) {
				$this->_view->accountValidate = $output->getCodeAccount( $_GET['validate'] ) ? 1 : 0;
			}
			
			if( $this->_view->accountValidate == 1 ) {
				$this->_view->actived = $output->activeAccount( $_GET['validate'] );
			}
		}
		/* Show Views */
        $this->_view->render( 'index', null );
    }
}
?>