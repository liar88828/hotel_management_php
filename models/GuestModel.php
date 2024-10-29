<?php



class GuestModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function countGuest(): int
    {
        $this->db->query("SELECT  COUNT(*) as count_guest FROM guest");
        $response = $this->db->single();
        if ($response) {
            return $response->count_guest;
        } else {
            return 0;
        }
    }

    public function countAllGuestsBooking()
    {
        $this->db->query("SELECT  COUNT(*) as count_guest_booking FROM guest as g 
        JOIN  bookings as b
        ON g.id = b.guest_id ");
        return $this->db->resultSet();
    }


    public function findAll()
    {
            $this->db->query("SELECT * FROM guest");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            return [];
//                throw new Exception("Data is Empty");
        }
    }

    public function search(string $search)
    {

        $this->db->query("SELECT * FROM guest WHERE name LIKE :search");
        $this->db->bind(":search", "%$search%");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("No results found");
        }
    }


    public function findId($id)
    {
        $this->db->query("SELECT * FROM guest WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception('Data is not found');
        }

    }

    public function findEmail($email): array|PDOException
    {
        try {

            $this->db->query("SELECT * FROM guest WHERE email = :email");
            $this->db->bind(':email', $email);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    /**
     * @param GuestBase $data
     * @return mixed
     */
    public function create(mixed $data)
    {
//        print_r($data);
        try {

            $this->db->query("INSERT INTO guest (name, email, phone, image, address, pin_code, date_of_birth, password)
                VALUES (:name, :email, :phone, :image, :address, :pin_code, :date_of_birth, :password)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':pin_code', $data['pin_code']);
            $this->db->bind(':date_of_birth', $data['date_of_birth']);
            $this->db->bind(':password', $data['password']);
            return $this->db->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }


    /**
     * @param int $id
     * @param GuestBase $data
     * @return mixed
     */
    public function update(int $id, mixed $data)
    {
        try {

            $this->db->query("UPDATE guest
                    SET name = :name,
                        email = :email,
                        phone = :phone ,
                        image = :image,
                        address = :address,
                        pin_code = :pin_code,
                        date_of_birth = :date_of_birth,
                        password = :password
                    WHERE id = :id");
            $this->db->bind(':id', (int)$id);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':pin_code', $data['pin_code']);
            $this->db->bind(':date_of_birth', $data['date_of_birth']);
            $this->db->bind(':password', $data['password']);
            return $this->db->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM guest WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception('Database Sibuk');
        }
    }

}
