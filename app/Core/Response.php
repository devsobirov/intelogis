<?php


namespace App\Core;


class Response
{
    public function isOk(): bool
    {
        return rand(0, 99) !== 13;
    }

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
        return json_encode([]);
    }
}