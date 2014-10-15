<div class="content">
	
	<span class="titleBar">
			Users (<?php echo $this->countUserGrid ?>) &raquo;
		</span>
	<table cellpadding="0" cellspacing="0" border="0" class="dTable">
                <thead>
                <tr>
                	<th><span class="sorting" style="display: block;"></span># ID</th>
                	<th>Name</th>
		            <th>Username</th>
		            <th>Date</th>
		            <th>Email</th>
		            <th>Type account</th>
		            <th>Status</th>
		            <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                	 	<?php
               	foreach ( $this->usersGrid as $key )
               	{
               		if( $key['type_account'] == 0 )
					{
						$chk2 = null;
						$chk = 'checked="checked"';
					}
					else {
						$chk  = null;
						$chk2 = 'checked="checked"';
					}
				?>
               <tr>
              
				<td><?php echo $key['id'] ?></td>
				<td><?php echo stripslashes( $key['name'] ) ?></td>
				<td><a target="_blank" href="<?php echo URL_BASE.$key['username'] ?>"><?php echo $key['username'] ?></a></td>
				<td><?php echo date( 'Y/m/d',strtotime(  $key['date'] ) ) ?></td>
				<td><?php echo $key['email'] ?></td>
				<td>
					<?php if( $key['status'] != 'delete' ): ?>
					Normal
					<input class="radioAccount" data-id="<?php echo $key['id'] ?>" type="radio" value="0" <?php echo $chk; ?> name="chk_account_<?php echo $key['id'] ?>" />
					Verified
					<input class="radioAccount" data-id="<?php echo $key['id'] ?>"  type="radio" value="1" <?php echo $chk2; ?> name="chk_account_<?php echo $key['id'] ?>" />
					<?php
					else :
						?>
						--------------------------------
						<?php
					 endif; ?>
				</td>		
				<td class="statusTd"><?php echo ucfirst( $key['status'] ) ?></td>
				 <td>
				 	<?php if( $key['status'] != 'delete' && $key['status'] == 'active'  ): ?>
               	 	<a data-id="<?php echo $key['id'] ?>" class="icons suspended" title="Suspended">suspended</a>
               	 	<a id="delete" data-id="<?php echo $key['id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 	<?php if( $key['status'] != 'delete' && $key['status'] == 'suspended'  ): ?>
               	 	<a data-id="<?php echo $key['id'] ?>" class="icons active" title="Activate">Activate</a>
               	 	<a data-id="<?php echo $key['id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 	<?php if( $key['status'] != 'delete' && $key['status'] == 'pending'  ): ?>
               	 	<a data-id="<?php echo $key['id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 </td>  
                	</tr>
                	
                	       <?php	   
				}
               	 ?>  
               	     
                	</tbody>
                </table> 

	
</div><!-- End Content -->