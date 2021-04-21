<?php

$asc = function (array $tab): array {
    $min = +INF;
    foreach ($tab as $key => $number) {
        if ($number < $min) {
            $min = $number;
            $index = $key;
        }
    }

    return [
        'index' => $index,
        'number' => $min
    ];
};

$desc = function (array $tab): array {
    $min = -INF;
    foreach ($tab as $key => $number) {
        if ($number > $min) {
            $min = $number;
            $index = $key;
        }
    }

    return [
        'index' => $index,
        'number' => $min
    ];
};

function bubble_sort(array $tab, callable $callback): array
{
    $tabSort = [];

    foreach ($tab as $n) {

        $result = $callback($tab);
        unset($tab[$result['index']]);

        $tabSort[] = $result['number'];
    }

    return $tabSort;
}

var_dump(bubble_sort([8, 1, 0, 17, 15, 2, 7, 12], $asc));

var_dump(bubble_sort([8, 1, 0, 17, 15, 2, 7, 12], $desc));
