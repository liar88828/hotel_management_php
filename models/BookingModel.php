<?php

require_once 'core/database.php';


class BookingModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll()
    {
        $this->db->query("SELECT * FROM booking");
        return $this->db->resultSet();
    }

    public function findId($id)
    {
        $this->db->query("SELECT  
                                guest_id,b.id as id_booking, r.id as id_room,  guest_id, room_id, check_in_date, check_out_date, total_price, b.status as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image
                                    FROM booking as b 
                                    JOIN rooms as r ON b.room_id = r.id  
                                    WHERE b.id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

//    public function findRoomForGuest($guestId)
//    {
//        $this->db->query("SELECT * FROM booking b
//         JOIN rooms r ON b.room_id = r.id
//
//         WHERE guest_id = :guest_id");
//        $this->db->bind(':guest_id', $guestId);
//        return $this->db->single();
//    }

    public function findIdGuest($guestId)
    {
        $this->db->query("SELECT * FROM booking WHERE guest_id = :guest_id");
        $this->db->bind(':guest_id', $guestId);
        return $this->db->single();
    }


    public function findIdGuestStatus($guestId, string $status)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.status as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image  
            FROM booking b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id and b.status = :status");
        $this->db->bind(':guest_id', $guestId);
        $this->db->bind(':status', $status);
        return $this->db->resultSet();
    }


    public function create(int $guestId, int $roomId, $status, $data)
    {
        $this->db->query("INSERT INTO booking (guest_id, room_id, check_in_date, check_out_date, total_price, status) 
            VALUES (:guest_id, :room_id, :check_in_date, :check_out_date, :total_price, :status)");
        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':room_id', $roomId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $this->db->bind(':total_price', $data['total_price']);
        return $this->db->execute();
    }


    public function status(int $id, string $status)
    {
        $this->db->query("UPDATE booking SET status = :status WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $this->db->execute();


    }

    public function status_cancel(int $id,
//                                  int $room_id
    )
    {
//        AND room_id = :room_id
        $this->db->query("UPDATE booking SET status = 'cancel' WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':room_id', $room_id);
        return $this->db->execute();
    }

    public function status_booking(int $id,
//                                   int $room_id
    )
    {
//        UPDATE hotel.booking t SET t.status = 'booking' WHERE t.id = 6
//        AND room_id = :room_id
        $this->db->query("UPDATE booking SET status = 'booking' WHERE id = :id ");
        $this->db->bind(':id', $id);
//        $this->db->bind(':room_id', $room_id);
        return $this->db->execute();
    }


    public function update(int $id, int $guestId, $status, $data)
    {
//                room_id = :room_id,
        $this->db->query("UPDATE booking 
            SET   
                check_in_date = :check_in_date, 
                check_out_date = :check_out_date, total_price = :total_price, status = :status
            WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':guest_id', $guestId, PDO::PARAM_INT);
//        $this->db->bind(':room_id', $roomId, PDO::PARAM_INT);
        $this->db->bind(':status', $status);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $this->db->bind(':total_price', $data['total_price']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM booking WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}
