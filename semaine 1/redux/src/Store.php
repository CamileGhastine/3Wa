<?php

namespace App;

class Store
{
    const INCREMENT = "INCREMENT";
    const DECREMENT = "DECREMENT";
    private $callback;

    public function __construct(private string $reducer, private array $state)
    {
    }

    public function subscribe(callable $callback): self
    {
        $this->callback = $callback;

        return $this;
    }

    public function dispatch(Action $action): void
    {
        $reducer = $this->reducer;
        if (!method_exists($this, $reducer)) throw new \InvalidArgumentException("Ce reducer n'existe pas !");

        $newState = $this->$reducer(action: $action);
        $this->state = $newState;
        $this->callback->call($this, state: $this->state);
    }

    public function countReducer(Action $action): array
    {
        switch ($action->getType()) {
            case self::INCREMENT:
                return ['count' => $action->increment(state: $this->state)];
                break;
            case self::DECREMENT:
                return ['count' => $action->decrement(state: $this->state)];
                break;
            default:
                throw new \InvalidArgumentException("Ce type d'action n'est pas valide !");
        }
    }

    public function getstate(): array
    {
        return $this->state;
    }
}
