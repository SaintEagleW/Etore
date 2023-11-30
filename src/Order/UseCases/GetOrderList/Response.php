<?php

namespace Etore\Order\UseCases\GetOrderList;

use Etore\Order\Entities\Order;

class Response
{
    private array $orders;

    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    public function format(): array
    {
        return [
            'data' => array_map(function (Order $order) {
                return [
                    'orderId' => $order->getId(),
                    'productName' => $order->getFirstItemTitle(),
                    'productPic' => $order->getFirstItemImageUrl(),
                    'price' => $order->getTotal(),
                    'quantity' => $order->countItems(),
                    'status' => $order->getDeliveryStatus(),
                    'purchasedAt' => $order->getPurchasedAt()
                ];
            }, $this->orders)
        ];
    }
}
