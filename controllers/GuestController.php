<?php

require_once 'core/controller.php';

class GuestController extends Controller
{
    private GuestModel $guestModel;
    private ImageService $imageService;

    public function __construct()

    {
        $this->guestModel = $this->model('GuestModel');
        $this->imageService = $this->service('ImageService');

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
