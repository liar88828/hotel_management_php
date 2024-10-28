<?php

require_once 'core/database.php';


class TestimonialModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll(): array|PDOException
    {
        try {
            $this->db->query("SELECT * FROM testimonial");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function findId($id): TestimonialBase|PDOException
    {
        try {
            $this->db->query("SELECT * FROM testimonial WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->single();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }


    /**
     * @param TestimonialBase $data
     * @return mixed
     */
    public function create($data)
    {
        try {

            $this->db->query("INSERT INTO testimonial (name,  image,text,rating) VALUES (:name, :image, :text, :rating)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':rating', $data['rating']);
            return $this->db->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }

    }


    /**
     * @param $id
     * @param TestimonialBase $data
     * @return mixed
     */
    public function update($id, $data)
    {
        try {
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
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->db->query("DELETE FROM testimonial WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->single();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }


}
