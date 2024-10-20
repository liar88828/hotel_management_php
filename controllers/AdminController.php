<?php
require_once 'core/controller.php';

class AdminController extends Controller
{

  public function index()
  {
    $this->view('admin/index');
  }

  public function dashboard()
  {

    $this->view('admin/dashboard');
  }


  public function settings()
  {
    $this->view('admin/settings');
  }
  public function logout()
  {
    $this->view('admin/logout');
  }


}