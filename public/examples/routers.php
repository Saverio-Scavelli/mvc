<?php
$router = new AltoRouter();
$router->setBasePath('/demosite4.com'); 
$router->map('GET','/', 'home_controller#display_item', 'home');
$router->map('GET','/content/[:parent]/?[:child]?', 'content_controller#display_item', 'content');
$match = $router->match();

// not sure if code after this comment  is the best way to handle matched routes
list( $controller, $action ) = explode( '#', $match['target'] );
if ( is_callable(array($controller, $action)) ) {
    $obj = new $controller();
    call_user_func_array(array($obj,$action), array($match['params']));
} else if ($match['target']==''){
    echo 'Error: no route was matched'; 
    //possibly throw a 404 error
} else {
    echo 'Error: can not call '.$controller.'#'.$action; 
    //possibly throw a 404 error
}


// content_controller class file is autoloaded 

class content_controller {
    public function display_item($args) {
        //echo our params to to make sure we got them
        echo 'parent: '. $args['parent'];
        echo 'child: '. $args['child'];
    }
}
?>