<?php


namespace App\Book\Services\Utility;


class UtilityService extends Service
{

  use PriceUtilities{
      PriceUtilities::calculateTax as private;
  }


    public function __construct(
        private float $price
    ){}

    public function getTaxRate(): float
    {
        return 17;
    }
    public function getFinalPrice(): float
    {
        return ($this->price + $this->calculateTax($this->price));
    }

}

