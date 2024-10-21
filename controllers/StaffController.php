<?php

require_once 'core/controller.php';

class StaffController extends Controller
{
  private StaffModel $staffModel;

  public function __construct()
  {
    $this->staffModel = $this->model('StaffModel');
  }

  //  admin //
  public function index()
  {
    $data = ['guests' => $this->staffModel->findAll()];
    $this->view('admin/staff/index', $data);

  }

  public function detail($id)
  {
    $data = ['guest' => $this->staffModel->findId($id)];
    $this->view('admin/staff/detail', $data);
  }


  public function create()
  {
    $this->view('admin/staff/create');
  }

  public function store()
  {
    $this->staffModel->create($_POST);
    header('Location: /admin/staff/index');

  }

  public function update($id)
  {
    $data = ['guest' => $this->staffModel->findId($id)];
    $this->view('admin/staff/update', $data);
  }

  public function edit($id)
  {
    $data = ['staffs' => $this->staffModel->update($id, $_POST)];
    $this->view('admin/staff/update', $data);
  }

}
