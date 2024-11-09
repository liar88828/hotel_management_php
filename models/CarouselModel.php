<?php



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
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("Error while fetching carousel model", 404);
        }
    }

    public function search(string $search)
    {
        $this->db->query("SELECT * FROM carousel WHERE name LIKE :name");
        $this->db->bind(':name', '%' . $search . '%');
        $response = $this->db->resultSet();
        if (count($response) > 0) {
            return $response;
        } else {
            throw new Exception("Error while fetching carousel model", 404);
        }
    }

    /**
     * @param int $id
     * @return mixed CarouselBase
     * @throws Exception
     */
    public function findId(int $id)
    {
        $this->db->query("SELECT * FROM carousel WHERE id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception("Error while fetching carousel model", 404);
        }
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
    public function update(int $id, mixed $data)
    {
        $this->db->query("UPDATE carousel
                    SET name = :name, 
                        image = :image 
                    WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception("Error while updating carousel model", 400);
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM carousel WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}
