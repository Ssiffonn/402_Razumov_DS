<?php

namespace App\Test;

use App\Vector;

function runTest()
{
    $v1 = new Vector(13, 7, 5);
    echo "v1 = " . $v1 . "\n"; // (2, 6, 1)

    $v2 = new Vector(1, 17, -9);
    echo "v2 = " . $v2 . "\n"; // (1, 5, -4)

    $vectorAddition = $v1->add($v2);
    $vectorDifference = $v1->sub($v2);
    $vectorNumberProduct = $v1->multiply(2);
    $scalarProduct = $v1->scalar($v2);
    $vectorProduct = $v1->vector($v2);

    echo "Сумма векторов\n";
    echo $vectorAddition; // (14; 24; -4)
    echo "\nРазность векторов\n";
    echo $vectorDifference; // (12; -10; 14)
    echo "\nПроизведение вектора на число\n";
    echo $vectorNumberProduct; // (26; 14; 10)
    echo "\nСкалярное произведение векторов\n";
    echo $scalarProduct; // 87
    echo "\nВекторное произведение\n";
    echo $vectorProduct; // (148;-122;-214)
}
