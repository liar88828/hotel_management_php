<?php

class GuestBase
{
    // Properties
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

    // Getters and Setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getPinCode(): ?string
    {
        return $this->pinCode;
    }

    public function setPinCode(?string $pinCode): void
    {
        $this->pinCode = $pinCode;
    }

    public function getDateOfBirth(): ?DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?DateTime $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
