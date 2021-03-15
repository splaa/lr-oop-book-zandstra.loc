<?php


namespace App\Book\Services;


use App\Book\Contracts\Bookable;
use App\Book\Contracts\Chargeable;

class Consultancy extends TimedService implements Bookable,Chargeable
{

    public function getPrice(): float
    {
        // TODO: Implement getPrice() method.
    }
}
