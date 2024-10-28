<?php

class RoomImageBase
{
    // Public Properties
    public int $id;
    public int $room_id;
    public bool $thumb;
    public string $image;


    // Constructor
    public function __construct(
        int    $id,
        int    $room_id,
        bool   $thumb,
        string $image,
    )
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->thumb = $thumb;
        $this->image = $image;
    }
}
