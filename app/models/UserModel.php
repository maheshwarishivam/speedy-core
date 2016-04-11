<?php
class UserModel extends BaseModel{
	
	/*function getUserListing is used to get the listing of the students from the api*/
	public function getUserListing($url='',$method='', $headers=array(), $cookies='', $params='') {
	   
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		$this->setReqParams($params);
		
		$this->call();
		
		return $this->getResParams();
	}
	
	/*function addCourse is used to the course using the racoon api*/
	public function addCourse($url='',$method='', $headers=array(), $cookies='', $values='') {

		$basePoPo = new BasePoPo($values);
		
		/* 
		$userPoPo = new UserPoPo();
		
		if(!empty($values) && isset($values)){
			$courseId    	 = isset($values['course_id'])?$values['course_id']:'';
			$code            = isset($values['code'])?$values['code']:'';
			$name            = isset($values['name'])?$values['name']:'';
			$version         = isset($values['version'])?$values['version']:'';
			$image           = isset($values['image'])?$values['image']:'';
			$createdDate     = isset($values['created_date'])?$values['created_date']:'';
			$modifiedDate    = isset($values['modified_date'])?$values['modified_date']:'';
			$categories      = isset($values['categories'])?$values['categories']:'';
			$createdBy       = isset($values['created_by'])?$values['created_by']:'';
			$courseStructure = isset($values['course_structure'])?$values['course_structure']:'';
			$courseQuiz      = isset($values['course_quiz'])?$values['course_quiz']:'';
			
			$userPoPo->setDetails($values['details']);
			$userPoPo->setId($courseId);
			//$userPoPo->setName($name);
			
			//$userPoPo->setCode($code);
			$userPoPo->setVersion($version);
			$userPoPo->setImage($image);
			$userPoPo->setCreatedDate($createdDate);
			$userPoPo->setModifiedDate($modifiedDate);
			$userPoPo->setCategories($categories);
			$userPoPo->setCreatedBy($createdBy);
			$userPoPo->setCourseStructure($courseStructure);
			$userPoPo->setCourseQuiz($courseQuiz);
		} 
		
		$this->setReqPoPo($userPoPo);
		
		*/

		$this->setReqPoPo($basePoPo);
		
		//$userAddPoPo = new UserAddPoPo();

		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		//$this->setReqParams($values); Now values which we get from view would be saved in PoPo
		
		//$this->setResSuccessPoPo($userAddPoPo);
		
		$this->call();

		//GET Result of API Call
		return $this->getResParams();
	}
	
	/*function updateCourse is used to update the course using the raconn api*/
	public function updateCourse($url='',$method='', $headers=array(), $cookies='', $values='') {
		
		$basePoPo = new BasePoPo($values);
		/* 
		$userPoPo = new UserPoPo();
		
		if(!empty($values) && isset($values)){
			$courseId    	 = isset($values['course_id'])?$values['course_id']:'';
			$code            = isset($values['code'])?$values['code']:'';
			$name            = isset($values['name'])?$values['name']:'';
			$version         = isset($values['version'])?$values['version']:'';
			$image           = isset($values['image'])?$values['image']:'';
			$createdDate     = isset($values['created_date'])?$values['created_date']:'';
			$modifiedDate    = isset($values['modified_date'])?$values['modified_date']:'';
			$categories      = isset($values['categories'])?$values['categories']:'';
			$createdBy       = isset($values['created_by'])?$values['created_by']:'';
			$courseStructure = isset($values['course_structure'])?$values['course_structure']:'';
			$courseQuiz      = isset($values['course_quiz'])?$values['course_quiz']:'';
			
			$userPoPo->setId($courseId);
			$userPoPo->setName($name);
			
			$userPoPo->setCode($code);
			$userPoPo->setVersion($version);
			$userPoPo->setImage($image);
			$userPoPo->setCreatedDate($createdDate);
			$userPoPo->setModifiedDate($modifiedDate);
			$userPoPo->setCategories($categories);
			$userPoPo->setCreatedBy($createdBy);
			$userPoPo->setCourseStructure($courseStructure);
			$userPoPo->setCourseQuiz($courseQuiz);
		}

		$userUpdatePoPo = new UserUpdatePoPo();  */
		
		//$baseUpdatePoPo = new UserUpdatePoPo();
		
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		$this->setReqParams($values);
		
		$this->setReqPoPo($basePoPo);
		//$this->setResSuccessPoPo($baseUpdatePoPo); 
		
		$result = $this->call();
		
		return $this->getResParams();
	}
	
	/*function deleteCourse is used to delete the course using the raconn api*/
	public function deleteCourse($url='',$method='', $headers=array(), $cookies='', $values='') {
		
		$this->setReqUrl($url);
		$this->setReqMethod($method);
		$this->setReqHeaders($headers);
		$this->setReqCookies($cookies);
		$this->setReqParams($values);
	   
		$result = $this->call();
		
		return $this->getResParams();
	}
}
?>