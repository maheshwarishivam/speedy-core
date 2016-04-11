<?php 
Class Bootstrap {
	
	function Bootstrap() {
		
		define('COREPATH', 'core');
		define('APPPATH', 'app');
		
		$autoload = array();
		$autoload_core = array();
		
		require ( '../'.COREPATH.'/controllers/BaseController.php' );
		
	}
	
	public function run(){
		
		// Load Required Files
		require ( '../'.COREPATH.'/config/config.php' );
		
		
		// Load Core autoload PoPos files
		foreach($autoload_core['popos'] as $row){ 
			if( $row != '' ){
				require ( '../'.COREPATH.'/popos/'.$row.'.php' );
			}
		}

		
		// Load Core autoload Models files
		foreach($autoload_core['models'] as $row){ 
			if( $row != '' ){
				require ( '../'.COREPATH.'/models/'.$row.'.php' );
			}
		}
		
		
		// Load Core autoload Libraries files
		foreach($autoload_core['libraries'] as $row){
			if( $row != '' ){
				require ( '../'.COREPATH.'/libraries/http/'.$row.'.php' );
			}
		}
		
		
		// Load Application autoload Config files
		foreach($autoload['config'] as $row){ 
			if( $row != '' ){
				require ( '../'.APPPATH.'/config/'.$row.'.php' );
			}
		}
		
		
		// Load Application autoload Models files
		foreach($autoload['models'] as $row){ 
			if( $row != '' ){
				require ( '../'.APPPATH.'/models/'.$row.'.php' );
			}
		}
		
		
		
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
		
		$request_url = explode('/', $_SERVER['REQUEST_URI']);

		$row = array_search('index.php', $request_url);
		$i = 0;
		while( $i <= $row ){
			array_shift($request_url);
			$i++;
		}

		$controllerName = isset($request_url[0])?$request_url[0].'Controller':'';
		$actionName     = isset($request_url[1])?$request_url[1].'Action':'';
		
		require ('../'.APPPATH.'/controllers/'.$controllerName.'.php');
		$obj = new $controllerName();
		echo $obj->$actionName();
		
	}
	
	
}

?>