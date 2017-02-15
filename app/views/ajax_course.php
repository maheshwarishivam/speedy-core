<?php if(count($data->data->courses) > 0){ ?>
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
	<?php foreach($data->data->courses as $row){ ?>
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
	<?php } ?>
<?php
} else {
	echo "Record not found.";
}
?>