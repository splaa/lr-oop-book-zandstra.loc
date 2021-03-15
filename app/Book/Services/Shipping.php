<?php


namespace App\Book\Services;


use App\Book\Contracts\IdentityObject;

class Shipping implements \App\Book\Contracts\Chargeable
{

    public function getPrice(): float
    {
        // TODO: Implement getPrice() method.
    }

    public static function storeIdentityObject(IdentityObject $user)
    {
        //сделать что-нибудь
    }
}
