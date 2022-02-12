<?php

namespace Tests\BookTest;

use App\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSetName()
    {
        $book = new Book();
        $book->setName("Mumu");

        $this->assertEquals("Mumu", $book->getName());
    }

    public function testSetAuthors()
    {
        $book = new Book();
        $book->setAuthors(array("I. Turgenev", "F. Dostoevsky"));

        $this->assertEquals(array("I. Turgenev", "F. Dostoevsky"), $book->getAuthors());
    }

    public function testSetPublisher()
    {
        $book = new Book();
        $book->setPublisher("BBC");

        $this->assertEquals("BBC", $book->getPublisher());
    }

    public function testSetYear()
    {
        $book = new Book();
        $book->setYear(2005);

        $this->assertEquals(2005, $book->getYear());
    }
}
