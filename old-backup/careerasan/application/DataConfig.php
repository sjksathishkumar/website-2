<?php
/*
 * -------------------------------------
 * Miguel Vasquez
 * DataConfig.php
 * @Class Controller
 * 
 * @loadModel - Load Models
 * @Rediret - Redirect
 * @CheckEmail - CheckEmail
 *
 * -------------------------------------
 */
/*
 * PARAMS DEFAULT
 * define('SITE_NAME', $settings->title ); 
 * Title from AdminSettings
 * 
 */
$config = Config::singleton();
define('SITE_NAME', $settings->title ); //<-- SITE NAME EG: SOCIAL
define('DESCRIPTION_SITE', $settings->description ); //<-- SITE DESCRIPTION 
define('KEYWORDS_SITE', $settings->keywords ); //<-- SITE KEYWORDS
$config->set( 'BACKGROUND_INDEX', $settings->bg_index );
define( 'MAX_LENGTH', $settings->post_length );
/*
 * DATE DEFAULT
 * */
//date_default_timezone_set('America/Caracas');



//<--- *  NOT MODIFIED * --->
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');
/*
 * FOLDERS/FILES ROOT
 * 
 * */
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('tmpFolder', 'tmp/');
$config->set('avatarFolder', 'avatar/');
$config->set('photosListingFolder', 'photos-listing/');
/*
 * PARAMS
 * 
 * */

$config->set( 'time', date( 'Y-m-d G:i:s', time() ) );
?>
