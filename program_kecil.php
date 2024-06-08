<?php

$numbers = range(1, 100);

function prima($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

$numbers = array_reverse($numbers);


foreach ($numbers as $number) {
    if (prima($number)) {
        continue;
    } elseif ($number % 3 == 0 && $number % 5 == 0) {
        echo "FooBar ";
    } elseif ($number % 3 == 0) {
        echo "Foo ";
    } elseif ($number % 5 == 0) {
        echo "Bar ";
    } else {
        echo $number . " ";
    }
}
