<?php


namespace App\Book\Services;


use App\Book\Entity\ShopProduct;
use JetBrains\PhpStorm\Pure;

abstract class ShopProductWriter
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write(): string;

}
