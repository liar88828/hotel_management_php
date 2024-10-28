<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';
require_once 'models/RoomModel.php';
require_once 'models/GuestModel.php';

class AdminController extends Controller
{

//    private AdminModel $adminModel;
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private GuestModel $guestModel;
    private SettingModel $settingModel;

    // Constructor to initialize database connection
    public function __construct()
    {
//        $this->adminModel = $this->model('AdminModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->guestModel = $this->model('GuestModel');
        $this->settingModel = $this->model('SettingModel');

    }


    public function index(): void
    {
        $this->view('admin/index');
    }

    public function dashboard(): void
    {
        try {

            $data = [
                'count_guest' => $this->guestModel->countGuest(),
                'count_guest_booking' => $this->bookingModel->countGuestBookingNow(),
                'count_guest_confirm' => $this->bookingModel->countGuestConfirmNow(),
//
                'count_room' => $this->roomModel->countRoom(),
                'count_room_available' => $this->roomModel->countRoomAvailable(),
                'count_room_full' => $this->roomModel->countRoomFull(),
                'count_room_booking' => $this->roomModel->countRoomBooking(),
//
                'count_booking' => $this->bookingModel->countBooking(),
                'count_booking_room' => $this->bookingModel->countBookingRoom(),
                'count_booking_guest' => $this->bookingModel->countBookingGuest(),
                'count_booking_booking' => $this->bookingModel->countGuestBooking(),
                'count_booking_cancel' => $this->bookingModel->countGuestCancel(),
                'count_booking_confirm' => $this->bookingModel->countGuestConfirm(),
                'count_booking_finish' => $this->bookingModel->countBookingFinish(),
            ];
//print_r($data);
            $this->view('admin/dashboard', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
//                $this->redirect('');
                $this->view('admin/dashboard', ['message ']);

            }

        }
    }


    public function settings(): void
    {
        $data = [
            'setting_general' => $this->settingModel->findGeneral(),
            'setting_contact' => $this->settingModel->findContact(),
//      'setting_management' => $this->settingModel->findAll(),
        ];
//    print_r($data);
        $this->view('/admin/settings/index', $data);
    }

    public function setting_general_save($id): void
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


    public function setting_contact_save($id): void
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


    public function setting_management(): void
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