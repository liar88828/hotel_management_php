<?php

require_once 'core/controller.php';
require('views/assets/php/guest_login.php');
require('views/assets/php/admin_login.php');

class BookingController extends Controller
{
    private BookingModel $bookingModel;
    private RoomModel $roomModel;
    private ImageService $imageService;
    private RoomImagesModel $roomImagesModel;

    public function __construct()

    {
//        $this->guestModel = $this->model('GuestModel');
        $this->bookingModel = $this->model('BookingModel');
        $this->roomModel = $this->model('RoomModel');
        $this->roomImagesModel = $this->model('RoomImagesModel');
        $this->imageService = $this->service('ImageService');

    }


    public function guest_booking(): void
    {
        $session = getSessionGuest();
        $guestId = $session->id;
        try {
            $this->view('guest/booking/index',
                ['bookings' => $this->roomModel->findIdGuest($guestId),]
            );
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
        $session = getSessionGuest();
        $guestId = $session->id;
        try {
            $this->view('guest/booking/index',
                ['bookings' => $this->roomModel->findIdGuestSearch($guestId, $_POST['search']),]
            );
        } catch (Exception $e) {
            $this->view('guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]
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
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestStatus($guestId, true);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
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
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestStatus($guestId, false);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_confirm(): void
    {
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestConfirm($guestId);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
            $this->view('/guest/booking/index',
                [
                    'bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function guest_booking_finish(): void
    {
        try {
            $session = getSessionGuest();
            $guestId = $session->id;
            $data = $this->bookingModel->findIdGuestFinish($guestId);
            $this->view(
                'guest/booking/index',
                ['bookings' => $data]
            );
        } catch (Exception $e) {
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
                '/guest/booking-confirm',
                ['message' => 'success']
            );
        } catch (Exception $e) {
            $this->redirect('/guest/booking-confirm',
                ['message' => $e->getMessage()]);
        }
    }


    public function booking_detail($id): void
    {
        try {
            getSessionGuest();
            $data = $this->bookingModel->findId($id);
//print_r($data);
            $this->view(
                'guest/booking/detail',
                [
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
            $this->view('guest/booking/edit', $data);
        } catch (Exception $e) {
            $this->redirect('/guest/booking/index', ['message' => $e->getMessage()]);
        }
    }


    public function booking_print($id): void
    {
        try {

            $session = getSessionGuest();
            $idGuest = $session->id;

            $this->view('guest/booking/print', ['booking' => $this->bookingModel->findIdPrintGuest($id, $idGuest)]);
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
            $this->view(
                '/admin/booking/index',
                ['bookings', $this->bookingModel->findAllAdmin()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_booking(): void
    {
        try {
            getSessionAdmin();
            $this->view(
                '/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdminBooking()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_cancel(): void
    {
        try {
            getSessionAdmin();
            $this->view(
                '/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdminCancel()]);

        } catch (Exception $e) {
//            $this->view(
//                '/admin/booking/index',
//                ['bookings' => [],
//                    'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_confirm(): void
    {
        try {
            getSessionAdmin();
            $this->view(
                '/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdminConfirm()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }

    public function admin_booking_confirm_action($id): void
    {
        try {
            getSessionAdmin();
            $this->bookingModel->findAllAdminConfirmAction((int)$id);
            $this->redirect(
                '/admin/booking-confirm',
                ['message' => 'success']);

        } catch (Exception $e) {
            $this->redirect(
                '/admin/booking-confirm',
                ['message' => $e->getMessage()]);
        }
    }

    public function admin_booking_finish(): void
    {
        try {
            getSessionAdmin();
            $this->view(
                '/admin/booking/index',
                ['bookings' => $this->bookingModel->findAllAdminFinish()]);

        } catch (Exception $e) {
            $this->view(
                '/admin/booking/index',
                ['bookings' => [],
                    'message' => $e->getMessage()]);
        }
    }


    public function admin_detail($id): void
    {
        try {
            getSessionAdmin();

            $this->view('/admin/booking/detail',
                ['booking' => $this->bookingModel->detailAdmin($id)]
            );
        } catch (Exception $e) {
            var_dump($e->getMessage());
            $this->redirect('/admin/booking/' . $id, ['message', 'data error']);
        }
    }

    public function admin_confirm($id): void
    {
        try {
            getSessionAdmin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [
                    'confirm' => trim($_POST['confirm']),
                ];
                $this->bookingModel->confirmAdmin($id, $data);
            }
            $this->redirect("/admin/booking/detail/$id");
        } catch (Exception $e) {
            var_dump($e->getMessage());
            $this->redirect("/admin/booking/detail/$id", ['message', 'data error']);
        }
    }


}
