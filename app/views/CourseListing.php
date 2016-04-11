<h3>Course Listing</h3>
<?php
$courses = isset($result->data->courses)?$result->data->courses:'';
if(!empty($courses)){
	foreach($courses AS $c){
		$courseId      = isset($c->id)?$c->id:'';
		$courseName    = isset($c->name)?$c->name:'';
		$courseCode    = isset($c->code)?$c->code:'';
		$courseVersion = isset($c->version)?$c->version:'';
		$thumbImage    = isset($c->images->thumbnail)?$c->images->thumbnail:'';
		$largeImage    = isset($c->images->large)?$c->images->large:"";
		$createdAt     = isset($c->created_at)?$c->created_at:'';
		$modifiedAt    = isset($c->modified_at)?$c->modified_at:'';
		$users         = isset($c->users)?$c->users:'';
		$slides        = isset($c->slides)?$c->slides:'';
		$groups        = isset($c->groups)?$c->groups:'';
		
		?>
		<h5>Course Id : <?php echo $courseId?></h5>
		<h5>Course Name : <?php echo $courseName?></h5>
		<h5>Course Code : <?php echo $courseCode?></h5>
		<h5>Course Version : <?php echo $courseVersion?></h5>
		<h5>Course Image : <?php echo $largeImage?></h5>
		<h5>Course Users : <?php echo $users?></h5>
		<h5>Course slides : <?php echo $slides?></h5>
		<h5>Course Groups : <?php echo $groups?></h5>
		<?php            
		echo '********************************************************';
	}
}
    
?>