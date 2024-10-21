<?php

class AuthModel
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
  }


}
