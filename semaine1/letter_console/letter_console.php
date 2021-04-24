<?php

use App\Classes\Letter;
use App\Classes\Console;

require_once __DIR__.'/vendor/autoload.php';

$letter = new Letter;
$console = new Console();

// Mofifier le nombre de lettres ici.
$numberLetters = 10;

try {
    $alphabet = $letter->generate($numberLetters);
    $console->show($alphabet);
} catch (TypeError $e) {
    echo "Le nombre passer à la methode generate() doit être un entier !";
}
