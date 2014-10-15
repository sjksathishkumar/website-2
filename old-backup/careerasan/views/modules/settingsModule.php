<div class="containerForm">
	
	<form class="formAjax" action="" method="POST" id="formSettings">
	<!-- Grid Form  -->
	<div class="grid-form" style="padding-top: 15px;">
		<span id="checkusername"></span>
		<label>Username</label>
		<input type="text" data-username="<?php echo $this->infoSession->username ?>" name="username" id="username" value="<?php echo $this->infoSession->username ?>" />
	</div><!-- Grid Form  -->
		
		<!-- Grid Form  -->
	<div class="grid-form">
		<label>Email</label>
		<input type="text" data-email="<?php echo $this->infoSession->email ?>" name="email" id="email" value="<?php echo $this->infoSession->email ?>" />
	</div><!-- Grid Form  -->
	
	<!-- Grid Form  -->
	<div class="grid-form">
		<label>Account</label>
		<div class="select">
			<select name="mode" id="mode">
			<option class="mod_1" value="1">Public</option>
			<option class="mod_0" value="0">Private (only your followers have access)</option>
		</select>
		</div>
		
	</div><!-- Grid Form  -->
	
	<!-- Grid Form  -->
	<div class="grid-form bioGrid">
		<label>Country</label>
		<div class="select">
		<select name="country" id="country">
			<option class="xx" value="xx">Worldwide</option>
                <?php
                foreach ( $this->countries as $key ) 
                {
                    ?>
                    <option class="<?php echo $key['short']; ?>" value="<?php echo $key['short']; ?>"><?php echo $key['country']; ?></option>
                    <?php
                }
                 ?>
		</select>
		</div>
		
	</div><!-- Grid Form  -->
	<div class="error-update"></div>
	
	<div id="counter"></div>
	  <button id="editProfile" class="profile-settings-account" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Save</button>
	</form>
	
	<div class="delete-account"><a>Delete my account</a></div>
</div>
