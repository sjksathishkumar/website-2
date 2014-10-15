<?php
session_start();
//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
<base href="<?php echo URL_BASE ?>" target="_top" />
<title>Admin</title>
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>public/admin/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>public/admin/css/tables.css"/>
<script type="text/javascript" src="<?php echo $_layoutParams['root_js']; ?>modernizr.custom.js"></script>		
		<link rel="shortcut icon" href="<?php echo $_layoutParams['root_img']; ?>favicon.ico" />



</head>		
	<div class="wrapper_head">
		<div class="header">
			<ul class="menu">
				<li>
					<a href="<?php echo URL_BASE ?>admin/">
						Home
					</a>
				</li>
				
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=pages">
						Pages
					</a>
				</li>
				
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=users">
						Users
					</a>
				</li>
				
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=users_reported">
						Users Reported
					</a>
				</li>
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=posts_reported">
						Posts Reported
					</a>
				</li>
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=ad">
						Ad
					</a>
				</li>
				<li>
					<a href="<?php echo URL_BASE ?>admin/?id=password">
						Password
					</a>
				</li>
				<li>
					<a id="logout">
						Logout
					</a>
				</li>
			</ul>
		</div><!-- header -->
	</div><!-- wrapper_menu -->
	
	
	<div class="wrapper_content">
		
			<?php
		
			//==================
			if( !isset( $idPage ) && !isset( $_GET['edit'] ) )
			{
				include( 'update.php' );
				
			}
			//==================
			if( $idPage == 'users' )
			{
				include( 'users.php' );
				
			}
			//==================
			if( $idPage == 'users_reported' )
			{
				include( 'users_reported.php' );
				
			}
			
			if( $idPage == 'posts_reported' )
			{
				include( 'post_reported.php' );
				
			}
			
			if( $idPage == 'ad' )
			{
				include( 'ad.php' );
				
			}
			
			if( $idPage == 'pages' )
			{
				include( 'pages.php' );
				
			}
			
			if( $idPage == 'password' )
			{
				include( 'password.php' );
				
			}
			
			if( isset( $_GET['edit'] ) )
			{
				include( 'edit_pages.php' );
				
			}
			
			?>
	
	</div><!-- wrapper_content -->
	<body>


   <script src="<?php echo $_layoutParams['root_js']; ?>jquery-1.7.1.min.js"></script>
   <script src="<?php echo $_layoutParams['root_js']; ?>jquery.easing.1.3.js"></script>
   <script src="<?php echo $_layoutParams['root_js']; ?>jquery.placeholder.1.1.1.min.js"></script>
   <script src="<?php echo $_layoutParams['root_js']; ?>jquery-ui-1.8.17.custom.min.js"></script>
   <script src="<?php echo URL_BASE; ?>public/admin/js/actions.js"></script>
   <script src="<?php echo URL_BASE; ?>public/admin/js/jquery.dataTables.js"></script>
   
   <script type="text/javascript">
   	oTable = $('.dTable').dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"H"fl>t<"F"ip>',
		"aaSorting": [[ 0, "desc" ]]
	});
   </script>
 </body>
</html>