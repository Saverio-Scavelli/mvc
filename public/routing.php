<?php
error_reporting(E_ALL);
header("Content-Type: text/html");
//include dirname(__FILE__) . '../app/core/AltoRouter.php';
include '../app/core/AltoRouter.php';
$router = new AltoRouter();
$router->setBasePath('/mvc/public/routing.php');
/* Setup the URL routing. This is production ready. */
 
// Main routes that non-customers see
$router->map('GET','/', 'home.php', 'home');
$router->map('GET', '/test/', 'test.html', 'test');
$router->map('GET','/home/', 'home.php', 'home-home');
$router->map('GET','/plans/', 'plans.php', 'plans');
$router->map('GET','/about/', 'about.php', 'about');
$router->map('GET','/contact/', 'contact.php', 'contact');
$router->map('GET','/tos/', 'tos.html', 'tos');
$router->map('GET', '/info/', '../app/info.php', 'info');
$router->map('GET', '/userslist/[list:action]/', array( "c" => '../app/controllers/users.php', "a" => 'listusers'), 'Users');
 
// Special (payments, ajax processing, etc)
$router->map('GET','/charge/[*:customer_id]/','charge.php','charge');
$router->map('GET','/pay/[*:status]/','payment_results.php','payment-results');
 
// API Routes
$router->map('GET','/api/[*:key]/[*:name]/', 'json.php', 'api');
 
/* Match the current request */
$match = $router->match();

if($match) {
  
	  
	include $match['target']['c'];
    $name = $match['name'];
    $action = $match['target']['a'];
    $controller = new $name();
    echo $name.'<br>';
    echo $action.'<br>';
    var_dump($controller);

    call_user_func_array(array($controller,$action), array($match));
    
}
else {
	header("HTTP/1.0 404 Not Found");
	//require '404.html';
	//echo $router->test();
	echo dirname(__FILE__);
	
}


/*
if ($match === false) {
    // here you can handle 404
} else {
    list( $controller, $action ) = explode( '#', $match['target'] );
    if ( is_callable(array($controller, $action)) ) {
        call_user_func_array(array($obj,$action), array($match['params']));
    } else {
        // here your routes are wrong.
        // Throw an exception in debug, send a  500 error in production
    }
}
*/

?>
