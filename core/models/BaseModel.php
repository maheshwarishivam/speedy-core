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
		$this->basepopo->setBasePopo($this->req->getParams());
        return $this->basepopo->toJSON();
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
	
    public function getResStatus(){
        return $this->res->getStatus();
    }
	
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

        case 'UPLOADFILE': 
			$this->uploadFileCall();
			break;

        } 
		//die('d');
		if( $this->getResStatus() == 401 ){ 
			
			if(count($_SESSION) > 0)
				session_destroy();
			
			echo '<script> function fun(){ location.href="http://' . HTTP_HOST . '"; } fun();</script>';

		} 
		
    }

    private final function getCall(){ 
		
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();

		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        $http_result = curl_exec($ch);
       	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err_msg = curl_error($ch);
        $err_num = curl_errno($ch);
        curl_close($ch);
       
		if ($http_result === false ) {
			
            $content = '{"error" : "1", "messages": "' . $err_num."--".$err_msg . '"}';
			
        } else { 
			
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
			
			list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
		
        }
		
		$this->res->setHeaders($headers);
		$this->res->setCookies($cookies);
		$this->setResSuccessPoPo($content); 
		$this->res->setBody($this->getResSuccessPoPo());
		$this->res->setStatus($status);
    }

    private final function postCall(){
        $headers = $this->req->getHeaders();
		$url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
		
        $body = $this->getReqPoPoJSON();
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
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
            $content = '{"error" : "1", "messages": "' . $err_num."--".$err_msg . '"}';
        } else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
			
			list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        
        }
		
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
		//$this->res->setBody($content);
        $this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
		
    }

    private final function putCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
        
		$body = $this->getReqPoPoJSON();
		
		if(!empty( $cookies ) ){
			$headers[] = 'Cookie: ' . $cookies;
		}
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
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
            $content = '{"error" : "1", "messages": "' . $err_num."--".$err_msg . '"}';
        } else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
			list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        }
		
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
       
		$body = $this->getReqPoPoJSON();
		
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
            $content = '{"error" : "1", "messages": "' . $err_num."--".$err_msg . '"}';
        } else {
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $http_result, $matches);
            $cookies = array();
            
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }
			list($headers, $content) = explode("\r\n\r\n", $http_result, 2);
        }
        
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
        //$this->res->setBody($content);
        //$this->res->setBody($this->resSuccessPoPo->fromJSON($content));
		$this->setResSuccessPoPo($content); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
	} 
	
    private final function uploadFileCall(){
		
		$headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
       
		$body = json_decode($this->getReqPoPoJSON());
		
		if(!empty( $cookies )) {
			$headers[] = 'Cookie: ' . $cookies;
		}
		
		$imgdata[$body->file->colum_name] = new CurlFile($body->file->tmp_name, 'file/exgpd', $body->file->name);
		
		if( isset( $body->data ) ){
			foreach($body->data as $key => $value){
				$imgdata[$key] = $value;
			}
		}
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
		curl_setopt($curl, CURLOPT_FAILONERROR, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($curl, CURLOPT_POST, true); // enable posting
		curl_setopt($curl, CURLOPT_POSTFIELDS, $imgdata); // post images 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
		$http_result = curl_exec($curl); 
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		
        $this->res->setHeaders($headers);
        $this->res->setCookies($cookies);
        //$this->res->setBody($content);
        //$this->res->setBody($this->resSuccessPoPo->fromJSON($content));
		$this->setResSuccessPoPo($http_result); 
        $this->res->setBody($this->getResSuccessPoPo());
        $this->res->setStatus($status);
	} 
	
	
}

