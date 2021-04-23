<?php
namespace App;

use App\Classes\Displayer;
use TypeError;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Mofifier le nombre d'essai ici.
$try = 100;

$display = new Displayer;

try{
    echo $display->display($try);
} catch (TypeError) {
    echo "Erreur  de type : \$try doit être un entier.";
}

