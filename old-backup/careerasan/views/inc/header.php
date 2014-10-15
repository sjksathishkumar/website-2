<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<base href="<?php echo URL_BASE; ?>" target="_top" />
		<title><?php if( isset( $this->title ) ) : echo $this->title.' - '; endif; ?><?php echo SITE_NAME; ?></title>
		<meta name="description" content="<?php echo DESCRIPTION_SITE; ?>" />
		<meta name="keywords" content="<?php echo KEYWORDS_SITE; ?>" />
		<link href="<?php echo $_layoutParams['root_css']; ?>styles.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams['root_css']; ?>reset.css" charset="UTF-8" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<script type="text/javascript" src="<?php echo $_layoutParams['root_js']; ?>modernizr.custom.js"></script>		
		<link rel="shortcut icon" href="<?php echo $_layoutParams['root_img']; ?>favicon.ico" />
		<!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

	
            