<?php


namespace App\Services;


use App\Contracts\DeliveryServiceContract;
use App\Core\HttpClient;
use App\Data\ShippingDetailsDTO;

abstract class DeliveryService implements DeliveryServiceContract
{
    protected string $baseUrl;

    protected string $sourceKladr;
    protected string $targetKladr;
    protected float $weight;


    protected array $response = [];
    protected string $error = '';

    public function setShippingDetails(ShippingDetailsDTO $shippingDetails): void
    {
        $this->sourceKladr = $shippingDetails->sourceKladr;
        $this->targetKladr = $shippingDetails->targetKladr;
        $this->weight = $shippingDetails->weight;
    }

    public function requestTransportCompany(): void
    {
        $response = HttpClient::request($this->baseUrl);

        if ($response->isOk()) {
            $this->response = $response->toArray();
        } else {
            $this->error = 'Ошибка запроса при получения данных из службы доставки '. __CLASS__;
        }

    }
}