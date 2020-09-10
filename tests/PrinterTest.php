<?php

namespace Tests;

use App\Cartridge\Buzz;
use App\Cartridge\Fizz;
use App\Cartridge\FizzBuzz;
use App\Printer;
use PHPUnit\Framework\TestCase;

/**
 * Tests for {@see Printer}.
 */
class PrinterTest extends TestCase
{
    /**
     * @var Printer
     */
    private Printer $printer;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->printer = new Printer();
    }

    /**
     * Tests if {@see Printer::print()} will print string numbers only.
     */
    public function testsIfPrinterWillPrintNumbersOnly(): void
    {
        $this->assertSame("1\n2\n3\n4\n5\n6\n7\n8\n9\n10", $this->printer->print(10));
    }

    /**
     * Tests if {@see Printer::print()} will print the "FizzBuzz" value at page number 15.
     */
    public function testsIfPrinterWillPrintExpectedFizzBuzz(): void
    {
        $this->printer->addCartridge(new FizzBuzz());

        $this->assertSame(
            "1\n2\n3\n4\n5\n6\n7\n8\n9\n10\n11\n12\n13\n14\nFizzBuzz",
            $this->printer->print(15)
        );
    }

    /**
     * Tests if {@see Printer::print()} will print the expected "Fizz", "Buzz" and "FizzBuzz" values.
     */
    public function testsIfPrinterWillPrintExpectedFizzBuzzAndFizzBuzz(): void
    {
        $this->printer->addCartridge(new FizzBuzz());
        $this->printer->addCartridge(new Fizz());
        $this->printer->addCartridge(new Buzz());

        $this->assertSame(
            "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz",
            $this->printer->print(15)
        );
    }
}
