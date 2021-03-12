<?php


namespace App\Book\Services;


use JetBrains\PhpStorm\Pure;

class ConfReader
{
    #[Pure] public function getValues(array $default = null): array
    {
        $values = [];
        $values = array_merge($default, $values);
        return $values;
    }
}
