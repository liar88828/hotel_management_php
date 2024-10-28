<?php

class RoomBase
{
    // Public Properties
    public int $id;
    public string $name;
    public int $area;
    public int $price;
    public int $quantity;
    public int $adult;
    public int $children;
    public string $description;
    public bool $status;
    public bool $wifi;
    public bool $television;
    public bool $ac;
    public bool $cctv;
    public bool $dining_room;
    public bool $parking_area;
    public int $bedrooms;
    public int $bathrooms;
    public int $wardrobe;
    public bool $security;
    public ?string $image;
    public DateTime $update_at;
    public DateTime $create_at;

    // Constructor
    public function __construct(
        int       $id,
        string    $name,
        int       $area,
        int       $price,
        int       $quantity,
        int       $adult,
        int       $children,
        string    $description,
        bool      $status = true,
        bool      $wifi = false,
        bool      $television = false,
        bool      $ac = false,
        bool      $cctv = false,
        bool      $dining_room = false,
        bool      $parking_area = false,
        int       $bedrooms,
        int       $bathrooms,
        int       $wardrobe,
        bool      $security = false,
        ?string   $image = null,
        ?DateTime $update_at = null,
        ?DateTime $create_at = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->area = $area;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->adult = $adult;
        $this->children = $children;
        $this->description = $description;
        $this->status = $status;
        $this->wifi = $wifi;
        $this->television = $television;
        $this->ac = $ac;
        $this->cctv = $cctv;
        $this->dining_room = $dining_room;
        $this->parking_area = $parking_area;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
        $this->wardrobe = $wardrobe;
        $this->security = $security;
        $this->image = $image;
        $this->update_at = $update_at ?? new DateTime();
        $this->create_at = $create_at ?? new DateTime();
    }
}
