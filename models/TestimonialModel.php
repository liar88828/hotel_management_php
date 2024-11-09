<?php


class TestimonialModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAll(): array|PDOException
    {
        $this->db->query("SELECT * FROM testimonial");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        }
        return [];
    }

    public function search(string $search)
    {
        $this->db->query("SELECT * FROM testimonial WHERE name LIKE :name");
        $this->db->bind(":name", "%$search%");
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception('Data not found');
        }
    }

    public function findId(int $id)
    {
        $this->db->query("SELECT * FROM testimonial WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception('Data error');
        }
    }


    /**
     * @param TestimonialBase $data
     * @return mixed
     */
    public function create($data)
    {

        $this->db->query("INSERT INTO testimonial (name,  image,text,rating) VALUES (:name, :image, :text, :rating)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':rating', $data['rating']);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception('Data error');
        }
    }


    /**
     * @param $id
     * @param TestimonialBase $data
     * @return mixed
     */
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
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception('Data error');
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM testimonial WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception('DB Delete error');
        }

    }


}
