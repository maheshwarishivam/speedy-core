<?php 

// Load Application Config file
$autoload['config'][] = 'config';


// Load Base PoPo 
$autoload_core['popos'][] = 'BasePoPo';


// Load Base Model 
$autoload_core['models'][] = 'BaseModel';


// Load Speedy required files
$autoload_core['libraries'][] = 'SpeedyHttp';
$autoload_core['libraries'][] = 'SpeedyHttpRequest';
$autoload_core['libraries'][] = 'SpeedyHttpResponse';



define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
