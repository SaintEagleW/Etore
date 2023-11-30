<?php

namespace Etore\Order\UseCases\GetOrderDetail;

use Etore\Order\Entities\Order;

class Response
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function format(): array
    {
        return [
            'data' => [
                'orderId' => $this->order->getId(),
                'purchasedAt' => $this->order->getPurchasedAt(),
                'customer' => [
                    'name' => $this->order->getCustomerName(),
                    'phoneNumber' => $this->order->getCustomerPhoneNumber(),
                    'address' => $this->order->getCustomerAddress()
                ],
                'items' => $this->order->getDetail(),
                'subtotal' => $this->order->getTotal()
            ]
        ];
    }
}
