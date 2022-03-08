<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\BooksList;
use App\Book;

class BooksListTest extends TestCase
{
    public function testAddAndCount()
    {
        $book = new Book();
        $booksList = new BooksList();
        $booksList->add($book);
        $this->assertSame(1, $booksList->count());
    }

    public function testGet()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Roadside picnic")->setAuthors(array("A. Strugacki", "B. Strugacki"))
            ->setPublisher("Gvardia")->setYear(1971);
        $booksList->add($book);
        $this -> assertInstanceOf(Book::class, $booksList -> get(1));
    }

    public function testStore()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Roadside picnic")->setAuthors(array("A. Strugacki", "B. Strugacki"))
            ->setPublisher("Gvardia")->setYear(1971);
        $booksList->add($book);
        $this -> assertSame(null, $booksList -> store("output"));
    }

    public function testLoad()
    {
        $booksList = new BooksList();
        $booksList->load("output");
        $this->assertSame(1, $booksList->count());
        $this->assertInstanceOf(Book::class, $booksList->get(1));
    }

    public function testCurrentAndKey()
    {
        $book1 = new Book();
        $book2 = new Book();
        $book3 = new Book();
        $booksList = new BooksList();
        $book1 -> setName("Roadside picnic")->setAuthors(array("A. Strugacki", "B. Strugacki"))
            ->setPublisher("Gvardia")->setYear(1971);
        $book2 -> setName("Mumu")->setAuthors(array("I. Turgenev"))
            ->setPublisher("BBC")->setYear(2005);
        $book3 -> setName("The twelve Chairs")
            ->setAuthors(array("E. Petrov", "I. Ilf"))
            ->setPublisher("ABC")->setYear(2007);
        $booksList -> add($book1);
        $booksList -> add($book2);
        $booksList -> add($book3);

        $this->assertSame(
            "Id: 8" . "\n" .
            "Название: Roadside picnic" . "\n" .
            "Автор 1: A. Strugacki" . "\n" .
			"Автор 2: B. Strugacki" . "\n" .
            "Издательство: Gvardia" . "\n" .
            "Год: 1971",
            $booksList -> current() -> __toString()
        );
        $this -> assertSame(8, $booksList -> key());
		$booksList -> store("output");
        return $booksList;
    }

    public function testNext()
    {
		$booksList = new BooksList();
        $booksList->load("output");
		$booksList->next();
        $this->assertSame(
            "Id: 9" . "\n" .
            "Название: Mumu" . "\n" .
            "Автор 1: I. Turgenev" . "\n" .
            "Издательство: BBC" . "\n" .
            "Год: 2005",
            $booksList -> current() -> __toString()
        );
        $booksList->next();
        $this->assertSame(
            "Id: 10" . "\n" .
            "Название: The twelve Chairs" . "\n" .
            "Автор 1: E. Petrov" . "\n" .
            "Автор 2: I. Ilf" . "\n" .
            "Издательство: ABC" . "\n" .
            "Год: 2007",
            $booksList -> current() -> __toString()
        );

        return $booksList;
    }

    public function testValidAndRewind()
    {
		$booksList = new BooksList();
        $booksList->load("output");
        $booksList -> next();
        $this -> assertSame(true, $booksList -> valid());
        $booksList -> rewind();
        $this -> assertSame(true, $booksList -> valid());
        $this -> assertSame(
            "Id: 8" . "\n" .
            "Название: Roadside picnic" . "\n" .
            "Автор 1: A. Strugacki" . "\n" .
			"Автор 2: B. Strugacki" . "\n" .
            "Издательство: Gvardia" . "\n" .
            "Год: 1971",
            $booksList->current()->__toString()
        );
    }
}
