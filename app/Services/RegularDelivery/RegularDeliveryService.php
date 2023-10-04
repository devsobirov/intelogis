<?php


namespace App\Services\RegularDelivery;


use App\Services\DeliveryService;

class RegularDeliveryService extends DeliveryService
{
    protected string $baseUrl = 'https://regular-shipping.agency';

    const BASE_PRICE = 150.0;

    public function getDeliveryDate(): string
    {
        return $this->response['date'] ?? '';
    }

    public function getDeliveryPrice(): float
    {
        if (isset($this->response['price'])) {
            return $this->calcCoefficientBasedPrice($this->response['price']);
        }
        return 0;
    }

    public function getErrors(): string
    {
        return $this->response['error'] ?? $this->error;
    }

    private function calcCoefficientBasedPrice(float $coefficient): float
    {
        return $coefficient * self::BASE_PRICE;
    }
}