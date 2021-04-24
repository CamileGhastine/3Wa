<?php

namespace App\Classes;

class Lamp
{
    private bool $stat = false;

    public function changeStat(): self
    {
        $this->stat = !$this->stat;

        return $this;
    }

    public function stat(): string
    {
        if ($this->stat) return "Turn on !";

        return "Turn off !";
    }
}
