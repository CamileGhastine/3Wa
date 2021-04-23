<?php

namespace App\Classes;

class Console
{
    public function show(array $alphabet): void
    {
        echo '[' . implode( ', ', $alphabet) . ']';
    }
}
