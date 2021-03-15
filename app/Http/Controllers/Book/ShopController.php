<?php

namespace App\Http\Controllers\Book;

use App\Book\Contracts\IdentityObject;
use App\Book\Entity\BookProduct;
use App\Book\Entity\CdProduct;
use App\Book\Entity\Document;
use App\Book\Entity\ShopProduct;
use App\Book\Entity\SpreadSheet;
use App\Book\Entity\User;
use App\Book\Services\AddressManager;
use App\Book\Services\TextProductWriter;
use App\Book\Services\Utility\UtilityService;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {

        $settings = simplexml_load_file(
            app_path() . "/Book/resolve.xml");

        $manager = new AddressManager();

        $manager->outputAddresses((string)$settings->resolvedomains);

        $bookProduct = new BookProduct(
            title: "Собачье сердце",
            producerMainName: "Булгаков",
            producerFirstName: "Михаил",
            price: 5.99,
            numPages: 735
        );
        $cdProduct = new CdProduct(
            title: "Классическая музыка. Лучшее",
            producerMainName: "Вивальди",
            producerFirstName: "Антонио",
            price: 10.99,
            playLength: "00:60:33"
        );
        $writer = new TextProductWriter();
        $writer->addProduct($bookProduct);
        $writer->addProduct($cdProduct);



        $path = "/home/splx/PhpstormProjects/lr-oop-book-zandstra.loc/database/database.sqlite";
        $dsn  = "sqlite:". $path;
        $pdo = new \PDO($dsn, null, null);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $obj1 = ShopProduct::getInstance(1, $pdo);
        $obj2 = ShopProduct::getInstance(2, $pdo);
        $writer->addProduct($obj1);
        $writer->addProduct($obj2);
        return $writer->write();
    }

    public function indexTrait()
    {
dd(Document::create(), User::create(), SpreadSheet::create());

    }

    public static function storeIdentityObject(IdentityObject $identityObject)
    {

    }

}
