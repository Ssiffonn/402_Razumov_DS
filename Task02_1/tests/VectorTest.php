<?php

namespace Tests\VectorTest;

use App\Vector;
use PHPUnit\Framework\TestCase;

class VectorTest extends TestCase
{
    public function testAdd()
    {
        $v1 = new Vector(13, 7, 9);
    
        $v2 = new Vector(2, -5, -4);

        $this->assertSame("(15;2;5)", $v1->add($v2)->__toString());
    }

    public function testSub()
    {
        $v1 = new Vector(7, 1, 3);
    
        $v2 = new Vector(4, 5, -4);

        $this->assertSame("(3;-4;7)", $v1->sub($v2)->__toString());
    }

    public function testMultiply()
    {
        $v1 = new Vector(3, 9, 0);

        $this->assertSame("(9;27;0)", $v1->multiply(3)->__toString());
    }

    public function testScalar()
    {
        $v1 = new Vector(15, 9, 1);
    
        $v2 = new Vector(0, 5, -4);

        $this->assertEquals(41, $v1->scalar($v2));
    }

    public function testVector()
    {
        $v1 = new Vector(1, 6, 5);
    
        $v2 = new Vector(3, -6, 3);

        $this->assertSame("(-48;-12;24)", $v1->vector($v2)->__toString());
    }
}
