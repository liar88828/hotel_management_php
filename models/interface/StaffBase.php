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
    public ?string $pinCode;
    public ?DateTime $dateOfBirth;
    public string $password;

    // Constructor
    public function __construct(
        int       $id,
        string    $name,
        string    $email,
        ?string   $phone = null,
        ?string   $image = null,
        ?string   $address = null,
        ?string   $pinCode = null,
        ?DateTime $dateOfBirth = null,
        string    $password
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->image = $image;
        $this->address = $address;
        $this->pinCode = $pinCode;
        $this->dateOfBirth = $dateOfBirth;
        $this->password = $password;
    }
}
