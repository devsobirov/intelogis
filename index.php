<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 *
 * Настоятельно рекомендуется ознакомиться с README.MD где в разделе "описание"
 * описивается принцип реализации и особенности, что облегчает чтение кода
 *
 */

// Получаем произвольных набор данных (заказов для доставки)
$shippingOrders = \App\Core\HttpClient::request('https://shipping-orders.fake')->toArray();

// Предполоагается клиентской части выбран один или более служб доставки
// через формы, который имел чекбоксы с значением 'company[]' - типом массив;
$companies = \App\Core\Request::input('company');

$services = [];
// С помощью конфигуратора (простой статичной фабрики) определяем целевых серсисов
// для нужных (один или более) служб
foreach ($companies as $company) {
    $services[$company] = \App\Services\DeliveryDetailServiceFactory::getClassName($company);
}

// Для каждого набора данных поставки (заказа) подсчитаем детали доставки для каждой службы доставки
// для удобства (разработчика) в элементе каждого заказа создаем ключь (array) 'offers'
// и там же предоставим предлодежения компаний
$result = [];
foreach ($shippingOrders as $order) {
    $order['offers'] = [];
    foreach ($services as $company => $className) {
        $service = \App\Services\DeliveryDetailServiceFactory::getInstance($className, $order);
        $order['offers'][$company] = $service->getDetails();
    }
    $result[] = $order;
}

\App\Core\View::dump(compact('result', 'companies'));