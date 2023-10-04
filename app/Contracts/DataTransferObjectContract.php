<?php


namespace App\Contracts;


interface DataTransferObjectContract
{
    public function fromArray(array $data): DataTransferObjectContract;
}