<?php


namespace App\Book\Entity;


use JetBrains\PhpStorm\Pure;

class BookProduct extends ShopProduct
{


    #[Pure] public function __construct(
        string $title = "Стандартный товар",
        string $producerMainName = "Фамилия автора",
        string $producerFirstName = "Имя автора",
        float $price = 0,
        private int $numPages = 0
    ) {
        parent::__construct(
            title: $title,
            producerMainName: $producerMainName,
            producerFirstName: $producerFirstName,
            price: $price
        );
    }

    #[Pure] public function getSummaryLine(): string
    {
        $resLine = parent::getSummaryLine();
        $resLine .= ": {$this->getNumberOfPages()} стр.";

        return $resLine;
    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    public function getPrice():float
    {
        return $this->price;
    }
}
