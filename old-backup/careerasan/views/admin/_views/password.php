<div class="content">
	<div class="grid_left">
		<span class="titleBar">
			Change Password &raquo;
		</span>
		
		<form action="" method="post" enctype="multipart/form-data" id="upload">
			
			<label>New Password:</label>
			<input type="password" value="" name="pass" id="pass" />
					
			<input type="submit" name="submit" value="Save" id="button_update" class="bt_update button_pass" />
			
			<p class="error_edit" id="errors"></p>
			<p class="success_edit" id="edit_success"></p>
		</form><!-- Form -->
		
	</div><!-- grid_Right -->
	
	<div class="grid_right">
		<span class="titleBar">
			Last Users &raquo; 
			<?php if( $this->countUser != 0 )
	{ ?>
			<a class="linkMin" href="<?php echo URL_BASE ?>admin/?id=users">Go to Users &raquo;</a>
			<?php }// ?>
		</span>
		
		<?php
	if( $this->countUser != 0 )
	{
		?>
		<div class="userRecent">
			<?php
			foreach( $this->users as $a )
		{
			 ?>
			 <a target="_blank" href="<?php echo URL_BASE.$a['username'] ?>" title="<?php echo stripslashes( $a['name'] )." @".$a['username'] ?>">
			<img src="<?php echo URL_BASE ?>public/avatar/<?php echo $a['avatar'] ?>" />
			</a>
			<?php } //<-- FOREACH ?>
		</div>
		<?php
	}//<--- IF != 0
	else 
		{
			?>
			<span class="no_result">
			No result
		</span>
			<?php
		}
	 ?>
	 
	</div><!-- grid_Right -->

	
</div><!-- End Content -->