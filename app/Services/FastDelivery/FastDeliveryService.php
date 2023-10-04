<?php

namespace App\Services\FastDelivery;

use App\Services\DeliveryService;

class FastDeliveryService extends DeliveryService
{
    protected string $baseUrl = 'https://premium-shipping.agency';

    const CLOSING_HOUR = 18;

    public function getDeliveryDate(): string
    {
        if (isset($this->response['date'])) {
            return $this->isWorkdayClosed()
                ? $this->getFormattedNextDay($this->response['date'])
                : $this->response['date'];
        }
        return '';
    }

    public function getDeliveryPrice(): float
    {
        if (isset($this->response['price'])) {
            return $this->response['price'];
        }
        return 0;
    }

    public function getErrors(): string
    {
        return $this->error;
    }

    private function isWorkdayClosed(): bool
    {
        return date('H') >= self::CLOSING_HOUR;
    }

    private function getFormattedNextDay(string $date, string $outputFormat = 'Y-m-d'): string
    {
        try {
            return (new \DateTime($date))->modify('+ 1 day')->format($outputFormat);
        } catch (\Exception $exception) {
            $this->error = "Неправильный формат даты от службы доставки";
            return '';
        }
    }
}