<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';
require_once 'models/RoomModel.php';
require_once 'models/GuestModel.php';
require_once 'services/ImageService.php';

class RoomController extends Controller
{

    private AdminModel $adminModel;
    private RoomModel $roomModel;
    private GuestModel $userModel;
    private ImageService $imageService;


    // Constructor to initialize database connection
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->roomModel = $this->model('RoomModel');
        $this->userModel = $this->model('GuestModel');
        $this->imageService = $this->service('ImageService');
    }


    public function index()
    {
//    print_r($data);
        $data = ['rooms' => $this->roomModel->findAll()];
        $this->view('admin/room/index', $data);
    }

    public function detail_admin(int $id)
    {
        $data = ['room' => $this->roomModel->findId($id)];
        $this->view('admin/room/detail', $data);
    }

    public function detail(int $id)
    {
        $data = ['room' => $this->roomModel->findId($id)];
        $this->view('home/room/detail', $data);
    }


    public function create()
    {
        $this->view('admin/room/create');
    }

    public function store()
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $data = [
                    'name' => trim($_POST['name']),
                    'area' => trim($_POST['area']),
                    'image' => $_FILES['image']['name'], // Image handled separately as above
                    'price' => filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT),
                    'quantity' => filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT),
                    'adult' => filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT),
                    'children' => filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT),
                    'description' => trim($_POST['description']),
                    'status' => filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT), // Assuming status is an int
                    'wifi' => isset($_POST['wifi']) ? 1 : 0,
                    'television' => isset($_POST['television']) ? 1 : 0,
                    'ac' => isset($_POST['ac']) ? 1 : 0,
                    'cctv' => isset($_POST['cctv']) ? 1 : 0,
                    'dining_room' => isset($_POST['dining_room']) ? 1 : 0,
                    'parking_area' => isset($_POST['parking_area']) ? 1 : 0,
                    'bedrooms' => isset($_POST['bedrooms']) ? filter_var($_POST['bedrooms'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'bathrooms' => isset($_POST['bathrooms']) ? filter_var($_POST['bathrooms'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'wardrobe' => isset($_POST['wardrobe']) ? filter_var($_POST['wardrobe'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'security' => isset($_POST['security']) ? 1 : 0,
                ];
                $responseDB = $this->roomModel->create($data);
                $this->imageService->saveImage($responseDB, $data['image'], 'images/rooms/');
                $this->redirect('/admin/room',
                    ['message' => 'Success']);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $this->redirect('/admin/room/create',
                ['message' => 'error ']);
        }
    }


    public function update($id)
    {
        $data = ['room' => $this->roomModel->findId($id)];
        $this->view('admin/room/update', $data);
    }

    public function edit(int $id)
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {


                $data = [
                    'name' => trim($_POST['name']),
                    'area' => trim($_POST['area']),
                    'image' => $_FILES['image']['name'], // Image handled separately as above
                    'price' => filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT),
                    'quantity' => filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT),
                    'adult' => filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT),
                    'children' => filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT),
                    'description' => trim($_POST['description']),
                    'status' => filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT), // Assuming status is an int
                    'wifi' => isset($_POST['wifi']) ? 1 : 0,
                    'television' => isset($_POST['television']) ? 1 : 0,
                    'ac' => isset($_POST['ac']) ? 1 : 0,
                    'cctv' => isset($_POST['cctv']) ? 1 : 0,
                    'dining_room' => isset($_POST['dining_room']) ? 1 : 0,
                    'parking_area' => isset($_POST['parking_area']) ? 1 : 0,
                    'bedrooms' => isset($_POST['bedrooms']) ? filter_var($_POST['bedrooms'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'bathrooms' => isset($_POST['bathrooms']) ? filter_var($_POST['bathrooms'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'wardrobe' => isset($_POST['wardrobe']) ? filter_var($_POST['wardrobe'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'security' => isset($_POST['security']) ? 1 : 0,
                ];


                $responseDB = $this->roomModel->update($id, $data);
                $this->imageService->saveImage($responseDB, $data['image'], 'images/rooms/');
                $this->redirect('/admin/room',
                    ['message' => 'Success']);

            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $this->redirect(
                '/admin/room/update',
                ['message' => 'error ']);
        }
    }


}