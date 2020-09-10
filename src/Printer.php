<?php

namespace App;

use App\Cartridge\CartridgeInterface;

/**
 * A program that prints the number from 1 to n.
 * Multiples of three (3) prints "Fizz" {@see Fizz} instead of the number and multiples of five (5) prints "Buzz"
 * {@see Buzz}.
 *
 * For numbers which are multiples of both three and five prints "FizzBuzz" {@see FizzBuzz}.
 *
 * @author Kiet Tran <mail@kiettran.nl>
 */
class Printer
{
    /**
     * @var CartridgeInterface[]
     */
    private iterable $cartridges;

    /**
     * Constructs the Printer.
     *
     * @param iterable $cartridges
     */
    public function __construct(iterable $cartridges = [])
    {
        $this->cartridges = $cartridges;
    }

    /**
     * Add a cartridge to the printer.
     *
     * @param CartridgeInterface $cartridge
     */
    public function addCartridge(CartridgeInterface $cartridge): void
    {
        $this->cartridges[] = $cartridge;
    }

    /**
     * Output the printer with its separator.
     *
     * @param int    $maxRange
     * @param string $separator
     *
     * @return string
     */
    public function print(int $maxRange = 100, string $separator = "\n"): string
    {
        $pageNumbers = range(1, $maxRange);

        return implode($separator, $this->processPageNumbers($pageNumbers));
    }

    /**
     * Process the range of page numbers.
     *
     * @param array $pageNumbers
     *
     * @return array
     */
    private function processPageNumbers(array $pageNumbers): array
    {
        return array_map(
            function (int $number) {
                return $this->replaceCartridge($number);
            },
            $pageNumbers
        );
    }

    /**
     * Replace its cartridge when needed or else display the number.
     *
     * @param int $number
     *
     * @return string
     */
    private function replaceCartridge(int $number): string
    {
        foreach ($this->cartridges as $cartridge) {
            if ($cartridge->isReplacementNeeded($number)) {
                return $cartridge->getName();
            }
        }

        return (string) $number;
    }
}
