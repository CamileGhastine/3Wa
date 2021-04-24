<?php

namespace App\Classes;

class Letter
{
    public function generate(int $numberLetters): array
    {
        $letters = [];

        for ($i = 0; $i < $numberLetters; $i++) {
            $letters[] = chr(rand(97, 122));
        }
        
        return $letters;
    }
}
