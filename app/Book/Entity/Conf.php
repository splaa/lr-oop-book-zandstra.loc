<?php


namespace App\Book\Entity;


use Exception;

class Conf
{
    private string $file;
    private $xml;
    private $lastmatch;

    /**
     * @param string $file
     * @throws Exception
     */

    public function __construct(string $file = "")
    {

        if (!file_exists($file)) {
            throw new Exception("Файл {$file} не найден");
        }
        $this->file = $file;
        $this->xml = simplexml_load_file($file);
    }

    /**
     * @throws Exception
     */
    public function write()
    {
        if (!is_writeable($this->file)) {
            throw new Exception("Файл '{$this->file}' недоступен для записи");
        }
        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str): ?string
    {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return(string)$matches[0];
        }
        return null;
    }
    public function set(string $key, string $value) {
        if (! is_null($this->get($key))) {
            $this->lastmatch[0] = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->
        addAttribute('name', $key);
    }

    //todo:Создание подклассов класса Exception
}
