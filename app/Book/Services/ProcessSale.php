<?php


namespace App\Book\Services;


use App\Book\Entity\Product;
use Exception;

class ProcessSale
{
    private array $callbacks;

    /**
     * @param callable $callback
     * @throws \Exception
     */
    public function registerCallback(callable $callback)
    {
        if (! is_callable($callback)) {
            throw new Exception("Функция обратного вызова — невызываемая");
        }
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product)
    {
        print "{$product->name}: обрабатывается...<br>";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }

}
