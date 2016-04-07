<?php

abstract class BaseController{
    
   /* This function is used as the default action if action is not provided by the user */
    public function indexAction(){
        
    }
    
    /*This render function is used to render the view of application*/
    final public function render($file, $variables = array()){
        
        extract($variables);
        ob_start();
        include $file;
        $renderedView = ob_get_clean();
        return $renderedView;
    }
    
    function model($file) {
        $path = '../app/models/'.$file.'.php';

        if( file_exists( $path ) ){
            require_once $path;
        } else {
            echo $file.' Model does not Found';
        }
    }
}
?>