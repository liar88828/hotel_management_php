<?php


class BookingController extends Controller
{
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private ImageService $imageService;
    private RoomImagesModel $roomImagesModel;
    private GuestModel $guestModel;

    public function __construct()

    {
        $this->guestModel = $this->model('GuestModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->roomImagesModel = $this->model('RoomImagesModel');
        $this->imageService = $this->service('ImageService');

    }


    public function guest_booking(): void
    {
        $this->layout('guest');
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $session = getSessionGuest();
                $guestId = $session->id;
                $this->view('guest/booking/index',
                    ['bookings' => $this->roomModel->findIdGuest($guestId),]
                );
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->guest_booking_search();
            }
        } catch (Exception $e) {
            $this->view('guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]
            );
        }
    }

    public function guest_booking_search(): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $this->view('guest/booking/index', [
                    'bookings' => $this->roomModel->findIdGuestSearch($guestId, $_POST['search']),
                ]
            );
        } catch (Exception $e) {
            $this->redirect('/guest/booking', [
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    public function guest_booking_create(): void
    {
        try {

            /** @var BookingBase $data */
            $data = [
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
                'total_price' => filter_var($_POST['total_price'] ?: 0, FILTER_SANITIZE_NUMBER_INT),
                'status' => trim($_POST['status']),
                'id_room' => trim($_POST['id_room']),
            ];
            if ($data['total_price'] == 0) {
                $form = [
                    'check_in_date' => trim($_POST['check_in_date']),
                    'check_out_date' => trim($_POST['check_out_date']),
                    'total_price' => filter_var($_POST['total_price'] ?: 0, FILTER_SANITIZE_NUMBER_INT),
                ];
                $this->redirect("/guest/room/{$data['id_room']}", [
                    'message' => 'please correct the date because the total price is 0',
                    $form
                ]);
            } else {


                $session = getSessionGuest();
                $guestId = $session->id;

                $this->bookingModel->create((int)$guestId, $data['id_room'], $data);
                $this->redirect(
                    '/guest/booking',
                    ['message' => 'success booked room']
                );
            }
        } catch (Exception $e) {
            $this->redirect('/guest/booking', ['message' => $e->getMessage()]);

        }
    }


    public function guest_booking_booking(): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestStatus($guestId, true);
            $this->view('guest/booking/index', ['bookings' => $data]
            );
        } catch (Exception $e) {
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_cancel(): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestStatus($guestId, false);
            $this->view('guest/booking/index', ['bookings' => $data]
            );
        } catch (Exception $e) {
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_cancel_action($id): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->findIdGuestStatusAction($id, $guestId, false);
            $this->redirect("/guest/booking/$id", ['message' => 'Update Success']
            );
        } catch (Exception $e) {
            $this->redirect("/guest/booking/$id",
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_confirm(): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestConfirm($guestId);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->view('/guest/booking/index',
                    [
                        'bookings' => [],
                        'message' => 'Database sibuk']);
            }
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_finish(): void
    {
        $this->layout('guest');
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestFinish($guestId);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->view('/guest/booking/index', ['message' => 'Database sibuk']);
            }
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_finish_action($id): void
    {
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->findIdGuestFinishAction($id, $guestId);
            $this->redirect(
                '/guest/booking/finish',
                ['message' => 'success']
            );
        } catch (Exception $e) {
            $this->redirect('/guest/booking/confirm',
                ['message' => $e->getMessage()]);
        }
    }


    public function booking_detail($id): void
    {
        try {
            getSessionGuest();
            $data = $this->bookingModel->findId($id);
            $this->layout('guest');
            $this->view(
                'guest/booking/detail',
                [
                    'room' => $this->roomModel->findId($data->id_room),
                    'booking' => $data,
                    'room_images' => $this->roomImagesModel->findAll($data->id_room)
                ]);
        } catch (Exception $e) {
            $this->redirect('/guest/booking/index',
                ['message' => $e->getMessage()]);
        }
    }

    public function booking_detail_edit($id): void
    {
        try {
            getSessionGuest();
            $data = ['booking' => $this->bookingModel->findId($id)];
            $this->layout('guest');
            $this->view('guest/booking/edit', $data);
        } catch (Exception $e) {
            $this->redirect('/guest/booking/index', ['message' => $e->getMessage()]);
        }
    }


    public function booking_print($id): void
    {
        $this->layout('guest');
        try {

            $session = getSessionGuest();
            $idGuest = $session->id;
            /** @var BookingBase $data */
            $data = $this->bookingModel->findIdPrintGuest($id, $idGuest);
            $this->view('guest/booking/print', [
                'booking' => $data,
                'guest' => $this->guestModel->findId($idGuest),
                'room' => $this->roomModel->findId($data->room_id)

            ]);
        } catch (Exception $e) {

            $this->view('guest/booking/print',
                ['booking' => [],
                    'message' => $e->getMessage()]);
        }
    }


    public function booking_create(): void
    {
        try {

            /** @var BookingBase $data */
            $data = [
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
                'total_price' => trim($_POST['total_price']),
                'status' => trim($_POST['status']),
                'roomId' => trim($_POST['roomId']),

            ];
            if ($data['total_price'] == 0) {
                $this->redirect('/guest/booking/create', ['message' => 'please correct the date because the total price is 0']);
            }
            $session = getSessionGuest();
            $guestId = $session->id;
//        print_r($data);
//        print_r($guestId);
            $this->bookingModel->create((int)$guestId, $data['roomId'], $data);
            $this->redirect(
                '/guest/booking',
                ['message' => 'success booked room']
            );
        } catch (Exception $e) {
            $this->redirect('/guest/booking', ['message' => $e->getMessage()]);

        }
    }


    public function booking_update_booking()
    {
        try {
            $id_booking = trim($_POST['booking_id']);
            $session = getSessionGuest();
            $guestId = $session->id;
//            $this->bookingModel->status_booking((int)$id_booking);
            $this->bookingModel->status((int)$id_booking, 1);

            $this->redirect('/guest/booking');
        } catch (Exception $e) {
//            print $e->getMessage();
            $this->redirect('/guest/booking', ['message' => $e->getMessage()]);
        }
    }


    public function booking_update_cancel(): void
    {
        try {
            getSessionGuest();
            $id_booking = trim($_POST['booking_id']);
//            $guestId = $session->id;
            $this->bookingModel->status((int)$id_booking, 0);
            $this->redirect('/guest/booking');
        } catch (Exception $e) {
//            print $e->getMessage();
            $this->redirect('/guest/booking', ['message' => $e->getMessage()]);

        }
    }


    public function booking_update($id): void
    {
        try {

            /** @var BookingBase $data */
            $data = [
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
                'total_price' => trim($_POST['total_price']),
                'status' => trim($_POST['status']),

            ];

            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->update($id, $guestId, 'booking', $data);
//        ['guest' => ]
            $this->redirect('guest/room/index');
        } catch (Exception $e) {
            $this->redirect('/guest/booking', [
                'message' => $e->getMessage()
            ]);
        }
    }


    public function booking_update_guest($id): void
    {
        try {

            /** @var BookingBase $data */
            $data = [
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
                'total_price' => trim($_POST['total_price']),
                'status' => trim($_POST['status']),

            ];

            $session = getSessionGuest();
            $guestId = $session->id;
            $this->bookingModel->update_guest($id, $guestId, $data);
            $this->redirect('/guest/booking');
        } catch (Exception $e) {
            var_dump($e->getMessage());
//            $this->redirect('/guest/booking-edit/' . $id, ['message', 'data error']);
        }
    }


    public function admin_booking(): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view('/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdmin()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [], 'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_booking(): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view('/admin/booking/index', [
                'bookings' => $this->bookingModel->findAllAdminBooking()
            ]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index', [
                'bookings' => [],
                'message' => $e->getMessage()
            ]);
        }
    }


    public function admin_booking_print(int $id): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $data = $this->bookingModel->findIdPrint($id);
            $this->view(
                '/admin/booking/print', [
                'booking' => $data,
                'room' => $this->roomModel->findId($data->room_id),
                'guest' => $this->guestModel->findId($data->guest_id)
            ],
            );


        } catch (Exception $e) {
//            print_r($e->getMessage());
            $this->view("/admin/booking/$id", ['message' => $e->getMessage()]);
        }
    }

    public function admin_booking_update(int $id): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view('/admin/booking/update', ['booking' => $this->bookingModel->findId($id)]);
        } catch (Exception $e) {
            $this->redirect("/admin/booking/$id", ['message' => $e->getMessage()]);
        }
    }

    public function admin_booking_cancel(): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view(
                '/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdminCancel()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [], 'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_confirm(): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view(
                '/admin/booking/index', [
                'bookings' => $this->bookingModel->findAllAdminConfirm()
            ]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index', [
                'bookings' => [],
                'message' => $e->getMessage()
            ]);
        }
    }

    public function admin_booking_confirm_cancel($id): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->bookingModel->findAllAdminConfirmAction((int)$id, false);
            $this->redirect(
                '/admin/booking/confirm',
                ['message' => 'success cancel']);

        } catch (Exception $e) {
            $this->redirect(
                '/admin/booking-confirm',
                ['message' => $e->getMessage()]);
        }
    }


    public function admin_booking_confirm_action($id): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->bookingModel->findAllAdminConfirmAction((int)$id, true);
            $this->redirect(
                '/admin/booking/confirm',
                ['message' => 'success confirm']);

        } catch (Exception $e) {
            $this->redirect(
                '/admin/booking/confirm',
                ['message' => $e->getMessage()]);
        }
    }

    public function admin_booking_finish(): void
    {
        try {
            getSessionAdmin();
            $this->layout('admin');
            $this->view(
                '/admin/booking/index', [
                'bookings' => $this->bookingModel->findAllAdminFinish()
            ]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index', [
                'bookings' => [],
                'message' => $e->getMessage()
            ]);
        }
    }


    public function admin_detail($id): void
    {
        try {
            getSessionAdmin();
            /** @var BookingBase $data */
            $data = $this->bookingModel->findIdPrint($id);
            $this->layout('admin');
            $this->view('/admin/booking/detail',
                [
                    'booking' => $data,
                    'room' => $this->roomModel->findId($data->room_id),
                    'guest' => $this->guestModel->findId($data->guest_id),
                ]
            );
        } catch (Exception $e) {
//            var_dump($e->getMessage());
            $this->redirect("/admin/booking/$id", ['message', 'data error']);
        }
    }

    public function admin_confirm($id): void
    {
        try {
            getSessionAdmin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['confirm' => trim($_POST['confirm']),];
                $this->bookingModel->confirmAdmin($id, $data);
            }
            $this->redirect("/admin/booking/detail/$id");
        } catch (Exception $e) {
//            var_dump($e->getMessage());
            $this->redirect("/admin/booking/detail/$id", ['message', 'data error']);
        }
    }


}
