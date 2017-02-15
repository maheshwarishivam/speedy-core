<?php 
Class Bootstrap {
	
	function Bootstrap() {
		
		define('COREPATH', 'core');
		define('APPPATH', 'app');
		
		$autoload = array();
		$autoload_core = array();
		$default = array();
		
		
	}
	
	public function run(){
		global $config;
		$config = array();
		
		// Load Required Files
		require COREPATH.'/config/config.php';
		
		// Load Required Files
		//require COREPATH.'/config/constants.php';
		
		// Load Required Files
		//require APPPATH.'/config/constants.php';
		
		// Load Application autoload Config files
		foreach($autoload['config'] as $row){ 
			if( $row != '' ){
				require APPPATH.'/config/'.$row.'.php';
			}
		}
		
		date_default_timezone_set($default['timezone']);
		
		define('INDEX_PAGE', $default['index_page']);
		define('API_URL', $default['api_url']);
		
		require COREPATH.'/controllers/BaseController.php';
		
		// Load Core autoload PoPos files
		foreach($autoload_core['popos'] as $row){ 
			if( $row != '' ){
				require COREPATH.'/popos/'.$row.'.php';
			}
		}

		
		// Load Core autoload Models files
		foreach($autoload_core['models'] as $row){ 
			if( $row != '' ){
				require COREPATH.'/models/'.$row.'.php';
			}
		}
		
		
		// Load Core autoload Libraries files
		foreach($autoload_core['libraries'] as $row){
			if( $row != '' ){
				require COREPATH.'/libraries/http/'.$row.'.php';
			}
		}
		
		
		// Load Application autoload Models files
		foreach($autoload['libraries'] as $row){  
			if( $row != '' ){
				require APPPATH.'/libraries/'.ucfirst($row).'.php';
			}
		}
		
		
		// Load Application autoload Models files
		foreach($autoload['models'] as $row){ 
			if( $row != '' ){
				require APPPATH.'/models/'.$row.'.php';
			}
		}
		
		
		// Load Application autoload Config files
		foreach($autoload['config'] as $row){ 
			if( $row != '' ){
				require APPPATH.'/config/'.$row.'.php';
			}
		}
		
		
		$request_url = explode('/', explode('?', REQUEST_URI)[0]);

		$row = array_search('index.php', $request_url);
		$i = 0;
		while( $i <= $row ){
			array_shift($request_url);
			$i++;
		}
		
		require APPPATH.'/route.php';
		$route_url = implode('/', $request_url);
		
		if(empty( $route_url )){
			
			$controllerName = $default['controller'].'Controller';
			$actionName = 'indexAction';
			
		} else if(!empty($route[$route_url])){
			
			$route_url_value = explode('@', $route[$route_url]);
			
			$controllerName = isset($route_url_value[0])?$route_url_value[0].'Controller':$default['controller'].'Controller';
			$actionName     = isset($route_url_value[1])?$route_url_value[1].'Action':'indexAction';
			
		} else {
			
			$controllerName = isset($request_url[0])?$request_url[0].'Controller':$default['controller'].'Controller';
			$actionName     = isset($request_url[1])?$request_url[1].'Action':'indexAction';
			
		}

		$file = '../'.APPPATH.'/controllers/'.ucfirst($controllerName).'.php';
		
		if(file_exists ( $file ) ){

			require $file;
			
			$obj = new $controllerName();

			if (method_exists($obj, $actionName)){

				$obj->$actionName();
				
			} else {
				
				$obj->error_400($actionName);
				
			}
		} else {

			$obj = new BaseController();
			$obj->error_400();
			
		}
		
	}
	
}

?>