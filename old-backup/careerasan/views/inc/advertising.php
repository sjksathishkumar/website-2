<?php if( isset( $this->settings->ad ) && $this->settings->ad != '' ): ?>
<!-- Grid 1 -->
				   <div class="grid_1">
				   		<!-- container_grid -->
				   		<div class="container_grid grid_ad">
				   			<span class="grid_title_small">Advertising</span>
				   			<?php echo $this->settings->ad; ?>
				   		</div><!-- container_grid -->
				   </div><!-- Grid 1 -->
				   <?php endif; ?>