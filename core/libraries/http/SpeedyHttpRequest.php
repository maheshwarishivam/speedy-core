<?php
class SpeedyHttpRequest extends SpeedyHttp{
	private $url = '';
	private $method = '';
	private $header = array();
	private $cookies = '';
	private $params = array();
	
	public final function setUrl($url){
		$this->url = $url;
	}

	public final function setHeaders($headers){
		$this->headers = $headers;
	}

	public final function setCookies($cookies){
		$this->cookies = $cookies;
	}

	public final function setMethod($method){
		$this->method  = $method;
	}

	public final function setParams($params){
		$this->params  = $params;
	}

	public final function getUrl(){
		return $this->url;
	}

	public final function getHeaders(){
		return $this->headers;
	}

	public final function getCookies(){
		return $this->cookies;
	}

	public final function getMethod(){
		return $this->method;
	}

	public final function getParams(){
		return $this->params;
	}
	
}
?>