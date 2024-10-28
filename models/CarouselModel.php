<?php

require_once 'core/database.php';


class CarouselModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll()
    {
        $this->db->query("SELECT * FROM carousel");
        return $this->db->resultSet();
    }

    public function findId($id)
    {
        $this->db->query("SELECT * FROM carousel WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    /**
     * @param CarouselBase $data
     * @return mixed
     */
    public function create($data)
    {
        $this->db->query("INSERT INTO carousel (name,  image) VALUES (:name, :image)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();

    }


    /**
     * @param $id
     * @param CarouselBase $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $this->db->query("UPDATE carousel
                    SET name = :name, 
                        image = :image 
                    WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM carousel WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}
