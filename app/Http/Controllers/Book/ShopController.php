<?php

namespace App\Http\Controllers\Book;

use App\Book\Entity\BookProduct;
use App\Book\Entity\CdProduct;
use App\Book\Entity\ShopProduct;
use App\Book\Services\AddressManager;
use App\Book\Services\ShopProductWriter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleXMLElement;

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
        $writer = new ShopProductWriter();
        $writer->addProduct($bookProduct);
        $writer->addProduct($cdProduct);

        return $writer->write();
    }
}
