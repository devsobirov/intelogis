<?php


namespace App\Services\FastDelivery;


use App\Contracts\DeliveryServiceContract;

class FastDeliveryDetailsService extends \App\Services\DeliveryDetailsService
{

    public function createDeliveryService(): DeliveryServiceContract
    {
        return new FastDeliveryService();
    }
}