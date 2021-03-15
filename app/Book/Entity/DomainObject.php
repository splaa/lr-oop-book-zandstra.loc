<?php


namespace App\Book\Entity;


use JetBrains\PhpStorm\Pure;

abstract class DomainObject
{
    private string $group;

    #[Pure] public function __construct()
    {
        $this->group = static::getGroup();
    }


    #[Pure] public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup(): string
    {
        return "default";
    }
}
