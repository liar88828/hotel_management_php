<?php


class AdminController extends Controller
{

//    private AdminModel $adminModel;
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private GuestModel $guestModel;
    private StaffModel $staffModel;
    private SettingModel $settingModel;
    private ImageService $imageService;


    // Constructor to initialize database connection
    public function __construct()
    {
//        $this->adminModel = $this->model('AdminModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->guestModel = $this->model('GuestModel');
        $this->staffModel = $this->model('StaffModel');
        $this->settingModel = $this->model('SettingModel');
        $this->imageService = $this->service('ImageService');


    }


    public function index(): void
    {
        $this->layout('admin');
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
            $this->layout('admin');
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
            'setting_management' => $this->staffModel->findAll(),
        ];
        $this->layout('admin');
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

    public function create_staff(): void
    {

        // Register function
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->redirect('/admin/settings');
            }

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                /** @var StaffBase $data */
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                    'phone' => trim($_POST['phone']),
                    'image' => $_FILES['image']['name'], // Handle file upload separately
                    'address' => trim($_POST['address']),
                    'pin_code' => trim($_POST['pin_code']),
                    'date_of_birth' => trim($_POST['date_of_birth']),
                    'position' => trim($_POST['position']),
                ];
                $request = $this->staffModel->createMember($data);
                $this->imageService->saveImage($request, $data['image']);
                $this->redirect('/admin/settings');
            }

        } catch (Exception $e) {
            // Handle error (log it or display guess-friendly message)
//            echo "Error: " . $e->getMessage();
            $this->redirect('/admin/settings');


        }

    }


    public
    function setting_contact_save($id): void
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


    public
    function setting_management(): void
    {
        $this->view('admin/settings/index');
    }

    public
    function setting_management_save()
    {
        $this->view('admin/settings/index');
    }


    public
    function login()
    {

        $this->view('admin/dashboard');
    }


}