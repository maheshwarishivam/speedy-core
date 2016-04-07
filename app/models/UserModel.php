<?php

    class UserModel extends BaseModel{
        
        /*function getUserListing is used to get the listing of the students from the api*/
        public function getUserListing($url='',$method='', $headers=array(), $cookies='', $params='') {
           /*  
			$userPoPo = new UserPoPo();
            $userPoPo->setId(1);
            $userPoPo->setName("Shivam");
			
            $userListPoPo = new UserListPoPo(); */
			
			$this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
			/* $this->setReqPoPo($userPoPo);
            $this->setResSuccessPoPo($userListPoPo); */
            $this->call();
			
			return $this->getResParams();
        }
        
        /*function addCourse is used to the course using the racoon api*/
        public function addCourse($url='',$method='', $headers=array(), $cookies='', $params='') {

            $userPoPo = new UserPoPo();
            $userPoPo->setId(1);
            $userPoPo->setName("Shivam");

            $userAddPoPo = new UserAddPoPo();

            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
            $this->setReqPoPo($userPoPo);
            $this->setResSuccessPoPo($userAddPoPo);
			//$this->setReqPoPo($userPoPo);

            $this->call();

            //GET Result of API Call
            return $this->getResParams();
        }
        
        /*function updateCourse is used to update the course using the raconn api*/
        public function updateCourse($url='',$method='', $headers=array(), $cookies='', $params='') {
			
			/* $userPoPo = new UserPoPo();
            $userPoPo->setId(1);
            $userPoPo->setName("Shivam");

            $userUpdatePoPo = new UserUpdatePoPo(); */
			
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
          /*   $this->setReqPoPo($userPoPo);
            $this->setResSuccessPoPo($userUpdatePoPo); */
			
            $result = $this->call();
			
            return $this->getResParams();
        }
        
        /*function deleteCourse is used to delete the course using the raconn api*/
        public function deleteCourse($url='',$method='', $headers=array(), $cookies='', $params='') {
			
			/* $userPoPo = new UserPoPo();
            $userPoPo->setId(1);
            $userPoPo->setName("Shivam");

            $userDeletePoPo = new UserDeletePoPo(); */
			
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
           /*  $this->setReqPoPo($userPoPo);
            $this->setResSuccessPoPo($userDeletePoPo); */
			
            $result = $this->call();
            
			return $this->getResParams();
        }
        
    }

?>