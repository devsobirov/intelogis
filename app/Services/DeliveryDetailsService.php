<?php

namespace App\Services;


use App\Contracts\DeliveryDetailsContract;
use App\Contracts\DeliveryServiceContract;
use App\Data\DeliveryDetailsDTO;
use App\Data\ShippingDetailsDTO;
use http\Exception\InvalidArgumentException;

abstract class DeliveryDetailsService implements DeliveryDetailsContract
{

    public function __construct(protected ShippingDetailsDTO $shippingDetails)
    {}

    public function getDetails(): DeliveryDetailsDTO
    {
        $deliveryService = $this->createDeliveryService();
        $deliveryService->setShippingDetails($this->shippingDetails);
        $deliveryService->requestTransportCompany();

        return (new DeliveryDetailsDTO())->fromArray([
            'price' => $deliveryService->getDeliveryPrice(),
            'date' => $deliveryService->getDeliveryDate(),
            'error' => $deliveryService->getErrors()
        ]);
    }

    abstract public function createDeliveryService(): DeliveryServiceContract;
}