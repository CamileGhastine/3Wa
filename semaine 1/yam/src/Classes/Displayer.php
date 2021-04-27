<?php

namespace App\Classes;

use App\Classes\DicesThrower;
use App\Classes\Sorter;

class Displayer
{
    private DicesThrower $thrower;
    private Sorter $sorter;

    public function __construct()
    {
        $this->thrower = new DicesThrower;
        $this->sorter = new Sorter;
    }

    public function display(int $attemps): string
    {
        $allThrows = [];

        for ($i = 0; $i < $attemps; $i++) {
            $allThrows[] = $this->thrower->throwAllDices();
        }

        list($twoPaire, $brelan, $carre, $yam) = $this->sorter->sort($allThrows);

        return
            "lors des $attemps jets :" . PHP_EOL .
            "- Les deux paires sont sorties $twoPaire fois." . PHP_EOL .
            "- Le brelan est sorti $brelan fois." . PHP_EOL .
            "- Le carré est sorti $carre fois." . PHP_EOL .
            "- Le yam est sorti $yam fois." . PHP_EOL;
    }
}
