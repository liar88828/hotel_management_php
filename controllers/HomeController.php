<?php


class HomeController extends Controller
{

    private RoomModel $roomModel;
    private TestimonialModel $testimonialModel;
    private CarouselModel $carouselModel;
    private RoomImagesModel $roomImagesModel;
    private SettingModel $settingModel;
    private StaffModel $staffModel;
    private GuestModel $guestModel;

    // Constructor to initialize database connection
    public function __construct()
    {
        $this->roomModel = $this->model('RoomModel');
        $this->roomImagesModel = $this->model('RoomImagesModel');
        $this->testimonialModel = $this->model('TestimonialModel');
        $this->carouselModel = $this->model('CarouselModel');
        $this->settingModel = $this->model('SettingModel');
        $this->staffModel = $this->model('StaffModel');
        $this->guestModel = $this->model('GuestModel');
    }


    public function index(): void
    {
        $this->layout('home');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('home/index', [
                'title' => 'ASRAMA DIKLAT - HOME',
                'rooms' => $this->roomModel->findHome(),
                'testimonials' => $this->testimonialModel->findAll(),
                'carousels' => $this->carouselModel->findAll(),
            ]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->check_booking_availability();
        }
    }

    public function check_booking_availability(): void
    {
        try {
            /** @var RoomBase|BookingBase $data */
            $data = [
                'children' => filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT),
                'adult' => filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT),
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
            ];
//            print_r($data);
            $this->view('home/index', [
                'rooms' => $this->roomModel->find_check_booking_availability($data),
                'testimonials' => $this->testimonialModel->findAll(),
                'carousels' => $this->carouselModel->findAll(),
            ]);
        } catch (exception $e) {
//            print_r('error bos');
//            print_r($e->getMessage());
            if ($e instanceof PDOException) {

                $this->redirect('/', ['message' => 'Server Sibuk']);
            }
            $this->redirect('/', ['message' => 'data is not found']);
        }
    }

    public function test(): void
    {

        $this->view('test/test');
    }


    public function room(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data = ['rooms' => $this->roomModel->findHome()];
            $this->view('home/room', $data);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->room_search();
        }

    }

    public function room_search(): void
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                $this->view('home/room',
                    ['rooms' => $this->roomModel->findSearch($data)]
                );
            }
        } catch (PDOException|Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/room', ['message' => 'Server Sibuk']);
            }
            $this->redirect('/room', ['message' => 'data is not found']);
        }
    }


    public function room_detail($id): void
    {
        try {
            $this->layout('home');

            $data = ['room' => $this->roomModel->findId($id),
                'room_images' => $this->roomImagesModel->findAll($id)];
            $this->view('home/roomDetail', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/room', ['message' => 'Server Sibuk']);
            }
            $this->redirect('/room', ['message' => 'data is not found']);
        }

    }


    public function facility(): void
    {

        $this->view('home/facility');
    }

    public function contact(): void
    {

        $this->view('home/contact');
    }

    public function about(): void
    {
        try {
            $this->view('home/about', [
                'setting' => $this->settingModel->findGeneral(),
                'staff' => $this->staffModel->findAll(),
                'room_count' => $this->roomModel->countRoom(),
                'guest_count' => $this->guestModel->countGuest(),
                'member_staff' => $this->staffModel->findAll(),
            ]);
        } catch (Exception $e) {
            $this->view('home/about', [
                'setting' => [],
                'staff' => []
            ]);
        }
    }

    public function testimonial(): void
    {

        $data = ['testimonials' => $this->testimonialModel->findAll()];
        $this->view('home/testimonial', $data);
    }

    public function detail($id): void
    {
        print_r($id);
        $data = [
            'test' => $id
        ];

        $this->view('home/detail', $data);
    }


}