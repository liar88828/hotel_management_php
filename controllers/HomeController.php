<?php

require_once 'core/controller.php';

class HomeController extends Controller
{

  private RoomModel $roomModel;

  // Constructor to initialize database connection
  public function __construct()
  {
    $this->roomModel = $this->model('RoomModel');

  }


  public function index()
  {

    $this->view('home/index');
  }

  public function room()
  {

    $data = ['rooms' => $this->roomModel->findHome()];
    $this->view('home/room', $data);
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

    $this->view('home/testimonial');
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