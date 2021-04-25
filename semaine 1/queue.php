<?php

class Queue
{
    public array $queue = [];

    public function push($element): self
    {
        array_unshift($this->queue, $element);

        return $this;
    }

    public function pop()
    {
        $last = end($this->queue) ?: throw new ValueError("Aucun élement dans la queue !");
        
        unset($this->queue[array_key_last($this->queue)]);

        return $last;
    }

    public function clear(): self
    {
        $this->queue = [];

        return $this;
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
