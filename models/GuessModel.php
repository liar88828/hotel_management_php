<?php

require_once 'core/database.php';


class GuessModel
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


  public function create($data)
  {
    $this->db->query("INSERT INTO guest (first_name, last_name, email, phone, address) VALUES (:firstname, :lastname,:email,:phone,:address)");
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':lastname', $data['lastname']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':address', $data['address']);
    return $this->db->execute();
  }

  public function update($id, $data)
  {
    $this->db->query("UPDATE guest 
            SET 
                first_name = :firstname, 
                last_name = :lastname, 
                email = :email, 
                phone = :phone,
                address = :address
            WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':lastname', $data['lastname']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':address', $data['address']);

    return $this->db->execute();
  }
}
