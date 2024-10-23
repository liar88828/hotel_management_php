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

    public function findSearch()
    {
        $this->db->query("SELECT * FROM rooms ");
        return $this->db->resultSet();
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
        return $this->db->resultSet();
    }


    public function findId(int $id)
    {
        $this->db->query("SELECT * FROM rooms where id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function findIdGuest(int $guestId)
    {
        $this->db->query("
            SELECT 
                guest_id,b.id as id_booking, guest_id, room_id, check_in_date, check_out_date, total_price, b.status as status_booking, created_at,  name, area, price, quantity, adult, children, description, r.status as status_room, wifi, television, ac, cctv, dining_room, parking_area, bedrooms, bathrooms, wardrobe, security, image  
            FROM booking b
            JOIN rooms r ON b.room_id = r.id
            WHERE b.guest_id = :guest_id");
        $this->db->bind(':guest_id', $guestId);
        return $this->db->resultSet();
    }


    public function delete($id)
    {
        $this->db->query("DELETE FROM rooms where id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
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
        return $this->db->execute();
    }

    public function close()
    {
        $this->db->close();
    }
}

