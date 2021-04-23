<?php
namespace App;

use App\Classes\Displayer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Mofifier le nombre d'essai ici.
$try = 100;

$display = new Displayer;

echo $display->display($try);
