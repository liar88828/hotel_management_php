<?php


class SettingModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findGeneral()
    {

        $this->db->query("SELECT * FROM settings ");
        $response = $this->db->single();
        if ($response) {
            return $response;
        } else {
            return null;
        }
    }

    public function findContact()
    {
        $this->db->query("SELECT * FROM contact_details ");
        return $this->db->single();
    }

    public function createGeneral($data)
    {

        $this->db->query("INSERT INTO settings (site_title, site_about,shutdown) VALUES (:site_title, :site_about,:shutdown)");
        $this->db->bind(':site_title', $data['site_title']);
        $this->db->bind(':site_about', $data['site_about']);
        $this->db->bind(':site_about', 1);
        return $this->db->execute();

    }

    /**
     * @param $id
     * @param SettingBase $data
     * @return mixed
     */
    public function updateGeneral($id, $data)
    {
        $this->db->query("UPDATE settings 
            SET 
                site_title = :site_title,
                site_about = :site_about 
            WHERE sr_no = :sr_no");
        $this->db->bind(':sr_no', $id);
        $this->db->bind(':site_title', $data['site_title']);
        $this->db->bind(':site_about', $data['site_about']);
        return $this->db->execute();
    }

    /**
     * @param   $data
     * @return mixed
     */
    public function createContact($data)
    {
        $this->db->query("INSERT INTO contact_details (address, gmap, pn1, pn2, email, fb, insta, tw, iframe) VALUES (:address, :gmap, :pn1, :pn2, :email, :fb, :insta, :tw, :iframe) ");
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':gmap', $data['gmap']);
        $this->db->bind(':pn1', $data['pn1']);
        $this->db->bind(':pn2', $data['pn2']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':fb', $data['fb']);
        $this->db->bind(':insta', $data['insta']);
        $this->db->bind(':tw', $data['tw']);
        $this->db->bind(':iframe', $data['iframe']);
        return $this->db->execute();

    }

    /**
     * @param $id
     * @param  $data
     * @return mixed
     */
    public function updateContact($id, $data)
    {
        $this->db->query("UPDATE contact_details SET 
                address = :address, 
                gmap = :gmap, 
                pn1 = :pn1, 
                pn2 = :pn2, 
                email = :email, 
                fb = :fb, 
                insta = :insta, 
                tw = :tw, 
                iframe = :iframe 
                WHERE sr_no = :sr_no");

        $this->db->bind(':sr_no', $id);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':gmap', $data['gmap']);
        $this->db->bind(':pn1', $data['pn1']);
        $this->db->bind(':pn2', $data['pn2']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':fb', $data['fb']);
        $this->db->bind(':insta', $data['insta']);
        $this->db->bind(':tw', $data['tw']);
        $this->db->bind(':iframe', $data['iframe']);
        return $this->db->execute();
    }

}

