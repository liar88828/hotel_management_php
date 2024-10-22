<?php


//use Core\Database;
require_once 'core/database.php';

class AdminModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function login($data)
    {
        $this->db->query("INSERT INTO admin_cred (admin_name, admin_pass) VALUES (:name, :email)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
    }

    public function findEmail($email)
    {
        $this->db->query("SELECT * FROM admin_cred WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }




    public function registerStaff($data)
    {
        $sql = "INSERT INTO staff (name, email, phone, image, address, pin_code, date_of_birth, password)
                VALUES (:name, :email, :phone, :image, :address, :pin_code, :date_of_birth, :password)";
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


    public function close()
    {
        $this->db->close();
    }
}
