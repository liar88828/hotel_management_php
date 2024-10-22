<?php

require_once 'core/database.php';


class TestimonialModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll()
    {
        $this->db->query("SELECT * FROM testimonial");
        return $this->db->resultSet();
    }

    public function findId($id)
    {
        $this->db->query("SELECT * FROM testimonial WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function create($data)
    {
        $this->db->query("INSERT INTO testimonial (name,  image,text,rating) VALUES (:name, :image, :text, :rating)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':rating', $data['rating']);

        return $this->db->execute();

    }


    public function update($id, $data)
    {
        $this->db->query("UPDATE testimonial
                    SET name = :name, 
                        image = :image, 
                        text = :text, 
                        rating = :rating 
                    WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':rating', $data['rating']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM testimonial WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}
