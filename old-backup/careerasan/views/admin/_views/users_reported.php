<div class="content">
	
	<span class="titleBar">
			Users reported &raquo;
		</span>
	<table cellpadding="0" cellspacing="0" border="0" class="dTable">
                <thead>
                <tr>
                	<th><span class="sorting" style="display: block;"></span># ID</th>
                	<th>Report By</th>
		            <th>User reported</th>
		            <th>Date</th>
		            <th>Email</th>
		            <th>Status</th>
		            <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                	 	<?php
               	foreach ( $this->usersReported as $key )
               	{
               		
				?>
               <tr>
              
				<td><?php echo $key['report_id'] ?></td>
				<td><a target="_blank" href="<?php echo URL_BASE.$key['username'] ?>"><?php echo stripslashes( $key['name'] ) ?></a></td>
				<td><a target="_blank" href="<?php echo URL_BASE.$key['r_username'] ?>"><?php echo stripslashes( $key['r_name'] ) ?></a></td>
				<td><?php echo date( 'Y/m/d',strtotime(  $key['date'] ) ) ?></td>
				<td><?php echo $key['r_email'] ?></td>
		
				<td class="statusTd"><?php echo ucfirst( $key['r_status'] ) ?></td>
				 <td>
				 	<?php if( $key['r_status'] != 'delete' && $key['r_status'] == 'active'  ): ?>
               	 	<a data-id="<?php echo $key['r_id'] ?>" class="icons suspended" title="Suspended">suspended</a>
               	 	<a id="delete" data-id="<?php echo $key['r_id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 	<?php if( $key['r_status'] != 'delete' && $key['r_status'] == 'suspended'  ): ?>
               	 	<a data-id="<?php echo $key['r_id'] ?>" class="icons active" title="Activate">Activate</a>
               	 	<a data-id="<?php echo $key['r_id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 	<?php if( $key['r_status'] != 'delete' && $key['status'] == 'pending'  ): ?>
               	 	<a data-id="<?php echo $key['r_id'] ?>" class="icons delete" title="Delete">Delet</a>
               	 	<?php endif; ?>
               	 	
               	 </td>  
                	</tr>
                	
                	       <?php	   
				}
               	 ?>  
               	     
                	</tbody>
                </table> 

	
</div><!-- End Content -->