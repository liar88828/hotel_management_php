<?php



class RoomImagesModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    /**
     * @param RoomImageBase $data
     * @return mixed
     */
    public function create(mixed $data): mixed
    {
        $this->db->query("INSERT INTO room_images (room_id, image, thumb) 
                      VALUES (:room_id, :image, :thumb )");

        $this->db->bind(':room_id', $data['room_id']);
        $this->db->bind(':thumb', $data['thumb']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }


    public function delete($id)
    {
        $this->db->query("DELETE FROM room_images where id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->execute();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }


    public function findAll(int $room_id): array
    {
        $this->db->query("SELECT * FROM room_images where room_id = :room_id");
        $this->db->bind(':room_id', $room_id);
        $response = $this->db->resultSet();
        if ($response) {
            return $response;
        } else {
            return [];
        }
    }

    public function findId(int $id)
    {
        $this->db->query("SELECT * FROM room_images where id = :id");
        $this->db->bind(':id', $id);
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            throw new Exception($response);
        }
    }

}


