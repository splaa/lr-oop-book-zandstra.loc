<?php


namespace App\Book\Entity;


use JetBrains\PhpStorm\Pure;

class ShopProduct
{
    public int $discount = 0;

    /**
     * ShopProduct constructor.
     * @param  string  $title
     * @param  string  $producerMainName
     * @param  string  $producerFirstName
     * @param  float  $price
     */
    public function __construct(
        private string $title = "Стандартный товар",
        private string $producerMainName = "Фамилия автора",
        private string $producerFirstName = "Имя автора",
        protected float $price = 0
    ) {
    }

    public function getProducer(): string
    {
        return $this->producerFirstName." "
            .$this->producerMainName;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount ;
    }

    #[Pure] public function getSummaryLine(): string
    {
        $base = "{$this->getTitle()} ( {$this->getProducerFirstName()} ";
        $base .= "{$this->getProducerMainName()} )";
        return $base;
    }

    /**
     * @param  int  $discount
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param  string  $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  string  $producerMainName
     */
    public function setProducerMainName(string $producerMainName): void
    {
        $this->producerMainName = $producerMainName;
    }

    /**
     * @return string
     */
    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

    /**
     * @param  string  $producerFirstName
     */
    public function setProducerFirstName(string $producerFirstName): void
    {
        $this->producerFirstName = $producerFirstName;
    }

    /**
     * @return string
     */
    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }


}
