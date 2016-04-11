<?php
class UserController extends BaseController{

	public function createHeaders($apiKey, $authToken, $version){
		$header = array(
			'Content-Type: application/json',   
			'APIKey:'.$apiKey,
			'AuthToken:'.$authToken
		);
		return $header;
	} 
	
	/*userListAction function is used to get the list of the users*/
	public function courseListAction() {
		//$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(API_KEY, AUTH_TOKEN, CONFIG_VERSION);
		$cookies  = '';
		$params   = '';
		$url      = 'http://api.raccoon.dev.canbrand.in/courses?page=1&limit=10';
		$method   = 'GET';
		$result   = $user->getUserListing($url, $method, $headers, $cookies, $params); 
		$this->render('CourseListing', array('result'=>$result));
	}
	
	/* Function to add the course list */
	public function courseAddAction() {
		//$this->model('');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(API_KEY, AUTH_TOKEN, CONFIG_VERSION);
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
		//echo "<pre>"; print_r($values); die;
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses';
		$method   = 'POST';
		$result   = $user->addCourse($url, $method, $headers, $cookies, $values); 
		$this->render('CourseAdd', array('result'=>$result));
	}
	
	/*Function courseUpdate is used to update the course*/
	public function courseUpdateAction() {
		//$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(API_KEY, AUTH_TOKEN, CONFIG_VERSION);
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
		$this->render('CourseUpdate', array('result'=>$result));
	}
	
	/*Function courseDelete is used to delete the course*/
	public function courseDeleteAction() {
		//$this->model('UserModel');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(API_KEY, AUTH_TOKEN, CONFIG_VERSION);
		$cookies  = '';
		$values   = '';
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/disablecourse/1';
		$method   = 'GET';
		$result   = $user->DeleteCourse($url, $method, $headers, $cookies, $values); 
		$this->render('CourseDelete', array('result'=>$result));
	}
	
	/* Function to add the course list */
	/* public function courseAddAction() {
		//$this->model('');
		
		$user     = new UserModel();
		$headers  = $this->createHeaders(API_KEY, AUTH_TOKEN, CONFIG_VERSION);
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
		//echo "<pre>"; print_r($values); die;
		$url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses';
		$method   = 'POST';
		$result   = $user->addCourse($url, $method, $headers, $cookies, $values); 
		$this->render('CourseAdd', array('result'=>$result));
	} */
    
}
?>