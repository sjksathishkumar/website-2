<?php
/*
 * -------------------------------------
 * Miguel Vasquez
 * Bootstrap.php
 * -------------------------------------
 */
class Bootstrap
{
    public static function run( Request $getRequest ) {
        $controller      = $getRequest->getController() . 'Controller';
        $rootController  = ROOT . 'controllers' . DS . $controller . '.php';
        $method          = $getRequest->getMethod();
        
        if( is_readable( $rootController ) )
        {
            require $rootController;
            $controller = new $controller;
            
            if( is_callable( array( $controller, $method ) ) )
            {
                $method = $getRequest->getMethod();
            }
            else
            {
                $method = 'index';
            }
			
				call_user_func( array( $controller, $method ) );
			
            
        }//<-- * is_readable * -->
        else {
	          include 'public/error/404.php'; // SHOW ERROR 404
        }
    }//<-- * END FUNCTION * -->
}//<-- * END CLASS * -->

?>