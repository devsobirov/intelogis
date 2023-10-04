<?php

namespace App\Core;

class HttpClient
{
    public static function request(string $url): Response
    {
        return new Response($url);
    }
}