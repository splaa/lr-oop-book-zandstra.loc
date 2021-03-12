<?php


namespace App\Book\Services;


use App\Book\Entity\ShopProduct;

class XmlProductWrite extends ShopProductWriter
{

    public function write(): string
    {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        /** @var ShopProduct $shopProduct */
        foreach ($this->products as $shopProduct) {
            $writer->startElement('product');
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement('summary');
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement();
            $writer->endElement();
        }
        $writer->endElement();
        $writer->endDocument();
        return $writer->flush();
    }
}
