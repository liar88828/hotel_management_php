<?php
require_once 'core/route.php';

session_start();
// Instantiate Router
$router = new Router();

// auth route
$router->addRoute('GET', '/auth/login', 'AuthController@login');
$router->addRoute('POST', '/auth/login', 'AuthController@login');
$router->addRoute('POST', '/auth/register', 'AuthController@register');
$router->addRoute('POST', '/auth/logout', 'AuthController@logout');

// home route
$router->addRoute('GET', '/', 'HomeController@index');
$router->addRoute('GET', '/room', 'HomeController@room');
$router->addRoute('GET', '/facility', 'HomeController@facility');
$router->addRoute('GET', '/contact', 'HomeController@contact');
$router->addRoute('GET', '/about', 'HomeController@about');
$router->addRoute('GET', '/testimonial', 'HomeController@testimonial');
$router->addRoute('GET', '/detail/{id}', 'HomeController@detail');

// admin route
$router->addRoute('GET', '/admin/', 'AdminController@index');

//settings
$router->addRoute('POST', '/admin/settings/general/{id}', 'AdminController@setting_general_save');
$router->addRoute('POST', '/admin/settings/contact/{id}', 'AdminController@setting_contact_save');
$router->addRoute('GET', '/admin/dashboard', 'AdminController@dashboard');
$router->addRoute('GET', '/admin/settings', 'AdminController@settings');
// admin room
$router->addRoute('GET', '/admin/room', 'RoomController@index');
$router->addRoute('GET', '/admin/room/create', 'RoomController@create');
$router->addRoute('POST', '/admin/room/store', 'RoomController@store');
$router->addRoute('GET', '/admin/room/update/{id}', 'RoomController@update');
$router->addRoute('POST', '/admin/room/edit/{id}', 'RoomController@edit');
$router->addRoute('GET', '/admin/room/{id}', 'RoomController@detail');
// admin guess
$router->addRoute('GET', '/admin/guess', 'GuessController@index');
$router->addRoute('GET', '/admin/guess/create', 'GuessController@create');
$router->addRoute('POST', '/admin/guess/store', 'GuessController@store');
$router->addRoute('GET', '/admin/guess/update/{id}', 'GuessController@update');
$router->addRoute('POST', '/admin/guess/edit/{id}', 'GuessController@edit');
$router->addRoute('GET', '/admin/guess/{id}', 'GuessController@detail');

// admin staff
$router->addRoute('GET', '/admin/staff', 'StaffController@index');
$router->addRoute('GET', '/admin/staff/create', 'StaffController@create');
$router->addRoute('POST', '/admin/staff/store', 'StaffController@store');
$router->addRoute('GET', '/admin/staff/update/{id}', 'StaffController@update');
$router->addRoute('POST', '/admin/staff/edit/{id}', 'StaffController@edit');
$router->addRoute('GET', '/admin/staff/{id}', 'StaffController@detail');
//


//$router->addRoute('GET', '/admin/create', 'GuessController@create');
//$router->addRoute('POST', '/admin/store', 'GuessController@store');
////

$router->addRoute('GET', '/users', 'GuessController@index');
$router->addRoute('GET', '/users/create', 'GuessController@create');
$router->addRoute('POST', '/users/store', 'GuessController@store');

// Dispatch the route
$router->dispatch();

