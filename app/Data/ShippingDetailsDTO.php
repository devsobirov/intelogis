<?php


namespace App\Data;


class ShippingDetailsDTO implements \App\Contracts\DataTransferObjectContract
{
    public string $sourceKladr;
    public string $targetKladr;
    public float $weight;

    public function fromArray(array $data): ShippingDetailsDTO
    {
        $this->sourceKladr = $data['sourceKladr'];
        $this->targetKladr = $data['targetKladr'];
        $this->weight = $data['weight'];
    }
}