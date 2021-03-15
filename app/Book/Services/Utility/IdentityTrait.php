<?php


namespace App\Book\Services\Utility;


trait IdentityTrait
{
    public function generateId(): string
    {
        return uniqid();
    }
}
