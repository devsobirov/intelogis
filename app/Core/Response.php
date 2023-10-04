<?php


namespace App\Core;


class Response
{
    public function __construct(
        protected string $url = ''
    ) {}

    public function isOk(): bool
    {
        return rand(0, 99) !== 13;
    }

    public function toArray(): array
    {
        return $this->getResponseBody();
    }

    public function toJson(): string
    {
        return json_encode($this->getResponseBody());
    }

    private function getResponseBody(): array
    {
        return match ($this->url) {
            'https://shipping-orders.fake' => $this->getShippingOrdersResponse(),
            'https://premium-shipping.agency' => $this->getFastCompanyResponse(),
            'https://regular-shipping.agency' => $this->getRegularCompanyResponse(),
            default => []
        };
    }

    private function getShippingOrdersResponse(): array
    {
        $data = [];

        for ($i = 1; $i < 8; $i++) {
            $data [] = [
                'sourceKladr' => "Source location for order № ". $i,
                'targetKladr' => "Target location for order № ". $i,
                'weight' => (rand(10, 999) * 10)
            ];
        }

        return $data;
    }

    private function getFastCompanyResponse(): array
    {
        $coefficient = rand(20, 70)/10;
        $day = 60*60*24;

        return [
            'date' => date('Y-m-d', time() + ($day *$coefficient)),
            'price' => 275 * $coefficient,
            'error' => ''
        ];
    }

    private function getRegularCompanyResponse(): array
    {
        $coefficient = rand(10, 90)/10;
        $week = 60*60*24*7;

        return [
            'date' => date('Y-m-d', time() + ($week * $coefficient)),
            'coefficient' => $coefficient,
            'error' => ''
        ];
    }
}