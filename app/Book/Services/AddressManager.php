<?php


namespace App\Book\Services;


class AddressManager
{
    private array $addresses = ["140.82.121.3", "216.58.213.174"];

    public function outputAddresses(bool $resolve): string
    {
        $res = '';
        foreach ($this->addresses as $address) {
            $res .= $address;

            if ($this->chekResolve($resolve)) {
                $res .= " (".gethostbyaddr($address).")";
            }
            $res .= "<br >";
        }
        return $res;
    }

    public function chekResolve($resolve): bool
    {
        if (is_string($resolve)) {
            $resolve = (preg_match("/^(false|no|off)$/i", $resolve))
                ? false : true;
        }
        return $resolve;
    }
}
