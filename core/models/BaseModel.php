<?php 

abstract Class BaseModel {
    private $req;
    private $res;
    private $basePoPo;

    private $reqPoPo;
    private $resSuccessPoPo;
    private $resErrorPoPo;

	public function BaseModel() {
        $this->req = new SpeedyHttpRequest(); 
        $this->res = new SpeedyHttpResponse();
		
        $this->basePoPo = new BasePoPo(); ///----------------------------
		
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
        return $this->resSuccessPoPo;
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

    public function getReqPoPoJSON($body) {
        return $this->basePoPo->toJSON($body);
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

        }
    }

    private final function getCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();

        $headers[] = 'Cookie: ' . $cookies;
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
        $this->res->setBody($this->basePoPo->fromJSON($content));
        $this->res->setStatus($status);

     
        //echo "<pre>";echo "status code == ".$status;echo "<br><br>cookies ==";print_r($cookies);echo "<br><br>headers ==";echo $headers ;echo "<br><br>contents==";print_r(json_decode($content, true));
    }

    private final function postCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
		$params  = $this->req->getParams();
		
        $body = $this->getReqPoPoJSON($params);

        $headers[] = 'Cookie: ' . $cookies;

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
        $this->res->setBody($this->basePoPo->fromJSON($content));
        $this->res->setStatus($status);

    }

    private final function putCall(){
        $headers = $this->req->getHeaders();
        $url     = $this->req->getUrl(); 
        $cookies = $this->req->getCookies();
        $params  = $this->req->getParams();
		
		$body = $this->getReqPoPoJSON($params);
		
        $headers[] = 'Cookie: ' . $cookies;

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
        $this->res->setBody($this->basePoPo->fromJSON($content));
        $this->res->setStatus($status);
        
    }
    private final function deleteCall(){

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
}