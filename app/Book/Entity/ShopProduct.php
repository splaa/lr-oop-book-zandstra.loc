<?php


namespace App\Book\Entity;


use JetBrains\PhpStorm\Pure;
use PDO;

class ShopProduct
{
    public const AVAILABLE = 0;
    public const OUT_OF_STOCK = 1;


    private int $id = 0;
    public int $discount = 0;

    /**
     * ShopProduct constructor.
     * @param string $title
     * @param string $producerMainName
     * @param string $producerFirstName
     * @param float $price
     */
    public function __construct(
        private string $title = "Стандартный товар",
        private string $producerMainName = "Фамилия автора",
        private string $producerFirstName = "Имя автора",
        protected float $price = 0
    )
    {
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public static function getInstance(int $id, PDO $pdo): ?ShopProduct
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }
        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float)$row['price'],
                (int)$row['numpages'],
            );
        } elseif ($row['type'] == "cd") {
            $product = new CdProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float)$row['price'],
                (string)"01:02:03"
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float)$row['price'],
            );
        }
        $product->setId((int)$row['id']);
        $product->setDiscount((int)$row['discount']);
        return $product;
    }

    public function getProducer(): string
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }

    #[Pure] public function getSummaryLine(): string
    {
        $base = "{$this->getTitle()} ( {$this->getProducerFirstName()} ";
        $base .= "{$this->getProducerMainName()} )";
        return $base;
    }

    /**
     * @param int $discount
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @param string $title
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
     * @param string $producerMainName
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
     * @param string $producerFirstName
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
