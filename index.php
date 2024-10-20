<?php
require_once 'core/route.php';

session_start();
// Instantiate Router
$router = new Router();

// auth route
//$router->addRoute('GET', '/auth/dashboard', 'AuthController@dashboard');
$router->addRoute('POST', '/auth/login', 'AuthController@login');
$router->addRoute('POST', '/auth/register', 'AuthController@register');
$router->addRoute('POST', '/auth/logout', 'AuthController@logout');

// home route
$router->addRoute('GET', '/', 'HomeController@index');
$router->addRoute('GET', '/room', 'HomeController@room');
$router->addRoute('GET', '/facility', 'HomeController@facility');
$router->addRoute('GET', '/contact', 'HomeController@contact');
$router->addRoute('GET', '/about', 'HomeController@about');

// admin route
$router->addRoute('GET', '/admin/', 'AdminController@index');
$router->addRoute('GET', '/admin/dashboard', 'AdminController@dashboard');
$router->addRoute('GET', '/admin/settings', 'AdminController@settings');
$router->addRoute('GET', '/admin/create', 'UserController@create');
$router->addRoute('POST', '/admin/store', 'UserController@store');
//

$router->addRoute('GET', '/users', 'UserController@index');
$router->addRoute('GET', '/users/create', 'UserController@create');
$router->addRoute('POST', '/users/store', 'UserController@store');

// Dispatch the route
$router->dispatch();

