<?php 

// Load Application Config file
$autoload['config'][] = 'config';
//require ( '../'.APPPATH.'/config/config.php' );


// Load Base PoPo 
$autoload_core['popos'][] = 'BasePoPo';
//require ( '../'.COREPATH.'/popos/BasePoPo.php' );


// Load Base Model 
$autoload_core['models'][] = 'BaseModel';
//require ( '../'.COREPATH.'/models/BaseModel.php' );


// Load Speedy required files
$autoload_core['libraries'][] = 'SpeedyHttp';
$autoload_core['libraries'][] = 'SpeedyHttpRequest';
$autoload_core['libraries'][] = 'SpeedyHttpResponse';
//require ( '../'.COREPATH.'/libraries/http/SpeedyHttp.php' );
//require ( '../'.COREPATH.'/libraries/http/SpeedyHttpRequest.php' );
//require ( '../'.COREPATH.'/libraries/http/SpeedyHttpResponse.php' );




