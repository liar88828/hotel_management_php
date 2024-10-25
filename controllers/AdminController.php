<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';
require_once 'models/RoomModel.php';
require_once 'models/GuestModel.php';

class AdminController extends Controller
{

    private AdminModel $adminModel;
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private GuestModel $guestModel;
    private SettingModel $settingModel;

    // Constructor to initialize database connection
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->guestModel = $this->model('GuestModel');
        $this->settingModel = $this->model('SettingModel');

    }


    public function index()
    {
        $this->view('admin/index');
    }

    public function dashboard()
    {
$data=[
    'count_guest'=>$this->guestModel->countGuest(),
//
    'count_guest_booking'=>$this->bookingModel->countGuestBooking(),
//
    'count_room'=>$this->roomModel->countRoom(),
    'count_room_active'=>$this->roomModel->countRoomActive(),
    'count_room_empty'=>$this->roomModel->countRoomEmpty(),
    'count_room_booking'=>$this->roomModel->countRoomBooking(),
//
    'count_booking'=>$this->bookingModel->countBooking(),
    'count_booking_room'=>$this->bookingModel->countBookingRoom(),
    'count_booking_guest'=>$this->bookingModel->countBookingGuest(),
];
//print_r($data);
        $this->view('admin/dashboard',$data);
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
                $this->redirect('/admin/settings');
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


}