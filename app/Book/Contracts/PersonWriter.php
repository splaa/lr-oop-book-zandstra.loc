<?php


namespace App\Book\Contracts;


use App\Book\Entity\Person;

interface PersonWriter
{
    public function writer(Person $person);

}
