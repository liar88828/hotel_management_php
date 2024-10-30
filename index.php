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
$router = new Router();
// auth route
$router->addRoute('GET', '/auth/login', [AuthController::class, 'login']);
$router->addRoute('POST', '/auth/login', [AuthController::class, 'login']);
$router->addRoute('GET', '/auth/register', [AuthController::class, 'register']);
$router->addRoute('POST', '/auth/register', [AuthController::class, 'register']);
$router->addRoute('GET', '/auth/logout', [AuthController::class, 'logout']);
$router->addRoute('POST', '/auth/logout', [AuthController::class, 'logout']);

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
$router->addRoute('GET', '/admin', [AdminController::class, 'index']);

//settings
$router->addRoute('POST', '/admin/settings/general/{id}', [AdminController::class, 'setting_general_save']);
$router->addRoute('POST', '/admin/settings/staff', [AdminController::class, 'create_staff']);
$router->addRoute('POST', '/admin/settings/contact/{id}', [AdminController::class, 'setting_contact_save']);
$router->addRoute('GET', '/admin/dashboard', [AdminController::class, 'dashboard']);
$router->addRoute('GET', '/admin/settings', [AdminController::class, 'settings']);

// admin room
$router->addRoute('GET', '/admin/room', [RoomController::class, 'index']);
$router->addRoute('POST', '/admin/room', [RoomController::class, 'index']);
$router->addRoute('GET', '/admin/room-available', [RoomController::class, 'available']);
$router->addRoute('POST', '/admin/room-available/{id}', [RoomController::class, 'available_action']);
$router->addRoute('GET', '/admin/room-full', [RoomController::class, 'full']);
$router->addRoute('GET', '/admin/room/create', [RoomController::class, 'create']);
$router->addRoute('POST', '/admin/room/create', [RoomController::class, 'create']);
$router->addRoute('GET', '/admin/room/update/{id}', [RoomController::class, 'update']);
$router->addRoute('POST', '/admin/room/update/{id}', [RoomController::class, 'update']);
$router->addRoute('GET', '/admin/room/{id}', [RoomController::class, 'detail_admin']);
$router->addRoute('POST', '/admin/room/{id}', [RoomController::class, 'detail_admin']);
$router->addRoute('POST', '/admin/room-delete/{id}', [RoomController::class, 'detail_admin_delete']);

// admin guest
$router->addRoute('GET', '/admin/guest', [GuestController::class, 'index']);
$router->addRoute('POST', '/admin/guest', [GuestController::class, 'index']);
$router->addRoute('GET', '/admin/guest/create', [GuestController::class, 'create']);
$router->addRoute('POST', '/admin/guest/store', [GuestController::class, 'store']);
$router->addRoute('GET', '/admin/guest/update/{id}', [GuestController::class, 'update']);
$router->addRoute('POST', '/admin/guest/edit/{id}', [GuestController::class, 'edit']);
$router->addRoute('POST', '/admin/guest/delete/{id}', [GuestController::class, 'delete']);
$router->addRoute('GET', '/admin/guest/{id}', [GuestController::class, 'detail']);

// admin staff
$router->addRoute('GET', '/admin/staff', [StaffController::class, 'index']);
$router->addRoute('POST', '/admin/staff', [StaffController::class, 'search']);
$router->addRoute('GET', '/admin/staff/create', [StaffController::class, 'create']);
$router->addRoute('POST', '/admin/staff/store', [StaffController::class, 'store']);
$router->addRoute('GET', '/admin/staff/update/{id}', [StaffController::class, 'update']);
$router->addRoute('POST', '/admin/staff/update/{id}', [StaffController::class, 'update']);
$router->addRoute('POST', '/admin/staff/delete/{id}', [StaffController::class, 'delete']);
$router->addRoute('GET', '/admin/staff/{id}', [StaffController::class, 'detail']);
//

// admin testimonial
$router->addRoute('GET', '/admin/testimonial', [TestimonialController::class, 'index']);
$router->addRoute('POST', '/admin/testimonial', [TestimonialController::class, 'index']);
$router->addRoute('GET', '/admin/testimonial/create', [TestimonialController::class, 'create']);
$router->addRoute('POST', '/admin/testimonial/create', [TestimonialController::class, 'store']);
//$router->addRoute('GET', '/admin/testimonial/update/{id}', [TestimonialController::class, 'update']);
$router->addRoute('POST', '/admin/testimonial/update/{id}', [TestimonialController::class, 'update']);
$router->addRoute('POST', '/admin/testimonial/delete/{id}', [TestimonialController::class, 'delete']);
$router->addRoute('GET', '/admin/testimonial/{id}', [TestimonialController::class, 'detail']);

