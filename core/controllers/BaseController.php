<?php

abstract class AbstractBaseController {
	abstract function render($file, $variables = array());
	abstract function model($file);
}

class BaseController extends AbstractBaseController {
	
	function BaseController(){
		
	}
    
	/* This function is used as the default action if action is not provided by the user */
    public function indexAction(){
        
    }
    
    /*This render function is used to render the view of application*/
    final public function render($file, $variables = array()){
       
		
        extract($variables);
        ob_start();
        require '../app/views/'.$file.'.php';
        $renderedView = ob_get_clean();
        echo $renderedView;
    }
    
    final public function model($file) {
        $path = '../'.APPPATH.'/models/'.$file.'.php';

        require $path;
    }
	
	final public function createHeaders($apiKey = '', $authToken = ''){
		$header = array(
			'Content-Type: application/json',   
			'APIKey:'.$apiKey,
			'AuthToken:'.$authToken
		);
		return $header;
	}
	
	final public function app_url($other = ''){
		
		if( $other != '' && $other != '/'){
			$url = 'http://'.HTTP_HOST.'/';
			
			if(INDEX_PAGE != ''){
				$url .= INDEX_PAGE.'/';
			}
			
			$url .= $other;
			
		} else {
			$url = 'http://'.HTTP_HOST;
			
			if(INDEX_PAGE != ''){
				$url .= '/'.INDEX_PAGE;
			}
		}
		
		echo $url;
	}
	
	final public function api_url($other = ''){
		
		return API_URL.$other;
		
	}
	
	final public function segment($id = ''){
		
		$request_url = explode('/', REQUEST_URI);
		
		if(INDEX_PAGE != '' && INDEX_PAGE != '/' ){
			$search_index = INDEX_PAGE;
		} else {
			$search_index = 'index.php';
		}
		
		$row = array_search($search_index, $request_url);
		$i = 0;
		while( $i <= $row ){
			array_shift($request_url);
			$i++;
		}
		
		if( count( $request_url ) <= $id ){
			return '';
		} else {
			return $request_url[$id];
		}
	}
	
	function redirect($url = '/'){
		
		$main_url = 'http://'.HTTP_HOST.'/index.php/'.$url;
		header("Location: ".$main_url);
		
	}
	
	final public function assets_link($link){
		$url_assets = 'http://'.HTTP_HOST.'/assets/'.$link;
		return $url_assets;
	}
	
	function ajaxLoad( $file = '', $variables = array(), $status = 200, $json = false ){
		
		if( $file != '' ) {
			extract($variables);
			ob_start();
			require '../app/views/'.$file.'.php';
			$renderedView = ob_get_clean();
		} else {
			$renderedView = $variables;
		}
	
		if( $status == 200 ){
			
			$result = array(
				'data' => $renderedView,
				'status' => 'success'
			);
			
		} else if( $status == 400){
			
			$msg = $GLOBALS['config']['CAD_ERROR_400'];
			
			if( is_array( $variables['data']->error ) ){
				$msg = '';
				foreach( $variables['data']->error as $row ){
					foreach($row->messages as $rowm){
						$msg .= $rowm.'<br/>';
					}
				}
			} else {
				$msg = $variables['data']->error;
			}
			
			$result = array(
				'messages' => $msg,
				'data' => $renderedView,
				'status' => 'error'
			);
			
		} else if( $status == 500 ){
			
			$result = array(
				'messages' => $GLOBALS['config']['CAD_ERROR_500_0'],
				'data' => $renderedView,
				'status' => 'error'
			);
			
		} else if( $status == 408 ){
			
			$result = array(
				'messages' => $GLOBALS['config']['CAD_ERROR_500_0'],
				'data' => $renderedView,
				'status' => 'error'
			);
			
		} else {
			
			$result = array(
				'messages' => $GLOBALS['config']['CAD_ERROR_OTHER'],
				'data' => $renderedView,
				'status' => 'error'
			);
			
		}
		
		if( $json == false ){
			
			return $result;
			
		} else {
			
			return json_encode( $result );
			
		}
	}
	
	final public function error_400( $file = '', $variables = array() ){
		
		extract($variables);
        ob_start();
        require '../core/views/400_page.php';
        $renderedView = ob_get_clean();
        echo $renderedView;
		
	}
}
?>