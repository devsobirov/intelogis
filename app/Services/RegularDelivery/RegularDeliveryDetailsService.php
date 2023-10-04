<?php


namespace App\Services\RegularDelivery;


use App\Contracts\DeliveryServiceContract;
use App\Services\DeliveryDetailsService;

class RegularDeliveryDetailsService extends DeliveryDetailsService
{

    public function createDeliveryService(): DeliveryServiceContract
    {
        return new RegularDeliveryService();
    }
}