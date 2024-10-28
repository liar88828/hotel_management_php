<?php

class BookingBase
{
    public int $id;
    public int $guest_id;
    public int $room_id;
    public bool $booking;
    public bool $confirm;
    public ?bool $finish;
    public DateTime $check_in_date;
    public DateTime $check_out_date;
    public ?float $total_price;
    public DateTime $created_at;
    public DateTime $updated_at;

    // Constructor
    public function __construct(
        int      $id,
        int      $guest_id,
        int      $room_id,
        bool     $booking,
        bool     $confirm,
        ?bool    $finish,
        DateTime $check_in_date,
        DateTime $check_out_date,
        ?float   $total_price,
        DateTime $created_at,
        DateTime $updated_at,
    )
    {
        $this->$id = $id;
        $this->$guest_id = $guest_id;
        $this->$room_id = $room_id;
        $this->$booking = $booking;
        $this->$confirm = $confirm;
        $this->$finish = $finish;
        $this->$check_in_date = $check_in_date;
        $this->$check_out_date = $check_out_date;
        $this->$total_price = $total_price;
        $this->$created_at = $created_at;
        $this->$updated_at = $updated_at;
    }
}
