<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\PayPal;
use App\CreditCard;
use App\PayPalAdapter;
use App\CreditCardAdapter;

class PayTest extends TestCase
{
    public function testAdapters()
    {
        $paypalAdapter = new PayPalAdapter(new PayPal('customer@aol.com', 'password'));
        $ccAdapter = new CreditCardAdapter(new CreditCard(1234567890123456, "09/22"));
        $this -> assertSame("Authorization code:", $ccAdapter -> collectMoney(420));
        $this -> assertSame("PayPal Success!", $paypalAdapter -> collectMoney(1337));
    }
}
