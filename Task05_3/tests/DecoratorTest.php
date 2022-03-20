<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Business;
use App\Standard;
use App\Luxury;
use App\DedicatedInternet;
use App\AdditionalSofa;
use App\FoodDelivery;
use App\Dinner;
use App\BreakfastBuffet;

class DecoratorTest extends TestCase
{
    public function testDecorator()
    {
        $hotelRoom1 = new Luxury();
        $hotelRoom1 = new DedicatedInternet($hotelRoom1);
        $hotelRoom1 = new Dinner($hotelRoom1);
        $hotelRoom1 = new FoodDelivery($hotelRoom1);
        $hotelRoom1 = new BreakfastBuffet($hotelRoom1);
        $this -> assertSame("Класс: Люкс, выделенный Интернет, ужин, доставка еды в номер, завтрак \"шведский стол\"", $hotelRoom1 -> getDescription());
        $this -> assertSame(4700, $hotelRoom1 -> getPrice());
        $hotelRoom2 = new Standard();
        $hotelRoom2 = new FoodDelivery($hotelRoom2);
        $hotelRoom2 = new DedicatedInternet($hotelRoom2);
        $this -> assertSame("Класс: Стандарт, доставка еды в номер, выделенный Интернет", $hotelRoom2 -> getDescription());
        $this -> assertSame(2400, $hotelRoom2 -> getPrice());
    }
}
