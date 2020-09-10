<?php

namespace App\Cartridge;

/**
 * The interface for defining the type of cartridges.
 *
 * @author Kiet Tran <mail@kiettran.nl>
 */
interface CartridgeInterface
{
    /**
     * Is the cartridge replacement needed?
     *
     * @param int $current
     *
     * @return bool
     */
    public function isReplacementNeeded(int $current): bool;

    /**
     * Return the cartridge name.
     *
     * @return string
     */
    public function getName(): string;
}
