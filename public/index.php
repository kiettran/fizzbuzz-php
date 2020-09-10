<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Cartridge\Buzz;
use App\Cartridge\Fizz;
use App\Cartridge\FizzBuzz;
use App\Printer;

$printer = new Printer([
    new FizzBuzz(),
    new Fizz(),
    new Buzz(),
]);

echo $printer->print();
