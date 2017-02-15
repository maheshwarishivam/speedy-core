
<?php
class SpeedyHttpResponse extends SpeedyHttp{

    private $headers = array();
    private $cookies = '';
    private $body = array();
    private $status = '';

    public final function setHeaders($headers){
        $this->headers = $headers;
    }

    public final function setCookies($cookies){
        $this->cookies = $cookies;
    }

    public final function setBody($body){
        $this->body  = $body;
    }

    public final function setStatus($status){
        $this->status = $status;
    }

    public final function getHeaders(){
		
		$headers_arr = array();
		
		if( !is_array($this->headers)){

			foreach (explode("\r\n", $this->headers) as $i => $line) {
				if ($i === 0)
					$headers_arr['http_code'] = $line;
				else
				{
					list ($key, $value) = explode(': ', $line);

					$headers_arr[$key] = $value;
				}
			}
			return $headers_arr;
		}
		
		return $this->headers;
    }

    public final function getCookies(){
        return $this->cookies;
    }

    public final function getBody(){
        return $this->body;
    }

    public final function getStatus(){
		return $this->status;
    }
}
?>