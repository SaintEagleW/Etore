<?php

namespace Etore\Order\Entities;

class OrderInfo
{
    private int $orderNo;
    private string $purchasedAt;
    private int $priceAmount;
    private string $status;
    private int $totalQuantity;

    public function __construct(Order $order, array $orderItems)
    {
        $this->orderNo = $order->getId();
        $this->purchasedAt = $order->getPurchasedAt();
        $this->priceAmount = $order->getPayment();
        $this->status = $order->getStatus();
        $this->totalQuantity = $this->countTotalQuantity($orderItems);
    }

    private function countTotalQuantity(array $orderItems)
    {
        $totalQuantity = 0;
        foreach ($orderItems as $orderItem) {
            $totalQuantity += $orderItem->getQuantity();
        }

        return $totalQuantity;
    }

    public function getOrderNo()
    {
        return $this->orderNo;
    }

    public function getPurchasedAt()
    {
        return $this->purchasedAt;
    }

    public function getPriceAmount()
    {
        return $this->priceAmount;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }
}
