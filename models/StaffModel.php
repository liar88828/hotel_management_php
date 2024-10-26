<?php

require_once 'core/database.php';


class StaffModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll()
    {
        $this->db->query("SELECT * FROM staff");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Data is Empty');
        }
        throw new Exception($response);

    }

    public function findAllSearch($search)
    {
        $this->db->query("SELECT * FROM staff WHERE name LIKE :search");
        $this->db->bind(':search', '%' . $search . '%');
        $response = $this->db->resultSet();

        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Data is Empty');
        }
        throw new Exception($response);

    }

    public function findId($id)
    {
        $this->db->query("SELECT * FROM staff WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findEmail($email)
    {
        $this->db->query("SELECT * FROM staff WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultSet();
    }


    public function create($data)
    {
        print_r($data);

        $this->db->query("INSERT INTO staff (name, email, phone, image, address, pin_code, date_of_birth, password)
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
    }


    public function update($id, $data)
    {
        $this->db->query("UPDATE staff
                    SET name = :name, 
                        phone = :phone, 
                        image = :image, 
                        address = :address, 
                        pin_code = :pin_code, 
                        date_of_birth = :date_of_birth 
                    WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);
        $this->db->bind(':date_of_birth', $data['date_of_birth']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM staff WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}
