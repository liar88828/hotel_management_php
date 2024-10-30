<?php

class StaffBase
{
    // Public Properties
    public int $id;
    public string $name;
    public string $email;
    public ?string $phone;
    public ?string $image;
    public ?string $address;
    public ?string $pin_code;
    public ?DateTime $date_of_birth;
    public string $position;

    // Constructor
    public function __construct(
        int       $id,
        string    $name,
        string    $email,
        ?string   $phone = null,
        ?string   $image = null,
        ?string   $address = null,
        ?string   $pin_code = null,
        ?DateTime $date_of_birth = null,
        string    $position = null,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->image = $image;
        $this->address = $address;
        $this->pin_code = $pin_code;
        $this->date_of_birth = $date_of_birth;
        $this->position = $position;

    }
}
