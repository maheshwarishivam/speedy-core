<h3>Course Listing</h3>
<table border="1">
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
<?php
	$courses = isset($result->data->courses)?$result->data->courses:'';
	//echo "<pre>"; print_r($courses); die;
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
		<td><a href="<?php echo $this->app_url('index.php/user/courseUpdate/').$row->id;?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php $this->app_url('gfhf');?>">Delete</a></td>
	</tr>
	<?php
	}
?>
</table>