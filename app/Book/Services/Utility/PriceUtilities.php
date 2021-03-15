<?php


namespace App\Book\Services\Utility;


trait PriceUtilities
{

    private static int $taxrate = 17;

    public  function calculateTax(float $price): float
    {
        return (($this->getTaxRate()/100) * $price);
    }
   public abstract function getTaxRate():float;
}
