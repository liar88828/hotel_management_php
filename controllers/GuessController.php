<?php

require_once 'core/controller.php';

class GuessController extends Controller
{
  private GuessModel $guessModel;

  public function __construct()
  {
    $this->guessModel = $this->model('GuessModel');
  }


  //  admin //
  public function index()
  {
    $data = ['guests' => $this->guessModel->findAll()];
    $this->view('admin/guess/index', $data);

  }

  public function detail($id)
  {
    $data = ['guest' => $this->guessModel->findId($id)];
    $this->view('admin/guess/detail', $data);
  }


  public function create()
  {
    $this->view('admin/guess/create');
  }

  public function store()
  {
    $this->guessModel->create($_POST);
    header('Location: /admin/guess/index');

  }

  public function update($id)
  {
    $data = ['guest' => $this->guessModel->findId($id)];
    $this->view('admin/guess/update', $data);
  }

  public function edit($id)
  {
    $data = ['guesss' => $this->guessModel->update($id, $_POST)];
    $this->view('admin/guess/update', $data);
  }
}
