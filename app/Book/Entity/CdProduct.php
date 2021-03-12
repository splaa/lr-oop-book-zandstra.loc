<?php


namespace App\Book\Entity;


use Carbon\Carbon;
use JetBrains\PhpStorm\Pure;

class CdProduct extends ShopProduct
{
    private string $playLength;

    public function __construct(
         string $title = "Стандартный товар",
         string $producerMainName = "Фамилия автора",
         string $producerFirstName = "Имя автора",
         float $price = 0,
        string $playLength = "00:00:00"
    ) {
        parent::__construct(
            title: $title,
            producerMainName: $producerMainName,
            producerFirstName: $producerFirstName,
            price: $price
        );
        $this->playLength = Carbon::createFromFormat('H:i:s', $playLength)->format('h:i:s');
    }

    public function getPlayLength(): string
    {
        return $this->playLength;
    }

    #[Pure] public function getSummaryLine(): string
    {
        return parent::getSummaryLine()
            .": Время звучания - {$this->playLength}.";
    }

}
