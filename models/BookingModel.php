<?php

require_once 'core/database.php';


class BookingModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function countBooking()
    {
        $this->db->query("SELECT COUNT(*) as count_booking 
                                    FROM bookings as b ");
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    public function countBookingRoom()
    {
        $this->db->query("SELECT COUNT(*) as count_booking_room 
                                    FROM bookings as b 
                                    JOIN rooms r on r.id = b.room_id ");
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    public function countBookingGuest()
    {
        $this->db->query("SELECT COUNT(*) as count_booking_guest 
                                    FROM bookings as b 
                                    JOIN guest g on g.id = b.guest_id ");
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    public function countGuestBooking()
    {
        $this->db->query("SELECT COUNT(*) as count_guest_booking 
                                    FROM bookings as b 
                                    JOIN guest g on g.id = b.guest_id ");
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    public function findAll()
    {
        $this->db->query("SELECT * FROM bookings");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            throw new Exception('data is empty');
        } else {
            return $response;
        }
        throw new Exception($response);
    }

    public function findAllAdmin()
    {
        $this->db->query("SELECT * FROM bookings ORDER BY updated_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            throw new Exception('data is empty');
        } else {
            return $response;
        }
        throw new Exception($response);
    }

    public function findAllAdminBooking()
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  booking = true
        AND confirm = false
        AND finish= false
        ORDER BY updated_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }

    public function findAllAdminCancel()
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  booking = false
        AND confirm = false
        AND finish= false
        ORDER BY updated_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


    public function findAllAdminConfirm()
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  confirm = true
        ORDER BY updated_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


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


    public function findAllAdminFinish()
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
        WHERE  finish = true
        ORDER BY updated_at DESC");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


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
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


    public function findId($id)
    {
        $this->db->query("SELECT  
                                guest_id,b.id as id_booking, r.id as id_room,  guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image,confirm,finish
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

    public function findIdPrintGuest($id, $guestId)
    {
        $this->db->query("SELECT  
                                guest_id,b.id as id_booking, r.id as id_room,  guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image,confirm,finish
                                    FROM bookings as b 
                                    JOIN rooms as r ON b.room_id = r.id  
                                    WHERE b.id = :id AND guest_id = :guest_id");
        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->single();
        if ($response) {
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


    public function findIdGuestStatus($guestId, bool $status)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
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
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


    public function findIdGuestConfirm($guestId)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm  ,finish
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND (b.confirm = true AND b.booking = true AND b.finish = FALSE)");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }

    public function findIdGuestFinish($guestId)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm  ,finish
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND (b.finish = true AND b.confirm=true AND booking=true)");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }


    public function findIdGuestFinishAction($id, $guestId)
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
        throw new Exception($response);
    }


    public function create(int $guestId, int $roomId, $data)
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


    public function status(int $id, bool $status)
    {
        $this->db->query("UPDATE bookings SET booking = :status WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $response = $this->db->execute();
        return $response ?: throw new Exception($response);

    }

    public function status_cancel(int $id,
//                                  int $room_id
    )
    {
//        AND room_id = :room_id
        $this->db->query("UPDATE bookings SET booking = 'cancel' WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':room_id', $room_id);
        $response = $this->db->execute();
        return $response ?: throw new Exception($response);
    }

    public function status_booking(int $id,
//                                   int $room_id
    )
    {
//        UPDATE hotel.booking t SET t.status = 'booking' WHERE t.id = 6
//        AND room_id = :room_id
        $this->db->query("UPDATE bookings SET booking = 'booking' WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':room_id', $room_id);
        $response = $this->db->execute();
        return $response ?: throw new Exception($response);
    }


    public function update(int $id, int $guestId, $status, $data)
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


    public function update_guest(int $id, int $guestId, $data)
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


    public function delete($id)
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
