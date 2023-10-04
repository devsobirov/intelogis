<?php


namespace App\Data;


use App\Contracts\DataTransferObjectContract;

class DeliveryDetailsDTO implements DataTransferObjectContract
{
    public float $price;
    public string $date;
    public string $error;

    public function fromArray(array $data): DeliveryDetailsDTO
    {
        $this->price = $data['price'];
        $this->date = $data['date'];
        $this->error = $data['error'];

        return $this;
    }
}