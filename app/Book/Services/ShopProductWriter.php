<?php


namespace App\Book\Services;


use App\Book\Entity\ShopProduct;
use JetBrains\PhpStorm\Pure;

class ShopProductWriter
{
    private array $product = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->product [] = $shopProduct;
    }

    #[Pure] public function write(): string
    {
        $str = "";
        /** @var ShopProduct $shopProduct */
        foreach ($this->product as $shopProduct) {
            $str .="{$shopProduct->getSummaryLine()} ";
            $str .=" Цена - {$shopProduct->getPrice()}". "<br>";
        }
        return $str;
    }

}
