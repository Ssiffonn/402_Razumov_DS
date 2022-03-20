<?php

namespace App;

use App\HotelRoom;

class Business implements HotelRoom
{
    private static $price = 1000;
    private static $description = "Бизнес";

    public function getDescription()
    {
        return "Класс: " . self::$description;
    }
    public function getPrice()
    {
        return self::$price;
    }
}
