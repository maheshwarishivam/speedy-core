<?php
class UserModel extends BaseModel{
	
	/*function getUserListing is used to get the listing of the students from the api*/
	public function getUserListing($url='',$method='', $headers=array()) {
	   
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		
		$this->call();
		
		return $this->getResParams();
	}
	
	/*function addCourse is used to the course using the racoon api*/
	public function addCourse($url='',$method='', $headers=array(), $cookies='', $values='') {

		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		
		$this->call();

		//GET Result of API Call
		return $this->getResParams();
	}
	
	/*function updateCourse is used to update the course using the raconn api*/
	public function updateCourse($url='',$method='', $headers=array(), $cookies='', $values='') {

		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		$this->setReqParams($values); 
		
		$result = $this->call();
		
		return $this->getResParams();
	}
	
	/*function deleteCourse is used to delete the course using the raconn api*/
	public function deleteCourse($url='',$method='', $headers=array()) {
		
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
	   
		$result = $this->call();
		
		return array('data' => $this->getResParams(), 'status' => $this->getResStatus());
	}
	
	public function getCourse($url='',$method='', $headers=array()) {
		
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
	   
		$result = $this->call();
		
		return array('data' => $this->getResParams(), 'status' => $this->getResStatus());
	}
}
?>