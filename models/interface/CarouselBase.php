<?php

class CarouselBase
{
    // Properties
    public int $id;
    public string $name;
    public ?string $image;

    // Constructor
    public function __construct(int $id, string $name, ?string $image = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }
}
