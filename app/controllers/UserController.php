<?php
    class UserController extends BaseController{
        
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
            $result   = json_decode($result, true);
            echo $this->render('../app/views/CourseListing.php', array('result'=>$result));
            
        }
        
        /*Function to add the course list*/
        public function courseAddAction() {
            $this->model('UserModel');
            
            $user     = new UserModel();
            $headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
            $cookies  = '';
            $params   = '{"data":[{"course_id":"745","name":"Sandeep Sharma","code":"racoon_745","version":"1.0","image":"/pdf_result/Sandeep Full Body Test Blood56e3a83813b7a.jpg","created_date":"2016-03-30 00:00:00","modified_date":"2016-03-30 00:00:00","categories":1,"created_by":"user name","course_structure":"","course_quiz":""}]}';
            $url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses';
            $method   = 'POST';
            $result   = $user->addCourse($url, $method, $headers, $cookies, $params); 
            //$result   = json_decode($result, true);
            echo $this->render('../app/views/CourseAdd.php', array('result'=>$result));
        }
        
        /*Function courseUpdate is used to update the course*/
        public function courseUpdateAction() {
            $this->model('UserModel');
            
            $user     = new UserModel();
            $headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
            $cookies  = '';
            $params   = '{"data":{"course_id":745,"name":"DOT.NET","code":"racoon_745","version":"1.0","image":"images/php_3813b7a.jpg","created_at":"2016-03-30 15:30:00","modified_at":"2016-03-30 18:00:00","categories":1,"created_by":"admin","report_pdf":"report_151745.pdf","course_structure":"","course_quiz":""}}';
            $url      = 'http://private-38899-racoonelearning.apiary-mock.com/courses/course_id';
            $method   = 'PUT';
            $result   = $user->updateCourse($url, $method, $headers, $cookies, $params); 
            //$result   = json_decode($result, true);
            echo $this->render('../app/views/CourseUpdate.php', array('result'=>$result));
        }
        
        /*Function courseDelete is used to delete the course*/
        public function courseDeleteAction() {
            $this->model('UserModel');
            
            $user     = new UserModel();
            $headers  = $this->createHeaders(Config::API_KEY, Config::AUTH_TOKEN, Config::CONFIG_VERSION);
            $cookies  = '';
            $params   = '';
            $url      = 'http://private-38899-racoonelearning.apiary-mock.com/disablecourse/1';
            $method   = 'GET';
            $result   = $user->DeleteCourse($url, $method, $headers, $cookies, $params); 
            $result   = json_decode($result, true);
            echo $this->render('../app/views/CourseDelete.php', array('result'=>$result));
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