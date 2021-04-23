<?php

namespace App\Classes;

class DicesThrower
{

    public function throwAllDices(): array
    {
        $allDices = [];
        for ($i = 0; $i < 5; $i++) {
            $allDices[] = rand(1, 6);
        }

        return $allDices;
    }
}
