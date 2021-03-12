<?php


namespace App\Book\Services;


use App\Book\Entity\ShopProduct;

class TextProductWriter extends ShopProductWriter
{

    public function write(): string
    {
        $str = "ТОВАРЫ:" . "<br>";
        /** @var ShopProduct $shopProduct */
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "<br>";
        }
        return $str;
    }
}
