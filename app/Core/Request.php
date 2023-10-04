<?php


namespace App\Core;


class Request
{
    public static function input(string $key): mixed
    {
        if ($key === 'company') {
            return [
                'FastDelivery', 'RegularDelivery'
            ];
        }
        return $_REQUEST[$key] ?? null;
    }
}