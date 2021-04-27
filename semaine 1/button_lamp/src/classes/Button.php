<?php

namespace App\Classes;

class Button
{

    public function __construct(private Lamp $lamp)
    {
    }

    public function switchDevice() : mixed
    {
        $this->lamp->changeStat();

        return $this->lamp->stat();
    }
}
