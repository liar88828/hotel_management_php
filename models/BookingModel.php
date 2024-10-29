<?php


class BookingModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function countBooking(): int
    {
        $this->db->query("SELECT COUNT(*) as count_booking 
                                    FROM bookings as b ");
        $response = $this->db->single();
        if ($response) {
            return $response->count_booking;
        } else {
            return 0;
        }
    }


    public function countBookingRoom(): int
    {
        $this->db->query("SELECT COUNT(*) as count_booking_room 
                                    FROM bookings as b 
                                    JOIN rooms r on r.id = b.room_id ");
        $response = $this->db->single();
        if ($response) {
            return $response->count_booking_room;
        } else {
            return 0;
        }
    }

    public function countBookingGuest(): int
    {
        $this->db->query("SELECT COUNT(*) as count_booking_guest 
                                    FROM bookings as b 
                                    JOIN guest g on g.id = b.guest_id ");
        $response = $this->db->single();
        if ($response) {
            return $response->count_booking_guest;
        } else {
            return 0;
        }
    }

    public function countBookingFinish(): int
    {
        $this->db->query("SELECT COUNT(*) as count_booking_guest 
                                    FROM bookings as b 
                                    JOIN guest g on g.id = b.guest_id
WHERE finish=TRUE
");
        $response = $this->db->single();
        if ($response) {
            return $response->count_booking_guest;
        } else {
            return 0;
        }
    }

    /**
     * @throws Exception
     */
    public function countGuestBooking(): int
    {
        $this->db->query("SELECT COUNT(*) as count_guest_booking 
                                    FROM bookings as b 
                                    JOIN guest g on g.id = b.guest_id ");
        $response = $this->db->single();
        if ($response) {
            return $response->count_guest_booking;
        } else {
            return 0;
//            throw new Exception($response);
        }
    }

    /**
     * @throws Exception
     */
    public function countGuestBookingNow(): int
    {
        $this->db->query("SELECT COUNT(*) as count 
                            FROM bookings as b 
                            JOIN guest g on g.id = b.guest_id
                            WHERE  b.booking = TRUE AND b.finish=FALSE AND b.confirm = FALSE


");
        $response = $this->db->single();
        if ($response) {
            return $response->count;
        } else {
            return 0;
//            throw new Exception($response);
        }
    }

    public function countGuestConfirmNow(): int
    {
        $this->db->query("SELECT COUNT(*) as count 
                            FROM bookings as b 
                            JOIN guest g on g.id = b.guest_id
                            WHERE  b.booking = TRUE AND b.finish=FALSE AND b.confirm = TRUE


");
        $response = $this->db->single();
        if ($response) {
            return $response->count;
        } else {
            return 0;
//            throw new Exception($response);
        }
    }


    public function countGuestConfirm(): int
    {
        $this->db->query("SELECT COUNT(*) as count 
                                    FROM bookings as b 
                                        
                                    JOIN guest g on g.id = b.guest_id 
                                    WHERE b.confirm = TRUE"

        );
        $response = $this->db->single();
        if ($response) {
            return $response->count;
        } else {
            return 0;
//            throw new Exception($response);
        }
    }

    public function countGuestCancel(): int
    {
        $this->db->query("SELECT COUNT(*) as count 
                                    FROM bookings as b 
                                        
                                    JOIN guest g on g.id = b.guest_id 
                                    WHERE b.booking = FALSE"

        );
        $response = $this->db->single();
        if ($response) {
            return $response->count;
        } else {
            return 0;
//            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function findAll(): array|Exception
    {
        $this->db->query("SELECT * FROM bookings");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
//            throw new Exception('data is empty');
            throw new Exception($response);
        }
    }

    /**
     * @throws Exception
     */
    public function findAllAdmin()
    {
        $this->db->query("
        SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
//        print_r($response);
            return $response;
        } else {
            throw new Exception('Error ');
//            throw new Exception('data is empty');
        }
    }

    /**
     * @throws Exception
     */
    public function findAllAdminBooking(): array
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE booking = true
        AND confirm = false
        AND finish= false
        ORDER BY b.update_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is error');
//            throw new Exception('data is empty');
        }
    }

    /**
     * @throws Exception
     */
    public function findAllAdminCancel(): array
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  booking = false
        AND confirm = false
        AND finish= false
        ORDER BY b.update_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
//        throw new Exception($response);
    }


    /**
     * @throws Exception
     */
    public function findAllAdminConfirm(): array|Exception
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  confirm = true
        ORDER BY b.update_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
//            throw new Exception('data is empty');
            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function findAllAdminConfirmAction(int $id)
    {
        $this->db->query("
            UPDATE bookings 
            SET booking = true,
                confirm = true                    
            WHERE  id = :id ");
        $this->db->bind(':id', $id);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function findAllAdminFinish(): array
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE finish = true
        ORDER BY b.update_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
//            throw new Exception('data is empty');
            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function confirmAdmin(int $id, $data)
    {
        $this->db->query(
            "UPDATE bookings
                SET confirm = :confirm 
                WHERE id = :id 
                "
        );
        $this->db->bind(':confirm', $data['confirm']);
        $this->db->bind(':id', $id);

        $response = $this->db->execute();
        if (count($response) > 0) {
            return $response;
        } else {

            throw new Exception($response);
        }

//            throw new Exception('data is empty');
    }


    /**
     * @param $id
     * @return BookingBase|RoomBase
     * @throws Exception
     */
    public function findId($id)
    {
        $this->db->query("SELECT  
                                guest_id,b.id as id_booking, r.id as id_room,  guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image,confirm,finish
                                    FROM bookings as b 
                                    JOIN rooms as r ON b.room_id = r.id  
                                    WHERE b.id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    /**
     * @throws Exception
     */
    public function findIdPrintGuest(int $id, int $guestId)
    {
        $this->db->query("SELECT  
                                guest_id,b.id as id_booking, r.id as id_room,  guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image,confirm,finish
                                    FROM bookings as b 
                                    JOIN rooms as r ON b.room_id = r.id  
                                    WHERE b.id = :id AND guest_id = :guest_id");
        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->single();
        if (isset($response)) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }
//    public function findRoomForGuest($guestId)
//    {
//        $this->db->query("SELECT * FROM bookings b
//         JOIN rooms r ON b.room_id = r.id
//
//         WHERE guest_id = :guest_id");
//        $this->db->bind(':guest_id', $guestId);
//        return $this->db->single();
//    }

    /**
     * @throws Exception
     */
    public function findIdGuest($guestId)
    {
        $this->db->query("SELECT * FROM bookings WHERE guest_id = :guest_id");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function findIdGuestStatus(int $guestId, bool $status)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND (b.booking = :status 
            AND b.finish = false 
            AND b.confirm = false
                )");
        $this->db->bind(':guest_id', $guestId);
        $this->db->bind(':status', $status);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Database Sibuk');
        }
    }


    /**
     * @throws Exception
     */
    public function findIdGuestConfirm(int $guestId)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm  ,finish
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND (b.confirm = true AND b.booking = true AND b.finish = FALSE)");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Database Sibuk');
//            throw new Exception('data is empty');
        }
    }

    /**
     * @throws Exception
     */
    public function findIdGuestFinish(int $guestId): array|Exception
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking,   name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm  ,finish
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND (b.finish = true AND b.confirm=true AND booking=true)");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Database Sibuk');
//            throw new Exception('data is empty');
        }
    }


    /**
     * @throws Exception
     */
    public function findIdGuestFinishAction(int $id, int $guestId)
    {
        $this->db->query("
            UPDATE bookings set
                                finish = true
            WHERE guest_id = :guest_id AND id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
//        throw new Exception($response);
    }


    /**
     * @param int $guestId
     * @param int $roomId
     * @param BookingBase $data
     * @return mixed
     * @throws Exception
     */
    public function create(int $guestId, int $roomId, mixed $data): mixed
    {

        $this->db->query("INSERT INTO bookings (guest_id, room_id, check_in_date, check_out_date, total_price, booking) 
            VALUES (:guest_id, :room_id, :check_in_date, :check_out_date, :total_price,true)");
        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':room_id', $roomId, PDO::PARAM_INT);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $this->db->bind(':total_price', $data['total_price']);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    /**
     * @throws Exception
     */
    public function status(int $id, bool $status)
    {
        $this->db->query("UPDATE bookings SET booking = :status WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $response = $this->db->execute();
        return $response ?: throw new Exception($response);

    }

//    /**
//     * @throws Exception
//     */
//    public function status_cancel(int $id,
////                                  int $room_id
//    )
//    {
////        AND room_id = :room_id
//        $this->db->query("UPDATE bookings SET booking = 'cancel' WHERE id = :id ");
//        $this->db->bind(':id', $id);
////        $this->db->bind(':room_id', $room_id);
//        $response = $this->db->execute();
//        return $response ?: throw new Exception($response);
//    }

//    /**
//     * @throws Exception
//     */
//    public function status_booking(int $id,
////                                   int $room_id
//    )
//    {
////        UPDATE hotel.booking t SET t.status = 'booking' WHERE t.id = 6
////        AND room_id = :room_id
//        $this->db->query("UPDATE bookings SET booking = 'booking' WHERE id = :id ");
//        $this->db->bind(':id', $id);
////        $this->db->bind(':room_id', $room_id);
//        $response = $this->db->execute();
//        return $response ?: throw new Exception($response);
//    }


    /**
     * @param int $id
     * @param int $guestId
     * @param bool $status
     * @param BookingBase $data
     * @return mixed
     * @throws Exception
     */
    public function update(int $id, int $guestId, bool $status, mixed $data)
    {
//                room_id = :room_id,
        $this->db->query("UPDATE bookings 
            SET   
                check_in_date = :check_in_date, 
                check_out_date = :check_out_date, total_price = :total_price, booking = :status
            WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
//        $this->db->bind(':room_id', $roomId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $this->db->bind(':total_price', $data['total_price']);
        $response = $this->db->execute();
        return $response ?: throw new Exception($response);
    }


    /**
     * @param int $id
     * @param int $guestId
     * @param BookingBase $data
     * @return mixed
     * @throws Exception
     */
    public function update_guest(int $id, int $guestId, mixed $data)
    {

//                room_id = :room_id,
        $this->db->query("UPDATE bookings 
            SET   
                check_in_date = :check_in_date, 
                check_out_date = :check_out_date, 
                total_price = :total_price,
                booking = :status
            WHERE id = :id AND guest_id = :guest_id");

        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $this->db->bind(':total_price', $data['total_price'] ?: 0);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw  new Exception($response);
        }

    }


    /**
     * @throws Exception
     */
    public function delete(int $id)
    {
        $this->db->query("DELETE FROM bookings WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw  new Exception($response);
        }
    }


}
