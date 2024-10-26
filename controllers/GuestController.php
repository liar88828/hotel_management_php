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
    public function profile(): void
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $data = ['guest' => $this->guestModel->findId($guestId)];
        $this->view('guest/profile/index', $data);
    }

    public function profile_update(): void
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        $this->view(
            'guest/profile/update',
            ['guest' => $this->guestModel->findId($guestId)]
        );
    }
//    public function profile_edit()
//    {
//        $session = getSessionGuest();
//        $guestId = $session->id;
//        $data = ['guest' => $this->guestModel->findId($guestId)];
//        $this->view('guest/profile/index', $data);
//    }


    public function profile_edit(): void
    {

        $session = getSessionGuest();
        $guestId = $session->id;
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
            $responseDB = $this->guestModel->update($guestId, $data);
            $this->imageService->saveImage($responseDB, $data['image'], $guestId);
            $this->redirect('/guest/profile',
                ['message' => 'success update guest']
            );
        } catch (Exception $e) {
            print_r($e->getMessage());

            $this->redirect(
                '/admin/guest/update/' . $guestId,
                ['message' => $e->getMessage()]
            );
        }
    }


    public function history(): void
    {
        try {

            $session = getSessionGuest();
            $guestId = $session->id;
            $data = ['guest' => $this->bookingModel->findIdGuest($guestId)];
            $this->view('guest/history', $data);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }


    public function room_available(): void
    {
        getSessionGuest();
        try {

//        $data = ['rooms' => $this->roomModel->findIdGuest($guestId)];
            $data = ['rooms' => $this->roomModel->findAllStatus(1)];
            $this->view('guest/room/index', $data);
        } catch (Exception $e) {
            print_r($e->getMessage());

        }
    }

    public function room_empty(): void
    {
        getSessionGuest();
        try {

//        $data = ['rooms' => $this->roomModel->findIdGuest($guestId)];
            $data = ['rooms' => $this->roomModel->findAllStatus(0)];
            $this->view('guest/room/index', $data);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }


    //  admin //
    public function index(): void
    {
        $data = ['guests' => $this->guestModel->findAll()];
        $this->view('admin/guest/index', $data);

    }

    public function detail($id): void
    {
        $data = ['guest' => $this->guestModel->findId($id)];
        $this->view('admin/guest/detail', $data);
    }


    public function create()
    {
        $this->view('admin/guest/create');
    }

    public function store(): void
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
            $this->imageService->saveImage($responseDB, $data['image'], 'images/person/');
            $this->redirect('/admin/guest');
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/guest');
        }

    }

    public function update($id): void
    {
        $data = ['guest' => $this->guestModel->findId($id)];
        $this->view('admin/guest/update', $data);
    }

    public function edit($id): void
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
            $this->imageService->saveImage($responseDB, $data['image'], $id);
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
