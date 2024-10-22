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
        $data = [
            'rooms' => $this->roomModel->findHome(),
            'testimonials' => $this->testimonialModel->findAll(),
            'carousels' => $this->carouselModel->findAll(),
        ];

        $this->view('home/index', $data);
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

    public function room_search($id)
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = ['room' => $this->roomModel->findSearch($_POST)];
                $this->view('home/room', $data);
            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
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