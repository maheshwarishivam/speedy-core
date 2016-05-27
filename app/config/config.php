<?php 
/* 
const API_KEY         = '62f7b668181f54c08191cf62a2373ff7';
const AUTH_TOKEN      = '27bf697f7175c64651ab330fc2823a2e';
const CONFIG_VERSION  = '1.0';
 */

$default['index_page'] = 'index.php';


$default['api_url'] = 'http://api.raccoon.dev.canbrand.in/';


$default['controller'] = 'user';

$default['timezone'] = 'UTC';

// Load model in all project
$autoload['models'][] = 'UserModel';

$autoload['libraries'][] = 'Session';
$autoload['libraries'][] = 'Pagination';

$autoload['config'][] = 'config_text';

