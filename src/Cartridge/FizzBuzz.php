<?php

namespace App\Cartridge;

/**
 * Class FizzBuzz.
 *
 * @author Kiet Tran <mail@kiettran.nl>
 */
class FizzBuzz implements CartridgeInterface
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
    public function __construct(int $number = 15)
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
