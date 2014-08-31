<?php 

$router = new AltoRouter();
$router->setBasePath('/mvc/public/index.php');
$router->map('GET|POST','/', 'home#index', 'home');
$router->map('GET','/users/', array('c' => '../app/controllers/UserController', 'a' => 'ListAction'), 'zb.');
$router->map('GET','/users/[i:id]', 'users#show', 'users_show');
$router->map('POST','/users/[i:id]/[delete|update:action]', 'usersController#doAction', 'users_do');
 // match current request
$match = $router->match();