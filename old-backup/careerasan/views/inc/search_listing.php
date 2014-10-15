	<h4 class="titleBar" id="query_data" data-query="<?php echo $_GET['q']; ?>">Result of <?php echo $_GET['q'].$this->titleH4; ?></h4>
		
			
			   	<ul class="posts">
			   		
			   		<div id="container-loader">
			   			<div class="loading-bar"></div>
			   		</div>
			   		
			   		<?php
			   		if( $countPost == 0 ): 
			   		?>
               	<span class="notfound">
               		No results have been found.
               	</span>
			   		<?php endif; ?>
			   	</ul>