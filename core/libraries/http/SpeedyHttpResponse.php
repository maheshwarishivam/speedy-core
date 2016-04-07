
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