<?php

function toRupiah(int $price): string
{

    setlocale(LC_MONETARY, "id_ID");
    return "Rp. " . number_format($price, 0, ',', '.');

}
