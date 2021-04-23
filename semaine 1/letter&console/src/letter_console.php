<?php

use App\Classes\Letter;
use App\Classes\Console;

require_once dirname(__DIR__).'/vendor/autoload.php';

$letter = new Letter;
$console = new Console();

try {
    $alphabet = $letter->generate(10);
    $console->show($alphabet);
} catch (TypeError $e) {
    echo "Le nombre passer à la methode generate() doit être un entier !";
}
