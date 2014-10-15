<?php 
$countFollow = count( $this->whoToFollow );
if( isset( $this->whoToFollow ) && $countFollow != 0 ) :
	
?>
<!-- Grid 1 -->
   <div class="grid_1">
   		<!-- container_grid -->
   		<div class="container_grid who_follow_grid">
   			<span class="grid_title_small">Who to Follow</span>
   			
   			<?php
   			foreach ( $this->whoToFollow as $key )
   			{
   				//============ VERIFIED
				if( $key['type_account'] == '1' )
				{
					$verfied = ' <img class="verified_img" src="'.URL_BASE.'public/img/verified_min.png">';
				}
				else 
				{
					$verfied = null;
				}
   			 ?>
   			<!-- whoContainer -->
   			<div class="whoContainer" >
   				<a href="<?php echo URL_BASE.$key['username']; ?>">
   					<img class="avatar_user" src="<?php echo URL_BASE."thumb/50-50-public/avatar/".$key['avatar']; ?>">
   				</a>
   					<span class="detail_grid_right">
   						<a class="username_right" href="<?php echo URL_BASE.$key['username']; ?>"><?php echo stripslashes( $key['name'] ); ?> <?php echo $verfied; ?></a>
   					<a class="link_small whofollow" data-username="<?php echo $key['username']; ?>" data-id="<?php echo _Function::randomString( 10, FALSE, TRUE, FALSE ).'-'.$key['id']; ?>">
   						Follow @<?php echo $key['username']; ?></a>
   				</span>
   			</div><!-- whoContainer -->
   			<?php }//<---FOREACH ?>
   			
   		</div><!-- container_grid -->
   </div><!-- Grid 1 -->
   <?php  endif; ?>