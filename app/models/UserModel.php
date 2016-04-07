<?php

    class UserModel extends BaseModel{
        
        /*function getUserListing is used to get the listing of the students from the api*/
        public function getUserListing($url='',$method='', $headers=array(), $cookies='', $params='') {
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
            $result = $this->call();
            return $result;
        }
        
        /*function addCourse is used to the course using the racoon api*/
        public function addCourse($url='',$method='', $headers=array(), $cookies='', $params='') {
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
            $result = $this->call();
            return $result;
        }
        
        /*function updateCourse is used to update the course using the raconn api*/
        public function updateCourse($url='',$method='', $headers=array(), $cookies='', $params='') {
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
            $result = $this->call();
            return $result;
        }
        
        /*function deleteCourse is used to delete the course using the raconn api*/
        public function deleteCourse($url='',$method='', $headers=array(), $cookies='', $params='') {
            $this->setReqUrl($url);
            $this->setReqMethod($method);
            $this->setReqHeaders($headers);
            $this->setReqCookies($cookies);
            $this->setReqParams($params);
            $result = $this->call();
            return $result;
        }
        
    }

?>