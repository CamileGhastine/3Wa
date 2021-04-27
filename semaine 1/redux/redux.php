<?php

use App\Store;
use App\Action;

require_once 'vendor/autoload.php';

$initialState = [
    'count' => 0
];

$reducer = 'countReducer';

try {
    $store = new Store(reducer: $reducer, state: $initialState);

    $store->subscribe(function ($state) {
        echo $state['count'] . PHP_EOL;
    });

    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 1
    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 2
    $store->dispatch(new Action(type: "DECREMENT", action: ['number' => 1])); // 1
    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 2
    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 3
    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 4
    $store->dispatch(new Action(type: "INCREMENT", action: ['number' => 1])); // 5
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
