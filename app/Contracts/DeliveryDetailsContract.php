<?php


namespace App\Contracts;


use App\Data\DeliveryDetailsDTO;
use App\Data\ShippingDetailsDTO;

interface DeliveryDetailsContract
{
    public function __construct(ShippingDetailsDTO $shippingDetails);

    public function getDetails(): DeliveryDetailsDTO;
}