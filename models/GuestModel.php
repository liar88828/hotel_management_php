<?php

require_once 'core/database.php';


class GuestModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll()
    {
        $this->db->query("SELECT * FROM guest");
        return $this->db->resultSet();
    }

    public function findId($id)
    {
        $this->db->query("SELECT * FROM guest WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findEmail($email)
    {
        print_r('find email guest');
        $this->db->query("SELECT * FROM guest WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultSet();
    }

    public function create($data)
    {
        print_r($data);
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
    }


    public function update($id, $data)
    {

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
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM guest WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

}
