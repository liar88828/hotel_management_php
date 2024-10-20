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

  public function findName($admin_name)
  {
    $this->db->query("SELECT * FROM admin_cred WHERE admin_name = :admin_name");
    $this->db->bind(':admin_name', $admin_name);
    return $this->db->single();
  }

  public function register($name, $password)
  {
    $this->db->query("INSERT INTO admin_cred (admin_name, admin_pass) VALUES (:name, :password)");
    $this->db->bind(':name', $name);
    $this->db->bind(':password', $password);
    return $this->db->execute();
  }

  public function close()
  {
    $this->db->close();
  }
}
