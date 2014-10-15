	<h4 class="titleBar">What's new?</h4>
			 <div id="grid_post">
			   	<form action="<?php echo URL_BASE; ?>public/ajax/upload.php" method="post" accept-charset="UTF-8" id="form_add_post" enctype="multipart/form-data">
				   <textarea name="add_post" class="post_add" id="add_post"></textarea>
					  <button id="button_add" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Send</button>
					    <input type="hidden" name="photoId" value="" id="photoId" />
					    <div class="wrapper_media">
					    		<input type="file" id="upload" class="typeFile" name="photo" accept="image/*" />
								<div class="video_post" title="Add Video"></div>
							</div><!-- wrapper_media -->
							
						<div id="counter"></div>
						<input type="text" name="video_link" id="video_link" placeholder="Link Youtube or Vimeo" value="" />
					</form><!-- form -->
					
					<!-- Wrapper Preview -->
					<div id="wrapper_preview">
						<div id="container_preview">
						</div>
					</div><!-- Wrapper Preview -->
					
			 </div><!-- grid_post  -->
			   
			<h4 class="titleBar">Post Recent</h4>
			
			   	<ul class="posts">
			   		
			   		<div id="container-loader">
			   			<div class="loading-bar"></div>
			   		</div>
			   		
			   		<?php
			   		if( $countPost == 0 ): 
			   		?>
               	<span class="notfound">
               		There are no publications PD: Follow other users to see your updates here.
               	</span>
               	<li class="watermark"></li>
			   		<?php endif; ?>
			   	</ul>