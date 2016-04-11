<?php
class UserController extends BaseController{
	
	function addDetails(){
		$arr = array(
			'name' => 'Sandeep Sharma',
			'code' => 'racoon_745'
		);
		return $arr;
	}
	
	/*userListAction function is used to get the list of the users*/
	public function courseListAction() {
		$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = array();
		$cookies  = 'name=pram&phone=9876543210';
		$params   = '';
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses?page=1&count=10';
		$method   = 'GET';
		$result   = $user->getUserListing($url, $method, $headers, $cookies, $params); 
		$this->render('../app/views/CourseListing.php', array('result'=>$result));
	}
	
	/* Function to add the course list */
	public function courseAddAction() {
		$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
		$cookies  = '';
		
		$values   = array();
		$values['course_id'] = '745';
		$values['details'] = $this->addDetails();
		//$values['name'] = '';
		//$values['code'] = '';
		$values['version'] = '1.0';
		$values['image'] = '/pdf_result/Sandeep.jpg';
		$values['created_date'] = array('d1'=>'2016-03-30 00:00:00', 'd2'=>'2016-03-30 00:00:00');
		$values['categories'] = '1';
		$values['created_by'] = 'user name';
		$values['course_structure'] = '';
		$values['course_quiz'] = '';
		//echo "<pre>"; print_r($values); die;
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses';
		$method   = 'POST';
		$result   = $user->addCourse($url, $method, $headers, $cookies, $values); 
		$this->render('../app/views/CourseAdd.php', array('result'=>$result));
	}
	
	/*Function courseUpdate is used to update the course*/
	public function courseUpdateAction() {
		$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
		$cookies  = '';
		
		$values   = array();
		$values['course_id'] = '745';
		$values['name'] = 'Sandeep Sharma';
		$values['code'] = 'racoon_745';
		$values['version'] = '1.0';
		$values['image'] = '/pdf_result/Sandeep.jpg';
		$values['created_date'] = array('d1'=>'2016-03-30 00:00:00', 'd2'=>'2016-03-30 00:00:00');
		$values['categories'] = '1';
		$values['created_by'] = 'user name';
		$values['course_structure'] = '';
		$values['course_quiz'] = '';
		
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses/course_id';
		$method   = 'PUT';
		$result   = $user->updateCourse($url, $method, $headers, $cookies, $values); 
		$this->render('../app/views/CourseUpdate.php', array('result'=>$result));
	}
	
	/*Function courseDelete is used to delete the course*/
	public function courseDeleteAction() {
		$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
		$cookies  = '';
		$values   = '';
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/disablecourse/1';
		$method   = 'GET';
		$result   = $user->DeleteCourse($url, $method, $headers, $cookies, $values); 
		$this->render('../app/views/CourseDelete.php', array('result'=>$result));
	}
 
	public function createHeaders($apiKey, $authToken, $version){
		$header = array(
			'Content-Type: application/json',
			'Accept: */*',    
			'Authorization: APIKey="'.$apiKey.'",AuthToken="'.$authToken.'",CONFIG_VERSION="'.$version.'"',
		);
		return $header;
	}    
}
?>