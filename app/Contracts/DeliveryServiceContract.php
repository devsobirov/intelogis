<?php


namespace App\Contracts;

use App\Data\ShippingDetailsDTO;

/**
 * Interface DeliveryServiceContract
 * @package App\Contracts
 *
 * @const string BASE_URL
 * @var string $sourceKladr
 * @var string $targetKladr
 * @var float $weight
 */
interface DeliveryServiceContract
{
    public function setShippingDetails(ShippingDetailsDTO $shippingDetails): void;
    public function requestTransportCompany(): void;

    public function getDeliveryDate(): string;
    public function getDeliveryPrice(): float;
    public function getErrors(): string;
}