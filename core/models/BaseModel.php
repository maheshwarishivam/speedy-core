<?php 

abstract Class AbstractBaseModel {
	abstract function call();
}

Class BaseModel extends AbstractBaseModel{
    private $req;
    private $res;
    private $basepopo;

    private $reqPoPo;
    private $resSuccessPoPo;
    private $resErrorPoPo;

	public function BaseModel() {
        $this->req = new SpeedyHttpRequest(); 
        $this->res = new SpeedyHttpResponse();
        $this->basepopo = new BasePoPo();
    }
	
    /**
     * @return mixed
     */
    public function getReqPoPo()
    {
        return $this->reqPoPo;
    }

    /**
     * @param mixed $reqPoPo
     */
    public function setReqPoPo($reqPoPo) { 
        $this->reqPoPo = $reqPoPo;
    }

    /**
     * @return mixed
     */
    public function getResSuccessPoPo()
    {
        return $this->basepopo->fromJSON($this->resSuccessPoPo);
    }

    /**
     * @param mixed $resSuccessPoPo
     */
    public function setResSuccessPoPo($resSuccessPoPo)
    {
        $this->resSuccessPoPo = $resSuccessPoPo;
    }

    /**
     * @return mixed
     */
    public function getResErrorPoPo()
    {
        return $this->resErrorPoPo;
    }

    /**
     * @param mixed $resErrorPoPo
     */
    public function setResErrorPoPo($resErrorPoPo)
    {
        $this->resErrorPoPo = $resErrorPoPo;
    }

    public function getReqPoPoJSON() { 
        return $this->reqPoPo->toJSON($this->reqPoPo);
    }
	
	public function setReqUrl($url){
        $this->req->setUrl($url);
    }
    
    public function setReqHeaders($headers){
        $this->req->setHeaders($headers);
    }

    public function setReqCookies($cookies){
        $this->req->setCookies($cookies);
    }
    
    public function setReqMethod($method){
        $this->req->setMethod($method);
    }
    
    public function setReqParams($params){
        $this->req->setParams($params);
    }
	
	public function getResHeaders(){
        return $this->res->getHeaders();
    }
	
	public function getResCookies(){
        return $this->res->getCookies();
    }
    
    public function getResMethod(){
        return $this->res->getMethod();
    }
    
    public function getResParams(){
        return $this->res->getBody();
    }

    /* public function getReqUrl(){
        return $this->req->getUrl();
    }
    
    public function getReqHeaders(){
        return $this->req->getHeaders();
    }
    
    public function getReqCookies(){
        return $this->req->getCookies();
    }
    
    public function getReqMethod(){
        return $this->req->getMethod();
    }
    
    public function getReqParams(){
        return $this->req->getParams();
    } */
	
	
    public final function call(){
        
        $method = $this->req->getMethod();
        
        switch($method){
        case 'GET': 
            $this->getCall();	
			break;

        case 'POST': 
            $this->postCall();
			break;

        case 'PUT': 
            $this->putCall();
			break;

        case 'DELETE': 
			$this->deleteCall();
			break;

        }
    }

    private final function getCall(){ 
		
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();

		//$headers = $this->login(); //----------------------- for lifetime login
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
        
        if ($http_result === false) {
            $http_result = '{"error" : "1", "msg": "' . $err_num."--".$err_msg . '"}';
        }else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
        }
        
        list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
        //$this->res->setBody($content);
		$this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        //$this->res->setBody($this->resSuccessPoPo->fromJSON($content));
        $this->res->setStatus($status);
		
		//echo "<pre>"; print_r(json_decode($content)); die;
    }

    private final function postCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
		//$params  = $this->req->getParams();
		
        $body = $this->getReqPoPoJSON();
		
		//$headers = $this->login(); //----------------------- for lifetime login
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
        
        if ($http_result === false) {
            //TODO: Handle errors
            $http_result = '{"error" : "1", "msg": "' . $err_num."--".$err_msg . '"}';
        }else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
        }
        
        list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
//		$this->res->setBody($content);
        $this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
		
    }

    private final function putCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
        //$params  = $this->req->getParams();
		
		$body = $this->getReqPoPoJSON();
		
		//$headers = $this->login(); //----------------------- for lifetime login
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
        
        if ($http_result === false) {
            $http_result = '{"error" : "1", "msg": "' . $err_num."--".$err_msg . '"}';
        }else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
        }
        
        list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
        //$this->res->setBody($content);
        //$this->res->setBody($this->resSuccessPoPo->fromJSON($content));
		$this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
        
    }
    private final function deleteCall(){
		
		$headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
        //$params  = $this->req->getParams();
		
		$body = $this->getReqPoPoJSON();
		
		//$headers = $this->login(); //----------------------- for lifetime login
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
        
        if ($http_result === false) {
            $http_result = '{"error" : "1", "msg": "' . $err_num."--".$err_msg . '"}';
        }else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
        }
        
        list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
        //$this->res->setBody($content);
        //$this->res->setBody($this->resSuccessPoPo->fromJSON($content));
		$this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
	} 
	
	
	// Login for lifetime 
	public function login(){
		
		$url = "http://api.raccoon.dev.canbrand.in/adminlogin";
		$headers = array(
			'Content-Type: application/json',
			'APIKey: 62f7b668181f54c08191cf62a2373ff7'
		);
		
		$body = '{
			"username": "mahesh@canbrand.in",
			"password": "12345"
		}';
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
		list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
		
		$list = explode("\n", $headers);
		
		$token = explode(':', $list[4]);
		
		$data = 'APIKey: 62f7b668181f54c08191cf62a2373ff7 <br/>'.$list[4];
		//echo "<pre>"; print_r($data); die;
		return $data;
	}
}