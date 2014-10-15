<!-- Grid 1 -->
				   <div class="grid_1">
				   		<!-- container_grid -->
				   		<div class="container_grid">
				   			<span id="avatar-min">
				   				<img class="avatar_user" src="<?php echo URL_BASE; ?>thumb/48-48-public/avatar/<?php echo $this->infoSession->avatar; ?>">
				   			</span>
				   			
				   			<span class="detail_grid_right">
				   				<a class="username_right myprofile" href="<?php echo URL_BASE.$this->infoSession->username; ?>"><?php echo stripslashes( $this->infoSession->name ); ?></a>
				   				<a class="link_small myprofile" href="<?php echo URL_BASE.$this->infoSession->username; ?>">See my profile &rarr;</a>
				   			</span>
				   		</div><!-- container_grid -->
				   </div><!-- Grid 1 -->