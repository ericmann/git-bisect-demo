<?php

function add($a, $b): mixed
{
    if (!is_numeric($a) || ! is_numeric($b)) {
        throw new InvalidArgumentException('Input must be numeric!');
    }

    return $a + $b;
}

function addAll(...$items): mixed
{
    $sum = 0;

    while(sizeof($items) > 0) {
        $sum = add($sum, abs(array_pop($items)));
    }

    return $sum;
}

function subtract($a, $b): mixed
{
    if (!is_numeric($a) || ! is_numeric($b)) {
        throw new InvalidArgumentException('Input must be numeric!');
    }

    return add($a, -$b);
}

function multiply($a, $b): mixed
{
    return $a * $b;
}