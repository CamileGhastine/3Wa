<?php

namespace App;

class Action
{
    public function __construct(private string $type, private array $action)
    {
    }

    public function increment(array $state): int
    {
        return $state['count'] + $this->action['number'];
    }

    public function decrement(array $state): int
    {
        return $state['count'] - $this->action['number'];
    }

    public function getType(): string
    {
        return $this->type;
    }
}
