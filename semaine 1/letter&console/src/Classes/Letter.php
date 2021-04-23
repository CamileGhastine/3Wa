<?php

namespace App\Classes;

class Letter
{

    public function generate(int $n): array
    {
        $letters = [];

        for ($i = 0; $i < $n; $i++) {
            $letters[] = chr(rand(97, 122));
        }
        
        return $letters;
    }
}