// admin carousel
$router->addRoute('GET', '/admin/carousel', [CarouselController::class, 'index']);
$router->addRoute('POST', '/admin/carousel', [CarouselController::class, 'index']);
//$router->addRoute('GET', '/admin/carousel/create', [CarouselController::class, 'create']);
$router->addRoute('POST', '/admin/carousel/create', [CarouselController::class, 'create']);
//$router->addRoute('GET', '/admin/carousel/update/{id}', [CarouselController::class, 'update']);
$router->addRoute('POST', '/admin/carousel/update/{id}', [CarouselController::class, 'update']);
$router->addRoute('POST', '/admin/carousel/delete/{id}', [CarouselController::class, 'delete']);
$router->addRoute('GET', '/admin/carousel/{id}', [CarouselController::class, 'detail']);

// admin booking
$router->addRoute('GET', '/admin/booking', [BookingController::class, 'admin_booking']);
$router->addRoute('GET', '/admin/booking-booking', [BookingController::class, 'admin_booking_booking']);
$router->addRoute('GET', '/admin/booking-update/{id}', [BookingController::class, 'admin_booking_update']);
$router->addRoute('POST', '/admin/booking-update/{id}', [BookingController::class, 'admin_booking_update']);
$router->addRoute('GET', '/admin/booking/print/{id}', [BookingController::class, 'admin_booking_print']);
$router->addRoute('GET', '/admin/booking-cancel', [BookingController::class, 'admin_booking_cancel']);
$router->addRoute('GET', '/admin/booking-finish', [BookingController::class, 'admin_booking_finish']);
$router->addRoute('GET', '/admin/booking-confirm', [BookingController::class, 'admin_booking_confirm']);
$router->addRoute('POST', '/admin/booking-confirm-cancel/{id}', [BookingController::class, 'admin_booking_confirm_cancel']);
$router->addRoute('POST', '/admin/booking-confirm/{id}', [BookingController::class, 'admin_booking_confirm_action']);
$router->addRoute('POST', '/admin/booking/confirm/{id}', [BookingController::class, 'admin_confirm']);
$router->addRoute('GET', '/admin/booking/{id}', [BookingController::class, 'admin_detail']);


//$router->addRoute('GET', '/admin/create', 'GuestController@create');
//$router->addRoute('POST', '/admin/store', 'GuestController@store');
////

$router->addRoute('GET', '/users', [GuestController::class, 'index']);
$router->addRoute('GET', '/users/create', [GuestController::class, 'create']);
$router->addRoute('POST', '/users/store', [GuestController::class, 'store']);


//Guest
$router->addRoute('GET', '/guest/profile', [GuestController::class, 'profile']);
$router->addRoute('GET', '/guest/profile-update', [GuestController::class, 'profile_update']);
$router->addRoute('POST', '/guest/profile-edit', [GuestController::class, 'profile_edit']);
$router->addRoute('GET', '/guest/history', [GuestController::class, 'history']);

$router->addRoute('GET', '/guest/room', [RoomController::class, 'guest_index']);
$router->addRoute('POST', '/guest/room', [RoomController::class, 'guest_index']);
$router->addRoute('POST', '/guest/room-filter', [RoomController::class, 'guest_filter']);
$router->addRoute('GET', '/guest/room/{id}', [RoomController::class, 'guest_room_detail']);

//$router->addRoute('GET', '/guest/room/available', [GuestController::class,'room_available']);
//$router->addRoute('GET', '/guest/room/empty', [GuestController::class,'room_empty']);

$router->addRoute('GET', '/guest/booking', [BookingController::class, 'guest_booking']);
$router->addRoute('POST', '/guest/booking', [BookingController::class, 'guest_booking_search']);
$router->addRoute('POST', '/guest/booking-create', [BookingController::class, 'guest_booking_create']);
$router->addRoute('GET', '/guest/booking-booking', [BookingController::class, 'guest_booking_booking']);
$router->addRoute('GET', '/guest/booking-cancel', [BookingController::class, 'guest_booking_cancel']);
$router->addRoute('GET', '/guest/booking-confirm', [BookingController::class, 'guest_booking_confirm']);
$router->addRoute('GET', '/guest/booking-finish', [BookingController::class, 'guest_booking_finish']);
$router->addRoute('POST', '/guest/booking-finish/{id}', [BookingController::class, 'guest_booking_finish_action']);
//$router->addRoute('GET', '/guest/booking/available', [GuestController::class,'booking_available']);
//$router->addRoute('GET', '/guest/booking/pending', [GuestController::class,'booking_pending']);
$router->addRoute('POST', '/guest/booking/update-booking', [BookingController::class, 'booking_update_booking']);
$router->addRoute('POST', '/guest/booking/update-cancel', [BookingController::class, 'booking_update_cancel']);
$router->addRoute('POST', '/guest/booking-update/{id}', [BookingController::class, 'booking_update_guest']);
$router->addRoute('GET', '/guest/booking/print/{id}', [BookingController::class, 'booking_print']);
$router->addRoute('POST', '/guest/booking/update/{id}', [BookingController::class, 'booking_update']);
$router->addRoute('GET', '/guest/booking-edit/{id}', [BookingController::class, 'booking_detail_edit']);
$router->addRoute('GET', '/guest/booking/{id}', [BookingController::class, 'booking_detail']);
// Dispatch the route
$router->dispatch();

