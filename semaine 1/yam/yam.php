<?php

use App\Classes\Displayer;
use TypeError;

require_once __DIR__ . '/vendor/autoload.php';

// Mofifier le nombre d'essai ici.
$attemps = 100;

$display = new Displayer;

try {
    echo $display->display($attemps);
} catch (TypeError) {
    echo "Erreur  de type : \$attemps doit être un entier.";
}
