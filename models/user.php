<?php

namespace Models;

use Core\Database;

class User
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUsers()
  {
    $this->db->query("SELECT * FROM admin_cred");
    return $this->db->resultSet();
  }

  public function create($data)
  {
    $this->db->query("INSERT INTO admin_cred (admin_name, admin_pass) VALUES (:name, :email)");
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    return $this->db->execute();
  }
}
