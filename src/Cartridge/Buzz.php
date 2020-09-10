<?php

namespace App\Cartridge;

/**
 * Class Buzz.
 *
 * @author Kiet Tran <mail@kiettran.nl>
 */
class Buzz implements CartridgeInterface
{
    /**
     * @var int
     */
    private int $number;

    /**
     * Construct the FizzBuzz.
     *
     * @param int $number
     */
    public function __construct(int $number = 5)
    {
        $this->number = $number;
    }

    /**
     * {@inheritdoc}
     */
    public function isReplacementNeeded(int $current): bool
    {
        return !($current % $this->number);
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return substr(strrchr(__CLASS__, "\\"), 1);
    }
}
