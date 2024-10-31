<?php
session_start();
require_once 'core/controller.php';
require_once 'core/database.php';
require_once 'core/route.php';
//
require_once 'models/AdminModel.php';
require_once 'models/AuthModel.php';
require_once 'models/BookingModel.php';
require_once 'models/CarouselModel.php';
require_once 'models/GuestModel.php';
require_once 'models/RoomModel.php';
require_once 'models/RoomImagesModel.php';
require_once 'models/SettingModel.php';
require_once 'models/StaffModel.php';
require_once 'models/TestimonialModel.php';
//
require_once 'services/ImageService.php';
//
require_once 'views/assets/php/admin_login.php';
require_once 'views/assets/php/essentials.php';
require_once 'views/assets/php/ToFormat.php';
require_once 'views/assets/php/guest_login.php';
require_once 'views/assets/php/getMessage.php';


// Instantiate Router
/**
 * @param Router $router
 * @return void
 */
$router = new Router();
// auth route
$router->prefix('auth', function (Router $router) {

    $router->get('/login', [AuthController::class, 'login']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->addRoute('GET', '/register', [AuthController::class, 'register']);
    $router->addRoute('POST', '/register', [AuthController::class, 'register']);
    $router->addRoute('GET', '/logout', [AuthController::class, 'logout']);
    $router->addRoute('POST', '/logout', [AuthController::class, 'logout']);
});

$router->addRoute('GET', '/users', [GuestController::class, 'index']);
$router->addRoute('GET', '/users/create', [GuestController::class, 'create']);
$router->addRoute('POST', '/users/store', [GuestController::class, 'store']);
// home route
$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('POST', '/', [HomeController::class, 'index']);
//$router->addRoute('POST', '/check-booking-availability', [HomeController::class, 'check_booking_availability']);
$router->addRoute('GET', '/test', [HomeController::class, 'test']);
//
$router->addRoute('GET', '/room', [HomeController::class, 'room']);
$router->addRoute('POST', '/room', [HomeController::class, 'room']);
$router->addRoute('GET', '/room/{id}', [HomeController::class, 'room_detail']);
//
$router->addRoute('GET', '/facility', [HomeController::class, 'facility']);
$router->addRoute('GET', '/contact', [HomeController::class, 'contact']);
$router->addRoute('GET', '/about', [HomeController::class, 'about']);
$router->addRoute('GET', '/testimonial', [HomeController::class, 'testimonial']);
$router->addRoute('GET', '/detail/{id}', [HomeController::class, 'detail']);


// admin route

$router->prefix('admin', function (Router $router) {
    $router->addRoute('GET', '/', [AdminController::class, 'index']);
    $router->addRoute('GET', '/', [AdminController::class, 'index']);
//settings
    $router->addRoute('GET', '/dashboard', [AdminController::class, 'dashboard']);

    $router->prefix('settings', function (Router $router) {
        $router->addRoute('GET', '', [AdminController::class, 'settings']);
        $router->addRoute('POST', '/staff', [AdminController::class, 'create_staff']);
        $router->addRoute('POST', '/general/{id}', [AdminController::class, 'setting_general_save']);
        $router->addRoute('POST', '/contact/{id}', [AdminController::class, 'setting_contact_save']);
    });
// admin room

    $router->addRoute('GET', '/room', [RoomController::class, 'index']);
    $router->addRoute('POST', '/room', [RoomController::class, 'index']);
    $router->addRoute('GET', '/room-available', [RoomController::class, 'available']);
    $router->addRoute('POST', '/room-available/{id}', [RoomController::class, 'available_action']);
    $router->addRoute('GET', '/room-full', [RoomController::class, 'full']);
    $router->addRoute('GET', '/room/create', [RoomController::class, 'create']);
    $router->addRoute('POST', '/room/create', [RoomController::class, 'create']);
    $router->addRoute('GET', '/room/update/{id}', [RoomController::class, 'update']);
    $router->addRoute('POST', '/room/update/{id}', [RoomController::class, 'update']);
    $router->addRoute('GET', '/room/{id}', [RoomController::class, 'detail_admin']);
    $router->addRoute('POST', '/room/{id}', [RoomController::class, 'detail_admin']);
    $router->addRoute('POST', '/room-delete-image/{id}', [RoomController::class, 'detail_admin_delete_image']);
    $router->addRoute('POST', '/room-delete-data/{id}', [RoomController::class, 'detail_admin_delete_data']);

    $router->prefix('guest', function (Router $router) {
        $router->addRoute('GET', '', [GuestController::class, 'index']);
        $router->addRoute('POST', '', [GuestController::class, 'index']);
        $router->addRoute('GET', '/create', [GuestController::class, 'create']);
        $router->addRoute('POST', '/create', [GuestController::class, 'create']);
        $router->addRoute('GET', '/update/{id}', [GuestController::class, 'update']);
        $router->addRoute('POST', '/edit/{id}', [GuestController::class, 'edit']);
        $router->addRoute('POST', '/delete/{id}', [GuestController::class, 'delete']);
        $router->addRoute('GET', '/{id}', [GuestController::class, 'detail']);
    });

    $router->prefix('staff', function (Router $router) {
        $router->controller(StaffController::class, function ($router) {
            $router->get('', 'index')
                ->post('', 'search')
                ->get('/create', 'create')
                ->post('/create', 'create')
                ->get('/update/{id}', 'update')
                ->post('/update/{id}', 'update')
                ->post('/delete/{id}', 'delete')
                ->get('/{id}', 'detail');
        });
    });

    $router->prefix('testimonial', function (Router $router) {
        $router->addRoute('GET', '', [TestimonialController::class, 'index']);
        $router->addRoute('POST', '', [TestimonialController::class, 'index']);
        $router->addRoute('GET', '/create', [TestimonialController::class, 'create']);
        $router->addRoute('POST', '/create', [TestimonialController::class, 'store']);
        $router->addRoute('POST', '/update/{id}', [TestimonialController::class, 'update']);
        $router->addRoute('POST', '/delete/{id}', [TestimonialController::class, 'delete']);
        $router->addRoute('GET', '/{id}', [TestimonialController::class, 'detail']);
    });

    $router->prefix('carousel', function (Router $router) {
        $router->addRoute('GET', '', [CarouselController::class, 'index']);
        $router->addRoute('POST', '', [CarouselController::class, 'index']);
        $router->addRoute('POST', '/create', [CarouselController::class, 'create']);
        $router->addRoute('POST', '/update/{id}', [CarouselController::class, 'update']);
        $router->addRoute('POST', '/delete/{id}', [CarouselController::class, 'delete']);
        $router->addRoute('GET', '/{id}', [CarouselController::class, 'detail']);
    });

    $router->prefix('booking', function (Router $router) {
        $router->addRoute('GET', '', [BookingController::class, 'admin_booking']);
        $router->addRoute('GET', '/update/{id}', [BookingController::class, 'admin_booking_update']);
        $router->addRoute('POST', '/update/{id}', [BookingController::class, 'admin_booking_update']);
        $router->addRoute('GET', '/print/{id}', [BookingController::class, 'admin_booking_print']);
        $router->addRoute('GET', '/booking', [BookingController::class, 'admin_booking_booking']);
        $router->addRoute('GET', '/cancel', [BookingController::class, 'admin_booking_cancel']);
        $router->addRoute('GET', '/confirm', [BookingController::class, 'admin_booking_confirm']);
        $router->addRoute('POST', '/confirm-action/{id}', [BookingController::class, 'admin_booking_confirm_action']);
        $router->addRoute('POST', '/confirm-cancel/{id}', [BookingController::class, 'admin_booking_confirm_cancel']);
        $router->addRoute('GET', '/finish', [BookingController::class, 'admin_booking_finish']);
//        $router->addRoute('POST', '/confirm/{id}', [BookingController::class, 'admin_confirm']);
        $router->addRoute('GET', '/{id}', [BookingController::class, 'admin_detail']);
    });
});


//$router->addRoute('GET', '/create', 'GuestController@create');
//$router->addRoute('POST', '/store', 'GuestController@store');
////


$router->prefix('guest', function (Router $router) {
    $router->addRoute('GET', '/history', [GuestController::class, 'history']);

//Guest
    $router->prefix('profile', function ($router) {
        $router->addRoute('GET', '', [GuestController::class, 'profile']);
        $router->addRoute('GET', 'update', [GuestController::class, 'profile_update']);
        $router->addRoute('POST', 'edit', [GuestController::class, 'profile_edit']);
    });

    $router->prefix('room', function ($router) {

        $router->addRoute('GET', '', [RoomController::class, 'guest_index']);
        $router->addRoute('POST', '', [RoomController::class, 'guest_index']);
        $router->addRoute('POST', '/filter', [RoomController::class, 'guest_filter']);
        $router->addRoute('GET', '/{id}', [RoomController::class, 'guest_room_detail']);
    });

    $router->prefix('booking', function ($router) {
        $router->addRoute('GET', '', [BookingController::class, 'guest_booking']);
        $router->addRoute('POST', '', [BookingController::class, 'guest_booking']);
        $router->addRoute('GET', '/booking', [BookingController::class, 'guest_booking_booking']);
        $router->addRoute('POST', '/booking-action', [BookingController::class, 'guest_booking_create']);
        $router->addRoute('GET', '/cancel', [BookingController::class, 'guest_booking_cancel']);
        $router->addRoute('POST', '/cancel-action/{id}', [BookingController::class, 'guest_booking_cancel_action']);
        $router->addRoute('GET', '/confirm', [BookingController::class, 'guest_booking_confirm']);
        $router->addRoute('GET', '/finish', [BookingController::class, 'guest_booking_finish']);
        $router->addRoute('POST', '/finish-action/{id}', [BookingController::class, 'guest_booking_finish_action']);
        $router->addRoute('POST', '/update/booking', [BookingController::class, 'booking_update_booking']);
        $router->addRoute('POST', '/update/cancel', [BookingController::class, 'booking_update_cancel']);
        $router->addRoute('POST', '/update/{id}', [BookingController::class, 'booking_update_guest']);
        $router->addRoute('GET', '/print/{id}', [BookingController::class, 'booking_print']);
        $router->addRoute('POST', '/update/{id}', [BookingController::class, 'booking_update']);
        $router->addRoute('GET', '/edit/{id}', [BookingController::class, 'booking_detail_edit']);
        $router->addRoute('GET', '/{id}', [BookingController::class, 'booking_detail']);
    });
});

// Dispatch the route
$router->dispatch();

