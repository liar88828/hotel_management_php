<?php

require_once 'core/route.php';
//use Core\Router;

session_start();

// Instantiate Router
$router = new Router();

// Define routes
$router->addRoute('GET', '/', 'HomeController@index');
$router->addRoute('GET', '/room', 'HomeController@room');
$router->addRoute('GET', '/facility', 'HomeController@facility');
$router->addRoute('GET', '/contact', 'HomeController@contact');
$router->addRoute('GET', '/about', 'HomeController@about');

$router->addRoute('GET', '/users', 'UserController@index');
$router->addRoute('GET', '/users/create', 'UserController@create');
$router->addRoute('POST', '/users/store', 'UserController@store');

// Dispatch the route
$router->dispatch();

