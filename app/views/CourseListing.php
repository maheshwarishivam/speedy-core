<div class="load"></div>
<h3>Course Listing</h3>
<table border="1" id="course_list">
	<tr>
		<th>ID</th>
		<th>name</th>
		<th>code</th>
		<th>version</th>
		<th>image</th>
		<th>modified_at</th>
		<th>users</th>
		<th>groups</th>
		<th>Action</th>
	</tr>
	<tbody >
	<?php
		$courses = isset($result->data->courses)?$result->data->courses:'';
		foreach($courses as $row){
		?>
		<tr>
			<td><?php echo $row->id;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->code;?></td>
			<td><?php echo $row->version;?></td>
			<td><img src="<?php echo $row->image->thumbnail;?>" /></td>
			<td><?php echo $row->modified_at;?></td>
			<td><?php echo $row->users;?></td>
			<td><?php echo $row->groups;?></td>
			<td><a id="edit" href="<?php echo $this->app_url('user/courseUpdate/'.$row->id);?>" data-edit_id="<?php echo $row->id;?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="#" data-delete_id="<?php echo $row->id;?>" id="delete">Delete</a></td>
		</tr>
		<?php
		}
	?>
	</tbody>
</table>
<input type="hidden" id="base_url" value="<?php echo $this->app_url();?>/" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script> 
$(document).on('click', '#delete', function(e){

	var id = $(this).data('delete_id');
	var url = $('#base_url').val() + "user/coursedelete";
	
	$.ajax({
		url:url,
		data:{id:id},
		method:'GET',
		success:function(result){
			var obj = JSON.parse(result);
			$('.load').html(obj.data.data.message);
			
			if(obj.status == 'success'){
				var url = $('#base_url').val() + "user/loadcourse";
	
				$.ajax({
					url:url,
					method:'GET',
					success:function(result){
						var obj = JSON.parse(result);
					
						$('#course_list').html(obj.data);
					}
				});
			}
		}
	});

});
	
</script>