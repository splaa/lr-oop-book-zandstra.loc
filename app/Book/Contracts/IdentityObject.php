<?php


namespace App\Book\Contracts;


interface IdentityObject
{
    public function generateId(): string;
}
