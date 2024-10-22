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
$router->addRoute('GET', '/test', 'HomeController@test');
//
$router->addRoute('GET', '/room', 'HomeController@room');
$router->addRoute('POST', '/room/search', 'HomeController@room_search');
$router->addRoute('GET', '/room/detail/{id}', 'HomeController@room_detail');
//
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
$router->addRoute('GET', '/admin/room/{id}', 'RoomController@detail_admin');

// admin guest
$router->addRoute('GET', '/admin/guest', 'GuestController@index');
$router->addRoute('GET', '/admin/guest/create', 'GuestController@create');
$router->addRoute('POST', '/admin/guest/store', 'GuestController@store');
$router->addRoute('GET', '/admin/guest/update/{id}', 'GuestController@update');
$router->addRoute('POST', '/admin/guest/edit/{id}', 'GuestController@edit');
$router->addRoute('GET', '/admin/guest/{id}', 'GuestController@detail');

// admin staff
$router->addRoute('GET', '/admin/staff', 'StaffController@index');
$router->addRoute('GET', '/admin/staff/create', 'StaffController@create');
$router->addRoute('POST', '/admin/staff/store', 'StaffController@store');
$router->addRoute('GET', '/admin/staff/update/{id}', 'StaffController@update');
$router->addRoute('POST', '/admin/staff/edit/{id}', 'StaffController@edit');
$router->addRoute('GET', '/admin/staff/{id}', 'StaffController@detail');
//

// admin testimonial
$router->addRoute('GET', '/admin/testimonial', 'TestimonialController@index');
$router->addRoute('GET', '/admin/testimonial/create', 'TestimonialController@create');
$router->addRoute('POST', '/admin/testimonial/store', 'TestimonialController@store');
$router->addRoute('GET', '/admin/testimonial/update/{id}', 'TestimonialController@update');
$router->addRoute('POST', '/admin/testimonial/edit/{id}', 'TestimonialController@edit');
$router->addRoute('GET', '/admin/testimonial/{id}', 'TestimonialController@detail');
// admin carousel
$router->addRoute('GET', '/admin/carousel', 'CarouselController@index');
$router->addRoute('GET', '/admin/carousel/create', 'CarouselController@create');
$router->addRoute('POST', '/admin/carousel/store', 'CarouselController@store');
$router->addRoute('GET', '/admin/carousel/update/{id}', 'CarouselController@update');
$router->addRoute('POST', '/admin/carousel/edit/{id}', 'CarouselController@edit');
$router->addRoute('GET', '/admin/carousel/{id}', 'CarouselController@detail');


//$router->addRoute('GET', '/admin/create', 'GuestController@create');
//$router->addRoute('POST', '/admin/store', 'GuestController@store');
////

$router->addRoute('GET', '/users', 'GuestController@index');
$router->addRoute('GET', '/users/create', 'GuestController@create');
$router->addRoute('POST', '/users/store', 'GuestController@store');

// Dispatch the route
$router->dispatch();

