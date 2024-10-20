<?php

require_once 'core/controller.php';

class HomeController extends Controller
{

  public function index()
  {

    $this->view('home/index');
  }

  public function room()
  {

    $this->view('home/room');
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


}