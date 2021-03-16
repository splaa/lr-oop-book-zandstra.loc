<?php


namespace App\Book\Entity;




use App\Book\Contracts\PersonWriter;

class Person
{

    private $writer;

    /**
     * Person constructor.
     * @param $writer
     */
    public function __construct(PersonWriter $writer)
    {
        $this->writer = $writer;
    }

    public function output(PersonWriter $writer)
    {
        $writer->writer($this);

}
    public function __get(string $property)
    {
        $method = "get{$property}";

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function getName(): string
    {
        return "Petro";
    }

    public function getAge(): int
    {
        return 44;
    }

    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->writer, $method)) {
            return $this->writer->$method($this);
        }
    }
}
//todo:Глава_5 стр.152 Средства для работы с объектами
