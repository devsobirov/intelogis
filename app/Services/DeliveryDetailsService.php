<?php

namespace App\Services;


use App\Contracts\DeliveryServiceContract;
use App\Data\DeliveryDetailsDTO;

abstract class DeliveryDetailsService
{
    abstract public function getDetails(): DeliveryDetailsDTO;

    abstract public function getDeliveryService(): DeliveryServiceContract;
}