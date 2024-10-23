<?php

require_once 'core/controller.php';
require('views/assets/php/guest_login.php');

class GuestController extends Controller
{
    private GuestModel $guestModel;
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private ImageService $imageService;

    public function __construct()

    {
        $this->guestModel = $this->model('GuestModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->imageService = $this->service('ImageService');

    }

//Guest
    public function profile()
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $data = ['guest' => $this->guestModel->findId($guestId)];
        $this->view('guest/profile/index', $data);
    }

    public function history()
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $data = ['guest' => $this->bookingModel->findIdGuest($guestId)];
        $this->view('guest/history', $data);
    }

    public function room()
    {
        $session = getSessionGuest();
        $guestId = $session->id;
//        $data = ['rooms' => $this->roomModel->findIdGuest($guestId)];
        $data = ['rooms' => $this->roomModel->findAll()];
        $this->view('guest/room/index', $data);
    }
    public function room_available()
    {
        $session = getSessionGuest();
        $guestId = $session->id;
//        $data = ['rooms' => $this->roomModel->findIdGuest($guestId)];
        $data = ['rooms' => $this->roomModel->findAllStatus(1)];
        $this->view('guest/room/index', $data);
    }
    public function room_empty()
    {
        $session = getSessionGuest();
        $guestId = $session->id;
//        $data = ['rooms' => $this->roomModel->findIdGuest($guestId)];
        $data = ['rooms' => $this->roomModel->findAllStatus(0)];
        $this->view('guest/room/index', $data);
    }

    public function room_detail($id)
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $this->view('guest/room/detail', ['room' => $this->roomModel->findId($id)]);
    }

    public function booking()
    {
        $session = getSessionGuest();
        $guestId = $session->id;

        $this->view('guest/booking/index',
            ['bookings' => $this->roomModel->findIdGuest($guestId)]
        );
    }

    public function booking_booking()
    {
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestStatus($guestId, 'booking');
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function booking_cancel()
    {
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data =  $this->bookingModel->findIdGuestStatus($guestId, 'cancel');
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }


    public function booking_detail($id)
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $data = ['booking' => $this->bookingModel->findId($id)];
        $this->view('guest/booking/detail', $data);
    }


    public function booking_print($id)
    {
        $session = getSessionGuest();
//        $id = $session->id;
        $data = ['booking' => $this->bookingModel->findId($id)];
        $this->view('guest/booking/print', $data);
    }


    public function booking_create()
    {
        $data = [
            'check_in_date' => trim($_POST['check_in_date']),
            'check_out_date' => trim($_POST['check_out_date']),
            'total_price' => trim($_POST['total_price']),
            'status' => trim($_POST['status']),
            'roomId' => trim($_POST['roomId']),

        ];
        $session = getSessionGuest();
        $guestId = $session->id;
//        print_r($data);
//        print_r($guestId);
        $this->bookingModel->create((int)$guestId, $data['roomId'], 'pending', $data);
        $this->redirect(
            '/guest/booking',
            ['message' => 'success booked room']
        );
    }


    public function booking_update_booking()
    {
        try {
            $id_booking = trim($_POST['booking_id']);
            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->status_booking((int)$id_booking);
            $this->redirect('/guest/booking');
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }


    public function booking_update_cancel()
    {
        try {
            $id_booking = trim($_POST['booking_id']);
            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->status_cancel((int)$id_booking);

            $this->redirect('/guest/booking');
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }


    public function booking_update($id)
    {
        $data = [
            'check_in_date' => trim($_POST['check_in_date']),
            'check_out_date' => trim($_POST['check_out_date']),
            'total_price' => trim($_POST['total_price']),
            'status' => trim($_POST['status']),

        ];

        $session = getSessionGuest();
        $guestId = $session->id;
        $this->bookingModel->update($id, $guestId, 'booking', $data);
//        ['guest' => ]
        $this->redirect('guest/room/index');
    }


    //  admin //
    public function index()
    {
        $data = ['guests' => $this->guestModel->findAll()];
        $this->view('admin/guest/index', $data);

    }

    public function detail($id)
    {
        $data = ['guest' => $this->guestModel->findId($id)];
        $this->view('admin/guest/detail', $data);
    }


    public function create()
    {
        $this->view('admin/guest/create');
    }

    public function store()
    {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                'phone' => trim($_POST['phone']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'address' => trim($_POST['address']),
                'pin_code' => trim($_POST['pin_code']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];
            if ($data['password'] !== $data['confirm_password']) {
                throw new Exception("Passwords do not match!");
            }
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

            $responseDB = $this->guestModel->create($data);
            $this->imageService->saveImage($responseDB, $data['image']);
            $this->redirect('/admin/guest');
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/guest');
        }

    }

    public function update($id)
    {
        $data = ['guest' => $this->guestModel->findId($id)];
        $this->view('admin/guest/update', $data);
    }

    public function edit($id)
    {

        try {
            $data = [
                'name' => trim($_POST['name']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                'phone' => trim($_POST['phone']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'address' => trim($_POST['address']),
                'pin_code' => trim($_POST['pin_code']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];
//            print_r($data);
            if ($data['password'] !== $data['confirm_password']) {
                throw new Exception("Passwords do not match!");
            }
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
////
            $responseDB = $this->guestModel->update($id, $data);
            $this->imageService->saveImage($responseDB, $data['image']);
            $this->redirect('/admin/guest',
                ['message' => 'success update guest']
            );
        } catch (Exception $e) {
            print_r($e->getMessage());

            $this->redirect(
                '/admin/guest/update/' . $id,
                ['message' => $e->getMessage()]
            );
        }
    }
}
