<div class="containerForm">

<div class="container-forms">
	
	<!-- AVATAR -->
	<form action="<?php echo URL_BASE; ?>public/ajax/uploadAvatar.php" method="POST" id="formAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
		<label class="titleLabel">Upload Avatar - Max 5MB</label>
		<!-- Grid Form  -->
	<div class="grid-form">
		<label class="labelAvatar" style="background-image: url(<?php echo URL_BASE."public/avatar/".$this->infoSession->avatar; ?>)">
			<?php if( $this->infoSession->avatar != 'avatar.png' ): ?>
			<div class="deletePhoto" data="<?php echo $this->infoSession->avatar; ?>" style="background: none; cursor: pointer;" title="Delete Image" id="loader_gif"></div>
			<?php endif; ?>
			</label>
		<input type="file" name="photo" class="typeFile" id="uploadAvatar" accept="image/*" />
	</div><!-- Grid Form  -->
	</form>
	
	<!-- COVER -->
	<form action="<?php echo URL_BASE; ?>public/ajax/upload_cover.php" method="POST" id="formCover"  accept-charset="UTF-8" enctype="multipart/form-data">
		<label class="titleLabel" style="text-align: left;">Upload Cover - Max 5MB - 860x260</label>
		<!-- Grid Form  -->
	<div class="grid-form" style="width: 58%;">
		<label class="label_cover" style="display: block; float: left; margin-right: 0;">
			<?php 
			if( $this->infoSession->cover_image != '' ):
				$cover = 'background-image: url('.URL_BASE.'thumb_fixed/62-62-public/cover/'.$this->infoSession->cover_image.');';
				endif;
				?>
				<?php if( $this->infoSession->cover_image != '' ): ?>
			<div class="deleteCover" data="<?php echo $this->infoSession->cover_image; ?>" style="background: none; cursor: pointer;" title="Delete Image" id="loader_gif_2"></div>
			<?php endif; ?>
			<div id="coverUser" style="-webkit-border-radius: 5px; border-radius: 5px; width: 62px; height: 62px; float: left; background-color: #000; <?php echo $cover; ?>"></div>
			
			</label>
		<input type="file" name="photo" class="typeFile" id="uploadCover" accept="image/*" />
	</div><!-- Grid Form  -->
	</form>
	
</div><!-- container-forms -->	
	
	
	
	<form class="formAjax" action="" method="POST" id="formSettings">
	<!-- Grid Form  -->
	<div class="grid-form">
		<label>Name</label>
		<input type="text" name="name" id="nameEdit" value="<?php echo stripslashes( $this->infoSession->name ) ?>" />
	</div><!-- Grid Form  -->
		
		<!-- Grid Form  -->
	<div class="grid-form">
		<label>Location</label>
		<input type="text" name="location" value="<?php echo stripslashes( $this->infoSession->location ) ?>" />
	</div><!-- Grid Form  -->
	
	<!-- Grid Form  -->
	<div class="grid-form">
		<label>Website</label>
		<input type="text" name="website" value="<?php echo $this->infoSession->website ?>" />
	</div><!-- Grid Form  -->
	
	<!-- Grid Form  -->
	<div class="grid-form bioGrid">
		<label>Bio</label>
		<textarea name="bio" id="bio"><?php echo stripslashes( $this->infoSession->bio ) ?></textarea>
	</div><!-- Grid Form  -->
	
	<div id="counter"></div>
	  <button id="editProfile" class="profile-settings" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Save</button>
	</form>
</div>
