<?php


namespace App\Book\Entity;


class Document extends DomainObject
{
    public static function getGroup():string
    {
        return "document";
    }

}
