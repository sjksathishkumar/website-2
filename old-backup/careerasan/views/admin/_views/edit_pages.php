
<div class="content">
	<?php if( isset( $this->pageId->title ) ): ?>
		<span class="titleBar">
			Edit Page &raquo; <?php echo stripslashes( $this->pageId->title ) ?> &raquo;
		</span>
		
		<form action="" method="post" enctype="multipart/form-data" id="upload">
			
			<label>Title:</label>
			<input style="width: 928px;" type="text" value="<?php echo stripslashes( $this->pageId->title ) ?>" name="title" id="title" />
			
			<label>Description:</label>
			<textarea style="width: 928px;" id="content" name="content"><?php echo stripslashes( $this->pageId->content ) ?></textarea>
			
			<input type="submit" name="submit" value="Save" id="button_update" class="bt_update button_edit_pages" />
			<input type="hidden" name="id" value="<?php echo $_GET['edit'] ?>" />
			<p class="error_edit" id="errors"></p>
			<p class="success_edit" id="edit_success"></p>
		</form><!-- Form -->
	<?php
else:
	?>
	<span class="no_result">
			No result
		</span>
	<?php endif; ?>
	
</div><!-- End Content -->
