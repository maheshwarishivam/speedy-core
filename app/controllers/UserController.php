<?php
class UserController extends BaseController{

	public function createHeaderss(){
		$header = array(
			'Content-Type: application/json',   
			'APIKey:62f7b668181f54c08191cf62a2373ff7',
			'AuthToken:396dbaa0de83aeb3971c6b6cdca35a0f'
		);
		return $header;
	} 
	
	/*userListAction function is used to get the list of the users*/
	public function indexAction() {
		//$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaderss();
		$url      = $this->api_url('courses?page=1&limit=100'); 
		$method   = 'GET';
		$result   = $user->getUserListing($url, $method, $headers); 
		
		$this->render('CourseListing', array('result'=>$result));
	}
	
	/*Function courseDelete is used to delete the course*/
	public function courseDeleteAction() {
		
		$id = $_GET['id'];
		
		$user     = new UserModel();
		$headers  = $this->createHeaderss();
		$url      = 'http://api.raccoon.dev.canbrand.in/course/status/'.$id.'/1';
		$method   = 'GET';
		$result   = $user->DeleteCourse($url, $method, $headers); 
		echo $this->ajaxLoad('', $result, $result['status'], true);
	}
	
	public function loadCourseAction(){
	
		$user     = new UserModel();
		$headers  = $this->createHeaderss();
		$url      = $this->api_url('courses?page=1&limit=100'); 
		$method   = 'GET';
		$result   = $user->getCourse($url, $method, $headers);
		//echo '<pre>'; print_r($result); die;
		echo $this->ajaxLoad('ajax_course', $result, $result['status'], true);
	}
    
}
?>