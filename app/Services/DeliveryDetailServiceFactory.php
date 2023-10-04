<?php


namespace App\Services;


use App\Contracts\DeliveryDetailsContract;
use App\Data\ShippingDetailsDTO;
use App\Services\FastDelivery\FastDeliveryDetailsService;
use App\Services\RegularDelivery\RegularDeliveryDetailsService;

class DeliveryDetailServiceFactory
{
    /**
     * @param string $companyName
     * @param array $args
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function getClassName(string $companyName): string
    {
        return match ($companyName) {
            'FastDelivery' => FastDeliveryDetailsService::class,
            'RegularDelivery' => RegularDeliveryDetailsService::class,
            default => throw new \InvalidArgumentException("Неизвестная служба доставки - " . $companyName),
        };
    }

    /**
     * @param string $className
     * @param array $args
     * @return DeliveryDetailsContract
     * @throws \InvalidArgumentException
     */
    public static function getInstance(string $className, array $args): DeliveryDetailsContract
    {
        try {
            $args = (new ShippingDetailsDTO())->fromArray($args);
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException("Некорректные данные для поставки");
        }

        return new $className($args);
    }
}