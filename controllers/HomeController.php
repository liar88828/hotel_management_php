<?php

require_once 'core/controller.php';

class HomeController extends Controller
{

    private RoomModel $roomModel;
    private TestimonialModel $testimonialModel;
    private CarouselModel $carouselModel;

    // Constructor to initialize database connection
    public function __construct()
    {
        $this->roomModel = $this->model('RoomModel');
        $this->testimonialModel = $this->model('TestimonialModel');
        $this->carouselModel = $this->model('CarouselModel');


    }


    public function index()
    {


        $this->view('home/index', [
            'rooms' => $this->roomModel->findHome(),
            'testimonials' => $this->testimonialModel->findAll(),
            'carousels' => $this->carouselModel->findAll(),
        ]);
    }

    public function check_booking_availability()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->redirect('/');
        }
        try {

            $children = filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT);
            $adult = filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT);
            $check_in_date = filter_var($_POST['check_in_date'], FILTER_SANITIZE_NUMBER_INT);
            $check_out_date = filter_var($_POST['check_out_date'], FILTER_SANITIZE_NUMBER_INT);
            $this->view('home/index', [
                'rooms' => $this->roomModel->find_check_booking_availability($children, $adult, $check_in_date, $check_out_date),
                'testimonials' => $this->testimonialModel->findAll(),
                'carousels' => $this->carouselModel->findAll(),
            ]);

        } catch (exception $e) {
            print_r($e->getMessage());
            print_r('error bos');
            $this->redirect('/', ['message' => 'data is not found']);
        }
    }

    public function test()
    {

        $this->view('home/test');
    }


    public function room()
    {

        $data = ['rooms' => $this->roomModel->findHome()];
        $this->view('home/room', $data);
    }

    public function room_search()
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    'children' => filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT),
                    'adult' => filter_var($_POST['adult'], FILTER_SANITIZE_NUMBER_INT),
//
                    "wifi" =>  isset($_POST['wifi']) ? 1 : 0,
                    "television" =>  isset($_POST['television']) ? 1 : 0,
                    "ac" =>  isset($_POST['ac']) ? 1 : 0,
                    "cctv" =>  isset($_POST['cctv']) ? 1 : 0,
                    "dining_room" =>  isset($_POST['dining_room']) ? 1 : 0,
                    "parking_area" =>  isset($_POST['parking_area']) ? 1 : 0,
                    "security" =>  isset($_POST['security']) ? 1 : 0,
//
                    'check_in_date' => filter_var($_POST['check_in_date']),
                    'check_out_date' => filter_var($_POST['check_out_date'], FILTER_SANITIZE_NUMBER_INT),
                ];
                $this->view('home/room',
                    ['rooms' => $this->roomModel->findSearch($data)]
                );
            }
        } catch (Exception $e) {
            $this->redirect('/room', ['message' => 'data is not found']);
        }
    }


    public function room_detail($id)
    {

        $data = ['room' => $this->roomModel->findId($id)];
        $this->view('home/roomDetail', $data);

    }


    public function facility()
    {

        $this->view('home/facility');
    }

    public function contact()
    {

        $this->view('home/contact');
    }

    public function about()
    {

        $this->view('home/about');
    }

    public function testimonial()
    {

        $data = ['testimonials' => $this->testimonialModel->findAll()];
        $this->view('home/testimonial', $data);
    }

    public function detail($id)
    {
        print_r($id);
        $data = [
            'test' => $id
        ];

        $this->view('home/detail', $data);
    }


}