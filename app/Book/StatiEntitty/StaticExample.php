<?php


namespace App\Book\StatiEntitty;


class StaticExample
{
    static public int $aNum = 0;

    public static function say()
    {
        self::$aNum++;
        return "Hello!!! (" .self::$aNum . ")" . PHP_EOL;
    }

}

echo StaticExample::say();
echo StaticExample::say();
echo StaticExample::say();
echo StaticExample::say();
echo StaticExample::say();
