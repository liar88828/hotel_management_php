<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';
require_once 'models/RoomModel.php';
require_once 'models/GuessModel.php';

class RoomController extends Controller
{

  private AdminModel $adminModel;
  private RoomModel $roomModel;
  private GuessModel $userModel;
  private SettingModel $settingModel;

  // Constructor to initialize database connection
  public function __construct()
  {
    $this->adminModel = $this->model('AdminModel');
    $this->roomModel = $this->model('RoomModel');
    $this->userModel = $this->model('GuessModel');
    $this->settingModel = $this->model('SettingModel');

  }




  public function index()
  {
//    print_r($data);
    $data = ['rooms' => $this->roomModel->findAll()];
    $this->view('admin/room/index', $data);

  }
  public function detail($id)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/detail', $data);
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
        $this->roomModel->create($_POST);
        header('Location: /admin/room/index');
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }



  public function update($id)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/update', $data);
  }

  public function edit($id, $data)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/detail', $data);
  }




}