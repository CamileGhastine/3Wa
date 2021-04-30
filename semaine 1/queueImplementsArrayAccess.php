<?php

class Queue implements ArrayAccess
{
    private $container = [];

    public function push($value)
    {
        return $this->offsetSet($value);
    }

    public function pop(): mixed
    {

        $keyFirst = array_key_first($this->container);

        $last = $this->offsetGet($keyFirst) ?: throw new ValueError("Aucun élement dans la queue !");
        
        $this->offsetUnset($keyFirst);

        return $last;
    }

    public function clear(): self
    {
        $this->container = [];

        return $this;
    }

    public function offsetSet(mixed $value, mixed $offset = null): self
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$queue = new Queue();

try {
    $queue->push(1);
    $queue->push(2);
    $queue->push(3);
    echo $queue->pop() . PHP_EOL; // affiche 1
    echo $queue->pop() . PHP_EOL; // affiche 2
    $queue->clear(); // retire tous les éléments de la queue
    echo $queue->pop(); // lève une ValueError

} catch (ValueError $e) {
    echo $e->getMessage();
}
