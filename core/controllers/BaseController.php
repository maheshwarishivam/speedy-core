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
        include '../app/views/'.$file.'.php';
        $renderedView = ob_get_clean();
        echo $renderedView;
    }
    
    function model($file) {
        $path = '../'.APPPATH.'/models/'.$file.'.php';

        require $path;
    }
	
	function app_url($other = ''){
		
		if( $other != '' && $other != '/'){
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$other;
		} else {
			$url = 'http://'.$_SERVER['HTTP_HOST'];
		}
		return $url;
	}
	
	function segment($id){
		$request_url = explode('/', $_SERVER['REQUEST_URI']);

		$row = array_search('index.php', $request_url);
		$i = 0;
		while( $i <= $row ){
			array_shift($request_url);
			$i++;
		}
		
		return $request_url[$id];
	}
	
}
?>