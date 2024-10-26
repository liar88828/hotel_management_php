<?php


//use Core\Database;
require_once 'core/database.php';

class RoomModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function countRoom()
    {
        $this->db->query("SELECT COUNT(id) as count_room FROM rooms ");
        return $this->db->single();
    }

    public function countRoomActive()
    {
        $this->db->query("SELECT COUNT(id) as count_room_active FROM rooms where status = 1");
        return $this->db->single();
    }

    public function countRoomEmpty()
    {
        $this->db->query("SELECT COUNT(id) as count_room_empty FROM rooms where status = 0");
        return $this->db->single();
    }

    public function countRoomBooking()
    {
        $this->db->query("SELECT COUNT(r.id) as count_room_booking FROM rooms as r JOIN hotel.bookings b on r.id = b.room_id");
        return $this->db->single();
    }


    public function create($data)
    {
        $this->db->query("INSERT INTO rooms (name, area, price, quantity, adult, children, description, status, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe,security,image) 
                      VALUES (:name, :area, :price, :quantity, :adult, :children, :description, :status, :wifi, :television, :ac, :cctv, :dining_room, :parking_area, :bedrooms, :bathrooms, :wardrobe, :security,:image)");

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':area', $data['area']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':adult', $data['adult']);
        $this->db->bind(':children', $data['children']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':wifi', isset($data['wifi']) ? 1 : 0);
        $this->db->bind(':wifi', isset($data['wifi']) ? 1 : 0);
        $this->db->bind(':television', isset($data['television']) ? 1 : 0);
        $this->db->bind(':ac', isset($data['ac']) ? 1 : 0);
        $this->db->bind(':cctv', isset($data['cctv']) ? 1 : 0);
        $this->db->bind(':dining_room', isset($data['dining_room']) ? 1 : 0);
        $this->db->bind(':parking_area', isset($data['parking_area']) ? 1 : 0);
        $this->db->bind(':bedrooms', $data['bedrooms'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':bathrooms', $data['bathrooms'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':wardrobe', $data['wardrobe'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':security', isset($data['security']) ? 1 : 0);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }

    public function findAll()
    {
        $this->db->query("SELECT * FROM rooms LIMIT 100");
        return $this->db->resultSet();
    }

    public function findAllGuest($id_guest)
    {
        $this->db->query("SELECT rooms.* FROM rooms
                      LEFT JOIN bookings as b  ON b.room_id = rooms.id
                      WHERE rooms.status = true AND (b.guest_id IS NULL OR b.guest_id != :id_guest)
                      ORDER BY rooms.update_at DESC
                      LIMIT 100");

        $this->db->bind(':id_guest', $id_guest);

        $response = $this->db->resultSet();

        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("No results found");
        }
    }

    public function findAllGuestSearch(string $search, $id_guest)
    {
        $this->db->query("SELECT rooms.* FROM rooms
                      LEFT JOIN bookings  as b ON b.room_id = rooms.id
                      WHERE (rooms.status = true AND rooms.name LIKE :search) AND (b.guest_id IS NULL OR b.guest_id != :id_guest)
                      ORDER BY update_at DESC
                      LIMIT 100");

        // Concatenate '%' to the parameter to use wildcards
        $this->db->bind(':search', '%' . $search . '%');
        $this->db->bind(':id_guest', $id_guest);
        $response = $this->db->resultSet();

        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("No results found");
        }
    }


    public function findName($data)
    {
        $this->db->query("SELECT * FROM rooms
         WHERE name = :search
         ORDER BY  update_at DESC
         LIMIT 100 ");
        $this->db->bind(':search', $data['search']);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("No results found");
        }
        throw new Exception($response);
    }


    public function status($status)
    {
        $this->db->query("SELECT * FROM rooms
         WHERE status = :status
         ORDER BY  update_at DESC
         LIMIT 100 ");
        $this->db->bind(':status', $status);
        $response = $this->db->resultSet();
//        print_r($response);
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("No results found");
        }
        throw new Exception($response);
    }

    public function findAllStatus($status)
    {
        $this->db->query("SELECT * FROM rooms
         WHERE status = :status
         LIMIT 100");
        $this->db->bind(':status', $status);

        return $this->db->resultSet();
    }


    public function findHome()
    {
        $this->db->query("SELECT * FROM rooms LIMIT 3");
        return $this->db->resultSet();
    }

    public function find_check_booking_availability(int $children,
                                                    int $adult,
                                                        $check_in_date,
                                                        $check_out_date,
    )
    {
//        SELECT * FROM rooms WHERE children <= 41 OR adult <= 4
        $this->db->query(
            "SELECT *
                FROM rooms as r
                JOIN  bookings as b
                ON   r.id = b.room_id
                WHERE r.children <= :children
                OR r.adult <= :adult
                OR b.check_in_date >= :check_in_date
                AND b.check_out_date >= :check_out_date
                ");

//        $this->db->query("
//    SELECT *
//    FROM rooms AS r
//    LEFT JOIN booking AS b ON r.id = b.room_id
//    WHERE r.children <= :children
//      AND r.adult <= :adult
//      AND (
//          b.check_in_date IS NULL
//          OR b.check_out_date IS NULL
//          OR (b.check_in_date NOT BETWEEN :check_in_date AND :check_out_date
//          AND b.check_out_date NOT BETWEEN :check_in_date AND :check_out_date)
//      )
//");

        $this->db->bind(':children', $children);
        $this->db->bind(':adult', $adult);
        $this->db->bind(':check_in_date', $check_in_date);
        $this->db->bind(':check_out_date', $check_out_date);
        $response = $this->db->resultSet();
//        print_r($response);
        if ($response) {
            return $response;
        } else {
            print_r($response);
//            throw new Exception('data is not found');
            throw new Exception('data is not found');
        }
    }

    public function findSearch($data)
    {
        //            JOIN hotel.booking b
//                ON r.id = b.room_id

        $this->db->query("SELECT * 
    FROM rooms AS r
    WHERE (r.wifi = :wifi OR r.television = :television OR r.ac = :ac OR r.cctv = :cctv OR r.dining_room = :dining_room OR r.parking_area = :parking_area OR r.security = :security)
    AND r.status = 1
    AND (r.children <= :children OR r.adult <= :adult)
    
        AND NOT EXISTS (    SELECT 1
        FROM bookings AS b
        WHERE b.room_id = r.id
        AND b.check_in_date < :check_out_date
        AND b.check_out_date > :check_in_date
    )
");


        $this->db->bind(':wifi', $data['wifi']);
        $this->db->bind(':television', $data['television']);
        $this->db->bind(':ac', $data['ac']);
        $this->db->bind(':cctv', $data['cctv']);
        $this->db->bind(':dining_room', $data['dining_room']);
        $this->db->bind(':parking_area', $data['parking_area']);
        $this->db->bind(':security', $data['security']);
//
        $this->db->bind(':children', $data['children']);
        $this->db->bind(':adult', $data['adult']);
//
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);

        $response = $this->db->resultSet();
        if ($response) {
            return $response;
        } else {
            if (count($response) == 0) {
                throw new Exception('data is not found');
            }
            throw new Exception($response);
        }
    }

    public function findSearchx($data)
    {
        $this->db->query("SELECT * 
            FROM rooms AS r
            WHERE r.children <= :children
              OR r.adult <= :adult
              OR r.wifi<= :wifi
              OR r.television<= :television
              OR r.ac<= :ac
              OR r.cctv<= :cctv
              OR r.dining_room<= :dining_room
              OR r.parking_area<= :parking_area
              OR r.security<= :security
              OR r.status<= 0
                AND NOT EXISTS (
                    SELECT 1
                    FROM bookings AS b
                    WHERE b.room_id = r.id
                    AND (
                        (b.check_in_date <= :check_out_date AND b.check_out_date >= :check_in_date)
                    )
                )
            ");
        $this->db->bind(':children', $data['children']);
        $this->db->bind(':adult', $data['adult']);
        $this->db->bind(':wifi', $data['wifi']);
        $this->db->bind(':television', $data['television']);
        $this->db->bind(':ac', $data['ac']);
        $this->db->bind(':cctv', $data['cctv']);
        $this->db->bind(':dining_room', $data['dining_room']);
        $this->db->bind(':parking_area', $data['parking_area']);
        $this->db->bind(':security', $data['security']);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':check_out_date', $data['check_out_date']);
        $response = $this->db->resultSet();
        if ($response) {
            return $response;
        } else {
            if (count($response) == 0) {
                throw new Exception('data is not found');
            }
            throw new Exception($response);
        }
    }


    public function findHomeSearch($data)
    {
        $this->db->query("SELECT * FROM rooms 
                        WHERE wifi = :wifi 
                        OR television = :television 
                        OR ac = :ac
                        OR cctv = :cctv
                        OR dining_room =:dining_room
                        OR parking_area = :parking_area
                        LIMIT 100 ;
                        ");
        $this->db->bind(':wifi', $data['wifi']);
        $this->db->bind(':television', $data['television']);
        $this->db->bind(':ac', $data['ac']);
        $this->db->bind(':cctv', $data['cctv']);
        $this->db->bind(':dining_room', $data['dining_room']);
        $this->db->bind(':parking_area', $data['parking_area']);
        $response = $this->db->resultSet();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    public function findId(int $id)
    {
        $this->db->query("SELECT * FROM rooms where id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    public function findIdGuest(int $guestId)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id");
        $this->db->bind(':guest_id', $guestId);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }

    public function findIdGuestSearch(int $guestId, string $search)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.booking as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image, confirm ,finish 
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id AND name = :search");
        $this->db->bind(':guest_id', $guestId);
        $this->db->bind(':search', $search);
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('data is empty');
        }
        throw new Exception($response);
    }



    public function delete($id)
    {
        $this->db->query("DELETE FROM rooms where id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    public function update(int $id, array $data)
    {
        $this->db->query("UPDATE rooms 
            SET 
                name =   :name,
                area =   :area,
                price =  :price,
                quantity =   :quantity,
                adult =  :adult,
                children =   :children,
                description =    :description,
                status = :status,
                wifi =   :wifi,
                wifi =   :wifi,
                television = :television,
                ac = :ac,
                cctv =   :cctv,
                dining_room =    :dining_room,
                parking_area =   :parking_area,
                bedrooms =   :bedrooms,
                bathrooms =  :bathrooms,
                wardrobe =   :wardrobe,
                security =   :security,
                image =:image
            WHERE id = :id");

        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':area', $data['area']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':adult', $data['adult']);
        $this->db->bind(':children', $data['children']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':wifi', isset($data['wifi']) ? 1 : 0);
        $this->db->bind(':wifi', isset($data['wifi']) ? 1 : 0);
        $this->db->bind(':television', isset($data['television']) ? 1 : 0);
        $this->db->bind(':ac', isset($data['ac']) ? 1 : 0);
        $this->db->bind(':cctv', isset($data['cctv']) ? 1 : 0);
        $this->db->bind(':dining_room', isset($data['dining_room']) ? 1 : 0);
        $this->db->bind(':parking_area', isset($data['parking_area']) ? 1 : 0);
        $this->db->bind(':bedrooms', $data['bedrooms'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':bathrooms', $data['bathrooms'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':wardrobe', $data['wardrobe'] ?? 0, PDO::PARAM_INT);
        $this->db->bind(':security', isset($data['security']) ? 1 : 0);
        $this->db->bind(':image', $data['image']);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

    public function close()
    {
        $this->db->close();
    }
}


