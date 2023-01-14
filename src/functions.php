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
        $sum = add($sum, array_pop($items));
    }

    return $sum;
}

function subtract($a, $b): mixed
{
    return add($a, -$b);
}

function multiply($a, $b): mixed
{
    if (!is_numeric($a) || ! is_numeric($b)) {
        throw new InvalidArgumentException('Input must be numeric!');
    }

    return $a * $b;
}

function divide($a, $b): mixed
{
    return multiply($a, 1 / $b);
}