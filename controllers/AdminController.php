<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';
require_once 'models/RoomModel.php';
require_once 'models/GuessModel.php';

class AdminController extends Controller
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
    $this->view('admin/index');
  }

  public function dashboard()
  {

    $this->view('admin/dashboard');
  }


  public function settings()
  {
    $data = [
      'setting_general' => $this->settingModel->findGeneral(),
      'setting_contact' => $this->settingModel->findContact(),
//      'setting_management' => $this->settingModel->findAll(),
    ];
//    print_r($data);
    $this->view('/admin/settings/index', $data
    );
  }

  public function setting_general_save($id)
  {
    try {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->settingModel->updateGeneral($id, $_POST);
        header('Location: /admin/settings');
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function setting_contact_save($id)
  {
    try {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->settingModel->updateContact($id, $_POST);
        header('Location: /admin/settings');
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function setting_management()
  {
    $this->view('admin/settings/index');
  }

  public function setting_management_save()
  {
    $this->view('admin/settings/index');
  }


  public function login()
  {

    $this->view('admin/dashboard');
  }


  public function room_all()
  {
//    print_r($data);
    $data = ['rooms' => $this->roomModel->findAll()];
    $this->view('admin/room/index', $data);

  }

  public function room_create()
  {
    $this->view('admin/room/create');
  }

  public function room_store()
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


  public function room_detail($id)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/detail', $data);
  }

  public function room_update($id)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/update', $data);
  }

  public function room_edit($id, $data)
  {
    $data = ['room' => $this->roomModel->findId($id)];
    $this->view('admin/room/detail', $data);
  }




}