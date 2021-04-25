<?php

use App\Classes\Button;
use App\Classes\Lamp;

require_once __DIR__ . '/vendor/autoload.php';

$lamp = new Button(new Lamp);

echo $lamp->switchDevice() . PHP_EOL; // turn on
echo $lamp->switchDevice() . PHP_EOL; // turn off
echo $lamp->switchDevice() . PHP_EOL; // turn on
echo $lamp->switchDevice() . PHP_EOL; // turn off