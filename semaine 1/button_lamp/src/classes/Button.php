<?php

namespace App\Classes;

class Button
{

    public function __construct(private Lamp $lamp)
    {
    }

    public function switchDevice()
    {
        $this->lamp->changeStat();

        return $this->lamp->stat();
    }
}
