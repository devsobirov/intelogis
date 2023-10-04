<?php


namespace App\Core;


class View
{
    public static function dump(mixed $args): string
    {
        echo "<pre>";
        var_dump($args);
        echo "</pre>";
        exit();
    }

    public static function render(string $view, array $args = [])
    {
        //
    }
}