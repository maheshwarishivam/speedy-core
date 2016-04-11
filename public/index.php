<?php
    /**autoload files which we would define in the autoload function*/
    require_once ('../core/popos/BasePoPo.php');
	
    require_once ('../core/controllers/BaseController.php');
	
    require_once ('../core/models/BaseModel.php');
    
    require_once ('../core/libraries/http/SpeedyHttp.php');
    require_once ('../core/libraries/http/SpeedyHttpRequest.php');
    require_once ('../core/libraries/http/SpeedyHttpResponse.php');
    
	
	require_once ('../app/config/Config.php');
	
    require_once ('../app/popos/UserPoPo.php');
    require_once ('../app/popos/UserListPoPo.php');
    require_once ('../app/popos/UserAddPoPo.php');
    require_once ('../app/popos/UserUpdatePoPo.php');
    require_once ('../app/popos/UserDeletePoPo.php');
	
    /**Autoload files ends here*/
    
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $controllerName = isset($_GET['c'])?$_GET['c'].'Controller':'';
    $actionName     = isset($_GET['a'])?$_GET['a'].'Action':'';
    
    require_once ('../app/controllers/'.$controllerName.'.php');
    $obj = new $controllerName();
    echo $obj->$actionName();
?>