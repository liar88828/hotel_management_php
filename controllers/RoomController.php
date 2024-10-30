<?php

use Cassandra\Exception\ValidationException;

class RoomController extends Controller
{

//    private AdminModel $adminModel;
//    private GuestModel $userModel;
    private RoomModel $roomModel;
    private RoomImagesModel $roomImagesModel;
    private ImageService $imageService;


    // Constructor to initialize database connection
    public function __construct()
    {
//        $this->adminModel = $this->model('AdminModel');
//        $this->userModel = $this->model('GuestModel');
        $this->roomModel = $this->model('RoomModel');
        $this->roomImagesModel = $this->model('RoomImagesModel');
        $this->imageService = $this->service('ImageService');
    }


    public function index(): void
    {
        try {
            $this->layout('admin');
            getSessionAdmin();

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['rooms' => $this->roomModel->findAll()];
                $this->view('admin/room/index', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->search();
            }
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/', ['message' => 'Database sibuk']);
            }
            $this->redirect('/', ['message' => $e->getMessage()]);
        }
    }

    public function search(): void
    {
        try {
            $this->view('admin/room/index', ['rooms' => $this->roomModel->findName(trim($_POST['search']))]);
        } catch (Exception $e) {

            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }

    public function available_action(mixed $id): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->roomModel->statusAction($id, trim((bool)$_POST['status']));
                $this->redirect('/admin/room', ['message' => 'Room status updated successfully']);
            }
        } catch (Exception $e) {
            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }

    public function available(): void
    {
        try {
            getSessionAdmin();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->layout('admin');
                $this->view('admin/room/index', ['rooms' => $this->roomModel->status(true)]);
            }

        } catch (Exception $e) {
            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }

    public function full(): void
    {

        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view('admin/room/index', ['rooms' => $this->roomModel->status(false)]);
        } catch (Exception $e) {
            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }


    public function detail_admin(int $id): void
    {
        try {
            getSessionAdmin();
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $data = [
                    'room' => $this->roomModel->findId($id),
                    'room_images' => $this->roomImagesModel->findAll($id)
                ];
                $this->layout('admin');
                $this->view('admin/room/detail', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                /** @var RoomBase $data */
                $data = [
                    'image' => $_FILES['image']['name'],
                    'room_id' => $id,
                    'thumb' => false,
                ];
                $responseDB = $this->roomImagesModel->create($data);
                $this->imageService->saveImage($responseDB, $data['image'], 'images/rooms/');
                $this->redirect("/admin/room/$id", ['message' => 'Success']);
            }

        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect("/admin/room/$id", ['message' => 'Server Sibuk']);
            }
            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }


    public function detail_admin_delete(int $id): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                /** @var RoomImageBase $data */
                $data = $this->roomImagesModel->findId($id);
                $this->roomImagesModel->delete($data->id);
                $this->imageService->deleteImage("images/rooms/$data->image");
                $this->redirect("/admin/room/$data->room_id", ['message' => 'Delete Success']);
            }
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect("/admin/room", ['message' => 'Server Sibuk']);
            }
            $this->redirect('/admin/room', ['message' => $e->getMessage()]);
        }
    }


    public function detail(int $id): void
    {
        try {
            $data = ['room' => $this->roomModel->findId($id)];
            $this->layout('admin');
            $this->view('home/room/detail', $data);
        } catch (Exception $e) {
            $this->redirect('/home/room', ['message' => $e->getMessage()]);
        }
    }


    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $this->layout('admin');
            $this->view('admin/room/create');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->store();
        }
    }

    public function store(): void
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
                $this->redirect('/admin/room', ['message' => 'Success']);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $this->redirect('/admin/room/create', ['message' => 'error ']);
        }
    }


    public function update($id): void
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $data = ['room' => $this->roomModel->findId($id)];
                $this->layout('admin');
                $this->view('admin/room/update', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->edit($id);
            }
        } catch (Exception $e) {
            $this->redirect("/admin/room/update/$id", ['message' => $e->getMessage()]);
        }
    }

    public function edit(int $id): void
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $this->redirect(
                '/admin/room/update',
                ['message' => 'error ']);
        }
    }

    public function guest_index(): void
    {
        try {
            $this->layout('guest');
            $session = getSessionGuest();
            $guestId = $session->id;
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $this->view('guest/room/index', ['rooms' => $this->roomModel->findAllGuest($guestId)]);
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->view('guest/room/index', ['rooms' => $this->roomModel->findAllGuestSearch($_POST['search'], $guestId)]);
            }
        } catch (Exception $e) {
//            print_r($e->getMessage());
            $this->redirect('/guest/room', ['message' => 'data is not found']);
        }
    }

    public function guest_filter(): void
    {
        try {
            getSessionGuest();
            /** @var RoomBase|BookingBase $data */
            $data = [
                'children' => filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT),
                'adult' => filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT),
//
                "wifi" => isset($_POST['wifi']) ? 1 : 0,
                "television" => isset($_POST['television']) ? 1 : 0,
                "ac" => isset($_POST['ac']) ? 1 : 0,
                "cctv" => isset($_POST['cctv']) ? 1 : 0,
                "dining_room" => isset($_POST['dining_room']) ? 1 : 0,
                "parking_area" => isset($_POST['parking_area']) ? 1 : 0,
                "security" => isset($_POST['security']) ? 1 : 0,
//
                'check_in_date' => filter_var($_POST['check_in_date']),
                'check_out_date' => filter_var($_POST['check_out_date'], FILTER_SANITIZE_NUMBER_INT),
            ];
            $this->view('guest/room/index',
                ['rooms' => $this->roomModel->findSearch($data)]
            );
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/guest/room', ['message' => 'data is not found']);
        }
    }


    public function guest_room_detail($id): void
    {
        try {
            getSessionGuest();
            $this->layout('guest');
            $this->view('guest/room/detail', ['room' => $this->roomModel->findId($id)]);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }


}