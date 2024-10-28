<?php

class TestimonialBase
{
    // Public Properties
    public int $id;
    public string $name;
    public ?string $image;
    public ?string $text;
    public ?int $rating;

    // Constructor
    public function __construct(
        int     $id,
        string  $name,
        ?string $image = null,
        ?string $text = null,
        ?int    $rating = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->text = $text;
        $this->rating = $rating;
    }
}
